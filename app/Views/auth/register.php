<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-md-6 col-lg-5">
        <div class="card shadow-sm border-0">
            <div class="card-body p-5">
                <h2 class="text-center mb-1">Create an account</h2>
                <p class="text-center text-muted mb-4">Join us today</p>

                <?php if(session()->getFlashdata('errors')): ?>
                    <div class="alert alert-danger">
                        <ul class="mb-0 ps-3">
                            <?php foreach(session()->getFlashdata('errors') as $error): ?>
                                <li><?= esc($error) ?></li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <form action="/register" method="post">
                    <?= csrf_field() ?>
                    
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Name</label>
                        <input type="text" name="name" class="form-control" value="<?= old('name') ?>" placeholder="Enter your name">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Email address</label>
                        <input type="email" name="email" class="form-control" value="<?= old('email') ?>" placeholder="Enter your email">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter your password">
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold">Confirm Password</label>
                        <input type="password" name="password_confirm" class="form-control" placeholder="Confirm your password">
                    </div>

                    <button type="submit" class="btn btn-primary w-100 py-2 mb-3">Register</button>
                    
                    <p class="text-center mb-0 small">
                        Already have an account? <a href="/login" class="text-primary text-decoration-none fw-bold">Login</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>