<?php

declare(strict_types=1);

namespace Devayes\Tao;

use Illuminate\Contracts\Config\Repository;
use Illuminate\Support\Arr;

class Tao
{

    /**
     * @var $config
     */
    protected $config;


    /**
     * @param \Illuminate\Contracts\Config\Repository $config
     *
     * @return void
     */
    public function __construct(Repository $config)
    {
        $this->config = $config->get('tao');
    }

    /**
     * Get a chapter from data file.
     *
     * @param integer|null $chapter
     * @param string|null $format
     * @return string|array
     */
    public function getChapter(?int $chapter = null, ?string $format = 'array')
    {
        $data = $this->getTaoData();

        $index = $chapter ?? mt_rand(1, count($data));
        $chapter = \Arr::get($data, 'ch' . $index);

        if ($format == 'string') {
            return $this->getChapterAsString($chapter);
        }

        return $chapter;
    }

    /**
     * Stringify a chapter
     *
     * @param array $chapter
     * @return string
     */
    public function getChapterAsString(array $chapter): string
    {
        $string = PHP_EOL;
        foreach ($chapter as $line) {
            if (empty($line)) {
                $string .= PHP_EOL;
            } else {
                $string .= "\t" . $line . PHP_EOL;
            }
        }

        return $string . PHP_EOL;
    }

    /**
     * Get Tao chapters.
     *
     * @return string
     */
    public function getTaoData()
    {
        static $data = null;

        if (is_null($data)) {
            $data = include_once(realpath(__DIR__ . '/data/tao.php'));
        }

        return $data;
    }

    /**
     * MacOS voices
     * Should be available by language, etc. Skip for now.
     */
    public function getVoices(): array
    {
        return [
            'Albert',
            'Allison',
            'Agnes',
            'Kathy',
            'Karen',
            'Vicki',
            'Victoria',
            'Alex',
            'Bruce',
            'Fred',
            'Junior',
            'Ralph',
            'Albert',
            'Zarvox'
        ];
    }
}
