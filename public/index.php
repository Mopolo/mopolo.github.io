<?php

require __DIR__ . '/../vendor/autoload.php';

echo (new \Mopolo\Cv\Site\PageRenderer($_GET['lang'] ?? 'fr', 'dev'))->renderPage($_GET['page'] ?? 'index');
