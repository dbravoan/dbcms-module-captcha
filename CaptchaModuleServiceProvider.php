<?php

declare(strict_types=1);

namespace DbCms\Modules\Captcha;

use DbCms\Core\Forms\FieldTypeRegistry;
use DbCms\Core\Modules\BaseModuleServiceProvider;
use DbCms\Modules\Captcha\Fields\CaptchaFieldType;
use DbCms\Modules\Captcha\Services\CaptchaCookieDisclosure;
use DbCms\Modules\Captcha\Services\CaptchaService;
use Illuminate\Support\Facades\Validator;

class CaptchaModuleServiceProvider extends BaseModuleServiceProvider
{
    protected string $identifier = 'captcha';

    protected string $name = 'Security & Dynamic Captcha';

    protected bool $isPageable = false;

    public function register(): void
    {
        $this->app->singleton(CaptchaService::class);
        $this->app->tag(CaptchaService::class, 'cms.csp.connect');
        $this->app->tag(CaptchaCookieDisclosure::class, 'cms.cookie-disclosures');
    }

    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__.'/Resources/views', 'captcha');

        // Register the `captcha` form field type in the core form framework.
        if ($this->app->bound(FieldTypeRegistry::class)) {
            $this->app->make(FieldTypeRegistry::class)->register(new CaptchaFieldType);
        }

        // Custom validation rule 'captcha'
        Validator::extendImplicit('captcha', function ($attribute, $value, $parameters, $validator): bool {
            /** @var CaptchaService $service */
            $service = app(CaptchaService::class);

            return $service->verifyRequest($validator->getData());
        }, 'El código de seguridad Captcha no es correcto o ha expirado.');
    }

    public function getAdminNavigation(): array
    {
        return [];
    }
}
