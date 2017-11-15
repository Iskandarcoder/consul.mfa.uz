               <legend>Паспортные данные</legend>
               
              <p class="p4" >
              <label for="doc_tip" ><font style="color:red;">*</font>&nbsp;Тип документа</label>
              <select id="doc_tip" name="doc_tip" >
              <?php
				 $select = mysql_query("SELECT sp_name01, sp_id FROM sp_doctype where sp_active=1");       //Документ турларини чикариш
		          //   echo '<option selected="selected"></option>';
	    		     while(list($sp_name01,$sp_id) = mysql_fetch_row($select))
	    		     {
               			if ($sp_id==46)               			{
               				echo "<option selected='selected' value='$sp_id'>$sp_name01</option>";
               				}
		              else {
		              	echo "<option value='".$sp_id."'>$sp_name01</option>";
		              	}
                    }
       			      echo "</select>";

               ?>
               </p>

              <p class="p5">
                    <label for="seriya">&nbsp;&nbsp;&nbspСерия</label>
                    <input id="seriya" maxlength='5' name="seriya"  type="text" style="text-transform:uppercase;"  />
              </p>
              <p class="p5">
	            <label for="nomer">&nbsp;&nbsp;Номер</label>
                    <input id="nomer" name="nomer"  type="text"  />
		   </p>
           
           
            <p class="p5" >
		    <label for="vidan">Дата выдачи</label>
		    <input name="vidanDay" maxlength="10" type="text" id="vidanDay" />
            </p>

             <p class="p4">
             <label for="kem">Организация, который выдал </label>
             <input id="kem" maxlength='35' name="kem"   type="text"  />
              </p>
              
      <br />
      <legend> Причина обращения: </legend>
         <p class="p4" >
              <label for="sabab"><font style="color:red;">*</font>Причина из списка:</label>
              <select id="sabab" name="sabab" >
              <?php
				 $select = mysql_query("SELECT sp_name01, sp_id FROM sp_sertcause");       //Документ турларини чикариш
		          //   echo '<option selected="selected"></option>';
	    		     while(list($sp_name01,$sp_id) = mysql_fetch_row($select))
	    		     {
               			if ($sp_id==46)
               			{
               				echo "<option selected='selected' value='$sp_id'>$sp_name01</option>";
               				}
		              else {
		              	echo "<option value='".$sp_id."'>$sp_name01</option>";
		              	}
                    }
       			      echo "</select>";

               ?>        
           </p>