<?php
namespace Home\Controller;
use Think\Controller;
class WechatController extends Controller {
		private $wx_openid = null;
		private $appId = 'wx4e892e84ce5a315f';

		
		public function __construct(){
			parent::__construct();
		//public function __initialize(){
			$this->wx_openid = $_GET['wx_openid'];
		}
		
		// 响动首页
    public function index(){
    	$this->assign("wx_openid",$this->wx_openid);    	
    	$this->show();
    }
    
    // 加盟响动
		public function joinus(){
			$signPackage = $this->getSignPackage();
			$this->assign('appId',$signPackage['appId']);
			$this->assign('timestamp',$signPackage['timestamp']);
			$this->assign('nonceStr',$signPackage['nonceStr']);
			$this->assign('signature',$signPackage['signature']);

    	$this->assign("wx_openid",$this->wx_openid);			
    	$this->show();
    }
		
		// 保存微信提交的加盟信息
	  public function savejoin(){
			$result=false;
			$tbldata  = new \Think\Model("agents");
			$chkbox_array = $_REQUEST["chbx"];
		
			//var_dump($_REQUEST);
			//exit;
			
			$data_find['agent_name']  = $_REQUEST['agentname'];
			$data_find['agent_mail']  = $_REQUEST['email'];

			$agentRow = $tbldata->where($data_find)->find();
			
			if($agentRow !=  null)
			{
					unset($agentRow);
					echo json_encode(array('success'=>true,'msg'=>'信息已经提交!'));
					return;
			}
			else
			{
				unset($agentRow);

				$row['contract']  = "-1";
				$row['contract_pwd']  = "-1";
				$row['contract_loginname']  = "-1";
				$row['agent_name']  = $_REQUEST['agentname'];
				$row['agent_src']  = "网签";
				$row['agent_mail']  = $_REQUEST['email'];
				$row['agent_state']  = "未批准";
				$row['city_code']  = "";
				$row['province']  = "";
				$row['city']  = "";
				$row['contract_begindt']  = date("Y-m-d H:i:s",time());
				$row['contract_begintimestamp']  = time();
				$row['contract_enddt']  = date("Y-m-d H:i:s",time()+3600*24*365);
				$row['contract_endtimestamp']  = time()+3600*24*365;
				$row['contract_signdt']  = date("Y-m-d H:i:s",time());

				$row['contactor']  = $_REQUEST['contactor'];
				$row['contactor_tel']  = $_REQUEST['contactortel'];
				$row['contactor_mail']  = $_REQUEST['email'];
				$agent_descr = "";
				for ($i= 0;$i< count($chkbox_array); $i++){
					$agent_descr = $agent_descr.$chkbox_array[$i].",";
				}

				$row['agent_descpn'] = substr($agent_descr,0,-1);

				//var_dump($row);
				$result=$tbldata->add($row);
				unset($row);
				
				if($result ==  true)
				{
					echo json_encode(array('success'=>true,'msg'=>'提交成功!'));
				}
				else
				{
					echo json_encode(array('msg'=>'提问失败!'));
				}
			}
	  }
	  
    // 附近的店
		public function agent(){
    	$this->assign("wx_openid",$this->wx_openid);
			$signPackage = $this->getSignPackage();
			$this->assign('appId',$signPackage['appId']);
			$this->assign('timestamp',$signPackage['timestamp']);
			$this->assign('nonceStr',$signPackage['nonceStr']);
			$this->assign('signature',$signPackage['signature']);

    	$this->show();
    }

    /**
		*  @desc 根据两点间的经纬度计算距离
		*  @param float $lat 纬度值
		*  @param float $lng 经度值
		*/
	  private function getDistance($lat1, $lng1, $lat2, $lng2)
	  {
		     $earthRadius = 6367000; //approximate radius of earth in meters
		 
		     /*
		       Convert these degrees to radians
		       to work with the formula
		     */
		 
		     $lat1 = ($lat1 * pi() ) / 180;
		     $lng1 = ($lng1 * pi() ) / 180;
		 
		     $lat2 = ($lat2 * pi() ) / 180;
		     $lng2 = ($lng2 * pi() ) / 180;
		 
		     /*
		       Using the
		       Haversine formula
		 
		       http://en.wikipedia.org/wiki/Haversine_formula
		 
		       calculate the distance
		     */
		 
		     $calcLongitude = $lng2 - $lng1;
		     $calcLatitude = $lat2 - $lat1;
		     $stepOne = pow(sin($calcLatitude / 2), 2) + cos($lat1) * cos($lat2) * pow(sin($calcLongitude / 2), 2);  $stepTwo = 2 * asin(min(1, sqrt($stepOne)));
		     $calculatedDistance = $earthRadius * $stepTwo;
		 
		     return round($calculatedDistance);
		}
		
		private function array_sort($arr, $keys, $type = 'asc') {
		    $keysvalue = $new_array = array();
		    foreach ($arr as $k => $v) {
		        $keysvalue[$k] = $v[$keys];
		    }
		    if ($type == 'asc') {
		        asort($keysvalue);
		    } else {
		        arsort($keysvalue);
		    }
		    reset($keysvalue);
		    foreach ($keysvalue as $k => $v) {
		        $new_array[$k] = $arr[$k];
		    }
		    return $new_array;
		}
		
