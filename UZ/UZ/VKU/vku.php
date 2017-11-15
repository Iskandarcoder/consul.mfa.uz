<!DOCTYPE HTML >
<html >
    <head>
	    <meta http-equiv="Content-Type" content="text/html" charset="utf-8"/>
     <link href="css/vku.css" rel="stylesheet" type="text/css" />
     <link href="css/comment.css" rel="stylesheet" type="text/css" />    
  <style> 
 
  </style>   
      </head>
   

<?php
	include("function.php"); 
	include("count.php");
	include('../uz/db.php');
?>
  <body>
<div id="dialog" class='ui-dialog'></div>
<input  id="ses_name" type="hidden"  value = "<?php  echo $_SESSION['login'];?>" />

     <h2 >O`zbekiston Respublikasining horijda <span>vaqtincha yashovchi fuqarolarini </span>ro`yxatga olish uchun shaxsiy ma'lumotlarni kiritish</h2>
            <br/>
     <div id="wrapper1">

   <form id="formElem" name="formElem" action="" method="post">  
 <input type="radio" checked="checked" name="tab" id="tab-1"/>  
 <label for="tab-1" id="tab-label-1">Asosiy ma`lumotlar</label>    
 <input type="radio" name="tab" id="tab-2"/>
<label for="tab-2" id="tab-label-2">Pasport ma`lumotlari</label>
<input type="radio" name="tab" id="tab-3"/>
<label for="tab-3" id="tab-label-3">Tug`ilgan joyi</label>
<input type="radio" name="tab" id="tab-4"/>
<label for="tab-4" id="tab-label-4">O`zbekistonda yashash joyi </label>
<input type="radio" name="tab" id="tab-5"/>
<label for="tab-5" id="tab-label-5">Qoshimcha ma`lumotlar </label>

<div class="content-article">

 <div class="block2" >
<fieldset>
<article   class="tab-1" > <?php include "vku/vku1.php"; ?> </article>

<article  class="tab-2"> <?php include "vku/vku3.php"; ?></article>

<article  class="tab-3"> <?php include "vku/vku2.php"; ?></article>

<article  class="tab-4"> <?php include "vku/vku4.php"; ?></article>

<article  class="tab-5"> <?php include "vku/vku5.php"; ?>


  <div class="Yuklash"><span>Pasport  nushasi&nbsp&nbsp&nbsp&nbsp&nbsp</span>
  <div class="Copy_Pas">
  <label>&nbsp&nbspYuklash...
<input type="file" name="fileToUpload2" id="files">
</label>
 </div>
</div>

<div class="Yuklash1"><span>Kelgan mamlakatda roy`hatdan o`tganlik haqida ma`lumot nushasi</span>
 <div class="Copy_Mal">
   <label>&nbsp&nbsp&nbsp&nbspYuklash...
<input type="file" name="fileToUpload3" id="files1">
</label>
</div>
</div>
   
<br/>
   <div id="viewfile1">  </div>    
   <div id="viewfile2">  </div>    
</div>
<br /><br />

</article>



  </fieldset>   
    <br/>      
 

<div class="block3">
			<div class="block1" id="photofile"> </div>
     <div class="photo">
     <div>Surat...</div>
    <input  size="1" class="fileupl" type="file" name="fileToUpload1" id="fileToUpload" value="#"/>  
    </div>
  <div><input id="fileup" name="fileup" type="hidden" value="  "></div>
         </div>
 
<br /><br />
<br /><br />
<br /><br />
<!--
<div class="Yuklash"><span>Pasport  nushasi&nbsp&nbsp&nbsp&nbsp&nbsp</span>
  <div class="Copy_Pas">
  <label>&nbsp&nbspYuklash...
<input type="file" name="fileToUpload[]" id="files">
</label>
 </div>
</div>
	   
