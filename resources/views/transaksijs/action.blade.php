{{-- Confirmation is handled by the [data-confirm] handler in transaksijs.blade.php (SweetAlert). --}}
<div class="d-flex justify-content-center gap-3">
    @if (in_array($data->status_js, ['belum diproses', 'sedang diproses']))
        <form action="/deletetransaksijs/{{ $data->id_transaksijs }}" method="post" class="align-self-center"
            data-confirm="Yakin ingin menghapus transaksi ini?" data-confirm-button="Ya, hapus">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
        </form>
    @endif
    @if ($data->status_js == 'belum diproses')
        <a href="/accjs/{{ $data->id_transaksijs }}" class="btn btn-warning align-self-center"
            data-confirm="Proses transaksi ini?" data-confirm-button="Ya, proses">Proses</a>
    @endif
    @if ($data->status_js == 'sedang diproses')
        <form action="/selesaijs/{{ $data->id_transaksijs }}" method="post" class="align-self-center"
            data-confirm="Selesaikan transaksi ini? Saldo customer akan ditambahkan."
            data-confirm-button="Ya, selesai">
            @csrf
            <button type="submit" class="btn btn-success">Selesai</button>
        </form>
    @endif
</div>
