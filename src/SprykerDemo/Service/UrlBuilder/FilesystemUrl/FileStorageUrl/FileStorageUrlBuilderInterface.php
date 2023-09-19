<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Service\UrlBuilder\FilesystemUrl\FileStorageUrl;

use SprykerDemo\Service\UrlBuilder\FilesystemUrl\Configuration\FileStorageConfigurationInterface;

interface FileStorageUrlBuilderInterface
{
    /**
     * @param string $filePath
     * @param \SprykerDemo\Service\UrlBuilder\FilesystemUrl\Configuration\FileStorageConfigurationInterface $fileStorageConfiguration
     *
     * @return string
     */
    public function buildFileUrl(string $filePath, FileStorageConfigurationInterface $fileStorageConfiguration): string;

    /**
     * @param string $adapterClassName
     *
     * @return bool
     */
    public function isApplicable(string $adapterClassName): bool;
}
