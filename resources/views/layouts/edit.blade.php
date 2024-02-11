@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center">
            <table class="min-w-full leading-normal">
                <thead>
                    <tr
                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-lg font-semibold text-gray-600 uppercase tracking-wider">
                        <th colspan="2">
                            Term details
                        </th>
                        <th>
                            <a href="{{ route('terms.edit', $term->id) }}"
                                class="text-white bg-blue-500 hover:bg-blue-700 font-bold  px-4 rounded">
                                Edit
                            </a>
                        </th>
                    </tr>
                </thead>
                <tbody class="px-5 py-2 border-b border-gray-200 bg-white text-right text-lg">
                    <tr>
                        <td><strong>ID:</strong></td>
                        <td class="text-left pl-2"> {{ $term->id }} </td>
                    </tr>
                    <tr>
                        <td><strong>Name:</strong></td>
                        <td class="text-left pl-2 italic"> {{ $term->name }} </td>
                    </tr>
                    <tr>
                        <td><strong>Type:</strong></td>
                        <td class="text-left pl-2 italic"> {{ $term->type->name ?? 'Tipo no asignado' }} </td>
                    </tr>
                    <tr>
                        <td><strong>Definition:</strong></td>
                        <td class="text-left pl-2 italic"> {{ $term->definition }} </td>
                    </tr>
                    <tr>
                        <td><strong>Created at:</strong></td>
                        <td class="text-left pl-2"> {{ $term->created_at->format('d/m/Y H:i') }} </td>
                    </tr>
                    <tr>
                        <td><strong>Updated at:</strong></td>
                        <td class="text-left pl-2"> {{ $term->updated_at->format('d/m/Y H:i') }} </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection