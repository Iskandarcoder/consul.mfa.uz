<div id="travel_info">
<div class="block_head"><span>Travel Information</span></div>
<div id="infoblock3" class="step">
<table class="datagrid">
<tr>
<td class="legend"><label class="mandatory_label" for="kirkun">Period of Visit, from</label></td>
<td><input class="mandatory two_char digit" name="kirkun" maxlength="2" type="text" id="kirkun" value="" size="3">
<select class="mon_combo" name="kiroy" id="kiroy">
<?php
	    for ($i=1;$i<=12;$i++)
		{
			$a=sprintf("%02s",$i);
			 $str=getMonth($i);
             $n=strPos($str,'/');
             $oy=Substr($str,0,$n);

            echo '<option value="'.$i.'">'.$oy.'</option>';
		}


		echo '</select>';
        echo "<select class='four_char' name='kirYear' id='kirYear'>";
         $Year=date("Y");$i=0;
      //  for ($i=$year-($year-2012);$i<=$Year+3;$i++)
       for ($i=$Year;$i<=$Year+3;$i++)
 {

		  echo "<option>$i</option>";

		}
        echo "</select></td>";


   ?>
<td class="legend"><label class="mandatory_label" for="chiq_kun">to </label></td>
<td><input class="mandatory two_char digit" name="chiq_kun" maxlength="2" value="" type="text" id="chiq_kun" size="3">
<select class="mon_combo" name='chiq_oy' id="chiq_oy">
<?php
for ($i=1;$i<=12;$i++)
{
	$a=sprintf("%02s",$i);
	$str=getMonth($i);
    $n=strPos($str,'/');
    $oy=Substr($str,0,$n);
//    $oy_limit=Substr($str,$n+1);
  //  $a=$a."/".$oy_limit;
    echo '<option value="'.$i.'">'.$oy.'</option>';
}
	/*	{$a=sprintf("%02s",$i);
		if ($a==$chiq_k[1])
		{echo '<option selected="selected" value="'.$a.'">'.getMonth($i).'</option>';}
		else {echo '<option value="'.$a.'">'.getMonth($i).'</option>';	}}
	*/
		echo '</select>';
                echo "<select class='four_char' name='chiq_Year' id='chiq_Year'>";
         $Year=date("Y");$i=0;
      //  for ($i=$year-($year-2012);$i<=$Year+3;$i++)
       for ($i=$Year;$i<=$Year+5;$i++)
 {

		  echo "<option>$i</option>";

		}
        echo "</select></td>";
?>

</tr><tr>
<tr></tr><tr></tr>
<td class="legend"><label class="mandatory_label" for="kol_kir">Number of Entries</label></td>
<?php
	$select = mysql_query("SELECT  id_v,nomi_eng FROM krat ORDER BY ID");
    echo "<td><select class='mandatory' name='kol_kir' id='kol_kir'>";
           echo '<option selected="selected"></option>';
           while(list($id_v, $name_rus) = mysql_fetch_row($select))
           {
		       echo "<option value='$name_rus/$id_v'>$name_rus</option>";
           }
           echo "</select></td>";
                ?>

<td class="legend"><label class="mandatory_label" for="kun">Duration of Stay<br><span class="remark_label">(days, for each entry)</span></label></td>
<td><input class="mandatory digit" style='width:20%;' id="kun" maxlength="3" name="kun" value="" type="text" </td>
</tr><tr>
<tr></tr><tr></tr>
<td class="legend"><label class="mandatory_label" for="rass_kun">Duration of Visa Procedure<br><span class="remark_label">(effects in visa fee)</span></label></td>
<?php
               $select = mysql_query("SELECT  id_v, nomi_eng FROM srok_rass ORDER BY ID");
               echo "<td><select class='mandatory' name='rass_kun' id='rass_kun'> " ;
           echo '<option selected="selected"></option>';
           while(list($id_v, $name_rus) = mysql_fetch_row($select))
           {
	           	echo "<option value='$name_rus/$id_v'>$name_rus</option>";
           }
              echo "</select></td>";

               ?>


               <td class="legend"><label class="mandatory_label" for="elchixona">Place of Visa Issuance</label></td>
            <?php
          $select = mysql_query("SELECT  kodst_zu,nomi_eng FROM l_elchixona order by nomi_eng" );
           echo "<td><select class='mandatory' name='elchixona' id='elchixona' >";
           echo '<option selected="selected"></option>';
            while(list($kodst_zu, $name_rus) = mysql_fetch_row($select))
            echo '<option value="'.$name_rus.'/'.$kodst_zu.'">'.$name_rus.'</option>';
            echo "</select></td>";
                ?>
</tr><tr>
<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
<td class="legend"><label class="mandatory_label" for="maqsad">Purpose of Visit <br>(in detail)</label></td>
<td colspan="3"><textarea class="mandatory" name="maqsad" maxlength="200" id="maqsad" rows="1" cols=76></textarea> </td>
</tr><tr>
<td class="legend"><label class="mandatory_label" for="maqsad">Inviting Party</label></td>
<td colspan="3"><textarea class="mandatory" id="taklifchi" name="taklifchi" maxlength="200" rows="1" cols=76 ></textarea><span class="remark_label">(inviting organization or person, phone)</span></td></td>
</tr>
</table>
</div>
</div>