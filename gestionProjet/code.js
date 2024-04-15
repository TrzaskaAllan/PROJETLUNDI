function initialize() {
    var map = L.map('map').setView([49.900002, 2.3], 14);

    var osmLayer = L.tileLayer('https://{s}.tile.osm.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://osm.org/copyright">OpenStreetMap</a> contributors',
        maxZoom: 18
    });

    map.addLayer(osmLayer);
   // var dataLoca = <?php echo json_encode($donnees);?>;
    

}