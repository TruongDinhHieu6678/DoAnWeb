@extends('welcome')
@section('noidung')
<div class="features_items"><!--features_items-->
	<h2 class="title text-center">Danh mục Sản Phẩm</h2>


	@foreach($sanpham_loai as $key => $sp)
	<div class="col-sm-4">
		<div class="product-image-wrapper">
			<div class="single-products">
				<div class="productinfo text-center">
					<img src="{{URL::to('public/frondend/images/'.$sp -> HinhURL)}}" alt="" />
					<h2>{{$sp ->GiaSanPham}}</h2>
					<p>{{$sp ->TenSanPham}}</p>
					<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
				</div>
				
			</div>
			<div class="choose">
				<ul class="nav nav-pills nav-justified">
					<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
					<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
				</ul>
			</div>
		</div>
	</div>

	@endforeach
<div class="text-center">{!! $sanpham_loai ->links() !!}</div> 
</div><!--features_items-->

@endsection

