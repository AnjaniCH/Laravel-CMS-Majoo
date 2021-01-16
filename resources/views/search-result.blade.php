@extends('home')

@section('content')
    <div class="container bg-light-gray">

        <div class="container">
            <div class="row">
                <h3>Product List</h3>
            </div>
        </div>

        <div class="container p-5">

            <h4><a type="button" href="{{ route('product-list') }}" class="btn btn-info btn-block w-25 mt-4 mx-auto">Back</a>{{ $products->count() }} result(s) for '{{ request()->input('query') }}'</h4>

            <div class="row">

                @foreach($products as $product)

                    <div class="col-md-3 p-4">
                        <img src="{{asset($product->image) }} " alt="card-1" class="card-img-top" style="width: 200px; height: 200px;"></a>

                        <div class="product-name">{{$product->name}}</div></a>
                        <div class="product-price">Rp. {{$product->price}}</div>

                        <a href="/product/{{$product->id}}"  class="btn btn-danger" role="button"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add To Cart</a>
                    </div>
                @endforeach
            </div>


            <tr>
                <td><a type="button" href="{{ route('product-list') }}" class="btn btn-info btn-block w-25 mt-4 mx-auto">Back</a></td>
            </tr>

            <br><br>

        </div>
    </div>
@endsection
