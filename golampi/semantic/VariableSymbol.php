<?php

class VariableSymbol {

    private string $name;
    private string $type;
    private int    $line;
    private int    $column;
    private string $scope;
    private        $value;
    private bool   $isConst;

    public function __construct(
        string $name,
        string $type,
        int    $line    = 0,
        int    $column  = 0,
        string $scope   = 'global',
               $value   = null,
        bool   $isConst = false
    ) {
        $this->name    = $name;
        $this->type    = $type;
        $this->line    = $line;
        $this->column  = $column;
        $this->scope   = $scope;
        $this->value   = $value;
        $this->isConst = $isConst;
    }

    public function getName():    string { return $this->name;    }
    public function getType():    string { return $this->type;    }
    public function getLine():    int    { return $this->line;    }
    public function getColumn():  int    { return $this->column;  }
    public function getScope():   string { return $this->scope;   }
    public function getValue()           { return $this->value;   }
    public function setValue($v): void   { $this->value = $v;     }
    public function isConst():    bool   { return $this->isConst; }

    public function toArray(): array {
        return [
            "name"    => $this->name,
            "type"    => $this->type,
            "scope"   => $this->scope,
            "value"   => $this->value,
            "line"    => $this->line,
            "column"  => $this->column,
            "isConst" => $this->isConst,
        ];
    }
}