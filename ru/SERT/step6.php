
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
                    <label for="maqsad" ><font style="color:red;">*</font>&nbsp;Цель пребывания</label>
                     <select id="maqsad" name="maqsad"  class="error">
               <?php
              		 $select = mysql_query("SELECT sp_name01, sp_id FROM sp_reasonb ");
		             echo '<option selected="selected"></option>';
	    		     while(list($sp_name01,$sp_id) = mysql_fetch_row($select))
               		if ($sp_name01==$row['strana']) {echo "<option selected='selected' value='$sp_id'>$sp_name01</option>"; }
		              else {echo "<option value='".$sp_id."'>$sp_name01</option>";}
        			      echo "</select>";
	          ?>
                  </p>

                    <p class="p4" >
                    <label for="job" >&nbsp;Место работы и должность</label>
                    <input id="job"  maxlength='64' name="job"  type="text"  
	placeholder=" Только английские и русские символы"/>
                  </p>

                    <div class="p4" >
                    <label for="vr_adress" ><font style="color:red;">*</font>&nbsp;Адрес проживания зарубежом</label>
                    <input id="vr_adress" maxlength='250' name="vr_adress"  class="error" type="text" 
placeholder=" Только английские и русские символы"	/>
                    <div class="sub1"><sub>(регион, город, улица, дом, телефон, e-mail)</sub>
                  </div>
                 </div>
          <!--       <div class="p4">
                 	<label for  class="email_addr">&nbsp;El. pochta (email)</label>
                  <input id="email_addr" maxlength='250' name="email_addr"   type="text"  />	
                 </div>-->
<br />
		<legend>Дата возврата</legend>
	                <p class="p2">
                    <label for="vozvrat"><font style="color:red;">*</font>&nbsp;Дата</label>
                    <input name="vozvratDay" maxlength="10"  type="text" id="vozvratDay" class="error"/>
		            </p>
                    
                    <br />
                       <legend>Информация о близком родственнике </legend>
         <p class="p2" >
          <label for="qar"  >Ф.И.О.:</label>
                    <input   name="qar"  maxlength='64' id="qar"  type="text" />
                </p>
              <p class="p2" >
                    <label for="data_r" >Дата рождения</label>
                    <input name="data_r" maxlength="10"  type="text" id="data_r" />
				      </p>

             <p class="p2" >
                    <label for="mesto_r">Место рождения</label>
                    <input   name="mesto_r"  id="mesto_r"  type="text" />
                </p>
           <p class="p2" >
                    <label for="adrespro" >Адрес (Телефон)</label>
                    <input   name="adrespro"  maxlength='64' id="adrespro"  type="text" />
                </p>
                <p class="p2" >
                    <label for="mesto_rab">Место работы</label>
                    <input   name="mesto_rab"  maxlength='64'id="mesto_rab"  type="text" />
                </p>
             <p class="p2" >
                    <label for="dol_tel" >Должность и телефон</label>
                    <input   name="dol_tel"  maxlength='64' id="dol_tel"  type="text" />
                </p>
   <br/>
          <p class="p7"> 
          <label><font style="color:red;">*</font>&nbspМесто получения сертификата:</label> 
             <select id="elchixona" name="elchixona"  class="error" onclick = "InstNext(this)">
           <?php
               echo '<option selected="selected" value="0" > </option>';
              		 $select = mysql_query("SELECT sp_name01, sp_id, sp_idfirst FROM sp_division where sp_id >= 40000 and sp_id <= 40099 order by 1");      //Элчихоналар
	    		     while(list($sp_name01,$sp_id,$sp_idfirst) = mysql_fetch_row($select))
               	       	echo "<option value='$sp_id/$sp_idfirst'>$sp_name01</option>";
               	       	echo "</select>";
	          ?>
         </p>
