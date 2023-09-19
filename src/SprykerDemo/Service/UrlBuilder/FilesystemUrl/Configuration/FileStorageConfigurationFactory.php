<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Service\UrlBuilder\FilesystemUrl\Configuration;

use SprykerDemo\Service\UrlBuilder\UrlBuilderConfig;

class FileStorageConfigurationFactory implements FileStorageConfigurationFactoryInterface
{
    /**
     * @var \SprykerDemo\Service\UrlBuilder\UrlBuilderConfig
     */
    protected UrlBuilderConfig $config;

    /**
     * @param \SprykerDemo\Service\UrlBuilder\UrlBuilderConfig $config
     */
    public function __construct(UrlBuilderConfig $config)
    {
        $this->config = $config;
    }

    /**
     * @param string $filesystemName
     *
     * @return \SprykerDemo\Service\UrlBuilder\FilesystemUrl\Configuration\FileStorageConfigurationInterface
     */
    public function createFileStorageConfiguration(string $filesystemName): FileStorageConfigurationInterface
    {
        return new FileStorageConfiguration($filesystemName, $this->config);
    }
}
