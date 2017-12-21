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
	//alert(productId);
	//alert(rowId);
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




			var xmlResponse = xmlHttp.responseText;



			if (code=="1"){
				document.getElementById("idMessage").innerHTML = '<span style="color:#50c878"><i class="glyphicon glyphicon-ok"></i>  '+message+'</span>';
			}	else{
				document.getElementById("idMessage").innerHTML =  '<span style="color:#8b0000 "><i class="glyphicon glyphicon-remove"></i>  '+message+'</span>';
			} 






		}	

	}


}





function rejectRequest(productId){

	var rowId ="ProductRowID"+productId;
	//alert(productId);
	//alert(rowId);
	document.getElementById(rowId).remove();



	if ((xmlHttp.readyState == 0)||  (xmlHttp.readyState == 4)){

		xmlHttp.open("post", "admin-rejectProduct.php?", true);
		xmlHttp.onreadystatechange=acceptRequestCallback;
		xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xmlHttp.send("productId="+productId);
	}



}

function rejectRequestCallback(){

	if (xmlHttp.readyState == 4){
		if (xmlHttp.status == 200){




			var xmlResponse = xmlHttp.responseText;







		}	

	}


}








