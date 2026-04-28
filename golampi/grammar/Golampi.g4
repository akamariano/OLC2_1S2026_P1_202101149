grammar Golampi;

// ---------------- PROGRAM ----------------

program
    : (functionDecl | varDecl | constDecl)+ EOF
    ;

// ---------------- FUNCTIONS ----------------

functionDecl
    : FUNC ID '(' paramList? ')' returnType? block
    ;

paramList
    : param (',' param)*
    ;

param
    : ID type               // a int32
    | ID STAR type          // a *int32
    | ID STAR arrayType     // a *[5]int32
    | ID STAR sliceType     // a *[]int32
    | ID arrayType          // a [5]int32
    | ID sliceType          // a []int32
    ;

returnType
    : type
    | arrayType
    | sliceType
    | STAR type
    | STAR arrayType
    | STAR sliceType
    | '(' multiReturnType (',' multiReturnType)* ')'
    ;

multiReturnType
    : type
    | arrayType
    | sliceType
    | STAR type
    | STAR arrayType
    | STAR sliceType
    ;

sliceType
    : '[' ']' type
    ;

// ---------------- BLOCK ----------------

block
    : '{' statement* '}'
    ;

// ---------------- STATEMENTS ----------------

statement
    : varDecl
    | varShortDecl
    | constDecl
    | ptrAssign
    | arrayAssign
    | assignment
    | ifStmt
    | forStmt
    | switchStmt
    | breakStmt
    | continueStmt
    | incDecStmt
    | returnStmt
    | functionCall ';'?
    | block
    | expression ';'?
    ;

// ---------------- VARIABLE DECLARATION ----------------

varDecl
    : VAR ID type ('=' expression)? ';'?
    | VAR idList type '=' expList ';'?
    | VAR idList '=' expList ';'?
    | VAR ID arrayType ('=' arrayLiteral)? ';'?
    | VAR ID arrayType '=' expression ';'?
    | VAR ID STAR type ';'?
    | VAR ID STAR arrayType ';'?
    ;

varShortDecl
    : idList ':=' expList ';'?
    | ID ':=' arrayLiteral ';'?
    ;

constDecl
    : CONST ID type '=' expression ';'?
    ;

idList
    : ID (',' ID)*
    ;

expList
    : expression (',' expression)*
    ;

// ---------------- ARRAYS ----------------

arrayType
    : '[' INT ']' type
    | '[' INT ']' arrayType
    ;

arrayLiteral
    : '[' INT ']' type '{' arrayElements? '}'
    | '[' INT ']' arrayType '{' arrayRowElements? '}'
    | '[' ']' type '{' arrayElements? '}'
    ;

arrayElements
    : expression (',' expression)* ','?
    ;

arrayRowElements
    : arrayRowItem (',' arrayRowItem)* ','?
    ;

arrayRowItem
    : '{' arrayElements? '}'
    | '{' arrayRowElements? '}'
    ;

arrayAccess
    : ID ('[' expression ']')+
    ;

ptrAssign
    : STAR ID assignOp expression ';'?
    ;

arrayAssign
    : ID ('[' expression ']')+ assignOp expression ';'?
    ;

// ---------------- ASSIGNMENT ----------------

assignment
    : ID assignOp expression ';'?
    ;

assignOp
    : '='
    | ADD_ASSIGN
    | SUB_ASSIGN
    | MUL_ASSIGN
    | DIV_ASSIGN
    ;

// ---------------- CONTROL FLOW ----------------

ifStmt
    : IF expression block (ELSE (ifStmt | block))?
    ;

forStmt
    : FOR forInit ';' expression ';' forPost block
    | FOR expression block
    | FOR block
    ;

forInit
    : ID ':=' expression
    | ID '=' expression
    ;

forPost
    : ID '++'
    | ID '--'
    | ID assignOp expression
    ;

switchStmt
    : SWITCH expression '{' caseClause* defaultClause? '}'
    ;

