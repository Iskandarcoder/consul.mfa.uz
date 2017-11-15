 $(function(){

   $("#formElem").submit(fuction(){
   	var formData={
   	"fam": $('#fam').val(),
   	"ism": $('#ism').val()
   	};
   	alert('keldi');
   	$.ajax({
   		url: 'dataparser.php',
   		type: 'POST',
   		data: 'jsonData='+$.toJSON(formData),
  // 	    data: "fam="+$("#fam").val()+"&ism="+$("#ism").val();
   		succrss: function(res){	alert(res); }
   	});
   	return false;
   });
});