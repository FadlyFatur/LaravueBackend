@extends('Layouts.default')

@section('content')
    <div class="orders">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Daftar Transaksi Masuk</strong>
                        @error('status')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Nomor</th>
                                    <th scope="col">Total Transaksi</th>
                                    <th scope="col">Status</th>
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
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->address }}</td>
                                    <td>{{ $item->number }}</td>
                                    <td>Rp. {{ $item->trans_total }}</td>
                                    <td>
                                        @if ($item->trans_status == 'PENDING')
                                            <span class="badge badge-info">
                                        @elseif ($item->trans_status == 'SUCCESS')
                                            <span class="badge badge-success">
                                        @elseif ($item->trans_status == 'FAILED')
                                            <span class="badge badge-danger">
                                        @else 
                                            <span>
                                        @endif
                                        {{ $item->trans_status }}</span>
                                    </td>
                                    <td> 
                                        @if ($item->trans_status == 'PENDING')
                                            <a href="{{ route('transaction.status', $item->id) }}?status=SUCCESS" class="btn btn-info btn-sm">
                                                <i class="fa fa-check"></i>
                                            </a>
                                            <a href="{{ route('transaction.status', $item->id) }}?status=FAILED" class="btn btn-warning btn-sm">
                                                <i class="fa fa-times"></i>
                                            </a>
                                        @endif
                                        <a href="#mymodal"
                                            data-remote="{{ route('transaction.show', $item->id) }}"
                                            data-toggle="modal"
                                            data-target="#mymodal"
                                            data-title="Detail Transaksi {{ $item->trans_id }}"
                                            class="btn btn-info btn-sm"><i class="fa fa-eye"></i>
                                        </a>
                                        <a href="{{ route('transaction.edit', $item->id ) }}" class="btn btn-info btn-sm">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <form action="{{ route('transaction.destroy', $item->id) }}" method="post" class="d-inline">
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