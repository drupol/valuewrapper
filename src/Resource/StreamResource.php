<?php

declare(strict_types=1);

namespace drupol\valuewrapper\Resource;

/**
 * Class StreamResource.
 */
class StreamResource extends ResourceValue
{
    /**
     * {@inheritdoc.
     */
    public function hash(): string
    {
        return $this->doHash(
            $this->type() . implode('', stream_get_meta_data($this->value()))
        );
    }
}
