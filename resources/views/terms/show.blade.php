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
                    {{-- <button onclick="window.location.href='{{ route('descriptions.edit', $description->id) }}'"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Editar
                    </button> --}}
                    <button onclick="window.location.href='#{{-- {{ route('terms.rate', $term->id) }} --}}'"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Valorar
                    </button>
                    @if ($term->descriptions->isEmpty())
                        <button onclick="window.location.href='{{ route('descriptions.create', ['termId' => $term->id]) }}'"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Añadir Nota
                        </button>
                    @else
                        @foreach ($term->descriptions as $description)
                            <button
                                onclick="window.location.href='{{ route('descriptions.edit', ['description' => $description->id]) }}'"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Editar
                            </button>
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="flex flex-row gap-4 flex-grow">

                <aside class="w-1/4 bg-gray-100 p-4">
                    <h3 class="font-bold text-lg mb-2">Ideas</h3>
                    <ul class="space-y-2 mb-4">
                        @foreach ($term->descriptions as $description)
                            @foreach ($description->ideas as $idea)
                                <li class="flex flex-col" id="idea-{{ $idea->id }}">
                                    {{ $idea->title }}
                                    <div class="flex flex-col mt-2">
                                        <button onclick="window.location.href='{{ route('ideas.edit', $idea->id) }}'"
                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                            Editar
                                        </button>
                                        <button onclick="deleteIdea({{ $idea->id }})"
                                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                            Borrar
                                        </button>
                                    </div>
                                </li>
                            @endforeach
                        @endforeach
                        <li>
                            <button onclick="window.location.href='{{ route('ideas.create') }}'"
                            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                Nuevo
                            </button>
                        </li>
                    </ul>
                </aside>

                <section class="flex-grow bg-gray-100 p-4">
                    <h3 class="font-bold text-lg mb-2">Notas</h3>
                    @foreach ($term->descriptions as $description)
                        <p>{{ $description->notes }}</p>
                    @endforeach
                </section>
            </div>

            <footer class="bg-gray-100 p-4 mt-4">
                <h3 class="font-bold text-lg mb-2">Síntesis</h3>
                @foreach ($term->descriptions as $description)
                    <p>{{ $description->synthesis }}</p>
                @endforeach
            </footer>
        </div>
    </div>
@endsection
