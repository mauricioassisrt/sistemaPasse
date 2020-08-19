<?php
return [
    'driver' => env('MAIL_DRIVER', 'smtp'),
    'host' => env('MAIL_HOST', 'smtp.gmail.com'),
    'port' => env('MAIL_PORT', 587, 465),
    'from' => ['address' => 'evento.tads@gmail.com', 'name' => 'Admin'],
    'encryption' => env('MAIL_ENCRYPTION', 'tls', 'ssl'),
    'username' => env('MAIL_USERNAME', 'evento.tads@gmail.com'),
    'password' => env('MAIL_PASSWORD', 'tads2016'),
    'sendmail' => '/usr/sbin/sendmail -bs',
    'pretend' => false,

];