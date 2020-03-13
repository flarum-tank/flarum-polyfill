<?php

/*
 * This file is part of tank/flarum-polyfill.
 *
 * Copyright (c) 2020 Matthew Kilgore.
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Tank\Polyfill;

use Flarum\Extend;
use Flarum\Frontend\Document;
use Psr\Http\Message\ServerRequestInterface as Request;

return [
    (new Extend\Frontend('forum'))
        ->content(function (Document $document, Request $request) {
            $browser = new \Browser();
            if (
                ($browser->getBrowser() == \Browser::BROWSER_FIREFOX && $browser->getVersion() <= 70) ||
                ($browser->getBrowser() == \Browser::BROWSER_CHROME && $browser->getBrowser() <= 77) ||
                ($browser->getBrowser() == \Browser::PLATFORM_CHROME_OS)

            ) {
                $document->head[] = '';
            } else {
                $document->head[] = '<script src="https://polyfill.io/v3/polyfill.min.js"></script>';
            }
        })
];
