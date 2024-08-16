<?php

namespace App\Service;

use App\Http\Requests\StoreGuestRequest;
use App\Http\Requests\UpdateGuestRequest;
use App\Interface\GuestServiceInterface;
use App\Models\Guest;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Validation\ValidationException;

class GuestService implements GuestServiceInterface
{
    public function index(): Collection
    {
        return Guest::all();
    }
    public function show($id): Guest|array
    {
        $guest = Guest::find($id);

        if (!$guest) {
            return ['message' => 'Guest not found'];
        }

        return $guest;
    }

    public function store(StoreGuestRequest $request): Guest|array
    {
        try {
            $validated = $request->validated();

            $guest = new Guest();
            $guest->fill($validated);

            if (empty($guest->country)) {
                $guest->country = Guest::getCountryFromPhone($guest->phone);
            }

            $guest->save();

            return $guest;
        } catch (ValidationException $e) {

            return [
                'message' => 'Validation failed',
                'errors' => $e->errors(),
                'code' => $e->getStatusCode()
            ];
        }
    }

    public function update(UpdateGuestRequest $request, $id): Guest|array
    {
        try {
            $validated = $request->validated();

            $guest = Guest::find($id);

            if (!$guest) {
                return ['message' => 'Guest not found'];
            }

            $guest->fill($validated);

            if (empty($guest->country)) {
                $guest->country = Guest::getCountryFromPhone($guest->phone);
            }

            $guest->save();

            return $guest;
        } catch (ValidationException $e) {

            return [
                'message' => 'Validation failed',
                'errors' => $e->errors(),
                'code' => $e->getStatusCode()
            ];
        }
    }

    public function destroy($id): array|bool
    {
        $guest = Guest::find($id);

        if (!$guest) {
            return ['message' => 'Guest not found'];
        }

       return $guest->delete();
    }
}
