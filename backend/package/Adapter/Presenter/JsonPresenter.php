<?php

namespace Package\Adapter\Presenter;

use Package\Adapter\ViewModel\JsonViewModel;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\ResponseFactory;

abstract class JsonPresenter
{
    /**
     * @var ResponseFactory
     */
    private $response;

    /**
     * JsonPresenter constructor.
     * @param ResponseFactory $response
     */
    public function __construct(ResponseFactory $response)
    {
        $this->response = $response;
    }

    /**
     * @param JsonViewModel|JsonViewModel[]|bool[]|int[]|float[]|string[]|null[]|bool|int|float|string|null $json
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    protected function jsonResponse($json = null): JsonResponse
    {
        $expandedJsonnViewModels = function ($item) use (&$expandedJsonnViewModels) {
            if ($item instanceof JsonViewModel) {
                return array_map($expandedJsonnViewModels, $item->toArray());
            } else if (is_array($item)) {
                return array_map($expandedJsonnViewModels, $item);
            } else if (is_scalar($item) || is_null($item)) {
                return $item;
            }
            throw new Exception( "Response data type has to be one of [bool, int ,float, string, null]" );
        };
        return $this->response
            ->json([
                'data' => $expandedJsonnViewModels($json),
            ], 200)
            ->header('Content-type', 'application/json')
            ->header('charset', 'UTF-8');
    }
}
