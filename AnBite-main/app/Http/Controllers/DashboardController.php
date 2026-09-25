<?php

namespace App\Http\Controllers;

use App\Models\BiteIncident;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $now = now();

        $startOfMonth = $now->copy()->startOfMonth();
        $today = $now->copy()->endOfDay();

        $weeklyLabels = [
            'Week 1',
            'Week 2',
            'Week 3',
            'Week 4',
        ];

        $weeklyCases = [0, 0, 0, 0];

        $incidents = BiteIncident::whereBetween('date_of_exposure', [
            $startOfMonth->toDateString(),
            $today->toDateString(),
        ])->get();

        foreach ($incidents as $incident) {
            $day = Carbon::parse($incident->date_of_exposure)->day;

            if ($day >= 1 && $day <= 7) {
                $weeklyCases[0]++;
            } elseif ($day >= 8 && $day <= 14) {
                $weeklyCases[1]++;
            } elseif ($day >= 15 && $day <= 21) {
                $weeklyCases[2]++;
            } elseif ($day >= 22) {
                $weeklyCases[3]++;
            }
        }

        return view('auth.dashboard', compact(
            'weeklyLabels',
            'weeklyCases'
        ));
    }
}