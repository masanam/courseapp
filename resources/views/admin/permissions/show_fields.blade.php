<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $permissions->name }}</p>
</div>

<!-- Guard Name Field -->
<div class="col-sm-12">
    {!! Form::label('guard_name', 'Guard Name:') !!}
    <p>{{ $permissions->guard_name }}</p>
</div>

<!-- Group Field -->
<div class="col-sm-12">
    {!! Form::label('group', 'Group:') !!}
    <p>{{ $permissions->group }}</p>
</div>

