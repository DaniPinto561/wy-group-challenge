<?php

$bg_image = get_field('bg_image', 'option'); 

if ($bg_image): ?>
    <div class="row">
        <div id="wrapper-top-image" class="col-12 p-0 wrapper-top-image" style="background-image: url('<?php echo esc_url($bg_image); ?>')">
        </div>
    </div>
<?php else: ?>
    <div class="row">
        <div class="col-12 p-0 wrapper-top-image" style="background-color: #f0f0f0;"> 
        </div>
    </div>
<?php endif; ?>
