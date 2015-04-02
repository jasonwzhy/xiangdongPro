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
        	<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        查看商户店铺<!-- <small>Statistics Overview</small> -->
                    </h1>
                   <!--  <ol class="breadcrumb">
                        <li class="active">
                            <i class="fa fa-dashboard"></i> 商家店铺信息
                        </li>
                    </ol> -->

                </div>
            </div>

        	

            <div class="row">
                <div class="col-lg-12">
                  <!--   <h1 class="page-header">
                        商家店铺<small>Statistics Overview</small>
                    </h1> -->
                    <ol class="breadcrumb">
                        <li class="active">
                            <i class="fa fa-dashboard">商家店铺列表</i>
                        </li>
                    </ol>
                </div>
             <!--    <div class="col-lg-12">
                	<div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Panel title</h3>
                        </div>
                        <div class="panel-body">
                            Panel content
                        </div>
                        <table class="table">
                        	
                        </table>
                    </div>
                </div> -->
            </div>
            
            
            <div class="shoplist-container "><!-- shops item list  -->
                <?php if(empty($shopdata)): ?><div class="alert alert-success" role="alert">
                        <a href="/Agent/createshop" class="alert-link"><strong>您还没有提交店铺资料,请完善您的店铺资料。</strong></a>
                    </div>                
                <?php else: ?>
                    <?php if(is_array($shopdata)): foreach($shopdata as $key=>$shopitem): ?><div class="panel panel-default shopitem" id="1">
                            <div class="panel-heading">
                                <?php echo ($shopitem["shopname"]); ?>
                            </div>
                            <div class="panel-body">
                                <div class="col-md-3">
                                    <?php if(empty($shopitem["imgpaths"])): ?><img src="/Public/agent/img/noimg.png" width="80%">
                                    <?php else: ?>
                                        <?php if(is_array($shopitem["imgpaths"])): $i = 0; $__LIST__ = array_slice($shopitem["imgpaths"],0,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><img src="<?php echo ($vo["imgpath"]); ?>" width="80%"><?php endforeach; endif; else: echo "" ;endif; endif; ?>
                                    
                                </div>
                                <div class="col-md-7" style="font-weight:bold;">
                                    <!-- <p></p> -->
                                    <p>地址<span style="color:#009999;">
                                        <?php echo ($shopitem["shopaddress"]); ?>
                                    </span></p>
                                    <p>电话：<span style="color:#009999;"><?php echo ($shopitem["contractor_tel"]); ?></span></p>
                                    
                                    <p>门店介绍：<span style="color:#009999;"><?php echo (substr($shopitem["shopdesc"],0,127)); ?></span></p>
                                    
                                    <p>店铺类型：<span style="color:#009999;"><?php echo ($shopitem["shoptype"]); ?></span></p>
                                </div>
                                <div class="col-md-2">
                                    <!-- <img id="qrimg" src="/Public/agent/img/qrcodeimg.png" width="80%"> -->
                                    
                                    <button  type="button" class="btn btn-primary btn-block " onclick="window.location.href='createqr/qrcode/<?php echo ($shopitem["qrcode"]); ?>'">生成二维码</button>
                                    <button class="btn btn-success btn-block" id="<?php echo ($shopitem["id"]); ?>">编辑店铺</button>
                                    <button type="button" class="btn btn-danger btn-block" id="<?php echo ($shopitem["id"]); ?>" onclick="delshop(this.id)">删除店铺</button>
                                    
                                </div>
                            </div>
                        </div><?php endforeach; endif; endif; ?>
                <!-- <div class="panel panel-info shopitem" id="1">
                    <div class="panel-heading">
                        印象瑜伽国际
                    </div>
                    <div class="panel-body ">
                        <div class="col-md-3">
                            <img src="/Public/agent/img/shopimg.png" width="80%">
                        </div>
                        <div class="col-md-7">
                            <p><span style="color:#336699;">地址：</span><span style="color:#00CC99;">中国四川成都xxx路，xxx街道，xxx楼xxx号</span></p>
                            <p>电话：028-88888888</p>
                            <div>
                            <p>
                            <span style="float:left;">门店介绍：</span><span style="display:block;overflow:hidden;">传奇健身，一个已陪伴您近八年历程的中国人的健身品牌，倡导简单、快乐的健身习惯，提供便捷而充满活力的健身环境和服务。坚持以具有超强竞争力的硬件设备，结合精致与细腻的服务，为会员提供一个高性价比的健身场所，和广大健身爱好者一起，创造自己的生活“传奇”！</span></p>
                            </div>
                            <p>门店服务：免费WIFI,洗浴</p>
                            
                        </div>
                        <div class="col-md-2">
                            <img id="qrimg" src="/Public/agent/img/qrcodeimg.png" width="80%">
                        </div>
                    </div>
                </div> -->
            </div><!-- end shops item list  -->
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
    
    
    <script>
        function delshop(sid){
            //var shopid = $(this).attr("id");
            if (confirm("删除店铺后,店铺数据及此店铺二维码将无法使用,确定删除店铺?")) {
                $.get("/Agent/delshop/shopId/"+sid,function(ret){
                        console.log(ret);
                        window.location.href="/Agent/shopsview";
                    }
                );
            }else{
                return false;
            }
        }

    </script>


</body>

</html>