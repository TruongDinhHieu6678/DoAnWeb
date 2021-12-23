@extends('admin_layout')
@section('admin_content') 

<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập Nhật Sản Phẩm
                        </header> 
                        <div class="panel-body">
                            <div class="position-center">
                                <?php
		                            $message = Session::get('message');
		                            if($message)
		                            {
			                            echo '<span class="text-alert">',$message.'</span>';
                                    
			                            Session::put('message',null);
		                            }
	                            ?> 
                            </div>
                            @foreach($edit_status_order as $key => $edit_value)
                            <div class="position-center">
                                
                                <form role="form" action="{{URL::to('/update-status-order/'.$edit_value->MaDonDatHang)}}" method="post">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mã Đơn Đặt Hàng </label>
                                    <input type="Text" value="{{$edit_value->MaDonDatHang}}" disabled class="form-control" name="madonhang" placeholder="Mã Đơn Đặt Hàng">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Người Đặt Hàng </label>
                                    <input type="Text" value="{{$edit_value->TenKhachHang}}" disabled class="form-control" name="ngaylap" placeholder="Người Đặt Hàng">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Ngày Lập </label>
                                    <input type="Text" value="{{$edit_value->NgayLap}}" disabled class="form-control" name="ngaylap" placeholder="Ngày Lập">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tổng Thành Tiền </label>
                                    <input type="Text" value="{{$edit_value->TongThanhTien}}" class="form-control" disabled name="tongtien" placeholder="Tổng Thành Tiền">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Trạng Thái </label>
                                    <select name="order_status" class="form-control input-sm m-bot15">
                                        @foreach($all_status_order as $key_lsp => $values_status)
                                            <option value="{{$values_status->MaTinhTrang}}">{{$values_status->TenTinhTrang}}</option>
                                        @endforeach
                                        
                                    </select>
                                </div> 
                                
                                
                                <div class="form-group">
                                <button type="submit" name="update_status_order" class="btn btn-info">Cập Nhật Trạng Thái</button>
                                
                            </form>
                            </div>
                            @endforeach
                        </div>
                    </section>

            </div>
            @endsection
        