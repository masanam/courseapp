<!-- Question Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('question', 'Question:') !!}
    {!! Form::textarea('question', null, ['class' => 'form-control']) !!}
</div>

<!-- Choices Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('choices', 'Choices:') !!}
    {!! Form::textarea('choices', null, ['class' => 'form-control']) !!}
</div>

<!-- Answers Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('answers', 'Answers:') !!}
    {!! Form::textarea('answers', null, ['class' => 'form-control']) !!}
</div>

<!-- Subtopic Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('subtopic_id', 'Subtopic Id:') !!}
    {!! Form::number('subtopic_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Answer Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('answer_type', 'Answer Type:') !!}
    {!! Form::number('answer_type', null, ['class' => 'form-control']) !!}
</div>

<!-- No Field -->
<div class="form-group col-sm-6">
    {!! Form::label('no', 'No:') !!}
    {!! Form::text('no', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50,'maxlength' => 50]) !!}
</div>

<!-- Solutions Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('solutions', 'Solutions:') !!}
    {!! Form::textarea('solutions', null, ['class' => 'form-control']) !!}
</div>

<!-- Question Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('question_type', 'Question Type:') !!}
    {!! Form::text('question_type', null, ['class' => 'form-control','maxlength' => 2,'maxlength' => 2,'maxlength' => 2]) !!}
</div>