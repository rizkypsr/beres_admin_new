<div class="d-flex justify-content-center gap-3">
    @if ($data->status_js == 'belum diproses')
        <form action="/deletetransaksijs/{{ $data->id_transaksijs }}" method="post" class="align-self-center">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"
                    onclick="return confirm('yakin ingin menghapus data ?')"></i>
            </button>
        </form>
        <a href="/accjs/{{ $data->id_transaksijs }}" class="btn btn-warning align-self-center "
            onclick="return confirm('yakin ingin lanjut ?')"></i> Proses</a>
    @endif
    @if ($data->status_js == 'sedang diproses')
        <form action="/deletetransaksijs/{{ $data->id_transaksijs }}" method="post" class="align-self-center">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"
                    onclick="return confirm('yakin ingin menghapus data ?')"></i>
            </button>
        </form>
        <a href="/selesaijs/{{ $data->id_transaksijs }}" class="btn btn-success align-self-center"
            onclick="return confirm('yakin ingin selesai ?')"></i> Selesai </a>
    @endif
</div>
