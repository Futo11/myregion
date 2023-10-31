<x-app-layout>
    <body>
        <h1 class="text-lg flex justify-center rounded bg-yellow-500 p-3">イベント投稿を作成</h1>
        <form action={{"/event/".$post->id}} method="POST" enctype="multipart/form-data">
            @csrf
            <div class="title flex justify-center flex-col">
                <h2 class="flex justify-center">タイトル</h2>
                <input type="text" name="event[title]" placeholder="aaa" class="flex justify-center"/>
                <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p>
            </div>
            <div class="body flex justify-center flex-col">
                <h2 class="flex justify-center">本文</h2>
                <textarea name="event[body]" placeholder="最近の出来事。"></textarea>
                <p class="body__error" style="color:red">{{ $errors->first('post.body') }}</p>
            </div>
            <div class="image">
                <input type="file" name="image">
            </div>
            <input type="submit" value="保存"/>     
        </form>
        <div class="back">[<a href="/">戻る</a>]</div>
    </body>
</x-app-layout>