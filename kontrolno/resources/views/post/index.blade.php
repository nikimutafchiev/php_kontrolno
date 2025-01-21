@extends("layout.app")
@section("content")

<div>
    <form action="/post" method="POST" style="display: flex; flex-direction:column; width:300px; gap:4px;">
        {{ csrf_field() }}
        <label for=" content-input" style="font-weight: 600; text-align:center;">Content</label>
        <input id="content-input" name="content" type="text">
        </input>
        <button type="submit" style="background-color: green; border-radius:10px; color:white; font-weight:500;width:100px; border:none; padding:8px; align-self:center ">Post</button>
    </form>
    <div style="font-size: xx-large; font-weight:600">
        Posts
    </div>
    <ul>

        @foreach($posts->all() as $post)
        <div style="background-color: gray; padding:16px">
            {{post->content}}
        </div>
        @endforeach
    </ul>

</div>
@endsection