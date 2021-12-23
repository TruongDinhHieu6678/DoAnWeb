<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="{{('public/frondend/css/home.css')}}" rel="stylesheet">
<!------ Include the above in your HEAD tag ---------->

<div class="container login-container">
	<div class="row">
		<div class="col-md-6 login-form-1">
			<h3>Đăng nhập người dùng</h3>
			
			<form action="{{URL::to('/Trang-Chu')}}" method="POST">
				{{csrf_field()}}
				<?php 
				$message_user = Session::get('message');
				if($message_user){
					echo $message_user;
					Session::put('message_user',null);
				}
				?>
				<div class="form-group">
					<input type="email" class="form-control" name="tenuser" placeholder="Your Email *" value="" />
				</div>
				<div class="form-group">
					<input type="password" class="form-control" name="matkhauuser" placeholder="Your Password *" value="" />
				</div>
				<div class="form-group">
					<input type="submit" class="btnSubmit" value="Đăng nhập" />
				</div>
				<div class="form-group">
					<a href="{{URL::to('/Forgot-Password')}}" class="ForgetPwd">Quên mật khẩu?</a>
				</div>
				<div class="form-group">
					<a href="{{URL::to('/dang-ky')}}">đăng ký tài khoản mới</a>
				</div>
			</form>
		</div>
		<div class="col-md-6 login-form-2">
			<h3>Đăng nhập quản trị</h3>

			<form action="{{URL::to('/admin-dashboard')}}" method="POST">

				{{csrf_field()}}
				<?php 
				$message_ad = Session::get('message1');
				if($message_ad){
					echo $message_ad;
					Session::put('message_ad',null);
				}
				?>
				<div class="form-group">
					<input type="email" class="form-control" name="Taikhoan" placeholder="Your Email *"/>
				</div>
				<div class="form-group">
					<input type="password" class="form-control" name="Matkhau" placeholder="Your Password *"/>
				</div>
				<div class="form-group">
					<input type="submit" class="btnSubmit" value="Đăng nhập" />
				</div>
				<div class="form-group">

					<div class="form-group">
					<a href="{{URL::to('/Forgot-Password')}}" class="ForgetPwd">Quên mật khẩu?</a>
				</div>
				</div>
				 <div class="modal-footer">
                       <a href="{{URL::to('/')}}"><button type="button" class="btn btn-primary">Back to Home</button></a>
              
                   </div>
			</form>
		</div>
	</div>
</div>