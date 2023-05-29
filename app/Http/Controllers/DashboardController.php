<?php

namespace App\Http\Controllers;
;

use App\Models\Message;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Show the application dashboard.
     */
    public function index(): View
    {
        return view('dashboard', [
            'messages' => Message::whereColumn('created_at', 'updated_at')
                ->where('published', 0)
                ->orderBy('created_at', 'desc')
                ->get()
        ]);
    }
}