<?php

namespace App\Services;
use Illuminate\Support\Facades\App;

class NotificationService
{
    public static function format($notification, string $locale, string $guard): array
    {
        $data = $notification->data;
        $ticketId = $data['ticket_id'] ?? null;

        // Asegurarse de que el ID es un entero
        if ($ticketId) {
            $ticketId = (int) $ticketId;
        }

        // Construir la URL usando las rutas traducidas del diccionario
        $link = null;

        if ($ticketId) {
            // Obtener la ruta traducida según el locale
            $routes = trans('routes', [], $locale);
            
            $link = match ($guard) {
                'admin' => self::buildTranslatedRoute('admin.view.ticket', $ticketId, $locale, $routes),
                'user' => self::buildTranslatedRoute('user.tickets.show', $ticketId, $locale, $routes),
                default => null,
            };
        }

        return [
            'type'       => $data['type'] ?? null,
            'ticket_id'  => $ticketId,
            'title'      => $data['title'] ?? null,
            'message'    => $data['message'] ?? null,
            'comment'    => $data['comment'] ?? null,   
            'author'     => $data['author'] ?? null,
            'created_by' => $data['created_by'] ?? null,
            'priority'   => $data['priority'] ?? null,
            'status'     => $data['status'] ?? null,
            'locale'     => $locale,
            'updated_by' => is_array($data['updated_by'] ?? null)
                                ? $data['updated_by']['name'] ?? null
                                : $data['updated_by'] ?? null,
            'created_at' => $notification->created_at->format('d/m/Y H:i'),
            'link'       => $link,
        ];
    }

    /**
     * Construir una ruta traducida manualmente
     */
    private static function buildTranslatedRoute(string $routeName, int $ticketId, string $locale, array $routes): string
    {
        // Obtener la ruta traducida
        $translatedPath = $routes[$routeName] ?? null;

        if (!$translatedPath) {
            // Si no existe la traducción, construir con ruta por defecto
            return url("/$locale/admin/tickets/$ticketId");
        }

        // Reemplazar el parámetro {ticket} con el ID
        $path = str_replace('{ticket}', $ticketId, $translatedPath);

        return url("/$locale/$path");
    }
}
