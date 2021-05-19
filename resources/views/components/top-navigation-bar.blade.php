<nav class="flex w-full items-center bg-gray-200 fixed top-0 left-0 h-24 border-b">
    <div class="container mx-auto">
        <div class="flex justify-between">
            <div class="flex items-center">
                @foreach($links as $link)
                    <a class="px-4" href="{{ $link['route'] }}">
                        {{ $link['label'] }}
                    </a>
                @endforeach
            </div>

            <div class="flex items-center">
                @if($user)
                    <div class="px-4">
                        <span>Usuario: </span>
                        <span class="font-bold">{{ $user->username }}</span>
                    </div>
                    <form action="{{ route('auth.logout') }}" method="post" class="px-4">
                        @csrf
                        <button type="submit" class="bg-red-300 text-red-700 px-2 py-1 rounded hover:bg-red-400">
                            Logout
                        </button>
                    </form>
                @else
                    <a class="px-4" href="{{ route('auth.loginForm') }}">
                        Login
                    </a>
                @endif
            </div>
        </div>
    </div>
</nav>