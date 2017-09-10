<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <meta name="description" content="">
    <meta name="author" content="">
    {{--<meta name="csrf-token" content="{{ csrf_token() }}">--}}


    <title>小林</title>

</head>

<body>

<div class="container">

    <div class="blog-header">
    </div>

    <div class="row">
        @yield("content")

    </div><!-- /.row -->
</div><!-- /.container -->

@yield("pagejs")
</body>
</html>