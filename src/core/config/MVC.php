<?php
return [
    'log_path'  => APP_PATH . '..' . DS . 'storage' . DS . 'log' . DS,
    'storageP'  => APP_PATH . '..' . DS . 'storage' . DS . 'public',
    'route'     => APP_PATH . 'core' . DS . 'routes' . DS,
    'view'      => APP_PATH . 'view' . DS,
    'name'      => 'Wise',
    'version'   => 'v1.0',
    //Session
    'session_path'      => APP_PATH . '..' . DS . 'storage' . DS . 'session',
    'session_prefix'    =>'MVCApp',
    'session_timeout'   => 86400,
    'session_driver'    =>'file',
    //Hash
    'encryption_mode'   => 'AES-128-CBC',
    'encryption_key'    => 'MVC_application',
    'bcrypt_algo'       => PASSWORD_BCRYPT,
];