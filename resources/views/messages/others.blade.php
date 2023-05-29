<x-app-layout>
    <div class="py-8 space-y-8">
        <div class="max-w-7xl mx-auto flex justify-between items-center px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col space-y-2">
                <h1 class="text-2xl font-semibold text-gray-900">
                    {{ $title }}
                </h1>
                <p class="text-sm text-gray-500">
                    {{ $description }}
                </p>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500" aria-describedby="table-head-description">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Nom
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Email
                            </th>
                            <th scope="col" class="px-6 py-3 max-w-sm">
                                Message
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Date
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($messages as $message)
                            <tr class="bg-white border-b hover:bg-gray-50-600">

                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $message->first_name }} {{ $message->last_name }}
                                </th>
                                <td class="px-6 py-4">
                                    @if ($message->email)
                                        {{ $message->email }}
                                    @else
                                        <span class="text-gray-400">Non renseigné</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 max-w-sm">
                                    {{-- show only 100 first characters --}}
                                    {{ Str::limit($message->message, 255, '...') }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $message->created_at->format('j M Y, g:i a', 'UTC') }}
                                </td>
                                <td class="px-6 py-4 flex gap-2">
                                    <a class="font-medium text-blue-600 hover:underline"
                                        href="mailto:{{ $message->email }}">
                                        Répondre</a>
                                    <form method="POST" action="{{ route('messages.destroy', $message) }}">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="font-medium text-red-600 hover:underline">
                                            Supprimer
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <x-pagination :items="$messages" />
            </div>
        </div>
    </div>
</x-app-layout>
