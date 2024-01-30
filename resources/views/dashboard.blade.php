@auth
<x-app-layout>
    <div class="max-w-4xl mx-auto mt-8">
        <h1 class="text-3xl font-semibold text-gray-800 mb-6">Mi Blog</h1>

        <div class="space-y-6">
            @foreach($posts as $post)
                <div class="bg-white p-6 rounded-md shadow-md">
                    <h2 class="text-xl font-semibold text-gray-800">{{ $post->title }}</h2>
                    <p class="mt-2 text-gray-600">{{ $post->content }}</p>
                    <div class="mt-4">
                        <span class="text-gray-500">
                            Publicado por {{ $post->user_name }} el {{ $post->created_at->format('d \de F \de Y') }}
                        </span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
@else 
<x-app-layout>
    
    <div>
        <h1>estoy fuera</h1>
    </div>
</x-app-layout>
@endauth