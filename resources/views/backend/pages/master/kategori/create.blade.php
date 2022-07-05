@extends('backend.layouts.default')

@section('content')
<div class="d-sm-flex align-items-center justify-content-start mb-4">
    <a href="{{ route('master.kategori.index') }}" class="btn btn-secondary btn-circle mr-3">
		<i class="fas fa-arrow-left"></i>
	</a>
    <h1 class="h3 mb-0 text-gray-800">Add Kategori</h1>
</div>

<div class="card shadow">
	<div class="card-body">
			@if(session('failed'))
			<div class="alert alert-danger">{{ session('failed') }}</div>
			@endif
		<form action="{{ route('master.kategori.store') }}" method="post" enctype="multipart/form-data">
		@csrf

		<div class="form-group">
			<label for="">Kode</label>
			<input  type="text"
					name="kode_kategori"
					class="form-control @error('kode_kategori')is-invalid @enderror"
					value="{{old('kode_kategori')}}">
			@error('kode_kategori')
			<div class="invalid-feedback">{{$message}}</div>
			@enderror
		</div>
		<div class="form-group">
			<label for="">Kategori Barang</label>
			<input  type="text"
					name="kategori_barang"
					class="form-control @error('kategori_barang')is-invalid @enderror"
					value="{{old('kategori_barang')}}">
			@error('kategori_barang')
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
