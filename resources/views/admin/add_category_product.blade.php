@extends('admin_layout')
@section('admin_content')

<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm Sản Phẩm
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
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/save-category-product')}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sản phẩm </label>
                                    <input type="Text" class="form-control" name="category_product_name" placeholder="Tên Sản Phẩm">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Thêm ảnh sản phẩm thứ nhất </label>
                                    <input type="file" class="form-control" name="image1" placeholder="image">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Thêm ảnh sản phẩm thứ hai </label>
                                    <input type="file" class="form-control" name="image2" placeholder="image">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá sản phẩm </label>
                                    <input type="Text" class="form-control" name="category_product_price" placeholder="Giá sản Phẩm">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Ngày nhập </label>
                                    <input type="Text" class="form-control" name="category_product_date" placeholder="Ngày Nhập">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số lượng </label>
                                    <input type="Text" class="form-control" name="category_product_quantity" placeholder="Số lượng">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Loại sản phẩm </label>
                                    <select name="category_product_type" class="form-control input-sm m-bot15">
                                        @foreach($type_category_product as $key_lsp => $values_lsp)
                                            <option value="{{$values_lsp->MaLoaiSanPham}}">{{$values_lsp->TenLoaiSanPham}}</option>
                                        @endforeach
                                        
                                    </select>
                                </div> 
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hảng sản xuất </label>
                                    <select name="category_product_company" class="form-control input-sm m-bot15">
                                        @foreach($company_category_product as $key_hsx => $values_hsx)
                                            <option value="{{$values_hsx->MaHangSanXuat}}">{{$values_hsx->TenHangSanXuat}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả danh sản phẩm</label>
                                    <textarea type="text" style="resize: none" rows="3" class="form-control" name="category_product_desc" placeholder="Mô tả sản phẩm"></textarea>
                                </div>
                                <div class="form-group">
                                <button type="submit" name="add_category_product" class="btn btn-info">Thểm sản phẩm</button>
                                
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection
        