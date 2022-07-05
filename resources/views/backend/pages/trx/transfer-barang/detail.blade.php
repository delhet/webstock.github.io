@extends('backend.layouts.default')

@section('after-style')
<style type="text/css">
	.select2-container {
		width: 100% !important;
	}
</style>
@endsection

@section('content')
<div class="d-sm-flex align-items-center justify-content-start mb-4">
	<a href="{{ route('trx.transfer-barang.index') }}" class="btn btn-secondary btn-circle mr-3">
		<i class="fas fa-arrow-left"></i>
	</a>
    <h1 class="h3 mb-0 text-gray-800"><b>Transfer Barang (Stock Out) Detail</b></h1>
</div>

<div class="card shadow">
	<div class="card-body">
		@if(session('failed'))
			<div class="alert alert-danger">{{ session('failed') }}</div>
		@endif
		<form action="" method="post" enctype="multipart/form-data">

		<div class="row">
			<input type="hidden" name="id_karyawan" value="{{ auth()->user()->id }}">
		</div>
		<div class="row">
			<div class="form-group col-md-6">
				<label for="">No Document</label>
				<input  type="text"
						name="no_document"
						class="form-control @error('no_document')is-invalid @enderror"
						value="{{ $item->no_document }}" readonly
						placeholder="Auto Generate">
				@error('no_document')
				<div class="invalid-feedback">{{$message}}</div>
				@enderror
			</div>
			<div class="form-group col-md-6">
				<label for="">Tanggal</label>
				<input type="date"
						name="tanggal_document"
						class="form-control @error('tanggal_document')is-invalid @enderror"
						value="{{ $item->tanggal_document }}" readonly>
				@error('tanggal_document')
				<div class="invalid-feedback">{{$message}}</div>
				@enderror
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-6">
				<label for="">Dari Toko</label>
                <select name="dari_store_id" id=""
                            class="form-control select2 @error('dari_store_id')is-invalid @enderror" disabled>
                    @foreach ($store_list as $str)
                        <option value="{{ $str->id }}"
                        @if(old('dari_store_id'))
                            {{ 'selected' }}
                        @elseif($item->dari_store_id== $str->id)
                            {{ 'selected' }}
                        @endif>
                        {{ $str->nama_store}}
                        </option>
                    @endforeach
                </select>
                @error('dari_store_id')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
			<div class="form-group col-md-6">
				<label for="">Tujuan Toko</label>
                <select name="tujuan_store_id" id=""
                            class="form-control select2 @error('tujuan_store_id')is-invalid @enderror" disabled>
                    @foreach ($store_list as $str)
					    <option value="{{ $str->id }}"
                        @if(old('tujuan_store_id'))
                            {{ 'selected' }}
                        @elseif($item->tujuan_store_id == $str->id)
                            {{ 'selected' }}
                        @endif>
                        {{ $str->nama_store}}
                        </option>
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
					class="form-control @error('catatan')is-invalid @enderror" readonly>{{ $item->catatan}}</textarea>
                @error('catatan')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
        </div>
		</form>

	</div>
</div>

<div class="d-sm-flex align-items-center justify-content-start mb-4 mt-3">
    <h5 class="h5 mb-0 text-gray-800"><b>Daftar Barang</b> : </h5>
</div>

