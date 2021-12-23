@extends('admin_layout')
@section('admin_content')

<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê Đơn Hàng
    </div>

      <?php
		  $message = Session::get('message');
		  if($message)
		  {
		    echo '<span class="text-alert">',$message.'</span>';
          
		    Session::put('message',null);
		  }
	  ?> 

    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>Mã Đặt Đơn Hàng</th>
            <th>Tài Khoản Đặt Hàng</th>
            <th>Ngày Lập</th>
            <th>Tổng Thành Tiền</th>
            <th>Tình Trạng</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($all_order as $values => $order)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{$order->MaDonDatHang}}</td>
            <td><span class="text-ellipsis">{{$order->TenKhachHang}}</span></td>
            <td><span class="text-ellipsis">{{$order->NgayLap}}</span></td>
            <td><span class="text-ellipsis">{{$order->TongThanhTien}}</span></td>
            <td><span class="text-ellipsis">{{$order->TenTinhTrang}}</span></td>
            <td>
              <a href="{{URL::to('/edit-status-order/'.$order->MaDonDatHang)}}" class="active styling-edit" ui-toggle-class=""><i class="fa fa-pencil-square-o text-success text-active"></i></a>
            </td>
          </tr> 
          @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
          <?php
              $page_focus = Session::get('page_focus');
              $first_page = $page_focus - 6 < 0 ? 1 : ($page_focus-4);
              $number_page = 6;
              if($page_focus <= 4)
              {
                  $number_page--;
              }
              for ($i=$first_page; $i < $first_page + $number_page ; $i++ ) { 
                if($i == $first_page && $page_focus >= 5)
                {
                  ?>
                  <li class="<?php echo $Max_page >= $i ? '': 'hide'; ?>"><a href="{{URL::to('/all-order/'.($page_focus-1))}}"><i class="fa fa-chevron-left disabled"></i></a></li>
                  <?php
                }
                else if($i == $first_page + $number_page-1 && $Max_page-1 > $page_focus)
                {
                  ?>
                  <li class="<?php echo $Max_page >= $i ? '': 'hide'; ?>"><a href="{{URL::to('/all-order/'.($page_focus+1))}}"><i class="fa fa-chevron-right"></i></a></li>
                  <?php
                }
                else if($i != $first_page + $number_page-1){
                  ?>
                    <li class="<?php echo $i==$page_focus ? 'active':''; echo $Max_page >= $i ? '': 'hide'; ?>"><a href="{{URL::to('/all-order/'.$i)}}"><?php echo $i ?></a></li>
                
                  <?php
                }
                
              }

            ?>
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection
        