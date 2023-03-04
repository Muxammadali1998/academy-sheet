<div class="form-group{{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="control-label">{{ 'Status' }}</label>
    <div class="radio">
        <label><input name="{{ 'status' }}" type="radio" value="1" {{ (isset($monitoring) && 1 == $monitoring->status) ? 'checked' : '' }}> Yes</label>
    </div>
    <div class="radio">
        <label><input name="{{ 'status' }}" type="radio" value="0" @if (isset($monitoring)) {{ (0 == $monitoring->status) ? 'checked' : '' }} @else {{ 'checked' }} @endif> No</label>
    </div>
    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('reating') ? 'has-error' : ''}}">
    <label for="reating" class="control-label">{{ 'Reating' }}</label>
    <input class="form-control" name="reating" type="number" id="reating" value="{{ $monitoring->reating ?? ''}}" required>

    {!! $errors->first('reating', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('lesson_id') ? 'has-error' : ''}}">
    <label for="lesson_id" class="control-label">{{ 'Lesson Id' }}</label>
    <input class="form-control" name="lesson_id" type="number" id="lesson_id" value="{{ $monitoring->lesson_id ?? ''}}" required>

    {!! $errors->first('lesson_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('student_id') ? 'has-error' : ''}}">
    <label for="student_id" class="control-label">{{ 'Student Id' }}</label>
    <input class="form-control" name="student_id" type="number" id="student_id" value="{{ $monitoring->student_id ?? ''}}" required>

    {!! $errors->first('student_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('group_id') ? 'has-error' : ''}}">
    <label for="group_id" class="control-label">{{ 'Group Id' }}</label>
    <input class="form-control" name="group_id" type="number" id="group_id" value="{{ $monitoring->group_id ?? ''}}" required>

    {!! $errors->first('group_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
