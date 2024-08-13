<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Task') }}
        </h2>
    </x-slot>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/css/select2.min.css" rel="stylesheet" />

    <div class="py-12">
        <!-- Display success message -->
        @if (session('success'))
            <div class="alert alert-success mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-dark p-4 bg-opacity-25">
            <div class="bg-light overflow-hidden shadow-sm sm:rounded-lg p-5">
                <h1 class="text-center my-3 ms-0 me-0 bg-dark bg-opacity-25 rounded-pill">Create Task</h1>

                <!-- Task creation form -->
                <form method="POST" action="{{ route('task_01.store') }}" class="p-5">
                    @csrf

                    <div class="mb-2">
                        <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title:</label>
                        <input type="text" name="title" id="title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>

                    <div class="mb-2">
                        <label for="task" class="block text-gray-700 text-sm font-bold mb-2">Task:</label>
                        <input type="text" name="task" id="task" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>

                    <div class="mb-2">
                        <label for="message" class="block text-gray-700 text-sm font-bold mb-2">Duration:</label>
                        <select class="select2 form-control" name="message">
                            <option value="" disabled selected>Select Duration</option>
                            <option value="Duration - 01 (Days)">Duration - 01 (Days)</option>
                            <option value="Duration - 02 (Days)">Duration - 02 (Days)</option>
                            <option value="Duration - 03 (Days)">Duration - 03 (Days)</option>
                            <option value="Duration - 04 (Days)">Duration - 04 (Days)</option>
                            <option value="Duration - 05 (Days)">Duration - 05 (Days)</option>
                            <option value="Duration - 06 (Days)">Duration - 06 (Days)</option>
                            <option value="Duration - 07 (Days)">Duration - 07 (Days)</option>
                            <option value="Duration - 08 (Days)">Duration - 08 (Days)</option>
                            <option value="Duration - 09 (Days)">Duration - 09 (Days)</option>
                            <option value="Duration - 10 (Days)">Duration - 10 (Days)</option>
                            <option value="Duration - 11 (Days)">Duration - 11 (Days)</option>
                            <option value="Duration - 12 (Days)">Duration - 12 (Days)</option>
                            <option value="Duration - 13 (Days)">Duration - 13 (Days)</option>
                            <option value="Duration - 14 (Days)">Duration - 14 (Days)</option>
                            <option value="Duration - 15 (Days)">Duration - 15 (Days)</option>
                            <option value="Duration - 16 (Days)">Duration - 16 (Days)</option>
                            <option value="Duration - 17 (Days)">Duration - 17 (Days)</option>
                            <option value="Duration - 18 (Days)">Duration - 18 (Days)</option>
                            <option value="Duration - 19 (Days)">Duration - 19 (Days)</option>
                            <option value="Duration - 20 (Days)">Duration - 20 (Days)</option>
                            <option value="Duration - 21 (Days)">Duration - 21 (Days)</option>
                            <option value="Duration - 22 (Days)">Duration - 22 (Days)</option>
                            <option value="Duration - 23 (Days)">Duration - 23 (Days)</option>
                            <option value="Duration - 24 (Days)">Duration - 24 (Days)</option>
                            <option value="Duration - 25 (Days)">Duration - 25 (Days)</option>
                            <option value="Duration - 26 (Days)">Duration - 26 (Days)</option>
                            <option value="Duration - 27 (Days)">Duration - 27 (Days)</option>
                            <option value="Duration - 28 (Days)">Duration - 28 (Days)</option>
                            <option value="Duration - 29 (Days)">Duration - 29 (Days)</option>
                            <option value="Duration - 30 (Days)">Duration - 30 (Days)</option>
                        </select>
                    </div>

                    <div class="mb-2">
                        <label for="user_id" class="block text-gray-700 text-sm font-bold mb-2">Assign to:</label>
                        <select name="user_id" id="user_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                            <option value="" disabled selected>Select a user</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Submit button -->
                    <div class="d-grid gap-2 pt-2">
                        <button class="btn btn-primary" type="submit">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
