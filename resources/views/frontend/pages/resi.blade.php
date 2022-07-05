@extends('frontend.layout')

@section('content')
<section id="about-us">
	<div class="container">
		<div class="row">
			<div class="col-md-10 offset-md-1">
				<div class="form-group row">
					<div class="col-md-12">
						<form action="{{ route('tracking') }}" method="POST" class="pr-4">
				            @csrf
				            <h5 class="text-center">
				              	<b>Lacak Kiriman</b>
				            </h5>
				            <div class="form-group">
				              	<label for="">Nomor Resi</label>
				              	<input type="text" class="form-control" name="tracking_code" placeholder="Masukkan nomor resi">
				            </div>
				            <div class="form-group">
				              	<button type="submit" class="btn btn-primary">Lacak Kiriman</button>
				            </div>
				         </form>
			         </div>
				</div>
				@if (!$data)
					<div class="col-12 alert alert-danger">Nomor Resi Tidak Ditemukan!</div>
				@else
					<div class="col-12 alert alert-success">Nomor Resi {{ $_GET['tracking_code'] ?? '' }} Ditemukan!</div>
				@endif
				<div class="form-group row">
					<label class="col-md-3"><b>Nomor Resi</b></label>
					<div class="col-md-9">
						{{ $data->tracking_code ?? '' }}
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-3"><b>Nama Customer</b></label>
					<div class="col-md-9">
						{{ $data->customer->name ?? '' }}
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-3"><b>Nama Barang</b></label>
					<div class="col-md-9">
						{{ $data->goods_name ?? '' }}
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-3"><b>Dari</b></label>
					<div class="col-md-9">
						{{ $data->fromArea->name ?? '' }}
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-3"><b>Menuju</b></label>
					<div class="col-md-9">
						{{ $data->toArea->name ?? '' }}
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-3"><b>Ongkos Kirim</b></label>
					<div class="col-md-9">
						{{ $data ? 'Rp. '. $data->pricingCity->price : '' }}
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-3"><b>Total Estimasi Harga</b></label>
					<div class="col-md-9">
						{{ $data ? 'Rp. '. $data->total_est_price : '' }}
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-3"><b>Dikirim Pada</b></label>
					<div class="col-md-9">
						{{ $data->inputed_date ?? '' }}
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-3"><b>Status Pengiriman</b></label>
					<div class="col-md-9">
						{{ $data->order_status ?? '' }}
					</div>
				</div>
			</div>		
		</div>
		<div class="row">
			<div class="col-md-10 offset-md-1">
				<table class="table table-striped">
 				 	<thead>
					    <tr>
					      <th scope="col">#</th>
					      <th scope="col">Tracking Date</th>
					      <th scope="col">Tracking Info</th>
					    </tr>
					</thead>
				 	<tbody>
				 		@if ($data)
				 		@forelse ($data->tracks as $track)
					    <tr>
					      <th scope="row">{{ $loop->iteration }}</th>
					      <td>{{ $track->tracking_date }}</td>
					      <td>{{ $track->tracking_info }}</td>
					    </tr>
					    @empty
					    <tr>
					    	<td colspan="3"></td>
					    </tr>
					    @endforelse
					    @endif
				 	</tbody>
				</table>
			</div>
		</div>
	</div>
</section>
@endsection