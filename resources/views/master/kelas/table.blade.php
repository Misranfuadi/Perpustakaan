<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="m-0">Data Kelas</h5>
                </div>
                <div class="card-body">
                    <table id="table" class="table table-bordered table-hover">
                        <thead class="bg-dark">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col"><a href="#modalForm" data-toggle="modal" data-href="{{ url('master/kelas/create') }}"
                                class="btn btn-sm btn-primary">Tambah</a></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($kelas_list as $kelas)
                            <tr>
                                <td scope="row" >{{ $loop->iteration }}</td>
                                <th>{{ $kelas->nama_kelas }}</th>
                                <td>{{ date('d/M/Y',strtotime($kelas->created_at))}}</td>
                                <td >
                                    <a class="btn btn-info btn-sm" href="#modalForm" data-toggle="modal"
                                        data-href="{{ url('master/kelas/update/'.$kelas->id) }}">Edit</a>
                                    <input type="hidden" name="_method" value="delete"/>
                                    <a class="btn btn-danger btn-sm"data-toggle="modal"
                                        href="#modalDelete" data-id="{{ $kelas->id }}" data-token="{{csrf_token()}}">Hapus</a>
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
