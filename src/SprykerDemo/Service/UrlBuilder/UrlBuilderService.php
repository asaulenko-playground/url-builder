<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Service\UrlBuilder;

use Spryker\Service\Kernel\AbstractService;

/**
 * @method \SprykerDemo\Service\UrlBuilder\UrlBuilderServiceFactory getFactory()
 */
class UrlBuilderService extends AbstractService implements UrlBuilderServiceInterface
{
    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param string $storageFileName
     * @param string $fileStorageName
     *
     * @return string
     */
    public function buildFileUrl(string $storageFileName, string $fileStorageName): string
    {
        return $this->getFactory()->createFilesystemUrlBuilder()->buildFileUrl($storageFileName, $fileStorageName);
    }
}
