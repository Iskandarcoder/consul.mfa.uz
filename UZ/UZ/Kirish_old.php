<?php include_once("db.php"); ?>	
<!DOCTYPE HTML >
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;  charset=utf-8">
		<title>Kirish va ro`yxatga turish</title>
		 <link rel="stylesheet" href="css/loginreset.css"/>
    	         <link href="css/loginstyle.css" rel="stylesheet" />
    	         
            <link rel="stylesheet" type="text/css" href="css/jquery-ui.structure.css"/>
            <link rel="stylesheet" type="text/css" href="css/jquery-ui.css"/>
           <link rel="stylesheet" type="text/css" href="css/jquery-ui.theme.css"/>
        
    	          <script type="text/javascript" src="js/jquery.js"></script>
    	          <script type="text/javascript" src="js/jquery.form.js"></script>
    	          <script type="text/javascript" src="js/jquery-ui.js"></script>
    	           <script type="text/javascript" src="js/functiyalar.js"></script>
	</head>

<body>
<div id="dialog" class='ui-dialog'></div>
<div class="user-modal"> <!-- все формы на фоне затемнения-->
<!-- основной контейнер -->
   <div class="user-modal-container"> 
   <ul class="switcher">
	    <li><a href="#0">Kirish</a></li>
	    <li><a href="#0">Ro`yxatga turish</a></li>
	</ul>
   <!-- форма входа -->
	<div id="login">     
				<form class="userform" id="login-form">
					<p class="fieldset">
						<label class="image-replace username" for="signin-nomi">Nomi</label>
						<input class="full-width has-padding has-border has-error" id="signin-nomi" type="text" placeholder="Login">
						<span class="error-message"></span>
					</p>
                  	         <p class="fieldset">
						<label class="image-replace password" for="signin-password">Password</label>
						<input class="full-width has-padding has-border has-error" id="signin-password" type="password"  placeholder="Password">
						<a href="#0" class="hide-password">Ko`rsatish</a>
						<span class="error-message"></span>
			         </p>

				<!--	<p class="fieldset">
						<input type="checkbox" id="remember-me" checked>
						<label for="remember-me">Meni eslab qolish</label>
					</p>-->

					<p class="fieldset">
						<input class="ffull-width" type="submit" value="OK">
					</p>
				</form>
	<!--        	<p class="cd-form-bottom-message"><a href="#0">Password esdan chiqdimi?</a></p>-->
				<!-- <a href="#0" class="cd-close-form">Close</a> -->
	</div> <!-- login -->
	 <!-- форма регистрации -->
		<div id="signup">
				<form class="userform" id="signup-form">
					<p class="fieldset">
						<label class="image-replace username" for="signup-username">Nomi</label>
		<input class="full-width has-padding has-border has-error" id="signup-username"  maxlength="20"  "text" placeholder="Login">
						<span class="error-message"></span>
					</p>
                                             <p class="fieldset">
						<label class="image-replace password" for="signup-password">Password</label>
						<input class="full-width has-padding has-border has-error" id="signup-password" type="text"  placeholder="Password">
						<!--<a href="#0" class="hide-password">Berkitish</a>-->
						<span class="error-message"></span>
					</p>
					         <p class="fieldset">
						<label class="image-replace password" for="signup-password">Passwordni tasdiqlash</label>
						<input class="full-width has-padding has-border has-error" id="verif-password" type="text"  placeholder="Passwordni tasdiqlash">
						<span class="error-message"></span>
					</p>
					<p class="fieldset">
						<label class="image-replace email" for="signup-email">E-mail</label>
						<input class="full-width has-padding has-border " id="signup-email"    type="text" placeholder="E-mail"  >
						<span class="error-message">Pochta adresida xato bor!</span>
					</p>
			                   <p class="fieldset">
						<label class="image-replace username" for="signup-ism">Ism</label>
			<input class="full-width has-padding has-border has-error" id="signup-ism" maxlength="20"  type="text" placeholder="Ism">
						<span class="error-message"></span>
					</p>
								<p class="fieldset">
						<label class="image-replace username" for="signup-fam">Familiya</label>
			<input class="full-width has-padding has-border has-error" id="signup-fam" maxlength="20"  type="text" placeholder="Familiya">
						<span class="error-message"></span>
					</p>
					

					<!--<p class="fieldset">
						<input type="checkbox" id="accept-terms">
						<label for="accept-terms">Я согласен с <a href="#0">Условиями</a></label>
					</p>-->

					<p class="fieldset">
						<input class="ffull-width has-padding" type="submit" value="OK">
					</p>
				</form>
				<!-- <a href="#0" class="close-form">Close</a>-->
			</div> <!-- signup -->
<!-- форма восстановления пароля -->
			<div id="reset-password"> 
	<p class="cd-form-message">Забыли пароль? Пожалуйста, введите адрес своей электронной почты. Вы получите ссылку, чтобы создать новый пароль.</p>
	             <form class="userform">
					<p class="fieldset">
						<label class="image-replace email" for="reset-email">E-mail</label>
						<input class="full-width has-padding has-border" id="reset-email" type="email" placeholder="E-mail">
						<span class="error-message">Здесь сообщение об ошибке!</span>
					</p>

					<p class="fieldset">
						<input class="full-width has-padding" type="submit" value="Восстановить пароль">
					</p>
				</form>

				<p class="userform-bottom-message"><a href="#0">Вернуться к входу</a></p>
			</div> <!-- reset-password -->
			<a href="#0" class="close-form">Yopish</a>
</div> <!-- user-modal-container -->
</div> <!-- user-modal -->	
<img id="loadImg" src="images/loading.gif" />
	
<?php
/*if(empty($login) and empty($password)){*/
?>

<script type="text/javascript">
       $(document).ready(function($)
   {  
	 $form_modal = $('.user-modal');
		$form_login = $form_modal.find('#login');
		$form_signup = $form_modal.find('#signup');
		$form_forgot_password = $form_modal.find('#reset-password');
		$form_modal_tab = $('.switcher');
		$tab_login = $form_modal_tab.children('li').eq(0).children('a');
		$tab_signup = $form_modal_tab.children('li').eq(1).children('a');
		$forgot_password_link = $form_login.find('.userform-bottom-message a');
		$back_to_login_link = $form_forgot_password.find('.userform-bottom-message a');
		$login_form = $('#login-form input[type=submit]'); 
                 $signup_form = $('#signup-form input[type=submit]'); 
                         	 $signup_form.keypress(function(e) {   
      	                      if(e.keyCode ==13) {
      		                e.preventDefault();
       		                      return false;}
                                    });
              var loginname = $('input#signin-nomi');                      
              var lpassword = $('input#signin-password');  
                                    
             var username = $('input#signup-username');                             
             var ism = $('input#signup-ism'); 
             var fam = $('input#signup-fam');  
            var spassword = $('input#signup-password');           
            var vpassword = $('input#verif-password');                           
	    var email = $('input#signup-email'); 
              
                       $form_modal.addClass('is-visible');	
                       login_selected();
///////
//Форма входа
 $login_form.click( function(){
	$.ajax({
		type: "POST",
		beforeSend:  login_showRequest,
		data: 'nomi='+loginname.val()+'&pas='+lpassword.val(),
		success: login_showResponse,
		url:  "login.php"
	              });
  	});

  function login_showRequest() { 
  var key = 0;
      if(!proverka_text(loginname))   key = -1;
      if(!proverka_password(lpassword))   key = -1;
       if(key == -1) return false;
       startLoadingAnimation();
      $login_form.attr('disabled',true);
       	     return true;  
      }

 //После получения ответа
       function login_showResponse(res){
             stopLoadingAnimation();
             $login_form.attr('disabled',false);   
      if(res == -1)
        {  
           MyAlert('Siz kiritgan ma`lumotlar noto`ri!','Xato');
          return;
          }
	    if(res == 0)
                window.history.back();
     	   	  return true;
  } 
 /////// 
  //Форма регистрации		
 $signup_form.click( function(){
	$.ajax({
		type: "POST",
		beforeSend:  showRequest,
		data: 'nomi='+username.val()+'&pas='+spassword.val()+'&email='+email.val()+'&ism='+ism.val()+'&fam='+fam.val(),
		success: showResponse,
		url:  "registration.php"
	              });
  	});

      function showRequest() { 
  var key = 0;
      if(!proverka_text(username))   key = -1;
      if(!proverka_text(ism))  key = -1;
      if(!proverka_text(fam))  key = -1;

      if(!proverka_password(spassword))  key = -1;
      if(!proverka_password(vpassword))  key = -1;

             if(spassword.val() != vpassword.val()) 
             {
	       vpassword.next('span').html('Passwordni tog`ri  kiriting!').addClass('is-visible');
	       vpassword.removeClass('not_error').addClass('has-error');
	       return false;
	 }
	 else
	 {
	     vpassword.next('span').removeClass('is-visible');
	     vpassword.removeClass('has_error').addClass('not-error');	 
	}

	if(email.val() !='')
	       email.attr('type','email');
	       else
	       {
	       email.attr('type','text');
	       email.next('span').removeClass('is-visible');
               }	       
                 if(key == -1) return false;      
                 
     startLoadingAnimation();
      $signup_form.attr('disabled',true);
       	     return true;  	
  }

 //После получения ответа
       function showResponse(res){
             stopLoadingAnimation();
             $signup_form.attr('disabled',false);   
      if(res == -1)
        {  
           MyAlert('Bu Login bilan foydalanuvchi ro`yxatda bor!','Xato');
          return;
          }
        if(res == -2)
        {
        MyAlert('Bu Email bilan foydalanuvchi ro`yxatda bor!','Xato');
          return;	
	}
	    if(res == 0)
                 MyAlert('Siz ro`yxatdan o`tdingiz!','Ma`lumot');
	           window.history.back();
  	   	  return true;
  } 
