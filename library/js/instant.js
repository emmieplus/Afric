

//variables declarations
var x = document.getElementById("demo");

//function necessary
function searchCenter(str) {
    if (str == "") {
        document.getElementById("search_result").innerHTML = "Please, Enter id";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp1 = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp1 = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp1.onreadystatechange = function() {
            if (xmlhttp1.readyState == 4 && xmlhttp1.status == 200) {
                document.getElementById("search_result").innerHTML = xmlhttp1.responseText;
            }
        };
        xmlhttp1.open("POST","controller/search.php?search_query="+str,true);
        xmlhttp1.send();
    }
}

function getTest1()
{
	document.getElementById('demo1').innerHTML = "hi";
}
function getTest()
{
	x.innerHTML = "hi";
}
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}

function showPosition(position) {
    var latlon = position.coords.latitude + "," + position.coords.longitude;

    var img_url = "http://maps.googleapis.com/maps/api/staticmap?center=
    "+latlon+"&zoom=14&size=400x300&sensor=false";

    document.getElementById("mapholder").innerHTML = "<img src='"+img_url+"'>";
}

function showError(error) {
    switch(error.code) {
        case error.PERMISSION_DENIED:
            x.innerHTML = "User denied the request for Geolocation."
            break;
        case error.POSITION_UNAVAILABLE:
            x.innerHTML = "Location information is unavailable."
            break;
        case error.TIMEOUT:
            x.innerHTML = "The request to get user location timed out."
            break;
        case error.UNKNOWN_ERROR:
            x.innerHTML = "An unknown error occurred."
            break;
    }
}
