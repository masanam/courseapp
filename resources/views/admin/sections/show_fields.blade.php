<!-- Category Field -->
<div class="col-sm-12">
    {!! Form::label('category', 'Category:') !!}
    <p>{{ $section->category }}</p>
</div>

<!-- Title Field -->
<div class="col-sm-12">
    {!! Form::label('title', 'Title:') !!}
    <p>{{ $section->title }}</p>
</div>

<!-- Slug Field -->
<div class="col-sm-12">
    {!! Form::label('slug', 'Slug:') !!}
    <p>{{ $section->slug }}</p>
</div>

<!-- Picture Field -->
<div class="col-sm-12">
    {!! Form::label('picture', 'Picture:') !!}
    <p>{{ $section->picture }}</p>
</div>

<!-- Orderid Field -->
<div class="col-sm-12">
    {!! Form::label('orderid', 'Orderid:') !!}
    <p>{{ $section->orderid }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $section->description }}</p>
</div>

<!-- Created By Field -->
<div class="col-sm-12">
    {!! Form::label('created_by', 'Created By:') !!}
    <p>{{ $section->created_by }}</p>
</div>

<!-- Updated By Field -->
<div class="col-sm-12">
    {!! Form::label('updated_by', 'Updated By:') !!}
    <p>{{ $section->updated_by }}</p>
</div>

