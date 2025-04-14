<?php

namespace App\DataTables;

use App\Models\FooterUsefulLink;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class FooterUsefulLinkDataTable extends DataTable
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

            // Name
            ->addColumn('name', function($query){
                return $query->name;
            })

            // Status
            ->addColumn('status', function($query){
                if($query->status == 1){
                    return '<span class="badge badge-success">'.__("Activo").'</span>';
                }else{
                    return '<span class="badge badge-danger">'.__("Inactivo").'</span>';
                }
            })
            
            // action
            ->addColumn('action', function($query){
                $edit = "<a href='".route('admin.footer-useful-links.edit', $query->id)."' class='btn btn-primary' title='".__("Editar")."'><i class='fas fa-edit'></i></a>";
                $delete = "<a href='".route('admin.footer-useful-links.destroy', $query->id)."' class='btn btn-danger delete-item ml-2' title='".__('Eliminar')."'><i class='fas fa-trash'></i></a>";
                return $edit . $delete;
            })

            ->rawColumns(['id', 'icon', 'status', 'name', 'action'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(FooterUsefulLink $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('footerusefullink-table')
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
                    ])->parameters([

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
            Column::make('url')->title(__('Url')),
            Column::make('status')->title(__('Estado'))->addClass('text-center'),

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
        return 'FooterUsefulLink_' . date('YmdHis');
    }
}
