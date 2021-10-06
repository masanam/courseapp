<!-- Fullname Field -->
<div class="col-sm-12">
    {!! Form::label('fullname', 'Fullname:') !!}
    <p>{{ $testimony->fullname }}</p>
</div>

<!-- Title Field -->
<div class="col-sm-12">
    {!! Form::label('title', 'Title:') !!}
    <p>{{ $testimony->title }}</p>
</div>

<!-- Slug Field -->
<div class="col-sm-12">
    {!! Form::label('slug', 'Slug:') !!}
    <p>{{ $testimony->slug }}</p>
</div>

<!-- Picture Field -->
<div class="col-sm-12">
    {!! Form::label('picture', 'Picture:') !!}
    <p>{{ $testimony->picture }}</p>
</div>

<!-- Orderid Field -->
<div class="col-sm-12">
    {!! Form::label('orderid', 'Orderid:') !!}
    <p>{{ $testimony->orderid }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $testimony->description }}</p>
</div>

<!-- Created By Field -->
<div class="col-sm-12">
    {!! Form::label('created_by', 'Created By:') !!}
    <p>{{ $testimony->created_by }}</p>
</div>

<!-- Updated By Field -->
<div class="col-sm-12">
    {!! Form::label('updated_by', 'Updated By:') !!}
    <p>{{ $testimony->updated_by }}</p>
</div>

