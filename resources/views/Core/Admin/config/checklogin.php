<?php
function check_login()
{
	if(strlen($_SESSION['c_id'])==0)
		{
			$host = $_SERVER['HTTP_HOST'];
			$uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
			$extra="../views/";
			$_SESSION["c_id"]="";
			header("Location: http://$host$uri/$extra");
			
		}
	
}

function sudoChecklogin()
{
	if(strlen($_SESSION['a_id'])==0)
	{
		$host = $_SESSION['HTTP_HOST'];
		$uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra = "../";
		$_SESSION["a_id"] = "";
		header("Location: http://$host$uri/$extra");
	}
}

function professionChecklogin()
{
	if(strlen($_SESSION['p_id'])==0)
	{
		$host = $_SESSION['HTTP_HOST'];
		$uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra = "../../profession/";
		$_SESSION["p_id"] = "";
		header("Location: http://$host$uri/$extra");
	}
}



?>
