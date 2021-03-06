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
                            <a href="#"><i class="fa fa-fw fa-user"></i> 商户信息</a>
                        </li>
                        <!-- <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li> -->
                        <li class="divider"></li>
                        <li>
                            <a href="signout"><i class="fa fa-fw fa-power-off"></i>注销登录</a>
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
                        商家基础信息 <!-- <small>Statistics Overview</small> -->
                    </h1>
                    <ol class="breadcrumb">
                        <li class="active">
                            <i class="fa fa-dashboard"></i> 商家基础信息
                        </li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->

           <!--  <div class="row">
                <div class="col-lg-12">
                    <div class="alert alert-info alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <i class="fa fa-info-circle"></i>  <strong>Like SB Admin?</strong> Try out <a href="http://startbootstrap.com/template-overviews/sb-admin-2" class="alert-link">SB Admin 2</a> for additional features!
                    </div>
                </div>
            </div> -->
            <!-- /.row -->

            <div class="row">
                <div class="col-sm-offset-0 col-md-6">
                    <!-- <h2>Striped Rows</h2> -->
                    <table class="table table-hover  table-striped">
                        <thead>
                            <tr>
                                <th>商家信息名称</th>
                                <th>详细信息内容</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>商家名称</td>
                                <td><?php echo ($agentdata['agent_name']); ?></td>
                               
                            </tr>
                            <tr>
                                <th>账号名</th>
                                <td><?php echo ($agentdata['contract_loginname']); ?></td>
                            </tr>
                            <tr>
                                <td>合同号</td>
                                <td><?php echo ($agentdata['contract']); ?></td>
                            </tr>
                            
                            <tr>
                                <td>所在位置</td>
                                <td><?php echo ($agentdata['province']); ?>省 <?php echo ($agentdata['city']); ?> 市</td>
                            </tr>
                            <tr>
                                <td>详细地址</td>
                                <td><?php echo ($agentdata['address']); ?></td>
                               
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="col-sm-offset-0 col-md-6">
                    <!-- <h2>Striped Rows</h2> -->
                    <table class="table table-hover  table-striped">
                        <thead>
                            <tr>
                                <th>商家信息名称</th>
                                <th>详细信息内容</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>审核状态</td>
                                <td><?php echo ($agentdata['agent_state']); ?></td>
                            </tr>
                            <tr>
                                <td>注册时间</td>
                                <td><?php echo ($agentdata['reg_date']); ?></td>
                            </tr>
                            <tr>
                                <td>商家负责人</td>
                                <td><?php echo ($agentdata['contactor']); ?></td>
                            </tr>
                           
                            <tr>
                                <td>负责人电话</td>
                                <td><?php echo ($agentdata['contactor_tel']); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- 加盟信息  -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        商家加盟信息 <!-- <small>Statistics Overview</small> -->
                    </h1>
                    <ol class="breadcrumb">
                        <li class="active">
                            <i class="fa fa-dashboard"></i> 商家合同信息
                        </li>
                    </ol>
                </div>
            </div>            
            </if>
            <?php if($agentdata['agent_state'] == '已通过' ): ?><div class="row">
                    <div class="col-md-6">
                        <!-- <h2>Striped Rows</h2> -->
                        <table class="table table-hover  table-striped">
                            <thead>
                                <tr>
                                    <th>合同信息名称</th>
                                    <th>详细信息内容</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>营业执照企业名</td>
                                    <td><?php echo ($agentdata['trade_name']); ?></td>
                                </tr>
                                <tr>
                                    <td>营业执照号</td>
                                    <td><?php echo ($agentdata['trade_no']); ?></td>
                                </tr>
                                <tr>
                                    <td>合同签订日期</td>
                                    <td><?php echo ($agentdata['contract_signdt']); ?></td>
                                    
                                </tr>
                                <tr>
                                    <td>合同开始时间</td>
                                    <td><?php echo ($agentdata['contract_begindt']); ?></td>
                                </tr>
                                <tr>
                                    <td>合同截止时间</td>
                                    <td><?php echo ($agentdata['contract_enddt']); ?></td>
                                </tr>
                                <tr>
                                    <td>合同经办人</td>
                                    <td><?php echo ($agentdata['contract_sign_name']); ?></td>
                                   
                                </tr>
                                <tr>
                                    <td>财务联系人</td>
                                    <td><?php echo ($agentdata['contactor_finance']); ?></td>
                                   
                                </tr>
                                <tr>
                                    <td>财务联系人电话</td>
                                    <td><?php echo ($agentdata['contactortel_finance']); ?></td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <!-- <h2>Striped Rows</h2> -->
                        <table class="table table-hover  table-striped">
                            <thead>
                                <tr>
                                    <th>合同信息名称</th>
                                    <th>详细信息内容</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>开户行账号</td>
                                    <td><?php echo ($agentdata['account1_no']); ?></td>
                                </tr>
                                <tr>
                                    <td>账号开户名</td>
                                    <td><?php echo ($agentdata['account1_name']); ?></td>
                                </tr>
                                <tr>
                                    <td>开户行银行名称</td>
                                    <td><?php echo ($agentdata['account1_bankname']); ?></td>
                                </tr>

                                <tr>
                                    <td>账号开户名2</td>
                                    <td><?php echo ($agentdata['account2_no']); ?></td>
                                </tr>
                                <tr>
                                    <td>开户行账号2</td>
                                    <td><?php echo ($agentdata['account2_no']); ?></td>
                                </tr>
                                <tr>
                                    <td>开户行银行名称2</td>
                                    <td><?php echo ($agentdata['account2_no']); ?></td>
                                </tr>

                                <tr>
                                    <td>支付宝账号</td>
                                    <td><?php echo ($agentdata['zhifubao']); ?></td>
                                </tr>
                                <tr>
                                    <td>微信支付账号</td>
                                    <td><?php echo ($agentdata['wxpay']); ?></td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php elseif($agentdata['agent_state'] == '审核中' ): ?>
                <div class="alert alert-warning" role="alert">
                    感谢您关注响动，您提交的申请资料正在审核中！预计3-5个工作日，请耐心等待。
                    <a href="#" class="alert-link">若有疑问，请联系我们xxxxxxx。</a>
                </div>
              
            <?php else: ?>
                <div class="alert alert-info" role="alert">
                    <strong>感谢您注册响动!</strong> 您目前未提交加盟申请！想了解商家加盟的好处或如何加盟响动？
                    <a href="#" class="alert-link">请点击这里(FAQ)</a>
                </div>
                <div class="alert alert-success" role="alert">
                    <a href="/Agent/joinmember" class="alert-link"><strong>点击这里，直接进入加盟申请资料提交。</strong></a>
                </div><?php endif; ?>

        </div>
        <!-- /.container-fluid -->
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
    
    

</body>

</html>