		// 根据经纬度获取最近3个店的数据
		public function getNearShop(){
			$city = isset($_REQUEST['city'])?$_REQUEST['city']:'成都';
			
			$lng = $_REQUEST['lng'];
			$lat = $_REQUEST['lat'];

    	$tbldata  = new \Think\Model("agents_shops");
    	$rows = $tbldata->where("shopcity='".$city."'")->order("id asc")->select();

    	$rowsData = array();
			foreach($rows as $k=>$v){ 
				//echo $k."=>".$v["p_id"]."<br />";
				$distance = $this->getDistance($lat,$lng,$v["lat"],$v["lon"]);

				$rowsData[$v["id"]] = array(
					'distance'=>$distance,
					'name'=>$v['shopname'],
					'addr'=>$v['shopaddress'],
					'lon'=>$v['lon'],
					'lat'=>$v['lat'],
					'tel'=>$v['contractor_tel'],		
				);
			}
			$total = count($rowsData);
			$rowsData2 = $this->array_sort($rowsData,'distance');
		
			if($total >6)
			{
				$rowsData =  array_slice($rowsData2,0,5);
			}
			
			$jsonrlt='{"total":'.$total.',"rows":'.json_encode($rowsData).'}';
			
			echo $jsonrlt;
		}
		
		public function agentmap(){
			$city=isset($_REQUEST['city'])?$_REQUEST['city']:'成都';
			
			$this->assign("city",$city);
    	$this->assign("wx_openid",$this->wx_openid);			
    	$this->show();
    }

		public function agentmapwx(){
			$city=isset($_REQUEST['city'])?$_REQUEST['city']:'成都';
			$signPackage = $this->getSignPackage();
			$this->assign('appId',$signPackage['appId']);
			$this->assign('timestamp',$signPackage['timestamp']);
			$this->assign('nonceStr',$signPackage['nonceStr']);
			$this->assign('signature',$signPackage['signature']);
			
			$this->assign("city",$city);
    	$this->assign("wx_openid",$this->wx_openid);			
    	$this->show();
    }
    
    // 调用高德地图附近的店查找
		public function agentmapgd(){
			$city=isset($_REQUEST['city'])?$_REQUEST['city']:'成都';
			$signPackage = $this->getSignPackage();
			$this->assign('appId',$signPackage['appId']);
			$this->assign('timestamp',$signPackage['timestamp']);
			$this->assign('nonceStr',$signPackage['nonceStr']);
			$this->assign('signature',$signPackage['signature']);
			
			$this->assign("city",$city);
    	$this->assign("wx_openid",$this->wx_openid);			
    	$this->show();
    }    
    
    // 卡片激活页面
    public function activecard(){
    	$this->assign("cardcode",$_GET["cardcode"]);
    	$this->assign("wx_openid",$this->wx_openid);
    	
			$signPackage = $this->getSignPackage();
			$this->assign('appId',$signPackage['appId']);
			$this->assign('timestamp',$signPackage['timestamp']);
			$this->assign('nonceStr',$signPackage['nonceStr']);
			$this->assign('signature',$signPackage['signature']);
			
			$this->show();
    }
    
    // 卡片激活处理函数
    public function saveactivcard(){
    	if(!isset($_REQUEST['activetel']))
    	{
    		echo '卡片激活失败,请在微信里打开!';
    		return;
    	}
    	else
    	{
    		//查找手机号对应wx_openid
				$FindWxOpenId = new \Think\Model("wx_users");
				$data['phone']  = $_REQUEST['activetel'];
				$wxuserRow = $FindWxOpenId->where($data)->find();
				
				if($wxuserRow !=  null){
					$wx_openid = $wxuserRow["wx_openid"];
				}
				else
				{
	    		echo json_encode(array('success'=>false,'msg'=>'激活失败,请先点右上角关注公众号后在"享动"中的"我的响动"绑定手机号!'));
	    		return;					
				}
    	}
    	
			$result = false;
			//查找是否在订单里面,如果没有通知客户联系客服解决
			
			$FindCardActive = new \Think\Model("cardactive");
			$data['card_code']  = $_REQUEST['cardcode'];
			$cardRow = $FindCardActive->where($data)->find();
			
			if($cardRow !=  null)
			{
				//查找该卡号是否被激活
				if($cardRow["active_state"] == 1)
				{
					unset($cardRow);
					echo json_encode(array('success'=>true,'msg'=>'卡片已经激活成功!'));
					return;
				}
				else
				{
					$row["wx_openid"] = $wx_openid;
					$row["active_tel"] = $_REQUEST['activetel'];
					$row["active_state"] = 1;

					$active_dt = date("Y-m-d H:i:s",time());
					$row["active_dt"] = $active_dt;
					$row["active_timestamp"] = time();
					
					$expired_days = $cardRow["expired_days"];
					//$row["card_expired_timestamp"] = $row["active_timestamp"] + $expired_days * 24 * 60 * 60;
					//$row["card_expired_dt"] =  date('Y-m-d H:i:s', $row["card_expired_timestamp"]); 

					$result = $FindCardActive->where($data)->save($row);
					unset($row);
					
					if($result ==  true)
					{
						echo json_encode(array('success'=>true,'msg'=>'卡片激活成功!'));
						$this->sendTplMsg_ActiveCard($wx_openid,$_REQUEST['cardcode'],$active_dt,$_REQUEST['activetel'],"卡片使用天数期限为首次使用后的".$expired_days."天");
						return;
					}
					else
					{
						echo json_encode(array('success'=>false,'msg'=>'卡片激活失败<br>请检查卡号订单号或联系客服解决!'));
						return;
					}
				}
			}
			else
			{
				unset($orderRow);
				echo json_encode(array('success'=>false,'msg'=>'卡片激活失败<br>请检查卡号订单号或联系客服解决!'));
				return;
			}				
    }
		
