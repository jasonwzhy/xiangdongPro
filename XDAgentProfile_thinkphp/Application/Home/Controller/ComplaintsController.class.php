<?php
namespace Home\Controller;
use Think\Controller;
class ComplaintsController extends Controller {
    public function index(){
		$this->display('index');
    }
    public function hello(){
    	echo "hello";
    }
}