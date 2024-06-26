
<link href="<?php echo e(asset("assets")); ?>/css/ticket.css" rel="stylesheet" type="text/css" />
<div class="container-ticket">
<table class="table-head-ticket">
<tr>

<td  colspan="2" class="tick-head-part0"><img class="logo-ticket" src="<?php echo e(asset("assets/images")); ?>/logo-ticket.jpg"></td>
</tr>
<tr>
<td class="tick-head-part1" colspan="2">
<h1 class="tick-head-part1-name"><?php echo e(($config->name_entity)??"No configurado"); ?></h1>
<p class="tick-head-part1-address"><?php echo e(($config->address)??"No configurado"); ?></p>
<p class="tick-head-part1-address">NIF: <?php echo e(($config->cif)??"No configurado"); ?></p>
</td>
</tr>
<tr>
<td class="tick-head-part2">
<p class="tick-head-part2-date"><?php echo e(date("d-m-Y g:i:s A")); ?></p>
</td>
<td class="tick-head-part2">
<p class="tick-head-part2-num"><?php echo e("NO.".$ticket->id); ?></p>
</td>
</tr>
</table>

<table  cellspacing="0" class="table-detail">

<thead>
<tr>
<th>Concepto</th><th>Unidades</th> <th>Precio</th>
</tr>
</thead>

<tbody>
  
    <?php $__currentLoopData = $productsSale; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
          <td><?php echo e($product->name); ?></td>
          <td><?php echo e($product->cant); ?></td>
          <td colspan="2"><?php echo $product->price; ?></td>
      </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</tbody>

</table>
<div class="div-line"></div>
<table class="tick-table-totals">
<tr><td>Subtotal:</td><td><?php echo $subtotal; ?></td></tr>
<tr><td>Descuento:</td><td>- <?php echo $totalDiscount; ?></td></tr>
<tr><td>IGIC:</td><td><?php echo $totalTaxes; ?></td></tr>
<tr><td>Total a pagar:</td><td><?php echo $totalAmount; ?></td></tr>
</table>
<div class="div-line"></div>
<table class="tick-table-end">
    <tr><td>Empleado:</td><td><?php echo e(auth()->user()->name." ".auth()->user()->last_name); ?></td></tr>
    <tr><td>Cliente:</td><td><?php echo e($sale->name." ".$sale->last_name); ?></td></tr>
</table>
<br>
<h1 class="tanks">GRACIAS POR SU COMPRA</h1>
</div><?php /**PATH /workspaces/pilates/resources/views/ticket/ticket1.blade.php ENDPATH**/ ?>