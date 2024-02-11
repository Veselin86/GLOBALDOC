@extends('layouts.app')

{{-- @section('title',{{ isset($user) ? 'Edit User' : 'Create User' }}) --}}
    
{{-- @endsection --}}

@section('content')
    <div class="container mx-auto px-4">
        <h3 class="text-2xl text-blue-600 text-center font-semibold leading-tight py-3">
            {{ isset($user) ? 'Edit User' : 'Create User' }}
        </h3>

        @if ($errors->any())
            <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Whoops!</strong>
                <span class="block sm:inline">There were some problems with your input.</span>
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
         @endif

        <form action="{{ isset($user) ? route('users.update', $user->nia) : route('users.store') }}" method="POST">
            @csrf
            @if (isset($user))
                @method('PUT')
            @endif

            <div class="mb-4">
                <label for="nia">NIA:</label>
                <input type="text" id="nia" name="nia" value="{{ $user->nia ?? '' }}"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" required>
            </div>

            <div class="mb-4">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="{{ $user->name ?? '' }}"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" required>
            </div>

            <div class="mb-4">
                <label for="type_id">Type:</label>
                <select id="type_id" name="type_id"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker">
                    <option value="">Select a type from the list</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}"
                            {{ isset($user) && $user->type_id === $type->id ? 'selected' : '' }}>
                            {{ $type->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="{{ $user->email ?? '' }}"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" required>
            </div>
            @if (!isset($user))
                <div class="mb-4">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" required>

                    <label for="password_confirmation">Confirm Password:</label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" required>
                </div>
            @endif

            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    {{ isset($user) ? 'Save' : 'Create' }}
                </button>
            </div>
        </form>
    </div>
@endsection
