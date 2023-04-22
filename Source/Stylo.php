<?php

namespace Liloi\Stylo;

/**
 * Stylo (server side).
 *
 * @todo: Cover by tests
 */
class Stylo
{
    /**
     * Stylo program.
     *
     * @var string|null
     */
    private ?string $input = null;

    /**
     * Stylo constructor.
     *
     * @param string $input
     */
    private function __construct(string $input)
    {
        $this->input = $input;
    }

    /**
     * Create object getting Stylo program in file.
     *
     * @param string $fn
     * @return static
     */
    public static function createFile(string $fn): self
    {
        return new self(file_get_contents($fn));
    }

    /**
     * Create object getting Stylo program in variable.
     *
     * @param string $input
     * @return static
     */
    public static function createVariable(string $input): self
    {
        return new self($input);
    }

    public function parse(): StyloResult
    {
        return new StyloResult(Parser::parseString($this->input));
    }
}