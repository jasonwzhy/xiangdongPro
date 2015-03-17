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
                        商家加盟 <!-- <mdall>Statistics Overview</small> -->
                    </h1>
                    <ol class="breadcrumb">
                        <li class="active">
                            <i class="fa fa-dashboard"></i> 商家加盟信息提交
                        </li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->
			<div class="panel panel-default">
			<!-- Default panel contents -->
				<div class="panel-heading">商家加盟资料</div>
		<!-- 		<div class="panel-body">
				</div> -->
				<!-- List group -->
				<ul class="list-group">
					<li class="list-group-item">
						<div class="row">
							<label for="contractSignName" class="col-md-3">合同经办人</label>
							<div class="col-md-5"><input type="text" class="form-control" id="contractSignName" name="contractsignname" placeholder="合同经办人姓名" required="required"></div>
						</div>
					</li>
					<li class="list-group-item">
						<div class="row">
							<label for="tradeNo" class="col-md-3">营业执照号</label>
							<div class="col-md-5"><input type="text" class="form-control" id="tradeNo" name="tradeno" placeholder="营业执照号" required="required"></div>
						</div>
					</li>
					<li class="list-group-item">
						<div class="row">
							<label for="tradeName" class="col-md-3">营业执照企业名</label>
							<div class="col-md-5"><input type="text" class="form-control" id="tradeName" name="tradename" placeholder="营业执照企业名" required="required"></div>
						</div>
					</li>
					<li class="list-group-item">
						<div class="row">
							<form id="imgform">
								<label for="tradePic" class="col-md-3">营业执照扫描件</label>
								<div class="col-md-5"><div id="imgview"></div><p id="imgpath" style="display: none;"></p><input type="file" class="" id="tradePic" name="tradepic" placeholder="营业执照 照片" required="required" accept="image/*"  runat="server"></div>
							</form>
						</div>
					</li>
					<li class="list-group-item">
						<div class="row">
							<label for="accountant" class="col-md-3">财务联系人</label>
							<div class="col-md-5"><input type="text" class="form-control" id="accountant" name="accountant" placeholder="财务负责人姓名" required="required"></div>
						</div>
					</li>
					<li class="list-group-item">
						<div class="row">
							<label for="accountantTel" class="col-md-3">财务联系人电话</label>
							<div class="col-md-5"><input type="number" class="form-control" id="accountantTel" name="accountanttel" placeholder="财务联系人电话" required="required"></div>
						</div>
					</li>
				</ul>

				<div class="panel-heading">财务信息</div>
				<ul class="list-group">
					<li class="list-group-item">
						<div class="row">
							<label for="accountNo1" class="col-md-3">开户行账号</label>
							<div class="col-md-5"><input type="number" class="form-control" id="accountNo1" name="accountno1" placeholder="开户行账号" required="required"></div>
						</div>
					</li>
					<li class="list-group-item">
						<div class="row">
							<label for="accountName1" class="col-md-3">账户开户名</label>
							<div class="col-md-5"><input type="text" class="form-control" id="accountName1" name="accountname1" placeholder="账户开户名" required="required"></div>
						</div>
					</li>
					<li class="list-group-item">
						<div class="row">
							<label for="accountBankname1" class="col-md-3">账户开户行</label>
							<div class="col-md-5"><input type="text" class="form-control" id="accountBankname1" name="accountbankname1" placeholder="账户开户行" required="required"></div>
						</div>
					</li>
					<li class="list-group-item">
						<div class="row">
							<label for="accountNo2" class="col-md-3">备用开户行账号</label>
							<div class="col-md-5"><input type="number" class="form-control" id="accountNo2" name="accountno2" placeholder="备用开户行账号(可选)" required="required"></div>
						</div>
					</li>
					<li class="list-group-item">
						<div class="row">
							<label for="accountName2" class="col-md-3">备用账户开户名</label>
							<div class="col-md-5"><input type="text" class="form-control" id="accountName2" name="accountname2" placeholder="备用账户开户名(可选)" required="required"></div>
						</div>
					</li>
					<li class="list-group-item">
						<div class="row">
							<label for="accountBankname2" class="col-md-3">备用账户开户行</label>
							<div class="col-md-5"><input type="text" class="form-control" id="accountBankname2" name="accountbankname2" placeholder="备用账户开户行(可选)" required="required"></div>
						</div>
					</li>
					<li class="list-group-item">
						<div class="row">
							<label for="zhifubao" class="col-md-3">支付宝账号</label>
							<div class="col-md-5"><input type="text" class="form-control" id="zhifubao" name="zhifubao" placeholder="支付宝账号(可选)" required="required"></div>
						</div>
					</li>
					<li class="list-group-item">
						<div class="row">
							<label for="wxpay" class="col-md-3">微信支付账号</label>
							<div class="col-md-5"><input type="text" class="form-control" id="wxpay" name="wxpay" placeholder="微信支付账号(可选)" required="required"></div>
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
    
    
	<script>
		$("#tradePic").change(function(){
			alert("img");
			var file = this.files[0];	//选择上传的文件
			var r = new FileReader();
			r.readAsDataURL(file);	//Base64
			$(r).load(function(){
				$('#imgview').html('<img id="tradeimg" src="'+ this.result +'" width=200px; /> <button id="upImgBtn" type="button" class="btn btn-danger btn-xs">上传图片</button>');
	            upfile();
	        });
    	});
    	function upfile(){
    		$("#upImgBtn").click(function(e){
				e.preventDefault();
				$("#upImgBtn").attr("disabled","disabled");
				var formData = new FormData($( "#imgform" )[0]);
				$.ajax({
					url: '/Agent/joinmember',
					type: 'POST',
					data: formData,
					// async: false,
					async: true,
					cache: false,
					contentType: false,
					processData: false,
					success: function (returndata) {
						alert("图片上传成功!");
						$("#tradePic").hide();
						$("#upImgBtn").attr("disabled",false).text("重新上传");
						$("#upImgBtn").unbind();
						$("#imgpath").val(returndata.savename);
						alert($("#imgpath").val());
						$("#upImgBtn").click(function(e){
							//删除img->隐藏button->显示input
							$("#tradeimg").remove();
							$("#upImgBtn").remove();
							$("#tradePic").show();
							$("#tradePic").val("");
							$("#imgpath").val("");
							alert($("#imgpath").val());
							//$("#tradePic").show().attr('value','');
						});
				    },
				    error: function (returndata) {
						alert("图片上传失败,请将图片控制在3M以内,并且用 jpg | gif | png | jpeg格式");
				    }
				  });
	    	});
    	};
    	$("#resetbtn").click(function(e){
    		$('input').val('');
    		$("#tradeimg").remove();
			$("#upImgBtn").remove();
			$("#tradePic").show();
    	});
    	$("#submitbtn").click(function(e){
    		e.preventDefault();
    		var contractSignName = $("#contractSignName").val() ? $("#contractSignName").val() : formwarring("合同经办人");
    		var tradeNo = $("#tradeNo").val() ? $("#tradeNo").val() : formwarring("营业执照号");
    		var tradeName = $("#tradeName").val() ? $("#tradeName").val() : formwarring("营业执照企业名");
    		var imgpath = $("#imgpath").val() ? $("#imgpath").val() : formwarring("营业执照扫描件");
    		var accountant = $("#accountant").val() ? $("#accountant").val() : formwarring("财务联系人");
    		var accountantTel = $("#accountantTel").val() ? $("#accountantTel").val() : formwarring("财务联系人电话");
    		var accountNo1 = $("#accountNo1").val() ? $("#accountNo1").val() : formwarring("开户行账号");
    		var accountName1 = $("#accountName1").val() ? $("#accountName1").val() : formwarring("账户开户名");
    		var accountBankname1 = $("#accountBankname1").val() ? $("#accountBankname1").val(): formwarring("账户开户行");
    		var accountNo2 = $("#accountNo2").val();
    		var accountName2 = $("#accountName2").val();
    		var accountBankname2 = $("#accountBankname2").val();
    		var zhifubao = $("#zhifubao").val();
    		var wxpay = $("#wxpay").val();
    		$.post("/Agent/joinmember",
    				{
    					contract_sign_name:contractSignName,
    					trade_no:tradeNo,
    					trade_name:tradeName,
    					trade_pic:imgpath,
    					contactor_finance:accountant,
    					contactortel_finance:accountantTel,
    					account1_no:accountNo1,
    					account1_name:accountName1,
    					account1_bankname:accountBankname1,
    					account2_no:accountNo2,
    					account2_name:accountName2,
    					account2_bankname:accountBankname2,
    					zhifubao:zhifubao,
    					wxpay:wxpay
    				},
    				function(ret){
    					if ("" != ret.error ) {
							alert(ret.error);
							//$("#errlabel").text(ret.error);
						}
						else{
							alert("审核资料提交成功!");
							window.location.href="/Agent/index";
						}
    				}

    			);
    	});
    	function formwarring(errname){
    		alert(errname+" 不能为空或类型不符,请将表格填写完整!");
    		throw "";
    	}
    </script>



</body>

</html>