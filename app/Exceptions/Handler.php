<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Session\TokenMismatchException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
        \Illuminate\Database\QueryException::class,
        \Illuminate\Database\Eloquent\ModelNotFoundException::class,
        \Illuminate\Auth\AuthenticationException::class,
        \Illuminate\Session\TokenMismatchException::class,

    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if( $exception instanceof \Illuminate\Auth\AuthenticationException) {
            return redirect(route('login'))
            ->withErrors(["AuthorizationException ! Vous n'avez pas le droit de faire cela !"]);
        }

        if( $exception instanceof NotFoundHttpException) {
            return response()->view('errors.404', [], 404);
        }

        if ($exception instanceof QueryException) {
            return response()->view('errors.500', ['exception' => $exception], 500);
        }

        if ($exception instanceof ModelNotFoundException) {
            return redirect(route('root'))
            ->withErrors(["Ressource non trouvée"]);
        }

        if ($exception instanceof AuthorizationException) {
            return redirect(route('root'))
            ->withErrors(["AuthorizationException ! Vous n'avez pas le droit de faire cela !"]);
        }

        if ($exception instanceof TokenMismatchException) {
            return redirect(route('login'))
            ->withErrors(["Votre session est expirée. Recommencez."])
            ;
        }

        if ($exception instanceof \ErrorException) {
            return response()->view('errors.500', ['exception' => $exception], 500);
        }
//         if ($exception instanceof \Exception) {
//             return response()->view('errors.500', ['exception' => $exception], 500);
//         }

        return parent::render($request, $exception);
    }
}
