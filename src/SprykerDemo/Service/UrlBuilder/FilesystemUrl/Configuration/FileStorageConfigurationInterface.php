<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Service\UrlBuilder\FilesystemUrl\Configuration;

interface FileStorageConfigurationInterface
{
    /**
     * @return string
     */
    public function getAdapterClassName(): string;

    /**
     * @param string $parameterName
     * @param bool $failOnEmpty
     *
     * @throws \SprykerDemo\Service\UrlBuilder\Exception\StorageConfigurationException
     *
     * @return mixed|null
     */
    public function getParameter(string $parameterName, bool $failOnEmpty = false);

    /**
     * @return string
     */
    public function getFileStorageName(): string;
}
