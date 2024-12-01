<?php

namespace Jeff\LaraLogger\App\Logging;

use Jeff\LaraLogger\App\Models\LogModel;
use Monolog\Logger;

class DatabaseLogger
{
  public function __invoke(array $config): Logger
  {
    $logger = new Logger('database_logger');
    $logger->pushHandler(new class extends \Monolog\Handler\AbstractProcessingHandler {
      protected function write($record): void
      {
        LogModel::create([
          'level' => $record['level_name'],
          'message' => $record['message'],
          'context' => json_encode($record['context']),
        ]);
      }
    });
    return $logger;
  }
}
