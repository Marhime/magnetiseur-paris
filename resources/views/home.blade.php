<x-front-layout :page="$page">
    <div class="mx-auto px-container">
        <h1 data-title
            class="mt-10 text-5xl lg:text-8xl font-serif font-bold md:mt-14 lg:mt-20 invisible will-change-transform">
            Dominique
            Joyes.<br>Ce <span class="text-darkGray">fameux</span><br>magnétiseur<br>guérisseur.
        </h1>
    </div>
    <div data-content class="transition-all duration-700 ease-motion translate-y-10 opacity-0 will-change-transform">
        <div class="mx-auto px-container">
            <section class="mt-10 md:mt-14 lg:mt-20">
                <p class="text-xl max-w-4xl">
                    Magnétiseur reconnu sur Paris et en Ardèche, je vous présente mes
                    méthodes et services permettant de soigner et soulager notamment les
                    maladies de peau, troubles de la personnalité, troubles physiques,
                    troubles du comportement et difficultés respiratoires.
                </p>
            </section>
            <section class="relative mt-8 overflow-hidden rounded-lg">
                <div class="flex w-full aspect-video">
                    <img class="h-auto block object-cover" src="{{ asset('/images/home.jpg') }}" type="jpeg"
                        alt="4 paysages, 4 éléments">
                </div>
            </section>
        </div>
        <section class="mt-10 md:mt-14 lg:mt-20">
            <div class="mx-auto px-container">
                <h2 class="text-4xl xl:text-5xl font-bold font-serif">Le magnétisme.</h2>
            </div>
            <div class="mt-4 md:mt-6 lg:mt-8">
                <div class="group border-b py-12 transition-colors first:border-t">
                    <div class="mx-auto px-container lg:flex">
                        <div class="flex flex-1 flex-col items-start justify-center">
                            <div class="mr-6">
                                <h3 class="text-xl text-darkGray font-semibold uppercase">Énergie curative</h3>
                                <div class="mt-4 flex gap-4 flex-col">
                                    <p class="text-xl max-w-lg">Le magnétiseur entraîne le malade à renouer le lien
                                        avec la vie, à réconcillier son corps et son esprit. Il entre en contact avec la
                                        conscience du malade et le conduit à négocier pas à pas son retour à la santé.
                                        Le magnétiseur reconnaît la puissance matérielle de l'imaginaire sur le
                                        biologique car il sait que le corps et l'esprit sont étroitements liés.
                                    </p>
                                </div>
                            </div>
                            <a href="{{ route('magnetisme') }}"
                                class="group relative inline-flex items-center justify-center gap-1.5 overflow-hidden whitespace-nowrap text-md font-semibold leading-none outline-none transition-all ring-black/30 hover:ring-4 focus-visible:ring-4 active:scale-[0.98] active:ring-2 disabled:pointer-events-none disabled:opacity-60 text-white bg-black border-border hover:border-border-active focus-visible:border-border-active active:border-border-active border h-11 rounded-md px-5 mt-6">
                                <span class="">En savoir plus</span>
                                <i data-icon="arrow-right" aria-hidden="true" class="">
                                    <svg width="16" height="16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M3 8.5h9M8.5 4.5l3.5 4-3.5 4" stroke="currentColor" stroke-width="1.2">
                                        </path>
                                        <path
                                            d="m2.8 8.1 1.9.1 2 .2h5.2M12 8.4c0-.6-.6-.9-1-1.2l-.6-.3-.3-.3-.4-.2-.6-.6-.4-.6-.3-.8M12 8.4c0 .7-.6 1.2-1 1.7l-1.2 1.4-.9.6-.5.5"
                                            stroke="currentColor" stroke-width="1.2" stroke-linecap="round"></path>
                                    </svg>
                                </i>
                            </a>
                        </div>
                        <div class="pointer-events-none relative mt-8 aspect-[4/3] flex-1 xl:mt-0">
                            <img class="h-full w-full rounded-md bg-background-offset object-cover"
                                src="{{ asset('/images/le-magnetisme-home.jpeg') }}" type="jpeg"
                                alt="Deux mains magnétisme">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="overflow-hidden">
            <div class="flex flex-col-reverse px-container lg:mx-auto lg:grid lg:grid-cols-[50%_50%] relative">
                <div class="container flex justify-center px-container lg:max-w-none lg:border-r lg:px-0 lg:pr-12">
                    <svg class="hidden lg:block w-[300px] rotate-45 absolute text-[#000] left-0 -bottom-16 "
                        viewBox="0 0 19 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M16.0039 23.9905V23.9894V18.8537C16.0039 17.343 17.1656 16.1032 18.6458 15.9779L18.6477 16.1687L18.6599 17.3545C18.67 18.3374 18.6834 19.6519 18.6968 20.978C18.7237 23.6319 18.7503 26.3277 18.75 26.5113V26.5118C18.75 31.6131 14.6089 35.75 9.50017 35.75C4.39139 35.75 0.25 31.6131 0.25 26.5118V9.40971C0.25 8.70913 0.819119 8.14039 1.52183 8.14039C1.65542 8.14039 1.80242 8.2012 1.96034 8.32471C2.11714 8.44735 2.26544 8.61704 2.39581 8.79682C2.52519 8.97522 2.63088 9.1551 2.70449 9.29123C2.74113 9.359 2.76945 9.41522 2.78841 9.45407C2.79038 9.4581 2.79224 9.46194 2.79401 9.46559V19.551V20.1223L3.21367 19.7346C3.50389 19.4664 3.81047 19.216 4.13341 18.9854L4.23811 18.9106V18.7819V4.06329C4.23811 3.5576 4.3936 3.10926 4.63319 2.79283C4.87267 2.47655 5.18506 2.30321 5.50994 2.30321C5.83482 2.30321 6.14721 2.47655 6.38668 2.79283C6.62627 3.10926 6.78176 3.5576 6.78176 4.06329V17.3468V17.6731L7.09686 17.5881C7.3975 17.5071 7.70518 17.4416 8.01861 17.391L8.2287 17.357V17.1442V2.01043C8.2287 1.50432 8.38414 1.0559 8.62363 0.739495C8.86299 0.42326 9.17528 0.25 9.50017 0.25C9.82467 0.25 10.1372 0.423309 10.3769 0.739709C10.6166 1.05622 10.7724 1.50464 10.7724 2.01043V17.1442V17.357L10.9824 17.391C11.2725 17.4379 11.5585 17.4974 11.8383 17.5703L12.1513 17.6518V17.3284V4.06329C12.1513 3.55757 12.3067 3.10922 12.5463 2.7928C12.7856 2.47653 13.0979 2.30321 13.4228 2.30321C13.7475 2.30321 14.0599 2.47653 14.2994 2.79284C14.5391 3.10929 14.6946 3.55763 14.6946 4.06329V23.8685V23.8699L14.6759 25.5519H14.6759V25.5547C14.6759 28.4018 12.3294 30.7243 9.43858 30.7243C6.64644 30.7243 4.36121 28.5564 4.20976 25.8423L4.20021 25.6712L4.03717 25.6184L3.2074 25.3497L2.87856 25.2432L2.88038 25.5889C2.89918 29.155 5.83682 32.0449 9.43858 32.0449C13.0102 32.0449 15.9275 29.2043 15.9964 25.6812H15.9964L15.9964 25.6774L16.0039 23.9905Z"
                            stroke="currentColor" fill="currentColor" stroke-width="0.5" />
                    </svg>
                </div>
                <div class="grid place-items-center border-b lg:max-w-none lg:border-none lg:px-0">
                    <div class="py-14 lg:max-w-2xl lg:p-12">
                        <div class="mb-6">
                            <h2 class="text-4xl lg:text-5xl font-bold font-serif mb-6">
                                <span class="text-darkGray">Mes services.</span><br>
                                <span class="">Soutien attentif personnalisé.</span>
                            </h2>
                            <p class="mb-8 text-xl text-darkGray">
                                En tant que magnétiseur, mon rôle est d'être à l'écoute de chacun de
                                mes patients et de m'investir totalement dans leur guérison.
                                Cependant, je ne fais aucune promesse quant aux résultats et je ne
                                suis pas autorisé à émettre un diagnostic ou à juger un traitement
                                médical. Mon but est de les accompagner après la séance pour qu'ils
                                puissent ressentir les bienfaits de mes soins bienveillants. Si vous
                                cherchez un accompagnement pour améliorer votre état de santé,
                                n'hésitez pas à découvrir mes services.
                            </p>
                            <a href="{{ route('services') }}"
                                class="group relative inline-flex items-center justify-center gap-1.5 overflow-hidden whitespace-nowrap text-md font-semibold leading-none outline-none transition-all ring-black/30 hover:ring-4 focus-visible:ring-4 active:scale-[0.98] active:ring-2 disabled:pointer-events-none disabled:opacity-60 text-white bg-black border-border hover:border-border-active focus-visible:border-border-active active:border-border-active border h-11 rounded-md px-5">
                                <span class="">En savoir plus</span>
                                <i data-icon="arrow-right" aria-hidden="true">
                                    <svg width="16" height="16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M3 8.5h9M8.5 4.5l3.5 4-3.5 4" stroke="currentColor" stroke-width="1.2">
                                        </path>
                                        <path
                                            d="m2.8 8.1 1.9.1 2 .2h5.2M12 8.4c0-.6-.6-.9-1-1.2l-.6-.3-.3-.3-.4-.2-.6-.6-.4-.6-.3-.8M12 8.4c0 .7-.6 1.2-1 1.7l-1.2 1.4-.9.6-.5.5"
                                            stroke="currentColor" stroke-width="1.2" stroke-linecap="round"></path>
                                    </svg>
                                </i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @include('components.testimonials')
    </div>

</x-front-layout>
