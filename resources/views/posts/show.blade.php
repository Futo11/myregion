<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>タイトル</title>
        <style>
            .liked{
                color:red
            }
        </style>
        <!-- Fonts -->
    </head>
    <body>
        <h1 class="title">
            {{ $post->title }}
        </h1>
        <div class="content">
            <div class="content__post">
                <h3>本文</h3>
                <p>{{ $post->body }}</p>    
            </div>
        </div>
        @if($post->image_url)
        <div><img src="{{ $post->image_url }}" alt="画像が読み込めません。"/></div>
        @endif
        <div class="footer"><a href="/">戻る</a></div>
        <div class="edit"><a href="/posts/{{ $post->id }}/edit">edit</a></div>
        <form class="w-100" action="/post/{{ $post->id }}/comments"method="post">
            @csrf
            <input class="form-control comment-input border-0" placeholder="コメント ..." autocomplete="off" type="text" name="comment" />
            <input type="submit" value="store"/>
        </form>
        @if(!is_null($comments))
        @foreach($comments as $comment)
        <p>{{$comment->comment}}</p>
        @endforeach
        @endif
        
        @if($post->is_liked_by_auth_user())
            <i class="text-4xl like-toggle fas fa-heart liked" data-id="{{ $post->id }}"></i>
            <span class="like-counter">{{ $post->likes->count() }}</span>
        @else
            <i class="text-4xl like-toggle fas fa-heart" data-id="{{ $post->id }}"></i>
            <span class="text-4xl like-counter">{{ $post->likes->count() }}</span>
        @endif
        
        <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
        <script>
            $(function(){
                let like = $('.like-toggle');
                let likePost;
                like.on('click',function(){
                let $this = $(this);
                likePost = $this.data('id');
                $.ajax({
                //非同期通信
                    headers: {
                        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                    },
                    url:'/like',
                    method: 'POST',
                    data: {
                        'post_id':likePost
                    }
                })
                .done(function (data) {
                    $this.toggleClass('liked');
                    $this.next('.like-counter').html(data.likes_count);
                })
                .fail(function(){
                    console.log('fail');
                });
                });
            });
        </script>
    </body>
</html>