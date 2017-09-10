@extends("weapp.layout.main")
@section("content")
    <form method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="file" name="img" action="">

        <button type="submit">
            上传
        </button>
    </form>
@endsection