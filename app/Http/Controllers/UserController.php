<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Mutasi;
use App\Models\Barang;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function register(Request $request)
        {
            try {
                $validateuser = Validator::make($request->all(),
                [
                    'name' => 'required',
                    'email' => 'required|email|unique:users,email',
                    'password' => 'required',
                ]
                );

                if ($validateuser->fails()) {
                    return response()->json([
                        'status' => false,
                        'message' => 'validation error',
                        'errors' => $validateuser->errors()
                    ],401);
                }

                $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password), // Encrypt password
                ]);

                return response()->json([
                    'status' => true,
                    'message' => 'User created Succesfully',
                    'token' => $user->createToken('API TOKEN')->plainTextToken
                ], 200);
            } catch (\Throwable $th) {
                // Return Json Response
                return response()->json([
                    'status' => false,
                    'message' => $th->getMessage(),
                ], 500);
            }
        }

        public function login(Request $request)
        {
            try {
                $validateuser = Validator::make($request->all(),
                    [
                        'email' => 'required|email',
                        'password' => 'required',
                    ]
                );

                if ($validateuser->fails()) {
                    return response()->json([
                        'status' => false,
                        'message' => 'validation error',
                        'errors' => $validateuser->errors()
                    ], 401);
                }

                if (!Auth::attempt(($request->only(['email','password'])))) {
                    return response()->json(['status' => false,
                        'status' => false,
                        'message' => 'Something went really wrong!',
                    ],401);
                }

                $user = User::where('email', $request->email)->first();

                return response()->json([
                    'status' => true,
                    'message' => 'Succesfully login',
                    'token' => $user->createToken('API TOKEN')->plainTextToken
                ], 200);

            } catch (\Throwable $th) {
                // Return Json Response
                return response()->json([
                    'status' => false,
                    'message' => $th->getMessage(),
                ], 500);
            }
        }

    public function barangMutasiHistory($id)
        {
        try {
            $barang = Barang::find($id);

            if (!$barang) {
                return response()->json(['status' => false, 'message' => 'Barang not found'], 404);
            }

            $mutasi = $barang->mutasi; // Asumsi Anda sudah mendefinisikan relasi di model Barang

            if ($mutasi->isEmpty()) {
                return response()->json(['status' => false, 'message' => 'No mutasi found for this barang'], 404);
            }

            return response()->json([
                'status' => true,
                'message' => 'Mutasi history retrieved successfully',
                'data' => $mutasi
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => 'Internal server error',
                'error' => $th->getMessage(),
            ], 500);
        }
    }

    public function userMutasiHistory($id)
        {
        try {
            // Find the user by ID
            $user = User::find($id);

            if (!$user) {
                return response()->json(['status' => false, 'message' => 'User not found'], 404);
            }

            // Retrieve mutasi related to the user
            $mutasi = $user->mutasi; // Assuming you have defined the relation in the User model

            if ($mutasi->isEmpty()) {
                return response()->json(['status' => false, 'message' => 'No mutasi found for this user'], 404);
            }

            return response()->json([
                'status' => true,
                'message' => 'Mutasi history retrieved successfully',
                'data' => $mutasi
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => 'Internal server error',
                'error' => $th->getMessage(),
            ], 500);
        }
}

}
