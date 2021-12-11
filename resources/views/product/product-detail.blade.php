@foreach($dateil_sp as $key => $sp_dt)
<div class="col-xs-4 item-photo">

	<img style="max-width:100%;" src="{{URL::to('public/frondend/images/'.$sp_dt -> HinhURL)}}" />
</div>
<h3>{{$sp_dt ->TenSanPham}}</h3>  
@endforeach    