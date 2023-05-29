<x-app-layout>
    <section class="bg-white">
        <div class="max-w-4xl px-4 py-8 mx-auto">
            @if (session()->has('success'))
                <div class="p-4 mb-6 text-md font-semibold text-green-800 rounded-lg bg-green-50" role="alert">
                    {{ session()->get('success') }}
                </div>
            @endif
            <div class="flex justify-between">
                <h2 class="mb-4 text-xl font-bold text-gray-900 text-center">Modifier un message</h2>
                <form method="POST" action="{{ route('messages.destroy', $message) }}">
                    @csrf
                    @method('delete')
                    <button type="submit" onclick="event.preventDefault(); this.closest('form').submit();"
                        class="text-red-600 inline-flex items-center hover:text-white border border-red-600 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        <svg class="w-5 h-5 mr-1 -ml-1" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Supprimer
                    </button>
                </form>
            </div>
            <x-input-error :messages="$errors->all()" class="mt-2" />
            <form method="POST" action="{{ route('messages.update', $message) }}">
                @csrf
                @method('patch')
                <div class="grid gap-4 mb-4 sm:grid-cols-2 sm:gap-6 sm:mb-5 mt-6">
                    <div class="sm:col-span-2">
                        <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900">Type de
                            message</label>
                        <select id="type" name="type"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option value="testimonial" @if ($message->type == 'testimonial') selected @endif>Témoignage
                            </option>
                            <option value="question" @if ($message->type == 'question') selected @endif>Question
                            </option>
                            <option value="other" @if ($message->type == 'autre') selected @endif>Autre</option>
                        </select>
                    </div>
                    <div class="w-full">
                        <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900">Nom</label>
                        <input value="{{ $message->last_name }}" type="text" name="last_name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                            required="">
                    </div>
                    <div class="w-full">
                        <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900">Prénom</label>
                        <input value="{{ $message->first_name }}" type="text" name="first_name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                            required="">
                    </div>
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                        <input value="{{ $message->email }}" type="email" name="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                    </div>
                    <div>
                        <label for="phone" class="block mb-2 text-sm font-medium text-gray-900">Téléphone</label>
                        <input value="{{ $message->phone }}" name="phone" id="phone"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                    </div>
                    <div class="relative">
                        <label for="created_at" class="block mb-2 text-sm font-medium text-gray-900">Date de
                            création</label>
                        <input datepicker type="date" name="created_at"
                            value="{{ date('Y-m-d', strtotime($message->created_at)) }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="Select date">
                    </div>
                    <div>
                        <label for="location" class="block mb-2 text-sm font-medium text-gray-900">Location</label>
                        <input value="{{ old('location') }}" name="location" id="location"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                    </div>
                    <div class="sm:col-span-2">
                        <label for="message" class="block mb-2 text-sm font-medium text-gray-900">Message</label>
                        <textarea name="message" id="message" rows="8"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500">{{ $message->message }}</textarea>
                    </div>
                    <div>
                        <label class="relative inline-flex items-center mb-4 cursor-pointer">
                            <input value="1" name="published" type="checkbox" class="sr-only peer"
                                @checked($message->published)>
                            <div
                                class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 peer-checked:after:translate-x-full
                                peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white
                                after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600">
                            </div>
                            <span class="ml-3 text-sm font-medium text-gray-900">Publié</span>
                        </label>
                    </div>
                </div>

                <div class="flex items-center space-x-4">
                    <button type="submit"
                        class="text-white bg-indigo-600 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        Sauvegarder
                    </button>
                </div>
            </form>
        </div>
    </section>
</x-app-layout>
