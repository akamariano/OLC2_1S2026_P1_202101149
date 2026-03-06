<?php

/*
 * Generated from Golampi.g4 by ANTLR 4.13.1
 */

namespace {
	use Antlr\Antlr4\Runtime\Atn\ATN;
	use Antlr\Antlr4\Runtime\Atn\ATNDeserializer;
	use Antlr\Antlr4\Runtime\Atn\ParserATNSimulator;
	use Antlr\Antlr4\Runtime\Dfa\DFA;
	use Antlr\Antlr4\Runtime\Error\Exceptions\FailedPredicateException;
	use Antlr\Antlr4\Runtime\Error\Exceptions\NoViableAltException;
	use Antlr\Antlr4\Runtime\PredictionContexts\PredictionContextCache;
	use Antlr\Antlr4\Runtime\Error\Exceptions\RecognitionException;
	use Antlr\Antlr4\Runtime\RuleContext;
	use Antlr\Antlr4\Runtime\Token;
	use Antlr\Antlr4\Runtime\TokenStream;
	use Antlr\Antlr4\Runtime\Vocabulary;
	use Antlr\Antlr4\Runtime\VocabularyImpl;
	use Antlr\Antlr4\Runtime\RuntimeMetaData;
	use Antlr\Antlr4\Runtime\Parser;

	final class GolampiParser extends Parser
	{
		public const T__0 = 1, T__1 = 2, T__2 = 3, T__3 = 4, T__4 = 5, T__5 = 6, 
               T__6 = 7, T__7 = 8, T__8 = 9, T__9 = 10, T__10 = 11, T__11 = 12, 
               T__12 = 13, T__13 = 14, FUNC = 15, VAR = 16, CONST = 17, 
               IF = 18, ELSE = 19, FOR = 20, SWITCH = 21, CASE = 22, DEFAULT = 23, 
               BREAK = 24, CONTINUE = 25, RETURN = 26, TRUE = 27, FALSE = 28, 
               NIL = 29, INT_TYPE = 30, FLOAT_TYPE = 31, STRING_TYPE = 32, 
               BOOL_TYPE = 33, RUNE_TYPE = 34, ADD_ASSIGN = 35, SUB_ASSIGN = 36, 
               MUL_ASSIGN = 37, DIV_ASSIGN = 38, OR = 39, AND = 40, EQ = 41, 
               NEQ = 42, GTE = 43, LTE = 44, GT = 45, LT = 46, PLUS = 47, 
               MINUS = 48, STAR = 49, SLASH = 50, MOD = 51, BANG = 52, REF = 53, 
               ID = 54, FLOAT = 55, INT = 56, STRING = 57, RUNE = 58, LINE_COMMENT = 59, 
               BLOCK_COMMENT = 60, WS = 61;

		public const RULE_program = 0, RULE_functionDecl = 1, RULE_paramList = 2, 
               RULE_param = 3, RULE_returnType = 4, RULE_multiReturnType = 5, 
               RULE_block = 6, RULE_statement = 7, RULE_varDecl = 8, RULE_varShortDecl = 9, 
               RULE_constDecl = 10, RULE_idList = 11, RULE_expList = 12, 
               RULE_arrayType = 13, RULE_arrayLiteral = 14, RULE_arrayElements = 15, 
               RULE_arrayRowElements = 16, RULE_arrayAccess = 17, RULE_ptrAssign = 18, 
               RULE_arrayAssign = 19, RULE_assignment = 20, RULE_assignOp = 21, 
               RULE_ifStmt = 22, RULE_forStmt = 23, RULE_forInit = 24, RULE_forPost = 25, 
               RULE_switchStmt = 26, RULE_caseClause = 27, RULE_defaultClause = 28, 
               RULE_breakStmt = 29, RULE_continueStmt = 30, RULE_incDecStmt = 31, 
               RULE_returnStmt = 32, RULE_functionCall = 33, RULE_qualifiedName = 34, 
               RULE_argList = 35, RULE_argItem = 36, RULE_expression = 37, 
               RULE_logicalOr = 38, RULE_logicalAnd = 39, RULE_equality = 40, 
               RULE_comparison = 41, RULE_term = 42, RULE_factor = 43, RULE_unary = 44, 
               RULE_primary = 45, RULE_type = 46;

		/**
		 * @var array<string>
		 */
		public const RULE_NAMES = [
			'program', 'functionDecl', 'paramList', 'param', 'returnType', 'multiReturnType', 
			'block', 'statement', 'varDecl', 'varShortDecl', 'constDecl', 'idList', 
			'expList', 'arrayType', 'arrayLiteral', 'arrayElements', 'arrayRowElements', 
			'arrayAccess', 'ptrAssign', 'arrayAssign', 'assignment', 'assignOp', 
			'ifStmt', 'forStmt', 'forInit', 'forPost', 'switchStmt', 'caseClause', 
			'defaultClause', 'breakStmt', 'continueStmt', 'incDecStmt', 'returnStmt', 
			'functionCall', 'qualifiedName', 'argList', 'argItem', 'expression', 
			'logicalOr', 'logicalAnd', 'equality', 'comparison', 'term', 'factor', 
			'unary', 'primary', 'type'
		];

		/**
		 * @var array<string|null>
		 */
		private const LITERAL_NAMES = [
		    null, "'('", "')'", "','", "'{'", "'}'", "';'", "'='", "':='", "'['", 
		    "']'", "'++'", "'--'", "':'", "'.'", "'func'", "'var'", "'const'", 
		    "'if'", "'else'", "'for'", "'switch'", "'case'", "'default'", "'break'", 
		    "'continue'", "'return'", "'true'", "'false'", "'nil'", "'int'", "'float'", 
		    "'string'", "'bool'", "'rune'", "'+='", "'-='", "'*='", "'/='", "'||'", 
		    "'&&'", "'=='", "'!='", "'>='", "'<='", "'>'", "'<'", "'+'", "'-'", 
		    "'*'", "'/'", "'%'", "'!'", "'&'"
		];

		/**
		 * @var array<string>
		 */
		private const SYMBOLIC_NAMES = [
		    null, null, null, null, null, null, null, null, null, null, null, 
		    null, null, null, null, "FUNC", "VAR", "CONST", "IF", "ELSE", "FOR", 
		    "SWITCH", "CASE", "DEFAULT", "BREAK", "CONTINUE", "RETURN", "TRUE", 
		    "FALSE", "NIL", "INT_TYPE", "FLOAT_TYPE", "STRING_TYPE", "BOOL_TYPE", 
		    "RUNE_TYPE", "ADD_ASSIGN", "SUB_ASSIGN", "MUL_ASSIGN", "DIV_ASSIGN", 
		    "OR", "AND", "EQ", "NEQ", "GTE", "LTE", "GT", "LT", "PLUS", "MINUS", 
		    "STAR", "SLASH", "MOD", "BANG", "REF", "ID", "FLOAT", "INT", "STRING", 
		    "RUNE", "LINE_COMMENT", "BLOCK_COMMENT", "WS"
		];

