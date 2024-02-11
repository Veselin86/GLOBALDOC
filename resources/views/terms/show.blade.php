{{-- @extends('layouts.app')

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
@endsection --}}

@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <div class="flex flex-col min-h-screen">

            <!-- Título y tipo de término con botones de acción -->
            <div class="flex justify-between items-center border-b pb-2 mb-4">
                <div>
                    <h1 class="text-xl font-bold inline">{{ $term->name }}</h1>
                    <p>{{ $term->type->name }}</p>
                </div>
                <div>
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">
                        Editar
                    </button>
                    <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                        Valorar
                    </button>
                </div>
            </div>

            <!-- Contenedor de Ideas y Notas -->
            <div class="flex flex-row gap-4 flex-grow">

                <!-- Columna de Ideas como un aside -->
                <aside class="w-1/4 bg-gray-100 p-4">
                    <h3 class="font-bold text-lg mb-2">Ideas</h3>
                    <ul class="space-y-2 mb-4">
                        @foreach ($term->descriptions as $description)
                            @foreach ($description->ideas as $idea)
                                <li class="flex flex-col">
                                    {{ $idea->title }}
                                    <div class="flex flex-col mt-2">
                                        <button onclick="editIdea({{ $idea->id }})"
                                            class="text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded mb-1">
                                            Editar
                                        </button>
                                        <button onclick="deleteIdea({{ $idea->id }})"
                                            class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded">
                                            Borrar
                                        </button>
                                    </div>
                                </li>
                            @endforeach
                        @endforeach
                        <li>
                            <button class="bg-green-500 hover:bg-green-700 text-white py-2 px-4 rounded">
                                Nuevo
                            </button>
                        </li>
                    </ul>
                </aside>

                <!-- Columna de Notas -->
                <section class="flex-grow bg-gray-100 p-4">
                    <h3 class="font-bold text-lg mb-2">Notas</h3>
                    @foreach ($term->descriptions as $description)
                        <p>{{ $description->notes }}</p>
                    @endforeach
                </section>
            </div>

            <!-- Síntesis en la parte inferior de la página -->
            <footer class="bg-gray-100 p-4 mt-4">
                <h3 class="font-bold text-lg mb-2">Síntesis</h3>
                @foreach ($term->descriptions as $description)
                    <p>{{ $description->synthesis }}</p>
                @endforeach
            </footer>
        </div>
    </div>
@endsection
