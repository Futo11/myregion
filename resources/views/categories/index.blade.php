<x-app-layout>
    <body>
        <h1 class="text-lg flex justify-center rounded bg-yellow-500 p-3">投稿ページ</h1>
        <div class='posts'>
            @foreach ($posts as $post)
                <div class='post'>
                    <h2 class="title flex justify-center"><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></h2>
                    <p class="body flex justify-center">{{ $post->body }}</p>
                    <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="deletePost({{ $post->id }})">delete</button> 
                    </form>
                    <a href="">{{ $post->region->name }}</a>
                </div>
                <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $posts->links() }}
        </div>
        <div class="footer"><a href="/">戻る</a></div>
    </body>
</x-app-layout>