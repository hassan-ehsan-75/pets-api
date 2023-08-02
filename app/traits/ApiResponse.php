<?php
namespace App\traits;

use Carbon\Carbon;
use Illuminate\Http\Response;

trait ApiResponse
{
    protected function success(array $data=[], string $message = null, int $code = 200) :Response
    {
        return response([
            'status' => 'Success',
            'message' => $message,
            'data' => $data
        ], $code);
    }

    protected function error(string $message = null, int $code, array $data = []) :Response
    {
        return response([
            'status' => 'Error',
            'message' => $message,
            'data' => $data
        ], $code);
    }

}