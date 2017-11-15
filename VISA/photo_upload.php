<?php
// Функция изменение размера изображения
function resize_image($imageFile)
{
  $extension=strtolower(substr($imageFile, strrpos($imageFile, '.')));

    switch ($extension)
  {
    case '.gif':
                $handle = imagecreatefromgif($imageFile); //создаём новое изображение из файла или URL(тип gif)
                break;

   case '.jpeg':
   case '.jpg':
   				//echo "Image file:".$imageFile;
               $handle = imagecreatefromjpeg($imageFile);//создаём новое изображение из файла или URL(тип jpeg или jpg)
               break;

   case '.png':
               $handle = imagecreatefrompng($imageFile);//создаём новое изображение из файла или URL(тип png)
               break;

    default:
	    return 0;
		break;
 }
 if ($handle)
 {
   $width = imagesx($handle);
   $height = imagesy($handle);
   $new_width = 100;
   //  $new_height = $height * ($new_width/$width);
   $new_height = 130;
    //Создаем новое изображение с новыми размерами
     $resized = imagecreatetruecolor($new_width, $new_height);

/*  Описание
      int imagecopyresampled (resource dst_im, resource src_im, int dstX, int dstY, int srcX, int srcY, int dstW, int dstH, int srcW, int srcH)

imagecopyresampled() копирует прямоугольную часть изображения в другое изображение, плавно интерполируя пикселные значения таким образом, что, в частности, уменьшение размера изображения сохранит его чёткость и яркость. Dst_im это изображение назначения, src_im - исходное изображение.Если координаты и ширина и высота источника и назначения различны, будет выполнено соответствующее растягивание и сжатие изображения.Координаты даны относительно верхнего левого угла.Эта функция может использоваться для копирования областей в пределах одного изображения (если dst_im - то же, что и src_im), но если области перекрываются, результат непредсказуем. */
     imagecopyresampled($resized, $handle, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
     imagejpeg($resized, $imageFile, 100); //Выводит изображение в браузер или файл.
 }
 return 1;
}
////////////////////////////////////////////////////////////////////////////////////////////////
$error = "";
$msg = "";
$fileElementName = 'fileToUpload';

  if(isset($_FILES[$fileElementName]))
    {
        $myfile = $_FILES[$fileElementName]["tmp_name"];  // Имя временного файла
        $myfile_name = $_FILES[$fileElementName]["name"]; //Имя файла на компьютере пользователя
        $myfile_size = $_FILES[$fileElementName]["size"]; //Размер файла в байтах
        $myfile_type = $_FILES[$fileElementName]["type"]; // MIME-тип файла- для текст(text/plain), для gif (image/gif)...
        $error_flag = $_FILES[$fileElementName]["error"]; //код ошибки.
 if($myfile_size>0)
 {
 if($error_flag !=0) // Если ошибок было
      {
         switch($error_flag)
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
				$error = 'Не известный код ошибки';
		}
	}elseif(empty($myfile) == 'none')
	{
		$error = 'Нет файла для загрузки...';
	}else
	{
			//if (file_exists("upload/" . $myfile_name)){$error =$myfile_name . " уже существует. ";}
    		//else{
    			$msg .= " File Name: " . $myfile_name. "<br/>";
    			//$msg .= " File Temp Name: " . $_FILES['fileToUpload']['tmp_name'] . "<br/>";
    			$msg .= " File Type: " . $_FILES[$fileElementName]['type']. "<br/>";
				$msg .= " File Size: " . (@filesize($myfile_name)/ 1024)."Kb";
			//	}
  //if (!empty($error))
        	//echo "//Ошибка: '" . $error . "',\n";
	//else
	  {
	   $myfile_name = "upload/" . $myfile_name; //$_SERVER['DOCUMENT_ROOT'].
	   	move_uploaded_file($myfile, $myfile_name);
	    	if (resize_image($myfile_name)==0) { $error = "Неверный формат изображения";
		                                   echo "//Ошибка: '" . $error . "',\n";
										  }
		 else
		 {
		    $img='<img src="'.$myfile_name.'"/>';
			echo $img;
		}
	  }
			//Для обеспечении безопасности, удаляем файл
		//	@unlink($myfile);
	  }	//else
 	     //echo				"msg: '" . $msg . "'\n";
}
}
?>
