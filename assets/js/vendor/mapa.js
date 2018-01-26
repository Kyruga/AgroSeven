function initialize() {

    // Exibir mapa;
    var myLatlng = new google.maps.LatLng(-16.6746774, -49.2683323);
    var mapOptions = {
        zoom: 17,
        center: myLatlng,
        panControl: false,
        scrollwheel: false,
        scaleControl: false,
        zoomControl: false,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        styles: [{
            "featureType": "landscape",
            "elementType": "geometry.fill",
            "stylers": [{
                "visibility": "on"
            }]
        }, {
            "featureType": "poi",
            "elementType": "all",
            "stylers": [{
                "visibility": "off"
            }]
        }, {
            "featureType": "poi.business",
            "elementType": "all",
            "stylers": [{
                "visibility": "on"
            }]
        }, {
            "featureType": "poi.park",
            "elementType": "all",
            "stylers": [{
                "visibility": "on"
            }]
        }, {
            "featureType": "poi.sports_complex",
            "elementType": "all",
            "stylers": [{
                "visibility": "on"
            }]
        }, {
            "featureType": "road",
            "elementType": "all",
            "stylers": [{
                "saturation": -100
            }, {
                "lightness": 45
            }]
        }, {
            "featureType": "road.highway",
            "elementType": "all",
            "stylers": [{
                "visibility": "simplified"
            }]
        }, {
            "featureType": "road.arterial",
            "elementType": "labels.icon",
            "stylers": [{
                "visibility": "off"
            }]
        }, {
            "featureType": "transit",
            "elementType": "all",
            "stylers": [{
                "visibility": "off"
            }]
        }, {
            "featureType": "transit.station.rail",
            "elementType": "geometry.fill",
            "stylers": [{
                "color": "#0c06b8"
            }, {
                "visibility": "off"
            }]
        }, {
            "featureType": "transit.station.rail",
            "elementType": "labels.text.fill",
            "stylers": [{
                "visibility": "off"
            }, {
                "color": "#b51515"
            }]
        }, {
            "featureType": "transit.station.rail",
            "elementType": "labels.icon",
            "stylers": [{
                "visibility": "on"
            }, {
                "hue": "#4200ff"
            }]
        }, {
            "featureType": "water",
            "elementType": "all",
            "stylers": [{
                "color": "#46bcec"
            }, {
                "visibility": "on"
            }]
        }]
    }

    // Parâmetros do texto que será exibido no clique;
    var contentString = '<h2 class="titulo-marcador">Instituto Visy</h2>' +
        '<p class="parag-marcador">Av. Dr. Ismerino Soares de Carvalho <br>(Antiga avenida Z), 133 </p>';
    var infowindow = new google.maps.InfoWindow({
        content: contentString,
        maxWidth: 700
    });

    // Exibir o mapa na div #mapa;
    var map = new google.maps.Map(document.getElementById("mapa"), mapOptions);

    // Marcador personalizado;
    var image = 'img/marcador-mapa.svg';
    var marcadorPersonalizado = new google.maps.Marker({
        position: myLatlng,
        map: map,
        icon: image,
        title: 'Instituto Visy',
        animation: google.maps.Animation.DROP
    });

    //   // Exibir texto ao clicar no ícone;
      google.maps.event.addListener(marcadorPersonalizado, 'click', function() {
        infowindow.open(map,marcadorPersonalizado);
      });

}

// Função para carregamento assíncrono
function loadScript() {
    var script = document.createElement("script");
    script.type = "text/javascript";
    script.src = "http://maps.googleapis.com/maps/api/js?key=AIzaSyDeHb17So0QupSGO_d6b8X-OyvJ32UQehs&sensor=true&callback=initialize";
    document.body.appendChild(script);
}

window.onload = loadScript;