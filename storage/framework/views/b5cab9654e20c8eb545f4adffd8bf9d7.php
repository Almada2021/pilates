<!DOCTYPE html>
<html>

<head>
    <style>
        .page-break {
            page-break-after: always;
        }
    </style>
    <link href="<?php echo e(public_path('assets/css/itinerary.css')); ?>" rel="stylesheet" type="text/css" />
</head>

<body>

    <div class="title-container">
        <h1>
            <div class="date">
                <?php echo e($useDate); ?>

            </div>
            <?php echo e(mb_convert_encoding($employee['name'], 'UTF-8')); ?>

            <?php echo e(mb_convert_encoding($employee['last_name'], 'UTF-8')); ?>

        </h1>
    </div>
    <table>
        <thead>
            <tr>
                <th>Hora</th>
                <th>Grupo</th>
                <th>Clientes</th>
            </tr>
        </thead>
        <tbody>
            <?php
                usort($itemsEmployee, function ($a, $b) {
                    return strtotime($a['start']) - strtotime($b['start']);
                });
            ?>
            <?php $__currentLoopData = $itemsEmployee; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($item['start']); ?> - <?php echo e($item['end']); ?></td>
                    <td><?php echo e($item['group_name']); ?></td>
                    <td class="special-td">
                        <?php $__currentLoopData = $item['clients']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo e($index + 1); ?>. <?php echo e($client['name']); ?> <?php echo e($client['last_name']); ?><br>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</body>

</html>
<?php /**PATH /home/u238205865/domains/classerp.es/public_html/pilatessg/resources/views/itinerary1.blade.php ENDPATH**/ ?>