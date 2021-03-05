<?php   $title = "Gestion";
ob_start(); ?>
<div class="container-managing">
    <div class="booking-content">
        <a class="managing" href="../public/index.php?action=listuser">Gérer les utilisateurs</a>
        <a class="managing" href="../public/index.php?action=listcomment">Gérer les commentaires</a>
    </div>
</div>
<?php $content = ob_get_clean();
require'layout.php'; ?>
