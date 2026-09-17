<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anbite - AI Decision Support</title>
    <link rel="icon" type="image/png" href="{{ asset('images/2ndlogo.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* 1. SIGURADUHIN ANG FLEX LAYOUT SA BODY */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f7f6;
            margin: 0 !important;
            padding: 0 !important;
            display: flex !important;
            min-height: 100vh;
        }

        /* 2. ETO ANG PINAKAMAHALAGA: MATCHING THE CHARTS PAGE LAYOUT */
        .main-content {
            flex: 1 !important;
            margin-left: 250px !important; 
            width: calc(100% - 250px) !important;
            padding: 2rem !important;
            box-sizing: border-box !important;
            position: relative !important;
        }

        /* 3. PAG-AYOS NG MGA CARDS PARA HINDI NAG-OOVERLAP */
        .header { margin-bottom: 2rem; }
        .header h1 { color: #071907; margin: 0; font-size: 1.8rem; font-weight: 600; }
        .header p { color: #666; margin-top: 5px; }
        
        .risk-alert-card {
            background: #fff;
            border-left: 6px solid #dc3545;
            border-radius: 10px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .risk-icon {
            background: #ffe5e5; color: #ee1127;
            width: 50px; height: 50px; border-radius: 50%;
            display: flex; justify-content: center; align-items: center;
            font-size: 1.5rem; flex-shrink: 0;
        }

        .barangay-tag {
            background: #ee1127; color: white;
            padding: 2px 8px; border-radius: 4px; font-weight: 600;
        }

        .grid-container {
            display: grid;
            grid-template-columns: 1fr 1fr; /* Magkatabi gaya ng sa Charts */
            gap: 2rem;
            width: 100%;
        }

        .card {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
            display: flex;
            flex-direction: column;
        }

        .card-header {
            display: flex; align-items: center; gap: 10px;
            margin-bottom: 1.2rem; border-bottom: 1px solid #eee; padding-bottom: 10px;
        }

        /* TABLE & LIST STYLES */
        .ai-list { list-style: none; padding: 0; margin: 0; }
        .ai-list li {
            background: #f9fdf9; border: 1px solid #e1eee1;
            padding: 12px 15px; border-radius: 8px; margin-bottom: 10px;
            display: flex; gap: 10px; font-size: 0.9rem; line-height: 1.4;
        }

        .treatment-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        .treatment-table th {
            text-align: left; background: #f8f9fa; padding: 10px; border-bottom: 2px solid #eee; font-size: 0.85rem; color: #555;
        }

        .treatment-table td {
            text-align: left; padding: 12px; border-bottom: 1px solid #eee; font-size: 0.9rem; line-height: 1.4;
        }

        .trend-up { color: #dc3545; font-weight: 700; }
        .trend-warning { color: #e65100; font-weight: 700; }

        .urgent-warning {
            background-color: #fff3f3;
            border: 1px solid #ffc8c8;
            border-left: 4px solid #dc3545;
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 15px;
            font-size: 0.85rem;
            color: #b71c1c;
            line-height: 1.5;
        }

        /* RESPONSIVE FIX */
        @media (max-width: 1200px) {
            .grid-container {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    
    @include('layouts.sidebar')

    <main class="main-content">
        <div class="header">
            <h1>AI Decision Support</h1>
            <p>Smart recommendations and trend analysis for Batangas City Health Office.</p>
        </div>

        <div class="risk-alert-card">
            <div class="risk-icon">⚠️</div>
            <div class="risk-info">
                <h2 style="margin:0; color:#dc3545; font-size:1.1rem;">High Risk Area Detected</h2>
                <p style="margin:5px 0 0; color:#444;">
                   A sudden increase in animal bite cases has been detected in 
                   <span class="barangay-tag">Brgy. Kumintang Ibaba</span> and 
                   <span class="barangay-tag">Brgy. Bolbok</span>. 
                   <strong>Action Required:</strong> Prepare and allocate extra vaccines for these barangays immediately.
                </p>
            </div>
        </div>

        <div class="grid-container">
            <div class="card">
                <div class="card-header">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#2d6a2d" stroke-width="2"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path></svg>
                    <h3 style="margin:0;">To-Do Actions</h3>
                </div>
                <ul class="ai-list">
                    <li><span><strong>Stock Alert:</strong> Rabies Immunoglobulin (RIG) supply is critically low (only 10 vials left). Request a new batch from the Provincial Health Office.</span></li>
                    <li><span><strong>Hotspot Action:</strong> Spike in stray dog bites detected in Brgy. Alangilan. Coordinate with the City Veterinary Office for stray animal impounding.</span></li>
                    <li><span><strong>Staffing Suggestion:</strong> AI predicts high patient volume this coming Monday. Assign one extra nurse to the treatment area to reduce waiting time.</span></li>
                    <li><span><strong>Follow-up Alert:</strong> 8 Category III patients are scheduled for their crucial Day 7 shots tomorrow. Ensure enough vaccines are prepared.</span></li>
                </ul>
            </div>

            <div class="card">
                <div class="card-header">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#dc3545" stroke-width="2"><path d="M23 6l-9.5 9.5-5-5L1 18"></path><polyline points="17 6 23 6 23 12"></polyline></svg>
                    <h3 style="margin:0; color: #dc3545;">Incident Trend Alert</h3>
                </div>

                <div class="urgent-warning">
                    <strong>⚠️ CRITICAL REMINDER:</strong> 
                    Data shows an alarming continuous rise in animal-related injuries this month. If this trend is not addressed immediately, the facility may face a severe vaccine shortage. Urgent coordination with local barangays for mass vaccination and stray control is highly recommended.
                </div>

                <table class="treatment-table">
                    <thead>
                        <tr>
                            <th>Incident Type</th>
                            <th>Recent Cases (Last 30 Days)</th>
                            <th>AI Recommendation</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>Animal Bites</strong><br><span style="font-size: 0.75rem; color: #777;">(Dogs, Cats, etc.)</span></td>
                            <td><span class="trend-up">⬆️ +45% Increase</span><br>180 total cases</td>
                            <td>Deploy emergency RIG and request immediate stray animal catching in identified hotspots.</td>
                        </tr>
                        <tr>
                            <td><strong>Scratch Injuries</strong><br><span style="font-size: 0.75rem; color: #777;">(Mostly Cats)</span></td>
                            <td><span class="trend-warning">↗️ +28% Increase</span><br>145 total cases</td>
                            <td>Intensify public awareness on proper pet handling and early wound washing protocols.</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>
</html>