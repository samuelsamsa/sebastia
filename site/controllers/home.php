<?php
return function ($kirby, $site, $page) {
    
    // AJAX request for a stone
    if ($slug = get('stone')) {
        if ($entry = page('entries/' . $slug)) {
            echo snippet('entry-card', ['page' => $entry], true);
            exit;
        } else {
            http_response_code(404);
            echo 'Stone not found';
            exit;
        }
    }

    // Normal controller logic
    return [
        // Any variables needed for the main mosaic page
    ];
};
