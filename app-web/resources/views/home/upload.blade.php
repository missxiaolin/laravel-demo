@extends("layout.main")

@section("content")
    <form method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="file" name="img" action="">
        <button type="submit">提交</button>
    </form>
@endsection