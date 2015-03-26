<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--[if lt IE 8 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 8)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>


   <!--- Basic Page Needs
   ================================================== -->
	<meta charset="utf-8">
	<title>响动健身</title>
	<meta name="description" content="">
	<meta name="author" content="">

   <!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS
   ================================================== -->
   <link rel="stylesheet" href="/Public/home/css/base.css">
	<link rel="stylesheet" href="/Public/home/css/layout.css">
   <style>
      #total{width:500px; height:auto; /*line-height:140px; margin:80px auto 20px auto; font-size:20px;*/display: inline;}
      #total .t_num{ display:inline-block; line-height:13px; margin:2px 4px 0 4px;}
      #total .t_num i{width:58px;height:66px; display:inline-block; background: url(/Public/home/images/number.png) no-repeat; background-position:0 0; text-indent:-999em}
   </style>

	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

   <!-- Favicons
	================================================== -->
	<link rel="shortcut icon" href="favicon.ico" >


</head>

<body data-spy="scroll" data-target="#nav-wrap">


   <!-- Header
   ================================================== -->
   <header class="mobile">

      <div class="row">

         <div class="col full">

            <div class="logo">
               <img src="/Public/home/images/logo.png" style="max-width:200px;">
               <!-- <a href="#"></a> -->
            </div>

            <nav id="nav-wrap">

               <a class="mobile-btn" href="#nav-wrap" title="Show navigation">Show navigation</a>
	            <a class="mobile-btn" href="#" title="Hide navigation">Hide navigation</a>

               <ul id="nav" class="nav">

	               <li><a href="#intro">首  页</a>
                  </li>
	               <li><a href="#services">服务介绍</a></li>
	               <li><a href="#portfolio">产品介绍</a></li>
	               <!-- <li><a href="#journal">关于我们</a></li> -->
                  <li><a href="#about">关于我们</a></li>
                  <li><a href="http://www.lifecare.cc/Agent/signin">商家入口</a></li>
               </ul>

            </nav>

         </div>

      </div>

   </header> <!-- Header End -->


   <!-- Intro Section
   ================================================== -->
   <section id="intro">

      <!-- Flexslider Start-->
	   <div id="intro-slider" class="flexslider">
         <div class="row" style="margin-bottom:20px;">
            <div class="col">
               <h1 style="color:#ED8904">想动? 和 
                  <div id="total">
                     <span class="t_num"></span>
                  </div>
                  人一起响动!
               </h1>
            </div>
         </div>
         <div class="row">
            <div class="col  one-fourth">
               <img src="/Public/home/images/intro1.png">
            </div>
            <div class="col one-fourth">
               <img src="/Public/home/images/intro2.png">
            </div>
            <div class="col one-fourth">
               <img src="/Public/home/images/intro3.png">
            </div>
            <div class="col one-fourth">
               <img src="/Public/home/images/intro4.png">
            </div>
         </div>
         <div class="row">
            <div class="col offset-1 one-fourth">
               <img src="/Public/home/images/homeqr.png">
            </div>
            <div class="col offset-1 seven-twelfths">
               <img src="/Public/home/images/homepage.png">
            </div>
         </div>
         
		   <!-- <ul class="slides"> -->

			   <!-- Slide -->
			  <!--  <li>
				   <div class="row">
					   <div class="col full">
						   <div class="slider-text">
							   <h2>嗨！！这里是<span>响动</span> 我们有最新的健身咨询、正确的健身方法、科学的健身饮食建议！</h2>
							   <p>响动倡导更积极的生活态度、更健康的生活方式、更自由的生活乐趣.</p>
                        <p>你负责订阅我们，我们负责激励你坚持健身，充分享受运动带来的快乐</p>
                        <img src="/Public/home/images/QRcode_wechat.jpg">
						   </div>
					   </div>
				   </div>
			   </li> -->

            <!-- Slide -->
			   <!-- <li>
				   <div class="row">
					   <div class="col full">
						   <div class="slider-text">
							   <h2>响动！！是一张价格便宜的 <a href="#portfolio" title="">健身次卡</a>一张畅行全国数千家健身房的健身一卡通</h2>
							   <p>响动采用微信平台引导消费者方便地进行健身卡的购买，以及健身房挑选</p>
                        <img src="/Public/home/images/QRcode_wechatFW.jpg" width="115px" height="115px">
						   </div>
					   </div>
				   </div>
			   </li> -->

		   <!-- </ul> -->
	   </div>
	   <!-- Flexslider End-->

   </section> <!-- Intro Section End-->


   <!-- Services Section
   ================================================== -->
   <section id="services">
      <div class="row" style="margin-bottom:50px;">
         <div class="col full" style="margin-left:2%;">
            <h2 style="color:#FFCC66">全国已开通 <img src="/Public/home/images/n3.png" style="height:50px;"> 个城市 <img src="/Public/home/images/shopnum.png">
            家特约商户</h2>
         </div>
      </div>
      <div class="row" style="margin-bottom:60px;">
         <div class="col full offset-2 three-fourths">
            <img src="/Public/home/images/gym_type.png">
         </div>
      </div>
      <div class="row">
         <div class="col five-twelfths">
            <img src="/Public/home/images/cards.png">
         </div>
         <div class="col half">
            <h3>
               199元4次的响动月卡，为你打造专属的健身计划，4周内用完再送4次，让你时刻保持好身材
            </h3>
            <h3>
               299元10次的响动年卡，丰富的健身选择，宽松的时间跨度，让你随时随地享受运动乐趣
            </h3>
            <h3>
               另有4次、6次、8次年卡可供选择
            </h3>
         </div>
      </div>

      <div class="row">
         <div class="col full offset-2">
            <img src="/Public/home/images/cards_type.png" style="max-width:150%;">
         </div>
      </div>

      <div class="row services-wrapper">

         <div class="col one-third">
            <p>
               <img src="/Public/home/images/icon_lamp.png">
               <span class="sh3">想动.</span>
            </p>
            <p>
               <img src="/Public/home/images/star.png" class="shimg">
               <div class="itemtext whtext">
                  无论你身处何方，查查周边的健身房，想动就动.
               </div>
            </p>
            <p>
               <img src="/Public/home/images/star.png" class="shimg">
               <div class="itemtext whtext">无论是跑步、健身、还是瑜伽、游泳，应有尽有.
               </div>
            </p>
         </div>

         <div class="col one-third">
            <p>
               <img src="/Public/home/images/icon_lamp.png">
               <span class="sh3">响动.</span>
            </p>
            <p>
               <img src="/Public/home/images/star.png" class="shimg">
               <div class="itemtext whtext">
                  响动月卡，适合时刻保持良好频率的的健身达人.
               </div>
            </p>
            <p>
               <img src="/Public/home/images/star.png" class="shimg">
               <div class="itemtext whtext">响动年卡，适合随时随地启动锻炼的职场精英.
               </div>
            </p>
         </div>

         <div class="col one-third">
            <p>
               <img src="/Public/home/images/icon_lamp.png">
               <span class="sh3">享动.</span>
            </p>
            <p>
               <img src="/Public/home/images/star.png" class="shimg">
               <div class="itemtext whtext">
                  免费赠送与积分计划，让你坚持健身，爱上运动.
               </div>
            </p>
            <p>
               <img src="/Public/home/images/star.png" class="shimg">
               <div class="itemtext whtext">健身卡分享，随时随地随心约.
               </div>
            </p>
         </div>

      </div> <!-- Process Wrap End -->


   </section> <!-- Services Section End -->


   <!-- Portfolio Section
   ================================================== -->
   <section id="portfolio">

      <!-- <div class="row section-head">
         <div class="col full">

            <h2>响动在做什么？</h2>
            <p class="desc">Check out our latest projects.</p>

            <p class="intro">响动致力于联结全国数千家健身房，为消费者提供丰富的健身选择，便捷的健身方式，以及低价的健身消费。
            </p>

         </div>
      </div> -->
      <div class="row">
         <div class="col half">

            <img src="/Public/home/images/chain_1.png" class="shimg">
            <div class="itemtext2 bktext">
               <span class="sh3 bktext">优势.</span>
               <div class="graytext" style="padding-left:10px;">
                  响动健身一卡通在全国数千家特约商户通用，包括健身房、瑜伽馆、游泳馆、羽毛球馆，2015年还将增加数千家球馆、舞蹈馆、武术馆等。
                  <br><br>
                  响动是一张价格经济的健身次卡，对于担心一次花费数千元办理会员卡性价比和使用率不高的消费者来说，一两百元的消费门槛为他们提供了一个更为体贴的选择
               </div>
               <img src="/Public/home/images/qrcodewx.jpg" width="50%;">
               <div class="graytext" style="font-size:15px;padding-left:10px;" >关注响动服务号，了解更多优势</div>
            </div>
            <!-- <p>
               <img src="/Public/home/images/star.png" class="shimg">
               <div class="itemtext bktext">
                  免费赠送与积分计划，让你坚持健身，爱上运动.
               </div>
            </p>
            <p>
               <img src="/Public/home/images/star.png" class="shimg">
               <div class="itemtext bktext">健身卡分享，随时随地随心约.
               </div>
            </p> -->
         </div>

         <div class="col half">

            <img src="/Public/home/images/chain_2.png" class="shimg">
            <div class="itemtext2 bktext">
               <span class="sh3 bktext">商户加盟.</span>
               <div class="graytext" style="padding-left:10px;">
                  响动针对的客户与现有的健身房年卡，以及团购客户几乎是完全不重叠的
                  <br><br>
                  响动对消费者而言不仅有时间，更有空间上的拓展延续，对于特约商户而言，相当于在全国免费开了无数家分店
                  <br><br>
                  响动采用微信平台引导消费者更方便快捷地进行健身卡的购买支付，以及健身房的查询挑选
                  <br><br>
                  对我们有意向的商户，可以通过在线注册与申请的方式加盟
               </div>
               
               <div class="graytext" style="font-size:15px;padding-left:10px;padding-top:15px;" >
                  <button class="buttony"><a href="http://www.lifecare.cc/Agent/signup">在线注册与申请</a></button>
               </div>
            </div>
            <!-- <p>
               <img src="/Public/home/images/star.png" class="shimg">
               <div class="itemtext bktext">
                  免费赠送与积分计划，让你坚持健身，爱上运动.
               </div>
            </p>
            <p>
               <img src="/Public/home/images/star.png" class="shimg">
               <div class="itemtext bktext">健身卡分享，随时随地随心约.
               </div>
            </p> -->
         </div>
      </div>
      

   </section> 
   
   <section id="about">

      <div class="row section-head">

         <div class="col one-third">
            <img src="/Public/home/images/team.png">
         </div>

         <div class="col two-thirds">
             <h2>关于我们</h2>
             <br>
             <h5>
                响动健身科技是一支年轻的跨界创业团队，尝试用移动互联网给人们的健身
               带来更多选择与便利，同时也给健身房带来更多客源与机会。我们崇尚健康
               的生活，也理解需求的尴尬，同时坚信互联网不仅能填平信息的鸿沟，提升
               资源的使用率，还能提供一种更为经济和友好的方式让人们想动就动，享受
               运动。
             </h5><br>
             <h5>
               欢迎与我们联系或干脆加入我们 ：）
             </h5><br>
             <h5>
                地址: 成都市武侯区新南路44号附1号腾云商务大厦6楼
             </h5>
             <h5>
                电话: 02885482036(9:00AM-6:00PM)
             </h5>
             <h5>
                Email: xd@lifecare.cc  
             </h5>
         </div>

      </div>

   </section> <!-- About Section End-->

   <!-- footer
   ================================================== -->
   <footer>
      <div class="row">
         <div class="col full">
            <ul class="copyright">
               <li>Copyright &copy; 2015 响动健身科技 All rights reserved</li>
            </ul>
            <ul class="copyright">
               <li>蜀ICP备15005203号</li>
            </ul>
         </div>
      </div>
   </footer> <!-- Footer End-->

   <!-- Java Script
   ================================================== -->
   <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>-->
   <script src="/Public/home/js/jquery-1.7.2.min.js"></script>

   <script type="text/javascript" src="/Public/home/js/jquery-migrate-1.2.1.min.js"></script>

   <script src="/Public/home/js/scrollspy.js"></script>
   <script src="/Public/home/js/jquery.flexslider.js"></script>
   <script src="/Public/home/js/jquery.reveal.js"></script>
   <!--<script src="http://maps.google.com/maps/api/js?sensor=true" type="text/javascript"></script>-->
   <!--<script src="js/gmaps.js"></script>-->
   <script src="/Public/home/js/init.js"></script>
   <script src="/Public/home/js/smoothscrolling.js"></script>
   
   <script src="/Public/home/js/animateBackground-plugin.js"></script>
   <script>
      show_num(<?php echo ($countnum); ?>);
      $(function(){
         getdata();
         setInterval('getdata()', 3000);
      });
      function getdata(){
         $.ajax({
             url: '/index',
            type: 'POST',
            dataType: "json",
            data:{'option':'counting'},
            cache: false,
            timeout: 10000,
            error: function(){
               show_num(<?php echo ($countnum); ?>);
            },
            success: function(data){
               show_num(data.countnum);
             }
            });
      }
      function show_num(n){
         var it = $(".t_num i");
         var len = String(n).length;
         for(var i=0;i<len;i++){
            if(it.length<=i){
               $(".t_num").append("<i></i>");
            }
            var num=String(n).charAt(i);
            var y = -parseInt(num)*73.2;
            var obj = $(".t_num i").eq(i);
            obj.animate({
               backgroundPosition :'(0 '+String(y)+'px)' 
               }, 'slow','swing',function(){}
            );
         }
         $("#cur_num").val(n);
      }
   </script>

</body>
</html>