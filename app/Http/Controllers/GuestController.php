<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreGuestRequest;
use App\Http\Requests\UpdateGuestRequest;
use App\Service\GuestService;
use Illuminate\Http\JsonResponse;

class GuestController extends Controller
{
    public function __construct(
        private GuestService $service
    )
    {
    }

    public function index(): JsonResponse
    {
       return $this->service->index();
    }

    public function show(int $id): JsonResponse
    {
        return $this->service->show($id);
    }

    public function store(StoreGuestRequest $request): JsonResponse
    {
        return $this->service->store($request);
    }

    public function update(UpdateGuestRequest $request, int $id): JsonResponse
    {
        return $this->service->update($request, $id);
    }

    public function destroy(int $id): JsonResponse
    {
        return $this->service->destroy($id);
    }
}
