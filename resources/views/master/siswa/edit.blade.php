@extends('template/layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Siswa</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                        <li class="breadcrumb-item">Master</li>
                        <li class="breadcrumb-item"><a href="{{ url('master/siswa') }}">Siswa</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-5">
                    <div class="card">
                        <div class="card-header bg-dark">
                            <h5 class="m-0">Update Siswa</h5>
                        </div>
                        {!! Form::model ($siswa,['class'=>'form-horizontal','method'=>'PATCH', 'action'=>['SiswaController@update', $siswa->id]]) !!}
                        <div class="card-body">
                            @include('master/siswa/form')
                        </div>
                        <div class="card-footer">
                            {!! Form::submit('Update',['class'=>'btn btn-primary']) !!}
                            <a href="{{ url('master/siswa') }}" class="btn btn-danger float-right">Cancel</a>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
