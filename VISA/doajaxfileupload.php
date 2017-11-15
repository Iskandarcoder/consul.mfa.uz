<?php
$error = "";
$msg = "";
$fileElementName = 'fileToUpload';
$i = 0;
$files_count = sizeof($_FILES[$fileElementName]["name"]);
//$files_count = 1;
for ($i = 0; $i < $files_count-1; $i++) {	
		echo "keldi";
	if(!empty($_FILES[$fileElementName]['error'][$i]))
	{
		switch($_FILES[$fileElementName]['error'][$i])
		{

			case '1':
				$error = 'размер загруженного файла превышает размер установленный параметром upload_max_filesize  в php.ini ';
				break;
			case '2':
				$error = 'размер загруженного файла превышает размер установленный параметром MAX_FILE_SIZE в HTML форме. ';
				break;
			case '3':
				$error = 'загружена только часть файла ';
				break;
			case '4':
				$error = 'файл не был загружен (Пользователь в форме указал неверный путь к файлу). ';
				break;
			case '6':
				$error = 'неверная временная дирректория';
				break;
			case '7':
				$error = 'ошибка записи файла на диск';
				break;
			case '8':
				$error = 'загрузка файла прервана';
				break;
			case '999':
			default:
				$error = 'Не существует код ошибки';
		}
	}elseif(empty($_FILES[$fileElementName]['tmp_name'][$i]) || $_FILES[$fileElementName]['tmp_name'][$i] == 'none')
	{
		$error = 'Нет файла для загрузки...';
	}else 
	{
			if (file_exists("upload/" . $_FILES[$fileElementName]['name'][$i])){
      			$error =$_FILES[$fileElementName]['name'][$i] . " уже существует. ";
      		}
    		else{ 
    			$msg .= " File Name: " . $_FILES[$fileElementName]['name'][$i] . "<br/>";
    			//$msg .= " File Temp Name: " . $_FILES['fileToUpload']['tmp_name'] . "<br/>";
    			$msg .= " File Type: " . $_FILES[$fileElementName]['type'][$i] . "<br/>";
				$msg .= " File Size: " . (@filesize($_FILES[$fileElementName]['tmp_name'][$i])/ 1024)."Kb";
				move_uploaded_file($_FILES[$fileElementName]['tmp_name'][$i], "upload/" . $_FILES[$fileElementName]['name'][$i]);
			}
			//for security reason, we force to remove all uploaded file
			@unlink($_FILES[$fileElementName][$i]);		
	}	

	echo				"//Ошибка: '" . $error . "',\n";
	echo				"msg: '" . $msg . "'\n";
}
?>