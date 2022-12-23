<?php

namespace Viktor\PhpPro\Shortener;

use Viktor\PhpPro\Shortener\ValueObjects\UrlCodePair;

class DBRepository implements Interfaces\ICodeRepository
{

    /**
     * @inheritDoc
     */
    public function saveEntity(UrlCodePair $urlUrlCodePair): bool
    {
        // TODO: Implement saveEntity() method.
    }

    /**
     * @inheritDoc
     */
    public function codeIsset(string $code): bool
    {
        // TODO: Implement codeIsset() method.
    }

    /**
     * @inheritDoc
     */
    public function getUrlByCode(string $code): string
    {
        // TODO: Implement getUrlByCode() method.
    }

    /**
     * @inheritDoc
     */
    public function getCodeByUrl(string $url): string
    {
        // TODO: Implement getCodeByUrl() method.
    }
}