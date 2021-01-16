@extends('home')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-12"></div>

            <div class="col-md-6 col-sm-6 col-xs-12">
                <form method="post" action="{{ route('update-profile') }}" class="form-container" enctype="multipart/form-data">
                    {{csrf_field()}}

                    <h1>Update Profile</h1>

                    <input type="hidden" name="id" value="{{ Auth::user()->id }}">


                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="name" type="text" class="form-control w-100" name="name" value="{{ old('name') }}" placeholder="Name" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                @endif
                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                @endif
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="image" type="file" class="form-control-file mr-5" name="image" required>

                                    @if ($errors->has('image'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('image') }}</strong>
                                            </span>
                                    @endif
                                </div>

                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="col-md-6">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input ml-5" type="radio" name="gender" value="male">Male
                                            <input class="form-check-input ml-2" type="radio" name="gender" value="female">Female
                                        </div>


                                        @if ($errors->has('gender'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('gender') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('dob') ? ' has-error' : '' }}">
                        <input id="dob" type="date" class="form-control" name="dob" value="{{ old('dob') }}" required autofocus>

                        @if ($errors->has('dob'))
                            <span class="help-block">
                            <strong>{{ $errors->first('dob') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                        <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}" placeholder="Address" required autofocus>

                            @if ($errors->has('address'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('address') }}</strong>
                                </span>
                            @endif
                    </div>

                    <input type="submit" class="btn btn-danger btn-block mt-5" value="Edit Profile">
                </form>
            </div>

            <div class="col-md-4 col-sm-4 col-xs-12"></div>
        </div>
    </div>

@endsection
