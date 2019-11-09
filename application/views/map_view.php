<script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-core.js"></script>
<script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-service.js"></script>
<script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-ui.js"></script>
<script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-mapevents.js"></script>
<script type="text/javascript" src="https://d3js.org/d3.v4.min.js"></script>

<style type="text/css">
.info-bubble {
  opacity: 0.75;
  padding: 0 5px;
  pointer-events: none;
}

.info-bubble .info-bubble-title {
  font-size: 15px;
  margin-left: 2px;
}

.info-bubble .info-bubble-label {
  font-size: 10px;
  opacity: 0.7;
  margin-left: 2px;
}

.info-bubble .H_ib_close {
  display: none;
}

.info-bubble .H_ib_body {
  padding: 0;
  width: 275px;
  height: 140px;
}

.hover div{
  margin: 0;
  padding: 0;
}

.hover p:nth-child(2){
  position: relative;
  top: -30px;
  right: -50px;
}

.hover p:nth-child(3){
  position: relative;
  top: -40px;
}
.hover p:nth-child(4){
  position: relative;
  top: -50px;
}

</style>
<script>

function addMarkerToGroup(group, coordinate, html) {
  var marker = new H.map.Marker(coordinate);
  // add custom data to the marker
  marker.setData(html);
  group.addObject(marker);
}

/**
 * Add two markers showing the position of Liverpool and Manchester City football clubs.
 * Clicking on a marker opens an infobubble which holds HTML content related to the marker.
 * @param  {H.Map} map      A HERE Map instance within the application
 */
function addInfoBubble(map) {
  var group = new H.map.Group();

  map.addObject(group);


  <?php foreach ($clubs as $key => $value) { ?>
    addMarkerToGroup(group, {lat:<?php echo $value->x;?>, lng:<?php echo $value->y;?>},"<?php echo "<div class='hover'><img width='40px' src='"; base_url();echo "MDB/img/dom.png'></img><p>",$value->name,"</p><p>", $value->address,"</p><p>Рейтинг: ", $value->rating,"</p></div>";?>");
  <?php } ?>

  const format = d3.format('.2f');

  let hoveredObject;
let infoBubble = new H.ui.InfoBubble({lat: 0, lng: 0}, {});
infoBubble.addClass('info-bubble');
infoBubble.close();
ui.addBubble(infoBubble);

map.addEventListener('pointermove', (e) => {
    if (hoveredObject && hoveredObject !== e.target) {
        infoBubble.close();
    }

    hoveredObject = e.target;
    //console.log(hoveredObject['data']);
    if (hoveredObject.icon) {
        let row = hoveredObject.getData();
        if (row) {


            let pos = map.screenToGeo(
                e.currentPointer.viewportX,
                e.currentPointer.viewportY);
            infoBubble.setPosition(pos);
            infoBubble.setContent(hoveredObject['data']);
            infoBubble.open();
        }
    }
});
}




// function addMarkersToMap(map, lat1, lng1) {
//     var parisMarker = new H.map.Marker({lat: lat1, lng: lng1});
//     map.addObject(parisMarker);
// }

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
var ui = H.ui.UI.createDefault(map, defaultLayers, 'ru-RU');
// Create the default UI components
switchMapLanguage(map, platform);

addInfoBubble(map);
</script>

</html>
