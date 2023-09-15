<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Service\UrlBuilder;

use Spryker\Service\Kernel\AbstractServiceFactory;
use SprykerDemo\Service\UrlBuilder\FilesystemUrl\Configuration\FileStorageConfigurationFactory;
use SprykerDemo\Service\UrlBuilder\FilesystemUrl\Configuration\FileStorageConfigurationFactoryInterface;
use SprykerDemo\Service\UrlBuilder\FilesystemUrl\FileStorageUrl\FileStorageUrlBuilderInterface;
use SprykerDemo\Service\UrlBuilder\FilesystemUrl\FileStorageUrl\S3FileStorageUrlBuilder;
use SprykerDemo\Service\UrlBuilder\FilesystemUrl\FilesystemUrlBuilder;
use SprykerDemo\Service\UrlBuilder\FilesystemUrl\FilesystemUrlBuilderInterface;

/**
 * @method \SprykerDemo\Service\UrlBuilder\UrlBuilderConfig getConfig()
 */
class UrlBuilderServiceFactory extends AbstractServiceFactory
{
    /**
     * @return \SprykerDemo\Service\UrlBuilder\FilesystemUrl\FilesystemUrlBuilderInterface
     */
    public function createFilesystemUrlBuilder(): FilesystemUrlBuilderInterface
    {
        return new FilesystemUrlBuilder($this->getFileStorageUrlBuilders(), $this->createFileStorageConfigurationFactory());
    }

    /**
     * @return \SprykerDemo\Service\UrlBuilder\FilesystemUrl\Configuration\FileStorageConfigurationFactoryInterface
     */
    public function createFileStorageConfigurationFactory(): FileStorageConfigurationFactoryInterface
    {
        return new FileStorageConfigurationFactory($this->getConfig());
    }

    /**
     * @return array<\SprykerDemo\Service\UrlBuilder\FilesystemUrl\FileStorageUrl\FileStorageUrlBuilderInterface>
     */
    public function getFileStorageUrlBuilders(): array
    {
        return [
            $this->createS3FileStorageUrlBuilder(),
        ];
    }

    /**
     * @return \SprykerDemo\Service\UrlBuilder\FilesystemUrl\FileStorageUrl\FileStorageUrlBuilderInterface
     */
    public function createS3FileStorageUrlBuilder(): FileStorageUrlBuilderInterface
    {
        return new S3FileStorageUrlBuilder();
    }
}
