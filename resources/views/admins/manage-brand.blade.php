
@extends('home')

@section('content')
    @if(count($brands) > 0)
        <div class="container-fluid bg-light-gray container-view">

            <div class="container">

                <div class="row justify-content-center">
                    <h3>Manage Brand</h3>
                </div>

                <table class="table table-sm text-center table-borderless">
                    <thead class="tborder">
                    <tr>
                        <th scope="col" class="text-center">ID</th>
                        <th scope="col" class="text-center">Brand Name</th>
                        <th scope="col" class="text-center"></th>
                        <th scope="col" class="text-center"></th>
                    </tr>
                    </thead>

                    <tbody>

                    @foreach($brands as $brand)
                        <tr class="tborder">
                            <td>{{ $brand->id}}</td>
                            <td>{{ $brand->name}}</td>

                            <td><a href="/update-brand/{{$brand->id}}">
                                    <button class="btn btn-primary">Update</button>
                                </a>
                            </td>
                            <td><a href="/delete-brand/{{$brand->id}}">
                                    <button class="btn btn-danger">Delete</button>
                                </a>
                            </td>
                        </tr>

                    @endforeach


                    </tbody>
                </table>
            </div>
            @else
                <div class="text-center">No Brand</div>
            @endif
        </div>
@endsection