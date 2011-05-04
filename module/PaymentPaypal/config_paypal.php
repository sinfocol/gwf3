<?php
/**
# API user: The user that is identified as making the call. you can
# also use your own API username that you created on PayPal’s sandbox
# or the PayPal live site
*/
#define('PAYPAL_API_USERNAME', 'CBusch1980_api1.gmx.de');

/**
# API_password: The password associated with the API user
# If you are using your own API username, enter the API password that
# was generated by PayPal below
# IMPORTANT - HAVING YOUR API PASSWORD INCLUDED IN THE MANNER IS NOT
# SECURE, AND ITS ONLY BEING SHOWN THIS WAY FOR TESTING PURPOSES
*/

#define('PAYPAL_API_PASSWORD', 'ECL83PUVR4CF2LU3');

/**
# API_Signature:The Signature associated with the API user. which is generated by paypal.
*/

#define('PAYPAL_API_SIGNATURE', 'An5ns1Kso7MWUdW4ErQKJJJ4qi4-AKKoQTrZVr51cIn6b.aMsI-4t2xg');

/**
# Endpoint: this is the server URL which you have to connect for submitting your API request.
*/

#define('PAYPAL_API_ENDPOINT', 'https://api-3t.sandbox.paypal.com/nvp');
/**
USE_PROXY: Set this variable to TRUE to route all the API requests through proxy.
like define('USE_PROXY',TRUE);
*/
#define('PAYPAL_USE_PROXY',FALSE);
/**
PROXY_HOST: Set the host name or the IP address of proxy server.
PROXY_PORT: Set proxy port.

PROXY_HOST and PROXY_PORT will be read only if USE_PROXY is set to TRUE
*/
#define('PAYPAL_PROXY_HOST', '127.0.0.1');
#define('PAYPAL_PROXY_PORT', '808');


/* Define the PayPal URL. This is the URL that the buyer is
   first sent to to authorize payment with their paypal account
   change the URL depending if you are testing on the sandbox
   or going to the live PayPal site
   For the sandbox, the URL is
   https://www.sandbox.paypal.com/webscr&cmd=_express-checkout&token=
   For the live site, the URL is
   https://www.paypal.com/webscr&cmd=_express-checkout&token=
   */
#define('PAYPAL_URL', 'https://www.sandbox.paypal.com/webscr&cmd=_express-checkout&token=');

/*
# Version: this is the API version in the request.
# It is a mandatory parameter for each API request.
# The only supported value at this time is 2.3
*/
//define('VERSION', '51.0');
#define('PAYPAL_VERSION', '2.3');
?>