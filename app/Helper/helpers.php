<?php 
	
	function successResponse($msg='',$data=[],$status=200)
	{
		return response()->json(['error'=>false,'status'=>$status,'message'=>$msg,'data'=>$data]);
	}

	function errorResponse($msg='',$data=[],$status=200)
	{
		return response()->json(['error'=>true,'status'=>$status,'message'=>$msg,'data'=>$data]);
	}

	function emptyCheck($string,$date=false)
	{
		if($date){
			return !empty($string) ? date('Y-m-d',strtotime($string)) : '0000-00-00';
		}
		return !empty($string) ? $string : '';
	}

	function addNotification($userId,$message)
	{
		$newNotification = new \App\Model\Notification;
		$newNotification->userId = $userId;
		$newNotification->message = emptyCheck($message);
		$newNotification->save();
	}

	function fileUpload($file,$folder='image')
	{
		$random = randomGenerator();
		$file->move('upload/'.$folder.'/',$random.'.'.$file->getClientOriginalExtension());
        $fileurl = 'upload/'.$folder.'/'.$random.'.'.$file->getClientOriginalExtension();
        return $fileurl;
	}

	function getStringNearPosition($string,$curentPos,$whattoFind,$afterBefore=100,$before=true)
	{
		$pos = 0;$loopExecute = true;
		if(isset($string[$curentPos - $afterBefore])){
			for($i = $curentPos; $i > ($curentPos - $afterBefore); $i--){
				if(isset($string[$i]) && ($string[$i] == $whattoFind)){
					$pos = $i;$loopExecute=false;break;
				}
			}
		}
		if($loopExecute && isset($string[$curentPos + $afterBefore])){
			for ($i=$curentPos; $i < ($curentPos + $afterBefore); $i++) {
				if(isset($string[$i]) && ($string[$i] == $whattoFind)){
					$pos = $i;break;
				}
			}
		}
		return $pos;
	}

	function getNumberFromString($string,$position)
	{
		$number  = '';$firstSpace = false;$count = 0;
		$array = ['0','1','2','3','4','5','6','7','8','9','.'];
		for($i = ($position); $i < ($position + 15); $i++){
			// echo $string[$i];
			if(isset($string[$i]) && in_array($string[$i], $array)){
				$number .= $string[$i];
			}elseif($firstSpace && $count >= 2){
				break;
			}else{
				$firstSpace = true;$count += 1;
			}
		}
		return $number;
	}

	function getStringFromTo($start,$upto,$string)
	{
		$data = '';
		for ($i=0; $i < $upto; $i++) {
			if(isset($string[$start+$i])){
				$data .= $string[$start+$i];
			}
		}
		return $data;
	}

	function strpos_all($haystack, $needle) {
	    $nextPosition = 0;$positionArray = [];
	    while (($pos = strpos($haystack, $needle, $nextPosition)) !== FALSE) {
	        $nextPosition   = $pos + 1;
	        $positionArray[] = $pos;
	    }
	    return $positionArray;
	}

	function findAVG($ratingsList)
	{
		$rating = 0;$counter = 1;
		foreach($ratingsList as $key => $rate){
			if($key != 0){$counter++;}
			$rating += $rate->rating;
		}
		return number_format($rating/$counter,2);
	}

	function formInputTypeCheck($inputType)
	{
		$return = false;
		switch ($inputType){
            case 'radio' : $return = true;break;
            case 'checkbox': $return = true;break;
        }
        return $return;
	}

	function generateKeyForForm($string)
	{
		$key = '';
		for($i= 0; $i < strlen($string); $i++){
			if(!preg_match('/[^A-Za-z]+/', $string[$i])) {
				$key .= strtolower($string[$i]);
			}
		}
		return $key;
	}

	function checkUserOldForm($key,$value,$objects)
	{
		$response = false;
		foreach($objects as $obj){
			if($obj->key == $key && $obj->value == $value){
				return true;
			}
		}
		return $response;
	}

	function getFormHistoryInfo($allObject,$userFilledData)
	{
		$data = [];
		foreach($userFilledData as $index => $userForm){
			foreach ($allObject as $key => $object) {
				if($userForm->key == $object->key){
					$data[] = [
						'label' => $object->label,
						'value' => $userForm->value,
					];
				}
			}
		}
		return $data;
	}

	function randomGenerator()
	{
		return uniqid().''.date('ymdhis').''.uniqid();
	}

	function moneyFormat($amount)
	{
		$amount = preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $amount);
		return $amount;
	}

	// this function will work when user is Authenticated
	function urlPrefix()
	{
		$return = 'admin';
		switch(auth::user()->user_type){
			case 1: $return = 'admin';break;
			case 2: $return = 'supplier';break;
		}
		return $return;
	}

	function words($value, $words = 100, $end = '...')
    {
        return Str::words($value, $words, $end);
    }
    
    function sendMail($data,$template,$to,$subject)
    {
    	$newMail = new \App\Model\EmailLog();
    	$newMail->from = 'onenesstechsolution@gmail.com';
    	$newMail->to = $to;
    	$newMail->subject = $subject;
    	$newMail->view_file = $template;
    	$newMail->payload = json_encode($data);
    	$newMail->save();
	    Mail::send($template, $data, function($message)use ($data,$to,$subject) {
	        $message->to($to, $data['name'])->subject($subject);
	        $message->from('onenesstechsolution@gmail.com','Switcher');
	    });
    }

    function sendTwilioMessage($to,$message)
    {
    	$sid = env('TWILIO_SID');
    	$authoriZation = env('TWILIO_AUTHORIZATION');
    	$curl = curl_init();
		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'https://api.twilio.com/2010-04-01/Accounts/'.$sid.'/Messages.json',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'POST',
		  CURLOPT_POSTFIELDS => array('From' => '+18509902391','To' => $to,'Body' => $message),
		  CURLOPT_HTTPHEADER => array(
		    'Authorization: Basic '.$authoriZation
		  ),
		));
		$response = curl_exec($curl);
		curl_close($curl);
    }

    function generateUniqueAlphaNumeric($length = 7)
    {
    	$random_string = '';
    	for($i = 0; $i < $length; $i++) {
    		$number = random_int(0, 36);
    		$character = base_convert($number, 10, 36);
    		$random_string .= $character;
    	}
    	return $random_string;
    }

    function getSumOfPoints($userPoints){
    	$totalPoint = 0;
    	foreach($userPoints as $getPoint){
    		$totalPoint += $getPoint->points;
    	}
    	return $totalPoint;
    }

 ?>