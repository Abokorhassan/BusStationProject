<!-- Name Field -->
<div class="form-group col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-12">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Dob Field -->
<div class="form-group col-sm-12">
    {!! Form::label('doB', 'Dob:') !!}
    {!! Form::date('doB', null, ['class' => 'form-control']) !!}
</div>

<!-- Gender Field -->
<div class="form-group col-sm-12">
    {!! Form::label('Gender', 'Gender:') !!}
    <label class="radio-inline">
        {!! Form::radio('Gender', "Male", null) !!} Male
    </label>
    <label class="radio-inline">
        {!! Form::radio('Gender', "Female", null) !!} Female
    </label>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12 text-center">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.posts.index') !!}" class="btn btn-default">Cancel</a>
</div>
