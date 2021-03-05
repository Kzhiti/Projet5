<?php   $title = "Article";
        ob_start(); ?>
    <div class="container">
        <div class="booking-content">
            <div class="booking-form2">

            </div>
        </div>
    </div>
<?php $content = ob_get_clean();
    require'layout.php'; ?>
