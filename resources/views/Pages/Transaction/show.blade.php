<table class="table table-bordered">
    <tr>
        <th>Nama</th>
        <td>{{ $item->name }}</td>
    </tr>
    <tr>
        <th>Email</th>
        <td>{{ $item->email }}</td>
    </tr>
    <tr>
        <th>Nomor</th>
        <td>{{ $item->number }}</td>
    </tr>
    <tr>
        <th>Alamat</th>
        <td>{{ $item->address }}</td>
    </tr>
    <tr>
        <th>Total Transaksi</th>
        <td>{{ $item->trans_total }}</td>
    </tr>
    <tr>
        <th>Status</th>
        <td>{{ $item->trans_status }}</td>
    </tr>
    <tr>
        <th>Pembelian Produk</th>
        <td>
            <table class="table table-bordered w-100">
                <tr>
                    <th>Nama</th>
                    <th>Tipe</th>
                    <th>Harga</th>
                </tr>
                @forelse ($item->detail as $detail)
                    <tr>
                        <td>{{ $detail->product->nama }}</td>
                        <td>{{ $detail->product->tipe }}</td>
                        <td>Rp. {{ $detail->product->harga }}</td>
                    </tr>
                @empty
                    
                @endforelse
            </table>
        </td>
    </tr>
</table>

<div class="row">
    <div class="col-4">
        <a href="{{ route('transaction.status', $item->id) }}?status=SUCCESS" class="btn btn-block btn-success">
            <i class="fa fa-check"></i> Success
        </a>
    </div>
    <div class="col-4">
        <a href="{{ route('transaction.status', $item->id) }}?status=PENDING" class="btn btn-block btn-info">
            <i class="fa fa-spinner"></i> Pending
        </a>
    </div>
    <div class="col-4">
        <a href="{{ route('transaction.status', $item->id) }}?status=FAILED" class="btn btn-block btn-warning">
            <i class="fa fa-times"></i> Failed
        </a>
    </div>
</div>