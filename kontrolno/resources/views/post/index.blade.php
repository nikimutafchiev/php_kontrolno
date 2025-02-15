@extends("layouts.app")
@section("content")
<div>
    <form action="/post" method="POST" style="display: flex; flex-direction:column; width:300px; gap:4px;">
        {{ csrf_field() }}
        <label for=" content-input" style="font-weight: 600; text-align:center;  color:white">Content</label>
        <div style="display: flex; flex-direction:row; margin:2px; gap:10px">
            <input id="content-input" name="content" type="text" style="border-radius: 10px;">
            </input>
            <button type="submit" style="background-color: green; border-radius:10px; color:white; font-weight:500;width:100px; border:none; padding:8px; align-self:center ">Post</button>
        </div>
    </form>
    <div style="font-size: xx-large; color:white; font-weight:600">
        Posts
    </div>
    <ul>

        @foreach($posts as $post)
        <div style="background-color: gray; padding:16px; margin:4px; border-radius:10px; display:flex; flex-direction:row; justify-content:space-between; align-items:center">
            <div>{{$post["content"]}}</div>
            <div>Likes: {{$post["likes"]}}</div>
            <form method="POST" action="/like/?post_id={{$post['id']}}">
                {{csrf_field()}}
                <button type="submit" style="color:white;background-color:blue;font-weight:700; padding:4px;border-radius: 6px;">{{$post["is_liked"]}}</button>
            </form>

            <form method="POST" action="/post/?post_id={{$post['id']}}">
                {{csrf_field()}}
                {{method_field("DELETE")}}
                <button type="submit" style="color:white;background-color:red;font-weight:700; padding:4px;border-radius: 6px;">Delete</button>

            </form>
        </div>
        @endforeach
    </ul>

</div>
@endsection