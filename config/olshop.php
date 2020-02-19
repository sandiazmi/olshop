<?php

return [
    'pagination' => env('PAGINATION_PER_PAGE') ?? 15,

    // pagination for homepage
    'front_pagination' => env('FRONT_PAGINATION_PER_PAGE') ?? 12
];
