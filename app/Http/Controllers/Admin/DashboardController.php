<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repository\API\V1\Dashboard\StatsRepository;
use Vyuldashev\LaravelOpenApi\Attributes as OpenApi;

#[OpenApi\PathItem]
class DashboardController extends Controller
{
    private StatsRepository $statsRepository;

    public function __construct(StatsRepository $statsRepository)
    {
        $this->statsRepository = $statsRepository;
    }

    /**
     * Get all insights
     * 
     * Get all insights from the database
     */
    #[OpenApi\Operation(tags: ['Dashboard'], method: 'GET')]
    public function insights()
    {
        return $this->statsRepository->dashboardInsightsStats();
    }

    /**
     * Get the conversion metrics
     * 
     * Get the conversion metrics from the database
     */
    #[OpenApi\Operation(tags: ['Dashboard'], method: 'GET')]
    public function conversionMetrics()
    {
        return $this->statsRepository->dashboardConversionMetrics();
    }
}
