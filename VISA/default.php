<style>

.tekst {
	color:#666;
	padding-left: 30px;
	padding-right: 50px;
	 /*граница блока*/
	}
li {text-align: left;}
</style>
<P align=center><STRONG>  &nbsp;</STRONG></P>
<div class="tekst">
<H3 align=center><FONT size=3>Visa to Uzbekistan</FONT></H3>
<P align=center><STRONG>Visa Application Forms Page&nbsp;</STRONG></P>
<P align=center><U>System requirements:</U></P>
<div align=width>
<UL>
<LI>Your Internet browser must support 128-bit encryption.
<LI>If you are using Internet Explorer (Windows), the minimum version that will work with this site is version 8.0.
<LI>If you are using Mozilla Firefox, the minimum version that will work with this site is version 3.0.
<LI>If you are using Opera, the minimum version that will work with this site is version 10.
<LI>Enable browser's JavaScript to view page correctly.
<LI>You must have Adobe Acrobat Reader version 5.0 to view and print the completed application form.</LI></UL>
<H3 align=center><FONT size=2><U>How to fill in a form:</U></FONT></H3>
<UL>
<LI>Enter the information requested into the appropriate spaces on the form. Please answer all questions.&nbsp;
<LI>All information filled in must be in English only. Instead letters like Ã, Ö, â, ç, ğ, ñ, ü, ş please enter A, O, a, c, g, n, u, s.
<LI>Review the information you entered for accuracy.
<LI>To fill a form for a next person (for group and in same visa data, up to 15 persons) press Add Next Person.
<LI>Press the Print form button for printing.
<LI>Print the form after it is returned to you and displayed in Adobe Acrobat and submit it to the diplomatic mission of the Republic of Uzbekistan.

<!--<H3 align=center><FONT size=2><a href="?action=vvod">«SIGUIENTE»</a> -->
<table>
<tr>
<td><div style="text-align: center; margin-right: auto; margin-left: 360px; margin-top:10px;"><button type="button" onclick="return navigate('?action=vvod');">Next</button></div></td>
<td><div style="text-align: center; margin-right: auto; margin-left: 215px; margin-top:10px;"><button type="button" onclick=location.href="?action=shtrix&id=1;">Check visa status</button></div> </td>
</tr>
</table>
</div>
<script type="text/javascript">
$(document).ready(function()
{
$("#topnav li").prepend("<span></span>"); //????????? ?????? ??? <span> ?? ??????? ???????? ??????.
$("#topnav li").each(function() { //??? ??????? ???????? ??????...
var linkText = $(this).find("a").html(); //??????? ????? ?????? ????
$(this).find("span").show().html(linkText); //????????? ????? ? ??? <span>
});
$("#topnav li").hover(function() {	//??? ????????? ????
$(this).find("span").stop().animate({
marginTop: "-40" //??????? ??? <span> ? ?????????? ??? ????? ?? 40px
}, 250);
} , function() { //????? ????, ??? ?????? ????? ? ????????...
$(this).find("span").stop().animate({
marginTop: "0" //?????????? ??? <span> ? ????????? ?????????????? (0px)
}, 250);
});
});
function navigate(url)
{
      window.location.assign(url);
}

</script>
