<?php

class FunctionSymbol {

    private string $name;
    private array  $params;
    private array  $returnTypes;
    private int    $line;
    private int    $column;

    public function __construct(
        string $name,
        array  $params,
        array  $returnTypes,
        int    $line   = 0,
        int    $column = 1
    ) {
        $this->name        = $name;
        $this->params      = $params;
        $this->returnTypes = $returnTypes;
        $this->line        = $line;
        $this->column      = $column;
    }

    public function getName():        string { return $this->name;        }
    public function getParams():      array  { return $this->params;      }
    public function getReturnTypes(): array  { return $this->returnTypes; }
    public function getLine():        int    { return $this->line;        }
    public function getColumn():      int    { return $this->column;      }

    public function toArray(): array {
        return [
            'name'        => $this->name,
            'params'      => $this->params,
            'returnTypes' => $this->returnTypes,
            'line'        => $this->line,
            'column'      => $this->column,
        ];
    }
}