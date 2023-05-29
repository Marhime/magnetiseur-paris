<x-app-layout>

    <div class="py-8 space-y-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-bold">Coucou Papa !</h1>
                    <p class="mt-2">Ici tu peux voir les messages que tu as reçu.</p>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if ($messages->count() > 0)
                        <h2 class="text-xl font-bold">Messages reçus</h2>
                        Tu as {{ $messages->count() }} {{ Str::plural('nouveau', $messages->count()) }}
                        {{ Str::plural('message', $messages->count()) }}.

                        {{-- get only message of type testimonials --}}
                        <div class="mt-2 bg-white divide-y">
                            @foreach ($messages as $message)
                                <div class="py-6 flex space-x-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 -scale-x-100"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                    </svg>
                                    <div class="flex-1">
                                        <div class="flex justify-between items-center">
                                            <div>
                                                <span class="text-gray-800">{{ $message->last_name }}
                                                    {{ $message->first_name }}</span>
                                                <small
                                                    class="ml-2 text-sm text-gray-600">{{ $message->created_at->format('j M Y, g:i a') }}</small>
                                                @unless ($message->created_at->eq($message->updated_at))
                                                    <small class="text-sm text-gray-600"> &middot;
                                                        {{ __('modifié') }}</small>
                                                @endunless
                                                @if ($message->type === 'testimonial')
                                                    <span
                                                        class="bg-blue-100 text-blue-800 text-xs font-medium ml-2 px-2.5 py-0.5 rounded-full">Témoignage</span>
                                                @elseif($message->type === 'question')
                                                    <span
                                                        class="bg-green-100 text-green-800 text-xs font-medium ml-2 px-2.5 py-0.5 rounded-full">Question</span>
                                                @elseif($message->type === 'other')
                                                    <span
                                                        class="bg-yellow-100 text-yellow-800 text-xs font-medium ml-2 px-2.5 py-0.5 rounded-full">Autre</span>
                                                @endif
                                            </div>
                                            @if (auth()->user()->isAdmin())
                                                <x-dropdown>
                                                    <x-slot name="trigger">
                                                        <button>
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                class="h-4 w-4 text-gray-400" viewBox="0 0 20 20"
                                                                fill="currentColor">
                                                                <path
                                                                    d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                                            </svg>
                                                        </button>
                                                    </x-slot>
                                                    <x-slot name="content">
                                                        <x-dropdown-link :href="route('messages.edit', $message)">
                                                            {{ __('Modifier') }}
                                                        </x-dropdown-link>
                                                    </x-slot>
                                                    <x-slot name="content">
                                                        <x-dropdown-link :href="route('messages.edit', $message)">
                                                            {{ __('Modifier') }}
                                                        </x-dropdown-link>
                                                        <form method="POST"
                                                            action="{{ route('messages.destroy', $message) }}">
                                                            @csrf
                                                            @method('delete')
                                                            <x-dropdown-link :href="route('messages.destroy', $message)"
                                                                onclick="event.preventDefault(); this.closest('form').submit();">
                                                                {{ __('Supprimer') }}
                                                            </x-dropdown-link>
                                                        </form>
                                                    </x-slot>
                                                </x-dropdown>
                                            @endif
                                        </div>
                                        <p class="mt-4 text-lg text-gray-900">{{ $message->message }}</p>
                                        <div class="space-x-2 mt-4">
                                            <a href="{{ route('messages.edit', $message, ['redirectTo' => 'dashboard']) }}"
                                                class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-sm text-white hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Modifier</a>
                                            @if ($message->email)
                                                <a href="mailto:{{ $message->email }}"
                                                    class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-sm text-white hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Répondre</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        {{-- @foreach ($messages as $message)
                            <div class="mt-4">
                                <p class="text-sm font-bold">De {{ $message->first_name }} {{ $message->last_name }}
                                    le {{ $message->created_at->format('d/m/Y') }}</p>
                                <p class="text-sm">{{ $message->message }}</p>
                                <p class="text-sm">{{ $message->type }}</p>
                                <p class="text-sm">{{ $message->email }}</p>
                                <p class="text-sm">{{ $message->phone }}</p>
                                <form method="POST" action="">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="status" value="read">
                                    <x-primary-button class="mt-4">{{ __('Marquer comme lu') }}</x-primary-button>
                                </form>
                                <a href="{{ route('messages.edit', $message->id) }}" class="text-sm underline">Voir</a>
                                </a>
                            </div>
                        @endforeach --}}
                    @else
                        <p>Il n'y a aucun nouveau message.</p>
                    @endif


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
