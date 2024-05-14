<?php

    namespace App\Http\Responses;

    class responses{


        public static function success ($mensaje, $statusCode, $data = []) {

            return response()->json([
                'error' => false,
                'statusCode' => $statusCode,
                'mensaje' => $mensaje,
                'data' => $data
            ], $statusCode);
        }

        public static function error ($mensaje, $statusCode, $data = []){

            return response()->json([
                'error' => true,
                'statusCode' => $statusCode,
                'mensaje' => $mensaje,
                'data' => $data
            ], $statusCode);
        }
    }
