
@extends('home')

@section('content')
    @if(count($users) > 0)
        <div class="container-fluid bg-light-gray container-view">

            <div class="container">

                <div class="row justify-content-center">
                    <h3>Manage Members <i class="fas fa-users"></i></h3>
                </div>

                <table class="table table-sm text-center table-borderless">
                    <thead class="tborder">
                    <tr>
                        <th scope="col" class="text-center">ID</th>
                        <th scope="col" class="text-center">Member Name</th>
                        <th scope="col" class="text-center"></th>
                        <th scope="col" class="text-center"></th>
                    </tr>
                    </thead>

                    <tbody>

                    @foreach($users as $user)
                        <tr class="tborder">
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>

                            <td><a href="/redirectUpdateUserProfile/{{$user->id}}">
                                    <button class="btn btn-primary">Update</button>
                                </a>
                            </td>
                            <td><a href="/delete-member/{{$user->id}}">
                                    <button class="btn btn-danger">Delete</button>
                                </a>
                            </td>
                        </tr>

                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    @else
        <div class="text-center">No Member</div>
    @endif
@endsection