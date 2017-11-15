<?php
$authorizationurl = "https://sso.gov.uz:8443/sso/oauth/Authorization.do";
$clientid = "consul_mfa_uz";
$clientsecret = "Ta4STuEUU2/WQ6sKlBBagQ==";
$scope = "consul_mfa_uz";
$stateArr = array('method' => 'IDPW');
$state = json_encode($stateArr);
$state = base64_encode ($state);

?>

<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Cache-Control" content="no-cache">
  </head>
  <body>
    <form name="OAuthForm" action="<?php echo $authorizationurl ?>" method="get" />
      <input type="hidden" name="response_type" value="one_code" />
      <input type="hidden" name="client_id" value="<?php echo $clientid ?>" />
      <input type="hidden" name="redirect_uri" value="http://consul.mfa.uz/uz/oneid/access_token.php" />
      <input type="hidden" name="scope" value="<?php echo $scope ?>" />
      <input type="hidden" name="state" value="<?php echo $state ?>" />
    </form>

    <script type="text/javascript">
    document.OAuthForm.submit();
    </script>
  </body>
</html>
