function fetchreg() {

    if (document.getElementById("car_id") != null) {
        cars = document.getElementById("car_id").value
    }

    if (document.getElementById("lat") != null) {
        latit = document.getElementById("lat").value
    }

    if (document.getElementById("lng") != null) {
        longit = document.getElementById("lng").value
    }
    
    locachi = new Date();


    fetch('api/create.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            cars_id: cars,
            lat: latit,
            lng: longit,
            time_date: locachi.toLocaleString()
        })
    }).then(response => {
    return response.json()})
    .then(data => {
        alert(data.message);
        window.location.reload();
    })
    .catch(error => console.log('Error'))
    
}    
