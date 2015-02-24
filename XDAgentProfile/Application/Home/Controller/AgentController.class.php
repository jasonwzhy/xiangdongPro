<?php
namespace Home\Controller;
use Think\Controller;
class AgentController extends Controller {
    public function index(){
        if (isset($_SESSION['agentid'])) {
    		$agent = M('agents');
    		$agentid = $_SESSION['agentid'];
    		$condition['id'] = $agentid;
    		$agentdata = $agent->where($condition)->find();
    		// var_dump($agentdata);
    		if ($agentdata) {
                $agentdata['account1_no'] = substr_replace($agentdata['account1_no'],"**********",3,10);
    			$render['agentdata'] = $agentdata;
    			$this->assign($render);
    			$this->display('agent/index');
    		}
    	}
    	else{
			redirect('signin',1,'请先登录...');
		}
    }
    public function signin(){
    	if (IS_POST){
            //$this->ajaxReturn($_POST);
    		$agentlogin = M('agents');
            $render['error'] = "";
            $render['post'] = $_POST;
    		if(isset($_POST['emaillogin']) && NULL != $_POST['emaillogin']){
    			$condition['contract_loginname'] = $_POST['emaillogin'];
    		}
    		elseif (isset($_POST['contractlogin']) && NULL != $_POST['contractlogin']) {
    			$condition['contract'] = $_POST['contractlogin'];
    		}
    		else{
                $render['error'] = "用户名或密码不能为空";
    			#no post data return error...
    		}
    		$condition['contract_pwd'] = $_POST['loginpwd'];
    		$agent = $agentlogin->where($condition)->find();
    		if ($agent==NULL) {
    			#账号或密码错误
    			$render['error'] = "账号或密码错误!";
                $this->ajaxReturn($render);
    			// $this->assign($render);
    			// $this->display('agent/login');
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
                // var_dump($agentdata);
                if ($agentdata) {
                    redirect('index',3,'页面跳转中...');
                }
            }
    		$this->display('agent/login');
    	}
    	
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
                    $agdata = [
                        "contract" =>  $this->contractnum(),
                        "contract_pwd" => $_POST['sginuppwd'],
                        "contract_loginname" => $_POST['sginupemail'],
                        "contactor" => $_POST['contactor'],
                        "contactor_tel" => $_POST['contactortel'],
                        "agent_name" => $_POST['agentname'],
                        "agent_src" => "",
                        "agent_state" => "未审核",
                        "city_code" => "",
                        "province" => $_POST['selProvince'],
                        "city" => $_POST['selCity'],
                        "reg_date" =>date('Y-m-d H:i:s',time()),
                        "address" => $_POST['address'],

                        "contract_begindt" => date('Y-m-d H:i:s',time()),
                        "contract_begintimestamp" =>date('Y-m-d H:i:s',time()),
                        "contract_enddt" => date('Y-m-d H:i:s',time()),
                        "contract_endtimestamp" => date('Y-m-d H:i:s',time()),
                        "contract_signdt" => date('Y-m-d H:i:s',time()),
                        "contract_sign_name" => "",

                        "contactor_finance" => "",
                        "contactortel_finance" => "",
                        "account1_no" => "",
                        "account1_name" => "",
                        "account1_bankname" => "",
                        "account2_no" => "",
                        "account2_name" => "",
                        "account2_bankname" => "",
                        "zhifubao" => "",
                        "wxpay" => "",
                        "trade_no" => "",
                        "trade_name" => "",
                        "trade_pic" => ""
                    ];
                    $retid=$AgentSginup->add($agdata);
                    if ($retid) {
                        $_SESSION['agentid'] = $retid;
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
    		$this->display('agent/signup');	
    	}
    }
    private function contractnum(){
        return "620150105123";
    }

    public function signout(){
        unset($_SESSION['agentid']);
        redirect('index',1,'页面跳转中...');
    }
    public function shopsview(){
        $this->display('agent/shopsview');

    }
    public function joinmember(){
        $agentdata['id'] = $_SESSION['agentid'];
        $this->display('agent/joinmember');
    }
    public function hello(){
        $this->ajaxReturn("123","321",1);
        exit();
    }
}