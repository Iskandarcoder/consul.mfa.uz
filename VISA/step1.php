<div id="main_block">
<div class="block_head"><span>Personal Information</span></div>
<div id="infoblock1" class="step">
<table class="datagrid">
<tr>
 <td class="legend"><label class="mandatory_label" for="fam" >Surname</label></td>
<td><?php echo "<input  class='mandatory en' id='fam' name='fam'  maxlength='50'value=''/>";?></td>
<td class="legend"><label for="prejfam"> Previous Surname</label></td>
<td><?php echo "<input class='en' id='prejfam' name='prejfam' maxlength='50' style='width:100%; _width: 200px;' value=''/>";?><span class="remark_label">(if changed)</span></td>
<td rowspan="5"><div class="photo_block" name="uploadOutput" id="uploadOutput" ></div></td>
</tr>

<tr>
<td class="legend"><label class="mandatory_label" for="ism" >First Name</label></td>
<td><?php echo "<input class='mandatory en' id='ism' name='ism' maxlength='50' value=''/>";?></td>
<td class="legend"><label for="prejism">Previous First Name</label></td>
<td><?php echo "<input class='en' id='prejism' name='prejism' maxlength='50' style='width:100%; _width: 200px;' value=''/>";?><span class="remark_label">(if changed)</span></td>
<td></td>
</tr>

<tr>
<td class="legend"><label for="sharif" >Other Names</Label></td>
<td><?php echo "<input class='en' id='sharif' name='sharif' maxlength='50' value=''/>";?></td>
<td class="legend"><label for="prejsharif">Previous Other Names</label></td>
<td><?php echo "<input class='en' id='prejsharif' name='prejsharif' maxlength='50' style='width:100%; _width: 200px;' value=''/>";?><span class="remark_label">(if changed)</span></td>
<td></td>
</tr>

<tr>
<td class="legend"><label for="photo">Loading photo</Label></td>
<td colspan="2"><input name="fileToUpload" id="fileToUpload"  size="32"  border="0" type="file"  onchange="return true;"/></td>
<td></td>
<input id="fileup" name="fileup" type="hidden" value="  ">
</table>

