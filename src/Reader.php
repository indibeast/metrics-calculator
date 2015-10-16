<?php
namespace Metrics;

use Metrics\Exceptions\FileNotFoundException;

class Reader {

    /**
     * @var string
     */
    protected $path = '/../resources/';
    /**
     * @var string
     */
    protected $ext = '.c';

    protected $filename;

    public function __construct($filename)
    {
        $this->filename = $filename;
    }


    public function getContent()
    {
        if($this->checkFileExists()) {
            return $this->fileOpen();
        }

        throw new FileNotFoundException(sprintf('File %s not found in %s',$this->filename.$this->ext,realpath(__DIR__.$this->path)));
    }

    /**
     * Determine file exists
     * @return bool
     */
    protected function checkFileExists()
    {
        return file_exists($this->getResourcePath());
    }

    /**
     * Get File Path
     * @return string
     */
    protected function getResourcePath()
    {
        return __DIR__.$this->path.$this->filename.$this->ext;
    }

    /**
     * Get File Contents
     * @return string
     */
    protected function fileOpen()
    {
        return fopen($this->getResourcePath(),'r');
    }

} 