caseClause
    : CASE expList ':' statement*
    ;

defaultClause
    : DEFAULT ':' statement*
    ;

breakStmt  : BREAK ';'?    ;
continueStmt : CONTINUE ';'? ;
incDecStmt : ID '++' ';'?
           | ID '--' ';'?
           ;

returnStmt
    : RETURN expList? ';'?
    ;

// ---------------- FUNCTION CALL ----------------

functionCall
    : qualifiedName '(' argList? ')'
    ;

qualifiedName
    : ID ('.' ID)*
    ;

argList
    : argItem (',' argItem)*
    ;

argItem
    : REF ID
    | expression
    ;

// ---------------- EXPRESSIONS ----------------

expression
    : logicalOr
    ;

logicalOr
    : logicalAnd ( OR logicalAnd )*
    ;

logicalAnd
    : equality ( AND equality )*
    ;

equality
    : comparison ( ( EQ | NEQ ) comparison )*
    ;

comparison
    : term ( ( GTE | LTE | GT | LT ) term )*
    ;

term
    : factor ( ( PLUS | MINUS ) factor )*
    ;

// STAR aquí es multiplicación
factor
    : unary ( ( STAR | SLASH | MOD ) unary )*
    ;

// STAR aquí es desreferenciación o puntero
unary
    : BANG unary
    | MINUS unary
    | STAR unary
    | primary
    ;

primary
    : '(' expression ')'
    | functionCall
    | arrayAccess
    | typeCast
    | ID
    | INT
    | FLOAT
    | STRING
    | RUNE
    | TRUE
    | FALSE
    | NIL
    ;

typeCast
    : type '(' expression ')'
    ;

// ---------------- TYPES ----------------

type
    : INT_TYPE
    | FLOAT_TYPE
    | STRING_TYPE
    | BOOL_TYPE
    | RUNE_TYPE
    ;

// ---------------- LEXER ----------------

// Keywords
FUNC        : 'func';
VAR         : 'var';
CONST       : 'const';
IF          : 'if';
ELSE        : 'else';
FOR         : 'for';
SWITCH      : 'switch';
CASE        : 'case';
DEFAULT     : 'default';
BREAK       : 'break';
CONTINUE    : 'continue';
RETURN      : 'return';
TRUE        : 'true';
FALSE       : 'false';
NIL         : 'nil';

// Types (antes de ID para que no sean parseados como identificadores)
INT_TYPE    : 'int32' | 'int';
FLOAT_TYPE  : 'float32';
STRING_TYPE : 'string';
BOOL_TYPE   : 'bool';
RUNE_TYPE   : 'rune';

// Operadores compuestos ANTES que simples
ADD_ASSIGN  : '+=';
SUB_ASSIGN  : '-=';
MUL_ASSIGN  : '*=';
DIV_ASSIGN  : '/=';

// Operadores de dos caracteres ANTES que de uno
OR          : '||';
AND         : '&&';
EQ          : '==';
NEQ         : '!=';
GTE         : '>=';
LTE         : '<=';

// Operadores de un carácter
GT          : '>';
LT          : '<';
PLUS        : '+';
MINUS       : '-';
STAR        : '*';
SLASH       : '/';
MOD         : '%';
BANG        : '!';
REF         : '&';

// Identifiers
ID : [\p{L}_] [\p{L}\p{N}_]* ;

// Numbers — FLOAT antes de INT
FLOAT : [0-9]+ '.' [0-9]+ ;
INT   : [0-9]+ ;

// Strings y Runes
STRING : '"' ( '\\' . | ~["\\] )* '"' ;
RUNE   : '\'' ( '\\' . | ~['\\] ) '\'' ;

// Comments
LINE_COMMENT  : '//' ~[\r\n]* -> skip ;
BLOCK_COMMENT : '/*' .*? '*/' -> skip ;

// Whitespace
WS : [ \t\r\n]+ -> skip ;
