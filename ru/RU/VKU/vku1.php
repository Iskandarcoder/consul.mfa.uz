                  <legend>Основные данные</legend>

                    <p class="p1" >
                    <label for="fam"  > <font style="color:red;">*</font>&nbsp; Фамилия (латин.)</label>
                    <input  id='fam'   name='fam' maxlength='30' class="error"
                    onKeyUp="if(/[^a-zA-Z| |`]/i.test(this.value)){this.value='';}"/>
                    </p>

             <p class="p1">
                    <label for="famk" > &nbsp;&nbsp;Фамилия (кирил.)</label>
                    <input id='famk'   name='famk'  maxlength='30' 
                    onKeyUp="if(/[^а-яА-ЯёЁ| |]+$/i.test(this.value)){this.value='';}"/>
                    </p>
                    
                     <p class="p1" >
                    <label for="ism" > <font style="color:red;">*</font>&nbsp;Имя (латин.)</label>
                    <input id='ism'  name='ism' maxlength='30' class="error"
                    onKeyUp="if(/[^a-zA-Z| |`]/i.test(this.value)){this.value='';}"/>
                    </p>

             <p class="p1">
                    <label for="ismk"> &nbsp;&nbsp;Имя (кирил.)</label>
                    <input id='ismk' name='ismk'   maxlength='30'
                     onKeyUp="if(/[^а-яА-ЯёЁ| |]+$/i.test(this.value)){this.value='';}"/>
                    </p>
                    
                     <p class="p1" >
                    <label for="sharif" >Отчество (латин.)</label>
                    <input id='sharif'  name='sharif' maxlength='30' 
                    onKeyUp="if(/[^a-zA-Z| |`]/i.test(this.value)){this.value='';}"/>
                    </p>

               <p class="p1">
                    <label for="sharifk">&nbsp;&nbsp;Отчество (кирил.)</label>
                    <input id='sharifk' name='sharifk'  maxlength='30' 
                     onKeyUp="if(/[^а-яА-ЯёЁ| |]+$/i.test(this.value)){this.value='';}"/>
                  </p>
                  
                  
                    <p class="p1" ">
                    <label for="millat" > <font style="color:red;">*</font>&nbsp;Национальность</label>
                      <?php
          					$select = mysql_query("SELECT  sp_name01, sp_id FROM sp_nation order by 1 ") or die(mysql_error());
         					echo '<select name="nation" id="nation">';
        					 while(list($sp_name01,$sp_id) = mysql_fetch_row($select))
	 						 {  if ($sp_id==44)  		// Агар узбек буса
	 						 	{
	 						 		echo "<option selected='selected' value='$sp_id'>$sp_name01</option>";
	 						 		}
	 							else
	 	                        {
	 						 		echo "<option value='$sp_id'>$sp_name01</option>";
	 						 	}
	 						  }
					        echo '</select>';
					   ?>

                    </p>

        <p class="p1">
           <label for="jins"> <font style="color:red;">*</font>Пол</label>

 <?php
          $select = mysql_query("SELECT sp_name01, sp_id FROM sp_sex ") or die(mysql_error());
         echo '<select name="jins" id="jins">';
         while(list($sp_name01,$sp_id) = mysql_fetch_row($select))
         {
            if ($sp_id==1)  
                echo "<option selected='selected' value='$sp_id'>$sp_name01</option>";
              else
                    echo "<option value='$sp_id'>$sp_name01</option>";
         }
         echo '</select>';
 ?>
         </p>


                <p class="p1">
                    <label for="tugkun" id="date"> <font style="color:red;">*</font>Дата рождения</label>
                    <input name="tugkun" maxlength="10"  id="tugkun"    size="10"  class="error"/>
                </p>
                
                
        <p class="p1">
	   <label for="oila">Семейное пол.</label>

<?php    $select = mysql_query("SELECT sp_name01, sp_id FROM sp_marital") or die(mysql_error());
         echo '<select name="oila" id="oila">';
         echo '<option selected="selected"  value=0></option>';
         while(list($sp_name01,$sp_id) = mysql_fetch_row($select))
         {
      //      if ($sp_id==1)
     ////           echo "<option selected='selected' value='$sp_id'>$sp_name04</option>";
         //       else
                echo "<option value='$sp_id'>$sp_name01</option>";
         }
         echo '</select>';

   ?>
        </p>



