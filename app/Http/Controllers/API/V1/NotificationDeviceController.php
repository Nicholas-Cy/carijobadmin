<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Notifications\PartnerNotificationDeviceRequest;
use App\Http\Requests\Notifications\UserNotificationDeviceRequest;
use App\Models\Partner;
use App\Models\User;
use App\Repository\API\V1\Notifications\NotificationDeviceRepository;
use Illuminate\Http\Request;
use Vyuldashev\LaravelOpenApi\Attributes as OpenApi;

#[OpenApi\PathItem]
class NotificationDeviceController extends Controller
{
    private NotificationDeviceRepository $notificationDeviceRepository;

    public function __construct(NotificationDeviceRepository $notificationDeviceRepository)
    {
        $this->notificationDeviceRepository = $notificationDeviceRepository;
    }

    /**
     * Retrieve device for a specific user
     */
    #[OpenApi\Operation(tags: ['NotificationDevice'], method: 'GET')]
    public function retrieveUserDevices(Request $request)
    {
        $user = User::find($request->user_id);

        return $this->notificationDeviceRepository->retrieveUserDevices($user);
    }

    /**
     * Retrieve device for a specific partner
     */
    #[OpenApi\Operation(tags: ['NotificationDevice'], method: 'GET')]
    public function retrievePartnerDevices(Request $request)
    {
        $partner = Partner::find($request->partner_id);

        return $this->notificationDeviceRepository->retrievePartnerDevices($partner);
    }

    /**
     * Save a user's device
     */
    #[OpenApi\Operation(tags: ['NotificationDevice'], method: 'POST')]
    public function saveUserDevice(UserNotificationDeviceRequest $request)
    {
        return $this->notificationDeviceRepository->saveUserDevice($request);
    }

    /**
     * Save a partner's device
     */
    #[OpenApi\Operation(tags: ['NotificationDevice'], method: 'POST')]
    public function savePartnerDevice(PartnerNotificationDeviceRequest $request)
    {
        return $this->notificationDeviceRepository->savePartnerDevice($request);
    }
}
