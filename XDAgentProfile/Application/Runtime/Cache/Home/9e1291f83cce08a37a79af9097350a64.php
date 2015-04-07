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

    		<div id="contentwrapper" class="contentwrapper">
				<div>
					<div style="width:40%;float:left">
						<div>二维码信息:<textarea id="qrtext" disabled="true">AgentInfo:<?php echo ($contract_code); ?>_<?php echo ($shopid); ?></textarea></div><br>
						<div>
							<label><input id="cbimg" type=checkbox>没有Logo</label>
							<div>
								Logo图: <img id="qrimg" style="width:64px;height:64px;" src="/Public/agent/img/logo.jpg"><br>
								<label><input id="qrclearedges" type="checkbox" checked>Clear edges</label>
								<input id="fimg" type="file">
							</div>
						</div>
						<!--<div>二维码信息:<textarea id="qrtext"></textarea></div>-->
						<div>二维码大小:<input id="cellSize" type="range" min="8" max="18" value="2"></div>
						<table>
							<tr>
								<td rowspan=2>二维码形状:</td>
								<td colspan=3><input id="cellEffect" type="range" min="-50" max="50" step="5" value="0"></td>
							</tr>
							<tr id="cellEffectStops">
								<td align="left"><a href="#" data="l">平滑形</a></td>
								<td align="center"><a href="#" data="s">方形</a></td>
								<td align="right"><a href="#" data="r">圆形</a></td>
							</tr>
						</table>
						<div>
							二维码整体颜色:<input id="colorFore" type="color" value="#4169e1"><br>
							二维码间隙颜色:<input id="colorBack" type="color" value="#ffffff"><br>
							二维外边框颜色:<input id="colorOut" type="color" value="#cd5c5c"><br>
							二维内边框颜色:<input id="colorIn" type="color" value="#191970">
						</div>
						
						<button id="qrgen">生成</button><br><br>
					</div>
					<div id="qrcanvas" style="width:50%;float:right;">
						
					</div>
				</div>
					
				</div>
		
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
    
    
    <script src="/Public/agent/js/qrcode/qrcode-light.js"></script>
    <script src="/Public/agent/js/qrcode/qrgen.js"></script>
    <script src="/Public/agent/js/qrcode/createqrcode.js"></script>


</body>

</html>