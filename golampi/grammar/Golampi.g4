grammar Golampi;

// ---------------- PROGRAM ----------------

program
    : functionDecl+ EOF
    ;

// ---------------- FUNCTIONS ----------------

functionDecl
    : FUNC ID '(' paramList? ')' returnType? block
    ;

paramList
    : param (',' param)*
    ;

param
    : ID type
    ;

returnType
    : type
    | '(' type (',' type)* ')'
    ;

// ---------------- BLOCK ----------------

block
    : '{' statement* '}'
    ;

// ---------------- STATEMENTS ----------------

statement
    : varShortDecl
    | varDecl
    | assignment
    | ifStmt          // ← cambiado
    | forStmt         // ← cambiado
    | breakStmt
    | continueStmt
    | returnStmt
    | functionCall ';'
    | block
    ;

// ---------------- VARIABLE DECLARATION ----------------

varDecl
    : VAR idList type ('=' expList)? ';'
    ;

varShortDecl
    : idList ':=' expList ';'
    ;

idList
    : ID (',' ID)*
    ;

expList
    : expression (',' expression)*
    ;

// ---------------- ASSIGNMENT ----------------

assignment
    : ID '=' expression ';'
    ;

// ---------------- CONTROL FLOW ----------------

ifStmt      // ← RENOMBRADO
    : IF expression block
    ;

forStmt     // ← RENOMBRADO
    : FOR forInit ';' expression ';' forPost block
    ;

forInit
    : ID ':=' expression
    | ID '=' expression
    ;

forPost
    : ID '++'
    | ID '--'
    | ID '=' expression
    ;

breakStmt
    : BREAK ';'
    ;

continueStmt
    : CONTINUE ';'
    ;

returnStmt
    : RETURN expression? ';'
    ;

// ---------------- FUNCTION CALL ----------------

functionCall
    : ID '(' argList? ')'
    ;

argList
    : expression (',' expression)*
    ;

// ---------------- EXPRESSIONS ----------------

expression
    : expression op=('*'|'/') expression
    | expression op=('+'|'-') expression
    | expression op=('=='|'!='|'<'|'>'|'<='|'>=') expression
    | '(' expression ')'
    | functionCall
    | ID
    | INT
    | FLOAT
    | STRING
    | TRUE
    | FALSE
    ;

// ---------------- TYPES ----------------

type
    : INT_TYPE
    | FLOAT_TYPE
    | STRING_TYPE
    | BOOL_TYPE
    ;

// ---------------- LEXER ----------------

// -------- Keywords --------

FUNC        : 'func';
VAR         : 'var';
IF          : 'if';
FOR         : 'for';
BREAK       : 'break';
CONTINUE    : 'continue';
RETURN      : 'return';
TRUE        : 'true';
FALSE       : 'false';

INT_TYPE    : 'int';
FLOAT_TYPE  : 'float';
STRING_TYPE : 'string';
BOOL_TYPE   : 'bool';

// -------- Identifiers --------

ID : [\p{L}_] [\p{L}\p{N}_]* ;

// -------- Numbers --------

FLOAT : [0-9]+ '.' [0-9]+ ;
INT   : [0-9]+ ;

// -------- String --------

STRING
    : '"' ( '\\' . | ~["\\] )* '"'
    ;

// -------- Comments --------

LINE_COMMENT
    : '//' ~[\r\n]* -> skip
    ;

BLOCK_COMMENT
    : '/*' .*? '*/' -> skip
    ;

// -------- Whitespace --------

WS : [ \t\r\n]+ -> skip ;
