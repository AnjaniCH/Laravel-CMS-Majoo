@extends('home')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12"></div>

            <div class="col-md-6 col-sm-6 col-xs-12 ">
                <form class="form-container" method="POST" action="{{ route('insert-product') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}

                <h1>Insert Product </h1>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-7 col-sm-7 col-xs-12">
                            <input id="image" type="file" class="form-control pb-5" name="image" required>

                            @if ($errors->has('image'))
                                <span class="help-block">
                                <strong>{{ $errors->first('image') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label for="name" class="col-md-2 control-label">Name</label>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                            @if ($errors->has('name'))
                                <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-group{{ $errors->has('brand') ? ' has-error' : '' }}">
                    <div class="row">
                        <label for="brand" class="col-md-2 control-label">Brand</label>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control" name="brand" required>
                                @foreach($brand as $mybrand)
                                    <option>{{ $mybrand->name }}</option>  
                                @endforeach
                            </select>
                            @if ($errors->has('brand'))
                                <span class="help-block">
                                <strong>{{ $errors->first('brand') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                    <div class="row">
                        <label for="description" class="col-md-2 control-label">Description</label>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="description" type="text" class="form-control" name="description" value="{{ old('description') }}" required autofocus>

                            @if ($errors->has('description'))
                                <span class="help-block">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                    <div class="row">
                        <label for="price" class="col-md-2 control-label">Price</label>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <span class="position-absolute icon-position mr-5 mt-3" style="margin-left: 0.5rem">Rp.</span>
                            <input id="price" type="text" class="form-control ml-5 col-md-10" name="price" value="{{ old('price') }}" required autofocus>

                            @if ($errors->has('price'))
                                <span class="help-block">
                            <strong>{{ $errors->first('price') }}</strong>
                        </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-group{{ $errors->has('discount') ? ' has-error' : '' }}">
                    <div class="row">
                        <label for="discount" class="col-md-2 control-label">Discount</label>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="discount" type="text" class="form-control mr-3 col-md-11" name="discount" value="{{ old('discount') }}" required autofocus>
                            <span class="fas fa-percentage position-absolute icon-position mt-3"></span>

                            @if ($errors->has('discount'))
                                <span class="help-block">
                            <strong>{{ $errors->first('discount') }}</strong>
                        </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-group{{ $errors->has('stock') ? ' has-error' : '' }}">
                    <div class="row">
                        <label for="stock" class="col-md-2 control-label">Stock</label>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="stock" type="text" class="form-control" name="stock" value="{{ old('stock') }}" required autofocus>

                            @if ($errors->has('stock'))
                                <span class="help-block"><strong>{{ $errors->first('stock') }}</strong></span>
                            @endif
                        </div>
                    </div>
                </div>

                {{--<div class="form-group">--}}
                    {{--<div class="col-md-2 col-md-offset-4">--}}
                        <input type="submit" class="btn btn-primary" style="margin-left: 18rem" value="Insert Product">
                            {{--Insert Product--}}
                        {{--</input>--}}
                    {{--</div>--}}
                {{--</div>--}}

                </form>

            <div class="col-md-2 col-sm-2 col-xs-12"></div>
        </div>
    </div>

@endsection
