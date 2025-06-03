<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Register</title>
</head>
<body style="height: 100vh;" class="d-flex align-items-center justify-content-center bg-light">
  <div class="card px-5 py-4 shadow" style="width: 30rem;">
    <h1 class="text-center mb-5">Register</h1>
    <form action="/register" method="POST">
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="name" id="name" class="form-control" placeholder="Masukkan nama lengkap" required>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" id="email" class="form-control" placeholder="Masukkan email" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan password" required>
      </div>
      <div class="mb-4">
        <label for="confirm_password" class="form-label">Konfirmasi Password</label>
        <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Ulangi password" required>
      </div>
      <button type="submit" class="btn btn-success w-100">Register</button>
      <div class="text-center mt-3">
        <small>Sudah punya akun? <a href="{{ route('login.blade.php') }}">Login di sini</a></small>
      </div>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
