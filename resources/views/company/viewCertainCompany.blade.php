@extends('layouts.companyLayout')


@section('content')

<hr>

<div class="card continer list-group-item">
    <img src="/storage/{{ $c->logo }}" class="card-img-top" alt="{{ $c->name }} logo">
    <div class="card-body">
        <h5 class="card-title">{{ $c->name }}</h5>
        <p class="card-text">{{ $c->email }}</p>
        <a href="{{ $c->website }}" class="btn btn-primary">Go to Company Site</a>
        @if (auth()->user())
            <a href="./{{ $c->id }}/edit" class="btn btn-primary">Edit Information</a>

            {!!Form::open(['action'=>['CompanyController@destroy',$c->id],'method'=>'POST','onsubmit'=>'return confirm("Press OK to Delete")'])!!}
            {{Form::submit('Remove Company',['class'=>'btn btn-danger'])}}
            {{Form::hidden('_method','DELETE')}}
            {!!Form::close()!!}
            
        @endif
    </div>
</div>


@endsection