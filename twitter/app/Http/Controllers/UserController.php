<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Idea;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{



    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $ideas = $user->ideas()->paginate(5);
        return view('users.show', compact('user', 'ideas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $editing = true;
        $ideas = $user->ideas()->paginate(5);
        return view('users.show', compact('user', 'editing', 'ideas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(User $user)
    {
        $validated = request()->validate([
            'name' => 'required|string|min:3|max:255',
            'bio' => 'nullable|string|min:3|max:255',
            'image' => 'image',
        ]);

        if (request()->hasFile('image')) {
            $validated['image'] = request()->file('image')->store('profile_images', 'public');
        }

        Storage::disk('public')->delete($user->image);

        $user->update($validated);

        return redirect()->route('profile');
    }
    public function profile()
    {
        return $this->show(auth()->user());
    }


}
