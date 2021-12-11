@extends('core')
@section('content')
    @for ($i = 0; $i < count($listVaccine); $i++)
    <?php $countVaccine+=1 ?>
    @endfor
    @if ($countVaccine == 0)
    <div class="container mt-5">
        <p class="text-center mt-5 text-muted">There is no data ...</p>
        <div class="d-grid gap-2 col-6 mx-auto">
            <a href="{{url('/vaccine/add')}}">
                <button class="btn btn-primary w-100" type="button">Add Vaccine</button>
            </a>
        </div>
    </div>
    @else
    <div class="container">
        <div class="text-center">
            <h5>List Vaccine</h5>
        </div>
        <div class="col-12 my-2">
            <a href="{{url('/vaccine/add')}}"><button type="button" class="btn btn-primary">Add Vaccine</button></a>
        </div>
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($listVaccine as $items)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$items->name}}</td>
                    <td>{{$items->price}}</td>
                    <td>
                        <form class="d-inline" action="{{url('/vaccine/edit')}}/{{$items->id}}" method="POST">
                            @csrf
                            <button class="btn btn-warning" type="submit">Edit</button>
                        </form>
                        <form class="d-inline" action="{{url('/vaccine/delete')}}/{{$items->id}}"
                            method="POST">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger" type="submit" onclick="return confirm('Delete Vaccine ?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
@endsection