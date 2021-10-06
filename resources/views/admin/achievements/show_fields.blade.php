<!-- Category Id Field -->
<div class="col-sm-12">
    {!! Form::label('category_id', 'Category Id:') !!}
    <p>{{ $achievement->category_id }}</p>
</div>

<!-- Title Field -->
<div class="col-sm-12">
    {!! Form::label('title', 'Title:') !!}
    <p>{{ $achievement->title }}</p>
</div>

<!-- Seotitle Field -->
<div class="col-sm-12">
    {!! Form::label('seotitle', 'Seotitle:') !!}
    <p>{{ $achievement->seotitle }}</p>
</div>

<!-- Content Field -->
<div class="col-sm-12">
    {!! Form::label('content', 'Content:') !!}
    <p>{{ $achievement->content }}</p>
</div>

<!-- Picture Field -->
<div class="col-sm-12">
    {!! Form::label('picture', 'Picture:') !!}
    <p>{{ $achievement->picture }}</p>
</div>

<!-- Year Field -->
<div class="col-sm-12">
    {!! Form::label('year', 'Year:') !!}
    <p>{{ $achievement->year }}</p>
</div>

<!-- Status Field -->
<div class="col-sm-12">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $achievement->status }}</p>
</div>

<!-- Created By Field -->
<div class="col-sm-12">
    {!! Form::label('created_by', 'Created By:') !!}
    <p>{{ $achievement->created_by }}</p>
</div>

<!-- Updated By Field -->
<div class="col-sm-12">
    {!! Form::label('updated_by', 'Updated By:') !!}
    <p>{{ $achievement->updated_by }}</p>
</div>

