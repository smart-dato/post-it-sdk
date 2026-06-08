<?php declare(strict_types = 1);

// osfsl-/Users/tschigo/Developer/dls/packages/post-it-sdk/vendor/composer/../saloonphp/saloon/src/Http/Connector.php-PHPStan\BetterReflection\Reflection\ReflectionClass-Saloon\Http\Connector
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-560b1c10feb5f4d761c9e98bf9e40eb29b941253e0987d4dde7144b4ab12eb89-8.4.21-6.70.0.1',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'Saloon\\Http\\Connector',
        'filename' => '/Users/tschigo/Developer/dls/packages/post-it-sdk/vendor/composer/../saloonphp/saloon/src/Http/Connector.php',
      ),
    ),
    'namespace' => 'Saloon\\Http',
    'name' => 'Saloon\\Http\\Connector',
    'shortName' => 'Connector',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 64,
    'docComment' => NULL,
    'attributes' => 
    array (
    ),
    'startLine' => 22,
    'endLine' => 50,
    'startColumn' => 1,
    'endColumn' => 1,
    'parentClassName' => NULL,
    'implementsClassNames' => 
    array (
    ),
    'traitClassNames' => 
    array (
      0 => 'Saloon\\Traits\\Request\\CreatesDtoFromResponse',
      1 => 'Saloon\\Traits\\Auth\\AuthenticatesRequests',
      2 => 'Saloon\\Traits\\RequestProperties\\HasRequestProperties',
      3 => 'Saloon\\Traits\\Responses\\HasCustomResponses',
      4 => 'Saloon\\Traits\\ManagesExceptions',
      5 => 'Saloon\\Traits\\HandlesPsrRequest',
      6 => 'Saloon\\Traits\\HasMockClient',
      7 => 'Saloon\\Traits\\Connector\\SendsRequests',
      8 => 'Saloon\\Traits\\Conditionable',
      9 => 'Saloon\\Traits\\HasDebugging',
      10 => 'Saloon\\Traits\\Macroable',
      11 => 'Saloon\\Traits\\Bootable',
      12 => 'Saloon\\Traits\\Makeable',
      13 => 'Saloon\\Traits\\RequestProperties\\HasTries',
    ),
    'immediateConstants' => 
    array (
    ),
    'immediateProperties' => 
    array (
      'allowBaseUrlOverride' => 
      array (
        'declaringClassName' => 'Saloon\\Http\\Connector',
        'implementingClassName' => 'Saloon\\Http\\Connector',
        'name' => 'allowBaseUrlOverride',
        'modifiers' => 1,
        'type' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'bool',
            'isIdentifier' => true,
          ),
        ),
        'default' => 
        array (
          'code' => 'false',
          'attributes' => 
          array (
            'startLine' => 44,
            'endLine' => 44,
            'startTokenPos' => 173,
            'startFilePos' => 1316,
            'endTokenPos' => 173,
            'endFilePos' => 1320,
          ),
        ),
        'docComment' => '/**
 * When true, resolveEndpoint() may return an absolute URL (different host than base).
 * Set on the connector instance or declare e.g. `public bool $allowBaseUrlOverride = true` on your subclass.
 * Enabling with user-controlled endpoints risks SSRF and credential leakage.
 */',
        'attributes' => 
        array (
        ),
        'startLine' => 44,
        'endLine' => 44,
        'startColumn' => 5,
        'endColumn' => 46,
        'isPromoted' => false,
        'declaredAtCompileTime' => true,
        'immediateVirtual' => false,
        'immediateHooks' => 
        array (
        ),
      ),
    ),
    'immediateMethods' => 
    array (
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
        'docComment' => '/**
 * Define the base URL of the API.
 */',
        'startLine' => 49,
        'endLine' => 49,
        'startColumn' => 5,
        'endColumn' => 54,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 65,
        'namespace' => 'Saloon\\Http',
        'declaringClassName' => 'Saloon\\Http\\Connector',
        'implementingClassName' => 'Saloon\\Http\\Connector',
        'currentClassName' => 'Saloon\\Http\\Connector',
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