<x-app-layout>
    <body>
        <h1 class="text-lg flex justify-center p-3">投稿ページ</h1>
        <a href='/posts/create' class="">投稿の作成</a>
        <div class='posts'>
            @foreach ($posts as $post)
                <div class='post space-y-4'>
                    <h2 class='title text-lg flex justify-center rounded bg-yellow-500 p-3'><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></h2>
                    <p class='body text-lg flex justify-center p-3'>{{ $post->body }}</p>
                    <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="deletePost({{ $post->id }})">削除</button> 
                    </form>
                    <a href="">{{ $post->region->name }}</a>
                </div>
                <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $posts->links() }}
        </div>
        <script>
        function deletePost(id) 
        {if (confirm('削除すると復元できません。\n本当に削除しますか？')) 
            {document.getElementById(`form_${id}`).submit();}
        }
        </script>
    </body>
</x-app-layout>
