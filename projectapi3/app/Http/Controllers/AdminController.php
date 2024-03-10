<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Admin;
use Illuminate\Support\Facades\Validator;


class AdminController extends Controller
{
    public function index()
    {
        $admins = Admin::all();

        return response()->json([
            "message" => "Successfully fetched admins.",
            "data" => $admins
        ], Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name" => "required|string",
            "username" => "required|string|unique:admins,username",
            "email" => "required|string|email:rfc,dns|unique:admins,email",
            "password" => "required|string"
        ]);

        if ($validator->fails()) {
            return response()->json([
                "message" => "Failed creating a new student.",
                "errors" => $validator->errors()
            ], Response::HTTP_NOT_ACCEPTABLE);
        }

        $validated = $validator->validated();
        $validated["password"] = bcrypt($validated["password"]);

        try {
            $createdAdmin = Admin::create($validated);
        } catch (\Exception $e) {
            return response()->json([
                "message" => "Failed created a new admin.",
                "error" => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return response()->json([
            "message" => "Successfully created a new admin.",
            "data" => $createdAdmin
        ], Response::HTTP_CREATED);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            "name" => "string",
            "username" => "string|unique:admins,username",
            "email" => "string|email:rfc,dns|unique:admins,email",
            "password" => "string"
        ]);

        if ($validator->fails()) {
            return response()->json([
                "message" => "Failed creating a new admin.",
                "errors" => $validator->errors()
            ], Response::HTTP_NOT_ACCEPTABLE);
        }

        $validated = $validator->validated();

        if (isset($validated["password"])) {

            $validated["password"] = bcrypt($validated["password"]);
        }

        try {
            $admin = Admin::findOrFail($id);
            $admin->update($validated);
        } catch (\Exception $e) {
            return response()->json([
                "message" => "Failed created a new admin.",
                "error" => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return response()->json([
            "message" => "Successfully updated a new admin.",
            "data" => $admin
        ], Response::HTTP_CREATED);
    }

    public function show($id)
    {
        $admin = Admin::findOrFail($id);

        return response()->json([
            "message" => "Successfully fetched a new admin.",
            "data" => $admin
        ], Response::HTTP_OK);
    }

    public function destroy($id)
    {
        $admin = Admin::findOrFail($id);

        $admin->delete();

        return response()->json([
            "message" => "Successfully delected a admin with id {$id}.",

        ], Response::HTTP_OK);
    }
}
