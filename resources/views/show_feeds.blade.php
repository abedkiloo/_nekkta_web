<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Feeds</title>
</head>
<body>
<p>{{ $str_pic  }}</p>
<p>{{ $get_feeds_download->first()->feed_name}}</p>
<img src="{{ asset('images/img.jpg') }}" height="200" width="200">
</body>
</html>