<?php
namespace Metrics;

class LOC {

    protected $file;

    protected $filepointer;

    protected $tokens;


    public function __construct($file)
    {
        $this->file = $file;
    }

    public function calculate()
    {
        /**
         * Set the filePointer
         */
        $this->preProcess();

        if($this->filepointer) {

            while(!feof($this->filepointer)) {
                /**
                 * Get the first character
                 */
                $in = fgetc($this->filepointer);
                /**
                 * Check for the new line
                 */
                if($in === "\n") {
                    Stats::$totalLines++;
                }
            }
        }
        fclose($this->filepointer);
        return Stats::getTotalLines();
    }

    protected function readFile()
    {
        $this->filepointer = (new Reader($this->file))->getContent();
    }

    protected function preProcess()
    {
        $this->readFile();

    }
} 