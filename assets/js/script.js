// script.js

// Initialize the map and set its view to the desired coordinates and zoom level
const map = L.map('map').setView([-1.286389, 36.817223], 10); // Centered on Nairobi, for example

// Add MapTiler's map layer using your API key
const apiKey = 'A6Fr3AipYPaS08MsQyqd'; // Replace with your actual MapTiler API key
L.tileLayer(`https://api.maptiler.com/maps/basic/256/{z}/{x}/{y}.png?key=${apiKey}`, {
    attribution: '&copy; <a href="https://www.maptiler.com/copyright/">MapTiler</a> contributors',
}).addTo(map);

// Optional: Add a marker for a waste pickup location
L.marker([-1.286389, 36.817223]).addTo(map)
    .bindPopup("Scheduled Waste Pickup Location")
    .openPopup();
    const wastePickupLocations = [
        { lat: -1.286389, lng: 36.817223, info: "Location 1: Scheduled Pickup" },
        { lat: -1.2921, lng: 36.8219, info: "Location 2: Biogas Facility" }
    ];
    
    wastePickupLocations.forEach(location => {
        L.marker([location.lat, location.lng]).addTo(map)
            .bindPopup(location.info)
            .openPopup();
    });
    L.tileLayer(`https://api.maptiler.com/maps/streets/256/{z}/{x}/{y}.png?key=${apiKey}`, {
        attribution: '&copy; <a href="https://www.maptiler.com/copyright/">MapTiler</a> contributors',
    }).addTo(map);
        