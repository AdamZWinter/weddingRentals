<?php 
//Domain:
//Put here whatever will resolve to your webroot (ex.  https://example.com OR http://www.example.com)
//do not include the trailing slash
//Some parts of this site, like email verification, will link to https://example.com
$webRoot = 'https://orange.topsecondhost.com';

//For Database
class databaseConfig {

    private String $dbserver='mariadb';
    private String $database='*******replace************';
    private String $dbuser='*******replace************'; 
    private String $userpw='*******replace************';

    public function getServer(){return $this->dbserver;}
    public function getDatabase(){return $this->database;}
    public function getUser(){return $this->dbuser;}
    public function getPassword(){return $this->userpw;}
}


 
//Custom Error Logging file 
//This is not used anywhere by default 
//By default only the standard PHP error log file is used 
$logFile='/var/www/logs/phperrors.log'; 

 
//Toggle debugging on and off here only
//Toggling this on (TRUE) will display Obj on the pages to users.
//Be careful using this, and make sure Obj does not have sensitive info in it 
$debugging = FALSE; 

//Sitename: for display purposes.
//This is used in Title and upper left home button of the header 
$sitename='Walnut Ridge Wedding Signs'; 




//__________FOR SENDING EMAILS WITH PHPMailer_______________________________________

//For PHP Mailer Class 
$usernameSmtp = 'noreply'; 
$passwordSmtp = '*******replace************'; 


// Replace sender@example.com with your NoReply "From" address.
$noreply = 'noreply@topsecondhost.com';
$noreplyName = 'No Reply';

// If you're using Amazon SES in a region other than US West (Oregon),
// replace email-smtp.us-west-2.amazonaws.com with the Amazon SES SMTP
// endpoint in the appropriate region.
$mailserverhost = '10.0.0.6';
$mailserverport = 25;
$mailauth = false;


// (OPTIONAL) Specify a configuration set. If you do not want to use a configuration
// set, comment or remove the next line.
//$configurationSet = 'ConfigSet';



 //_____________For Oauth APIs ______________________________________________ 

 //Google API 
$client_id='clietid'; 
$client_secret='apikey'; 
$redirect_uri='https://topsecondhost.com/example/redirect.php'; 


 //Paypal: 
//Comment out the id and secret that you are not using (sandbox or live). 

 //$ppEndpoint = 'https://api.sandbox.paypal.com'; 
$ppEndpoint = 'https://api.paypal.com'; 

 //Paypal Sandbox only 
//$paypalid='longstringofcharacters'; 
//$paypalsecret='longstringofcharacters'; 

 //Paypal Live 
$paypalid='longstringofcharacters'; 
$paypalsecret='longstringofcharacters'; 

 ?>