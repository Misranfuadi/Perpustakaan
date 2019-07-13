@if (isset($siswa))
    {!! Form::hidden('id',$siswa->id) !!}
@endif
<div class="form-group">
    {!! Form::label("nis","NIS") !!}
    {!! Form::text("nis",null,['class'=>'form-control'.($errors->has('nis')?' is-invalid':''),'placeholder'=>'NIS']) !!}
    @error('nis')
        <span class="invalid-feedback">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    {!! Form::label("nama_siswa","Nama Siswa") !!}
    {!! Form::text("nama_siswa",null,['class'=>'form-control'.($errors->has('nama_siswa')?' is-invalid':''),'placeholder'=>'Nama']) !!}
    @error('nama_siswa')
        <span class="invalid-feedback">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    {!! Form::label("jenis_kelamin","Kelamin") !!}
    <div class="form-check">
        {!! Form::radio ('jenis_kelamin','p',null,['id'=>'jenis_kelamin1','class'=>'form-check-input'.($errors->has('jenis_kelamin')?' is-invalid':'')]) !!}
        <label class="form-check-label" for="jenis_kelamin1">Laki-laki</label>
    </div>
    <div class="form-check">
        {!! Form::radio ('jenis_kelamin','w',null,['id'=>'jenis_kelamin2','class'=>'form-check-input'.($errors->has('jenis_kelamin')?' is-invalid':'')]) !!}
        <label class="form-check-label" for="jenis_kelamin2">Perempuan</label>
        @error('jenis_kelamin')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>
</div>
<div class="form-group">
    {!! Form::label("id_kelas","Kelas") !!}
    @if (count($kelas_list)>0)
        {!! Form::select('id_kelas', $kelas_list, null,['class'=>'form-control'.($errors->has('id_kelas')?' is-invalid':''),'id'=>'id_kelas','placeholder'=>'Pilih Kelas']) !!}
    @else
        {!! Form::text('id_kelas','Tidak ada kelas',['class'=>'form-control','disabled']) !!}
    @endif
    @error('id_kelas')
        <span class="invalid-feedback">{{ $message }}</span>
    @enderror
</div>


