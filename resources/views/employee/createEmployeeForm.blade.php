@extends('layouts.companyLayout')

@section('content')


<h1 class='header h1' style="text-align: center;">new Employee Form</h1>
<hr>

@if(count($companies)>0)
{!!Form::open(['action'=>'EmployeeController@store','method'=>'POST','class'=>'container']) !!}

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
    {{Form::text('fname','',['class'=>'form-control','placeholder'=>'First Name'])}}
</div>

<div class='form-group'>
    {{Form::label('title','Last Name')}}
    {{Form::text('lname','',['class'=>'form-control','placeholder'=>'Last Name'])}}
</div>


<div class='form-group'>
    {{Form::label('title','Email')}}
    {!! Form::email('email','',['class'=>'form-control','placeholder'=>'Email'])!!}
</div>

<div class='form-group'>
    {{Form::label('title','Phone')}}
    {!! Form::number('phone','',['class'=>'form-control','placeholder'=>'Phone Number'])!!}
</div>

{{Form::submit('Add Employee',['class'=>'btn btn-primary'])}}
{!!Form::close()!!}

@else
<h1 class="danger" style="text-align:center;">No Company Exist</h1>
<h2 style="text-align:center;">Create One through here </h2><a class="btn btn-primary" href="/company/create">Create
    Company Now</a>
@endif

@endsection
