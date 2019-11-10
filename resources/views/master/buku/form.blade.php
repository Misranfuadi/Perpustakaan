<div id="formModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title"></h5>
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
                    <span id="error-judul" class="invalid-feedback"></span>
                </div>
                <div class="form-group">
                    {!! Form::label("penulis","Penulis") !!}
                    {!! Form::text("penulis",null,['class'=>'form-control','placeholder'=>'Penulis'.($errors->has('penulis')?" is-invalid":"")]) !!}
                    <span id="error-penulis" class="invalid-feedback"></span>
                </div>
                <div class="form-group">
                    {!! Form::label("penerbit","Penerbit") !!}
                    {!! Form::text("penerbit",null,['class'=>'form-control','placeholder'=>'Penerbit'.($errors->has('penerbit')?" is-invalid":"")]) !!}
                    <span id="error-penerbit" class="invalid-feedback"></span>
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
                <h5 class="modal-title"></h5>
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
