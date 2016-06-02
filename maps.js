/*
The code  is from Google and sets
the map, view, size, and zoom of map
*/
var myCenter=new google.maps.LatLng(27.713146,-82.434113);

function initialize()
{
    var mapProp = {
    center: myCenter,
    zoom:9,
    mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);

    var marker = new google.maps.Marker({ position: myCenter, title:'I am here!...somewhere.'});

    marker.setMap(map);

    google.maps.event.addListener(marker,'click',function() {
    map.setZoom(5);
    map.setCenter(marker.getPosition());
    });
}
google.maps.event.addDomListener(window, 'load', initialize);
