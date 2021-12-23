<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Supper | Shopper</title>
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
                        <h2>Manage <b>Customer</b></h2>
                    </div>
                    
                    <div class="col-sm-6">
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>
                            <span class="custom-checkbox">
                                <input type="checkbox" id="selectAll">
                                <label for="selectAll"></label>
                            </span>
                        </th>
                        <th>ID</th>
                        <th>Hình</th>
                        <th>Tên</th>
                        <th>Địa Chỉ</th>
                        <th>Điện Thoại</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                  
                    <tr>
                        <td>
                            <span class="custom-checkbox">
                                <input type="checkbox" id="checkbox1" name="options[]" value="1">
                                <label for="checkbox1"></label>
                            </span>
                        </td>
                        <?php $acc = Session::get('acc');?>
                        <?php $name = Session::get('ten_user');?>
                        <?php $sdt = Session::get('sdt');?>
                        <?php $diachi = Session::get('diachi');?>
                        <?php $mail = Session::get('mail');?>
                        <?php $image_user = Session::get('hinh_anh');?>
                        
                        <td><?php echo $acc?></td>
                        <td><img src="public/frondend/images/<?php echo $image_user?>" height="50" width="50"></td>
                        <td><?php echo $name?></td>
                        <td><?php echo $diachi?></td>
                        <td><?php echo $sdt?></td>
                        <td><?php echo $mail?></td>

                        <td>

                            <a href="{{URL::to('/Edit-page')}}"  class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>Edit</a>
                            <a href="{{URL::to('/Product-Interest-page')}}" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>Sản Phẩm Yêu Thích</a>
                        </td>

                    </tr>
                    
                    
                </tbody>
            </table>
        </div>
        <a href="{{URL::to('/trang-chu')}}"><button type="button" class="btn btn-primary">Back to home</button></a>
        <script src="{{('public/frondend/js/manager.js')}}"></script>
    </body>
    </html>