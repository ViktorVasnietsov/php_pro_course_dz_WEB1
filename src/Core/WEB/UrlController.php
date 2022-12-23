<?php
namespace Viktor\PhpPro\Core\WEB\UrlController;

use Viktor\PhpPro\Shortener\UrlConvertor;

class UrlController{
    public function __construct(protected UrlConvertor $urlConvertor)
    {

}
    public function getShortcode(string $id): string
    {
        $code = $this->urlConvertor->encode($id);
        return $code;
    }
}