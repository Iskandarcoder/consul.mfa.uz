<table class="datagrid">
<tr>
<td class="legend"><label class="mandatory_label" for="pol">Sex</label></td>
<?php
	$select = mysql_query("SELECT NOM_ENG,id FROM pol") or die(mysql_error());
  	echo '<td><select class="mandatory" name="pol" id="pol">';
        echo '<option selected="selected"></option>';
         while(list($name_rus,$id) = mysql_fetch_row($select))
	  {echo "<option value='$name_rus'>$name_rus</option>"; }
	echo "</select></td>";
?>
<td class="legend"><label class="mandatory_label" for=tugkun >Date of Birth</label></td>
<?php
echo '<td><input class="mandatory two_char digit" name="tugkun" maxlength="2" type="text" id="tugDay" value="" />';
echo '<select class="mon_combo" name="tugoy" id="tugoy">';
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
echo '</select>';
echo "<select class='four_char' name='birthYear' id='birthYear'>";
$Year=date("Y"); $i=0;
for ($i=$Year-110;$i<=$Year;$i++)
{
  echo "<option>$i</option>";
}
echo "</select></td></tr>";
?>
 <td class="legend"><label class="mandatory_label" for="strana1">Country of Birth</label></td>
<?php
              $select = mysql_query("SELECT  id_v,nomi_eng FROM l_davlat ORDER BY nomi_eng");
               echo "<td><select class='mandatory' name='strana1' id='strana1'>";
             echo '<option selected="selected"></option>';
           while(list($id_v, $name_rus) = mysql_fetch_row($select))
           echo '<option value="'.$name_rus.'/'.$id_v.'">'.$name_rus.'</option>';
  //            echo "<option value='$name_rus/$id_v'>$name_rus</option>";
              echo "</select></td>";
?>
 <td class="legend"><label class="mandatory_label" for="tugjoy">Place of Birth</label></td>
<td><input class="mandatory" id="tugjoy" style='width:90%;' name="tugjoy" maxlength="20" value="" type="text" /><span class="remark_label"> (city or province)</span></td>
</tr><tr>
<td class="legend"><label class="mandatory_label" for="fuqaro">Citizenship</label></td>
<?php
	$select = mysql_query("SELECT  id_v,upr,nomi_eng FROM l_davlat ORDER BY nomi_eng");
    echo "<td><select class='mandatory' name='fuqaro' id='fuqaro'>";
    echo '<option selected="selected"></option>';
    while(list($id_v,$upr,$name_rus) = mysql_fetch_row($select))
    echo '<option value="'.$name_rus.'/'.$id_v.'/'.$upr.'">'.$name_rus.'</option>';
  //            echo "<option value='$name_rus/$id_v/$upr'>$name_rus</option>";
              echo "</select></td>";
?>

