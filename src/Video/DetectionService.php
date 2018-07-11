<?php

declare(strict_types=1);

namespace Soluble\MediaTools\Video;

use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;
use Soluble\MediaTools\Common\Process\ProcessParamsInterface;
use Soluble\MediaTools\Video\Config\FFMpegConfigInterface;
use Soluble\MediaTools\Video\Detection\InterlaceDetect;
use Soluble\MediaTools\Video\Detection\InterlaceDetectGuess;
use Soluble\MediaTools\Video\Exception\DetectionExceptionInterface;
use Soluble\MediaTools\Video\Exception\DetectionProcessExceptionInterface;
use Soluble\MediaTools\Video\Exception\MissingInputFileException;
use Soluble\MediaTools\Video\Exception\ProcessFailedException;
use Soluble\MediaTools\Video\Exception\RuntimeException;

class DetectionService implements DetectionServiceInterface
{
    /** @var FFMpegConfigInterface */
    protected $ffmpegConfig;

    /** @var LoggerInterface|NullLogger */
    protected $logger;

    public function __construct(FFMpegConfigInterface $ffmpegConfig, ?LoggerInterface $logger = null)
    {
        $this->ffmpegConfig  = $ffmpegConfig;
        $this->logger        = $logger ?? new NullLogger();
    }

    /**
     * @param int $maxFramesToAnalyze interlacement detection can be heavy, limit the number of frames to analyze
     *
     * @throws DetectionExceptionInterface
     * @throws DetectionProcessExceptionInterface
     * @throws ProcessFailedException
     * @throws MissingInputFileException
     * @throws RuntimeException
     */
    public function detectInterlacement(string $file, int $maxFramesToAnalyze = InterlaceDetect::DEFAULT_INTERLACE_MAX_FRAMES, ?ProcessParamsInterface $processParams = null): InterlaceDetectGuess
    {
        $interlaceDetect = new InterlaceDetect($this->ffmpegConfig);

        return $interlaceDetect->guessInterlacing($file, $maxFramesToAnalyze, $processParams);
    }
}
