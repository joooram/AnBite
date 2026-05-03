<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AnBite - Charts & Reports</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', sans-serif; background: #f3f4f6; display: flex; min-height: 100vh; }
        .main-content { margin-left: 220px; width: calc(100% - 220px); padding: 2rem; }
        
        /* Reduced height to make it less "large" on the page */
        .chart-wrapper { position: relative; height: 250px; width: 100%; margin-bottom: 10px; }
        
        .card h5 { font-size: 0.85rem; letter-spacing: 1px; }

        @media print {
            .btn, .sidebar, .navbar { display: none !important; }
            .main-content { margin-left: 0 !important; width: 100% !important; padding: 0 !important; }
        }
    </style>
</head>
<body>

    @include('layouts.sidebar')

    <div class="main-content">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="fw-bold">Charts & Reports</h2>
                <button onclick="window.print()" class="btn btn-success">
                    <i class="fas fa-file-pdf"></i> Export as PDF
                </button>
            </div>

            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="card p-3 shadow-sm">
                        <h5 class="text-center text-muted fw-bold">TOTAL CASES IN TERMS OF GENDER</h5>
                        <div class="chart-wrapper"><canvas id="genderChart"></canvas></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card p-3 shadow-sm">
                        <h5 class="text-center text-muted fw-bold">TOTAL AGE GROUP</h5>
                        <div class="chart-wrapper"><canvas id="ageChart"></canvas></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card p-3 shadow-sm h-100">
                        <h5 class="text-center text-muted fw-bold">TOTAL DOG AND CAT BITES</h5>
                        <div class="chart-wrapper"><canvas id="animalChart"></canvas></div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card p-3 shadow-sm h-100">
                        <h5 class="text-center text-muted fw-bold">TOTAL BITES WITH BREED</h5>
                        <div class="chart-wrapper"><canvas id="withBreedChart"></canvas></div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card p-3 shadow-sm h-100">
                        <h5 class="text-center text-muted fw-bold">TOTAL BITES WITHOUT BREED</h5>
                        <div class="chart-wrapper"><canvas id="withoutBreedChart"></canvas></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            
            // 1. Total Sex - Pie Chart
            new Chart(document.getElementById('genderChart'), {
                type: 'pie',
                data: {
                    labels: ['Male', 'Female'],
                    datasets: [{ data: [15, 10], backgroundColor: ['#014620', '#aad4bc'] }]
                },
                options: { responsive: true, maintainAspectRatio: false }
            });

            // 2. Total Age - Doughnut Chart
            new Chart(document.getElementById('ageChart'), {
                type: 'doughnut',
                data: {
                    labels: ['0-17', '18-60', '60+'],
                    datasets: [{ data: [5, 15, 8], backgroundColor: ['#abcaa4', '#588f53', '#14351c'] }]
                },
                options: { responsive: true, maintainAspectRatio: false, cutout: '65%' }
            });

            // 3. Total Dog and Cat Bites - Bar Chart
            new Chart(document.getElementById('animalChart'), {
                type: 'bar',
                data: {
                    labels: ['Dogs', 'Cats'],
                    datasets: [{ 
                        label: 'Bites',
                        data: [25, 12], 
                        backgroundColor: ['#244421', '#c5eccd'] 
                    }]
                },
                options: { 
                    responsive: true, 
                    maintainAspectRatio: false,
                    scales: { y: { beginAtZero: true } }
                }
            });

// 4. Bites WITH Breed - Bar Chart
new Chart(document.getElementById('withBreedChart'), {
    type: 'bar',
    data: {
        // Added 'Total' to the labels
        labels: ['Dogs', 'Cats', 'Total'], 
        datasets: [{ 
            label: 'With Breed',
            // Added the sum (15 + 4 = 19) to the data array
            data: [15, 4, 19], 
            // Added a third color for the Total bar (#588f53)
            backgroundColor: ['#244421', '#c5eccd', '#588f53'], 
            borderWidth: 1
        }]
    },
    options: { 
        responsive: true, 
        maintainAspectRatio: false,
        plugins: {
            legend: { display: false } 
        },
        scales: { 
            y: { 
                beginAtZero: true,
                title: {
                    display: true,
                }
            } 
        }
    }
});

        // 5. Bites WITHOUT Breed - Bar Chart
new Chart(document.getElementById('withoutBreedChart'), {
    type: 'bar',
    data: {
        // Added 'Total' label
        labels: ['Dogs', 'Cats', 'Total'], 
        datasets: [{ 
            label: 'Without Breed',
            // Data updated: [Dogs, Cats, Sum]
            data: [10, 8, 18], 
            // Color palette: Dark Green, Light Mint, and a Medium Sage for the Total
            backgroundColor: ['#244421', '#c5eccd', '#588f53'], 
            borderWidth: 1
        }]
    },
    options: { 
        responsive: true, 
        maintainAspectRatio: false,
        plugins: {
            legend: { display: false } // Keeping it clean
        },
        scales: { 
            y: { 
                beginAtZero: true 
            } 
        }
    }
});
      });
    </script>
</body>
</html>