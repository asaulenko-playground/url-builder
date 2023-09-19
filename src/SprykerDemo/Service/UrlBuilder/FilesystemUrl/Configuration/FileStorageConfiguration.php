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
    protected string $filesystemName;

    /**
     * @param string $filesystemName
     * @param \SprykerDemo\Service\UrlBuilder\UrlBuilderConfig $config
     */
    public function __construct(string $filesystemName, UrlBuilderConfig $config)
    {
        $this->filesystemName = $filesystemName;
        $this->config = $config;

        $this->assertConfig();
    }

    /**
     * @return string
     */
    public function getAdapterClassName(): string
    {
        return $this->getParameter(static::PARAMETER_ADAPTER_CLASS_NAME, true);
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
        $parameterValue = $this->config->getFilesystemConfiguration()[$this->filesystemName][$parameterName] ?? null;

        if ($parameterValue === null && $failOnEmpty) {
            throw new StorageConfigurationException(
                sprintf(
                    'Configuration parameter "%s" for file storage "%s" not set.',
                    $parameterName,
                    $this->filesystemName,
                ),
            );
        }

        return $parameterValue;
    }

    /**
     * @return string
     */
    public function getFilesystemName(): string
    {
        return $this->filesystemName;
    }

    /**
     * @throws \SprykerDemo\Service\UrlBuilder\Exception\StorageConfigurationException
     *
     * @return void
     */
    protected function assertConfig(): void
    {
        $fileStorageConfig = $this->config->getFilesystemConfiguration()[$this->filesystemName] ?? null;

        if ($fileStorageConfig === null) {
            throw new StorageConfigurationException(
                sprintf(
                    'Configuration for file storage "%s" not found.',
                    $this->filesystemName,
                ),
            );
        }

        if (!array_key_exists(static::PARAMETER_ADAPTER_CLASS_NAME, $fileStorageConfig)) {
            throw new StorageConfigurationException(
                sprintf(
                    'Spryker adapter class name not found in "%s" configuration.',
                    $this->filesystemName,
                ),
            );
        }
    }
}
