<?php $__env->startSection('content'); ?>
    <div class="sidenav">
        <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="/subjects/<?php echo e($subject->subject_id); ?>"><?php echo e($subject->sub_name); ?>(<?php echo e($subject->course_code); ?>)</a><br>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <div class="main">
        <?php if(count($posts) > 0): ?>

            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="well">
                    <h4><a href="/posts/<?php echo e($post->id); ?>"><?php echo e($post->title); ?></a></h4>
                    <h5><?php echo e(str_limit($post->body,100)); ?></h5>
                    <p>Subject: <?php echo e($post->subject->sub_name); ?></p>
                    <small>Posted by <?php echo e($post->user->name); ?> on <?php echo e($post->created_at); ?></small>
                    <br><br>
                </div>    
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <h3> No posts found</h3>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/discussionforum/resources/views/posts/index.blade.php ENDPATH**/ ?>