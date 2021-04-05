<?php
$response = [
    'res'               => false,
    'licenseId'         => '',
    'quantityLicense'   => ''
];

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $licenceId = trim($_POST['license']);
    $quantityLicense = trim($_POST['quantity']);

    if($licenceId || $quantityLicense){
        $response['res'] = true;
        $response['licenseId'] = $licenceId;
        $response['quantityLicense'] = $quantityLicense;
    }
}

echo json_encode($response);
