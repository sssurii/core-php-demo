var http = require('http');
var Router = require('node-router');
var router = Router();    // create a new Router instance
var route = router.push;


route('/get_sign_url', function(req,res){
  // Initialize using api key
var hellosign = require('hellosign-sdk')({key: '5bb5d43a97c8d7f6561ad7f30a7c76ea09fdd0b8a8d24eb0af59d7fb7343c8b1'});

var options = {
  test_mode : 1,
  clientId : '17aa539b6a8f89b38d7b59a0ccfa41ba',
  title : 'Hello Sign API Integration',
    subject : 'Hello Sign API Integration',
    message : 'Please sign this for Integration of hellosign API and then we can discuss more. Let me know if you have any questions.',
    signers : [
          {
            email_address : 'surindersingh+hellosign1@gmail.com',
            name : 'Dev',
            order : 0,
          }
        ],
    files : ['/home/ucreate/Downloads/sample-executive.pdf']
};

hellosign.signatureRequest.createEmbedded(options)
    .then(function(response){
        var signatureId = response.signature_request.signatures[0].signature_id;
        return hellosign.embedded.getSignUrl(signatureId);
    })
    .then(function(response){
        console.log('URL = ' + response.embedded.sign_url);
    })
    .catch(function(err){
        //catch error
    });
});

var server = http.createServer(router).listen(8080);