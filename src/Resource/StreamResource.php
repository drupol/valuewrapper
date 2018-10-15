<?php

declare(strict_types = 1);

namespace drupol\valuewrapper\Resource;

/**
 * Class StreamResource
 */
class StreamResource extends ResourceValue
{
    /**
     * {@inheritdoc
     */
    public function hash(): string
    {
        $info = \implode('', \stream_get_meta_data($this->value()));

        return $this->doHash(\get_resource_type($this->value()) . $info);
    }
}
