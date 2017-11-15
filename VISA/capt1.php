<?php
	session_start();
?>
<html>
<head>
</head>
<body>

<table>
<tr>
             <td style="text-align: right; vertical-align: middle">
                 <span>Введите цифры нарисованные на картинке</span>
             </td>
                 <td style="text-align: left; width: 20px; vertical-align: middle">
                    <?php echo @$_SESSION['ctform']['captcha_error'] ?>
                    <td style="text-align: left; width: 150px; vertical-align: middle">
                        <input type="text" name="ct_captcha" size="12" maxlength="6" />
                    </td>
                 </td>

        <td style="text-align: left; vertical-align: top">
          <img id="siimage" style="border: 1px solid #000; margin-right: 10px" src="./secureimage/securimage_show.php?sid=<?php echo md5(uniqid()) ?>" alt="CAPTCHA Image" align="left">
          <object type="application/x-shockwave-flash" data="./secureimage/securimage_play.swf?audio_file=./secureimage/securimage_play.php&amp;bgColor1=#fff&amp;bgColor2=#fff&amp;iconColor=#777&amp;borderWidth=1&amp;borderColor=#000" height="31" width="32">
             <param name="movie" value="./secureimage/securimage_play.swf?audio_file=./secureimage/securimage_play.php&amp;bgColor1=#fff&amp;bgColor2=#fff&amp;iconColor=#777&amp;borderWidth=1&amp;borderColor=#000">
          </object>
        </td>

             <td style="text-align: left; vertical-align: top">
                <table cellpadding="0" cellspacing="0">
                  <tr>
                    <td>
                       <a tabindex="-1" style="border-style: none;" href="#" title="Refresh Image" onclick="document.getElementById('siimage').src = './secureimage/securimage_show.php?sid=' + Math.random(); this.blur(); return false"><img src="./secureimage/images/refresh.png" alt="Reload Image" onclick="this.blur()" align="bottom" border="0"></a><br />
                    </td>
                  </tr>
                         <tr>
                            <td>
                               <span>Обнавить</span>
                            </td>
                         </tr>
                </table>
             </td>

       <table style="text-align: center;" cellpadding="-30" cellspacing="0">
         <tr>
           <td style="padding-left: 280px;" align="center">
              <input type="submit" value="Загрузить анкету">
          </td>
         </tr>
               <table>
                 <tr>
                   <td style="text-align: center;" colspan="4">
                       <tr>
                          <td style="padding-left: 240px;" align="center">
                              <a>Перейти на новую форму анкеты</a>
                          </td>
                       </tr>
                   </tr>
                 </tr>
               </table>
       </table>
</tr>
</table>
</body>
</html>