<?php
namespace Home\Controller;
use Think\Controller;
class AgentController extends Controller {

    // index
    public function index(){
        if (isset($_SESSION['agentid'])) {
    		$agent = M('agents');
    		$agentid = $_SESSION['agentid'];
    		$condition['id'] = $agentid;
    		$agentdata = $agent->where($condition)->find();
    		if ($agentdata) {
                $agentdata['account1_no'] = substr_replace($agentdata['account1_no'],"**********",3,10);
    			$render['agentdata'] = $agentdata;
    			$this->assign($render);
    			$this->display('Agent/index');
    		}
    	}
    	else{
			//redirect(__ROOT__.'/Agent/signin',1,'请先登录...');
			$this->assign('waitSecond',3);
			$this->assign("jumpUrl",__ROOT__."/Agent/signin");
            $this->success('请先登录');
		}
    }
    public function signin(){
    	if (IS_POST){
    		$agentlogin = M('agents');
            $render['error'] = "";
            $Verify = new \Think\Verify();
            $code = $_POST['verifycode'];
            if (!$Verify->check($code)) {
                $render['error'] = "验证码错误";
                $this->ajaxReturn($render);//error
            }
            //if verify is right
    		if(isset($_POST['emaillogin']) && NULL != $_POST['emaillogin'] && NULL != $_POST['loginpwd']){
    			$condition['contract_loginname'] = $_POST['emaillogin'];
    		}
    		elseif (isset($_POST['contractlogin']) && NULL != $_POST['contractlogin'] && NULL != $_POST['loginpwd']) {
    			$condition['contract'] = $_POST['contractlogin'];
    		}
    		else{
                $render['error'] = "用户名或密码不能为空";
                $this->ajaxReturn($render);
    			#no post data return error...
    		}
    		$condition['contract_pwd'] = $_POST['loginpwd'];
    		$agent = $agentlogin->where($condition)->find();
    		if ($agent==NULL) {
    			#账号或密码错误
    			$render['error'] = "账号或密码错误!";
                $this->ajaxReturn($render);
    		}
    		else{
    			$_SESSION['agentid']=$agent['id'];
                $this->ajaxReturn($render);
    			//redirect('index',3,'页面跳转中...');
    		}
    	}
    	else{
            if (isset($_SESSION['agentid'])) {
                $agent = M('agents');
                $agentid = $_SESSION['agentid'];
                $condition['id'] = $agentid;
                $agentdata = $agent->where($condition)->find();
                if ($agentdata) {
                    //redirect('index',3,'页面跳转中...');
					$this->assign('waitSecond',3);
					$this->assign("jumpUrl",__ROOT__."/Agent/index");
                    $this->success('页面跳转中...');                    
                }
            }
    		$this->display('Agent/signin');
    	}
    	
    }
    public function verify(){
        $config =    [
            'fontSize'  =>  30,     // 验证码字体大小
            'length'    =>  4,      // 验证码位数
            'useNoise'  =>  false,  // 关闭验证码杂点
            'expire'    =>  40,
        ];
        $Verify = new \Think\Verify($config);
        $Verify->entry();
    }

    public function signup(){
    	if (IS_POST){
    		$AgentSginup = M('agents');
            $render['error']="";
            if ( NULL != $_POST['sginupemail'] && 
                NULL != $_POST['contactortel'] &&
                NULL != $_POST['sginuppwd'] &&
                NULL != $_POST['contactor'] && 
                NULL != $_POST['agentname'] &&
                NULL != $_POST['selProvince'] &&
                NULL != $_POST['selCity'] &&
                NULL != $_POST['address']
                ) {
                if ($AgentSginup->where(array('contract_loginname'=>$_POST['sginupemail']))->find()) {
                    $render['error'] = "邮箱已存在";
                }
                elseif ($AgentSginup->where(array('contactor_tel'=>$_POST['contactortel']))->find()) {
                    $render['error'] = "联系电话已经存在";
                }
                else{
                    $agdata = array(
                        "contract"              => "",
                        "contract_pwd"          => $_POST['sginuppwd'],
                        "contract_loginname"    => $_POST['sginupemail'],
                        "contactor"             => $_POST['contactor'],
                        "contactor_tel"         => $_POST['contactortel'],
                        "agent_name"            => $_POST['agentname'],
                        "agent_src"             => "网签",
                        "agent_state"           => "未审核",
                        "city_code"             => "",
                        "province"              => $_POST['selProvince'],
                        "city"                  => $_POST['selCity'],
                        "reg_date"              =>date('Y-m-d H:i:s',time()),
                        "address"               => $_POST['address'],

                        "contract_begindt"      => date('Y-m-d H:i:s',time()),
                        "contract_begintimestamp" =>date('Y-m-d H:i:s',time()),
                        "contract_enddt"        => date('Y-m-d H:i:s',time()),
                        "contract_endtimestamp" => date('Y-m-d H:i:s',time()),
                        "contract_signdt"       => date('Y-m-d H:i:s',time()),
                        "contract_sign_name"    => "",

                        "contactor_finance"     => "",
                        "contactortel_finance"  => "",
                        "account1_no"           => "",
                        "account1_name"         => "",
                        "account1_bankname"     => "",
                        "account2_no"           => "",
                        "account2_name"         => "",
                        "account2_bankname"     => "",
                        "zhifubao"              => "",
                        "wxpay"                 => "",
                        "trade_no"              => "",
                        "trade_name"            => "",
                        "trade_pic"             => ""
                    );
                    $retid=$AgentSginup->add($agdata);
                    if ($retid) {
                        $_SESSION['agentid'] = $retid;
                        $agentdir = "./Uploads/".$retid;
                        mkdir($agentdir);
                        $this->ajaxReturn($render);
                    }
                }
                $this->ajaxReturn($render);
            }
            else{   
                    $render['error'] = "请将表单填写完整!";
                    $this->ajaxReturn($render);
            }
    	}
    	else{
    		$this->display('Agent/signup');	
    	}
    }
    

