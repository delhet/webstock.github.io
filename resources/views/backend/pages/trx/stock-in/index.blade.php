@extends('backend.layouts.default')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Barang Masuk (Stock In)</h1>
</div>

<div class="card shadow mb-4">
	<div class="card-header py-3">
		<a href="{{ route('trx.stock-in.create') }}" class="btn btn-success">Tambah Data</a>
		<a href="{{ route('trx.stock-in-akumulasi') }}" class="btn btn-info">Laporan Barang Masuk</a>
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
						<th>No Document</th>
						<th>Tanggal</th>
						<th>Catatan</th>
						<th>Status</th>
						<th align="right" width="18%">Action</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>No Document</th>
						<th>Tanggal</th>
						<th>Catatan</th>
						<th>Status</th>
						<th align="right" width="18%">Action</th>
					</tr>
				</tfoot>
				<tbody>
					@forelse ($items as $item)
					<tr>
						<td>{{ $item->no_document }}</td>
						<td>{{ $item->tanggal_document }}</td>
						<td>{{ $item->catatan }}</td>
						<td>{{ $item->status }}</td>

						<td align="right">
							@if ($item->status == 'New')
							<a href="{{ route('trx.stock-in.show',$item->id) }}"
								class="btn btn-success btn-sm"
								data-toggle="tooltip"
								data-placement="bottom"
								title="Detail"
								>Isi Detail Barang
							</a>
							@else
							<a href="{{ route('trx.stock-in-download-pdf',$item->id) }}"
								class="btn btn-info btn-sm"
								data-toggle="tooltip"
								data-placement="bottom"
								title="Detail"
								>Download Invoice
							</a>
							@endif
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
@endsection
