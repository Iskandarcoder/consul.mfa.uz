<html>
<title>
<script type="text/javascript">
function isValid() {
     var val=document.getElementById($('var1').value;
     var pattern=new RegExp(/^([a-zA-Z]);
     if(pattern.test(val))
     {
     	alert('Good');
     	return true;
     }
     else
     {
     		alert('BAd');
        	return true;
       }
       }
</script>
</title>
<body>
<input type="text" name="var1" id="var1" />
<input type="button" onclick="isValid()" "value="check" />

</body>
</html>