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
                            <th style="text-align: center">No</th>
                            <th>Kelas</th>
                            <th>Tanggal</th>
                            <th><a href="#modalForm" data-toggle="modal" data-href="{{ url('kelas/create') }}"
                                class="btn btn-sm btn-primary">New</a></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($kelas_list as $kelas)
                            <tr>
                                <th style="text-align: center">{{ $i++ }}</th>
                                <td>{{ $kelas->nama_kelas }}</td>
                                <td>{{ date('d-M-Y',strtotime($kelas->created_at))}}</td>
                                <td >
                                    <a class="btn btn-warning btn-sm" title="Edit" href="#modalForm" data-toggle="modal"
                                        data-href="{{ url('kelas/update/'.$kelas->id) }}"> Edit</a>
                                    <input type="hidden" name="_method" value="delete"/>
                                    <a class="btn btn-danger btn-sm" title="Delete" data-toggle="modal"
                                        href="#modalDelete" data-id="{{ $kelas->id }}" data-token="{{csrf_token()}}">Delete</a>
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
@push('script')
<script>
    $(function () {
        $('#table').DataTable({
            "ordering": false,
            "info": true,
            "autoWidth": false,
        });
    });
</script>
@endpush
