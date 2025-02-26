<?php

namespace App\DataTables;

use App\Models\TyperTitle;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class TyperTitleDataTable extends DataTable
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
            // return '<p class="text-center">'.$query->id.'</p>';
        })

        // title
        ->addColumn('title', function($query){
            return $query->title;
        })
        ->filterColumn('title', function ($query, $keyword) {
            $query->where('title', 'like', "%{$keyword}%");
        })

        // action
        ->addColumn('action', function($query){
            $view = "<a href='".route('admin.typer-title.edit', $query->id)."' class='btn btn-primary' title='Editar'><i class='fas fa-edit'></i></a>";
            $delete = "<a href='".route('admin.typer-title.destroy', $query->id)."' class='btn btn-danger delete-item ml-2' title='Eliminar'><i class='fas fa-trash'></i></a>";
            return $view . $delete;
        })

        ->rawColumns(['id','title','action'])
        ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(TyperTitle $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('typertitle-table')
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
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {

        return [

            Column::make('id')->title(__('ID'))->width(60)->addClass('text-center'),
            Column::make('title')->title(__('Titulo')),

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
        return 'TyperTitle_' . date('YmdHis');
    }
}
