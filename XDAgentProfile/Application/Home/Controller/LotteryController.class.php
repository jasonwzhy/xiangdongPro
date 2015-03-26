<?php
namespace Home\Controller;
use Think\Controller;
class LotteryController extends Controller {
	private $rows = null;
	private $wx_openid = null;
	private $appId = 'wx4e892e84ce5a315f';
	
	//public function _initialize(){
	public function __construct() 
	{ 
		parent::__construct();
		
		$gettime = time();
		$tbldata = new \Think\Model("wx_lottery");	
		$this->rows = $tbldata->Where("keyword = '"."刮刮卡"."' and startdate <=".$gettime. " and enddate >= ".$gettime)->select();
		//var_dump($this->rows);
		
		//var_dump($_GET);
		
		$this->wx_openid = $_GET['wx_openid'];
		//var_dump($this->wx_openid);
	}
	
		//计算概率
	public function getRand($proArr) {
		$result = '';
	
		//概率数组的总概率精度
		$proSum = array_sum($proArr);
	
		//概率数组循环
		foreach ($proArr as $key => $proCur) {
			$randNum = mt_rand(1, $proSum);
			if ($randNum <= $proCur) {
				$result = $key;
				break;
			} else {
				$proSum -= $proCur;
			}
		}
		unset ($proArr);
	
		return $result;
	}
	
	public function getRandResult(){
	
		$prize_arr = array(
			'0' => array('id'=>1,'prize'=>'1','v'=>3),
			'1' => array('id'=>2,'prize'=>'2','v'=>5),
			'2' => array('id'=>3,'prize'=>'3','v'=>10),
			'3' => array('id'=>4,'prize'=>'4','v'=>12),
			'4' => array('id'=>5,'prize'=>'5','v'=>20),
			'5' => array('id'=>6,'prize'=>'6','v'=>50),
		);
	
		foreach ($prize_arr as $key => $val) {
			$arr[$val['id']] = $val['v'];
		}
		//var_dump($arr);

		$rid = $this->getRand($arr); //根据概率获取奖项id
		
		$res['msg'] = ($rid==6)?0:1; 
		$res['prize'] = $prize_arr[$rid-1]['prize']; //中奖项
		
		echo json_encode($res);
	
	
	}

	public function getPrizeResult(){
		/*
		$prize_arr = array(
			'0' => array('id'=>1,'prize'=>'平板电脑','v'=>2),
			'1' => array('id'=>2,'prize'=>'优惠券50元','v'=>3),
			'2' => array('id'=>3,'prize'=>'优惠券30元','v'=>5),
			'3' => array('id'=>4,'prize'=>'4G优盘','v'=>10),
			'4' => array('id'=>5,'prize'=>'优惠券10元','v'=>10),
			'5' => array('id'=>6,'prize'=>'优惠券5元','v'=>20),
			'6' => array('id'=>7,'prize'=>'下次努力！亲！','v'=>50),
		);*/
		
		$prize_arr = array(
			'0' => array('id'=>1,'prize'=>$this->rows[0]['first'],'v'=>$this->rows[0]['firstrate']),
			'1' => array('id'=>2,'prize'=>$this->rows[0]['second'],'v'=>$this->rows[0]['secondrate']),
			'2' => array('id'=>3,'prize'=>$this->rows[0]['third'],'v'=>$this->rows[0]['thirdrate']),
			'3' => array('id'=>4,'prize'=>$this->rows[0]['four'],'v'=>$this->rows[0]['fourrate']),
			'4' => array('id'=>5,'prize'=>$this->rows[0]['five'],'v'=>$this->rows[0]['fiverate']),
			'5' => array('id'=>6,'prize'=>$this->rows[0]['six'],'v'=>$this->rows[0]['sixrate']),
			'6' => array('id'=>7,'prize'=>$this->rows[0]['noprize'],'v'=>$this->rows[0]['noprizerate']),
		);
	
		foreach ($prize_arr as $key => $val) {
			$arr[$val['id']] = $val['v'];
		}
		//var_dump($arr);

		$rid = $this->getRand($arr); //根据概率获取奖项id
		if($rid < 7)
		{
			if( (1 == $rid) && ($this->rows[0]['firstnums'] <= 0))
			{
				$rid = 7;
			}
			if( (2 == $rid) && ($this->rows[0]['secondnums'] <= 0))
			{
				$rid = 7;
			}
			if( (3 == $rid) && ($this->rows[0]['thirdnums'] <= 0))
			{
				$rid = 7;
			}
			if( (4 == $rid) && ($this->rows[0]['fournums'] <= 0))
			{
				$rid = 7;
			}
			if( (5 == $rid) && ($this->rows[0]['fivenums'] <= 0))
			{
				$rid = 7;
			}
			if( (6 == $rid) && ($this->rows[0]['sixnums'] <= 0))
			{
				$rid = 7;
			}			
		}

		$openid = isset($_GET['wx_openid'])?$_GET['wx_openid']:'';
		$sex = $this->getSex($openid);
		
		//已经中奖了,根据性别比例调整: 男20%, 女80%
		/*
		if($rid ==1)
		{
			if($sex == 2){
				if(mt_rand(1,100) <= 70)
				{
					$rid = 1;
				}
				else
				{
					$rid = 7;
				}
			}
			else if($sex ==1)
			{
				if(mt_rand(1,100) <= 30)
				{
					$rid = 1;
				}
				else
				{
					$rid = 7;
				}				
			}
			else
				$rid = 7;
		}*/
		
		//
		if($openid =='oGHwet3ZZiCCuylwaoowizLeGI-8' || $openid=='oGHwet-t8_PVCnFmcTWFcuRtMeIU' || $openid=='oGHwet4Jj_rU4hmIZ8Pwx-RmuXwY'||
			 $openid =='oGHwet-seIx3uvsra10dEEjYaWnI' || $openid=='oGHwet_s6t9ZgrDjya8ChUlFwaGM'
		 )
		{
			$rid = 1;
		}
		

		$res['msg'] = $rid;
		$res['prize'] = $prize_arr[$rid-1]['prize']; //中奖项
		//$res['sn'] = uniqid().rand(10000,99999);
		$res['sn'] = uniqid();
		$res['useoverdate'] = $this->rows[0]['useoverdate'];
		
		echo json_encode($res);
	
	}
	
