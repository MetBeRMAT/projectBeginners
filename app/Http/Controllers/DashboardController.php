<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $idea = Idea::orderBy('created_at', 'desc');

        if (request()->has('search')) {
            //                    colonna  operatore          valore
            $idea = $idea->where('content', 'like', '%' . request('search') . '%');
        }


        return view('components.storefront.storefront', [
            'ideas' => $idea->paginate(5)
        ]);
    }
}
