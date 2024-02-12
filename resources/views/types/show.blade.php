@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center">
            <table class="min-w-full leading-normal">
                <thead>
                    <tr
                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-lg font-semibold text-gray-600 uppercase tracking-wider">
                        <th colspan="2"> 
                            {{ __('Type details') }} 
                        </th>
                        <th>
                            <a href="{{ route('types.edit', $type->id) }}"
                                class="text-white bg-blue-500 hover:bg-blue-700 font-bold  px-4 rounded">
                                {{ __('Edit') }}
                            </a>
                        </th>
                    </tr>
                </thead>
                <tbody class="px-5 py-2 border-b border-gray-200 bg-white text-right text-lg">
                    <tr>
                        <td><strong>{{ __('ID') }}:</strong></td>
                        <td class="text-left pl-2"> {{ $type->id }} </td>
                    </tr>
                    <tr>
                        <td><strong>{{ __('Model') }}:</strong></td>
                        <td class="text-left italic pl-2"> {{ __($type->model) }} </td>
                    </tr>                    
                    <tr>
                        <td><strong>{{ __('Name') }}:</strong></td>
                        <td class="text-left italic pl-2"> {{ __($type->name) }} </td>
                    </tr>                                     
                    <tr>
                        <td><strong>{{ __('Created at') }}:</strong></td>
                        <td class="text-left pl-2">  {{ $type->created_at->format('d/m/Y H:i') }} </td>
                    </tr>                    
                    <tr >
                        <td><strong>{{ __('Updated at') }}:</strong></td>
                        <td class="text-left pl-2"> {{ $type->updated_at->format('d/m/Y H:i') }} </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
