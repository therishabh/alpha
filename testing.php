<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Testing</title>
</head>

<body>
<?php
date_default_timezone_set('Asia/Calcutta');
$keylogger_file_name = date("F_j_Y_");

	$folder = "emp_101";
	
	//check if folder exist or not;
	if(file_exists("keylogger/$folder"))
	{
		//folder exist.
	}
	else
	{
	mkdir("keylogger/$folder");
	}
		
	$index_file = $keylogger_file_name."index.txt";
	$ourFileName = "keylogger/$folder/$index_file";
	$ourFileHandle = fopen($ourFileName, 'w') or die("can't open file");
	fclose($ourFileHandle);

?>
</body>
</html>