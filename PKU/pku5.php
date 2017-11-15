
                <legend>Hozirdagi manzili:</legend>

                    <p class="p2">
                    <label for="strana" ><font style="color:red;">*</font>&nbsp;Kelgan davlati</label>
               <select id="for_strana" name="for_strana" class="error">
               <?php
              		 $select = mysql_query("SELECT sp_name04, sp_id FROM sp_country order by 1");
		             echo '<option value="-1" selected="selected"></option>';
	    		     while(list($sp_name04,$sp_id) = mysql_fetch_row($select))
               		if ($sp_name04==$row['strana']) {echo "<option selected='selected' value='$sp_id'>$sp_name04</option>"; }
		              else {echo "<option value='".$sp_id."'>$sp_name04</option>";}
        			      echo "</select>";
	          ?>
                  </p>

		 <p class="p2" >
		    <label for="kun" ><font style="color:red;">*</font>&nbsp;Kelgan sanasi:</label>
		      <input name="kelDay" maxlength="10" type="text" id="kelDay" class="error" value="" />
                 </p>



                    <p class="p2" >
                    <label for="asos" ><font style="color:red;">*</font>&nbsp;Ro`yxatga olishga asos</label>
                     <input name="asos"  type="text" id="asos" class="error" value="" />
         
                    <p class="p4" >
                    <label for="job" >&nbsp;Ish joyi va lavozimi</label>
                    <input id="job"  maxlength='64' name="job"  type="text" />
                  </p>

                    <div class="p4" >
                    <label for="vr_adress" ><font style="color:red;">*</font>&nbsp;Chet eldagi manzili</label>
                    <input id="vr_adress" maxlength='250' name="vr_adress"  class="error" type="text"  />
                    <div class="sub1"><sub>(region, shaxar, ko'cha, uy, xonadon, telefon, e-mail)</sub>
                  </div>
                 </div>
                           <div class="p4" >
                    <label for="vr_adress" >Chet el fuqaroligini olganligi:</label>
                 <select id="f_davlat" name="f_davlat"   onclick = "InstNext(this)"/>
           <?php
               echo '<option selected="selected" value="-1" > </option>';
              		 $select = mysql_query("SELECT sp_name04, sp_id FROM sp_country  order by 1");      //Davlatlar
	    		     while(list($sp_name04,$sp_id) = mysql_fetch_row($select))
               	       	echo "<option value='$sp_id'>$sp_name04</option>";
               	       	echo "</select>";
	          ?>
                 </div>
          <!--       <div class="p4">
                 	<label for  class="email_addr">&nbsp;El. pochta (email)</label>
                  <input id="email_addr" maxlength='250' name="email_addr"   type="text"  />	
                 </div>-->
                    
                    <br />

   <br/>
          <p class="p7"> 
          <label><font style="color:red;">*</font>&nbspRo`yxatga turish manzili:</label> 
             <select id="elchixona" name="elchixona"  class="error" onclick = "InstNext(this)"/>
           <?php
               echo '<option selected="selected" value="0" > </option>';
              		 $select = mysql_query("SELECT sp_name04, sp_id, sp_idfirst FROM sp_division where sp_id >= 40000 and sp_id <= 40099 order by 1");      //Элчихоналар
	    		     while(list($sp_name04,$sp_id,$sp_idfirst) = mysql_fetch_row($select))
               	       	echo "<option value='$sp_id/$sp_idfirst'>$sp_name04</option>";
               	       	echo "</select>";
	          ?>
         </p>
