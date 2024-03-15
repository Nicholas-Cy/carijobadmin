<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Repository\API\V1\CategoryRepository;
use Vyuldashev\LaravelOpenApi\Attributes as OpenApi;

#[OpenApi\PathItem]
class CategoryController extends Controller
{
    private CategoryRepository $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /** 
     * List all categories
     */
    #[OpenApi\Operation(tags: ['Category'], method: 'GET')]
    public function index()
    {
        return $this->categoryRepository->index();
    }

    /** 
     * Get jobs in a specific category
     */
    #[OpenApi\Operation(tags: ['Category'], method: 'GET')]
    public function getJobsInCategory($id)
    {
        $category = Category::find($id)->first();

        return $this->categoryRepository->getJobsInCategory($category);
    }
}
