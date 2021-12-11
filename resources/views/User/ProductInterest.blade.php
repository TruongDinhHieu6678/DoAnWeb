@extends('welcome')
@section('noidung')
<!-- page nội dung của trang web -->
<div class="features_items"><!--features_items-->
	<h2 class="title text-center">Các Sản Phẩm Mới Được đề Xuất Đến Bạn</h2>

	<div class="brands_products">
		
		<div class="brands-name">
			<div id="show_product" class="row"></div>
		</div>
	</div>

	@foreach($all_SP as $key => $sp) <!-- duyệt sp -->

	@endforeach
	<div class="text-center">{!! $all_SP ->links() !!}</div> <!-- phân page tương ứng với số sp ở paginate() đã khai báo -->
</div><!--features_items-->

@endsection