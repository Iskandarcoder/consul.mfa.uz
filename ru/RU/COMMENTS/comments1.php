<!DOCTYPE HTML>
<html>
<head>
 <meta http-equiv="Content-Type" content="text/html" charset="utf-8"/>
 <link href="css/reset.css" rel="stylesheet" type="text/css" />
  <script type="text/javascript" src="js/jquery-1.3.2.js"></script>
  
  <script src='https://www.google.com/recaptcha/api.js'></script>
   <!-- <script src="https://www.google.com/recaptcha/api.js?hl=uzb"></script>-->

<style>
body{
    width: 1200px;
    margin: 0 auto;
    background: #eeeeee url("/images/background.png") repeat scroll 0 0;
}

h2 {
    color: #1479dd;
    font-size: 22px;
    padding: 2px;
    text-align: center;
    text-shadow: 1px 1px 1px #fff;
}
h4 {
    color:    darkblue; /*#1479dd;*/
    font-size: 15px;
    padding: 0px;
    margin-top: -10px;
    text-align: center;
    text-shadow: 1px 1px 1px #fff;
}
#respond {
    border: 1px solid #e1e1df;
    padding: 0 0 15px;
  /*  text-align: center;*/
}
#wrapper1{
   -moz-box-shadow:0px 0px 3px #aaa;
    -webkit-box-shadow:0px 0px 3px #aaa;
   /*  box-shadow:0px 0px 3px #aaa;*/
    -moz-border-radius:10px;
    -webkit-border-radius:10px;
    border:1px solid #e1e1df;
    width:1160px;
    overflow:hidden;
  }
#registration{
  /*  border: 1px solid black;*/
    width: 1200px;
    height: 50px;
}
#registration li{
   float: left;
list-style-type: none;
  margin-left: 15px;
  margin-top: 10px;
}
#registration a{
  font: 15px sans-serif;
  color: blue;  /* #34659D;*/ 
  margin-left: 4px;
  margin-right: 3px;
  text-decoration: none;
}
#registration a:hover{
  color: #ef662b;  
}
#registration img{
  float: left;
  margin-top: -3px;  
}
#commentform{
    width: 580px;
  /*  border: 1px solid black;*/
    margin: 0 auto;
    height: 260px;
 background-color:  #D9E2E4;  /*#fafafa;*/
  /*display: none;*/ 
}
.uppercase {
    text-transform: uppercase;
}

 
 #xizmat{
    margin-left: 35px;
    padding: 3px;
    width: 700px;
    font: 18px "Trebuchet MS", tahoma, verdana, arial narrow,    arial;
 }  
  #fam{
    margin-left: 60px;
    margin-bottom: 10px;
    font: 18px "Trebuchet MS", tahoma, verdana, arial narrow,    arial;
 }  
   #pochta{
    margin-left: 30px;
    margin-bottom: 10px;
    font: 18px "Trebuchet MS", tahoma, verdana, arial narrow,    arial;
 }
 #tel{
    margin-left: 26px;
    margin-bottom: 10px;
    font: 18px "Trebuchet MS", tahoma, verdana, arial narrow,    arial;
 }
 #pochta,#fam{
        width: 400px;
 }
 #tel{
        width: 180px;
 } 
 .p1 label {
    color: #666;
    float: left;
    font-weight: bold;
    padding-left: 10px;
    padding-top: 2px;
    text-align: left;
    text-shadow: 1px 1px 1px #fff;
}
 .p1{
    float: left;
    margin:10px 0px;
    padding:3px;
    margin-left:10px;
 }
.send{
    margin-left: 130px;
}
.g-recaptcha{
    margin-left: 130px;
    margin-bottom: 20px;
}
</style>
</head>
<!--6Ld9ngsUAAAAAJPYmYpgm_qZsTYB6FswVnmDkCTq
6Ld9ngsUAAAAAFuP_V8EhjtyrhU9HXTRgUC0tqy6-->

<body>
<?php
include ("db.php");
?>
<div id="respond">
<h2 id="comments" >O`z fikr mulohazalaringiz va takliflaringizni qoldirishingiz mumkin</h2>
<h4 >(Ro`yhatdan o`tgan foydalanuvchilar uchun ruxsat beriladi)</h4>

 <div id="wrapper1">
        <div id="registration">
           <ul>
              <li id="vxod"><img src="images/kirish.png"/><a href="#">Kirish</a></li>
              <li ><img src="images/reg.png"/><a id="reg" href="#">Ro`yhatga o`lish</a></li>
              <li><script src="//ulogin.ru/js/ulogin.js"></script>
<div id="uLogin" data-ulogin="display=small;theme=classic;fields=first_name,last_name;providers=vkontakte,odnoklassniki,mailru,facebook;hidden=other;redirect_uri=http%3A%2F%2Flocalhost%2Fcomments.php;mobilebuttons=0;"></div>
              </li>
           </ul> 
</div>

<form id="commentform" method="post" action="action_reg.php">
  <ol class="p1">
    <li><label for="fam"  > <font style="color:red;">*</font>&nbsp;F.I.Sh.&nbsp;</label>
                    <input  id='fam'   name='fam' maxlength='70' /></li>
    <li> <label for="pochta"  > <font style="color:red;">*</font>Email  adres</label>
                    <input  id='pochta'   name='pochta' maxlength='70' /></li>
    <li><label for="tel"  > Uyali telefon &nbsp;</label>
                    <input  id='tel'   name='tel' maxlength='20' /></li>
 <div class="g-recaptcha" data-sitekey="6Ld9ngsUAAAAAJPYmYpgm_qZsTYB6FswVnmDkCTq"></div>                    
    <li>
      <input type="submit" class="send" value="Yuborish"/>
      <div class="clr"></div>
    </li>
  </ol>
       </form>   
</div>
</div>        
    <!--    <p class="p1">
               <label for="xizmat" >Xizmat turi</label>
                      <?php
          		//			$select = mysql_query("SELECT  nomi_uzb, id FROM l_uslugi ") or die(mysql_error());
         			//		echo '<select name="xizmat" id="xizmat">';
        				//	 while(list($nomi_uzb,$id) = mysql_fetch_row($select))
						 	//	echo "<option value='$id'>$nomi_uzb</option>";
	        			   // echo '</select>';
					   ?>

         </p>-->
  

  <script type="text/javascript">
  $(document).ready(function()
   {  
  //html body div.rc-anchor.rc-anchor-normal.rc-anchor-light div.rc-anchor-content div.rc-inline-block div.rc-anchor-center-container label#recaptcha-anchor-label.rc-anchor-center-item.rc-anchor-checkbox-label

    $("#reg").click(function(){ 
        $('#commentform').show();
        alert($('.rc-anchor-center-container').find(#)text());
      //  alert($('.rc-anchor-center-item rc-anchor-checkbox-label').val(); 
       // alert($("div.rc-anchor-center-container")[1]);
        // alert($(".rc-anchor-center-item").innerHTML); //innerHTML = "Men, robot emasman";
    });
    });
    </script>
</body>
</html>