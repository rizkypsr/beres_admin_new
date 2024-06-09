@extends('layout.master')

@section('css')
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.min.css " /> --}}
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" /> --}}
    <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css" />
@endsection

@section('content')
    @include('customer.addcustomer')

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <div class="page-heading"><br>
                    <h3>Data Customer</h3>
                </div>
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex">
                        <button class="btn btn-primary mr-2" data-bs-toggle="modal" data-bs-target="#tambahkota"><i
                                class="fas fa-plus"></i> Tambah Customer </button>
                        <a href="/customerexport" class="btn btn-success btn-md mr-2">Customer Export</a>
                        <form action="/customer-import" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="file" accept=".csv, .xlsx" style="display: none;"
                                onchange="this.form.submit()">
                            <button type="button" class="btn btn-success btn-md"
                                onclick="document.querySelector('input[name=file]').click()">Customer Import</button>
                        </form>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            {{ $dataTable->table([
                                'class' => 'table table-striped',
                                'width' => '100%',
                                'cellspacing' => '0',
                            ]) }}
                        </div>
                    </div>
                    @include('sweetalert::alert')
                </div>
            </div>
    </div>
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

    <script type="text/javascript" src="DataTables/datatables.min.js"></script>


    {{-- <script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script> --}}
    {{-- <script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.min.js"></script> --}}
@endpush
