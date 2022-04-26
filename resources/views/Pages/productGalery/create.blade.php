@extends('Layouts.default')

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Tambah Foto Barang</strong>
        </div>
        <div class="card-body card-block">
            <form action="{{ route('galeri.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for=""></label>
                    <select name="product_id" id="product_id" class="form-control @error('product_id') is-invalid @enderror">
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}">{{ $product->nama }}</option>
                    @endforeach
                    </select>
                    @error('product_id')
                        <div class="text-muted">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="foto" class="form-control-label">Foto Barang</label>
                    <input type="file" name="foto" value="{{ old('foto') }}" class="form-control @error('foto') is-invalid @enderror" accept="image/*" required>
                    @error('foto')
                        <div class="text-muted">{{ $message }}</div>
                    @enderror
                </div>  
                <div class="form-group">
                    <label for="is_default" class="form-control-label">Foto Default</label>
                    <div class="form-check">
                        <input class="form-check-input @error('is_default') is-invalid @enderror" type="radio" name="is_default" id="is_default" value="1">
                        <label class="form-check-label" for="is_default">
                          ya
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input @error('is_default') is-invalid @enderror" type="radio" name="is_default" id="is_default" value="0">
                        <label class="form-check-label" for="is_default">
                          tidak
                        </label>
                    </div>
                    @error('is_default')
                        <div class="text-muted">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection