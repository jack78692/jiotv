<?php
$creds = json_decode(file_get_contents('assets/data/creds.json'), true);
$ssoToken = $creds['eyJ0eXAiOiJKV1QiLCJhbGciOiJFUzI1NiJ9.eyJ1bmlxdWUiOiI0ZThlMDQ5NS01ZmFiLTQ1ZTMtYWVlOC02OWYyZWIwOTI5NDAiLCJ1c2VyVHlwZSI6IlJJTHBlcnNvbiIsImF1dGhMZXZlbCI6IjIwIiwiZGV2aWNlSWQiOiJhYmQ4ZTkzYWRiN2Y1ZDU2NjE1ZTA5YTViOTE4NTg4M2VjYzdmMTA0ZmMxNDg3ZGE4MmY2YzEyMzA1ZDY5YmI2Yjk3MjdlMmFlYjIyZmQ0MGNkMDc4ZThhMzUyNjIxYWY0NjJmMzk2MDI1MDUxZTEzZTBkMDE2MmIzZjRhZDU4MyIsImp0aSI6IjI4YWNmZDQ5LTMyZWEtNGVlYi05ZjFhLTY5YjA2YWMzYjNiYiIsImlhdCI6MTY4MDUxMTk1Nn0.QPPd8h3639bdBYaIgY7dvRn9iWRof8PO9JkizUb-_TOU0MAFs_RdzBgFZu1LRWDJqimPZVrkSLTHr_6l-1fTAw'];

function magic($str)
{
    $str = base64_encode(md5($str, true));
    return str_replace("\n", "", str_replace("\r", "", str_replace("/", "_", str_replace("+", "-", str_replace("=", "", $str)))));
}

function generateToken()
{
    global $ssoToken;
    $st = magic($ssoToken);
    $pxe = time() + 6000000;
    $jct = trim(magic("cutibeau2ic" . $st . $pxe));
    return "?jct=" . $jct . "&pxe=" . $pxe . "&st=" . $st;
}

$token = generateToken();





