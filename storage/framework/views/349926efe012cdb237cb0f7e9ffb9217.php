
<?php $__env->startSection('title'); ?> Panel de Control <?php $__env->stopSection(); ?>
<?php $__env->startSection('styles_page_vendors'); ?>
<link href="<?php echo e(asset("assets/$theme")); ?>/vendors/general/bootstrap-select/dist/css/bootstrap-select.css" rel="stylesheet" type="text/css">
<link href="<?php echo e(asset("assets/$theme")); ?>/vendors/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
<link href="<?php echo e(asset("assets/$theme")); ?>/vendors/general/toastr/build/toastr.css" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('styles_optional_vendors'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content_breadcrumbs'); ?> 
<?php echo PilatesHelper::getBreadCrumbs([
["route"=>"#","name"=>"Gestion de Tablas"],
["route"=>route('management_employee'),"name"=>"Empleados"],
["route"=>'#',"name"=>"Editar"]
]); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content_page'); ?>
    		<!-- begin:: Content -->
         
            <form action="<?php echo e(route('management_employee_update',['id' => $employee->id])); ?>"  method="POST" autocomplete="off"  enctype="multipart/form-data" >
                <?php echo csrf_field(); ?>
                <?php echo method_field('put'); ?>
                    <div class="kt-portlet kt-portlet--mobile">
                        <div class="kt-portlet__head kt-portlet__head--lg">
                            <div class="kt-portlet__head-label">
                                <span class="kt-portlet__head-icon">
                                <button type="button" onclick="window.location.href='<?php echo e(route('management_employee')); ?>'" class="btn btn-outline-brand btn-icon"><i class="flaticon-reply"></i></button>
                                </span>
                                <h3 class="kt-portlet__head-title">
                                    Editar Empleado
                                </h3>
                            </div>
                            <div class="kt-portlet__head-toolbar">
                                <div class="kt-portlet__head-wrapper">
                                    <div class="kt-portlet__head-actions">
                                        <div class="dropdown dropdown-inline">
                                            <button type="button" class="btn btn-default btn-icon-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="la la-download"></i> Acciones
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <ul class="kt-nav">
                                                    <li class="kt-nav__section kt-nav__section--first">
                                                        <span class="kt-nav__section-text">Elige una opción</span>
                                                    </li>
                                            
                                                    <li class="kt-nav__item">
                                                        <a href="#" onclick="deleteEmployee(<?php echo e($employee->id); ?>)" id="btn-delete-employees" class="kt-nav__link">
                                                            <i class="kt-nav__link-icon fa fa-user-minus"></i>
                                                            <span class="kt-nav__link-text">Eliminar empleado</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        &nbsp;
                                        <button class="btn btn-brand btn-elevate btn-icon-sm" type="submit">
                                            <i class="fa fa-save"></i>
                                            Actualizar Empleado
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="kt-portlet__body">
                            <div> <button type="button" class="btn btn-sm btn-primary btn-brand--icon my-2" onclick="showHiddenFieldsEdit(this)">Editar campos protegidos</button></div>
                           
                            <div class="row">
                                    <div class="col-12 d-flex justify-content-center align-items-center">

                                            <label for="img-change"  data-toggle="kt-tooltip" data-placement="top" title="" data-original-title="Clic para cambiar">
                                            <img id="img-change-profile" class="picture-profile" src="<?php echo e((empty($employee->picture))? asset("assets/images/user_default.png") : Storage::url("images/profiles/".$employee->picture)); ?>"  />                 
                                            </label>
                                                            
                                            <input type='file' id="img-change" style="display:none" name="picture_upload" accept="image/*"/>
                                            <br>
                                            
                                    </div>
                                <div class="col-6">
                                     <div class="form-group">
                                             <label for="id_rol">Rol *</label>
                                             <select name="id_rol" class="form-control text-capitalize" id="id_rol" required>
                                             <option class="text-capitalize" value=""<?php echo e(old('id_rol')?'':'selected'); ?>  disabled>Seleccionar Rol</option>
                                                 <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $rol): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                             <option class="text-capitalize" value="<?php echo e($key); ?>" <?php echo e(old('id_rol',$employee->id_rol ??'')? ($key==old('id_rol',$employee->id_rol ?? ''))? 'selected':'' :''); ?>><?php echo e($rol); ?></option>
                                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                     
                                             </select>
                                     </div>
                                     <div class="form-group">
                                         <label for="recipient-name" class="form-control-label">Nombre *</label>
                                         <input type="text" name="name" class="form-control" id="recipient-name"  value="<?php echo e(old('name',$employee->name ?? '')); ?>"  required>
                                     </div>
                                     <div class="form-group">
                                             <label for="recipient-last-name" class="form-control-label">Apellidos *</label>
                                             <input type="text" name="last_name" class="form-control" id="recipient-last-name"  value="<?php echo e(old('last_name',$employee->last_name ??'')); ?>"  required>
                                     </div>
                                     <div class="form-group">
                                             <label for="recipient-email" class="form-control-label">Email *</label>
                                             <input type="email" name="email" class="form-control" id="recipient-email"  value="<?php echo e(old('email',$employee->email ??'')); ?>"  required>
                                     </div>
                                 
                                     <div class="form-group">
                                             <label for="recipient-password" class="form-control-label">Contraseña *</label>
                                             <input type="password" name="password" class="form-control" id="recipient-password"  value="<?php echo e(old('password')); ?>"  >
                                     </div>
                                     <div class="form-group">
                                             <label for="recipient-re-password" class="form-control-label">Confirmar Contraseña *</label>
                                             <input type="password" name="password_confirmation" class="form-control" id="recipient-re-password"  value="<?php echo e(old('password_confirmation')); ?>"  >
                                     </div>
                                
                                </div>
                                <div class="col-6">
                                     <div class="form-group">
                                             <label class="">Sexo</label>
                                             <div class="kt-radio-inline d-flex justify-content-center p-2">
                                                 <label class="kt-radio kt-radio--solid">
                                                     <input type="radio" name="sex" value="male" <?php echo e(old('sex',$employee->sex ??'male')? (old('sex',$employee->sex ??'male')=='male')? 'checked' :'' : 'checked'); ?>> Masculino
                                                     <span></span>
                                                 </label>
                                                 <label class="kt-radio kt-radio--solid">
                                                     <input type="radio" name="sex" value="fmale" <?php echo e(old('sex',$employee->sex ??'male')? (old('sex',$employee->sex ??'male')=='fmale')? 'checked' :'' : ''); ?>> Femenino
                                                     <span></span>
                                                 </label>
                                             </div>
                                     
                                     </div>
                                     <div class="form-group">
                                             <label for="recipient-date-of-birth" class="form-control-label">Fecha de Nacimiento *</label>
                                             <input type="date" name="date_of_birth" class="form-control" id="recipient-date-of-birth"  value="<?php echo e(old('date_of_birth',$employee->date_of_birth2 ??'')); ?>" required >
                                     </div>
                                     <div class="form-group"  id="recipient-dni-edit-container">
                                             <label for="recipient-dni" class="form-control-label">Dni</label>
                                             <input type="text" name="dni" class="form-control" id="recipient-dni"  value="<?php echo e(old('dni',$employee->dni ??'')); ?>" >
                                     </div>
                                     <div class="form-group" id="recipient-address-edit-container">
                                             <label for="recipient-address" class="form-control-label">Dirección</label>
                                             <input type="text" name="address" class="form-control" id="recipient-address"  value="<?php echo e(old('address',$employee->address ??'')); ?>" >
                                     </div>
                                     <div class="form-group" id="recipient-tel-edit-container">
                                             <label for="recipient-tel" class="form-control-label">Teléfono</label>
                                             <input type="tel" name="tel" class="form-control" id="recipient-tel"  value="<?php echo e(old('tel',$employee->tel ??'')); ?>" >
                                     </div>
                 
                         
                                     <div class="form-group">
                                             <label class="">Status</label>
                                             <div class="kt-radio-inline d-flex justify-content-center p-2">
                                                 <label class="kt-radio kt-radio--solid">
                                                     <input type="radio" name="status" value="enable" <?php echo e(old('status',$employee->status ?? 'enable')? (old('status',$employee->status ?? 'enable')=='enable')? 'checked' :'' : 'checked'); ?>> Activo
                                                     <span></span>
                                                 </label>
                                                 <label class="kt-radio kt-radio--solid">
                                                     <input type="radio" name="status" value="disable" <?php echo e(old('status',$employee->status ?? 'enable')? (old('status',$employee->status ?? 'enable')=='disable')? 'checked' :'' : 'checked'); ?>> Inactivo
                                                     <span></span>
                                                 </label>
                                             </div>
                                     
                                     </div>
                               
                                </div>
                 
                                <div class="col-12">
                                     <div class="form-group form-group-last">
                                             <label for="observation">Observaciones</label>
                                             <textarea class="form-control" name="observation" id="observation" rows="3" style="margin-top: 0px; margin-bottom: 0px; height: 137px;"><?php echo e(old('observation',$employee->observation ?? '')); ?></textarea>
                                         </div>
                                 </div>
                 
                             </div>

                        </div>
                    </div>

                </form>

                    <!--start: Modal Delete Employee -->
<div class="modal fade" id="modal_delete_employee" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
    <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Eliminar Empleado</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    </button>
    </div>
    <form action="<?php echo e(route('management_employee_delete')); ?>"  method="POST" autocomplete="off">
    <?php echo csrf_field(); ?>
    <?php echo method_field('delete'); ?>
    
    <input type="hidden" name="id[]" value="" id="id_delete_employee">
    
    <div class="modal-body">
    <h1 class="text-uppercase text-center">  <i class="flaticon-danger text-danger display-3"></i> <br> Realmente desea eliminar a este empelado</h1>
    </div>
    <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
    <button type="submit" class="btn btn-primary">Eliminar</button>
    </div>
    </form>
    </div>
    </div>
    </div>
    <!--end: Modal Delete Employee -->
                
<input type="hidden" name="_token" id="token_ajax" value="<?php echo e(Session::token()); ?>">
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
<script src="<?php echo e(asset("assets")); ?>/js/page-management-employee.js" type="text/javascript"></script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make("$theme/layout", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u238205865/domains/classerp.es/public_html/pilatessg/resources/views/edit_employee.blade.php ENDPATH**/ ?>