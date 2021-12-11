@extends('core')
@section('content')
    @for ($i = 0; $i < count($listPatient); $i++)
    <?php $countPatient+=1 ?>
    @endfor
    @if ($countPatient == 0)
    <div class="container mt-5">
        <p class="text-center mt-5 text-muted">There is no data ...</p>
        <div class="d-grid gap-2 col-6 mx-auto">
            <a href="{{url('/patient/list-vaccine')}}">
                <button class="btn btn-primary w-100" type="button">Add Patient</button>
            </a>
        </div>
    </div>
    @else
    <div class="container">
        <div class="text-center">
            <h5>List Patient</h5>
        </div>
        <div class="col-12 my-2">
            <a href="{{url('/patient/list-vaccine')}}"><button type="button" class="btn btn-primary">Register Patient</button></a>
        </div>
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Vaccine</th>
                    <th scope="col">Name</th>
                    <th scope="col">NIK</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">No Hp</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($listPatient as $items)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    @foreach ($listVaccine as $item)
                        @if ($item->id == $items->vaccine_id)
                            <td>{{$item->name}}</td>
                        @endif
                    @endforeach
                    <td>{{$items->name}}</td>
                    <td>{{$items->nik}}</td>
                    <td>{{$items->alamat}}</td>
                    <td>{{$items->no_hp}}</td>
                    <td>
                        <form class="d-inline" action="{{url('/patient/edit')}}/{{$items->id}}" method="POST">
                            @csrf
                            <button class="btn btn-warning" type="submit">Edit</button>
                        </form>
                        <form class="d-inline" action="{{url('/patient/delete')}}/{{$items->id}}"
                            method="POST">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger" type="submit" onclick="return confirm('Delete Patient ?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
@endsection