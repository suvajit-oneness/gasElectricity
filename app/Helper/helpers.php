<?php 
	
	function successResponse($msg='',$data=[],$status=200)
	{
		return response()->json(['error'=>false,'status'=>$status,'message'=>$msg,'data'=>$data]);
	}

	function errorResponse($msg='',$data=[],$status=200)
	{
		return response()->json(['error'=>true,'status'=>$status,'message'=>$msg,'data'=>$data]);
	}

	function emptyCheck($string)
	{
		return !empty($string) ? $string : '';
	}

	function randomGenerator()
	{
		return uniqid().''.date('ymdhis').''.uniqid();
	}

	function words($value, $words = 100, $end = '...')
    {
        return Str::words($value, $words, $end);
    }
    
    function sendMail()
    {
        
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