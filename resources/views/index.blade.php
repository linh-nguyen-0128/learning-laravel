<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        #table-fixed {
            overflow: auto;
            max-height: 480px;
        }
        #table-fixed table thead th {
            position: sticky;
            height: 40.5px;
            top: 0;
            z-index: 1;
            background: #000;
            color: white;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h2 class="text-center my-3">
            LIST POST
        </h2>
        <div>
            <a href="{{ route('post.create') }}" class="btn btn-success my-2">
                Add
            </a>
        </div>
        <div id="table-fixed">
            <table class="table">
                <thead>
                    <tr class="table-head">
                      <th scope="col">#</th>
                      <th scope="col">Title</th>
                      <th scope="col">Content</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                <tbody>
                @foreach ($posts as $item)
                    <tr>
                        <td>
                            {{ $item->id }}
                        </td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->content }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <a class="btn btn-warning text-white" href="{{ route('post.edit', ['id' => $item->id]) }}">
                                    Edit
                                </a>
                                <form method="POST" action="{{ route('post.destroy', ['id' => $item->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Are you sure delete')" class="btn btn-danger" type="submit">Remove</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
