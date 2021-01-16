@extends('home')

@section('content')
    <div class="container bg-light-gray">

        <div class="container">

            <div class="row">
                <h3>Product List</h3>
            </div>

            <div class="row">
                <form action="{{ route('search') }}" method="GET" class="form-inline">
                    <input class="form-control mr-lg-2" type="text" name="query" value="{{ request()->input('query') }}" placeholder="Search">
                    <button class="btn btn-info my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </div>

        <div class="container p-5">
            <div class="row">
                @foreach($products as $product)

                    <div class="col-md-3 p-4">
                        <img src="{{asset($product->image) }} " alt="card-1" class="card-img-top" style="width: 200px; height: 210px;"></a>

                        <div class="product-name">{{$product->name}}</div></a>
                        <div class="product-price">Rp. {{$product->price}}</div>

                        <a href="/product/{{$product->id}}"  class="btn btn-danger" role="button"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add To Cart</a>
                    </div>
                @endforeach
            </div>

            <div class="text-center">
                {{ $products->links() }}
            </div>
        </div>
    </div>
@endsection
