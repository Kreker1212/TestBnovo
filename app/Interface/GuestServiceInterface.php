<?php

namespace App\Interface;

use App\Http\Requests\StoreGuestRequest;
use App\Http\Requests\UpdateGuestRequest;
use Illuminate\Http\JsonResponse;

interface GuestServiceInterface
{
    public function index(): JsonResponse;

    public function show($id): JsonResponse;

    public function store(StoreGuestRequest $request): JsonResponse;

    public function update(UpdateGuestRequest $request, $id);

    public function destroy($id);

}
