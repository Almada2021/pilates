
	<!-- begin:: Content -->
	<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
		<?php echo $__env->make("$theme/parts/alerts", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<div id="alerts-ajax" class="none-empty"></div>
		<?php echo $__env->yieldContent('content_page'); ?>
	</div>
	<!-- end:: Content -->
</div><?php /**PATH /home/u238205865/domains/classerp.es/public_html/pilatessg/resources/views/metronic/parts/content.blade.php ENDPATH**/ ?>