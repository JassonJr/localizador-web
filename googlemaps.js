
var map;
var geocode;

function initMap()
{
	  var myLatLng = {lat: -23.608747, lng:  -46.665138};

        map = new google.maps.Map(document.getElementById('map'), {
          zoom: 17,
          center: myLatLng
        });

        /*var marker = new google.maps.Marker({
          position: myLatLng,
          map: map,
          title: 'Hello World!'
        });*/
        if(document.getElementById("data") != null)
        {
	        var cdata = JSON.parse(document.getElementById('data').innerHTML);
	      	geocoder = new google.maps.Geocoder();
	      	codeAddress(cdata);
    	}
}
 function codeAddress(cdata) 
{
    Array.prototype.forEach.call(cdata, function(data)
	{
	    var address = data.name + '' + data.address;
	    console.log(address);
	    geocoder.geocode( { "address": address}, function(results, status) {
	      if (status == 'OK') {
	        map.setCenter(results[0].geometry.location);
	        var points = {};
	        points.id = data.id;
	        points.lat = map.getCenter().lat();
	        points.lng = map.getCenter().lng();
	        updateAddressWithLatLng(points);
	      } else {
	        alert('Geocode was not successful for the following reason: ' + status);
	      }
	    });
    });
 }

 function updateAddressWithLatLng(points)
 {
 	$.ajax({
 		url:"index.html",
 		method:"post",
 		data: points,
 		success: function(res)
 		{
 				console.log(res);
 		}
 	})
 
 }