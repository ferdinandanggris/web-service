<?php

function response($res, $http_status_code)
{
    echo json_encode(
        $res
    );
    http_response_code($http_status_code);
}
