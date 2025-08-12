<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <div class="col-md-12">
    <div class="6" align="center">
      <form action="{{ route('image_upload') }}" method="post" enctype="multipart/form-data">
        @csrf

        <label for="" name="img_label">Image</label>
        <input type="file" name="image" id="image">



        <input type="submit" value="Submit">
      </form>
    </div>
  </div>
</body>
</html>