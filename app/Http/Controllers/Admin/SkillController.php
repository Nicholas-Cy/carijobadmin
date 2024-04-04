<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SkillRequest;
use App\Models\Skill;
use App\Repository\API\V1\SkillRepository;

class SkillController extends Controller
{
    private SkillRepository $skillRepository;

    public function __construct(SkillRepository $skillRepository)
    {
        $this->skillRepository = $skillRepository;
    }

    /**
     * Get all skills
     * 
     * Get all skills from the database
     */
    
    public function index()
    {
        return $this->skillRepository->index();
    }

    /**
     * Store a skills
     * 
     * Store a skills in the database
     */
    
    public function store(SkillRequest $request)
    {
        return $this->skillRepository->store($request);
    }

    /**
     * Update the skills
     * 
     * Update the skills in the database
     */
    
    public function update(SkillRequest $request, $id)
    {
        $skill = Skill::find($id);

        return $this->skillRepository->update($request, $skill);
    }

    /**
     * Delete the skills
     * 
     * Delete the skills from the database
     */
    
    public function destroy(Skill $skill)
    {
        return $this->skillRepository->destroy($skill);
    }

    /**
     * Show the skills
     * 
     * Show the skills from the database
     */
    
    public function show()
    {

    }
}
