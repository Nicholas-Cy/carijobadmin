<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PackageRequest;
use App\Models\Package;
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

    /**
     * Save the packages
     * 
     * Save the packages to the database
     */
    
    public function store(PackageRequest $request)
    {
        return $this->packageRepository->store($request);
    }

    /**
     * Update the packages
     * 
     * Update the packages in the database
     */
    
    public function update(PackageRequest $request, $id)
    {
        $package = Package::find($id);

        return $this->packageRepository->update($request, $package);
    }

    /**
     * Delete the packages
     * 
     * Delete the packages from the database
     */
    
    public function destroy(Package $package)
    {
        return $this->packageRepository->destroy($package);
    }

    public function show()
    {
        
    }
}
