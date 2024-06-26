
<?php $__env->startSection('title'); ?> Auditorias <?php $__env->stopSection(); ?>
<?php $__env->startSection('styles_page_vendors'); ?>
<link href="<?php echo e(asset("assets/$theme")); ?>/vendors/general/bootstrap-select/dist/css/bootstrap-select.css" rel="stylesheet" type="text/css">
<link href="<?php echo e(asset("assets/$theme")); ?>/vendors/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
<link href="<?php echo e(asset("assets/$theme")); ?>/vendors/general/toastr/build/toastr.css" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('styles_optional_vendors'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content_breadcrumbs'); ?> 
<?php echo PilatesHelper::getBreadCrumbs([
["route"=>"#","name"=>"Panel de Control"],
["route"=>"#","name"=>"Auditorias (logs)"]
]); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content_page'); ?>
<!-- begin:: Content -->


<div class="kt-portlet kt-portlet--mobile">
<div class="kt-portlet__head kt-portlet__head--lg">
<div class="kt-portlet__head-label">
<span class="kt-portlet__head-icon">
<i class="kt-font-brand flaticon-list"></i>

</span>
<h3 class="kt-portlet__head-title">
Auditorias
</h3>
</div>
<div class="kt-portlet__head-toolbar">
<div class="kt-portlet__head-wrapper">
<div class="kt-portlet__head-actions">




</div>
</div>
</div>
</div>
<div class="kt-portlet__body">
    <form action="<?php echo e(route('audit_download')); ?>" id="form_download" method="POST" autocomplete="off" role="presentation">
        <?php echo csrf_field(); ?>
        <?php echo method_field('post'); ?>
    <div class="text-center">
        <div class="form-group text-center">
        <label for="date-download" style="display:block;">Fecha  de auditoria</label>
        <input class="form-control text-center w-50 m-auto"  style="display:block;" type="date" name="date" id="date-download"  value="<?php echo e(old('date')); ?>">
        </div>
        <div class="form-group">
        <button type="submit" class="btn btn-primary">Descargar</button>
        </div>
    </div>
    </form>

<input type="hidden" name="_token" id="token_ajax" value="<?php echo e(Session::token()); ?>">
</div>
</div>
<!-- end:: Content -->

<?php $__env->stopSection(); ?>



<?php $__env->startSection('js_page_vendors'); ?>
<script src="<?php echo e(asset("assets/$theme")); ?>/vendors/general/block-ui/jquery.blockUI.js" type="text/javascript"></script>
<script src="<?php echo e(asset("assets/$theme")); ?>/vendors/general/bootstrap-select/dist/js/bootstrap-select.js" type="text/javascript"></script>
<script src="<?php echo e(asset("assets/$theme")); ?>/vendors/custom/datatables/datatables.bundle.js" type="text/javascript"></script>
<script src="<?php echo e(asset("assets/$theme")); ?>/vendors/general/toastr/build/toastr.min.js" type="text/javascript"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js_optional_vendors'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('js_page_scripts'); ?>

<script src="<?php echo e(asset("assets")); ?>/js/page-audit.js" type="text/javascript"></script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make("$theme/layout", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u238205865/domains/classerp.es/public_html/pilatessg/resources/views/audit.blade.php ENDPATH**/ ?>