<?php   $title = "Gestion";
        ob_start(); ?>

            <?php
                if ($data) {
                    foreach ($data as $user) {
                        if ($user->getRole() == "Utilisateur") {
                            ?>
                            <div class="container-managing">
                              <form id="booking-form2" action="../public/index.php?action=rights" method="POST">
                                <label class="post-input-title"><?= htmlspecialchars($user->getPseudo()) ?></label>
                                <br>
                                <input class="post-input-title" type="hidden" id="pseudo" name="pseudo" value="<?= htmlspecialchars($user->getPseudo()) ?>">
                                <br>
                                <button class="submit" type="submit">Passer Administrateur</button>
                              </form>
                           </div>
                       <?php }
                        else { ?>
                            <div class="container-managing">
                                <label class="post-input-title"><?= htmlspecialchars($user->getPseudo()) ?></label>
                                <br>
                                <p class="managing">Administrateur</p>
                            </div>
                       <?php }
                    }
                }
                $content = ob_get_clean();
                require'layout.php'; ?>