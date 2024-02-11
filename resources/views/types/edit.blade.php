@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <h3 class="text-2xl text-blue-600 text-center font-semibold leading-tight py-3">
            {{ isset($type) ? 'Edit Type' : 'Create Type' }}
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

        <form action="{{ isset($type) ? route('types.update', $type->id) : route('types.store') }}" method="POST">
            @csrf
            @if (isset($type))
                @method('PUT')
            @endif

            <div class="mb-4">
                <label for="model">Model:</label>
                <input type="text" id="model" name="model" value="{{ $type->model ?? '' }}"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" required>
            </div>


            <div class="mb-4">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="{{ $type->name ?? '' }}"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" required>
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    {{ isset($type) ? 'Save' : 'Create' }}
                </button>
            </div>
        </form>
    </div>
@endsection
