<?php

namespace Liloi\Stylo;

/**
 * Stylo result object.
 *
 * @todo: Cover by tests
 */
class StyloResult
{
    /**
     * Output as HTML.
     *
     * @var string|null
     */
    private ?string $output = null;

    // @todo [TEST] What magic methods of the PHP you know?
    public function __construct(string $output)
    {
        $this->output = $output;
    }

    /**
     * Get output as HTML.
     *
     * @return string
     */
    public function getHypertext(): string
    {
        return sprintf("<div class='stylo'>%s</div>", $this->output);
    }
}