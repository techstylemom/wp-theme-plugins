document.addEventListener('DOMContentLoaded', () => {

    // Read the hidden fields
    const lat = document.querySelector('#lat').value;
    const lng = document.querySelector('#lng').value;
    const address = document.querySelector('#address').value;
    //
    var map = L.map('map').setView([lat, lng], 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    L.marker([lat, lng]).addTo(map)
        .bindPopup(address)
        .openPopup();
});