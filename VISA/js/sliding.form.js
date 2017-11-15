$(function() {

	$('#registerButton').bind('click',function(){
      var a = "ct_captcha="+$('#ct_captcha').val();
      var otvet=5;
	   enabdisab(1);
             $.ajax({
	                type: "POST",
	                url: "check.php",
	                data: a,
	                async: false,
	               success: function(text){
                if(text=='-1')
                  {  jAlert(' Escriba los numeros han pintado del dibujo!', 'Error');
                  otvet=-1;
                     return false;
	              }
	              else
	                 return true;
	                                   }
	            });
	            if(otvet==-1) return false
	              else
	              {
	              	$('#registerButton').hide();
	              	$('#loading').show();
	              	return true;
	              	}
	});
});
