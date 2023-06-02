<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\View\View;
use App\Enums\MessageType;
use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rules\Enum;

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
            'message' => 'required|string',
            'location' => 'nullable|string',
        ]);

        // check if user isAdmin
        if (auth()->user()->isAdmin()) {
            $validated['published'] = $request->has('published');
            $validated['created_at'] = $request->created_at;
        } else {
            $validated['published'] = false;
            $validated['created_at'] = now();
        }

        Message::create($validated);

        return redirect(route('messages.testimonials'))->with('success', 'Témoignage créé avec succès.');
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
            'location' => 'nullable|string',
            'created_at' => 'required|date',
        ]);

        if (auth()->user()->isAdmin()) {
            $validated['published'] = $request->has('published');
        } else {
            $validated['published'] = false;
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
            'message' => 'required|string',
            'location' => 'nullable|string',
        ]);

        $validated['published'] = false;
        $validated['created_at'] = now();

        Message::create($validated);

        // send email to dominique.joyes@gmail.com
        $data = [
            'type' => $validated['type'],
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'message' => $validated['message'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
        ];

        Mail::to("maxime.joyes@gmail.com")->send(new ContactFormMail($data));

        return redirect(route('contact'))->with('success', 'Votre message a bien été envoyé !');
    }
}
