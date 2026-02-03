# Solución: Problema del Locale 'api' en Notificaciones

## Problema Identificado

Cuando se mostraba el modal de información de notificación, la ruta generada utilizaba `$locale = 'api'` en lugar de `'es'` o `'en'`. Esto causaba que la URL fuera incorrecta:
```php
// En lugar de:
/es/admin/tickets/123

// Se generaba:
/api/admin/tickets/123
```

## Causa Raíz

El problema estaba en los controladores de API de notificaciones:

```php
$locale = $request->header('X-Locale') ?? app()->getLocale();
```

Cuando el header `X-Locale` no estaba presente o era inválido, el código hacía fallback a `app()->getLocale()`. En algunos casos, `app()->getLocale()` retornaba `'api'` porque:

1. Las rutas API usan `Route::prefix('api')` en `RouteServiceProvider`
2. El middleware `LanguageMiddleware` hace un `return early` para rutas `/api/*` sin establecer el locale
3. Sin un locale establecido explícitamente, Laravel podría usar 'api' del prefijo de ruta

## Solución Implementada

Se realizaron cambios en los siguientes archivos:

### 1. AdminApiNotificationController.php

En ambos métodos (`getNotifications` y `showNotification`):

**Antes:**
```php
$locale = $request->header('X-Locale') ?? app()->getLocale();
```

**Después:**
```php
$locale = $request->header('X-Locale') ?? 'es';
// Validar que el locale sea válido
if (!in_array($locale, ['es', 'en'])) {
    $locale = 'es';
}
app()->setLocale($locale);
```

### 2. UserNotificationController.php

En ambos métodos (`getNotificationsgetNotifications` y `showNotification`):

Aplicó el mismo cambio que en AdminApiNotificationController.

### 3. LanguageMiddleware.php

Se reorganizó el código para mayor claridad, verificando primero si es una ruta a ignorar antes de obtener el locale del segment.

## Cambios Clave

1. **Fallback a 'es'**: En lugar de usar `app()->getLocale()` como fallback (que puede retornar 'api'), ahora usamos `'es'` directamente
2. **Validación del locale**: Se valida que el locale recibido en el header sea uno de los soportados (`['es', 'en']`)
3. **Establecimiento explícito**: Se llama a `app()->setLocale($locale)` en cada método para asegurar que el locale está correctamente establecido
4. **Imports necesarios**: Se agregó `use Illuminate\Support\Facades\App;` en los controladores

## Resultado

Ahora, sin importar cómo se obtenga el locale (header, session, o default), se garantiza que:
- Siempre sea uno de los locales válidos (`'es'` o `'en'`)
- Se establezca correctamente en la aplicación
- Las rutas generadas sean correctas:
  - `/es/admin/tickets/123`
  - `/en/admin/tickets/123`
  - `/es/user/tickets/123`
  - `/en/user/tickets/123`

## Notas

- Los clientes JavaScript envían el header `X-Locale` desde `document.documentElement.lang`
- Si el cliente no envía el header o envía un valor inválido, ahora se usa 'es' como fallback
- Los otros controladores de API ya tenían validación similar (ej: `AdminDataController`, `TicketDataController`, etc.)
