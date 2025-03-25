<?php

namespace App\DataTables;

use App\Models\PortfolioItem;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PortfolioItemDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))

            // Imagen
            ->addColumn('image', function ($query) {
                return '<img src="'.asset($query->image).'" width="60px" alt="">';
            })

            // Titulo
            ->addColumn('title', function ($query) {
                return $query->title;
            })
            ->filterColumn('title', function ($query, $keyword) {
                $query->where('title', 'like', "%{$keyword}%");
            })

            // Categoría
            ->addColumn('category', function ($query) {
                return $query->category->name;
            })
            ->filterColumn('category', function ($query, $keyword) {
                $query->whereHas('category', function ($query) use ($keyword) {
                    $query->where('name', 'like', "%{$keyword}%");
                });
            })

            // Descripción
            ->addColumn('description', function ($query) {
                return $query->description;
            })

            // Cliente
            ->addColumn('client', function ($query) {
                return $query->client;
            })

            // website
            ->addColumn('website', function ($query) {
                return $query->website;
            })

            // created_at
            ->addColumn('created_at', function ($query) {
                return formatFecha6($query->created_at);
            })
            

            // Acciones
            ->addColumn('action', function ($query) {

                $edit = "<a href='" . route('admin.portfolio-item.edit', $query->id) . "' class='btn btn-primary'><i class='fas fa-edit'></i></a>";
                $delete = "<a href='" . route('admin.portfolio-item.destroy', $query->id) . "' class='btn btn-danger delete-item mx-2'><i class='fas fa-trash'></i></a>";

                return $edit . $delete;
            })

            ->rawColumns(['action', 'image', 'description'])

            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(PortfolioItem $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('portfolioitem-table')
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
                    ])
                    
                    // Para cambiar el placeholder de la búsqueda
                    ->language(['searchPlaceholder' => __('ID, Título, o Categoría')]);
                    
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [

            Column::make('id')->title('<span class="text-primary">'.__("ID").'</span>')->searchable(true)->width(40)->addClass('text-center'),
            Column::make('image')->title(__('Image'))->width(100)->addClass('text-center'),
            Column::make('title')->searchable(true)->title('<span class="text-primary">'.__("Titulo").'</span>')->width(100),
            Column::make('category')->title('<span class="text-primary">'.__("Categoría").'</span>')->width(100)->addClass('text-center'),
            Column::make('description')->title(__('Descripción')),
            Column::make('client')->title(__('Cliente'))->width(50),
            Column::make('website')->title(__('Sitio Web'))->width(50),
            Column::make('created_at')->title(__('Creado en'))->width(50),

            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(200)
                ->title(__('Acción'))
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'PortfolioItem_' . date('YmdHis');
    }
}
