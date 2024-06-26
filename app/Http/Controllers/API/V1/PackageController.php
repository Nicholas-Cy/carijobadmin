<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Repository\API\V1\PackageRepository;

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
    
    public function index()
    {
        return $this->packageRepository->index();
    }
}
