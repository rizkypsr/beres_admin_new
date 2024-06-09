<?php

namespace App\DataTables;

use App\Models\Customer;
use App\Models\Kecamatan;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class CustomersDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param  QueryBuilder  $query  Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('kecamatan', function (Customer $customer) {
                return $customer->kecamatan->nama_kecamatan;
            })
            ->addColumn('lahir', function (Customer $customer) {
                return $customer->tempat_lahir.', '.$customer->tgl_lahir;
            })
            ->addColumn('action', function (Customer $customer) {
                $listKecamatan = Kecamatan::where('status_kecamatan', 0)->get();

                return view('customer.action', compact('listKecamatan', 'customer'));
            })
            ->setRowId(function ($customer) {
                return $customer->id_customer;
            });
    }

    /**
     * Get query source of dataTable.
     */
    public function query(Customer $model): QueryBuilder
    {
        $user = $this->user;

        if (auth()->user()->role == 'superadmin') {
            return $model->with('kecamatan')->orderBy('created_at', 'desc');
        }

        // if role is admin
        return $model->with('kecamatan')
            ->where('id_kecamatan_customer', $user->id_kecamatan_user)
            ->where('role_customer', 'customer')
            ->orderBy('created_at', 'desc');
    }

    /**
     * Optional method if you want to use html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('customers-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->selectStyleSingle();
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id_customer')->title('ID'),
            Column::make('kecamatan', 'id_kecamatan_customer'),
            Column::make('nama'),
            Column::make('alamat_customer')->title('Alamat'),
            Column::make('saldo_customer')->title('Saldo'),
            Column::make('no_hp_customer')->title('No HP'),
            Column::make('lahir')->title('Tempat, Tgl Lahir'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false),
        ];
    }

    /**
     * Get filename for export.
     */
    protected function filename(): string
    {
        return 'Customers_'.date('YmdHis');
    }
}
