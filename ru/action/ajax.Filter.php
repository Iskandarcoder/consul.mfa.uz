<?php
include("../db.php");
global $select;
switch ($_POST['action']){
       case 'getTuman': 
             $query="SELECT sp_name04, sp_id FROM sp_district WHERE sp_region=".$_POST['region_id']." ORDER BY 1";
				$select = mysql_query($query);
				 echo '<option value=0>----- Tanlanmagan -------- </option>';
                 while(list($sp_name04,$sp_id) = mysql_fetch_row($select))
               			if ($sp_id==10)			// В начале город Ташкент
               			{
               				echo "<option selected='selected' value='$sp_id'>$sp_name04</option>";
               				}
		              else {
		              	echo "<option value='".$sp_id."'>$sp_name04</option>";
		              	}
                break;
                
       case 'getTuman1': 
             $query="SELECT sp_name04, sp_id FROM sp_district WHERE sp_region=".$_POST['region_id']." ORDER BY 1";
				$select = mysql_query($query);
				 echo '<option value=0>----- Tanlanmagan -------- </option>';
                 while(list($sp_name04,$sp_id) = mysql_fetch_row($select))
               			if ($sp_id==10)			// В начале город Ташкент
               			{
               				echo "<option selected='selected' value='$sp_id'>$sp_name04</option>";
               				}
		              else {
		              	echo "<option value='".$sp_id."'>$sp_name04</option>";
		              	}
                break;
               
       case 'getPlace': 
             $query="SELECT sp_name04, sp_id FROM sp_place WHERE
                 sp_region =".$_POST['region_id']." and 
                 sp_district =".$_POST['tuman_id']." ORDER BY 1";
				$select = mysql_query($query);
				 echo '<option value=0>----- Tanlanmagan -------- </option>';
                 while(list($sp_name04,$sp_id) = mysql_fetch_row($select))
          			{
		              	echo "<option value='".$sp_id."'>$sp_name04</option>";
		            }
                break; 
     
       case 'getStreet': 
             $query="SELECT sp_name04, sp_id FROM sp_street WHERE
                 sp_region =".$_POST['region_id']." and 
                 sp_district =".$_POST['tuman_id']." and 
                 (sp_place = 0 or sp_place is null) ORDER BY 1";
				$select = mysql_query($query);
				 echo '<option value=0>----- Tanlanmagan -------- </option>';
                 while(list($sp_name04,$sp_id) = mysql_fetch_row($select))
          			{
		              	echo "<option value='".$sp_id."'>$sp_name04</option>";
		            }
                break;    
                  
        case 'getTStreet': 
             $query="SELECT sp_name04, sp_id FROM sp_street WHERE
                 sp_region =".$_POST['region_id']." and 
                 sp_district =".$_POST['tuman_id']." and 
                 sp_place = ".$_POST['place_id']."   ORDER BY 1";
				$select = mysql_query($query);
				 echo '<option value=0>----- Tanlanmagan -------- </option>';
                 while(list($sp_name04,$sp_id) = mysql_fetch_row($select))
          			{
		              	echo "<option value='".$sp_id."'>$sp_name04</option>";
		            }
                break;                          
};
?>