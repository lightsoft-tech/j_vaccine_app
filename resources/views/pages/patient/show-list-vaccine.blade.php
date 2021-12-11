@extends('core')
@section('content')
<div class="container">
    <p class=" text-center bg-light text-light">List Vaccine</p>
    <div class="row">
        @foreach ($listVaccine as $items)
        <div class="col-md-4">
            <div class="card m-3">
                <img src="{{asset('upload/vaccine')}}/{{$items->image}}" class="card-img-top" alt="">
                <div class="card-body">
                    <h5 class="card-title">{{$items->name}}</h5>
                    <p class="card-text">Rp {{$items->price}}</p>
                    <p class="card-text">{{$items->description}}</p>
                </div>
                <div class="card-footer text-center d-grid gap-2">
                    <a href="{{url('/patient/add')}}/{{$items->id}}" class="btn btn-primary">Vaccine Now</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection