<?php

return [
    # Define your application mode here
    'mode' => 'sandbox',

    # Account credentials from developer portal
    'account' => [
        'client_id' => env('AYCmQm7DppajlbqHFwEi5sYBxsdmJkETwzXI1Q8-TejL_RH0_CRX-WMuKz-l6o5WyApKy0gPQ5TJ2U0I', ''),
        'client_secret' => env('ENgHdDb3XZZKEvH7LHR8-uefnMkoh0YsNjYxVMR_mnZqsKUIgI-mAEs_sPiPevjuzFLfIryi2_j2uEe5', ''),
    ],

    # Connection Information
    'http' => [
        'connection_time_out' => 30,
        'retry' => 1,
    ],

    # Logging Information
    'log' => [
        'log_enabled' => true,

        # When using a relative path, the log file is created
        # relative to the .php file that is the entry point
        # for this request. You can also provide an absolute
        # path here
        'file_name' => '../PayPal.log',

        # Logging level can be one of FINE, INFO, WARN or ERROR
        # Logging is most verbose in the 'FINE' level and
        # decreases as you proceed towards ERROR
        'log_level' => 'FINE',
    ],
];
