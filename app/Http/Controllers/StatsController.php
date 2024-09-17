<?php

namespace App\Http\Controllers;

use App\Services\ClickHouseService;

use Illuminate\Http\Request;

class StatsController extends Controller
{
    protected $clickhouse;
    private $labels = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

    public function __construct(ClickHouseService $clickhouse)
    {
        $this->clickhouse = $clickhouse;
    }

    public function getClicks(Request $request) {
        $data = $this->clickhouse->select(
            "SELECT SUM(clicks) AS total_clicks FROM
            sc_countries_only sco WHERE country = '$request->country'
            AND YEAR(date) = '$request->year'
            GROUP BY MONTH(date) ORDER BY MONTH(date)"
        );

        $totalClicks = array_map(function($row) {
            return $row['total_clicks'];
        }, $data);

        return response()->json([
            'labels' => $this->labels,
            'datasets' => [
                [
                    'label' => '',
                    'data' => $totalClicks,
                    'backgroundColor' => [
                        'rgb(255, 51, 86)'
                    ],
                    'borderWidth' => 1,
                ],
            ],
        ]);
    }

    public function getImpressions(Request $request) {
        $data = $this->clickhouse->select(
            "SELECT SUM(impressions) AS total_impressions FROM
            sc_countries_only sco WHERE country = '$request->country'
            AND YEAR(date) = '$request->year'
            GROUP BY MONTH(date) ORDER BY MONTH(date)"
        );

        $totalImpressions = array_map(function($row) {
            return $row['total_impressions'];
        }, $data);

        return response()->json([
            'labels' => $this->labels,
            'datasets' => [
                [
                    'label' => '',
                    'data' => $totalImpressions,
                    'backgroundColor' => [
                        'rgb(116, 212, 242)'
                    ],
                    'borderWidth' => 1,
                ],
            ],
        ]);
    }
}
