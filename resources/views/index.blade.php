@extends('layouts.app')

@section('page_title', 'Index')

@section('content')
    <div class="container mx-auto px-4">
        <div class="flex justify-center">
            <div class="w-full max-w-2xl mt-6">
                <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                    <div class="p-4 bg-blue-500 text-white text-center text-2xl font-bold">{{ __('Welcome to GLOBALDOC') }}</div>
                    <div class="p-6">
                        <p class="text-lg text-center mb-4">{{ __('A page representing the Cornell method for studying') }}</p>
                        <p class="text-lg text-center mb-4">{{ __('Made by Veselin Vladimirov Veselinov') }}</p>
                        <p class="text-lg text-center">{{ __('For DWES-CEED') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

