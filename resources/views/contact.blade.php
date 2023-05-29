<x-front-layout :page="$page">
    <div
        class="relative mx-auto mt-10 gap-8 overflow-hidden px-container md:mt-14 lg:mt-20 lg:flex lg:justify-between pb-8 lg:pb-12">
        <div class="flex-1">
            <div class="lg:max-w-xl">
                <h1 class="text-5xl lg:text-8xl font-serif font-bold leading-[1.10]">Contact.</h1>
                <div class="mt-8 max-w-md">
                    <p>Me laisser un témoignage, me poser une question ou autre.</p>
                    <p>Envoyez moi un message via le formulaire, je vous répondrai dans les plus brefs délais.</p>
                    <div class="font-semibold mt-6">
                        <p class="">Pour toute demande de rendez-vous, merci de me contacter par téléphone.
                        </p>
                        <a href="tel:+33616660136"
                            class="group relative inline-flex items-center justify-center gap-3 overflow-hidden whitespace-nowrap text-md font-semibold leading-none outline-none transition-all ring-black/30 hover:ring-4 focus-visible:ring-4 active:scale-[0.98] active:ring-2 disabled:pointer-events-none disabled:opacity-60 text-white bg-black border-border hover:border-border-active focus-visible:border-border-active active:border-border-active border h-11 rounded-md px-5 mt-6">
                            <svg class="block w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path fill="currentColor"
                                    d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z" />
                            </svg>
                            <span class="">06.16.66.01.36</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex-1 lg:flex lg:justify-end">
            <div class="mt-5 w-full lg:max-w-xl">
                <div>
                    @if (session()->has('success'))
                        <div class="p-4 mb-4 text-md font-semibold text-green-800 rounded-lg bg-green-50"
                            role="alert">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="flex p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                            <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Attention</span>
                            <div>
                                <span class="font-medium">Veuillez corriger les erreurs suivantes :</span>
                                <ul class="mt-1.5 ml-4 list-disc list-inside">
                                    @foreach ((array) $errors->all() as $message)
                                        <li>{{ $message }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                    <form class="pb-1" id="contact-form" method="POST" action="{{ route('messages.contact') }}">
                        @csrf
                        @method('POST')
                        <div class="flex flex-col gap-4">
                            <div class="relative w-full">
                                <select id="type"
                                    class="appearance-none outline-none bg-gray-100/25 border border-gray-200 checked:bg-outline disabled:opacity-60 disabled:pointer-events-none transition-all w-full placeholder:text-base placeholder:text-foreground-secondary placeholder:antialiased leading-snug py-4 rounded-lg px-5 peer select-chevron"
                                    name="type">
                                    <option selected class="text-foreground">Type de message</option>
                                    <option value="testimonial" class="text-foreground">Témoignage</option>
                                    <option value="question" class="text-foreground">Question</option>
                                    <option value="other" class="text-foreground">Autre</option>
                                </select>
                            </div>
                            <div class="flex w-full flex-col gap-4 md:flex-row">
                                <div class="relative w-full">
                                    <input id="last_name" type="text" value="{{ old('last_name') }}"
                                        class="appearance-none outline-none bg-gray-100/25 border border-gray-200 checked:bg-outline disabled:opacity-60 disabled:pointer-events-none transition-all w-full placeholder:text-base placeholder:antialiased text-foreground leading-snug py-4 rounded-lg px-5 peer placeholder:text-transparent [&:not(:placeholder-shown)]:pb-2 [&:not(:placeholder-shown)]:pt-6"
                                        placeholder="Abitbol" name="last_name">
                                    <label for="last_name"
                                        class="absolute pointer-events-none transition-all ease-motion left-5 text-foreground-secondary top-2.5 text-xs peer-placeholder-shown:top-4 peer-placeholder-shown:text-base">
                                        Nom de famille
                                    </label>
                                </div>
                                <div class="relative w-full">
                                    <input id="first_name" type="text" value="{{ old('first_name') }}"
                                        class="appearance-none outline-none bg-gray-100/25 border border-gray-200 checked:bg-outline disabled:opacity-60 disabled:pointer-events-none transition-all w-full placeholder:text-base placeholder:antialiased text-foreground leading-snug py-4 rounded-lg px-5 peer placeholder:text-transparent [&:not(:placeholder-shown)]:pb-2 [&:not(:placeholder-shown)]:pt-6"
                                        placeholder="George" name="first_name">
                                    <label for="first_name"
                                        class="absolute pointer-events-none transition-all ease-motion left-5 text-foreground-secondary top-2.5 text-xs peer-placeholder-shown:top-4 peer-placeholder-shown:text-base">
                                        Prénom
                                    </label>
                                </div>

                            </div>
                            <div class="flex w-full flex-col gap-4 md:flex-row">
                                <div class="relative w-full">
                                    <input id="email" value="{{ old('email') }}"
                                        class="appearance-none outline-none bg-gray-100/25 border border-gray-200 checked:bg-outline disabled:opacity-60 disabled:pointer-events-none transition-all w-full placeholder:text-base placeholder:antialiased text-foreground leading-snug py-4 rounded-lg px-5 peer placeholder:text-transparent [&:not(:placeholder-shown)]:pb-2 [&:not(:placeholder-shown)]:pt-6"
                                        placeholder="Adresse email" name="email" type="email">
                                    <label for="email"
                                        class="absolute pointer-events-none transition-all ease-motion left-5 text-foreground-secondary top-2.5 text-xs peer-placeholder-shown:top-4 peer-placeholder-shown:text-base">
                                        Adresse email
                                    </label>
                                </div>
                                <div class="relative w-full">
                                    <input id="phone" value="{{ old('phone') }}"
                                        class="appearance-none outline-none bg-gray-100/25 border border-gray-200 checked:bg-outline disabled:opacity-60 disabled:pointer-events-none transition-all w-full placeholder:text-base placeholder:antialiased text-foreground leading-snug py-4 rounded-lg px-5 peer placeholder:text-transparent [&:not(:placeholder-shown)]:pb-2 [&:not(:placeholder-shown)]:pt-6"
                                        placeholder="Numéro de téléphone" name="phone" type="text">
                                    <label for="phone"
                                        class="absolute pointer-events-none transition-all ease-motion left-5 text-foreground-secondary top-2.5 text-xs peer-placeholder-shown:top-4 peer-placeholder-shown:text-base">
                                        Numéro de téléphone
                                    </label>
                                </div>
                            </div>
                            <div class="relative flex w-full">
                                <textarea id="message"
                                    class="appearance-none outline-none bg-gray-100/25 border border-gray-200 checked:bg-outline disabled:opacity-60 disabled:pointer-events-none transition-all w-full placeholder:text-base placeholder:antialiased text-foreground leading-snug py-4 rounded-lg px-5 peer placeholder:text-transparent [&:not(:placeholder-shown)]:pb-2 [&:not(:placeholder-shown)]:pt-6"
                                    placeholder="Message" name="message" rows="5">{{ old('message') }}</textarea>
                                <label for="message"
                                    class="absolute pointer-events-none transition-all ease-motion left-5 text-foreground-secondary top-2.5 text-xs peer-placeholder-shown:top-4 peer-placeholder-shown:text-base">
                                    Message
                                </label>
                            </div>
                        </div>
                        <x-honey />
                        <p class="mt-2 text-xs text-darkGray">
                            Si vous souhaitez obtenir une réponse, veuillez fournir votre adresse e-mail ou votre numéro
                            de téléphone.
                        </p>
                        <div class="mt-8 flex flex-col justify-between gap-4 sm:flex-row-reverse sm:items-center">
                            <button
                                class="group relative inline-flex items-center justify-center gap-1.5 overflow-hidden whitespace-nowrap text-md font-semibold leading-none outline-none transition-all ring-black/30 hover:ring-4 focus-visible:ring-4 active:scale-[0.98] active:ring-2 disabled:pointer-events-none disabled:opacity-60 bg-black text-white h-14 rounded-lg px-6"
                                type="submit">
                                <span class="">Envoyer le message</span>
                                <i data-icon="arrow-right" aria-hidden="true" class=""><svg width="16"
                                        height="16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M3 8.5h9M8.5 4.5l3.5 4-3.5 4" stroke="currentColor"
                                            stroke-width="1.2">
                                        </path>
                                        <path
                                            d="m2.8 8.1 1.9.1 2 .2h5.2M12 8.4c0-.6-.6-.9-1-1.2l-.6-.3-.3-.3-.4-.2-.6-.6-.4-.6-.3-.8M12 8.4c0 .7-.6 1.2-1 1.7l-1.2 1.4-.9.6-.5.5"
                                            stroke="currentColor" stroke-width="1.2" stroke-linecap="round"></path>
                                    </svg>
                                </i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('components.testimonials')

</x-front-layout>
