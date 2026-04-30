<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AnBite - Hotspot Map</title>

    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css"/>
    <link rel="icon" type="image/png" href="{{ asset('images/2ndlogo.png') }}">

    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f3f4f6;
            display: flex;
            min-height: 100vh;
        }

        /* Container para hindi matakpan ng Sidebar */
        .main-container {
            margin-left: 230px; 
            padding: 2rem;
            width: calc(100% - 230px);
        }

        .map-wrapper {
            background: white;
            padding: 10px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }

        .table-wrapper {
            margin-top: 2rem;
            background: white;
            padding: 1.5rem;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }

        .custom-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }

        .custom-table th, .custom-table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }

        .custom-table th {
            background-color: #1a3a1a;
            color: white;
        }

        .custom-table tr:hover {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>

    @include('layouts.sidebar')

    <div class="main-container">
        <h2 style="margin-bottom: 20px; color: #1a3a1a;">Rabies Hotspot Map - Batangas City</h2>

        <div class="map-wrapper">
            <div id="map" style="height: 500px; border-radius: 8px; z-index: 1;"></div> 
        </div>

        <div class="table-wrapper">
            <h4>Top 10 Barangays with Highest Rabies Cases (This Month)</h4>

            <table class="custom-table">
                <thead>
                    <tr>
                        <th>Barangay Name</th>
                        <th>Total Cases</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td>Pallocan Silangan</td><td>15</td></tr>
                    <tr><td>Kumintang Ibaba</td><td>13</td></tr>
                    <tr><td>Balete</td><td>12</td></tr>
                    <tr><td>Tabangao Ambulong</td><td>11</td></tr>
                    <tr><td>San Pedro</td><td>10</td></tr>
                    <tr><td>Bolbok</td><td>9</td></tr>
                    <tr><td>Alangilan</td><td>8</td></tr>
                    <tr><td>Santa Clara</td><td>7</td></tr>
                    <tr><td>Sorosoro Ilaya</td><td>6</td></tr>
                    <tr><td>Mahabang Dahilig</td><td>5</td></tr>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {

            var map = L.map('map').setView([13.7565, 121.0583], 13);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; OpenStreetMap contributors'
            }).addTo(map);

            var barangays = [
                "Barangay 1","Barangay 2","Barangay 3","Barangay 4","Barangay 5","Barangay 6",
                "Barangay 7","Barangay 8","Barangay 9","Barangay 10","Barangay 11","Barangay 12",
                "Barangay 13","Barangay 14","Barangay 15","Barangay 16","Barangay 17","Barangay 18",
                "Barangay 19","Barangay 20","Barangay 21","Barangay 22","Barangay 23","Barangay 24",
                "Balete","Banaba Center","Banaba Kanluran","Banaba Silangan","Banaba Ibaba",
                "Bilogo","Bolbok","Bukal","Calicanto","Catandala","Concepcion",
                "Conde Itaas","Conde Labak","Kumba","Cuta","Dalig","Dela Paz",
                "Dela Paz Pulot Aplaya","Dela Paz Pulot Itaas","Domoclay","Dumantay",
                "Gulod Itaas","Gulod Labak","Haligue Kanluran","Haligue Silangan",
                "Ilihan","Kumintang Ibaba","Kumintang Ilaya","Libyo","Liponpon Isla Verde",
                "Maapas","Mahabang Dahilig","Mahabang Parang","Mahacot Silangan",
                "Mahacot Kanluran","Malalim","Malibayo","Malitam","Maruclap","Mabacong",
                "Pagkilatan","Paharang Kanluran","Paharang Silangan","Pallocan Kanluran",
                "Pallocan Silangan","Pinamucan Ibaba","Pinamucan","Pinamucan Silangan",
                "Sampaga","San Agapito Isla Verde","San Agustin Kanluran",
                "San Agustin Silangan","San Andres Isla Verde","San Antonio Isla Verde",
                "San Isidro","San Jose Sico","San Miguel","San Pedro",
                "Santa Clara","Santa Rita Aplaya","Santa Rita Karsada",
                "Santo Domingo","Santo Nino","Simlong","Sirang Lupa",
                "Sorosoro Ibaba","Sorosoro Ilaya","Sorosoro Karsada",
                "Tabangao Aplaya","Tabangao Ambulong","Tabangao Dao",
                "Talahib Pandayan","Talahib Payapa","Talumpok Kanluran",
                "Talumpok Silangan","Tinga Itaas","Tinga Labak",
                "Tulo","Wawa"
            ];

            barangays.forEach(function(name) {
                // Generates random coordinates near Batangas City center
                var lat = 13.7565 + (Math.random() - 0.5) * 0.05;
                var lng = 121.0583 + (Math.random() - 0.5) * 0.05;

                L.marker([lat, lng])
                    .addTo(map)
                    .bindPopup("<b>" + name + "</b>");
            });

        });
    </script>
</body>
</html>