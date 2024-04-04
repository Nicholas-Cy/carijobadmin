<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Notifications\PartnerNotificationSettingRequest;
use App\Http\Requests\Notifications\UserNotificationSettingRequest;
use App\Models\Partner;
use App\Models\User;
use App\Repository\API\V1\Notifications\NotificationSettingRepository;
use Illuminate\Http\Request;

class NotificationSettingController extends Controller
{
    private NotificationSettingRepository $notificationRepository;

    public function __construct(NotificationSettingRepository $notificationRepository)
    {
        $this->notificationRepository = $notificationRepository;
    }

    /**
     * Retrieve settings for a specific user
     * 
     * Retrieve settings for a specific user from the database
     */
    
    public function retrieveUser(Request $request)
    {
        $user = User::find($request->user_id);

        return $this->notificationRepository->retrieveSettingsUser($user);
    }

    /**
     * Retrieve settings for a specific partner
     * 
     * Retrieve settings for a specific partner from the database
     */
    
    public function retrievePartner(Request $request)
    {
        $partner = Partner::find($request->partner_id);

        return $this->notificationRepository->retrieveSettingsPartner($partner);
    }

    /**
     * Save a specific user notification settings
     * 
     * Save a specific user notification settings to the database
     */
    
    public function saveSettingUser(UserNotificationSettingRequest $request)
    {
        return $this->notificationRepository->saveSettingUser($request);
    }

    /**
     * Save a specific partner notification settings
     * 
     * Save a specific partner notification settings to the database
     */
    
    public function saveSettingPartner(PartnerNotificationSettingRequest $request)
    {
        return $this->notificationRepository->saveSettingPartner($request);
    }
}
