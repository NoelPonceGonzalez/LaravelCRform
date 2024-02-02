
@auth
    <x-app-layout>

        <div class="max-w-4xl mx-auto mt-8 flex justify-between items-center">
            <h1 class="text-3xl font-semibold text-gray-800">Mi Blog</h1>
            <button id="btnAddNewPost" class="rounded h-10 w-20 bg-green-500 text-white hover:bg-green-600">
                New Post
            </button>
        </div>
        <div class="max-w-4xl mx-auto mt-4 space-y-6">
    @foreach($posts as $post)
        <div class="bg-white p-6 rounded-md shadow-md">
            <div class="flex justify-between items-start">
                <div>
                    <h2 class="text-xl font-semibold text-gray-800">{{ $post->title }}</h2>
                    <span class="text-gray-500">
                        {{ $post->created_at->format('F d, Y') }} | <span class="text-pink-600">{{ $post->user }}</span>
                    </span>
                </div>
                <div>
                    <!-- Agregado: Botón para desplegar comentarios -->
                    <button class="text-gray-500 hover:text-blue-500">Show Comments</button>
                </div>
            </div>
            <p class="mt-2 text-gray-600">{{ $post->content }}</p>
            <div class="mt-4 hidden">
                <!-- Sección de comentarios -->
                <div class="mb-4">
                <h3 class="text-lg font-semibold mb-2">Comments</h3>
                <!-- Agregado: Iterar sobre los comentarios y mostrarlos -->
                @foreach($comments as $comment)
                    <div class="text-gray-600 mb-2">
                        <span class="font-semibold {{ Auth::id() === $comment->user_id ? 'text-pink-600' : 'text-blue-500' }}">
                            @foreach($user as $users)
                                @if($users->id === $comment->user_id && $post->id === $comment->post_id)
                                {{ $users->name }}:
                        </span>
                        <span class="font-semibold">
                            {{ $comment->comment }} 
                        </span>
                        @endif 
                        @endforeach
                    </div>
                @endforeach
            </div>
                <!-- Input para agregar comentario -->
                <div>
                <form action="{{ route('createComment', ['postId' => $post->id]) }}" method="post">
                    @csrf
                    <input type="text" name="comment" placeholder="Add a comment..." class="p-2 border rounded-md w-full">
                    <button type="submit" class="mt-2 bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Comment</button>
                </form>

                </div>
            </div>
        </div>
    @endforeach
</div>
        </div>
        <div id="overlay" class="fixed top-0 left-0 w-full h-full bg-black bg-opacity-50 hidden"></div>
        <div id="newPostContainer" class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white p-8 rounded-md shadow-md hidden w-96">
        <span id="closeButton" class="absolute top-2 right-2 text-3xl cursor-pointer hover:text-red-400 mt-2">×</span>
            <h1 class="text-2xl font-semibold mb-4">New Post</h1>
            <p>Contenido de tu nuevo post...</p>
            <form action="{{ route('createPost') }}" method="post">
                @csrf
                <input type="text" name="title" placeholder="Titulo" class="mt-4 p-2 border rounded-md w-full">
                <textarea name="content" placeholder="Escribe tu post..." class="mt-4 p-2 border rounded-md w-full h-32"></textarea>
                <button type="submit" class="mt-4 bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">Publicar</button>
            </form>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {

                document.getElementById('btnAddNewPost').addEventListener('click', function() {
                    document.getElementById('newPostContainer').classList.remove('hidden');
                    document.getElementById('overlay').classList.remove('hidden');
                });

                document.getElementById('closeButton').addEventListener('click', function() {

                    document.getElementById('newPostContainer').classList.add('hidden');
                    document.getElementById('overlay').classList.add('hidden');
                });
            });

            document.addEventListener('DOMContentLoaded', function() {
                 const showCommentButtons = document.querySelectorAll('.bg-white button');

                 showCommentButtons.forEach(button => {
                     button.addEventListener('click', function() {
                         const postContainer = this.closest('.bg-white');
                         const commentsSection = postContainer.querySelector('.hidden');
                         commentsSection.classList.toggle('hidden');
                     });
                 });
             });
        </script>


    </x-app-layout>
@else 
    <x-app-layout>
    <h1 class="text-3xl font-semibold text-gray-800">Posts</h1>
    <div class="max-w-4xl mx-auto mt-4 space-y-6">
    @foreach($posts as $post)
        <div class="bg-white p-6 rounded-md shadow-md">
            <div class="flex justify-between items-start">
                <div>
                    <h2 class="text-xl font-semibold text-gray-800">{{ $post->title }}</h2>
                    <span class="text-gray-500">
                        {{ $post->created_at->format('F d, Y') }} | <span class="text-pink-600">{{ $post->user }}</span>
                    </span>
                </div>
                <div>
                    <!-- Agregado: Botón para desplegar comentarios -->
                    <button class="text-gray-500 hover:text-blue-500">Show Comments</button>
                </div>
            </div>
            <p class="mt-2 text-gray-600">{{ $post->content }}</p>
            <div class="mt-4 hidden">
                <!-- Sección de comentarios -->
                <div class="mb-4">
                <h3 class="text-lg font-semibold mb-2">Comments</h3>
                <!-- Agregado: Iterar sobre los comentarios y mostrarlos -->
                @foreach($comments as $comment)
                    <div class="text-gray-600 mb-2">
                        <span class="font-semibold {{ Auth::id() === $comment->user_id ? 'text-pink-600' : 'text-blue-500' }}">
                            @foreach($user as $users)
                                @if($users->id === $comment->user_id && $post->id === $comment->post_id)
                                {{ $users->name }}:
                        </span>
                        <span class="font-semibold">
                            {{ $comment->comment }} 
                        </span>
                        @endif 
                        @endforeach
                    </div>
                @endforeach
            </div>
                <!-- Input para agregar comentario -->
                <div>
                <form action="{{ route('createComment', ['postId' => $post->id]) }}" method="post">
                </form>

                </div>
            </div>
        </div>
    @endforeach

    <script>

document.addEventListener('DOMContentLoaded', function() {
 const showCommentButtons = document.querySelectorAll('.bg-white button');

 showCommentButtons.forEach(button => {
     button.addEventListener('click', function() {
         const postContainer = this.closest('.bg-white');
         const commentsSection = postContainer.querySelector('.hidden');
         commentsSection.classList.toggle('hidden');
     });
 });
});
</script>
    </script>
    </x-app-layout>
@endauth
