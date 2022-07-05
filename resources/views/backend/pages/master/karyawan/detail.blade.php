@extends('backend.layouts.default')

@section('content')
<div class="d-sm-flex align-items-center justify-content-start mb-4">
	<a href="{{ route('master.karyawan.index') }}" class="btn btn-secondary btn-circle mr-3">
		<i class="fas fa-arrow-left"></i>
	</a>
    <h1 class="h3 mb-0 text-gray-800"><b>Detail Karyawan Data</b> : {{ $item->full_name }}</h1>
</div>

<div class="card shadow">
	<div class="card-body">
		@if(session('failed'))
			<div class="alert alert-danger">{{ session('failed') }}</div>
		@endif
		<form action="" method="post" enctype="multipart/form-data">
		<div class="row">
			<div class="form-group col-md-6">
				<label for="">Nama</label>
				<input  type="text" 
						name="full_name" 
						class="form-control @error('full_name')is-invalid @enderror" 
						value="{{ $item->full_name }}"
						disabled>
			</div>
		</div>

		<div class="row">
			<div class="form-group col-md-6">
				<label for="">Gender</label>
				<input  type="text" 
						name="gender" 
						class="form-control" 
						value="{{ $item->gender == 'L' ? 'Male' : 'Female' }}"
						disabled>
			</div>
			<div class="form-group col-md-6">
				<label for="">Birth Date</label>
				<input  type="text" 
						name="birth_date" 
						class="form-control" 
						value="{{ date('d F Y',strtotime($item->birth_date)) }}"
						disabled>
			</div>
		</div>

		<div class="row">
			<div class="form-group col-md-6">
				<label for="">Email</label>
				<input  type="email" 
						name="email" 
						class="form-control" 
						value="{{ $item->email }}"
						disabled>
			</div>
			<div class="form-group col-md-6">
				<label for="">Phone Number</label>
				<input  type="text" 
						name="phone" 
						class="form-control" 
						value="{{ $item->phone}}"
						disabled>
			</div>
		</div>
		
		<div class="form-group">
			<label for="">Address</label>
			<textarea name="address" id="" 
					cols="30" 
					rows="3"
					class="form-control"
					disabled>{{ $item->address }}</textarea>
		</div>
		
		<div class="row">
			<div class="form-group col-md-6">
				<label for="">Posisi</label>
				<input  type="text" 
						name="posisi" 
						class="form-control" 
						value="{{ $item->posisi }}"
						disabled>
			</div>
			<div class="form-group col-md-6">
				<label for="">Posisi</label>
				<input  type="text" 
						name="divisi" 
						class="form-control" 
						value="{{ $item->divisi }}"
						disabled>
			</div>
		</div>
		</form>
	</div>
</div>
@endsection