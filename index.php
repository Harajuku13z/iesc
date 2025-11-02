<?php

/**
 * Redirection vers le dossier public/
 * Ce fichier permet d'accéder au site si le Document Root
 * n'est pas configuré vers le dossier public/
 */

header('Location: public/index.php');
exit;

