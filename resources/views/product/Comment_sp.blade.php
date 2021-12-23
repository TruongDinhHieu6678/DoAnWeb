
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
 @foreach($dateil_sp as $key => $sp_dt)
    <div class="col-sm-9 padding-right">
        <div class="product-details"><!--product-details-->
            <div class="col-sm-5">
                <div class="view-product">
                   
                    <img src="{{URL::to('public/frondend/images/'.$sp_dt -> HinhURL)}}" alt="" />
                    <h3>ZOOM</h3>
                </div>
                <div id="similar-product" class="carousel slide" data-ride="carousel">

                  <!-- Wrapper for slides -->
                  <div class="carousel-inner">
                    <div class="item active">
                      <a href=""><img src="{{URL::to('public/frondend/images/'.$sp_dt -> imageSP)}}" alt=""></a>
                     
                  </div>
                  <div class="item">
                  
                      <a href=""><img src="{{URL::to('public/frondend/images/'.$sp_dt -> imageSP2)}}" alt=""></a>
                  </div>

              </div>

              <!-- Controls -->
              <a class="left item-control" href="#similar-product" data-slide="prev">
                <i class="fa fa-angle-left"></i>
            </a>
            <a class="right item-control" href="#similar-product" data-slide="next">
                <i class="fa fa-angle-right"></i>
            </a>
        </div>

    </div>
    <div class="col-sm-7">
        
        <div class="product-information"><!--/product-information-->
            <img src="#" class="newarrival" alt="" />
            <h1>{{$sp_dt ->TenSanPham}}</h1>
            <p>Còn : {{$sp_dt ->SoLuongTon}} sản phẩm</p>
            <img src="#" alt="" />
            <span>
                <span>{{number_format($sp_dt ->GiaSanPham).'VNĐ'}}</span>
                <label>Số lượng:</label>
                <input type="number" min="1" name="soluong" value="1" />
                <a href="{{URL::to('/Cart-page')}}">
                <button type="button" class="btn btn-fefault cart">
                    <i class="fa fa-shopping-cart"></i>
                    Add to cart
                </button>
                </a>
            </span>
            <p><b>Ngày Nhập: </b>{{$sp_dt ->NgayNhap}}</p>
            <p><b>Tình Trạng: </b> Mới</p>
            <p><b>Thương hiệu: </b>{{$sp_dt -> TenHangSanXuat}}</p>
            <p><b>Loại Sản Phẩm: </b>{{$sp_dt -> TenLoaiSanPham}}</p>
            <a href="#"><img src="{{asset('public/frondend/images/share.png')}}" class="share img-responsive"  alt="" /></a>
            <hr>
            <h5><b><font color="grean"> Các bình luận về sản phẩm:</font></b></h5>
            
             @foreach($show_comment as $key => $show)
             <p>Tên: {{$show->ten_hienthi}}</p>
            <p>Đánh Giá: {!!$show->BinhLuan!!}</p>
            <br>
             @endforeach
        </div><!--/product-information-->

    </div>
</div><!--/product-details-->

            <div class="category-tab shop-details-tab"><!--category-tab-->
                        <div class="col-sm-12">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#details" data-toggle="tab">Mô Tả</a></li>
                                <li><a href="#companyprofile" data-toggle="tab">Sản Phẩm Liên Quan</a></li>
                                
                                <li><a href="#reviews" data-toggle="tab">Đánh Giá</a></li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade active in" id="details" >
                                <!-- mô tả sản phẩm-->
                                 <p>{!!$sp_dt -> MoTa!!}</p>
                                   
                            </div>
                            
                            <div class="tab-pane fade" id="companyprofile" >
                                <!-- sản phẩm liên quan-->
                                 @foreach($sp_lienquan as $key => $sp_lq)
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <a href="{{URL::to('/chi-tiet-sp/'.$sp_lq -> MaSanPham)}}">
                                                <img src="{{URL::to('public/frondend/images/'.$sp_lq -> HinhURL)}}" alt="" />
                                                <h2>{{number_format($sp_lq ->GiaSanPham).'VNĐ'}}</h2>
                                                <p>{{$sp_lq ->TenSanPham}}</p></a>
                                                <a href="{{URL::to('/Cart-page')}}"> <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                 <div class="text-center">{!! $sp_lienquan ->links() !!}</div> 
                            </div>
                           
                           <?php 
                            $acc = Session::get('acc');
                            $id_u = Session::get('id_u');
                            if ($acc != null || $id_u != null){


                                ?>
                               <div class="tab-pane fade" id="reviews" >
                                <!--đánh giá sản phẩm-->
                                <div class="col-sm-12">
                                    <ul>
                                        <li><a href=""><i class="fa fa-user"></i><?php $name = Session::get('ten_user');
                                    if($name){
                                        echo $name;
                                        Session::put('name',null);
                                    }?></a></li>
                                        <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
                                        <li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
                                    </ul>

                                    <?php $thongbao = Session::get('thongbao');
                                    if($thongbao){
                                        echo $thongbao;
                                        Session::put('thongbao',null);
                                    }?>

                                    <p>Đánh Giá của bạn về sản phẩm này</b></p>
                                    
                                    <form action="{{URL::to('/chi-tiet-sp/'.$sp_dt -> MaSanPham)}}" method="post">
                                        {{csrf_field()}}
                                        <span>
                                            <input type="text" name="ten" placeholder="Your Name"/>
                                            <input type="email" name="tenuser" placeholder="Email Address"/>
                                        </span>
                                        <textarea name="comment" ></textarea>
                                        <b>Rating: </b> <img src="{{asset('public/frondend/images/rating.png')}}" alt="" />
                                        <input class="pull-right" type="submit" value="Bình Luận">
                                    </form>
                                </div>
                            </div>
                                <?php
                            }else{
                                ?>
                                 <?php $message_cn = Session::get('message_cn');
                                    if($message_cn){
                                        echo $message_cn;
                                    
                                    }?>
                                <?php 
                            }
                            ?>
                        </div>
                    </div><!--/category-tab-->
  @endforeach



<script src="{{asset('public/frondend/js/jquery.js')}}"></script>
<script src="{{asset('public/frondend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('public/frondend/js/jquery.scrollUp.min.js')}}"></script>
<script src="{{asset('public/frondend/js/price-range.js')}}"></script>
<script src="{{asset('public/frondend/js/jquery.prettyPhoto.js')}}"></script>
<script src="{{asset('public/frondend/js/main.js')}}"></script>
<script src="{{asset('public/frondend/js/money.js')}}"></script>

</html>


