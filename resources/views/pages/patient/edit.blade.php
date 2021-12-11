@extends('core')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h3 align="center"><b> Register {{$getVaccine->name}} Patient</b></h3>
            <div>
                <form action='{{url('/patient/update')}}/{{$getPatient->id}}' method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-group mb-3">
                        <label for="disabledTextInput" class="form-label">Vaccine Id</label>
                        <input type="text" id="disabledTextInput" class="form-control" value="{{$getVaccine->id}}" disabled>
                    </div>
                    <div class="form-group mb-3">
                        <label for="patient_name" class="form-label">Patient Name</label>
                        <input class="form-control @error('patient_name') is-invalid @enderror" type="text" name="patient_name" id="patient_name" value="{{$getPatient->name}}">
                        @error('patient_name')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="patient_nik" class="form-label">Patient NIK</label>
                        <input class="form-control @error('patient_nik') is-invalid @enderror" type="text" name="patient_nik" id="patient_nik" value="{{$getPatient->nik}}">
                        @error('patient_nik')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="patient_address" class="form-label">Patient Address</label>
                        <input class="form-control @error('patient_address') is-invalid @enderror" type="text" name="patient_address" id="patient_address" value="{{$getPatient->alamat}}">
                        @error('patient_address')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="ktp_image" id="ktp_image" class="form-label">Patient KTP Image</label>
                        <input class="form-control @error('ktp_image') is-invalid @enderror" type="file" name="ktp_image" value="{{old('image')}}">
                        @error('ktp_image')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="patient_phone" class="form-label">Patient Phone</label>
                        <input class="form-control @error('patient_phone') is-invalid @enderror" type="text" name="patient_phone" id="patient_phone" value="{{$getPatient->no_hp}}">
                        @error('patient_phone')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group col-12">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection