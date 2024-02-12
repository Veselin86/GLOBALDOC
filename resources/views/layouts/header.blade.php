@vite('resources/css/app.css')

<header class="bg-blue-600 shadow">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex justify-between items-center ">
        <h1 class="text-5xl bg-white text-green-600 font-bold border-collapse rounded-md p-3">
            <a href="/">GLOBALDOC</a>
        </h1>
        <div class="flex items-center">
            @auth
                <div class="bg-white text-green-700 font-bold text-lg border-collapse rounded-md p-2 ml-4">
                    {{ Auth::user()->name }}
                </div>
            @endauth
            <a href="{{ route('login') }}" class="text-gray-500 hover:text-gray-900 ">
                <x-heroicon-o-user class="h-10 w-10 text-white mr-3 hover:size-11" />
            </a>
            <div x-data="{ open: false }" @click.away="open = false" class="relative">
                <button @click="open = !open" class="focus:outline-none">
                    <x-heroicon-o-globe-americas class="h-10 w-10 text-white hover:size-11" />
                </button>
                <div x-show="open"
                    class="origin-top-right z-50 absolute right-0 mt-2 w-auto rounded-md shadow-l bg-blue-600 ring-black text-white ring-opacity-5">
                    <div class="block py-1 text-center" role="menu" aria-orientation="vertical"
                        aria-labelledby="options-menu">
                        @foreach ($languages as $language)
                            <a href="{{ route('language.switch', $language->iso_code) }}"
                                class="block py-2 px-5 text-lg text-white hover:bg-blue-800 rounded"
                                role="menuitem">{{ $language->language }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="bg-white text-green-600 font-bold text-lg border-collapse rounded-md p-2 ml-4">
                {{ app()->getLocale() }}
            </div>
        </div>
    </div>
</header>
