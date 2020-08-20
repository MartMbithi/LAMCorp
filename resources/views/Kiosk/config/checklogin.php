<?php
function check_login()
{
	if(strlen($_SESSION['wp_id'])==0)
		{
			$host = $_SERVER['HTTP_HOST'];
			$uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
			$extra="../Kiosk/";
			$_SESSION["wp_id"]="";
			header("Location: http://$host$uri/$extra");
			
		}
}




?>
