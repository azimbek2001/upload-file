<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Intervention image upload</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
                <form method="post" action="{{ route('store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="image" class="form-label">Upload image</label>
                        <input class="form-control" type="file" id="image" name="image">
                    </div>
                    @error('image')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    @if(\Session::has('success'))
                        <div class="alert alert-success">{{ \Session::get('success') }}</div>
                    @endif
                    <div class="mb-3">
                        <input type="submit" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>