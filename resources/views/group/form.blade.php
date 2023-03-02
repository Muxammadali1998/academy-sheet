<div class="form-group{{ $errors->has('Name') ? 'has-error' : ''}}">
    <label for="Name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="Name" type="text" id="Name" value="{{ $group->Name ?? ''}}" required>

    {!! $errors->first('Name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('img') ? 'has-error' : ''}}">
    <label for="img" class="control-label">{{ 'Img' }}</label>
    <input class="form-control" name="img" type="text" id="img" value="{{ $group->img ?? ''}}" required>

    {!! $errors->first('img', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('teacher') ? 'has-error' : ''}}">
    <label for="teacher" class="control-label">{{ 'Teacher' }}</label>
    <input class="form-control" name="teacher" type="text" id="teacher" value="{{ $group->teacher ?? ''}}" required>

    {!! $errors->first('teacher', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
