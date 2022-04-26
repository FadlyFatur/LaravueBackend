@extends('Layouts.default')

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Update Galeri</strong><br>
        </div>
        <div class="card-body card-block">
            <form action="{{ route('galeri.update', $item->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nama" class="form-control-label">Nama Barang</label>
                    <input type="text" name="nama" value="{{ old('nama') ? old('nama') : $item->nama }}" class="form-control @error('nama') is-invalid @enderror">
                    @error('nama')
                        <div class="text-muted">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tipe" class="form-control-label">Tipe Barang</label>
                    <input type="text" name="tipe" value="{{ old('tipe') ? old('tipe') : $item->tipe }}" class="form-control @error('tipe') is-invalid @enderror">
                    @error('tipe')
                        <div class="text-muted">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="deskripsi" class="form-control-label">Deskripsi Barang</label>
                    <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" class="form-control ckeditor @error('deskripsi') is-invalid @enderror">{{ old('deskripsi') ? old('deskripsi') : $item->deskripsi }}</textarea>
                    @error('deskripsi')
                        <div class="text-muted">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="harga" class="form-control-label">Harga</label>
                    <input type="number" name="harga" value="{{ old('harga') ? old('harga') : $item->harga }}" class="form-control @error('harga') is-invalid @enderror">
                    @error('harga')
                        <div class="text-muted">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="qty" class="form-control-label">Kuantitas</label>
                    <input type="number" name="qty" value="{{ old('qty') ? old('qty') : $item->qty }}" class="form-control @error('qty') is-invalid @enderror">
                    @error('qty')
                        <div class="text-muted">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
@endsection