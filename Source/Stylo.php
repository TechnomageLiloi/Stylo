<?php

namespace Liloi\Stylo;

/**
 * Stylo (server side).
 *
 * @todo: Cover by tests
 */
class Stylo
{
    private ?string $input = null;

    private function __construct(string $input)
    {
        $this->input = $input;
    }

    public static function createFile(string $fn): self
    {
        return new self(file_get_contents($fn));
    }

    public static function createVariable(string $input): self
    {
        return new self($input);
    }

    public function parse(): StyloResult
    {
        return new StyloResult(Parser::parseString($this->input));
    }
}