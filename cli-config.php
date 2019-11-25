<?php
use Doctrine\ORM\Tools\Console\ConsoleRunner;
require_once 'connection_settings.php';

return ConsoleRunner::createHelperSet($entity_manager);
