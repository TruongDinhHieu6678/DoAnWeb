 <link href="{{('public/frondend/css/register.css')}}" rel="stylesheet">
 <!DOCTYPE html>
 <html>
 <head>
  <title>Đăng Ký tài khoản</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
  <!-- Custom Theme files -->
  <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
  <!-- //Custom Theme files -->
  <!-- web font -->
  <link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
  <!-- //web font -->
</head>
<body>
  <!-- main -->
  <div class="main-w3layouts wrapper">
    <h1>FROM ĐĂNG KÝ</h1>
    <div class="main-agileinfo">
      <div class="agileits-top">

        <form action="{{URL::to('/trang-chu')}}" method="POST">
          {{csrf_field()}}
         
          <?php 
          $message_pss_re = Session::get('message_pss_re');
          if($message_pss_re){
            echo $message_pss_re;
            Session::put('message_pss_re',null);
          }
          ?>
          <input class="text" type="text" name="Username" placeholder="Tên đăng nhập" required="">
          <input class="text email" type="email" name="usermail" placeholder="Email" required="">
          <input class="text" type="password" name="password" placeholder="Mật khẩu" required="">
          <input class="text w3lpass" type="password" name="password_re" placeholder="Nhập lại mật khẩu" required="">
          <div class="wthree-text">
            <label class="anim">
              <input type="checkbox" class="checkbox" required="">
              <span>Đồng ý với các điều khoản</span>
            </label>
            <div class="clear"> </div>
          </div>
          <input type="submit" value="ĐĂNG KÝ">
        </form>

        <p>Bạn đã có tài khoản? <a href="{{URL::to('/Login-page')}}"> Đăng Nhập Ngay!</a></p>
      </div>
    </div>  
    <ul class="colorlib-bubbles">
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
    </ul>
  </div>
  <!-- //main -->
</body>
</html>