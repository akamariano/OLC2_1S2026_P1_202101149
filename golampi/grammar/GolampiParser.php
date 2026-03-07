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
               RULE_sliceType = 6, RULE_block = 7, RULE_statement = 8, RULE_varDecl = 9, 
               RULE_varShortDecl = 10, RULE_constDecl = 11, RULE_idList = 12, 
               RULE_expList = 13, RULE_arrayType = 14, RULE_arrayLiteral = 15, 
               RULE_arrayElements = 16, RULE_arrayRowElements = 17, RULE_arrayAccess = 18, 
               RULE_ptrAssign = 19, RULE_arrayAssign = 20, RULE_assignment = 21, 
               RULE_assignOp = 22, RULE_ifStmt = 23, RULE_forStmt = 24, 
               RULE_forInit = 25, RULE_forPost = 26, RULE_switchStmt = 27, 
               RULE_caseClause = 28, RULE_defaultClause = 29, RULE_breakStmt = 30, 
               RULE_continueStmt = 31, RULE_incDecStmt = 32, RULE_returnStmt = 33, 
               RULE_functionCall = 34, RULE_qualifiedName = 35, RULE_argList = 36, 
               RULE_argItem = 37, RULE_expression = 38, RULE_logicalOr = 39, 
               RULE_logicalAnd = 40, RULE_equality = 41, RULE_comparison = 42, 
               RULE_term = 43, RULE_factor = 44, RULE_unary = 45, RULE_primary = 46, 
               RULE_type = 47;

		/**
		 * @var array<string>
		 */
		public const RULE_NAMES = [
			'program', 'functionDecl', 'paramList', 'param', 'returnType', 'multiReturnType', 
			'sliceType', 'block', 'statement', 'varDecl', 'varShortDecl', 'constDecl', 
			'idList', 'expList', 'arrayType', 'arrayLiteral', 'arrayElements', 'arrayRowElements', 
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
		    null, "'('", "')'", "','", "'['", "']'", "'{'", "'}'", "';'", "'='", 
		    "':='", "'++'", "'--'", "':'", "'.'", "'func'", "'var'", "'const'", 
		    "'if'", "'else'", "'for'", "'switch'", "'case'", "'default'", "'break'", 
		    "'continue'", "'return'", "'true'", "'false'", "'nil'", "'int32'", 
		    "'float32'", "'string'", "'bool'", "'rune'", "'+='", "'-='", "'*='", 
		    "'/='", "'||'", "'&&'", "'=='", "'!='", "'>='", "'<='", "'>'", "'<'", 
		    "'+'", "'-'", "'*'", "'/'", "'%'", "'!'", "'&'"
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
			[4, 1, 61, 614, 2, 0, 7, 0, 2, 1, 7, 1, 2, 2, 7, 2, 2, 3, 7, 3, 2, 4, 
		    7, 4, 2, 5, 7, 5, 2, 6, 7, 6, 2, 7, 7, 7, 2, 8, 7, 8, 2, 9, 7, 9, 
		    2, 10, 7, 10, 2, 11, 7, 11, 2, 12, 7, 12, 2, 13, 7, 13, 2, 14, 7, 
		    14, 2, 15, 7, 15, 2, 16, 7, 16, 2, 17, 7, 17, 2, 18, 7, 18, 2, 19, 
		    7, 19, 2, 20, 7, 20, 2, 21, 7, 21, 2, 22, 7, 22, 2, 23, 7, 23, 2, 
		    24, 7, 24, 2, 25, 7, 25, 2, 26, 7, 26, 2, 27, 7, 27, 2, 28, 7, 28, 
		    2, 29, 7, 29, 2, 30, 7, 30, 2, 31, 7, 31, 2, 32, 7, 32, 2, 33, 7, 
		    33, 2, 34, 7, 34, 2, 35, 7, 35, 2, 36, 7, 36, 2, 37, 7, 37, 2, 38, 
		    7, 38, 2, 39, 7, 39, 2, 40, 7, 40, 2, 41, 7, 41, 2, 42, 7, 42, 2, 
		    43, 7, 43, 2, 44, 7, 44, 2, 45, 7, 45, 2, 46, 7, 46, 2, 47, 7, 47, 
		    1, 0, 1, 0, 1, 0, 4, 0, 100, 8, 0, 11, 0, 12, 0, 101, 1, 0, 1, 0, 
		    1, 1, 1, 1, 1, 1, 1, 1, 3, 1, 110, 8, 1, 1, 1, 1, 1, 3, 1, 114, 8, 
		    1, 1, 1, 1, 1, 1, 2, 1, 2, 1, 2, 5, 2, 121, 8, 2, 10, 2, 12, 2, 124, 
		    9, 2, 1, 3, 1, 3, 1, 3, 1, 3, 1, 3, 1, 3, 1, 3, 1, 3, 1, 3, 1, 3, 
		    1, 3, 1, 3, 1, 3, 1, 3, 1, 3, 3, 3, 141, 8, 3, 1, 4, 1, 4, 1, 4, 1, 
		    4, 1, 4, 1, 4, 1, 4, 1, 4, 1, 4, 1, 4, 1, 4, 1, 4, 1, 4, 5, 4, 156, 
		    8, 4, 10, 4, 12, 4, 159, 9, 4, 1, 4, 1, 4, 3, 4, 163, 8, 4, 1, 5, 
		    1, 5, 1, 5, 1, 5, 1, 5, 1, 5, 1, 5, 1, 5, 1, 5, 3, 5, 174, 8, 5, 1, 
		    6, 1, 6, 1, 6, 1, 6, 1, 7, 1, 7, 5, 7, 182, 8, 7, 10, 7, 12, 7, 185, 
		    9, 7, 1, 7, 1, 7, 1, 8, 1, 8, 1, 8, 1, 8, 1, 8, 1, 8, 1, 8, 1, 8, 
		    1, 8, 1, 8, 1, 8, 1, 8, 1, 8, 1, 8, 1, 8, 3, 8, 204, 8, 8, 1, 8, 1, 
		    8, 3, 8, 208, 8, 8, 3, 8, 210, 8, 8, 1, 9, 1, 9, 1, 9, 1, 9, 1, 9, 
		    3, 9, 217, 8, 9, 1, 9, 3, 9, 220, 8, 9, 1, 9, 1, 9, 1, 9, 1, 9, 1, 
		    9, 1, 9, 3, 9, 228, 8, 9, 1, 9, 1, 9, 1, 9, 1, 9, 1, 9, 3, 9, 235, 
		    8, 9, 1, 9, 3, 9, 238, 8, 9, 1, 9, 1, 9, 1, 9, 1, 9, 1, 9, 1, 9, 3, 
		    9, 246, 8, 9, 1, 9, 1, 9, 1, 9, 1, 9, 1, 9, 3, 9, 253, 8, 9, 1, 9, 
		    1, 9, 1, 9, 1, 9, 1, 9, 3, 9, 260, 8, 9, 3, 9, 262, 8, 9, 1, 10, 1, 
		    10, 1, 10, 1, 10, 3, 10, 268, 8, 10, 1, 10, 1, 10, 1, 10, 1, 10, 3, 
		    10, 274, 8, 10, 3, 10, 276, 8, 10, 1, 11, 1, 11, 1, 11, 1, 11, 1, 
		    11, 1, 11, 3, 11, 284, 8, 11, 1, 12, 1, 12, 1, 12, 5, 12, 289, 8, 
		    12, 10, 12, 12, 12, 292, 9, 12, 1, 13, 1, 13, 1, 13, 5, 13, 297, 8, 
		    13, 10, 13, 12, 13, 300, 9, 13, 1, 14, 1, 14, 1, 14, 1, 14, 1, 14, 
		    1, 14, 1, 14, 1, 14, 3, 14, 310, 8, 14, 1, 15, 1, 15, 1, 15, 1, 15, 
		    1, 15, 1, 15, 3, 15, 318, 8, 15, 1, 15, 1, 15, 1, 15, 1, 15, 1, 15, 
		    1, 15, 1, 15, 1, 15, 3, 15, 328, 8, 15, 1, 15, 1, 15, 1, 15, 1, 15, 
		    1, 15, 1, 15, 1, 15, 3, 15, 337, 8, 15, 1, 15, 1, 15, 3, 15, 341, 
		    8, 15, 1, 16, 1, 16, 1, 16, 5, 16, 346, 8, 16, 10, 16, 12, 16, 349, 
		    9, 16, 1, 17, 1, 17, 3, 17, 353, 8, 17, 1, 17, 1, 17, 1, 17, 1, 17, 
		    3, 17, 359, 8, 17, 1, 17, 5, 17, 362, 8, 17, 10, 17, 12, 17, 365, 
		    9, 17, 1, 17, 3, 17, 368, 8, 17, 1, 18, 1, 18, 1, 18, 1, 18, 1, 18, 
		    4, 18, 375, 8, 18, 11, 18, 12, 18, 376, 1, 19, 1, 19, 1, 19, 1, 19, 
		    1, 19, 3, 19, 384, 8, 19, 1, 20, 1, 20, 1, 20, 1, 20, 1, 20, 4, 20, 
		    391, 8, 20, 11, 20, 12, 20, 392, 1, 20, 1, 20, 1, 20, 3, 20, 398, 
		    8, 20, 1, 21, 1, 21, 1, 21, 1, 21, 3, 21, 404, 8, 21, 1, 22, 1, 22, 
		    1, 23, 1, 23, 1, 23, 1, 23, 1, 23, 1, 23, 3, 23, 414, 8, 23, 3, 23, 
		    416, 8, 23, 1, 24, 1, 24, 1, 24, 1, 24, 1, 24, 1, 24, 1, 24, 1, 24, 
		    1, 24, 1, 24, 1, 24, 1, 24, 1, 24, 1, 24, 3, 24, 432, 8, 24, 1, 25, 
		    1, 25, 1, 25, 1, 25, 1, 25, 1, 25, 3, 25, 440, 8, 25, 1, 26, 1, 26, 
		    1, 26, 1, 26, 1, 26, 1, 26, 1, 26, 3, 26, 449, 8, 26, 1, 27, 1, 27, 
		    1, 27, 1, 27, 5, 27, 455, 8, 27, 10, 27, 12, 27, 458, 9, 27, 1, 27, 
		    3, 27, 461, 8, 27, 1, 27, 1, 27, 1, 28, 1, 28, 1, 28, 1, 28, 5, 28, 
		    469, 8, 28, 10, 28, 12, 28, 472, 9, 28, 1, 29, 1, 29, 1, 29, 5, 29, 
		    477, 8, 29, 10, 29, 12, 29, 480, 9, 29, 1, 30, 1, 30, 3, 30, 484, 
		    8, 30, 1, 31, 1, 31, 3, 31, 488, 8, 31, 1, 32, 1, 32, 1, 32, 3, 32, 
		    493, 8, 32, 1, 32, 1, 32, 1, 32, 3, 32, 498, 8, 32, 3, 32, 500, 8, 
		    32, 1, 33, 1, 33, 3, 33, 504, 8, 33, 1, 33, 3, 33, 507, 8, 33, 1, 
		    34, 1, 34, 1, 34, 3, 34, 512, 8, 34, 1, 34, 1, 34, 1, 35, 1, 35, 1, 
		    35, 5, 35, 519, 8, 35, 10, 35, 12, 35, 522, 9, 35, 1, 36, 1, 36, 1, 
		    36, 5, 36, 527, 8, 36, 10, 36, 12, 36, 530, 9, 36, 1, 37, 1, 37, 1, 
		    37, 3, 37, 535, 8, 37, 1, 38, 1, 38, 1, 39, 1, 39, 1, 39, 5, 39, 542, 
		    8, 39, 10, 39, 12, 39, 545, 9, 39, 1, 40, 1, 40, 1, 40, 5, 40, 550, 
		    8, 40, 10, 40, 12, 40, 553, 9, 40, 1, 41, 1, 41, 1, 41, 5, 41, 558, 
		    8, 41, 10, 41, 12, 41, 561, 9, 41, 1, 42, 1, 42, 1, 42, 5, 42, 566, 
		    8, 42, 10, 42, 12, 42, 569, 9, 42, 1, 43, 1, 43, 1, 43, 5, 43, 574, 
		    8, 43, 10, 43, 12, 43, 577, 9, 43, 1, 44, 1, 44, 1, 44, 5, 44, 582, 
		    8, 44, 10, 44, 12, 44, 585, 9, 44, 1, 45, 1, 45, 1, 45, 1, 45, 1, 
		    45, 1, 45, 1, 45, 3, 45, 594, 8, 45, 1, 46, 1, 46, 1, 46, 1, 46, 1, 
		    46, 1, 46, 1, 46, 1, 46, 1, 46, 1, 46, 1, 46, 1, 46, 1, 46, 1, 46, 
		    3, 46, 610, 8, 46, 1, 47, 1, 47, 1, 47, 0, 0, 48, 0, 2, 4, 6, 8, 10, 
		    12, 14, 16, 18, 20, 22, 24, 26, 28, 30, 32, 34, 36, 38, 40, 42, 44, 
		    46, 48, 50, 52, 54, 56, 58, 60, 62, 64, 66, 68, 70, 72, 74, 76, 78, 
		    80, 82, 84, 86, 88, 90, 92, 94, 0, 6, 2, 0, 9, 9, 35, 38, 1, 0, 41, 
		    42, 1, 0, 43, 46, 1, 0, 47, 48, 1, 0, 49, 51, 1, 0, 30, 34, 681, 0, 
		    99, 1, 0, 0, 0, 2, 105, 1, 0, 0, 0, 4, 117, 1, 0, 0, 0, 6, 140, 1, 
		    0, 0, 0, 8, 162, 1, 0, 0, 0, 10, 173, 1, 0, 0, 0, 12, 175, 1, 0, 0, 
		    0, 14, 179, 1, 0, 0, 0, 16, 209, 1, 0, 0, 0, 18, 261, 1, 0, 0, 0, 
		    20, 275, 1, 0, 0, 0, 22, 277, 1, 0, 0, 0, 24, 285, 1, 0, 0, 0, 26, 
		    293, 1, 0, 0, 0, 28, 309, 1, 0, 0, 0, 30, 340, 1, 0, 0, 0, 32, 342, 
		    1, 0, 0, 0, 34, 350, 1, 0, 0, 0, 36, 369, 1, 0, 0, 0, 38, 378, 1, 
		    0, 0, 0, 40, 385, 1, 0, 0, 0, 42, 399, 1, 0, 0, 0, 44, 405, 1, 0, 
		    0, 0, 46, 407, 1, 0, 0, 0, 48, 431, 1, 0, 0, 0, 50, 439, 1, 0, 0, 
		    0, 52, 448, 1, 0, 0, 0, 54, 450, 1, 0, 0, 0, 56, 464, 1, 0, 0, 0, 
		    58, 473, 1, 0, 0, 0, 60, 481, 1, 0, 0, 0, 62, 485, 1, 0, 0, 0, 64, 
		    499, 1, 0, 0, 0, 66, 501, 1, 0, 0, 0, 68, 508, 1, 0, 0, 0, 70, 515, 
		    1, 0, 0, 0, 72, 523, 1, 0, 0, 0, 74, 534, 1, 0, 0, 0, 76, 536, 1, 
		    0, 0, 0, 78, 538, 1, 0, 0, 0, 80, 546, 1, 0, 0, 0, 82, 554, 1, 0, 
		    0, 0, 84, 562, 1, 0, 0, 0, 86, 570, 1, 0, 0, 0, 88, 578, 1, 0, 0, 
		    0, 90, 593, 1, 0, 0, 0, 92, 609, 1, 0, 0, 0, 94, 611, 1, 0, 0, 0, 
		    96, 100, 3, 2, 1, 0, 97, 100, 3, 18, 9, 0, 98, 100, 3, 22, 11, 0, 
		    99, 96, 1, 0, 0, 0, 99, 97, 1, 0, 0, 0, 99, 98, 1, 0, 0, 0, 100, 101, 
		    1, 0, 0, 0, 101, 99, 1, 0, 0, 0, 101, 102, 1, 0, 0, 0, 102, 103, 1, 
		    0, 0, 0, 103, 104, 5, 0, 0, 1, 104, 1, 1, 0, 0, 0, 105, 106, 5, 15, 
		    0, 0, 106, 107, 5, 54, 0, 0, 107, 109, 5, 1, 0, 0, 108, 110, 3, 4, 
		    2, 0, 109, 108, 1, 0, 0, 0, 109, 110, 1, 0, 0, 0, 110, 111, 1, 0, 
		    0, 0, 111, 113, 5, 2, 0, 0, 112, 114, 3, 8, 4, 0, 113, 112, 1, 0, 
		    0, 0, 113, 114, 1, 0, 0, 0, 114, 115, 1, 0, 0, 0, 115, 116, 3, 14, 
		    7, 0, 116, 3, 1, 0, 0, 0, 117, 122, 3, 6, 3, 0, 118, 119, 5, 3, 0, 
		    0, 119, 121, 3, 6, 3, 0, 120, 118, 1, 0, 0, 0, 121, 124, 1, 0, 0, 
		    0, 122, 120, 1, 0, 0, 0, 122, 123, 1, 0, 0, 0, 123, 5, 1, 0, 0, 0, 
		    124, 122, 1, 0, 0, 0, 125, 126, 5, 54, 0, 0, 126, 141, 3, 94, 47, 
		    0, 127, 128, 5, 54, 0, 0, 128, 129, 5, 49, 0, 0, 129, 141, 3, 94, 
		    47, 0, 130, 131, 5, 54, 0, 0, 131, 132, 5, 49, 0, 0, 132, 141, 3, 
		    28, 14, 0, 133, 134, 5, 54, 0, 0, 134, 135, 5, 49, 0, 0, 135, 141, 
		    3, 12, 6, 0, 136, 137, 5, 54, 0, 0, 137, 141, 3, 28, 14, 0, 138, 139, 
		    5, 54, 0, 0, 139, 141, 3, 12, 6, 0, 140, 125, 1, 0, 0, 0, 140, 127, 
		    1, 0, 0, 0, 140, 130, 1, 0, 0, 0, 140, 133, 1, 0, 0, 0, 140, 136, 
		    1, 0, 0, 0, 140, 138, 1, 0, 0, 0, 141, 7, 1, 0, 0, 0, 142, 163, 3, 
		    94, 47, 0, 143, 163, 3, 28, 14, 0, 144, 163, 3, 12, 6, 0, 145, 146, 
		    5, 49, 0, 0, 146, 163, 3, 94, 47, 0, 147, 148, 5, 49, 0, 0, 148, 163, 
		    3, 28, 14, 0, 149, 150, 5, 49, 0, 0, 150, 163, 3, 12, 6, 0, 151, 152, 
		    5, 1, 0, 0, 152, 157, 3, 10, 5, 0, 153, 154, 5, 3, 0, 0, 154, 156, 
		    3, 10, 5, 0, 155, 153, 1, 0, 0, 0, 156, 159, 1, 0, 0, 0, 157, 155, 
		    1, 0, 0, 0, 157, 158, 1, 0, 0, 0, 158, 160, 1, 0, 0, 0, 159, 157, 
		    1, 0, 0, 0, 160, 161, 5, 2, 0, 0, 161, 163, 1, 0, 0, 0, 162, 142, 
		    1, 0, 0, 0, 162, 143, 1, 0, 0, 0, 162, 144, 1, 0, 0, 0, 162, 145, 
		    1, 0, 0, 0, 162, 147, 1, 0, 0, 0, 162, 149, 1, 0, 0, 0, 162, 151, 
		    1, 0, 0, 0, 163, 9, 1, 0, 0, 0, 164, 174, 3, 94, 47, 0, 165, 174, 
		    3, 28, 14, 0, 166, 174, 3, 12, 6, 0, 167, 168, 5, 49, 0, 0, 168, 174, 
		    3, 94, 47, 0, 169, 170, 5, 49, 0, 0, 170, 174, 3, 28, 14, 0, 171, 
		    172, 5, 49, 0, 0, 172, 174, 3, 12, 6, 0, 173, 164, 1, 0, 0, 0, 173, 
		    165, 1, 0, 0, 0, 173, 166, 1, 0, 0, 0, 173, 167, 1, 0, 0, 0, 173, 
		    169, 1, 0, 0, 0, 173, 171, 1, 0, 0, 0, 174, 11, 1, 0, 0, 0, 175, 176, 
		    5, 4, 0, 0, 176, 177, 5, 5, 0, 0, 177, 178, 3, 94, 47, 0, 178, 13, 
		    1, 0, 0, 0, 179, 183, 5, 6, 0, 0, 180, 182, 3, 16, 8, 0, 181, 180, 
		    1, 0, 0, 0, 182, 185, 1, 0, 0, 0, 183, 181, 1, 0, 0, 0, 183, 184, 
		    1, 0, 0, 0, 184, 186, 1, 0, 0, 0, 185, 183, 1, 0, 0, 0, 186, 187, 
		    5, 7, 0, 0, 187, 15, 1, 0, 0, 0, 188, 210, 3, 18, 9, 0, 189, 210, 
		    3, 20, 10, 0, 190, 210, 3, 22, 11, 0, 191, 210, 3, 38, 19, 0, 192, 
		    210, 3, 40, 20, 0, 193, 210, 3, 42, 21, 0, 194, 210, 3, 46, 23, 0, 
		    195, 210, 3, 48, 24, 0, 196, 210, 3, 54, 27, 0, 197, 210, 3, 60, 30, 
		    0, 198, 210, 3, 62, 31, 0, 199, 210, 3, 64, 32, 0, 200, 210, 3, 66, 
		    33, 0, 201, 203, 3, 68, 34, 0, 202, 204, 5, 8, 0, 0, 203, 202, 1, 
		    0, 0, 0, 203, 204, 1, 0, 0, 0, 204, 210, 1, 0, 0, 0, 205, 207, 3, 
		    76, 38, 0, 206, 208, 5, 8, 0, 0, 207, 206, 1, 0, 0, 0, 207, 208, 1, 
		    0, 0, 0, 208, 210, 1, 0, 0, 0, 209, 188, 1, 0, 0, 0, 209, 189, 1, 
		    0, 0, 0, 209, 190, 1, 0, 0, 0, 209, 191, 1, 0, 0, 0, 209, 192, 1, 
		    0, 0, 0, 209, 193, 1, 0, 0, 0, 209, 194, 1, 0, 0, 0, 209, 195, 1, 
		    0, 0, 0, 209, 196, 1, 0, 0, 0, 209, 197, 1, 0, 0, 0, 209, 198, 1, 
		    0, 0, 0, 209, 199, 1, 0, 0, 0, 209, 200, 1, 0, 0, 0, 209, 201, 1, 
		    0, 0, 0, 209, 205, 1, 0, 0, 0, 210, 17, 1, 0, 0, 0, 211, 212, 5, 16, 
		    0, 0, 212, 213, 5, 54, 0, 0, 213, 216, 3, 94, 47, 0, 214, 215, 5, 
		    9, 0, 0, 215, 217, 3, 76, 38, 0, 216, 214, 1, 0, 0, 0, 216, 217, 1, 
		    0, 0, 0, 217, 219, 1, 0, 0, 0, 218, 220, 5, 8, 0, 0, 219, 218, 1, 
		    0, 0, 0, 219, 220, 1, 0, 0, 0, 220, 262, 1, 0, 0, 0, 221, 222, 5, 
		    16, 0, 0, 222, 223, 3, 24, 12, 0, 223, 224, 3, 94, 47, 0, 224, 225, 
		    5, 9, 0, 0, 225, 227, 3, 26, 13, 0, 226, 228, 5, 8, 0, 0, 227, 226, 
		    1, 0, 0, 0, 227, 228, 1, 0, 0, 0, 228, 262, 1, 0, 0, 0, 229, 230, 
		    5, 16, 0, 0, 230, 231, 5, 54, 0, 0, 231, 234, 3, 28, 14, 0, 232, 233, 
		    5, 9, 0, 0, 233, 235, 3, 30, 15, 0, 234, 232, 1, 0, 0, 0, 234, 235, 
		    1, 0, 0, 0, 235, 237, 1, 0, 0, 0, 236, 238, 5, 8, 0, 0, 237, 236, 
		    1, 0, 0, 0, 237, 238, 1, 0, 0, 0, 238, 262, 1, 0, 0, 0, 239, 240, 
		    5, 16, 0, 0, 240, 241, 5, 54, 0, 0, 241, 242, 3, 28, 14, 0, 242, 243, 
		    5, 9, 0, 0, 243, 245, 3, 76, 38, 0, 244, 246, 5, 8, 0, 0, 245, 244, 
		    1, 0, 0, 0, 245, 246, 1, 0, 0, 0, 246, 262, 1, 0, 0, 0, 247, 248, 
		    5, 16, 0, 0, 248, 249, 5, 54, 0, 0, 249, 250, 5, 49, 0, 0, 250, 252, 
		    3, 94, 47, 0, 251, 253, 5, 8, 0, 0, 252, 251, 1, 0, 0, 0, 252, 253, 
		    1, 0, 0, 0, 253, 262, 1, 0, 0, 0, 254, 255, 5, 16, 0, 0, 255, 256, 
		    5, 54, 0, 0, 256, 257, 5, 49, 0, 0, 257, 259, 3, 28, 14, 0, 258, 260, 
		    5, 8, 0, 0, 259, 258, 1, 0, 0, 0, 259, 260, 1, 0, 0, 0, 260, 262, 
		    1, 0, 0, 0, 261, 211, 1, 0, 0, 0, 261, 221, 1, 0, 0, 0, 261, 229, 
		    1, 0, 0, 0, 261, 239, 1, 0, 0, 0, 261, 247, 1, 0, 0, 0, 261, 254, 
		    1, 0, 0, 0, 262, 19, 1, 0, 0, 0, 263, 264, 3, 24, 12, 0, 264, 265, 
		    5, 10, 0, 0, 265, 267, 3, 26, 13, 0, 266, 268, 5, 8, 0, 0, 267, 266, 
		    1, 0, 0, 0, 267, 268, 1, 0, 0, 0, 268, 276, 1, 0, 0, 0, 269, 270, 
		    5, 54, 0, 0, 270, 271, 5, 10, 0, 0, 271, 273, 3, 30, 15, 0, 272, 274, 
		    5, 8, 0, 0, 273, 272, 1, 0, 0, 0, 273, 274, 1, 0, 0, 0, 274, 276, 
		    1, 0, 0, 0, 275, 263, 1, 0, 0, 0, 275, 269, 1, 0, 0, 0, 276, 21, 1, 
		    0, 0, 0, 277, 278, 5, 17, 0, 0, 278, 279, 5, 54, 0, 0, 279, 280, 3, 
		    94, 47, 0, 280, 281, 5, 9, 0, 0, 281, 283, 3, 76, 38, 0, 282, 284, 
		    5, 8, 0, 0, 283, 282, 1, 0, 0, 0, 283, 284, 1, 0, 0, 0, 284, 23, 1, 
		    0, 0, 0, 285, 290, 5, 54, 0, 0, 286, 287, 5, 3, 0, 0, 287, 289, 5, 
		    54, 0, 0, 288, 286, 1, 0, 0, 0, 289, 292, 1, 0, 0, 0, 290, 288, 1, 
		    0, 0, 0, 290, 291, 1, 0, 0, 0, 291, 25, 1, 0, 0, 0, 292, 290, 1, 0, 
		    0, 0, 293, 298, 3, 76, 38, 0, 294, 295, 5, 3, 0, 0, 295, 297, 3, 76, 
		    38, 0, 296, 294, 1, 0, 0, 0, 297, 300, 1, 0, 0, 0, 298, 296, 1, 0, 
		    0, 0, 298, 299, 1, 0, 0, 0, 299, 27, 1, 0, 0, 0, 300, 298, 1, 0, 0, 
		    0, 301, 302, 5, 4, 0, 0, 302, 303, 5, 56, 0, 0, 303, 304, 5, 5, 0, 
		    0, 304, 310, 3, 94, 47, 0, 305, 306, 5, 4, 0, 0, 306, 307, 5, 56, 
		    0, 0, 307, 308, 5, 5, 0, 0, 308, 310, 3, 28, 14, 0, 309, 301, 1, 0, 
		    0, 0, 309, 305, 1, 0, 0, 0, 310, 29, 1, 0, 0, 0, 311, 312, 5, 4, 0, 
		    0, 312, 313, 5, 56, 0, 0, 313, 314, 5, 5, 0, 0, 314, 315, 3, 94, 47, 
		    0, 315, 317, 5, 6, 0, 0, 316, 318, 3, 32, 16, 0, 317, 316, 1, 0, 0, 
		    0, 317, 318, 1, 0, 0, 0, 318, 319, 1, 0, 0, 0, 319, 320, 5, 7, 0, 
		    0, 320, 341, 1, 0, 0, 0, 321, 322, 5, 4, 0, 0, 322, 323, 5, 56, 0, 
		    0, 323, 324, 5, 5, 0, 0, 324, 325, 3, 28, 14, 0, 325, 327, 5, 6, 0, 
		    0, 326, 328, 3, 34, 17, 0, 327, 326, 1, 0, 0, 0, 327, 328, 1, 0, 0, 
		    0, 328, 329, 1, 0, 0, 0, 329, 330, 5, 7, 0, 0, 330, 341, 1, 0, 0, 
		    0, 331, 332, 5, 4, 0, 0, 332, 333, 5, 5, 0, 0, 333, 334, 3, 94, 47, 
		    0, 334, 336, 5, 6, 0, 0, 335, 337, 3, 32, 16, 0, 336, 335, 1, 0, 0, 
		    0, 336, 337, 1, 0, 0, 0, 337, 338, 1, 0, 0, 0, 338, 339, 5, 7, 0, 
		    0, 339, 341, 1, 0, 0, 0, 340, 311, 1, 0, 0, 0, 340, 321, 1, 0, 0, 
		    0, 340, 331, 1, 0, 0, 0, 341, 31, 1, 0, 0, 0, 342, 347, 3, 76, 38, 
		    0, 343, 344, 5, 3, 0, 0, 344, 346, 3, 76, 38, 0, 345, 343, 1, 0, 0, 
		    0, 346, 349, 1, 0, 0, 0, 347, 345, 1, 0, 0, 0, 347, 348, 1, 0, 0, 
		    0, 348, 33, 1, 0, 0, 0, 349, 347, 1, 0, 0, 0, 350, 352, 5, 6, 0, 0, 
		    351, 353, 3, 32, 16, 0, 352, 351, 1, 0, 0, 0, 352, 353, 1, 0, 0, 0, 
		    353, 354, 1, 0, 0, 0, 354, 363, 5, 7, 0, 0, 355, 356, 5, 3, 0, 0, 
		    356, 358, 5, 6, 0, 0, 357, 359, 3, 32, 16, 0, 358, 357, 1, 0, 0, 0, 
		    358, 359, 1, 0, 0, 0, 359, 360, 1, 0, 0, 0, 360, 362, 5, 7, 0, 0, 
		    361, 355, 1, 0, 0, 0, 362, 365, 1, 0, 0, 0, 363, 361, 1, 0, 0, 0, 
		    363, 364, 1, 0, 0, 0, 364, 367, 1, 0, 0, 0, 365, 363, 1, 0, 0, 0, 
		    366, 368, 5, 3, 0, 0, 367, 366, 1, 0, 0, 0, 367, 368, 1, 0, 0, 0, 
		    368, 35, 1, 0, 0, 0, 369, 374, 5, 54, 0, 0, 370, 371, 5, 4, 0, 0, 
		    371, 372, 3, 76, 38, 0, 372, 373, 5, 5, 0, 0, 373, 375, 1, 0, 0, 0, 
		    374, 370, 1, 0, 0, 0, 375, 376, 1, 0, 0, 0, 376, 374, 1, 0, 0, 0, 
		    376, 377, 1, 0, 0, 0, 377, 37, 1, 0, 0, 0, 378, 379, 5, 49, 0, 0, 
		    379, 380, 5, 54, 0, 0, 380, 381, 3, 44, 22, 0, 381, 383, 3, 76, 38, 
		    0, 382, 384, 5, 8, 0, 0, 383, 382, 1, 0, 0, 0, 383, 384, 1, 0, 0, 
		    0, 384, 39, 1, 0, 0, 0, 385, 390, 5, 54, 0, 0, 386, 387, 5, 4, 0, 
		    0, 387, 388, 3, 76, 38, 0, 388, 389, 5, 5, 0, 0, 389, 391, 1, 0, 0, 
		    0, 390, 386, 1, 0, 0, 0, 391, 392, 1, 0, 0, 0, 392, 390, 1, 0, 0, 
		    0, 392, 393, 1, 0, 0, 0, 393, 394, 1, 0, 0, 0, 394, 395, 3, 44, 22, 
		    0, 395, 397, 3, 76, 38, 0, 396, 398, 5, 8, 0, 0, 397, 396, 1, 0, 0, 
		    0, 397, 398, 1, 0, 0, 0, 398, 41, 1, 0, 0, 0, 399, 400, 5, 54, 0, 
		    0, 400, 401, 3, 44, 22, 0, 401, 403, 3, 76, 38, 0, 402, 404, 5, 8, 
		    0, 0, 403, 402, 1, 0, 0, 0, 403, 404, 1, 0, 0, 0, 404, 43, 1, 0, 0, 
		    0, 405, 406, 7, 0, 0, 0, 406, 45, 1, 0, 0, 0, 407, 408, 5, 18, 0, 
		    0, 408, 409, 3, 76, 38, 0, 409, 415, 3, 14, 7, 0, 410, 413, 5, 19, 
		    0, 0, 411, 414, 3, 46, 23, 0, 412, 414, 3, 14, 7, 0, 413, 411, 1, 
		    0, 0, 0, 413, 412, 1, 0, 0, 0, 414, 416, 1, 0, 0, 0, 415, 410, 1, 
		    0, 0, 0, 415, 416, 1, 0, 0, 0, 416, 47, 1, 0, 0, 0, 417, 418, 5, 20, 
		    0, 0, 418, 419, 3, 50, 25, 0, 419, 420, 5, 8, 0, 0, 420, 421, 3, 76, 
		    38, 0, 421, 422, 5, 8, 0, 0, 422, 423, 3, 52, 26, 0, 423, 424, 3, 
		    14, 7, 0, 424, 432, 1, 0, 0, 0, 425, 426, 5, 20, 0, 0, 426, 427, 3, 
		    76, 38, 0, 427, 428, 3, 14, 7, 0, 428, 432, 1, 0, 0, 0, 429, 430, 
		    5, 20, 0, 0, 430, 432, 3, 14, 7, 0, 431, 417, 1, 0, 0, 0, 431, 425, 
		    1, 0, 0, 0, 431, 429, 1, 0, 0, 0, 432, 49, 1, 0, 0, 0, 433, 434, 5, 
		    54, 0, 0, 434, 435, 5, 10, 0, 0, 435, 440, 3, 76, 38, 0, 436, 437, 
		    5, 54, 0, 0, 437, 438, 5, 9, 0, 0, 438, 440, 3, 76, 38, 0, 439, 433, 
		    1, 0, 0, 0, 439, 436, 1, 0, 0, 0, 440, 51, 1, 0, 0, 0, 441, 442, 5, 
		    54, 0, 0, 442, 449, 5, 11, 0, 0, 443, 444, 5, 54, 0, 0, 444, 449, 
		    5, 12, 0, 0, 445, 446, 5, 54, 0, 0, 446, 447, 5, 9, 0, 0, 447, 449, 
		    3, 76, 38, 0, 448, 441, 1, 0, 0, 0, 448, 443, 1, 0, 0, 0, 448, 445, 
		    1, 0, 0, 0, 449, 53, 1, 0, 0, 0, 450, 451, 5, 21, 0, 0, 451, 452, 
		    3, 76, 38, 0, 452, 456, 5, 6, 0, 0, 453, 455, 3, 56, 28, 0, 454, 453, 
		    1, 0, 0, 0, 455, 458, 1, 0, 0, 0, 456, 454, 1, 0, 0, 0, 456, 457, 
		    1, 0, 0, 0, 457, 460, 1, 0, 0, 0, 458, 456, 1, 0, 0, 0, 459, 461, 
		    3, 58, 29, 0, 460, 459, 1, 0, 0, 0, 460, 461, 1, 0, 0, 0, 461, 462, 
		    1, 0, 0, 0, 462, 463, 5, 7, 0, 0, 463, 55, 1, 0, 0, 0, 464, 465, 5, 
		    22, 0, 0, 465, 466, 3, 26, 13, 0, 466, 470, 5, 13, 0, 0, 467, 469, 
		    3, 16, 8, 0, 468, 467, 1, 0, 0, 0, 469, 472, 1, 0, 0, 0, 470, 468, 
		    1, 0, 0, 0, 470, 471, 1, 0, 0, 0, 471, 57, 1, 0, 0, 0, 472, 470, 1, 
		    0, 0, 0, 473, 474, 5, 23, 0, 0, 474, 478, 5, 13, 0, 0, 475, 477, 3, 
		    16, 8, 0, 476, 475, 1, 0, 0, 0, 477, 480, 1, 0, 0, 0, 478, 476, 1, 
		    0, 0, 0, 478, 479, 1, 0, 0, 0, 479, 59, 1, 0, 0, 0, 480, 478, 1, 0, 
		    0, 0, 481, 483, 5, 24, 0, 0, 482, 484, 5, 8, 0, 0, 483, 482, 1, 0, 
		    0, 0, 483, 484, 1, 0, 0, 0, 484, 61, 1, 0, 0, 0, 485, 487, 5, 25, 
		    0, 0, 486, 488, 5, 8, 0, 0, 487, 486, 1, 0, 0, 0, 487, 488, 1, 0, 
		    0, 0, 488, 63, 1, 0, 0, 0, 489, 490, 5, 54, 0, 0, 490, 492, 5, 11, 
		    0, 0, 491, 493, 5, 8, 0, 0, 492, 491, 1, 0, 0, 0, 492, 493, 1, 0, 
		    0, 0, 493, 500, 1, 0, 0, 0, 494, 495, 5, 54, 0, 0, 495, 497, 5, 12, 
		    0, 0, 496, 498, 5, 8, 0, 0, 497, 496, 1, 0, 0, 0, 497, 498, 1, 0, 
		    0, 0, 498, 500, 1, 0, 0, 0, 499, 489, 1, 0, 0, 0, 499, 494, 1, 0, 
		    0, 0, 500, 65, 1, 0, 0, 0, 501, 503, 5, 26, 0, 0, 502, 504, 3, 26, 
		    13, 0, 503, 502, 1, 0, 0, 0, 503, 504, 1, 0, 0, 0, 504, 506, 1, 0, 
		    0, 0, 505, 507, 5, 8, 0, 0, 506, 505, 1, 0, 0, 0, 506, 507, 1, 0, 
		    0, 0, 507, 67, 1, 0, 0, 0, 508, 509, 3, 70, 35, 0, 509, 511, 5, 1, 
		    0, 0, 510, 512, 3, 72, 36, 0, 511, 510, 1, 0, 0, 0, 511, 512, 1, 0, 
		    0, 0, 512, 513, 1, 0, 0, 0, 513, 514, 5, 2, 0, 0, 514, 69, 1, 0, 0, 
		    0, 515, 520, 5, 54, 0, 0, 516, 517, 5, 14, 0, 0, 517, 519, 5, 54, 
		    0, 0, 518, 516, 1, 0, 0, 0, 519, 522, 1, 0, 0, 0, 520, 518, 1, 0, 
		    0, 0, 520, 521, 1, 0, 0, 0, 521, 71, 1, 0, 0, 0, 522, 520, 1, 0, 0, 
		    0, 523, 528, 3, 74, 37, 0, 524, 525, 5, 3, 0, 0, 525, 527, 3, 74, 
		    37, 0, 526, 524, 1, 0, 0, 0, 527, 530, 1, 0, 0, 0, 528, 526, 1, 0, 
		    0, 0, 528, 529, 1, 0, 0, 0, 529, 73, 1, 0, 0, 0, 530, 528, 1, 0, 0, 
		    0, 531, 532, 5, 53, 0, 0, 532, 535, 5, 54, 0, 0, 533, 535, 3, 76, 
		    38, 0, 534, 531, 1, 0, 0, 0, 534, 533, 1, 0, 0, 0, 535, 75, 1, 0, 
		    0, 0, 536, 537, 3, 78, 39, 0, 537, 77, 1, 0, 0, 0, 538, 543, 3, 80, 
		    40, 0, 539, 540, 5, 39, 0, 0, 540, 542, 3, 80, 40, 0, 541, 539, 1, 
		    0, 0, 0, 542, 545, 1, 0, 0, 0, 543, 541, 1, 0, 0, 0, 543, 544, 1, 
		    0, 0, 0, 544, 79, 1, 0, 0, 0, 545, 543, 1, 0, 0, 0, 546, 551, 3, 82, 
		    41, 0, 547, 548, 5, 40, 0, 0, 548, 550, 3, 82, 41, 0, 549, 547, 1, 
		    0, 0, 0, 550, 553, 1, 0, 0, 0, 551, 549, 1, 0, 0, 0, 551, 552, 1, 
		    0, 0, 0, 552, 81, 1, 0, 0, 0, 553, 551, 1, 0, 0, 0, 554, 559, 3, 84, 
		    42, 0, 555, 556, 7, 1, 0, 0, 556, 558, 3, 84, 42, 0, 557, 555, 1, 
		    0, 0, 0, 558, 561, 1, 0, 0, 0, 559, 557, 1, 0, 0, 0, 559, 560, 1, 
		    0, 0, 0, 560, 83, 1, 0, 0, 0, 561, 559, 1, 0, 0, 0, 562, 567, 3, 86, 
		    43, 0, 563, 564, 7, 2, 0, 0, 564, 566, 3, 86, 43, 0, 565, 563, 1, 
		    0, 0, 0, 566, 569, 1, 0, 0, 0, 567, 565, 1, 0, 0, 0, 567, 568, 1, 
		    0, 0, 0, 568, 85, 1, 0, 0, 0, 569, 567, 1, 0, 0, 0, 570, 575, 3, 88, 
		    44, 0, 571, 572, 7, 3, 0, 0, 572, 574, 3, 88, 44, 0, 573, 571, 1, 
		    0, 0, 0, 574, 577, 1, 0, 0, 0, 575, 573, 1, 0, 0, 0, 575, 576, 1, 
		    0, 0, 0, 576, 87, 1, 0, 0, 0, 577, 575, 1, 0, 0, 0, 578, 583, 3, 90, 
		    45, 0, 579, 580, 7, 4, 0, 0, 580, 582, 3, 90, 45, 0, 581, 579, 1, 
		    0, 0, 0, 582, 585, 1, 0, 0, 0, 583, 581, 1, 0, 0, 0, 583, 584, 1, 
		    0, 0, 0, 584, 89, 1, 0, 0, 0, 585, 583, 1, 0, 0, 0, 586, 587, 5, 52, 
		    0, 0, 587, 594, 3, 90, 45, 0, 588, 589, 5, 48, 0, 0, 589, 594, 3, 
		    90, 45, 0, 590, 591, 5, 49, 0, 0, 591, 594, 3, 90, 45, 0, 592, 594, 
		    3, 92, 46, 0, 593, 586, 1, 0, 0, 0, 593, 588, 1, 0, 0, 0, 593, 590, 
		    1, 0, 0, 0, 593, 592, 1, 0, 0, 0, 594, 91, 1, 0, 0, 0, 595, 596, 5, 
		    1, 0, 0, 596, 597, 3, 76, 38, 0, 597, 598, 5, 2, 0, 0, 598, 610, 1, 
		    0, 0, 0, 599, 610, 3, 68, 34, 0, 600, 610, 3, 36, 18, 0, 601, 610, 
		    5, 54, 0, 0, 602, 610, 5, 56, 0, 0, 603, 610, 5, 55, 0, 0, 604, 610, 
		    5, 57, 0, 0, 605, 610, 5, 58, 0, 0, 606, 610, 5, 27, 0, 0, 607, 610, 
		    5, 28, 0, 0, 608, 610, 5, 29, 0, 0, 609, 595, 1, 0, 0, 0, 609, 599, 
		    1, 0, 0, 0, 609, 600, 1, 0, 0, 0, 609, 601, 1, 0, 0, 0, 609, 602, 
		    1, 0, 0, 0, 609, 603, 1, 0, 0, 0, 609, 604, 1, 0, 0, 0, 609, 605, 
		    1, 0, 0, 0, 609, 606, 1, 0, 0, 0, 609, 607, 1, 0, 0, 0, 609, 608, 
		    1, 0, 0, 0, 610, 93, 1, 0, 0, 0, 611, 612, 7, 5, 0, 0, 612, 95, 1, 
		    0, 0, 0, 71, 99, 101, 109, 113, 122, 140, 157, 162, 173, 183, 203, 
		    207, 209, 216, 219, 227, 234, 237, 245, 252, 259, 261, 267, 273, 275, 
		    283, 290, 298, 309, 317, 327, 336, 340, 347, 352, 358, 363, 367, 376, 
		    383, 392, 397, 403, 413, 415, 431, 439, 448, 456, 460, 470, 478, 483, 
		    487, 492, 497, 499, 503, 506, 511, 520, 528, 534, 543, 551, 559, 567, 
		    575, 583, 593, 609];
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
		        $this->setState(99); 
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        do {
		        	$this->setState(99);
		        	$this->errorHandler->sync($this);

		        	switch ($this->input->LA(1)) {
		        	    case self::FUNC:
		        	    	$this->setState(96);
		        	    	$this->functionDecl();
		        	    	break;

		        	    case self::VAR:
		        	    	$this->setState(97);
		        	    	$this->varDecl();
		        	    	break;

		        	    case self::CONST:
		        	    	$this->setState(98);
		        	    	$this->constDecl();
		        	    	break;

		        	default:
		        		throw new NoViableAltException($this);
		        	}
		        	$this->setState(101); 
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        } while (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 229376) !== 0));
		        $this->setState(103);
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
		        $this->setState(105);
		        $this->match(self::FUNC);
		        $this->setState(106);
		        $this->match(self::ID);
		        $this->setState(107);
		        $this->match(self::T__0);
		        $this->setState(109);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::ID) {
		        	$this->setState(108);
		        	$this->paramList();
		        }
		        $this->setState(111);
		        $this->match(self::T__1);
		        $this->setState(113);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 562983239417874) !== 0)) {
		        	$this->setState(112);
		        	$this->returnType();
		        }
		        $this->setState(115);
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
		        $this->setState(117);
		        $this->param();
		        $this->setState(122);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::T__2) {
		        	$this->setState(118);
		        	$this->match(self::T__2);
		        	$this->setState(119);
		        	$this->param();
		        	$this->setState(124);
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
		        $this->setState(140);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 5, $this->ctx)) {
		        	case 1:
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(125);
		        	    $this->match(self::ID);
		        	    $this->setState(126);
		        	    $this->type();
		        	break;

		        	case 2:
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(127);
		        	    $this->match(self::ID);
		        	    $this->setState(128);
		        	    $this->match(self::STAR);
		        	    $this->setState(129);
		        	    $this->type();
		        	break;

		        	case 3:
		        	    $this->enterOuterAlt($localContext, 3);
		        	    $this->setState(130);
		        	    $this->match(self::ID);
		        	    $this->setState(131);
		        	    $this->match(self::STAR);
		        	    $this->setState(132);
		        	    $this->arrayType();
		        	break;

		        	case 4:
		        	    $this->enterOuterAlt($localContext, 4);
		        	    $this->setState(133);
		        	    $this->match(self::ID);
		        	    $this->setState(134);
		        	    $this->match(self::STAR);
		        	    $this->setState(135);
		        	    $this->sliceType();
		        	break;

		        	case 5:
		        	    $this->enterOuterAlt($localContext, 5);
		        	    $this->setState(136);
		        	    $this->match(self::ID);
		        	    $this->setState(137);
		        	    $this->arrayType();
		        	break;

		        	case 6:
		        	    $this->enterOuterAlt($localContext, 6);
		        	    $this->setState(138);
		        	    $this->match(self::ID);
		        	    $this->setState(139);
		        	    $this->sliceType();
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
		        $this->setState(162);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 7, $this->ctx)) {
		        	case 1:
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(142);
		        	    $this->type();
		        	break;

		        	case 2:
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(143);
		        	    $this->arrayType();
		        	break;

		        	case 3:
		        	    $this->enterOuterAlt($localContext, 3);
		        	    $this->setState(144);
		        	    $this->sliceType();
		        	break;

		        	case 4:
		        	    $this->enterOuterAlt($localContext, 4);
		        	    $this->setState(145);
		        	    $this->match(self::STAR);
		        	    $this->setState(146);
		        	    $this->type();
		        	break;

		        	case 5:
		        	    $this->enterOuterAlt($localContext, 5);
		        	    $this->setState(147);
		        	    $this->match(self::STAR);
		        	    $this->setState(148);
		        	    $this->arrayType();
		        	break;

		        	case 6:
		        	    $this->enterOuterAlt($localContext, 6);
		        	    $this->setState(149);
		        	    $this->match(self::STAR);
		        	    $this->setState(150);
		        	    $this->sliceType();
		        	break;

		        	case 7:
		        	    $this->enterOuterAlt($localContext, 7);
		        	    $this->setState(151);
		        	    $this->match(self::T__0);
		        	    $this->setState(152);
		        	    $this->multiReturnType();
		        	    $this->setState(157);
		        	    $this->errorHandler->sync($this);

		        	    $_la = $this->input->LA(1);
		        	    while ($_la === self::T__2) {
		        	    	$this->setState(153);
		        	    	$this->match(self::T__2);
		        	    	$this->setState(154);
		        	    	$this->multiReturnType();
		        	    	$this->setState(159);
		        	    	$this->errorHandler->sync($this);
		        	    	$_la = $this->input->LA(1);
		        	    }
		        	    $this->setState(160);
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
		        $this->setState(173);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 8, $this->ctx)) {
		        	case 1:
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(164);
		        	    $this->type();
		        	break;

		        	case 2:
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(165);
		        	    $this->arrayType();
		        	break;

		        	case 3:
		        	    $this->enterOuterAlt($localContext, 3);
		        	    $this->setState(166);
		        	    $this->sliceType();
		        	break;

		        	case 4:
		        	    $this->enterOuterAlt($localContext, 4);
		        	    $this->setState(167);
		        	    $this->match(self::STAR);
		        	    $this->setState(168);
		        	    $this->type();
		        	break;

		        	case 5:
		        	    $this->enterOuterAlt($localContext, 5);
		        	    $this->setState(169);
		        	    $this->match(self::STAR);
		        	    $this->setState(170);
		        	    $this->arrayType();
		        	break;

		        	case 6:
		        	    $this->enterOuterAlt($localContext, 6);
		        	    $this->setState(171);
		        	    $this->match(self::STAR);
		        	    $this->setState(172);
		        	    $this->sliceType();
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
		public function sliceType(): Context\SliceTypeContext
		{
		    $localContext = new Context\SliceTypeContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 12, self::RULE_sliceType);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(175);
		        $this->match(self::T__3);
		        $this->setState(176);
		        $this->match(self::T__4);
		        $this->setState(177);
		        $this->type();
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

		    $this->enterRule($localContext, 14, self::RULE_block);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(179);
		        $this->match(self::T__5);
		        $this->setState(183);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 563794379412013058) !== 0)) {
		        	$this->setState(180);
		        	$this->statement();
		        	$this->setState(185);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		        $this->setState(186);
		        $this->match(self::T__6);
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

		    $this->enterRule($localContext, 16, self::RULE_statement);

		    try {
		        $this->setState(209);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 12, $this->ctx)) {
		        	case 1:
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(188);
		        	    $this->varDecl();
		        	break;

		        	case 2:
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(189);
		        	    $this->varShortDecl();
		        	break;

		        	case 3:
		        	    $this->enterOuterAlt($localContext, 3);
		        	    $this->setState(190);
		        	    $this->constDecl();
		        	break;

		        	case 4:
		        	    $this->enterOuterAlt($localContext, 4);
		        	    $this->setState(191);
		        	    $this->ptrAssign();
		        	break;

		        	case 5:
		        	    $this->enterOuterAlt($localContext, 5);
		        	    $this->setState(192);
		        	    $this->arrayAssign();
		        	break;

		        	case 6:
		        	    $this->enterOuterAlt($localContext, 6);
		        	    $this->setState(193);
		        	    $this->assignment();
		        	break;

		        	case 7:
		        	    $this->enterOuterAlt($localContext, 7);
		        	    $this->setState(194);
		        	    $this->ifStmt();
		        	break;

		        	case 8:
		        	    $this->enterOuterAlt($localContext, 8);
		        	    $this->setState(195);
		        	    $this->forStmt();
		        	break;

		        	case 9:
		        	    $this->enterOuterAlt($localContext, 9);
		        	    $this->setState(196);
		        	    $this->switchStmt();
		        	break;

		        	case 10:
		        	    $this->enterOuterAlt($localContext, 10);
		        	    $this->setState(197);
		        	    $this->breakStmt();
		        	break;

		        	case 11:
		        	    $this->enterOuterAlt($localContext, 11);
		        	    $this->setState(198);
		        	    $this->continueStmt();
		        	break;

		        	case 12:
		        	    $this->enterOuterAlt($localContext, 12);
		        	    $this->setState(199);
		        	    $this->incDecStmt();
		        	break;

		        	case 13:
		        	    $this->enterOuterAlt($localContext, 13);
		        	    $this->setState(200);
		        	    $this->returnStmt();
		        	break;

		        	case 14:
		        	    $this->enterOuterAlt($localContext, 14);
		        	    $this->setState(201);
		        	    $this->functionCall();
		        	    $this->setState(203);
		        	    $this->errorHandler->sync($this);
		        	    $_la = $this->input->LA(1);

		        	    if ($_la === self::T__7) {
		        	    	$this->setState(202);
		        	    	$this->match(self::T__7);
		        	    }
		        	break;

		        	case 15:
		        	    $this->enterOuterAlt($localContext, 15);
		        	    $this->setState(205);
		        	    $this->expression();
		        	    $this->setState(207);
		        	    $this->errorHandler->sync($this);
		        	    $_la = $this->input->LA(1);

		        	    if ($_la === self::T__7) {
		        	    	$this->setState(206);
		        	    	$this->match(self::T__7);
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

		    $this->enterRule($localContext, 18, self::RULE_varDecl);

		    try {
		        $this->setState(261);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 21, $this->ctx)) {
		        	case 1:
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(211);
		        	    $this->match(self::VAR);
		        	    $this->setState(212);
		        	    $this->match(self::ID);
		        	    $this->setState(213);
		        	    $this->type();
		        	    $this->setState(216);
		        	    $this->errorHandler->sync($this);
		        	    $_la = $this->input->LA(1);

		        	    if ($_la === self::T__8) {
		        	    	$this->setState(214);
		        	    	$this->match(self::T__8);
		        	    	$this->setState(215);
		        	    	$this->expression();
		        	    }
		        	    $this->setState(219);
		        	    $this->errorHandler->sync($this);
		        	    $_la = $this->input->LA(1);

		        	    if ($_la === self::T__7) {
		        	    	$this->setState(218);
		        	    	$this->match(self::T__7);
		        	    }
		        	break;

		        	case 2:
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(221);
		        	    $this->match(self::VAR);
		        	    $this->setState(222);
		        	    $this->idList();
		        	    $this->setState(223);
		        	    $this->type();
		        	    $this->setState(224);
		        	    $this->match(self::T__8);
		        	    $this->setState(225);
		        	    $this->expList();
		        	    $this->setState(227);
		        	    $this->errorHandler->sync($this);
		        	    $_la = $this->input->LA(1);

		        	    if ($_la === self::T__7) {
		        	    	$this->setState(226);
		        	    	$this->match(self::T__7);
		        	    }
		        	break;

		        	case 3:
		        	    $this->enterOuterAlt($localContext, 3);
		        	    $this->setState(229);
		        	    $this->match(self::VAR);
		        	    $this->setState(230);
		        	    $this->match(self::ID);
		        	    $this->setState(231);
		        	    $this->arrayType();
		        	    $this->setState(234);
		        	    $this->errorHandler->sync($this);
		        	    $_la = $this->input->LA(1);

		        	    if ($_la === self::T__8) {
		        	    	$this->setState(232);
		        	    	$this->match(self::T__8);
		        	    	$this->setState(233);
		        	    	$this->arrayLiteral();
		        	    }
		        	    $this->setState(237);
		        	    $this->errorHandler->sync($this);
		        	    $_la = $this->input->LA(1);

		        	    if ($_la === self::T__7) {
		        	    	$this->setState(236);
		        	    	$this->match(self::T__7);
		        	    }
		        	break;

		        	case 4:
		        	    $this->enterOuterAlt($localContext, 4);
		        	    $this->setState(239);
		        	    $this->match(self::VAR);
		        	    $this->setState(240);
		        	    $this->match(self::ID);
		        	    $this->setState(241);
		        	    $this->arrayType();
		        	    $this->setState(242);
		        	    $this->match(self::T__8);
		        	    $this->setState(243);
		        	    $this->expression();
		        	    $this->setState(245);
		        	    $this->errorHandler->sync($this);
		        	    $_la = $this->input->LA(1);

		        	    if ($_la === self::T__7) {
		        	    	$this->setState(244);
		        	    	$this->match(self::T__7);
		        	    }
		        	break;

		        	case 5:
		        	    $this->enterOuterAlt($localContext, 5);
		        	    $this->setState(247);
		        	    $this->match(self::VAR);
		        	    $this->setState(248);
		        	    $this->match(self::ID);
		        	    $this->setState(249);
		        	    $this->match(self::STAR);
		        	    $this->setState(250);
		        	    $this->type();
		        	    $this->setState(252);
		        	    $this->errorHandler->sync($this);
		        	    $_la = $this->input->LA(1);

		        	    if ($_la === self::T__7) {
		        	    	$this->setState(251);
		        	    	$this->match(self::T__7);
		        	    }
		        	break;

		        	case 6:
		        	    $this->enterOuterAlt($localContext, 6);
		        	    $this->setState(254);
		        	    $this->match(self::VAR);
		        	    $this->setState(255);
		        	    $this->match(self::ID);
		        	    $this->setState(256);
		        	    $this->match(self::STAR);
		        	    $this->setState(257);
		        	    $this->arrayType();
		        	    $this->setState(259);
		        	    $this->errorHandler->sync($this);
		        	    $_la = $this->input->LA(1);

		        	    if ($_la === self::T__7) {
		        	    	$this->setState(258);
		        	    	$this->match(self::T__7);
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

		    $this->enterRule($localContext, 20, self::RULE_varShortDecl);

		    try {
		        $this->setState(275);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 24, $this->ctx)) {
		        	case 1:
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(263);
		        	    $this->idList();
		        	    $this->setState(264);
		        	    $this->match(self::T__9);
		        	    $this->setState(265);
		        	    $this->expList();
		        	    $this->setState(267);
		        	    $this->errorHandler->sync($this);
		        	    $_la = $this->input->LA(1);

		        	    if ($_la === self::T__7) {
		        	    	$this->setState(266);
		        	    	$this->match(self::T__7);
		        	    }
		        	break;

		        	case 2:
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(269);
		        	    $this->match(self::ID);
		        	    $this->setState(270);
		        	    $this->match(self::T__9);
		        	    $this->setState(271);
		        	    $this->arrayLiteral();
		        	    $this->setState(273);
		        	    $this->errorHandler->sync($this);
		        	    $_la = $this->input->LA(1);

		        	    if ($_la === self::T__7) {
		        	    	$this->setState(272);
		        	    	$this->match(self::T__7);
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

		    $this->enterRule($localContext, 22, self::RULE_constDecl);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(277);
		        $this->match(self::CONST);
		        $this->setState(278);
		        $this->match(self::ID);
		        $this->setState(279);
		        $this->type();
		        $this->setState(280);
		        $this->match(self::T__8);
		        $this->setState(281);
		        $this->expression();
		        $this->setState(283);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::T__7) {
		        	$this->setState(282);
		        	$this->match(self::T__7);
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

		    $this->enterRule($localContext, 24, self::RULE_idList);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(285);
		        $this->match(self::ID);
		        $this->setState(290);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::T__2) {
		        	$this->setState(286);
		        	$this->match(self::T__2);
		        	$this->setState(287);
		        	$this->match(self::ID);
		        	$this->setState(292);
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

		    $this->enterRule($localContext, 26, self::RULE_expList);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(293);
		        $this->expression();
		        $this->setState(298);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::T__2) {
		        	$this->setState(294);
		        	$this->match(self::T__2);
		        	$this->setState(295);
		        	$this->expression();
		        	$this->setState(300);
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

		    $this->enterRule($localContext, 28, self::RULE_arrayType);

		    try {
		        $this->setState(309);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 28, $this->ctx)) {
		        	case 1:
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(301);
		        	    $this->match(self::T__3);
		        	    $this->setState(302);
		        	    $this->match(self::INT);
		        	    $this->setState(303);
		        	    $this->match(self::T__4);
		        	    $this->setState(304);
		        	    $this->type();
		        	break;

		        	case 2:
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(305);
		        	    $this->match(self::T__3);
		        	    $this->setState(306);
		        	    $this->match(self::INT);
		        	    $this->setState(307);
		        	    $this->match(self::T__4);
		        	    $this->setState(308);
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

		    $this->enterRule($localContext, 30, self::RULE_arrayLiteral);

		    try {
		        $this->setState(340);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 32, $this->ctx)) {
		        	case 1:
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(311);
		        	    $this->match(self::T__3);
		        	    $this->setState(312);
		        	    $this->match(self::INT);
		        	    $this->setState(313);
		        	    $this->match(self::T__4);
		        	    $this->setState(314);
		        	    $this->type();
		        	    $this->setState(315);
		        	    $this->match(self::T__5);
		        	    $this->setState(317);
		        	    $this->errorHandler->sync($this);
		        	    $_la = $this->input->LA(1);

		        	    if (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 563794379290968066) !== 0)) {
		        	    	$this->setState(316);
		        	    	$this->arrayElements();
		        	    }
		        	    $this->setState(319);
		        	    $this->match(self::T__6);
		        	break;

		        	case 2:
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(321);
		        	    $this->match(self::T__3);
		        	    $this->setState(322);
		        	    $this->match(self::INT);
		        	    $this->setState(323);
		        	    $this->match(self::T__4);
		        	    $this->setState(324);
		        	    $this->arrayType();
		        	    $this->setState(325);
		        	    $this->match(self::T__5);
		        	    $this->setState(327);
		        	    $this->errorHandler->sync($this);
		        	    $_la = $this->input->LA(1);

		        	    if ($_la === self::T__5) {
		        	    	$this->setState(326);
		        	    	$this->arrayRowElements();
		        	    }
		        	    $this->setState(329);
		        	    $this->match(self::T__6);
		        	break;

		        	case 3:
		        	    $this->enterOuterAlt($localContext, 3);
		        	    $this->setState(331);
		        	    $this->match(self::T__3);
		        	    $this->setState(332);
		        	    $this->match(self::T__4);
		        	    $this->setState(333);
		        	    $this->type();
		        	    $this->setState(334);
		        	    $this->match(self::T__5);
		        	    $this->setState(336);
		        	    $this->errorHandler->sync($this);
		        	    $_la = $this->input->LA(1);

		        	    if (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 563794379290968066) !== 0)) {
		        	    	$this->setState(335);
		        	    	$this->arrayElements();
		        	    }
		        	    $this->setState(338);
		        	    $this->match(self::T__6);
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

		    $this->enterRule($localContext, 32, self::RULE_arrayElements);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(342);
		        $this->expression();
		        $this->setState(347);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::T__2) {
		        	$this->setState(343);
		        	$this->match(self::T__2);
		        	$this->setState(344);
		        	$this->expression();
		        	$this->setState(349);
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

		    $this->enterRule($localContext, 34, self::RULE_arrayRowElements);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(350);
		        $this->match(self::T__5);
		        $this->setState(352);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 563794379290968066) !== 0)) {
		        	$this->setState(351);
		        	$this->arrayElements();
		        }
		        $this->setState(354);
		        $this->match(self::T__6);
		        $this->setState(363);
		        $this->errorHandler->sync($this);

		        $alt = $this->getInterpreter()->adaptivePredict($this->input, 36, $this->ctx);

		        while ($alt !== 2 && $alt !== ATN::INVALID_ALT_NUMBER) {
		        	if ($alt === 1) {
		        		$this->setState(355);
		        		$this->match(self::T__2);
		        		$this->setState(356);
		        		$this->match(self::T__5);
		        		$this->setState(358);
		        		$this->errorHandler->sync($this);
		        		$_la = $this->input->LA(1);

		        		if (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 563794379290968066) !== 0)) {
		        			$this->setState(357);
		        			$this->arrayElements();
		        		}
		        		$this->setState(360);
		        		$this->match(self::T__6); 
		        	}

		        	$this->setState(365);
		        	$this->errorHandler->sync($this);

		        	$alt = $this->getInterpreter()->adaptivePredict($this->input, 36, $this->ctx);
		        }
		        $this->setState(367);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::T__2) {
		        	$this->setState(366);
		        	$this->match(self::T__2);
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

		    $this->enterRule($localContext, 36, self::RULE_arrayAccess);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(369);
		        $this->match(self::ID);
		        $this->setState(374); 
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        do {
		        	$this->setState(370);
		        	$this->match(self::T__3);
		        	$this->setState(371);
		        	$this->expression();
		        	$this->setState(372);
		        	$this->match(self::T__4);
		        	$this->setState(376); 
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        } while ($_la === self::T__3);
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

		    $this->enterRule($localContext, 38, self::RULE_ptrAssign);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(378);
		        $this->match(self::STAR);
		        $this->setState(379);
		        $this->match(self::ID);
		        $this->setState(380);
		        $this->assignOp();
		        $this->setState(381);
		        $this->expression();
		        $this->setState(383);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::T__7) {
		        	$this->setState(382);
		        	$this->match(self::T__7);
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

		    $this->enterRule($localContext, 40, self::RULE_arrayAssign);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(385);
		        $this->match(self::ID);
		        $this->setState(390); 
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        do {
		        	$this->setState(386);
		        	$this->match(self::T__3);
		        	$this->setState(387);
		        	$this->expression();
		        	$this->setState(388);
		        	$this->match(self::T__4);
		        	$this->setState(392); 
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        } while ($_la === self::T__3);
		        $this->setState(394);
		        $this->assignOp();
		        $this->setState(395);
		        $this->expression();
		        $this->setState(397);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::T__7) {
		        	$this->setState(396);
		        	$this->match(self::T__7);
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

		    $this->enterRule($localContext, 42, self::RULE_assignment);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(399);
		        $this->match(self::ID);
		        $this->setState(400);
		        $this->assignOp();
		        $this->setState(401);
		        $this->expression();
		        $this->setState(403);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::T__7) {
		        	$this->setState(402);
		        	$this->match(self::T__7);
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

		    $this->enterRule($localContext, 44, self::RULE_assignOp);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(405);

		        $_la = $this->input->LA(1);

		        if (!(((($_la) & ~0x3f) === 0 && ((1 << $_la) & 515396076032) !== 0))) {
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

		    $this->enterRule($localContext, 46, self::RULE_ifStmt);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(407);
		        $this->match(self::IF);
		        $this->setState(408);
		        $this->expression();
		        $this->setState(409);
		        $this->block();
		        $this->setState(415);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::ELSE) {
		        	$this->setState(410);
		        	$this->match(self::ELSE);
		        	$this->setState(413);
		        	$this->errorHandler->sync($this);

		        	switch ($this->input->LA(1)) {
		        	    case self::IF:
		        	    	$this->setState(411);
		        	    	$this->ifStmt();
		        	    	break;

		        	    case self::T__5:
		        	    	$this->setState(412);
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

		    $this->enterRule($localContext, 48, self::RULE_forStmt);

		    try {
		        $this->setState(431);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 45, $this->ctx)) {
		        	case 1:
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(417);
		        	    $this->match(self::FOR);
		        	    $this->setState(418);
		        	    $this->forInit();
		        	    $this->setState(419);
		        	    $this->match(self::T__7);
		        	    $this->setState(420);
		        	    $this->expression();
		        	    $this->setState(421);
		        	    $this->match(self::T__7);
		        	    $this->setState(422);
		        	    $this->forPost();
		        	    $this->setState(423);
		        	    $this->block();
		        	break;

		        	case 2:
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(425);
		        	    $this->match(self::FOR);
		        	    $this->setState(426);
		        	    $this->expression();
		        	    $this->setState(427);
		        	    $this->block();
		        	break;

		        	case 3:
		        	    $this->enterOuterAlt($localContext, 3);
		        	    $this->setState(429);
		        	    $this->match(self::FOR);
		        	    $this->setState(430);
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

		    $this->enterRule($localContext, 50, self::RULE_forInit);

		    try {
		        $this->setState(439);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 46, $this->ctx)) {
		        	case 1:
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(433);
		        	    $this->match(self::ID);
		        	    $this->setState(434);
		        	    $this->match(self::T__9);
		        	    $this->setState(435);
		        	    $this->expression();
		        	break;

		        	case 2:
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(436);
		        	    $this->match(self::ID);
		        	    $this->setState(437);
		        	    $this->match(self::T__8);
		        	    $this->setState(438);
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

		    $this->enterRule($localContext, 52, self::RULE_forPost);

		    try {
		        $this->setState(448);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 47, $this->ctx)) {
		        	case 1:
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(441);
		        	    $this->match(self::ID);
		        	    $this->setState(442);
		        	    $this->match(self::T__10);
		        	break;

		        	case 2:
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(443);
		        	    $this->match(self::ID);
		        	    $this->setState(444);
		        	    $this->match(self::T__11);
		        	break;

		        	case 3:
		        	    $this->enterOuterAlt($localContext, 3);
		        	    $this->setState(445);
		        	    $this->match(self::ID);
		        	    $this->setState(446);
		        	    $this->match(self::T__8);
		        	    $this->setState(447);
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

		    $this->enterRule($localContext, 54, self::RULE_switchStmt);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(450);
		        $this->match(self::SWITCH);
		        $this->setState(451);
		        $this->expression();
		        $this->setState(452);
		        $this->match(self::T__5);
		        $this->setState(456);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::CASE) {
		        	$this->setState(453);
		        	$this->caseClause();
		        	$this->setState(458);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		        $this->setState(460);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::DEFAULT) {
		        	$this->setState(459);
		        	$this->defaultClause();
		        }
		        $this->setState(462);
		        $this->match(self::T__6);
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

		    $this->enterRule($localContext, 56, self::RULE_caseClause);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(464);
		        $this->match(self::CASE);
		        $this->setState(465);
		        $this->expList();
		        $this->setState(466);
		        $this->match(self::T__12);
		        $this->setState(470);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 563794379412013058) !== 0)) {
		        	$this->setState(467);
		        	$this->statement();
		        	$this->setState(472);
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

		    $this->enterRule($localContext, 58, self::RULE_defaultClause);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(473);
		        $this->match(self::DEFAULT);
		        $this->setState(474);
		        $this->match(self::T__12);
		        $this->setState(478);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 563794379412013058) !== 0)) {
		        	$this->setState(475);
		        	$this->statement();
		        	$this->setState(480);
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

		    $this->enterRule($localContext, 60, self::RULE_breakStmt);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(481);
		        $this->match(self::BREAK);
		        $this->setState(483);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::T__7) {
		        	$this->setState(482);
		        	$this->match(self::T__7);
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

		    $this->enterRule($localContext, 62, self::RULE_continueStmt);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(485);
		        $this->match(self::CONTINUE);
		        $this->setState(487);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::T__7) {
		        	$this->setState(486);
		        	$this->match(self::T__7);
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

		    $this->enterRule($localContext, 64, self::RULE_incDecStmt);

		    try {
		        $this->setState(499);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 56, $this->ctx)) {
		        	case 1:
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(489);
		        	    $this->match(self::ID);
		        	    $this->setState(490);
		        	    $this->match(self::T__10);
		        	    $this->setState(492);
		        	    $this->errorHandler->sync($this);
		        	    $_la = $this->input->LA(1);

		        	    if ($_la === self::T__7) {
		        	    	$this->setState(491);
		        	    	$this->match(self::T__7);
		        	    }
		        	break;

		        	case 2:
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(494);
		        	    $this->match(self::ID);
		        	    $this->setState(495);
		        	    $this->match(self::T__11);
		        	    $this->setState(497);
		        	    $this->errorHandler->sync($this);
		        	    $_la = $this->input->LA(1);

		        	    if ($_la === self::T__7) {
		        	    	$this->setState(496);
		        	    	$this->match(self::T__7);
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

		    $this->enterRule($localContext, 66, self::RULE_returnStmt);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(501);
		        $this->match(self::RETURN);
		        $this->setState(503);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 57, $this->ctx)) {
		            case 1:
		        	    $this->setState(502);
		        	    $this->expList();
		        	break;
		        }
		        $this->setState(506);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::T__7) {
		        	$this->setState(505);
		        	$this->match(self::T__7);
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

		    $this->enterRule($localContext, 68, self::RULE_functionCall);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(508);
		        $this->qualifiedName();
		        $this->setState(509);
		        $this->match(self::T__0);
		        $this->setState(511);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 572801578545709058) !== 0)) {
		        	$this->setState(510);
		        	$this->argList();
		        }
		        $this->setState(513);
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

		    $this->enterRule($localContext, 70, self::RULE_qualifiedName);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(515);
		        $this->match(self::ID);
		        $this->setState(520);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::T__13) {
		        	$this->setState(516);
		        	$this->match(self::T__13);
		        	$this->setState(517);
		        	$this->match(self::ID);
		        	$this->setState(522);
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

		    $this->enterRule($localContext, 72, self::RULE_argList);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(523);
		        $this->argItem();
		        $this->setState(528);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::T__2) {
		        	$this->setState(524);
		        	$this->match(self::T__2);
		        	$this->setState(525);
		        	$this->argItem();
		        	$this->setState(530);
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

		    $this->enterRule($localContext, 74, self::RULE_argItem);

		    try {
		        $this->setState(534);
		        $this->errorHandler->sync($this);

		        switch ($this->input->LA(1)) {
		            case self::REF:
		            	$this->enterOuterAlt($localContext, 1);
		            	$this->setState(531);
		            	$this->match(self::REF);
		            	$this->setState(532);
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
		            	$this->setState(533);
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

		    $this->enterRule($localContext, 76, self::RULE_expression);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(536);
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

		    $this->enterRule($localContext, 78, self::RULE_logicalOr);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(538);
		        $this->logicalAnd();
		        $this->setState(543);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::OR) {
		        	$this->setState(539);
		        	$this->match(self::OR);
		        	$this->setState(540);
		        	$this->logicalAnd();
		        	$this->setState(545);
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

		    $this->enterRule($localContext, 80, self::RULE_logicalAnd);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(546);
		        $this->equality();
		        $this->setState(551);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::AND) {
		        	$this->setState(547);
		        	$this->match(self::AND);
		        	$this->setState(548);
		        	$this->equality();
		        	$this->setState(553);
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

		    $this->enterRule($localContext, 82, self::RULE_equality);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(554);
		        $this->comparison();
		        $this->setState(559);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::EQ || $_la === self::NEQ) {
		        	$this->setState(555);

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
		        	$this->setState(556);
		        	$this->comparison();
		        	$this->setState(561);
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

		    $this->enterRule($localContext, 84, self::RULE_comparison);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(562);
		        $this->term();
		        $this->setState(567);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 131941395333120) !== 0)) {
		        	$this->setState(563);

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
		        	$this->setState(564);
		        	$this->term();
		        	$this->setState(569);
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

		    $this->enterRule($localContext, 86, self::RULE_term);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(570);
		        $this->factor();
		        $this->setState(575);
		        $this->errorHandler->sync($this);

		        $alt = $this->getInterpreter()->adaptivePredict($this->input, 67, $this->ctx);

		        while ($alt !== 2 && $alt !== ATN::INVALID_ALT_NUMBER) {
		        	if ($alt === 1) {
		        		$this->setState(571);

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
		        		$this->setState(572);
		        		$this->factor(); 
		        	}

		        	$this->setState(577);
		        	$this->errorHandler->sync($this);

		        	$alt = $this->getInterpreter()->adaptivePredict($this->input, 67, $this->ctx);
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

		    $this->enterRule($localContext, 88, self::RULE_factor);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(578);
		        $this->unary();
		        $this->setState(583);
		        $this->errorHandler->sync($this);

		        $alt = $this->getInterpreter()->adaptivePredict($this->input, 68, $this->ctx);

		        while ($alt !== 2 && $alt !== ATN::INVALID_ALT_NUMBER) {
		        	if ($alt === 1) {
		        		$this->setState(579);

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
		        		$this->setState(580);
		        		$this->unary(); 
		        	}

		        	$this->setState(585);
		        	$this->errorHandler->sync($this);

		        	$alt = $this->getInterpreter()->adaptivePredict($this->input, 68, $this->ctx);
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

		    $this->enterRule($localContext, 90, self::RULE_unary);

		    try {
		        $this->setState(593);
		        $this->errorHandler->sync($this);

		        switch ($this->input->LA(1)) {
		            case self::BANG:
		            	$this->enterOuterAlt($localContext, 1);
		            	$this->setState(586);
		            	$this->match(self::BANG);
		            	$this->setState(587);
		            	$this->unary();
		            	break;

		            case self::MINUS:
		            	$this->enterOuterAlt($localContext, 2);
		            	$this->setState(588);
		            	$this->match(self::MINUS);
		            	$this->setState(589);
		            	$this->unary();
		            	break;

		            case self::STAR:
		            	$this->enterOuterAlt($localContext, 3);
		            	$this->setState(590);
		            	$this->match(self::STAR);
		            	$this->setState(591);
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
		            	$this->setState(592);
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

		    $this->enterRule($localContext, 92, self::RULE_primary);

		    try {
		        $this->setState(609);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 70, $this->ctx)) {
		        	case 1:
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(595);
		        	    $this->match(self::T__0);
		        	    $this->setState(596);
		        	    $this->expression();
		        	    $this->setState(597);
		        	    $this->match(self::T__1);
		        	break;

		        	case 2:
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(599);
		        	    $this->functionCall();
		        	break;

		        	case 3:
		        	    $this->enterOuterAlt($localContext, 3);
		        	    $this->setState(600);
		        	    $this->arrayAccess();
		        	break;

		        	case 4:
		        	    $this->enterOuterAlt($localContext, 4);
		        	    $this->setState(601);
		        	    $this->match(self::ID);
		        	break;

		        	case 5:
		        	    $this->enterOuterAlt($localContext, 5);
		        	    $this->setState(602);
		        	    $this->match(self::INT);
		        	break;

		        	case 6:
		        	    $this->enterOuterAlt($localContext, 6);
		        	    $this->setState(603);
		        	    $this->match(self::FLOAT);
		        	break;

		        	case 7:
		        	    $this->enterOuterAlt($localContext, 7);
		        	    $this->setState(604);
		        	    $this->match(self::STRING);
		        	break;

		        	case 8:
		        	    $this->enterOuterAlt($localContext, 8);
		        	    $this->setState(605);
		        	    $this->match(self::RUNE);
		        	break;

		        	case 9:
		        	    $this->enterOuterAlt($localContext, 9);
		        	    $this->setState(606);
		        	    $this->match(self::TRUE);
		        	break;

		        	case 10:
		        	    $this->enterOuterAlt($localContext, 10);
		        	    $this->setState(607);
		        	    $this->match(self::FALSE);
		        	break;

		        	case 11:
		        	    $this->enterOuterAlt($localContext, 11);
		        	    $this->setState(608);
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

		    $this->enterRule($localContext, 94, self::RULE_type);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(611);

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

	    public function sliceType(): ?SliceTypeContext
	    {
	    	return $this->getTypedRuleContext(SliceTypeContext::class, 0);
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

	    public function sliceType(): ?SliceTypeContext
	    {
	    	return $this->getTypedRuleContext(SliceTypeContext::class, 0);
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

	    public function sliceType(): ?SliceTypeContext
	    {
	    	return $this->getTypedRuleContext(SliceTypeContext::class, 0);
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

	class SliceTypeContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_sliceType;
	    }

	    public function type(): ?TypeContext
	    {
	    	return $this->getTypedRuleContext(TypeContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterSliceType($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitSliceType($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitSliceType($this);
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

	    public function idList(): ?IdListContext
	    {
	    	return $this->getTypedRuleContext(IdListContext::class, 0);
	    }

	    public function expList(): ?ExpListContext
	    {
	    	return $this->getTypedRuleContext(ExpListContext::class, 0);
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