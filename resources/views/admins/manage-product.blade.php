@extends('home')

@section('content')
    <div class="container bg-light-gray container-view">

        <div class="container mt-4 ml-5 mr-5 mb-0 pb-0">

            <div class="row">
                <h3>Product List</h3>
            </div>
            <div class="row">
                <form class="form-inline">
                    <input class="form-control mr-lg-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </div>

        <div class="container p-5">
            <div class="row">

                @foreach($products as $product)

                    <div class="col-md-3 p-4">
                        {{--<div class="product-grid">--}}

                        <img src="{{asset($product->image) }} " alt="card-1" class="card-img-top" style="width: 200px; height: 200px;"></a>

                        <div class="product-name">{{$product->name}}</div></a>
                        <div class="product-price">Rp. {{$product->price}}</div>

                        <td>
                            <a href="/update-product/{{$product->id}}">
                                <button class="btn btn-primary mr-2">Update</button>
                            </a>

                            <a href="/delete-product/{{$product->id}}">
                                <button class="btn btn-danger">Delete</button>
                            </a>
                        </td>

                    </div>
                @endforeach
            </div>

            <div class="text-center">
                {{ $products->links() }}
            </div>
        </div>
    </div>

@endsection
