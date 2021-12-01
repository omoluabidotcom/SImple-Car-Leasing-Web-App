function fetchreg() {

    if (document.getElementById("model") != null) {
        model = document.getElementById("model").value
    }

    if (document.getElementById("year") != null) {
        year = document.getElementById("year").value
    }

    if (document.getElementById("license") != null) {
        license = document.getElementById("license").value
    }

    if (document.getElementById("kilometer") != null) {
        kilometer = document.getElementById("kilometer").value
    }

    if (document.getElementById("kilogram") != null) {
        kilogram = document.getElementById("kilogram").value
    }

    if (document.getElementById("fueltype") != null) {
        fueltype = document.getElementById("fueltype").value
    }

    fetch('api/register.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            model: model,
            year: year,
            plate_no: license,
            speed: kilometer,
            max_load: kilogram,
            fuel_type: fueltype
        })
    }).then(res => {
        return res.json()
    }).then(data => {
        alert(data.message);
        window.location.reload();
    })
    .catch(error => console.log('Error'))

    
}