		private const SERIALIZED_ATN =
			[4, 1, 61, 577, 2, 0, 7, 0, 2, 1, 7, 1, 2, 2, 7, 2, 2, 3, 7, 3, 2, 4, 
		    7, 4, 2, 5, 7, 5, 2, 6, 7, 6, 2, 7, 7, 7, 2, 8, 7, 8, 2, 9, 7, 9, 
		    2, 10, 7, 10, 2, 11, 7, 11, 2, 12, 7, 12, 2, 13, 7, 13, 2, 14, 7, 
		    14, 2, 15, 7, 15, 2, 16, 7, 16, 2, 17, 7, 17, 2, 18, 7, 18, 2, 19, 
		    7, 19, 2, 20, 7, 20, 2, 21, 7, 21, 2, 22, 7, 22, 2, 23, 7, 23, 2, 
		    24, 7, 24, 2, 25, 7, 25, 2, 26, 7, 26, 2, 27, 7, 27, 2, 28, 7, 28, 
		    2, 29, 7, 29, 2, 30, 7, 30, 2, 31, 7, 31, 2, 32, 7, 32, 2, 33, 7, 
		    33, 2, 34, 7, 34, 2, 35, 7, 35, 2, 36, 7, 36, 2, 37, 7, 37, 2, 38, 
		    7, 38, 2, 39, 7, 39, 2, 40, 7, 40, 2, 41, 7, 41, 2, 42, 7, 42, 2, 
		    43, 7, 43, 2, 44, 7, 44, 2, 45, 7, 45, 2, 46, 7, 46, 1, 0, 1, 0, 1, 
		    0, 4, 0, 98, 8, 0, 11, 0, 12, 0, 99, 1, 0, 1, 0, 1, 1, 1, 1, 1, 1, 
		    1, 1, 3, 1, 108, 8, 1, 1, 1, 1, 1, 3, 1, 112, 8, 1, 1, 1, 1, 1, 1, 
		    2, 1, 2, 1, 2, 5, 2, 119, 8, 2, 10, 2, 12, 2, 122, 9, 2, 1, 3, 1, 
		    3, 1, 3, 1, 3, 1, 3, 1, 3, 1, 3, 1, 3, 1, 3, 1, 3, 3, 3, 134, 8, 3, 
		    1, 4, 1, 4, 1, 4, 1, 4, 1, 4, 1, 4, 1, 4, 1, 4, 1, 4, 1, 4, 5, 4, 
		    146, 8, 4, 10, 4, 12, 4, 149, 9, 4, 1, 4, 1, 4, 3, 4, 153, 8, 4, 1, 
		    5, 1, 5, 1, 5, 1, 5, 1, 5, 1, 5, 3, 5, 161, 8, 5, 1, 6, 1, 6, 5, 6, 
		    165, 8, 6, 10, 6, 12, 6, 168, 9, 6, 1, 6, 1, 6, 1, 7, 1, 7, 1, 7, 
		    1, 7, 1, 7, 1, 7, 1, 7, 1, 7, 1, 7, 1, 7, 1, 7, 1, 7, 1, 7, 1, 7, 
		    1, 7, 3, 7, 187, 8, 7, 1, 7, 1, 7, 3, 7, 191, 8, 7, 3, 7, 193, 8, 
		    7, 1, 8, 1, 8, 1, 8, 1, 8, 1, 8, 3, 8, 200, 8, 8, 1, 8, 3, 8, 203, 
		    8, 8, 1, 8, 1, 8, 1, 8, 1, 8, 1, 8, 3, 8, 210, 8, 8, 1, 8, 3, 8, 213, 
		    8, 8, 1, 8, 1, 8, 1, 8, 1, 8, 1, 8, 1, 8, 3, 8, 221, 8, 8, 1, 8, 1, 
		    8, 1, 8, 1, 8, 1, 8, 3, 8, 228, 8, 8, 1, 8, 1, 8, 1, 8, 1, 8, 1, 8, 
		    3, 8, 235, 8, 8, 3, 8, 237, 8, 8, 1, 9, 1, 9, 1, 9, 1, 9, 3, 9, 243, 
		    8, 9, 1, 9, 1, 9, 1, 9, 1, 9, 3, 9, 249, 8, 9, 3, 9, 251, 8, 9, 1, 
		    10, 1, 10, 1, 10, 1, 10, 1, 10, 1, 10, 3, 10, 259, 8, 10, 1, 11, 1, 
		    11, 1, 11, 5, 11, 264, 8, 11, 10, 11, 12, 11, 267, 9, 11, 1, 12, 1, 
		    12, 1, 12, 5, 12, 272, 8, 12, 10, 12, 12, 12, 275, 9, 12, 1, 13, 1, 
		    13, 1, 13, 1, 13, 1, 13, 1, 13, 1, 13, 1, 13, 3, 13, 285, 8, 13, 1, 
		    14, 1, 14, 1, 14, 1, 14, 1, 14, 1, 14, 3, 14, 293, 8, 14, 1, 14, 1, 
		    14, 1, 14, 1, 14, 1, 14, 1, 14, 1, 14, 1, 14, 3, 14, 303, 8, 14, 1, 
		    14, 1, 14, 3, 14, 307, 8, 14, 1, 15, 1, 15, 1, 15, 5, 15, 312, 8, 
		    15, 10, 15, 12, 15, 315, 9, 15, 1, 16, 1, 16, 3, 16, 319, 8, 16, 1, 
		    16, 1, 16, 1, 16, 1, 16, 3, 16, 325, 8, 16, 1, 16, 5, 16, 328, 8, 
		    16, 10, 16, 12, 16, 331, 9, 16, 1, 17, 1, 17, 1, 17, 1, 17, 1, 17, 
		    4, 17, 338, 8, 17, 11, 17, 12, 17, 339, 1, 18, 1, 18, 1, 18, 1, 18, 
		    1, 18, 3, 18, 347, 8, 18, 1, 19, 1, 19, 1, 19, 1, 19, 1, 19, 4, 19, 
		    354, 8, 19, 11, 19, 12, 19, 355, 1, 19, 1, 19, 1, 19, 3, 19, 361, 
		    8, 19, 1, 20, 1, 20, 1, 20, 1, 20, 3, 20, 367, 8, 20, 1, 21, 1, 21, 
		    1, 22, 1, 22, 1, 22, 1, 22, 1, 22, 1, 22, 3, 22, 377, 8, 22, 3, 22, 
		    379, 8, 22, 1, 23, 1, 23, 1, 23, 1, 23, 1, 23, 1, 23, 1, 23, 1, 23, 
		    1, 23, 1, 23, 1, 23, 1, 23, 1, 23, 1, 23, 3, 23, 395, 8, 23, 1, 24, 
		    1, 24, 1, 24, 1, 24, 1, 24, 1, 24, 3, 24, 403, 8, 24, 1, 25, 1, 25, 
		    1, 25, 1, 25, 1, 25, 1, 25, 1, 25, 3, 25, 412, 8, 25, 1, 26, 1, 26, 
		    1, 26, 1, 26, 5, 26, 418, 8, 26, 10, 26, 12, 26, 421, 9, 26, 1, 26, 
		    3, 26, 424, 8, 26, 1, 26, 1, 26, 1, 27, 1, 27, 1, 27, 1, 27, 5, 27, 
		    432, 8, 27, 10, 27, 12, 27, 435, 9, 27, 1, 28, 1, 28, 1, 28, 5, 28, 
		    440, 8, 28, 10, 28, 12, 28, 443, 9, 28, 1, 29, 1, 29, 3, 29, 447, 
		    8, 29, 1, 30, 1, 30, 3, 30, 451, 8, 30, 1, 31, 1, 31, 1, 31, 3, 31, 
		    456, 8, 31, 1, 31, 1, 31, 1, 31, 3, 31, 461, 8, 31, 3, 31, 463, 8, 
		    31, 1, 32, 1, 32, 3, 32, 467, 8, 32, 1, 32, 3, 32, 470, 8, 32, 1, 
		    33, 1, 33, 1, 33, 3, 33, 475, 8, 33, 1, 33, 1, 33, 1, 34, 1, 34, 1, 
		    34, 5, 34, 482, 8, 34, 10, 34, 12, 34, 485, 9, 34, 1, 35, 1, 35, 1, 
		    35, 5, 35, 490, 8, 35, 10, 35, 12, 35, 493, 9, 35, 1, 36, 1, 36, 1, 
		    36, 3, 36, 498, 8, 36, 1, 37, 1, 37, 1, 38, 1, 38, 1, 38, 5, 38, 505, 
		    8, 38, 10, 38, 12, 38, 508, 9, 38, 1, 39, 1, 39, 1, 39, 5, 39, 513, 
		    8, 39, 10, 39, 12, 39, 516, 9, 39, 1, 40, 1, 40, 1, 40, 5, 40, 521, 
		    8, 40, 10, 40, 12, 40, 524, 9, 40, 1, 41, 1, 41, 1, 41, 5, 41, 529, 
		    8, 41, 10, 41, 12, 41, 532, 9, 41, 1, 42, 1, 42, 1, 42, 5, 42, 537, 
		    8, 42, 10, 42, 12, 42, 540, 9, 42, 1, 43, 1, 43, 1, 43, 5, 43, 545, 
		    8, 43, 10, 43, 12, 43, 548, 9, 43, 1, 44, 1, 44, 1, 44, 1, 44, 1, 
		    44, 1, 44, 1, 44, 3, 44, 557, 8, 44, 1, 45, 1, 45, 1, 45, 1, 45, 1, 
		    45, 1, 45, 1, 45, 1, 45, 1, 45, 1, 45, 1, 45, 1, 45, 1, 45, 1, 45, 
		    3, 45, 573, 8, 45, 1, 46, 1, 46, 1, 46, 0, 0, 47, 0, 2, 4, 6, 8, 10, 
		    12, 14, 16, 18, 20, 22, 24, 26, 28, 30, 32, 34, 36, 38, 40, 42, 44, 
		    46, 48, 50, 52, 54, 56, 58, 60, 62, 64, 66, 68, 70, 72, 74, 76, 78, 
		    80, 82, 84, 86, 88, 90, 92, 0, 6, 2, 0, 7, 7, 35, 38, 1, 0, 41, 42, 
		    1, 0, 43, 46, 1, 0, 47, 48, 1, 0, 49, 51, 1, 0, 30, 34, 634, 0, 97, 
		    1, 0, 0, 0, 2, 103, 1, 0, 0, 0, 4, 115, 1, 0, 0, 0, 6, 133, 1, 0, 
		    0, 0, 8, 152, 1, 0, 0, 0, 10, 160, 1, 0, 0, 0, 12, 162, 1, 0, 0, 0, 
		    14, 192, 1, 0, 0, 0, 16, 236, 1, 0, 0, 0, 18, 250, 1, 0, 0, 0, 20, 
		    252, 1, 0, 0, 0, 22, 260, 1, 0, 0, 0, 24, 268, 1, 0, 0, 0, 26, 284, 
		    1, 0, 0, 0, 28, 306, 1, 0, 0, 0, 30, 308, 1, 0, 0, 0, 32, 316, 1, 
		    0, 0, 0, 34, 332, 1, 0, 0, 0, 36, 341, 1, 0, 0, 0, 38, 348, 1, 0, 
		    0, 0, 40, 362, 1, 0, 0, 0, 42, 368, 1, 0, 0, 0, 44, 370, 1, 0, 0, 
		    0, 46, 394, 1, 0, 0, 0, 48, 402, 1, 0, 0, 0, 50, 411, 1, 0, 0, 0, 
		    52, 413, 1, 0, 0, 0, 54, 427, 1, 0, 0, 0, 56, 436, 1, 0, 0, 0, 58, 
		    444, 1, 0, 0, 0, 60, 448, 1, 0, 0, 0, 62, 462, 1, 0, 0, 0, 64, 464, 
		    1, 0, 0, 0, 66, 471, 1, 0, 0, 0, 68, 478, 1, 0, 0, 0, 70, 486, 1, 
		    0, 0, 0, 72, 497, 1, 0, 0, 0, 74, 499, 1, 0, 0, 0, 76, 501, 1, 0, 
		    0, 0, 78, 509, 1, 0, 0, 0, 80, 517, 1, 0, 0, 0, 82, 525, 1, 0, 0, 
		    0, 84, 533, 1, 0, 0, 0, 86, 541, 1, 0, 0, 0, 88, 556, 1, 0, 0, 0, 
		    90, 572, 1, 0, 0, 0, 92, 574, 1, 0, 0, 0, 94, 98, 3, 2, 1, 0, 95, 
		    98, 3, 16, 8, 0, 96, 98, 3, 20, 10, 0, 97, 94, 1, 0, 0, 0, 97, 95, 
		    1, 0, 0, 0, 97, 96, 1, 0, 0, 0, 98, 99, 1, 0, 0, 0, 99, 97, 1, 0, 
		    0, 0, 99, 100, 1, 0, 0, 0, 100, 101, 1, 0, 0, 0, 101, 102, 5, 0, 0, 
		    1, 102, 1, 1, 0, 0, 0, 103, 104, 5, 15, 0, 0, 104, 105, 5, 54, 0, 
		    0, 105, 107, 5, 1, 0, 0, 106, 108, 3, 4, 2, 0, 107, 106, 1, 0, 0, 
		    0, 107, 108, 1, 0, 0, 0, 108, 109, 1, 0, 0, 0, 109, 111, 5, 2, 0, 
		    0, 110, 112, 3, 8, 4, 0, 111, 110, 1, 0, 0, 0, 111, 112, 1, 0, 0, 
		    0, 112, 113, 1, 0, 0, 0, 113, 114, 3, 12, 6, 0, 114, 3, 1, 0, 0, 0, 
		    115, 120, 3, 6, 3, 0, 116, 117, 5, 3, 0, 0, 117, 119, 3, 6, 3, 0, 
		    118, 116, 1, 0, 0, 0, 119, 122, 1, 0, 0, 0, 120, 118, 1, 0, 0, 0, 
		    120, 121, 1, 0, 0, 0, 121, 5, 1, 0, 0, 0, 122, 120, 1, 0, 0, 0, 123, 
		    124, 5, 54, 0, 0, 124, 134, 3, 92, 46, 0, 125, 126, 5, 54, 0, 0, 126, 
		    127, 5, 49, 0, 0, 127, 134, 3, 92, 46, 0, 128, 129, 5, 54, 0, 0, 129, 
		    130, 5, 49, 0, 0, 130, 134, 3, 26, 13, 0, 131, 132, 5, 54, 0, 0, 132, 
		    134, 3, 26, 13, 0, 133, 123, 1, 0, 0, 0, 133, 125, 1, 0, 0, 0, 133, 
		    128, 1, 0, 0, 0, 133, 131, 1, 0, 0, 0, 134, 7, 1, 0, 0, 0, 135, 153, 
		    3, 92, 46, 0, 136, 153, 3, 26, 13, 0, 137, 138, 5, 49, 0, 0, 138, 
		    153, 3, 92, 46, 0, 139, 140, 5, 49, 0, 0, 140, 153, 3, 26, 13, 0, 
		    141, 142, 5, 1, 0, 0, 142, 147, 3, 10, 5, 0, 143, 144, 5, 3, 0, 0, 
		    144, 146, 3, 10, 5, 0, 145, 143, 1, 0, 0, 0, 146, 149, 1, 0, 0, 0, 
		    147, 145, 1, 0, 0, 0, 147, 148, 1, 0, 0, 0, 148, 150, 1, 0, 0, 0, 
		    149, 147, 1, 0, 0, 0, 150, 151, 5, 2, 0, 0, 151, 153, 1, 0, 0, 0, 
		    152, 135, 1, 0, 0, 0, 152, 136, 1, 0, 0, 0, 152, 137, 1, 0, 0, 0, 
		    152, 139, 1, 0, 0, 0, 152, 141, 1, 0, 0, 0, 153, 9, 1, 0, 0, 0, 154, 
		    161, 3, 92, 46, 0, 155, 161, 3, 26, 13, 0, 156, 157, 5, 49, 0, 0, 
		    157, 161, 3, 92, 46, 0, 158, 159, 5, 49, 0, 0, 159, 161, 3, 26, 13, 
		    0, 160, 154, 1, 0, 0, 0, 160, 155, 1, 0, 0, 0, 160, 156, 1, 0, 0, 
		    0, 160, 158, 1, 0, 0, 0, 161, 11, 1, 0, 0, 0, 162, 166, 5, 4, 0, 0, 
		    163, 165, 3, 14, 7, 0, 164, 163, 1, 0, 0, 0, 165, 168, 1, 0, 0, 0, 
		    166, 164, 1, 0, 0, 0, 166, 167, 1, 0, 0, 0, 167, 169, 1, 0, 0, 0, 
		    168, 166, 1, 0, 0, 0, 169, 170, 5, 5, 0, 0, 170, 13, 1, 0, 0, 0, 171, 
		    193, 3, 16, 8, 0, 172, 193, 3, 18, 9, 0, 173, 193, 3, 20, 10, 0, 174, 
		    193, 3, 36, 18, 0, 175, 193, 3, 38, 19, 0, 176, 193, 3, 40, 20, 0, 
		    177, 193, 3, 44, 22, 0, 178, 193, 3, 46, 23, 0, 179, 193, 3, 52, 26, 
		    0, 180, 193, 3, 58, 29, 0, 181, 193, 3, 60, 30, 0, 182, 193, 3, 62, 
		    31, 0, 183, 193, 3, 64, 32, 0, 184, 186, 3, 66, 33, 0, 185, 187, 5, 
		    6, 0, 0, 186, 185, 1, 0, 0, 0, 186, 187, 1, 0, 0, 0, 187, 193, 1, 
		    0, 0, 0, 188, 190, 3, 74, 37, 0, 189, 191, 5, 6, 0, 0, 190, 189, 1, 
		    0, 0, 0, 190, 191, 1, 0, 0, 0, 191, 193, 1, 0, 0, 0, 192, 171, 1, 
		    0, 0, 0, 192, 172, 1, 0, 0, 0, 192, 173, 1, 0, 0, 0, 192, 174, 1, 
		    0, 0, 0, 192, 175, 1, 0, 0, 0, 192, 176, 1, 0, 0, 0, 192, 177, 1, 
		    0, 0, 0, 192, 178, 1, 0, 0, 0, 192, 179, 1, 0, 0, 0, 192, 180, 1, 
		    0, 0, 0, 192, 181, 1, 0, 0, 0, 192, 182, 1, 0, 0, 0, 192, 183, 1, 
		    0, 0, 0, 192, 184, 1, 0, 0, 0, 192, 188, 1, 0, 0, 0, 193, 15, 1, 0, 
		    0, 0, 194, 195, 5, 16, 0, 0, 195, 196, 5, 54, 0, 0, 196, 199, 3, 92, 
		    46, 0, 197, 198, 5, 7, 0, 0, 198, 200, 3, 74, 37, 0, 199, 197, 1, 
		    0, 0, 0, 199, 200, 1, 0, 0, 0, 200, 202, 1, 0, 0, 0, 201, 203, 5, 
		    6, 0, 0, 202, 201, 1, 0, 0, 0, 202, 203, 1, 0, 0, 0, 203, 237, 1, 
		    0, 0, 0, 204, 205, 5, 16, 0, 0, 205, 206, 5, 54, 0, 0, 206, 209, 3, 
		    26, 13, 0, 207, 208, 5, 7, 0, 0, 208, 210, 3, 28, 14, 0, 209, 207, 
		    1, 0, 0, 0, 209, 210, 1, 0, 0, 0, 210, 212, 1, 0, 0, 0, 211, 213, 
		    5, 6, 0, 0, 212, 211, 1, 0, 0, 0, 212, 213, 1, 0, 0, 0, 213, 237, 
		    1, 0, 0, 0, 214, 215, 5, 16, 0, 0, 215, 216, 5, 54, 0, 0, 216, 217, 
		    3, 26, 13, 0, 217, 218, 5, 7, 0, 0, 218, 220, 3, 74, 37, 0, 219, 221, 
		    5, 6, 0, 0, 220, 219, 1, 0, 0, 0, 220, 221, 1, 0, 0, 0, 221, 237, 
		    1, 0, 0, 0, 222, 223, 5, 16, 0, 0, 223, 224, 5, 54, 0, 0, 224, 225, 
		    5, 49, 0, 0, 225, 227, 3, 92, 46, 0, 226, 228, 5, 6, 0, 0, 227, 226, 
		    1, 0, 0, 0, 227, 228, 1, 0, 0, 0, 228, 237, 1, 0, 0, 0, 229, 230, 
		    5, 16, 0, 0, 230, 231, 5, 54, 0, 0, 231, 232, 5, 49, 0, 0, 232, 234, 
		    3, 26, 13, 0, 233, 235, 5, 6, 0, 0, 234, 233, 1, 0, 0, 0, 234, 235, 
		    1, 0, 0, 0, 235, 237, 1, 0, 0, 0, 236, 194, 1, 0, 0, 0, 236, 204, 
		    1, 0, 0, 0, 236, 214, 1, 0, 0, 0, 236, 222, 1, 0, 0, 0, 236, 229, 
		    1, 0, 0, 0, 237, 17, 1, 0, 0, 0, 238, 239, 3, 22, 11, 0, 239, 240, 
		    5, 8, 0, 0, 240, 242, 3, 24, 12, 0, 241, 243, 5, 6, 0, 0, 242, 241, 
		    1, 0, 0, 0, 242, 243, 1, 0, 0, 0, 243, 251, 1, 0, 0, 0, 244, 245, 
		    5, 54, 0, 0, 245, 246, 5, 8, 0, 0, 246, 248, 3, 28, 14, 0, 247, 249, 
		    5, 6, 0, 0, 248, 247, 1, 0, 0, 0, 248, 249, 1, 0, 0, 0, 249, 251, 
		    1, 0, 0, 0, 250, 238, 1, 0, 0, 0, 250, 244, 1, 0, 0, 0, 251, 19, 1, 
		    0, 0, 0, 252, 253, 5, 17, 0, 0, 253, 254, 5, 54, 0, 0, 254, 255, 3, 
		    92, 46, 0, 255, 256, 5, 7, 0, 0, 256, 258, 3, 74, 37, 0, 257, 259, 
		    5, 6, 0, 0, 258, 257, 1, 0, 0, 0, 258, 259, 1, 0, 0, 0, 259, 21, 1, 
		    0, 0, 0, 260, 265, 5, 54, 0, 0, 261, 262, 5, 3, 0, 0, 262, 264, 5, 
		    54, 0, 0, 263, 261, 1, 0, 0, 0, 264, 267, 1, 0, 0, 0, 265, 263, 1, 
		    0, 0, 0, 265, 266, 1, 0, 0, 0, 266, 23, 1, 0, 0, 0, 267, 265, 1, 0, 
		    0, 0, 268, 273, 3, 74, 37, 0, 269, 270, 5, 3, 0, 0, 270, 272, 3, 74, 
		    37, 0, 271, 269, 1, 0, 0, 0, 272, 275, 1, 0, 0, 0, 273, 271, 1, 0, 
		    0, 0, 273, 274, 1, 0, 0, 0, 274, 25, 1, 0, 0, 0, 275, 273, 1, 0, 0, 
		    0, 276, 277, 5, 9, 0, 0, 277, 278, 5, 56, 0, 0, 278, 279, 5, 10, 0, 
		    0, 279, 285, 3, 92, 46, 0, 280, 281, 5, 9, 0, 0, 281, 282, 5, 56, 
		    0, 0, 282, 283, 5, 10, 0, 0, 283, 285, 3, 26, 13, 0, 284, 276, 1, 
		    0, 0, 0, 284, 280, 1, 0, 0, 0, 285, 27, 1, 0, 0, 0, 286, 287, 5, 9, 
		    0, 0, 287, 288, 5, 56, 0, 0, 288, 289, 5, 10, 0, 0, 289, 290, 3, 92, 
		    46, 0, 290, 292, 5, 4, 0, 0, 291, 293, 3, 30, 15, 0, 292, 291, 1, 
		    0, 0, 0, 292, 293, 1, 0, 0, 0, 293, 294, 1, 0, 0, 0, 294, 295, 5, 
		    5, 0, 0, 295, 307, 1, 0, 0, 0, 296, 297, 5, 9, 0, 0, 297, 298, 5, 
		    56, 0, 0, 298, 299, 5, 10, 0, 0, 299, 300, 3, 26, 13, 0, 300, 302, 
		    5, 4, 0, 0, 301, 303, 3, 32, 16, 0, 302, 301, 1, 0, 0, 0, 302, 303, 
		    1, 0, 0, 0, 303, 304, 1, 0, 0, 0, 304, 305, 5, 5, 0, 0, 305, 307, 
		    1, 0, 0, 0, 306, 286, 1, 0, 0, 0, 306, 296, 1, 0, 0, 0, 307, 29, 1, 
		    0, 0, 0, 308, 313, 3, 74, 37, 0, 309, 310, 5, 3, 0, 0, 310, 312, 3, 
		    74, 37, 0, 311, 309, 1, 0, 0, 0, 312, 315, 1, 0, 0, 0, 313, 311, 1, 
		    0, 0, 0, 313, 314, 1, 0, 0, 0, 314, 31, 1, 0, 0, 0, 315, 313, 1, 0, 
		    0, 0, 316, 318, 5, 4, 0, 0, 317, 319, 3, 30, 15, 0, 318, 317, 1, 0, 
		    0, 0, 318, 319, 1, 0, 0, 0, 319, 320, 1, 0, 0, 0, 320, 329, 5, 5, 
		    0, 0, 321, 322, 5, 3, 0, 0, 322, 324, 5, 4, 0, 0, 323, 325, 3, 30, 
		    15, 0, 324, 323, 1, 0, 0, 0, 324, 325, 1, 0, 0, 0, 325, 326, 1, 0, 
		    0, 0, 326, 328, 5, 5, 0, 0, 327, 321, 1, 0, 0, 0, 328, 331, 1, 0, 
		    0, 0, 329, 327, 1, 0, 0, 0, 329, 330, 1, 0, 0, 0, 330, 33, 1, 0, 0, 
		    0, 331, 329, 1, 0, 0, 0, 332, 337, 5, 54, 0, 0, 333, 334, 5, 9, 0, 
		    0, 334, 335, 3, 74, 37, 0, 335, 336, 5, 10, 0, 0, 336, 338, 1, 0, 
		    0, 0, 337, 333, 1, 0, 0, 0, 338, 339, 1, 0, 0, 0, 339, 337, 1, 0, 
		    0, 0, 339, 340, 1, 0, 0, 0, 340, 35, 1, 0, 0, 0, 341, 342, 5, 49, 
		    0, 0, 342, 343, 5, 54, 0, 0, 343, 344, 3, 42, 21, 0, 344, 346, 3, 
		    74, 37, 0, 345, 347, 5, 6, 0, 0, 346, 345, 1, 0, 0, 0, 346, 347, 1, 
		    0, 0, 0, 347, 37, 1, 0, 0, 0, 348, 353, 5, 54, 0, 0, 349, 350, 5, 
		    9, 0, 0, 350, 351, 3, 74, 37, 0, 351, 352, 5, 10, 0, 0, 352, 354, 
		    1, 0, 0, 0, 353, 349, 1, 0, 0, 0, 354, 355, 1, 0, 0, 0, 355, 353, 
		    1, 0, 0, 0, 355, 356, 1, 0, 0, 0, 356, 357, 1, 0, 0, 0, 357, 358, 
		    3, 42, 21, 0, 358, 360, 3, 74, 37, 0, 359, 361, 5, 6, 0, 0, 360, 359, 
		    1, 0, 0, 0, 360, 361, 1, 0, 0, 0, 361, 39, 1, 0, 0, 0, 362, 363, 5, 
		    54, 0, 0, 363, 364, 3, 42, 21, 0, 364, 366, 3, 74, 37, 0, 365, 367, 
		    5, 6, 0, 0, 366, 365, 1, 0, 0, 0, 366, 367, 1, 0, 0, 0, 367, 41, 1, 
		    0, 0, 0, 368, 369, 7, 0, 0, 0, 369, 43, 1, 0, 0, 0, 370, 371, 5, 18, 
		    0, 0, 371, 372, 3, 74, 37, 0, 372, 378, 3, 12, 6, 0, 373, 376, 5, 
		    19, 0, 0, 374, 377, 3, 44, 22, 0, 375, 377, 3, 12, 6, 0, 376, 374, 
		    1, 0, 0, 0, 376, 375, 1, 0, 0, 0, 377, 379, 1, 0, 0, 0, 378, 373, 
		    1, 0, 0, 0, 378, 379, 1, 0, 0, 0, 379, 45, 1, 0, 0, 0, 380, 381, 5, 
		    20, 0, 0, 381, 382, 3, 48, 24, 0, 382, 383, 5, 6, 0, 0, 383, 384, 
		    3, 74, 37, 0, 384, 385, 5, 6, 0, 0, 385, 386, 3, 50, 25, 0, 386, 387, 
		    3, 12, 6, 0, 387, 395, 1, 0, 0, 0, 388, 389, 5, 20, 0, 0, 389, 390, 
		    3, 74, 37, 0, 390, 391, 3, 12, 6, 0, 391, 395, 1, 0, 0, 0, 392, 393, 
		    5, 20, 0, 0, 393, 395, 3, 12, 6, 0, 394, 380, 1, 0, 0, 0, 394, 388, 
		    1, 0, 0, 0, 394, 392, 1, 0, 0, 0, 395, 47, 1, 0, 0, 0, 396, 397, 5, 
		    54, 0, 0, 397, 398, 5, 8, 0, 0, 398, 403, 3, 74, 37, 0, 399, 400, 
		    5, 54, 0, 0, 400, 401, 5, 7, 0, 0, 401, 403, 3, 74, 37, 0, 402, 396, 
		    1, 0, 0, 0, 402, 399, 1, 0, 0, 0, 403, 49, 1, 0, 0, 0, 404, 405, 5, 
		    54, 0, 0, 405, 412, 5, 11, 0, 0, 406, 407, 5, 54, 0, 0, 407, 412, 
		    5, 12, 0, 0, 408, 409, 5, 54, 0, 0, 409, 410, 5, 7, 0, 0, 410, 412, 
		    3, 74, 37, 0, 411, 404, 1, 0, 0, 0, 411, 406, 1, 0, 0, 0, 411, 408, 
		    1, 0, 0, 0, 412, 51, 1, 0, 0, 0, 413, 414, 5, 21, 0, 0, 414, 415, 
		    3, 74, 37, 0, 415, 419, 5, 4, 0, 0, 416, 418, 3, 54, 27, 0, 417, 416, 
		    1, 0, 0, 0, 418, 421, 1, 0, 0, 0, 419, 417, 1, 0, 0, 0, 419, 420, 
		    1, 0, 0, 0, 420, 423, 1, 0, 0, 0, 421, 419, 1, 0, 0, 0, 422, 424, 
		    3, 56, 28, 0, 423, 422, 1, 0, 0, 0, 423, 424, 1, 0, 0, 0, 424, 425, 
		    1, 0, 0, 0, 425, 426, 5, 5, 0, 0, 426, 53, 1, 0, 0, 0, 427, 428, 5, 
		    22, 0, 0, 428, 429, 3, 24, 12, 0, 429, 433, 5, 13, 0, 0, 430, 432, 
		    3, 14, 7, 0, 431, 430, 1, 0, 0, 0, 432, 435, 1, 0, 0, 0, 433, 431, 
		    1, 0, 0, 0, 433, 434, 1, 0, 0, 0, 434, 55, 1, 0, 0, 0, 435, 433, 1, 
		    0, 0, 0, 436, 437, 5, 23, 0, 0, 437, 441, 5, 13, 0, 0, 438, 440, 3, 
		    14, 7, 0, 439, 438, 1, 0, 0, 0, 440, 443, 1, 0, 0, 0, 441, 439, 1, 
		    0, 0, 0, 441, 442, 1, 0, 0, 0, 442, 57, 1, 0, 0, 0, 443, 441, 1, 0, 
		    0, 0, 444, 446, 5, 24, 0, 0, 445, 447, 5, 6, 0, 0, 446, 445, 1, 0, 
		    0, 0, 446, 447, 1, 0, 0, 0, 447, 59, 1, 0, 0, 0, 448, 450, 5, 25, 
		    0, 0, 449, 451, 5, 6, 0, 0, 450, 449, 1, 0, 0, 0, 450, 451, 1, 0, 
		    0, 0, 451, 61, 1, 0, 0, 0, 452, 453, 5, 54, 0, 0, 453, 455, 5, 11, 
		    0, 0, 454, 456, 5, 6, 0, 0, 455, 454, 1, 0, 0, 0, 455, 456, 1, 0, 
		    0, 0, 456, 463, 1, 0, 0, 0, 457, 458, 5, 54, 0, 0, 458, 460, 5, 12, 
		    0, 0, 459, 461, 5, 6, 0, 0, 460, 459, 1, 0, 0, 0, 460, 461, 1, 0, 
		    0, 0, 461, 463, 1, 0, 0, 0, 462, 452, 1, 0, 0, 0, 462, 457, 1, 0, 
		    0, 0, 463, 63, 1, 0, 0, 0, 464, 466, 5, 26, 0, 0, 465, 467, 3, 24, 
		    12, 0, 466, 465, 1, 0, 0, 0, 466, 467, 1, 0, 0, 0, 467, 469, 1, 0, 
		    0, 0, 468, 470, 5, 6, 0, 0, 469, 468, 1, 0, 0, 0, 469, 470, 1, 0, 
		    0, 0, 470, 65, 1, 0, 0, 0, 471, 472, 3, 68, 34, 0, 472, 474, 5, 1, 
		    0, 0, 473, 475, 3, 70, 35, 0, 474, 473, 1, 0, 0, 0, 474, 475, 1, 0, 
		    0, 0, 475, 476, 1, 0, 0, 0, 476, 477, 5, 2, 0, 0, 477, 67, 1, 0, 0, 
		    0, 478, 483, 5, 54, 0, 0, 479, 480, 5, 14, 0, 0, 480, 482, 5, 54, 
		    0, 0, 481, 479, 1, 0, 0, 0, 482, 485, 1, 0, 0, 0, 483, 481, 1, 0, 
		    0, 0, 483, 484, 1, 0, 0, 0, 484, 69, 1, 0, 0, 0, 485, 483, 1, 0, 0, 
		    0, 486, 491, 3, 72, 36, 0, 487, 488, 5, 3, 0, 0, 488, 490, 3, 72, 
		    36, 0, 489, 487, 1, 0, 0, 0, 490, 493, 1, 0, 0, 0, 491, 489, 1, 0, 
		    0, 0, 491, 492, 1, 0, 0, 0, 492, 71, 1, 0, 0, 0, 493, 491, 1, 0, 0, 
		    0, 494, 495, 5, 53, 0, 0, 495, 498, 5, 54, 0, 0, 496, 498, 3, 74, 
		    37, 0, 497, 494, 1, 0, 0, 0, 497, 496, 1, 0, 0, 0, 498, 73, 1, 0, 
		    0, 0, 499, 500, 3, 76, 38, 0, 500, 75, 1, 0, 0, 0, 501, 506, 3, 78, 
		    39, 0, 502, 503, 5, 39, 0, 0, 503, 505, 3, 78, 39, 0, 504, 502, 1, 
		    0, 0, 0, 505, 508, 1, 0, 0, 0, 506, 504, 1, 0, 0, 0, 506, 507, 1, 
		    0, 0, 0, 507, 77, 1, 0, 0, 0, 508, 506, 1, 0, 0, 0, 509, 514, 3, 80, 
		    40, 0, 510, 511, 5, 40, 0, 0, 511, 513, 3, 80, 40, 0, 512, 510, 1, 
		    0, 0, 0, 513, 516, 1, 0, 0, 0, 514, 512, 1, 0, 0, 0, 514, 515, 1, 
		    0, 0, 0, 515, 79, 1, 0, 0, 0, 516, 514, 1, 0, 0, 0, 517, 522, 3, 82, 
		    41, 0, 518, 519, 7, 1, 0, 0, 519, 521, 3, 82, 41, 0, 520, 518, 1, 
		    0, 0, 0, 521, 524, 1, 0, 0, 0, 522, 520, 1, 0, 0, 0, 522, 523, 1, 
		    0, 0, 0, 523, 81, 1, 0, 0, 0, 524, 522, 1, 0, 0, 0, 525, 530, 3, 84, 
		    42, 0, 526, 527, 7, 2, 0, 0, 527, 529, 3, 84, 42, 0, 528, 526, 1, 
		    0, 0, 0, 529, 532, 1, 0, 0, 0, 530, 528, 1, 0, 0, 0, 530, 531, 1, 
		    0, 0, 0, 531, 83, 1, 0, 0, 0, 532, 530, 1, 0, 0, 0, 533, 538, 3, 86, 
		    43, 0, 534, 535, 7, 3, 0, 0, 535, 537, 3, 86, 43, 0, 536, 534, 1, 
		    0, 0, 0, 537, 540, 1, 0, 0, 0, 538, 536, 1, 0, 0, 0, 538, 539, 1, 
		    0, 0, 0, 539, 85, 1, 0, 0, 0, 540, 538, 1, 0, 0, 0, 541, 546, 3, 88, 
		    44, 0, 542, 543, 7, 4, 0, 0, 543, 545, 3, 88, 44, 0, 544, 542, 1, 
		    0, 0, 0, 545, 548, 1, 0, 0, 0, 546, 544, 1, 0, 0, 0, 546, 547, 1, 
		    0, 0, 0, 547, 87, 1, 0, 0, 0, 548, 546, 1, 0, 0, 0, 549, 550, 5, 52, 
		    0, 0, 550, 557, 3, 88, 44, 0, 551, 552, 5, 48, 0, 0, 552, 557, 3, 
		    88, 44, 0, 553, 554, 5, 49, 0, 0, 554, 557, 3, 88, 44, 0, 555, 557, 
		    3, 90, 45, 0, 556, 549, 1, 0, 0, 0, 556, 551, 1, 0, 0, 0, 556, 553, 
		    1, 0, 0, 0, 556, 555, 1, 0, 0, 0, 557, 89, 1, 0, 0, 0, 558, 559, 5, 
		    1, 0, 0, 559, 560, 3, 74, 37, 0, 560, 561, 5, 2, 0, 0, 561, 573, 1, 
		    0, 0, 0, 562, 573, 3, 66, 33, 0, 563, 573, 3, 34, 17, 0, 564, 573, 
		    5, 54, 0, 0, 565, 573, 5, 56, 0, 0, 566, 573, 5, 55, 0, 0, 567, 573, 
		    5, 57, 0, 0, 568, 573, 5, 58, 0, 0, 569, 573, 5, 27, 0, 0, 570, 573, 
		    5, 28, 0, 0, 571, 573, 5, 29, 0, 0, 572, 558, 1, 0, 0, 0, 572, 562, 
		    1, 0, 0, 0, 572, 563, 1, 0, 0, 0, 572, 564, 1, 0, 0, 0, 572, 565, 
		    1, 0, 0, 0, 572, 566, 1, 0, 0, 0, 572, 567, 1, 0, 0, 0, 572, 568, 
		    1, 0, 0, 0, 572, 569, 1, 0, 0, 0, 572, 570, 1, 0, 0, 0, 572, 571, 
		    1, 0, 0, 0, 573, 91, 1, 0, 0, 0, 574, 575, 7, 5, 0, 0, 575, 93, 1, 
		    0, 0, 0, 68, 97, 99, 107, 111, 120, 133, 147, 152, 160, 166, 186, 
		    190, 192, 199, 202, 209, 212, 220, 227, 234, 236, 242, 248, 250, 258, 
		    265, 273, 284, 292, 302, 306, 313, 318, 324, 329, 339, 346, 355, 360, 
		    366, 376, 378, 394, 402, 411, 419, 423, 433, 441, 446, 450, 455, 460, 
		    462, 466, 469, 474, 483, 491, 497, 506, 514, 522, 530, 538, 546, 556, 
		    572];
		protected static $atn;
		protected static $decisionToDFA;
		protected static $sharedContextCache;

