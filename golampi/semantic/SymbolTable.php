<?php
class SymbolTable {

    private array $functions = [];
    private array $scopes = [];
    private array $scopeHistory = [];

    public function __construct() {
        $this->enterScope(); // scope global
    }

    /* ========================
       FUNCIONES
       ======================== */

    public function defineFunction(string $name, $symbol) {
        if (isset($this->functions[$name])) {
            throw new Exception("Error Semántico: La función '$name' ya está definida.");
        }
        $this->functions[$name] = $symbol;
    }

    public function getFunction(string $name) {
        return $this->functions[$name] ?? null;
    }

    public function getAllFunctions() {
        return $this->functions;
    }

    /* ========================
       VARIABLES
       ======================== */

    public function enterScope() {
        array_push($this->scopes, []);
    }

    public function exitScope() {

    if (count($this->scopes) <= 1) {
        return; // nunca eliminar el scope global
    }

    $scope = array_pop($this->scopes);
    $this->scopeHistory[] = $scope;
}


    public function defineVariable(string $name, $symbol) {
        $currentScope = &$this->scopes[count($this->scopes) - 1];

        if (isset($currentScope[$name])) {
            throw new Exception("Error Semántico: Variable '$name' ya declarada en este ámbito.");
        }

        $currentScope[$name] = $symbol;
    }

    public function resolveVariable(string $name) {
        for ($i = count($this->scopes) - 1; $i >= 0; $i--) {
            if (isset($this->scopes[$i][$name])) {
                return $this->scopes[$i][$name];
            }
        }
        return null;
    }

    /* ========================
       SERIALIZACIÓN PARA JSON
       ======================== */

   public function toArray(): array {

    $functionsArray = [];

    foreach ($this->functions as $name => $functionSymbol) {
        $functionsArray[$name] = method_exists($functionSymbol, 'toArray')
            ? $functionSymbol->toArray()
            : $name;
    }

    $scopesArray = [];

    $allScopes = array_merge($this->scopes, $this->scopeHistory);

    foreach ($allScopes as $index => $scope) {

        $scopeData = [];

        foreach ($scope as $varName => $varSymbol) {
            $scopeData[$varName] = method_exists($varSymbol, 'toArray')
                ? $varSymbol->toArray()
                : $varName;
        }

        $scopesArray["scope_" . $index] = $scopeData;
    }

    return [
        "functions" => $functionsArray,
        "scopes" => $scopesArray
    ];
}

public function resolveInCurrentScope(string $name) {

    if (empty($this->scopes)) {
        return null;
    }

    $currentScope = $this->scopes[count($this->scopes) - 1];

    return $currentScope[$name] ?? null;
}


}
