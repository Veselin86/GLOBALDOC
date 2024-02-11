    @extends('layouts.app')
    @vite(['resources/js/app.js', 'resources/js/confirm-deletion.js'])

    @section('content')
        <div class="container mx-auto px-4">
            <h3 class="text-2xl text-blue-600 text-center font-semibold leading-tight py-3">Users</h3>
            <button
                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                type="button" onclick="window.location='{{ route('users.create') }}'">
                {{ __('NEW') }}
            </button>

            <div class="bg-white shadow-lg rounded-sm border border-gray-200">
                <table class="min-w-full leading-normal">
                    <thead>
                        <tr
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xl font-semibold text-gray-600 uppercase tracking-wider">
                            <th> User </th>
                            <th> Type </th>
                            <th colspan="2"> Actions </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr class="px-5 py-2 border-b border-gray-200 bg-white text-center text-lg">
                                <td>
                                    {{ $user->name }}
                                </td>
                                <td>
                                    {{ $user->type->name ?? 'Tipo no asignado' }}
                                </td>
                                <td>
                                    {{-- <a href="{{ route('users.show', ['nia' => $user->nia]) }}"      --}}
                                    <a href="{{ route('users.show', ['user' => $user]) }}"
                                        class="text-indigo-600 hover:text-indigo-900">Show</a>
                                </td>
                                <td>
                                    <form action="{{ route('users.destroy', $user->nia) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="text-red-600 hover:text-red-900"
                                            onclick="confirmDeletion('{{ $user->nia }}', '{{ route('users.destroy', ':nia') }}', 'nia')">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endsection
