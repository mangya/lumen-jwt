<?php

namespace App\Services;

use Exception;
use App\Repositories\UserRepository;

class UserService
{
	/**
     * @var $userRepository
     */
    protected $userRepository;

    /**
     * UserService constructor.
     *
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Get one user as per the attributes
     * 
     * @param  array  $attributes
     */
    public function getByAttributes(array $attributes)
    {
        return $this->userRepository->getOneByAttributes($attributes);
    }

    /**
     * Get all users matching the attributes
     * 
     * @param  array  $attributes
     */
    public function getAll(array $attributes = [])
    {
        return $this->userRepository->getAllByAttributes($attributes);
    }

    /**
     * Create user
     * 
     * @param  array  $attributes
     */
    public function create(array $attributes)
    {
    	return $this->userRepository->create($attributes);
    }

    /**
     * Validation rules for new user registration
     * 
     * @return Array
     */
    public static function getUserRegistrationValidationRules(): array
    {
        return [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ];
    }

    /**
     * Validation rules for user login
     * 
     * @return Array
     */
    public static function getUserLoginValidationRules(): array
    {
        return [
            'email' => 'required|string',
            'password' => 'required|string',
        ];
    }
}