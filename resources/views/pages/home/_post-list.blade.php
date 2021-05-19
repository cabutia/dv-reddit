<div class="container mx-auto mt-4">
  @if($posts->count() > 0)
    <div class="flex flex-row flex-wrap -mx-2">
      @foreach($posts as $post)
        <x-post-card :post="$post" />
      @endforeach
    </div>
  @else
    <p class="text-gray-600 py-4 px-4 text-center">Aun no hay posts!</p>
  @endif
</div>