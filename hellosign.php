<?php require_once 'header.php';  ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Core PHP Demo</title>
</head>
<body>

Hello API Event Received
<pre>
<?php var_dump($_POST); ?>
</pre>
<p>
Hello this is test page for Hellosign API
</p>

<p>
The number of lines in a paragraph depends on the size of the browser window. 
If you resize the browser window, the number of lines in this paragraph will change.
</p>
<script crossorigin src="https://unpkg.com/hellosign-embedded@1/umd/embedded.development.js"></script>
<script type="text/javascript">
    console.log('hello');
    const hellosign = window.HelloSign;
    const CLIENT_ID = '0123456789abcdef0123456789abcdef';
    hellosign.init(CLIENT_ID);
    console.log(hellosign);
    var options = {
    test_mode : 1,
    clientId : CLIENT_ID,
    subject : 'My First embedded signature request',
    message : 'Awesome, right?',
    signers : [
                {
                    email_address : 'surindersingh@ucreate.co.in',
                    name : 'Surinder'
                }
            ],
            files : ['sample-executive.pdf']
        };

    //var output = hellosign.signatureRequest.createEmbedded(options);
    var output = hellosign.signatureRequest.createEmbedded(options)
    .then(function(response){
        console.log(response);
    })
    .catch(function(err){
        console.log(err);
    });

    console.log(output);

</script>
</body>
</html>