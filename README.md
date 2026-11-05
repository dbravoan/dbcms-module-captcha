# dbravoan/dbcms-module-captcha 1.0.0

## Qué hace

`dbravoan/dbcms-module-captcha` genera captchas SVG/matemáticos internos con tokens cifrados y puede integrar Google reCAPTCHA v3 o Cloudflare Turnstile para formularios e inicio de sesión.

## Requisitos y dependencias

- `dbravoan/dbcms-core` `^1.0`
- Identificador: `captcha`

## Instalación y activación

Instala y activa `captcha`. Elige el motor en ajustes. Registra el tipo de campo de captcha en formularios del núcleo. Un motor externo sin claves cae al desafío interno (comportamiento del servicio).

## Configuración

Ajustes del módulo (panel; claves por nombre):

- `driver`
- `min_score`
- `site_key`
- `secret_key`

## Rutas

No aplica (sin rutas propias del módulo).

## Comandos Artisan

Ninguno.

## Permisos

Ninguno registrado por este paquete.

## Privacidad y datos

Tratamiento `captcha` cuando el motor no es solo interno. `CaptchaCookieDisclosure` no declara categorías para el driver `internal`. Site Key / Secret Key son ajustes; la Secret Key está marcada como secreta en `module.json`.

## Enlaces

- [Extensiones](../../../docs/EXTENSIONS.md)
- [Núcleo y extensiones](../../../specs/CORE_AND_EXTENSIONS.md)
- [README del núcleo](../../../packages/core/README.md)
- [README del monorepo](../../../README.md)
