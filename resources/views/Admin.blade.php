<h1>chao mung den với page ad</h1>
<?php 
	$name_admin = Session::get('name_admin');
	if($name_admin)
	{
		echo $name_admin;
	}
?>
<li><a href="{{URL::to('/Logout-page')}}"><i class="fa fa-lock"></i> Đăng xuất</a></li>