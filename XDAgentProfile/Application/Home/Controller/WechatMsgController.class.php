<?php
namespace Home\Controller;
use Think\Controller;
class WechatMsgController extends Controller {
		private $appId = 'wx4e892e84ce5a315f';
  	private $appSecret;		
		
		public function __construct(){
			parent::__construct();
			//public function __initialize(){
		}
		
		// 获取AccessToken函数
	  private function getAccessToken(){
			// access_token 应该全局存储与更新，以下代码以写入到文件中做示例
			//$path = "../App/Public/Upfiles";
			$file_token = './wxAccess/access_token.json'; // remote

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
		
		// 构建https post提交
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
		
		// 发送模板消息
		public function sendTplMsg(){
			//获得access_token
			$access_token= $this->getAccessToken();
			//echo $access_token;exit;
			
			//模板消息:oGHwet4Jj_rU4hmIZ8Pwx-RmuXwY 西瓜
			$template=array(
				'touser'=>"oGHwet4Jj_rU4hmIZ8Pwx-RmuXwY",
				'template_id'=>"YCvbsXGvf1mkjN9R0Ju0OwQ5SmzJ38DjOMlhn02dUaM",
				'topcolor'=>"#7B68EE",
				'data'=>array(
					'first'=>array('value'=>urlencode("您好,您的卡片已经激活成功,成为响动健身的会员"),'color'=>"#743A3A"),
					'cardNumber'=>array('value'=>urlencode("13131331313113"),'color'=>"#743A3A"),
					'type'=>array('value'=>urlencode("会员所在"),'color'=>'#743A3A'),
					'address'=>array('value'=>urlencode("成都"),'color'=>'#743A3A'),
					'VIPName'=>array('value'=>urlencode("西瓜"),'color'=>'#743A3A'),
					'VIPPhone'=>array('value'=>urlencode("13541214124"),'color'=>'#743A3A'),
					'expDate'=>array('value'=>urlencode("2014年9月30日"),'color'=>'#743A3A'),
					
					'remark'=>array('value'=>urlencode('您的卡号是:1231313'),'color'=>'#743A3A'),
				)
			);

			//$access_token = '2CNweuPcd-oKS7pL8ztNX9AuFePH-QgBCWe9NhZiXgscmP-GdL_-kxUSOBI2hBnLN7BFzrg-datj1S6l7XlJAimVGw8QSQVpiv6MBZeDyaY';
			
			$json_template=json_encode($template);
			//echo $json_template;
			//echo $access_token;exit;
			
			$url="https://api.weixin.qq.com/cgi-bin/message/template/send?access_token=".$access_token;
			$res=$this->http_request($url,urldecode($json_template));
			if ($res[errcode]==0) echo '模板消息发送成功!';
			var_dump($res);
		}
		
		private function http_get_data($url) {  
        $httpGetData = array();
        
        $ch = curl_init ();  
        curl_setopt ( $ch, CURLOPT_CUSTOMREQUEST, 'GET' );  
        curl_setopt ( $ch, CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt ( $ch, CURLOPT_HEADER,true);
        curl_setopt ( $ch, CURLOPT_URL, $url );  
        ob_start ();  
        curl_exec ( $ch );
        
        /*
        if (curl_getinfo($ch, CURLINFO_HTTP_CODE) == '200') {
    			$headerSize = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
    			$header = substr($response, 0, $headerSize);
    			$body = substr($response, $headerSize);
    			
						return array(
							'header'=> $header,
							'body'=> $body
						); 
				}*/
        
       $return_content = ob_get_contents ();  
       ob_end_clean ();
       
       $return_code = curl_getinfo ( $ch, CURLINFO_HTTP_CODE );
       $headerSize = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
			 $header = substr($return_content, 0, $headerSize);
			 $body = substr($return_content, $headerSize);       

				return array(
							'header'=> $header,
							'body'=> $body
						);       
       //return $body;  
    }  
		
		//从微信服务器下载图片到本地服务器
		public function downloadImage(){
			$mediaId = "a6ZcLzZNiAcESgHJv6xgioR4147fluB9g5fF6HHAM2OtJ6TL-6Lz4sXIWydXLjgj";
			$access_token= $this->getAccessToken();

			$getImage_url="http://file.api.weixin.qq.com/cgi-bin/media/get?access_token=".$access_token."&media_id=".$mediaId;

			$return_content = $this->http_get_data($getImage_url);
			//var_dump($return_content);exit;
			$http_header = $return_content['header'];
			$pos = strpos($http_header, "\"");
			$http_header = substr($http_header,$pos+1);
			$pos = strpos($http_header, "\"");
			//$image_type = substr($http_header,0,$pos);
			$filename = substr($http_header,0,$pos);
			//var_dump($filename);exit;
			$downfile = './Uploads/Agents/'.$filename;  
			$fp= @fopen($downfile,"a");   
			fwrite($fp,$return_content['body']);
		}
}	