		public function __construct(TokenStream $input)
		{
			parent::__construct($input);

			self::initialize();

			$this->interp = new ParserATNSimulator($this, self::$atn, self::$decisionToDFA, self::$sharedContextCache);
		}

		private static function initialize(): void
		{
			if (self::$atn !== null) {
				return;
			}

			RuntimeMetaData::checkVersion('4.13.1', RuntimeMetaData::VERSION);

			$atn = (new ATNDeserializer())->deserialize(self::SERIALIZED_ATN);

			$decisionToDFA = [];
			for ($i = 0, $count = $atn->getNumberOfDecisions(); $i < $count; $i++) {
				$decisionToDFA[] = new DFA($atn->getDecisionState($i), $i);
			}

			self::$atn = $atn;
			self::$decisionToDFA = $decisionToDFA;
			self::$sharedContextCache = new PredictionContextCache();
		}

		public function getGrammarFileName(): string
		{
			return "Golampi.g4";
		}

		public function getRuleNames(): array
		{
			return self::RULE_NAMES;
		}

		public function getSerializedATN(): array
		{
			return self::SERIALIZED_ATN;
		}

		public function getATN(): ATN
		{
			return self::$atn;
		}

		public function getVocabulary(): Vocabulary
        {
            static $vocabulary;

			return $vocabulary = $vocabulary ?? new VocabularyImpl(self::LITERAL_NAMES, self::SYMBOLIC_NAMES);
        }

