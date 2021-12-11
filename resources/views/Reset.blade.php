
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Kodinger">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Reset Password</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link href="{{('public/frondend/css/Forgotpass.css')}}" rel="stylesheet">
</head>
<body class="my-login-page">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center align-items-center h-100">
				<div class="card-wrapper">

					<div class="cardx fat">
						<div class="card-body">
							<h4 class="card-title">Điền Mật Khẩu mới</h4>
							<form action="{{URL::to('/Login-page')}}" method="POST" class="my-login-validation" novalidate="">
								{{csrf_field()}}
								<?php $email = $_GET['email'];							
								?>							
								<div class="form-group">
									<label>Email</label>
									<input value="{{$email}}" readonly="readonly" name="Email_cu" type="text" class="form-control" required>
								</div>
								<div class="form-group">
									<label for="password">Mật Khẩu Mới</label>
									<input type="password" class="form-control" name="new_pass" placeholder="Enter new password">

								</div>
							

								<div class="form-group m-0">
									<button type="submit" class="btn btn-primary btn-block">
										Cập Nhật
									</button>
								</div>
							</form>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</section>
	<script src="{{('public/frondend/js/jquery.js')}}"></script>
	<script src="{{('public/frondend/js/bootstrap.min.js')}}"></script>
	<script src="{{('public/frondend/js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{('public/frondend/js/price-range.js')}}"></script>
	<script src="{{('public/frondend/js/jquery.prettyPhoto.js')}}"></script>
	<script src="{{('public/frondend/js/main.js')}}"></script>

	
</body>
</html>
