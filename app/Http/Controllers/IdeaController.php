<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function store()
    {
        request()->validate([
            'idea' => 'required|min:5|max:255',
        ]);

        $idea = Idea::create([
            'content' => request()->get('idea'),
        ]);

        return redirect()->back()->with('success', 'Idea was added successfully!');
    }

    public function destroy(Idea $idea)
    {
        $idea->delete();

        return redirect()->route('home')->with('success', 'Idea was deleted successfully!');
    }

    public function show(Idea $idea)
    {
        return view('components.ideas.show', compact('idea'));
    }

    public function edit(Idea $idea)
    {
        $editing = true;
        return view('components.ideas.show', compact('idea', 'editing'));
    }

    public function update(Idea $idea)
    {
        request()->validate([
            'idea' => 'required|min:5|max:255',
        ]);

        $idea->update([
            'content' => request()->get('idea'),
        ]);

        return redirect()->back()->with('success', 'Idea was updated successfully!');
    }
}
