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

 ?>