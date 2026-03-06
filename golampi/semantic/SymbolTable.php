<?php

class SymbolTable {

    // Pila de scopes: cada scope es ['name' => string, 'vars' => [name => VariableSymbol]]
    private array $scopeStack = [];

    // Tabla plana de todas las variables para el reporte final
    private array $allSymbols = [];

    // Funciones registradas
    private array $functions  = [];

    // ================================================================
    // SCOPE MANAGEMENT
    // ================================================================

    public function enterScope(string $name = ''): void {
        $this->scopeStack[] = ['name' => $name, 'vars' => []];
    }

    public function exitScope(): void {
        array_pop($this->scopeStack);
    }

    public function currentScopeName(): string {
        if (empty($this->scopeStack)) return 'global';
        return end($this->scopeStack)['name'] ?: 'global';
    }

    // ================================================================
    // VARIABLES
    // ================================================================

    public function defineVariable(string $name, VariableSymbol $symbol): void {
        $idx = count($this->scopeStack) - 1;
        $this->scopeStack[$idx]['vars'][$name] = $symbol;

        // Agregar a tabla plana (permite duplicados en distintos scopes)
        $this->allSymbols[] = $symbol;
    }

    public function resolveVariable(string $name): ?VariableSymbol {
        for ($i = count($this->scopeStack) - 1; $i >= 0; $i--) {
            if (isset($this->scopeStack[$i]['vars'][$name])) {
                return $this->scopeStack[$i]['vars'][$name];
            }
        }
        return null;
    }

    public function resolveInCurrentScope(string $name): ?VariableSymbol {
        if (empty($this->scopeStack)) return null;
        $top = end($this->scopeStack);
        return $top['vars'][$name] ?? null;
    }

    // ================================================================
    // FUNCTIONS
    // ================================================================

    public function defineFunction(string $name, $symbol): void {
        $this->functions[$name] = $symbol;
    }

    public function getFunction(string $name) {
        return $this->functions[$name] ?? null;
    }

    // ================================================================
    // SERIALIZATION
    // ================================================================

    /**
     * Devuelve la tabla de símbolos estructurada para los reportes.
     */
    public function toArray(): array {
        $vars = array_map(fn($s) => $s->toArray(), $this->allSymbols);
        $funcs = [];
        foreach ($this->functions as $name => $f) {
            $funcs[$name] = $f->toArray();
        }
        return [
            'functions' => $funcs,
            'variables' => $vars,
        ];
    }
}