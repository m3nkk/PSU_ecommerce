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


var editing = 1;
function changeDescription(id)
{
	var productId = id;
	var descid= "#desc"+id;
	var textareaID = "ta"+id;
	var newtextID = "nt"+id;
	var descvalue = "";

	$(document).ready(function() {
		 if (editing % 2 == 1) {
			 descvalue = $(descid).text();
			 $(descid).empty();
		     var text  = "<textarea id='"+textareaID+"' cols='90' rows='5' name='prod_desc'>"+descvalue+"</textarea>";
			 $(descid).append(text);
			 editing = editing+1;
		 }else{
			 descvalue = $("#"+textareaID+"").val();
			 updateDescription(descvalue,productId);
			 $(descid).empty();
		     var text  = "<p id='"+newtextID+"'>"+descvalue+"</p>";
			 $(descid).append(text);
			 editing = editing+1;
		 }
		
		
	});

}

function updateDescription(desc,id)
{
	var description = desc;
	var productid = id;
	//alert(description);
	//alert(productid);
	if ((xmlHttp.readyState == 0)||  (xmlHttp.readyState == 4)){

		xmlHttp.open("post", "productInfo.php", true);
		xmlHttp.onreadystatechange=infoCallback;
		xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xmlHttp.send("description="+desc+"&pid="+productid);
	}
	
	
}

function infoCallback(){
	
	if (xmlHttp.readyState == 4){
		if (xmlHttp.status == 200){
			var xmlResponse = xmlHttp.responseXML;
			sid = xmlResponse.getElementsByTagName('message')[0].childNodes[0].nodeValue;
			if(sid=="1"){
			    alert("Info updated succesfully");
			}else{
				alert("Error Encountered");
			}
			
		}	
		
	}
	
	
}



     
    
    
    

	
	


