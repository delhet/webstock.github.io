@extends('backend.layouts.default')

@section('content')
<div class="d-sm-flex align-items-center justify-content-start mb-4">
    <a href="{{ route('master.store.index') }}" class="btn btn-secondary btn-circle mr-3">
		<i class="fas fa-arrow-left"></i>
	</a>
    <h1 class="h3 mb-0 text-gray-800">Add Store</h1>
</div>

<div class="card shadow">
	<div class="card-body">
			@if(session('failed'))
			<div class="alert alert-danger">{{ session('failed') }}</div>
			@endif
		<form action="{{ route('master.store.store') }}" method="post" enctype="multipart/form-data">
		@csrf

		<div class="form-group">
			<label for="">Kode</label>
			<input  type="text"
					name="kode_store"
					class="form-control @error('kode_store')is-invalid @enderror"
					value="{{old('kode_store')}}">
			@error('kode_store')
			<div class="invalid-feedback">{{$message}}</div>
			@enderror
		</div>
		<div class="form-group">
			<label for="">Nama Toko (Store)</label>
			<input  type="text"
					name="nama_store"
					class="form-control @error('nama_store')is-invalid @enderror"
					value="{{old('nama_store')}}">
			@error('nama_store')
			<div class="invalid-feedback">{{$message}}</div>
			@enderror
		</div>
		<div class="form-group">
			<label for="">Alamat Lengkap</label>
			<input  type="text"
					name="alamat_lengkap"
					class="form-control @error('alamat_lengkap')is-invalid @enderror"
					value="{{old('alamat_lengkap')}}">
			@error('alamat_lengkap')
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
