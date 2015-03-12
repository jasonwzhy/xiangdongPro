<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="../../favicon.ico">
		<title>响动健身 商家注册</title>

		<!-- Bootstrap core CSS -->
		<link href="http://cdn.bootcss.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">

		<!-- Custom styles for this template -->
		<link href="/Public/agent/css/signin.css" rel="stylesheet">

		<script src="http://cdn.bootcss.com/jquery/1.11.2/jquery.min.js"></script>
		<script src="http://cdn.bootcss.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
	</head>

	<body>

		<nav class="navbar navbar-fixed-top">
			<div class="container">
				<center><p class="nav-title">响动健身 商家注册</p></center>
			</div>
		</nav>
		<div class="container logo-header">
			<div class="row">
				<div class="col-sm-offset-1 col-sm-1 col-xs-4 ">
					<img style="margin-top:25px" src="/Public/agent/img/logo2.png" height="45px">
				</div>
				<div class="col-sm-4 col-xs-8">
					<h1 style="margin-bottom:0px;">响动健身</h1>
					<a style="color:#fff;" href="http://www.lifecare.cc"><h7><u>http://www.lifecare.cc</u></h7></a>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-offset-1 col-sm-12 col-md-10  signup-container">
					<form class="form-horizontal" method="post" id="signupform">
					<!-- <form id="signupform"> -->
						<div class="form-group">
							<label for="inputEmail" class="col-sm-2 control-label">登陆Email</label>
							<div class="col-sm-9">
							  <input type="email" class="form-control" id="inputEmail" name="sginupemail" placeholder="注册Email地址" required="required">
							</div>
						</div>

						<div class="form-group">
						    <label for="inputPassword" class="col-sm-2 control-label">登陆密码</label>
						    <div class="col-sm-9">
						      <input type="password" class="form-control" id="inputPassword" name="sginuppwd" placeholder="设置登录密码" required="required">
						    </div>
					 	</div>

					 	<div class="form-group">
					  		<label for="agentName" class="col-sm-2 control-label">商家名称</label>
					  		<div class="col-sm-9">
					  			<input type="text" class="form-control" id="agentName" name="agentname" placeholder="商家品牌/公司名称" required="required">
					  		</div>
					 	</div>

			
					 	<div class="form-group">
					 		<label for="province" class="col-sm-2 control-label">省</label>
					  		<div class="col-sm-4">
					  			<!-- <select class="form-control" id="province" name="province">
					  				<option>四川</option>
					  			</select> -->
					  			<select name="selProvince" id="province"  class="form-control" onChange = "getCity(this.options[this.selectedIndex].value)"> 
							        <option value="">-请选择-</option> 
							        <option value="北京">北京</option> 
							        <option value="上海">上海</option> 
							        <option value="广东">广东</option> 
							        <option value="江苏">江苏</option> 
							        <option value="四川">四川</option> 
							    </select>
					  		</div>
					  		<label for="city" class="col-sm-1 control-label">市</label>
					  		<div class="col-sm-4">
					  		<!-- 	<select class="form-control" id="city" name="city">
					  				<option>成都</option>
					  			</select> -->
					  			<select name="selCity" id="city" class="form-control">
									<option value="">-城市-</option> 
								</select>
					  		</div>
					 	</div>

					 	<div class="form-group">
					 		<label for="address" class="col-sm-2 control-label">详细地址</label>
					 		<div class="col-sm-9">
					 			<input type="text" class="form-control" id="address" name="address" placeholder="商家联系地址 例:xx区 xxx街xxx号 xx楼xx号" required="required">
					 		</div>
					 	</div>

					 	<div class="form-group">
					 		<label for="contactor" class="col-sm-2 control-label">商家负责人</label>
					 		<div class="col-sm-9">
					 			<input type="text" class="form-control" id="contactor" name="contactor" placeholder="商家负责人姓名" required="required">
					 		</div>
					 	</div>

					 	<div class="form-group">
					 		<label for="contactorTel" class="col-sm-2 control-label">联系电话</label>
					 		<div class="col-sm-9">
					 			<input type="number" class="form-control" id="contactorTel" name="contactortel" placeholder="负责人联系电话" required="required">
					 		</div>
					 	</div>
					 	<div class="form-group">
					 		
					 	</div>

					 	<div class="form-group">
					  		<div class="col-sm-offset-2 col-sm-10">
								<div class="checkbox">
									<label>
										<input type="checkbox"  id="pactcheckbox">同意
									</label>
									<a href="#"  data-toggle="modal" data-target=".bs-example-modal-lg"><u>《响动健身服务注册协议》</u></a>
									<!-- <?php if($error): ?><label><h4>{$error}</h4></label>
									<?php else: ?>
										<label></label> -->
									<label id="errlabel"></label><?php endif; ?>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-9">
								<button class="btn btn-lg btn-danger btn-block" id="submitbtn" type="submit" >确认提交信息</button>
							</div>
						</div>
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
							        	<center><h1>《响动健身服务注册协议》商家合作协议</h1></center>
										<li><h5>商家合作协议内容 商家合作协议内容 商家合作协议内容 </h5></li>
										<li><h5>商家合作协议内容 商家合作协议内容 商家合作协议内容 </h5></li>
										<li><h5>商家合作协议内容 商家合作协议内容 商家合作协议内容 </h5></li>
										<li><h5>商家合作协议内容 商家合作协议内容 商家合作协议内容 </h5></li>
										<li><h5>商家合作协议内容 商家合作协议内容 商家合作协议内容 </h5></li>
										<li><h5>商家合作协议内容 商家合作协议内容 商家合作协议内容 </h5></li>
										<li><h5>商家合作协议内容 商家合作协议内容 商家合作协议内容 </h5></li>
							        </div>
									
								</div>
							</div>
						</div>
					</form>
				</div>

				<!-- <div class="col-xs-12 col-sm-5  signup-container">
					<h1>info</h1>
				</div>
				 -->
			</div>
		</div>
		<script src="/Public/agent/js/city.js"></script>
		<script>
			$("#submitbtn").click(function(e){
				e.preventDefault();
				if($("#pactcheckbox").prop("checked")){
					//return true;
					var inputEmail = $("#inputEmail").val();
					var inputPassword = $("#inputPassword").val();
					var agentName = $("#agentName").val();
					var province = $("#province").val();
					var city = $("#city").val();
					var address = $("#address").val();
					var contactor = $("#contactor").val();
					var contactorTel = $("#contactorTel").val();

					$.post("/Agent/signup",
						{
							sginupemail:inputEmail,
							sginuppwd:inputPassword,
							agentname:agentName,
							selProvince:province,
							selCity:city,
							address:address,
							contactor:contactor,
							contactortel:contactorTel
						},
						function(ret){
							if ("" != ret.error ) {
								alert(ret.error);
								$("#errlabel").text(ret.error);
							}
							else{
								window.location.href="/Agent/index";
							}
						}
					);
				}
				else{
					alert("您未同意《响动健身注册协议》,请选中同意并继续提交！");
					return false;
				}
			});
		
		</script>

	</body>
</html>