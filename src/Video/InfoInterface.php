<?php

declare(strict_types=1);

namespace Soluble\MediaTools\Video;

interface InfoInterface
{
    /**
     * Return original file path.
     */
    public function getFile(): string;

    /**
     * Return total duration in seconds (decimals shows milliseconds).
     */
    public function getDuration(): float;

    /**
     * @return array<string, int> associative array with 'height' and 'width'
     */
    public function getDimensions(): array;

    /**
     * Return main video stream width.
     */
    public function getWidth(): int;

    /**
     * Return main video stream height.
     */
    public function getHeight(): int;

    /**
     * Return bumber of frames.
     */
    public function getNbFrames(): int;

    /**
     * Return video bitrate.
     */
    public function getBitrate(): int;
}
