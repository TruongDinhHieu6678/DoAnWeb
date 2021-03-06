<!--trang home-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Supper | Shopper</title>
    <link href="{{asset('public/frondend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frondend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frondend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('public/frondend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('public/frondend/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('public/frondend/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('public/frondend/css/responsive.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
<![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png')}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png')}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png')}">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png')}">
</head><!--/head-->

<body>
    <header id="header"><!--header-->
        <div class="header_top"><!--header_top-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="contactinfo">
                            <ul class="nav nav-pills">
                                <li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i> info@domain.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="social-icons pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header_top-->

        <div class="header-bottom"><!--header-bottom-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li><a href="{{URL::to('/trang-chu')}}">Trang Ch???</a></li>
                                <li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="shop.html">S???n Ph???m</a></li>

                                    </ul>
                                </li> 

                                <li><a href="{{URL::to('/Cart-page')}}">Gi??? h??ng</a></li>
                                <li><a href="contact-us.html">Li??n h???</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <form action="{{URL::to('/Tim-kiem')}}" method="POST">
                            {{csrf_field()}}
                            <div class="search_box pull-right">
                                <input type="text" name="Search" placeholder="Search"/>
                                <input type="submit" name="search" class="btn btn-success btn-sm" value="t??m ki???m">
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div><!--/header-bottom-->

        
        <div class="header-middle"><!--header-middle-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="logo pull-left">
                            <a href="#"><img src="{{('public/fronden/images/logo.png')}}" alt="" /></a>
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
                                <?php $acc = Session::get('acc');
                                if ($acc != null){
                                    ?>
                                    <!-- hi???n th??? t??n user ???? l???y ??? c??c controller login regist-->
                                    <li><a href="{{URL::to('/User-page')}}"><i class="fa fa-user"></i><?php $name = Session::get('ten_user');


                                    if($name){
                                        echo $name;
                                        Session::put('name',null);
                                    }
                                    else{
                                        echo 'T??i Kho???n';

                                    }?>
                                </a></li>
                                <?php
                            }else{
                                ?>
                                <li><a href="#"><i class="fa fa-user"></i>T??i Kho???n</a></li>                             
                                <?php 
                            }
                            ?>




                            <li><a href="checkout.html"><i class="fa fa-crosshairs"></i> Checkout</a></li>

                            <li><a href="{{URL::to('/Cart-page')}}"><i class="fa fa-shopping-cart"></i> Gi??? h??ng</a></li>

                            <?php 
                            $acc = Session::get('acc');
                            $id_u = Session::get('id_u');
                            if ($acc != null || $id_u != null){


                                ?>
                                <li><a href="{{URL::to('/Login-page')}}"><i class="fa fa-lock"></i> ????ng xu???t</a></li>
                                <?php
                            }else{
                                ?>
                                <li><a href="{{URL::to('/Login-page')}}"><i class="fa fa-lock"></i> ????ng Nh???p</a></li>
                                <?php 
                            }
                            ?>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->


</header><!--/header-->

