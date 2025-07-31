<?php
require_once("../../../wp-load.php"); 
if (current_user_can('administrator') ) {
	
	
	function filterData(&$str)
	{
		$str = preg_replace("/\t/", "\\t", $str);
		$str = preg_replace("/\r?\n/", "\\n", $str);
		if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
	}
	
	if(isset($_GET['action']) && $_GET['source'] =='local') 
	{
		$courseID = $_GET['action'];
		
		$users=ThemexCore::parseMeta($courseID, 'course', 'users');
		$userb=ThemexCore::parseMeta($courseID, 'course', 'usersb');
		$merge = array_merge($users,$userb);
		$uniqUsers = array_unique($merge);
		
		$fileName = "Export-Course" . $courseID . ".xls";
		
		header("Content-Disposition: attachment; filename=\"$fileName\"");
		header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
		header("Content-type:   application/x-msexcel; charset=utf-8");
	
		
		$out = "نام کاربری \t پست الکترونیکی \t نام \t نام خانوادگی \t شماره تماس \n";	
			foreach ($uniqUsers as $user) 
			{
				$user = get_userdata($user);		
				$out.=
						$user->user_login .
				 "\t". $user->user_email .
				 "\t". $user->first_name .
				 "\t". $user->last_name .
				 "\t". $user->billing_phone . "\n";
			}
	
		
		print chr(255) . chr(254) . mb_convert_encoding($out, 'UTF-16LE', 'UTF-8');
	
		
		exit;
	}
	else if(isset($_GET['action']) && $_GET['source']=='virt') 
	{
		$courseID = $_GET['action'];
		
		$users=ThemexCore::parseMeta($courseID, 'course', 'usersv');
		$userb=ThemexCore::parseMeta($courseID, 'course', 'usersvb');
		$merge = array_merge($users,$userb);
		$uniqUsers = array_unique($merge);
		
		$fileName = "Export-Course" . $courseID . ".xls";
		
		header("Content-Disposition: attachment; filename=\"$fileName\"");
		header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
		header("Content-type:   application/x-msexcel; charset=utf-8");
	
		
		$out = "نام کاربری \t پست الکترونیکی \t نام \t نام خانوادگی \t شماره تماس \n";	
			foreach ($uniqUsers as $user) 
			{
				$user = get_userdata($user);		
				$out.=
						$user->user_login .
				 "\t". $user->user_email .
				 "\t". $user->first_name .
				 "\t". $user->last_name .
				 "\t". $user->billing_phone . "\n";
			}
	
		
		print chr(255) . chr(254) . mb_convert_encoding($out, 'UTF-16LE', 'UTF-8');
	
		
		exit;
	}
} else { echo 'You Have Not Permesion to use this Section' ;}

 ?>