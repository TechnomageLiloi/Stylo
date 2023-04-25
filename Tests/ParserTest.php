<?php

namespace Liloi\Stylo;

use PHPUnit\Framework\TestCase;

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
        $this->assertEquals("<div id='test'><script>Test.Test(33);</script></div>", Parser::parseString('[[test:Test.Test(33)]]'));
        $this->assertEquals("<div><script>Test.Test(33);</script></div>", Parser::parseString('[[Test.Test(33)]]'));
        $this->assertEquals("<div id='test-test-test' class='stylo-block'>", Parser::parseString('[[[test-test-test]]]'));
        $this->assertEquals("</div>", Parser::parseString('[[[/]]]'));
        $this->assertEquals("", Parser::parseString('// Test'));
        $this->assertEquals("<hr/>", Parser::parseString('---'));
        $this->assertEquals("<p><input type='checkbox' checked='checked' readonly> test</p>", Parser::parseString('-[x] test'));
        $this->assertEquals("<p><input type='checkbox' readonly> test</p>", Parser::parseString('-[ ] test'));
        $this->assertEquals('<p><u>test</u></p>', Parser::parseString('^^test^^'));
        $this->assertEquals('<p><s>test</s></p>', Parser::parseString('%%test%%'));
        $this->assertEquals('<p><b>test</b></p>', Parser::parseString('**test**'));
        $this->assertEquals('<p><i>test</i></p>', Parser::parseString('__test__'));
        $this->assertEquals('<h1>test</h1>', Parser::parseString('# test'));
        $this->assertEquals('<h2>test</h2>', Parser::parseString('## test'));
        $this->assertEquals('<h3>test</h3>', Parser::parseString('### test'));
        $this->assertEquals('<h4>test</h4>', Parser::parseString('#### test'));
        $this->assertEquals('<h5>test</h5>', Parser::parseString('##### test'));
        $this->assertEquals("<p><a class='button-trigger' href='javascript:void(0)' data-key='test'>Test</a></p>", Parser::parseString('[Test]{test}'));
        $this->assertEquals("<p><a href='test'>Test</a></p>", Parser::parseString('[Test](test)'));
        $this->assertEquals("<p><img src='test' alt='Test' /></p>", Parser::parseString('![Test](test)'));
    }
}