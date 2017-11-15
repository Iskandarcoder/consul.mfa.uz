
                <legend>Адрес проживания зарубежом:</legend>

                    <p class="p2">
                    <label for="strana" ><font style="color:red;">*</font>&nbsp;Страна пребывания</label>
               <select id="for_strana" name="for_strana" class="error">
               <?php
              		 $select = mysql_query("SELECT sp_name01, sp_id FROM sp_country order by 1");
		             echo '<option value="-1" selected="selected"></option>';
	    		     while(list($sp_name01,$sp_id) = mysql_fetch_row($select))
               		if ($sp_name01==$row['strana']) {echo "<option selected='selected' value='$sp_id'>$sp_name01</option>"; }
		              else {echo "<option value='".$sp_id."'>$sp_name01</option>";}
        			      echo "</select>";
	          ?>
                  </p>

		 <p class="p2" >
		    <label for="kun" ><font style="color:red;">*</font>&nbsp;Дата прибытия:</label>
		      <input name="kelDay" maxlength="10" type="text" id="kelDay" class="error" value="" />
                 </p>



                    <p class="p2" >
                    <label for="asos" ><font style="color:red;">*</font>&nbsp;Основание поставки на учет</label>
                     <input name="asos"  type="text" id="asos" class="error" value="" />
         
                    <p class="p4" >
                    <label for="job" >&nbsp;Место работы и должность</label>
                    <input id="job"  maxlength='64' name="job"  type="text" />
                  </p>

                    <div class="p4" >
                    <label for="vr_adress" ><font style="color:red;">*</font>&nbsp;Адрес за рубежом</label>
                    <input id="vr_adress" maxlength='250' name="vr_adress"  class="error" type="text"  />
                    <div class="sub1"><sub>(регион, город, улица, дом, квартира, телефон, e-mail)</sub>
                  </div>
                 </div>
          <!--       <div class="p4">
                 	<label for  class="email_addr">&nbsp;El. pochta (email)</label>
                  <input id="email_addr" maxlength='250' name="email_addr"   type="text"  />	
                 </div>-->
                    
                    <br />
    
   <br/>
          <p class="p7"> 
          <label><font style="color:red;">*</font>&nbspМесто поставки на учет:</label> 
             <select id="elchixona" name="elchixona"  class="error" onclick = "InstNext(this)">
           <?php
               echo '<option selected="selected" value="0" > </option>';
              		 $select = mysql_query("SELECT sp_name01, sp_id  FROM sp_division where sp_id >= 40000 and sp_id <= 40099 order by 1");      //Элчихоналар
	    		     while(list($sp_name01,$sp_id) = mysql_fetch_row($select))
               	       	echo "<option value='$sp_id'>$sp_name01</option>";
               	       	echo "</select>";
	          ?>
         </p>
