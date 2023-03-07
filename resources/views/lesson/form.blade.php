<div class="form-group{{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ $lesson->name ?? ''}}" required>

    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
@if (isset($group))
    @foreach ($group->students as $item)
    <div class="form-group{{ $errors->has($item->name) ? 'has-error' : ''}}">
        <label for="name" class="control-label">{{ $item->name }}</label>
        <div>
            <input class="form-control" name="name" type="text" id="name" value="{{ $lesson->name ?? ''}}" required>
            <input class="form-control" name="name" type="text" id="name" value="{{ $lesson->name ?? ''}}" required>
            <input class="form-control" name="name" type="text" id="name" value="{{ $lesson->name ?? ''}}" required>

        </div>
    
        {!! $errors->first($item->name, '<p class="help-block">:message</p>') !!}
    </div>
    @endforeach
@else
<div class="form-group{{ $errors->has('group_id') ? 'has-error' : ''}}">
    <label for="group_id" class="control-label">{{ 'Group Id' }}</label>
    <select name="group_id" class="form-control" id="group_id">
        @foreach ($groups as $group)
        <option value="{{ $group->id }}" {{ isset($lesson) ?? $group->id == $lesson->group_id ? "selected" : '' }} >{{ $group->Name }}</option>
        @endforeach
    </select>
    {!! $errors->first('group_id', '<p class="help-block">:message</p>') !!}
</div>
@endif



<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
