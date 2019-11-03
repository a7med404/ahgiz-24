<?php

namespace App\DataTables;

use Illuminate\Http\Request;
use Modules\Customer\Entities\Customer;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Html\Editor\Editor;

class CustomerDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            // ->filter(function ($query) use ($request) {
            //     if ($request->has('name')) {
            //         $query->where('name', 'like', "%{$request->get('name')}%");
            //     }

            //     if ($request->has('email')) {
            //         $query->where('email', 'like', "%{$request->get('email')}%");
            //     }
            // })
            
            ->addColumn('his_reservation', function (Customer $customer) {
                return $customer->reservations->count();
            })
            ->removeColumn('password')
            ->setRowId('{{$id}}');
    }

    /**
 * Get query source of dataTable.
     *
     * @param \Customer $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Customer $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('customer-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->parameters([
            'lengthMenu' => [
                [10, 25, 50, -1],
                ['10 rows', '25 rows', '50 rows', 'Show all']
            ],
            "paging" => true,
                
            'fixedHeader' => true,
            "searching" => true,
            'searchDelay' => 3500,
    
            "columnDefs" => [
                "defaultContent" => "-",
                "targets" => "_all"
            ],
                // 'initComplete' => "function () {
                //     this.api().columns().every(function () {
                //         var column = this;
                //         var input = document.createElement(\"input\");
                //         $(input).appendTo($(column.footer()).empty())
                //         .on('change', function () {
                //             column.search($(this).val(), false, false, true).draw();
                //         });
                //     });
                // }",

                        
            ])
            ->orderBy(1)
            ->buttons(
                Button::make('create'),
                Button::make('export'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {

        return [
            Column::make('id')->exportable(false)->printable(false)->serverSide(true)->processing(true)->width(60)->addClass('text-center'),
            Column::make('c_name')->data('c_name')->title(__('home/labels.name')),
            Column::computed('his_reservation')->data('his_reservation')->title(__('home/labels.his_reservation'))->orderable(true),
            Column::make('phone_number')->data('phone_number')->title(__('home/labels.phone_number')),
            Column::make('email')->data('email')->title(__('home/labels.email')),
            Column::make('birthdate')->data('birthdate')->title(__('home/labels.brith_date')),
        ];
        // Column::make('c_name')->data('c_name')->title( __('home/labels.name'))->searchable(true)->orderable(true)->render('function(){}')->footer('Id')->exportable(true)->printable(true),
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Customer_' . date('YmdHis');
    }

    public function anyData(User $user)
    {

        $users = $user->all();

        return Datatables::of($users)

            ->editColumn('name', function ($model) {
                return '<a href="' . url('/adminpanel/users/' . $model->id . '/edit') . '">' . $model->name . '</a>';
            })
            ->editColumn('admin', function ($model) {
                return $model->admin == 0 ? '<span class="badge badge-info">' . 'عضو' . '</span>' : '<span class="badge badge-warning">' . 'مدير الموقع' . '</span>';
            })
            ->editColumn('mybu', function ($model) {
                return '<a href="' . url('/adminpanel/bu/' . $model->id) . '"> <span class="btn btn-danger btn-circle"> <i class="fa fa-link"></i> </span> </a>';
            }) 

            ->editColumn('control', function ($model) {
                $all = '<a href="' . url('/adminpanel/users/' . $model->id . '/edit') . '" class="btn btn-info btn-circle"><i class="fa fa-edit"></i></a> ';
                if ($model->id != 1) {
                    $all .= '<a href="' . url('/adminpanel/users/' . $model->id . '/delete') . '" class="btn btn-danger btn-circle"><i class="fa fa-trash-o"></i></a>';
                }
                return $all;
            })
            ->make(true);
    }

}
