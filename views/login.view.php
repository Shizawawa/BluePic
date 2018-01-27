<?php
//session_start();
require 'php-graph-sdk/src/Facebook/autoload.php'; ?>
<!DOCTYPE HTML>
<html>
<head>
    <title></title>
</head>
<body>
<div id="fb-root"></div>
<script>
    window.fbAsyncInit = function() {
        FB.init({
            appId      : <?php echo APP_ID; ?>,
            cookie     : true,
            xfbml      : true,
            version    : 'v2.10'
        });
        FB.AppEvents.logPageView();

        FB.getLoginStatus(function(response) {
            statusChangeCallback(response);
        });
    };
    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk/debug.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

    function testAPI() {
        console.log('Welcome!  Fetching your information.... ');
        FB.api('/me', function(response) {
            console.log('Successful login for: ' + response.name);
            document.getElementById('status').innerHTML =
                'Thanks for logging in, ' + response.name + '!';
        });
    }
    function checkLoginState() {
        FB.getLoginStatus(function(response) {
            statusChangeCallback(response);
        });
    }
    function statusChangeCallback(response) {
        console.log('statusChangeCallback');
        console.log(response);
        // The response object is returned with a status field that lets the
        // app know the current login status of the person.
        // Full docs on the response object can be found in the documentation
        // for FB.getLoginStatus().
        if (response.status === 'connected') {
            // Logged into your app and Facebook.
            accessToken = response.authResponse.accessToken;
            //document.location = 'http://facebook.dev/Index/fbcallback/accessToken='+accessToken;

            //testAPI();
        } else {
            // The person is not logged into your app or we are unable to tell.
            document.getElementById('status').innerHTML = 'Please log ' +
                'into this app.';
        }
    }
</script>
<?php
/*if(isset($POST['msg'])){
    $linkData = ['message'=>$_POST['msg']];
    $fb->post('/me/feed',$message);
}
*/?>
<!--form method="POST">
  <input type="text" placeholder="" name="msg" />
  <input type="submit" value="envoyer" />
</form-->
<!-- /
Verifier que le token existe et qu'il soit valide
Si ce n'est pas le cas affichez le bouton de connexion
Sinon affichez l'email de l'internaute
*/ -->
<?php
//   $fb = new Facebook\Facebook([
//   'app_id' => '153602711910635', // Replace {app-id} with your app id
//   'app_secret' => '4e247d8aea6b756f050003e9687b14a9',
//   'default_graph_version' => 'v2.2',
//   ]);
//
//
// //echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';
// if(checkToken() == '1' ){
//   $fb->setDefaultAccessToken($_SESSION['fb_access_token']);
//   $response = $fb->get('/me?fields=albums{photos{picture},name}');
//   $albums = $response->getDecodedBody();
//   echo '<pre>';
//   foreach($albums['albums']['data'] as $toto){
//     echo $toto["name"];
//     foreach ($toto['photos']['data'] as  $photo) {
//       echo "<img src='".$photo['picture']."'>";
//     }
//   }
// }else{
//   $helper = $fb->getRedirectLoginHelper();
//   $permissions = ['email','user_photos'];
//
//   $loginUrl = $helper->getLoginUrl('http://www.elomaridouae.com/callback', $permissions);
//
//   echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';
// }
// function checkToken()
// {
//   if(empty($_SESSION['fb_access_token'])){
//     return false;
//   }
//   $url = "https://graph.facebook.com/debug_token?input_token=".$_SESSION['fb_access_token'].
//   "&access_token=153602711910635|4e247d8aea6b756f050003e9687b14a9";
//   $page = json_decode(file_get_contents($url));
//   $result = $page->data->is_valid;
//   if( !$result) unset($_SESSION['fb_access_token']);
//
//   return $result;
// }
?>
<section>
    <div class="fb-root"></div>

    <div id="particles-js"></div>
    <div class="account-wall">
        <img class="profile-img" src="/assets/img/logo.png"
             alt="">
        <br /><br / /><br />

        <?php $fb = new Facebook\Facebook([
            'app_id' => APP_ID, // Replace {app-id} with your app id
            'app_secret' => APP_SECRET,
            'default_graph_version' => 'v2.2',
        ]);

        $helper = $fb->getRedirectLoginHelper();

        $permissions = ['email']; // Optional permissions
        $loginUrl = $helper->getLoginUrl('http://facebook.dev/Index/fbcallback/', $permissions);

        echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';?>
        <!--<div class="fb-login-button"
             style ="margin-left: 21%;"
             data-max-rows="1" data-size="large"
             data-scope="public_profile,email,user_photos"
             data-button-type="login_with" data-show-faces="false"
             data-auto-logout-link="false" data-use-continue-as="false"></div>-->


    </div>

    <div id="status"></div>

</section>

<?php
/* Vérifier que le token existe et qu'il soit valide
* Si ce n'est pas le cas affichez le bouton de connexion
* Sinon affichez l'email de l'internaute
*/
//  	$fb = new Facebook\Facebook([
//  	  'app_id' => '898222853688349', // Replace {app-id} with your app id
//  	  'app_secret' => 'b734edbc9736d316fc93591288165122',
//  	  'default_graph_version' => 'v2.2',
//  	  ]);
//
//  	if(!checkToken()){
//  	$helper = $fb->getRedirectLoginHelper();
//
//  	$permissions = ['email','user_photos']; // Optional permissions
//  	$loginUrl = $helper->getLoginUrl('http://elomaridouae.com/Index/fbcallback', $permissions);
//
//  	echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';
//  	}else{
//  		$fb->setDefaultAccessToken($_SESSION['fb_access_token']);
//
//  		//$result = $fb->get("/me?fields=email");
//
//  		$result = $fb->get("/me?fields=albums{photos{picture},name}");
//  		$albums = $result->getDecodedBody();
//
//  		//$user = $result->getGraphUser();
//
//  		//echo $user->getEmail();
//  		foreach($albums['albums']['data'] as $album){
//  			echo "<h2>".$album['name']."<h2/>";
//  			foreach ($album['photos']['data'] as $photo) {
//  				echo "<img src='".$photo['picture']."'>";
//  			}
//  		}
//
//  		echo "<pre>";
//  		var_dump($albums);
//  	}
//
//  	function checkToken(){
//  		if (empty($_SESSION['fb_access_token'])) {
//  			return false;
//  		}
//  		$url = "https://graph.facebook.com/me?access_token=0f996f6a5388a792dc52ce3d8020489f&fields=albums{photos{picture},name}";
//
//  		$page = json_decode((file_get_contents($url)));
//
//  		$result = $page->data->is_valid;
//
//  		if (!$result) {
//  			unset($_SESSION['fb_access_token']);
//  		}
//
//  		return $result;
//  	}
// var_dump($_SESSION);die;
?>
</body>
</html>