<?php

/**

 * Copyright 2011 Facebook, Inc.

 *

 * Licensed under the Apache License, Version 2.0 (the "License"); you may

 * not use this file except in compliance with the License. You may obtain

 * a copy of the License at

 *

 *     http://www.apache.org/licenses/LICENSE-2.0

 *

 * Unless required by applicable law or agreed to in writing, software

 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT

 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the

 * License for the specific language governing permissions and limitations

 * under the License.

 */



require 'src/facebook.php';



// Create our Application instance (replace this with your appId and secret).

$facebook = new Facebook(array(

  'appId'  => '631757580179700',

  'secret' => 'c238405792faa6ea4522105484f96756',

));



// Get User ID

$user = $facebook->getUser();



// We may or may not have this data based on whether the user is logged in.

//

// If we have a $user id here, it means we know the user is logged into

// Facebook, but we don't know if the access token is valid. An access

// token is invalid if the user logged out of Facebook.



if ($user) {

  try {

    // Proceed knowing you have a logged in user who's authenticated.

    $user_profile = $facebook->api('/me');

  } catch (FacebookApiException $e) {

    error_log($e);

    $user = null;

  }

}



// Login or logout url will be needed depending on current user state.

if ($user) {

  $logoutUrl = $facebook->getLogoutUrl();

} else {

  $loginUrl = $facebook->getLoginUrl();

}



// This call will always work since we are fetching public data.





?>

<!doctype html>

<html xmlns:fb="http://www.facebook.com/2008/fbml">

 <head>

    <title>App</title>

 
 

  </head>

  <body>

 



    <?php if ($user): ?>

      <a href="<?php echo $logoutUrl; ?>"></a>

      <?php

       $nameval=$user_profile['name'];

       $first_name=$user_profile['first_name'];

 	$last_name=$user_profile['last_name'];

        $facebook_url=$user_profile['link'];

        $emailval=$user_profile['username'];

        $gender=$user_profile['gender'];

   include_once("home.htm");else: ?>

   

	 

	<a href="<?php echo $loginUrl; ?>">Facebook Login</a>

     

      

    <?php endif ?>



       

  </body>

</html>