<?php declare(strict_types = 1);

// odsl-/Users/tschigo/Developer/dls/packages/post-it-sdk/src/Requests/TrackShipmentRequest.php-PHPStan\BetterReflection\Reflection\ReflectionClass-SmartDato\PostIt\Requests\TrackShipmentRequest
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-6.70.0.1-8.4.21-671e4749fecb3147d266364c1d7189949d2a87fe44c73f90a14540f3788d7930',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'SmartDato\\PostIt\\Requests\\TrackShipmentRequest',
        'filename' => '/Users/tschigo/Developer/dls/packages/post-it-sdk/src/Requests/TrackShipmentRequest.php',
      ),
    ),
    'namespace' => 'SmartDato\\PostIt\\Requests',
    'name' => 'SmartDato\\PostIt\\Requests\\TrackShipmentRequest',
    'shortName' => 'TrackShipmentRequest',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 32,
    'docComment' => '/**
 * `POST /postalandlogistics/parcel/tracking`.
 *
 * The request envelope is fixed to `arg0.shipmentsData[].waybillNumber`; the
 * remaining fields (`statusDescription = \'E\'`, `customerType = \'DQ\'`,
 * `lastTracingState = \'N\'`) are constants documented by Poste Italiane and
 * unlikely to vary, so they are baked in.
 */',
    'attributes' => 
    array (
    ),
    'startLine' => 23,
    'endLine' => 68,
    'startColumn' => 1,
    'endColumn' => 1,
    'parentClassName' => 'Saloon\\Http\\Request',
    'implementsClassNames' => 
    array (
      0 => 'Saloon\\Contracts\\Body\\HasBody',
    ),
    'traitClassNames' => 
    array (
      0 => 'Saloon\\Traits\\Body\\HasJsonBody',
    ),
    'immediateConstants' => 
    array (
    ),
    'immediateProperties' => 
    array (
      'method' => 
      array (
        'declaringClassName' => 'SmartDato\\PostIt\\Requests\\TrackShipmentRequest',
        'implementingClassName' => 'SmartDato\\PostIt\\Requests\\TrackShipmentRequest',
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
        'default' => 
        array (
          'code' => '\\Saloon\\Enums\\Method::POST',
          'attributes' => 
          array (
            'startLine' => 27,
            'endLine' => 27,
            'startTokenPos' => 81,
            'startFilePos' => 735,
            'endTokenPos' => 83,
            'endFilePos' => 746,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 27,
        'endLine' => 27,
        'startColumn' => 5,
        'endColumn' => 44,
        'isPromoted' => false,
        'declaredAtCompileTime' => true,
        'immediateVirtual' => false,
        'immediateHooks' => 
        array (
        ),
      ),
      'waybillNumber' => 
      array (
        'declaringClassName' => 'SmartDato\\PostIt\\Requests\\TrackShipmentRequest',
        'implementingClassName' => 'SmartDato\\PostIt\\Requests\\TrackShipmentRequest',
        'name' => 'waybillNumber',
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
        'startLine' => 30,
        'endLine' => 30,
        'startColumn' => 9,
        'endColumn' => 46,
        'isPromoted' => true,
        'declaredAtCompileTime' => true,
        'immediateVirtual' => false,
        'immediateHooks' => 
        array (
        ),
      ),
      'fullHistory' => 
      array (
        'declaringClassName' => 'SmartDato\\PostIt\\Requests\\TrackShipmentRequest',
        'implementingClassName' => 'SmartDato\\PostIt\\Requests\\TrackShipmentRequest',
        'name' => 'fullHistory',
        'modifiers' => 132,
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
          'code' => 'true',
          'attributes' => 
          array (
            'startLine' => 31,
            'endLine' => 31,
            'startTokenPos' => 112,
            'startFilePos' => 876,
            'endTokenPos' => 112,
            'endFilePos' => 879,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 31,
        'endLine' => 31,
        'startColumn' => 9,
        'endColumn' => 49,
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
          'waybillNumber' => 
          array (
            'name' => 'waybillNumber',
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
            'startLine' => 30,
            'endLine' => 30,
            'startColumn' => 9,
            'endColumn' => 46,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'fullHistory' => 
          array (
            'name' => 'fullHistory',
            'default' => 
            array (
              'code' => 'true',
              'attributes' => 
              array (
                'startLine' => 31,
                'endLine' => 31,
                'startTokenPos' => 112,
                'startFilePos' => 876,
                'endTokenPos' => 112,
                'endFilePos' => 879,
              ),
            ),
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
            'isPromoted' => true,
            'attributes' => 
            array (
            ),
            'startLine' => 31,
            'endLine' => 31,
            'startColumn' => 9,
            'endColumn' => 49,
            'parameterIndex' => 1,
            'isOptional' => true,
          ),
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 29,
        'endLine' => 32,
        'startColumn' => 5,
        'endColumn' => 8,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'SmartDato\\PostIt\\Requests',
        'declaringClassName' => 'SmartDato\\PostIt\\Requests\\TrackShipmentRequest',
        'implementingClassName' => 'SmartDato\\PostIt\\Requests\\TrackShipmentRequest',
        'currentClassName' => 'SmartDato\\PostIt\\Requests\\TrackShipmentRequest',
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
        'docComment' => NULL,
        'startLine' => 34,
        'endLine' => 37,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'SmartDato\\PostIt\\Requests',
        'declaringClassName' => 'SmartDato\\PostIt\\Requests\\TrackShipmentRequest',
        'implementingClassName' => 'SmartDato\\PostIt\\Requests\\TrackShipmentRequest',
        'currentClassName' => 'SmartDato\\PostIt\\Requests\\TrackShipmentRequest',
        'aliasName' => NULL,
      ),
      'createDtoFromResponse' => 
      array (
        'name' => 'createDtoFromResponse',
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
            'startLine' => 42,
            'endLine' => 42,
            'startColumn' => 43,
            'endColumn' => 60,
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
            'name' => 'SmartDato\\PostIt\\Data\\TrackingResponseData',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * @throws JsonException
 */',
        'startLine' => 42,
        'endLine' => 48,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'SmartDato\\PostIt\\Requests',
        'declaringClassName' => 'SmartDato\\PostIt\\Requests\\TrackShipmentRequest',
        'implementingClassName' => 'SmartDato\\PostIt\\Requests\\TrackShipmentRequest',
        'currentClassName' => 'SmartDato\\PostIt\\Requests\\TrackShipmentRequest',
        'aliasName' => NULL,
      ),
      'defaultBody' => 
      array (
        'name' => 'defaultBody',
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
 * @return array<string, array<string, mixed>>
 */',
        'startLine' => 53,
        'endLine' => 67,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 2,
        'namespace' => 'SmartDato\\PostIt\\Requests',
        'declaringClassName' => 'SmartDato\\PostIt\\Requests\\TrackShipmentRequest',
        'implementingClassName' => 'SmartDato\\PostIt\\Requests\\TrackShipmentRequest',
        'currentClassName' => 'SmartDato\\PostIt\\Requests\\TrackShipmentRequest',
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