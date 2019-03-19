@extends('layouts.companyLayout')

@section('content')


<h1 class='header h1' style="text-align: center;">Edit Employee Form</h1>
<hr>

@if(count($companies)>0)
{!!Form::open(['action'=>['EmployeeController@update',$emp->id],'method'=>'POST','class'=>'container']) !!}

<div class='form-group'>
    <label>Company</label>
    <select name="company" class="form-group-lg custom-select">
        @foreach($companies as $c)
        <option name="{{ $c->id }}" value="{{$c->id}}">{{$c->name}}</option>
        @endforeach
    </select>
</div>

<div class='form-group'>
    {{Form::label('title','First Name')}}
    {{Form::text('fname',$emp->Fname,['class'=>'form-control','placeholder'=>'First Name'])}}
</div>

<div class='form-group'>
    {{Form::label('title','Last Name')}}
    {{Form::text('lname',$emp->Lname,['class'=>'form-control','placeholder'=>'Last Name'])}}
</div>


<div class='form-group'>
    {{Form::label('title','Email')}}
    {!! Form::email('email',$emp->email,['class'=>'form-control','placeholder'=>'Email'])!!}
</div>

<div class='form-group'>
    {{Form::label('title','Phone')}}
    {!! Form::number('phone',$emp->phone,['class'=>'form-control','placeholder'=>'Phone Number'])!!}
</div>

{{Form::submit('submit Edits',['class'=>'btn btn-primary'])}} 
{!! Form::hidden('_method', 'PUT') !!}
{!!Form::close()!!}

@else
<h1 class="danger" style="text-align:center;">No Company Exist</h1>
<h2 style="text-align:center;">Create One through here </h2><a class="btn btn-primary" href="/company/create">Create
    Company Now</a>
@endif

@endsection
