<x-app-layout>
    <x-slot name="header">
        <h2
            class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"
        >
            Your Contacts
        </h2>
    </x-slot>

    <div class="py-10">
        <div
            class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid grid-cols-1 gap-4 md:grid-cols-2"
        >
            @foreach($contacts as $contact)
            <div
                class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg flex justify-between items-center p-5"
            >
                <div class="text-gray-900 dark:text-gray-100">
                    <p>{{ $contact["name"] }}</p>
                    <p>{{ $contact["number"] }}</p>
                    <p>{{ $contact["email"] }}</p>
                </div>
                <div class="flex flex-col gap-2">
                    <p
                        class="bg-blue-600 flex justify-center px-4 py-1 rounded-lg text-sm"
                    >
                        <a
                            href="/edit-contact/{{$contact->id}}"
                            class="text-blue-100"
                            >Edit</a
                        >
                    </p>
                    <form
                        action="/delete-contact/{{$contact->id}}"
                        method="POST"
                    >
                        @csrf @method('DELETE')
                        <button
                            class="text-red-100 bg-red-600 px-4 py-1 rounded-lg text-sm"
                        >
                            Delete
                        </button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
