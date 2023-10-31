<x-app-layout>
    <body>
    <h1 class="title text-lg flex justify-center rounded bg-yellow-500 p-3">編集画面</h1>
    <div class="content flex justify-center">
        <form action="/posts/{{ $post->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class='content__title'>
                <h2>タイトル</h2>
                <input type='text' name='post[title]' value="{{ $post->title }}">
            </div>
            <div class='content__body'>
                <h2>本文</h2>
                <input type='text' name='post[body]' style="width: 200px; height: 100px;" value="{{ $post->body }} ">
            </div>
            <input type="submit" value="保存">
        </form>
    </div>
    </body>
</x-app-layout>