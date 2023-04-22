<?php

namespace Liloi\Stylo;

/**
 * Stylo result object.
 *
 * @todo: Cover by tests
 */
class StyloResult
{
    private ?string $output = null;

    // @todo [TEST] What magic methods of the PHP you know?
    public function __construct(string $output)
    {
        $this->output = $output;
    }

    public function getHypertext(): string
    {
        return $this->output;
    }
}