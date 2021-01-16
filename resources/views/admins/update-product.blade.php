@extends('home')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Update Product</div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="/update-product" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <input type="hidden" name="id" value="{{$product->id}}">

                            <div class="form-group">
                                <label for="image" class="col-md-4 control-label">Profile Picture</label>

                                <div class="col-md-6">
                                    <input id="image" type="file" class="form-control" name="image" required>

                                    @if ($errors->has('image'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{$product->name}}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <!-- <div class="form-group{{ $errors->has('brand') ? ' has-error' : '' }}">
                                <label for="brand" class="col-md-4 control-label">Brand</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="brand" value="{{$product->brand}}" required>

                                    @if ($errors->has('brand'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('brand') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div> -->


                            <div class="form-group{{ $errors->has('brand') ? ' has-error' : '' }}">
                                <label for="brand" class="col-md-4 control-label">Brand</label>

                                <div class="col-md-6">
                                    <select class="form-control" name="brand" value="{{$product->brand}}" required>
                                        @foreach($brand as $mybrand)
                                        <option value="{{$mybrand->name}}" {{$product->brand == $mybrand->name ? "selected" : ""}}>{{ $mybrand->name }}</option>  
                                        @endforeach
                                    </select>
                                    @if ($errors->has('brand'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('brand') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                <label for="description" class="col-md-4 control-label">Description</label>

                                <div class="col-md-6">
                                    <input id="description" type="text" class="form-control" name="description" value="{{$product->description}}" required autofocus>

                                    @if ($errors->has('description'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <label for="price" class="col-md-3 control-label">Rp.</label>
                                    <div class="col-md-2">
                                        <input id="price" type="text" class="form-control" name="price" value="{{$product->price}}">
                                    </div>
                                    <label for="discount" class="col-md-1 control-label">%</label>
                                    <div class="col-md-2">
                                        <input id="discount" type="text" class="form-control" name="discount" value="{{$product->discount}}">
                                    </div>
                                    <label for="stock" class="col-md-1 control-label">Stock</label>
                                    <div class="col-md-2">
                                        <input id="stock" type="text" class="form-control" name="stock" value="{{$product->stock}}">
                                    </div>
                                </div>
                            </div>

                            <input type="submit" class="btn btn-danger btn-block" value="Update Product">
                            {{--<div class="form-group">--}}
                                {{--<div class="col-md-6 col-md-offset-4">--}}
                                    {{--<button type="submit" class="btn btn-primary">--}}
                                        {{--Update Product--}}
                                    {{--</button>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
