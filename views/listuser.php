<?php   $title = "Gestion";
        ob_start(); ?>

            <?php
                if ($data) {
                    foreach ($data as $user) {
                        if ($user->getRole() == "Utilisateur") {
                            ?>
                            <div class="container-managing">
                              <form id="booking-form2" action="../public/index.php?action=rights" method="POST">
                                <input class="post-input-title" type="text" id="pseudo" name="pseudo" value="<?= htmlspecialchars($user->getPseudo()) ?>">
                                <br>
                                <button class="submit" type="submit">Passer Administrateur</button>
                              </form>
                           </div>
                       <?php }
                        else { ?>
                            <div class="container-managing">
                                <input class="post-input-title" type="text" id="pseudo" name="pseudo" value="<?= htmlspecialchars($user->getPseudo()) ?>">
                                <br>
                                <p class="managing">Administrateur</p>
                            </div>
                       <?php }
                    }
                }
                $content = ob_get_clean();
                require'layout.php'; ?>