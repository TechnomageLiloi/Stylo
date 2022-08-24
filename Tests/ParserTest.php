<?php

namespace Liloi\Stylo;

use PHPUnit\Framework\TestCase;
use Liloi\Stylo\Parser;

/**
 * Check {@link Parser} object.
 */
class ParserTest extends TestCase
{
    /**
     * Check {@link Parser::parseString()} method.
     */
    public function testParseString(): void
    {
        $this->assertEquals('<h1>test</h1>', Parser::parseString('# test'));
        $this->assertEquals('<h2>test</h2>', Parser::parseString('## test'));
        $this->assertEquals('<h3>test</h3>', Parser::parseString('### test'));
        $this->assertEquals('<h4>test</h4>', Parser::parseString('#### test'));
        $this->assertEquals('<h5>test</h5>', Parser::parseString('##### test'));
    }
}