<?php

$finder = (new PhpCsFixer\Finder())
    ->in(__DIR__) // Tous les fichiers dans le dossier courant et ses sous-dossiers
;

return (new PhpCsFixer\Config())
    ->setRules([
        '@PER-CS2.0' => true, // Normes actuelles à suivre du PHP-FIG
        '@PHP83Migration' => true,
    ])
    ->setFinder($finder)
;