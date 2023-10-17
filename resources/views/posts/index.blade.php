<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>投稿ページ</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>投稿ページ</h1>
        <div class='posts'>
            @foreach ($posts as $post)
                <div class='post'>
                    <h2 class='title'><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></h2>
                    <p class='body'>{{ $post->body }}</p>
                    <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="deletePost({{ $post->id }})">delete</button> 
                    </form>
                    <a href="">{{ $post->region->name }}</a>
                </div>
            @endforeach
          </div>
        <div class='paginate'>
            {{ $posts->links() }}
        </div>
        <a href='/posts/create'>投稿の作成</a>
        <script>
        function deletePost(id) 
        {if (confirm('削除すると復元できません。\n本当に削除しますか？')) 
            {document.getElementById(`form_${id}`).submit();}
        }
        </script>
    </body>
</html>
