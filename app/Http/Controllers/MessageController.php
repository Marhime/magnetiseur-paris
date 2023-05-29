<?php

namespace App\Http\Controllers;

use App\Enums\MessageType;
use App\Models\Message;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Enum;
use Illuminate\View\View;

class MessageController extends Controller
{
    /**
     * Display a listing of only the testimonials.
     */
    public function testimonials(): View
    {
        return view('messages.testimonials', [
            'messages' => Message::where('type', 'testimonial')->orderBy('created_at', 'desc')->paginate(25),
            'type' => 'testimonials',
            'title' => 'Témoignages',
            'description' => 'Liste des témoignages'
        ]);
    }

    /**
     * Display a listing of only the question messages.
     */
    public function questions(): View
    {
        return view('messages.others', [
            'messages' => Message::where('type', 'question')->orderBy('created_at', 'desc')->paginate(25),
            'type' => 'questions',
            'title' => 'Questions',
            'description' => 'Liste des questions'
        ]);
    }

    /**
     * Display a listing of only the other messages.
     */
    public function others(): View
    {
        return view('messages.others', [
            'messages' => Message::where('type', 'other')->orderBy('created_at', 'desc')->paginate(25),
            'type' => 'other',
            'title' => 'Autres',
            'description' => 'Liste des autres messages'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('messages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'type' => [new Enum(MessageType::class)],
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'nullable|email',
            'phone' => 'nullable|string|min:10',
            'message' => 'required|string'
        ]);

        // check if user isAdmin
        if (auth()->user()->isAdmin() && $request->has('published')) {
            $validated['published'] = true;
        }

        Message::create($validated);

        return redirect(route('messages.testimonials'));
    }

    /**
     * Publish the message.
     */
    public function publish(Message $message): RedirectResponse
    {
        $message->published = true;
        $message->save();

        return redirect(route('messages.index'));
    }

    /**
     * Unpublish the message.
     */
    public function unpublish(Message $message): RedirectResponse
    {
        $message->published = false;
        $message->save();

        return redirect(route('messages.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Message $message): View
    {
        $this->authorize('update', $message);
 
        return view('messages.edit', [
            'message' => $message,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Message $message): RedirectResponse
    {
        $this->authorize('update', $message);
 
        $validated = $request->validate([
            'type' => [new Enum(MessageType::class)],
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'nullable|email',
            'phone' => 'nullable|string|min:10',
            'message' => 'required|string',
            'created_at' => 'required|date',
        ]);

        if (auth()->user()->isAdmin()) {
            $validated['published'] = $request->has('published');
        }
 
        $message->update($validated);

        // redirect to previous page
        return redirect()->back()->with('success', 'Le message a bien été modifié.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Message $message, Request $request)
    {
        $this->authorize('delete', $message);
 
        $message->delete();
 
        return redirect(route('dashboard'));
    }

    /**
     * Contact form store a newly created resource in storage.
     */
    public function contact(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'type' => [new Enum(MessageType::class)],
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'nullable|email',
            'phone' => 'nullable|string|min:10',
            'message' => 'required|string'
        ]);

        $validated['published'] = false;

        Message::create($validated);

        return redirect(route('contact'))->with('success', 'Votre message a bien été envoyé !');
    }
}
