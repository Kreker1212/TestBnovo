<?php

namespace App\Interface;

use App\Http\Requests\StoreGuestRequest;
use App\Http\Requests\UpdateGuestRequest;
use App\Models\Guest;
use Illuminate\Database\Eloquent\Collection;

interface GuestServiceInterface
{
    public function index(): Collection;

    public function show($id): Guest|array;

    public function store(StoreGuestRequest $request): Guest|array;

    public function update(UpdateGuestRequest $request, $id): Guest|array;

    public function destroy($id): array|null;

}