		// 扫描确认消费页面
		public function cardcost(){
			if(!isset($_REQUEST['wx_openid']))
			{
				echo "页面错误!";
			}
			
			$tbldata  = new \Think\Model("cardactive");
			$currenttime = time();
			$wx_openid = $_REQUEST['wx_openid'];
			$str_where = "(card_leftnums >0 and card_expired_timestamp >=".$currenttime ."  and wx_openid = '".$wx_openid."') "." or ( wx_openid = '".$wx_openid."' and firstuse_dt is NULL) ";
			$cardrows = $tbldata->field("card_code,card_leftnums")->where($str_where)->select();
			
			$this->assign("cardlist",$cardrows);
    	$this->assign("wx_openid",$this->wx_openid);
    	$this->assign("cost_tag",time());
    	$this->assign("contract_code",$_REQUEST['contract_code']);
    	$this->assign("shopid",$_REQUEST['shopid']);
			$this->show();			
		}
		
		// 记录二维码扫描消费记录
		public function savecardcost(){
    	if(!isset($_REQUEST['wx_openid']))
    	{
    		echo '卡片激活失败,请在微信里打开!';
    		return;
    	}

			$result = false;
			//查找是否在激活订单里面,如果没有通知客户联系客服解决
			
			$tblactivecard = new \Think\Model("cardactive");
			$order['card_code']  = $_REQUEST['cardcode'];
			$order['wx_openid']  = $_REQUEST['wx_openid'];
			$orderRow = $tblactivecard->where($order)->find();
			
			if($orderRow !=  null)
			{
				// 增加到消费log表里面去并根据 cost_tag 查找是否有重复提交的数据
				$used_tag = $_REQUEST['cost_tag'];
				
				$tbl_cardcostlog = new \Think\Model("card_uselog");
				$order['card_code']  = $_REQUEST['cardcode'];
				$order['used_tag']  = $used_tag;
				$order['wx_openid']  = $_REQUEST['wx_openid'];
				$cardcostlogRow = $tbl_cardcostlog->where($order)->find();
				
				if($cardcostlogRow !=  null)
				{
					unset($cardcostlogRow);
					echo json_encode(array('success'=>false,'msg'=>'扫描消费成功,请勿重复提交!'));
					return;					
				}
				else
				{
					$row["used_tag"] = $used_tag;
					$row["card_code"] = $_REQUEST['cardcode'];
					$row["wx_openid"] = $_REQUEST['wx_openid'];
					
					$used_dt = date("Y-m-d H:i:s",time());
					$row["used_dt"] = $used_dt;
					$row["used_timestamp"] = time();
					
					$row["contract_code"] = $_REQUEST['contract_code'];
					$row["used_agentshopid"] = $_REQUEST['shopid'];
					$row["used_times"] = 1;
					//var_dump($row);
					$result_log = $tbl_cardcostlog->add($row);
					unset($row);

					$time_left = $orderRow["card_leftnums"]-1;
					if( (0 == $time_left ) && (0 == $orderRow["card_gift_flag"]))
					{
						$time_left = 4;
						$new_expired_timestamp = time();
						if( ($new_expired_timestamp - $orderRow["active_timestamp"]) <= (28*24*3600))
						{
							$new_expired_timestamp += 28 *24*3600;
							$orderRow["card_expired_dt"] = date("Y-m-d H:i:s",$new_expired_timestamp);
							$orderRow["card_expired_timestamp"] = $new_expired_timestamp ;
							$orderRow["card_gift_flag"] = 1;
							
							$msg = "您编号:".$orderRow["card_code"]."的月卡28天用完,赠送4次";
						}
					}
					else
					{
						$msg = "您编号:".$orderRow["card_code"]."的响动卡还剩".$time_left."次";
					}
					
					// 判断是否是第一次消费并且不是赠送的月卡记录,设定卡片过期时间
					if(($orderRow["card_leftnums"] == $orderRow["card_totalnums"])&&(0 == $orderRow["card_gift_flag"]))
					{
						$expired_days = $orderRow["expired_days"];
						$orderRow["firstuse_timestamp"]= time();
						$orderRow["firstuse_dt"]= date("Y-m-d H:i:s",$orderRow["firstuse_timestamp"]);
						
						$orderRow["card_expired_timestamp"] = $orderRow["firstuse_timestamp"] + $expired_days * 24 * 60 * 60;
						$orderRow["card_expired_dt"] =  date('Y-m-d H:i:s', $orderRow["card_expired_timestamp"]); 
					}
					
					$orderRow["card_leftnums"] = $time_left;					
					$result_card = $tblactivecard->save($orderRow);
									
					if(($result_log ==  true) && (result_card ==true) )
					{
						$this->sendTplMsg_CardScanCost($_REQUEST['wx_openid'],$_REQUEST['cardcode'],$used_dt,$msg);
						echo json_encode(array('success'=>true,'msg'=>$msg));
						return;
					}
					else
					{
						echo json_encode(array('success'=>false,'msg'=>'扫描消费失败<br>请稍候重新扫描尝试!'));
						return;
					}
				}
			}
			else
			{
				unset($orderRow);
				echo json_encode(array('success'=>false,'msg'=>'扫描消费失败<br>请确认密码输入正确或联系客服解决!'));
				return;
			}
		}
		
		// oauth 获取openid
		private function getOpenid($code){
			$appID="wx4e892e84ce5a315f";
			$appsecret="f172ecbbe37d206cfe71ae19f072e742";			
			// access_token URL
			$TOKEN_URL="https://api.weixin.qq.com/sns/oauth2/access_token?appid=".$appID."&secret=".$appsecret."&code=".$code."&grant_type=authorization_code";
			
			$json = file_get_contents($TOKEN_URL);
			$result = json_decode($json,true);
			//var_dump($result);
			//echo $result["openid"]."<br>";	
			return $result["openid"];
		}
				
		// 我的响动 
		public function user(){
			if (isset($_GET['code'])){
					$CODE= $_GET['code'];
			    //echo "code:".$_GET['code']."<br>";
			}else{
			    echo "<h3>网络数据异常,请稍候重试!</h3>";
			    return;
			}
			$wx_openid = $this->getOpenid($CODE);
			$this->assign("wx_openid",$wx_openid);
			
			$signPackage = $this->getSignPackage();
			$this->assign('appId',$signPackage['appId']);
			$this->assign('timestamp',$signPackage['timestamp']);
			$this->assign('nonceStr',$signPackage['nonceStr']);
			$this->assign('signature',$signPackage['signature']);

    	$this->show();
		}
		
