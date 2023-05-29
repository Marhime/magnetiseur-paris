<div class="h-[76px]" data-navigation>
    <header
        class="ease-[cubic-bezier(0.90, 0, 0.05, 1)] z-30 w-full border-b bg-white duration-300 fixed border-b-transparent translate-y-0">
        <div class="flex items-center justify-between py-4 mx-auto px-container">
            <div class="flex items-center gap-2">
                <a aria-label="Go to homepage" href="{{ route('home') }}">
                    <x-application-logo class="w-7 block" />
                </a>
            </div>
            <div class="flex items-center gap-8">
                <div class="hidden items-center gap-6 text-base font-semibold leading-relaxed md:flex">
                    <a @class([
                        'link',
                        'relative',
                        'ease-motion',
                        'active' => request()->routeIs('magnetisme'),
                    ]) href="{{ route('magnetisme') }}">Magnétisme</a>
                    <a @class([
                        'link',
                        'relative',
                        'ease-motion',
                        'active' => request()->routeIs('services'),
                    ]) href="{{ route('services') }}">Services</a>
                    <a @class([
                        'link',
                        'relative',
                        'ease-motion',
                        'active' => request()->routeIs('testimonials'),
                    ]) href="{{ route('testimonials') }}">Témoignages</a>
                </div>
                <div class="flex items-center gap-4">
                    <div class="hidden [@media(min-width:400px)]:block">
                        <a class="group relative inline-flex items-center justify-center gap-1.5 overflow-hidden whitespace-nowrap text-md font-semibold leading-none outline-none transition-all ring-black/30 hover:ring-4 focus-visible:ring-4 active:scale-[0.98] active:ring-2 disabled:pointer-events-none disabled:opacity-60 bg-black text-white h-11 rounded-md px-5"
                            href="{{ route('contact') }}">
                            <span class="">Me contacter</span>
                        </a>
                    </div>
                    <button data-open-menu
                        class="group relative inline-flex items-center justify-center gap-1.5 overflow-hidden whitespace-nowrap text-md font-semibold leading-none outline-none transition-all ring-black/30 hover:ring-4 focus-visible:ring-4 active:scale-[0.98] active:ring-2 disabled:pointer-events-none disabled:opacity-60 text-foreground border-border hover:border-border-active focus-visible:border-border-active active:border-border-active border h-11 rounded-md px-5 md:hidden"
                        aria-label="Open menu"><i data-icon="3dots" aria-hidden="true" class=""><svg
                                width="16" height="16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill="currentColor" d="M3 7h2v2H3zM7 7h2v2H7zM11 7h2v2h-2z"></path>
                                <path
                                    d="M8.6 8.8c-.5 0-1.2.1-1.4-.4 0-.2-.2-.7.1-.7.2 0 .2-.3.5-.3.1 0 .5 0 .6.2M11.7 8.6l-.3-.3V8c0-.3.1-.3.4-.4.2-.1.5-.2.7 0l.2.4v.5M4.3 8.6c.2 0 .3-.2.4-.3V8c0-.3-.2-.3-.4-.4-.2-.1-.6-.2-.8 0l-.1.4v.5"
                                    stroke="currentColor" stroke-width="1.2" stroke-linecap="round"></path>
                            </svg>
                        </i>
                    </button>
                </div>
            </div>
        </div>
    </header>
</div>

{{-- menu mobile --}}
<div class="fixed inset-0 bg-white z-40 translate-x-full ease-motion" data-navigation-menu>
    <div class="flex items-center justify-between py-4 mx-auto px-container">
        <div class="flex items-center gap-2">
            <a aria-label="Go to homepage" href="{{ route('home') }}">
                <x-application-logo class="w-7 block" />
            </a>
        </div>
        <button data-close-menu
            class="group relative inline-flex items-center justify-center gap-1.5 overflow-hidden whitespace-nowrap text-md font-semibold leading-none outline-none transition-all ring-black/30 hover:ring-4 focus-visible:ring-4 active:scale-[0.98] active:ring-2 disabled:pointer-events-none disabled:opacity-60 text-foreground border-border hover:border-border-active focus-visible:border-border-active active:border-border-active border h-11 rounded-md px-5 md:hidden"
            aria-label="Open menu"><i data-icon="3dots" aria-hidden="true" class=""><svg width="16"
                    height="16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill="currentColor" d="M3 7h2v2H3zM7 7h2v2H7zM11 7h2v2h-2z"></path>
                    <path
                        d="M8.6 8.8c-.5 0-1.2.1-1.4-.4 0-.2-.2-.7.1-.7.2 0 .2-.3.5-.3.1 0 .5 0 .6.2M11.7 8.6l-.3-.3V8c0-.3.1-.3.4-.4.2-.1.5-.2.7 0l.2.4v.5M4.3 8.6c.2 0 .3-.2.4-.3V8c0-.3-.2-.3-.4-.4-.2-.1-.6-.2-.8 0l-.1.4v.5"
                        stroke="currentColor" stroke-width="1.2" stroke-linecap="round"></path>
                </svg>
            </i>
        </button>
    </div>
    <div class="flex flex-col mt-10 h-full">
        <div class="flex flex-col items-center justify-center gap-8">
            <ul class="flex flex-col items-center justify-center gap-8 font-serif font-bold text-5xl">
                <li class="overflow-hidden pb-2">
                    <a @class(['block', 'active' => request()->routeIs('home')]) href="{{ route('home') }}">Accueil</a>
                </li>
                <li class="overflow-hidden pb-2">
                    <a @class(['block', 'active' => request()->routeIs('magnetisme')]) href="{{ route('magnetisme') }}">Magnétisme</a>
                </li>
                <li class="overflow-hidden pb-2">
                    <a @class(['block', 'active' => request()->routeIs('services')]) href="{{ route('services') }}">Services</a>
                </li>
                <li class="overflow-hidden pb-2">
                    <a @class(['block', 'active' => request()->routeIs('testimonials')]) href="{{ route('testimonials') }}">Témoignages</a>
                </li>
                <li class="overflow-hidden pb-2">
                    <a @class(['block', 'active' => request()->routeIs('contact')]) href="{{ route('contact') }}">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</div>
