@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <h3 class="text-2xl text-blue-600 text-center font-semibold leading-tight py-3">
            {{ isset($description) ? 'Edit description' : 'Create description' }}
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

        <form action="{{ isset($description) && $description->id ? route('descriptions.update', ['description' => $description->id]) : route('descriptions.store') }}"
            method="POST">
            @csrf
            @if (isset($description) && $description->id)
                @method('PUT')
            @endif
            <input type="hidden" name="term_id" value="{{ $termId }}">
            <div class="mb-4">
                <label for="notes">Notes:</label>
                <input type="text" id="notes" name="notes" value="{{ $description->notes ?? '' }}"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" required>
            </div>
            <div class="mb-4">
                <label for="synthesis">Synthesis:</label>
                <input type="text" id="synthesis" name="synthesis" value="{{ $description->synthesis ?? '' }}"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" required>
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    {{ isset($description) ? 'Save' : 'Create' }}
                </button>
            </div>
        </form>
    </div>
@endsection
