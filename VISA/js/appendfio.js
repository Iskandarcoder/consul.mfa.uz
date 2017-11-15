   function AppendFio(){
 		var a=$('#fam').val()+' '+$('#ism').val()+' '+$('#sharif').val();
 		alert(a);
		$('#fio option').each(function(){ if(a== this.text) return true;});
        $("#fio").append('<option value="4">'+a </option>');
        }
