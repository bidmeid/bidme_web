let map;
let directionsService = new google.maps.DirectionsService();
let directionsDisplay = new google.maps.DirectionsRenderer();

map = new google.maps.Map(document.getElementById('map'), {
    center: {
        lat: -5.450000,
        lng: 105.266670
    },
    zoom: 10
});
directionsDisplay.setMap(map);

let start = document.getElementById('start-input');
let searchStart = new google.maps.places.SearchBox(start);
let end = document.getElementById('destination-input');
let searchEnd = new google.maps.places.SearchBox(end);

let pesanStart = document.getElementById('btn-order');

function findRoute() {
    let startAddress = start.value;
    let endAddress = end.value;
    let request = {
        origin: startAddress,
        destination: endAddress,
        travelMode: 'DRIVING'
    };
    directionsService.route(request, function (result, status) {
        if (status == 'OK') {
            directionsDisplay.setDirections(result);
            // console.log(result);
            console.log(result.routes[0].legs[0].distance.text);
            console.log(result.routes[0].legs[0].distance.value);

            // document.getElementById('distance').innerHTML = result.routes[0].legs[0].distance.text;
            // document.getElementById('duration').innerHTML = result.routes[0].legs[0].duration.text;
            // document.getElementById('price').innerHTML = 'Rp' + result.routes[0].legs[0].distance.value *
            //     harga;

            // detail.style.display = 'block';
        } else {
            detail.style.display = 'none';
            alert('Petunjuk arah gagal dimuat, masukkan alamat yang benar!');
        }
    });
}

pesanStart.addEventListener("click", function (event) {
    event.preventDefault();
    if (start.value.trim() != "" && end.value.trim() != "") {
        event.preventDefault();
        findRoute();
    }
});