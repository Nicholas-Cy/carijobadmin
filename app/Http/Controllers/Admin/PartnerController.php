<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditPartnerRequest;
use App\Http\Requests\PartnerRequest;
use App\Models\Partner;
use App\Repository\Partner\PartnerRepository;
use Vyuldashev\LaravelOpenApi\Attributes as OpenApi;

#[OpenApi\PathItem]
class PartnerController extends Controller
{
    private PartnerRepository $partnerRepository;

    public function __construct(PartnerRepository $partnerRepository)
    {
        $this->partnerRepository = $partnerRepository;
    }

    /**
     * Get all partners
     * 
     * Get all partners from the database
     */
    #[OpenApi\Operation(tags: ['Partner'], method: 'GET')]
    public function index()
    {
        return $this->partnerRepository->index();
    }

    /**
     * Store a new partner
     * 
     * Store a new partner in the database
     */
    #[OpenApi\Operation(tags: ['Partner'], method: 'POST')]
    public function store(PartnerRequest $request)
    {
        return $this->partnerRepository->store($request);
    }

    /**
     * Update a partner
     * 
     * Update a partner in the database
     */
    #[OpenApi\Operation(tags: ['Partner'], method: 'PUT')]
    public function update(EditPartnerRequest $request, $id)
    {
        $partner = Partner::find($id);

        return $this->partnerRepository->update($request, $partner);
    }

    /**
     * Delete a partner
     * 
     * Delete a partner from the database
     */
    #[OpenApi\Operation(tags: ['Partner'], method: 'DELETE')]
    public function destroy(Partner $partner)
    {
        return $this->partnerRepository->destroy($partner);
    }

    public function show()
    {

    }
}
