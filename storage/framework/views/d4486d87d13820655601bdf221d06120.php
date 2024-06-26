<?php if($errors->any()): ?>

<div class="alert alert-outline-danger fade show p-1 mb-0" role="alert">
    <div class="alert-icon"><i class="flaticon-warning"></i></div>
    <div class="alert-text">
        <ul>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li><?php echo $error; ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
    </div>
    <div class="alert-close">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"><i class="la la-close"></i></span>
        </button>
    </div>
</div>
<br>

<?php endif; ?>

<?php if(session('success')): ?>

<div class="alert alert-outline-success fade show p-1 mb-0" role="alert">
    <div class="alert-icon"><i class="flaticon2-accept"></i></div>
    <div class="alert-text">
        
     <?php echo session('success'); ?>

  
    </div>
    <div class="alert-close">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"><i class="la la-close"></i></span>
        </button>
    </div>
</div>
<br>

<?php endif; ?>


<?php if(session('warning')): ?>

<div class="alert alert-warning fade show p-1 mb-0" role="alert">
    <div class="alert-icon"><i class="flaticon2-accept"></i></div>
    <div class="alert-text">
        
     <?php echo session('warning'); ?>

  
    </div>
    <div class="alert-close">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"><i class="la la-close"></i></span>
        </button>
    </div>
</div>
<br>

<?php endif; ?>

<?php if(session('danger')): ?>

<div class="alert alert-outline-danger fade show p-1 mb-0" role="alert">
    <div class="alert-icon"><i class="flaticon-warning"></i></div>
    <div class="alert-text">
        
     <?php echo session('danger'); ?>

  
    </div>
    <div class="alert-close">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"><i class="la la-close"></i></span>
        </button>
    </div>
</div>
<br>

<?php endif; ?>


<?php if(session('status')): ?>

<div class="alert alert-outline-success fade show p-1 mb-0" role="alert">
    <div class="alert-icon"><i class="flaticon2-accept"></i></div>
    <div class="alert-text">
        
     <?php echo e(session('status')); ?>

  
    </div>
    <div class="alert-close">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"><i class="la la-close"></i></span>
        </button>
    </div>
</div>
<br>
<?php endif; ?>




<?php /**PATH /workspaces/pilates/resources/views/metronic/parts/alerts.blade.php ENDPATH**/ ?>