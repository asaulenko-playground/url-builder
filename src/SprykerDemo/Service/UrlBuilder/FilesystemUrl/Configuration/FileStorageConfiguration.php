<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Service\UrlBuilder\FilesystemUrl\Configuration;

use SprykerDemo\Service\UrlBuilder\Exception\StorageConfigurationException;
use SprykerDemo\Service\UrlBuilder\UrlBuilderConfig;

class FileStorageConfiguration implements FileStorageConfigurationInterface
{
    /**
     * @var string
     */
    protected const PARAMETER_ADAPTER_CLASS_NAME = 'sprykerAdapterClass';

    /**
     * @var \SprykerDemo\Service\UrlBuilder\UrlBuilderConfig
     */
    protected UrlBuilderConfig $config;

    /**
     * @var string
     */
    private string $fileStorageName;

    /**
     * @param string $fileStorageName
     * @param \SprykerDemo\Service\UrlBuilder\UrlBuilderConfig $config
     */
    public function __construct(string $fileStorageName, UrlBuilderConfig $config)
    {
        $this->fileStorageName = $fileStorageName;
        $this->config = $config;

        $this->assertConfig();
    }

    /**
     * @return string
     */
    public function getAdapterClassName(): string
    {
        return $this->getParameter(static::PARAMETER_ADAPTER_CLASS_NAME);
    }

    /**
     * @param string $parameterName
     * @param bool $failOnEmpty
     *
     * @throws \SprykerDemo\Service\UrlBuilder\Exception\StorageConfigurationException
     *
     * @return mixed|null
     */
    public function getParameter(string $parameterName, bool $failOnEmpty = false)
    {
        $parameterName = $this->config->getFilesystemConfiguration()[$this->fileStorageName][$parameterName] ?? null;

        if ($parameterName === null && $failOnEmpty) {
            throw new StorageConfigurationException(
                sprintf(
                    'Configuration parameter "%s" for file storage "%s" not set.',
                    $parameterName,
                    $this->fileStorageName,
                ),
            );
        }

        return $parameterName;
    }

    /**
     * @return string
     */
    public function getFileStorageName(): string
    {
        return $this->fileStorageName;
    }

    /**
     * @throws \SprykerDemo\Service\UrlBuilder\Exception\StorageConfigurationException
     *
     * @return void
     */
    protected function assertConfig(): void
    {
        $fileStorageConfig = $this->config->getFilesystemConfiguration()[$this->fileStorageName] ?? null;

        if ($fileStorageConfig === null) {
            throw new StorageConfigurationException(
                sprintf(
                    'Configuration for file storage "%s" not found.',
                    $this->fileStorageName,
                ),
            );
        }

        if (!array_key_exists(static::PARAMETER_ADAPTER_CLASS_NAME, $fileStorageConfig)) {
            throw new StorageConfigurationException(
                sprintf(
                    'Spryker adapter class name not found in "%s" configuration.',
                    $this->fileStorageName,
                ),
            );
        }
    }
}
