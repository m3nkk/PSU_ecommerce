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


function acceptRequest(productId){

	var rowId ="ProductRowID"+productId;
	document.getElementById(rowId).remove();



	if ((xmlHttp.readyState == 0)||  (xmlHttp.readyState == 4)){

		xmlHttp.open("post", "admin-acceptProduct.php?", true);
		xmlHttp.onreadystatechange=acceptRequestCallback;
		xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xmlHttp.send("productId="+productId);
	}



}

function acceptRequestCallback(){

	if (xmlHttp.readyState == 4){
		if (xmlHttp.status == 200){

			


			var xmlResponse = xmlHttp.responseXML;
			var time = xmlResponse.getElementsByTagName("time")[0].childNodes[0].nodeValue;
			var productId = xmlResponse.getElementsByTagName("productId")[0].childNodes[0].nodeValue;

			
			 document.getElementById("transcript").innerHTML +='<b> <tr class = "success" id="transcript'+productId+'"><td>Accepted</td> <td>'+productId+'</td> <td>'+time+'</td> <td><button type="button" class=" btn btn-sm" onclick="revertAction('+productId+')"> Revert </button></td></tr> </b>';
			
			
				
			
		






		}	

	}


}





function rejectRequest(productId){

	var rowId ="ProductRowID"+productId;
	document.getElementById(rowId).remove();



	if ((xmlHttp.readyState == 0)||  (xmlHttp.readyState == 4)){

		xmlHttp.open("post", "admin-rejectProduct.php?", true);
		xmlHttp.onreadystatechange=rejectRequestCallback;
		xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xmlHttp.send("productId="+productId);
	}



}

function rejectRequestCallback(){

	if (xmlHttp.readyState == 4){
		if (xmlHttp.status == 200){




			var xmlResponse = xmlHttp.responseXML;
			var time = xmlResponse.getElementsByTagName("time")[0].childNodes[0].nodeValue;
			var productId = xmlResponse.getElementsByTagName("productId")[0].childNodes[0].nodeValue;

			
			 document.getElementById("transcript").innerHTML +='<b> <tr class = "danger" id="transcript'+productId+'"> <td>Rejected</td> <td>'+productId+'</td> <td>'+time+'</td> <td><button type="button" class=" btn btn-sm" onclick="revertAction('+productId+')"> Revert </button></td></tr> </b>';
			






		}	

	}


}

function revertAction(productId){
	
	document.getElementById("transcript"+productId).remove();
	
	if ((xmlHttp.readyState == 0)||  (xmlHttp.readyState == 4)){

		xmlHttp.open("post", "admin-revertAction.php?", true);
		xmlHttp.onreadystatechange=revertActionCallback;
		xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xmlHttp.send("productId="+productId);
	}
	
	
}


function revertActionCallback(){
	

	if (xmlHttp.readyState == 4){
		if (xmlHttp.status == 200){




			var xmlResponse = xmlHttp.responseText;
			document.getElementById("pendingRequests").innerHTML += xmlResponse;
			

			
			
			






		}	

	}

	
	
}