		// 用户查看卡片信息
		public function usercards(){
    	if(!isset($_REQUEST['wx_openid']))
    	{
    		echo '<h3>数据获取失败,请在微信里打开!</h3>';
    		return;
    	}
    				
			$this->assign("wx_openid",$this->wx_openid);

			//普通方式实现分页
			
			$wx_openid = $_REQUEST['wx_openid'];
			if($wx_openid != "")
			{
				$strSql .=" wx_openid ='" .$wx_openid ."' ";
			}
						
			$tbl = M('cardactive')->where($strSql);
			//import("@.ORG.Page");             //导入分页类
			$count = $tbl->count();        //计算总数
			$p =  new  \Think\Page($count, 10);
			$rows = $tbl->where($strSql)->limit($p->firstRow . ',' . $p->listRows)->order('card_code asc')->select();
			
			$p->setConfig('header','条');
			$p->setConfig('prev', "上一页");//上一页
			$p->setConfig('next', '下一页');//下一页
			$p->setConfig('first', '|<');//第一页
			$p->setConfig('last', ">|");//最后一页
			//$p -> setConfig ('theme','%totalRow% %header% %nowPage%/%totalPage% 页 %upPage% %downPage% %first% %prePage% %linkPage% %nextPage% %end%' );
			$p -> setConfig ('theme','%totalRow% %header% %nowPage%/%totalPage% %upPage% %downPage%' );
			$page = $p->show();
			
			//$page->setConfig('header','个会员');
			//var_dump($page);
			$page = str_replace("index.php/","",$page);
			
			$this->assign("page", $page);
			$this->assign("list", $rows);

			$signPackage = $this->getSignPackage();
			$this->assign('appId',$signPackage['appId']);
			$this->assign('timestamp',$signPackage['timestamp']);
			$this->assign('nonceStr',$signPackage['nonceStr']);
			$this->assign('signature',$signPackage['signature']);
			
			$ordertel = $this->getOrderTelByOpenid($this->wx_openid);
			$totalbuynums = $this->getTotalbuynumsByTel($ordertel);
			$this->assign('totalbuynums',$totalbuynums);
			$this->assign('rowCount',$count);
			
			$this->show();
		}
		
		// 查看卡片消费明细
		public function usercardItem(){
			$this->assign("wx_openid",$this->wx_openid);
		
			$wx_openid = $_REQUEST['wx_openid'];
			
			$cardcode = isset($_REQUEST['cardcode'])?$_REQUEST['cardcode']:'';
						
			// 查询消费记录
			$tables_search = 'tbl_card_uselog u,tbl_agents_shops s ';
			if("" !=$cardcode)
			{
				$str_where = " u.contract_code = s.contract_code and  u.used_agentshopid = s.shopid and u.card_code ='" .$cardcode ."' ";
			}
			else
			{
				$str_where = " u.contract_code = s.contract_code and  u.used_agentshopid = s.shopid and u.wx_openid ='" .$wx_openid ."' ";
			}
			
			$fields = array('u.card_code'=>'card_code','u.used_dt'=>'used_dt','s.shopname'=>'shopname','s.shopcity'=>'shopcity','u.id'=>'id');
			
			$count = M('')->table($tables_search)->where($str_where)->field($fields)->count();        //计算总数
			$p = new  \Think\Page($count, 10);
			//$rows = $tbl->where($strSql)->limit($p->firstRow . ',' . $p->listRows)->order('j_id asc')->select();
			$rows = M('')->table($tables_search)->where($str_where)->field($fields)->limit($p->firstRow . ',' . $p->listRows)->order('id asc')->select();
			
			$p->setConfig('header','条');
			$p->setConfig('prev', "上一页");//上一页
			$p->setConfig('next', '下一页');//下一页
			$p->setConfig('first', '|<');//第一页
			$p->setConfig('last', ">|");//最后一页
			//$p -> setConfig ('theme','%totalRow% %header% %nowPage%/%totalPage% 页 %upPage% %downPage% %first% %prePage% %linkPage% %nextPage% %end%' );
			$p -> setConfig ('theme','%totalRow% %header% %nowPage%/%totalPage% %upPage% %downPage%' );
			$page = $p->show();
			
			//$page->setConfig('header','个会员');
			//var_dump($page);
			$page = str_replace("index.php/","",$page);
			
			$this->assign("page", $page);
			$this->assign("list", $rows);
			$this->assign('rowCount',$count);
			
			$signPackage = $this->getSignPackage();
			$this->assign('appId',$signPackage['appId']);
			$this->assign('timestamp',$signPackage['timestamp']);
			$this->assign('nonceStr',$signPackage['nonceStr']);
			$this->assign('signature',$signPackage['signature']);
						
			$this->show();

		}
		
		// 根据openid获取绑定手机号
		private function getOrderTelByOpenid($wx_openid){
			$tbl_wxusers = new \Think\Model("wx_users");
			$find['wx_openid']  = $_REQUEST['wx_openid'];
			$wxRow = $tbl_wxusers->where($find)->find();
			$ordertel ="";
			if($wxRow !=  null)
			{
				$ordertel = $wxRow["phone"];
			}
			return $ordertel;
		}
		
		// 根据openid获取用户信息
		private function getUserInfosByOpenid($wx_openid){
			$tbl_wxusers = new \Think\Model("wx_users");
			$find['wx_openid']  = $_REQUEST['wx_openid'];
			$wxRow = $tbl_wxusers->where($find)->find();
			$ordertel ="";

			if($wxRow !=  null)
			{
				$usrInfos = array(
					'phone' =>$wxRow["phone"],
					'email' =>$wxRow["email"],
					'headpic' =>$wxRow["headpic"],
				);
			}
			return $usrInfos;			
		}

