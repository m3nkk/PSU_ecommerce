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



var checkID = 0;
var checkNumber = 0;


function idCallback(){

	if (xmlHttp.readyState == 4){
		if (xmlHttp.status == 200){
			
			
			
		
			var xmlResponse = xmlHttp.responseXML;
			
			var id = document.getElementById("reg_studentid").value;
			var  code = xmlResponse.getElementsByTagName("code")[0].childNodes[0].nodeValue;
			var message = xmlResponse.getElementsByTagName("message")[0].childNodes[0].nodeValue;
			
			/*
			if(isNaN(id)){
				canSubmit = false;
				document.getElementById("idMessage").innerHTML =  '<span style="color:#8b0000 "><i class="glyphicon glyphicon-remove"></i> ID has to be a number </span>';
			}else if(id.length != 9){
				canSubmit = false;
				document.getElementById("idMessage").innerHTML =  '<span style="color:#8b0000 "><i class="glyphicon glyphicon-remove"></i> ID has to be exactly 9 digits</span>';
			}else if(parseInt(id)<0){
				canSubmit = false;
				document.getElementById("idMessage").innerHTML =  '<span style="color:#8b0000 "><i class="glyphicon glyphicon-remove"></i> ID cant be negative</span>';
			}else
			*/
			
			if (code=="1"){
					checkID = 1;
				if(checkID==1 && checkNumber==1){
					document.getElementById("submitBtn").disabled = false;
				}
				document.getElementById("idMessage").innerHTML = '<span style="color:#50c878"><i class="glyphicon glyphicon-ok"></i>  '+message+'</span>';
				document.getElementById("reg_email").value = id+'@psu.edu.sa';
			
				
			}else{
				document.getElementById("submitBtn").disabled = true;
				document.getElementById("idMessage").innerHTML =  '<span style="color:#8b0000 "><i class="glyphicon glyphicon-remove"></i>  '+message+'</span>';
			} 



			
			
			
		}	
		
	}
	
	
}

function getPhoneRequest(){
	
	var phone = document.getElementById("reg_phone").value;




	if ((xmlHttp.readyState == 0)||  (xmlHttp.readyState == 4)){

		xmlHttp.open("post", "checkPhone.php", true);
		xmlHttp.onreadystatechange=phoneCallback;
		xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xmlHttp.send("phone="+phone);
	}
	
	

}






function phoneCallback(){

	if (xmlHttp.readyState == 4){
		if (xmlHttp.status == 200){
			
			
			
		
			var xmlResponse = xmlHttp.responseXML;
			
			var phone = document.getElementById("reg_phone").value;
			var  code = xmlResponse.getElementsByTagName("code")[0].childNodes[0].nodeValue;
			var message = xmlResponse.getElementsByTagName("message")[0].childNodes[0].nodeValue;
			
			/*
			if(isNaN(id)){
				canSubmit = false;
				document.getElementById("idMessage").innerHTML =  '<span style="color:#8b0000 "><i class="glyphicon glyphicon-remove"></i> ID has to be a number </span>';
			}else if(id.length != 9){
				canSubmit = false;
				document.getElementById("idMessage").innerHTML =  '<span style="color:#8b0000 "><i class="glyphicon glyphicon-remove"></i> ID has to be exactly 9 digits</span>';
			}else if(parseInt(id)<0){
				canSubmit = false;
				document.getElementById("idMessage").innerHTML =  '<span style="color:#8b0000 "><i class="glyphicon glyphicon-remove"></i> ID cant be negative</span>';
			}else
			*/
			
			if (code=="1"){
				checkNumber = 1;
				if(checkID==1 && checkNumber==1){
					document.getElementById("submitBtn").disabled = false;
				}
				document.getElementById("phoneMessage").innerHTML = '<span style="color:#50c878"><i class="glyphicon glyphicon-ok"></i>  '+message+'</span>';
			
				
			}else{
				document.getElementById("submitBtn").disabled = true;
				document.getElementById("phoneMessage").innerHTML =  '<span style="color:#8b0000 "><i class="glyphicon glyphicon-remove"></i>  '+message+'</span>';
			} 



			
			
			
		}	
		
	}
	
	
}



     
    
    
    

	
	


