<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Service\UrlBuilder\FilesystemUrl;

interface FilesystemUrlBuilderInterface
{
    /**
     * @param string $storageFileName
     * @param string $fileStorageName
     *
     * @return string
     */
    public function buildFileUrl(string $storageFileName, string $fileStorageName): string;
}
