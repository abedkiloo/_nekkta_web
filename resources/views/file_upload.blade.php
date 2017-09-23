<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<form action="{{route('_nekkta_feeds_details')}}" method="post"
      accept-charset="UTF-8"
      enctype="multipart/form-data">
    <div>
        <label></label>
        <input type="file" name="feed_image">
    </div>
    <div>
        <label></label>
        <input type="text" name="feed_name" placeholder="Feed Name">
    </div>
    <div>
        <label></label>
        <input type="text" name="desc_1" placeholder="Description One">
    </div>
    <div>
        <label></label>
        <input type="text" name="desc_2" placeholder="Description Two">
    </div>
    <div>
        <input type="submit">
    </div>

</form>

</body>
</html>