		// 根据openid获取头像地址
		private function getHeadpicByOpenid($wx_openid){
			$tbl_wxusers = new \Think\Model("wx_users");
			$find['wx_openid']  = $_REQUEST['wx_openid'];
			$wxRow = $tbl_wxusers->where($find)->find();
			$headpic ="";
			if($wxRow !=  null)
			{
				$headpic = $wxRow["headpic"];
			}
			return $headpic;
		}		
		
		// 根据手机号获取购买的卡片数码()
		private function getTotalbuynumsByTel($buytel){
			$tbl_wxusers = new \Think\Model("cardactive");
			$find['order_tel']  = $buytel;
			$totalbuys = $tbl_wxusers->where($find)->count();

			return $totalbuys;
		}
		
		// 用户查看卡包未激活卡片信息
		public function usercardunav(){
    	if(!isset($_REQUEST['wx_openid']))
    	{
    		echo '数据获取失败,请在微信里打开!';
    		return;
    	}
    				
			$this->assign("wx_openid",$this->wx_openid);

			//普通方式实现分页
			$ordertel = $this->getOrderTelByOpenid($this->wx_openid);
			if("" == $ordertel)
			{
				$totalbuynums = 0;
			}
			else
			{			
				$wx_openid = $_REQUEST['wx_openid'];
				if($wx_openid != "")
				{
					$strSql =" order_tel ='" .$ordertel ."' and active_state =0 ";
				}
						
				$tbl = M('cardactive')->where($strSql);
				//import("@.ORG.Page");             //导入分页类
				$count = $tbl->count();        //计算总数
				$p =  new  \Think\Page($count, 10);
				$rows = $tbl->where($strSql)->limit($p->firstRow . ',' . $p->listRows)->order('card_code asc')->select();
				
				$p->setConfig('header','条');
				$p->setConfig('prev', "上一页");//上一页
				$p->setConfig('next', '下一页');//下一页
				$p->setConfig('first', '|<');//第一页
				$p->setConfig('last', ">|");//最后一页
				//$p -> setConfig ('theme','%totalRow% %header% %nowPage%/%totalPage% 页 %upPage% %downPage% %first% %prePage% %linkPage% %nextPage% %end%' );
				$p -> setConfig ('theme','%totalRow% %header% %nowPage%/%totalPage% %upPage% %downPage%' );
				$page = $p->show();
				
				//$page->setConfig('header','个会员');
				//var_dump($page);
				$page = str_replace("index.php/","",$page);
				
				$this->assign("page", $page);
				$this->assign("list", $rows);
				
				$totalbuynums = $this->getTotalbuynumsByTel($ordertel);
			}
			
			$signPackage = $this->getSignPackage();
			$this->assign('appId',$signPackage['appId']);
			$this->assign('timestamp',$signPackage['timestamp']);
			$this->assign('nonceStr',$signPackage['nonceStr']);
			$this->assign('signature',$signPackage['signature']);
			
			$this->assign('totalbuynums',$totalbuynums);
			$this->assign('rowCount',$count);
			
			$this->show();
		}		
		
		// 手机号微信绑定页面
		public function bindphone(){
			if (isset($_GET['code'])){
					$CODE= $_GET['code'];
			    //echo "code:".$_GET['code']."<br>";
			    $wx_openid = $this->getOpenid($CODE);
			}else{
				if(!isset($_REQUEST['wx_openid']))
	    	{
	    		echo '数据获取失败,请在微信里打开!';
	    		return;
	    	}
	    	$wx_openid = $_REQUEST['wx_openid'];
			}
			
			$this->assign("wx_openid",$wx_openid);
			$this->show();			
		}
		
		// 手机号和微信绑定函数
		public function bindphonefun(){
    	if(!isset($_REQUEST['wx_openid']))
    	{
    		echo '卡片激活失败,请在微信里打开!';
    		return;
    	}

			$result = false;
			//查找是否在激活订单里面,如果没有通知客户联系客服解决
			
			$tbl_wxusers = new \Think\Model("wx_users");
			$find['wx_openid']  = $_REQUEST['wx_openid'];
			$wxRow = $tbl_wxusers->where($find)->find();

			if($wxRow !=  null)
			{
				$data["phone"] = $_REQUEST['phone'];
				$tbl_wxusers->where($find)->save($data);
				$this->sendTplMsg_BindPhone($_REQUEST['wx_openid'],$_REQUEST['phone']);
				
				echo json_encode(array('success'=>true,'msg'=>'微信绑定手机号成功!'));
				return;

			}
			else
			{
				
				$data["wx_openid"] = $_REQUEST['wx_openid'];
				$data["phone"] = $_REQUEST['phone'];
				$data["sex"] = 0;
				$data["fakeid"] = 0;

				$tbl_wxusers->add($data);
				$this->sendTplMsg_BindPhone($_REQUEST['wx_openid'],$_REQUEST['phone']);
				
				echo json_encode(array('success'=>true,'msg'=>'微信绑定手机号成功!'));
				return;
			}	    	
		}
		
		// 微信绑定Email页面
		public function bindemail(){
			if (isset($_GET['code'])){
					$CODE= $_GET['code'];
			    //echo "code:".$_GET['code']."<br>";
			    $wx_openid = $this->getOpenid($CODE);
			}else{
				if(!isset($_REQUEST['wx_openid']))
	    	{
	    		echo '数据获取失败,请在微信里打开!';
	    		return;
	    	}
	    	$wx_openid = $_REQUEST['wx_openid'];
			}
			
			$this->assign("wx_openid",$wx_openid);
			$this->show();			
		}
		