<div class="Yuklash1"><span>Kelgan mamlakatda roy`hatdan o`tganlik haqida ma`lumot nushasi</span>
 <div class="Copy_Mal">
   <label>&nbsp&nbsp&nbsp&nbspYuklash...
<input type="file" name="fileToUpload[]" id="files1">
</label>
</div>
</div>
   
<br/>
   <div id="viewfile1">  </div>    
   <div id="viewfile2">  </div>    
</div>-->
<br /><br />
 

 <div class="chck" >
 <div id="captcha">
  <input type="checkbox" id="c1" name="captcha" />
 <label for="c1"><span class="class_span"></span> - Men, robot emasman</label>	
 </div>
   <div class="question_answer">
<button id="registerButton2" type="submit" >So`rovnomani jo`natish (Chop etish)</button>
 </div>
 
                     <div id="anketa_res">
                      <br/>
                     <br/>
     <p >
  So`rovnomaga javobni ko`rish uchun <span> ID(>= 10 ta simvol)</span>ni kiriting
      </p> 
                    <input id='anketa'   name='anketa'  maxlength='32' 
                    <p >
 <a id="usl_o" class="btn1 " >Ok</a>
</p> 
                    </div>
 </div> <!--class="chck"-->
  </div><!--content-article-->
     <input id="result" name="result"/> 
</form>

</div><!--wrapper1-->

<div id="rating"><div id="baho"></div>
<div><div class="stars"></div><p class="progress" id="p1"></p></div>
<div class="rating" id="param1">0.0</div>
<p >
 <a id="usl_2" class="btn " >Baholash</a>
</p>
<!--<div id="comments">
<p >
 <a href="comments.php" target="_blank">Izoh qoldirish</a>
</p>
</div>-->
<br />
</div> 
<br/><br/>

<img id="loadImg" src="images/loading.gif" />


<div class="popup_overlay"></div>        <!--GIF animatsia uchun-->
<div class="popup">
  <div class="popup_title">
    So`rov natijasi <span class="closer">X</span>
  </div>
  <div class="popup_content">
    <p id="z_id"></p>
    <p id="javob"> </p>
    <div align="center">
    <button class="but" ><span>Tahrirlash</span></button>
    </div>
    
   </div>
</div>

  <?php
      	$sql= mysql_query("SELECT COUNT(id) as cc from comments where moder =1");
         $arr = mysql_fetch_array($sql); 
          echo '<header>Foydalanuvchilarning izohlari: <span>'.$arr['cc'].' ta</span></header>';

     echo '<div class="comments">';     
       $select = mysql_query("SELECT  id,nomi,text_com,sana  FROM comments where moder =1 order by sana  DESC")   or die(mysql_error());
         while(list($id,$nomi,$text_com,$sana) = mysql_fetch_row($select))
       {
       echo '<div class="comm_head">';      	
       echo '<div class="comm_name">'.$nomi.'</div>';      	
       echo '<div class="comm_date">'.$sana.'</div>';
       echo '</div>';
       echo '<div class="comm_body">'; 
       echo '<div class="comm_text">'.$text_com.'</div>';
       echo '</div>';
       }
      echo '</div>'; 
 ?>

 <p id="RO_eslat">Izoh qoldirish</p>
  <div class="add_comm">
