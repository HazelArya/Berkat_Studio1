<?php

return [
    'is_production' => env('MIDTRANS_IS_PRODUCTION'), // true jika di Production
    'server_key' => env('MIDTRANS_SERVER_KEY'),
    'client_key' => env('MIDTRANS_CLIENT_KEY'),
    'is3ds' => env('MIDTRANS_IS_3DS'),
];
