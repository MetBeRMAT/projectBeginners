<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $idea = Idea::with('user', 'comments.user')->orderBy('created_at', 'desc');

        if (request()->has('search')) {
            //                    colonna  operatore          valore
            $idea = $idea->where('content', 'like', '%' . request('search') . '%');
        }


        return view('dashboard', [
            'ideas' => $idea->paginate(5),
            'user' => auth()->user(),
        ]);
    }
}
