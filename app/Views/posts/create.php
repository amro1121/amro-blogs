<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-0">
            <div class="card-body p-4">
                <h3 class="fw-bold mb-4">Create New Post</h3>
                
                <?php if(session()->getFlashdata('errors')): ?>
                    <div class="alert alert-danger">
                        <ul class="mb-0 ps-3">
                            <?php foreach(session()->getFlashdata('errors') as $error): ?>
                                <li><?= esc($error) ?></li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <form action="/posts" method="post" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Title</label>
                        <input type="text" name="title" class="form-control" value="<?= old('title') ?>" placeholder="Enter post title">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Content</label>
                        <textarea name="body" class="form-control" rows="8" placeholder="Write your content here..."><?= old('body') ?></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Featured Image</label>
                        <input type="file" name="featured_image" class="form-control" accept="image/*">
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold">Status</label>
                        <select name="status" class="form-select">
                            <option value="draft" <?= old('status') == 'draft' ? 'selected' : '' ?>>Save as Draft</option>
                            <option value="published" <?= old('status') == 'published' ? 'selected' : '' ?>>Publish Now</option>
                        </select>
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="/dashboard" class="btn btn-light border">Cancel</a>
                        <button type="submit" class="btn btn-primary">Save Post</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>