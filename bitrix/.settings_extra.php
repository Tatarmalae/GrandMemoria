<?php
return array (
    'cache' => array(
      'value' => array (
        'type' => 'memcache',
        'memcache' => array(
         'host' => 'unix:///home/a0520139/tmp/memcached.sock',
         'port' => '0'
       ),
        'sid' => $_SERVER["DOCUMENT_ROOT"]."login"
      ),
   ),
);