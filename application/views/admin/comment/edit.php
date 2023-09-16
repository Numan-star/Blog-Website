<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Comment</h1>
    </div>
    <form class="text-danger" method="POST" action="<?php echo base_url() . 'blog/editComment/' . $comment['comment_id'] ?>">
        <div class="mb-2">
            <label for="title" class="form-label text-dark">Name *</label>
            <input type="text" placeholder="Name..." name="name" value="<?php echo set_value('name', $comment['name']); ?>" class="form-control">
            <p><?php echo form_error('name'); ?></p>
        </div>
        <div class="mb-1">
            <div>
                <label for="desc" class="form-label text-dark">Comment *</label>
            </div>
            <textarea class="col-sm-6 col-md-12" placeholder="Comment..." name="comment" value="" cols="70" rows="8"><?php echo set_value('comment', $comment['comment']); ?></textarea>
            <p><?php echo form_error('comment'); ?></p>
        </div>
        <div class="mb-2">
            <label for="special" class="form-label text-dark">Special *</label>
            <select name="status" class="form-control">
                <option value="Active" <?php echo ($comment['status'] == 'Active') ? 'selected' : '' ?>>Active</option>
                <option value="Block" <?php echo ($comment['status'] == 'Block') ? 'selected' : '' ?>>Block</option>
            </select>
            <p><?php echo form_error('status'); ?></p>

        </div>
        <div class="mb-3">
            <button type="submit" name="submit" class="btn btn-info">Update</button>
            <a href="<?php echo base_url() . 'blog/commentsView'; ?>" class="btn btn-dark">Cancel</a>
        </div>

    </form>

    <hr>
</main>