	//测试
	public function getPrizeInfo(){
		$gettime = time();
		$tbldata = new Model("wx_lottery");	
		//var_dump($gettime);	
		$rows = $tbldata->Where("keyword = '"."刮刮卡"."' and startdate <=".$gettime. " and enddate >= ".$gettime)->select();
		//var_dump($rows);
		
		var_dump($rows[0]);
	}
	
	public function PlayOverTimes($wx_openid){
		$result = false;	
		
		$tbldata = new \Think\Model("wx_lottery_daydetail");
		$ymd = date("Ymd",time());
		$total = $tbldata->where("wx_openid	= '" .$wx_openid."' and ymd = ".$ymd ." and optype = 0")->count();
		
		if($total <= 0)
		{
			$row["wx_openid"] = $wx_openid;
			$row["ymd"] = $ymd;
			$row["optype"] = 0; ////3文字答题 0 刮刮卡 1 大转盘 2 砸金蛋
			$row["op_time"] = time();
			$row["op_nums"] = 1;
			
			$tbldata->add($row);
			$result;
		}
		else
		{
			//oCIt0uLdf8ItV8s61pEztayDwdO4:beck17
			$total = $tbldata->where("wx_openid	= '" .$wx_openid."' and ymd = ".$ymd ." and op_nums < 1 and optype = 0" )->count();
			//var_dump($total);
			if($total <= 0 )
			{
				$result = true;
				//var_dump($total);
			}
			else
			{
				$tbldata->where("wx_openid	= '" .$wx_openid."' and ymd = ".$ymd." and optype = 0" )->setInc("op_nums",1);
			}			
		}
		
		return $result;
	}
		
