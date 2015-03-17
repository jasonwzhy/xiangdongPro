<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- for AMap -->
    <meta name="viewport" content="initial-scale=1.1,user-scalable=no">

    <title>响动健身 商家后台</title>

    <!-- Bootstrap Core CSS -->
    <link href="/Public/agent/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/Public/agent/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="/Public/agent/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/Public/agent/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/Agent/index"><img src="/Public/agent/img/logo1.png" width="100px"></a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> 商户设置 <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="/Agent/passwd"><i class="fa fa-fw fa-user"></i> 密码修改</a>
                        </li>
                        <!-- <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li> -->
                        <li class="divider"></li>
                        <li>
                            <a href="/Agent/signout"><i class="fa fa-fw fa-power-off"></i>注销登录</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <!-- <li class="active"> -->
                    <li>
                        <a href="/Agent/index"><i class="fa fa-fw fa-dashboard"></i> 商户基础信息</a>
                    </li>
                   <!--  <li>
                        <a href="charts.html"><i class="fa fa-fw fa-bar-chart-o"></i> 创建店铺</a>
                    </li> -->
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i>商户店铺<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="/Agent/shopsview"><i class="fa fa-fw fa-dashboard"></i>查看店铺</a>
                            </li>
                            <li>
                                <a href="/Agent/createshop"><i class="fa fa-fw fa-dashboard"></i>添加新店铺</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="/Agent/consumestatus"><i class="fa fa-fw fa-edit"></i> 消费统计</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-table"></i> 帮助中心</a>
                    </li>
                    
                   <!--  <li>
                        <a href="bootstrap-elements.html"><i class="fa fa-fw fa-desktop"></i> Bootstrap Elements</a>
                    </li>
                    <li>
                        <a href="bootstrap-grid.html"><i class="fa fa-fw fa-wrench"></i> Bootstrap Grid</a>
                    </li> 
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Dropdown <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="#">Dropdown Item</a>
                            </li>
                            <li>
                                <a href="#">Dropdown Item</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="blank-page.html"><i class="fa fa-fw fa-file"></i> Blank Page</a>
                    </li>-->
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        
	<div id="page-wrapper">
		<div class="container-fluid">
        	<!-- Page Heading -->
            <div class="row">
            	<div class="col-lg-12">
                    <h1 class="page-header">
                        修改密码 <!-- <mdall>Statistics Overview</small> -->
                    </h1>
                    <ol class="breadcrumb">
                        <li class="active">
                            <i class="fa fa-dashboard"></i> 商家修改登录密码
                        </li>
                    </ol>
                </div>
			</div>

			<div class="panel panel-default">
				<div class="panel-heading">商家加盟资料</div>
				<ul class="list-group">
					<li class="list-group-item">
						<div class="row">
							<label  class="col-md-3">旧密码</label>
							<div class="col-md-5"><input type="password" class="form-control" id="oldpasswd" name="oldpasswd" placeholder="旧密码" required="required"></div>
						</div>
					</li>
					<li class="list-group-item">
						<div class="row">
							<label  class="col-md-3">新密码</label>
							<div class="col-md-5"><input type="password" class="form-control" id="newpasswd" name="newpasswd" placeholder="新密码" required="required"></div>
						</div>
					</li>
					<li class="list-group-item">
						<div class="row">
							<label  class="col-md-3">确认新密码</label>
							<div class="col-md-5"><input type="password" class="form-control" id="confirmnewpasswd" name="confirmnewpasswd" placeholder="确认新密码" required="required"></div>
						</div>
					</li>
					
					
					<li class="list-group-item">
						<div class="row">
							<div class="col-md-offset-2 col-md-2">
								<button id="submitbtn" type="button" class="btn btn-success btn-block ">确定提交</button>
							</div>
							<div class="col-md-offset-1 col-md-2">
								<button id="resetbtn" type="reset" class="btn btn-info btn-block ">重置</button>
							</div>
						</div>
					</li>

				</ul>
			</div>

		</div>
	</div>

        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="/Public/agent/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/Public/agent/js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="/Public/agent/js/plugins/morris/raphael.min.js"></script>
    <script src="/Public/agent/js/plugins/morris/morris.min.js"></script>
    <script src="/Public/agent/js/plugins/morris/morris-data.js"></script>
    <!--  <script src="http://cdn.bootcss.com/jquery.form/3.51/jquery.form.min.js"></script>
     -->
    
    
	<script src="/Public/agent/js/jquery.md5.js"></script>
	<script>
	$("#submitbtn").click(function(e){
		e.preventDefault();
		var oldpasswd = $("#oldpasswd").val();
		var newpasswd = $("#newpasswd").val();
		var confirmnewpasswd = $("#confirmnewpasswd").val();
		if(oldpasswd == ""){
			alert("原密码不能为空");
		}else if (newpasswd == "") {
			alert("新密码不能为空");
		}else if (confirmnewpasswd==""){
			alert("请确认密码");
		}else if (confirmnewpasswd != newpasswd) {
			alert("确认密码不一致，请重新输入");
		}else{
			$.post("/Agent/passwd",
					{
						oldpasswd:$.md5(oldpasswd),
						newpasswd:$.md5(newpasswd)
					},
					function(ret){
						console.log(ret);
						if("" != ret.error){
							alert(ret.error);
						}
						else
						{
							alert("密码修改成功!");
							window.location.href = "/Agent/index";
						}
					}
				);
		};

	});
	$("#resetbtn").click(function(e){
		$('input').val('');
	});
	</script>


</body>

</html>