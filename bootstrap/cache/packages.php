<?php return array (
  'fideloper/proxy' => 
  array (
    'providers' => 
    array (
      0 => 'Fideloper\\Proxy\\TrustedProxyServiceProvider',
    ),
  ),
  'khill/lavacharts' => 
  array (
    'providers' => 
    array (
      0 => 'Khill\\Lavacharts\\Laravel\\LavachartsServiceProvider',
    ),
    'aliases' => 
    array (
      'Lava' => 'Khill\\Lavacharts\\Laravel\\LavachartsFacade',
    ),
  ),
  'laravel/tinker' => 
  array (
    'providers' => 
    array (
      0 => 'Laravel\\Tinker\\TinkerServiceProvider',
    ),
  ),
  'nesbot/carbon' => 
  array (
    'providers' => 
    array (
      0 => 'Carbon\\Laravel\\ServiceProvider',
    ),
  ),
);