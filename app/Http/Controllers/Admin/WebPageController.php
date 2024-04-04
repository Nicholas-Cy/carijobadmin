<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\WebPageRequest;
use App\Models\WebPage;
use App\Repository\API\V1\WebPageRepository;
use Illuminate\Http\Request;

class WebPageController extends Controller
{
    private WebPageRepository $webPageRepository;

    public function __construct(WebPageRepository $webPageRepository)
    {
        $this->webPageRepository = $webPageRepository;
    }

    /**
     * Get all web pages
     * 
     * Get all web pages from the database
     */
    
    public function index()
    {
        return $this->webPageRepository->index();
    }

    /**
     * Get all posts
     * 
     * Get all posts from the database
     */
    
    public function allPosts()
    {
        return $this->webPageRepository->allPosts();
    }

    /**
     * Show a webpage
     * 
     * Show a webpage to the user
     */
    
    public function show($id)
    {
        return $this->webPageRepository->show($id);
    }

    /**
     * Update a webpage
     * 
     * Update a webpage in the database
     */
    
    public function update(WebPageRequest $request, $id)
    {
        $webPage = WebPage::find($id);

        return $this->webPageRepository->update($request, $webPage);
    }

    /**
     * Delete a webpage
     * 
     * Delete a webpage from the database
     */
    
    public function destroy(Request $request)
    {
        $webPage = WebPage::find($request->id);

        return $this->webPageRepository->destroy($webPage);
    }

    /**
     * Store a webpage
     * 
     * Store a webpage in the database
     */
    
    public function store()
    {
        
    }
}
