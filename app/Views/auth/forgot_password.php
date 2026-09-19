<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-md-6 col-lg-5">
        <div class="card shadow-sm border-0">
            <div class="card-body p-5">
                <h2 class="text-center mb-1">Forgot Password?</h2>
                <p class="text-center text-muted mb-4">Enter your email to reset your password</p>

                <?php if(session()->getFlashdata('success')): ?>
                    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
                <?php endif; ?>

                <?php if(session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
                <?php endif; ?>

                <form action="/forgot-password" method="post">
                    <?= csrf_field() ?>
                    
                    <div class="mb-4">
                        <label class="form-label fw-semibold">Email address</label>
                        <input type="email" name="email" class="form-control" value="<?= old('email') ?>" placeholder="Enter your email">
                    </div>

                    <button type="submit" class="btn btn-primary w-100 py-2 mb-3">Send Reset Link</button>
                    
                    <p class="text-center mb-0 small">
                        Remembered your password? <a href="/login" class="text-primary text-decoration-none fw-bold">Login</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>