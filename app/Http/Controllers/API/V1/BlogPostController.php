<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Repository\API\V1\BlogPostRepository;
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
     * List all blog post
     * 
     * List all blog posts from the database
     */ 
    #[OpenApi\Operation(tags: ['Blog Posts'], method: 'GET')]
    public function index()
    {
        return $this->blogPostRepository->web_index();
    }

    /** 
     * Show a specific blog post
     * 
     * Show a specific blog post from the database
     */
    #[OpenApi\Operation( tags: ['Blog Posts'], method: 'GET')]
    public function show($id)
    {
        return $this->blogPostRepository->show($id);
    }

    /** 
     * List featured blog posts
     * 
     * List featured blog posts from the database
     */
    #[OpenApi\Operation( tags: ['Blog Posts'], method: 'GET')]
    public function featuredArticles()
    {
        return $this->blogPostRepository->featuredArticles();
    }
}
