<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Service\UrlBuilder\FilesystemUrl\Configuration;

interface FileStorageConfigurationFactoryInterface
{
    /**
     * @param string $filesystemName
     *
     * @return \SprykerDemo\Service\UrlBuilder\FilesystemUrl\Configuration\FileStorageConfigurationInterface
     */
    public function createFileStorageConfiguration(string $filesystemName): FileStorageConfigurationInterface;
}
