 <legend> Место жительство в Узбекистане </legend>

 			<p class="p2">
				<label for="oblast" ><font style="color:red;">*</font>&nbsp;Область</label>
                    <select id="oblast2" name="oblast2" onclick="javascript:selectRegion(this.value,2);">
               <?php
              		 $select = mysql_query("SELECT sp_name01, sp_id FROM sp_region");      
		           //  echo '<option value = "0" selected="selected"></option>';
	    		     while(list($sp_name01,$sp_id) = mysql_fetch_row($select))
               			if ($sp_name01==$row['strana'])
               			{
               				echo "<option selected='selected' value='$sp_id'>$sp_name01</option>";
               				}
		              else {
		              	echo "<option value='".$sp_id."'>$sp_name01</option>";
		              	}

       			      echo "</select>";
	          ?>
	           </p>
                  <p class="p2">
				<label for="rayon" ><font style="color:red;">*</font>&nbsp;Район</label>
				 <select id="rayon2" name="rayon2"  class="error"  onclick="javascript:selectCity(this.value,1);">
                 
              <?php
              		 $select = mysql_query("SELECT sp_name01, sp_id FROM sp_district where sp_region=10");      
		          echo '<option selected="selected" value=0> </option>';
	    		     while(list($sp_name01,$sp_id) = mysql_fetch_row($select))
		              	echo "<option value='".$sp_id."'>$sp_name01</option>";

       			      echo "</select>";
	          ?>
	           </p>
	           <!-- Ахоли ящаш пунктини танлаш -->
                <p class="p2">
				<label for="street" >&nbsp;Населенный пункт</label>
				 <select id="selectPlaces" name="selectPlaces" onchange="showPlaces();">
				 <option value=0></option>
				 </select>
	           </p>
	              <p class="p2">
				<label for="street" >&nbsp;Улица</label>
				 <select id="selectStreet" name="selectStreet" onchange="showStreet();" >
				 <option value=0></option>
				 </select>
                 
				  <p class="p6" >
				    <label for="home" >Дом </label>
                    <input id="home"  maxlength='25' name="home"    type="text" onchange="showHome();" />
                  </p>
                  <p class="p6" >
                    <label for="korpus" >Корпус</label>
                    <input id="korpus"  maxlength='25' name="korpus"    type="text"  onchange="showHome();" />
                  </p>
                  <p class="p6" >
                    <label for="flat" >Квартира</label>
                    <input id="flat"  maxlength='25' name="flat"    type="text" onchange="showHome();" />
                  </p>
                  
                    <div class="p3" >
                    <label for="adress"><font style="color:red;">*</font>Адрес в Узбекистане</label>
                    <input id="adress_uz"  maxlength='80' name="adress_uz" class="error" type="text" />
                    <div class="sub1"><sub>(В случае не польноты, введите в ручную)</sub></div>
                  </div>
	           </p>
   