<td class="legend"><label for="prejfuqaro"> Previous Citizenship <br><span class="remark_label">(if changed)</span></label>
<?php
$select = mysql_query("SELECT  nomi_eng FROM l_davlat ORDER BY nomi_eng");
echo "<td><select name='prejfuqaro' id='prejfuqaro'>";
echo '<option selected="selected"></option>';
while(list($name_rus) = mysql_fetch_row($select))
{echo "<option>$name_rus</option>"; }
//else {echo "<option>$name_rus</option>";}
echo "</select></td>";
?>
</tr><tr>
<tr></tr><tr></tr>
<td class="legend"><label class="mandatory_label" for="tip">Passport Type</label>
<?php
$select = mysql_query("SELECT NOMI_UZB,id FROM l_dokument ORDER BY ID") or die(mysql_error());
echo "<td><select class='mandatory' name='tip' id='tip'>";
echo '<option selected="selected"></option>';
while(list($name_rus,$id) = mysql_fetch_row($select))
{echo "<option value='$name_rus'>$name_rus</option>"; }
echo "</select></td>";
?>
<td class="legend"><label class="mandatory_label" for=nomer>Passport Number</label></td>
<td><input class="mandatory en123" id="nomer" name="nomer" maxlength="22" value="" type="text"  /></td>
</tr><tr>
<td class="legend"><label class="mandatory_label" for="vidan" >Date of Issue</label></td>
<td><input class="mandatory two_char digit" name="vidan" maxlength="2" type="text" id="vidanDay" value="" size="3">
<select class="mon_combo" name="vidanMonth" id="vidanMonth">
<?php
		for ($i=1;$i<=12;$i++)
		{
			$a=sprintf("%02s",$i);
			 $str=getMonth($i);
             $n=strPos($str,'/');
             $oy=Substr($str,0,$n);
//             $oy_limit=Substr($str,$n+1);
  //           $a=$a."/".$oy_limit;
            echo '<option value="'.$i.'">'.$oy.'</option>';
		}
	/*	{$a=sprintf("%02s",$i);
		if ($a==$vid[1])
		{echo '<option selected="selected" value="'.$a.'">'.getMonth($i).'</option>';}
		else {echo '<option value="'.$a.'">'.getMonth($i).'</option>';	}}
	*/
	echo '</select>';
   	echo "<select class='four_char' name='vidanYear' id='vidanYear'>";
    $Year=date("Y");
    $i=0;
//    for ($i=$year-($year-2012);$i<=$Year+45;$i++)
for ($i=$Year-20;$i<=$Year;$i++)
//     for ($i=$Year;$i<=$Year-45;$i++)
    {
		echo "<option>$i</option>";
	}
	echo "</select></td>";
?>
<td class="legend"><label class="mandatory_label" for=srok>Expiration Date</label></td>
<td><input class="mandatory two_char digit" name="srok" maxlength="2" type="text" id="srokDay" value="" size="3">
<select class="mon_combo" name='srokMonth' id="srokMonth">
<?php
	for ($i=1;$i<=12;$i++)
	{
		$a=sprintf("%02s",$i);
		$str=getMonth($i);
        $n=strPos($str,'/');
        $oy=substr($str,0,$n);
//        $oy_limit=substr($str,$n+1);
  //      $a=$a."/".$oy_limit;
        echo '<option value="'.$i.'">'.$oy.'</option>';
	}
/*		{$a=sprintf("%02s",$i);
		if ($a==$sr[1])
		{echo '<option selected="selected" value="'.$a.'">'.getMonth($i).'</option>';}
		else {echo '<option value="'.$a.'">'.getMonth($i).'</option>';	}}
*/
	echo '</select>';
	echo "<select class='four_char' name='srokYear' id='srokYear'>";
    $Year=date("Y");
    $i=0;
//    for ($i=$year-($year-2012);$i<=$Year+45;$i++)
     for ($i=$Year;$i<=$Year+45;$i++)
    {
		echo "<option>$i</option>";
	}
	echo "</select></td>";
	echo "</select></td>";
?>
</tr><tr>
<td class="legend"><label class="mandatory_label" for="kem">Issued By</label></td>
<td><input class="mandatory en123" id="kem" name="kem" maxlength="100" value="" type="text"  /></td>
<td class="legend"><label class="mandatory_label" for="oila">&nbsp;Marital Status</label></td>
     <?php
 $select = mysql_query("SELECT NOMI_ENG, id FROM oila") or die(mysql_error());
    echo '<td><select name="sem_pol" id="sem_pol">';
          echo '<option selected="selected"></option>';
         while(list($name_rus,$id) = mysql_fetch_row($select))
  	   {echo "<option value='$name_rus'>$name_rus</option>"; }
        echo "</select></td>";
?>
</tr><tr>
	<td class="legend"><label for="fiosup">Spouse's Surname, First and Other Names<span class="remark_label"></span></label></td>
    <td colspan="3"><input class="en1234" name="fiosup" style="width: 100%;" maxlength="34" id="fiosup" type="text" ></td>
   </tr>
</table></div>