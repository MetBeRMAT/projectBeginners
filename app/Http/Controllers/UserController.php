<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{



    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $ideas = $user->ideas()->paginate(5);

        return view('components.users.show', compact('user', 'ideas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $ideas = $user->ideas()->paginate(5);

        return view('components.users.edit', compact('user', 'ideas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(User $user)
    {
        $validate = request()->validate([
            'name' => 'required|min:3|max:255',
            'bio' => 'required|min:1|max:255',
            'image' => 'max:10000'
        ]);

        if (request()->has('image')) {
            $imagePath = request()->file('image')->store('profile', 'public');
            $validate['image'] = $imagePath;

            Storage::disk('public')->delete($user->image ?? '');
        }

        $user->update($validate);

        return redirect()->route('profile');
    }

    public function profile()
    {
        return $this->show(User::find(auth()->id()));
    }
}
