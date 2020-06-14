<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card-header"><?php echo e(__('Post Query')); ?></div>

                <div class="card-body">
                    <form method="post" action="/posts">
                        <?php echo csrf_field(); ?>
                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Title')); ?></label>
                            <div class="col-md-7">
                                <input id="title" type="text" class="form-control" name="title" value="<?php echo e(old('title')); ?>" required autofocus autocomplete="name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="body" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Body')); ?></label>
                            <div class="col-md-7">
                                <textarea class="form-control" name="body" required rows="5"><?php echo e(old('body')); ?></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="subject" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Subject')); ?></label>
                            <div class="col-md-7">
                                <select class="form-control" name="subject">
                                    <option value="">--Select Subject--
                                    <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($subject->subject_id); ?>"><?php echo e($subject->sub_name); ?>(<?php echo e($subject->course_code); ?>)
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <input type="submit" class="btn btn-primary col-md-4" value="Post"> &nbsp&nbsp&nbsp&nbsp&nbsp 
                                <input type="reset" class="btn btn-danger col-md-4" value="Reset">  
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/discussionforum/resources/views/posts/create.blade.php ENDPATH**/ ?>