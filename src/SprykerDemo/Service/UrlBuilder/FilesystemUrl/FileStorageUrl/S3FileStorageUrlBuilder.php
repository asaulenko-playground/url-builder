<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Service\UrlBuilder\FilesystemUrl\FileStorageUrl;

use SprykerDemo\Service\UrlBuilder\FilesystemUrl\Configuration\FileStorageConfigurationInterface;

class S3FileStorageUrlBuilder implements FileStorageUrlBuilderInterface
{
    /**
     * @var string
     */
    protected const PARAMETER_BUCKET = 'bucket';

    /**
     * @var string
     */
    protected const PARAMETER_REGION = 'region';

    /**
     * @var string
     */
    protected const PARAMETER_PATH = 'path';

    /**
     * @var string
     */
    protected const ADAPTER_CLASS_NAME = 'SprykerDemo\\Service\\FlysystemAws3v3FileSystem\\Plugin\\Flysystem\\Aws3v3FilesystemBuilderPlugin';

    /**
     * @param string $filePath
     * @param \SprykerDemo\Service\UrlBuilder\FilesystemUrl\Configuration\FileStorageConfigurationInterface $fileStorageConfiguration
     *
     * @return string
     */
    public function buildFileUrl(string $filePath, FileStorageConfigurationInterface $fileStorageConfiguration): string
    {
        $bucket = $fileStorageConfiguration->getParameter(static::PARAMETER_BUCKET, true);
        $region = $fileStorageConfiguration->getParameter(static::PARAMETER_REGION, true);
        $path = $fileStorageConfiguration->getParameter(static::PARAMETER_PATH);

        if ($path !== null) {
            return sprintf('https://s3.%s.amazonaws.com/%s/%s/%s', $region, $bucket, trim($path, '/'), $filePath);
        }

        return sprintf('https://s3.%s.amazonaws.com/%s/%s', $region, $bucket, $filePath);
    }

    /**
     * @param string $adapterClassName
     *
     * @return bool
     */
    public function isApplicable(string $adapterClassName): bool
    {
        return $adapterClassName === static::ADAPTER_CLASS_NAME;
    }
}
