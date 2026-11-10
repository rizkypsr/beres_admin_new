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
                        <a href="/transaksijs?action=excel" class="btn btn-success"><i class="fas fa-file-excel"></i>
                            Export Excel</a>
                        <form id="bulk-proses-form" action="/accjsbulk" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" id="bulk-proses-btn" class="btn btn-warning" disabled>
                                <span id="bulk-proses-spinner" class="spinner-border spinner-border-sm d-none"
                                    role="status" aria-hidden="true"></span>
                                <span id="bulk-proses-label">Proses Terpilih (<span id="bulk-proses-count">0</span>)</span>
                                <span id="bulk-proses-loading" class="d-none">Memproses...</span>
                            </button>
                        </form>
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
    {{-- sweet-alert only auto-loads its JS when a flash alert exists; the bulk confirm needs it always. --}}
    <script>
        window.Swal || document.write('<script src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"><\/script>');
    </script>

    <script>
        $(document).ready(function() {

            $("#customer-search-js").select2({
                dropdownParent: $("#tambahtransaksijs")
            });
        });

        // Row actions (hapus / Proses / Selesai) marked with data-confirm: confirm with SweetAlert,
        // then show a loading popup so the action can't be fired twice while the request runs.
        (function() {
            function confirmThen(message, button, go) {
                Swal.fire({
                    title: message,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: button || 'Ya',
                    cancelButtonText: 'Batal',
                    reverseButtons: true,
                    focusCancel: true,
                }).then(function(result) {
                    if (!result.isConfirmed) {
                        return;
                    }
                    Swal.fire({
                        title: 'Memproses...',
                        text: 'Mohon tunggu, jangan tutup halaman ini.',
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        showConfirmButton: false,
                        didOpen: () => Swal.showLoading(),
                    });
                    go();
                });
            }

            document.addEventListener('click', function(e) {
                const link = e.target.closest('a[data-confirm]');
                if (!link) {
                    return;
                }
                e.preventDefault();
                confirmThen(link.dataset.confirm, link.dataset.confirmButton, () => window.location.href = link.href);
            });

            document.addEventListener('submit', function(e) {
                const form = e.target.closest('form[data-confirm]');
                if (!form) {
                    return;
                }
                e.preventDefault();
                confirmThen(form.dataset.confirm, form.dataset.confirmButton, function() {
                    form.querySelectorAll('button').forEach(b => b.disabled = true);
                    form.submit();
                });
            });
        })();

        // Bulk "Proses": selected IDs survive paging/search because the table redraws via AJAX.
        (function() {
            const selected = new Set();
            let submitting = false;
            const table = document.getElementById('transaksijs-table');
            const form = document.getElementById('bulk-proses-form');
            const btn = document.getElementById('bulk-proses-btn');
            const count = document.getElementById('bulk-proses-count');

            function pageChecks() {
                return table.querySelectorAll('tbody .bulk-proses-check');
            }

            function sync() {
                const checks = pageChecks();
                checks.forEach(c => c.checked = selected.has(c.value));
                const all = document.getElementById('bulk-proses-all');
                if (all) {
                    all.checked = checks.length > 0 && [...checks].every(c => c.checked);
                }
                count.textContent = selected.size;
                btn.disabled = submitting || selected.size === 0;
            }

            function setLoading(on) {
                submitting = on;
                document.getElementById('bulk-proses-spinner').classList.toggle('d-none', !on);
                document.getElementById('bulk-proses-loading').classList.toggle('d-none', !on);
                document.getElementById('bulk-proses-label').classList.toggle('d-none', on);
                table.querySelectorAll('.bulk-proses-check, #bulk-proses-all').forEach(c => c.disabled = on);
                sync();
            }

            document.addEventListener('change', function(e) {
                if (e.target.classList.contains('bulk-proses-check')) {
                    e.target.checked ? selected.add(e.target.value) : selected.delete(e.target.value);
                    sync();
                } else if (e.target.id === 'bulk-proses-all') {
                    pageChecks().forEach(c => e.target.checked ? selected.add(c.value) : selected.delete(c.value));
                    sync();
                }
            });

            // Clicking the checkbox should not also toggle DataTables row selection.
            document.addEventListener('click', function(e) {
                if (e.target.matches('.bulk-proses-check, #bulk-proses-all')) {
                    e.stopPropagation();
                }
            }, true);

            new MutationObserver(sync).observe(table, { childList: true, subtree: true });

            form.addEventListener('submit', function(e) {
                e.preventDefault();
                if (submitting || selected.size === 0) {
                    return;
                }

                Swal.fire({
                    title: 'Proses ' + selected.size + ' transaksi?',
                    text: 'Status transaksi yang dipilih akan diubah menjadi "sedang diproses".',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, proses',
                    cancelButtonText: 'Batal',
                    reverseButtons: true,
                    focusCancel: true,
                }).then(function(result) {
                    if (!result.isConfirmed) {
                        return;
                    }

                    form.querySelectorAll('input[name="ids[]"]').forEach(i => i.remove());
                    selected.forEach(id => {
                        const input = document.createElement('input');
                        input.type = 'hidden';
                        input.name = 'ids[]';
                        input.value = id;
                        form.appendChild(input);
                    });

                    setLoading(true);
                    Swal.fire({
                        title: 'Memproses...',
                        text: 'Mohon tunggu, jangan tutup halaman ini.',
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        showConfirmButton: false,
                        didOpen: () => Swal.showLoading(),
                    });
                    form.submit();
                });
            });

            // Back/forward cache can restore the page mid-loading; reset it.
            window.addEventListener('pageshow', function(e) {
                if (e.persisted) {
                    setLoading(false);
                    Swal.close();
                }
            });
        })();
    </script>
@endpush
