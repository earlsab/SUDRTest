<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;

use DB;

class StatsController extends Controller
{
    public function stats_weekly()
    {
        $SDW = Carbon::now()->startOfWeek()->toDateString();
        $LDW = Carbon::now()->endOfWeek()->toDateString();

        $results_weekly = DB::table('papers')
            ->select(DB::raw('COUNT(DateCompleted) as count'))
            ->whereBetween(DB::raw('DATE(DateCompleted)'), [$SDW, $LDW])
            ->value('count');
        
            return $results_weekly;
    }

    public function stats_monthly()
    {
        $SDM = Carbon::now()->startOfMonth()->toDateString();
        $LDM = Carbon::now()->endOfMonth()->toDateString();

        $results_monthly = DB::table('papers')
            ->select(DB::raw('COUNT(DateCompleted) as count'))
            ->whereBetween(DB::raw('DATE(DateCompleted)'), [$SDM, $LDM])
            ->value('count');
        
            return $results_monthly;
    }

    public function stats_yearly()
    {
        $SDY = Carbon::now()->startOfYear()->toDateString();
        $LDY = Carbon::now()->endOfYear()->toDateString();

        $results_yearly = DB::table('papers')
            ->select(DB::raw('COUNT(DateCompleted) as count'))
            ->whereBetween(DB::raw('DATE(DateCompleted)'), [$SDY, $LDY])
            ->value('count');
        
            return $results_yearly;
    }
}
