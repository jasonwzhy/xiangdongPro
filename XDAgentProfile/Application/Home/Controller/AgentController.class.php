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
    		$agentlogin = M('agents');
    		if(isset($_POST['emaillogin'])){
    			$condition['contract_loginname'] = $_POST['emaillogin'];
    			echo $_POST['emaillogin'];
    		}
    		elseif (isset($_POST['contractlogin'])) {
    			$condition['contract'] = $_POST['contractlogin'];
    			echo $_POST['contractlogin'];
    		}
    		else{
    			#no post data return error...
    		}
    		$condition['contract_pwd'] = $_POST['loginpwd'];
    		$agent = $agentlogin->where($condition)->find();
    		// var_dump($agent);
    		if ($agent==NULL) {
    			#账号或密码错误
    			$render['error'] = "账号或密码错误!";
    			$this->assign($render);
    			$this->display('agent/login');
    			//exit();
    		}
    		else{
    			$_SESSION['agentid']=$agent['id'];
    			//$this->success($agent,'?m=home&c=agent&a=index');
    			redirect('index',3,'页面跳转中...');
    			// $render['data'] = $agent;
    			// $this->assign($render);
    			// $this->display('agent/index');
    		}
    		// echo $_POST['emaillogin'];
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
    		// $contract = "";
    		// $contract_begindt = d;
    		$AgentSginup = M('agents');
    		// $AgentSginup -> 
            $render['error']="";
            var_dump($_POST);
            exit(0);
            if ($_POST['sginupemail'] != NULL&& 
                $_POST['contactortel'] != NULL) {
                # code...
                if ($AgentSginup->where(array('contract_loginname'=>$_POST['sginupemail']))->find()) {
                    # code...
                    $render['error'] = "邮箱已存在";
                }
                elseif ($AgentSginup->where(array('contactor_tel'=>$_POST['contactortel']))->find()) {
                    # code...
                    $render['error'] = "联系电话已经存在";
                }
                else{
                    $agdata = [
                        "contract" =>  $this->contractnum(),
                        "contract_pwd" => isset($_POST['sginuppwd']) ? $_POST['sginuppwd']: '',
                        "contract_loginname" => $_POST['sginupemail'],
                        "contactor" => isset($_POST['contactor']) ? $_POST['contactor'] : '',
                        "contactor_tel" => $_POST['contactortel'],
                        "agent_name" => isset($_POST['agentname']) ? $_POST['agentname'] : '',
                        "agent_src" => "",
                        "agent_state" => "未审核",
                        "city_code" => "",
                        "province" => isset($_POST['selProvince']) ? $_POST['selProvince'] : '',
                        "city" => isset($_POST['selCity']) ? $_POST['selCity'] : '',
                        "reg_date" =>date('Y-m-d H:i:s',time()),
                        "address" => isset($_POST['address']) ? $_POST['address'] : '',

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
                    var_dump($retid);
                    if ($retid) {
                        $_SESSION['agentid'] = $retid;
                        redirect('index',3,'页面跳转中...');
                    }
                }
            }
            else{   
                    $render['error'] = "请将表单填写完整!";
                    $this->assign($render);
                    $this->display('agent/signup');
                }
    	}
    	else{
    		$this->display('agent/signup');	
    	}
      
    	// $this->display('agent/signup');
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
        $this->display('agent/joinmember');
    }
    public function hello(){
    	echo "hello";
    }
}