<?php

return [
    'baseUrl' => '',
    'production' => false,
    'collections' => [],
    'menu' => function ($page, $section) {
        if ((empty($section) && empty($page->getPath()))
            || (str_contains($page->getPath(), $section) && !empty($section))
        ) {
            return 'active';
        }

        return '';
    },
];
