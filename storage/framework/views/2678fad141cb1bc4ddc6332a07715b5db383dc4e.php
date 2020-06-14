<?php $__env->startSection('content'); ?>

    <div class="post">
    <h2><?php echo e($post->title); ?></h2>
    <?php echo e($post->body); ?>

    <hr><small class='author'>Created by <?php echo e($post->user->name); ?> on <?php echo e($post->created_at); ?></small>
    
    
    <?php if(!Auth::guest()): ?>
        <?php if(Auth::user()->id == $post->user->id): ?>
            <a href="/posts/<?php echo e($post->id); ?>/edit" class="btn btn-default">Edit</a>
        <?php endif; ?>
        <a href='/posts' class="btn btn-default">Go Back</a><br>
    <?php endif; ?>
    <br>
    <h5>Comments</h5>
    <form action="/comments" method="post">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="postid" value="<?php echo e($post->id); ?>">
        <input type="hidden" name="userid" value="<?php echo e(Auth()->user()->id); ?>" >
        <div class="col-md-5">
            <textarea name="comment"  class="form-control" rows="3" cols="45"></textarea><br>
        </div>
        <input type="submit" value="Comment">
    </form>
        <br><br>
        <?php $__currentLoopData = $post->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comments): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($user->id == $comments->user_id): ?>
                    <b><?php echo e($user->name); ?>

                    <?php if($user->role == "faculty"): ?>
                        <img src="https://img.icons8.com/color/15/000000/verified-account.png">
                    <?php endif; ?>
                    &nbsp&nbsp</b>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php echo e($comments->body); ?><br>
            <!-- <a href="/like"><span id="like"></span> <i class="fa fa-thumbs-up" aria-hidden="true" style="color:#3e59de"></i>Like</a> .  -->
            <form id="deleteForm<?php echo e($comments->id); ?>" action="/comments/<?php echo e($comments->id); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo e(method_field('DELETE')); ?>

                <a href="javascript:{}" onclick="document.getElementById('deleteForm<?php echo e($comments->id); ?>').submit(); return false;">Delete</a> . <small><?php echo e($comments->created_at); ?></small><br><br>
            </form>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
    </div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vicky/Documents/discussionforum/resources/views/posts/show.blade.php ENDPATH**/ ?>