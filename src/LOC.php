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
            while(false !== ($line = @fgets($this->filepointer))) {
                /**
                 * Get the first character
                 */
               // $in = fgetc($this->filepointer);

               // Stats::character($in,$this->filepointer);
                Analyse::line($line);
            }
        }
        fclose($this->filepointer);
        return Analyse::getAll();
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