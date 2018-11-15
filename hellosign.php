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
<button class="sign-document" id = "sign_document"> Sign now</button>

<p>
The number of lines in a paragraph depends on the size of the browser window. 
If you resize the browser window, the number of lines in this paragraph will change.
</p>
<script crossorigin src="https://unpkg.com/hellosign-embedded@1/umd/embedded.development.js"></script>
<script crossorigin src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
<script type="text/javascript">
  
    $('#sign_document').on('click', function(){
        $.ajax({
               //http://localhost/core-php-demo/signed-url.php',
               url:'/signed-url.php',
               type:'POST',
               data:{'filename':'Hello file name', 'email':'surindersingh@gmail.com', 'name':'Surinder singh'},
               success:function(response){
                    console.log(response.sign_url);
                    sign_url = response.sign_url
                    openSignFrame(sign_url);
               },
               error:function(xhr, status, error){
                    console.log(status);
               },
               complete:function(){
                console.log('request complete');
               }

            });
    });

    function openSignFrame(sign_url){
        HelloSign.init("<?php echo getenv('HELLOSIGN_CLIENT_ID'); ?>");
        HelloSign.open({
            url: sign_url,
            uxVersion: 2,
            allowCancel: true,
            skipDomainVerification:true,
            messageListener: function(eventData) {
                // do something
            }
        });
    }
</script>
</body>
</html>