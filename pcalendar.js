// Initialization of a whole lot of variables
var months = new Array; 
months = Array('Err','Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec','Err2');
var leapyears = 0;		
var leapornot = 3;		
var newyearsday = 7;	
var lastday = 31;	
var formdata=document.getElementById("bigbox");	
var monthblank=formdata.elements[1].value;
var yearblank=formdata.elements[2].value;
var monthpush;
var yearpush;
var formact="./?preset=1&month="+monthblank+"&year="+yearblank;
var passes = 1;
var thefirst = 7;
var level = 0;
var delay;
var delay2;
var delay3;
	
function chgyear(){
chgyearormonth();
}

function chgmonth(){
chgyearormonth();
}

function chgyearormonth(){
$("#cbox").hide();
monthblank=formdata.elements[1].value;
yearblank=formdata.elements[2].value;
formact="./?preset=1&month="+monthblank+"&year="+yearblank;
document.getElementById('bigbox').action=formact;
if (!(monthblank >= 13 && monthblank <= 0)){ 
}
else {
monthblank=thismonth;
}
if (yearblank >= 1753 && yearblank <= 3000){ 
}
else {
yearblank=thisyear;
}
setthefirst();
paintgrid();
$("#cbox").fadeIn(500);
if (passes <=0 ){
passes = 1;
delay=setTimeout(function(){fresher()},3000);
}
passes =passes-1;
}

function pop(field){
if(field.value.length >= field.maxLength){
chgyearormonth();
}
}

function unhidegrid(){
$("#cbox").show();
}

function backtotoday(){
formact="./";
document.getElementById('bigbox').action=formact;
fresher();
}

function nextmonth(){
monthblank=formdata.elements[1].value;
yearblank=formdata.elements[2].value;
var msel = "sel"+monthblank;
monthblank =parseInt(monthblank)+1;
if (monthblank >=13){
monthblank = 1;
yearblank = parseInt(yearblank)+1;
}
formact="./?preset=1&month="+monthblank+"&year="+yearblank;
document.getElementById('bigbox').action=formact;
fresher();
}

function lastmonth(){
monthblank=formdata.elements[1].value;
yearblank=formdata.elements[2].value;
var msel = "sel"+monthblank;
monthblank =parseInt(monthblank)-1;
var wtw = monthblank;
if (monthblank <=0){
monthblank = 12;
yearblank = parseInt(yearblank)-1;
}
formact="./?preset=1&month="+monthblank+"&year="+yearblank;
document.getElementById('bigbox').action=formact;
fresher();
}

function fresher(){
//$("#cbox").finish();
var thisform = document.getElementById("bigbox");
thisform.submit();
}

function setthefirst(){
leapyears = Math.floor((yearblank-1753)/4);
if (yearblank>1800){leapyears=leapyears-1};
if (yearblank>1900){leapyears=leapyears-1};
if (yearblank>2100){leapyears=leapyears-1};
if (yearblank>2200){leapyears=leapyears-1};
if (yearblank>2300){leapyears=leapyears-1};
if (yearblank>2500){leapyears=leapyears-1};
if (yearblank>2600){leapyears=leapyears-1};
if (yearblank>2700){leapyears=leapyears-1};
if (yearblank>2900){leapyears=leapyears-1};
newyearsday = 1+((((yearblank-1752)*365)+leapyears)%7);
var index = monthblank;
leapornot = (yearblank%4);
if (leapornot == 0){
	alldays = Array(55,31,29,31,30,31,30,31,31,30,31,30,31);}
else {
	alldays = Array(55,31,28,31,30,31,30,31,31,30,31,30,31);}
	thefirst = newyearsday;
var	mcounter = 1;
if (monthblank != 1){
	while (mcounter < monthblank){
	thefirst +=alldays[mcounter];
	mcounter +=1;
	}
	thefirst = thefirst%7;
if (thefirst == 0) {thefirst=7;}
	}
}

function paintgrid(){
var boxbox = "";
var box = 1;
var counter = 2-thefirst;
var row = 1;
lastday = alldays[monthblank];
while (row <= 6){
	var column =1;
	while (column <= 7){
		box = ((row-1)*7)+column;
		boxbox = "box"+box;
		if (counter > 0 && counter <= lastday){
			if (monthblank == thismonth && counter == thisday){
				document.getElementById(boxbox).innerHTML="<u>"+counter+"</u>";
			}else {
				document.getElementById(boxbox).innerHTML=counter;
				}
		}else {
			document.getElementById(boxbox).innerHTML="";}
		column =column+1;
		counter =counter+1;
		}
	row =row+1;
	}
}
function init(){
// Initialization of a whole lot of variables
var months = new Array; 
months = Array('Err','Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec','Err2');
var leapyears = 0;		
var leapornot = 3;		
var newyearsday = 7;	
var lastday = 31;	
var formdata=document.getElementById("bigbox");	
var monthblank=formdata.elements[0].value;
var yearblank=formdata.elements[1].value;
var monthpush = monthblank;
var yearpush = yearblank;
var formact="./?preset=1&month="+monthblank+"&year="+yearblank;
var passes = 1;
var thefirst = 7;
var delay2;
}
