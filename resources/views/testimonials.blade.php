<x-front-layout :page="$page">
    <div class="mx-auto px-container">
        <h1 class="mt-10 text-5xl lg:text-8xl font-serif font-bold md:mt-14 lg:mt-20 leading-[1.10]">
            Témoignages.
        </h1>
    </div>
    <section class="overflow-hidden border-t mt-10 md:mt-14 lg:mt-20">
        <div class="mx-auto px-container mt-14 md:mt-24 lg:mb-12">
            <div class="flex flex-col justify-between gap-7 lg:flex-row lg:gap-4">
                <div class="lg:max-w-lg font-serif font-bold">
                    <h3 class="text-5xl text-darkGray">Impressions.</h3>
                    <p class="text-5xl">Leur parcours de guérison.</p>
                </div>
                <p class="text-lg text-darkGray lg:max-w-xl">Découvrez les témoignages
                    sincères de mes patients qui ont bénéficié de mes soins. Leur expérience personnelle vous permettra
                    de comprendre les bienfaits du magnétisme sur la santé et le bien-être. Laissez-vous inspirer par
                    leurs histoires de guérison et de soulagement, et envisagez la possibilité d'améliorer votre propre
                    état de santé.</p>
            </div>
        </div>
        <div class="mt-10 md:mt-14 lg:mt-20 grid md:grid-cols-2 lg:grid-cols-3 border-t">
            @foreach ($testimonials as $testimonial)
                <div class="flex flex-col border-b md:border-r p-8">
                    <p class="text-2xl/7 font-semibold"><span class="bg-gray-300/50">{{ $testimonial->message }}</span>
                    </p>

                    <div class="whitespace-nowrap mt-6 flex justify-between items-start">
                        <div>
                            <p class="text-base font-semibold leading-none">{{ $testimonial->first_name }}
                                {{ $testimonial->last_name ? $testimonial->last_name[0] . '.' : '' }}</p>
                            <p class="mt-1 text-base font-semibold leading-none text-darkGray">
                                {{ $testimonial->location ? $testimonial->location : 'Paris' }}</p>
                        </div>
                        <p class="text-sm font-semibold">{{ $testimonial->created_at->format('d.m.y') }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</x-front-layout>
