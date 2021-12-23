@extends('welcome')
@section('noidung')
<div class="features_items"><!--features_items-->
	<h2 class="title text-center">Kết Quản Tìm Kiếm Sản Phẩm</h2>


	@foreach($search as $key => $sp)
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
					<h2 >{{number_format($sp ->GiaSanPham).'VNĐ'}}</h2> <!-- gán cái key đã có trỏ tới thuộc tính cần show -->
					<p>{{$sp ->TenSanPham}}</p>
					<a href="{{URL::to('/Cart-page')}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
				</div>
				
			</div>
			<div class="choose">
				<ul class="nav nav-pills nav-justified">
					
					<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
					<li class="fa fa-plus-square">
						<button id="{{$sp->MaSanPham}}" onclick="SP_YeuThich(this.id);"><span>yêu thích</span></button><!--lấy id sp vào function bởi chính nó-->
					</li>
				</ul>
			</div>
		</div>
	</div>

	@endforeach
	<div class="text-center">{!! $search ->links() !!}</div> 
</div><!--features_items-->
@endsection