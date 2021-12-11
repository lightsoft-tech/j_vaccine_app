@extends('core')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h3 class="text-body text-center">Input Vaccine</h3>
            <form action='{{url('/vaccine/update')}}/{{$getVaccine->id}}' method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <div class="form-group">
                        <label for="vaccine_name" class="form-label">Vaccine Name</label>
                        <input class="form-control @error('vaccine_name') is-invalid @enderror" type="text" name="vaccine_name" id="vaccine_name" value="{{$getVaccine->name}}">
                        @error('vaccine_name')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-12 mb-3">
                    <div class="form-group">
                        <label for="vaccine_price" class="form-label">Price</label>
                        <div class="input-group has-validation">
                            <span class="input-group-text">Rp</span>
                            <input type="text" name="vaccine_price" class="form-control @error('vaccine_price') is-invalid @enderror" id="vaccine_price" value="{{$getVaccine->price}}">
                        </div>
                        @error('vaccine_price')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <div class="form-group">
                        <label for="vaccine_description" class="form-label">Description</label>
                        <textarea rows="4" cols="50" class="form-control @error('vaccine_description') is-invalid @enderror" name="vaccine_description" id="vaccine_description">{{$getVaccine->description}}</textarea>
                        @error('vaccine_description')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <div class="form-group">
                        <label for="vaccine_image" id="vaccine_image" class="form-label">Image</label>
                        <input class="form-control @error('vaccine_image') is-invalid @enderror" type="file" name="vaccine_image" value="{{old('image')}}">
                        @error('vaccine_image')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-12">
                        <button class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection