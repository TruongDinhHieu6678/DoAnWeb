
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

	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{URL::to('/trang-chu')}}">Trang chủ</a></li>
				  <li class="active">Thanh toán đơn hàng</li>
				</ol>
			</div><!--/breadcrums-->
			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-12 clearfix">
						<div class="bill-to">
							<p>Thông tin đơn hàng</p>
							<div class="form-one">
								<form>
									
									<input type="text" placeholder="Họ tên">
									<input type="text" placeholder="Địa chỉ người nhận">
									<input type="text" placeholder="Số điện thoại">
									<input type="email" placeholder="Email">
									<textarea name="message"  placeholder="Ghi lưu ý với Shop và shipper " rows="16"></textarea>
								</form>
							</div>
							
						</div>
					</div>
									
				</div>
			</div>
			<div class="review-payment">
				<h2>Xem lại giỏ hàng</h2>
				<div class="table-responsive cart_info">
				<?php
				   $content = Cart::content();
				?>
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Hình ảnh</td>
							<td class="description">Mô tả</td>
							<td class="price">Giá</td>
							<td class="quantity">Số lượng</td>
							<td class="total">Tổng tiền</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						@foreach($content as $v_content)
						<tr>
							<td class="cart_product">
								<a href=""><img  src="{{URL::to('public/frondend/images/'.$v_content ->options->image)}}" width="70" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{$v_content->name}}</a></h4>
								
							</td>
							<td class="cart_price">
								<p>{{number_format($v_content ->price).' '.'VNĐ'}}</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<form action="{{URL::to('/update-cart-quantity')}}" method="POST">
								    {{csrf_field()}}
									<input class="cart_quantity_input" type="text" name="cart_quantity" value="{{$v_content->qty}}" >
									<input type="hidden" name="rowId_cart" value="{{$v_content->rowId}}" class="form-control">
									<input type="submit" name="update_qty" value="Cập nhật" class="btn btn-default btn-sm">
									</form>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">
									<?php 
									  $subTotal = $v_content->price * $v_content->qty;
									  echo number_format($subTotal).' '.'VNĐ';
									?>
								</p>
							</td>
							<td class="cart_delete">
								<a onclick="return confirm('Bạn có muốn xóa sản phẩm này?')" class="cart_quantity_delete" href="{{URL::to('/delete-cart/'.$v_content->rowId)}}"><i class="fa fa-times"></i></a>
							</td>
						</tr>
                        @endforeach
						
					</tbody>
				</table>
			</div>
			</div>

			
			<div class="payment-options">
					
					<span>
						<a  class="btn btn-primary check_out" href="{{URL::to('/thanhtoan_thanhcong')}}">Đặt hàng</a>
					</span>
				</div>
		</div>
	</section> <!--/#cart_items-->



<script src="{{asset('public/frondend/js/jquery.js')}}"></script>
<script src="{{asset('public/frondend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('public/frondend/js/jquery.scrollUp.min.js')}}"></script>
<script src="{{asset('public/frondend/js/price-range.js')}}"></script>
<script src="{{asset('public/frondend/js/jquery.prettyPhoto.js')}}"></script>
<script src="{{asset('public/frondend/js/main.js')}}"></script>
<script src="{{asset('public/frondend/js/money.js')}}"></script>
</body>
</html>
