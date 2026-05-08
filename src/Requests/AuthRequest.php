<?php

declare(strict_types=1);

namespace SmartDato\PostIt\Requests;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * POST /user/sessions — exchanges client credentials for an access token.
 *
 * Response shape (JSON): { "access_token": "...", "expires_in": 3600, ... }
 */
final class AuthRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly string $clientId,
        private readonly string $clientSecret,
        private readonly string $scope,
        private readonly string $grantType,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/user/sessions';
    }

    /**
     * @return array<string, string>
     */
    protected function defaultBody(): array
    {
        return [
            'clientId' => $this->clientId,
            'secretId' => $this->clientSecret,
            'scope' => $this->scope,
            'grantType' => $this->grantType,
        ];
    }
}
