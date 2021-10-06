<!-- Title Field -->
<div class="col-sm-12">
    {!! Form::label('title', 'Title:') !!}
    <p>{{ $sliders->title }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $sliders->description }}</p>
</div>

<!-- Picture Field -->
<div class="col-sm-12">
    {!! Form::label('picture', 'Picture:') !!}
    <p>{{ $sliders->picture }}</p>
</div>

<!-- Orderid Field -->
<div class="col-sm-12">
    {!! Form::label('orderid', 'Orderid:') !!}
    <p>{{ $sliders->orderid }}</p>
</div>

<!-- Status Field -->
<div class="col-sm-12">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $sliders->status }}</p>
</div>

<!-- Created By Field -->
<div class="col-sm-12">
    {!! Form::label('created_by', 'Created By:') !!}
    <p>{{ $sliders->created_by }}</p>
</div>

<!-- Updated By Field -->
<div class="col-sm-12">
    {!! Form::label('updated_by', 'Updated By:') !!}
    <p>{{ $sliders->updated_by }}</p>
</div>

