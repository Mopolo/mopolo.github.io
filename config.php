<?php

return [
    'baseUrl' => '',

    'production' => false,

    'menu' => function ($page, $section) {
        if ((empty($section) && empty($page->getPath()))
            || (str_contains($page->getPath(), $section) && !empty($section))
        ) {
            return 'active';
        }

        return '';
    },

    'collections' => [

        'works' => [],

    ],
];
