<div class="d-flex justify-content-center gap-3">
    <button class="btn btn-secondary align-self-center" data-bs-toggle="modal"
        data-bs-target="#qrcodecustomer-{{ $customer->id_customer }}">
        <i class="fa fa-code"></i>
        <h6>QrQode</h6>
    </button>
    <button class="btn btn-success align-self-center" data-bs-toggle="modal"
        data-bs-target="#updatecustomer-{{ $customer->id_customer }}">
        <i class="fas fa-edit"></i>
        <h6>Update</h6>
    </button>
    <form action="/deletecustomer/{{ $customer->id_customer }}" method="post" class="align-self-center">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('yakin ingin menghapus data ?')">
            <i class="fas fa-trash-alt"></i>
            <h6>Hapus</h6>
        </button>
    </form>
    <button class="btn btn-info align-self-center" data-bs-toggle="modal"
        data-bs-target="#topupcustomer-{{ $customer->id_customer }}">
        <i class="fas fa-edit"></i>
        <h6>TopUp</h6>
    </button>
</div>


@include('customer.qrcodecustomer')
@include('customer.updatecustomer')
@include('customer.topupcustomer')
