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
					<h1 class="m-0 text-dark">Siswa</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                        <li class="breadcrumb-item">Master</li>
                        <li class="breadcrumb-item active">Siswa</li>
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
                            <h5 class="m-0">Data Siswa</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="table" class="table table-bordered table-hover">
                                    <thead class="bg-dark">
                                    <tr>
                                        <th>No</th>
                                        <th>NIS</th>
                                        <th>Nama</th>
                                        <th>Kelamin</th>
                                        <th>Kelas</th>
                                        <th>Update</th>
                                        <th>{{ link_to('master/siswa/create','Tambah',['class'=>'btn btn-primary btn-sm', 'title'=>'Tambah']) }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($siswa_list as $siswa)
                                            @php
                                                if ($siswa->jenis_kelamin == 'p'){
                                                    $kelamin ="Pria";
                                                }
                                                else{
                                                    $kelamin ="Wanita";
                                                }
                                            @endphp
                                            <tr>
                                                <td style="text-align: center">{{ ++$nomor }}</th>
                                                <th>{{ $siswa->nis }}</th>
                                                <td>{{ $siswa->nama_siswa }}</td>
                                                <td>{{ $kelamin }}</td>
                                                <td>{{ $siswa->kelas->nama_kelas }}</td>
                                                <td>{{ date('d-M-Y',strtotime($siswa->created_at))}}</td>
                                                <td >
                                                    <div class="btn-group">
                                                        <a class="btn btn-info btn-sm" title="Edit" href="{{ url('master/siswa/'.$siswa->id.'/edit') }}"> Edit</a>
                                                    </div>
                                                    <div class="btn-group">
                                                        {!! Form::open(['method'=> 'Delete','action'=>['SiswaController@destroy',$siswa->id]]) !!}
                                                        {!! Form::submit('Delete',['class'=> 'btn btn-danger btn-sm',]) !!}
                                                        {!! Form::close() !!}
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')
    <script src="{{ asset('js/table.js') }}"></script>
@endpush
