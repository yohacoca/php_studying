<?php
declare(strict_types=1);

namespace tools\package\file;

use PHPUnit\Framework\TestCase;

class FIle extends TestCase
{

    public function test_write_to_file(): void
    {

        $string = "test";
        $file = "output.txt";

        file_put_contents($file, $string);

        $this->assertTrue(true);
    }


}