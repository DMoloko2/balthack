<html>
  <head>
  <meta name="viewport" content="initial-scale=1.0, width=device-width" />
  <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-core.js"></script>
  <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-service.js"></script>
  <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-ui.js"></script>
  <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-mapevents.js"></script>
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://js.api.here.com/v3/3.1/mapsjs-ui.css?dp-version=1549984893" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>

  <!--
  map.setCenter({lat:60.002762571072424, lng:30.254287719726562});
  map.setZoom(12);
-->

  </head>
  <body>
  <div style="width: 640px; height: 480px" id="map"></div>
  <script>


  function addMarkersToMap(map, lat1, lng1) {
      var parisMarker = new H.map.Marker({lat: lat1, lng: lng1});
      map.addObject(parisMarker);
}

  function switchMapLanguage(map, platform){
    // Create default layers
    let defaultLayers = platform.createDefaultLayers({
      lg: 'ru'
    });
    // Set the normal map variant of the vector map type
    map.setBaseLayer(defaultLayers.vector.normal.map);

    // Display default UI components on the map and change default
    // language to simplified Chinese.
    // Besides supported language codes you can also specify your custom translation
    // using H.ui.i18n.Localization.
    var ui = H.ui.UI.createDefault(map, defaultLayers, 'ru-RU');

    // Remove not needed settings control
    ui.removeControl('mapsettings');
  }

  // Initialize the platform object:
   var platform = new H.service.Platform({
   'apikey': 'OgN9E_tp4_WTNTj9A8FCK8gDotqum0xNPdW9fF5jBoc'
   });
// Obtain the default map types from the platform object
   var defaultLayers = platform.createDefaultLayers();



   // Instantiate (and display) a map object:
   var map = new H.Map(
   document.getElementById('map'),
   defaultLayers.vector.normal.map,
   {
     zoom: 12,
     center: { lng: 30.254287719726562, lat: 60.002762571072424 },
     pixelRatio: window.devicePixelRatio || 1
   });

   window.addEventListener('resize', () => map.getViewPort().resize());

//Step 3: make the map interactive
// MapEvents enables the event system
// Behavior implements default interactions for pan/zoom (also on mobile touch environments)
var behavior = new H.mapevents.Behavior(new H.mapevents.MapEvents(map));

// Create the default UI components
switchMapLanguage(map, platform);



$.ajax({
url: "/index.php/app/get_info?id_pl="+evt.target.getData()+"&date="+b,
success: function(e){
  $('.modal').html(e);
   console.log("e");

}
});

  </script>
<input type="button" onclick="addMarkersToMap(map, 60.018701, 30.251041)" value="Считать кроликов!">
  </body>
</html>
