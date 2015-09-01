<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html><head>
<meta content="text/html; charset=ISO-8859-1" http-equiv="content-type"><title>Perpetual Calendar for the years 1753 - 3000</title>
<meta content="NosyMotorist" name="author"><script src = "../jquery/jquery.min.js"></script><! Point this at any jquery instance><script type='text/javascript'>$(document).ready(function(){unhidegrid()});</script>


</head>
<body ONLOAD="onload="init()" style="color: rgb(0, 0, 0); background-color: rgb(204, 204, 204);" alink="#000099" link="#000099" vlink="#990099">
<?php
	IF(!isset($_GET['month'])) {
	$year = date('Y');
	$month = date('m');
	}else {
		$month = htmlspecialchars($_GET['month']);
		$year = htmlspecialchars($_GET['year']);
		}
	$day = date('j');
	echo"<script type='text/javascript'>var thismonth = $month;var thisyear = $year; thisday= $day;</script>";
	
	$months = array(0=>'Err',1=>'Jan',2=>'Feb',3=>'Mar',4=>'Apr',5=>'May',6=>'Jun',7=>'Jul',8=>'Aug',9=>'Sep',10=>'Oct',11=>'Nov',12=>'Dec',13>'Err');
	$dayname = array(1=>'Sun',2=>'Mon',3=>'Tue',4=>'Wed',5=>'Thu',6=>'Fri',7=>'Sat');
	$leaps = floor(($year-1753)/4);
	$leapornot = $year%4;
	$century = (($year%100 == 0)&&(!($year%400 == 0)));
//
if (($leapornot == 0)&&(!($century))){
	$alldays = array(0=>55,1=>31,2=>29,3=>31,4=>30,5=>31,6=>30,7=>31,8=>31,9=>30,10=>31,11=>30,12=>31);}
else {
	$alldays = array(0=>55,1=>31,2=>28,3=>31,4=>30,5=>31,6=>30,7=>31,8=>31,9=>30,10=>31,11=>30,12=>31);}
//
if ($year > 1800) {$leaps=$leaps-1;}
if ($year > 1900) {$leaps=$leaps-1;}
if ($year > 2100) {$leaps=$leaps-1;}
if ($year > 2200) {$leaps=$leaps-1;}
if ($year > 2300) {$leaps=$leaps-1;}
if ($year > 2500) {$leaps=$leaps-1;}
if ($year > 2600) {$leaps=$leaps-1;}
if ($year > 2700) {$leaps=$leaps-1;}
if ($year > 2900) {$leaps=$leaps-1;}
	$newyearsday = 1+(((($year-1752)*365)+$leaps)%7);
	$thefirst = $newyearsday;
//
	$mcounter = 1;
if ($month != 1){
	while ($mcounter < $month){
	$thefirst +=$alldays[$mcounter];
	$mcounter +=1;
	}
	$thefirst = $thefirst%7;
//
if ($thefirst == 0) {$thefirst=7;}
	}
?><!document.bigbox.yearblank.focus()>
<a href="../index.php"><img style="border: 0px solid ; width: 1341px; height: 212px;" alt="Life on the road, commuting to work" title="Life on the road, commuting to work" src="../images/header.jpg"></a>
<table style="text-align: left; background-color: rgb(204, 204, 204); width: 1313px; height: 1988px;" border="0" cellpadding="1" cellspacing="0">
<tbody>
<tr>
<td style="width: 114px; vertical-align: top;"><br>
</td>
<td style="width: 579px; vertical-align: top; align: center; font-size: 14pt; font-family: Arial;"><br><table><tr><td style="width: 25%;"></td><td>
<! onchange=\"chgmonth()\">
<?php 
	echo "<form action=\"./\" name=\"bigbox\" id=\"bigbox\" method=\"post\"><input type=\"button\" VALUE=\"<-\" onclick=\"lastmonth()\"/>&nbsp;&nbsp;&nbsp;&nbsp;<select id=\"monthblank\" onchange=\"chgmonth()\">\n";
	$counter = 1;
while ($counter < 13){
	if ($counter == $month){
		echo "\t<option value=\"$counter\" id=\"sel$counter\" selected> $months[$counter] </option>\n";
	}else	{
		echo "\t<option value=\"$counter\" id=\"sel$counter\"> $months[$counter] </option>\n";
			}
	$counter +=1;
}
	echo"</select>&nbsp;&nbsp;&nbsp;&nbsp;<INPUT TYPE=\"text\" NAME=\"yearblank\" style=\"font-size: 10pt; font-family: Arial; color: red;\" SIZE=\"4\" maxlength=\"4\" value=\"".$year."\" onkeyup=\"pop(this)\" onchange=\"chgyear()\" autocomplete=\"off\">&nbsp;&nbsp;&nbsp;&nbsp;<input type=\"button\" VALUE=\"Today\" onclick=\"backtotoday()\"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type=\"button\" VALUE=\"->\" onclick=\"nextmonth()\"/><br><small><br></small><table id = \"cbox\" style = \"display: none;\"><tr>";
	$counter = 2-$thefirst;
	$lastday = $alldays[intval($month)];
//
//   Puting day names across the top of the calendar
	$column =1;
while ($column <= 7){
	echo "<td style=\"width: 40px; text-align: center;\">$dayname[$column]</td>";
	$column +=1;
	}
//
//  Creating six rows and populating them with columns
	$row = 1;
while ($row <= 6){
	echo "<tr>";
	$column =1;
	while ($column <= 7){
		$box = (($row-1)*7)+$column;
		echo "<td id=\"box$box\" style=\"text-align: right;\">";
		if ($counter > 0 && $counter <= $lastday){
			if ($counter == $day){
			echo "<u>".$counter."</u>";
			}
			else {echo $counter;}
			}
		$counter +=1;
		echo "</td>";
		$column +=1;
		}
	echo "</tr>\n";
	$row +=1;
	}
	echo"</table>";
?>
<span id='fb'></span><script type="text/javascript" src="./pcalendar.js">init();</script></form>
<br><br></td></tr></table><table><tr><td style="width: 10%;"></td><td>Select any month in a year between 1753 and 3000<br><br><small>Why 1753?&nbsp;&nbsp;This is the first year of the calendar we are familiar with; the previous year was shortened by 11 days to compensate for drift between the actual orbital year and that as calculated.</small><td style="width: 10%;"></td></td></tr></table></td><td style="width: 605px; background-color: silver; vertical-align: top;"><br>
</td></tr></tbody></table><br>
</body></html>
