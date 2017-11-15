$(function() {
	/*
	���������� ������� �����
	*/
	var fieldsetCount = $('#formElem').children().length;
	/*
	������� ������� / ������ ���������
	*/
	var current 	= 1;

	/*
	���������� � ��������� ������ ������� ������ �����
	������������� ����� ����� � �������� ������ �������� �����
	*/
	var stepsWidth	= 0;
    var widths 		= new Array();
	$('#steps .step').each(function(i){
        var $step 		= $(this);
		widths[i]  		= stepsWidth;
        stepsWidth	 	+= $step.width();
    });
	$('#steps').width(stepsWidth);
	/*
	��� ���������� ������� � IE, ������������� ����� ����� � ������ ����� � �����
	*/
	$('#formElem').children(':first').find(':input:first').focus();

	/*
	���������� ������������� �������
	*/
	$('#navigation').show();

	/*
	��� ������� �� ������ ���������
	����� �������������� � ���������������� ������ �����
	*/
    $('#navigation a').bind('click',function(e){
		var $this	= $(this);
		var prev	= current;
		$this.closest('ul').find('li').removeClass('selected');
        $this.parent().addClass('selected');
		/*
		��������� ������� � ������� ����������
		*/
		current = $this.parent().index() + 1;
		/*
		�������� / �������������� � ���������������� ������ �����
		������� ������ ��������� �������������
		������� ������� ����� �����.
		�����, ����� ���������������, ����������� ����� ����� �� ������
		������� � ������ ����� �����.
		���� ������ ��������� ������ (�������������), �� �� ��������� ��� ������ �����,
		����� ����������� ������ ���������� �����
		*/

        $('#steps').stop().animate({
         marginLeft: '-' + widths[current-1] +'px'
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

	/*
	������� �� �������� (�� ��������� �������� ����� � ������ ������ �����), �������� �
	�������� �� ��������� ���
	*/
	/*$('#formElem > fieldset').each(function(){
		var $fieldset = $(this);
		$fieldset.children(':last').find(':input').keydown(function(e){
			if (e.which == 9){
				$('#navigation li:nth-child(' + (parseInt(current)+1) + ') a').click();
				// �������� blur ��� ��������
				$(this).blur();
				e.preventDefault();
			}
		});
	});*/

	/*
	������ ���� ������� ����� ������������ � $('#formElem').data()
	*/
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
	��������� ���� ����� ����� �����,
	���� ������ ���� - ���������� -1, ���� ������ ��� -  1
	*/
	function validateStep(step){
		if(step == fieldsetCount) return;

		var error = 1;
		var hasError = false;
		$('#formElem').children(':nth-child('+ parseInt(step) +')').find(':input:not(button)').each(function(){
			var $this 		= $(this);
			var valueLength = jQuery.trim($this.val()).length;
             if($this.attr('id')=='fileup') return error;

          if($this.attr("id") != 'fio_deti')
          if($this.attr("id") != 'fio_deti2')
          if($this.attr("id") != 'fio_deti3')
          if($this.attr("id") != 'fio_deti4')
          if($this.attr("id") != 'data_rojd')
          if($this.attr("id") != 'data_rojd2')
          if($this.attr("id") != 'data_rojd3')
          if($this.attr("id") != 'data_rojd4')
          {
			if(valueLength == ''){
				hasError = true;
		//		alert($this.attr('id'));
				$this.css('background-color','#FFEDEF');
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
	� ������ ������ ������ ������ ��������� �����
	*/
	$('#registerButton').bind('click',function(){
		if($('#formElem').data('errors')){
			alert('����������, ��������� ������ � �����!');
			return false;
		}
	});
	});