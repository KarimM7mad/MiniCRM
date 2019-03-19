@extends('layouts.companyLayout')


@section('content')

<hr>

<div class="card continer list-group-item">
    <div class="card-body">
        <h5 class="card-title">First Name : {{ $emp->Fname }}</h5>
        <h5 class="card-title">Last Name  : {{ $emp->Lname }}</h5>
        <h5 class="card-title">Email      :{{ $emp->email }}</h5>
        <h5 class="card-title">Phone      :{{ $emp->phone }}</h5>
        <h5 class="card-title">Company    :{{ $emp->getName($emp->company) }}</h5>
    </div>
        
</div>


@endsection