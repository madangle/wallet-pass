<?php

use PKPass\PKPass;

require('./vendor/autoload.php');

// Replace the parameters below with the path to your .p12 certificate and the certificate password!
$pass = new PKPass('./DATA/Certificatesboth.p12', '123');

// Pass content
$data = [
    'description' => 'RISHIKESH KRISHNAN TEST PASS',
    'formatVersion' => 1,
    'organizationName' => 'Flight Express V2',
    'passTypeIdentifier' => 'pass.com.sp.evententry', // Change this!
    'serialNumber' => '12345678',
    'teamIdentifier' => 'MS7X7622VQ', // Change this!
    'boardingPass' => [
        'primaryFields' => [
            [
                'key' => 'origin',
                'label' => 'San Francisco',
                'value' => 'SFO',
            ],
            [
                'key' => 'destination',
                'label' => 'London',
                'value' => 'LHR',
            ],
        ],
        'secondaryFields' => [
            [
                'key' => 'gate',
                'label' => 'Gate',
                'value' => 'F12',
            ],
            [
                'key' => 'date',
                'label' => 'Departure date',
                'value' => '07/11/2012 10:22',
            ],
        ],
        'backFields' => [
            [
                'key' => 'passenger-name',
                'label' => 'Passenger',
                'value' => 'John Appleseed',
            ],
        ],
        'transitType' => 'PKTransitTypeAir',
    ],
    'barcode' => [
        'format' => 'PKBarcodeFormatQR',
        'message' => 'Flight-GateF12-ID6643679AH7B',
        'messageEncoding' => 'iso-8859-1',
    ],
    'backgroundColor' => 'rgb(32,110,247)',
    'logoText' => 'Flight info',
    'relevantDate' => date('Y-m-d\TH:i:sP')
];
$pass->setData($data);

// Add files to the pass package
$pass->addFile('./examples/images/icon.png');
$pass->addFile('./examples/images/icon@2x.png');
$pass->addFile('./examples/images/logo.png');

// Create and output the pass
if(!$pass->create(true)) {
    echo 'Error: ' . $pass->getError();
}
