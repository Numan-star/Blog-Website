<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Blog</h1>
    </div>
    <form class="text-danger" method="POST" action="<?php echo base_url() . 'blog/edit/' . $blog['blog_id'] ?>">
        <div class="mb-2">
            <label for="title" class="form-label text-dark">Title *</label>
            <input type="text" placeholder="Title..." name="title"
                value="<?php echo set_value('title', $blog['title']); ?>" class="form-control">
            <p><?php echo form_error('title'); ?></p>
        </div>
        <div class="mb-1">
            <div>
                <label for="desc" class="form-label text-dark">Description *</label>
            </div>
            <textarea class="col-sm-6 col-md-12" placeholder="Description..." name="desc" value="" cols="70"
                rows="8"><?php echo set_value('desc', $blog['description']); ?></textarea>
            <p><?php echo form_error('desc'); ?></p>
        </div>
        <div class="mb-2">
            <label for="author" class="form-label text-dark">Author *</label>
            <input type="text" placeholder="Author..." name="author"
                value="<?php echo set_value('author', $blog['author']); ?>" class="form-control">
            <p><?php echo form_error('author'); ?></p>

        </div>
        <div class="mb-2">
            <label for="special" class="form-label text-dark">Special *</label>
            <select name="special" class="form-control">
                <option value=" " <?php echo ($blog['special'] == ' ') ? 'selected' : '' ?>>Nill</option>
                <option value="featured" <?php echo ($blog['special'] == 'featured') ? 'selected' : '' ?>>Featured
                </option>
                <option value="promo" <?php echo ($blog['special'] == 'promo') ? 'selected' : '' ?>>Promotional</option>
            </select>
            <p><?php echo form_error('special'); ?></p>

        </div>
        <div class="mb-3">
            <button type="submit" name="blog" value="blog" class="btn btn-info">Update</button>
            <a href="<?php echo base_url() . 'blog'; ?>" class="btn btn-dark">Cancel</a>
        </div>

    </form>

    <hr>
</main>