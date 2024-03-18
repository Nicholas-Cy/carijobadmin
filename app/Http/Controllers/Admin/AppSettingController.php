<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AppSettingRequest;
use App\Models\AppSetting;
use App\Repository\API\V1\AppSettingRepository;
use Vyuldashev\LaravelOpenApi\Attributes as OpenApi;

#[OpenApi\PathItem]
class AppSettingController extends Controller
{
    private AppSettingRepository $appSettingRepository;

    public function __construct(AppSettingRepository $appSettingRepository)
    {
        $this->appSettingRepository = $appSettingRepository;
    }

    /**
     * Get general settings
     * 
     * Get general settings from the database
     */
    #[OpenApi\Operation(tags: ['App Settings'], method: 'GET')]
    public function generalSettings()
    {
        return $this->appSettingRepository->generalSettings();
    }

    /**
     * Get application settings
     * 
     * Get application settings from the database
     */
    #[OpenApi\Operation(tags: ['App Settings'], method: 'GET')]
    public function applicationSettings()
    {
        return $this->appSettingRepository->applicationSettings();
    }

    /**
     * Save an application setting
     * 
     * Save an application setting to the database
     */
    #[OpenApi\Operation(tags: ['App Settings'], method: 'POST')]
    public function store(AppSettingRequest $request)
    {
        return $this->appSettingRepository->store($request);
    }

    /**
     * Delete an application setting
     * 
     * Delete an application setting from the database
     */
    #[OpenApi\Operation(tags: ['App Settings'], method: 'DELETE')]
    public function destroy(AppSetting $appSetting)
    {
        return $this->appSettingRepository->destroy($appSetting);
    }
}
