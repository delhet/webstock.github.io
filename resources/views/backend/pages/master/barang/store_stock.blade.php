@extends('backend.layouts.default')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Stock Berdasarkan Toko</h1>
</div>

<div class="card shadow mb-4">
	<div class="card-header py-3">
	</div>
	<div class="card-body">
		<div class="table-responsive">
			@if(session('success'))
				<div class="alert alert-success">{{session('success')}}</div>
			@endif
			@if(session('failed'))
				<div class="alert alert-danger">{{session('failed')}}</div>
			@endif
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>Kode</th>
						<th>Nama </th>
						<th>Jumlah Barang di Toko</th>
						<th>Jumlah Barang di Kirim</th>
						<th>Jumlah Barang di Terima</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>Kode</th>
						<th>Nama </th>
						<th>Jumlah Barang di Toko</th>
						<th>Jumlah Barang di Kirim</th>
						<th>Jumlah Barang di Terima</th>
					</tr>
				</tfoot>
				<tbody>
					@forelse ($items as $item)
					<tr>
						<td>{{ $item->kode_store }}</td>
						<td>{{ $item->nama_store }}</td>
						<td>{{ $item->barang_toko }}</td>
						<td>{{ $item->barang_dikirim }}</td>
						<td>{{ $item->barang_diterima }}</td>
					</tr>
					@empty
					<tr>
						<td colspan="2" align="center">Data empty</td>
					</tr>
					@endforelse
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection
