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
					<!-- <img style="margin-top:25px" src="/Public/agent/img/logo2.png" height="45px"> -->
					<img style="margin-top:25px"  src="/Public/agent/img/logo1.png" width="150px">
				</div>
				<!-- <div class="col-sm-4 col-xs-8">
					<h1 style="margin-bottom:0px;">响动健身</h1>
					<a style="color:#fff;" href="http://www.lifecare.cc"><h7><u>http://www.lifecare.cc</u></h7></a>
				</div> -->
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
							        <option value="北京市">北京市</option> 
							        <option value="上海市">上海市</option> 
							        <option value="天津市">天津市</option> 
							        <option value="重庆市">重庆市</option> 
							        <option value="河北省">河北省</option> 
							        <option value="山西省">山西省</option> 
							        <option value="内蒙古自治区">内蒙古自治区</option> 
							        <option value="辽宁省">辽宁省</option> 
							        <option value="吉林省">吉林省</option> 
							        <option value="黑龙江省">黑龙江省</option> 
							        <option value="江苏省">江苏省</option> 
							        <option value="浙江省">浙江省</option> 
							        <option value="安徽省">安徽省</option> 
							        <option value="福建省">福建省</option> 
							        <option value="江西省">江西省</option> 
							        <option value="山东省">山东省</option> 
							        <option value="河南省">河南省</option> 
							        <option value="湖北省">湖北省</option> 
							        <option value="湖南省">湖南省</option> 
							        <option value="广东省">广东省</option> 
							        <option value="广西壮族自治区">广西壮族自治区</option> 
							        <option value="海南省">海南省</option> 
							        <option value="四川省">四川省</option> 
							        <option value="贵州省">贵州省</option> 
							        <option value="云南省">云南省</option> 
							        <option value="西藏自治区">西藏自治区</option> 
							        <option value="陕西省">陕西省</option> 
							        <option value="甘肃省">甘肃省</option> 
							        <option value="宁夏回族自治区">宁夏回族自治区</option> 
							        <option value="青海省">青海省</option> 
							        <option value="新疆维吾尔族自治区">新疆维吾尔族自治区</option> 
							        <option value="香港特别行政区">香港特别行政区</option> 
							        <option value="澳门特别行政区">澳门特别行政区</option> 
							        <option value="台湾省">台湾省</option> 
							        <option value="其它">其它</option> 
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
							        	<center><h1>《响动健身服务注册协议》商家注册协议</h1></center>						 
						<p>尊敬的商家，欢迎您免费申请成为响动（以下简称“响动”）的注册商家！</p>
						 
						<p>为确保响动消费者获得有效与优质服务，以及在处理可能的纠纷时便于维护双方的正当权益，请您务必仔细阅读以下服务条款，确保所提交资料的真实性、准确性与完整性，并在成为正式签约商家之前的资质核验过程中给予必要配合。</p>
						<p>一、商家资料</p>
						<p>基于响动所提供的网络服务的必要条件，商家应同意：</p>
						<p>1、提供详尽、准确的商家资料。</p>
						<p>2、不断更新注册资料，符合及时、详尽、准确的要求。如果商家提供的资料包含有不正确的信息，响动有权暂停或终止您的帐号，并拒绝您于现在和未来使用本服务之全部或任何部分。</p>
						<p>二、服务条款的修改</p>
						<p>响动有权在必要时更新、修改服务条款，以更好服务商家和客户。服务条款一旦发生变动，将会在重要页面上提示更新、修改内容或通过邮件通知商家。如果不同意所更新、修改的内容，商家可以主动取消获得的响动商家服务。如果商家继续享用响动商家服务，则视为接受服务条款的变动。响动保留特殊情况下未经商家许可调整或中断服务的权利。响动基于更新、行使修改或中断服务的权利，所带来的潜在风险和可能造成的损失，不需要对商家承担任何责任。</p>
						<p>三、商家隐私</p>
						<p>响动确保商家隐私得到尊重，保证不会在未经商家合法授权时公开、编辑或透露商家注册资料及保存在响动中的非公开内容。以下情况除外：</p>
						<p>1、商家授权响动公开、透露这些信息。</p>
						<p>2、相关的法律法规或监管机构、司法机构要求响动提供商家的个人资料。</p>
						<p>四、商家的帐号，密码和安全性</p>
						<p>商家一旦注册成功，将使用注册时填写的登录邮箱和密码登录响动商家后台。商家务必妥善保管其登录邮箱和密码，并承担由账号安全带来的全部责任。每个商家都要对以其商家名称进行的所有活动和事件负全责。商家不得更改登录名称。在任何时候及情况下，商家均不得向任何第三方透露登录邮箱或密码。一旦商家知悉或怀疑登录邮箱及密码为任何第三方所知悉，或有人未经授权而使用此服务，商家须尽快通知响动，或按响动指定的电话号码以电话通知（可能需要商家以书面确认所提供的个人资料），而在响动确认上述通知有效性之前，商家须就任何第三方使用服务或服务被用作未经授权用途承担责任。</p>
						<p>五、商家责任</p>
						<p>商家需对自己在网上的行为承担法律责任。商家必须遵守中华人民共和国的各项法律法规。商家须承诺不传输任何非法的、骚扰性的信息资料，辱骂性的、恐吓性的信息资料，庸俗的、淫秽的信息资料 , 不能传输任何不符合国家法律、法规的信息资料，若商家的行为不符合以上提到的服务条款，响动将有权独立判断取消该商家的帐号。
						商家单独承担发布内容的责任。商家对服务的使用是根据所有适用于交友服务的地方法律、国家法律和国际法律标准的。商家必须遵循：</p>
						<p>1、发布信息时必须中华人民共和国的各项有关法律法规，遵守网上一般道德及规范。</p>
						<p>2、不得发布任何宣扬发动、封建迷信、淫秽、色情、赌博、暴力、凶杀、恐怖，教唆3、犯罪等不符合国家法律规定的以及任何包含种族 , 性别，宗教歧视性和猥亵性的信息内容。</p>
						<p>4、不得发布任何带有漫骂、辱骂以及包含人身攻击等会产生不良后果的信息内容。</p>
						<p>5、不得利用响动散布广告以及其它商业化的宣传。</p>
						<p>6、不干扰或混乱响动网络服务。</p>
						<p>七、结束服务和身份的取消</p>
						<p>商家若反对任何服务条款的建议或对后来的条款修改有异议，或对响动服务不满，商家有以下权利：</p>
						<p>1、通知响动，不再使用响动服务。</p>
						<p>2、通知响动，停止该商家的服务。结束服务后，商家使用响动服务的权利马上中止。从那时起，响动不再对商家承担任何义务。</p>						 
						<P>任何商家有如下行为而导致其帐户被取消，责任自负，响动不承担任何责任：</P>
						<p>1、有违反服务条款的行为。</p>
						<p>2、滥用所享受的权利。</p>
						<p>3、提供虚假注册信息。</p>
						<P>4、通过不正当手段参与响动活动。</P>
						<p>5、有损害其他商家的行为。</p>
						<p>6、违反中国的法律、法规。</p>
						<p>响动可随时根据实际情况中断一项或多项网络服务。响动中断服务不需对任何个人或第三方负责。</p>
						<p>八、内容的所有权</p>
						<p>响动网络服务内容包括：文字、软件、声音、图片、录象、图表、广告中的全部内容；电子邮件的全部内容；响动为商家提供的其他信息。所有这些内容受版权、商标、标签和其它财产所有权法律的保护。</p>
						<p>九、免责</p>
						<p>响动将尽力提供一切可能的技术和设备维护商家的资料安全，并努力提供最好的服务。但，</p>
						<p>1、由于非故意或不可抗拒的原因（含系统维护和升级），导致的商家数据损失、服务停止，响动不承担赔偿及其他连带的法律责任。</p>
						<p>2、响动无须对任何商家的任何登记资料承担任何责任，包括但不限于鉴别、核实任何登记资料的真实性、正确性、完整性、适用性及/或是否为最新资料的责任。</p>
						<p>3、个人或单位如认为响动网上存在侵犯自身合法权益的内容，应准备好具有法律效应的证明材料，及时与响动取得联系，以便响动迅速做出处理。</p>
						<p>4、在论坛转贴文章时事先征得原作者同意，并注明原作者姓名及出处，版权仅归原作者所有。否则响动对由此可能产生侵权的直接或间接结果不承担任何责任。</p>
						<p>5、商家通过响动相识、交往中所发生或可能发生的任何心理、生理上的伤害及经济上的损失，响动不承担任何责任。</p>
						<p>十、法律</p>
						<p>1、响动保留响动的最终解释权。</p>
						<p>2、响动保留在任何时刻，更动本服务条款全部或部份的权利。</p>
						<p>3、响动服务条款应与国家法律解析一致。若有任何服务条款与法律相抵触，以国家法律为准。</p>
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
		<script src="/Public/agent/js/jquery.md5.js"></script>
		<script>
			$("#submitbtn").click(function(e){
				e.preventDefault();
				if($("#pactcheckbox").prop("checked")){
					//return true;
					var inputEmail = $("#inputEmail").val();
					var inputPassword = $.md5($("#inputPassword").val());
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