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
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="m-0">Data Buku</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="buku_table" class="table table-bordered table-hover">
                                    <thead class="bg-dark">
                                    <tr>
                                        <th>ISBN</th>
                                        <th>Judul</th>
                                        <th>Penulis</th>
                                        <th>Penerbit</th>
                                        {{-- <th>Jumlah unit</th> --}}
                                        <th><button type="button" name="create_record" id="create_record" class="btn btn-primary btn-sm">Tambah</button></th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- modal --}}
        <div id="formModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-dark">
                        <h5 class="modal-title">Buku Baru</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    {!! Form::open (['id'=>'buku_form','class'=>'form-horizontal']) !!}
                    <div class="modal-body">
                        <span id="form_result"></span>
                        <div class="form-group">
                            {!! Form::label("isbn","ISBN") !!}
                            {!! Form::text("isbn",null,['class'=>'form-control','placeholder'=>'ISBN'.($errors->has('isbn')?" is-invalid":"")]) !!}
                            <span id="error-isbn" class="invalid-feedback"></span>
                        </div>
                        <div class="form-group">
                            {!! Form::label("judul","Judul") !!}
                            {!! Form::text("judul",null,['class'=>'form-control','placeholder'=>'Judul'.($errors->has('judul')?" is-invalid":"")]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label("penulis","Penulis") !!}
                            {!! Form::text("penulis",null,['class'=>'form-control','placeholder'=>'Penulis'.($errors->has('penulis')?" is-invalid":"")]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label("penerbit","Penerbit") !!}
                            {!! Form::text("penerbit",null,['class'=>'form-control','placeholder'=>'Penerbit'.($errors->has('penerbit')?" is-invalid":"")]) !!}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="action" id="action" />
                        <input type="hidden" name="id" id="id" />
                        <input type="submit" name="action_button" id="action_button" class="btn btn-warning" value="Add" />
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

        <div id="confirmModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-danger">
                        <h5 class="modal-title">Konfirmasi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h6>Are you sure you want to remove this data?</h6>
                    </div>
                    <div class="modal-footer">
                        <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">OK</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')
    <script src="{{ asset('js/buku.js') }}"></script>
@endpush
