<div class="form-group{{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ $lesson->name ?? ''}}" required>

    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('group_id') ? 'has-error' : ''}}">
    <label for="group_id" class="control-label">{{ 'Group Id' }}</label>
    <select name="group_id" class="form-control" id="group_id">
        @foreach ($groups as $group)
        <option value="{{ $group->id }}" {{ isset($student) ?? $group->id == $student->group_id ? "selected" : '' }} >{{ $group->Name }}</option>
        @endforeach
    </select>
    {!! $errors->first('group_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
