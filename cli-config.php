<?php 

use Doctrine\ORM\Tools\Console\ConsoleRunner;
use DoctrineORMModule\Options\EntityManager;

// replace with file to your own project bootstrap
require_once 'vendor\autoload.php';

// replace with mechanism to retrieve EntityManager in your app
$entityManager = new EntityManager();

return ConsoleRunner::createHelperSet($entityManager);
