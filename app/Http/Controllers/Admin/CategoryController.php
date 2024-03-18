<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
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
     * Get all categories
     * 
     * Get all categories from the database
     */
    #[OpenApi\Operation(tags: ['Category'], method: 'GET')]
    public function index()
    {
        return $this->categoryRepository->index();
    }

    /**
     * Store a category
     * 
     * Store a category in the database
     */
    #[OpenApi\Operation(tags: ['Category'], method: 'POST')]
    public function store(CategoryRequest $request)
    {
        return $this->categoryRepository->store($request);
    }

    /**
     * Update a category
     * 
     * Update a category in the database
     */
    #[OpenApi\Operation(tags: ['Category'], method: 'PUT')]
    public function update(CategoryRequest $request, Category $category)
    {
        return $this->categoryRepository->update($request, $category);
    }

    /**
     * Delete a category
     * 
     * Delete a category from the database
     */
    #[OpenApi\Operation(tags: ['Category'], method: 'DELETE')]
    public function destroy(Category $category)
    {
        return $this->categoryRepository->destroy($category);
    }

    /**
     * Show a category
     * 
     * Show a category from the database
     */
    #[OpenApi\Operation(tags: ['Category'], method: 'GET')]
    public function show()
    {

    }
}
