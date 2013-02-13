/*
	*	Original script by: Shafiul Azam
	*	ishafiul@gmail.com
	*	Version 3.0
	*	Modified by: Luigi Balzano
					 Shengqian Liu
	*	Description:
	*	Inserts Countries and/or States as Dropdown List
	*	How to Use:

		In Head section:
		<script type= "text/javascript" src = "countries.js"></script>
		In Body Section:
		Select Country:   <select onchange="print_state('state',this.selectedIndex);" id="country" name ="country"></select>
		<br />
		City/District/State: <select name ="state" id ="state"></select>
		<script language="javascript">print_country("country");</script>	

	*
	*	License: OpenSource, Permission for modificatin Granted, KEEP AUTHOR INFORMATION INTACT
	*	Aurthor's Website: http://shafiul.progmaatic.com
	*
*/
var state_arr = new Array("Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","District of Columbia","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Carolina","North Dakota","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington|West Virginia","Wisconsin","Wyoming");
var statev_arr = new Array("AL","AK","AZ","AR","CA","CO","CT","DE","DC","FL","GA","HI","ID","IL","IN","IA","KS","KY","LA","ME","MD","MA","MI","MN","MS","MO","MT","NE","NV","NH","NJ","NM","NY","NC","ND","OH","OK","OR","PA","RI","SC","SD","TN","TX","UT","VT","VA","WA|WV","WI","WY");
var s_a = new Array();
s_a[0]="";
s_a[1]="Montgomery";
s_a[2]="";
s_a[3]="Tucson|Phoenix|Mesa";
s_a[4]="Little Rock";
s_a[5]="San Jose|San Francisco|San Diego|Sacramento|Oakland|Los Angeles|Long Beach|Fresno";
s_a[6]="Denver|Colorado Springs|Aurora";
s_a[7]="Hartford";
s_a[8]="";
s_a[9]="Washington";
s_a[10]="Tampa|Tallahassee|Miami|Orlando";
s_a[11]="Atlanta";
s_a[12]="Honolulu";
s_a[13]="Boise";
s_a[14]="Chicago";
s_a[15]="Indianapolis";
s_a[16]="Des Moines";
s_a[17]="Wichita";
s_a[18]="Louisville";
s_a[19]="New Orleans";
s_a[20]="";
s_a[21]="Baltimore";
s_a[22]="Boston";
s_a[23]="Detroit";
s_a[24]="Minneapolis";
s_a[25]="Jackson";
s_a[26]="St. Louis|Kansas City";
s_a[27]="Billings";
s_a[28]="Omaha|Lincoln";
s_a[29]="Las Vegas|Henderson";
s_a[30]="Manchester";
s_a[31]="Neward|Jersey City";
s_a[32]="Albuquerque";
s_a[33]="New York|Buffalo";
s_a[34]="Charlotte|Raleigh";
s_a[35]="Fargo";
s_a[36]="Columbus|Cleveland|Cincinnati";
s_a[37]="Tulsa|Oklahoma City";
s_a[38]="Portland";
s_a[39]="Philadelphia";
s_a[40]="Providence";
s_a[41]="Columbia";
s_a[42]="Sioux Falls";
s_a[43]="Nashville|Memphis";
s_a[44]="San Antonio|Houston|Fort Worth|El Paso|Dallas|Austin";
s_a[45]="Salt Lake City";
s_a[46]="";
s_a[47]="Virginia Beach";
s_a[48]="Seattle";
s_a[49]="Milwaukee|Madison";
s_a[50]="";








function print_state(state_id){
	// given the id of the <select> tag as function argument, it inserts <option> tags
	var option_str = document.getElementById(state_id);
	option_str.length=0;
	option_str.options[0] = new Option('Select State','');
	option_str.selectedIndex = 0;
	for (var i=0; i<state_arr.length; i++) {
		option_str.options[option_str.length] = new Option(state_arr[i],statev_arr[i]);
	}
}

function print_city(city_id, city_index){
	var option_str = document.getElementById(city_id);
	option_str.length=0;	// Fixed by Julian Woods
	option_str.options[0] = new Option('Select City','');
	option_str.selectedIndex = 0;
	var city_arr = s_a[city_index].split("|");
	for (var i=0; i<city_arr.length; i++) {
		option_str.options[option_str.length] = new Option(city_arr[i],city_arr[i]);
	}
}
