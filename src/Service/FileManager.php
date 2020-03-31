<?php


namespace App\Service;


use Symfony\Component\Filesystem\Exception\IOException;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileManager
{

    private $directory = null;
    private $filesystem;
    private $oldImageName = null;

    public function __construct(Filesystem $filesystem)
    {
        $this->filesystem = $filesystem;
    }

    public function uploadFile(UploadedFile $file)
    {
        $name = date('YmdHis') . $file->getClientOriginalName();

        if (null === $this->directory) {
            throw new IOException('The directory cannot be "null"');
        }

        if( !$this->filesystem->exists($this->directory) ) {
            throw new \InvalidArgumentException(sprintf("The '%s' directory does not exists.", $this->directory));
        }

        if( null != $this->oldImageName){
            $this->toDelete();
        }

        $file->move($this->directory, $name);

        return $name;
    }

    /**
     * @param string $oldImageName
     * @return FileManager
     */
    public function setOldImageName($oldImageName): self
    {
        $this->oldImageName = $oldImageName;
        return $this;
    }

    /**
     * @param string $directory
     * @return FileManager
     */
    public function setDirectory(string $directory): self
    {
        $this->directory = $directory;
        return $this;
    }

    private function toDelete()
    {
        if ( $this->filesystem->exists($this->directory.$this->oldImageName) )
        {
            $this->filesystem->remove($this->directory.$this->oldImageName);
        }
    }
}