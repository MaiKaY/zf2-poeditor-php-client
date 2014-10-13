<?php
/**
 * The MIT License (MIT)
 *
 * Copyright (c) 2014 Maik Schmidt
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 */

return array(
    'PhpClientPoeditor' => array(
        /* just have a look here: https://poeditor.com/api_reference/#Authentication */
        'poeditor' => array(
            'url'        => 'https://poeditor.com/api/',
            'api_token'  => '5983fa49865f929f0e0ef19c2ce7a28f',
            'project_id' => '1',
            /*
             * key (e.g. DE) = poeditor language key
             * value (e.g. de_DE) = project language key
             */
            'languages'  => array(
                'DE' => 'de_DE'
            ),
        )
    )
);
