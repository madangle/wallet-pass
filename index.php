<?php

use PKPass\PKPass;

require('./vendor/autoload.php');

// Replace the parameters below with the path to your .p12 certificate and the certificate password!
$pass = new PKPass('./DATA/Certificatesboth.p12', '123');

// Pass content
$data = [
  'formatVersion' => 1,
  'passTypeIdentifier' => 'pass.com.sp.evententry', 
  'serialNumber' => '12345678',
  'webServiceURL' => 'https://example.com/passes/',
  'authenticationToken' => 'vxwxd7J8AlNNFPS8k0a0FfUFtq0ewzFdc',
  'teamIdentifier' => 'MS7X7622VQ',
  'organizationName' => 'Chaîne des Rôtisseurs',
  'description' => 'Association Modiale de la Gastronomie',
  'foregroundColor' => 'rgb(33, 37, 41)',
  'backgroundColor' => 'rgb(168, 147, 92)',
  // 'logoText' => 'Association Modiale de la Gastronomie',
  'logoText' => 'Chaîne des Rôtisseurs',
  'generic' => [
    'primaryFields' => [
      [
        'key' => 'member',
        'value' => 'Mr. Dailos RODRIGUEZ'
      ],
    ],
    'secondaryFields' => [
      [
        'key' => 'subtitle',
        'label' => 'Baillliage des Emirats Arabes Unis',
        'value' => '971 250 G1  103503',
      ]
    ],
    'auxiliaryFields' => [
      [
        'key' => 'subtitle1',
        'label' => 'MEMBERSHIP TYPE',
        'value' => 'PREMIUM',
      ],
      [
        'key' => 'subtitle2',
        'label' => 'VALID THRU',
        'value' => 'DEC 2022',
        'textAlignment' => 'PKTextAlignmentRight'
      ]
    ]
  ],
  'locations' => [
    [
      'longitude' => -122.3748889,
      'latitude' => 37.6189722
    ],
    [
      'longitude' => -122.03118,
      'latitude' => 37.33182
    ]
  ],
  'barcode' => [
    'format' => 'PKBarcodeFormatQR',
    'message' => 'https://www.chainedesrotisseurs.com/',
    'messageEncoding' => 'iso-8859-1',
  ]
];


$pass->setData($data);

// Add files to the pass package
$pass->addFile('./assets/icon.png');
$pass->addFile('./assets/icon@2x.png');
$pass->addFile('./assets/logo.png');
// $pass->addFile('./assets/thumbnail.png');
// Create and output the pass
if(!$pass->create(true)) {
    echo 'Error: ' . $pass->getError();
}
