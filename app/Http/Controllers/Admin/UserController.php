<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Repository\User\UserRepository;

/**
 * @purpose
 *
 * Provides a controller for performing actions on users
 */
class UserController extends Controller
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Get all users
     * 
     * Get all users from the database
     */
    
    public function index()
    {
        return $this->userRepository->index();
    }

    /**
     * Store a new user
     * 
     * Store a new user in the database
     */
    
    public function store(UserRequest $request)
    {
        return $this->userRepository->store($request);
    }

    /**
     * Update a user
     * 
     * Update a user in the database
     */
    
    public function update(UserRequest $request, $id)
    {
        $user = User::find($id);

        return $this->userRepository->update($request, $user);
    }

    /**
     * Delete a user
     * 
     * Delete a user from the database
     */
    
    public function destroy(User $user)
    {
        return $this->userRepository->destroy($user);
    }

    public function show()
    {
        
    }
}