		/**
		 * @throws RecognitionException
		 */
		public function program(): Context\ProgramContext
		{
		    $localContext = new Context\ProgramContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 0, self::RULE_program);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(97); 
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        do {
		        	$this->setState(97);
		        	$this->errorHandler->sync($this);

		        	switch ($this->input->LA(1)) {
		        	    case self::FUNC:
		        	    	$this->setState(94);
		        	    	$this->functionDecl();
		        	    	break;

		        	    case self::VAR:
		        	    	$this->setState(95);
		        	    	$this->varDecl();
		        	    	break;

		        	    case self::CONST:
		        	    	$this->setState(96);
		        	    	$this->constDecl();
		        	    	break;

		        	default:
		        		throw new NoViableAltException($this);
		        	}
		        	$this->setState(99); 
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        } while (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 229376) !== 0));
		        $this->setState(101);
		        $this->match(self::EOF);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function functionDecl(): Context\FunctionDeclContext
		{
		    $localContext = new Context\FunctionDeclContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 2, self::RULE_functionDecl);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(103);
		        $this->match(self::FUNC);
		        $this->setState(104);
		        $this->match(self::ID);
		        $this->setState(105);
		        $this->match(self::T__0);
		        $this->setState(107);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::ID) {
		        	$this->setState(106);
		        	$this->paramList();
		        }
		        $this->setState(109);
		        $this->match(self::T__1);
		        $this->setState(111);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 562983239418370) !== 0)) {
		        	$this->setState(110);
		        	$this->returnType();
		        }
		        $this->setState(113);
		        $this->block();
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function paramList(): Context\ParamListContext
		{
		    $localContext = new Context\ParamListContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 4, self::RULE_paramList);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(115);
		        $this->param();
		        $this->setState(120);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::T__2) {
		        	$this->setState(116);
		        	$this->match(self::T__2);
		        	$this->setState(117);
		        	$this->param();
		        	$this->setState(122);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function param(): Context\ParamContext
		{
		    $localContext = new Context\ParamContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 6, self::RULE_param);

		    try {
		        $this->setState(133);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 5, $this->ctx)) {
		        	case 1:
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(123);
		        	    $this->match(self::ID);
		        	    $this->setState(124);
		        	    $this->type();
		        	break;

		        	case 2:
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(125);
		        	    $this->match(self::ID);
		        	    $this->setState(126);
		        	    $this->match(self::STAR);
		        	    $this->setState(127);
		        	    $this->type();
		        	break;

		        	case 3:
		        	    $this->enterOuterAlt($localContext, 3);
		        	    $this->setState(128);
		        	    $this->match(self::ID);
		        	    $this->setState(129);
		        	    $this->match(self::STAR);
		        	    $this->setState(130);
		        	    $this->arrayType();
		        	break;

		        	case 4:
		        	    $this->enterOuterAlt($localContext, 4);
		        	    $this->setState(131);
		        	    $this->match(self::ID);
		        	    $this->setState(132);
		        	    $this->arrayType();
		        	break;
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function returnType(): Context\ReturnTypeContext
		{
		    $localContext = new Context\ReturnTypeContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 8, self::RULE_returnType);

		    try {
		        $this->setState(152);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 7, $this->ctx)) {
		        	case 1:
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(135);
		        	    $this->type();
		        	break;

		        	case 2:
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(136);
		        	    $this->arrayType();
		        	break;

		        	case 3:
		        	    $this->enterOuterAlt($localContext, 3);
		        	    $this->setState(137);
		        	    $this->match(self::STAR);
		        	    $this->setState(138);
		        	    $this->type();
		        	break;

		        	case 4:
		        	    $this->enterOuterAlt($localContext, 4);
		        	    $this->setState(139);
		        	    $this->match(self::STAR);
		        	    $this->setState(140);
		        	    $this->arrayType();
		        	break;

		        	case 5:
		        	    $this->enterOuterAlt($localContext, 5);
		        	    $this->setState(141);
		        	    $this->match(self::T__0);
		        	    $this->setState(142);
		        	    $this->multiReturnType();
		        	    $this->setState(147);
		        	    $this->errorHandler->sync($this);

		        	    $_la = $this->input->LA(1);
		        	    while ($_la === self::T__2) {
		        	    	$this->setState(143);
		        	    	$this->match(self::T__2);
		        	    	$this->setState(144);
		        	    	$this->multiReturnType();
		        	    	$this->setState(149);
		        	    	$this->errorHandler->sync($this);
		        	    	$_la = $this->input->LA(1);
		        	    }
		        	    $this->setState(150);
		        	    $this->match(self::T__1);
		        	break;
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function multiReturnType(): Context\MultiReturnTypeContext
		{
		    $localContext = new Context\MultiReturnTypeContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 10, self::RULE_multiReturnType);

		    try {
		        $this->setState(160);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 8, $this->ctx)) {
		        	case 1:
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(154);
		        	    $this->type();
		        	break;

		        	case 2:
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(155);
		        	    $this->arrayType();
		        	break;

		        	case 3:
		        	    $this->enterOuterAlt($localContext, 3);
		        	    $this->setState(156);
		        	    $this->match(self::STAR);
		        	    $this->setState(157);
		        	    $this->type();
		        	break;

		        	case 4:
		        	    $this->enterOuterAlt($localContext, 4);
		        	    $this->setState(158);
		        	    $this->match(self::STAR);
		        	    $this->setState(159);
		        	    $this->arrayType();
		        	break;
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function block(): Context\BlockContext
		{
		    $localContext = new Context\BlockContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 12, self::RULE_block);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(162);
		        $this->match(self::T__3);
		        $this->setState(166);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 563794379412013058) !== 0)) {
		        	$this->setState(163);
		        	$this->statement();
		        	$this->setState(168);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		        $this->setState(169);
		        $this->match(self::T__4);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function statement(): Context\StatementContext
		{
		    $localContext = new Context\StatementContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 14, self::RULE_statement);

		    try {
		        $this->setState(192);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 12, $this->ctx)) {
		        	case 1:
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(171);
		        	    $this->varDecl();
		        	break;

		        	case 2:
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(172);
		        	    $this->varShortDecl();
		        	break;

		        	case 3:
		        	    $this->enterOuterAlt($localContext, 3);
		        	    $this->setState(173);
		        	    $this->constDecl();
		        	break;

		        	case 4:
		        	    $this->enterOuterAlt($localContext, 4);
		        	    $this->setState(174);
		        	    $this->ptrAssign();
		        	break;

		        	case 5:
		        	    $this->enterOuterAlt($localContext, 5);
		        	    $this->setState(175);
		        	    $this->arrayAssign();
		        	break;

		        	case 6:
		        	    $this->enterOuterAlt($localContext, 6);
		        	    $this->setState(176);
		        	    $this->assignment();
		        	break;

		        	case 7:
		        	    $this->enterOuterAlt($localContext, 7);
		        	    $this->setState(177);
		        	    $this->ifStmt();
		        	break;

		        	case 8:
		        	    $this->enterOuterAlt($localContext, 8);
		        	    $this->setState(178);
		        	    $this->forStmt();
		        	break;

		        	case 9:
		        	    $this->enterOuterAlt($localContext, 9);
		        	    $this->setState(179);
		        	    $this->switchStmt();
		        	break;

		        	case 10:
		        	    $this->enterOuterAlt($localContext, 10);
		        	    $this->setState(180);
		        	    $this->breakStmt();
		        	break;

		        	case 11:
		        	    $this->enterOuterAlt($localContext, 11);
		        	    $this->setState(181);
		        	    $this->continueStmt();
		        	break;

		        	case 12:
		        	    $this->enterOuterAlt($localContext, 12);
		        	    $this->setState(182);
		        	    $this->incDecStmt();
		        	break;

		        	case 13:
		        	    $this->enterOuterAlt($localContext, 13);
		        	    $this->setState(183);
		        	    $this->returnStmt();
		        	break;

		        	case 14:
		        	    $this->enterOuterAlt($localContext, 14);
		        	    $this->setState(184);
		        	    $this->functionCall();
		        	    $this->setState(186);
		        	    $this->errorHandler->sync($this);
		        	    $_la = $this->input->LA(1);

		        	    if ($_la === self::T__5) {
		        	    	$this->setState(185);
		        	    	$this->match(self::T__5);
		        	    }
		        	break;

		        	case 15:
		        	    $this->enterOuterAlt($localContext, 15);
		        	    $this->setState(188);
		        	    $this->expression();
		        	    $this->setState(190);
		        	    $this->errorHandler->sync($this);
		        	    $_la = $this->input->LA(1);

		        	    if ($_la === self::T__5) {
		        	    	$this->setState(189);
		        	    	$this->match(self::T__5);
		        	    }
		        	break;
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function varDecl(): Context\VarDeclContext
		{
		    $localContext = new Context\VarDeclContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 16, self::RULE_varDecl);

		    try {
		        $this->setState(236);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 20, $this->ctx)) {
		        	case 1:
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(194);
		        	    $this->match(self::VAR);
		        	    $this->setState(195);
		        	    $this->match(self::ID);
		        	    $this->setState(196);
		        	    $this->type();
		        	    $this->setState(199);
		        	    $this->errorHandler->sync($this);
		        	    $_la = $this->input->LA(1);

		        	    if ($_la === self::T__6) {
		        	    	$this->setState(197);
		        	    	$this->match(self::T__6);
		        	    	$this->setState(198);
		        	    	$this->expression();
		        	    }
		        	    $this->setState(202);
		        	    $this->errorHandler->sync($this);
		        	    $_la = $this->input->LA(1);

		        	    if ($_la === self::T__5) {
		        	    	$this->setState(201);
		        	    	$this->match(self::T__5);
		        	    }
		        	break;

		        	case 2:
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(204);
		        	    $this->match(self::VAR);
		        	    $this->setState(205);
		        	    $this->match(self::ID);
		        	    $this->setState(206);
		        	    $this->arrayType();
		        	    $this->setState(209);
		        	    $this->errorHandler->sync($this);
		        	    $_la = $this->input->LA(1);

		        	    if ($_la === self::T__6) {
		        	    	$this->setState(207);
		        	    	$this->match(self::T__6);
		        	    	$this->setState(208);
		        	    	$this->arrayLiteral();
		        	    }
		        	    $this->setState(212);
		        	    $this->errorHandler->sync($this);
		        	    $_la = $this->input->LA(1);

		        	    if ($_la === self::T__5) {
		        	    	$this->setState(211);
		        	    	$this->match(self::T__5);
		        	    }
		        	break;

		        	case 3:
		        	    $this->enterOuterAlt($localContext, 3);
		        	    $this->setState(214);
		        	    $this->match(self::VAR);
		        	    $this->setState(215);
		        	    $this->match(self::ID);
		        	    $this->setState(216);
		        	    $this->arrayType();
		        	    $this->setState(217);
		        	    $this->match(self::T__6);
		        	    $this->setState(218);
		        	    $this->expression();
		        	    $this->setState(220);
		        	    $this->errorHandler->sync($this);
		        	    $_la = $this->input->LA(1);

		        	    if ($_la === self::T__5) {
		        	    	$this->setState(219);
		        	    	$this->match(self::T__5);
		        	    }
		        	break;

		        	case 4:
		        	    $this->enterOuterAlt($localContext, 4);
		        	    $this->setState(222);
		        	    $this->match(self::VAR);
		        	    $this->setState(223);
		        	    $this->match(self::ID);
		        	    $this->setState(224);
		        	    $this->match(self::STAR);
		        	    $this->setState(225);
		        	    $this->type();
		        	    $this->setState(227);
		        	    $this->errorHandler->sync($this);
		        	    $_la = $this->input->LA(1);

		        	    if ($_la === self::T__5) {
		        	    	$this->setState(226);
		        	    	$this->match(self::T__5);
		        	    }
		        	break;

		        	case 5:
		        	    $this->enterOuterAlt($localContext, 5);
		        	    $this->setState(229);
		        	    $this->match(self::VAR);
		        	    $this->setState(230);
		        	    $this->match(self::ID);
		        	    $this->setState(231);
		        	    $this->match(self::STAR);
		        	    $this->setState(232);
		        	    $this->arrayType();
		        	    $this->setState(234);
		        	    $this->errorHandler->sync($this);
		        	    $_la = $this->input->LA(1);

		        	    if ($_la === self::T__5) {
		        	    	$this->setState(233);
		        	    	$this->match(self::T__5);
		        	    }
		        	break;
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function varShortDecl(): Context\VarShortDeclContext
		{
		    $localContext = new Context\VarShortDeclContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 18, self::RULE_varShortDecl);

		    try {
		        $this->setState(250);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 23, $this->ctx)) {
		        	case 1:
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(238);
		        	    $this->idList();
		        	    $this->setState(239);
		        	    $this->match(self::T__7);
		        	    $this->setState(240);
		        	    $this->expList();
		        	    $this->setState(242);
		        	    $this->errorHandler->sync($this);
		        	    $_la = $this->input->LA(1);

		        	    if ($_la === self::T__5) {
		        	    	$this->setState(241);
		        	    	$this->match(self::T__5);
		        	    }
		        	break;

		        	case 2:
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(244);
		        	    $this->match(self::ID);
		        	    $this->setState(245);
		        	    $this->match(self::T__7);
		        	    $this->setState(246);
		        	    $this->arrayLiteral();
		        	    $this->setState(248);
		        	    $this->errorHandler->sync($this);
		        	    $_la = $this->input->LA(1);

		        	    if ($_la === self::T__5) {
		        	    	$this->setState(247);
		        	    	$this->match(self::T__5);
		        	    }
		        	break;
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function constDecl(): Context\ConstDeclContext
		{
		    $localContext = new Context\ConstDeclContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 20, self::RULE_constDecl);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(252);
		        $this->match(self::CONST);
		        $this->setState(253);
		        $this->match(self::ID);
		        $this->setState(254);
		        $this->type();
		        $this->setState(255);
		        $this->match(self::T__6);
		        $this->setState(256);
		        $this->expression();
		        $this->setState(258);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::T__5) {
		        	$this->setState(257);
		        	$this->match(self::T__5);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function idList(): Context\IdListContext
		{
		    $localContext = new Context\IdListContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 22, self::RULE_idList);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(260);
		        $this->match(self::ID);
		        $this->setState(265);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::T__2) {
		        	$this->setState(261);
		        	$this->match(self::T__2);
		        	$this->setState(262);
		        	$this->match(self::ID);
		        	$this->setState(267);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function expList(): Context\ExpListContext
		{
		    $localContext = new Context\ExpListContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 24, self::RULE_expList);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(268);
		        $this->expression();
		        $this->setState(273);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::T__2) {
		        	$this->setState(269);
		        	$this->match(self::T__2);
		        	$this->setState(270);
		        	$this->expression();
		        	$this->setState(275);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function arrayType(): Context\ArrayTypeContext
		{
		    $localContext = new Context\ArrayTypeContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 26, self::RULE_arrayType);

		    try {
		        $this->setState(284);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 27, $this->ctx)) {
		        	case 1:
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(276);
		        	    $this->match(self::T__8);
		        	    $this->setState(277);
		        	    $this->match(self::INT);
		        	    $this->setState(278);
		        	    $this->match(self::T__9);
		        	    $this->setState(279);
		        	    $this->type();
		        	break;

		        	case 2:
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(280);
		        	    $this->match(self::T__8);
		        	    $this->setState(281);
		        	    $this->match(self::INT);
		        	    $this->setState(282);
		        	    $this->match(self::T__9);
		        	    $this->setState(283);
		        	    $this->arrayType();
		        	break;
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function arrayLiteral(): Context\ArrayLiteralContext
		{
		    $localContext = new Context\ArrayLiteralContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 28, self::RULE_arrayLiteral);

		    try {
		        $this->setState(306);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 30, $this->ctx)) {
		        	case 1:
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(286);
		        	    $this->match(self::T__8);
		        	    $this->setState(287);
		        	    $this->match(self::INT);
		        	    $this->setState(288);
		        	    $this->match(self::T__9);
		        	    $this->setState(289);
		        	    $this->type();
		        	    $this->setState(290);
		        	    $this->match(self::T__3);
		        	    $this->setState(292);
		        	    $this->errorHandler->sync($this);
		        	    $_la = $this->input->LA(1);

		        	    if (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 563794379290968066) !== 0)) {
		        	    	$this->setState(291);
		        	    	$this->arrayElements();
		        	    }
		        	    $this->setState(294);
		        	    $this->match(self::T__4);
		        	break;

		        	case 2:
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(296);
		        	    $this->match(self::T__8);
		        	    $this->setState(297);
		        	    $this->match(self::INT);
		        	    $this->setState(298);
		        	    $this->match(self::T__9);
		        	    $this->setState(299);
		        	    $this->arrayType();
		        	    $this->setState(300);
		        	    $this->match(self::T__3);
		        	    $this->setState(302);
		        	    $this->errorHandler->sync($this);
		        	    $_la = $this->input->LA(1);

		        	    if ($_la === self::T__3) {
		        	    	$this->setState(301);
		        	    	$this->arrayRowElements();
		        	    }
		        	    $this->setState(304);
		        	    $this->match(self::T__4);
		        	break;
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function arrayElements(): Context\ArrayElementsContext
		{
		    $localContext = new Context\ArrayElementsContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 30, self::RULE_arrayElements);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(308);
		        $this->expression();
		        $this->setState(313);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::T__2) {
		        	$this->setState(309);
		        	$this->match(self::T__2);
		        	$this->setState(310);
		        	$this->expression();
		        	$this->setState(315);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function arrayRowElements(): Context\ArrayRowElementsContext
		{
		    $localContext = new Context\ArrayRowElementsContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 32, self::RULE_arrayRowElements);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(316);
		        $this->match(self::T__3);
		        $this->setState(318);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 563794379290968066) !== 0)) {
		        	$this->setState(317);
		        	$this->arrayElements();
		        }
		        $this->setState(320);
		        $this->match(self::T__4);
		        $this->setState(329);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::T__2) {
		        	$this->setState(321);
		        	$this->match(self::T__2);
		        	$this->setState(322);
		        	$this->match(self::T__3);
		        	$this->setState(324);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);

		        	if (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 563794379290968066) !== 0)) {
		        		$this->setState(323);
		        		$this->arrayElements();
		        	}
		        	$this->setState(326);
		        	$this->match(self::T__4);
		        	$this->setState(331);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function arrayAccess(): Context\ArrayAccessContext
		{
		    $localContext = new Context\ArrayAccessContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 34, self::RULE_arrayAccess);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(332);
		        $this->match(self::ID);
		        $this->setState(337); 
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        do {
		        	$this->setState(333);
		        	$this->match(self::T__8);
		        	$this->setState(334);
		        	$this->expression();
		        	$this->setState(335);
		        	$this->match(self::T__9);
		        	$this->setState(339); 
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        } while ($_la === self::T__8);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function ptrAssign(): Context\PtrAssignContext
		{
		    $localContext = new Context\PtrAssignContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 36, self::RULE_ptrAssign);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(341);
		        $this->match(self::STAR);
		        $this->setState(342);
		        $this->match(self::ID);
		        $this->setState(343);
		        $this->assignOp();
		        $this->setState(344);
		        $this->expression();
		        $this->setState(346);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::T__5) {
		        	$this->setState(345);
		        	$this->match(self::T__5);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function arrayAssign(): Context\ArrayAssignContext
		{
		    $localContext = new Context\ArrayAssignContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 38, self::RULE_arrayAssign);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(348);
		        $this->match(self::ID);
		        $this->setState(353); 
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        do {
		        	$this->setState(349);
		        	$this->match(self::T__8);
		        	$this->setState(350);
		        	$this->expression();
		        	$this->setState(351);
		        	$this->match(self::T__9);
		        	$this->setState(355); 
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        } while ($_la === self::T__8);
		        $this->setState(357);
		        $this->assignOp();
		        $this->setState(358);
		        $this->expression();
		        $this->setState(360);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::T__5) {
		        	$this->setState(359);
		        	$this->match(self::T__5);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function assignment(): Context\AssignmentContext
		{
		    $localContext = new Context\AssignmentContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 40, self::RULE_assignment);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(362);
		        $this->match(self::ID);
		        $this->setState(363);
		        $this->assignOp();
		        $this->setState(364);
		        $this->expression();
		        $this->setState(366);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::T__5) {
		        	$this->setState(365);
		        	$this->match(self::T__5);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function assignOp(): Context\AssignOpContext
		{
		    $localContext = new Context\AssignOpContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 42, self::RULE_assignOp);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(368);

		        $_la = $this->input->LA(1);

		        if (!(((($_la) & ~0x3f) === 0 && ((1 << $_la) & 515396075648) !== 0))) {
		        $this->errorHandler->recoverInline($this);
		        } else {
		        	if ($this->input->LA(1) === Token::EOF) {
		        	    $this->matchedEOF = true;
		            }

		        	$this->errorHandler->reportMatch($this);
		        	$this->consume();
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function ifStmt(): Context\IfStmtContext
		{
		    $localContext = new Context\IfStmtContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 44, self::RULE_ifStmt);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(370);
		        $this->match(self::IF);
		        $this->setState(371);
		        $this->expression();
		        $this->setState(372);
		        $this->block();
		        $this->setState(378);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::ELSE) {
		        	$this->setState(373);
		        	$this->match(self::ELSE);
		        	$this->setState(376);
		        	$this->errorHandler->sync($this);

		        	switch ($this->input->LA(1)) {
		        	    case self::IF:
		        	    	$this->setState(374);
		        	    	$this->ifStmt();
		        	    	break;

		        	    case self::T__3:
		        	    	$this->setState(375);
		        	    	$this->block();
		        	    	break;

		        	default:
		        		throw new NoViableAltException($this);
		        	}
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function forStmt(): Context\ForStmtContext
		{
		    $localContext = new Context\ForStmtContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 46, self::RULE_forStmt);

		    try {
		        $this->setState(394);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 42, $this->ctx)) {
		        	case 1:
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(380);
		        	    $this->match(self::FOR);
		        	    $this->setState(381);
		        	    $this->forInit();
		        	    $this->setState(382);
		        	    $this->match(self::T__5);
		        	    $this->setState(383);
		        	    $this->expression();
		        	    $this->setState(384);
		        	    $this->match(self::T__5);
		        	    $this->setState(385);
		        	    $this->forPost();
		        	    $this->setState(386);
		        	    $this->block();
		        	break;

		        	case 2:
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(388);
		        	    $this->match(self::FOR);
		        	    $this->setState(389);
		        	    $this->expression();
		        	    $this->setState(390);
		        	    $this->block();
		        	break;

		        	case 3:
		        	    $this->enterOuterAlt($localContext, 3);
		        	    $this->setState(392);
		        	    $this->match(self::FOR);
		        	    $this->setState(393);
		        	    $this->block();
		        	break;
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function forInit(): Context\ForInitContext
		{
		    $localContext = new Context\ForInitContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 48, self::RULE_forInit);

		    try {
		        $this->setState(402);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 43, $this->ctx)) {
		        	case 1:
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(396);
		        	    $this->match(self::ID);
		        	    $this->setState(397);
		        	    $this->match(self::T__7);
		        	    $this->setState(398);
		        	    $this->expression();
		        	break;

		        	case 2:
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(399);
		        	    $this->match(self::ID);
		        	    $this->setState(400);
		        	    $this->match(self::T__6);
		        	    $this->setState(401);
		        	    $this->expression();
		        	break;
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function forPost(): Context\ForPostContext
		{
		    $localContext = new Context\ForPostContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 50, self::RULE_forPost);

		    try {
		        $this->setState(411);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 44, $this->ctx)) {
		        	case 1:
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(404);
		        	    $this->match(self::ID);
		        	    $this->setState(405);
		        	    $this->match(self::T__10);
		        	break;

		        	case 2:
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(406);
		        	    $this->match(self::ID);
		        	    $this->setState(407);
		        	    $this->match(self::T__11);
		        	break;

		        	case 3:
		        	    $this->enterOuterAlt($localContext, 3);
		        	    $this->setState(408);
		        	    $this->match(self::ID);
		        	    $this->setState(409);
		        	    $this->match(self::T__6);
		        	    $this->setState(410);
		        	    $this->expression();
		        	break;
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function switchStmt(): Context\SwitchStmtContext
		{
		    $localContext = new Context\SwitchStmtContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 52, self::RULE_switchStmt);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(413);
		        $this->match(self::SWITCH);
		        $this->setState(414);
		        $this->expression();
		        $this->setState(415);
		        $this->match(self::T__3);
		        $this->setState(419);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::CASE) {
		        	$this->setState(416);
		        	$this->caseClause();
		        	$this->setState(421);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		        $this->setState(423);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::DEFAULT) {
		        	$this->setState(422);
		        	$this->defaultClause();
		        }
		        $this->setState(425);
		        $this->match(self::T__4);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function caseClause(): Context\CaseClauseContext
		{
		    $localContext = new Context\CaseClauseContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 54, self::RULE_caseClause);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(427);
		        $this->match(self::CASE);
		        $this->setState(428);
		        $this->expList();
		        $this->setState(429);
		        $this->match(self::T__12);
		        $this->setState(433);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 563794379412013058) !== 0)) {
		        	$this->setState(430);
		        	$this->statement();
		        	$this->setState(435);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function defaultClause(): Context\DefaultClauseContext
		{
		    $localContext = new Context\DefaultClauseContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 56, self::RULE_defaultClause);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(436);
		        $this->match(self::DEFAULT);
		        $this->setState(437);
		        $this->match(self::T__12);
		        $this->setState(441);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 563794379412013058) !== 0)) {
		        	$this->setState(438);
		        	$this->statement();
		        	$this->setState(443);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function breakStmt(): Context\BreakStmtContext
		{
		    $localContext = new Context\BreakStmtContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 58, self::RULE_breakStmt);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(444);
		        $this->match(self::BREAK);
		        $this->setState(446);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::T__5) {
		        	$this->setState(445);
		        	$this->match(self::T__5);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function continueStmt(): Context\ContinueStmtContext
		{
		    $localContext = new Context\ContinueStmtContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 60, self::RULE_continueStmt);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(448);
		        $this->match(self::CONTINUE);
		        $this->setState(450);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::T__5) {
		        	$this->setState(449);
		        	$this->match(self::T__5);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function incDecStmt(): Context\IncDecStmtContext
		{
		    $localContext = new Context\IncDecStmtContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 62, self::RULE_incDecStmt);

		    try {
		        $this->setState(462);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 53, $this->ctx)) {
		        	case 1:
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(452);
		        	    $this->match(self::ID);
		        	    $this->setState(453);
		        	    $this->match(self::T__10);
		        	    $this->setState(455);
		        	    $this->errorHandler->sync($this);
		        	    $_la = $this->input->LA(1);

		        	    if ($_la === self::T__5) {
		        	    	$this->setState(454);
		        	    	$this->match(self::T__5);
		        	    }
		        	break;

		        	case 2:
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(457);
		        	    $this->match(self::ID);
		        	    $this->setState(458);
		        	    $this->match(self::T__11);
		        	    $this->setState(460);
		        	    $this->errorHandler->sync($this);
		        	    $_la = $this->input->LA(1);

		        	    if ($_la === self::T__5) {
		        	    	$this->setState(459);
		        	    	$this->match(self::T__5);
		        	    }
		        	break;
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function returnStmt(): Context\ReturnStmtContext
		{
		    $localContext = new Context\ReturnStmtContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 64, self::RULE_returnStmt);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(464);
		        $this->match(self::RETURN);
		        $this->setState(466);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 54, $this->ctx)) {
		            case 1:
		        	    $this->setState(465);
		        	    $this->expList();
		        	break;
		        }
		        $this->setState(469);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::T__5) {
		        	$this->setState(468);
		        	$this->match(self::T__5);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function functionCall(): Context\FunctionCallContext
		{
		    $localContext = new Context\FunctionCallContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 66, self::RULE_functionCall);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(471);
		        $this->qualifiedName();
		        $this->setState(472);
		        $this->match(self::T__0);
		        $this->setState(474);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 572801578545709058) !== 0)) {
		        	$this->setState(473);
		        	$this->argList();
		        }
		        $this->setState(476);
		        $this->match(self::T__1);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function qualifiedName(): Context\QualifiedNameContext
		{
		    $localContext = new Context\QualifiedNameContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 68, self::RULE_qualifiedName);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(478);
		        $this->match(self::ID);
		        $this->setState(483);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::T__13) {
		        	$this->setState(479);
		        	$this->match(self::T__13);
		        	$this->setState(480);
		        	$this->match(self::ID);
		        	$this->setState(485);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function argList(): Context\ArgListContext
		{
		    $localContext = new Context\ArgListContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 70, self::RULE_argList);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(486);
		        $this->argItem();
		        $this->setState(491);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::T__2) {
		        	$this->setState(487);
		        	$this->match(self::T__2);
		        	$this->setState(488);
		        	$this->argItem();
		        	$this->setState(493);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function argItem(): Context\ArgItemContext
		{
		    $localContext = new Context\ArgItemContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 72, self::RULE_argItem);

		    try {
		        $this->setState(497);
		        $this->errorHandler->sync($this);

		        switch ($this->input->LA(1)) {
		            case self::REF:
		            	$this->enterOuterAlt($localContext, 1);
		            	$this->setState(494);
		            	$this->match(self::REF);
		            	$this->setState(495);
		            	$this->match(self::ID);
		            	break;

		            case self::T__0:
		            case self::TRUE:
		            case self::FALSE:
		            case self::NIL:
		            case self::MINUS:
		            case self::STAR:
		            case self::BANG:
		            case self::ID:
		            case self::FLOAT:
		            case self::INT:
		            case self::STRING:
		            case self::RUNE:
		            	$this->enterOuterAlt($localContext, 2);
		            	$this->setState(496);
		            	$this->expression();
		            	break;

		        default:
		        	throw new NoViableAltException($this);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function expression(): Context\ExpressionContext
		{
		    $localContext = new Context\ExpressionContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 74, self::RULE_expression);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(499);
		        $this->logicalOr();
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function logicalOr(): Context\LogicalOrContext
		{
		    $localContext = new Context\LogicalOrContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 76, self::RULE_logicalOr);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(501);
		        $this->logicalAnd();
		        $this->setState(506);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::OR) {
		        	$this->setState(502);
		        	$this->match(self::OR);
		        	$this->setState(503);
		        	$this->logicalAnd();
		        	$this->setState(508);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function logicalAnd(): Context\LogicalAndContext
		{
		    $localContext = new Context\LogicalAndContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 78, self::RULE_logicalAnd);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(509);
		        $this->equality();
		        $this->setState(514);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::AND) {
		        	$this->setState(510);
		        	$this->match(self::AND);
		        	$this->setState(511);
		        	$this->equality();
		        	$this->setState(516);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function equality(): Context\EqualityContext
		{
		    $localContext = new Context\EqualityContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 80, self::RULE_equality);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(517);
		        $this->comparison();
		        $this->setState(522);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::EQ || $_la === self::NEQ) {
		        	$this->setState(518);

		        	$_la = $this->input->LA(1);

		        	if (!($_la === self::EQ || $_la === self::NEQ)) {
		        	$this->errorHandler->recoverInline($this);
		        	} else {
		        		if ($this->input->LA(1) === Token::EOF) {
		        		    $this->matchedEOF = true;
		        	    }

		        		$this->errorHandler->reportMatch($this);
		        		$this->consume();
		        	}
		        	$this->setState(519);
		        	$this->comparison();
		        	$this->setState(524);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function comparison(): Context\ComparisonContext
		{
		    $localContext = new Context\ComparisonContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 82, self::RULE_comparison);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(525);
		        $this->term();
		        $this->setState(530);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 131941395333120) !== 0)) {
		        	$this->setState(526);

		        	$_la = $this->input->LA(1);

		        	if (!(((($_la) & ~0x3f) === 0 && ((1 << $_la) & 131941395333120) !== 0))) {
		        	$this->errorHandler->recoverInline($this);
		        	} else {
		        		if ($this->input->LA(1) === Token::EOF) {
		        		    $this->matchedEOF = true;
		        	    }

		        		$this->errorHandler->reportMatch($this);
		        		$this->consume();
		        	}
		        	$this->setState(527);
		        	$this->term();
		        	$this->setState(532);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function term(): Context\TermContext
		{
		    $localContext = new Context\TermContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 84, self::RULE_term);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(533);
		        $this->factor();
		        $this->setState(538);
		        $this->errorHandler->sync($this);

		        $alt = $this->getInterpreter()->adaptivePredict($this->input, 64, $this->ctx);

		        while ($alt !== 2 && $alt !== ATN::INVALID_ALT_NUMBER) {
		        	if ($alt === 1) {
		        		$this->setState(534);

		        		$_la = $this->input->LA(1);

		        		if (!($_la === self::PLUS || $_la === self::MINUS)) {
		        		$this->errorHandler->recoverInline($this);
		        		} else {
		        			if ($this->input->LA(1) === Token::EOF) {
		        			    $this->matchedEOF = true;
		        		    }

		        			$this->errorHandler->reportMatch($this);
		        			$this->consume();
		        		}
		        		$this->setState(535);
		        		$this->factor(); 
		        	}

		        	$this->setState(540);
		        	$this->errorHandler->sync($this);

		        	$alt = $this->getInterpreter()->adaptivePredict($this->input, 64, $this->ctx);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function factor(): Context\FactorContext
		{
		    $localContext = new Context\FactorContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 86, self::RULE_factor);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(541);
		        $this->unary();
		        $this->setState(546);
		        $this->errorHandler->sync($this);

		        $alt = $this->getInterpreter()->adaptivePredict($this->input, 65, $this->ctx);

		        while ($alt !== 2 && $alt !== ATN::INVALID_ALT_NUMBER) {
		        	if ($alt === 1) {
		        		$this->setState(542);

		        		$_la = $this->input->LA(1);

		        		if (!(((($_la) & ~0x3f) === 0 && ((1 << $_la) & 3940649673949184) !== 0))) {
		        		$this->errorHandler->recoverInline($this);
		        		} else {
		        			if ($this->input->LA(1) === Token::EOF) {
		        			    $this->matchedEOF = true;
		        		    }

		        			$this->errorHandler->reportMatch($this);
		        			$this->consume();
		        		}
		        		$this->setState(543);
		        		$this->unary(); 
		        	}

		        	$this->setState(548);
		        	$this->errorHandler->sync($this);

		        	$alt = $this->getInterpreter()->adaptivePredict($this->input, 65, $this->ctx);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function unary(): Context\UnaryContext
		{
		    $localContext = new Context\UnaryContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 88, self::RULE_unary);

		    try {
		        $this->setState(556);
		        $this->errorHandler->sync($this);

		        switch ($this->input->LA(1)) {
		            case self::BANG:
		            	$this->enterOuterAlt($localContext, 1);
		            	$this->setState(549);
		            	$this->match(self::BANG);
		            	$this->setState(550);
		            	$this->unary();
		            	break;

		            case self::MINUS:
		            	$this->enterOuterAlt($localContext, 2);
		            	$this->setState(551);
		            	$this->match(self::MINUS);
		            	$this->setState(552);
		            	$this->unary();
		            	break;

		            case self::STAR:
		            	$this->enterOuterAlt($localContext, 3);
		            	$this->setState(553);
		            	$this->match(self::STAR);
		            	$this->setState(554);
		            	$this->unary();
		            	break;

		            case self::T__0:
		            case self::TRUE:
		            case self::FALSE:
		            case self::NIL:
		            case self::ID:
		            case self::FLOAT:
		            case self::INT:
		            case self::STRING:
		            case self::RUNE:
		            	$this->enterOuterAlt($localContext, 4);
		            	$this->setState(555);
		            	$this->primary();
		            	break;

		        default:
		        	throw new NoViableAltException($this);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function primary(): Context\PrimaryContext
		{
		    $localContext = new Context\PrimaryContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 90, self::RULE_primary);

		    try {
		        $this->setState(572);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 67, $this->ctx)) {
		        	case 1:
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(558);
		        	    $this->match(self::T__0);
		        	    $this->setState(559);
		        	    $this->expression();
		        	    $this->setState(560);
		        	    $this->match(self::T__1);
		        	break;

		        	case 2:
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(562);
		        	    $this->functionCall();
		        	break;

		        	case 3:
		        	    $this->enterOuterAlt($localContext, 3);
		        	    $this->setState(563);
		        	    $this->arrayAccess();
		        	break;

		        	case 4:
		        	    $this->enterOuterAlt($localContext, 4);
		        	    $this->setState(564);
		        	    $this->match(self::ID);
		        	break;

		        	case 5:
		        	    $this->enterOuterAlt($localContext, 5);
		        	    $this->setState(565);
		        	    $this->match(self::INT);
		        	break;

		        	case 6:
		        	    $this->enterOuterAlt($localContext, 6);
		        	    $this->setState(566);
		        	    $this->match(self::FLOAT);
		        	break;

		        	case 7:
		        	    $this->enterOuterAlt($localContext, 7);
		        	    $this->setState(567);
		        	    $this->match(self::STRING);
		        	break;

		        	case 8:
		        	    $this->enterOuterAlt($localContext, 8);
		        	    $this->setState(568);
		        	    $this->match(self::RUNE);
		        	break;

		        	case 9:
		        	    $this->enterOuterAlt($localContext, 9);
		        	    $this->setState(569);
		        	    $this->match(self::TRUE);
		        	break;

		        	case 10:
		        	    $this->enterOuterAlt($localContext, 10);
		        	    $this->setState(570);
		        	    $this->match(self::FALSE);
		        	break;

		        	case 11:
		        	    $this->enterOuterAlt($localContext, 11);
		        	    $this->setState(571);
		        	    $this->match(self::NIL);
		        	break;
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function type(): Context\TypeContext
		{
		    $localContext = new Context\TypeContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 92, self::RULE_type);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(574);

		        $_la = $this->input->LA(1);

		        if (!(((($_la) & ~0x3f) === 0 && ((1 << $_la) & 33285996544) !== 0))) {
		        $this->errorHandler->recoverInline($this);
		        } else {
		        	if ($this->input->LA(1) === Token::EOF) {
		        	    $this->matchedEOF = true;
		            }

		        	$this->errorHandler->reportMatch($this);
		        	$this->consume();
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}
	}
}

namespace Context {
	use Antlr\Antlr4\Runtime\ParserRuleContext;
	use Antlr\Antlr4\Runtime\Token;
	use Antlr\Antlr4\Runtime\Tree\ParseTreeVisitor;
	use Antlr\Antlr4\Runtime\Tree\TerminalNode;
	use Antlr\Antlr4\Runtime\Tree\ParseTreeListener;
	use GolampiParser;
	use GolampiVisitor;
	use GolampiListener;

	class ProgramContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_program;
	    }

	    public function EOF(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::EOF, 0);
	    }

	    /**
	     * @return array<FunctionDeclContext>|FunctionDeclContext|null
	     */
	    public function functionDecl(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(FunctionDeclContext::class);
	    	}

	        return $this->getTypedRuleContext(FunctionDeclContext::class, $index);
	    }

	    /**
	     * @return array<VarDeclContext>|VarDeclContext|null
	     */
	    public function varDecl(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(VarDeclContext::class);
	    	}

	        return $this->getTypedRuleContext(VarDeclContext::class, $index);
	    }

	    /**
	     * @return array<ConstDeclContext>|ConstDeclContext|null
	     */
	    public function constDecl(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(ConstDeclContext::class);
	    	}

	        return $this->getTypedRuleContext(ConstDeclContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterProgram($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitProgram($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitProgram($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class FunctionDeclContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_functionDecl;
	    }

	    public function FUNC(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::FUNC, 0);
	    }

	    public function ID(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::ID, 0);
	    }

	    public function block(): ?BlockContext
	    {
	    	return $this->getTypedRuleContext(BlockContext::class, 0);
	    }

	    public function paramList(): ?ParamListContext
	    {
	    	return $this->getTypedRuleContext(ParamListContext::class, 0);
	    }

	    public function returnType(): ?ReturnTypeContext
	    {
	    	return $this->getTypedRuleContext(ReturnTypeContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterFunctionDecl($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitFunctionDecl($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitFunctionDecl($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ParamListContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_paramList;
	    }

	    /**
	     * @return array<ParamContext>|ParamContext|null
	     */
	    public function param(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(ParamContext::class);
	    	}

	        return $this->getTypedRuleContext(ParamContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterParamList($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitParamList($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitParamList($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ParamContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_param;
	    }

	    public function ID(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::ID, 0);
	    }

	    public function type(): ?TypeContext
	    {
	    	return $this->getTypedRuleContext(TypeContext::class, 0);
	    }

	    public function STAR(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::STAR, 0);
	    }

	    public function arrayType(): ?ArrayTypeContext
	    {
	    	return $this->getTypedRuleContext(ArrayTypeContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterParam($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitParam($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitParam($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ReturnTypeContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_returnType;
	    }

	    public function type(): ?TypeContext
	    {
	    	return $this->getTypedRuleContext(TypeContext::class, 0);
	    }

	    public function arrayType(): ?ArrayTypeContext
	    {
	    	return $this->getTypedRuleContext(ArrayTypeContext::class, 0);
	    }

	    public function STAR(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::STAR, 0);
	    }

	    /**
	     * @return array<MultiReturnTypeContext>|MultiReturnTypeContext|null
	     */
	    public function multiReturnType(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(MultiReturnTypeContext::class);
	    	}

	        return $this->getTypedRuleContext(MultiReturnTypeContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterReturnType($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitReturnType($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitReturnType($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class MultiReturnTypeContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_multiReturnType;
	    }

	    public function type(): ?TypeContext
	    {
	    	return $this->getTypedRuleContext(TypeContext::class, 0);
	    }

	    public function arrayType(): ?ArrayTypeContext
	    {
	    	return $this->getTypedRuleContext(ArrayTypeContext::class, 0);
	    }

	    public function STAR(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::STAR, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterMultiReturnType($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitMultiReturnType($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitMultiReturnType($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class BlockContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_block;
	    }

	    /**
	     * @return array<StatementContext>|StatementContext|null
	     */
	    public function statement(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(StatementContext::class);
	    	}

	        return $this->getTypedRuleContext(StatementContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterBlock($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitBlock($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitBlock($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class StatementContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_statement;
	    }

	    public function varDecl(): ?VarDeclContext
	    {
	    	return $this->getTypedRuleContext(VarDeclContext::class, 0);
	    }

	    public function varShortDecl(): ?VarShortDeclContext
	    {
	    	return $this->getTypedRuleContext(VarShortDeclContext::class, 0);
	    }

	    public function constDecl(): ?ConstDeclContext
	    {
	    	return $this->getTypedRuleContext(ConstDeclContext::class, 0);
	    }

	    public function ptrAssign(): ?PtrAssignContext
	    {
	    	return $this->getTypedRuleContext(PtrAssignContext::class, 0);
	    }

	    public function arrayAssign(): ?ArrayAssignContext
	    {
	    	return $this->getTypedRuleContext(ArrayAssignContext::class, 0);
	    }

	    public function assignment(): ?AssignmentContext
	    {
	    	return $this->getTypedRuleContext(AssignmentContext::class, 0);
	    }

	    public function ifStmt(): ?IfStmtContext
	    {
	    	return $this->getTypedRuleContext(IfStmtContext::class, 0);
	    }

	    public function forStmt(): ?ForStmtContext
	    {
	    	return $this->getTypedRuleContext(ForStmtContext::class, 0);
	    }

	    public function switchStmt(): ?SwitchStmtContext
	    {
	    	return $this->getTypedRuleContext(SwitchStmtContext::class, 0);
	    }

	    public function breakStmt(): ?BreakStmtContext
	    {
	    	return $this->getTypedRuleContext(BreakStmtContext::class, 0);
	    }

	    public function continueStmt(): ?ContinueStmtContext
	    {
	    	return $this->getTypedRuleContext(ContinueStmtContext::class, 0);
	    }

	    public function incDecStmt(): ?IncDecStmtContext
	    {
	    	return $this->getTypedRuleContext(IncDecStmtContext::class, 0);
	    }

	    public function returnStmt(): ?ReturnStmtContext
	    {
	    	return $this->getTypedRuleContext(ReturnStmtContext::class, 0);
	    }

	    public function functionCall(): ?FunctionCallContext
	    {
	    	return $this->getTypedRuleContext(FunctionCallContext::class, 0);
	    }

	    public function expression(): ?ExpressionContext
	    {
	    	return $this->getTypedRuleContext(ExpressionContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterStatement($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitStatement($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitStatement($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class VarDeclContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_varDecl;
	    }

	    public function VAR(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::VAR, 0);
	    }

	    public function ID(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::ID, 0);
	    }

	    public function type(): ?TypeContext
	    {
	    	return $this->getTypedRuleContext(TypeContext::class, 0);
	    }

	    public function expression(): ?ExpressionContext
	    {
	    	return $this->getTypedRuleContext(ExpressionContext::class, 0);
	    }

	    public function arrayType(): ?ArrayTypeContext
	    {
	    	return $this->getTypedRuleContext(ArrayTypeContext::class, 0);
	    }

	    public function arrayLiteral(): ?ArrayLiteralContext
	    {
	    	return $this->getTypedRuleContext(ArrayLiteralContext::class, 0);
	    }

	    public function STAR(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::STAR, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterVarDecl($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitVarDecl($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitVarDecl($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class VarShortDeclContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_varShortDecl;
	    }

	    public function idList(): ?IdListContext
	    {
	    	return $this->getTypedRuleContext(IdListContext::class, 0);
	    }

	    public function expList(): ?ExpListContext
	    {
	    	return $this->getTypedRuleContext(ExpListContext::class, 0);
	    }

	    public function ID(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::ID, 0);
	    }

	    public function arrayLiteral(): ?ArrayLiteralContext
	    {
	    	return $this->getTypedRuleContext(ArrayLiteralContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterVarShortDecl($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitVarShortDecl($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitVarShortDecl($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ConstDeclContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_constDecl;
	    }

	    public function CONST(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::CONST, 0);
	    }

	    public function ID(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::ID, 0);
	    }

	    public function type(): ?TypeContext
	    {
	    	return $this->getTypedRuleContext(TypeContext::class, 0);
	    }

	    public function expression(): ?ExpressionContext
	    {
	    	return $this->getTypedRuleContext(ExpressionContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterConstDecl($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitConstDecl($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitConstDecl($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class IdListContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_idList;
	    }

	    /**
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function ID(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(GolampiParser::ID);
	    	}

	        return $this->getToken(GolampiParser::ID, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterIdList($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitIdList($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitIdList($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ExpListContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_expList;
	    }

	    /**
	     * @return array<ExpressionContext>|ExpressionContext|null
	     */
	    public function expression(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(ExpressionContext::class);
	    	}

	        return $this->getTypedRuleContext(ExpressionContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterExpList($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitExpList($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitExpList($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ArrayTypeContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_arrayType;
	    }

	    public function INT(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::INT, 0);
	    }

	    public function type(): ?TypeContext
	    {
	    	return $this->getTypedRuleContext(TypeContext::class, 0);
	    }

	    public function arrayType(): ?ArrayTypeContext
	    {
	    	return $this->getTypedRuleContext(ArrayTypeContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterArrayType($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitArrayType($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitArrayType($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ArrayLiteralContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_arrayLiteral;
	    }

	    public function INT(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::INT, 0);
	    }

	    public function type(): ?TypeContext
	    {
	    	return $this->getTypedRuleContext(TypeContext::class, 0);
	    }

	    public function arrayElements(): ?ArrayElementsContext
	    {
	    	return $this->getTypedRuleContext(ArrayElementsContext::class, 0);
	    }

	    public function arrayType(): ?ArrayTypeContext
	    {
	    	return $this->getTypedRuleContext(ArrayTypeContext::class, 0);
	    }

	    public function arrayRowElements(): ?ArrayRowElementsContext
	    {
	    	return $this->getTypedRuleContext(ArrayRowElementsContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterArrayLiteral($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitArrayLiteral($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitArrayLiteral($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ArrayElementsContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_arrayElements;
	    }

	    /**
	     * @return array<ExpressionContext>|ExpressionContext|null
	     */
	    public function expression(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(ExpressionContext::class);
	    	}

	        return $this->getTypedRuleContext(ExpressionContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterArrayElements($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitArrayElements($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitArrayElements($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ArrayRowElementsContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_arrayRowElements;
	    }

	    /**
	     * @return array<ArrayElementsContext>|ArrayElementsContext|null
	     */
	    public function arrayElements(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(ArrayElementsContext::class);
	    	}

	        return $this->getTypedRuleContext(ArrayElementsContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterArrayRowElements($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitArrayRowElements($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitArrayRowElements($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ArrayAccessContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_arrayAccess;
	    }

	    public function ID(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::ID, 0);
	    }

	    /**
	     * @return array<ExpressionContext>|ExpressionContext|null
	     */
	    public function expression(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(ExpressionContext::class);
	    	}

	        return $this->getTypedRuleContext(ExpressionContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterArrayAccess($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitArrayAccess($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitArrayAccess($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class PtrAssignContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_ptrAssign;
	    }

	    public function STAR(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::STAR, 0);
	    }

	    public function ID(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::ID, 0);
	    }

	    public function assignOp(): ?AssignOpContext
	    {
	    	return $this->getTypedRuleContext(AssignOpContext::class, 0);
	    }

	    public function expression(): ?ExpressionContext
	    {
	    	return $this->getTypedRuleContext(ExpressionContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterPtrAssign($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitPtrAssign($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitPtrAssign($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ArrayAssignContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_arrayAssign;
	    }

	    public function ID(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::ID, 0);
	    }

	    public function assignOp(): ?AssignOpContext
	    {
	    	return $this->getTypedRuleContext(AssignOpContext::class, 0);
	    }

	    /**
	     * @return array<ExpressionContext>|ExpressionContext|null
	     */
	    public function expression(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(ExpressionContext::class);
	    	}

	        return $this->getTypedRuleContext(ExpressionContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterArrayAssign($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitArrayAssign($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitArrayAssign($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class AssignmentContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_assignment;
	    }

	    public function ID(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::ID, 0);
	    }

	    public function assignOp(): ?AssignOpContext
	    {
	    	return $this->getTypedRuleContext(AssignOpContext::class, 0);
	    }

	    public function expression(): ?ExpressionContext
	    {
	    	return $this->getTypedRuleContext(ExpressionContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterAssignment($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitAssignment($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitAssignment($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class AssignOpContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_assignOp;
	    }

	    public function ADD_ASSIGN(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::ADD_ASSIGN, 0);
	    }

	    public function SUB_ASSIGN(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::SUB_ASSIGN, 0);
	    }

	    public function MUL_ASSIGN(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::MUL_ASSIGN, 0);
	    }

	    public function DIV_ASSIGN(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::DIV_ASSIGN, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterAssignOp($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitAssignOp($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitAssignOp($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class IfStmtContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_ifStmt;
	    }

	    public function IF(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::IF, 0);
	    }

	    public function expression(): ?ExpressionContext
	    {
	    	return $this->getTypedRuleContext(ExpressionContext::class, 0);
	    }

	    /**
	     * @return array<BlockContext>|BlockContext|null
	     */
	    public function block(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(BlockContext::class);
	    	}

	        return $this->getTypedRuleContext(BlockContext::class, $index);
	    }

	    public function ELSE(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::ELSE, 0);
	    }

	    public function ifStmt(): ?IfStmtContext
	    {
	    	return $this->getTypedRuleContext(IfStmtContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterIfStmt($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitIfStmt($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitIfStmt($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ForStmtContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_forStmt;
	    }

	    public function FOR(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::FOR, 0);
	    }

	    public function forInit(): ?ForInitContext
	    {
	    	return $this->getTypedRuleContext(ForInitContext::class, 0);
	    }

	    public function expression(): ?ExpressionContext
	    {
	    	return $this->getTypedRuleContext(ExpressionContext::class, 0);
	    }

	    public function forPost(): ?ForPostContext
	    {
	    	return $this->getTypedRuleContext(ForPostContext::class, 0);
	    }

	    public function block(): ?BlockContext
	    {
	    	return $this->getTypedRuleContext(BlockContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterForStmt($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitForStmt($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitForStmt($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ForInitContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_forInit;
	    }

	    public function ID(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::ID, 0);
	    }

	    public function expression(): ?ExpressionContext
	    {
	    	return $this->getTypedRuleContext(ExpressionContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterForInit($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitForInit($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitForInit($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ForPostContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_forPost;
	    }

	    public function ID(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::ID, 0);
	    }

	    public function expression(): ?ExpressionContext
	    {
	    	return $this->getTypedRuleContext(ExpressionContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterForPost($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitForPost($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitForPost($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class SwitchStmtContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_switchStmt;
	    }

	    public function SWITCH(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::SWITCH, 0);
	    }

	    public function expression(): ?ExpressionContext
	    {
	    	return $this->getTypedRuleContext(ExpressionContext::class, 0);
	    }

	    /**
	     * @return array<CaseClauseContext>|CaseClauseContext|null
	     */
	    public function caseClause(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(CaseClauseContext::class);
	    	}

	        return $this->getTypedRuleContext(CaseClauseContext::class, $index);
	    }

	    public function defaultClause(): ?DefaultClauseContext
	    {
	    	return $this->getTypedRuleContext(DefaultClauseContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterSwitchStmt($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitSwitchStmt($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitSwitchStmt($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class CaseClauseContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_caseClause;
	    }

	    public function CASE(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::CASE, 0);
	    }

	    public function expList(): ?ExpListContext
	    {
	    	return $this->getTypedRuleContext(ExpListContext::class, 0);
	    }

	    /**
	     * @return array<StatementContext>|StatementContext|null
	     */
	    public function statement(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(StatementContext::class);
	    	}

	        return $this->getTypedRuleContext(StatementContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterCaseClause($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitCaseClause($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitCaseClause($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class DefaultClauseContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_defaultClause;
	    }

	    public function DEFAULT(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::DEFAULT, 0);
	    }

	    /**
	     * @return array<StatementContext>|StatementContext|null
	     */
	    public function statement(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(StatementContext::class);
	    	}

	        return $this->getTypedRuleContext(StatementContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterDefaultClause($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitDefaultClause($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitDefaultClause($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class BreakStmtContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_breakStmt;
	    }

	    public function BREAK(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::BREAK, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterBreakStmt($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitBreakStmt($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitBreakStmt($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ContinueStmtContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_continueStmt;
	    }

	    public function CONTINUE(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::CONTINUE, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterContinueStmt($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitContinueStmt($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitContinueStmt($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class IncDecStmtContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_incDecStmt;
	    }

	    public function ID(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::ID, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterIncDecStmt($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitIncDecStmt($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitIncDecStmt($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ReturnStmtContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_returnStmt;
	    }

	    public function RETURN(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::RETURN, 0);
	    }

	    public function expList(): ?ExpListContext
	    {
	    	return $this->getTypedRuleContext(ExpListContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterReturnStmt($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitReturnStmt($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitReturnStmt($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class FunctionCallContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_functionCall;
	    }

	    public function qualifiedName(): ?QualifiedNameContext
	    {
	    	return $this->getTypedRuleContext(QualifiedNameContext::class, 0);
	    }

	    public function argList(): ?ArgListContext
	    {
	    	return $this->getTypedRuleContext(ArgListContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterFunctionCall($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitFunctionCall($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitFunctionCall($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class QualifiedNameContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_qualifiedName;
	    }

	    /**
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function ID(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(GolampiParser::ID);
	    	}

	        return $this->getToken(GolampiParser::ID, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterQualifiedName($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitQualifiedName($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitQualifiedName($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ArgListContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_argList;
	    }

	    /**
	     * @return array<ArgItemContext>|ArgItemContext|null
	     */
	    public function argItem(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(ArgItemContext::class);
	    	}

	        return $this->getTypedRuleContext(ArgItemContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterArgList($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitArgList($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitArgList($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ArgItemContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_argItem;
	    }

	    public function REF(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::REF, 0);
	    }

	    public function ID(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::ID, 0);
	    }

	    public function expression(): ?ExpressionContext
	    {
	    	return $this->getTypedRuleContext(ExpressionContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterArgItem($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitArgItem($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitArgItem($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ExpressionContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_expression;
	    }

	    public function logicalOr(): ?LogicalOrContext
	    {
	    	return $this->getTypedRuleContext(LogicalOrContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterExpression($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitExpression($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitExpression($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class LogicalOrContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_logicalOr;
	    }

	    /**
	     * @return array<LogicalAndContext>|LogicalAndContext|null
	     */
	    public function logicalAnd(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(LogicalAndContext::class);
	    	}

	        return $this->getTypedRuleContext(LogicalAndContext::class, $index);
	    }

	    /**
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function OR(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(GolampiParser::OR);
	    	}

	        return $this->getToken(GolampiParser::OR, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterLogicalOr($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitLogicalOr($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitLogicalOr($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class LogicalAndContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_logicalAnd;
	    }

	    /**
	     * @return array<EqualityContext>|EqualityContext|null
	     */
	    public function equality(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(EqualityContext::class);
	    	}

	        return $this->getTypedRuleContext(EqualityContext::class, $index);
	    }

	    /**
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function AND(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(GolampiParser::AND);
	    	}

	        return $this->getToken(GolampiParser::AND, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterLogicalAnd($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitLogicalAnd($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitLogicalAnd($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class EqualityContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_equality;
	    }

	    /**
	     * @return array<ComparisonContext>|ComparisonContext|null
	     */
	    public function comparison(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(ComparisonContext::class);
	    	}

	        return $this->getTypedRuleContext(ComparisonContext::class, $index);
	    }

	    /**
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function EQ(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(GolampiParser::EQ);
	    	}

	        return $this->getToken(GolampiParser::EQ, $index);
	    }

	    /**
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function NEQ(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(GolampiParser::NEQ);
	    	}

	        return $this->getToken(GolampiParser::NEQ, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterEquality($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitEquality($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitEquality($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ComparisonContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_comparison;
	    }

	    /**
	     * @return array<TermContext>|TermContext|null
	     */
	    public function term(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(TermContext::class);
	    	}

	        return $this->getTypedRuleContext(TermContext::class, $index);
	    }

	    /**
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function GTE(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(GolampiParser::GTE);
	    	}

	        return $this->getToken(GolampiParser::GTE, $index);
	    }

	    /**
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function LTE(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(GolampiParser::LTE);
	    	}

	        return $this->getToken(GolampiParser::LTE, $index);
	    }

	    /**
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function GT(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(GolampiParser::GT);
	    	}

	        return $this->getToken(GolampiParser::GT, $index);
	    }

	    /**
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function LT(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(GolampiParser::LT);
	    	}

	        return $this->getToken(GolampiParser::LT, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterComparison($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitComparison($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitComparison($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class TermContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_term;
	    }

	    /**
	     * @return array<FactorContext>|FactorContext|null
	     */
	    public function factor(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(FactorContext::class);
	    	}

	        return $this->getTypedRuleContext(FactorContext::class, $index);
	    }

	    /**
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function PLUS(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(GolampiParser::PLUS);
	    	}

	        return $this->getToken(GolampiParser::PLUS, $index);
	    }

	    /**
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function MINUS(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(GolampiParser::MINUS);
	    	}

	        return $this->getToken(GolampiParser::MINUS, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterTerm($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitTerm($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitTerm($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class FactorContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_factor;
	    }

	    /**
	     * @return array<UnaryContext>|UnaryContext|null
	     */
	    public function unary(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(UnaryContext::class);
	    	}

	        return $this->getTypedRuleContext(UnaryContext::class, $index);
	    }

	    /**
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function STAR(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(GolampiParser::STAR);
	    	}

	        return $this->getToken(GolampiParser::STAR, $index);
	    }

	    /**
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function SLASH(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(GolampiParser::SLASH);
	    	}

	        return $this->getToken(GolampiParser::SLASH, $index);
	    }

	    /**
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function MOD(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(GolampiParser::MOD);
	    	}

	        return $this->getToken(GolampiParser::MOD, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterFactor($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitFactor($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitFactor($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class UnaryContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_unary;
	    }

	    public function BANG(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::BANG, 0);
	    }

	    public function unary(): ?UnaryContext
	    {
	    	return $this->getTypedRuleContext(UnaryContext::class, 0);
	    }

	    public function MINUS(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::MINUS, 0);
	    }

	    public function STAR(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::STAR, 0);
	    }

	    public function primary(): ?PrimaryContext
	    {
	    	return $this->getTypedRuleContext(PrimaryContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterUnary($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitUnary($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitUnary($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class PrimaryContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_primary;
	    }

	    public function expression(): ?ExpressionContext
	    {
	    	return $this->getTypedRuleContext(ExpressionContext::class, 0);
	    }

	    public function functionCall(): ?FunctionCallContext
	    {
	    	return $this->getTypedRuleContext(FunctionCallContext::class, 0);
	    }

	    public function arrayAccess(): ?ArrayAccessContext
	    {
	    	return $this->getTypedRuleContext(ArrayAccessContext::class, 0);
	    }

	    public function ID(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::ID, 0);
	    }

	    public function INT(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::INT, 0);
	    }

	    public function FLOAT(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::FLOAT, 0);
	    }

	    public function STRING(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::STRING, 0);
	    }

	    public function RUNE(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::RUNE, 0);
	    }

	    public function TRUE(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::TRUE, 0);
	    }

	    public function FALSE(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::FALSE, 0);
	    }

	    public function NIL(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::NIL, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterPrimary($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitPrimary($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitPrimary($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class TypeContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_type;
	    }

	    public function INT_TYPE(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::INT_TYPE, 0);
	    }

	    public function FLOAT_TYPE(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::FLOAT_TYPE, 0);
	    }

	    public function STRING_TYPE(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::STRING_TYPE, 0);
	    }

	    public function BOOL_TYPE(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::BOOL_TYPE, 0);
	    }

	    public function RUNE_TYPE(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::RUNE_TYPE, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterType($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitType($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitType($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 
}