		// 手机号和微信绑定函数
		public function bindemailfun(){
    	if(!isset($_REQUEST['wx_openid']))
    	{
    		echo '卡片激活失败,请在微信里打开!';
    		return;
    	}

			$result = false;
			//查找是否在激活订单里面,如果没有通知客户联系客服解决
			
			$tbl_wxusers = new \Think\Model("wx_users");
			$find['wx_openid']  = $_REQUEST['wx_openid'];
			$wxRow = $tbl_wxusers->where($find)->find();

			if($wxRow !=  null)
			{
				$data["email"] = $_REQUEST['email'];
				$tbl_wxusers->where($find)->save($data);
				//$this->sendTplMsg_BindPhone($_REQUEST['wx_openid'],$_REQUEST['phone']);
				
				echo json_encode(array('success'=>true,'msg'=>'微信绑定Email成功!'));
				return;

			}
			else
			{
				$data["wx_openid"] = $_REQUEST['wx_openid'];
				$data["email"] = $_REQUEST['email'];
				$data["sex"] = 0;
				$data["fakeid"] = 0;

				$tbl_wxusers->add($data);
				//$this->sendTplMsg_BindPhone($_REQUEST['wx_openid'],$_REQUEST['phone']);
				
				echo json_encode(array('success'=>true,'msg'=>'微信绑定Email成功!'));
				return;
			}	    	
		}		

		// 我的账号页面
		public function account(){
			$this->assign("wx_openid",$this->wx_openid);
		
			$signPackage = $this->getSignPackage();
			$this->assign('appId',$signPackage['appId']);
			$this->assign('timestamp',$signPackage['timestamp']);
			$this->assign('nonceStr',$signPackage['nonceStr']);
			$this->assign('signature',$signPackage['signature']);
			
			$usrInfos = $this->getUserInfosByOpenid($this->wx_openid);
			//$tel = $this->getOrderTelByOpenid($this->wx_openid);
			$this->assign('bindtel',$usrInfos['phone']);
			$this->assign('email',$usrInfos['email']);
			
			//$headpic = $this->getHeadpicByOpenid($this->wx_openid);
			$this->assign('headpic',$usrInfos['headpic']);
    	
    	$this->show();
		}
		
		// 我的积分页面
		public function myscore(){
    	$this->assign("wx_openid",$this->wx_openid);
			$signPackage = $this->getSignPackage();
			$this->assign('appId',$signPackage['appId']);
			$this->assign('timestamp',$signPackage['timestamp']);
			$this->assign('nonceStr',$signPackage['nonceStr']);
			$this->assign('signature',$signPackage['signature']);

    	$this->show();
    }

		// 我的发票页面
		public function myreceipt(){
    	$this->assign("wx_openid",$this->wx_openid);
			$signPackage = $this->getSignPackage();
			$this->assign('appId',$signPackage['appId']);
			$this->assign('timestamp',$signPackage['timestamp']);
			$this->assign('nonceStr',$signPackage['nonceStr']);
			$this->assign('signature',$signPackage['signature']);

    	$this->show();
    }
    
    public function searchshop(){
   		$lng=isset($_REQUEST['lng'])?$_REQUEST['lng']:0.0;
   		$lat=isset($_REQUEST['lat'])?$_REQUEST['lat']:0.0;
   		
   		$this->assign("lng",$lng);
   		$this->assign("lat",$lat);
    	$this->show();
    }
    
    // 关键字查询店结果页面
    public function searchRlts(){
    	$city=isset($_REQUEST['selCity'])?$_REQUEST['selCity']:'成都';
    	$lng=isset($_REQUEST['lng'])?$_REQUEST['lng']:0.0;
    	$lat=isset($_REQUEST['lat'])?$_REQUEST['lat']:0.0;
    	
    	$shop_descr = $_REQUEST['chbx'];

			if(""!=$shop_descr)
			{
				$shop_descr=substr($shop_descr,0,-1);
    		$strSql = "shopcity='".$city."'"." and descrp like '%".$shop_descr."%' ";
    	}
    	else
    	{
    		$strSql = "shopcity='".$city."'";
    	}
    	$keyword = isset($_REQUEST['keyword'])?$_REQUEST['keyword']:'';
    	if(""!=$keyword)
    	{
    		$strSql.=" and ( descrp like '%".$keyword."%' or shopname like '%".$keyword."%')";
    	}

  		//var_dump($strSql);
    	
			$tbl = M('agents_shops')->where($strSql);
			//import("@.ORG.Page");             //导入分页类
			$count = $tbl->count();        //计算总数
			$p =  new  \Think\Page($count, 10);
			$rows = $tbl->where($strSql)->limit($p->firstRow . ',' . $p->listRows)->order('id asc')->select();
			
			$p->setConfig('header','条');
			$p->setConfig('prev', "上一页");//上一页
			$p->setConfig('next', '下一页');//下一页
			$p->setConfig('first', '|<');//第一页
			$p->setConfig('last', ">|");//最后一页
			//$p -> setConfig ('theme','%totalRow% %header% %nowPage%/%totalPage% 页 %upPage% %downPage% %first% %prePage% %linkPage% %nextPage% %end%' );
			$p -> setConfig ('theme','%totalRow% %header% %nowPage%/%totalPage% %upPage% %downPage%' );
			$page = $p->show();
			
			//$page->setConfig('header','个会员');
			//var_dump($page);
			$page = str_replace("index.php/","",$page);
			
			$this->assign("page", $page);
			$this->assign("list", $rows);

			$signPackage = $this->getSignPackage();
			$this->assign('appId',$signPackage['appId']);
			$this->assign('timestamp',$signPackage['timestamp']);
			$this->assign('nonceStr',$signPackage['nonceStr']);
			$this->assign('signature',$signPackage['signature']);
			
			$ordertel = $this->getOrderTelByOpenid($this->wx_openid);
			$totalbuynums = $this->getTotalbuynumsByTel($ordertel);
			$this->assign('totalbuynums',$totalbuynums);
			$this->assign('rowCount',$count);
			$this->assign('lng',$lng);
			$this->assign('lat',$lat);
			
			$this->show();
    }
    		
