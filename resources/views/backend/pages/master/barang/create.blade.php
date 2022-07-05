@extends('backend.layouts.default')

@section('content')
<div class="d-sm-flex align-items-center justify-content-start mb-4">
    <a href="{{ route('master.barang.index') }}" class="btn btn-secondary btn-circle mr-3">
		<i class="fas fa-arrow-left"></i>
	</a>
    <h1 class="h3 mb-0 text-gray-800">Add Barang</h1>
</div>

<div class="card shadow">
	<div class="card-body">
			@if(session('failed'))
			<div class="alert alert-danger">{{ session('failed') }}</div>
			@endif
		<form action="{{ route('master.barang.store') }}" method="post" enctype="multipart/form-data">
		@csrf

		<div class="form-group">
			<label for="">Kode</label>
			<input  type="text"
					name="kode_barang"
					class="form-control @error('kode_barang')is-invalid @enderror"
					value="{{old('nama_barang')}}">
			@error('kode_barang')
			<div class="invalid-feedback">{{$message}}</div>
			@enderror
		</div>
		<div class="form-group">
			<label for="">Nama Barang</label>
			<input  type="text"
					name="nama_barang"
					class="form-control @error('nama_barang')is-invalid @enderror"
					value="{{old('nama_barang')}}">
			@error('nama_barang')
			<div class="invalid-feedback">{{$message}}</div>
			@enderror
		</div>
		<div class="form-group">
			<label for="">Kategori</label>
			<select name="id_kategori" id=""
                        class="form-control select2 @error('id_kategori')is-invalid @enderror">
				<option value="">-- Pilih Kategori --</option>
				@foreach ($kategori_list as $kat)
					<option value="{{ $kat->id }}">{{ $kat->kategori_barang }}</option>
				@endforeach
			</select>
			@error('id_kategori')
			<div class="invalid-feedback">{{$message}}</div>
			@enderror
		</div>
		<div class="form-group">
			<label for="">Stock</label>
			<input  type="number"
					name="stock"
					class="form-control @error('stock')is-invalid @enderror"
					value="{{old('stock')}}">
			@error('stock')
			<div class="invalid-feedback">{{$message}}</div>
			@enderror
		</div>
		<div class="form-group">
			<label for="">Unit Satuan</label>
			<select name="unit_satuan" id=""
                        class="form-control select2 @error('unit_satuan')is-invalid @enderror">
				<option value="">-- Pilih Satuan --</option>
				<option value="Unit">Unit</option>
				<option value="Pcs">Pcs</option>
				<option value="Pack">Pack</option>
			</select>
			@error('unit_satuan')
			<div class="invalid-feedback">{{$message}}</div>
			@enderror
		</div>
		<div class="form-group">
			<label for="">Harga Jual</label>
			<input  type="number"
					name="harga_jual"
					class="form-control @error('harga_jual')is-invalid @enderror"
					value="{{old('harga_jual')}}">
			@error('harga_jual')
			<div class="invalid-feedback">{{$message}}</div>
			@enderror
		</div>
		<div class="form-group">
			<label for="">Harga Beli</label>
			<input  type="number"
					name="harga_beli"
					class="form-control @error('harga_beli')is-invalid @enderror"
					value="{{old('harga_beli')}}">
			@error('harga_jual')
			<div class="invalid-feedback">{{$message}}</div>
			@enderror
		</div>
        <div class="form-group">
            <label for="">Untuk Toko</label>
            <select name="for_store_id" id=""
                        class="form-control select2 @error('for_store_id')is-invalid @enderror">
                <option value="">-- Pilih Toko --</option>
                @foreach ($store_list as $str)
                    <option value="{{ $str->id }}">{{ $str->nama_store }}</option>
                @endforeach
            </select>
            @error('for_store_id')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>

		<div class="text-center mt-3">
			<button type="submit" class="btn btn-primary col-12">Add</button>
		</div>
		</form>
	</div>
</div>
@endsection
