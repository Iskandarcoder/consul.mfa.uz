
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>
<body>
<?php
// Функция изменение размера изображения
function resize_image($imageFile,$imageFile_m)
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
if ($width<300 || $height<400)		// Agar rasm 300X400 dan kichkina busa qaytaramiz
	return 0;
   $new_width = 100;
   $new_height = 130;
    //Создаем новое изображение с новыми размерами
     $resized = imagecreatetruecolor($new_width, $new_height);

/*  Описание
      int imagecopyresampled (resource dst_im, resource src_im, int dstX, int dstY, int srcX, int srcY, int dstW, int dstH, int srcW, int srcH)

imagecopyresampled() копирует прямоугольную часть изображения в другое изображение, плавно интерполируя пикселные значения таким образом, что, в частности, уменьшение размера изображения сохранит его чёткость и яркость. Dst_im это изображение назначения, src_im - исходное изображение.Если координаты и ширина и высота источника и назначения различны, будет выполнено соответствующее растягивание и сжатие изображения.Координаты даны относительно верхнего левого угла.Эта функция может использоваться для копирования областей в пределах одного изображения (если dst_im - то же, что и src_im), но если области перекрываются, результат непредсказуем. */
     imagecopyresampled($resized, $handle, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
     imagejpeg($resized, $imageFile_m, 100); //Выводит изображение в браузер или файл.
     imagedestroy($resized);

     ////// ------ Размерни 300Х400 килиш ----------------////
     $new_w=300;
     $new_h=400;
     $resized = imagecreatetruecolor($new_w, $new_h);
     imagecopyresampled($resized, $handle, 0, 0, 0, 0, $new_w, $new_h, $width, $height);
     imagejpeg($resized, $imageFile, 75); //Выводит изображение в браузер или файл.
     imagedestroy($resized);
     ////// ------ Размерни 300Х400 килиш ----------------////
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
  
        list($txt, $ext) = explode(".", $myfile_name);
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
    			$msg .= " File Name: " . $myfile_name. "<br/>";
    			$msg .= " File Type: " . $_FILES[$fileElementName]['type']. "<br/>";
			$msg .= " File Size: " . (@filesize($myfile_name)/ 1024)."Kb";
  if ($myfile_size>2097152)
        	echo "Ошибка:Слишком большой размер файла.";
	else
	  {
           $actual_image_name = time() . "." . $ext ; // задаем уникальное имя файлу
	   $myfile_name = "../ru/upload/" . $actual_image_name; 
            $myfile_name_m = "../ru/upload/M_" . $actual_image_name;
        // Проверяем загружен ли файл
          if(is_uploaded_file($myfile))
     {
     // Если файл загружен успешно, перемещаем его из временной директории в конечную
	  move_uploaded_file($myfile, $myfile_name);
//	   echo $myfile;
	//   sleep(15);
//	   exit;
      }
	else
	{
       echo("Ошибка загрузки файла");
         return;		
	}
	    	if (resize_image($myfile_name,$myfile_name_m)==0) { $error = "Неверный формат изображения";
		                                   echo "//Ошибка: '" . $error . "',\n"; }
		 else
		 {
		    $img='<img src="'.$myfile_name_m.'"/>';
			echo $img;
			echo '<div><input id="upfile" type="hidden" name="upfile"  value="'.$myfile_name.'"/></div>';
		 }    
	  }
	  }	
}
}
?>
</body>
</html>
