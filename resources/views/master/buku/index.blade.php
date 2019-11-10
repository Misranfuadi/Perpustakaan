@extends('template/layout')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
            @if ($message = Session::get('flsh_massage'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
            @endif
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Buku</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                        <li class="breadcrumb-item">Master</li>
                        <li class="breadcrumb-item active">Buku</li>
					</ol>
                </div>
			</div>
		</div>
	</div>
    <!-- /.content-header -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="m-0">Data Buku</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="buku_table" class="table table-bordered table-hover w-100">
                                    <thead class="bg-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>ISBN</th>
                                        <th>Judul</th>
                                        <th>Penulis</th>
                                        <th>Penerbit</th>
                                        {{-- <th>Jumlah unit</th> --}}
                                        <th><button type="button" name="create_record" id="create_record" class="btn btn-primary btn-sm">Tambah</button></th>
                                    </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- modal --}}
@include('master/buku/form')
@endsection
{{-- script --}}
@push('script')
<script src="{{ asset('js/buku.js') }}"></script>
@endpush
