<!-- Order Field -->
<div class="form-group col-sm-6">
    {!! Form::label('order', 'Order:') !!}
    {!! Form::number('order', null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Topic Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('topic_id', 'Topic Id:') !!}
    {!! Form::number('topic_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Slug Field -->
<div class="form-group col-sm-6">
    {!! Form::label('slug', 'Slug:') !!}
    {!! Form::text('slug', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- No Field -->
<div class="form-group col-sm-6">
    {!! Form::label('no', 'No:') !!}
    {!! Form::text('no', null, ['class' => 'form-control','maxlength' => 25,'maxlength' => 25,'maxlength' => 25]) !!}
</div>

<!-- Youtube Url Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('youtube_url', 'Youtube Url:') !!}
    {!! Form::textarea('youtube_url', null, ['class' => 'form-control']) !!}
</div>