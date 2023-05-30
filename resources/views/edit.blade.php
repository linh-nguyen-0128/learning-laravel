<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    @isset($post)
    <div class="container">
        <h2 class="text-center my-3">
            UPDATE POST
        </h2>
        <form class="my-3" action={{ route('post.update', ['id' => $post['id']]) }} method="POST" >
            @csrf
            @method('PUT')
            <div class="form-floating mb-3">
                <input name="title" value="{{ $post['title'] }}" type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Title</label>
                </div>
            <div class="form-floating mb-3">
                <textarea name="content" class="form-control" placeholder="Leave a content here" id="floatingTextarea2" style="height: 100px">
                    {{ $post['content'] }}
                </textarea>
                <label for="floatingTextarea2">Content</label>
                </div>
            <button type="submit" class="btn btn-warning">Update</button>
        </form>
    </div>
    @endisset
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
