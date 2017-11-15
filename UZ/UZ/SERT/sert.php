<!DOCTYPE HTML >
<html >
    <head>
	    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" type="text/css" href="captcha/captcha.css"/>
 	<link rel="stylesheet" href="css/sert.css" type="text/css" media="screen"/>
    <link rel="stylesheet" type="text/css" href="css/jquery.alerts.css"/>
    <link rel="stylesheet" type="text/css" href="css/keyboard.css"/>
     <script src="js/jquery-1.11.1.min.js" type="text/javascript"></script>
  	<script type="text/javascript" src="js/jquery.form.js"></script>
    <script type="text/javascript" src="js/ajaxupload.js"></script>
       <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
    <script type="text/javascript" src="js/keyboard.js"></script>
      <script type="text/javascript" src="js/jquery.liTranslit.js"></script>
    <script type="text/javascript" src="js/jquery.maskedinput.min.js"></script>
    <script type="text/javascript" src="js/functiyalar.js"></script>


   </head>
   
    <style>
 .layer1 {
    float:left;
    width:300px;
    padding:0px;
    margin-left:0px;
     /* background-color: #fc0;*/
   }
   .layer2 {
        float:left;
    width:300px;
    padding:0px;
    margin-left:0px;
      background-color: #f00;
   }
   .clear {
    clear: left; /* Отмена обтекания */
   }
         span.reference{
            position:fixed;
            left:5px;
            top:5px;
            font-size:5px;
            text-shadow:1px 1px 1px #fff;
        }
        span.reference a{
            color:#555;
            text-decoration:none;
			text-transform:uppercase;
        }
        span.reference a:hover{
            color:#000;

        }
 
     .select {
    color: maroon;
    font-weight: 600;
    text-align:center;
 }
 
  </style>
<?php
	include("function.php");
	include("db.php");
?>
  <body>

        <h2 >Sertifikat olish uchun hujjatlarni tayyorlashda shaxsiy ma'lumotlarni kiritish</h2>
            <br/>
     <div id="wrapper1">

  <form id="formElem" name="formElem" action="" method="post">
          <div class="ajrim">
                 <fieldset>
                           <?php include "step1.php"; ?>
				</fieldset>
          </div>

            <div class="ajrim">
               <fieldset>
                           <?php include "step2.php"; ?>
				</fieldset>  
                </div>
                
                        
	<div style="display:none;"><input id="sp_division" name="sp_division"/>
		</div>
  </form>

     </div>

        <p id='htmlTarget'>   </p>
        
        
 
 </body>
</html>
