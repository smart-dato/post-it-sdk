<?php declare(strict_types = 1);

// ftm-/Users/tschigo/Developer/dls/packages/post-it-sdk/vendor/saloonphp/saloon/src/Http/PendingRequest.php
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v5-2.3.2',
   'data' => 
  array (
    0 => 
    array (
      '3699932a9db0f710142363fd04db4c97' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Saloon\\Http',
         'uses' => 
        array (
          'config' => 'Saloon\\Config',
          'method' => 'Saloon\\Enums\\Method',
          'helpers' => 'Saloon\\Helpers\\Helpers',
          'macroable' => 'Saloon\\Traits\\Macroable',
          'urlhelper' => 'Saloon\\Helpers\\URLHelper',
          'conditionable' => 'Saloon\\Traits\\Conditionable',
          'hasmockclient' => 'Saloon\\Traits\\HasMockClient',
          'fakeresponse' => 'Saloon\\Contracts\\FakeResponse',
          'mockclient' => 'Saloon\\Http\\Faking\\MockClient',
          'authenticator' => 'Saloon\\Contracts\\Authenticator',
          'oauthconfig' => 'Saloon\\Helpers\\OAuth2\\OAuthConfig',
          'getuserrequest' => 'Saloon\\Http\\OAuth2\\GetUserRequest',
          'bodyrepository' => 'Saloon\\Contracts\\Body\\BodyRepository',
          'mergebody' => 'Saloon\\Http\\PendingRequest\\MergeBody',
          'mergedelay' => 'Saloon\\Http\\PendingRequest\\MergeDelay',
          'delaymiddleware' => 'Saloon\\Http\\Middleware\\DelayMiddleware',
          'bootplugins' => 'Saloon\\Http\\PendingRequest\\BootPlugins',
          'getaccesstokenrequest' => 'Saloon\\Http\\OAuth2\\GetAccessTokenRequest',
          'authenticatesrequests' => 'Saloon\\Traits\\Auth\\AuthenticatesRequests',
          'validateproperties' => 'Saloon\\Http\\Middleware\\ValidateProperties',
          'getrefreshtokenrequest' => 'Saloon\\Http\\OAuth2\\GetRefreshTokenRequest',
          'determinemockresponse' => 'Saloon\\Http\\Middleware\\DetermineMockResponse',
          'invalidresponseclassexception' => 'Saloon\\Exceptions\\InvalidResponseClassException',
          'fatalrequestexception' => 'Saloon\\Exceptions\\Request\\FatalRequestException',
          'managespsrrequests' => 'Saloon\\Traits\\PendingRequest\\ManagesPsrRequests',
          'mergerequestproperties' => 'Saloon\\Http\\PendingRequest\\MergeRequestProperties',
          'bootconnectorandrequest' => 'Saloon\\Http\\PendingRequest\\BootConnectorAndRequest',
          'getclientcredentialstokenrequest' => 'Saloon\\Http\\OAuth2\\GetClientCredentialsTokenRequest',
          'hasrequestproperties' => 'Saloon\\Traits\\RequestProperties\\HasRequestProperties',
          'authenticatependingrequest' => 'Saloon\\Http\\PendingRequest\\AuthenticatePendingRequest',
          'getclientcredentialstokenbasicauthrequest' => 'Saloon\\Http\\OAuth2\\GetClientCredentialsTokenBasicAuthRequest',
        ),
         'className' => 'Saloon\\Http\\PendingRequest',
         'functionName' => NULL,
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '91dc7476134c0f0ff1a576e1a20891e5' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Saloon\\Traits\\Auth',
         'uses' => 
        array (
          'authenticator' => 'Saloon\\Contracts\\Authenticator',
          'basicauthenticator' => 'Saloon\\Http\\Auth\\BasicAuthenticator',
          'queryauthenticator' => 'Saloon\\Http\\Auth\\QueryAuthenticator',
          'tokenauthenticator' => 'Saloon\\Http\\Auth\\TokenAuthenticator',
          'digestauthenticator' => 'Saloon\\Http\\Auth\\DigestAuthenticator',
          'headerauthenticator' => 'Saloon\\Http\\Auth\\HeaderAuthenticator',
          'certificateauthenticator' => 'Saloon\\Http\\Auth\\CertificateAuthenticator',
        ),
         'className' => 'Saloon\\Http\\PendingRequest',
         'functionName' => NULL,
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Saloon\\Traits\\Auth\\AuthenticatesRequests',
         'traitData' => 
        array (
          0 => '/Users/tschigo/Developer/dls/packages/post-it-sdk/vendor/saloonphp/saloon/src/Http/PendingRequest.php',
          1 => 'Saloon\\Http\\PendingRequest',
          2 => 'Saloon\\Traits\\Auth\\AuthenticatesRequests',
          3 => NULL,
          4 => NULL,
        ),
      )),
      '3dfb8a5535bc8cd6184068a8bed728aa' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Saloon\\Traits\\Auth',
         'uses' => 
        array (
          'authenticator' => 'Saloon\\Contracts\\Authenticator',
          'basicauthenticator' => 'Saloon\\Http\\Auth\\BasicAuthenticator',
          'queryauthenticator' => 'Saloon\\Http\\Auth\\QueryAuthenticator',
          'tokenauthenticator' => 'Saloon\\Http\\Auth\\TokenAuthenticator',
          'digestauthenticator' => 'Saloon\\Http\\Auth\\DigestAuthenticator',
          'headerauthenticator' => 'Saloon\\Http\\Auth\\HeaderAuthenticator',
          'certificateauthenticator' => 'Saloon\\Http\\Auth\\CertificateAuthenticator',
        ),
         'className' => 'Saloon\\Http\\PendingRequest',
         'functionName' => 'defaultAuth',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Saloon\\Traits\\Auth\\AuthenticatesRequests',
         'traitData' => 
        array (
          0 => '/Users/tschigo/Developer/dls/packages/post-it-sdk/vendor/saloonphp/saloon/src/Http/PendingRequest.php',
          1 => 'Saloon\\Http\\PendingRequest',
          2 => 'Saloon\\Traits\\Auth\\AuthenticatesRequests',
          3 => NULL,
          4 => NULL,
        ),
      )),
      '3f8875886cba282fb70a054fbd4ce1b9' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Saloon\\Traits\\Auth',
         'uses' => 
        array (
          'authenticator' => 'Saloon\\Contracts\\Authenticator',
          'basicauthenticator' => 'Saloon\\Http\\Auth\\BasicAuthenticator',
          'queryauthenticator' => 'Saloon\\Http\\Auth\\QueryAuthenticator',
          'tokenauthenticator' => 'Saloon\\Http\\Auth\\TokenAuthenticator',
          'digestauthenticator' => 'Saloon\\Http\\Auth\\DigestAuthenticator',
          'headerauthenticator' => 'Saloon\\Http\\Auth\\HeaderAuthenticator',
          'certificateauthenticator' => 'Saloon\\Http\\Auth\\CertificateAuthenticator',
        ),
         'className' => 'Saloon\\Http\\PendingRequest',
         'functionName' => 'getAuthenticator',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Saloon\\Traits\\Auth\\AuthenticatesRequests',
         'traitData' => 
        array (
          0 => '/Users/tschigo/Developer/dls/packages/post-it-sdk/vendor/saloonphp/saloon/src/Http/PendingRequest.php',
          1 => 'Saloon\\Http\\PendingRequest',
          2 => 'Saloon\\Traits\\Auth\\AuthenticatesRequests',
          3 => NULL,
          4 => NULL,
        ),
      )),
      '12e0438209ffcdb0e302625d41a3d423' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Saloon\\Traits\\Auth',
         'uses' => 
        array (
          'authenticator' => 'Saloon\\Contracts\\Authenticator',
          'basicauthenticator' => 'Saloon\\Http\\Auth\\BasicAuthenticator',
          'queryauthenticator' => 'Saloon\\Http\\Auth\\QueryAuthenticator',
          'tokenauthenticator' => 'Saloon\\Http\\Auth\\TokenAuthenticator',
          'digestauthenticator' => 'Saloon\\Http\\Auth\\DigestAuthenticator',
          'headerauthenticator' => 'Saloon\\Http\\Auth\\HeaderAuthenticator',
          'certificateauthenticator' => 'Saloon\\Http\\Auth\\CertificateAuthenticator',
        ),
         'className' => 'Saloon\\Http\\PendingRequest',
         'functionName' => 'authenticate',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Saloon\\Traits\\Auth\\AuthenticatesRequests',
         'traitData' => 
        array (
          0 => '/Users/tschigo/Developer/dls/packages/post-it-sdk/vendor/saloonphp/saloon/src/Http/PendingRequest.php',
          1 => 'Saloon\\Http\\PendingRequest',
          2 => 'Saloon\\Traits\\Auth\\AuthenticatesRequests',
          3 => NULL,
          4 => NULL,
        ),
      )),
      '57764dcacb7b03ca3875c3ade59f133c' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Saloon\\Traits\\Auth',
         'uses' => 
        array (
          'authenticator' => 'Saloon\\Contracts\\Authenticator',
          'basicauthenticator' => 'Saloon\\Http\\Auth\\BasicAuthenticator',
          'queryauthenticator' => 'Saloon\\Http\\Auth\\QueryAuthenticator',
          'tokenauthenticator' => 'Saloon\\Http\\Auth\\TokenAuthenticator',
          'digestauthenticator' => 'Saloon\\Http\\Auth\\DigestAuthenticator',
          'headerauthenticator' => 'Saloon\\Http\\Auth\\HeaderAuthenticator',
          'certificateauthenticator' => 'Saloon\\Http\\Auth\\CertificateAuthenticator',
        ),
         'className' => 'Saloon\\Http\\PendingRequest',
         'functionName' => 'withTokenAuth',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Saloon\\Traits\\Auth\\AuthenticatesRequests',
         'traitData' => 
        array (
          0 => '/Users/tschigo/Developer/dls/packages/post-it-sdk/vendor/saloonphp/saloon/src/Http/PendingRequest.php',
          1 => 'Saloon\\Http\\PendingRequest',
          2 => 'Saloon\\Traits\\Auth\\AuthenticatesRequests',
          3 => NULL,
          4 => NULL,
        ),
      )),
      'b32f653bf8a916d981a9f30a77569778' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Saloon\\Traits\\Auth',
         'uses' => 
        array (
          'authenticator' => 'Saloon\\Contracts\\Authenticator',
          'basicauthenticator' => 'Saloon\\Http\\Auth\\BasicAuthenticator',
          'queryauthenticator' => 'Saloon\\Http\\Auth\\QueryAuthenticator',
          'tokenauthenticator' => 'Saloon\\Http\\Auth\\TokenAuthenticator',
          'digestauthenticator' => 'Saloon\\Http\\Auth\\DigestAuthenticator',
          'headerauthenticator' => 'Saloon\\Http\\Auth\\HeaderAuthenticator',
          'certificateauthenticator' => 'Saloon\\Http\\Auth\\CertificateAuthenticator',
        ),
         'className' => 'Saloon\\Http\\PendingRequest',
         'functionName' => 'withBasicAuth',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Saloon\\Traits\\Auth\\AuthenticatesRequests',
         'traitData' => 
        array (
          0 => '/Users/tschigo/Developer/dls/packages/post-it-sdk/vendor/saloonphp/saloon/src/Http/PendingRequest.php',
          1 => 'Saloon\\Http\\PendingRequest',
          2 => 'Saloon\\Traits\\Auth\\AuthenticatesRequests',
          3 => NULL,
          4 => NULL,
        ),
      )),
      '047215edb8bf79329ac5eb5b43c283cd' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Saloon\\Traits\\Auth',
         'uses' => 
        array (
          'authenticator' => 'Saloon\\Contracts\\Authenticator',
          'basicauthenticator' => 'Saloon\\Http\\Auth\\BasicAuthenticator',
          'queryauthenticator' => 'Saloon\\Http\\Auth\\QueryAuthenticator',
          'tokenauthenticator' => 'Saloon\\Http\\Auth\\TokenAuthenticator',
          'digestauthenticator' => 'Saloon\\Http\\Auth\\DigestAuthenticator',
          'headerauthenticator' => 'Saloon\\Http\\Auth\\HeaderAuthenticator',
          'certificateauthenticator' => 'Saloon\\Http\\Auth\\CertificateAuthenticator',
        ),
         'className' => 'Saloon\\Http\\PendingRequest',
         'functionName' => 'withDigestAuth',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Saloon\\Traits\\Auth\\AuthenticatesRequests',
         'traitData' => 
        array (
          0 => '/Users/tschigo/Developer/dls/packages/post-it-sdk/vendor/saloonphp/saloon/src/Http/PendingRequest.php',
          1 => 'Saloon\\Http\\PendingRequest',
          2 => 'Saloon\\Traits\\Auth\\AuthenticatesRequests',
          3 => NULL,
          4 => NULL,
        ),
      )),
      '2f89536cba17207af185dfda80afd1ef' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Saloon\\Traits\\Auth',
         'uses' => 
        array (
          'authenticator' => 'Saloon\\Contracts\\Authenticator',
          'basicauthenticator' => 'Saloon\\Http\\Auth\\BasicAuthenticator',
          'queryauthenticator' => 'Saloon\\Http\\Auth\\QueryAuthenticator',
          'tokenauthenticator' => 'Saloon\\Http\\Auth\\TokenAuthenticator',
          'digestauthenticator' => 'Saloon\\Http\\Auth\\DigestAuthenticator',
          'headerauthenticator' => 'Saloon\\Http\\Auth\\HeaderAuthenticator',
          'certificateauthenticator' => 'Saloon\\Http\\Auth\\CertificateAuthenticator',
        ),
         'className' => 'Saloon\\Http\\PendingRequest',
         'functionName' => 'withQueryAuth',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Saloon\\Traits\\Auth\\AuthenticatesRequests',
         'traitData' => 
        array (
          0 => '/Users/tschigo/Developer/dls/packages/post-it-sdk/vendor/saloonphp/saloon/src/Http/PendingRequest.php',
          1 => 'Saloon\\Http\\PendingRequest',
          2 => 'Saloon\\Traits\\Auth\\AuthenticatesRequests',
          3 => NULL,
          4 => NULL,
        ),
      )),
      '4cb9dee967d13953f039c8d49b5d01c0' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Saloon\\Traits\\Auth',
         'uses' => 
        array (
          'authenticator' => 'Saloon\\Contracts\\Authenticator',
          'basicauthenticator' => 'Saloon\\Http\\Auth\\BasicAuthenticator',
          'queryauthenticator' => 'Saloon\\Http\\Auth\\QueryAuthenticator',
          'tokenauthenticator' => 'Saloon\\Http\\Auth\\TokenAuthenticator',
          'digestauthenticator' => 'Saloon\\Http\\Auth\\DigestAuthenticator',
          'headerauthenticator' => 'Saloon\\Http\\Auth\\HeaderAuthenticator',
          'certificateauthenticator' => 'Saloon\\Http\\Auth\\CertificateAuthenticator',
        ),
         'className' => 'Saloon\\Http\\PendingRequest',
         'functionName' => 'withHeaderAuth',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Saloon\\Traits\\Auth\\AuthenticatesRequests',
         'traitData' => 
        array (
          0 => '/Users/tschigo/Developer/dls/packages/post-it-sdk/vendor/saloonphp/saloon/src/Http/PendingRequest.php',
          1 => 'Saloon\\Http\\PendingRequest',
          2 => 'Saloon\\Traits\\Auth\\AuthenticatesRequests',
          3 => NULL,
          4 => NULL,
        ),
      )),
      'd7c7ca36be5377b30269aa89f108e45a' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Saloon\\Traits\\Auth',
         'uses' => 
        array (
          'authenticator' => 'Saloon\\Contracts\\Authenticator',
          'basicauthenticator' => 'Saloon\\Http\\Auth\\BasicAuthenticator',
          'queryauthenticator' => 'Saloon\\Http\\Auth\\QueryAuthenticator',
          'tokenauthenticator' => 'Saloon\\Http\\Auth\\TokenAuthenticator',
          'digestauthenticator' => 'Saloon\\Http\\Auth\\DigestAuthenticator',
          'headerauthenticator' => 'Saloon\\Http\\Auth\\HeaderAuthenticator',
          'certificateauthenticator' => 'Saloon\\Http\\Auth\\CertificateAuthenticator',
        ),
         'className' => 'Saloon\\Http\\PendingRequest',
         'functionName' => 'withCertificateAuth',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Saloon\\Traits\\Auth\\AuthenticatesRequests',
         'traitData' => 
        array (
          0 => '/Users/tschigo/Developer/dls/packages/post-it-sdk/vendor/saloonphp/saloon/src/Http/PendingRequest.php',
          1 => 'Saloon\\Http\\PendingRequest',
          2 => 'Saloon\\Traits\\Auth\\AuthenticatesRequests',
          3 => NULL,
          4 => NULL,
        ),
      )),
      'e99ea8d1cccbb5181f01a633ad5bf54c' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Saloon\\Traits\\RequestProperties',
         'uses' => 
        array (
        ),
         'className' => 'Saloon\\Http\\PendingRequest',
         'functionName' => NULL,
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Saloon\\Traits\\RequestProperties\\HasRequestProperties',
         'traitData' => 
        array (
          0 => '/Users/tschigo/Developer/dls/packages/post-it-sdk/vendor/saloonphp/saloon/src/Http/PendingRequest.php',
          1 => 'Saloon\\Http\\PendingRequest',
          2 => 'Saloon\\Traits\\RequestProperties\\HasRequestProperties',
          3 => NULL,
          4 => NULL,
        ),
      )),
      '985f12a8aa86ba8ea52c077b74892549' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Saloon\\Traits\\RequestProperties',
         'uses' => 
        array (
          'arraystore' => 'Saloon\\Repositories\\ArrayStore',
          'arraystorecontract' => 'Saloon\\Contracts\\ArrayStore',
        ),
         'className' => 'Saloon\\Http\\PendingRequest',
         'functionName' => NULL,
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Saloon\\Traits\\RequestProperties\\HasHeaders',
         'traitData' => 
        array (
          0 => '/Users/tschigo/Developer/dls/packages/post-it-sdk/vendor/saloonphp/saloon/src/Http/PendingRequest.php',
          1 => 'Saloon\\Http\\PendingRequest',
          2 => 'Saloon\\Traits\\RequestProperties\\HasHeaders',
          3 => 'Saloon\\Traits\\RequestProperties\\HasRequestProperties',
          4 => NULL,
        ),
      )),
      'e8cdc5592e8c67c0654a40ab8059e39a' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Saloon\\Traits\\RequestProperties',
         'uses' => 
        array (
          'arraystore' => 'Saloon\\Repositories\\ArrayStore',
          'arraystorecontract' => 'Saloon\\Contracts\\ArrayStore',
        ),
         'className' => 'Saloon\\Http\\PendingRequest',
         'functionName' => 'headers',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Saloon\\Traits\\RequestProperties\\HasHeaders',
         'traitData' => 
        array (
          0 => '/Users/tschigo/Developer/dls/packages/post-it-sdk/vendor/saloonphp/saloon/src/Http/PendingRequest.php',
          1 => 'Saloon\\Http\\PendingRequest',
          2 => 'Saloon\\Traits\\RequestProperties\\HasHeaders',
          3 => 'Saloon\\Traits\\RequestProperties\\HasRequestProperties',
          4 => NULL,
        ),
      )),
      '4b7834b74e71c5eb40c9846a4817f1a4' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Saloon\\Traits\\RequestProperties',
         'uses' => 
        array (
          'arraystore' => 'Saloon\\Repositories\\ArrayStore',
          'arraystorecontract' => 'Saloon\\Contracts\\ArrayStore',
        ),
         'className' => 'Saloon\\Http\\PendingRequest',
         'functionName' => 'defaultHeaders',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Saloon\\Traits\\RequestProperties\\HasHeaders',
         'traitData' => 
        array (
          0 => '/Users/tschigo/Developer/dls/packages/post-it-sdk/vendor/saloonphp/saloon/src/Http/PendingRequest.php',
          1 => 'Saloon\\Http\\PendingRequest',
          2 => 'Saloon\\Traits\\RequestProperties\\HasHeaders',
          3 => 'Saloon\\Traits\\RequestProperties\\HasRequestProperties',
          4 => NULL,
        ),
      )),
      '73cb9cd97e740fa0b90d940f2e2a61a7' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Saloon\\Traits\\RequestProperties',
         'uses' => 
        array (
          'arraystore' => 'Saloon\\Repositories\\ArrayStore',
          'arraystorecontract' => 'Saloon\\Contracts\\ArrayStore',
        ),
         'className' => 'Saloon\\Http\\PendingRequest',
         'functionName' => NULL,
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Saloon\\Traits\\RequestProperties\\HasQuery',
         'traitData' => 
        array (
          0 => '/Users/tschigo/Developer/dls/packages/post-it-sdk/vendor/saloonphp/saloon/src/Http/PendingRequest.php',
          1 => 'Saloon\\Http\\PendingRequest',
          2 => 'Saloon\\Traits\\RequestProperties\\HasQuery',
          3 => 'Saloon\\Traits\\RequestProperties\\HasRequestProperties',
          4 => NULL,
        ),
      )),
      '363f3fb8939855115ece8134ee83690a' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Saloon\\Traits\\RequestProperties',
         'uses' => 
        array (
          'arraystore' => 'Saloon\\Repositories\\ArrayStore',
          'arraystorecontract' => 'Saloon\\Contracts\\ArrayStore',
        ),
         'className' => 'Saloon\\Http\\PendingRequest',
         'functionName' => 'query',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Saloon\\Traits\\RequestProperties\\HasQuery',
         'traitData' => 
        array (
          0 => '/Users/tschigo/Developer/dls/packages/post-it-sdk/vendor/saloonphp/saloon/src/Http/PendingRequest.php',
          1 => 'Saloon\\Http\\PendingRequest',
          2 => 'Saloon\\Traits\\RequestProperties\\HasQuery',
          3 => 'Saloon\\Traits\\RequestProperties\\HasRequestProperties',
          4 => NULL,
        ),
      )),
      '035d21f8c05fcab7bc405450bdeade17' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Saloon\\Traits\\RequestProperties',
         'uses' => 
        array (
          'arraystore' => 'Saloon\\Repositories\\ArrayStore',
          'arraystorecontract' => 'Saloon\\Contracts\\ArrayStore',
        ),
         'className' => 'Saloon\\Http\\PendingRequest',
         'functionName' => 'defaultQuery',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Saloon\\Traits\\RequestProperties\\HasQuery',
         'traitData' => 
        array (
          0 => '/Users/tschigo/Developer/dls/packages/post-it-sdk/vendor/saloonphp/saloon/src/Http/PendingRequest.php',
          1 => 'Saloon\\Http\\PendingRequest',
          2 => 'Saloon\\Traits\\RequestProperties\\HasQuery',
          3 => 'Saloon\\Traits\\RequestProperties\\HasRequestProperties',
          4 => NULL,
        ),
      )),
      'f0e856435835fbef1f405b12df08ce8d' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Saloon\\Traits\\RequestProperties',
         'uses' => 
        array (
          'arraystore' => 'Saloon\\Repositories\\ArrayStore',
          'arraystorecontract' => 'Saloon\\Contracts\\ArrayStore',
        ),
         'className' => 'Saloon\\Http\\PendingRequest',
         'functionName' => NULL,
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Saloon\\Traits\\RequestProperties\\HasConfig',
         'traitData' => 
        array (
          0 => '/Users/tschigo/Developer/dls/packages/post-it-sdk/vendor/saloonphp/saloon/src/Http/PendingRequest.php',
          1 => 'Saloon\\Http\\PendingRequest',
          2 => 'Saloon\\Traits\\RequestProperties\\HasConfig',
          3 => 'Saloon\\Traits\\RequestProperties\\HasRequestProperties',
          4 => NULL,
        ),
      )),
      'ce80afed78856315bdbe81b27fce7b96' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Saloon\\Traits\\RequestProperties',
         'uses' => 
        array (
          'arraystore' => 'Saloon\\Repositories\\ArrayStore',
          'arraystorecontract' => 'Saloon\\Contracts\\ArrayStore',
        ),
         'className' => 'Saloon\\Http\\PendingRequest',
         'functionName' => 'config',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Saloon\\Traits\\RequestProperties\\HasConfig',
         'traitData' => 
        array (
          0 => '/Users/tschigo/Developer/dls/packages/post-it-sdk/vendor/saloonphp/saloon/src/Http/PendingRequest.php',
          1 => 'Saloon\\Http\\PendingRequest',
          2 => 'Saloon\\Traits\\RequestProperties\\HasConfig',
          3 => 'Saloon\\Traits\\RequestProperties\\HasRequestProperties',
          4 => NULL,
        ),
      )),
      '69d4311a20bcc835e7d6b0abf895185e' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Saloon\\Traits\\RequestProperties',
         'uses' => 
        array (
          'arraystore' => 'Saloon\\Repositories\\ArrayStore',
          'arraystorecontract' => 'Saloon\\Contracts\\ArrayStore',
        ),
         'className' => 'Saloon\\Http\\PendingRequest',
         'functionName' => 'defaultConfig',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Saloon\\Traits\\RequestProperties\\HasConfig',
         'traitData' => 
        array (
          0 => '/Users/tschigo/Developer/dls/packages/post-it-sdk/vendor/saloonphp/saloon/src/Http/PendingRequest.php',
          1 => 'Saloon\\Http\\PendingRequest',
          2 => 'Saloon\\Traits\\RequestProperties\\HasConfig',
          3 => 'Saloon\\Traits\\RequestProperties\\HasRequestProperties',
          4 => NULL,
        ),
      )),
      '656aecc998a1357460ca7b4b8e6baedd' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Saloon\\Traits\\RequestProperties',
         'uses' => 
        array (
          'middlewarepipeline' => 'Saloon\\Helpers\\MiddlewarePipeline',
        ),
         'className' => 'Saloon\\Http\\PendingRequest',
         'functionName' => NULL,
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Saloon\\Traits\\RequestProperties\\HasMiddleware',
         'traitData' => 
        array (
          0 => '/Users/tschigo/Developer/dls/packages/post-it-sdk/vendor/saloonphp/saloon/src/Http/PendingRequest.php',
          1 => 'Saloon\\Http\\PendingRequest',
          2 => 'Saloon\\Traits\\RequestProperties\\HasMiddleware',
          3 => 'Saloon\\Traits\\RequestProperties\\HasRequestProperties',
          4 => NULL,
        ),
      )),
      '7750a0996f11a903d6cf651d319dbb71' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Saloon\\Traits\\RequestProperties',
         'uses' => 
        array (
          'middlewarepipeline' => 'Saloon\\Helpers\\MiddlewarePipeline',
        ),
         'className' => 'Saloon\\Http\\PendingRequest',
         'functionName' => 'middleware',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Saloon\\Traits\\RequestProperties\\HasMiddleware',
         'traitData' => 
        array (
          0 => '/Users/tschigo/Developer/dls/packages/post-it-sdk/vendor/saloonphp/saloon/src/Http/PendingRequest.php',
          1 => 'Saloon\\Http\\PendingRequest',
          2 => 'Saloon\\Traits\\RequestProperties\\HasMiddleware',
          3 => 'Saloon\\Traits\\RequestProperties\\HasRequestProperties',
          4 => NULL,
        ),
      )),
      '618d1cddd82b0710c6c1940c9c464ade' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Saloon\\Traits\\RequestProperties',
         'uses' => 
        array (
          'integerstore' => 'Saloon\\Repositories\\IntegerStore',
        ),
         'className' => 'Saloon\\Http\\PendingRequest',
         'functionName' => NULL,
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Saloon\\Traits\\RequestProperties\\HasDelay',
         'traitData' => 
        array (
          0 => '/Users/tschigo/Developer/dls/packages/post-it-sdk/vendor/saloonphp/saloon/src/Http/PendingRequest.php',
          1 => 'Saloon\\Http\\PendingRequest',
          2 => 'Saloon\\Traits\\RequestProperties\\HasDelay',
          3 => 'Saloon\\Traits\\RequestProperties\\HasRequestProperties',
          4 => NULL,
        ),
      )),
      'b7cfdb80d8a28d62bd8ed88f1166fa46' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Saloon\\Traits\\RequestProperties',
         'uses' => 
        array (
          'integerstore' => 'Saloon\\Repositories\\IntegerStore',
        ),
         'className' => 'Saloon\\Http\\PendingRequest',
         'functionName' => 'delay',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Saloon\\Traits\\RequestProperties\\HasDelay',
         'traitData' => 
        array (
          0 => '/Users/tschigo/Developer/dls/packages/post-it-sdk/vendor/saloonphp/saloon/src/Http/PendingRequest.php',
          1 => 'Saloon\\Http\\PendingRequest',
          2 => 'Saloon\\Traits\\RequestProperties\\HasDelay',
          3 => 'Saloon\\Traits\\RequestProperties\\HasRequestProperties',
          4 => NULL,
        ),
      )),
      '95120181e9b27780b56d1eda374befe4' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Saloon\\Traits\\RequestProperties',
         'uses' => 
        array (
          'integerstore' => 'Saloon\\Repositories\\IntegerStore',
        ),
         'className' => 'Saloon\\Http\\PendingRequest',
         'functionName' => 'defaultDelay',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Saloon\\Traits\\RequestProperties\\HasDelay',
         'traitData' => 
        array (
          0 => '/Users/tschigo/Developer/dls/packages/post-it-sdk/vendor/saloonphp/saloon/src/Http/PendingRequest.php',
          1 => 'Saloon\\Http\\PendingRequest',
          2 => 'Saloon\\Traits\\RequestProperties\\HasDelay',
          3 => 'Saloon\\Traits\\RequestProperties\\HasRequestProperties',
          4 => NULL,
        ),
      )),
      '93982e060075b75138f02661c39d42ce' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Saloon\\Traits\\PendingRequest',
         'uses' => 
        array (
          'urlhelper' => 'Saloon\\Helpers\\URLHelper',
          'uriinterface' => 'Psr\\Http\\Message\\UriInterface',
          'factorycollection' => 'Saloon\\Data\\FactoryCollection',
          'requestinterface' => 'Psr\\Http\\Message\\RequestInterface',
          'bodyrepository' => 'Saloon\\Contracts\\Body\\BodyRepository',
        ),
         'className' => 'Saloon\\Http\\PendingRequest',
         'functionName' => NULL,
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Saloon\\Traits\\PendingRequest\\ManagesPsrRequests',
         'traitData' => 
        array (
          0 => '/Users/tschigo/Developer/dls/packages/post-it-sdk/vendor/saloonphp/saloon/src/Http/PendingRequest.php',
          1 => 'Saloon\\Http\\PendingRequest',
          2 => 'Saloon\\Traits\\PendingRequest\\ManagesPsrRequests',
          3 => NULL,
          4 => NULL,
        ),
      )),
      '07086ff608c513e137bc2da97d9b30df' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Saloon\\Traits\\PendingRequest',
         'uses' => 
        array (
          'urlhelper' => 'Saloon\\Helpers\\URLHelper',
          'uriinterface' => 'Psr\\Http\\Message\\UriInterface',
          'factorycollection' => 'Saloon\\Data\\FactoryCollection',
          'requestinterface' => 'Psr\\Http\\Message\\RequestInterface',
          'bodyrepository' => 'Saloon\\Contracts\\Body\\BodyRepository',
        ),
         'className' => 'Saloon\\Http\\PendingRequest',
         'functionName' => 'getUri',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Saloon\\Traits\\PendingRequest\\ManagesPsrRequests',
         'traitData' => 
        array (
          0 => '/Users/tschigo/Developer/dls/packages/post-it-sdk/vendor/saloonphp/saloon/src/Http/PendingRequest.php',
          1 => 'Saloon\\Http\\PendingRequest',
          2 => 'Saloon\\Traits\\PendingRequest\\ManagesPsrRequests',
          3 => NULL,
          4 => NULL,
        ),
      )),
      'a122768575297a7089ce546a4aa400eb' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Saloon\\Traits\\PendingRequest',
         'uses' => 
        array (
          'urlhelper' => 'Saloon\\Helpers\\URLHelper',
          'uriinterface' => 'Psr\\Http\\Message\\UriInterface',
          'factorycollection' => 'Saloon\\Data\\FactoryCollection',
          'requestinterface' => 'Psr\\Http\\Message\\RequestInterface',
          'bodyrepository' => 'Saloon\\Contracts\\Body\\BodyRepository',
        ),
         'className' => 'Saloon\\Http\\PendingRequest',
         'functionName' => 'createPsrRequest',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Saloon\\Traits\\PendingRequest\\ManagesPsrRequests',
         'traitData' => 
        array (
          0 => '/Users/tschigo/Developer/dls/packages/post-it-sdk/vendor/saloonphp/saloon/src/Http/PendingRequest.php',
          1 => 'Saloon\\Http\\PendingRequest',
          2 => 'Saloon\\Traits\\PendingRequest\\ManagesPsrRequests',
          3 => NULL,
          4 => NULL,
        ),
      )),
      '1321aa5d4142c4b3a5c15bde53f93231' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Saloon\\Traits\\PendingRequest',
         'uses' => 
        array (
          'urlhelper' => 'Saloon\\Helpers\\URLHelper',
          'uriinterface' => 'Psr\\Http\\Message\\UriInterface',
          'factorycollection' => 'Saloon\\Data\\FactoryCollection',
          'requestinterface' => 'Psr\\Http\\Message\\RequestInterface',
          'bodyrepository' => 'Saloon\\Contracts\\Body\\BodyRepository',
        ),
         'className' => 'Saloon\\Http\\PendingRequest',
         'functionName' => 'getFactoryCollection',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Saloon\\Traits\\PendingRequest\\ManagesPsrRequests',
         'traitData' => 
        array (
          0 => '/Users/tschigo/Developer/dls/packages/post-it-sdk/vendor/saloonphp/saloon/src/Http/PendingRequest.php',
          1 => 'Saloon\\Http\\PendingRequest',
          2 => 'Saloon\\Traits\\PendingRequest\\ManagesPsrRequests',
          3 => NULL,
          4 => NULL,
        ),
      )),
      'e99dd29f40693d67430224a55851c159' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Saloon\\Traits',
         'uses' => 
        array (
          'helpers' => 'Saloon\\Helpers\\Helpers',
        ),
         'className' => 'Saloon\\Http\\PendingRequest',
         'functionName' => NULL,
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Saloon\\Traits\\Conditionable',
         'traitData' => 
        array (
          0 => '/Users/tschigo/Developer/dls/packages/post-it-sdk/vendor/saloonphp/saloon/src/Http/PendingRequest.php',
          1 => 'Saloon\\Http\\PendingRequest',
          2 => 'Saloon\\Traits\\Conditionable',
          3 => NULL,
          4 => NULL,
        ),
      )),
      'd3dd756a3eb39410520afd57aaddca07' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Saloon\\Traits',
         'uses' => 
        array (
          'helpers' => 'Saloon\\Helpers\\Helpers',
        ),
         'className' => 'Saloon\\Http\\PendingRequest',
         'functionName' => 'when',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Saloon\\Traits\\Conditionable',
         'traitData' => 
        array (
          0 => '/Users/tschigo/Developer/dls/packages/post-it-sdk/vendor/saloonphp/saloon/src/Http/PendingRequest.php',
          1 => 'Saloon\\Http\\PendingRequest',
          2 => 'Saloon\\Traits\\Conditionable',
          3 => NULL,
          4 => NULL,
        ),
      )),
      '4b1a2b9defca654b3b0d745b869dd814' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Saloon\\Traits',
         'uses' => 
        array (
          'helpers' => 'Saloon\\Helpers\\Helpers',
        ),
         'className' => 'Saloon\\Http\\PendingRequest',
         'functionName' => 'unless',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Saloon\\Traits\\Conditionable',
         'traitData' => 
        array (
          0 => '/Users/tschigo/Developer/dls/packages/post-it-sdk/vendor/saloonphp/saloon/src/Http/PendingRequest.php',
          1 => 'Saloon\\Http\\PendingRequest',
          2 => 'Saloon\\Traits\\Conditionable',
          3 => NULL,
          4 => NULL,
        ),
      )),
      'cc4f5879b81520613f640d5bb7d9136f' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Saloon\\Traits',
         'uses' => 
        array (
          'mockclient' => 'Saloon\\Http\\Faking\\MockClient',
        ),
         'className' => 'Saloon\\Http\\PendingRequest',
         'functionName' => NULL,
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Saloon\\Traits\\HasMockClient',
         'traitData' => 
        array (
          0 => '/Users/tschigo/Developer/dls/packages/post-it-sdk/vendor/saloonphp/saloon/src/Http/PendingRequest.php',
          1 => 'Saloon\\Http\\PendingRequest',
          2 => 'Saloon\\Traits\\HasMockClient',
          3 => NULL,
          4 => NULL,
        ),
      )),
      '8f846aae9645740d60fb702c1f89bf6d' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Saloon\\Traits',
         'uses' => 
        array (
          'mockclient' => 'Saloon\\Http\\Faking\\MockClient',
        ),
         'className' => 'Saloon\\Http\\PendingRequest',
         'functionName' => 'withMockClient',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Saloon\\Traits\\HasMockClient',
         'traitData' => 
        array (
          0 => '/Users/tschigo/Developer/dls/packages/post-it-sdk/vendor/saloonphp/saloon/src/Http/PendingRequest.php',
          1 => 'Saloon\\Http\\PendingRequest',
          2 => 'Saloon\\Traits\\HasMockClient',
          3 => NULL,
          4 => NULL,
        ),
      )),
      'ee8b8d144be827d8f32a3e45d93b8d33' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Saloon\\Traits',
         'uses' => 
        array (
          'mockclient' => 'Saloon\\Http\\Faking\\MockClient',
        ),
         'className' => 'Saloon\\Http\\PendingRequest',
         'functionName' => 'getMockClient',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Saloon\\Traits\\HasMockClient',
         'traitData' => 
        array (
          0 => '/Users/tschigo/Developer/dls/packages/post-it-sdk/vendor/saloonphp/saloon/src/Http/PendingRequest.php',
          1 => 'Saloon\\Http\\PendingRequest',
          2 => 'Saloon\\Traits\\HasMockClient',
          3 => NULL,
          4 => NULL,
        ),
      )),
      'caad4716105d8282a61e38a6db992d8c' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Saloon\\Traits',
         'uses' => 
        array (
          'mockclient' => 'Saloon\\Http\\Faking\\MockClient',
        ),
         'className' => 'Saloon\\Http\\PendingRequest',
         'functionName' => 'hasMockClient',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Saloon\\Traits\\HasMockClient',
         'traitData' => 
        array (
          0 => '/Users/tschigo/Developer/dls/packages/post-it-sdk/vendor/saloonphp/saloon/src/Http/PendingRequest.php',
          1 => 'Saloon\\Http\\PendingRequest',
          2 => 'Saloon\\Traits\\HasMockClient',
          3 => NULL,
          4 => NULL,
        ),
      )),
      '6a676958d34d00e33b6e886ad6a408d0' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Saloon\\Traits',
         'uses' => 
        array (
          'closure' => 'Closure',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
          'badmethodcallexception' => 'BadMethodCallException',
        ),
         'className' => 'Saloon\\Http\\PendingRequest',
         'functionName' => NULL,
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Saloon\\Traits\\Macroable',
         'traitData' => 
        array (
          0 => '/Users/tschigo/Developer/dls/packages/post-it-sdk/vendor/saloonphp/saloon/src/Http/PendingRequest.php',
          1 => 'Saloon\\Http\\PendingRequest',
          2 => 'Saloon\\Traits\\Macroable',
          3 => NULL,
          4 => NULL,
        ),
      )),
      '1ed7c623e6b512210da59ea69fb49dfd' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Saloon\\Traits',
         'uses' => 
        array (
          'closure' => 'Closure',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
          'badmethodcallexception' => 'BadMethodCallException',
        ),
         'className' => 'Saloon\\Http\\PendingRequest',
         'functionName' => 'macro',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Saloon\\Traits',
           'uses' => 
          array (
            'closure' => 'Closure',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
            'badmethodcallexception' => 'BadMethodCallException',
          ),
           'className' => 'Saloon\\Http\\PendingRequest',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => 'Saloon\\Traits\\Macroable',
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Saloon\\Traits\\Macroable',
         'traitData' => 
        array (
          0 => '/Users/tschigo/Developer/dls/packages/post-it-sdk/vendor/saloonphp/saloon/src/Http/PendingRequest.php',
          1 => 'Saloon\\Http\\PendingRequest',
          2 => 'Saloon\\Traits\\Macroable',
          3 => NULL,
          4 => NULL,
        ),
      )),
      'aaa3bc57d42f1616bdb1a1adc4105ec1' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Saloon\\Traits',
         'uses' => 
        array (
          'closure' => 'Closure',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
          'badmethodcallexception' => 'BadMethodCallException',
        ),
         'className' => 'Saloon\\Http\\PendingRequest',
         'functionName' => 'mixin',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Saloon\\Traits',
           'uses' => 
          array (
            'closure' => 'Closure',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
            'badmethodcallexception' => 'BadMethodCallException',
          ),
           'className' => 'Saloon\\Http\\PendingRequest',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => 'Saloon\\Traits\\Macroable',
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Saloon\\Traits\\Macroable',
         'traitData' => 
        array (
          0 => '/Users/tschigo/Developer/dls/packages/post-it-sdk/vendor/saloonphp/saloon/src/Http/PendingRequest.php',
          1 => 'Saloon\\Http\\PendingRequest',
          2 => 'Saloon\\Traits\\Macroable',
          3 => NULL,
          4 => NULL,
        ),
      )),
      '8748c3ae5ef6b44969cd36b28584f7cb' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Saloon\\Traits',
         'uses' => 
        array (
          'closure' => 'Closure',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
          'badmethodcallexception' => 'BadMethodCallException',
        ),
         'className' => 'Saloon\\Http\\PendingRequest',
         'functionName' => 'hasMacro',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Saloon\\Traits',
           'uses' => 
          array (
            'closure' => 'Closure',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
            'badmethodcallexception' => 'BadMethodCallException',
          ),
           'className' => 'Saloon\\Http\\PendingRequest',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => 'Saloon\\Traits\\Macroable',
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Saloon\\Traits\\Macroable',
         'traitData' => 
        array (
          0 => '/Users/tschigo/Developer/dls/packages/post-it-sdk/vendor/saloonphp/saloon/src/Http/PendingRequest.php',
          1 => 'Saloon\\Http\\PendingRequest',
          2 => 'Saloon\\Traits\\Macroable',
          3 => NULL,
          4 => NULL,
        ),
      )),
      'fdf83d8f63a745f988800562bf0580a0' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Saloon\\Traits',
         'uses' => 
        array (
          'closure' => 'Closure',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
          'badmethodcallexception' => 'BadMethodCallException',
        ),
         'className' => 'Saloon\\Http\\PendingRequest',
         'functionName' => '__callStatic',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Saloon\\Traits',
           'uses' => 
          array (
            'closure' => 'Closure',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
            'badmethodcallexception' => 'BadMethodCallException',
          ),
           'className' => 'Saloon\\Http\\PendingRequest',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => 'Saloon\\Traits\\Macroable',
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Saloon\\Traits\\Macroable',
         'traitData' => 
        array (
          0 => '/Users/tschigo/Developer/dls/packages/post-it-sdk/vendor/saloonphp/saloon/src/Http/PendingRequest.php',
          1 => 'Saloon\\Http\\PendingRequest',
          2 => 'Saloon\\Traits\\Macroable',
          3 => NULL,
          4 => NULL,
        ),
      )),
      '1073eea822314518c94120fadb6b078a' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Saloon\\Traits',
         'uses' => 
        array (
          'closure' => 'Closure',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
          'badmethodcallexception' => 'BadMethodCallException',
        ),
         'className' => 'Saloon\\Http\\PendingRequest',
         'functionName' => '__call',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Saloon\\Traits',
           'uses' => 
          array (
            'closure' => 'Closure',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
            'badmethodcallexception' => 'BadMethodCallException',
          ),
           'className' => 'Saloon\\Http\\PendingRequest',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => 'Saloon\\Traits\\Macroable',
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Saloon\\Traits\\Macroable',
         'traitData' => 
        array (
          0 => '/Users/tschigo/Developer/dls/packages/post-it-sdk/vendor/saloonphp/saloon/src/Http/PendingRequest.php',
          1 => 'Saloon\\Http\\PendingRequest',
          2 => 'Saloon\\Traits\\Macroable',
          3 => NULL,
          4 => NULL,
        ),
      )),
      '7a8bf2cf335fb1a96baff971a6d94ffe' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Saloon\\Http',
         'uses' => 
        array (
          'config' => 'Saloon\\Config',
          'method' => 'Saloon\\Enums\\Method',
          'helpers' => 'Saloon\\Helpers\\Helpers',
          'macroable' => 'Saloon\\Traits\\Macroable',
          'urlhelper' => 'Saloon\\Helpers\\URLHelper',
          'conditionable' => 'Saloon\\Traits\\Conditionable',
          'hasmockclient' => 'Saloon\\Traits\\HasMockClient',
          'fakeresponse' => 'Saloon\\Contracts\\FakeResponse',
          'mockclient' => 'Saloon\\Http\\Faking\\MockClient',
          'authenticator' => 'Saloon\\Contracts\\Authenticator',
          'oauthconfig' => 'Saloon\\Helpers\\OAuth2\\OAuthConfig',
          'getuserrequest' => 'Saloon\\Http\\OAuth2\\GetUserRequest',
          'bodyrepository' => 'Saloon\\Contracts\\Body\\BodyRepository',
          'mergebody' => 'Saloon\\Http\\PendingRequest\\MergeBody',
          'mergedelay' => 'Saloon\\Http\\PendingRequest\\MergeDelay',
          'delaymiddleware' => 'Saloon\\Http\\Middleware\\DelayMiddleware',
          'bootplugins' => 'Saloon\\Http\\PendingRequest\\BootPlugins',
          'getaccesstokenrequest' => 'Saloon\\Http\\OAuth2\\GetAccessTokenRequest',
          'authenticatesrequests' => 'Saloon\\Traits\\Auth\\AuthenticatesRequests',
          'validateproperties' => 'Saloon\\Http\\Middleware\\ValidateProperties',
          'getrefreshtokenrequest' => 'Saloon\\Http\\OAuth2\\GetRefreshTokenRequest',
          'determinemockresponse' => 'Saloon\\Http\\Middleware\\DetermineMockResponse',
          'invalidresponseclassexception' => 'Saloon\\Exceptions\\InvalidResponseClassException',
          'fatalrequestexception' => 'Saloon\\Exceptions\\Request\\FatalRequestException',
          'managespsrrequests' => 'Saloon\\Traits\\PendingRequest\\ManagesPsrRequests',
          'mergerequestproperties' => 'Saloon\\Http\\PendingRequest\\MergeRequestProperties',
          'bootconnectorandrequest' => 'Saloon\\Http\\PendingRequest\\BootConnectorAndRequest',
          'getclientcredentialstokenrequest' => 'Saloon\\Http\\OAuth2\\GetClientCredentialsTokenRequest',
          'hasrequestproperties' => 'Saloon\\Traits\\RequestProperties\\HasRequestProperties',
          'authenticatependingrequest' => 'Saloon\\Http\\PendingRequest\\AuthenticatePendingRequest',
          'getclientcredentialstokenbasicauthrequest' => 'Saloon\\Http\\OAuth2\\GetClientCredentialsTokenBasicAuthRequest',
        ),
         'className' => 'Saloon\\Http\\PendingRequest',
         'functionName' => '__construct',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      'bc7769094afcd39359b6fdffdb4c5268' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Saloon\\Http',
         'uses' => 
        array (
          'config' => 'Saloon\\Config',
          'method' => 'Saloon\\Enums\\Method',
          'helpers' => 'Saloon\\Helpers\\Helpers',
          'macroable' => 'Saloon\\Traits\\Macroable',
          'urlhelper' => 'Saloon\\Helpers\\URLHelper',
          'conditionable' => 'Saloon\\Traits\\Conditionable',
          'hasmockclient' => 'Saloon\\Traits\\HasMockClient',
          'fakeresponse' => 'Saloon\\Contracts\\FakeResponse',
          'mockclient' => 'Saloon\\Http\\Faking\\MockClient',
          'authenticator' => 'Saloon\\Contracts\\Authenticator',
          'oauthconfig' => 'Saloon\\Helpers\\OAuth2\\OAuthConfig',
          'getuserrequest' => 'Saloon\\Http\\OAuth2\\GetUserRequest',
          'bodyrepository' => 'Saloon\\Contracts\\Body\\BodyRepository',
          'mergebody' => 'Saloon\\Http\\PendingRequest\\MergeBody',
          'mergedelay' => 'Saloon\\Http\\PendingRequest\\MergeDelay',
          'delaymiddleware' => 'Saloon\\Http\\Middleware\\DelayMiddleware',
          'bootplugins' => 'Saloon\\Http\\PendingRequest\\BootPlugins',
          'getaccesstokenrequest' => 'Saloon\\Http\\OAuth2\\GetAccessTokenRequest',
          'authenticatesrequests' => 'Saloon\\Traits\\Auth\\AuthenticatesRequests',
          'validateproperties' => 'Saloon\\Http\\Middleware\\ValidateProperties',
          'getrefreshtokenrequest' => 'Saloon\\Http\\OAuth2\\GetRefreshTokenRequest',
          'determinemockresponse' => 'Saloon\\Http\\Middleware\\DetermineMockResponse',
          'invalidresponseclassexception' => 'Saloon\\Exceptions\\InvalidResponseClassException',
          'fatalrequestexception' => 'Saloon\\Exceptions\\Request\\FatalRequestException',
          'managespsrrequests' => 'Saloon\\Traits\\PendingRequest\\ManagesPsrRequests',
          'mergerequestproperties' => 'Saloon\\Http\\PendingRequest\\MergeRequestProperties',
          'bootconnectorandrequest' => 'Saloon\\Http\\PendingRequest\\BootConnectorAndRequest',
          'getclientcredentialstokenrequest' => 'Saloon\\Http\\OAuth2\\GetClientCredentialsTokenRequest',
          'hasrequestproperties' => 'Saloon\\Traits\\RequestProperties\\HasRequestProperties',
          'authenticatependingrequest' => 'Saloon\\Http\\PendingRequest\\AuthenticatePendingRequest',
          'getclientcredentialstokenbasicauthrequest' => 'Saloon\\Http\\OAuth2\\GetClientCredentialsTokenBasicAuthRequest',
        ),
         'className' => 'Saloon\\Http\\PendingRequest',
         'functionName' => 'authenticate',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '7805ca31b3ce06882b4ea7e1434ea3f0' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Saloon\\Http',
         'uses' => 
        array (
          'config' => 'Saloon\\Config',
          'method' => 'Saloon\\Enums\\Method',
          'helpers' => 'Saloon\\Helpers\\Helpers',
          'macroable' => 'Saloon\\Traits\\Macroable',
          'urlhelper' => 'Saloon\\Helpers\\URLHelper',
          'conditionable' => 'Saloon\\Traits\\Conditionable',
          'hasmockclient' => 'Saloon\\Traits\\HasMockClient',
          'fakeresponse' => 'Saloon\\Contracts\\FakeResponse',
          'mockclient' => 'Saloon\\Http\\Faking\\MockClient',
          'authenticator' => 'Saloon\\Contracts\\Authenticator',
          'oauthconfig' => 'Saloon\\Helpers\\OAuth2\\OAuthConfig',
          'getuserrequest' => 'Saloon\\Http\\OAuth2\\GetUserRequest',
          'bodyrepository' => 'Saloon\\Contracts\\Body\\BodyRepository',
          'mergebody' => 'Saloon\\Http\\PendingRequest\\MergeBody',
          'mergedelay' => 'Saloon\\Http\\PendingRequest\\MergeDelay',
          'delaymiddleware' => 'Saloon\\Http\\Middleware\\DelayMiddleware',
          'bootplugins' => 'Saloon\\Http\\PendingRequest\\BootPlugins',
          'getaccesstokenrequest' => 'Saloon\\Http\\OAuth2\\GetAccessTokenRequest',
          'authenticatesrequests' => 'Saloon\\Traits\\Auth\\AuthenticatesRequests',
          'validateproperties' => 'Saloon\\Http\\Middleware\\ValidateProperties',
          'getrefreshtokenrequest' => 'Saloon\\Http\\OAuth2\\GetRefreshTokenRequest',
          'determinemockresponse' => 'Saloon\\Http\\Middleware\\DetermineMockResponse',
          'invalidresponseclassexception' => 'Saloon\\Exceptions\\InvalidResponseClassException',
          'fatalrequestexception' => 'Saloon\\Exceptions\\Request\\FatalRequestException',
          'managespsrrequests' => 'Saloon\\Traits\\PendingRequest\\ManagesPsrRequests',
          'mergerequestproperties' => 'Saloon\\Http\\PendingRequest\\MergeRequestProperties',
          'bootconnectorandrequest' => 'Saloon\\Http\\PendingRequest\\BootConnectorAndRequest',
          'getclientcredentialstokenrequest' => 'Saloon\\Http\\OAuth2\\GetClientCredentialsTokenRequest',
          'hasrequestproperties' => 'Saloon\\Traits\\RequestProperties\\HasRequestProperties',
          'authenticatependingrequest' => 'Saloon\\Http\\PendingRequest\\AuthenticatePendingRequest',
          'getclientcredentialstokenbasicauthrequest' => 'Saloon\\Http\\OAuth2\\GetClientCredentialsTokenBasicAuthRequest',
        ),
         'className' => 'Saloon\\Http\\PendingRequest',
         'functionName' => 'executeResponsePipeline',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '8c5ef8ed4b7c8650490fd75d0fe1d05f' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Saloon\\Http',
         'uses' => 
        array (
          'config' => 'Saloon\\Config',
          'method' => 'Saloon\\Enums\\Method',
          'helpers' => 'Saloon\\Helpers\\Helpers',
          'macroable' => 'Saloon\\Traits\\Macroable',
          'urlhelper' => 'Saloon\\Helpers\\URLHelper',
          'conditionable' => 'Saloon\\Traits\\Conditionable',
          'hasmockclient' => 'Saloon\\Traits\\HasMockClient',
          'fakeresponse' => 'Saloon\\Contracts\\FakeResponse',
          'mockclient' => 'Saloon\\Http\\Faking\\MockClient',
          'authenticator' => 'Saloon\\Contracts\\Authenticator',
          'oauthconfig' => 'Saloon\\Helpers\\OAuth2\\OAuthConfig',
          'getuserrequest' => 'Saloon\\Http\\OAuth2\\GetUserRequest',
          'bodyrepository' => 'Saloon\\Contracts\\Body\\BodyRepository',
          'mergebody' => 'Saloon\\Http\\PendingRequest\\MergeBody',
          'mergedelay' => 'Saloon\\Http\\PendingRequest\\MergeDelay',
          'delaymiddleware' => 'Saloon\\Http\\Middleware\\DelayMiddleware',
          'bootplugins' => 'Saloon\\Http\\PendingRequest\\BootPlugins',
          'getaccesstokenrequest' => 'Saloon\\Http\\OAuth2\\GetAccessTokenRequest',
          'authenticatesrequests' => 'Saloon\\Traits\\Auth\\AuthenticatesRequests',
          'validateproperties' => 'Saloon\\Http\\Middleware\\ValidateProperties',
          'getrefreshtokenrequest' => 'Saloon\\Http\\OAuth2\\GetRefreshTokenRequest',
          'determinemockresponse' => 'Saloon\\Http\\Middleware\\DetermineMockResponse',
          'invalidresponseclassexception' => 'Saloon\\Exceptions\\InvalidResponseClassException',
          'fatalrequestexception' => 'Saloon\\Exceptions\\Request\\FatalRequestException',
          'managespsrrequests' => 'Saloon\\Traits\\PendingRequest\\ManagesPsrRequests',
          'mergerequestproperties' => 'Saloon\\Http\\PendingRequest\\MergeRequestProperties',
          'bootconnectorandrequest' => 'Saloon\\Http\\PendingRequest\\BootConnectorAndRequest',
          'getclientcredentialstokenrequest' => 'Saloon\\Http\\OAuth2\\GetClientCredentialsTokenRequest',
          'hasrequestproperties' => 'Saloon\\Traits\\RequestProperties\\HasRequestProperties',
          'authenticatependingrequest' => 'Saloon\\Http\\PendingRequest\\AuthenticatePendingRequest',
          'getclientcredentialstokenbasicauthrequest' => 'Saloon\\Http\\OAuth2\\GetClientCredentialsTokenBasicAuthRequest',
        ),
         'className' => 'Saloon\\Http\\PendingRequest',
         'functionName' => 'executeFatalPipeline',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '91a47f2694cc250f9c5ea2220672c19c' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Saloon\\Http',
         'uses' => 
        array (
          'config' => 'Saloon\\Config',
          'method' => 'Saloon\\Enums\\Method',
          'helpers' => 'Saloon\\Helpers\\Helpers',
          'macroable' => 'Saloon\\Traits\\Macroable',
          'urlhelper' => 'Saloon\\Helpers\\URLHelper',
          'conditionable' => 'Saloon\\Traits\\Conditionable',
          'hasmockclient' => 'Saloon\\Traits\\HasMockClient',
          'fakeresponse' => 'Saloon\\Contracts\\FakeResponse',
          'mockclient' => 'Saloon\\Http\\Faking\\MockClient',
          'authenticator' => 'Saloon\\Contracts\\Authenticator',
          'oauthconfig' => 'Saloon\\Helpers\\OAuth2\\OAuthConfig',
          'getuserrequest' => 'Saloon\\Http\\OAuth2\\GetUserRequest',
          'bodyrepository' => 'Saloon\\Contracts\\Body\\BodyRepository',
          'mergebody' => 'Saloon\\Http\\PendingRequest\\MergeBody',
          'mergedelay' => 'Saloon\\Http\\PendingRequest\\MergeDelay',
          'delaymiddleware' => 'Saloon\\Http\\Middleware\\DelayMiddleware',
          'bootplugins' => 'Saloon\\Http\\PendingRequest\\BootPlugins',
          'getaccesstokenrequest' => 'Saloon\\Http\\OAuth2\\GetAccessTokenRequest',
          'authenticatesrequests' => 'Saloon\\Traits\\Auth\\AuthenticatesRequests',
          'validateproperties' => 'Saloon\\Http\\Middleware\\ValidateProperties',
          'getrefreshtokenrequest' => 'Saloon\\Http\\OAuth2\\GetRefreshTokenRequest',
          'determinemockresponse' => 'Saloon\\Http\\Middleware\\DetermineMockResponse',
          'invalidresponseclassexception' => 'Saloon\\Exceptions\\InvalidResponseClassException',
          'fatalrequestexception' => 'Saloon\\Exceptions\\Request\\FatalRequestException',
          'managespsrrequests' => 'Saloon\\Traits\\PendingRequest\\ManagesPsrRequests',
          'mergerequestproperties' => 'Saloon\\Http\\PendingRequest\\MergeRequestProperties',
          'bootconnectorandrequest' => 'Saloon\\Http\\PendingRequest\\BootConnectorAndRequest',
          'getclientcredentialstokenrequest' => 'Saloon\\Http\\OAuth2\\GetClientCredentialsTokenRequest',
          'hasrequestproperties' => 'Saloon\\Traits\\RequestProperties\\HasRequestProperties',
          'authenticatependingrequest' => 'Saloon\\Http\\PendingRequest\\AuthenticatePendingRequest',
          'getclientcredentialstokenbasicauthrequest' => 'Saloon\\Http\\OAuth2\\GetClientCredentialsTokenBasicAuthRequest',
        ),
         'className' => 'Saloon\\Http\\PendingRequest',
         'functionName' => 'getRequest',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '4a636fdccc28e0940af9f28e6e740d94' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Saloon\\Http',
         'uses' => 
        array (
          'config' => 'Saloon\\Config',
          'method' => 'Saloon\\Enums\\Method',
          'helpers' => 'Saloon\\Helpers\\Helpers',
          'macroable' => 'Saloon\\Traits\\Macroable',
          'urlhelper' => 'Saloon\\Helpers\\URLHelper',
          'conditionable' => 'Saloon\\Traits\\Conditionable',
          'hasmockclient' => 'Saloon\\Traits\\HasMockClient',
          'fakeresponse' => 'Saloon\\Contracts\\FakeResponse',
          'mockclient' => 'Saloon\\Http\\Faking\\MockClient',
          'authenticator' => 'Saloon\\Contracts\\Authenticator',
          'oauthconfig' => 'Saloon\\Helpers\\OAuth2\\OAuthConfig',
          'getuserrequest' => 'Saloon\\Http\\OAuth2\\GetUserRequest',
          'bodyrepository' => 'Saloon\\Contracts\\Body\\BodyRepository',
          'mergebody' => 'Saloon\\Http\\PendingRequest\\MergeBody',
          'mergedelay' => 'Saloon\\Http\\PendingRequest\\MergeDelay',
          'delaymiddleware' => 'Saloon\\Http\\Middleware\\DelayMiddleware',
          'bootplugins' => 'Saloon\\Http\\PendingRequest\\BootPlugins',
          'getaccesstokenrequest' => 'Saloon\\Http\\OAuth2\\GetAccessTokenRequest',
          'authenticatesrequests' => 'Saloon\\Traits\\Auth\\AuthenticatesRequests',
          'validateproperties' => 'Saloon\\Http\\Middleware\\ValidateProperties',
          'getrefreshtokenrequest' => 'Saloon\\Http\\OAuth2\\GetRefreshTokenRequest',
          'determinemockresponse' => 'Saloon\\Http\\Middleware\\DetermineMockResponse',
          'invalidresponseclassexception' => 'Saloon\\Exceptions\\InvalidResponseClassException',
          'fatalrequestexception' => 'Saloon\\Exceptions\\Request\\FatalRequestException',
          'managespsrrequests' => 'Saloon\\Traits\\PendingRequest\\ManagesPsrRequests',
          'mergerequestproperties' => 'Saloon\\Http\\PendingRequest\\MergeRequestProperties',
          'bootconnectorandrequest' => 'Saloon\\Http\\PendingRequest\\BootConnectorAndRequest',
          'getclientcredentialstokenrequest' => 'Saloon\\Http\\OAuth2\\GetClientCredentialsTokenRequest',
          'hasrequestproperties' => 'Saloon\\Traits\\RequestProperties\\HasRequestProperties',
          'authenticatependingrequest' => 'Saloon\\Http\\PendingRequest\\AuthenticatePendingRequest',
          'getclientcredentialstokenbasicauthrequest' => 'Saloon\\Http\\OAuth2\\GetClientCredentialsTokenBasicAuthRequest',
        ),
         'className' => 'Saloon\\Http\\PendingRequest',
         'functionName' => 'getConnector',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '6b6493c63d34d7dade5050d85584d98b' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Saloon\\Http',
         'uses' => 
        array (
          'config' => 'Saloon\\Config',
          'method' => 'Saloon\\Enums\\Method',
          'helpers' => 'Saloon\\Helpers\\Helpers',
          'macroable' => 'Saloon\\Traits\\Macroable',
          'urlhelper' => 'Saloon\\Helpers\\URLHelper',
          'conditionable' => 'Saloon\\Traits\\Conditionable',
          'hasmockclient' => 'Saloon\\Traits\\HasMockClient',
          'fakeresponse' => 'Saloon\\Contracts\\FakeResponse',
          'mockclient' => 'Saloon\\Http\\Faking\\MockClient',
          'authenticator' => 'Saloon\\Contracts\\Authenticator',
          'oauthconfig' => 'Saloon\\Helpers\\OAuth2\\OAuthConfig',
          'getuserrequest' => 'Saloon\\Http\\OAuth2\\GetUserRequest',
          'bodyrepository' => 'Saloon\\Contracts\\Body\\BodyRepository',
          'mergebody' => 'Saloon\\Http\\PendingRequest\\MergeBody',
          'mergedelay' => 'Saloon\\Http\\PendingRequest\\MergeDelay',
          'delaymiddleware' => 'Saloon\\Http\\Middleware\\DelayMiddleware',
          'bootplugins' => 'Saloon\\Http\\PendingRequest\\BootPlugins',
          'getaccesstokenrequest' => 'Saloon\\Http\\OAuth2\\GetAccessTokenRequest',
          'authenticatesrequests' => 'Saloon\\Traits\\Auth\\AuthenticatesRequests',
          'validateproperties' => 'Saloon\\Http\\Middleware\\ValidateProperties',
          'getrefreshtokenrequest' => 'Saloon\\Http\\OAuth2\\GetRefreshTokenRequest',
          'determinemockresponse' => 'Saloon\\Http\\Middleware\\DetermineMockResponse',
          'invalidresponseclassexception' => 'Saloon\\Exceptions\\InvalidResponseClassException',
          'fatalrequestexception' => 'Saloon\\Exceptions\\Request\\FatalRequestException',
          'managespsrrequests' => 'Saloon\\Traits\\PendingRequest\\ManagesPsrRequests',
          'mergerequestproperties' => 'Saloon\\Http\\PendingRequest\\MergeRequestProperties',
          'bootconnectorandrequest' => 'Saloon\\Http\\PendingRequest\\BootConnectorAndRequest',
          'getclientcredentialstokenrequest' => 'Saloon\\Http\\OAuth2\\GetClientCredentialsTokenRequest',
          'hasrequestproperties' => 'Saloon\\Traits\\RequestProperties\\HasRequestProperties',
          'authenticatependingrequest' => 'Saloon\\Http\\PendingRequest\\AuthenticatePendingRequest',
          'getclientcredentialstokenbasicauthrequest' => 'Saloon\\Http\\OAuth2\\GetClientCredentialsTokenBasicAuthRequest',
        ),
         'className' => 'Saloon\\Http\\PendingRequest',
         'functionName' => 'getUrl',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '63f0658fa853245305bee068cc52404a' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Saloon\\Http',
         'uses' => 
        array (
          'config' => 'Saloon\\Config',
          'method' => 'Saloon\\Enums\\Method',
          'helpers' => 'Saloon\\Helpers\\Helpers',
          'macroable' => 'Saloon\\Traits\\Macroable',
          'urlhelper' => 'Saloon\\Helpers\\URLHelper',
          'conditionable' => 'Saloon\\Traits\\Conditionable',
          'hasmockclient' => 'Saloon\\Traits\\HasMockClient',
          'fakeresponse' => 'Saloon\\Contracts\\FakeResponse',
          'mockclient' => 'Saloon\\Http\\Faking\\MockClient',
          'authenticator' => 'Saloon\\Contracts\\Authenticator',
          'oauthconfig' => 'Saloon\\Helpers\\OAuth2\\OAuthConfig',
          'getuserrequest' => 'Saloon\\Http\\OAuth2\\GetUserRequest',
          'bodyrepository' => 'Saloon\\Contracts\\Body\\BodyRepository',
          'mergebody' => 'Saloon\\Http\\PendingRequest\\MergeBody',
          'mergedelay' => 'Saloon\\Http\\PendingRequest\\MergeDelay',
          'delaymiddleware' => 'Saloon\\Http\\Middleware\\DelayMiddleware',
          'bootplugins' => 'Saloon\\Http\\PendingRequest\\BootPlugins',
          'getaccesstokenrequest' => 'Saloon\\Http\\OAuth2\\GetAccessTokenRequest',
          'authenticatesrequests' => 'Saloon\\Traits\\Auth\\AuthenticatesRequests',
          'validateproperties' => 'Saloon\\Http\\Middleware\\ValidateProperties',
          'getrefreshtokenrequest' => 'Saloon\\Http\\OAuth2\\GetRefreshTokenRequest',
          'determinemockresponse' => 'Saloon\\Http\\Middleware\\DetermineMockResponse',
          'invalidresponseclassexception' => 'Saloon\\Exceptions\\InvalidResponseClassException',
          'fatalrequestexception' => 'Saloon\\Exceptions\\Request\\FatalRequestException',
          'managespsrrequests' => 'Saloon\\Traits\\PendingRequest\\ManagesPsrRequests',
          'mergerequestproperties' => 'Saloon\\Http\\PendingRequest\\MergeRequestProperties',
          'bootconnectorandrequest' => 'Saloon\\Http\\PendingRequest\\BootConnectorAndRequest',
          'getclientcredentialstokenrequest' => 'Saloon\\Http\\OAuth2\\GetClientCredentialsTokenRequest',
          'hasrequestproperties' => 'Saloon\\Traits\\RequestProperties\\HasRequestProperties',
          'authenticatependingrequest' => 'Saloon\\Http\\PendingRequest\\AuthenticatePendingRequest',
          'getclientcredentialstokenbasicauthrequest' => 'Saloon\\Http\\OAuth2\\GetClientCredentialsTokenBasicAuthRequest',
        ),
         'className' => 'Saloon\\Http\\PendingRequest',
         'functionName' => 'setUrl',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      'd9e1a547b7637f16e8e7f860e4fa19cf' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Saloon\\Http',
         'uses' => 
        array (
          'config' => 'Saloon\\Config',
          'method' => 'Saloon\\Enums\\Method',
          'helpers' => 'Saloon\\Helpers\\Helpers',
          'macroable' => 'Saloon\\Traits\\Macroable',
          'urlhelper' => 'Saloon\\Helpers\\URLHelper',
          'conditionable' => 'Saloon\\Traits\\Conditionable',
          'hasmockclient' => 'Saloon\\Traits\\HasMockClient',
          'fakeresponse' => 'Saloon\\Contracts\\FakeResponse',
          'mockclient' => 'Saloon\\Http\\Faking\\MockClient',
          'authenticator' => 'Saloon\\Contracts\\Authenticator',
          'oauthconfig' => 'Saloon\\Helpers\\OAuth2\\OAuthConfig',
          'getuserrequest' => 'Saloon\\Http\\OAuth2\\GetUserRequest',
          'bodyrepository' => 'Saloon\\Contracts\\Body\\BodyRepository',
          'mergebody' => 'Saloon\\Http\\PendingRequest\\MergeBody',
          'mergedelay' => 'Saloon\\Http\\PendingRequest\\MergeDelay',
          'delaymiddleware' => 'Saloon\\Http\\Middleware\\DelayMiddleware',
          'bootplugins' => 'Saloon\\Http\\PendingRequest\\BootPlugins',
          'getaccesstokenrequest' => 'Saloon\\Http\\OAuth2\\GetAccessTokenRequest',
          'authenticatesrequests' => 'Saloon\\Traits\\Auth\\AuthenticatesRequests',
          'validateproperties' => 'Saloon\\Http\\Middleware\\ValidateProperties',
          'getrefreshtokenrequest' => 'Saloon\\Http\\OAuth2\\GetRefreshTokenRequest',
          'determinemockresponse' => 'Saloon\\Http\\Middleware\\DetermineMockResponse',
          'invalidresponseclassexception' => 'Saloon\\Exceptions\\InvalidResponseClassException',
          'fatalrequestexception' => 'Saloon\\Exceptions\\Request\\FatalRequestException',
          'managespsrrequests' => 'Saloon\\Traits\\PendingRequest\\ManagesPsrRequests',
          'mergerequestproperties' => 'Saloon\\Http\\PendingRequest\\MergeRequestProperties',
          'bootconnectorandrequest' => 'Saloon\\Http\\PendingRequest\\BootConnectorAndRequest',
          'getclientcredentialstokenrequest' => 'Saloon\\Http\\OAuth2\\GetClientCredentialsTokenRequest',
          'hasrequestproperties' => 'Saloon\\Traits\\RequestProperties\\HasRequestProperties',
          'authenticatependingrequest' => 'Saloon\\Http\\PendingRequest\\AuthenticatePendingRequest',
          'getclientcredentialstokenbasicauthrequest' => 'Saloon\\Http\\OAuth2\\GetClientCredentialsTokenBasicAuthRequest',
        ),
         'className' => 'Saloon\\Http\\PendingRequest',
         'functionName' => 'getMethod',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '6d81dcc68de8c1fa24f90c3286ac17aa' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Saloon\\Http',
         'uses' => 
        array (
          'config' => 'Saloon\\Config',
          'method' => 'Saloon\\Enums\\Method',
          'helpers' => 'Saloon\\Helpers\\Helpers',
          'macroable' => 'Saloon\\Traits\\Macroable',
          'urlhelper' => 'Saloon\\Helpers\\URLHelper',
          'conditionable' => 'Saloon\\Traits\\Conditionable',
          'hasmockclient' => 'Saloon\\Traits\\HasMockClient',
          'fakeresponse' => 'Saloon\\Contracts\\FakeResponse',
          'mockclient' => 'Saloon\\Http\\Faking\\MockClient',
          'authenticator' => 'Saloon\\Contracts\\Authenticator',
          'oauthconfig' => 'Saloon\\Helpers\\OAuth2\\OAuthConfig',
          'getuserrequest' => 'Saloon\\Http\\OAuth2\\GetUserRequest',
          'bodyrepository' => 'Saloon\\Contracts\\Body\\BodyRepository',
          'mergebody' => 'Saloon\\Http\\PendingRequest\\MergeBody',
          'mergedelay' => 'Saloon\\Http\\PendingRequest\\MergeDelay',
          'delaymiddleware' => 'Saloon\\Http\\Middleware\\DelayMiddleware',
          'bootplugins' => 'Saloon\\Http\\PendingRequest\\BootPlugins',
          'getaccesstokenrequest' => 'Saloon\\Http\\OAuth2\\GetAccessTokenRequest',
          'authenticatesrequests' => 'Saloon\\Traits\\Auth\\AuthenticatesRequests',
          'validateproperties' => 'Saloon\\Http\\Middleware\\ValidateProperties',
          'getrefreshtokenrequest' => 'Saloon\\Http\\OAuth2\\GetRefreshTokenRequest',
          'determinemockresponse' => 'Saloon\\Http\\Middleware\\DetermineMockResponse',
          'invalidresponseclassexception' => 'Saloon\\Exceptions\\InvalidResponseClassException',
          'fatalrequestexception' => 'Saloon\\Exceptions\\Request\\FatalRequestException',
          'managespsrrequests' => 'Saloon\\Traits\\PendingRequest\\ManagesPsrRequests',
          'mergerequestproperties' => 'Saloon\\Http\\PendingRequest\\MergeRequestProperties',
          'bootconnectorandrequest' => 'Saloon\\Http\\PendingRequest\\BootConnectorAndRequest',
          'getclientcredentialstokenrequest' => 'Saloon\\Http\\OAuth2\\GetClientCredentialsTokenRequest',
          'hasrequestproperties' => 'Saloon\\Traits\\RequestProperties\\HasRequestProperties',
          'authenticatependingrequest' => 'Saloon\\Http\\PendingRequest\\AuthenticatePendingRequest',
          'getclientcredentialstokenbasicauthrequest' => 'Saloon\\Http\\OAuth2\\GetClientCredentialsTokenBasicAuthRequest',
        ),
         'className' => 'Saloon\\Http\\PendingRequest',
         'functionName' => 'setMethod',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '59044dfcc86e44a0819c03b1cae798ef' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Saloon\\Http',
         'uses' => 
        array (
          'config' => 'Saloon\\Config',
          'method' => 'Saloon\\Enums\\Method',
          'helpers' => 'Saloon\\Helpers\\Helpers',
          'macroable' => 'Saloon\\Traits\\Macroable',
          'urlhelper' => 'Saloon\\Helpers\\URLHelper',
          'conditionable' => 'Saloon\\Traits\\Conditionable',
          'hasmockclient' => 'Saloon\\Traits\\HasMockClient',
          'fakeresponse' => 'Saloon\\Contracts\\FakeResponse',
          'mockclient' => 'Saloon\\Http\\Faking\\MockClient',
          'authenticator' => 'Saloon\\Contracts\\Authenticator',
          'oauthconfig' => 'Saloon\\Helpers\\OAuth2\\OAuthConfig',
          'getuserrequest' => 'Saloon\\Http\\OAuth2\\GetUserRequest',
          'bodyrepository' => 'Saloon\\Contracts\\Body\\BodyRepository',
          'mergebody' => 'Saloon\\Http\\PendingRequest\\MergeBody',
          'mergedelay' => 'Saloon\\Http\\PendingRequest\\MergeDelay',
          'delaymiddleware' => 'Saloon\\Http\\Middleware\\DelayMiddleware',
          'bootplugins' => 'Saloon\\Http\\PendingRequest\\BootPlugins',
          'getaccesstokenrequest' => 'Saloon\\Http\\OAuth2\\GetAccessTokenRequest',
          'authenticatesrequests' => 'Saloon\\Traits\\Auth\\AuthenticatesRequests',
          'validateproperties' => 'Saloon\\Http\\Middleware\\ValidateProperties',
          'getrefreshtokenrequest' => 'Saloon\\Http\\OAuth2\\GetRefreshTokenRequest',
          'determinemockresponse' => 'Saloon\\Http\\Middleware\\DetermineMockResponse',
          'invalidresponseclassexception' => 'Saloon\\Exceptions\\InvalidResponseClassException',
          'fatalrequestexception' => 'Saloon\\Exceptions\\Request\\FatalRequestException',
          'managespsrrequests' => 'Saloon\\Traits\\PendingRequest\\ManagesPsrRequests',
          'mergerequestproperties' => 'Saloon\\Http\\PendingRequest\\MergeRequestProperties',
          'bootconnectorandrequest' => 'Saloon\\Http\\PendingRequest\\BootConnectorAndRequest',
          'getclientcredentialstokenrequest' => 'Saloon\\Http\\OAuth2\\GetClientCredentialsTokenRequest',
          'hasrequestproperties' => 'Saloon\\Traits\\RequestProperties\\HasRequestProperties',
          'authenticatependingrequest' => 'Saloon\\Http\\PendingRequest\\AuthenticatePendingRequest',
          'getclientcredentialstokenbasicauthrequest' => 'Saloon\\Http\\OAuth2\\GetClientCredentialsTokenBasicAuthRequest',
        ),
         'className' => 'Saloon\\Http\\PendingRequest',
         'functionName' => 'body',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '808ed89d7c700159e7449a0aee3dcae4' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Saloon\\Http',
         'uses' => 
        array (
          'config' => 'Saloon\\Config',
          'method' => 'Saloon\\Enums\\Method',
          'helpers' => 'Saloon\\Helpers\\Helpers',
          'macroable' => 'Saloon\\Traits\\Macroable',
          'urlhelper' => 'Saloon\\Helpers\\URLHelper',
          'conditionable' => 'Saloon\\Traits\\Conditionable',
          'hasmockclient' => 'Saloon\\Traits\\HasMockClient',
          'fakeresponse' => 'Saloon\\Contracts\\FakeResponse',
          'mockclient' => 'Saloon\\Http\\Faking\\MockClient',
          'authenticator' => 'Saloon\\Contracts\\Authenticator',
          'oauthconfig' => 'Saloon\\Helpers\\OAuth2\\OAuthConfig',
          'getuserrequest' => 'Saloon\\Http\\OAuth2\\GetUserRequest',
          'bodyrepository' => 'Saloon\\Contracts\\Body\\BodyRepository',
          'mergebody' => 'Saloon\\Http\\PendingRequest\\MergeBody',
          'mergedelay' => 'Saloon\\Http\\PendingRequest\\MergeDelay',
          'delaymiddleware' => 'Saloon\\Http\\Middleware\\DelayMiddleware',
          'bootplugins' => 'Saloon\\Http\\PendingRequest\\BootPlugins',
          'getaccesstokenrequest' => 'Saloon\\Http\\OAuth2\\GetAccessTokenRequest',
          'authenticatesrequests' => 'Saloon\\Traits\\Auth\\AuthenticatesRequests',
          'validateproperties' => 'Saloon\\Http\\Middleware\\ValidateProperties',
          'getrefreshtokenrequest' => 'Saloon\\Http\\OAuth2\\GetRefreshTokenRequest',
          'determinemockresponse' => 'Saloon\\Http\\Middleware\\DetermineMockResponse',
          'invalidresponseclassexception' => 'Saloon\\Exceptions\\InvalidResponseClassException',
          'fatalrequestexception' => 'Saloon\\Exceptions\\Request\\FatalRequestException',
          'managespsrrequests' => 'Saloon\\Traits\\PendingRequest\\ManagesPsrRequests',
          'mergerequestproperties' => 'Saloon\\Http\\PendingRequest\\MergeRequestProperties',
          'bootconnectorandrequest' => 'Saloon\\Http\\PendingRequest\\BootConnectorAndRequest',
          'getclientcredentialstokenrequest' => 'Saloon\\Http\\OAuth2\\GetClientCredentialsTokenRequest',
          'hasrequestproperties' => 'Saloon\\Traits\\RequestProperties\\HasRequestProperties',
          'authenticatependingrequest' => 'Saloon\\Http\\PendingRequest\\AuthenticatePendingRequest',
          'getclientcredentialstokenbasicauthrequest' => 'Saloon\\Http\\OAuth2\\GetClientCredentialsTokenBasicAuthRequest',
        ),
         'className' => 'Saloon\\Http\\PendingRequest',
         'functionName' => 'setBody',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      'a3a13ef9c334e28fc71a02441cf86c07' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Saloon\\Http',
         'uses' => 
        array (
          'config' => 'Saloon\\Config',
          'method' => 'Saloon\\Enums\\Method',
          'helpers' => 'Saloon\\Helpers\\Helpers',
          'macroable' => 'Saloon\\Traits\\Macroable',
          'urlhelper' => 'Saloon\\Helpers\\URLHelper',
          'conditionable' => 'Saloon\\Traits\\Conditionable',
          'hasmockclient' => 'Saloon\\Traits\\HasMockClient',
          'fakeresponse' => 'Saloon\\Contracts\\FakeResponse',
          'mockclient' => 'Saloon\\Http\\Faking\\MockClient',
          'authenticator' => 'Saloon\\Contracts\\Authenticator',
          'oauthconfig' => 'Saloon\\Helpers\\OAuth2\\OAuthConfig',
          'getuserrequest' => 'Saloon\\Http\\OAuth2\\GetUserRequest',
          'bodyrepository' => 'Saloon\\Contracts\\Body\\BodyRepository',
          'mergebody' => 'Saloon\\Http\\PendingRequest\\MergeBody',
          'mergedelay' => 'Saloon\\Http\\PendingRequest\\MergeDelay',
          'delaymiddleware' => 'Saloon\\Http\\Middleware\\DelayMiddleware',
          'bootplugins' => 'Saloon\\Http\\PendingRequest\\BootPlugins',
          'getaccesstokenrequest' => 'Saloon\\Http\\OAuth2\\GetAccessTokenRequest',
          'authenticatesrequests' => 'Saloon\\Traits\\Auth\\AuthenticatesRequests',
          'validateproperties' => 'Saloon\\Http\\Middleware\\ValidateProperties',
          'getrefreshtokenrequest' => 'Saloon\\Http\\OAuth2\\GetRefreshTokenRequest',
          'determinemockresponse' => 'Saloon\\Http\\Middleware\\DetermineMockResponse',
          'invalidresponseclassexception' => 'Saloon\\Exceptions\\InvalidResponseClassException',
          'fatalrequestexception' => 'Saloon\\Exceptions\\Request\\FatalRequestException',
          'managespsrrequests' => 'Saloon\\Traits\\PendingRequest\\ManagesPsrRequests',
          'mergerequestproperties' => 'Saloon\\Http\\PendingRequest\\MergeRequestProperties',
          'bootconnectorandrequest' => 'Saloon\\Http\\PendingRequest\\BootConnectorAndRequest',
          'getclientcredentialstokenrequest' => 'Saloon\\Http\\OAuth2\\GetClientCredentialsTokenRequest',
          'hasrequestproperties' => 'Saloon\\Traits\\RequestProperties\\HasRequestProperties',
          'authenticatependingrequest' => 'Saloon\\Http\\PendingRequest\\AuthenticatePendingRequest',
          'getclientcredentialstokenbasicauthrequest' => 'Saloon\\Http\\OAuth2\\GetClientCredentialsTokenBasicAuthRequest',
        ),
         'className' => 'Saloon\\Http\\PendingRequest',
         'functionName' => 'getFakeResponse',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '44d1c2019ada61f4a79ff2d6d4489519' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Saloon\\Http',
         'uses' => 
        array (
          'config' => 'Saloon\\Config',
          'method' => 'Saloon\\Enums\\Method',
          'helpers' => 'Saloon\\Helpers\\Helpers',
          'macroable' => 'Saloon\\Traits\\Macroable',
          'urlhelper' => 'Saloon\\Helpers\\URLHelper',
          'conditionable' => 'Saloon\\Traits\\Conditionable',
          'hasmockclient' => 'Saloon\\Traits\\HasMockClient',
          'fakeresponse' => 'Saloon\\Contracts\\FakeResponse',
          'mockclient' => 'Saloon\\Http\\Faking\\MockClient',
          'authenticator' => 'Saloon\\Contracts\\Authenticator',
          'oauthconfig' => 'Saloon\\Helpers\\OAuth2\\OAuthConfig',
          'getuserrequest' => 'Saloon\\Http\\OAuth2\\GetUserRequest',
          'bodyrepository' => 'Saloon\\Contracts\\Body\\BodyRepository',
          'mergebody' => 'Saloon\\Http\\PendingRequest\\MergeBody',
          'mergedelay' => 'Saloon\\Http\\PendingRequest\\MergeDelay',
          'delaymiddleware' => 'Saloon\\Http\\Middleware\\DelayMiddleware',
          'bootplugins' => 'Saloon\\Http\\PendingRequest\\BootPlugins',
          'getaccesstokenrequest' => 'Saloon\\Http\\OAuth2\\GetAccessTokenRequest',
          'authenticatesrequests' => 'Saloon\\Traits\\Auth\\AuthenticatesRequests',
          'validateproperties' => 'Saloon\\Http\\Middleware\\ValidateProperties',
          'getrefreshtokenrequest' => 'Saloon\\Http\\OAuth2\\GetRefreshTokenRequest',
          'determinemockresponse' => 'Saloon\\Http\\Middleware\\DetermineMockResponse',
          'invalidresponseclassexception' => 'Saloon\\Exceptions\\InvalidResponseClassException',
          'fatalrequestexception' => 'Saloon\\Exceptions\\Request\\FatalRequestException',
          'managespsrrequests' => 'Saloon\\Traits\\PendingRequest\\ManagesPsrRequests',
          'mergerequestproperties' => 'Saloon\\Http\\PendingRequest\\MergeRequestProperties',
          'bootconnectorandrequest' => 'Saloon\\Http\\PendingRequest\\BootConnectorAndRequest',
          'getclientcredentialstokenrequest' => 'Saloon\\Http\\OAuth2\\GetClientCredentialsTokenRequest',
          'hasrequestproperties' => 'Saloon\\Traits\\RequestProperties\\HasRequestProperties',
          'authenticatependingrequest' => 'Saloon\\Http\\PendingRequest\\AuthenticatePendingRequest',
          'getclientcredentialstokenbasicauthrequest' => 'Saloon\\Http\\OAuth2\\GetClientCredentialsTokenBasicAuthRequest',
        ),
         'className' => 'Saloon\\Http\\PendingRequest',
         'functionName' => 'setFakeResponse',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '8153590a5ef8804514c8e8b5783006e3' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Saloon\\Http',
         'uses' => 
        array (
          'config' => 'Saloon\\Config',
          'method' => 'Saloon\\Enums\\Method',
          'helpers' => 'Saloon\\Helpers\\Helpers',
          'macroable' => 'Saloon\\Traits\\Macroable',
          'urlhelper' => 'Saloon\\Helpers\\URLHelper',
          'conditionable' => 'Saloon\\Traits\\Conditionable',
          'hasmockclient' => 'Saloon\\Traits\\HasMockClient',
          'fakeresponse' => 'Saloon\\Contracts\\FakeResponse',
          'mockclient' => 'Saloon\\Http\\Faking\\MockClient',
          'authenticator' => 'Saloon\\Contracts\\Authenticator',
          'oauthconfig' => 'Saloon\\Helpers\\OAuth2\\OAuthConfig',
          'getuserrequest' => 'Saloon\\Http\\OAuth2\\GetUserRequest',
          'bodyrepository' => 'Saloon\\Contracts\\Body\\BodyRepository',
          'mergebody' => 'Saloon\\Http\\PendingRequest\\MergeBody',
          'mergedelay' => 'Saloon\\Http\\PendingRequest\\MergeDelay',
          'delaymiddleware' => 'Saloon\\Http\\Middleware\\DelayMiddleware',
          'bootplugins' => 'Saloon\\Http\\PendingRequest\\BootPlugins',
          'getaccesstokenrequest' => 'Saloon\\Http\\OAuth2\\GetAccessTokenRequest',
          'authenticatesrequests' => 'Saloon\\Traits\\Auth\\AuthenticatesRequests',
          'validateproperties' => 'Saloon\\Http\\Middleware\\ValidateProperties',
          'getrefreshtokenrequest' => 'Saloon\\Http\\OAuth2\\GetRefreshTokenRequest',
          'determinemockresponse' => 'Saloon\\Http\\Middleware\\DetermineMockResponse',
          'invalidresponseclassexception' => 'Saloon\\Exceptions\\InvalidResponseClassException',
          'fatalrequestexception' => 'Saloon\\Exceptions\\Request\\FatalRequestException',
          'managespsrrequests' => 'Saloon\\Traits\\PendingRequest\\ManagesPsrRequests',
          'mergerequestproperties' => 'Saloon\\Http\\PendingRequest\\MergeRequestProperties',
          'bootconnectorandrequest' => 'Saloon\\Http\\PendingRequest\\BootConnectorAndRequest',
          'getclientcredentialstokenrequest' => 'Saloon\\Http\\OAuth2\\GetClientCredentialsTokenRequest',
          'hasrequestproperties' => 'Saloon\\Traits\\RequestProperties\\HasRequestProperties',
          'authenticatependingrequest' => 'Saloon\\Http\\PendingRequest\\AuthenticatePendingRequest',
          'getclientcredentialstokenbasicauthrequest' => 'Saloon\\Http\\OAuth2\\GetClientCredentialsTokenBasicAuthRequest',
        ),
         'className' => 'Saloon\\Http\\PendingRequest',
         'functionName' => 'hasFakeResponse',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '6ed3532f653c927465a46eb1a1062d0e' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Saloon\\Http',
         'uses' => 
        array (
          'config' => 'Saloon\\Config',
          'method' => 'Saloon\\Enums\\Method',
          'helpers' => 'Saloon\\Helpers\\Helpers',
          'macroable' => 'Saloon\\Traits\\Macroable',
          'urlhelper' => 'Saloon\\Helpers\\URLHelper',
          'conditionable' => 'Saloon\\Traits\\Conditionable',
          'hasmockclient' => 'Saloon\\Traits\\HasMockClient',
          'fakeresponse' => 'Saloon\\Contracts\\FakeResponse',
          'mockclient' => 'Saloon\\Http\\Faking\\MockClient',
          'authenticator' => 'Saloon\\Contracts\\Authenticator',
          'oauthconfig' => 'Saloon\\Helpers\\OAuth2\\OAuthConfig',
          'getuserrequest' => 'Saloon\\Http\\OAuth2\\GetUserRequest',
          'bodyrepository' => 'Saloon\\Contracts\\Body\\BodyRepository',
          'mergebody' => 'Saloon\\Http\\PendingRequest\\MergeBody',
          'mergedelay' => 'Saloon\\Http\\PendingRequest\\MergeDelay',
          'delaymiddleware' => 'Saloon\\Http\\Middleware\\DelayMiddleware',
          'bootplugins' => 'Saloon\\Http\\PendingRequest\\BootPlugins',
          'getaccesstokenrequest' => 'Saloon\\Http\\OAuth2\\GetAccessTokenRequest',
          'authenticatesrequests' => 'Saloon\\Traits\\Auth\\AuthenticatesRequests',
          'validateproperties' => 'Saloon\\Http\\Middleware\\ValidateProperties',
          'getrefreshtokenrequest' => 'Saloon\\Http\\OAuth2\\GetRefreshTokenRequest',
          'determinemockresponse' => 'Saloon\\Http\\Middleware\\DetermineMockResponse',
          'invalidresponseclassexception' => 'Saloon\\Exceptions\\InvalidResponseClassException',
          'fatalrequestexception' => 'Saloon\\Exceptions\\Request\\FatalRequestException',
          'managespsrrequests' => 'Saloon\\Traits\\PendingRequest\\ManagesPsrRequests',
          'mergerequestproperties' => 'Saloon\\Http\\PendingRequest\\MergeRequestProperties',
          'bootconnectorandrequest' => 'Saloon\\Http\\PendingRequest\\BootConnectorAndRequest',
          'getclientcredentialstokenrequest' => 'Saloon\\Http\\OAuth2\\GetClientCredentialsTokenRequest',
          'hasrequestproperties' => 'Saloon\\Traits\\RequestProperties\\HasRequestProperties',
          'authenticatependingrequest' => 'Saloon\\Http\\PendingRequest\\AuthenticatePendingRequest',
          'getclientcredentialstokenbasicauthrequest' => 'Saloon\\Http\\OAuth2\\GetClientCredentialsTokenBasicAuthRequest',
        ),
         'className' => 'Saloon\\Http\\PendingRequest',
         'functionName' => 'isAsynchronous',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '86c17ba96d1ad6607a6500c7205cd768' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Saloon\\Http',
         'uses' => 
        array (
          'config' => 'Saloon\\Config',
          'method' => 'Saloon\\Enums\\Method',
          'helpers' => 'Saloon\\Helpers\\Helpers',
          'macroable' => 'Saloon\\Traits\\Macroable',
          'urlhelper' => 'Saloon\\Helpers\\URLHelper',
          'conditionable' => 'Saloon\\Traits\\Conditionable',
          'hasmockclient' => 'Saloon\\Traits\\HasMockClient',
          'fakeresponse' => 'Saloon\\Contracts\\FakeResponse',
          'mockclient' => 'Saloon\\Http\\Faking\\MockClient',
          'authenticator' => 'Saloon\\Contracts\\Authenticator',
          'oauthconfig' => 'Saloon\\Helpers\\OAuth2\\OAuthConfig',
          'getuserrequest' => 'Saloon\\Http\\OAuth2\\GetUserRequest',
          'bodyrepository' => 'Saloon\\Contracts\\Body\\BodyRepository',
          'mergebody' => 'Saloon\\Http\\PendingRequest\\MergeBody',
          'mergedelay' => 'Saloon\\Http\\PendingRequest\\MergeDelay',
          'delaymiddleware' => 'Saloon\\Http\\Middleware\\DelayMiddleware',
          'bootplugins' => 'Saloon\\Http\\PendingRequest\\BootPlugins',
          'getaccesstokenrequest' => 'Saloon\\Http\\OAuth2\\GetAccessTokenRequest',
          'authenticatesrequests' => 'Saloon\\Traits\\Auth\\AuthenticatesRequests',
          'validateproperties' => 'Saloon\\Http\\Middleware\\ValidateProperties',
          'getrefreshtokenrequest' => 'Saloon\\Http\\OAuth2\\GetRefreshTokenRequest',
          'determinemockresponse' => 'Saloon\\Http\\Middleware\\DetermineMockResponse',
          'invalidresponseclassexception' => 'Saloon\\Exceptions\\InvalidResponseClassException',
          'fatalrequestexception' => 'Saloon\\Exceptions\\Request\\FatalRequestException',
          'managespsrrequests' => 'Saloon\\Traits\\PendingRequest\\ManagesPsrRequests',
          'mergerequestproperties' => 'Saloon\\Http\\PendingRequest\\MergeRequestProperties',
          'bootconnectorandrequest' => 'Saloon\\Http\\PendingRequest\\BootConnectorAndRequest',
          'getclientcredentialstokenrequest' => 'Saloon\\Http\\OAuth2\\GetClientCredentialsTokenRequest',
          'hasrequestproperties' => 'Saloon\\Traits\\RequestProperties\\HasRequestProperties',
          'authenticatependingrequest' => 'Saloon\\Http\\PendingRequest\\AuthenticatePendingRequest',
          'getclientcredentialstokenbasicauthrequest' => 'Saloon\\Http\\OAuth2\\GetClientCredentialsTokenBasicAuthRequest',
        ),
         'className' => 'Saloon\\Http\\PendingRequest',
         'functionName' => 'setAsynchronous',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      'ec4071816c382bd0f1e999898097ba27' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Saloon\\Http',
         'uses' => 
        array (
          'config' => 'Saloon\\Config',
          'method' => 'Saloon\\Enums\\Method',
          'helpers' => 'Saloon\\Helpers\\Helpers',
          'macroable' => 'Saloon\\Traits\\Macroable',
          'urlhelper' => 'Saloon\\Helpers\\URLHelper',
          'conditionable' => 'Saloon\\Traits\\Conditionable',
          'hasmockclient' => 'Saloon\\Traits\\HasMockClient',
          'fakeresponse' => 'Saloon\\Contracts\\FakeResponse',
          'mockclient' => 'Saloon\\Http\\Faking\\MockClient',
          'authenticator' => 'Saloon\\Contracts\\Authenticator',
          'oauthconfig' => 'Saloon\\Helpers\\OAuth2\\OAuthConfig',
          'getuserrequest' => 'Saloon\\Http\\OAuth2\\GetUserRequest',
          'bodyrepository' => 'Saloon\\Contracts\\Body\\BodyRepository',
          'mergebody' => 'Saloon\\Http\\PendingRequest\\MergeBody',
          'mergedelay' => 'Saloon\\Http\\PendingRequest\\MergeDelay',
          'delaymiddleware' => 'Saloon\\Http\\Middleware\\DelayMiddleware',
          'bootplugins' => 'Saloon\\Http\\PendingRequest\\BootPlugins',
          'getaccesstokenrequest' => 'Saloon\\Http\\OAuth2\\GetAccessTokenRequest',
          'authenticatesrequests' => 'Saloon\\Traits\\Auth\\AuthenticatesRequests',
          'validateproperties' => 'Saloon\\Http\\Middleware\\ValidateProperties',
          'getrefreshtokenrequest' => 'Saloon\\Http\\OAuth2\\GetRefreshTokenRequest',
          'determinemockresponse' => 'Saloon\\Http\\Middleware\\DetermineMockResponse',
          'invalidresponseclassexception' => 'Saloon\\Exceptions\\InvalidResponseClassException',
          'fatalrequestexception' => 'Saloon\\Exceptions\\Request\\FatalRequestException',
          'managespsrrequests' => 'Saloon\\Traits\\PendingRequest\\ManagesPsrRequests',
          'mergerequestproperties' => 'Saloon\\Http\\PendingRequest\\MergeRequestProperties',
          'bootconnectorandrequest' => 'Saloon\\Http\\PendingRequest\\BootConnectorAndRequest',
          'getclientcredentialstokenrequest' => 'Saloon\\Http\\OAuth2\\GetClientCredentialsTokenRequest',
          'hasrequestproperties' => 'Saloon\\Traits\\RequestProperties\\HasRequestProperties',
          'authenticatependingrequest' => 'Saloon\\Http\\PendingRequest\\AuthenticatePendingRequest',
          'getclientcredentialstokenbasicauthrequest' => 'Saloon\\Http\\OAuth2\\GetClientCredentialsTokenBasicAuthRequest',
        ),
         'className' => 'Saloon\\Http\\PendingRequest',
         'functionName' => 'getResponseClass',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '84c49f2ad98149f0937e2c53ddbe8721' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Saloon\\Http',
         'uses' => 
        array (
          'config' => 'Saloon\\Config',
          'method' => 'Saloon\\Enums\\Method',
          'helpers' => 'Saloon\\Helpers\\Helpers',
          'macroable' => 'Saloon\\Traits\\Macroable',
          'urlhelper' => 'Saloon\\Helpers\\URLHelper',
          'conditionable' => 'Saloon\\Traits\\Conditionable',
          'hasmockclient' => 'Saloon\\Traits\\HasMockClient',
          'fakeresponse' => 'Saloon\\Contracts\\FakeResponse',
          'mockclient' => 'Saloon\\Http\\Faking\\MockClient',
          'authenticator' => 'Saloon\\Contracts\\Authenticator',
          'oauthconfig' => 'Saloon\\Helpers\\OAuth2\\OAuthConfig',
          'getuserrequest' => 'Saloon\\Http\\OAuth2\\GetUserRequest',
          'bodyrepository' => 'Saloon\\Contracts\\Body\\BodyRepository',
          'mergebody' => 'Saloon\\Http\\PendingRequest\\MergeBody',
          'mergedelay' => 'Saloon\\Http\\PendingRequest\\MergeDelay',
          'delaymiddleware' => 'Saloon\\Http\\Middleware\\DelayMiddleware',
          'bootplugins' => 'Saloon\\Http\\PendingRequest\\BootPlugins',
          'getaccesstokenrequest' => 'Saloon\\Http\\OAuth2\\GetAccessTokenRequest',
          'authenticatesrequests' => 'Saloon\\Traits\\Auth\\AuthenticatesRequests',
          'validateproperties' => 'Saloon\\Http\\Middleware\\ValidateProperties',
          'getrefreshtokenrequest' => 'Saloon\\Http\\OAuth2\\GetRefreshTokenRequest',
          'determinemockresponse' => 'Saloon\\Http\\Middleware\\DetermineMockResponse',
          'invalidresponseclassexception' => 'Saloon\\Exceptions\\InvalidResponseClassException',
          'fatalrequestexception' => 'Saloon\\Exceptions\\Request\\FatalRequestException',
          'managespsrrequests' => 'Saloon\\Traits\\PendingRequest\\ManagesPsrRequests',
          'mergerequestproperties' => 'Saloon\\Http\\PendingRequest\\MergeRequestProperties',
          'bootconnectorandrequest' => 'Saloon\\Http\\PendingRequest\\BootConnectorAndRequest',
          'getclientcredentialstokenrequest' => 'Saloon\\Http\\OAuth2\\GetClientCredentialsTokenRequest',
          'hasrequestproperties' => 'Saloon\\Traits\\RequestProperties\\HasRequestProperties',
          'authenticatependingrequest' => 'Saloon\\Http\\PendingRequest\\AuthenticatePendingRequest',
          'getclientcredentialstokenbasicauthrequest' => 'Saloon\\Http\\OAuth2\\GetClientCredentialsTokenBasicAuthRequest',
        ),
         'className' => 'Saloon\\Http\\PendingRequest',
         'functionName' => 'tap',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      'cd92dfa4da9f6b381eea5538c80a5d40' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Saloon\\Http',
         'uses' => 
        array (
          'config' => 'Saloon\\Config',
          'method' => 'Saloon\\Enums\\Method',
          'helpers' => 'Saloon\\Helpers\\Helpers',
          'macroable' => 'Saloon\\Traits\\Macroable',
          'urlhelper' => 'Saloon\\Helpers\\URLHelper',
          'conditionable' => 'Saloon\\Traits\\Conditionable',
          'hasmockclient' => 'Saloon\\Traits\\HasMockClient',
          'fakeresponse' => 'Saloon\\Contracts\\FakeResponse',
          'mockclient' => 'Saloon\\Http\\Faking\\MockClient',
          'authenticator' => 'Saloon\\Contracts\\Authenticator',
          'oauthconfig' => 'Saloon\\Helpers\\OAuth2\\OAuthConfig',
          'getuserrequest' => 'Saloon\\Http\\OAuth2\\GetUserRequest',
          'bodyrepository' => 'Saloon\\Contracts\\Body\\BodyRepository',
          'mergebody' => 'Saloon\\Http\\PendingRequest\\MergeBody',
          'mergedelay' => 'Saloon\\Http\\PendingRequest\\MergeDelay',
          'delaymiddleware' => 'Saloon\\Http\\Middleware\\DelayMiddleware',
          'bootplugins' => 'Saloon\\Http\\PendingRequest\\BootPlugins',
          'getaccesstokenrequest' => 'Saloon\\Http\\OAuth2\\GetAccessTokenRequest',
          'authenticatesrequests' => 'Saloon\\Traits\\Auth\\AuthenticatesRequests',
          'validateproperties' => 'Saloon\\Http\\Middleware\\ValidateProperties',
          'getrefreshtokenrequest' => 'Saloon\\Http\\OAuth2\\GetRefreshTokenRequest',
          'determinemockresponse' => 'Saloon\\Http\\Middleware\\DetermineMockResponse',
          'invalidresponseclassexception' => 'Saloon\\Exceptions\\InvalidResponseClassException',
          'fatalrequestexception' => 'Saloon\\Exceptions\\Request\\FatalRequestException',
          'managespsrrequests' => 'Saloon\\Traits\\PendingRequest\\ManagesPsrRequests',
          'mergerequestproperties' => 'Saloon\\Http\\PendingRequest\\MergeRequestProperties',
          'bootconnectorandrequest' => 'Saloon\\Http\\PendingRequest\\BootConnectorAndRequest',
          'getclientcredentialstokenrequest' => 'Saloon\\Http\\OAuth2\\GetClientCredentialsTokenRequest',
          'hasrequestproperties' => 'Saloon\\Traits\\RequestProperties\\HasRequestProperties',
          'authenticatependingrequest' => 'Saloon\\Http\\PendingRequest\\AuthenticatePendingRequest',
          'getclientcredentialstokenbasicauthrequest' => 'Saloon\\Http\\OAuth2\\GetClientCredentialsTokenBasicAuthRequest',
        ),
         'className' => 'Saloon\\Http\\PendingRequest',
         'functionName' => 'resolveAllowBaseUrlOverrideForUrl',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      'b57939468ea62e112e835a52ca8576ab' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Saloon\\Http',
         'uses' => 
        array (
          'config' => 'Saloon\\Config',
          'method' => 'Saloon\\Enums\\Method',
          'helpers' => 'Saloon\\Helpers\\Helpers',
          'macroable' => 'Saloon\\Traits\\Macroable',
          'urlhelper' => 'Saloon\\Helpers\\URLHelper',
          'conditionable' => 'Saloon\\Traits\\Conditionable',
          'hasmockclient' => 'Saloon\\Traits\\HasMockClient',
          'fakeresponse' => 'Saloon\\Contracts\\FakeResponse',
          'mockclient' => 'Saloon\\Http\\Faking\\MockClient',
          'authenticator' => 'Saloon\\Contracts\\Authenticator',
          'oauthconfig' => 'Saloon\\Helpers\\OAuth2\\OAuthConfig',
          'getuserrequest' => 'Saloon\\Http\\OAuth2\\GetUserRequest',
          'bodyrepository' => 'Saloon\\Contracts\\Body\\BodyRepository',
          'mergebody' => 'Saloon\\Http\\PendingRequest\\MergeBody',
          'mergedelay' => 'Saloon\\Http\\PendingRequest\\MergeDelay',
          'delaymiddleware' => 'Saloon\\Http\\Middleware\\DelayMiddleware',
          'bootplugins' => 'Saloon\\Http\\PendingRequest\\BootPlugins',
          'getaccesstokenrequest' => 'Saloon\\Http\\OAuth2\\GetAccessTokenRequest',
          'authenticatesrequests' => 'Saloon\\Traits\\Auth\\AuthenticatesRequests',
          'validateproperties' => 'Saloon\\Http\\Middleware\\ValidateProperties',
          'getrefreshtokenrequest' => 'Saloon\\Http\\OAuth2\\GetRefreshTokenRequest',
          'determinemockresponse' => 'Saloon\\Http\\Middleware\\DetermineMockResponse',
          'invalidresponseclassexception' => 'Saloon\\Exceptions\\InvalidResponseClassException',
          'fatalrequestexception' => 'Saloon\\Exceptions\\Request\\FatalRequestException',
          'managespsrrequests' => 'Saloon\\Traits\\PendingRequest\\ManagesPsrRequests',
          'mergerequestproperties' => 'Saloon\\Http\\PendingRequest\\MergeRequestProperties',
          'bootconnectorandrequest' => 'Saloon\\Http\\PendingRequest\\BootConnectorAndRequest',
          'getclientcredentialstokenrequest' => 'Saloon\\Http\\OAuth2\\GetClientCredentialsTokenRequest',
          'hasrequestproperties' => 'Saloon\\Traits\\RequestProperties\\HasRequestProperties',
          'authenticatependingrequest' => 'Saloon\\Http\\PendingRequest\\AuthenticatePendingRequest',
          'getclientcredentialstokenbasicauthrequest' => 'Saloon\\Http\\OAuth2\\GetClientCredentialsTokenBasicAuthRequest',
        ),
         'className' => 'Saloon\\Http\\PendingRequest',
         'functionName' => 'usesOAuthConfigTokenOrUserEndpoint',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
    ),
    1 => 
    array (
      '/Users/tschigo/Developer/dls/packages/post-it-sdk/vendor/saloonphp/saloon/src/Http/PendingRequest.php' => '3d1c20294400992f972f31d8607943a1943cc1c360de011c683b34feb42c2bcd',
      '/Users/tschigo/Developer/dls/packages/post-it-sdk/vendor/composer/../saloonphp/saloon/src/Traits/Auth/AuthenticatesRequests.php' => 'aa37eccec85eeb9afd2c0b0f0c2d169b76141638ce9fcff1381e92150d4543b9',
      '/Users/tschigo/Developer/dls/packages/post-it-sdk/vendor/composer/../saloonphp/saloon/src/Traits/RequestProperties/HasRequestProperties.php' => '3ff0eede514446ddb083867b6f9c40666894501581b10678ed4276ae34dd73f8',
      '/Users/tschigo/Developer/dls/packages/post-it-sdk/vendor/composer/../saloonphp/saloon/src/Traits/RequestProperties/HasHeaders.php' => '7a568bdbd7384db41d1db7c8a50f3509c2265ffe7f1ff6944b74d8c2b06c2fbe',
      '/Users/tschigo/Developer/dls/packages/post-it-sdk/vendor/composer/../saloonphp/saloon/src/Traits/RequestProperties/HasQuery.php' => 'd9310ff0eed689dca0d11864d562b0950f3ac9fca01d481687bd210b17cf51d3',
      '/Users/tschigo/Developer/dls/packages/post-it-sdk/vendor/composer/../saloonphp/saloon/src/Traits/RequestProperties/HasConfig.php' => 'b3f86e829ba7cbfafd7434d8627c56be1ef19111375b5ecdf97e6de91851dc0c',
      '/Users/tschigo/Developer/dls/packages/post-it-sdk/vendor/composer/../saloonphp/saloon/src/Traits/RequestProperties/HasMiddleware.php' => '1475b80565db82c0554ce235e075decb51a64ba725b29633ccbc01ef73454c82',
      '/Users/tschigo/Developer/dls/packages/post-it-sdk/vendor/composer/../saloonphp/saloon/src/Traits/RequestProperties/HasDelay.php' => '09e50c8024039a51c5a04800b1df69d609193399d9fc83e5fe9869c8558d855a',
      '/Users/tschigo/Developer/dls/packages/post-it-sdk/vendor/composer/../saloonphp/saloon/src/Traits/PendingRequest/ManagesPsrRequests.php' => 'aa9c12a6d35a20678ce5e087e86e1b80b31190cc87d70202bde1c75721a31aad',
      '/Users/tschigo/Developer/dls/packages/post-it-sdk/vendor/composer/../saloonphp/saloon/src/Traits/Conditionable.php' => '166c163dd9c176e7e7a3003e3e7c1b47aa408f09b04f9d9ff4bdcd145c5e73d9',
      '/Users/tschigo/Developer/dls/packages/post-it-sdk/vendor/composer/../saloonphp/saloon/src/Traits/HasMockClient.php' => 'afe769c77e2fc997852e4d3732c411eaba28efc6ca6cbda4a7ebdc2cacd58751',
      '/Users/tschigo/Developer/dls/packages/post-it-sdk/vendor/composer/../saloonphp/saloon/src/Traits/Macroable.php' => '532f4535f7fafd4060b429683b92df8b01d2cafb80265e3cec3326e634bffdec',
    ),
  ),
));