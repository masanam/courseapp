<!-- Question Field -->
<div class="col-sm-12">
    {!! Form::label('question', 'Question:') !!}
    <p>{{ $problem->question }}</p>
</div>

<!-- Choices Field -->
<div class="col-sm-12">
    {!! Form::label('choices', 'Choices:') !!}
    <p>{{ $problem->choices }}</p>
</div>

<!-- Answers Field -->
<div class="col-sm-12">
    {!! Form::label('answers', 'Answers:') !!}
    <p>{{ $problem->answers }}</p>
</div>

<!-- Subtopic Id Field -->
<div class="col-sm-12">
    {!! Form::label('subtopic_id', 'Subtopic Id:') !!}
    <p>{{ $problem->subtopic_id }}</p>
</div>

<!-- Answer Type Field -->
<div class="col-sm-12">
    {!! Form::label('answer_type', 'Answer Type:') !!}
    <p>{{ $problem->answer_type }}</p>
</div>

<!-- No Field -->
<div class="col-sm-12">
    {!! Form::label('no', 'No:') !!}
    <p>{{ $problem->no }}</p>
</div>

<!-- Solutions Field -->
<div class="col-sm-12">
    {!! Form::label('solutions', 'Solutions:') !!}
    <p>{{ $problem->solutions }}</p>
</div>

<!-- Question Type Field -->
<div class="col-sm-12">
    {!! Form::label('question_type', 'Question Type:') !!}
    <p>{{ $problem->question_type }}</p>
</div>

