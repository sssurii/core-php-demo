<?php require_once 'header.php';
    require_once 'vendor/autoload.php';

    $api_key = getenv('HELLOSIGN_API_KEY');
    $client_id = getenv('HELLOSIGN_CLIENT_ID');

    $client = new HelloSign\Client($api_key);

    $request = new HelloSign\SignatureRequest;
    $request->enableTestMode();
    $request->setTitle('PHP Hello Sign API Integration');
    $request->setSubject('PHP Hello Sign API Integration');
    $request->setMessage('Please sign this for Integration of hellosign API and then we can discuss more.
    Let me know if you have any questions.');
    $request->addSigner('vikram@ucreate.co.in', 'Vicky');
    $request->addFile('/home/ucreate/Downloads/sample-executive.pdf');

    //$response = $client->sendSignatureRequest($request);

    // Turn it into an embedded request
    $embedded_request = new HelloSign\EmbeddedSignatureRequest($request, $client_id);

    // Send it to HelloSign
    $response = $client->createEmbeddedSignatureRequest($embedded_request);

    // Grab the signature ID for the signature page that will be embedded in the
    // page (for the demo, we'll just use the first one)
    $signatures   = $response->getSignatures();
    $signature_id = $signatures[0]->getId();

    // Retrieve the URL to sign the document
    $response = $client->getEmbeddedSignUrl($signature_id);

    // Store it to use with the embedded.js HelloSign.open() call
    $sign_url = $response->getSignUrl();

    header('Content-Type: application/json');
    echo json_encode(['sign_url'=> $sign_url]);
    exit();
