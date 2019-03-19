@extends('layouts.companyLayout')

@section('content')

<hr>
{!! Form::open(['action'=>['CompanyController@update',$c->id],'method'=>'POST','class'=>'container','enctype'=>'multipart/form-data']) !!}

<h1 class="align-items-center"> Edit Company Form</h1>

{{-- name input --}}
<div class=" form-group row">
    {!! Form::label('Name', 'Company Name',['class'=>'col-sm-2 col-form-label']) !!}
    <div class="col-sm-10">
        {!! Form::text('name', $c->name , ['class'=>'form-control','placeholder'=>'Enter Name']) !!}
    </div>
</div>
{{-- email input --}}
<div class=" form-group row">
    {!! Form::label('Email', 'Company Email',['class'=>'col-sm-2 col-form-label']) !!}
    <div class="col-sm-10">
        {!! Form::email('email', $c->email, ['class'=>'form-control','placeholder'=>'Enter Email']) !!}
    </div>
</div>
{{-- url input --}}
<div class=" form-group row">
    {!! Form::label('Website', 'Company website',['class'=>'col-sm-2 col-form-label']) !!}
    <div class="col-sm-10">
        {!! Form::url('website', $c->website, ['class'=>'form-control','placeholder'=>'Enter website']) !!}
    </div>
</div>
{{-- logo Input --}}
<div class=" form-group row">
    
    
    {!! Form::label('Logo', 'Company Logo',['class'=>'col-sm-2 col-form-label']) !!}
    <div class="col-sm-10">
        {!! Form::file('logo',['class'=>'form-control-file','accept'=>'.jpg,.png,.jpeg,.gif']) !!}
        @if($c->logo )
            <img src="/storage/{{ $c->logo }}" alt="No prev Img">
         @endif
    </div>
</div>

{{Form::hidden('_method','PUT')}}
{!! Form::submit("Submit", ['class'=>'btn btn-primary']) !!}
{!! Form::close() !!}

@endsection
