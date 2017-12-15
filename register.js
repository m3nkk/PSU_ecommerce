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

function getIdRequest(){
	
	var id = document.getElementById("reg_studentid").value;
	
	
	
	
		if ((xmlHttp.readyState == 0)||  (xmlHttp.readyState == 4)){
			
			xmlHttp.open("post", "checkId.php?", true);
			xmlHttp.onreadystatechange=idCallback;
			xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlHttp.send("id="+id);
		}
	
		

}

function idCallback(){
	
	if (xmlHttp.readyState == 4){
		if (xmlHttp.status == 200){
			
			
			
		
			var xmlResponse = xmlHttp.responseXML;
		
		
			var  message = xmlResponse.getElementsByTagName("message")[0].childNodes[0].nodeValue;
			
			if (message=="1"){
			document.getElementById("idMessage").innerHTML =  '<i class="glyphicon glyphicon-ok"></i>';
			
		}	else{  document.getElementById("idMessage").innerHTML =  '<i class="glyphicon glyphicon-remove"></i>';} 
			
			
			
			
			
			
		}	
		
	}
	
	
}

function validateForm(){
	var valid = true;
	
	var studentId= document.getElementById("reg_studentid").value
	
	
	var email= document.getElementById("reg_email").value;
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    
    if(!re.test(email.toLowerCase())){
    	valid = false;
    	alert("Incorrect e-mail");
    }
    if(studentid.length != 9){
    	valid = false;
    	alert("Incorrect student ID");
    }
    
	return valid;
	
	
}

