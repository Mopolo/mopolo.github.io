<?php

use Carbon\Carbon;

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

    'getWorks' => function ($page, $works, $experience) {
        return $works
            ->filter(function ($work) use ($experience) {
                return $work->experience === $experience;
            })
            ->reverse();
    },

    'period' => function($page, $start, $end) {
        if (empty($start) || empty($end)) {
            return '';
        }

        $start = Carbon::parse($start)->format('F Y');

        $end = $end === 'now'
            ? 'Now'
            : Carbon::parse($end)->format('F Y');

        return "$start &mdash; $end";
    },

    'collections' => [

        'experiences' => [],

        'works' => [],

        'projects' => [],

    ],
];
