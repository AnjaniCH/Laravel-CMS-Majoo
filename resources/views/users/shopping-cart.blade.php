
@extends('home')

@section('content')
    @if(count($carts) > 0)
        <div class="container-fluid bg-light-gray container-view">

            <div class="container">
                <div class="row justify-content-center">
                    <h3>Your Cart<i class="fas fa-shopping-cart"></i></h3>
                </div>

                <table class="table table-sm text-center table-borderless">
                    <thead class="tborder">
                        <tr>
                            <th scope="col" class="text-center">Image</th>
                            <th scope="col" class="text-center">Name</th>
                            <th scope="col" class="text-center">Qty</th>
                            <th scope="col" class="text-center">Price</th>
                            <th scope="col" class="text-center">Sub Total</th>
                            <th scope="col" class="text-center"></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($carts as $cart)
                            <tr class="tborder">
                                <td><img src="{{ asset( $cart->image ) }}" alt="card-1" class="card-img-top" style="height: 50px;width: 50px"></td>
                                <td>{{ $cart->name}}</td>
                                <td>{{ $cart->qty}}</td>
                                <td>{{ $cart->price }}</td>
                                <td>{{ $cart->subtotal }}</td>

                                <td><a href="/delete-cart/{{$cart->id}}" type="button" class="btn btn-danger">Delete</a></td>
                            </tr>
                        @endforeach

                        <table class="table-sm text-center table-borderless justify-content-end ">
                            <tr>
                                <th scope="row">
                                <td class="border-right">
                                    <p>Total <br>Quantity: {{ $totalQty }}</p>
                                </td>

                                <td class="border-right">
                                    <p1>Grand Total: <br> {{ $totalPrice }} </p1>
                                </td>
                                </th>
                            </tr>

                            <tr><th></th></tr>
                        </table>

                        <tbody>
                            <tr>
                                <th scope="row">
                                    <td colspan="2">
                                        <p>Input Payment:<br> {{ $totalPrice }}</p>
                                    </td>
                                </th>
                            </tr>
                        </tbody>

                    <form action="/shopping-cart/{{Auth::user()->id}}" method="post" class="container-view" enctype="multipart/form-data">
                        {{csrf_field()}}

                        <input type="hidden" name="id" value="{{Auth::user()->id}}">

                        <tr>
                            <td><input type="submit" class="btn btn-primary btn-block w-50 mx-auto" value="Complete the Payment"></td>
                        </tr>

                        <tr>
                            <td><a type="button" href="{{ route('product-list') }}" class="btn btn-success btn-block w-50 mt-4 mx-auto">Back</a></td>
                        </tr>
                    </form>

                    </tbody>
                </table>
            </div>
        </div>
    @else
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12"></div>

                <div class="col-md-4 col-sm-4 col-xs-12 container-view text-center">
                    <h3>Your cart has no item!<i class="fas fa-shopping-cart"></i></h3>
                </div>

                <div class="col-md-4 col-sm-4 col-xs-12"></div>

            </div>
        </div>
    @endif

@endsection