<div class="card shadow mb-4">
	<div class="card-header py-3">
		<a href="#" data-toggle="modal" data-target="#modalAddProfessionalTeam" class="btn btn-success">+ Add</a>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			@if(session('success'))
				<div class="alert alert-success">Data<b>{{ session('name') }}</b> {{session('success')}}</div>
			@endif
			@if(session('failed'))
				<div class="alert alert-danger">{{session('failed')}}</div>
			@endif
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>Barang</th>
						<th>Nama</th>
						<th>Harga Jual</th>
						<th>Harga Beli</th>
						<th>Jumlah</th>
						<th align="right" width="15%">Action</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>Barang</th>
						<th>Nama</th>
						<th>Harga Jual</th>
						<th>Harga Beli</th>
						<th>Jumlah</th>
						<th align="right" width="15%">Action</th>
					</tr>
				</tfoot>
				<tbody>
					@forelse ($item_list_barang as $detail)
					<tr>
						<td data-id="{{ $detail->id_barang }}">{{ $detail->id_barang }}</td>
						<td>{{ $detail->nama_barang }}</td>
						<td>{{ $detail->harga_jual }}</td>
						<td>{{ $detail->harga_beli }}</td>
						<td>{{ $detail->jumlah }}</td>
						<td align="right">

							<form action="{{ route('trx.transfer-barang-detail.destroy', $detail->id) }}" method="post" class="d-inline">
							@csrf
							@method('DELETE')
								<button type="submit"
										class="btn btn-danger btn-sm delete"
										data-toggle="tooltip"
										data-placement="bottom"
										title="Delete">
									<i class="fas fa-trash"></i>
								</button>
							</form>
						</td>
					</tr>
					@empty
					<tr>
						<td colspan="4" align="center">Data empty</td>
					</tr>
					@endforelse
				</tbody>
			</table>
		</div>
	</div>
</div>

<div class="modal fade" id="modalAddProfessionalTeam" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Add Team</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="{{ route('trx.transfer-barang-detail.store') }}" method="POST" enctype="multipart/form-data">
			@csrf
			@method('POST')

			<div class="modal-body">
				<div class="row">
					<div class="form-group col-md-6">
						<input type="hidden" name="transfer_barang_id" value="{{ $item->id }}">
						<label for="">Barang</label>
						<select name="id_barang"
								class="custom-select select2 @error('id_barang')is-invalid @enderror"
								required>
							<option value="">-- Pilih Barang --</option>
							@forelse ($list_barang as $data_row)
                            <option value="{{ $data_row->id }}"
                                @if (old('id_barang') == $data_row->id)
                                    {{ 'selected' }}
                                @elseif (empty(old('id_barang')) && old('id_barang') == $data_row->id)
                                    {{ 'selected' }}
                                @endif>{{ $data_row->nama_barang }}</option>
							@empty
								<option value="">Barang Empty</option>
							@endforelse
						</select>
						@error('id_barang')
							<div class="invalid-feedback">{{ $message }}</div>
						@enderror
					</div>

					<div class="form-group col-md-6">
						<label for="">Quantity Jumlah</label>
						<input  type="number"
								name="jumlah"
								class="form-control @error('jumlah')is-invalid @enderror"
								value="{{ old('jumlah') }}"
								required>
						@error('jumlah')
							<div class="invalid-feedback">{{ $message }}</div>
						@enderror
					</div>
				</div>
			</div>
			<div class="modal-footer d-flex justify-content-center">
				{{-- <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cancelEmp">Cancel</button> --}}
				<button type="submit" class="btn btn-primary" id="selectEmp">Add</button>
			</div>
			</form>
		</div>
	</div>
</div>

@endsection

@section('after-script')
<script>
	@if ($errors->any())
		@if (old('_method') == 'POST')
			$('#modalAddProfessionalTeam').modal('show');
		@elseif (old('_method') == 'PUT')
			$('#modalEditProfessionalTeam').modal('show');
		@endif
	@endif
	$('#dataTable tbody').on('click', '#btnEdit', function() {
		console.log($(this).attr('data-route'))
		let route = $(this).attr('data-route')
		let row = $(this).closest('tr')
		let rowDataId = row.find("td:eq(0)").data('id')
		let jumlah = row.find("td:eq(1)").text()

		$('#formEdit').attr('action', route)
		// $(`select[name='professional_team_id']`).select2().val(teamId).trigger('change.select2')
		// $(`select[name='professional_team_id'] option[value='${teamId}']`).attr('selected', 'selected')
		$(`input[name='route']`).val(route)
		$(`input[name='jumlah']`).val(jumlah)
		$(`input[name='id_barang']`).val(rowDataId)
		console.log($(`select[name='id_barang'] option[value='${rowDataId}']`))
	})
</script>
@endsection
