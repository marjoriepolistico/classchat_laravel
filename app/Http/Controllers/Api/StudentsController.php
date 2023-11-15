<?php

namespace App\Http\Controllers\Api;

use App\Models\Students;
use App\Http\Requests\StudentsRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Storage;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Students::all();
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StudentsRequest $request)
    {
        $validated = $request->validated();

        $validated['password'] = Hash::make($validated['password']);

        $user = Students::create($validated);

        return $user;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Students::findOrFail($id);
    }


    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(StudentsRequest $request, string $id)
    // {
    //     $user = Students::findOrFail($id);

    //     $validated = $request->validated();

    //     $user->name = $validated['firstname'] . ' ' . $validated['lastname'] . ' ' . $validated['middlename'];

    //     $user->save();

    //     return $user;
    // }

    // /**
    //  * Update the email of the specified resource in storage.
    //  */
    // public function email(StudentsRequest $request, string $id)
    // {
    //     $user = Students::findOrFail($id);

    //     $validated = $request->validated();

    //     $user->email = $validated['email'];

    //     $user->save();

    //     return $user;
    // }

    // /**
    //  * Update the password of the specified resource in storage.
    //  */
    // public function password(StudentsRequest $request, string $id)
    // {
    //     $user = Students::findOrFail($id);

    //     $validated = $request->validated();

    //     $user->password = Hash::make($validated['password']);

    //     $user->save();

    //     return $user;
    // }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Students::findOrFail($id);

        $user->delete();

        return $user;
    }
}
