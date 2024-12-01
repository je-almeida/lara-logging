<?php

use Jeff\LaraLogger\App\Logging\DatabaseLogger;

return [

  'channels' => [

    'database' => [
      'driver' => 'custom',
      'via' => DatabaseLogger::class,
    ],
  ]
];