    public function signout(){
        unset($_SESSION['agentid']);
        //redirect('signin',1,'页面跳转中...');
				$this->assign('waitSecond',3);
				$this->assign("jumpUrl",__ROOT__."/Agent/signin");
				$this->success('页面跳转中...');   
    }
    public function shopsview(){
        if (isset($_SESSION['agentid'])) {
            $agent = M('agents');
            $agentshop = M('agents_shops');
            $agentshoppic = M('agents_albums');
            $agentid = $_SESSION['agentid'];
            $condition['id'] = $agentid;
            $render['error'] = "";
            $agentdata = $agent->where($condition)->find();
            if ($agentdata) {
                if ($agentdata['agent_state'] == "未审核" || $agentdata['agent_state'] == "审核中") {
                    //redirect('index',1,'未提交审核或审核通过中... <br><br>不能使用此功能');
										$this->assign('waitSecond',3);
										$this->assign("jumpUrl",__ROOT__."/Agent/index");
										$this->success('未提交审核或审核通过中...<br>不能使用此功能页面跳转中...');
										return;
                }
                else{
                    //查询商家店铺数据
                    $agentshopcondition['agentid'] = $agentid;
                    $shopdata = $agentshop->where($agentshopcondition)->select();
                    
                    if ($shopdata) {
                        foreach ($shopdata as $index => $shopitem) {
                            $agentshoppiccondition['options'] =2;
                            $agentshoppiccondition['optionsvalue'] = $shopitem['id'];
                            $shopimgpaths = $agentshoppic->where($agentshoppiccondition)->select();
                            $shopdata[$index]["imgpaths"] = $shopimgpaths;
                            $shopidstr = sprintf("%04d",$shopitem["shopid"]);
                            $shopdata[$index]["qrcode"] = $shopitem["contract_code"].$shopidstr;
                            # code...
                        }
                    }
                    //var_dump($shopdata);
                    $render['shopdata'] = $shopdata;
                    $this->assign($render);
                    $this->display('Agent/shopsview');
                    
                }
            }
            else{
                //如果session中的 agentid 错误则跳出登陆 删除session
                $this->signout();
            }
           // $this->display('Agent/shopsview');    
        }
        else{
            //redirect('Agent/signin',1,'请先登录...');
						$this->assign('waitSecond',3);
						$this->assign("jumpUrl",__ROOT__."/Agent/signin");
						$this->success('未提交审核或审核通过中... <br><br>不能使用此功能.页面跳转中...');
						return;
        }
    }
    public function joinmember(){
        if (isset($_SESSION['agentid'])) {
            $agent = M('agents');
            $agentid = $_SESSION['agentid'];
            $condition['id'] = $agentid;
            $render['error'] = "";
            $agentdata = $agent->where($condition)->find();
            if ($agentdata) {
                //$render['agentdata'] = $agentdata;
                if ($agentdata['agent_state'] == "已通过" || $agentdata['agent_state'] == "审核中") {
                    //redirect('index',1,' ');
										$this->assign('waitSecond',3);
										$this->assign("jumpUrl",__ROOT__."/Agent/index");
										$this->success('未提交审核或审核通过中... <br><br>不能使用此功能.页面跳转中...');
										return;
                }
                elseif(IS_POST){
                    if ($_FILES != NULL) {
                        $upload = new \Think\Upload();// 实例化上传类
                        $upload->maxSize   =     3145728 ;// 设置附件上传大小
                        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
                        $upload->rootPath  =     './Uploads/Agents/'; // 设置附件上传根目录
                        // $upload->savePath  =     $agentid.'/';
                        $upload->subName   =     $agentid.'/';
                        $info   =   $upload->uploadOne($_FILES['tradepic']);
                        if(!$info) {
                            $this->error($upload->getError());
                        }else{
                            $this->ajaxReturn($info);
                        }
                    } elseif(isset($_POST) && NULL != $_POST) {
                        $agentcheckdata = array(
                            "contract_sign_name"    => $_POST["contract_sign_name"],
                            "trade_no"              => $_POST["trade_no"],
                            "trade_name"            => $_POST["trade_name"],
                            "trade_pic"             => $_POST["trade_pic"],
                            "contactor_finance"     => $_POST["contactor_finance"],
                            "contactortel_finance"  => $_POST["contactortel_finance"],
                            "account1_no"           => $_POST["account1_no"],
                            "account1_name"         => $_POST["account1_name"],
                            "account1_bankname"     => $_POST["account1_bankname"],
                            "account2_no"           => $_POST["account2_no"],
                            "account2_name"         => $_POST["account2_name"],
                            "account2_bankname"     => $_POST["account2_bankname"],
                            "zhifubao"              => $_POST["zhifubao"],
                            "wxpay"                 => $_POST["wxpay"],
                            "agent_state"           => "审核中"
                        );
                        $agentdata = $agent->where($condition)->save($agentcheckdata);
                        if (!$agentdata) {
                            # code...
                            $render['error'] = "提交失败";
                        }
                        $this->ajaxReturn($render);
                    }
                }
                $this->assign($render);
                $this->display('Agent/joinmember');
            }
        }
        else{
            //redirect('Agent/signin',1,'请先登录...');
			$this->assign('waitSecond',3);
			$this->assign("jumpUrl",__ROOT__."/Agent/signin");
			$this->success('请先登录... 页面跳转中...');              
        }
    }
    public function createshop(){
        if (isset($_SESSION['agentid'])) {
            $agent = M('agents');
            $agentshop = M('agents_shops');
            $agentshoppic = M('agents_albums');
            $agentid = $_SESSION['agentid'];
            $condition['id'] = $agentid;
            $render['error'] = "";
            $agentdata = $agent->where($condition)->find();
            if ($agentdata) {
                if ($agentdata['agent_state'] == "未审核" || $agentdata['agent_state'] == "审核中") {
                    //redirect('index',1,'未提交审核或审核通过中... <br><br>不能使用此功能');
										$this->assign('waitSecond',3);
										$this->assign("jumpUrl",__ROOT__."/Agent/index");
										$this->success('未提交审核或审核通过中... <br><br>不能使用此功能.页面跳转中...');
										return;
                }
                elseif(IS_POST){
                    if ($_FILES != NULL) {
                        $upload = new \Think\Upload();// 实例化上传类
                        $upload->maxSize   =     3145728 ;// 设置附件上传大小
                        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
                        $upload->rootPath  =     './Uploads/Agents/'; // 设置附件上传根目录
                        // $upload->savePath  =     $agentid.'/';
                        $upload->subName   =     $agentid;
                        $info   =   $upload->uploadOne($_FILES['shoppic']);
                        if(!$info) {
                            $this->error($upload->getError());
                        }else{
                            $this->ajaxReturn($info);
                        }
                    }
                    elseif(isset($_POST) && NULL != $_POST){
                        $checkshopcondition['agentid'] = $agentid;
                        $checkshopdata = $agentshop->where($checkshopcondition)->max('shopid');
                        if ($checkshopdata) {
                            $shopid = $checkshopdata + 1;
                        }else{
                            $shopid = 1;
                        }
                        // 店铺数据
                        $agentshopdata = array(
                            "agentid"           =>  $agentid,
                            "contract_code"     =>  $agentdata["contract"],
                            "shopid"            =>  $shopid,
                            "shopname"          =>  $_POST["shopname"],
                            "shopprovince"      =>  $_POST["province"],
                            "shopcity"          =>  $_POST["city"],
                            "shopaddress"       =>  $_POST["shopaddress"],
                            "lon"               =>  $_POST["lon"],
                            "lat"               =>  $_POST["lat"],
                            "contractor"        =>  $_POST["contractor"],
                            "contractor_tel"    =>  $_POST["contractor_tel"],
                            "shopdesc"          =>  $_POST["shopdesc"],
                            "shoptype"          =>  $_POST["shoptype"]
                        );
                        $shopdata = $agentshop->add($agentshopdata);
                        if (!$shopdata) {
                            $render['error'] = "提交失败";
                            $this->ajaxReturn($render);
                        }
                        //相册图片                        
                        if ($_POST['shoppicpaths'] != NULL) {
                            $shoppicarry = explode(",",$_POST['shoppicpaths']);
                            for ($i=0; $i < count($shoppicarry)-1; $i++) {
                                $agentshoppicdata = array(
                                    "agentid"       =>  $agentid,
                                    "options"       =>  2,   //商铺相册
                                    "optionsvalue"  =>  $shopdata,  //商铺id
                                    "imgpath"       =>  $shoppicarry[$i]
                                );
                                $shoppicdata = $agentshoppic->add($agentshoppicdata);
                                if (!$shoppicdata) {
                                    $render['error'] = "提交失败";
                                    $this->ajaxReturn($render);
                                }
                            }
                            //$this->ajaxReturn($_POST['shoppicpaths']+count($shoppicarry));
                        }
                        // else{
                        //     #没有图片提交
                        // }
                        $this->ajaxReturn($render);

                    }
                }
                $this->display('Agent/createshop');
                
            }
            else{
                //如果session中的 agentid 错误则跳出登陆 删除session
                $this->signout();
            }
        }
        else{
            //redirect('Agent/signin',1,'请先登录...');
			$this->assign('waitSecond',3);
			$this->assign("jumpUrl",__ROOT__."/Agent/signin");
			$this->success('请先登录...页面跳转中...');              
            
        }
    }
    public function consumestatus(){
        if (isset($_SESSION['agentid'])) {
            $agent = M('agents');
            $agentshop = M('agents_shops');
            $carduselog = M('card_uselog');
            $agentid = $_SESSION['agentid'];
            $condition['id'] = $agentid;
            $render['error'] = "";
            $agentdata = $agent->where($condition)->find();
            if ($agentdata) {
                if ($agentdata['agent_state'] == "未审核" || $agentdata['agent_state'] == "审核中") {
                    //redirect('index',1,'未提交审核或审核通过中... <br><br>不能使用此功能');
					$this->assign('waitSecond',3);
					$this->assign("jumpUrl",__ROOT__."/Agent/index");
			    	$this->success('未提交审核或审核通过中...不能使用此功能');       
			    	return;             
                }
                else{
                    //查询商家店铺经营数据
                    $agentshopcondition['agentid'] = $agentid;
                    //店铺个数
                    $shopdata = $agentshop->where($agentshopcondition)->count();
                    //累计消费人次
                    $carduselogcondition['contract_code'] = $agentdata['contract'];
                    $usecount = $carduselog->where($carduselogcondition)->count();

                    $render['shopcount'] = $shopdata;
                    $render['usecount'] = $usecount;
                    $render['income'] = $usecount * 20;
                    $this->assign($render);
                    $this->display('Agent/consumestatus');
                }
            }
            else{
                //如果session中的 agentid 错误则跳出登陆 删除session
                $this->signout();
            }
           // $this->display('Agent/shopsview');    
        }
        else{
            //redirect('Agent/signin',1,'请先登录...');
    		$this->assign('waitSecond',3);
    		$this->assign("jumpUrl",__ROOT__."/Agent/signin");
	    	$this->success('请先登录');            
}
    }
    public function createqr(){
        if (isset($_GET['qrcode'])){
            $render['qrcode']  = $_GET['qrcode'];
            $this->assign($render);
            $this->display('Agent/createqr');
        }
    }
    public function passwd(){
        if (isset($_SESSION['agentid'])) {
            $agent = M('agents');
            $agentid = $_SESSION['agentid'];
            $condition['id'] = $agentid;
            $render['error'] = "";
            $agentdata = $agent->where($condition)->find();
            if ($agentdata) {
                # code...
                if (IS_POST) {
                    if ($_POST['oldpasswd'] != $agentdata['contract_pwd']) {
                        $render['error'] = "密码错误";
                        $render['debug'] = $agentdata['contract_pwd'];
                        $this->ajaxReturn($render);
                    }else{
                        $newpasswd = array(
                                "contract_pwd"  =>  $_POST['newpasswd']
                            );
                        $newpwddata = $agent->where($condition)->save($newpasswd);
                        if ($newpwddata) {
                            $this->ajaxReturn($render);
                        }
                        else
                        {
                            $render['error'] = "修改失败";
                            $this->ajaxReturn($render);
                        }
                    }
                }
                else{
                    $this->display('Agent/passwd');
                }
            }
            else{
                $this->signout();
            }

        }
        else
        {
            $this->assign('waitSecond',3);
            $this->assign("jumpUrl",__ROOT__."/Agent/signin");
            $this->success('请先登录... 页面跳转中...');
        }
    }
    public function faq(){
        echo "";
    }
    public function hello(){
        phpinfo();
        exit();
    }
}