		// 授权页面
		public function oauth(){
			if (isset($_GET['code'])){
					$CODE= $_GET['code'];
			    echo "code:".$_GET['code']."<br>";
			}else{
			    echo "NO CODE";
			}
			
			// Service Account Info
			$appID="wx4e892e84ce5a315f";
			$appsecret="f172ecbbe37d206cfe71ae19f072e742";
			
			// access_token URL
			$TOKEN_URL="https://api.weixin.qq.com/sns/oauth2/access_token?appid=".$appID."&secret=".$appsecret."&code=".$CODE."&grant_type=authorization_code";
			
			$json = file_get_contents($TOKEN_URL);
			$result = json_decode($json,true);
			//var_dump($result);
			echo $result["openid"]."<br>";
			
			echo $_GET["cardno"];
			
			$this->show();
						
		}
		
		// 定位商户页面
		public function shopinfo(){
    	$this->assign("wx_openid",$this->wx_openid);
			$signPackage = $this->getSignPackage();
			$this->assign('appId',$signPackage['appId']);
			$this->assign('timestamp',$signPackage['timestamp']);
			$this->assign('nonceStr',$signPackage['nonceStr']);
			$this->assign('signature',$signPackage['signature']);
			$distance=isset($_REQUEST['distance'])?$_REQUEST['distance']:'';
			$lng=isset($_REQUEST['lng'])?$_REQUEST['lng']:0.0;
			$lat=isset($_REQUEST['lat'])?$_REQUEST['lat']:0.0;
			
			//根据店铺id获取信息
			$tbldata  = new \Think\Model("agents_shops");
			
			$data_find['id']  = $_REQUEST['id'];
			$shopRow = $tbldata->where($data_find)->find();
			
			if($shopRow !=  null)
			{
				$this->assign('lat',$shopRow['lat']);
				$this->assign('lng',$shopRow['lon']);
				$this->assign('name',$shopRow['shopname']);
				$this->assign('addr',$shopRow['shopaddress']);
				$this->assign('shoptel',$shopRow['contractor_tel']);
				if(''== $distance)
				{
					$distance = $this->getDistance($lat,$lng,$shopRow['lat'],$shopRow['lon']);
				}
				
				$this->assign('distance',$distance);
			}

    	$this->show();		
		}
		
	  public function getAccessToken(){
			// access_token 应该全局存储与更新，以下代码以写入到文件中做示例
			//$path = "../App/Public/Upfiles";
			$file_token = './wxAccess/access_token.json';
	    $data = json_decode(file_get_contents($file_token));
	    if ($data->expire_time < time()) {
				// Service Account Info
				$appID="wx4e892e84ce5a315f";
				$appsecret="f172ecbbe37d206cfe71ae19f072e742";
				
				// access_token URL
				$TOKEN_URL="https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$appID."&secret=".$appsecret;
				
				$json = file_get_contents($TOKEN_URL);
				$result = json_decode($json,true);
				
				$ACCESS_TOKEN=$result['access_token'];
	
	      if ($ACCESS_TOKEN) {
	        $data->expire_time = time() + 7000;
	        $data->access_token = $ACCESS_TOKEN;
	        $fp = fopen($file_token, "w");
	        fwrite($fp, json_encode($data));
	        fclose($fp);
	      }
	      //echo 'Get AccessToke From Server<br>';
	      //echo $ACCESS_TOKEN;
	    } else {
	      $ACCESS_TOKEN = $data->access_token;
	      //echo 'Get AccessToke From File<br>';
	      //echo $ACCESS_TOKEN;
	    }
	    return $ACCESS_TOKEN;		
		}
		
	  public function getJsApiTicket(){
			// access_token 应该全局存储与更新，以下代码以写入到文件中做示例
			//$path = "../App/Public/Upfiles";
			$file_ticket = './wxAccess/jsapi_ticket.json';
	    $data = json_decode(file_get_contents($file_ticket));
	    if ($data->expire_time < time()) {
				$accessToken = $this->getAccessToken();
				
				// Ticket URL
				//$TOKEN_URL="https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$appID."&secret=".$appsecret;
				$TICKET_URL = "https://api.weixin.qq.com/cgi-bin/ticket/getticket?type=jsapi&access_token=".$accessToken;
				
				$json = file_get_contents($TICKET_URL);
				$result = json_decode($json,true);
				
				$TICKET = $result['ticket'];
	
	      if ($TICKET) {
	        $data->expire_time = time() + 7000;
	        $data->jsapi_ticket = $TICKET;
	        $fp = fopen($file_ticket, "w");
	        fwrite($fp, json_encode($data));
	        fclose($fp);
	      }
	      //echo 'Get TICKET From Server<br>';
	      //echo $TICKET;
	    } else {
	      $TICKET = $data->jsapi_ticket;
	    	//echo 'Get Ticket From File<br>';
				//echo $TICKET;
	    }
	    return $TICKET;		
		}	
	
	  private function createNonceStr($length = 16) {
	    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
	    $str = "";
	    for ($i = 0; $i < $length; $i++) {
	      $str .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
	    }
	    return $str;
	  }
		
