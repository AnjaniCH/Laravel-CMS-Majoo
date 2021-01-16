<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    @guest
                        <div class="logo">
                            <img src="{{ URL::asset('img/majoo_logo.png') }}" width="100" height="45" class="d-inline-block align-top mt-2" alt="">
                        </div>
                    {{--@else--}}
                    @elseif(auth()->user()->admin == 0)
                        <div class="collapse navbar-collapse d-inline-block" id="navbarSupportedContent">
                             <ul class="navbar-nav mr-auto ">
                                 <div class="logo mr-3"><img src="{{ URL::asset('img/majoo_logo.png') }}" width="100" height="45" class="d-inline-block align-top" alt=""></div>

                                 <li>
                                     <a class="nav-link" href="/redirectUpdateProfile/{{Auth::user()->id}}">Update Profile<span class="sr-only">(current)</span></a>
                                 </li>

                                 <li>
                                     <a class="nav-link" href="{{route('product-list')}}">Product List<span class="sr-only">(current)</span></a>
                                 </li>

                                 <li>
                                     <a class="nav-link" href="{{ route('shopping-cart') }}"><i class="fas fa-shopping-cart"></i>Cart<span class="sr-only badge">(current)</span></a>
                                 </li>

                                 <li>
                                     <a class="nav-link" href="{{route('history-transaction')}}">Transaction History<span class="sr-only">(current)</span></a>
                                 </li>
                            </ul>
                        </div>
                    @elseif(auth()->user()->admin == 1)
                        <div class="collapse navbar-collapse d-inline-block" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto ">
                                <div class="logo mr-3"><img src="{{ URL::asset('img/majoo_logo.png') }}" width="100" height="45" class="d-inline-block align-top" alt=""></div>

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Products
                                    </a>

                                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" >
                                        <a class="dropdown-item" href="{{ route('insert-product') }}">Insert Product</a>
                                        <a class="dropdown-item" href="{{ route('manage-product') }}">Manage Products</a>
                                    </div>
                                </li>

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Brand
                                    </a>

                                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <a class="dropdown-item" href="{{ route('insert-brand') }}">Insert Brand</a>
                                        <a class="dropdown-item" href="{{ route('manage-brand') }}">Manage Brands</a>
                                    </div>
                                </li>

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Member
                                    </a>

                                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <a class="dropdown-item" href="{{ route('insert-member') }}">Insert Member</a>
                                        <a class="dropdown-item" href="{{ route('manage-member') }}">Manage Members</a>
                                    </div>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="/transaction-list">Transaction List<span class="sr-only">(current)</span></a>
                                </li>

                            </ul>
                        </div>


                    @endguest
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @guest
                        <div class="collapse navbar-collapse d-inline-block" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">
                                <li><a class="nav-link mr-3">{{date("D, d M Y")}}</a></li>
                                <li><a class="nav-link mr-3" href="{{ route('login') }}">Login</a></li>
                                <li><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                            </ul>
                        </div>

                    @elseif(auth()->user()->admin == 0)

                        <div class="collapse navbar-collapse d-inline-block" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">
                                <li><a class="nav-link active">{{date("D, d M Y")}}</a></li>
                                <li>
                                    <a class="nav-link active">Hi, {{ auth()->user()->name }}</a>
                                </li>
                                <li>
                                    <a class="nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                </li>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </ul>
                        </div>

                    @elseif(auth()->user()->admin == 1)
                        <div class="collapse navbar-collapse d-inline-block" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">
                                <li><a class="nav-link active">{{date("D, d M Y")}}</a></li>
                                <li>
                                    <a class="nav-link active">Hi, Admin</a>
                                </li>
                                <li>
                                    <a class="nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                </li>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </ul>
                        </div>

                    @endguest
                </ul>
            </div>
        </div>
    </nav> <!-- end top-nav -->
</header>