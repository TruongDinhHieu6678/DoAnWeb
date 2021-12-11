@extends('admin_layout')
@section('admin_content')

<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
        Liệt kê Tài Khoản Khách Hàng
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
            <th>Tên Tài Khoản</th>
            <th>Tên Hiển Thị</th>
            <th>Địa Chỉ</th>
            <th>Điện Thoại</th>
            <th>Email</th>
            
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($all_account as $key => $account)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{$account->TenDangNhap}}</td>
            <td><span class="text-ellipsis">{{$account->TenHienThi}}</span></td>
            <td><span class="text-ellipsis">{{$account->DiaChi}}</span></td>
            <td><span class="text-ellipsis">{{$account->DienThoai}}</span></td>
            <td><span class="text-ellipsis">{{$account->Email}}</span></td>
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
                  <li class="<?php echo $Max_page >= $i ? '': 'hide'; ?>"><a href="{{URL::to('/list-account/'.($page_focus-1))}}"><i class="fa fa-chevron-left disabled"></i></a></li>
                  <?php
                }
                else if($i == $first_page + $number_page-1 && $Max_page-1 > $page_focus)
                {
                  ?>
                  <li class="<?php echo $Max_page >= $i ? '': 'hide'; ?>"><a href="{{URL::to('/list-account/'.($page_focus+1))}}"><i class="fa fa-chevron-right"></i></a></li>
                  <?php
                }
                else if($i != $first_page + $number_page-1){
                  ?>
                    <li class="<?php echo $i==$page_focus ? 'active':''; echo $Max_page >= $i ? '': 'hide'; ?>"><a href="{{URL::to('/list-account/'.$i)}}"><?php echo $i ?></a></li>
                
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
        