Izoh qoldirish:
<textarea rows="10" cols="68" name="user_text"  ></textarea>
<div class="c_right">
<input  type="button" id="comm_send"  value="Jo`natish"></div>
</div>
<p id="eslat">Sizning barcha izohlaringiz moderatsiyadan o`tadi.</p>
<div id='htmlTarget'> **** </div>

   <script type="text/javascript">
  $(document).ready(function($)
   {
   	 	$('.add_comm').hide();
   	$('#eslat').hide();
   	
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
   
  $('#fileToUpload').val('');
    
    	$("#formElem").keypress(function(e) {   
      	if(e.keyCode ==13) {
      		e.preventDefault();
       		return false;}
    });
  $("#fam,#famk,#sharifk,#ism,#ismk,#sharif,#tugkun,#oblast,#rayon1,#seriya,#nomer,#vidanDay,#muddatDay, #kem,#home,#korpus,#flat,#adress_uz,#kelDay,#vr_adress,#asos").val('');
  $("#nation").val('44');
  $("#jins").val('1');
  $("#strana").val('182');
  $("#oila,#oblast,#rayon1,#rayon2,#selectPlaces,#selectStreet,#elchixona,#doc_div").val('0');
  $("#for_strana").val('-1');
  $("#doc_tip").val('46');
   $("#oblast2").val('10');
    $("#oblast ").removeAttr("disabled");
    $("#rayon1").removeAttr("disabled"); 
  
   $("#tugkun").mask("99.99.9999", {placeholder: "kk.oo.yyyy" });
   $("#vidanDay").mask("99.99.9999", {placeholder: "kk.oo.yyyy" });
   $("#muddatDay").mask("99.99.9999", {placeholder: "kk.oo.yyyy" });
   $("#kelDay").mask("99.99.9999", {placeholder: "kk.oo.yyyy" });
 
 $("#result").val('');
 
     $('#tugkun,#kelDay,#vidanDay,#muddatDay').blur(function() {
     	var id = $(this).attr('id');
        var val = $(this).val();
        proverka_date(id,val);
    });
      //     
     $('input#fam,input#ism,input#adress_uz,input#vr_adress,input#seriya,input#nomer,input#asos').unbind().blur( function(){
         var id = $(this).attr('id');
         var val = $(this).val();
           switch(id)
       {
         case 'fam':
         case 'ism':
         case 'adress_uz':
         case 'vr_adress':
         case 'seriya':
         case 'nomer':
         case 'asos':
          if(val != '')
          {
            $(this).removeClass('error').addClass('not_error');
          //   $(this).css('background-color','#FFFFFF');
           }
          else
                {   
                   $(this).removeClass('not_error').addClass('error');
               //     $(this).css('background-color','#FFEFEF');
                }
       } // end switch(...)
     });
     //
       $('#oblast,#rayon2,#for_strana,#elchixona').blur(function() {
     	var id = $(this).attr('id');
        var val = $(this).val();
        proverka_spisok(id,val);   
    });
   
$('#htmlTarget').hide();
$('#result').hide();
//$('#anketa_res').hide();
$('#registerButton2').attr('disabled', true);
  
          var otzivi_files;
    var otzivi_files_tmp = [];
	function prepareUpload(event)
	{
	otzivi_files = event.target.files;
        // обновление общего массива файлов
        $(otzivi_files).each(function(){
        	otzivi_files_tmp = otzivi_files_tmp.concat(this);
        });
        // перерисовка списка после выбора дополнительных файлов
        $(function (){
			repaint_uplod_items();
        });
	}
  //
       function check_ext(filename)
      {
           var ext = filename.split(".").pop();
  	if((ext == "jpg")||(ext =="jpeg")||(ext == "png"))
  	    return true
  	    else
  	    {
	 	MyAlert('Fayl formati JPG yo`ki  PHG bo`lishi shart!', 'Xato');
	 	   return false;	
	 }
    	}
  //
      function prepareUploadPhoto(event)
      {
  	photo_file = event.target.files[0];
  	if(!check_ext(photo_file.name))
  	  return;
    	var photofile = $('#photofile');
  	$(photofile).html('');
       var tableP = '<table  align="center"  border = "0" cellspacing = "0" cellpadding = "0">';
        		  try{
				img_srcP = window.URL.createObjectURL(photo_file);
			} catch(e) {}
			
	       tableP += '<tr>';	
               tableP += '<td>';
			tableP += '<div >';
		if('undefined' != typeof img_srcP)
		 tableP += '<img src="'+img_srcP+'" width="100" alt="" border="0" />';
			tableP += '</div>';
		   tableP += '</td>';	
		   tableP += '</tr>';
			if('undefined' != typeof img_srcP) img_srcP.onload = function(){window.URL.revokeObjectURL(img_srcP);} 
		tableP += '</table>';
		
		$(photofile).html(tableP);  
  }
	$('#fileToUpload').on('change', prepareUploadPhoto);
	
 function prepareUploadCopyPas(event)
      {
  	copy_pas_file = event.target.files[0];
  		if(!check_ext(copy_pas_file.name))
  	                            return;
  	var copypasfile = $('#viewfile1');
  	$(copypasfile).html('');
       var tableP = '<table  align="center"  width="200"  border = "0" cellspacing = "0" cellpadding = "0">';
        		  try{
				img_srcP = window.URL.createObjectURL(copy_pas_file);
			} catch(e) {}
			
	       tableP += '<tr>';	
               tableP += '<td>';
			tableP += '<div >';
		if('undefined' != typeof img_srcP)
		 tableP += '<img src="'+img_srcP+'" width="200" alt="" border="0" />';
			tableP += '</div>';
		   tableP += '</td>';	
		   tableP += '</tr>';
			if('undefined' != typeof img_srcP) img_srcP.onload = function(){window.URL.revokeObjectURL(img_srcP);} 
		tableP += '</table>';
		
		$(copypasfile).html(tableP);  
  }
	$('#files').on('change', prepareUploadCopyPas);

function prepareUploadCopyMal(event)
      {
  	copy_mal_file = event.target.files[0];
  	if(!check_ext(copy_mal_file.name))
  	                            return;
  	var copymalfile = $('#viewfile2');
  	$(copymalfile).html('');
       var tableP = '<table  align="center"  width="350"  border = "0" cellspacing = "0" cellpadding = "0">';
        		  try{
				img_srcP = window.URL.createObjectURL(copy_mal_file);
			} catch(e) {
				return;
			}
			
	       tableP += '<tr>';	
               tableP += '<td>';
			tableP += '<div >';
		if('undefined' != typeof img_srcP)
		 tableP += '<img src="'+img_srcP+'" width="200" alt="" border="0" />';
			tableP += '</div>';
		   tableP += '</td>';
		   tableP += '<td width="150" align="center" " valign="middle" ><a class="del_uplod_image" href="#">Olib tashlash</a></td>';
		   tableP += '</tr>';
			if('undefined' != typeof img_srcP) img_srcP.onload = function(){window.URL.revokeObjectURL(img_srcP);} 
		tableP += '</table>';
		
		$(copymalfile).html(tableP);  
  }
   
      $('#files1').on('change', prepareUploadCopyMal);

	function repaint_uplod_items()
	{
		var viewfile2 = $('#viewfile2');
		$(viewfile2).html('');

		// формируем визуальную таблицу из массива файлов
		var table = '<table class="ttt" align="center"  border = "0" cellspacing = "0" cellpadding = "0">';
		for (var i=0; i < otzivi_files_tmp.length; i++) {

			// устанавливаем ссылку на текущий объект
			var this_obj = otzivi_files_tmp[i];

			// получаем ссылку на картинку для использования в img src
			try{
				img_src = window.URL.createObjectURL(this_obj);
			} catch(e) {}

	       table += '<tr>';
		   table += '<td width="50%">';
			table += '<div class="image_thummb">';
			if('undefined' != typeof img_src) table += '<img src="'+img_src+'" width="300" alt="" border="0" />';
			table += '</div>';
		   table += '</td>';
			table += '<td align="center " valign="middle"  width="30%"  >'+this_obj.name+'<br />'+kilob(this_obj.size)+' </td>';
			table += '<td width="20%" valign="middle" ><a class="del_uplod_image" href="#'+i+'">Olib tashlash</a></td>';
	        table += '</tr>';
			if('undefined' != typeof img_src) img_src.onload = function(){window.URL.revokeObjectURL(img_src);} // освобождаем память выделенную под картинку

		}
		table += '</table>';
						
		$(fileList).html(table); // выгружаем в контейнер созданную визуальную таблицу
	}

	$('body').on('click', 'a.del_uplod_image', function(){
   		$(this).parent().parent().fadeOut(function(){ $('#viewfile2').html("")});
   		$('#files1').val('');
		return(false);
	});
  
     
 var options = {
		type: "POST",
		beforeSerialize: beforeSerialize,
		beforeSubmit:  showRequest,
		success: showResponse,
		url:  "VKU/upVku.php"
	              };

	$('#formElem').submit(function() {
         	$('#formElem').ajaxSubmit(options);
  	return false;
   	});
 
       // 
        function beforeSerialize($form, options) {
     	      var val = $('#doc_div').val();
     	      var val1 = $('#kem').val();
     	 if((val > 0)||(val1.length >0)) 
     	 {
     	           $('#doc_div' ).removeClass('error').addClass('not_error'); 
     	           $('#kem' ).removeClass('error').addClass('not_error'); 
     	 }
     	           else
  	           	 {
     	           $('#doc_div' ).removeClass('not_error').addClass('error'); 
     	           $('#kem' ).removeClass('not_error').addClass('error'); 
     	                    }
  	 return true;
}
        // До отправки
        function showRequest(formData, jqForm, options) { 
    //    var queryString = $.param(formData);	alert(queryString); 
         if($('input#fileToUpload').val() == '')
	 {  
	MyAlert('Fotoni yuklash shart!', 'Xato');
	return false;	
	}
       if($('input#files').val() == '')
	 {  
	MyAlert('Passport nushasini yuklash shart!', 'Xato');
	return false;	
	}
	
	 if($('.error').length > 0)
        {
            MyAlert( $('.error').length+ ' ta joyda xato bor!','Xabarnoma');
		  return false;
          }
           else
{
     $('#registerButton2').attr('disabled', true);
      startLoadingAnimation();
    	     return true;
    	     }
        }  
  
       //После получения ответа
       function showResponse(res)
       {
             stopLoadingAnimation();
   //    
       $('.class_span').css({ 'background-image': 'none' });
       $('#registerButton2').attr('disabled', true);
        if(res == -1)
        {
          MyAlert('Robot emasligingizni tasdiqlang!','Xato');
          return;
          }
        if(res == -2)
        {
        MyAlert('Robot emasligingizni qaytadan tasdiqlang!','Xato');
          return;	
	}
	    if(res == -3)
        {
        MyAlert('Bazaga yozishda xato!','Ma`lumot');
          return;	
	}
	
        if(window.open(res, '_blank') == null)
        {
      MyAlert("Sizning Internet browser da ko`rish imkoniyati berkitilgan. \nFaqat yuklash mumkin!","Xabarnoma");
            var name = res.substring(res.lastIndexOf('/')+1,res.length);
            window.location.href ="download.php?download_file="+ name; 
     // window.location.assign(window.location.pathname+name);
          }
  }
 //
 
 $('#c1').click(function(e){ 
    $('#c1').is(':checked') ? true : false;
    if($("#c1").is(':checked')) 
 {
  var fam =  $('#fam').val();
  var ism =  $('#ism').val();
   if((fam=='')||(ism==''))    return;
      $('.class_span').css({'background-image':'url(/uz/images/ajax-loader_snake_20.gif) ', 'backgroundRepeat': 'no-repeat'});
    $('#registerButton2').attr('disabled', true);
    $.post('/uz/generator.php',{a: fam,b: ism},function(data){
      	$('#result').val(data);
        $('.class_span').css({'background-image':'url(/uz/images/s3.png) ', 'backgroundRepeat': 'no-repeat'});  	
        $('#registerButton2').attr('disabled', false);
      	});
    }
   else 
   {
       $('.class_span').css({ 'background-image': 'none' });
       $('#registerButton2').attr('disabled', true);
       }
 })

