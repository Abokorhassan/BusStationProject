<!-- Name Field -->
<div class="form-group col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Second Field -->
<div class="form-group col-sm-12">
    {!! Form::label('second', 'Second:') !!}
    {!! Form::text('second', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12 text-center">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.yos.index') !!}" class="btn btn-default">Cancel</a>
</div>
