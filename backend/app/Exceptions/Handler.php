<?php

namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $exception)
    {

        if ($exception instanceof ModelNotFoundException) {
            return response()->json(['date' => null], 404);
        }

        // レスポンスをJSON形式に変更
        if ($request->is('ajax/*') || $request->is('api/*') || $request->ajax()) {
            $message = $exception->getMessage();
            if (is_object($message)) {
                $message = $message->toArray();
            }

            // ローカルの場合file,lineも返す
            if (app()->isLocal()) {
                return response()->json([
                    'message' => $message,
                    'file' => $exception->getFile(),
                    'line' => $exception->getLine()
                ], 500);
            }

            return response()->json([
                'message' => $message,
            ], 500);
        }

        return parent::render($request, $exception);
    }
}
