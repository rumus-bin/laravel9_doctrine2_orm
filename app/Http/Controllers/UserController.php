<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(
        private readonly UserRepository $userRepository
    ) {
    }

    public function index(): JsonResponse
    {
        return response()->json($this->userRepository->index());
    }

    public function store(Request $request): JsonResponse
    {
        $user = $this->userRepository->create($request->name, $request->email, $request->password);

        return response()
            ->json([
                'id' => $user->getId(),
                'name' => $user->getName(),
                'email' => $user->getEmail(),
            ]);
    }

    public function show(Request $request): JsonResponse
    {
        return response()->json($this->userRepository->findById($request->user_id));
    }

}
