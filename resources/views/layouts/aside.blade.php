@vite('resources/css/app.css')

<aside class="bg-white shadow text-blue-600 text-lg min-h-screen w-48">
    <div class="p-4 sm:px-6 lg:px-8">
        <ul class="space-y-2">
            <li>
                <a href="{{ route('users.index') }}" class="block px-4 hover:text-xl hover:underline rounded">Users</a>
            </li>
            <li x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                <a href="{{ route('types.index') }}" class="block px-4 hover:text-xl hover:underline rounded">Types</a>
                <ul x-show="open" class="pl-4">
                    <li>
                        <a href="{{ route('types.filter', 'terms') }}"
                            class="block px-4 hover:text-xl hover:underline rounded">Terms</a>
                    </li>
                    <li>
                        <a href="{{ route('types.filter', 'users') }}"
                            class="block px-4 hover:text-xl hover:underline rounded">Users</a>
                    </li>
                </ul>
            </li>
            <li x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                <a href="{{ route('terms.index') }}" class="block px-4 hover:text-xl hover:underline rounded">Terms</a>
                <ul x-show="open" class="pl-4">
                    <li> <a href="{{ route('terms.filter', 'own') }}"
                            class="block px-4 hover:text-xl hover:underline rounded">Own</a>
                    </li>
                    <li>
                        <a href="{{ route('terms.filter', 'others') }}"
                            class="block px-4 hover:text-xl hover:underline rounded">Others</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</aside>
