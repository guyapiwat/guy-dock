<?php
$serviceContainer = \Propel\Runtime\Propel::getServiceContainer();
$serviceContainer->checkVersion('2.0.0-dev');
$serviceContainer->setAdapterClass('default', 'mysql');
$manager = new \Propel\Runtime\Connection\ConnectionManagerSingle();
$manager->setConfiguration(array (
  'dsn' => 'mysql:host=p-enterprise.com;port=9100;dbname=cci_db',
  'user' => 'dev',
  'password' => 'dev@cci',
  'settings' =>
  array (
    'charset' => 'tis620',
    'queries' =>
    array (
    ),
  ),
  'classname' => '\\Propel\\Runtime\\Connection\\ConnectionWrapper',
  'model_paths' =>
  array (
    0 => 'src',
    1 => 'vendor',
  ),
));
$manager->setName('default');
$serviceContainer->setConnectionManager('default', $manager);
$serviceContainer->setDefaultDatasource('default');