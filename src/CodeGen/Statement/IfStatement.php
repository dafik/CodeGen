<?php
namespace CodeGen\Statement;
use CodeGen\Statement\Statement;
use CodeGen\Block;
use CodeGen\Renderable;
use CodeGen\VariableDeflator;

class IfStatement extends Block implements Renderable
{
    protected $condition;

    protected $ifblock;

    public function __construct(Renderable $condition, $block = NULL)
    {
        $this->condition = $condition;
        if ($block) {
            if (is_callable($block)) {
                $this->ifblock = $block();
            } else {
                $this->ifblock = $block;
            }
        } else {
            $this->ifblock = new Block;
        }
    }

    public function getBlock()
    {
        return $this->ifblock;
    }

    public function render(array $args = array()) 
    {
        $this->ifblock->setIndentLevel($this->indentLevel + 1);

        $this[] = 'if (' . VariableDeflator::deflate($this->condition) . ') {';
        $this[] = $this->ifblock;
        $this[] = '}';
        return parent::render($args);
    }

}






