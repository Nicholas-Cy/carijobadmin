<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostDurationRequest;
use App\Models\PostDuration;
use App\Repository\API\V1\PostDurationRepository;

class PostDurationController extends Controller
{
    private PostDurationRepository $postdurationRepository;

    public function __construct(PostDurationRepository $postdurationRepository)
    {
        $this->postdurationRepository = $postdurationRepository;
    }

    /**
     * Get all post durations
     * 
     * Get all post durations from the database
     */
    
    public function index()
    {
        return $this->postdurationRepository->index();
    }

    /**
     * Save post duration
     * 
     * Save post duration to the database
     */
    
    public function store(PostDurationRequest $request)
    {
        return $this->postdurationRepository->store($request);
    }

    /**
     * Update post duration
     * 
     * Update post duration in the database
     */
    
    public function update(PostDurationRequest $request, $id)
    {
        $postduration = PostDuration::find($id);

        return $this->postdurationRepository->update($request, $postduration);
    }

    /**
     * Delete post duration
     * 
     * Delete post duration from the database
     */
    
    public function destroy($id)
    {
        $postduration = PostDuration::find($id);

        return $this->postdurationRepository->destroy($postduration);
    }

    /**
     * Show post duration
     * 
     * Show post duration to the dashboard
     */
    
    public function show()
    {
        
    }
}
