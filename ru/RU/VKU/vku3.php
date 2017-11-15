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
                    <label for="seriya"><font style="color:red;">*</font>&nbsp;&nbspСерия</label>
                    <input id="seriya" maxlength='5' name="seriya"  type="text" style="text-transform:uppercase" class="error"  />
              </p>
              <p class="p5">
	            <label for="nomer"><font style="color:red;">*</font>&nbsp;Номер</label>
                    <input id="nomer" name="nomer"  type="text"  class="error"  />
		   </p>
           
           
            <p class="p5" >
		    <label for="vidan"><font style="color:red;">*</font>&nbsp;Дата выдачи</label>
		    <input name="vidanDay" maxlength="10" type="text" id="vidanDay"  class="error" />
            </p>

                <p class="p5" >
		    <label for="muddatDay"><font style="color:red;">*</font>&nbsp;Срок</label>
		    <input name="muddatDay" maxlength="10" type="text" id="muddatDay"  class="error"/>
            </p>

             <p class="p4">
             <label for="doc_div"><font style="color:red;">*</font>&nbsp;Организация, который выдал </label>
              <select id="doc_div" name="doc_div"  class="error">
              <?php
				 $select = mysql_query("SELECT sp_name01, sp_id FROM sp_division");       //Документ турларини чикариш
		             echo '<option selected="selected" value=0></option>';
	    		     while(list($sp_name01,$sp_id) = mysql_fetch_row($select))
    		              	echo "<option value='".$sp_id."'>$sp_name01</option>";
       			         echo "</select>";

               ?>  <br/>
               <label id="kl"   for="kem">&nbsp;(Если нет в списке) </label>
                <input id="kem" maxlength='35' name="kem"   type="text"  class="error"; />
             
              </p>
              
  