@extends('backend.layouts.default')

@section('content')
<div class="d-sm-flex align-items-center justify-content-start mb-4">
	<a href="{{ route('master.karyawan.index') }}" class="btn btn-secondary btn-circle mr-3">
		<i class="fas fa-arrow-left"></i>
	</a>
    <h1 class="h3 mb-0 text-gray-800"><b>Edit Karyawan Data</b> : {{ $item->nama_lengkap }}</h1>
</div>

<div class="card shadow">
	<div class="card-body">
			@if(session('failed'))
			<div class="alert alert-danger">{{ session('failed') }}</div>
			@endif
		<form action="{{ route('master.karyawan.update', $item->id) }}" method="post" enctype="multipart/form-data">
		@csrf
		@method('PUT')
		<div class="row">
			<div class="form-group col-md-6">
				<label for="">Nama</label>
				<input  type="text"
						name="nama_lengkap"
						class="form-control @error('nama_lengkap')is-invalid @enderror"
						value="{{ old('nama_lengkap') ?? $item->nama_lengkap }}">
				@error('nama_lengkap')
				<div class="invalid-feedback">{{$message}}</div>
				@enderror
			</div>
			<div class="form-group col-md-6">
				<label for="">Jenis Kelamin</label>
				<select name="jenis_kelamin" id=""
						class="form-control custom-select @error('jenis_kelamin')is-invalid @enderror">
					<option value="">-- Pilih Jenis Kelamin --</option>
					<option value="L" @if (old('jenis_kelamin') ?? $item->jenis_kelamin == 'L') {{ 'selected' }} @endif>Laki-laki</option>
					<option value="P" @if (old('jenis_kelamin') ?? $item->jenis_kelamin == 'P') {{ 'selected' }} @endif>Perempuan</option>
				</select>
				@error('jenis_kelamin')
				<div class="invalid-feedback">{{$message}}</div>
				@enderror
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-6">
				<label for="">Tanggal Lahir</label>
				<input  type="date"
						name="tanggal_lahir"
						class="form-control @error('tanggal_lahir')is-invalid @enderror"
						value="{{ old('tanggal_lahir') ?? $item->tanggal_lahir }}">
				@error('tanggal_lahir')
				<div class="invalid-feedback">{{$message}}</div>
				@enderror
			</div>
			<div class="form-group col-md-6">
				<label for="">No Telp</label>
				<input  type="text"
						name="telp"
						class="form-control @error('telp')is-invalid @enderror"
						value="{{ old('telp') ?? $item->telp}}">
				@error('telp')
				<div class="invalid-feedback">{{$message}}</div>
				@enderror
			</div>
		</div>

		<div class="row">
			<div class="form-group col-md-6">
				<label for="">Email</label>
				<input  type="email"
						name="email"
						class="form-control @error('email')is-invalid @enderror"
						value="{{ old('email') ?? $item->email }}">
				@error('email')
				<div class="invalid-feedback">{{$message}}</div>
				@enderror
			</div>
			<div class="form-group col-md-6">
				<label for="">Password</label>
				<input  type="password"
						name="password"
						class="form-control @error('password')is-invalid @enderror"
						value="{{ old('password')}}">
				@error('password')
				<div class="invalid-feedback">{{$message}}</div>
				@enderror
			</div>
		</div>

		<div class="form-group">
			<label for="">Akses</label>
			<select name="posisi" id=""
					class="form-control custom-select @error('posisi')is-invalid @enderror">
				<option value="Admin" @if (old('posisi') ?? $item->posisi == 'Admin') {{ 'selected' }} @endif>Admin</option>
				<option value="Karyawan" @if (old('posisi') ?? $item->posisi == 'Karyawan') {{ 'selected' }} @endif>Karyawan</option>
			</select>
			@error('posisi')
			<div class="invalid-feedback">{{$message}}</div>
			@enderror
		</div>
		<div class="form-group">
			<label for="">Alamat</label>
			<textarea name="alamat" id=""
					cols="30"
					rows="3"
					class="form-control @error('alamat')is-invalid @enderror">{{old('alamat') ?? $item->alamat}}</textarea>
			@error('alamat')
			<div class="invalid-feedback">{{$message}}</div>
			@enderror
		</div>

        <div class="form-group">
            <label for="">Untuk Toko</label>
            <select name="for_store_id" id=""
                        class="form-control select2 @error('for_store_id')is-invalid @enderror" disabled>
                @foreach ($store_list as $str)
                    <option value="{{ $str->id }}"
                    @if(old('for_store_id'))
                        {{ 'selected' }}
                    @elseif($item->for_store_id == $str->id)
                        {{ 'selected' }}
                    @endif>
                    {{ $str->nama_store}}
                    </option>
                @endforeach
            </select>
            @error('for_store_id')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>


		<div class="text-center mt-3">
			<button type="submit" class="btn btn-primary col-12">Save</button>
		</div>
		</form>
	</div>
</div>
@endsection
