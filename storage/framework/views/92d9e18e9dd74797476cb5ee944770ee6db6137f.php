<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Today's Appointment</div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>
                    
                    <?php if(count($appointments['appointments']) <= 0): ?>
                        No Appointment
                    
                    <?php else: ?>
                        <table>
                            <tr>
                                <?php if($role == 'doctor'): ?>
                                <th> Patient Name</th>
                                <?php else: ?>
                                <th>Doctor Name</th>
                                <?php endif; ?>
                                <th> Date </th>
                                <th> Slot </th>
                            </tr>
                            <?php $__currentLoopData = $appointments['appointments']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $appointment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <tr>
                                <!-- <input type="hidden" name="appointments[]" value="<?php echo e(serialize($appointment)); ?>"> -->
                                    <td><?php echo e($appointment->name); ?></td>
                                    <td><?php echo e($appointment->appointmentDate); ?></td>
                                    <td><?php echo e($appointment->slot); ?>

                                </tr> 

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </table>


                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/calendly/resources/views/home.blade.php ENDPATH**/ ?>