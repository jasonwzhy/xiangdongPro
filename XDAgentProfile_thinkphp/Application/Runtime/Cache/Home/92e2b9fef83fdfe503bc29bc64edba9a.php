<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>响动健身 商家登陆</title>

    <!-- Bootstrap core CSS -->
    <link href="http://cdn.bootcss.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="Public/agent/css/signin.css" rel="stylesheet">
    <script src="http://cdn.bootcss.com/jquery/1.11.2/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <!--<script src="../../assets/js/ie-emulation-modes-warning.js"></script>-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <nav class="navbar navbar-fixed-top">
      <div class="container">
          <!-- <a class="navbar-brand" href="#">Bootstrap theme</a> -->
        <center><p class="nav-title">响动健身 商家登陆</p></center>
      </div>
    </nav>

    <div class="container logo-header">
      <div class="row">
        <div class="col-sm-offset-1 col-sm-1 col-xs-offset-1 col-xs-3 ">
          <img style="margin-top:25px" src="Public/agent/img/logo2.png" height="45px">
        </div>
        <div class="col-sm-4 col-xs-8">
          <h1 style="margin-bottom:0px;">响动健身</h1>
          <a style="color:#fff;" href="http://www.lifecare.cc"><h7><u>http://www.lifecare.cc</u></h7></a>
           <!-- logo here  -->
        </div>
     
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-sm-offset-1 col-xs-12 col-sm-10">
          <div class="row login-container">

            <div class="col-sm-7 col-xs-12">
              <form class="form-signin" action="" method="post">
                <div class="form-group">
                  <h2 class="form-signin-heading">商家登陆</h2>
                  <div class="row">
                    <label class="col-sm-3 control-label">登陆方式</label>
                    <div class="btn-group col-sm-9" data-toggle="buttons">
                      <label class="btn btn-danger active" id="emaillogin">
                        <input type="radio" name="options" id="emaillogin" autocomplete="off" checked>账号登陆
                      </label>
                      <label class="btn btn-danger" id="contractlogin">
                        <input type="radio" name="options" id="contractlogin" autocomplete="off">合同号登陆
                      </label>
                    </div>
                  </div>
                </div>
                <label for="loginname" id="loginnamelabel" class="sr-only">Email账号登陆</label>
                <input type="email" id="loginname" class="form-control" name="emaillogin" placeholder="Email账号登陆" required="" autofocus=""><br/>
                <label for="inputPassword" class="sr-only">密码</label>
                <input type="password" id="inputPassword" class="form-control" placeholder="密码" name="loginpwd" required="">
                <div class="checkbox">
                  <label>
                    <input type="checkbox" value="remember-me"> 记住登陆
                  </label>
                  <?php if($error): ?><label><h4><?php echo ($error); ?></h4></label>
                  <?php else: ?>
                    <label></label><?php endif; ?>
                </div>
                <button class="btn btn-lg btn-danger btn-block" type="submit">登陆</button>
              </form>
            </div>

            <div class="col-sm-5 col-xs-12 signupway-box">
              <h3 class="form-signin-heading">没有开通响动?</h3>
              <div class="rlink">
                <a href="?m=home&c=agent&a=signup"><h4><u>点击这里 快速注册 <span class="glyphicon glyphicon-hand-right" aria-hidden="true"></span></u></h4></a>
              </div>
              <h4>或使用以下帐号直接登录:</h4>
              <a href="#"><img src="Public/agent/img/wb.png"></a>
            </div>
          </div>
        </div>
      </div>
      
    </div> <!-- /container -->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <!--<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>-->
    <script type="text/javascript">
    $('#emaillogin').on('click',function(){
      $('#loginname').attr('name','emaillogin');
      $('#loginname').attr('type','email')
      $('#loginname').attr('placeholder','Email账号登陆');
      // $('#loginnamelabel').val('Email账号登陆')
    })
    $('#contractlogin').on('click',function(){
      $('#loginname').attr('name','contractlogin');
      $('#loginname').attr('type','text')
      $('#loginname').attr('placeholder','合同号登陆');
      // $('#loginnamelabel').val('Email账号登陆')
    })
    </script>

</body></html>