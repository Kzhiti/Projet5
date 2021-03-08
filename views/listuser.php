<?php   $title = "Gestion";
        ob_start(); ?>

            <?php
                if ($data) {
                    foreach ($data as $post) {
                        if ($post['role'] == "Utilisateur") { ?>
                            <div class="container-managing">
                              <form id="booking-form2" action="../public/index.php?action=rights" method="POST">
                                <input class="post-input-title" type="text" id="pseudo" name="pseudo" value="<?= $post['pseudo'] ?>">
                                <br>
                                <button class="submit" type="submit">Passer Administrateur</button>
                              </form>
                           </div>
                       <?php }
                        else { ?>
                            <div class="container-managing">
                                <form id="booking-form2" action="" method="POST">
                                    <input class="post-input-title" type="text" id="pseudo" name="pseudo" value="<?= $post['pseudo'] ?>">
                                    <br>
                                    <p class="managing">Administrateur</p>
                                </form>
                            </div>
                       <?php }
                    }
                }
                $content = ob_get_clean();
                require'layout.php'; ?>