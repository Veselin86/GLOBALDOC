@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <h3 class="text-2xl text-blue-600 text-center font-semibold leading-tight py-3">
            {{ isset($idea) ? 'Edit idea' : 'Create idea' }}
        </h3>

        @if ($errors->any() || session('error'))
            <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Whoops!</strong>
                @if ($errors->any())
                    <span class="block sm:inline">There were some problems with your input.</span>
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @else
                    <span class="block sm:inline">{{ session('error') }}</span>
                @endif
            </div>
        @endif

        <form action="{{ isset($idea) && $idea->id ? route('ideas.update', ['idea' => $idea->id]) : route('ideas.store') }}"
            method="POST">
            @csrf
            {{-- <input type="hidden" name="description_id" value="{{ $description_id }}"> --}}
            @if (isset($idea) && $idea->id)
                @method('PUT')
            @endif
            <div class="mb-4">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" value="{{ $idea->title ?? '' }}"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" required>
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    {{ isset($idea) ? 'Save' : 'Create' }}
                </button>
            </div>
        </form>
    </div>
@endsection