//////  
  function proverka_text(id_pole_text)
  {
	     if(id_pole_text.val() == '')
	 {   
                id_pole_text.next('span').html('Bu joyga kiritilish shart!').addClass('is-visible');
	       id_pole_text.removeClass('not_error').addClass('has-error');	
	return false;	
	}
	else
	   {
	 	  var pp = /^[а-яА-ЯёЁa-zA-Z][а-яА-ЯёЁa-zA-Z0-9-_\.]{1,20}$/;
	 	   if(!pp.test(id_pole_text.val()))
                     {
		 	id_pole_text.next('span').html('Birinchisi harf, qolganlari harf,raqam va chiziqcha bo`lishi mumkin!').addClass('is-visible');
	                 id_pole_text.removeClass('not_error').addClass('has-error');	
	                 return false;
		  }       
		  else
		  {
  	                 id_pole_text.next('span').removeClass('is-visible');
	                id_pole_text.removeClass('has_error').addClass('not-error');	   
	                 return true;
	           }
	 }
   }       
  function proverka_password(id_pole_password)
  {
	     if(id_pole_password.val() == '')
	 {   
                id_pole_password.next('span').html('Password kiritilishi shart!').addClass('is-visible');
	       id_pole_password.removeClass('not_error').addClass('has-error');	
	return false;	
	}
	else
	   {
	 	//  var pp = /(?=^.{6,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/;
	 	   if(id_pole_password.val().length<6)
                     {
		 	id_pole_password.next('span').html('5 ta simvoldan ko`p bo`lishi shart !').addClass('is-visible');
	                 id_pole_password.removeClass('not_error').addClass('has-error');	
	                 return false;
		  }       
		  else
		  {
  	                 id_pole_password.next('span').removeClass('is-visible');
	                id_pole_password.removeClass('has_error').addClass('not-error');	   
	                 return true;
	           }
	 }
   }        
                //Закрыть модальное окно    нажатье  Х    		
			$('.user-modal').on('click', function(event){
		if( $(event.target).is($form_modal) || $(event.target).is('.close-form') ) {
			//$form_modal.removeClass('is-visible');
			window.history.back();
		}	
	});
	     //закрыть модальное окно нажатье клавиши Esc 
	$(document).keyup(function(event){
    	if(event.which=='27'){
    		window.history.back();
	    }
    });
    	//переключения  вкладки от одной к другой
	$form_modal_tab.on('click', function(event) {
		event.preventDefault();
		( $(event.target).is( $tab_login ) ) ? login_selected() : signup_selected();
	});

	//скрыть или показать пароль
	$('.hide-password').on('click', function(){  
		var $this= $(this),
			$password_field = $this.prev('input');
		( 'password' == $password_field.attr('type') ) ? $password_field.attr('type', 'text') : $password_field.attr('type', 'password');
		( 'Berkitish' == $this.text() ) ? $this.text('Ko`rsatish') : $this.text('Berkitish');
		//фокус и перемещение курсора в конец поля ввода
		//$password_field.putCursorAtEnd();
	});

	//показать форму востановления пароля 
	$forgot_password_link.on('click', function(event){
		event.preventDefault();
		forgot_password_selected();
	});

	//Вернуться на страницу входа с формы востановления пароля
	$back_to_login_link.on('click', function(event){
		event.preventDefault();
		login_selected();
	});

         function login_selected(){
		$form_login.addClass('is-selected');
		$form_signup.removeClass('is-selected');
		$form_forgot_password.removeClass('is-selected');
		$tab_login.addClass('selected');
		$tab_signup.removeClass('selected');
	}	
	function signup_selected(){
		$form_login.removeClass('is-selected');
		$form_signup.addClass('is-selected');
		$form_forgot_password.removeClass('is-selected');
		$tab_login.removeClass('selected');
		$tab_signup.addClass('selected');
	}
	function forgot_password_selected(){
		$form_login.removeClass('is-selected');
		$form_signup.removeClass('is-selected');
		$form_forgot_password.addClass('is-selected');
	}

 function startLoadingAnimation() 
{
 var imgObj = $("#loadImg");
  var centerY = $(window).scrollTop() + ($(window).height() + imgObj.height())/2;
  var centerX = $(window).scrollLeft() + ($(window).width() + imgObj.width())/2;
  imgObj.offset({top:centerY, left:centerX});
    imgObj.show();
}
function stopLoadingAnimation() 
{
  $("#loadImg").hide();
}
  
   
		//при желании можно отключить - это просто, сообщения об ошибках при заполнении
	$form_login.find('input[type="submit"]').on('click', function(event){
		event.preventDefault();
		$form_login.find('input[type="email"]').toggleClass('has-error').next('span').toggleClass('is-visible');
	});
	$form_signup.find('input[type="submit"]').on('click', function(event){
		event.preventDefault();
		$form_signup.find('input[type="email"]').toggleClass('has-error').next('span').toggleClass('is-visible');
	});	
  });
  
</script>
</body>
</html>