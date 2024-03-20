<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AppSettingRequest;
use App\Models\AppSetting;
use App\Repository\API\V1\AppSettingRepository;

class AppSettingController extends Controller
{
    private AppSettingRepository $appSettingRepository;

    public function __construct(AppSettingRepository $appSettingRepository)
    {
        $this->appSettingRepository = $appSettingRepository;
    }

    /**
     * Get general settings
     */
    public function generalSettings()
    {
        return $this->appSettingRepository->generalSettings();
    }

    /**
     * Get application settings
     */
    public function applicationSettings()
    {
        return $this->appSettingRepository->applicationSettings();
    }

    /**
     * Save an application setting
     */
    public function store(AppSettingRequest $request)
    {
        return $this->appSettingRepository->store($request);
    }

    /**
     * Delete an application setting
     */
    public function destroy(AppSetting $appSetting)
    {
        return $this->appSettingRepository->destroy($appSetting);
    }
}
