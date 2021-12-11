
<link href="{{('public/frondend/css/Forgotpass.css')}}" rel="stylesheet">


<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<div class="form-gap"></div>
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="text-center">
						<h3><i class="fa fa-lock fa-4x"></i></h3>
						<h2 class="text-center">Lấy Lại Mật Khẩu?</h2>
						<p>Nhập Thông Tin Email.</p>
						<div class="panel-body">

							<form action="{{URL::to('/Forgot-Password')}}" class="form" method="POST">
								{{csrf_field()}}
								<?php 
								$erro_mail = Session::get('erro_mail');

								$sussec_mail = Session::get('sussec_mail');
								if($sussec_mail){
									echo $sussec_mail;
									Session::put('sussec_mail',null);

								} elseif($erro_mail)
								{
									echo $erro_mail;
									Session::put('erro_mail',null);
								}
								?>

								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
										<input name="email_re" placeholder="email address" class="form-control"  type="email">
									</div>
								</div>
								<div class="form-group">
									<input name="recover-submit" class="btn btn-lg btn-primary btn-block" value="Gửi Mail" type="submit">
								</div>


								<div class="form-group">
									<p>Bạn đã có tài khoản? <a href="{{URL::to('/Login-page')}}"> Đăng Nhập Ngay!</a></p>

								</div>
								<div class="form-group">
									<a href="{{URL::to('/dang-ky')}}">đăng ký tài khoản mới</a>
								</div>
							</form>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>