<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
<link href="css/vibor.css" rel="stylesheet" type="text/css" />
</head>

<body class="vibor">
<h4>Diqqat! 5-iyul kuni tashqi ishlar vaziri vatandoshlarimiz bilan to‘g‘ridan-to‘gri muloqot o‘tkazadi. <a href='http://mfa.uz/uz/press/news/2017/05/11288/'>Batafsil...</a></h4>
<h3>Konsullik harakati turlari</h3>
<ul class="k-uslugi">

<li>
<div><a href="?action=sert_doc">
<span class="sert sp_img"></span>
<span><strong>O`zb.Res.ga qaytish uchun sertifikat olish tartibi</strong></span>
     </a>
</div>
</li>

<li>
<div><a href="?action=vku_doc">
<span class="vku sp_img"></span>
<span><strong>Vaqtincha konsullik hisobiga olish tartibi</strong></span>
     </a>
</div>
</li>

<li>
<div><a href="?action=pku_doc">
<span class="pku sp_img"></span>
<span><strong>Doimiy konsullik hisobiga olish tartibi</strong></span>
     </a>
</div>
</li>

<li>
<div><a href="?action=pasp">
<span class="pra sp_img"></span>
<span><strong>Pasportni rasmiylashtirish (almashtirish) tartibi</strong></span>
     </a>
</div>
</li>

<li>
<div><a href="?action=istreb">
<span class="hjs sp_img"></span>
<span><strong>O`zR dan hujjatlarni so`rab olish tartibi</strong></span>
     </a>
</div>
</li>

<li>
<div><a href="?action=metrika">
<span class="tg sp_img"></span>
<span><strong>Tug`ilganlik haqidagi guvohnoma rasmiylashtirish tartibi</strong></span>
     </a>
</div>
</li>

<li>
<div><a href="?action=zags">
<span class="nikoh sp_img"></span>
<span><strong>Nikoh tuzilganligini qayd etish tartibi</strong></span>
     </a>
</div>
</li>

<li>
<div><a href="?action=rbrak">
<span class="b-nikoh sp_img"></span>
<span><strong>Nikoh bekor qilinganligini qayd etish tartibi</strong></span>
     </a>
</div>
</li>

<li>
<div><a href="?action=smrt">
<span class="olh sp_img"></span>
<span><strong>O`lim haqidagi guvohnomani rasmiylashtirish tartibi</strong></span>
     </a>
</div>
</li>

<li>
<div><a href="?action=rz">
<span class="v-chiqish sp_img"></span>
<span><strong>Xorijga vaqtincha chiqish yozuvini rasmiylashtirish tartibi</strong></span>
     </a>
</div>
</li>

<li>
<div><a href="?action=pmj">
<span class="pmj sp_img"></span>
<span><strong>Xorijga doimiy yashashga chiqish yozuvini rasmiylashtirish tartibi</strong></span>
     </a>
</div>
</li>

<li>
<div><a href="?action=vixod">
<span class="f-chiqish sp_img"></span>
<span><strong>O`zR fuqaroligidan chiqishni rasmiylashtirish tartibi</strong></span>
     </a>
</div>
</li>

<li>
<div><a href="?action=ngraj">
<span class="f-mansub sp_img"></span>
<span><strong>O`zR fuqaroligiga mansub - mansub emaslikni aniqlash tartibi</strong></span>
     </a>
</div>
</li>

<li>
<div><a href="?action=apost">
<span class="apostil sp_img"></span>
<span><strong>Apostil qo`yish </strong></span>
     </a>
</div>
</li>

</ul>
 <input  id="ses_name" type="hidden"  value = "<?php  echo $_SESSION['login'];?>" />
<script type="text/javascript">
  $(document).ready(function($)
   {
alert("111111";)
   	User_Session();
   	     $('#Chiqish').click( function(){
	$.ajax({
		type: "POST",
		url:  "/uz/Chiqish.php",
		success: function(){
                          $('#ses_name').val('');
                          User_Session();
                      }
                  });
  	});     	
   //
  });  
   </script>
</body>
</html>