var xmlHttp = getXMLHTTPRequest();
var Oldbutton = "";

function getXMLHTTPRequest() {
    var xmlHttp;

    if (window.ActiveXObject) {
        try {
            xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
        } catch (e) {
            xmlHttp = false;
        }
    } else {
        try {
            xmlHttp = new XMLHttpRequest();
        } catch (e) {
            xmlHttp = false;
        }
    }
    if (!xmlHttp) {
        alert("cannot create xmlHttp object");
    } else {
        return xmlHttp;
    }
}

function AddtoCartRequst(id, NumOfItems) {
    if ((xmlHttp.readyState == 0) || (xmlHttp.readyState == 4)) {
        xmlHttp.open("POST", " AddtoCart.php", true);
        xmlHttp.onreadystatechange = AddtoCartRequstCallback;
        xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlHttp.send("id=" + id + "&number_of_items=" + NumOfItems);
    }

}
function AddtoCartRequstCallback() {
    if (xmlHttp.readyState == 4) {
        if (xmlHttp.status == 200) {
            var xmlResponse = xmlHttp.responseXML;
            var numberOfItems = xmlResponse.getElementsByTagName("code")[0].childNodes[0].nodeValue;
            var id = xmlResponse.getElementsByTagName("ID")[0].childNodes[0].nodeValue;
            var button = document.getElementById("Cartbutton");
            document.getElementById("number_of_items").getElementsByTagName('b')[0].innerHTML = numberOfItems + " items";
            if(/chrome/.test( navigator.userAgent.toLowerCase() )){
                button.innerHTML = '<button style="background-color:#02DB6B;" type="button" class="btn btn"><i class="icon-shopping-cart icon-white"></i>In Cart</button>';
        }else{
            button.innerHTML = '<button style="background-color:#02DB6B;" type="button" class="btn btn" onclick="RemoveFromCartRequst2(' + id + ',' + numberOfItems + ')" onmouseover="ChangeButton()" onmouseout="ButtonBack()"><i class="icon-shopping-cart icon-white"></i>In Cart</button>';
        }
    }
}
}

function RemoveFromCartRequst(id, NumOfItems) {
    var ProductRow = document.getElementById("ProductRowID" + id);
    var price = document.getElementById('ProductPriceID' + id).innerHTML.replace('SAR', "");
    var total = document.getElementById('Total').innerHTML.replace(' SAR</b>', "").replace('<b>', "");
    if ((xmlHttp.readyState == 0) || (xmlHttp.readyState == 4)) {
        xmlHttp.open("POST", "RemoveFromCart.php", true);
        xmlHttp.onreadystatechange = RemoveFromCartRequstCallback;
        xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlHttp.send("id=" + id + "&number_of_items=" + NumOfItems + "&total=" + total + "&price=" + price);
    }
    while (ProductRow.firstChild) {
        ProductRow.removeChild(ProductRow.firstChild);
    }


}
function RemoveFromCartRequstCallback() {
    if (xmlHttp.readyState == 4) {
        if (xmlHttp.status == 200) {

            var xmlResponse = xmlHttp.responseXML;
            var Total = xmlResponse.getElementsByTagName("Total")[0].childNodes[0].nodeValue;
            var numberOfItems = xmlResponse.getElementsByTagName("code")[0].childNodes[0].nodeValue;

            document.getElementById("number_of_items").getElementsByTagName('b')[0].innerHTML = numberOfItems + " items";
            document.getElementById("Total").getElementsByTagName('b')[0].innerHTML = Total + " SAR";
        }

    }
}

function RemoveFromCartRequst2(id, NumOfItems) {

    if ((xmlHttp.readyState == 0) || (xmlHttp.readyState == 4)) {
        xmlHttp.open("POST", "RemoveFromCart2.php", true);
        xmlHttp.onreadystatechange = RemoveFromCartRequstCallback2;
        xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlHttp.send("id=" + id + "&number_of_items=" + NumOfItems);
    }

}
function RemoveFromCartRequstCallback2() {
    if (xmlHttp.readyState == 4) {
        if (xmlHttp.status == 200) {
            var xmlResponse = xmlHttp.responseXML;
            var numberOfItems = xmlResponse.getElementsByTagName("code")[0].childNodes[0].nodeValue;
            var id = xmlResponse.getElementsByTagName("ID")[0].childNodes[0].nodeValue;
            var button = document.getElementById("Cartbutton");
            document.getElementById("number_of_items").getElementsByTagName('b')[0].innerHTML = numberOfItems + " items";
            button.innerHTML='<button type="button" class="btn btn" onclick="AddtoCartRequst(' + id + ',' + numberOfItems + ')"><i class="icon-shopping-cart icon-white"></i>Add to Cart</button>';
            
        }

    }
}
function ChangeButton() {
    
    Oldbutton = document.getElementById("Cartbutton").innerHTML;
    Newbutton = document.getElementById("Cartbutton");
    Newbutton.innerHTML = Newbutton.innerHTML.replace("#02DB6B", "#ff4747").replace("In Cart", "Remove From Cart");
    
}
function ButtonBack() {
    
    if(document.getElementById("Cartbutton").innerHTML.indexOf("Add to Cart") == -1){
    document.getElementById("Cartbutton").innerHTML = Oldbutton;
    }
}
function NotLogInAlert() {
    alert("You must log-in first");
}