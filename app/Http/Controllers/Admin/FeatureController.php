<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FeatureRequest;
use App\Models\Feature;
use App\Repository\API\V1\FeatureRepository;

class FeatureController extends Controller
{
    private FeatureRepository $featureRepository;

    public function __construct(FeatureRepository $featureRepository)
    {
        $this->featureRepository = $featureRepository;
    }

    /**
     * Get all features
     * 
     * Get all features from the database
     */
    
    public function index()
    {
        return $this->featureRepository->index();
    }

    /**
     * Save a feature
     * 
     * Save a feature to the database
     */
    
    public function store(FeatureRequest $request)
    {
        return $this->featureRepository->store($request);
    }

    /**
     * Update the feature
     * 
     * Update the feature in the database
     */
    
    public function update(FeatureRequest $request, $id)
    {
        $feature = Feature::find($id);

        return $this->featureRepository->update($request, $feature);
    }

    /**
     * Delete the feature
     * 
     * Delete the feature from the database
     */
    
    public function destroy(Feature $feature)
    {
        return $this->featureRepository->destroy($feature);
    }

    /**
     * Show the feature
     * 
     * Show the feature to the dashboard
     */
    
    public function show() 
    {
        
    }
}
