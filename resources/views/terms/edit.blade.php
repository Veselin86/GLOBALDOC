@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <h3 class="text-2xl text-blue-600 text-center font-semibold leading-tight py-3">
            {{ isset($term) ? __('Edit Term') : __('Create Term') }}
        </h3>

        @if ($errors->any() || session('error'))
            <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">{{ __('Whoops') }}!</strong>
                @if ($errors->any())
                    <span class="block sm:inline">{{ __('There were some problems with your input') }}.</span>
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ __($error) }}</li>
                        @endforeach
                    </ul>
                @else
                    <span class="block sm:inline">{{ session('error') }}</span>
                @endif
            </div>
        @endif

        <form action="{{ isset($term) ? route('terms.update', $term->id) : route('terms.store') }}" method="POST">
            @csrf
            @if (isset($term))
                @method('PUT')
            @endif

            <div class="mb-4">
                <label for="name"> {{ __('Name')}}:</label>
                <input type="text" id="name" name="name" value="{{ $term->name ?? '' }}"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" required>
            </div>

            <div class="mb-4">
                <label for="type_id">{{ __('Type')}}:</label>
                <select id="type_id" name="type_id"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker">
                    <option value="">{{ __('Select a type from the list')}}</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}"
                            {{ isset($term) && $term->type_id === $type->id ? 'selected' : '' }}>
                            {{ __($type->name) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="definition">{{ __('Definition')}}:</label>
                <input type="definition" id="definition" name="definition" value="{{ $term->definition ?? '' }}"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" required>
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    {{ isset($term) ? __('Save') : __('Create') }}
                </button>
            </div>
        </form>
    </div>
@endsection
