@if(isset($kelas))
    {!! Form::model($kelas,['method'=>'put','id'=>'frm']) !!}
@else
    {!! Form::open(['id'=>'frm']) !!}
@endif
<div class="modal-header bg-secon">
    <h5 class="modal-title">{{isset($kelas)?'Edit':'New'}} Kelas</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <div class="form-group">
        {!! Form::label("nama_kelas","Kelas") !!}
        {!! Form::text("nama_kelas",null,["class"=>"form-control".($errors->has('nama_kelas')?" is-invalid":""),'placeholder'=>'Kelas','id'=>'focus']) !!}
        <span id="error-nama_kelas" class="invalid-feedback"></span>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-danger" data-dismiss="modal"> Close</button>
    {!! Form::submit("Save",["class"=>"btn btn-primary"])!!}
</div>
{!! Form::close() !!}
