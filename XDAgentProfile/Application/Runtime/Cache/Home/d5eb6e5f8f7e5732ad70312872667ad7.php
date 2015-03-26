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
                           
                            <a href="#"  data-toggle="modal" data-target=".bs-example-modal-lg"> <i class="fa fa-dashboard"></i> 商家合同信息</a>
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
                    <a href="#" class="alert-link">若有疑问，请联系我们028-85482036。</a>
                </div>
              
            <?php else: ?>
                <div class="alert alert-info" role="alert">
                    <strong>感谢您注册响动!</strong> 您目前未提交加盟申请！<!-- 想了解商家加盟的好处或如何加盟响动？
                    <a href="#" class="alert-link">请点击这里(FAQ)</a> -->
                </div>
                <div class="alert alert-success" role="alert">
                    <a href="/Agent/joinmember" class="alert-link"><strong>点击这里，直接进入加盟申请资料提交。</strong></a>
                </div><?php endif; ?>
            <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content pact">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <h4 class="modal-title" id="myLargeModalLabel">《响动健身服务注册协议》</h4>
                        </div>
                        <div class="modal-body">
                            <center><h1>《响动健身服务注册协议》合作协议</h1></center>                         
                            <p>&nbsp&nbsp甲方融合网络平台与社会圈层的优势，为乙方提供企业宣传、产品销售、共享甲方会员等服务，甲乙双方在平等自愿的基础上，达成合作事宜，内容如下：</p>
                            <p>一、双方的资格及权限</p>
                            <p>（一）甲方是合法注册的经营企业，有合法的经营范围、充分的经营能力和经验从事本协议中的相关服务业务。</p>
                            <p>（二）乙方是合法注册的经营企业，乙方应向甲方提交真实有效的资质证明文件，乙方保证对提交的资质证明文件的真实性、合法性和有效性承担全部责任，若因资质证明文件虚假、失效、缺失等产生法律责任的，由乙方独立承担。</p>
                            <p>（三）乙方根据本协议在甲方网站上开展的业务经营和用户服务，其权利仅限于本协议所约定的内容，且只能由乙方自行单独行使，不得以任何方式转让该权利或与其他方共同使用。</p>
                            <p>（四）甲方在与乙方合作的同时，有权与甲方以外的第三方进行合作。</p>
                            <p>二、合作内容及方式</p>
                            <p>（一）甲方向乙方开放其网站平台，宣传展示乙方向甲方提供的经营相关文字、图片等信息。</p>
                            <p>（二）甲方为乙方推介甲方健身客户到店消费，甲方以人民币20元/人/次（大写贰拾元）的价格向乙方支付甲方对健身客户的预收款，乙方不得拒绝提供服务。</p>
                            <p>（三）甲方代售乙方年卡，乙方向甲方支付成交金额的3%作为销售佣金，甲方在向乙方支付代售年卡的款项中直接予以扣除销售佣金。</p>
                            <p>（四）乙方在向用户提供服务前，应通过甲方验证平台进行验证，未通过验证，甲方不予确认付款。验证成功后，甲方次日支付代收次卡次费及代收年卡年费至乙方指定账户（遇节假日顺延）。</p>
                            <p>三、协议期限</p>
                            <p>&nbsp&nbsp有效期从_______年_____月_____日至_______年_____月_____日。</p>
                            <p>四、费用的承担</p>
                            <p>（一）甲方自行承担甲方网站的建立、维护费用以及甲方为乙方宣传、组织健身客户的费用。</p>
                            <p>（二）乙方无需向甲方支付推广费用。</p>
                            <p>五、违约责任</p>
                            <p>&nbsp&nbsp除非另有约定，否则甲乙任何一方未履行本协议约定的，在守约方要求改正的期限内未予以改正或改正后仍不符合本协议约定的，守约方有权解除协议，违约方须承担相应的违约责任。 , 性别，宗教歧视性和猥亵性的信息内容。</p>
                            <p>&nbsp&nbsp对于由乙方提供给甲方会员的服务所产生，或与乙方提供给甲方会员服务相关的其他商品或服务所引发的任何索赔、诉讼或要示而导致的甲方损失或损害（包括但不仅于诉讼费、律师费、调查费、鉴定费等），乙方均应予以赔偿，并确保甲方不受损害。</p>
                            <p>六、责任免除</p>
                            <p>&nbsp&nbsp因战争、自然灾害等不可抗力导致本协议无法履行的，双方互不承担违约责任。</p>
                            <p>七、协议的终止</p>
                            <p>（一）本协议在符合以下条件时终止：</p>
                            <p>&nbsp&nbsp1、本协议期满未达到延期条件的；</p>
                            <p>&nbsp&nbsp2、双方达成一致提前终止协议的，除上述情形外，协议双方不得擅自终止协议。</p>                         
                            <P>（二）本协议终止后，甲乙双方有未结算款项的，双方按照约定的结算方式结算。</P>
                            <p>（三）本协议期满后终止，终止前双方均有意愿继续合作的，由双方另订协议延长。双方未及时订立延长协议的，视为按本协议规定的内容执行，有效期不定期延长，期间双方均有任意解除权。</p>
                            <p>八、协议争议解决</p>
                            <p>&nbsp&nbsp凡因本协议与本协议有关的一切争议，由甲乙双方共同协商，如协商不成，提交甲方公司所在地（成都市武侯区）人民法院管辖。</p>
                            <p>&nbsp&nbsp本协议一式二份，双方各执一份，具有同等法律效力，协议修改须另行签署补充协议。</p>
                        </div>
                    </div>
                </div>
            </div>

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