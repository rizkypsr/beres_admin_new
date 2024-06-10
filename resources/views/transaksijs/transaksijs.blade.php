@extends('layout.master')

@section('css')
    <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css" />
@endsection

@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <div class="page-heading"><br>
                    <h3>Transaksi Jual Sampah

                    </h3>
                </div>
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahtransaksijs"><i
                                class="fas fa-plus"></i> Tambah Transaksi Jual Sampah </button>
                        @include('transaksijs.addtransaksijs')
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            {{ $dataTable->table([
                                'class' => 'table table-striped',
                                'width' => '100%',
                                'cellspacing' => '0',
                            ]) }}
                            @include('sweetalert::alert')
                        </div>
                    </div>
                </div>

            </div>
    </div>
@endsection
@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

    <script type="text/javascript" src="DataTables/datatables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {

            $("#customer-search-js").select2({
                dropdownParent: $("#tambahtransaksijs")
            });
        });
    </script>
@endpush
