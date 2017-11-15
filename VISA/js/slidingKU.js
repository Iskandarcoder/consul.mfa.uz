$(function() {
	var fieldsetCount = $('#formElem').children().length;
	var current 	= 1;
 	var stepsHeight	= 0;
    var Heights 		= new Array();

	$('#steps .step').each(function(i){
        var $step 		= $(this);
		Heights[i]  	= stepsHeight;
        stepsHeight 	+= $step.height();
    });

	$('#formElem').children(':first').find(':input:first').focus();
   	$('#navigation').show();

    $('#navigation a').bind('click',function(e){
		var $this	= $(this);
		var prev	= current;
		$this.closest('ul').find('li').removeClass('selected');
        $this.parent().addClass('selected');

		current = $this.parent().index() + 1;

        $('#steps').stop().animate({
         marginTop: '-' + Heights[current-1] +'px'
           },500,function(){
			if(current == fieldsetCount)
				validateSteps();
			else
				validateStep(prev);
		//	$('#formElem').children(':nth-child('+ parseInt(current) +')').find(':input:first').focus();
			$f=$('#formElem').children(':nth-child('+ parseInt(current) +')').find(':input:first');
			if ($f.attr("id")!='vozvrat') $f.focus();
		});
        e.preventDefault();
    });

	function validateSteps(){
		var FormErrors = false;
		for(var i = 1; i < fieldsetCount; ++i){
			var error = validateStep(i);
			if(error == -1)
				FormErrors = true;
		}
		$('#formElem').data('errors',FormErrors);
	}

	/*
	проверяем один набор полей ввода,
	Если ошибки есть - возвращаем -1, если ошибок нет -  1
	*/
	function validateStep(step){
		if(step == fieldsetCount) return;

		var error = 1;
		var hasError = false;
		$('#formElem').children(':nth-child('+ parseInt(step) +')').find(':input:not(button)').each(function(){
			var $this 		= $(this);
			var valueLength = jQuery.trim($this.val()).length;
             if($this.attr('id')=='fileup') return error;

          if($this.attr("id") != 'qar_fio2')
          if($this.attr("id") != 'qar_adr2')
          if($this.attr("id") != 'ch_qar_fio1')
          if($this.attr("id") != 'ch_qar_fio2')
          if($this.attr("id") != 'ch_qar_adr1')
          if($this.attr("id") != 'ch_qar_adr2')
          {
			if(valueLength == ''){
				hasError = true;
				$this.css('background-color','#FFFFCC');
			}
			else
				$this.css('background-color','#FFFFFF');
			};
		});
		var $link = $('#navigation li:nth-child(' + parseInt(step) + ') a');
		$link.parent().find('.error,.checked').remove();

		var valclass = 'checked';
		if(hasError){
			error = -1;
			valclass = 'error';
		}
		$('<span class="'+valclass+'"></span>').insertAfter($link);

		return error;
	}

	/*
	В случае наличи ошибок нельзя отправить формы
	*/
	$('#registerButton').bind('click',function(){
		if($('#formElem').data('errors')){
			alert('Пожалуйста, исправьте ошибки в форме!');
			return false;
		}
	});
	});