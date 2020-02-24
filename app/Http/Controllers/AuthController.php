<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
//use Session;
class AuthController extends Controller
{
public function outlookAuth()
{
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }

  // Initialize the OAuth client
  $oauthClient = new \League\OAuth2\Client\Provider\GenericProvider([
      'clientId'                => 'd9f2f75b-1649-43b3-bf85-e119f1463102',//env('OAUTH_APP_ID'),
      'clientSecret'            => 'IK-exv3g303xdGuyKpiPeDnjAmkhl:=:',//env('OAUTH_APP_PASSWORD'),
      'redirectUri'             => 'http://localhost/hotels-crm/crm/authorize',//env('OAUTH_REDIRECT_URI'),
      'urlAuthorize'            => 'https://login.microsoftonline.com/common'.'/oauth2/v2.0/authorize',
      //env('OAUTH_AUTHORITY').env('OAUTH_AUTHORIZE_ENDPOINT'),
      'urlAccessToken'          => 'https://login.microsoftonline.com/common'.'/oauth2/v2.0/token',
      //env('OAUTH_AUTHORITY').env('OAUTH_TOKEN_ENDPOINT'),
      'urlResourceOwnerDetails' => '',
      'scopes'                  => 'openid profile offline_access User.Read Mail.Read Calendars.Read Calendars.Read.Shared Contacts.Read Calendars.ReadWrite Calendars.ReadWrite.Shared'//env('OAUTH_SCOPES')
  ]);

  // Generate the auth URL
  $authorizationUrl = $oauthClient->getAuthorizationUrl();

  // Save client state so we can validate in response
  $_SESSION['oauth_state'] = $oauthClient->getState();
 //dd($authorizationUrl);
  // Redirect to authorization endpoint
  header('Location: '.$authorizationUrl);
  exit();
}
public function gettoken()
{
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }

  // Authorization code should be in the "code" query param
  if (isset($_GET['code'])) {
    // Check that state matches
    if (empty($_GET['state']) || ($_GET['state'] !== $_SESSION['oauth_state'])) {
      exit('State provided in redirect does not match expected value.');
    }

    // Clear saved state
    unset($_SESSION['oauth_state']);

    // Initialize the OAuth client
    $oauthClient = new \League\OAuth2\Client\Provider\GenericProvider([
      'clientId'                => 'd9f2f75b-1649-43b3-bf85-e119f1463102',//env('OAUTH_APP_ID'),
      'clientSecret'            => 'IK-exv3g303xdGuyKpiPeDnjAmkhl:=:',//env('OAUTH_APP_PASSWORD'),
      'redirectUri'             => 'http://localhost/hotels-crm/crm/authorize',//env('OAUTH_REDIRECT_URI'),
      'urlAuthorize'            => 'https://login.microsoftonline.com/common'.'/oauth2/v2.0/authorize',
      //env('OAUTH_AUTHORITY').env('OAUTH_AUTHORIZE_ENDPOINT'),
      'urlAccessToken'          => 'https://login.microsoftonline.com/common'.'/oauth2/v2.0/token',
      //env('OAUTH_AUTHORITY').env('OAUTH_TOKEN_ENDPOINT'),
      'urlResourceOwnerDetails' => '',
      'scopes'                  => 'openid profile offline_access User.Read Mail.Read Calendars.Read Calendars.Read.Shared Contacts.Read Calendars.ReadWrite Calendars.ReadWrite.Shared'//env('OAUTH_SCOPES')
  ]);

    try {
      // Make the token request
      $accessToken = $oauthClient->getAccessToken('authorization_code', [
        'code' => $_GET['code']
      ]);

      //$session->set('acc_token', $accessToken);
        $_SESSION['acc_token'] =$accessToken;

      // Save the access token and refresh tokens in session
      // This is for demo purposes only. A better method would
      // be to store the refresh token in a secured database
      $tokenCache = new \App\TokenStore\TokenCache;
      $tokenCache->storeTokens($accessToken->getToken(), $accessToken->getRefreshToken(),
        $accessToken->getExpires());

      // Redirect back to mail page

      return redirect()->route('crm.events');
    }
    catch (League\OAuth2\Client\Provider\Exception\IdentityProviderException $e) {
      exit('ERROR getting tokens: '.$e->getMessage());
    }
    exit();
  }
  elseif (isset($_GET['error'])) {
   // exit('ERROR: '.$_GET['error'].' - '.$_GET['error_description']);
    $_SESSION['oauth_state']='';
    return back();
  }
}
}