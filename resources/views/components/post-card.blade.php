<div class="px-2 mb-2 w-1/4">
    <div class="flex flex-col bg-white px-6 py-4 border-b rounded">
        <div class="flex items-center justify-between">
            <span class="font-semibold">{{ $post->title }}</span>
            <a 
                href="{{ route('post.show', [
                'id' => $post->id
                ]) }}" 
                class="ml-2 text-blue-400 px-2 rounded hover:bg-blue-50">
                Leer mas
            </a>
        </div>
        <div class="flex flex-col mt-2">
            <span class="text-gray-400 mb-2">{{ $post->created_at }}</span>
            <span class="text-gray-400">
                Creado por:
                {{ !$post->user ? 'Anonimo' : $post->user->username }}
            </span>
        </div>
    </div>
</div>