<?php

namespace App\Containers\Customer\Exceptions;

use App\Ship\Parents\Exceptions\Exception;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class RefreshTokenMissedException
 *
 * @author  Anshul  <mahmoud@zalt.me>
 */
class InvalidTokenException extends Exception
{
    public $httpStatusCode = Response::HTTP_BAD_REQUEST;

}
