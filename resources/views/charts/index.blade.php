<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AnBite - Charts & Reports</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
     <link rel="icon" type="image/png" href="{{ asset('images/2ndlogo.png') }}">

    <style>
        body {
            background: #f3f4f6;
            display: flex;
            min-height: 100vh;
        }

        /* Umiiwas sa Sidebar na 230px ang lapad */
        .main-content {
            margin-left: 230px; 
            width: calc(100% - 230px);
            background: #f3f4f6;
        }

        .chart-wrapper {
            position: relative;
            height: 350px; 
            width: 100%;
            margin-bottom: 30px;
        }

        /* Print CSS */
        @media print {
            .btn, .sidebar, .navbar { display: none !important; }
            .card { border: none !important; box-shadow: none !important; }
            .main-content { margin-left: 0 !important; width: 100% !important; }
            .chart-wrapper { height: 300px !important; }
        }
    </style>
</head>
<body>

 @include('layouts.sidebar')

    <div class="main-content">
        <div class="container-fluid p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="fw-bold">Charts & Reports</h2>
                <button onclick="window.print()" class="btn btn-success">
                    <i class="fas fa-file-pdf"></i> Export as PDF
                </button>
            </div>

            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card p-3 shadow-sm h-100">
                        <h5 class="text-center">Total by Gender</h5>
                        <div class="chart-wrapper">
                            <canvas id="genderChart"></canvas>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="card p-3 shadow-sm h-100">
                        <h5 class="text-center">Total by Age Group</h5>
                        <div class="chart-wrapper">
                            <canvas id="ageChart"></canvas>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="card p-3 shadow-sm h-100">
                        <h5 class="text-center">Bites by Animal</h5>
                        <div class="chart-wrapper">
                            <canvas id="animalChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            
            // 1. Gender Chart
            new Chart(document.getElementById('genderChart'), {
                type: 'pie',
                data: {
                    labels: ['Male', 'Female'],
                    datasets: [{ data: [15, 10], backgroundColor: ['#014620', '#aad4bc'] }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false
                }
            });

            // 2. Age Chart
            new Chart(document.getElementById('ageChart'), {
                type: 'pie',
                data: {
                    labels: ['0-17', '18-60', '60+'],
                    datasets: [{ data: [5, 15, 5], backgroundColor: ['#abcaa4', '#588f53', '#14351c'] }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false
                }
            });

            // 3. Animal Chart (Bar Graph) - Nilagyan ko ng sample data
            new Chart(document.getElementById('animalChart'), {
                type: 'bar',
                data: {
                    labels: ['Dog ', 'Cat'],
                    datasets: [{ 
                        label: 'Number of Bites',
                        data: [20, 8], 
                        backgroundColor: ['#244421', '#c5eccd'] 
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: { y: { beginAtZero: true } }
                }
            });

        });
    </script>
</body>
</html>