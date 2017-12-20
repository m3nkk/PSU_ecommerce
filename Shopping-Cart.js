var xmlHttp = getXMLHTTPRequest();

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


function RemoveFromCartRequst(id, NumOfItems) {
    var ProductRow = document.getElementById("ProductRowID" + id);
    var price = document.getElementById('ProductPriceID' + id).innerHTML.replace('SAR', "");
    var total = document.getElementById('Total').innerHTML.replace(' SAR</b>', "").replace('<b>', "");

    if ((xmlHttp.readyState == 0) || (xmlHttp.readyState == 4)) {
        xmlHttp.open("GET", "RemoveFromCart.php?id=" + id + "&number_of_items=" + NumOfItems + "&total=" + total + "&price=" + price, true);
        xmlHttp.onreadystatechange = RemoveFromCartRequstCallback;
        xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlHttp.send();
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
            
            document.getElementById("number_of_items").getElementsByTagName('b')[0].innerHTML=numberOfItems+" items";
            document.getElementById("Total").getElementsByTagName('b')[0].innerHTML=Total+" SAR";
        }

    }
}