@extends('welcome')
@section('noidung')
<!-- page nội dung của trang web -->
<div class="features_items"><!--features_items-->
	<h2 class="title text-center">Sản Phẩm</h2>


	@foreach($all_SP as $key => $sp) <!-- duyệt sp -->
	<div class="col-sm-4">
		<div class="product-image-wrapper">
			<div class="single-products">
				<div class="productinfo text-center">
						<form>
						{{csrf_field()}}
						<input type="hidden" value="$sp->MaSanPham">
						<input type="hidden" id="name_product{{$sp->MaSanPham}}" value="{{$sp->TenSanPham}}">
						<input type="hidden" id="price_product{{$sp->MaSanPham}}" value="{{$sp->TenSanPham}}VNĐ">
						<a href="{{URL::to('/chi-tiet-sp/'.$sp -> MaSanPham)}}"><img type="hidden" id="image_product{{$sp->MaSanPham}}" src="{{URL::to('public/frondend/images/'.$sp -> HinhURL)}}" alt=""></a>
					</form>

					
						
					
					<h2 >{{$sp ->GiaSanPham}}VNĐ</h2> <!-- gán cái key đã có trỏ tới thuộc tính cần show -->
					<p>{{$sp ->TenSanPham}}</p>
					<a href="{{URL::to('/Cart-page')}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
				</div>
				
			</div>
			<div class="choose">
				<ul class="nav nav-pills nav-justified">
					
					<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
					<li class="fa fa-plus-square">
						<button id="{{$sp->MaSanPham}}" onclick="SP_YeuThich(this.id);"><span>yêu thích</span></button><!--lấy id sp vào function bởi chính nó-->
					</li>
				</ul>
			</div>
		</div>
	</div>

	@endforeach
	<div class="text-center">{!! $all_SP ->links() !!}</div> <!-- phân page tương ứng với số sp ở paginate() đã khai báo -->
</div><!--features_items-->


<div class="recommended_items"><!--recommended_items-->
	<h2 class="title text-center">Sản Phẩm Cũ</h2>

	<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
			<div class="item active">   

				
				@foreach($sp_cu as $key => $sp_cu)
				<div class="col-sm-4">
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								

								<a href="{{URL::to('/chi-tiet-sp/'.$sp_cu -> MaSanPham)}}">
									<img src="{{URL::to('public/frondend/images/'.$sp_cu -> HinhURL)}}"  />
								</a>
								<h2>{{$sp ->GiaSanPham}}VNĐ</h2>
								<p>{{$sp_cu ->TenSanPham}}</p>
								<a href="{{URL::to('/Cart-page')}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
							</div>

						</div>
					</div>
				</div>

				@endforeach

			</div>
			
		</div>
		<a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
			<i class="fa fa-angle-left"></i>
		</a>
		<a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
			<i class="fa fa-angle-right"></i>
		</a>          
	</div>
</div><!--/recommended_items-->

@endsection