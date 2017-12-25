var xmlHttp = getXMLHTTPRequest();

function getXMLHTTPRequest(){
	var xmlHttp;

	if (window.ActiveXObject){
		try{
			xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
		}catch(e){
			xmlHttp=false;
		}
	}else {try{
		xmlHttp=new XMLHttpRequest();
	}catch(e){
		xmlHttp=false;
	}
	}
	if (!xmlHttp){
		alert("cannot create xmlHttp object");
	}else{
		return xmlHttp;
	}
}

function getStatusRequest(productID){
	
	var status = document.getElementById("statuslist").value;
	var id = productID;

	if ((xmlHttp.readyState == 0)||  (xmlHttp.readyState == 4)){

		xmlHttp.open("post", "productStatus.php", true);
		xmlHttp.onreadystatechange=statusCallback;
		xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xmlHttp.send("status="+status+"&id="+id);
	}
	
	

}






function statusCallback(){
	
	if (xmlHttp.readyState == 4){
		if (xmlHttp.status == 200){
			var xmlResponse = xmlHttp.responseXML;
			sid = xmlResponse.getElementsByTagName('id')[0].childNodes[0].nodeValue;
			txt = "aStatus"+sid;
			if(document.getElementById(txt).innerHTML == "Sold"){
				document.getElementById(txt).innerHTML = "Accepted";
			}else{
				document.getElementById(txt).innerHTML = "Sold";
			}
		}	
		
	}
	
	
}


     
    
    
    

	
	


