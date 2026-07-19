<?php

/*
|--------------------------------------------------------------------------
| Helpers
|--------------------------------------------------------------------------
|
| Here you can define common functions that you can reuse in all your test files. For example, you can define a function to authenticate a user and then use it in all your test files.
|
*/
function getToken(): ?string
{
  return $_ENV['ABACATEPAY_API_KEY'];
}
