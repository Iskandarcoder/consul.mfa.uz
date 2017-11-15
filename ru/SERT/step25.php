<!DOCTYPE html>
<html>
<head>
<title>Pure CSS tab Control Example</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="main.css"/>
<style>
body { background: #BDBDBD none repeat scroll 0 0; line-height: 28px; font-family: Helvetica; font-size: 16px; word-wrap: break-word !important; }
 
h1 { color: #FFF; font-size: 30px; margin-top: 90px; line-height: 1.5; text-align: center; }
h2 { margin: 0 0 8px 0 }
 
.tabs-ctrl { list-style: outside none none; margin: 0 auto; padding: 0; width: 700px; }
.tabs-ctrl li { display: block; }
.tabs-ctrl label { background: #5F4C0B none repeat scroll 0 0; border-radius: 6px 6px 0 0; color: #FFF; cursor: pointer; display: inline-block; float: left; font-size: 16px; font-weight: normal; margin-right: 3px; padding: 4px 20px; }
.tabs-ctrl label:hover { background: #3498db; }
.tab-inner { background-color: #FFF; display: none; line-height: 22px; padding: 15px; width: 100%; }
.tabs-ctrl input[type=radio] { display:none; }
 
.link-labels:after { content: ''; clear: both; display: table; }
 
[id^=tab-rbtn-]:checked ~ div[id^=tab-inner-] { display: block; }
[id^=tab-rbtn-]:checked ~ [id^=tab-label-] { background: #08C; color: white; }
</style>



</head>
<body>
<h1>Example to Create your Own CSS Tabs</h1>
<ul class="tabs-ctrl">
<li class="link-labels">
<label for="tab-rbtn-1" id="tab-label-1">Link 1</label>
<label for="tab-rbtn-2" id="tab-label-2">Link 2</label>
<label for="tab-rbtn-3" id="tab-label-3">Link 3</label>
<label for="tab-rbtn-4" id="tab-label-4">Link 4</label>
<label for="tab-rbtn-5" id="tab-label-5">Link 5</label>
</li>
<li>
<input type="radio" checked name="tabs" id="tab-rbtn-1">
<div id="tab-inner-1" class="tab-inner">
<h2>Link 1</h2>
After the Success of his other books, Sanjeev Kapoor continues to enter the hearts of food lovers through their Stomachs.
</div>
</li>
<li>
<input type="radio" name="tabs" id="tab-rbtn-2">
<div id="tab-inner-2" class="tab-inner">
<h2>Link 2</h2>
In this book he hands us the key to a delicious khazana of Indian cuisines. It offers several recipes that have been chosen from a vast repertoire of delicacies in Indian cooking. Called Khana Khazana: Celebration of Indian cookery, this book, now in its seventh edition, has been designed to familiarize food lovers with a long forgotten cuisine. 
</div>
</li>
<li>
<input type="radio" name="tabs" id="tab-rbtn-3">  
<div id="tab-inner-3" class="tab-inner">
<h2>Link 3</h2>
Indian cuisine is getting popularity all over the world and is available in the most parts of the globe but it is restricted to a select few dishes. There is an enormous range that remains unexplored. Each of the state and each region has its own cuisine and local flavor. In this book, we are introduced to a variety of dishes that have been perfected by our ancestors.
</div>
</li>
<li>
<input type="radio" name="tabs" id="tab-rbtn-4">  
<div id="tab-inner-4" class="tab-inner">
<h2>Link 4</h2>
Here is an array of vegetarian, non-vegetarian recipes from Bengal, Maharashtra, Gujarat, the north of India, the southern states, which come with that special touch of the master chef. Macher jhol, bhajanee thalipeeth, Andhra Chilli Chicken, Kolambi bhaat, dhaabay di dal, rayalseema pesarettu, dhokar dalna, modak... the mouth watering list is endless.
</div>
</li>
<li>
<input type="radio" name="tabs" id="tab-rbtn-5">  
<div id="tab-inner-5" class="tab-inner">
<h2>Link 5</h2>
All you need to do to bring the diversity of India into your home, is to start in your own kitchen and share the passion that Indian food is the best!
</div>
</li>
</ul>
</body>
</html>




   <!--    <div id="shag9" style="width:650px;">
                 <div id="show_div" style="display: block;">
				<label for="oblast" style='width:60px'><font style="color:red;">*</font>&nbsp;Viloyat</label>
                    <select id="oblast" name="oblast" onclick="selectRegion(this.value,1);">-->
               <?php
            /*  		 $select = mysql_query("SELECT sp_name04, sp_id FROM sp_region");       //Областни чикариш
		             echo '<option selected="selected" value=0>----- Tanlanmagan -------- </option>';
	    		     while(list($sp_name01,$sp_id) = mysql_fetch_row($select))

		              	echo "<option value='".$sp_id."'>$sp_name01</option>";


       			      echo "</select>";*/
	          ?>
	          </div>    	        

	         <!-- <label for="tugjoy">Tug`ilgan joyi (inglizcha)</label> -->
              <input id="tugjoy_lat" style="width:160px; display:none;" maxlength='80' name="tugjoy_lat" type="text" readonly />
               <label for="tugjoy">Tug`ilgan joyi (inglizcha)</label>
              <input id="tugjoy_eng" style="width:160px;" maxlength='80' name="tugjoy_eng" type="text" readonly />
                   </div>
	           </p>
	           <div id="show_div2" style="display: block;">
	             <div id="shag9" style="width:650px;">

				<label for="rayon1" style='width:60px'>&nbsp;Tuman</label>
				 <select id="rayon1" name="rayon1" onclick="javascript:selectCity(this.value,0);">
				 <option value=0>----- Tanlanmagan -------- </option>
				 <div name="selectDataRegion"></div>
				 </select>
				 </div>

	           </div>