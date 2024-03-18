<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Repository\API\V1\PackageRepository;
use Vyuldashev\LaravelOpenApi\Attributes as OpenApi;

#[OpenApi\PathItem]
class PackageController extends Controller
{
    private PackageRepository $packageRepository;

    public function __construct(PackageRepository $packageRepository)
    {
        $this->packageRepository = $packageRepository;
    }

    /**
     * Get all packages
     * 
     * Get all packages from the database
     */
    #[OpenApi\Operation(tags: ['Package'], method: 'GET')]
    public function index()
    {
        return $this->packageRepository->index();
    }
}
