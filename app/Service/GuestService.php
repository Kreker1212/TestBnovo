<?php

namespace App\Service;

use App\Http\Requests\StoreGuestRequest;
use App\Http\Requests\UpdateGuestRequest;
use App\Interface\GuestServiceInterface;
use App\Models\Guest;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class GuestService implements GuestServiceInterface
{
    public function index(): JsonResponse
    {
        return response()->json(Guest::all());
    }

    public function show($id): JsonResponse
    {
        $guest = Guest::find($id);

        if (!$guest) {
            return response()->json(['message' => 'Guest not found'], 404);
        }

        return response()->json($guest);
    }

    public function store(StoreGuestRequest $request): JsonResponse
    {
        try {
            $validated = $request->validated();

            $guest = new Guest();
            $guest->fill($validated);

            if (empty($guest->country)) {
                $guest->country = Guest::getCountryFromPhone($guest->phone);
            }

            $guest->save();

            return response()->json($guest, 201);
        } catch (ValidationException $e) {

            return response()->json([
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        }
    }

    public function update(UpdateGuestRequest $request, $id)
    {
        try {
            $validated = $request->validated();

            $guest = Guest::findOrFail($id);
            $guest->fill($validated);

            if (empty($guest->country)) {
                $guest->country = Guest::getCountryFromPhone($guest->phone);
            }

            $guest->save();

            return response()->json($guest);
        } catch (ValidationException $e) {

            return response()->json([
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        }
    }

    public function destroy($id)
    {
        $guest = Guest::find($id);

        if (!$guest) {
            return response()->json(['message' => 'Guest not found'], 404);
        }

        $guest->delete();

        return response()->json(null, 204);
    }

}
