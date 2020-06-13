//Mapa
var map = L.map('mapa').setView([6.243084, -75.576308], 17);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
  attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

L.marker([6.243084, -75.576308]).addTo(map)
  .bindPopup('GDLWebCamp 2020<br> Plaza Mayor <br>Boletos ya disponibles.')
  .openPopup()
