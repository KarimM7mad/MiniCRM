@extends('layouts.companyLayout')
@section('content')
<hr>

<div class="col-md-4" style="background: black;">
    </div>
<div class="card-group row">

    
    @foreach ($allCompanies as $c)

    <div class="col-md-4">
        <div class="row no-gutters ">
            <div class="col-md-4">
                <img src="/storage/{{ $c->logo }}" class="card-img-top" alt="{{ $c->name }} logo">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title text-center">{{ $c->name }}</h5>
                    <p class="card-text text-center">{{ $c->email }}</p>
                    <a href="{{ $c->website }}" class="btn btn-primary">Visit Company Site</a>
                    <a href="./company/{{ $c->id }}" class="btn btn-primary">Know More</a>
                </div>
            </div>
        </div>
    </div>

    @endforeach
    
    <!-- {{ $allCompanies->links() }} -->

</div>

<div class="col-md-4" style="background: black;">
    </div>

@endsection
