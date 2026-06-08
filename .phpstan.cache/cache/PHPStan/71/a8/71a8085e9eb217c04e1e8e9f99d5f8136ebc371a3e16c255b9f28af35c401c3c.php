<?php declare(strict_types = 1);

// odsl-/Users/tschigo/Developer/dls/packages/post-it-sdk/src/Connector/PosteItalianeConnector.php-PHPStan\BetterReflection\Reflection\ReflectionClass-SmartDato\PostIt\Connector\PosteItalianeConnector
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-6.70.0.1-8.4.21-39bca8720fe73b051415e93866a00e6d1cb780ca01b1f1d5bfa7145f2f570171',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'SmartDato\\PostIt\\Connector\\PosteItalianeConnector',
        'filename' => '/Users/tschigo/Developer/dls/packages/post-it-sdk/src/Connector/PosteItalianeConnector.php',
      ),
    ),
    'namespace' => 'SmartDato\\PostIt\\Connector',
    'name' => 'SmartDato\\PostIt\\Connector\\PosteItalianeConnector',
    'shortName' => 'PosteItalianeConnector',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 32,
    'docComment' => '/**
 * Saloon connector for the Poste Italiane shipping API.
 *
 * Carries the contract-level base URL and the mandatory `POSTE_clientID`
 * header on every outbound request. Authentication is layered on top via
 * {@see SessionAuthenticator}.
 */',
    'attributes' => 
    array (
    ),
    'startLine' => 18,
    'endLine' => 51,
    'startColumn' => 1,
    'endColumn' => 1,
    'parentClassName' => 'Saloon\\Http\\Connector',
    'implementsClassNames' => 
    array (
    ),
    'traitClassNames' => 
    array (
      0 => 'Saloon\\Traits\\Plugins\\AcceptsJson',
    ),
    'immediateConstants' => 
    array (
    ),
    'immediateProperties' => 
    array (
      'baseUrl' => 
      array (
        'declaringClassName' => 'SmartDato\\PostIt\\Connector\\PosteItalianeConnector',
        'implementingClassName' => 'SmartDato\\PostIt\\Connector\\PosteItalianeConnector',
        'name' => 'baseUrl',
        'modifiers' => 132,
        'type' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'string',
            'isIdentifier' => true,
          ),
        ),
        'default' => NULL,
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 23,
        'endLine' => 23,
        'startColumn' => 9,
        'endColumn' => 40,
        'isPromoted' => true,
        'declaredAtCompileTime' => true,
        'immediateVirtual' => false,
        'immediateHooks' => 
        array (
        ),
      ),
      'clientId' => 
      array (
        'declaringClassName' => 'SmartDato\\PostIt\\Connector\\PosteItalianeConnector',
        'implementingClassName' => 'SmartDato\\PostIt\\Connector\\PosteItalianeConnector',
        'name' => 'clientId',
        'modifiers' => 132,
        'type' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'string',
            'isIdentifier' => true,
          ),
        ),
        'default' => NULL,
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 24,
        'endLine' => 24,
        'startColumn' => 9,
        'endColumn' => 41,
        'isPromoted' => true,
        'declaredAtCompileTime' => true,
        'immediateVirtual' => false,
        'immediateHooks' => 
        array (
        ),
      ),
    ),
    'immediateMethods' => 
    array (
      '__construct' => 
      array (
        'name' => '__construct',
        'parameters' => 
        array (
          'baseUrl' => 
          array (
            'name' => 'baseUrl',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'string',
                'isIdentifier' => true,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => true,
            'attributes' => 
            array (
            ),
            'startLine' => 23,
            'endLine' => 23,
            'startColumn' => 9,
            'endColumn' => 40,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'clientId' => 
          array (
            'name' => 'clientId',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'string',
                'isIdentifier' => true,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => true,
            'attributes' => 
            array (
            ),
            'startLine' => 24,
            'endLine' => 24,
            'startColumn' => 9,
            'endColumn' => 41,
            'parameterIndex' => 1,
            'isOptional' => false,
          ),
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 22,
        'endLine' => 25,
        'startColumn' => 5,
        'endColumn' => 8,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'SmartDato\\PostIt\\Connector',
        'declaringClassName' => 'SmartDato\\PostIt\\Connector\\PosteItalianeConnector',
        'implementingClassName' => 'SmartDato\\PostIt\\Connector\\PosteItalianeConnector',
        'currentClassName' => 'SmartDato\\PostIt\\Connector\\PosteItalianeConnector',
        'aliasName' => NULL,
      ),
      'resolveBaseUrl' => 
      array (
        'name' => 'resolveBaseUrl',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'string',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 27,
        'endLine' => 30,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'SmartDato\\PostIt\\Connector',
        'declaringClassName' => 'SmartDato\\PostIt\\Connector\\PosteItalianeConnector',
        'implementingClassName' => 'SmartDato\\PostIt\\Connector\\PosteItalianeConnector',
        'currentClassName' => 'SmartDato\\PostIt\\Connector\\PosteItalianeConnector',
        'aliasName' => NULL,
      ),
      'clientId' => 
      array (
        'name' => 'clientId',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'string',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 32,
        'endLine' => 35,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'SmartDato\\PostIt\\Connector',
        'declaringClassName' => 'SmartDato\\PostIt\\Connector\\PosteItalianeConnector',
        'implementingClassName' => 'SmartDato\\PostIt\\Connector\\PosteItalianeConnector',
        'currentClassName' => 'SmartDato\\PostIt\\Connector\\PosteItalianeConnector',
        'aliasName' => NULL,
      ),
      'defaultHeaders' => 
      array (
        'name' => 'defaultHeaders',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'array',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Default headers applied to every request issued by this connector.
 *
 * The `POSTE_clientID` header is required on every Poste Italiane endpoint
 * (auth and business calls alike).
 *
 * @return array<string, string>
 */',
        'startLine' => 45,
        'endLine' => 50,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 2,
        'namespace' => 'SmartDato\\PostIt\\Connector',
        'declaringClassName' => 'SmartDato\\PostIt\\Connector\\PosteItalianeConnector',
        'implementingClassName' => 'SmartDato\\PostIt\\Connector\\PosteItalianeConnector',
        'currentClassName' => 'SmartDato\\PostIt\\Connector\\PosteItalianeConnector',
        'aliasName' => NULL,
      ),
    ),
    'traitsData' => 
    array (
      'aliases' => 
      array (
      ),
      'modifiers' => 
      array (
      ),
      'precedences' => 
      array (
      ),
      'hashes' => 
      array (
      ),
    ),
  ),
));