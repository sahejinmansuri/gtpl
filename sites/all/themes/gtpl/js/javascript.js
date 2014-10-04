var url_global = 'http://localhost/drupal/gtpl/gtpl_local/gtpl_5_9/';
function ajax_alacarte()
{
	var xmlhttp;
	if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}else{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function(){
		if (xmlhttp.readyState==4 && xmlhttp.status==200){
			document.getElementById("ajax_alacart").innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET",url_global+"ajax/alacart.php",true);
	xmlhttp.send();
	return false;
}
function form_submit(nid,checkbox_id){
	//document.getElementById("ala_carte_channel_"+nid).checked = true;
	//document.getElementById("ala_carte_channel_"+nid).checked = true;
	//document.cookie="submit=Submit";
	//document.certform.submit();
	
	var checkbox = document.getElementById("ala_carte_channel_"+checkbox_id).checked;
	
	var xmlhttp;
	if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}else{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function(){
		if (xmlhttp.readyState==4 && xmlhttp.status==200){
			document.getElementById("ajax_alacart").innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET",url_global+"ajax/alacart.php?nid="+nid+"&checkbox_id="+checkbox_id+"&checkbox="+checkbox,true);
	xmlhttp.send();
}

function disable_ajax(){
	document.getElementById("ajax_load_page").style.display = 'none';
}

function ajax_bb_selection(tid,id){
	var xmlhttp;
	document.getElementById("plan_titleouter"+id).style.display = 'block';
	document.getElementById("ajax_load_page").style.display = 'block';
	ajax_bb_more_info(tid,id);
	if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}else{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function(){
		if (xmlhttp.readyState==4 && xmlhttp.status==200){
			document.getElementById("selected_bb_plan").innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET",url_global+"ajax/selected_bb_plan.php?tid="+tid+"&id="+id,true);
	xmlhttp.send();
}
function ajax_bb_more_info(tid,id){
	var xmlhttp;
	if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}else{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function(){
		if (xmlhttp.readyState==4 && xmlhttp.status==200){
			document.getElementById("plan_titleouter"+id).innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET",url_global+"ajax/selected_bb_info.php?tid="+tid+"&id="+id,true);
	xmlhttp.send();
}
function redirect_function(url,kolkata){
	var city = document.getElementById('area_selection').value;
	var array_channel = new Array('205','206','483','515','572','573','574');
	for (var i in array_channel) {
		var put_data = document.getElementById('area_selected_'+array_channel[i]);
		if(put_data != null){
			document.getElementById('area_selected_'+array_channel[i]).value = city;
		}
	}
	
	/*document.getElementById('area_selected_205').value = city;
	document.getElementById('area_selected_206').value = city;
	document.getElementById('area_selected_483').value = city;
	document.getElementById('area_selected_515').value = city;
	document.getElementById('area_selected_572').value = city;
	document.getElementById('area_selected_573').value = city;
	document.getElementById('area_selected_574').value = city;*/

	if(city == "75"){
		window.open(kolkata);
	}else if(city == "74"){
		window.open(url+"/node/216");
	}else if(city == "72"){
		window.open(url+"/node/477", "_self");
	}else if(city == "73"){
		window.open(url+"/node/478", "_self");
	}
}

function redirect_page_function(url,kolkata){
	var city = document.getElementById('area_selection').value;
	if(city == "75"){
		window.open(kolkata);
	}else if(city == "74"){
		window.open(url+"/node/216");
	}else if(city == "72"){
		window.open(url+"/node/477", "_self");
	}else if(city == "73"){
		window.open(url+"/node/478", "_self");
	}
}

function redirect_page_bb_function(){
	var city = document.getElementById('area_selection').value;
	if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}else{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function(){
		if (xmlhttp.readyState==4 && xmlhttp.status==200){
			document.getElementById("selected_coty_session").innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET",url_global+"ajax/selected_city_session.php?city="+city,true);
	xmlhttp.send();
	
}
function check_all(nid,json){
	var i = 0;
	json_js = new Array();
	var json = json.replace(/@/g, '"');
	
	var json_js = json.replace(']', '');
	var json_js = json_js.replace('[', '');
	var json_js = json_js.replace(/"/g, '');
	var res = json_js.split(','); 
	
	var channels = document.getElementById('ala_carte_channels');
	var array_channel = new Array();
	for (var i in res) {
	  //alert(res[i]);
	  var channel = document.getElementById('ala_carte_channel_'+res[i]);
		if(channel != null){
			if(channels.checked == true){
				channel.checked = true;
				array_channel[i] = res[i];
			}else{
				channel.checked = false;
			}
		}
	}
}
function selectarea(val){
	var x = document.getElementById("edit-submitted-area-1");
	//edit-submitted-select-city
	var length = x.options.length;
	
	var i = 0;
	for (i = 0; i < length; i++) {
	  x.options[i] = null;
	}
	
	for (j = 0; j < 10; j++) {
		var length = x.options.length;
		if(length != 0){
			for (i = 0; i < length; i++) {
				x.options[i] = null;
			}
		}
	}
	
	
	var option0 = document.createElement("option");
	option0.text = "Select Area";
	option0.value = "";
	x.add(option0);
	x.disabled= true;
	
	if(val == "AHMEDABAD"){
		x.disabled= false;
		var option1 = document.createElement("option");
		option1.text = option1.value = "KHAMBHATT UNIT";
		x.add(option1);
		
		var option2 = document.createElement("option");
		option2.text = option2.value = "MEHSANA UNIT";
		x.add(option2);
		
		var option3 = document.createElement("option");
		option3.text = option3.value = "MANINAGAR UNIT";
		x.add(option3);
		
		var option4 = document.createElement("option");
		option4.text = option4.value = "SABARMATI UNIT";
		x.add(option4);
		
		var option5 = document.createElement("option");
		option5.text = option5.value = "PALDI UNIT";
		x.add(option5);
		
		var option6 = document.createElement("option");
		option6.text = option6.value = "GANDHINAGAR UNIT";
		x.add(option6);
		
		var option7 = document.createElement("option");
		option7.text = option7.value = "C G ROAD UNIT";
		x.add(option7);
		
		var option8 = document.createElement("option");
		option8.text = option8.value = "BAPUNAGAR UNIT";
		x.add(option8);
		
		var option9 = document.createElement("option");
		option9.text = option9.value = "NADIAD UNIT";
		x.add(option9);
		
		var option10 = document.createElement("option");
		option10.text = option10.value = "HIMMATNAGAR UNIT";
		x.add(option10);
		
		var option11 = document.createElement("option");
		option11.text = option11.value = "ANAND UNIT";
		x.add(option11);
		
		var option12 = document.createElement("option");
		option12.text = option12.value = "MODASA UNIT";
		x.add(option12);
		
		var option13 = document.createElement("option");
		option13.text = option13.value = "KALOL UNIT";
		x.add(option13);
		
		var option14 = document.createElement("option");
		option14.text = option14.value = "SURENDRANAGAR UNIT";
		x.add(option14);
		
		var option15 = document.createElement("option");
		option15.text = option15.value = "PALANPUR UNIT";
		x.add(option15);
		
	}else if(val == "BARODA"){
		x.disabled= false;
	
		var option1 = document.createElement("option"); 
		option1.text = option1.value = "BARODA UNIT";
		x.add(option1);
	
		var option2 = document.createElement("option");
		option2.text = option2.value = "PRATAP NAGAR UNIT";
		x.add(option2);
	
		var option3 = document.createElement("option");
		option3.text = option3.value = "RACE COURSE UNIT";
		x.add(option3);
	
		var option4 = document.createElement("option");
		option4.text = option4.value = "WARASHIYA UNIT";
		x.add(option4);
	
		var option5 = document.createElement("option");
		option5.text = option5.value = "GODHARA UNIT";
		x.add(option5);
	
		var option6 = document.createElement("option");
		option6.text = option6.value = "BHARUCH UNIT";
		x.add(option6);
	}
	else if(val == "NAGPUR"){
		x.disabled= false;
	
		var option1 = document.createElement("option"); 
		option1.text = option1.value = "NAGPUR UNIT";
		x.add(option1);
	
		var option2 = document.createElement("option");
		option2.text = option2.value = "CHANDRAPUR UNIT";
		x.add(option2);
	
	}else if(val == "PUNE"){
		x.disabled= false;
	
		var option1 = document.createElement("option"); 
		option1.text = option1.value = "PUNE UNIT";
		x.add(option1);
	
		var option2 = document.createElement("option");
		option2.text = option2.value = "SATARA UNIT";
		x.add(option2);
	
	}else if(val == "KOLKATA"){
		x.disabled= false;
	
		var option1 = document.createElement("option"); 
		option1.text = option1.value = "KOLKATA UNIT";
		x.add(option1);
		
	}else if(val == "RAJKOT"){
		x.disabled= false;
	
		var option1 = document.createElement("option"); 
		option1.text = option1.value = "GANDHIDHAM UNIT";
		x.add(option1);
	
		var option2 = document.createElement("option");
		option2.text = option2.value = "VERAVAL UNIT";
		x.add(option2);
	
		var option3 = document.createElement("option");
		option3.text = option3.value = "PORBANDAR UNIT";
		x.add(option3);
	
		var option4 = document.createElement("option");
		option4.text = option4.value = "JUNAGADH UNIT";
		x.add(option4);
	
		var option5 = document.createElement("option");
		option5.text = option5.value = "RAJKOT UNIT";
		x.add(option5);
	
	}else if(val == "SURAT"){
		x.disabled= false;
	
		var option1 = document.createElement("option"); 
		option1.text = option1.value = "DL CABNET(SURAT) UNIT";
		x.add(option1);
	
		var option2 = document.createElement("option");
		option2.text = option2.value = "KAILASH NAGAR UNIT";
		x.add(option2);
	
		var option3 = document.createElement("option");
		option3.text = option3.value = "ADAJAN UNIT";
		x.add(option3);
	
		var option4 = document.createElement("option");
		option4.text = option4.value = "NAVSARI UNIT";
		x.add(option4);
	
		var option5 = document.createElement("option");
		option5.text = option5.value = "VALSAD UNIT";
		x.add(option5);
		
		var option6 = document.createElement("option");
		option6.text = option5.value = "MANCHARPURA UNIT";
		x.add(option6);
		
		var option7 = document.createElement("option");
		option7.text = option5.value = "RAJWADI UNIT";
		x.add(option7);
	
	}else if(val == "UDAIPUR"){
		x.disabled= false;
	
		var option1 = document.createElement("option"); 
		option1.text = option1.value = "UDAIPUR UNIT";
		x.add(option1);
		
	}else if(val == "OUT STATION"){
		x.disabled= false;
	
		var option1 = document.createElement("option"); 
		option1.text = option1.value = "OUT STATION UNIT";
		x.add(option1);
		
	}else if(val == "INDORE"){
		x.disabled= false;
	
		var option1 = document.createElement("option"); 
		option1.text = option1.value = "INDORE UNIT";
		x.add(option1);
		
	}else if(val == "SOLAPUR"){
		x.disabled= false;
	
		var option1 = document.createElement("option"); 
		option1.text = option1.value = "SOLAPUR UNIT";
		x.add(option1);
		
	}else if(val == "VISAKHAPATNAM"){
		x.disabled= false;
	
		var option1 = document.createElement("option"); 
		option1.text = option1.value = "VISAKHAPATNAM UNIT";
		x.add(option1);
		
	}else if(val == "ASSAM"){
		x.disabled= false;
	
		var option1 = document.createElement("option"); 
		option1.text = option1.value = "GUWAHATI UNIT";
		x.add(option1);

		var option2 = document.createElement("option");
		option2.text = option2.value = "DIBRUGARH UNIT";
		x.add(option2);
	
		var option3 = document.createElement("option");
		option3.text = option3.value = "JORHAT UNIT";
		x.add(option3);
		
	}else if(val == "PATNA"){
		x.disabled= false;
	
		var option1 = document.createElement("option"); 
		option1.text = option1.value = "PATNA UNIT";
		x.add(option1);

		var option2 = document.createElement("option");
		option2.text = option2.value = "GAYA UNIT";
		x.add(option2);
			
	}else if(val == "RANCHI"){
		x.disabled= false;
	
		var option1 = document.createElement("option"); 
		option1.text = option1.value = "RANCHI UNIT";
		x.add(option1);

		var option2 = document.createElement("option");
		option2.text = option2.value = "DHANBAD UNIT";
		x.add(option2);
			
	}
}
function selectarea_bb(val){
	var x = document.getElementById("edit-submitted-area-broadband");
	//edit-submitted-select-city
	var length = x.options.length;
	
	var i = 0;
	for (i = 0; i < length; i++) {
	  x.options[i] = null;
	}
	
	for (j = 0; j < 10; j++) {
		var length = x.options.length;
		if(length != 0){
			for (i = 0; i < length; i++) {
				x.options[i] = null;
			}
		}
	}
	
	
	var option0 = document.createElement("option");
	option0.text = "Select Area";
	option0.value = "";
	x.add(option0);
	x.disabled= true;
	
	if(val == "AHMEDABAD"){
		x.disabled= false;
		var option1 = document.createElement("option");
		option1.text = option1.value = "KHAMBHATT UNIT";
		x.add(option1);
		
		var option2 = document.createElement("option");
		option2.text = option2.value = "MEHSANA UNIT";
		x.add(option2);
		
		var option3 = document.createElement("option");
		option3.text = option3.value = "MANINAGAR UNIT";
		x.add(option3);
		
		var option4 = document.createElement("option");
		option4.text = option4.value = "SABARMATI UNIT";
		x.add(option4);
		
		var option5 = document.createElement("option");
		option5.text = option5.value = "PALDI UNIT";
		x.add(option5);
		
		var option6 = document.createElement("option");
		option6.text = option6.value = "GANDHINAGAR UNIT";
		x.add(option6);
		
		var option7 = document.createElement("option");
		option7.text = option7.value = "C G ROAD UNIT";
		x.add(option7);
		
		var option8 = document.createElement("option");
		option8.text = option8.value = "BAPUNAGAR UNIT";
		x.add(option8);
		
		var option9 = document.createElement("option");
		option9.text = option9.value = "NADIAD UNIT";
		x.add(option9);
		
		var option10 = document.createElement("option");
		option10.text = option10.value = "HIMMATNAGAR UNIT";
		x.add(option10);
		
		var option11 = document.createElement("option");
		option11.text = option11.value = "ANAND UNIT";
		x.add(option11);
		
		var option12 = document.createElement("option");
		option12.text = option12.value = "MODASA UNIT";
		x.add(option12);
		
		var option13 = document.createElement("option");
		option13.text = option13.value = "KALOL UNIT";
		x.add(option13);
		
		var option14 = document.createElement("option");
		option14.text = option14.value = "SURENDRANAGAR UNIT";
		x.add(option14);
		
		var option15 = document.createElement("option");
		option15.text = option15.value = "PALANPUR UNIT";
		x.add(option15);
		
		var option16 = document.createElement("option");
		option16.text = option16.value = "VISION MANINAGAR UNIT";
		x.add(option16);
		
		var option17 = document.createElement("option");
		option17.text = option17.value = "VISION HAVELI UNIT";
		x.add(option17);
		
	}else if(val == "BARODA"){
		x.disabled= false;
	
		var option1 = document.createElement("option"); 
		option1.text = option1.value = "BARODA UNIT";
		x.add(option1);
	
		var option2 = document.createElement("option");
		option2.text = option2.value = "PRATAP NAGAR UNIT";
		x.add(option2);
	
		var option3 = document.createElement("option");
		option3.text = option3.value = "RACE COURSE UNIT";
		x.add(option3);
	
		var option4 = document.createElement("option");
		option4.text = option4.value = "WARASHIYA UNIT";
		x.add(option4);
	
		var option5 = document.createElement("option");
		option5.text = option5.value = "GODHARA UNIT";
		x.add(option5);
	
		var option6 = document.createElement("option");
		option6.text = option6.value = "BHARUCH UNIT";
		x.add(option6);
		
		var option7 = document.createElement("option"); 
		option7.text = option7.value = "BODELI UNIT";
		x.add(option7);
	
		var option8 = document.createElement("option");
		option8.text = option8.value = "DABHOI UNIT";
		x.add(option8);
	
		var option9 = document.createElement("option");
		option9.text = option9.value = "DAHOD UNIT";
		x.add(option9);
	
		var option10 = document.createElement("option");
		option10.text = option10.value = "HALOL UNIT";
		x.add(option10);
	
		var option11 = document.createElement("option");
		option11.text = option11.value = "KAALOL UNIT";
		x.add(option11);
	
		var option12 = document.createElement("option");
		option12.text = option12.value = "PADRA UNIT";
		x.add(option12);
	}
	else if(val == "NAGPUR"){
		x.disabled= false;
	
		var option1 = document.createElement("option"); 
		option1.text = option1.value = "NAGPUR UNIT";
		x.add(option1);
	
		var option2 = document.createElement("option");
		option2.text = option2.value = "CHANDRAPUR UNIT";
		x.add(option2);
	
	}else if(val == "PUNE"){
		x.disabled= false;
	
		var option1 = document.createElement("option"); 
		option1.text = option1.value = "PUNE UNIT";
		x.add(option1);
	
		var option2 = document.createElement("option");
		option2.text = option2.value = "SATARA UNIT";
		x.add(option2);
	
	}else if(val == "KOLKATA"){
		x.disabled= false;
	
		var option1 = document.createElement("option"); 
		option1.text = option1.value = "KOLKATA UNIT";
		x.add(option1);
		
	}else if(val == "RAJKOT"){
		x.disabled= false;
	
		var option1 = document.createElement("option"); 
		option1.text = option1.value = "GANDHIDHAM UNIT";
		x.add(option1);
	
		var option2 = document.createElement("option");
		option2.text = option2.value = "VERAVAL UNIT";
		x.add(option2);
	
		var option3 = document.createElement("option");
		option3.text = option3.value = "PORBANDAR UNIT";
		x.add(option3);
	
		var option4 = document.createElement("option");
		option4.text = option4.value = "JUNAGADH UNIT";
		x.add(option4);
	
		var option5 = document.createElement("option");
		option5.text = option5.value = "RAJKOT UNIT";
		x.add(option5);
		
		var option6 = document.createElement("option"); 
		option6.text = option6.value = "AMRELI UNIT";
		x.add(option6);
	
		var option7 = document.createElement("option");
		option7.text = option7.value = "JAMNAGAR UNIT";
		x.add(option7);
	
		var option8 = document.createElement("option");
		option8.text = option8.value = "KUTCH UNIT";
		x.add(option8);
	
		var option9 = document.createElement("option");
		option9.text = option9.value = "MUNDRA UNIT";
		x.add(option9);
	
		var option10 = document.createElement("option");
		option10.text = option10.value = "MORBI UNIT";
		x.add(option10);
	
	}else if(val == "SURAT"){
		x.disabled= false;
	
		var option1 = document.createElement("option"); 
		option1.text = option1.value = "DL CABNET(SURAT) UNIT";
		x.add(option1);
	
		var option2 = document.createElement("option");
		option2.text = option2.value = "KAILASH NAGAR UNIT";
		x.add(option2);
	
		var option3 = document.createElement("option");
		option3.text = option3.value = "ADAJAN UNIT";
		x.add(option3);
	
		var option4 = document.createElement("option");
		option4.text = option4.value = "NAVSARI UNIT";
		x.add(option4);
	
		var option5 = document.createElement("option");
		option5.text = option5.value = "VALSAD UNIT";
		x.add(option5);
		
		var option6 = document.createElement("option");
		option6.text = option5.value = "MANCHARPURA UNIT";
		x.add(option6);
		
		var option7 = document.createElement("option");
		option7.text = option5.value = "RAJWADI UNIT";
		x.add(option7);
	
	}else if(val == "UDAIPUR"){
		x.disabled= false;
	
		var option1 = document.createElement("option"); 
		option1.text = option1.value = "UDAIPUR UNIT";
		x.add(option1);
		
	}else if(val == "OUT STATION"){
		x.disabled= false;
	
		var option1 = document.createElement("option"); 
		option1.text = option1.value = "OUT STATION UNIT";
		x.add(option1);
		
	}else if(val == "INDORE"){
		x.disabled= false;
	
		var option1 = document.createElement("option"); 
		option1.text = option1.value = "INDORE UNIT";
		x.add(option1);
		
	}else if(val == "SOLAPUR"){
		x.disabled= false;
	
		var option1 = document.createElement("option"); 
		option1.text = option1.value = "SOLAPUR UNIT";
		x.add(option1);
		
	}else if(val == "VISAKHAPATNAM"){
		x.disabled= false;
	
		var option1 = document.createElement("option"); 
		option1.text = option1.value = "VISAKHAPATNAM UNIT";
		x.add(option1);
		
	}else if(val == "ASSAM"){
		x.disabled= false;
	
		var option1 = document.createElement("option"); 
		option1.text = option1.value = "GUWAHATI UNIT";
		x.add(option1);

		var option2 = document.createElement("option");
		option2.text = option2.value = "DIBRUGARH UNIT";
		x.add(option2);
	
		var option3 = document.createElement("option");
		option3.text = option3.value = "JORHAT UNIT";
		x.add(option3);
		
	}else if(val == "PATNA"){
		x.disabled= false;
	
		var option1 = document.createElement("option"); 
		option1.text = option1.value = "PATNA UNIT";
		x.add(option1);

		var option2 = document.createElement("option");
		option2.text = option2.value = "GAYA UNIT";
		x.add(option2);
			
	}else if(val == "RANCHI"){
		x.disabled= false;
	
		var option1 = document.createElement("option"); 
		option1.text = option1.value = "RANCHI UNIT";
		x.add(option1);

		var option2 = document.createElement("option");
		option2.text = option2.value = "DHANBAD UNIT";
		x.add(option2);
			
	}
	
}
function city_add(url){
	var a = document.getElementById('area_selection');
	//session.setAttribute('test_variable','value');
	//return false;
	if(a != null){
		window.location.assign(url+"/"+a.value);
	}
}

function display_package(id,nodes){
	var nodes_array = nodes.split("|"); 
	for (i = 0; i < nodes_array.length; i++) {
		document.getElementById('fta_pack_list_'+nodes_array[i]).style.display = 'none';
		document.getElementById('pack_bg_'+nodes_array[i]).className  = 'pack_bg';
	}
	document.getElementById('fta_pack_list_'+id).style.display = 'block';
	document.getElementById('pack_bg_'+id).className = 'pack_bg pack_bg_white';
}