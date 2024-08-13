<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">

    <div class="py-12 m-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-light overflow-hidden shadow-sm sm:rounded-lg p-4 border-3">
                <h1 class="text-center rounded-pill">Task List</h1>
                <hr>

                <table class="table table-striped table-bordered rounded-pill">
                    <thead class="table-dark">
                        <tr class="text-center">
                            <th>#</th>
                            <th class="text-start">Title</th>
                            <th>Task</th>
                            <th>Message</th>
                            <th>Duration</th>
                            <th>Status</th>
                            <th>User ID</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @foreach($tasks as $task)
                            <tr class="text-center">
                                <td>{{ $loop->iteration }}</td>
                                <td class="text-start">{{ $task->title }}</td>
                                <td>{{ $task->task }}</td>
                                <td>{{ $task->message }}</td>
                                <td>{{ $task->accepted_at ? $task->accepted_at->format('Y-m-d') : 'N/A' }}</td>
                                <td class="{{ $task->statusClass() }}">{{ $task->status }}</td>
                                <td>{{ $task->user_id }}</td>
                                <td>
                                    <button class="btn btn-outline-primary view-btn" data-id="{{ $task->id }}">View</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.view-btn').forEach(button => {
                button.addEventListener('click', function() {
                    const taskId = this.getAttribute('data-id');

                    fetch(`/tasks/${taskId}`)
                        .then(response => response.json())
                        .then(data => {
                            // Determine the status color
                            let statusColor;
                            switch (data.status) {
                                case 'completed':
                                    statusColor = 'text-success'; // Green
                                    break;
                                case 'processing':
                                    statusColor = 'text-primary'; // Blue
                                    break;
                                case 'rejected':
                                    statusColor = 'text-danger'; // Red
                                    break;
                                default:
                                    statusColor = 'text-warning'; // Yellow (Pending)
                            }

                            Swal.fire({
                                title: 'Task Details',
                                html: `
                                    <table class="table table-bordered">
                                        <tbody class="text-start">
                                            <tr>
                                                <td><strong>Title:</strong></td>
                                                <td>${data.title}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Task:</strong></td>
                                                <td>${data.task}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Message:</strong></td>
                                                <td>${data.message}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Duration:</strong></td>
                                                <td>${data.accepted_at ? new Date(data.accepted_at).toLocaleDateString() : 'N/A'}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Status:</strong></td>
                                                <td class="${statusColor}">${data.status}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>User ID:</strong></td>
                                                <td>${data.user_id}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                `,
                                confirmButtonText: 'OK',
                                customClass: {
                                    content: 'text-left'
                                },
                                didOpen: () => {
                                    const table = Swal.getContent().querySelector('.table');
                                    table.classList.add('table-striped', 'table-bordered');
                                }
                            });
                        });
                });
            });
        });
    </script>
</x-app-layout>
