<?php declare(strict_types = 1);

// osfsl-/Users/tschigo/Developer/dls/packages/post-it-sdk/vendor/composer/../saloonphp/saloon/src/Http/Request.php-PHPStan\BetterReflection\Reflection\ReflectionClass-Saloon\Http\Request
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-ad01db703a31a76269a951276c73c2d2f3af57bc8ad82007f2a54e782813fbf9-8.4.21-6.70.0.1',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'Saloon\\Http\\Request',
        'filename' => '/Users/tschigo/Developer/dls/packages/post-it-sdk/vendor/composer/../saloonphp/saloon/src/Http/Request.php',
      ),
    ),
    'namespace' => 'Saloon\\Http',
    'name' => 'Saloon\\Http\\Request',
    'shortName' => 'Request',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 64,
    'docComment' => NULL,
    'attributes' => 
    array (
    ),
    'startLine' => 23,
    'endLine' => 66,
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
      7 => 'Saloon\\Traits\\Conditionable',
      8 => 'Saloon\\Traits\\HasDebugging',
      9 => 'Saloon\\Traits\\Macroable',
      10 => 'Saloon\\Traits\\RequestProperties\\HasTries',
      11 => 'Saloon\\Traits\\Bootable',
      12 => 'Saloon\\Traits\\Makeable',
    ),
    'immediateConstants' => 
    array (
    ),
    'immediateProperties' => 
    array (
      'allowBaseUrlOverride' => 
      array (
        'declaringClassName' => 'Saloon\\Http\\Request',
        'implementingClassName' => 'Saloon\\Http\\Request',
        'name' => 'allowBaseUrlOverride',
        'modifiers' => 1,
        'type' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionUnionType',
          'data' => 
          array (
            'types' => 
            array (
              0 => 
              array (
                'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
                'data' => 
                array (
                  'name' => 'bool',
                  'isIdentifier' => true,
                ),
              ),
              1 => 
              array (
                'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
                'data' => 
                array (
                  'name' => 'null',
                  'isIdentifier' => true,
                ),
              ),
            ),
          ),
        ),
        'default' => 
        array (
          'code' => 'null',
          'attributes' => 
          array (
            'startLine' => 43,
            'endLine' => 43,
            'startTokenPos' => 174,
            'startFilePos' => 1204,
            'endTokenPos' => 174,
            'endFilePos' => 1207,
          ),
        ),
        'docComment' => '/**
 * When non-null, overrides connector / OAuth resolution for absolute endpoints in resolveEndpoint().
 * null = inherit. Set true/false on the instance or declare on your request subclass.
 */',
        'attributes' => 
        array (
        ),
        'startLine' => 43,
        'endLine' => 43,
        'startColumn' => 5,
        'endColumn' => 46,
        'isPromoted' => false,
        'declaredAtCompileTime' => true,
        'immediateVirtual' => false,
        'immediateHooks' => 
        array (
        ),
      ),
      'method' => 
      array (
        'declaringClassName' => 'Saloon\\Http\\Request',
        'implementingClassName' => 'Saloon\\Http\\Request',
        'name' => 'method',
        'modifiers' => 2,
        'type' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'Saloon\\Enums\\Method',
            'isIdentifier' => false,
          ),
        ),
        'default' => NULL,
        'docComment' => '/**
 * Define the HTTP method.
 */',
        'attributes' => 
        array (
        ),
        'startLine' => 48,
        'endLine' => 48,
        'startColumn' => 5,
        'endColumn' => 29,
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
      'getMethod' => 
      array (
        'name' => 'getMethod',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'Saloon\\Enums\\Method',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Get the method of the request.
 */',
        'startLine' => 53,
        'endLine' => 60,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Saloon\\Http',
        'declaringClassName' => 'Saloon\\Http\\Request',
        'implementingClassName' => 'Saloon\\Http\\Request',
        'currentClassName' => 'Saloon\\Http\\Request',
        'aliasName' => NULL,
      ),
      'resolveEndpoint' => 
      array (
        'name' => 'resolveEndpoint',
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
 * Define the endpoint for the request.
 */',
        'startLine' => 65,
        'endLine' => 65,
        'startColumn' => 5,
        'endColumn' => 55,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 65,
        'namespace' => 'Saloon\\Http',
        'declaringClassName' => 'Saloon\\Http\\Request',
        'implementingClassName' => 'Saloon\\Http\\Request',
        'currentClassName' => 'Saloon\\Http\\Request',
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