<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogPostRequest;
use App\Models\BlogPost;
use App\Repository\API\V1\BlogPostRepository;
use Illuminate\Http\Request;
use Vyuldashev\LaravelOpenApi\Attributes as OpenApi;

#[OpenApi\PathItem]
class BlogPostController extends Controller
{
    private BlogPostRepository $blogPostRepository;

    public function __construct(BlogPostRepository $blogPostRepository)
    {
        $this->blogPostRepository = $blogPostRepository;
    }

    /**
     * Get all blog posts
     * 
     * Get all blog posts from the database
     */
    #[OpenApi\Operation(tags: ['Blog Posts'], method: 'GET')]
    public function index()
    {
        return $this->blogPostRepository->index();
    }

    /**
     * Save a blog post
     * 
     * Save a blog post to the database
     */
    #[OpenApi\Operation(tags: ['Blog Posts'], method: 'POST')]
    public function store(BlogPostRequest $request)
    {
        return $this->blogPostRepository->store($request);
    }

    /**
     * Update the blog post 
     * 
     * Update the blog post in the database
     */
    #[OpenApi\Operation(tags: ['Blog Posts'], method: 'PUT')]
    public function update(BlogPostRequest $request, $id)
    {
        $blogPost = BlogPost::find($id);

        return $this->blogPostRepository->update($request, $blogPost);
    }

    /**
     * Toggle the published status of a blog post
     * 
     * Toggle the published status of a blog post in the database
     */
    #[OpenApi\Operation(tags: ['Blog Posts'], method: 'POST')]
    public function togglePublishedStatus($id)
    {
        $blogPost = BlogPost::find($id);

        return $this->blogPostRepository->togglePostPublish($blogPost);
    }

    /**
     * Get a blog post
     * 
     * Get a blog post from the database
     */
    #[OpenApi\Operation(tags: ['Blog Posts'], method: 'GET')]
    public function show($id)
    {
        return $this->blogPostRepository->show($id);
    }

    /**
     * Delete a blog post
     * 
     * Delete a blog post from the database
     */
    #[OpenApi\Operation(tags: ['Blog Posts'], method: 'DELETE')]
    public function destroy(Request $request)
    {
        $blogPost = BlogPost::find($request->id);

        return $this->blogPostRepository->destroy($blogPost);
    }

    /**
     * Get featured articles
     * 
     * Get featured articles from the database
     */
    #[OpenApi\Operation(tags: ['Blog Posts'], method: 'GET')]
    public function featuredArticles()
    {
        return $this->blogPostRepository->featuredArticles();
    }
}
