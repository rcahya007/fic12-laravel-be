<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $addresses = $request->user()->addresses;
        return response()->json(
            [
                'status' => 'success',
                'data' => $addresses,
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // save address
        $address = DB::table('addresses')->insert([
            'name' => $request->name,
            'full_address' => $request->full_address,
            'phone' => $request->phone,
            'prov_id' => $request->prov_id,
            'city_id' => $request->city_id,
            'district_id' => $request->district_id,
            'postal_code' => $request->postal_code,
            'user_id' => $request->user()->id,
            'is_default' => $request->is_default,
        ]);

        if ($address) {
            return response()->json(
                [
                    'status' => 'success',
                    'message' => 'address saved',
                ]
            );
        } else {
            return response()->json(
                [
                    'status' => 'error',
                    'message' => 'address failed to saved',
                ]
            );
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function updateDefaultAddress(Request $request, $id)
    {
        $addressDefault = Address::where('user_id', $id)
            ->where('is_default', true)
            ->update([
                'is_default' => false,
            ]);

        $address = Address::findOrFail($request->id);
        $address->is_default = true;
        $address->save();

        return response()->json([
            'message' => 'success',
            'addressDefault' => $addressDefault,
            'newAddressDefault' => $address,
        ]);
    }
}
