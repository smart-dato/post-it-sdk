<?php declare(strict_types = 1);

// odsl-/Users/tschigo/Developer/dls/packages/post-it-sdk/src/Requests/CreateWaybillRequest.php-PHPStan\BetterReflection\Reflection\ReflectionClass-SmartDato\PostIt\Requests\CreateWaybillRequest
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-6.70.0.1-8.4.21-4323f8e97c4c14008807cc41c62f0d7cd6c5ff6fd28901bd345f776be7743310',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'SmartDato\\PostIt\\Requests\\CreateWaybillRequest',
        'filename' => '/Users/tschigo/Developer/dls/packages/post-it-sdk/src/Requests/CreateWaybillRequest.php',
      ),
    ),
    'namespace' => 'SmartDato\\PostIt\\Requests',
    'name' => 'SmartDato\\PostIt\\Requests\\CreateWaybillRequest',
    'shortName' => 'CreateWaybillRequest',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 32,
    'docComment' => '/**
 * `POST /postalandlogistics/parcel/waybill` — create one or more waybills.
 *
 * On success the response carries an array of `waybills[].code` (waybill
 * numbers) and `waybills[].downloadURL` (PDF label URL).
 */',
    'attributes' => 
    array (
    ),
    'startLine' => 22,
    'endLine' => 55,
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
        'declaringClassName' => 'SmartDato\\PostIt\\Requests\\CreateWaybillRequest',
        'implementingClassName' => 'SmartDato\\PostIt\\Requests\\CreateWaybillRequest',
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
            'startLine' => 26,
            'endLine' => 26,
            'startTokenPos' => 86,
            'startFilePos' => 675,
            'endTokenPos' => 88,
            'endFilePos' => 686,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 26,
        'endLine' => 26,
        'startColumn' => 5,
        'endColumn' => 44,
        'isPromoted' => false,
        'declaredAtCompileTime' => true,
        'immediateVirtual' => false,
        'immediateHooks' => 
        array (
        ),
      ),
      'data' => 
      array (
        'declaringClassName' => 'SmartDato\\PostIt\\Requests\\CreateWaybillRequest',
        'implementingClassName' => 'SmartDato\\PostIt\\Requests\\CreateWaybillRequest',
        'name' => 'data',
        'modifiers' => 132,
        'type' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'SmartDato\\PostIt\\Data\\WaybillRequestData',
            'isIdentifier' => false,
          ),
        ),
        'default' => NULL,
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 29,
        'endLine' => 29,
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
          'data' => 
          array (
            'name' => 'data',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'SmartDato\\PostIt\\Data\\WaybillRequestData',
                'isIdentifier' => false,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => true,
            'attributes' => 
            array (
            ),
            'startLine' => 29,
            'endLine' => 29,
            'startColumn' => 9,
            'endColumn' => 49,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 28,
        'endLine' => 30,
        'startColumn' => 5,
        'endColumn' => 8,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'SmartDato\\PostIt\\Requests',
        'declaringClassName' => 'SmartDato\\PostIt\\Requests\\CreateWaybillRequest',
        'implementingClassName' => 'SmartDato\\PostIt\\Requests\\CreateWaybillRequest',
        'currentClassName' => 'SmartDato\\PostIt\\Requests\\CreateWaybillRequest',
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
        'startLine' => 32,
        'endLine' => 35,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'SmartDato\\PostIt\\Requests',
        'declaringClassName' => 'SmartDato\\PostIt\\Requests\\CreateWaybillRequest',
        'implementingClassName' => 'SmartDato\\PostIt\\Requests\\CreateWaybillRequest',
        'currentClassName' => 'SmartDato\\PostIt\\Requests\\CreateWaybillRequest',
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
            'startLine' => 40,
            'endLine' => 40,
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
            'name' => 'SmartDato\\PostIt\\Data\\WaybillResponseData',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * @throws JsonException
 */',
        'startLine' => 40,
        'endLine' => 46,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'SmartDato\\PostIt\\Requests',
        'declaringClassName' => 'SmartDato\\PostIt\\Requests\\CreateWaybillRequest',
        'implementingClassName' => 'SmartDato\\PostIt\\Requests\\CreateWaybillRequest',
        'currentClassName' => 'SmartDato\\PostIt\\Requests\\CreateWaybillRequest',
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
 * @return array<string, mixed>
 */',
        'startLine' => 51,
        'endLine' => 54,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 2,
        'namespace' => 'SmartDato\\PostIt\\Requests',
        'declaringClassName' => 'SmartDato\\PostIt\\Requests\\CreateWaybillRequest',
        'implementingClassName' => 'SmartDato\\PostIt\\Requests\\CreateWaybillRequest',
        'currentClassName' => 'SmartDato\\PostIt\\Requests\\CreateWaybillRequest',
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