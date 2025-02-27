<?php

namespace App\DataTables;

use App\Models\Service;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ServiceDataTable extends DataTable
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

        // Nombre del servicio
        ->addColumn('name', function($query){
            return $query->name;
        })
        ->filterColumn('name', function ($query, $keyword) {
            $query->where('name', 'like', "%{$keyword}%");
        })
        ->orderColumn('name', 'name $1')

        // Descripción del servicio
        ->addColumn('description', function($query){
            return $query->description;
        })

        // action
        ->addColumn('action', function($query){
            $edit = "<a href='".route('admin.typer-title.edit', $query->id)."' class='btn btn-primary' title='Editar'><i class='fas fa-edit'></i></a>";
            $delete = "<a href='".route('admin.typer-title.destroy', $query->id)."' class='btn btn-danger delete-item ml-2' title='Eliminar'><i class='fas fa-trash'></i></a>";
            return $edit . $delete;
        })

        ->rawColumns(['id','name','description','action'])
        ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Service $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('service-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        // Button::make('excel'),
                        // Button::make('csv'),
                        // Button::make('pdf'),
                        // Button::make('print'),
                        // Button::make('reset'),
                        // Button::make('reload')
                    ])
                    ->parameters([
                        // 'dom'          => 'Bfrtip', // Comentar para que no se muestren los botones de exportación

                        // 'buttons'      => ['export', 'pageLength', 'print', 'reset', 'reload'],
                        'buttons'      => ['pageLength', 'excel', 'csv', 'pdf', 'print', 'reset', 'reload'],
                        'select'       => false,
                        'order'        => [[0, 'asc']],

                        // 'pageLength'   => 10,

                        // Configure the drop down options.
                        'lengthMenu'   => [
                                            [ 10, 25, 50, -1 ],
                                            [ '10', '25 filas', '50 filas', 'Todos' ]
                                        ],

                        // Para traducir al español
                        'language' => (app()->getLocale() == 'es') ? \Illuminate\Support\Facades\Config::get('dtespanol') : '',
                        
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
            Column::make('name')->title(__('Servicio')),
            Column::make('description')->title(__('Descripción')),

            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(150)
                  ->title(__('Acción'))
                  ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Service_' . date('YmdHis');
    }
}
