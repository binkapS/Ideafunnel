<?php

namespace App\Binkap;

use DOMElement;
use DateTime;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use PDO;
use RecursiveDirectoryIterator;
use RecursiveTreeIterator;
use SimpleXMLElement;
use SplObjectStorage;
use SplTempFileObject;

class Pairs
{
    public static array $articleTypes = [
        Constant::ARTICLE_TYPE_BREAKING => "Breaking News",
        Constant::ARTICLE_TYPE_UPDATE => "Update"
    ];

    public function text()
    {
        return \redirect('HomeController@index');
    }
}
