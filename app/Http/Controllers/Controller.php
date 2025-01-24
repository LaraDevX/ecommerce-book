<?php

namespace App\Http\Controllers;

use App\Traits\ResponseTrait;
use App\Traits\TranslationTrait;

abstract class Controller
{
    use ResponseTrait, TranslationTrait;
}
