<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Http;

class DocumentationTest extends TestCase
{
    /** @test */
    public function visit_documentation(): void
    {
        $res = Http::get('https://documenter.getpostman.com/view/10880762/2sA3XJk4hm');
        $this->assertTrue($res->ok());
    }
}
