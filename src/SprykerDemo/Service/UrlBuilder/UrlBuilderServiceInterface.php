<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Service\UrlBuilder;

/**
 * @method \SprykerDemo\Service\UrlBuilder\UrlBuilderServiceFactory getFactory()
 */
interface UrlBuilderServiceInterface
{
    /**
     * Specification:
     * - Builds URL for a file saved in file system with URL support.
     * - Throws exception if a file system does not support URLs.
     *
     * @api
     *
     * @param string $storageFileName
     * @param string $fileStorageName
     *
     * @return string
     */
    public function buildFileUrl(string $storageFileName, string $fileStorageName): string;
}
