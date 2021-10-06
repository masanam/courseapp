<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control','maxlength' => 191,'maxlength' => 191,'maxlength' => 191]) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    <textarea name="description" class="form-control my-editor">{!! old('description', isset($sliders) ? $sliders->description : '') !!}</textarea>
</div>

<!-- Picture Field -->
<!-- <div class="form-group col-sm-6">
    {!! Form::label('picture', 'Picture:') !!}
    {!! Form::text('picture', null, ['class' => 'form-control','maxlength' => 191,'maxlength' => 191,'maxlength' => 191]) !!}
</div> -->
<!-- Orderid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('orderid', 'Orderid:') !!}
    {!! Form::number('orderid', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:', ['class' => 'd-block']) !!}
    <select class="form-control select2" name="status">
    @if (isset($sliders))
            <option value="1" {{ ( $sliders->status == '1') ? 'selected' : '' }}> Published </option>
            <option value="0" {{ ( $sliders->status == '2') ? 'selected' : '' }}> Hide </option>
            @else
            <option value="1"> Published </option>
            <option value="0"> Hide </option>
            @endif
    </select>    
</div>

 <!-- Picture Field -->     
 <div class="form-group col-sm-12 col-lg-12">
 {!! Form::label('picture', 'Picture:') !!}
    <div id="picture-thumb">
    <img id="holder" src="{{ isset($sliders) ? $sliders->picture : '' }}" style="padding:10px;max-width:600px;max-height:300px">
    </div>
	<div class="input-group">
    <input class="form-control" type="text" id="picture" name="picture" value="{{ old('picture', isset($sliders) ? $sliders->picture : '') }}">
   <span class="input-group-append">
     <a id="lfm" data-input="picture" data-preview="holder" class="btn btn-primary text-white">
        <i class="fa fa-file"></i> Choose
     </a>
     </span>
   </div>
 </div>
 <p class="tx-pink">* file jpg/jpeg/png, Ukuran : 800px x 640px</p>