<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-md-3">
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-body">
                <h5 class="card-title fw-bold mb-3">Menu</h5>
                <div class="list-group list-group-flush">
                    <a href="/dashboard" class="list-group-item list-group-item-action text-primary fw-bold">Dashboard</a>
                    <a href="#" class="list-group-item list-group-item-action">Create New Post</a>
                    <a href="#" class="list-group-item list-group-item-action">My Posts</a>
                    <a href="#" class="list-group-item list-group-item-action">Edit Profile</a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-9">
        <div class="card shadow-sm border-0">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="mb-0">Dashboard</h2>
                    <a href="#" class="btn btn-primary">Create New Post</a>
                </div>
                
                <p class="fs-5">Welcome back, <strong><?= esc($user['name']) ?></strong>! 👋</p>
                <p class="text-muted">Here's what's happening with your blog.</p>
                
                <div class="row mt-4">
                    <div class="col-sm-3 mb-3">
                        <div class="p-3 border rounded text-center bg-light">
                            <h3 class="fw-bold text-primary mb-0">0</h3>
                            <small class="text-muted">Total Posts</small>
                        </div>
                    </div>
                    <div class="col-sm-3 mb-3">
                        <div class="p-3 border rounded text-center bg-light">
                            <h3 class="fw-bold text-success mb-0">0</h3>
                            <small class="text-muted">Published</small>
                        </div>
                    </div>
                    <div class="col-sm-3 mb-3">
                        <div class="p-3 border rounded text-center bg-light">
                            <h3 class="fw-bold text-warning mb-0">0</h3>
                            <small class="text-muted">Drafts</small>
                        </div>
                    </div>
                    <div class="col-sm-3 mb-3">
                        <div class="p-3 border rounded text-center bg-light">
                            <h3 class="fw-bold text-info mb-0">0</h3>
                            <small class="text-muted">Comments</small>
                        </div>
                    </div>
                </div>
                
                <div class="mt-4">
                    <h4 class="fw-bold">Recent Posts</h4>
                    <p class="text-muted">You haven't created any posts yet.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>