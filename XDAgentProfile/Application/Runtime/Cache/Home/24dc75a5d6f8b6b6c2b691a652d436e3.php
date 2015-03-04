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
                <a class="navbar-brand" href="index.html">响动健身</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu message-dropdown">
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-footer">
                            <a href="#">Read All New Messages</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                        <li>
                            <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">View All</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> John Smith <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="signout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <!-- <li class="active"> -->
                    <li>
                        <a href="index"><i class="fa fa-fw fa-dashboard"></i> 商户基础信息</a>
                    </li>
                   <!--  <li>
                        <a href="charts.html"><i class="fa fa-fw fa-bar-chart-o"></i> 创建店铺</a>
                    </li> -->
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i>商户店铺<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="shopsview"><i class="fa fa-fw fa-dashboard"></i>查看店铺</a>
                            </li>
                            <li>
                                <a href="createshop"><i class="fa fa-fw fa-dashboard"></i>添加新店铺</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="forms.html"><i class="fa fa-fw fa-edit"></i> 消费统计</a>
                    </li>
                    <li>
                        <a href="faq"><i class="fa fa-fw fa-table"></i> 帮助中心</a>
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
			<div class="row">
				<div class="col-lg-12">
                    <h1 class="page-header">
                        创建店铺<!-- <small>Statistics Overview</small> -->
                    </h1>
                    <ol class="breadcrumb">
                        <li class="active">
                            <i class="fa fa-dashboard"></i> 商家店铺创建
                        </li>
                    </ol>
                </div>
        	</div>

			<div class="panel panel-default">
			<!-- Default panel contents -->
				<div class="panel-heading">商家店铺创建</div>
		<!-- 		<div class="panel-body">
				</div> -->
				<!-- List group -->
				<ul class="list-group">
					<li class="list-group-item">
						<div class="row">
							<label for="shopName" class="col-md-3">店面名称</label>
							<div class="col-md-5"><input type="text" class="form-control" id="shopName" name="shopname" placeholder="店面名称" required="required"></div>
						</div>
					</li>
					
					<li class="list-group-item">
						<div class="row">
							<label for="province" class="col-sm-3">所在省市</label>
							
					  		<div class="col-sm-2">
					  			<!-- <select class="form-control" id="province" name="province">
					  				<option>四川</option>
					  			</select> -->
					  			<select name="selProvince" id="province"  class="form-control" style="border-radius:0px;" onChange = "getCity(this.options[this.selectedIndex].value)"> 
							        <option value="">-请选择-</option> 
							        <option value="北京">北京</option> 
							        <option value="上海">上海</option> 
							        <option value="广东">广东</option> 
							        <option value="江苏">江苏</option> 
							        <option value="四川">四川</option> 
							    </select>
					  		</div>
					  		<label for="province" class="col-sm-1 control-label">省</label>
					  		
					  		<div class="col-sm-2">
					  		<!-- 	<select class="form-control" id="city" name="city">
					  				<option>成都</option>
					  			</select> -->
					  			<select name="selCity" id="city" class="form-control">
									<option value="">-城市-</option> 
								</select>
					  		</div>
					  		<label for="city" class="col-sm-1 control-label">市</label>
						<!-- 	<label for="tradeName" class="col-md-3">营业执照企业名</label>
							<div class="col-md-5"><input type="text" class="form-control" id="tradeName" name="tradename" placeholder="营业执照企业名" required="required"></div> -->
						</div>
					</li>

					<li class="list-group-item">
						<div class="row">
							<label for="shopAddress" class="col-md-3">店铺详细地址</label>
							<div class="col-md-5"><input type="text" class="form-control" id="shopAddress" name="shopaddress" placeholder="店铺详细地址" required="required"></div>
						</div>
					</li>

					<li class="list-group-item" hidden="hidden">
						<div class="row">
							<label for="lonlat" class="col-md-3 col-xs-12">经纬度</label>
							<div class="col-md-4 col-xs-5"><input type="text" class="form-control" id="lonlat" name="lonlat" placeholder="经纬度" required="required" readonly></div>
							<div class="col-md-2 col-xs-3"><button type="button" id="amapbtn" style="margin-top:7%;" class="btn btn-success btn-xs">拾取坐标</button></div>
						</div>
						<div class="row">
							<div class="col-md-offset-3 col-md-7">
								<div id="amap" class="get-coordinate" style="display:none;"></div>
							</div>
						</div>
					</li>

					<li class="list-group-item">
						<div class="row">
							<label for="shopmanager" class="col-md-3">店铺经理</label>
							<div class="col-md-5"><input type="text" class="form-control" id="shopmanager" name="shopmanager" placeholder="店铺经理" required="required"></div>
						</div>
					</li>

					<li class="list-group-item">
						<div class="row">
							<label for="shopmanagerTel" class="col-md-3">店铺经理联系电话</label>
							<div class="col-md-5"><input type="number" class="form-control" id="shopmanagerTel" name="shopmanagerTel" placeholder="店铺经理联系电话" required="required"></div>
						</div>
					</li>
					<li class="list-group-item">
						<div class="row">
							<label for="shopmanagerTel" class="col-md-3">店铺项目</label>
							<div class="col-md-5">
								<input type="checkbox" id="inlineCheckbox1" value="option1"> 器械
								<input type="checkbox" id="inlineCheckbox1" value="option1"> 瑜伽
								<input type="checkbox" id="inlineCheckbox1" value="option1"> 单车
								<input type="checkbox" id="inlineCheckbox1" value="option1"> 游泳
								<input type="checkbox" id="inlineCheckbox1" value="option1"> 体操
							</div>
						</div>
					</li>
					<li class="list-group-item">
						<div class="row">
							<label for="shopmanagerTel" class="col-md-3">店铺描述</label>
							<div class="col-md-5">
							<textarea class="form-control" rows="5" cols="20" id="shopdesc" placeholder="店铺简介">
							</textarea>
						</div>
					</li>
					

				</ul>

				<div class="panel-heading">店铺照片(可选)</div>
				<ul class="list-group">
					<li class="list-group-item">
						<div class="row">
								<label for="shopPic1" class="col-md-3">店铺照片</label>
								<div class="col-md-5"><button type="button" class="btn btn-primary btn-sm" id="addpicbtn">添加照片</button></div>
						</div>
					</li>

					<li class="list-group-item">
						
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
    
    
	<script src="/Public/agent/js/city.js"></script>
	<script type="text/javascript" src="http://webapi.amap.com/maps?v=1.3&key=ac8dc3ed6052d2d27fc0b1c97266d1a0"></script>
	<script>
		$("#amapbtn").click(function(){
			$("#amap").toggle(500);
		});
		// var position=new AMap.LngLat(116.397428,39.90923);
		var mapObj = new AMap.Map("amap",
		{
			resizeEnable: true,
			view: new AMap.View2D({
				// center:position,
				zoom:14,
				rotation:0
			}),
			lang:"zh_cn"
		});
		mapObj.plugin(["AMap.ToolBar"],function(){
			//加载工具条
			var tool = new AMap.ToolBar();
			mapObj.addControl(tool);   
		});
		var marker = new AMap.Marker({ //创建自定义点标注                 
			map:mapObj,
			offset: new AMap.Pixel(-10,-34),                 
			icon: "http://webapi.amap.com/images/marker_sprite.png"
		});
		var clickEventListener=AMap.event.addListener(mapObj,'click',function(e){
			$("#lonlat").val(e.lnglat.getLng()+','+e.lnglat.getLat());
			marker.setPosition(new AMap.LngLat(e.lnglat.getLng(), e.lnglat.getLat()));
		});
	</script>


</body>

</html>