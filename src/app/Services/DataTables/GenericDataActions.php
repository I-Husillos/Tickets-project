<?php

namespace App\Services\DataTables;

use Illuminate\Support\Facades\View;

class GenericDataActions
{
    protected string $editRouteKey;
    protected string $deleteRouteKey;
    protected string $viewPath;

    public function __construct(string $editRouteKey, string $deleteRouteKey, string $viewPath)
    {
        $this->editRouteKey = $editRouteKey;
        $this->deleteRouteKey = $deleteRouteKey;
        $this->viewPath = $viewPath;
    }

    public function transform($model, string $locale): array
    {
        $editUrl = url("/$locale/" . trans($this->editRouteKey, [], $locale));
        $editUrl = str_replace('{id}', $model->id, $editUrl);

        $deleteUrl = url("/$locale/" . trans($this->deleteRouteKey, [], $locale));
        $deleteUrl = str_replace('{id}', $model->id, $deleteUrl);

        return [
            'name' => $model->name,
            'email' => $model->email,
            'actions' => View::make($this->viewPath, [
                'editUrl' => $editUrl,
                'deleteUrl' => $deleteUrl,
            ])->render(),
        ];
    }
}