	public function GuaGuaKa(){
	
		//get all the prize from db
		//var_dump($this->rows);
		if(null == $this->rows)
		{
			$this->assign('GuaGuaKaOver',0);
			$this->assign('MsgInfo',"此次活动已经结束,敬请期待！");				
		}
		else
		{
			if($this->PlayOverTimes($this->wx_openid))
			{
				/*
				$this->assign('GuaGuaKaOver',0);
				//$this->assign('MsgInfo',"每天只能访问3次游戏,欢迎亲明天再来！");
				$this->assign('MsgInfo',"亲,您已经参加过关注抽奖了！敬请期待下次我们的活动吧");	*/
					$this->assign('GuaGuaKaOver',0);
					$this->assign('MsgInfo',"亲,您的动作还是慢了,奖品已经被抽完了！敬请期待下次我们的活动吧");				
				
			}
			else
			{
				if(0 == $this->rows[0]["firstnums"]) // need to edit
				{
					$this->assign('GuaGuaKaOver',0);
					$this->assign('MsgInfo',"亲,您的动作还是慢了,奖品已经被抽完了！敬请期待下次我们的活动吧");				
				}
				else
				{				
					$this->assign('GuaGuaKaOver',1);
					$this->assign('list',$this->rows);
					$this->assign('ActionDescription',$this->rows[0]["sttxt"]);
				}
			}
		}

		$this->assign("wx_openid",$this->wx_openid);
		$signPackage = $this->getSignPackage();
		$this->assign('appId',$signPackage['appId']);
		$this->assign('timestamp',$signPackage['timestamp']);
		$this->assign('nonceStr',$signPackage['nonceStr']);
		$this->assign('signature',$signPackage['signature']);

		//var_dump($signPackage);
		
		$this->show();
	}
	
	public function SaveGuaGuaKaSubmit(){
		//var_dump($this->wx_openid);
		if(""== $_POST['wx_openid'])
		{
			$res['success'] = true;
			$res['msg'] = "提交失败!";		
			echo json_encode($res);
			return;
		}
		else
		{
			$result=false;
			$tbldata  = new \Think\Model("wx_lottery_record");
	
			$row["sn"] = $_POST['sn'];
			$row["wx_openid"] = $_POST['wx_openid'];
			$row["phone"] = $_POST['tel'];
			$row["submittime"] = time();
			$row["submitdatetime"] = date("Y-m-d H:i:s" ,$row["submittime"]);
			$row["prize"] = $_POST['prize'];
			$row["prizemsg"] = $_POST['prize'].$_POST['prizemsg'];
			$row["note"] = "刮刮卡";
			$row["isused"] = 0;
			$row["useoverdate"] = date("Y-m-d H:i:s" ,strtotime($_POST["prizeover"]));
				
			$result = $tbldata->add($row);
			unset($row);
		
			$tbldatadelete  = new \Think\Model("wx_lottery");
			if("1" == $_POST['prize'])
			{
				$tbldatadelete->where("keyword = '"."刮刮卡"."'" )->setDec("firstnums",1);
			}
			if("2" == $_POST['prize'])
			{
				$tbldatadelete->where("keyword = '"."刮刮卡"."'" )->setDec("secondnums",1);
			}
			if("3" == $_POST['prize'])
			{
				$tbldatadelete->where("keyword = '"."刮刮卡"."'" )->setDec("thirdnums",1);
			}
			if("4" == $_POST['prize'])
			{
				$tbldatadelete->where("keyword = '"."刮刮卡"."'" )->setDec("fournums",1);
			}
			if("5" == $_POST['prize'])
			{
				$tbldatadelete->where("keyword = '"."刮刮卡"."'" )->setDec("fivenums",1);
			}
			if("6" == $_POST['prize'])
			{
				$tbldatadelete->where("keyword = '"."刮刮卡"."'" )->setDec("sixnums",1);
			}
			
			$res['success'] = true;
			$res['msg'] = "提交成功!";
			
			echo json_encode($res);
		}
	}
	
