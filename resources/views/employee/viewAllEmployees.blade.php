@extends('layouts.companyLayout')

@section('content')


<hr>
<div class="container">
    <div class="row row-offcanvas row-offcanvas-right">
        <div class="col">
            @if(count($employees)>0)
            <table class="table table-striped table-inverse table-bordered">
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <td>Email</td>
                        <td>phone</td>
                        <td>company</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($employees as $e)
                    <tr>
                        <td>{{$e->Fname}}</td>
                        <td>{{$e->Lname}}</td>
                        <td>{{$e->email}}</td>
                        <td>{{$e->phone}}</td>
                        <td>{{$e->getName($e->company)}}</td>
                        @if (auth()->user())
                        <td><a class="btn btn-primary" href="/employee/{{ $e->id }}/edit" role="button">Edit Employee</a></td>
                        <td>
                            {!!Form::open(['action'=>['EmployeeController@destroy',$e->id],'method'=>'POST','onsubmit'=>'return confirm("Press OK to Delete")'])!!}
                            {{Form::submit('Delete Employee',['class'=>'btn btn-danger'])}}
                            {{Form::hidden('_method','DELETE')}}
                            {!!Form::close()!!}
                        </td>
                        @endif
                    </tr>
                </tbody>
                @endforeach
            </table>
            @else
            <h1>NO Employee Exist So add one now</h1>
            <a class="btn btn-primary" href="/employee/create">Add an Employee</a>
            @endif
        </div>
    </div>
</div>



@endsection
