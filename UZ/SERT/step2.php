          <legend>Tug`ilgan joyi</legend>

                  <p class="p2" >
                    <label for="strana" ><font style="color:red;">*</font>&nbsp;Davlat</label>
                    <select id="strana" name="strana"  onclick=" selectCountry(this.value); ">
               <?php
              		 $select = mysql_query("SELECT sp_name04, sp_id FROM sp_country order by 1");
		           //  echo '<option selected="selected"></option>';
	    		     while(list($sp_name01,$sp_id) = mysql_fetch_row($select))
               		if ($sp_id==182)			// Узбекистан
         			    echo "<option selected='selected' style='text-transform: capitalize;' value='$sp_id'>".ucfirst($sp_name01)."</option>";
		              else 
		              	echo "<option style='text-transform: capitalize;' value='".$sp_id."'>".$sp_name01."</option>";

        		      echo "</select>";
	          ?>
               </p>

                  <p class="p2" >
                    <label for="oblast" ><font style="color:red;">*</font>&nbsp;Viloyat</label>
                    <select id="oblast" name="oblast" class="error" onclick="selectRegion(this.value,1);">
            <?php
              		 $select = mysql_query("SELECT sp_name04, sp_id FROM sp_region");       //Областни чикариш
		             echo '<option selected="selected" value=0> </option>';
	    		     while(list($sp_name01,$sp_id) = mysql_fetch_row($select))

		              	echo "<option value='".$sp_id."'>$sp_name01</option>";

       			      echo "</select>";
	          ?>
                  </p>
               
               
               <p class="p2">
               	<label for="rayon1" >&nbsp;&nbsp;Tuman</label>
				 <select id="rayon1" name="rayon1" onclick="javascript:selectCity(this.value,0);">
				 <option value=0>----- Tanlanmagan -------- </option>
				 </select>
               </p>
               
               
               <p class="p3">   
                <label for="tugjoy">Tug`ilgan joyi (inglizcha)</label>
                <input id="tugjoy_lat"  maxlength='80' name="tugjoy_lat" type="text" readonly/>
               </p>
              
             
              
  




