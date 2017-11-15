<div class="block_head"><span>Additional Information</span></div>
<div id="infoblock4" class="step">
<table class="datagrid">
<tr>
<td class="legend"><label class="mandatory_label" for="adressru">Address in Uzbekistan</Label>
<td colspan="3"><textarea class="mandatory en123" name="adressru" maxlength="200" id="adressru" rows="2" cols=250></textarea><span class="remark_label">(address while in Uzbekistan, phone)</span></td>
<td rowspan="4" align="center"><select style="float: right;" multiple disabled="disabled"  size=10 id="fio"></select>
<span><font style="float: right; color:blue;"> <br>List fill form visitor (max: 15 person)</font></span>
</td>
</tr>

<tr>
<td class="legend"><label class="mandatory_label" for="avvalkir">Previous Visits to Uzbekistan</Label>
<td colspan="3"><textarea class="mandatory en123" name="avvalkir" maxlength="200" id="avvalkir" rows="2" cols=76></textarea><span class="remark_label">(date, purpose and inviting party)</span></td>
<td></td>
</tr>

<tr>
<td class="legend"><label class="mandatory_label" for="fio_deti">Accompanied Persons</Label>
<td colspan="3"><textarea class="mandatory en123" name="fio_deti" maxlength="200" id="fio_deti" rows="2" cols=76></textarea><span class="remark_label">(persons travelling together and inserted into applicant's passport)</span></td>
<td></td>
</tr>

<tr>
<td class="legend"><label class="mandatory_label" for="job">Occupation</label></td>
               <?php
               $select = mysql_query("SELECT  kod,eng_nomi FROM faoliyat ORDER BY id");
               echo "<td><select class='mandatory' style='width:105%; _width: 500px;' name='job' id='job'>";
           	$i=0;
           while(list($kod, $name_rus) = mysql_fetch_row($select))
           {
               if ($i==0) {echo '<option selected="selected" value="'.$name_rus.'/'.$kod.'">'.$name_rus.'</option>'; }
            else {echo "<option value='$name_rus/$kod'>$name_rus</option>";}
			$i++;
           }
              echo "</select></td>";
                ?>
<td></td>
</tr>

<tr>
<td class="legend"><label class="mandatory_label" for="job2">Place of Work (Study) and Position</label>
<td colspan="3"><textarea class="mandatory en123" name="job2" MaxLength="200" id="job2" rows="2" cols=76></textarea> <span class="remark_label">(full name of organization and applicant's position)</span></td>
<td></td>
</tr>

<tr>
<td class="legend"><label class="mandatory_label" for="jobadres">Work (Study) Address and Phone</label>
<td colspan="3"><textarea class="mandatory en123" name="jobadres" maxlength="200" id="jobadres" rows="2" cols=76></textarea><span class="remark_label">(coutry, city, street, house No., phone and email)</span></td>
<td></td>
</tr><tr>
<td class="legend"><label class="mandatory_label" for="mesto_propis">Home Address,Phone and E-mail</label>
<td colspan="3"><textarea class="mandatory en123" name="mesto_propis" maxlength="200" id="mesto_propis" rows="2" cols=76></textarea><span class="remark_label">country, city, street, house No., phone and email)</span></td>
<td></td>
</tr>
</table>
</div>
<!--
	<table>
		<tr><td style="padding-left: 580px;" align="center">

		</td></tr>
	</table>

    -->
   <div class="ajax-fc-container" ></div>
   <br>

<!--  <button id="b_edit" type="button" >Редактировать </button>    -->
      <button id="pechat"  type="button" onClick="return submit_form(this.form);">Continue (print form)</button>
      <button id="registerButton2" type="button" onClick="return nextClient(this.form);">Add next person (for persons travelling together)</button>
<!--      <button id="ochistit" type="reset" onClick="enabdisab(1);">Clear form</button> -->

</div>