@extends('backend.layouts.default')

@section('content')
<div class="d-sm-flex align-items-center justify-content-start mb-4">
	<a href="{{ route('trx.transfer-barang.index') }}" class="btn btn-secondary btn-circle mr-3">
		<i class="fas fa-arrow-left"></i>
	</a>
    <h1 class="h3 mb-0 text-gray-800"><b>Add Transfer Barang (Stock Out) Data</b></h1>
</div>

<div class="card shadow">
	<div class="card-body">
			@if(session('failed'))
			<div class="alert alert-danger">{{ session('failed') }}</div>
			@endif
		<form action="{{ route('trx.transfer-barang.store') }}" method="post" enctype="multipart/form-data">
		@csrf

		<div class="row">
			<input type="hidden" name="id_karyawan" value="{{ auth()->user()->id }}">
		</div>
		<div class="row">
			<div class="form-group col-md-6">
				<label for="">No Document</label>
				<input  type="text"
						name="no_document"
						class="form-control @error('no_document')is-invalid @enderror"
						value="{{ old('no_document') }}" readonly
						placeholder="Auto Generate">
				@error('no_document')
				<div class="invalid-feedback">{{$message}}</div>
				@enderror
			</div>
			<div class="form-group col-md-6">
				<label for="">Tanggal</label>
				<input type="datetime-local"
						name="tanggal_document"
						class="form-control @error('tanggal_document')is-invalid @enderror"
						value="{{ old('tanggal_document')  }}" >
				@error('tanggal_document')
				<div class="invalid-feedback">{{$message}}</div>
				@enderror
			</div>
		</div>

		<div class="row">
			<div class="form-group col-md-6">
				<label for="">Dari Toko</label>
                <select name="dari_store_id" id=""
                            class="form-control select2 @error('dari_store_id')is-invalid @enderror">
                    <option value="">-- Pilih Toko --</option>
                    @foreach ($store_list as $str)
                        <option value="{{ $str->id }}">{{ $str->nama_store }}</option>
                    @endforeach
                </select>
                @error('dari_store_id')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
			<div class="form-group col-md-6">
				<label for="">Tujuan Toko</label>
                <select name="tujuan_store_id" id=""
                            class="form-control select2 @error('tujuan_store_id')is-invalid @enderror">
                    <option value="">-- Pilih Toko --</option>
                    @foreach ($store_list as $str)
                        <option value="{{ $str->id }}">{{ $str->nama_store }}</option>
                    @endforeach
                </select>
                @error('tujuan_store_id')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
		</div>
        <div class="row">
            <div class="form-group col-md-6">
                <label for="">Catatan</label>
				<textarea name="catatan" id=""
					cols="30"
					rows="3"
					class="form-control @error('catatan')is-invalid @enderror">{{old('catatan')}}</textarea>
                @error('catatan')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
        </div>


		<div class="text-center mt-3">
			<button type="submit" class="btn btn-primary col-12">Lanjut Pilih Barang > </button>
		</div>
		</form>
	</div>
</div>
@endsection
