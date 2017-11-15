$(function(){
    $("#myForm").submit(fuction(){
    	alert("keldi");
/*   	var formData={
   	"fam": $("#fam").val(),
   	"ism": $("#ism").val()
   	};

   	$.ajax({
   		url: 'dataparser.php',
   		type: 'POST',
   //		data: 'jsonData='+$.toJSON(formData),
   	    data: "fam="+$("#fam").val()+"&ism="+$("#ism").val(),
   		succrss: function(res){	alert(res); }
   	});
   	*/
//   	return false;
   });
});