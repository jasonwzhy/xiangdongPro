<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	$usercount = M('tmp_usercount');
		$condition['id'] = 1;
		$countlog = $usercount->where($condition)->find();
		$countnum = $countlog['counting'];

		$upcountnum = $countnum + rand(0,5);
		$usercount->where($condition)->save(array("counting"=>$upcountnum));
		$render['countnum'] = $upcountnum;
    	if (IS_POST) {
    		if ($_POST['option'] == "counting") {
    			$this->ajaxReturn($render);
    		}
    		# code...
    	}

    	$this->assign($render);
    	// $this->show();
    	$this->display('Index/index');
    }
   
}
