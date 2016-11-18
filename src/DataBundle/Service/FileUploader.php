<?php

namespace Dataundle\Service;

use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileUploader
{
    private $targetDir;
    private $prefixDir;

    public function __construct($targetDir, $prefixDir)
    {
        $this->targetDir = $targetDir;
        $this->prefixDir = $prefixDir;
    }

    public function upload(UploadedFile $file)
    {
        $fileName = md5(uniqid()).'.'.$file->guessExtension();

        $file->move($this->targetDir, $fileName);

        return $fileName;
    }
    
    public function getTargetPath()
    {
        return $this->targetDir;
    }
    
    public function getPrefixPath()
    {
        return $this->prefixDir;
    }
}