<section id="slider"><!--slider-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#slider-carousel" data-slide-to="1"></li>
                        <li data-target="#slider-carousel" data-slide-to="2"></li>
                    </ol>
                    
                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="col-sm-6">
                                <h1><span>Supper</span>-SHOPPER</h1>
                                <h2>Vivo-v20</h2>
                                <p>S???n ph???m gi???m gi?? ?????c bi???t .</p>     
                                <a href="{{URL::to('/chi-tiet-sp/'.$sp -> MaSanPham=28)}}">                       
                                    <button type="button" class="btn btn-default get">Get it now</button></a>  
                                </div>
                                <div class="col-sm-6">
                                    <a href="{{URL::to('/chi-tiet-sp/'.$sp -> MaSanPham=28)}}">
                                        <img src="{{asset('public/frondend/images/vivo-v20-2021-203721-063746.jpg')}}" class="girl img-responsive" alt="" />
                                    </a>
                                    <img src="{{asset('public/frondend/images/pricing.png')}}"  class="pricing" alt="" />
                                </div>
                            </div>
                            <div class="item">
                                <div class="col-sm-6">
                                    <h1><span>Supper</span>-SHOPPER</h1>
                                    <h2>Oppo-reno6-5g-b???c</h2>
                                    <p>S???n ph???m gi???m gi?? ?????c bi???t . </p>
                                    <a href="{{URL::to('/chi-tiet-sp/'.$sp -> MaSanPham=48)}}">
                                        <button type="button" class="btn btn-default get">Get it now</button></a>
                                    </div>
                                    <div class="col-sm-6">
                                        <a href="{{URL::to('/chi-tiet-sp/'.$sp -> MaSanPham=48)}}">
                                            <img src="{{asset('public/frondend/images/oppo-reno6-z-5g-bac-1-org.jpg')}}" class="girl img-responsive" alt="" /></a>
                                            <img src="{{asset('public/frondend/images/pricing.png')}}"  class="pricing" alt="" />
                                        </div>
                                    </div>

                                    <div class="item">
                                        <div class="col-sm-6">
                                            <h1><span>Supper</span>-SHOPPER</h1>
                                            <h2>Vivo-y21s</h2>
                                            <p>S???n ph???m gi???m gi?? ?????c bi???t . </p>
                                            <a href="{{URL::to('/chi-tiet-sp/'.$sp -> MaSanPham=58)}}">
                                                <button type="button" class="btn btn-default get">Get it now</button> </a>
                                            </div>
                                            <div class="col-sm-6">
                                                <a href="{{URL::to('/chi-tiet-sp/'.$sp -> MaSanPha=58)}}">
                                                    <img src="{{asset('public/frondend/images/vivo-y21s-5.jpg')}}" class="girl img-responsive" alt="" />
                                                </a>
                                                <img src="{{asset('public/frondend/images/pricing.png')}}" class="pricing" alt="" />
                                            </div>
                                        </div>

                                    </div>

                                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                                        <i class="fa fa-angle-left"></i>
                                    </a>
                                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                                        <i class="fa fa-angle-right"></i>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </section><!--/slider-->

                <section><!--container-->
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="left-sidebar">
                                    <h2>Danh M???c S???n Ph???m</h2>
                                    <div class="panel-group category-products" id="accordian"><!--category-productsr-->

                                        @foreach($loaisp as $key => $cate)
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title"><a href="{{URL::to('/danh-muc-sp/'.$cate -> MaLoaiSanPham)}}">{{$cate ->TenLoaiSanPham}}</a></h4>
                                            </div>
                                        </div>

                                        @endforeach
                                    </div><!--/category-products-->

                                    <div class="brands_products"><!--brands_products-->
                                        <h2>Th????ng hi???u</h2>
                                        <div class="brands-name">
                                            @foreach($t_h as $key => $thuonghieu)

                                            <ul class="nav nav-pills nav-stacked">
                                                <li><a href="{{URL::to('/thuong-hieu-sp/'.$thuonghieu -> MaHangSanXuat)}}"> <span class="pull-right">({{$sp->SoLuongTon}})</span>{{$thuonghieu->TenHangSanXuat}}</a></li>

                                            </ul>
                                            @endforeach

                                        </div>
                                    </div><!--/brands_products-->


                                    <div class="shipping text-center"><!--shipping-->
                                        <img src="{{asset('public/frondend/images/shipping.jpg')}}" alt="" />
                                    </div><!--/shipping-->

                                </div>
                            </div>

                            <div class="col-sm-9 padding-right">
                                <!---home--->                     
                                @yield('noidung')
                            </div>

                        </div>
                    </div>
                </section>

                <footer id="footer"><!--Footer-->
                    <div class="footer-top">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="companyinfo">
                                        <h2><span>Supper</span>-shopper</h2>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor</p>
                                    </div>
                                </div>
                                <div class="col-sm-7">
                                    <div class="col-sm-3">
                                        <div class="video-gallery text-center">
                                            <a href="#">
                                                <div class="iframe-img">
                                                    <img src="{{asset('public/frondend/images/iframe1.png')}}" alt="" />
                                                </div>
                                                <div class="overlay-icon">
                                                    <i class="fa fa-play-circle-o"></i>
                                                </div>
                                            </a>
                                            <p>Circle of Hands</p>
                                            <h2>24 DEC 2014</h2>
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="video-gallery text-center">
                                            <a href="#">
                                                <div class="iframe-img">
                                                    <img src="{{asset('public/frondend/images/iframe2.png')}}" alt="" />
                                                </div>
                                                <div class="overlay-icon">
                                                    <i class="fa fa-play-circle-o"></i>
                                                </div>
                                            </a>
                                            <p>Circle of Hands</p>
                                            <h2>24 DEC 2014</h2>
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="video-gallery text-center">
                                            <a href="#">
                                                <div class="iframe-img">
                                                    <img src="{{asset('public/frondend/images/iframe3.png')}}" alt="" />
                                                </div>
                                                <div class="overlay-icon">
                                                    <i class="fa fa-play-circle-o"></i>
                                                </div>
                                            </a>
                                            <p>Circle of Hands</p>
                                            <h2>24 DEC 2014</h2>
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="video-gallery text-center">
                                            <a href="#">
                                                <div class="iframe-img">
                                                    <img src="{{asset('public/frondend/images/iframe4.png')}}" alt="" />
                                                </div>
                                                <div class="overlay-icon">
                                                    <i class="fa fa-play-circle-o"></i>
                                                </div>
                                            </a>
                                            <p>Circle of Hands</p>
                                            <h2>24 DEC 2014</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="address">
                                        <img src="{{asset('public/frondend/images/map.png')}}" alt="" />
                                        <p>505 S Atlantic Ave Virginia Beach, VA(Virginia)</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="footer-widget">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="single-widget">
                                        <h2>Service</h2>
                                        <ul class="nav nav-pills nav-stacked">
                                            <li><a href="#">Online Help</a></li>
                                            <li><a href="#">Contact Us</a></li>
                                            <li><a href="#">Order Status</a></li>
                                            <li><a href="#">Change Location</a></li>
                                            <li><a href="#">FAQ???s</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="single-widget">
                                        <h2>Quock Shop</h2>
                                        <ul class="nav nav-pills nav-stacked">
                                            <li><a href="#">?????ng H???</a></li>
                                            <li><a href="#">LapTop</a></li>
                                            <li><a href="#">??i???n tho???i c???m ???ng</a></li>
                                            <li><a href="#">??i???n tho???i ph??m</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="single-widget">
                                        <h2>Policies</h2>
                                        <ul class="nav nav-pills nav-stacked">
                                            <li><a href="#">Terms of Use</a></li>
                                            <li><a href="#">Privecy Policy</a></li>
                                            <li><a href="#">Refund Policy</a></li>
                                            <li><a href="#">Billing System</a></li>
                                            <li><a href="#">Ticket System</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="single-widget">
                                        <h2>About Shopper</h2>
                                        <ul class="nav nav-pills nav-stacked">
                                            <li><a href="#">Company Information</a></li>
                                            <li><a href="#">Careers</a></li>
                                            <li><a href="#">Store Location</a></li>
                                            <li><a href="#">Affillate Program</a></li>
                                            <li><a href="#">Copyright</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-sm-3 col-sm-offset-1">
                                    <div class="single-widget">
                                        <h2>About Shopper</h2>
                                        <form action="#" class="searchform">
                                            <input type="text" placeholder="Your email address" />
                                            <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
                                            <p>Get the most recent updates from <br />our site and be updated your self...</p>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="footer-bottom">
                        <div class="container">
                            <div class="row">
                                <p class="pull-left">Copyright ?? 2013 E-SHOPPER Inc. All rights reserved.</p>
                                <p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
                            </div>
                        </div>
                    </div>

                </footer><!--/Footer-->



                <script src="{{asset('public/frondend/js/jquery.js')}}"></script>
                <script src="{{asset('public/frondend/js/bootstrap.min.js')}}"></script>
                <script src="{{asset('public/frondend/js/jquery.scrollUp.min.js')}}"></script>
                <script src="{{asset('public/frondend/js/price-range.js')}}"></script>
                <script src="{{asset('public/frondend/js/jquery.prettyPhoto.js')}}"></script>
                <script src="{{asset('public/frondend/js/main.js')}}"></script>
                <script src="{{asset('public/frondend/js/money.js')}}"></script>

                <!--s???n ph???m y??u th??ch-->
                <script type="text/javascript">
                    function view(){
                        if(localStorage.getItem('data')!=null){
                            var data = JSON.parse(localStorage.getItem('data'));
                            for(i = 0; i< data.length;i++){
                                var name = data[i].name;
                                var price = data[i].price;
                                var image = data[i].image;
                                $('#show_product').append('  <div class="col-sm-4"><div class="product-image-wrapper"> <div class="single-products"><div class="productinfo text-center"><a href="{{URL::to('/chi-tiet-sp/'.$sp -> MaSanPham)}}"> <img src="'+image+'"/> </a> <h2>'+price+'</h2> <p> '+name+' </p><a href="{{URL::to('/Cart-page')}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a> </div> </div></div></div>');



                            }
                        }
                    }
                    view();
                    function SP_YeuThich(click_id){
                        var id = click_id;

                        var name = document.getElementById('name_product'+id).value;

                        var image = document.getElementById('image_product'+id).src;
                        var price = document.getElementById('price_product'+id).value;
                        var newItem= {
                            'id':id,
                            'name':name,
                            'image':image,
                            'price':price
                        }
                        if(localStorage.getItem('data')==null){
                            localStorage.setItem('data','[]');
                        }
                        var old_data = JSON.parse(localStorage.getItem('data'));
                        old_data.push(newItem);
                        localStorage.setItem('data',JSON.stringify(old_data));

                    }
                </script>

            </body>
            </html>