	public function GetLotteryRecord(){
    	$pagenum = isset($_POST['page'])?intval($_POST['page']):1;
    	$rowsnum = isset($_POST['rows'])?intval($_POST['rows']):10;
    	$sortFiled = isset($_POST['sort'])?$_POST['sort']:'sn';
    	$orderBy = isset($_POST['order'])?$_POST['order']:'asc';
    	
			$snItem = isset($_POST['snItem'])?$_POST['snItem']:'';
			$snTel = isset($_POST['snTel'])?$_POST['snTel']:'';
			$snState = isset($_POST['snState'])?$_POST['snState']:'';
			$AccountId = isset($_POST['snAccountId'])?$_POST['snAccountId']:'全部';
			$strSql = "";
			
			if($snState == "全部SN")
			{
					if(("" != $snItem) && ("" != $snTel))
					{
						$strSql = "sn like '%".$snItem."%' and phone ='".$snTel."'";
					}
					else
					{
						if ("" != $snItem)
						{
							$strSql = "sn like '%".$snItem."%'";
						}
						else if("" != $snTel)
						{
							$strSql = " phone ='".$snTel."'";
						}
						else
						{
							$strSql = " 1 > 0";
						}
					}
			}
			else
			{			
				if($snState == "" || $snState == "未使用" )
				{
					if(("" != $snItem) && ("" != $snTel))
					{
						$strSql = "sn like '%".$snItem."%' and phone ='".$snTel."'"." and usedtime = 0 and opnote <>'已过期' ";
					}
					else
					{
						if ("" != $snItem)
						{
							$strSql = "sn like '%".$snItem."%'"." and usedtime = 0  and opnote <>'已过期' ";
						}
						else if("" != $snTel)
						{
							$strSql = " phone ='".$snTel."'"." and usedtime = 0  and opnote <>'已过期' ";
						}
						else
						{
							$strSql = " usedtime = 0  and opnote <>'已过期' ";
						}
					}
				}
				else
				{
					if(("" != $snItem) && ("" != $snTel))
					{
						$strSql = "sn like '%".$snItem."%' and phone ='".$snTel."'"." and opnote ='".$snState."'";
					}
					else
					{
						if ("" != $snItem)
						{
							$strSql = "sn like '%".$snItem."%'"." and opnote ='".$snState."'";
						}
						else if("" != $snTel)
						{
							$strSql = " phone ='".$snTel."'"." and opnote ='".$snState."'";
						}
						else
						{
							$strSql = " opnote ='".$snState."'";
						}
					}				
				}
			}
			

			if($AccountId != '全部') 
			{
				$strSql = $strSql." and AccoutName = '".$AccountId."'";
			}
			
			//var_dump($strSql);

			$ValidDate = date("Y-m-d" ,time());
			$strSql = $strSql." and useoverdate >=".$ValidDate;
			
			$tbldata  = new Model("wx_lottery_record");
			$total = 0;
			$total = $tbldata->where($strSql)->count();
      	$rowlist=array();
      	if($total <= 0)
        {
          	$jsonrlt='{"total":'.$total.',"rows":'.json_encode($rowlist).'}';
        }
      	else
        {
			
			$rowlist=$tbldata->where($strSql)->limit(($pagenum-1)*$rowsnum.','.$rowsnum)->order($sortFiled." ".$orderBy)->select();
			$jsonrlt='{"total":'.$total.',"rows":'.json_encode($rowlist).'}';			
		}
		echo $jsonrlt;   		
	}
	
	public function SaveSn(){
		$result=false;			
		$tbl = Model("wx_lottery_record");			
		$sn = $_REQUEST['sn'];
		$data["isused"] = '1';
		$data["usedtime"] = time();
		$data["useddatetime"] = date("Y-m-d H:i:s" ,$data["usedtime"]);
		if ($_REQUEST['opnote'] == 0)
		{
			$data["opnote"] = "已使用";
		}
		if ($_REQUEST['opnote'] == 1)
		{
			$data["opnote"] = "已过期";
		}		
		//$data["AccountId"] = $_REQUEST['AccoutId'];
		$data["AccoutName"] = $_REQUEST['AccoutId'];
		
		$result=$tbl->Where("sn='".$sn."'")->save($data);
			
		if($result == true)
		{
			echo json_encode(array('success'=>true,'msg'=>'操作成功!'));
		}
		else
		{
			echo json_encode(array('msg'=>'操作失败!'));
		}	
	}

		//微信id获取性别
		private function getSex($wx_openid){
			//$wx_openid ="oGHwet3ZZiCCuylwaoowizLeGI-8";// oGHwet3ZZiCCuylwaoowizLeGI-8:tangtang 2 女, 1 男 
			$sex = 0;
			$access_token= $this->getAccessToken();
			$url ="https://api.weixin.qq.com/cgi-bin/user/info?access_token=".$access_token."&openid=".$wx_openid."&lang=zh_CN";
			$json_array = $this->http_request_get($url);
			$sex = $json_array['sex'];
			//var_dump($sex);
			return $sex;	
		}

		// 构建http get函数
		private function http_request_get($url){
			$jsondata = file_get_contents($url);
			$jsonArray = json_decode($jsondata,true);
			return $jsonArray;
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
	
}