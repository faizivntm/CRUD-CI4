<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="min-height: 100vh;" class="d-flex justify-content-center align-items-center">

  <div class="card p-4" style="width: 100%; max-width: 400px; border-radius: 1rem; box-shadow: 0 0 20px rgba(0,0,0,0.2); background-color: #fff;">
    <h1 style="text-align: center; font-weight: 700; margin-bottom: 1.5rem; color: #333;">Login</h1>

    <?php if(session()->getFlashdata('error')): ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert" style="font-size: 0.9rem;">
        <strong>Error!</strong> <?= session()->getFlashdata('error') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    <?php endif; ?>

    <form action="<?= base_url('/login/auth') ?>" method="post">
      <?= csrf_field() ?>
      <div class="mb-3">
        <label class="form-label">Username</label>
        <input class="form-control" type="text" name="username" placeholder="Masukkan username" required style="border-radius: 0.5rem; border-color: primary;">
      </div>
      <div class="mb-3">
        <label class="form-label">Password</label>
        <input class="form-control" type="password" name="password" placeholder="Masukkan password" required style="border-radius: 0.5rem; border-color: primary;">
      </div>
      <button type="submit" class="btn btn-primary w-100" style="border: none; border-radius: 0.5rem;">Login</button>
    </form>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
