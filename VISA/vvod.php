<html>
  <head>
<link rel="stylesheet" type="text/css" href="css/regForm.css">
  <script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
	<script type="text/javascript" src="js/form.js"></script>

  </head>
  <body>  <h1>Visa status checking form:</h1>
	  <div class="form-container">

			<form>
<div id="panel1" class="form-panel">
				<h2>Enter bar code or passport №, indicated in your visa application</h2>
					<fieldset class="ui-corner-all">
<br><br>
						<label>&nbsp;&nbsp;Bar code:</label><input type="text" id="barkod"><br><br>
						<label>&nbsp;&nbsp;Passport №:</label><input type="text" id="pasp_no">
					</fieldset>
 <button id="next">OK</button><button onclick="return go_back();">Back</button>
<br><br><br><br><br><br><br>
                     <div id="loading"><img src="images/loading48.gif" width="100" height="100" alt="*" /></div>
				</div>
				<div id="thanks" class="form-panel ui-helper-hidden">
<br>
				  <h2>Answer:</h2>
					<fieldset class="ui-corner-all">
  					<p> </p>
					</fieldset>
				</div>


<!-- <button type="button" onclick="document.location.reload()">Clear</button>-->


			</form>
		</div>


  </body>
</html>
