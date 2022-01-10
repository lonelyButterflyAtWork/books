<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\Models\Author;
use PHPUnit\Framework\TestCase;

class AuthorTest extends TestCase
{

    private $author;

    public function __construct()
    {
        $this->autor = new Author();
        parent::__construct();
    }

    public function testIfTimestampsIsFalse()
    {
        $this->assertClassHasAttribute('fillable', Author::class);
        $this->assertEquals($this->autor->fillable, false);
    }
}
