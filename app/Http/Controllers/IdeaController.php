<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function store()
    {
        $validated = request()->validate([
            'content' => 'required|min:3|max:255',
        ]);

        $validated['user_id'] = auth()->id();

        Idea::create($validated);

        return redirect()->back()->with('success', 'Idea was added successfully!');
    }

    public function show(Idea $idea)
    {
        $editing = false;
        $user = auth()->user();
        return view('ideas.show', compact('idea', 'editing', 'user'));
    }
    public function destroy(Idea $idea)
    {
        if (auth()->id() !== $idea->user_id) {
            return redirect()->route('dashboard')->with('error', 'You are not allowed to delete this idea!');
        }

        $idea->delete();

        return redirect()->route('dashboard')->with('success', 'Idea was deleted successfully!');
    }


    public function edit(Idea $idea)
    {
        if (auth()->id() !== $idea->user_id) {
            return redirect()->route('dashboard')->with('error', 'You are not allowed to edit this idea!');
        }

        $editing = true;
        $user = auth()->user();
        return view('ideas.show', compact('idea', 'editing', 'user'));
    }


    public function update(Idea $idea)
    {
        if (auth()->id() !== $idea->user_id) {
            return redirect()->route('dashboard')->with('error', 'You are not allowed to edit this idea!');
        }

        request()->validate([
            'content' => 'required|min:5|max:255',
        ]);

        $idea->update([
            'content' => request()->get('content'),
        ]);

        return redirect()->back()->with('success', 'Idea was updated successfully!');
    }
}
