<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i>{{getConfigValueFromSettingTable('phone_contact')}}</a></li><!--composer dump-autoload cập nhật lại composer.json để tạo đường dẫn helper-->
                            <li><a href="#"><i class="fa fa-envelope"></i> {{getConfigValueFromSettingTable('email')}}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li>
                                <a href="{{getConfigValueFromSettingTable('facebook_link')}}"><i class="fa fa-facebook"></i></a>
                            </li>

                            <li>
                                <a href="{{getConfigValueFromSettingTable('linkendin_link')}}"><i class="fa fa-linkedin"></i></a>
                            </li>


                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->

    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="index.html"><img src="eshopper/images/home/logo.png" alt="" /></a>
                    </div>
                    <div class="btn-group pull-right">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                USA
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="#">Canada</a></li>
                                <li><a href="#">UK</a></li>
                            </ul>
                        </div>

                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                DOLLAR
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="#">Canadian Dollar</a></li>
                                <li><a href="#">Pound</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            @if(auth()->check())
                            <li><a href="#"><i class="fa fa-user"></i> {{auth()->user()->name}}</a></li>
                            @else
                            <li><a href="#"><i class="fa fa-user"></i> Account</a></li>
                            @endif
                            <li><a href="#"><i class="fa fa-star"></i> Wishlist</a></li>
                            <li>
                                <a href="{{route('showCart')}}"><i class="fa fa-shopping-cart"></i> Cart</a>
                            </li>
                            @if (auth()->check())
                            <li>
                                <a href="">
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" style="background:none;border:none;color:inherit;padding:0;cursor:pointer;">
                                            <i class="fa fa-sign-out"></i> Logout
                                        </button>
                                    </form>
                                </a>
                            </li>

                            @else
                            <li><a href="{{route('indexLogin')}}"><i class="fa fa-lock"></i> Login</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>

                    <!-- main menu-->
                    @include('components.main_menu')
                    <!--end main menu-->

                </div>

                <!-- Search -->
                <div class="col-sm-3">
                    <div class="search_box pull-right">
                        <form action="{{route('search')}}">
                            <input type="text" name="query" placeholder="Search products..." value="{{request('query')}}" />
                        </form>
                    </div>
                </div>
                <!--End Search -->

            </div>
        </div>
    </div><!--/header-bottom-->
</header><!--/header-->