//
//Javob olish
    $('#usl_o').click(function(){  
      	$z_id = $('#anketa').val();
        $a = "name="+ $z_id; 
   if(($z_id != '') && ($z_id.length>=10))
   {  
   	startLoadingAnimation(); 
    $.get("VKU/otvet.php",$a,function(data1)
    {
         var sk = data1.substring(0,1); 
         stopLoadingAnimation();  
         if(sk == '7')
         {
            $link = data1.substring(1);
    if(window.open($link, '_blank') == null)
        {
      MyAlert("Sizning Internet browser da ko`rish imkoniyati berkitilgan. \nFaqat yuklash mumkin!","Xabarnoma");
            //var name = "downloads/"+$link.substring($link.lastIndexOf('/')+1,$link.length);
           //window.location.assign(window.location.pathname+name); 
            var name = $link.substring($link.lastIndexOf('/')+1,$link.length);
            window.location.href ="download.php?download_file="+ name; 
          }
          }
    else
      if((sk=='6')||(sk=='0')||(sk=='9'))
      { 
      	
          if(($('#fam').val() == '')&&($('#fileToUpload').val() == ''))
            if(sk=='6')
  	      $('.but').show();
         $n=data1.indexOf('#');
   	 $s=data1.substring($n+1);
         $("#javob").html($s);
    $('.popup,.popup_overlay').fadeIn(400); 
    $('.closer,.popup_overlay,.but').click(function(){ $('.popup,.popup_overlay').fadeOut(400); })
           }	
       
    });
 }
 });
 //
   $('.but').click(function()
   {
   	$z_id = $('#anketa').val();
        $a = "id="+ $z_id; 
        startLoadingAnimation(); 
    $.get("VKU/edit.php",$a,function(d)
    {
    $('#fam').val(d["surname_latin"]);	   
           $('#fam').removeClass('error').addClass('not_error');
    $('#ism').val(d["name_latin"]);	
         $('#ism').removeClass('error').addClass('not_error');
    $('#sharif').val(d["patronym_latin"]);	
   $('#famk').val(d["surname_cyrillic"]);	
    $('#ismk').val(d["name_cyrillic"]);	
    $('#sharifk').val(d["patronym_cyrillic"]);
    $('#nation').val(d["nationality_id"]);
      $('#tugkun').val(Converter_Date(d["birth_date"]));
         $('#tugkun').removeClass('error').addClass('not_error');
    $('#jins').val(d["sex_id"]);
     $('#oila').val(d["marital_status_id"]);

    $('#doc_tip').val(d["document_type_id"]);
     $('#seriya').val(d["doc_seria"]);
      $('#seriya').removeClass('error').addClass('not_error');
     $('#nomer').val(d["doc_number"]);
      $('#nomer').removeClass('error').addClass('not_error');
      $('#vidanDay').val(Converter_Date(d["date_begin_document"]));
       $('#vidanDay').removeClass('error').addClass('not_error');
     $('#muddatDay').val(Converter_Date(d["date_end_document"]));
      $('#muddatDay').removeClass('error').addClass('not_error');
     $('#doc_div').val(d["document_div_id"]);
      $('#doc_div').removeClass('error').addClass('not_error');
       $('#kem').val(d["document_div_place"]);
       
       $('#strana').val(d["birth_country_id"]);
       $('#oblast').val(d["birth_region_id"]);
       $('#oblast').removeClass('error').addClass('not_error');
       $('#rayon1').val(d["birth_district_id"]);
       
       $('#oblast2').val(d["living_region_id"]);
    $('#oblast2').click();
          $('#rayon2').val(d["living_district_id"]);
        if($('#rayon2').val() != null)
             $('#rayon2').removeClass('error').addClass('not_error');
         $('#selectPlaces').val(d["living_place_id"]);
           $('#selectPlaces').val(d["living_place_id"]);
             $('#selectStreet').val(d["living_street_id"]);
            $('#home').val(d["living_house"]);
             $('#korpus').val(d["living_block"]);
              $('#flat').val(d["living_flat"]);  
         $('#adress_uz').val(d["living_uzb_place"]);  
         $('#adress_uz').removeClass('error').addClass('not_error');
         
         $('#for_strana').val(d["living_foreign_country_id"]);  
          $('#for_strana').removeClass('error').addClass('not_error');
         $('#kelDay').val(Converter_Date(d["arrival_date"]));  
          $('#kelDay').removeClass('error').addClass('not_error');
         $('#asos').val(d["foundation_cons_acc"]);  
             $('#asos').removeClass('error').addClass('not_error');
         $('#job').val(d["work_place"]);  
         $('#vr_adress').val(d["living_foreign_place"]);  
             $('#vr_adress').removeClass('error').addClass('not_error');
         $('#elchixona').val(d["division_id"]);  
          $('#elchixona').removeClass('error').addClass('not_error');
         
         stopLoadingAnimation();  	
    });
   	})  
   	//
   function Converter_Date(date) // date в формате дд.мм.гггг
{
    var year = date.substring(0,4);
    var month = (date.substring(5)).substring(0,2);
    var day = (date.substring(8)).substring(0,2);
      return  day+'.'+ month+'.'+year;
}
//////
 function move(e, obj){
    var summ=0;
 //   var id = obj.next().attr('id').substr(1);
    var progress = e.pageX - obj.offset().left; 
    var rating = progress * 5 / $('.stars').width();
    $('#param1').text(rating.toFixed(1));
    obj.next().width(progress);
  //  $('.rating').each(function(){ summ += parseFloat($(this).text()); });
 //   summ = summ / $('.rating').length;
  //  $('#sum_progress').width(Math.round($('.stars').width() * summ / 5));
  //  $('#summ').text(summ.toFixed(2));
 }

 $('#rating .stars').click(function(e){
    $(this).toggleClass('fixed');
    move(e, $(this));
 });

