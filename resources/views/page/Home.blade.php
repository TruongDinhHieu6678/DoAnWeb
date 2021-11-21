@extends('welcome')
@section('noidung')

<div class="features_items"><!--features_items-->
	
	<h2 class="title text-center">Danh Sách Sản Phâm</h2>



	@foreach($all_SP as $key => $sp_id)

	<a href="{{URL::to('/product-details')}}">
	<div class="col-sm-4">
		<div class="product-image-wrapper">
			<div class="single-products">
				<div class="productinfo text-center">
					<img src="{{URL::to('public/frondend/images/'.$sp_id -> HinhURL)}}" alt="" />
					<h2>{{number_format($sp_id ->GiaSanPham). ' '.'VND'}}</h2>
					<p>{{$sp_id ->TenSanPham}}</p>
					<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
				</div>
				
			</div>
			<div class="choose">
				<ul class="nav nav-pills nav-justified">
					<li><a href="#"><i class="fa fa-plus-square"></i>Thêm vào giỏ hàng</a></li>
					<li><a href="#"><i class="fa fa-plus-square"></i>Thêm Nhận Xét</a></li>
				</ul>
			</div>
		</div>
	</div>
	</a>
	@endforeach
<div class="text-center">{!! $all_SP -> links() !!}</div>
</div><!--features_items-->




@endsection