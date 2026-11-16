@extends('layout.master')

@section('css')
    <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css" />
    <style>
        .bulk-check,
        #bulk-check-all {
            width: 22px;
            height: 22px;
            cursor: pointer;
            vertical-align: middle;
        }
    </style>
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
                        <a href="/jualsampahexport" class="btn btn-success"><i class="fas fa-file-excel"></i>
                            Export Excel</a>
                        {{-- Bulk actions on the checked rows; each only sends the rows its status allows. --}}
                        @foreach ([
                            ['action' => '/accjsbulk', 'method' => null, 'class' => 'btn-warning', 'statuses' => 'belum diproses', 'label' => 'Proses Terpilih', 'kind' => 'proses'],
                            ['action' => '/selesaijsbulk', 'method' => null, 'class' => 'btn-success', 'statuses' => 'sedang diproses', 'label' => 'Selesai Terpilih', 'kind' => 'selesai'],
                            ['action' => '/deletetransaksijsbulk', 'method' => 'DELETE', 'class' => 'btn-danger', 'statuses' => 'belum diproses,sedang diproses', 'label' => 'Hapus Terpilih', 'kind' => 'hapus'],
                        ] as $bulk)
                            <form action="{{ $bulk['action'] }}" method="POST" class="d-inline bulk-form"
                                data-kind="{{ $bulk['kind'] }}" data-statuses="{{ $bulk['statuses'] }}">
                                @csrf
                                @if ($bulk['method'])
                                    @method($bulk['method'])
                                @endif
                                <button type="submit" class="btn {{ $bulk['class'] }}" disabled>
                                    <span class="bulk-spinner spinner-border spinner-border-sm d-none" role="status"
                                        aria-hidden="true"></span>
                                    <span class="bulk-label">{{ $bulk['label'] }} (<span class="bulk-count">0</span>)</span>
                                    <span class="bulk-loading d-none">Memproses...</span>
                                </button>
                            </form>
                        @endforeach
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

        // Bulk Proses / Selesai / Hapus. Selected rows (id => status, total) survive paging and search,
        // because the table redraws via AJAX; each button counts and sends only the rows it applies to.
        (function() {
            const selected = new Map();
            let submitting = false;
            const table = document.getElementById('transaksijs-table');
            const forms = [...document.querySelectorAll('.bulk-form')];
            const rupiah = n => 'Rp ' + n.toLocaleString('id-ID');

            const dialogs = {
                proses: rows => ({
                    title: 'Proses ' + rows.length + ' transaksi?',
                    text: 'Status transaksi yang dipilih akan diubah menjadi "sedang diproses".',
                    icon: 'warning',
                    confirmButtonText: 'Ya, proses',
                }),
                selesai: rows => ({
                    title: 'Selesaikan ' + rows.length + ' transaksi?',
                    html: 'Saldo customer akan ditambahkan sesuai total tiap transaksi.<br>' +
                        'Total saldo yang dikreditkan: <b>' +
                        rupiah(rows.reduce((sum, r) => sum + (parseFloat(r.total) || 0), 0)) + '</b>',
                    icon: 'warning',
                    confirmButtonText: 'Ya, selesai',
                }),
                hapus: rows => ({
                    title: 'Hapus ' + rows.length + ' transaksi?',
                    text: 'Transaksi akan dihapus permanen dan tidak bisa dikembalikan.',
                    icon: 'error',
                    confirmButtonText: 'Ya, hapus',
                    confirmButtonColor: '#d33',
                }),
            };

            function pageChecks() {
                return table.querySelectorAll('tbody .bulk-check');
            }

            function rowsFor(form) {
                const statuses = form.dataset.statuses.split(',');
                return [...selected.entries()]
                    .filter(([, row]) => statuses.includes(row.status))
                    .map(([id, row]) => ({ id, ...row }));
            }

            function sync() {
                const checks = pageChecks();
                checks.forEach(c => c.checked = selected.has(c.value));
                const all = document.getElementById('bulk-check-all');
                if (all) {
                    all.checked = checks.length > 0 && [...checks].every(c => c.checked);
                }
                forms.forEach(form => {
                    const n = rowsFor(form).length;
                    form.querySelector('.bulk-count').textContent = n;
                    form.querySelector('button').disabled = submitting || n === 0;
                });
            }

            function toggle(check, on) {
                on ? selected.set(check.value, { status: check.dataset.status, total: check.dataset.total })
                    : selected.delete(check.value);
            }

            function setLoading(form, on) {
                submitting = on;
                form.querySelector('.bulk-spinner').classList.toggle('d-none', !on);
                form.querySelector('.bulk-loading').classList.toggle('d-none', !on);
                form.querySelector('.bulk-label').classList.toggle('d-none', on);
                table.querySelectorAll('.bulk-check, #bulk-check-all').forEach(c => c.disabled = on);
                sync();
            }

            document.addEventListener('change', function(e) {
                if (e.target.classList.contains('bulk-check')) {
                    toggle(e.target, e.target.checked);
                    sync();
                } else if (e.target.id === 'bulk-check-all') {
                    pageChecks().forEach(c => toggle(c, e.target.checked));
                    sync();
                }
            });

            // Clicking the checkbox should not also toggle DataTables row selection.
            document.addEventListener('click', function(e) {
                if (e.target.matches('.bulk-check, #bulk-check-all')) {
                    e.stopPropagation();
                }
            }, true);

            new MutationObserver(sync).observe(table, { childList: true, subtree: true });

            forms.forEach(form => form.addEventListener('submit', function(e) {
                e.preventDefault();
                const rows = rowsFor(form);
                if (submitting || rows.length === 0) {
                    return;
                }

                Swal.fire({
                    ...dialogs[form.dataset.kind](rows),
                    showCancelButton: true,
                    cancelButtonText: 'Batal',
                    reverseButtons: true,
                    focusCancel: true,
                }).then(function(result) {
                    if (!result.isConfirmed) {
                        return;
                    }

                    form.querySelectorAll('input[name="ids[]"]').forEach(i => i.remove());
                    rows.forEach(row => {
                        const input = document.createElement('input');
                        input.type = 'hidden';
                        input.name = 'ids[]';
                        input.value = row.id;
                        form.appendChild(input);
                    });

                    setLoading(form, true);
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
            }));

            // Back/forward cache can restore the page mid-loading; reset it.
            window.addEventListener('pageshow', function(e) {
                if (e.persisted) {
                    forms.forEach(form => setLoading(form, false));
                    Swal.close();
                }
            });
        })();
    </script>
@endpush