$('#RO_eslat').click(function(e){
	  if($('#ses_name').val()=='')
	  MyAlert("Ro`yxatdan o`tgan foydalanuvchilarga izoh qoldirish ruxsat etiladi!","Eslatma");
          // else
	  //   window.open('comments/comments.php', '_blank');
	   });
$('#comm_send').click(function(e){
	var text = $('.add_comm textarea').val();
	if(text == '')
		return false;
	$.ajax({
		type: "POST",
		beforeSend:  startLoadingAnimation(),
		data: 'nomi='+$('#ses_name').val()+'&text='+text,
		url:  "/uz/writeComment.php",
		success: function(e){
			stopLoadingAnimation();
			MyAlert('Sizning izohingiz  jo`natildi.','Ma`lumotnoma');
			$('.add_comm textarea').val('');
			}
                  });
	});

 $('#rating .stars').mousemove(function(e){ 
    if ($(this).hasClass('fixed')==false) 
       move(e, $(this));
    
 });

 $('#usl_2').click(function(){ 
    summ = parseFloat($('#param1').text());
    jQuery.post('change_rating.php', {
        usl_id: "usl_2",
        rating: summ
    }, notice);
 });

function startLoadingAnimation() // - функция запуска анимации
{
 var imgObj = $("#loadImg");
  imgObj.show();
   // вычислим в какие координаты нужно поместить изображение загрузки,
  // чтобы оно оказалось в серидине страницы:
  var centerY = $(window).scrollTop() + ($(window).height() + imgObj.height())/2;
  var centerX = $(window).scrollLeft() + ($(window).width() + imgObj.width())/2;
   // поменяем координаты изображения на нужные:
  imgObj.offset({top:centerY, left:centerX});
}
function stopLoadingAnimation() // - функция останавливающая анимацию
{
  $("#loadImg").hide();
}


   function notice(text){
    MyAlert(text,'Natija');
   // $('#message').fadeOut(200, function(){ $(this).text(text); }).fadeIn(200);
 }   
//
  });  
   </script>
   
 </body>

</html>
