<?php declare(strict_types = 1);

// odsl-/Users/tschigo/Developer/dls/packages/post-it-sdk/src/PostItServiceProvider.php-PHPStan\BetterReflection\Reflection\ReflectionClass-SmartDato\PostIt\PostItServiceProvider
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-6.70.0.1-8.4.21-c9256d34e11715ca0e00b7507f821c6ca10687fc842cbcc9e10b85130080b81e',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'SmartDato\\PostIt\\PostItServiceProvider',
        'filename' => '/Users/tschigo/Developer/dls/packages/post-it-sdk/src/PostItServiceProvider.php',
      ),
    ),
    'namespace' => 'SmartDato\\PostIt',
    'name' => 'SmartDato\\PostIt\\PostItServiceProvider',
    'shortName' => 'PostItServiceProvider',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 32,
    'docComment' => '/**
 * Registers the SDK config (`config/post-it-sdk.php`) under the
 * `post-it-sdk` key and exposes it for publishing via:
 *
 *     php artisan vendor:publish --tag=post-it-sdk-config
 *
 * The SDK does not bind any singletons — the {@see PostIt}
 * facade is constructed per credential pair by the consumer application.
 */',
    'attributes' => 
    array (
    ),
    'startLine' => 18,
    'endLine' => 36,
    'startColumn' => 1,
    'endColumn' => 1,
    'parentClassName' => 'Illuminate\\Support\\ServiceProvider',
    'implementsClassNames' => 
    array (
    ),
    'traitClassNames' => 
    array (
    ),
    'immediateConstants' => 
    array (
    ),
    'immediateProperties' => 
    array (
    ),
    'immediateMethods' => 
    array (
      'register' => 
      array (
        'name' => 'register',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'void',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 20,
        'endLine' => 26,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'SmartDato\\PostIt',
        'declaringClassName' => 'SmartDato\\PostIt\\PostItServiceProvider',
        'implementingClassName' => 'SmartDato\\PostIt\\PostItServiceProvider',
        'currentClassName' => 'SmartDato\\PostIt\\PostItServiceProvider',
        'aliasName' => NULL,
      ),
      'boot' => 
      array (
        'name' => 'boot',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'void',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 28,
        'endLine' => 35,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'SmartDato\\PostIt',
        'declaringClassName' => 'SmartDato\\PostIt\\PostItServiceProvider',
        'implementingClassName' => 'SmartDato\\PostIt\\PostItServiceProvider',
        'currentClassName' => 'SmartDato\\PostIt\\PostItServiceProvider',
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