<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body class="bg-body" style="width: 100%; height: 100vh;">
        <div style="height:100vh;" class="container-fluid d-flex align-items-center justify-content-center">
            <form action="{{ route('login.process') }}" method="POST" class="card px-5 py-4 shadow" style="width: 28.25rem;">
                @csrf

                <h1 class="text-center mb-4">Login</h1>

                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="form-group mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Masukkan Name">
                </div>
                <div class="form-group mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan Password">
                </div>
                <div style="width: 100%;" class="mb-2">
                    <button type="submit" class="btn btn-primary" style="width: 100%;">Login</button>
                </div>
            </form>


        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>