
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap CRUD Data Table for Database with Modal Form</title>
    <link href="{{('public/frondend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{('public/frondend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{('public/frondend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{('public/frondend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{('public/frondend/css/animate.css')}}" rel="stylesheet">
    <link href="{{('public/frondend/css/main.css')}}" rel="stylesheet">
    <link href="{{('public/frondend/css/responsive.css')}}" rel="stylesheet">
    <link href="{{('public/frondend/css/manager.css')}}" rel="stylesheet">

    <style>
    img{
        width: 200px;
        height: 120px;
    }
</style>
<body>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Edit <b>Customer</b></h2>
                    </div>
                    <div class="col-sm-6">
                    </div>
                </div>
            </div>
        </div>
        <div id="editEmployeeModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{URL::to('/User-page')}}" method="POST">
                        {{csrf_field()}}
                        <div class="modal-header">						
                            <h4 class="modal-title">Edit Customer</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">					
                            <div class="form-group">
                               <?php $acc = Session::get('acc');?>
                               <?php $name = Session::get('ten_user');?>
                               <?php $sdt = Session::get('sdt');?>
                               <?php $diachi = Session::get('diachi');?>
                               <?php $mail = Session::get('mail');?>
                               <label>mã khách hàng</label>
                               <input value="  <?php echo $acc?>" readonly="readonly" name="MaKhachHang" type="text" class="form-control" required>
                           </div>
                           <div class="form-group">
                            <label>Tên khách hàng</label>
                            <input value="<?php echo $name?>" name="TenKhachHang" type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Địa chỉ</label>
                            <input value="<?php echo $diachi?>" name="DiaChi" type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Điện thoại</label>
                            <input value="<?php echo $sdt?>" name="DienThoai" type="text" class="form-control" required>
                        </div>         
                        <div class="form-group">
                            <label>Email</label>
                            <input value="<?php echo $mail?>" name="Email" type="text" class="form-control" required>
                        </div>


                    </div>
                    <div class="modal-footer">
                       <a href="{{URL::to('/User-page')}}"><button type="button" class="btn btn-primary">Back to User</button></a>
                       <input type="submit" class="btn btn-success" value="UPLOAD">
                   </div>
               </form>
           </div>
       </div>
   </div>

</div>


<script src="{{('public/frondend/js/manager.js')}}"></script>
</body>
</html>