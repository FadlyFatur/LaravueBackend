@extends('Layouts.default')

@section('content')
    <div class="orders">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Daftar Foto barang <small>{{ $product->nama }}</small></strong>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Barang</th>
                                    <th scope="col">Foto</th>
                                    <th scope="col">Default</th>
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
                                    <td>{{ $item->product->nama }}</td>
                                    <td>
                                        <img src="{{ url($item->foto) }}" alt="foto" style="width: 100px;">
                                    </td>
                                    <td>{{ $item->is_default ? 'Ya' : 'Tidak'}}</td>
                                    <td> 
                                        <form action="{{ route('galeri.destroy', $item->id) }}" method="post" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                    <td colspan="6">Data tidak tersedia</td>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection