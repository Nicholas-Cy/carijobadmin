<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repository\API\V1\SkillRepository;
use Illuminate\Http\Request;
use Vyuldashev\LaravelOpenApi\Attributes as OpenApi;

#[OpenApi\PathItem]
class SkillController extends Controller
{
    private SkillRepository $skillRepository;

    public function __construct(SkillRepository $skillRepository)
    {
        $this->skillRepository = $skillRepository;
    }

    /**
     *  Get all skills
     * 
     *  Get all skills from the database
     */
    #[OpenApi\Operation(tags: ['Skill'], method: 'GET')]
    public function index()
    {
        return $this->skillRepository->index();
    }

    /**
     * Get hintable skills
     * 
     * Get all skills that can be hinted
     */
    #[OpenApi\Operation(tags: ['Skill'], method: 'GET')]
    public function hintableSkills()
    {
        return $this->skillRepository->hintableSkills();
    }

    /**
     * Get user skills
     * 
     * Get all skills of a user
     */
    #[OpenApi\Operation(tags: ['Skill'], method: 'GET')]
    public function userSkills($id)
    {
        return $this->skillRepository->userSkills($id);
    }

    /**
     * Add skills to user
     * 
     * Add skills to a user
     */
    #[OpenApi\Operation(tags: ['Skill'], method: 'POST')]
    public function addSkillsToUser($id, Request $request)
    {
        $user = User::find($id);

        return $this->skillRepository->addSkillsToUser($user, $request->skills);
    }
}
