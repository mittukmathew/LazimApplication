<?php

namespace App\Repositories;

use App\Models\User;
use App\Interface\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    /**
     * Create a new User.
     *
     * @param User $user The User instance to create.
     * @return User The created User instance.
     */
    public function create(array $user): User
    {
        return User::create($user);
    }

    /**
     * Update a User.
     *
     * @param User $user The User instance to update.
     * @return User The updated User instance.
     */
    public function update(User $user): User
    {
        return User::where('id', $user->id)->update($user);
    }

    /**
     * Delete a User.
     *
     * @param User $user The User instance to delete.
     * @return bool True if the user is successfully deleted, false otherwise.
     */
    public function delete(string $id): bool
    {
        return User::destroy($id);
    }

    public function get(string $id): User
    {
        return User::find($id);
    }

    /**
     * Find a user by ID.
     *
     * @param int $id The ID of the user to find.
     * @return User|null The found User instance, or null if not found.
     */
    public function findById(int $id): User
    {
        return User::find($id);
    }

    /**
     * Get all users.
     *
     * @return array An array of User instances.
     */
    public function findAll(): array
    {
        return User::all()->toArray();
    }

    /**
     * Find a user by email.
     *
     * @param string $email The email of the user to find.
     * @return User|null The found User instance, or null if not found.
     */
    public function findByEmail(string $email): User
    {
        return User::where('email', $email)->first();
    }

    public function findByUUID(string $uuid): User
    {
        return User::findOrFail($uuid);
    }
}
