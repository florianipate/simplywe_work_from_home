<!DOCTYPE html>
<html lang="en"><head>
<title>Wedding Venue Map v6</title>
<meta name="robots" content="noindex,nofollow,noodp,noydir" />
<meta name="author" content="Jason Cheeseborough" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link href="/images/favicon.ico" rel="icon" type="image/ico" />

    
<!-- CORE BOOTSTRAP CSS -->
<link href="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"  rel="stylesheet">
    
    
<!-- JAVASCRIPT FOR GOOGLE MAPS API -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCBTLrLx2MCOx30BACb0l4e26GcmL_KYiY&callback=initMap&v=3&libraries=geometry" type="text/javascript"></script>
<script src="js/jquery-latest.min.js" type="text/javascript"></script>
<script src="js/venuemap.js" type="text/javascript"></script>


</head><body>
<div class="container-fluid">
    <div class="row p-2">
        <div class="col-md-4">
            <div class="form-group">
                <p>Postcode</p>
                <input type="text" class="form-control" id="address" placeholder="Postcode Only">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <p>Search Radius</p>
                <input type="number" class="form-control" id="radiusmiles" placeholder="Distance in Miles">
            </div>
        </div>
        <div class="col-md-4 text-center">
            <p class="d-none d-md-block">&#160;</p>
            <div class="btn-group" role="group">
                <button type="button" class="btn btn-success" onclick="codeAddress()">FIND VENUES</button>
                <button type="button" class="btn btn-danger" onclick="window.location.reload();">CLEAR VENUES</button>
            </div>
        </div>
    </div>
    <div class="row p-2">
        <div class="col">
            <input type="hidden" id="radius">
            <div id="map" style="height: 70vh;"></div>
        </div>
    </div>
</div>
    
    
<!-- JAVASCRIPT TO INITIATE MAP -->
<script type="text/javascript">
window.onload = function() {initMap();initMarkers();}
$(document).ready(function(){$("span").click(function(){$("#list").toggle();});});
</script>

    
</body></html>