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
    			echo $_POST['contractlogin'];;
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
                $render['agentdata'] = $agentdata;
                $this->assign($render);
                $this->display('agent/index');
            }
        }
    		$this->display('agent/login');
    	}
    	
    }

    public function signup(){
    	// if (IS_POST){
    	// 	$contract = "";
    	// 	$contract_begindt = d
    	// 	$AgentSginup = M('tbl_agents');
    	// 	// $AgentSginup -> 

    	// }
    	// else{
    	// 	$this->display('agent/signup');	
    	// }
    	$this->display('agent/signup');
    }
    public function hello(){
    	echo "hello";
    }
}