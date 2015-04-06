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
        <!--        <div class="panel-body">
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
                            <label for="province" class="col-sm-1 control-label">省</label>
                            
                            <div class="col-sm-2">
                            <!--    <select class="form-control" id="city" name="city">
                                    <option>成都</option>
                                </select> -->
                                <select name="selCity" id="city" class="form-control">
                                    <option value="">-城市-</option> 
                                </select>
                            </div>
                            <label for="city" class="col-sm-1 control-label">市</label>
                        <!--    <label for="tradeName" class="col-md-3">营业执照企业名</label>
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
                            <!-- <div class="col-md-4 col-xs-5"><input type="text" class="form-control" id="lonlat" name="lonlat" placeholder="经纬度" required="required" readonly></div> -->
                            <div class="col-md-4 col-xs-5"><input type="text" class="form-control" id="lonlat" name="lonlat" placeholder="经纬度" required="required"></div>
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
                            <label for="shopcontactTel" class="col-md-3">店铺联系电话</label>
                            <div class="col-md-5"><input type="number" class="form-control" id="shopcontactTel" name="shopcontactTel" placeholder="店铺联系电话" required="required"></div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <label for="shopmanagerTel" class="col-md-3">店铺项目</label>
                            <div class="col-md-5">
                                <input type="checkbox" id="inlineCheckbox1" value="器械"> 器械
                                <input type="checkbox" id="inlineCheckbox1" value="瑜伽"> 瑜伽
                                <input type="checkbox" id="inlineCheckbox1" value="单车"> 单车
                                <input type="checkbox" id="inlineCheckbox1" value="游泳"> 游泳
                                <input type="checkbox" id="inlineCheckbox1" value="体操"> 体操
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
                        </div>
                    </li>
                    

                </ul>

                <div class="panel-heading">店铺照片(可选 限三张)</div>
                <ul class="list-group">
                    <li class="list-group-item">
                        <div class="row">
                            <label class="col-md-3 col-sm-3">店铺照片</label>
                            <div class="col-md-5 col-sm-3">
                                <button type="button" class="btn btn-primary btn-sm" id="addpicbtn" data-toggle="modal" data-target="#myModal" >添加照片</button>
                            </div>
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">添加照片</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <form id="addshoppicform">
                                                    <label for="shoppic" class="col-md-2">选择照片</label>
                                                    <div class="col-md-6">
                                                        <input type="file" class="" id="shoppic" name="shoppic" placeholder="添加图片" required="required" accept="image/*"  runat="server">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="row" style="padding-top:20px;">
                                                <div class="col-md-offset-2 col-md-2">
                                                    <button  type="button" class="btn btn-primary btn-xs" id="uppicbtn">开始上传</button>
                                                </div>
                                                <div class="col-md-2">
                                                    <button  type="button" class="btn btn-primary btn-xs"  data-dismiss="modal" aria-label="Close" id="cancel"> 取  消</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="list-group-item">
                        <div class="row"  id="piccontainer">
                            <label class="col-md-3" id="shoppreview">图片预览</label>
                            

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
    
    
    <script src="/Public/agent/js/city.js"></script>
    <script type="text/javascript" src="http://webapi.amap.com/maps?v=1.3&key=ac8dc3ed6052d2d27fc0b1c97266d1a0"></script>
    <script>
    //--------------地图--------------
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

    //--------------图片上传--------------
        function addpic(url){
            var picid = url.split("/")[1].split(".")[0];
            $("#shoppreview").after('<div class="col-sm-3" id="picsview"><img src="/Uploads/Agents/'+url+'" width="200px" height="130px"><br><button type="button" class="btn btn-primary btn-xs delbtn"   id="'+picid+'">删除</button></div>');
            $("#"+picid).click(function(){
                $(this).parent().remove();
            });
        };
        $("#addpicbtn").click(function(e){
            //如果图片预览超过三张，就return false
            if ($("#piccontainer > div").length > 2) {
                alert("最多上传三张。");
                return false;
            };
        });
        $("#uppicbtn").click(function(e){
            upshoppic();
        });
        function upshoppic(){
            var formData = new FormData($( "#addshoppicform" )[0]);
            $.ajax({
                url: '/Agent/createshop',
                type: 'POST',
                data: formData,
                async: true,
                cache: false,
                contentType: false,
                processData: false,
                success: function (returndata) {
                    console.log(returndata);
                    addpic(returndata.savepath+returndata.savename);
                    $("#shoppic").val('');
                    alert("上传成功");
                    $("#cancel").click();
                    
                },
                error: function (returndata) {
                    alert("图片上传失败,请将图片控制在3M以内,并且用 jpg | gif | png | jpeg格式");
                }
            })
        };
    //--------------ajax 提交表单----------------
        $("#submitbtn").click(function(e){
            var shopname = $("#shopName").val() ? $("#shopName").val() : warring("店面名称");
            var province = $("#province").val() ? $("#province").val() : warring("所在省份");
            var city = $("#city").val() ? $("#city").val() : warring("所在城市");
            var shopaddress = $("#shopAddress").val() ? $("#shopAddress").val() : warring("店铺详细地址");
            var lon = $("#lonlat").val() ? $("#lonlat").val().split(",")[0] : warring("经纬度");
            var lat = $("#lonlat").val() ? $("#lonlat").val().split(",")[1] : warring("经纬度");
            var contractor = $("#shopmanager").val() ? $("#shopmanager").val() : warring("店铺经理");
            var contractor_tel = $("#shopmanagerTel").val() ? $("#shopmanagerTel").val() : warring("联系电话");
            var shopdesc = $("#shopdesc").val();
            var shopcontacttel = $("#shopcontactTel").val();
            var shoptype = "";
            $("input[type='checkbox']:checked").each(function(){
                shoptype=$(this).val()+","+shoptype;
            });
            if (shoptype == "") {
                warring("店铺项目类型");
            };
            var shoppicpaths = "";
            $("#piccontainer > div > img").each(function(){
                shoppicpaths = $(this).attr('src')+","+shoppicpaths;
            });
            $.post("/Agent/createshop",
                    {
                        shopname:shopname,
                        province:province,
                        city:city,
                        shopaddress:shopaddress,
                        lon:lon,
                        lat:lat,
                        contractor:contractor,
                        contractor_tel:contractor_tel,
                        shopdesc:shopdesc,
                        shoptype:shoptype,
                        shoppicpaths:shoppicpaths,
                        shopcontacttel:shopcontacttel
                    },
                    function(ret){
                        if ("" != ret.error ) {
                            alert(ret.error);
                            //$("#errlabel").text(ret.error);
                        }
                        else{
                            alert("店铺创建成功!");
                            window.location.href="/Agent/shopsview";
                        }
                    }

                );
        });
        function warring(errstr)
        {
            alert(errstr+" 不能为空或类型不符,请将表格填写完整!");
            throw "";
        }

    </script>


</body>

</html>