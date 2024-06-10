<?php

namespace App\DataTables;

use App\Models\transaksijs;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class TransaksiJsDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param  QueryBuilder  $query  Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('customer', function (transaksijs $transaksijs) {
                return $transaksijs->customer->nama;
            })
            ->addColumn('kecamatan', function (transaksijs $transaksijs) {
                return $transaksijs->kecamatan->nama_kecamatan;
            })
            ->addColumn('jenis_sampah', function (transaksijs $transaksijs) {
                return $transaksijs->produkjs->judul_js;
            })
            ->addColumn('action', function (transaksijs $data) {
                return view('transaksijs.action', compact('data'));
            })
            ->addColumn('status', function (transaksijs $data) {
                $status = $data->status_js;

                return view('transaksijs.status', compact('status'));
            })
            ->setRowId('id_transaksijs');
    }

    /**
     * Get query source of dataTable.
     */
    public function query(transaksijs $model): QueryBuilder
    {
        $user = User::find(auth()->user()->id);

        if (auth()->user()->role == 'superadmin') {
            return $model->with(['kecamatan', 'customer', 'produkjs'])->orderBy('created_at', 'desc');
        }

        // if role is admin
        return $model->with(['kecamatan', 'customer', 'produkjs'])
            ->where('id_kc_js', $user->id_kecamatan_user)
            ->orderBy('created_at', 'desc');
    }

    /**
     * Optional method if you want to use html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('transaksijs-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
                    //->dom('Bfrtip')
            ->selectStyleSingle();
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id_transaksijs')->title('ID'),
            Column::make('customer')->title('Customer'),
            Column::make('kecamatan')->title('Kecamatan'),
            Column::make('jenis_sampah')->title('Jenis Sampah'),
            Column::make('satuan_js')->title('Satuan'),
            Column::make('jumlah_js')->title('Jumlah'),
            Column::make('harga_js')->title('Harga'),
            Column::make('total_js')->title('Total'),
            Column::make('created_at')->title('Tanggal'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false),
            Column::make('status')->title('Status'),
        ];
    }

    /**
     * Get filename for export.
     */
    protected function filename(): string
    {
        return 'TransaksiJs_'.date('YmdHis');
    }
}
