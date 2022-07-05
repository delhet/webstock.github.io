@extends('backend.layouts.default')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Karyawan Data</h1>
</div>

<div class="card shadow mb-4">
	<div class="card-header py-3">
		<a href="{{ route('master.karyawan.create') }}" class="btn btn-success">Tambah Data</a>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			@if(session('success'))
				<div class="alert alert-success">Karyawan Data <b>{{session('name')}}</b> {{session('success')}}</div>
			@endif
			@if(session('failed'))
				<div class="alert alert-danger">{{session('failed')}}</div>
			@endif
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>Nama Lengkap</th>
						<th>Tanggal Lahir</th>
						<th>Email</th>
						<th>Posisi</th>
						<th>Untuk Toko</th>
						<th align="right" width="15%">Action</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>Nama Lengkap</th>
						<th>Tanggal Lahir</th>
						<th>Email</th>
						<th>Posisi</th>
						<th>Untuk Toko</th>
						<th align="right">Action</th>
					</tr>
				</tfoot>
				<tbody>
					@forelse ($items as $item)
					<tr>
						<td>{{ $item->nama_lengkap }}</td>
						<td>{{ $item->tanggal_lahir }}</td>
						<td>{{ $item->email }}</td>
						<td>{{ $item->posisi }}</td>
						<td>{{ $item->nama_store }}</td>
						<td align="right">
							<a href="{{ route('master.karyawan.edit',$item->id) }}"
								class="btn btn-warning btn-sm"
								data-toggle="tooltip"
								data-placement="bottom"
								title="Edit"><i class="fas fa-pen"></i></a>
							<form action="{{ route('master.karyawan.destroy', $item->id) }}" method="post" class="d-inline">
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
@endsection
