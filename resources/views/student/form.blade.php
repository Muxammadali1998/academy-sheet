<div class="form-group{{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ $student->name ?? ''}}" required>

    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('img') ? 'has-error' : ''}}">
    <label for="img" class="control-label">{{ 'Img' }}</label>
    <input class="form-control" name="img" type="text" id="img" value="{{ $student->img ?? ''}}" >

    {!! $errors->first('img', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('group_id') ? 'has-error' : ''}}">
    <label for="group_id" class="control-label">{{ 'Group Id' }}</label>
    <input class="form-control" name="group_id" type="text" id="group_id" value="{{ $student->group_id ?? ''}}" >

    {!! $errors->first('group_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
