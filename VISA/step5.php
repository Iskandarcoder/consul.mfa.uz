<div id="captcha_block" class="hidden">
<table style="float:left;">
	<tr><td colspan="4" style="text-align: center; font-size=14; vertical-align: middle">
	<span>&nbsp;<font style="color:blue;">Print page</font></span>
	 </td>
	</tr>

	<tr>
	<td style="font-size: 14px; vertical-align: middle"><span>&nbsp;<font style="color:blue;">Type digits from the image</font></span></td>
	<?php echo ""; ?>
	<td style="text-align: left; width: 20px; vertical-align: middle"><input type="text" name="ct_captcha" id="ct_captcha" size="14" maxlength="5" /></td>
	<td style="text-align: left; vertical-align: top">
		<img id="siimage" style="border: 1px solid #000; margin-right: 20px" src="./secureimage/securimage_show.php?sid=<?php echo md5(uniqid());?>" alt="CAPTCHA Image" align="left">
	    <param name="movie" value="./secureimage/securimage_play.swf?audio_file=./secureimage/securimage_play.php&amp;bgColor1=#fff&amp;bgColor2=#fff&amp;iconColor=#777&amp;borderWidth=1&amp;borderColor=#000">
	</td>
	<td style="text-align: left; vertical-align: top">
	<a tabindex="-1" style="border-style: none;" href="#" title="Refresh Image" onclick="document.getElementById('siimage').src = './secureimage/securimage_show.php?sid=' + Math.random(); this.blur(); return false">
	<img src="./secureimage/images/refresh.png" alt="Reload Image" onclick="this.blur()" align="bottom" border="0" id="pic">Refresh picture</a><br />
	</td>
<!--<meta http-equiv="refresh" id="ref" > -->
	</tr>
</table>
<br>
<table>
	<tr><td style="padding-left: 340px; " align="center"><button id="registerButton" type="submit" >Download Forms (Print)</button></td>
	<td><button id="back_btn" class="hidden" type="button" onclick="return go_back();">Back and edit</button></td>
	</tr>

</table>
<h3 id="new" align=center><font size=2><a href="?action=vvod">«Go to registration page»</a></font></h3>
<br>
<span><font style="color:red; text-align: center;">ATTENTION!</font></span>
<span><font style="color:red;"> If you are using «Internet Explorer» (IE), click on the menu «Tools» and select «Internet Options».
On «Security» tab click «Custom Level». In parameters list find «Automatic prompting for file downloads» and
«File Download» click «Enable», then click «OK». Press «OK» to exit option menu.</font></span>

</div>