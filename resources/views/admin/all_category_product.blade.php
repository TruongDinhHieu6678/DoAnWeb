@extends('admin_layout')
@section('admin_content')

<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê sản phẩm  
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
            <th>Tên sản phẩm</th>
            <th>Giá Sản Phẩm</th>
            <th>Ngày Nhập</th>
            <th>Số lượng</th>
            <th>Loại sản phẩm</th>
            <th>Hảng sản xuất</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($all_category_product as $values => $category)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{$category->TenSanPham}}</td>
            <td><span class="text-ellipsis">{{$category->GiaSanPham}}</span></td>
            <td><span class="text-ellipsis">{{$category->NgayNhap}}</span></td>
            <td><span class="text-ellipsis">{{$category->SoLuongTon}}</span></td>
            <td><span class="text-ellipsis">{{$category->TenLoaiSanPham}}</span></td>
            <td><span class="text-ellipsis">{{$category->TenHangSanXuat}}</span></td>
            <td>
              <a href="{{URL::to('/edit-category-product/'.$category->MaSanPham)}}" class="active styling-edit" ui-toggle-class=""><i class="fa fa-pencil-square-o text-success text-active"></i></a>
              <a href="{{URL::to('/delete-category-product/'.$category->MaSanPham)}}" class="active styling-edit" ui-toggle-class=""><i class="fa fa-times text-danger text"></i></a>
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
                  <li class="<?php echo $Max_page >= $i ? '': 'hide'; ?>"><a href="{{URL::to('/all-category-product/'.($page_focus-1))}}"><i class="fa fa-chevron-left disabled"></i></a></li>
                  <?php
                }
                else if($i == $first_page + $number_page-1 )
                {
                  ?>
                  <li class="<?php echo $Max_page >= $i ? '': 'hide'; ?>"><a href="{{URL::to('/all-category-product/'.($page_focus+1))}}"><i class="fa fa-chevron-right"></i></a></li>
                  <?php
                }
                else if($i != $first_page + $number_page-1){
                  ?>
                    <li class="<?php echo $i==$page_focus ? 'active':'';echo $Max_page >= $i ? '': 'hide'; ?>"><a href="{{URL::to('/all-category-product/'.$i)}}"><?php echo $i ?></a></li>
                
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
        