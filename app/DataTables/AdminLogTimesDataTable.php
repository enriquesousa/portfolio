<?php

namespace App\DataTables;

use App\Models\LogTime;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class AdminLogTimesDataTable extends DataTable
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
            })->orderColumn('id', 'id $1')

            // User ID
            // ->addColumn('user_id', function($query){
            //     return $query->user_id;
            // })
            // ->filterColumn('user_id', function ($query, $keyword) {
            //     $query->where('user_id', 'like', "%{$keyword}%");
            // })
            // ->orderColumn('user_id', 'user_id $1')

            // Name (user_id)
            ->addColumn('user_name', function($query){
                return $query->user->name;
            })

            // login_time
            ->addColumn('login_time', function($query){
                $login_time = formatFecha5($query->login_time);
                return $login_time;
            })
            ->filterColumn('login_time', function ($query, $keyword) {
                $query->where('login_time', 'like', "%{$keyword}%");
            })
            ->orderColumn('login_time', 'login_time $1')

            // logout_time
            ->addColumn('logout_time', function($query){
                if($query->logout_time == null){
                    $logout_time = '-';
                }else{
                    $logout_time = formatFecha5($query->logout_time);
                }
                return $logout_time;
            })

            // time interval
            ->addColumn('time_interval', function($query){
                $time_interval = intervaloTiempo($query->login_time, $query->logout_time);
                return $time_interval;
            })

            // action
            ->addColumn('action', function($query){

                // Con icono de fontawesome
                $view = "<a href='javascript:void(0)' class='btn btn-primary logTime_details_btn' title='".__("Details")."' data-id='".$query->id."' data-toggle='modal' data-target='#logTime_modal'><i class='fas fa-eye'></i></a>";

                // Con icono de bootstrap
                // $view = "<a href='javascript:void(0)' class='btn btn-primary logTime_details_btn' title='".__("Details")."' data-id='".$query->id."' data-toggle='modal' data-target='#logTime_modal'><i class='bi bi-eye-fill'></i></a>";

                return $view;
            })

            ->rawColumns(['time_interval','action'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(LogTime $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('adminlogtimes-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(0, 'desc')
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
                        
                        // if locale is spanish
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

            Column::make('id')->title(__('#'))->width(60)->addClass('text-center'),
            // Column::make('user_id')->title(__('ID Admin'))->addClass('text-primary')->width(100),
            Column::make('user_name')->title(__('Name'))->width(100),
            Column::make('login_time')->title(__('T. Inicio'))->addClass('text-primary')->width(100),
            Column::make('logout_time')->title(__('T. Final'))->width(100),
            Column::make('time_interval')->title(__('Intervalo'))->width(100),
            Column::make('description')->title(__('Actividad Registrada')),

            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(100)
                  ->title(__('Acción'))
                  ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'AdminLogTimes_' . date('YmdHis');
    }
}
