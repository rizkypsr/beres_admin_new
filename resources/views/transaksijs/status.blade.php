@if ($status == 'selesai')
    <span class="badge badge-success text-uppercase">{{ $status }}</span>
@else
    <span class="badge badge-warning text-uppercase">{{ $status }}</span>
@endif
