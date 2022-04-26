@extends('Layouts.default')

@section('content')
    <div class="orders">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Daftar Produk</strong>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Tipe</th>
                                    <th scope="col">Harga (Rp)</th>
                                    <th scope="col">Kuantitas</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 0;
                                @endphp
                                @forelse ($items as $item)
                                <tr>
                                    @php
                                        $no++
                                    @endphp
                                    <td>{{ $no }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->tipe }}</td>
                                    <td>{{ $item->harga }}</td>
                                    <td>{{ $item->qty }}</td>
                                    <td> 
                                        <a href="{{ route('product.galery', $item->id) }}" class="btn btn-info btn-sm">
                                            <i class="fa fa-picture-o"></i>
                                        </a>
                                        <a href="{{ route('product.edit', $item->id ) }}" class="btn btn-primary btn-sm">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <form action="{{ route('product.destroy', $item->id) }}" method="post" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                    <tr colspan="6">Data tidak tersedia</tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection