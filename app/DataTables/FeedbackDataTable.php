<?php

namespace App\DataTables;

use App\Models\Feedback;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Support\Str;

class FeedbackDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            // ID
            ->addColumn('id', function($query){
                return $query->id;
            })->orderColumn('id', 'id $1')

            // Nombre Cliente
            ->addColumn('name', function($query){
                return $query->name;
            })
            ->filterColumn('name', function ($query, $keyword) {
                $query->where('name', 'like', "%{$keyword}%");
            })
            ->orderColumn('name', 'name $1')

            // Cargo
            ->addColumn('position', function($query){
                return $query->position;
            })

            // Descripción
            ->addColumn('description', function($query){
                return Str::limit(strip_tags($query->description), 50, '...');
            })
            
            // action
            ->addColumn('action', function($query){
                $edit = "<a href='".route('admin.feedback.edit', $query->id)."' class='btn btn-primary' title='".__("Editar")."'><i class='fas fa-edit'></i></a>";
                $delete = "<a href='".route('admin.feedback.destroy', $query->id)."' class='btn btn-danger delete-item ml-2' title='".__('Eliminar')."'><i class='fas fa-trash'></i></a>";
                return $edit . $delete;
            })

            ->rawColumns(['id','name','action'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Feedback $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('feedback-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ])
                    ->parameters([

                        // 'dom'          => 'Bfrtip', // Comentar para que no se muestren los botones de exportación

                        // Para cambiar el placeholder de la búsqueda
                        // 'searchPlaceholder' => "Categoría",

                        // 'buttons'      => ['export', 'pageLength', 'print', 'reset', 'reload'],
                        'buttons'      => ['pageLength', 'excel', 'csv', 'pdf', 'print', 'reset', 'reload'],
                        'select'       => false,
                        'order'        => [[0, 'asc']],

                        // 'pageLength'   => 10,

                        // Configure the drop down options.
                        'lengthMenu'   => [
                                            [ 10, 25, 50, -1 ],
                                            [ '10', __('25 filas'), __('50 filas'), __('Todos') ]
                                        ],

                        // Para traducir al español
                        'language' => (app()->getLocale() == 'es') ? \Illuminate\Support\Facades\Config::get('dtespanol') : \Illuminate\Support\Facades\Config::get('dtingles'),

                        // order by first column
                        'order' => [[0, 'desc']],
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [

            Column::make('id')->title(__('ID'))->width(60)->addClass('text-center'),
            Column::make('name')->title(__('Nombre')),
            Column::make('position')->title(__('Cargo')),
            Column::make('description')->title(__('Descripción')),

            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(150)
                  ->addClass('text-center'),
        ];

    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Feedback_' . date('YmdHis');
    }
}
