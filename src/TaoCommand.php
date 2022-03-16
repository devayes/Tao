<?php

namespace Devayes\Tao;

use Illuminate\Console\Command;

class TaoCommand extends Command
{
    //protected $hidden = true;

    public $signature = '
        tao:chapter
        {--chapter= : [empty|null] for a random chapter, 1-81 for a specific chapter.}
    ';

    public $description = 'Display a selected or random chapter from the Tao Te Ching.';

    /**
     * Run the command
     *
     * @return integer
     */
    public function handle()
    {
        $chapter = $this->option('chapter');

        foreach (app('tao')->getChapter($chapter, 'array') as $line) {
            $this->line($line);
        }
        $this->newLine();

        return self::SUCCESS;
    }
}
