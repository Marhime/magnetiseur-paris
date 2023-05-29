<x-app-layout>
    <section class="bg-white">
        <div class="max-w-4xl px-4 py-8 mx-auto">
            <h2 class="mb-4 text-xl font-bold text-gray-900 text-center">Créer un témoignage</h2>
            <x-input-error :messages="$errors->all()" class="mt-2" />
            <form method="POST" action="{{ route('messages.store') }}">
                @csrf
                <div class="grid gap-4 mb-4 sm:grid-cols-2 sm:gap-6 sm:mb-5 mt-6">
                    <input type="hidden" name="type" value="testimonial">
                    <div class="w-full">
                        <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900">Nom</label>
                        <input value="{{ old('last_name') }}" type="text" name="last_name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                            required="">
                    </div>
                    <div class="w-full">
                        <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900">Prénom</label>
                        <input value="{{ old('first_name') }}" type="text" name="first_name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                            required="">
                    </div>
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                        <input value="{{ old('email') }}" type="email" name="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                    </div>
                    <div>
                        <label for="phone" class="block mb-2 text-sm font-medium text-gray-900">Téléphone</label>
                        <input value="{{ old('phone') }}" name="phone" id="phone"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                    </div>
                    <div class="relative">
                        <label for="created_at" class="block mb-2 text-sm font-medium text-gray-900">Date de
                            création</label>
                        <input datepicker type="date" name="created_at" value="{{ old('created_at') }}"
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
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500">{{ old('message') }}</textarea>
                    </div>
                    <div>
                        <label class="relative inline-flex items-center mb-4 cursor-pointer">
                            <input name="published" type="checkbox" class="sr-only peer" @checked(old('published'))>
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
