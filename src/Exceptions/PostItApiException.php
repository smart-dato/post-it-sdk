<?php

declare(strict_types=1);

namespace SmartDato\PostIt\Exceptions;

use RuntimeException;

/**
 * Thrown when the Poste Italiane API returns an error envelope
 * (`result.errorCode != 0`) or a malformed response that the SDK cannot
 * safely parse into a typed DTO.
 *
 * Catch this to distinguish business / protocol failures from transport
 * exceptions raised by Saloon (`FatalRequestException`, `RequestException`).
 */
final class PostItApiException extends RuntimeException {}
