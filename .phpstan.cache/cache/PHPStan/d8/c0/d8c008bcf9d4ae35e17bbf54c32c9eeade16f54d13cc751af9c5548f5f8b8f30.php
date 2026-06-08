<?php declare(strict_types = 1);

// osfsl-/Users/tschigo/Developer/dls/packages/post-it-sdk/vendor/composer/../saloonphp/saloon/src/Http/PendingRequest.php-PHPStan\BetterReflection\Reflection\ReflectionClass-Saloon\Http\PendingRequest
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-3d1c20294400992f972f31d8607943a1943cc1c360de011c683b34feb42c2bcd-8.4.21-6.70.0.1',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'Saloon\\Http\\PendingRequest',
        'filename' => '/Users/tschigo/Developer/dls/packages/post-it-sdk/vendor/composer/../saloonphp/saloon/src/Http/PendingRequest.php',
      ),
    ),
    'namespace' => 'Saloon\\Http',
    'name' => 'Saloon\\Http\\PendingRequest',
    'shortName' => 'PendingRequest',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 0,
    'docComment' => NULL,
    'attributes' => 
    array (
    ),
    'startLine' => 39,
    'endLine' => 360,
    'startColumn' => 1,
    'endColumn' => 1,
    'parentClassName' => NULL,
    'implementsClassNames' => 
    array (
    ),
    'traitClassNames' => 
    array (
      0 => 'Saloon\\Traits\\Auth\\AuthenticatesRequests',
      1 => 'Saloon\\Traits\\RequestProperties\\HasRequestProperties',
      2 => 'Saloon\\Traits\\PendingRequest\\ManagesPsrRequests',
      3 => 'Saloon\\Traits\\Conditionable',
      4 => 'Saloon\\Traits\\HasMockClient',
      5 => 'Saloon\\Traits\\Macroable',
    ),
    'immediateConstants' => 
    array (
    ),
    'immediateProperties' => 
    array (
      'connector' => 
      array (
        'declaringClassName' => 'Saloon\\Http\\PendingRequest',
        'implementingClassName' => 'Saloon\\Http\\PendingRequest',
        'name' => 'connector',
        'modifiers' => 2,
        'type' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'Saloon\\Http\\Connector',
            'isIdentifier' => false,
          ),
        ),
        'default' => NULL,
        'docComment' => '/**
 * The connector making the request.
 */',
        'attributes' => 
        array (
        ),
        'startLine' => 51,
        'endLine' => 51,
        'startColumn' => 5,
        'endColumn' => 35,
        'isPromoted' => false,
        'declaredAtCompileTime' => true,
        'immediateVirtual' => false,
        'immediateHooks' => 
        array (
        ),
      ),
      'request' => 
      array (
        'declaringClassName' => 'Saloon\\Http\\PendingRequest',
        'implementingClassName' => 'Saloon\\Http\\PendingRequest',
        'name' => 'request',
        'modifiers' => 2,
        'type' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'Saloon\\Http\\Request',
            'isIdentifier' => false,
          ),
        ),
        'default' => NULL,
        'docComment' => '/**
 * The request used by the instance.
 */',
        'attributes' => 
        array (
        ),
        'startLine' => 56,
        'endLine' => 56,
        'startColumn' => 5,
        'endColumn' => 31,
        'isPromoted' => false,
        'declaredAtCompileTime' => true,
        'immediateVirtual' => false,
        'immediateHooks' => 
        array (
        ),
      ),
      'method' => 
      array (
        'declaringClassName' => 'Saloon\\Http\\PendingRequest',
        'implementingClassName' => 'Saloon\\Http\\PendingRequest',
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
 * The method the request will use.
 */',
        'attributes' => 
        array (
        ),
        'startLine' => 61,
        'endLine' => 61,
        'startColumn' => 5,
        'endColumn' => 29,
        'isPromoted' => false,
        'declaredAtCompileTime' => true,
        'immediateVirtual' => false,
        'immediateHooks' => 
        array (
        ),
      ),
      'url' => 
      array (
        'declaringClassName' => 'Saloon\\Http\\PendingRequest',
        'implementingClassName' => 'Saloon\\Http\\PendingRequest',
        'name' => 'url',
        'modifiers' => 2,
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
        'docComment' => '/**
 * The URL the request will be made to.
 */',
        'attributes' => 
        array (
        ),
        'startLine' => 66,
        'endLine' => 66,
        'startColumn' => 5,
        'endColumn' => 26,
        'isPromoted' => false,
        'declaredAtCompileTime' => true,
        'immediateVirtual' => false,
        'immediateHooks' => 
        array (
        ),
      ),
      'body' => 
      array (
        'declaringClassName' => 'Saloon\\Http\\PendingRequest',
        'implementingClassName' => 'Saloon\\Http\\PendingRequest',
        'name' => 'body',
        'modifiers' => 2,
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
                  'name' => 'Saloon\\Contracts\\Body\\BodyRepository',
                  'isIdentifier' => false,
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
            'startLine' => 71,
            'endLine' => 71,
            'startTokenPos' => 253,
            'startFilePos' => 2023,
            'endTokenPos' => 253,
            'endFilePos' => 2026,
          ),
        ),
        'docComment' => '/**
 * The body of the request.
 */',
        'attributes' => 
        array (
        ),
        'startLine' => 71,
        'endLine' => 71,
        'startColumn' => 5,
        'endColumn' => 43,
        'isPromoted' => false,
        'declaredAtCompileTime' => true,
        'immediateVirtual' => false,
        'immediateHooks' => 
        array (
        ),
      ),
      'fakeResponse' => 
      array (
        'declaringClassName' => 'Saloon\\Http\\PendingRequest',
        'implementingClassName' => 'Saloon\\Http\\PendingRequest',
        'name' => 'fakeResponse',
        'modifiers' => 2,
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
                  'name' => 'Saloon\\Contracts\\FakeResponse',
                  'isIdentifier' => false,
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
            'startLine' => 76,
            'endLine' => 76,
            'startTokenPos' => 267,
            'startFilePos' => 2121,
            'endTokenPos' => 267,
            'endFilePos' => 2124,
          ),
        ),
        'docComment' => '/**
 * The simulated response.
 */',
        'attributes' => 
        array (
        ),
        'startLine' => 76,
        'endLine' => 76,
        'startColumn' => 5,
        'endColumn' => 49,
        'isPromoted' => false,
        'declaredAtCompileTime' => true,
        'immediateVirtual' => false,
        'immediateHooks' => 
        array (
        ),
      ),
      'asynchronous' => 
      array (
        'declaringClassName' => 'Saloon\\Http\\PendingRequest',
        'implementingClassName' => 'Saloon\\Http\\PendingRequest',
        'name' => 'asynchronous',
        'modifiers' => 2,
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
            'startLine' => 81,
            'endLine' => 81,
            'startTokenPos' => 280,
            'startFilePos' => 2235,
            'endTokenPos' => 280,
            'endFilePos' => 2239,
          ),
        ),
        'docComment' => '/**
 * Determine if the pending request is asynchronous
 */',
        'attributes' => 
        array (
        ),
        'startLine' => 81,
        'endLine' => 81,
        'startColumn' => 5,
        'endColumn' => 41,
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
          'connector' => 
          array (
            'name' => 'connector',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'Saloon\\Http\\Connector',
                'isIdentifier' => false,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 86,
            'endLine' => 86,
            'startColumn' => 33,
            'endColumn' => 52,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'request' => 
          array (
            'name' => 'request',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'Saloon\\Http\\Request',
                'isIdentifier' => false,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 86,
            'endLine' => 86,
            'startColumn' => 55,
            'endColumn' => 70,
            'parameterIndex' => 1,
            'isOptional' => false,
          ),
          'mockClient' => 
          array (
            'name' => 'mockClient',
            'default' => 
            array (
              'code' => 'null',
              'attributes' => 
              array (
                'startLine' => 86,
                'endLine' => 86,
                'startTokenPos' => 308,
                'startFilePos' => 2394,
                'endTokenPos' => 308,
                'endFilePos' => 2397,
              ),
            ),
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
                      'name' => 'Saloon\\Http\\Faking\\MockClient',
                      'isIdentifier' => false,
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
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 86,
            'endLine' => 86,
            'startColumn' => 73,
            'endColumn' => 102,
            'parameterIndex' => 2,
            'isOptional' => true,
          ),
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Build up the request payload.
 */',
        'startLine' => 86,
        'endLine' => 139,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Saloon\\Http',
        'declaringClassName' => 'Saloon\\Http\\PendingRequest',
        'implementingClassName' => 'Saloon\\Http\\PendingRequest',
        'currentClassName' => 'Saloon\\Http\\PendingRequest',
        'aliasName' => NULL,
      ),
      'authenticate' => 
      array (
        'name' => 'authenticate',
        'parameters' => 
        array (
          'authenticator' => 
          array (
            'name' => 'authenticator',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'Saloon\\Contracts\\Authenticator',
                'isIdentifier' => false,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 146,
            'endLine' => 146,
            'startColumn' => 34,
            'endColumn' => 61,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'static',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Authenticate the PendingRequest
 *
 * @return $this
 */',
        'startLine' => 146,
        'endLine' => 156,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Saloon\\Http',
        'declaringClassName' => 'Saloon\\Http\\PendingRequest',
        'implementingClassName' => 'Saloon\\Http\\PendingRequest',
        'currentClassName' => 'Saloon\\Http\\PendingRequest',
        'aliasName' => NULL,
      ),
      'executeResponsePipeline' => 
      array (
        'name' => 'executeResponsePipeline',
        'parameters' => 
        array (
          'response' => 
          array (
            'name' => 'response',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'Saloon\\Http\\Response',
                'isIdentifier' => false,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 161,
            'endLine' => 161,
            'startColumn' => 45,
            'endColumn' => 62,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'Saloon\\Http\\Response',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Execute the response pipeline.
 */',
        'startLine' => 161,
        'endLine' => 164,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Saloon\\Http',
        'declaringClassName' => 'Saloon\\Http\\PendingRequest',
        'implementingClassName' => 'Saloon\\Http\\PendingRequest',
        'currentClassName' => 'Saloon\\Http\\PendingRequest',
        'aliasName' => NULL,
      ),
      'executeFatalPipeline' => 
      array (
        'name' => 'executeFatalPipeline',
        'parameters' => 
        array (
          'throwable' => 
          array (
            'name' => 'throwable',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'Saloon\\Exceptions\\Request\\FatalRequestException',
                'isIdentifier' => false,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 169,
            'endLine' => 169,
            'startColumn' => 42,
            'endColumn' => 73,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
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
        'docComment' => '/**
 * Execute the fatal pipeline.
 */',
        'startLine' => 169,
        'endLine' => 172,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Saloon\\Http',
        'declaringClassName' => 'Saloon\\Http\\PendingRequest',
        'implementingClassName' => 'Saloon\\Http\\PendingRequest',
        'currentClassName' => 'Saloon\\Http\\PendingRequest',
        'aliasName' => NULL,
      ),
      'getRequest' => 
      array (
        'name' => 'getRequest',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'Saloon\\Http\\Request',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Get the request.
 */',
        'startLine' => 177,
        'endLine' => 180,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Saloon\\Http',
        'declaringClassName' => 'Saloon\\Http\\PendingRequest',
        'implementingClassName' => 'Saloon\\Http\\PendingRequest',
        'currentClassName' => 'Saloon\\Http\\PendingRequest',
        'aliasName' => NULL,
      ),
      'getConnector' => 
      array (
        'name' => 'getConnector',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'Saloon\\Http\\Connector',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Get the connector.
 */',
        'startLine' => 185,
        'endLine' => 188,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Saloon\\Http',
        'declaringClassName' => 'Saloon\\Http\\PendingRequest',
        'implementingClassName' => 'Saloon\\Http\\PendingRequest',
        'currentClassName' => 'Saloon\\Http\\PendingRequest',
        'aliasName' => NULL,
      ),
      'getUrl' => 
      array (
        'name' => 'getUrl',
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
 * Get the URL of the request.
 */',
        'startLine' => 193,
        'endLine' => 196,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Saloon\\Http',
        'declaringClassName' => 'Saloon\\Http\\PendingRequest',
        'implementingClassName' => 'Saloon\\Http\\PendingRequest',
        'currentClassName' => 'Saloon\\Http\\PendingRequest',
        'aliasName' => NULL,
      ),
      'setUrl' => 
      array (
        'name' => 'setUrl',
        'parameters' => 
        array (
          'url' => 
          array (
            'name' => 'url',
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
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 206,
            'endLine' => 206,
            'startColumn' => 28,
            'endColumn' => 38,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'static',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Set the URL of the PendingRequest
 *
 * Note: This will be combined with the query parameters to create
 * a UriInterface that will be passed to a PSR-7 request.
 *
 * @return $this
 */',
        'startLine' => 206,
        'endLine' => 211,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Saloon\\Http',
        'declaringClassName' => 'Saloon\\Http\\PendingRequest',
        'implementingClassName' => 'Saloon\\Http\\PendingRequest',
        'currentClassName' => 'Saloon\\Http\\PendingRequest',
        'aliasName' => NULL,
      ),
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
 * Get the HTTP method used for the request
 */',
        'startLine' => 216,
        'endLine' => 219,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Saloon\\Http',
        'declaringClassName' => 'Saloon\\Http\\PendingRequest',
        'implementingClassName' => 'Saloon\\Http\\PendingRequest',
        'currentClassName' => 'Saloon\\Http\\PendingRequest',
        'aliasName' => NULL,
      ),
      'setMethod' => 
      array (
        'name' => 'setMethod',
        'parameters' => 
        array (
          'method' => 
          array (
            'name' => 'method',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'Saloon\\Enums\\Method',
                'isIdentifier' => false,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 226,
            'endLine' => 226,
            'startColumn' => 31,
            'endColumn' => 44,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'static',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Set the method of the PendingRequest
 *
 * @return $this
 */',
        'startLine' => 226,
        'endLine' => 231,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Saloon\\Http',
        'declaringClassName' => 'Saloon\\Http\\PendingRequest',
        'implementingClassName' => 'Saloon\\Http\\PendingRequest',
        'currentClassName' => 'Saloon\\Http\\PendingRequest',
        'aliasName' => NULL,
      ),
      'body' => 
      array (
        'name' => 'body',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
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
                  'name' => 'Saloon\\Contracts\\Body\\BodyRepository',
                  'isIdentifier' => false,
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
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Retrieve the body on the instance
 */',
        'startLine' => 236,
        'endLine' => 239,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Saloon\\Http',
        'declaringClassName' => 'Saloon\\Http\\PendingRequest',
        'implementingClassName' => 'Saloon\\Http\\PendingRequest',
        'currentClassName' => 'Saloon\\Http\\PendingRequest',
        'aliasName' => NULL,
      ),
      'setBody' => 
      array (
        'name' => 'setBody',
        'parameters' => 
        array (
          'body' => 
          array (
            'name' => 'body',
            'default' => NULL,
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
                      'name' => 'Saloon\\Contracts\\Body\\BodyRepository',
                      'isIdentifier' => false,
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
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 246,
            'endLine' => 246,
            'startColumn' => 29,
            'endColumn' => 49,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'static',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Set the body repository
 *
 * @return $this
 */',
        'startLine' => 246,
        'endLine' => 251,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Saloon\\Http',
        'declaringClassName' => 'Saloon\\Http\\PendingRequest',
        'implementingClassName' => 'Saloon\\Http\\PendingRequest',
        'currentClassName' => 'Saloon\\Http\\PendingRequest',
        'aliasName' => NULL,
      ),
      'getFakeResponse' => 
      array (
        'name' => 'getFakeResponse',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
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
                  'name' => 'Saloon\\Contracts\\FakeResponse',
                  'isIdentifier' => false,
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
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Get the fake response
 */',
        'startLine' => 256,
        'endLine' => 259,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Saloon\\Http',
        'declaringClassName' => 'Saloon\\Http\\PendingRequest',
        'implementingClassName' => 'Saloon\\Http\\PendingRequest',
        'currentClassName' => 'Saloon\\Http\\PendingRequest',
        'aliasName' => NULL,
      ),
      'setFakeResponse' => 
      array (
        'name' => 'setFakeResponse',
        'parameters' => 
        array (
          'fakeResponse' => 
          array (
            'name' => 'fakeResponse',
            'default' => NULL,
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
                      'name' => 'Saloon\\Contracts\\FakeResponse',
                      'isIdentifier' => false,
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
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 266,
            'endLine' => 266,
            'startColumn' => 37,
            'endColumn' => 63,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'static',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Set the fake response
 *
 * @return $this
 */',
        'startLine' => 266,
        'endLine' => 271,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Saloon\\Http',
        'declaringClassName' => 'Saloon\\Http\\PendingRequest',
        'implementingClassName' => 'Saloon\\Http\\PendingRequest',
        'currentClassName' => 'Saloon\\Http\\PendingRequest',
        'aliasName' => NULL,
      ),
      'hasFakeResponse' => 
      array (
        'name' => 'hasFakeResponse',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'bool',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Check if a fake response has been set
 */',
        'startLine' => 276,
        'endLine' => 279,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Saloon\\Http',
        'declaringClassName' => 'Saloon\\Http\\PendingRequest',
        'implementingClassName' => 'Saloon\\Http\\PendingRequest',
        'currentClassName' => 'Saloon\\Http\\PendingRequest',
        'aliasName' => NULL,
      ),
      'isAsynchronous' => 
      array (
        'name' => 'isAsynchronous',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'bool',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Check if the request is asynchronous
 */',
        'startLine' => 284,
        'endLine' => 287,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Saloon\\Http',
        'declaringClassName' => 'Saloon\\Http\\PendingRequest',
        'implementingClassName' => 'Saloon\\Http\\PendingRequest',
        'currentClassName' => 'Saloon\\Http\\PendingRequest',
        'aliasName' => NULL,
      ),
      'setAsynchronous' => 
      array (
        'name' => 'setAsynchronous',
        'parameters' => 
        array (
          'asynchronous' => 
          array (
            'name' => 'asynchronous',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'bool',
                'isIdentifier' => true,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 294,
            'endLine' => 294,
            'startColumn' => 37,
            'endColumn' => 54,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'static',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Set if the request is going to be sent asynchronously
 *
 * @return $this
 */',
        'startLine' => 294,
        'endLine' => 299,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Saloon\\Http',
        'declaringClassName' => 'Saloon\\Http\\PendingRequest',
        'implementingClassName' => 'Saloon\\Http\\PendingRequest',
        'currentClassName' => 'Saloon\\Http\\PendingRequest',
        'aliasName' => NULL,
      ),
      'getResponseClass' => 
      array (
        'name' => 'getResponseClass',
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
 * Get the response class
 *
 * @return class-string<\\Saloon\\Http\\Response>
 * @throws \\Saloon\\Exceptions\\InvalidResponseClassException
 */',
        'startLine' => 307,
        'endLine' => 316,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Saloon\\Http',
        'declaringClassName' => 'Saloon\\Http\\PendingRequest',
        'implementingClassName' => 'Saloon\\Http\\PendingRequest',
        'currentClassName' => 'Saloon\\Http\\PendingRequest',
        'aliasName' => NULL,
      ),
      'tap' => 
      array (
        'name' => 'tap',
        'parameters' => 
        array (
          'callable' => 
          array (
            'name' => 'callable',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'callable',
                'isIdentifier' => true,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 323,
            'endLine' => 323,
            'startColumn' => 28,
            'endColumn' => 45,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'static',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Tap into the pending request
 *
 * @return $this
 */',
        'startLine' => 323,
        'endLine' => 328,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 2,
        'namespace' => 'Saloon\\Http',
        'declaringClassName' => 'Saloon\\Http\\PendingRequest',
        'implementingClassName' => 'Saloon\\Http\\PendingRequest',
        'currentClassName' => 'Saloon\\Http\\PendingRequest',
        'aliasName' => NULL,
      ),
      'resolveAllowBaseUrlOverrideForUrl' => 
      array (
        'name' => 'resolveAllowBaseUrlOverrideForUrl',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'bool',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Resolve whether an absolute URL may be used when joining the connector base with the request endpoint.
 * Uses the request flag when set, else OAuth config for token/user internal requests, else the connector flag.
 */',
        'startLine' => 334,
        'endLine' => 345,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 2,
        'namespace' => 'Saloon\\Http',
        'declaringClassName' => 'Saloon\\Http\\PendingRequest',
        'implementingClassName' => 'Saloon\\Http\\PendingRequest',
        'currentClassName' => 'Saloon\\Http\\PendingRequest',
        'aliasName' => NULL,
      ),
      'usesOAuthConfigTokenOrUserEndpoint' => 
      array (
        'name' => 'usesOAuthConfigTokenOrUserEndpoint',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'bool',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * True for internal OAuth2 requests (token exchange, refresh, client credentials, or user info).
 */',
        'startLine' => 350,
        'endLine' => 359,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 2,
        'namespace' => 'Saloon\\Http',
        'declaringClassName' => 'Saloon\\Http\\PendingRequest',
        'implementingClassName' => 'Saloon\\Http\\PendingRequest',
        'currentClassName' => 'Saloon\\Http\\PendingRequest',
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