function fetchreg() {

    if (document.getElementById("cars_id") != null) {
        cars = document.getElementById("cars_id").value
    }

        fetch('api/get.php', {
            method: 'POST',
            headers: {
            'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                cars_id: cars
            })
            }).then(response => {
            return response.json()})
            .then(data => {
                alert("Your car longitude is" + data.data[0].latitude)
                alert("Your car latitude is" + data.data[0].longitude)

                window.location.reload()
                })
            .catch(error => console.log('Error'))

}    
