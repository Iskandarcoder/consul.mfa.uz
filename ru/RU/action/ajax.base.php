<?php
//ini_set(default_charset,"UTF-8");
include("../db.php");
global $select;
switch ($_POST['action']){

        case "showRegionForInsert":
  		 $lSql="SELECT sp_name01, sp_id FROM sp_district WHERE sp_region=".$_POST['id_country']." ORDER BY 1";
		 $select = mysql_query($lSql);
		  echo '<option selected="selected" value=0></option>';
                 while(list($sp_name01,$sp_id) = mysql_fetch_row($select))
		              	echo "<option value='".$sp_id."'>$sp_name01</option>";
                 break;

        case "showCityForInsert":
               $lSql="SELECT sp_name01, sp_id FROM sp_place WHERE sp_district=".$_POST['id_region']." ORDER BY 1";
				$select = mysql_query($lSql);
				echo '<option value=0></option>';
                 while(list($sp_name01,$sp_id) = mysql_fetch_row($select))
					if ($sp_name01==$row['strana']) {echo "<option selected='selected' value='$sp_id'>$sp_name01</option>"; }
		              else {echo "<option value='".$sp_id."'>$sp_name01</option>";}

                break;
        case "showStreetForInsert":
               $lSql="SELECT sp_name01, sp_id FROM sp_street WHERE sp_district=".$_POST['id_place']." ORDER BY 1";
				$select = mysql_query($lSql);
				echo '<option value=0></option>';
                 while(list($sp_name01,$sp_id) = mysql_fetch_row($select))
               		echo "<option value='".$sp_id."'>$sp_name01</option>";

                break;
       case "showCountryForInsert":
               $lSql="SELECT sp_name03, sp_id FROM sp_country WHERE sp_id=".$_POST['id_place']." ORDER BY 1";
				$select = mysql_query($lSql);
                 while(list($sp_name03,$sp_id) = mysql_fetch_row($select))
		              echo $sp_name03;

                break;
      case "showCountryLatInsert":
               $lSql="SELECT sp_name01, sp_id FROM sp_country WHERE sp_id=".$_POST['id_place']." ORDER BY 1";
				$select = mysql_query($lSql);
                 while(list($sp_name01,$sp_id) = mysql_fetch_row($select))
		              echo $sp_name01;

                break;
       case "showRegionLat":
               $lSql="SELECT sp_name01, sp_id FROM sp_region WHERE sp_id=".$_POST['id_place']." ORDER BY 1";
				$select = mysql_query($lSql);
                 while(list($sp_name01,$sp_id) = mysql_fetch_row($select))
		              echo $sp_name01;

                break;
	  case "showRegionEng":
               $lSql="SELECT sp_name03, sp_id FROM sp_region WHERE sp_id=".$_POST['id_place']." ORDER BY 1";
				$select = mysql_query($lSql);
                 while(list($sp_name03,$sp_id) = mysql_fetch_row($select))
		              echo $sp_name03;

                break;
       case "showCountry":
               $lSql="SELECT sp_country FROM sp_division WHERE sp_id=".$_POST['id_place']." ORDER BY 1";
				$select = mysql_query($lSql);
                 while(list($sp_country) = mysql_fetch_row($select))
			//	echo "KELDI!!! ".$_POST['id_place'];
		         echo $sp_country;
                break;

};

?>
