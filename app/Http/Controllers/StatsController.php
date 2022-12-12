<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;

use DB;

class StatsController extends Controller
{
   
    public function compareRange1($range1monthA, $range1yearA, $range1monthB, $range1yearB)
    {
        $range1_monthA = $range1monthA;
        $range1_yearA = $range1yearA;

        $range1_monthB = $range1monthB;
        $range1_yearB = $range1yearB;

        $range1_data = DB::table('papers')
                            ->select('College', DB::raw('COUNT(College) as count'))
                            ->whereBetween(DB::raw('YEAR(DateCompleted)'), [$range1_yearA,$range1_yearB])
                            ->whereBetween(DB::raw('MONTH(DateCompleted)'), [$range1_monthA,$range1_monthB])
                            ->groupBy('College')
                            ->pluck('count', 'College');
                            
        
        $range1_values = $range1_data->values();
        $range1_keys = $range1_data->keys();

        $range1_chartdata = $this->formatData($range1_keys, $range1_values);

        return $range1_chartdata;
    }

    public function compareRange2($range2monthA, $range2yearA, $range2monthB, $range2yearB)
    {
        $range2_monthA = $range2monthA;
        $range2_yearA = $range2yearA;

        $range2_monthB = $range2monthB;
        $range2_yearB = $range2yearB;

        $range2_data = DB::table('papers')
                            ->select('College', DB::raw('COUNT(College) as count'))
                            ->whereBetween(DB::raw('YEAR(DateCompleted)'), [$range2_yearA, $range2_yearB])
                            ->whereBetween(DB::raw('MONTH(DateCompleted)'), [$range2_monthA, $range2_monthB])
                            ->groupBy('College')
                            ->pluck('count', 'College');  

        $range2_values = $range2_data->values();
        $range2_keys = $range2_data->keys();
    
        $range2_chartdata = $this->formatData($range2_keys, $range2_values);

        return $range2_chartdata;
    }

    public function formatData($db_labels, $db_data)
    {
            $blank_college_list = array('CAS','CBA','CCS','COE','CED','COL','CMC','CON','COPVA','DIV','GRAD','ICLS','IEMS','IRS','ISL','MED','SAITE','SBE','SPAG');

            $college_size = sizeof($blank_college_list);

            $labels_list = $db_labels->toArray();
            $labels_size = sizeof($labels_list);

            $final_month = array_fill(0, $college_size, 0);

            $y = 0;

            for($x = 0; $x < $labels_size; $x++){

                $college_list_key = array_search($labels_list[$x], $blank_college_list);

                $final_month[$college_list_key] = $db_data[$x];
            }

            return $final_month;
    }

    public function keywordFilter($month, $year) {

        $filterYear = $year;
        $filterMonth = $month;
        
        $top3_keywords = DB::table('tagging_tagged')
                ->select('tag_name', DB::raw('COUNT(tag_name) as count'))
                ->where(DB::raw('YEAR(created_at)'), '=', $filterYear)
                ->where(DB::raw('MONTH(created_at)'), '=', $filterMonth)
                ->groupBy('tag_name')
                ->orderByDesc('count')
                ->pluck('count', 'tag_name');

            return $top3_keywords;
        } 
}