	  public function getSignPackage() {
	    $jsapiTicket = $this->getJsApiTicket();
	    // 注意 URL 一定要动态获取，不能 hardcode.
  	  $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    	$url = "$protocol$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";	    
	    $timestamp = time();
	    $nonceStr = $this->createNonceStr();
			
	    // 这里参数的顺序要按照 key 值 ASCII 码升序排序
	    $string = "jsapi_ticket=$jsapiTicket&noncestr=$nonceStr&timestamp=$timestamp&url=$url";
	
	    $signature = sha1($string);
	
	    $signPackage = array(
	      "appId"     => $this->appId,
	      "nonceStr"  => $nonceStr,
	      "timestamp" => $timestamp,
	      "url"       => $url,
	      "signature" => $signature,
	      "rawString" => $string
	    );
	    return $signPackage; 
	    //var_dump($signPackage);
	  }

		// 构建https post提交模板消息数据
		private function http_request($url,$data=array()){
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
			// 我们在POST数据哦！
			curl_setopt($ch, CURLOPT_POST, 1);
			// 把post的变量加上
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			$output = curl_exec($ch);
			curl_close($ch);
			return $output;
		}

		// 发送模板消息:手机号绑定模板消息
		private function sendTplMsg_BindPhone($openid,$phone){
			//获得access_token
			$access_token= $this->getAccessToken();
			//echo $access_token;exit;
			//$openid = "oGHwet4Jj_rU4hmIZ8Pwx-RmuXwY";
			//$phone = "13541214124";
			//模板消息:oGHwet4Jj_rU4hmIZ8Pwx-RmuXwY 西瓜
			$template=array(
				'touser'=>$openid,
				'template_id'=>"ZEWaOHqYrTqfX7qg6KKhZ2tdb53pgZZoplJXZhwjYcs",
				'topcolor'=>"#7B68EE",
				'data'=>array(
					'first'=>array('value'=>urlencode("亲,您已经成功绑定微信和手机号!"),'color'=>"#743A3A"),
					'keyword1'=>array('value'=>urlencode(substr_replace($openid,"********************",3,20)),'color'=>"#743A3A"),
					'keyword2'=>array('value'=>urlencode($phone),'color'=>'#743A3A'),
					'keyword3'=>array('value'=>urlencode("查看卡片信息,消费记录,购买记录等"),'color'=>'#743A3A'),
				
					'remark'=>array('value'=>urlencode(''),'color'=>'#743A3A'),
				)
			);

			$json_template=json_encode($template);
			//echo $json_template;
			//echo $access_token;exit;
			
			$url="https://api.weixin.qq.com/cgi-bin/message/template/send?access_token=".$access_token;
			$res=$this->http_request($url,urldecode($json_template));
			//if ($res[errcode]==0) echo '模板消息发送成功!';
			//var_dump($res);
		}
		
		// 卡片激活模板消息
		private function sendTplMsg_ActiveCard($openid,$cardNo,$time_active,$phone,$remark){
			//获得access_token
			$access_token= $this->getAccessToken();
			//echo $access_token;exit;
			//$openid = "oGHwet4Jj_rU4hmIZ8Pwx-RmuXwY";
			//$cardNo = "13541214124";
			//$time_active = date("Y-m-d H:i:s",time());
			//$phone ="13541214124";
			//$remark = "2015-11-21";
			//模板消息:oGHwet4Jj_rU4hmIZ8Pwx-RmuXwY 西瓜
			$template=array(
				'touser'=>$openid,
				'template_id'=>"U8JAiJzcS-_unKNLeB1PLr0PKktbX6qEKX-1BnvknL0",
				'topcolor'=>"#7B68EE",
				'data'=>array(
					'first'=>array('value'=>urlencode("亲,您的卡片已经成功激活!"),'color'=>"#743A3A"),
					'keyword1'=>array('value'=>urlencode($cardNo),'color'=>"#743A3A"),
					'keyword2'=>array('value'=>urlencode($time_active),'color'=>'#743A3A'),
					'keyword3'=>array('value'=>urlencode($phone),'color'=>'#743A3A'),
				
					'remark'=>array('value'=>urlencode($remark),'color'=>'#743A3A'),
				)
			);

			$json_template=json_encode($template);
			//echo $json_template;
			//echo $access_token;exit;
			
			$url="https://api.weixin.qq.com/cgi-bin/message/template/send?access_token=".$access_token;
			$res=$this->http_request($url,urldecode($json_template));
			//if ($res[errcode]==0) echo '模板消息发送成功!';
			//var_dump($res);
		}
		
		// 卡片扫描消费模板消息
		private function sendTplMsg_CardScanCost($openid,$cardNo,$time_cost,$remark){
			//获得access_token
			$access_token= $this->getAccessToken();
			//echo $access_token;exit;
			//$openid = "oGHwet4Jj_rU4hmIZ8Pwx-RmuXwY";
			//$cardNo = "13541214124";
			//$time_cost = date("Y-m-d H:i:s",time());
			//$remark = "成功扫描消费一次,剩余次数3";
			
			$template=array(
				'touser'=>$openid,
				'template_id'=>"HTIQx1gWuZJBik0qU0NM4QVuRzSE_GDnBXzj13TquUs",
				'topcolor'=>"#7B68EE",
				'data'=>array(
					'productType'=>array('value'=>urlencode("卡号"),'color'=>"#743A3A"),
					'name'=>array('value'=>urlencode($cardNo),'color'=>"#743A3A"),
					'time'=>array('value'=>urlencode($time_cost),'color'=>'#743A3A'),
				
					'remark'=>array('value'=>urlencode($remark),'color'=>'#743A3A'),
				)
			);

			$json_template=json_encode($template);
			//echo $json_template;
			//echo $access_token;exit;
			
			$url="https://api.weixin.qq.com/cgi-bin/message/template/send?access_token=".$access_token;
			$res=$this->http_request($url,urldecode($json_template));
			//if ($res[errcode]==0) echo '模板消息发送成功!';
			//var_dump($res);
		}		
}