<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Service\UrlBuilder;

use Spryker\Service\Kernel\AbstractBundleConfig;

class UrlBuilderConfig extends AbstractBundleConfig
{
    /**
     * @uses {@link \Spryker\Shared\FileSystem\FileSystemConstants::FILESYSTEM_SERVICE}
     *
     * @var string
     */
    protected const FILESYSTEM_SERVICE = 'FILESYSTEM:FILESYSTEM_SERVICE';

    /**
     * @api
     *
     * @return array<string, mixed>
     */
    public function getFilesystemConfiguration(): array
    {
        return $this->get(static::FILESYSTEM_SERVICE);
    }
}
