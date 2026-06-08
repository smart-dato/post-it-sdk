<?php declare(strict_types = 1);

// osfsl-/Users/tschigo/Developer/dls/packages/post-it-sdk/vendor/composer/../saloonphp/saloon/src/Exceptions/Request/FatalRequestException.php-PHPStan\BetterReflection\Reflection\ReflectionClass-Saloon\Exceptions\Request\FatalRequestException
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-df0c305422071c8626a615a9203538da5fbcee0f0be6661544c3c932cf418a12-8.4.21-6.70.0.1',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'Saloon\\Exceptions\\Request\\FatalRequestException',
        'filename' => '/Users/tschigo/Developer/dls/packages/post-it-sdk/vendor/composer/../saloonphp/saloon/src/Exceptions/Request/FatalRequestException.php',
      ),
    ),
    'namespace' => 'Saloon\\Exceptions\\Request',
    'name' => 'Saloon\\Exceptions\\Request\\FatalRequestException',
    'shortName' => 'FatalRequestException',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 0,
    'docComment' => '/**
 * FatalRequestException
 *
 * This exception is thrown when the sender encountered a problem before the API
 * was able to respond. For example: An issue with connecting to the API or
 * an SSL error.
 *
 * @see https://docs.saloon.dev/the-basics/handling-failures
 */',
    'attributes' => 
    array (
    ),
    'startLine' => 20,
    'endLine' => 44,
    'startColumn' => 1,
    'endColumn' => 1,
    'parentClassName' => 'Saloon\\Exceptions\\SaloonException',
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
      'pendingSaloonRequest' => 
      array (
        'declaringClassName' => 'Saloon\\Exceptions\\Request\\FatalRequestException',
        'implementingClassName' => 'Saloon\\Exceptions\\Request\\FatalRequestException',
        'name' => 'pendingSaloonRequest',
        'modifiers' => 2,
        'type' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'Saloon\\Http\\PendingRequest',
            'isIdentifier' => false,
          ),
        ),
        'default' => NULL,
        'docComment' => '/**
 * The PendingRequest
 */',
        'attributes' => 
        array (
        ),
        'startLine' => 25,
        'endLine' => 25,
        'startColumn' => 5,
        'endColumn' => 51,
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
      '__construct' => 
      array (
        'name' => '__construct',
        'parameters' => 
        array (
          'originalException' => 
          array (
            'name' => 'originalException',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'Throwable',
                'isIdentifier' => false,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 30,
            'endLine' => 30,
            'startColumn' => 33,
            'endColumn' => 60,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'pendingRequest' => 
          array (
            'name' => 'pendingRequest',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'Saloon\\Http\\PendingRequest',
                'isIdentifier' => false,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 30,
            'endLine' => 30,
            'startColumn' => 63,
            'endColumn' => 92,
            'parameterIndex' => 1,
            'isOptional' => false,
          ),
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Constructor
 */',
        'startLine' => 30,
        'endLine' => 35,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Saloon\\Exceptions\\Request',
        'declaringClassName' => 'Saloon\\Exceptions\\Request\\FatalRequestException',
        'implementingClassName' => 'Saloon\\Exceptions\\Request\\FatalRequestException',
        'currentClassName' => 'Saloon\\Exceptions\\Request\\FatalRequestException',
        'aliasName' => NULL,
      ),
      'getPendingRequest' => 
      array (
        'name' => 'getPendingRequest',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'Saloon\\Http\\PendingRequest',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Get the PendingRequest that caused the exception.
 */',
        'startLine' => 40,
        'endLine' => 43,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Saloon\\Exceptions\\Request',
        'declaringClassName' => 'Saloon\\Exceptions\\Request\\FatalRequestException',
        'implementingClassName' => 'Saloon\\Exceptions\\Request\\FatalRequestException',
        'currentClassName' => 'Saloon\\Exceptions\\Request\\FatalRequestException',
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