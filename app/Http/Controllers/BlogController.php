<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $page = [
            'title' => "Le Blog | Dominique Joyes : Magnétiseur guérisseur",
            'description' => "Question et réponse ",
            'keywords' => 'magnétiseur paris, joyes, dominique joyes, joyes dominique, magnétiseur, guérisseur, rebouteux, thérapeute, ardèche, paris, ardeche magnetiseur, paris magnetiseur, medecine naturelle, medecine douce',
            'url' => 'https://magnetiseur-paris.fr/magnetisme',
            'domain' => 'https://magnetiseur-paris.fr',
        ];

        return view('blog.index', ['page' => $page]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        //
    }
}
