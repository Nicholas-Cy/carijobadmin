<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Repository\User\UserRepository;
use Vyuldashev\LaravelOpenApi\Attributes as OpenApi;

/**
 * @purpose
 *
 * Provides a controller for performing actions on users
 */
#[OpenApi\PathItem]
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
    #[OpenApi\Operation(tags: ['User'], method: 'GET')]
    public function index()
    {
        return $this->userRepository->index();
    }

    /**
     * Store a new user
     * 
     * Store a new user in the database
     */
    #[OpenApi\Operation(tags: ['User'], method: 'POST')]
    public function store(UserRequest $request)
    {
        return $this->userRepository->store($request);
    }

    /**
     * Update a user
     * 
     * Update a user in the database
     */
    #[OpenApi\Operation(tags: ['User'], method: 'PUT')]
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
    #[OpenApi\Operation(tags: ['User'], method: 'DELETE')]
    public function destroy(User $user)
    {
        return $this->userRepository->destroy($user);
    }

    public function show()
    {
        
    }
}
