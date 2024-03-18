<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FeatureRequest;
use App\Models\Feature;
use App\Repository\API\V1\FeatureRepository;
use Vyuldashev\LaravelOpenApi\Attributes as OpenApi;

#[OpenApi\PathItem]
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
    #[OpenApi\Operation(tags: ['Features'], method: 'GET')]
    public function index()
    {
        return $this->featureRepository->index();
    }

    /**
     * Save a feature
     * 
     * Save a feature to the database
     */
    #[OpenApi\Operation(tags: ['Features'], method: 'POST')]
    public function store(FeatureRequest $request)
    {
        return $this->featureRepository->store($request);
    }

    /**
     * Update the feature
     * 
     * Update the feature in the database
     */
    #[OpenApi\Operation(tags: ['Features'], method: 'PUT')]
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
    #[OpenApi\Operation(tags: ['Features'], method: 'DELETE')]
    public function destroy(Feature $feature)
    {
        return $this->featureRepository->destroy($feature);
    }

    /**
     * Show the feature
     * 
     * Show the feature to the dashboard
     */
    #[OpenApi\Operation(tags: ['Features'], method: 'GET')]
    public function show() 
    {
        
    }
}
