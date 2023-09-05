<x-app-layout>
    <x-slot name="header">
        <h2
            class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"
        >
            Create a new contact
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div
                class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg"
            >
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="/create-contact" method="POST">
                        @csrf
                        <div class="">
                            <label for="name">Contact Name</label>
                            <input
                                type="text"
                                name="name"
                                class="bg-gray-800 w-full dark:bg-white text-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-1"
                            />
                            @error('name')
                            <p class="mt-1 text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mt-4">
                            <label for="number" class="mt-4"
                                >Contact Number</label
                            >
                            <input
                                type="text"
                                name="number"
                                class="bg-gray-800 w-full dark:bg-white text-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-1"
                            />
                            @error('number')
                            <p class="mt-1 text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mt-4">
                            <label for="email" class="mt-4"
                                >Contact Email</label
                            >
                            <input
                                type="text"
                                name="email"
                                class="bg-gray-800 w-full dark:bg-white text-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-1"
                            />
                            @error('email')
                            <p class="mt-1 text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <button
                            class="dark:bg-indigo-700 p-2 mt-6 w-full rounded-lg"
                        >
                            Add Contact
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
