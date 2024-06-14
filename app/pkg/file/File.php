<?php

namespace app\pkg\file;

class File
{
    private $file;

    public function __construct(string $path)
    {
        $this->file = fopen($path, "a+");
    }

    public function __destruct()
    {
        fclose($this->file);
    }
}
