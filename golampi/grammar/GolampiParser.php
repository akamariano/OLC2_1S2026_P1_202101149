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
               RULE_breakStmt = 29, RULE_continueStmt = 30, RULE_returnStmt = 31, 
               RULE_functionCall = 32, RULE_qualifiedName = 33, RULE_argList = 34, 
               RULE_argItem = 35, RULE_expression = 36, RULE_logicalOr = 37, 
               RULE_logicalAnd = 38, RULE_equality = 39, RULE_comparison = 40, 
               RULE_term = 41, RULE_factor = 42, RULE_unary = 43, RULE_primary = 44, 
               RULE_type = 45;

		/**
		 * @var array<string>
		 */
		public const RULE_NAMES = [
			'program', 'functionDecl', 'paramList', 'param', 'returnType', 'multiReturnType', 
			'block', 'statement', 'varDecl', 'varShortDecl', 'constDecl', 'idList', 
			'expList', 'arrayType', 'arrayLiteral', 'arrayElements', 'arrayRowElements', 
			'arrayAccess', 'ptrAssign', 'arrayAssign', 'assignment', 'assignOp', 
			'ifStmt', 'forStmt', 'forInit', 'forPost', 'switchStmt', 'caseClause', 
			'defaultClause', 'breakStmt', 'continueStmt', 'returnStmt', 'functionCall', 
			'qualifiedName', 'argList', 'argItem', 'expression', 'logicalOr', 'logicalAnd', 
			'equality', 'comparison', 'term', 'factor', 'unary', 'primary', 'type'
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
			[4, 1, 61, 560, 2, 0, 7, 0, 2, 1, 7, 1, 2, 2, 7, 2, 2, 3, 7, 3, 2, 4, 
		    7, 4, 2, 5, 7, 5, 2, 6, 7, 6, 2, 7, 7, 7, 2, 8, 7, 8, 2, 9, 7, 9, 
		    2, 10, 7, 10, 2, 11, 7, 11, 2, 12, 7, 12, 2, 13, 7, 13, 2, 14, 7, 
		    14, 2, 15, 7, 15, 2, 16, 7, 16, 2, 17, 7, 17, 2, 18, 7, 18, 2, 19, 
		    7, 19, 2, 20, 7, 20, 2, 21, 7, 21, 2, 22, 7, 22, 2, 23, 7, 23, 2, 
		    24, 7, 24, 2, 25, 7, 25, 2, 26, 7, 26, 2, 27, 7, 27, 2, 28, 7, 28, 
		    2, 29, 7, 29, 2, 30, 7, 30, 2, 31, 7, 31, 2, 32, 7, 32, 2, 33, 7, 
		    33, 2, 34, 7, 34, 2, 35, 7, 35, 2, 36, 7, 36, 2, 37, 7, 37, 2, 38, 
		    7, 38, 2, 39, 7, 39, 2, 40, 7, 40, 2, 41, 7, 41, 2, 42, 7, 42, 2, 
		    43, 7, 43, 2, 44, 7, 44, 2, 45, 7, 45, 1, 0, 4, 0, 94, 8, 0, 11, 0, 
		    12, 0, 95, 1, 0, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 3, 1, 104, 8, 1, 1, 
		    1, 1, 1, 3, 1, 108, 8, 1, 1, 1, 1, 1, 1, 2, 1, 2, 1, 2, 5, 2, 115, 
		    8, 2, 10, 2, 12, 2, 118, 9, 2, 1, 3, 1, 3, 1, 3, 1, 3, 1, 3, 1, 3, 
		    1, 3, 1, 3, 1, 3, 1, 3, 3, 3, 130, 8, 3, 1, 4, 1, 4, 1, 4, 1, 4, 1, 
		    4, 1, 4, 1, 4, 1, 4, 1, 4, 1, 4, 5, 4, 142, 8, 4, 10, 4, 12, 4, 145, 
		    9, 4, 1, 4, 1, 4, 3, 4, 149, 8, 4, 1, 5, 1, 5, 1, 5, 1, 5, 1, 5, 1, 
		    5, 3, 5, 157, 8, 5, 1, 6, 1, 6, 5, 6, 161, 8, 6, 10, 6, 12, 6, 164, 
		    9, 6, 1, 6, 1, 6, 1, 7, 1, 7, 1, 7, 1, 7, 1, 7, 1, 7, 1, 7, 1, 7, 
		    1, 7, 1, 7, 1, 7, 1, 7, 1, 7, 1, 7, 3, 7, 182, 8, 7, 1, 7, 1, 7, 3, 
		    7, 186, 8, 7, 3, 7, 188, 8, 7, 1, 8, 1, 8, 1, 8, 1, 8, 1, 8, 3, 8, 
		    195, 8, 8, 1, 8, 3, 8, 198, 8, 8, 1, 8, 1, 8, 1, 8, 1, 8, 1, 8, 3, 
		    8, 205, 8, 8, 1, 8, 3, 8, 208, 8, 8, 1, 8, 1, 8, 1, 8, 1, 8, 1, 8, 
		    1, 8, 3, 8, 216, 8, 8, 1, 8, 1, 8, 1, 8, 1, 8, 1, 8, 3, 8, 223, 8, 
		    8, 1, 8, 1, 8, 1, 8, 1, 8, 1, 8, 3, 8, 230, 8, 8, 3, 8, 232, 8, 8, 
		    1, 9, 1, 9, 1, 9, 1, 9, 3, 9, 238, 8, 9, 1, 9, 1, 9, 1, 9, 1, 9, 3, 
		    9, 244, 8, 9, 3, 9, 246, 8, 9, 1, 10, 1, 10, 1, 10, 1, 10, 1, 10, 
		    1, 10, 3, 10, 254, 8, 10, 1, 11, 1, 11, 1, 11, 5, 11, 259, 8, 11, 
		    10, 11, 12, 11, 262, 9, 11, 1, 12, 1, 12, 1, 12, 5, 12, 267, 8, 12, 
		    10, 12, 12, 12, 270, 9, 12, 1, 13, 1, 13, 1, 13, 1, 13, 1, 13, 1, 
		    13, 1, 13, 1, 13, 3, 13, 280, 8, 13, 1, 14, 1, 14, 1, 14, 1, 14, 1, 
		    14, 1, 14, 3, 14, 288, 8, 14, 1, 14, 1, 14, 1, 14, 1, 14, 1, 14, 1, 
		    14, 1, 14, 1, 14, 3, 14, 298, 8, 14, 1, 14, 1, 14, 3, 14, 302, 8, 
		    14, 1, 15, 1, 15, 1, 15, 5, 15, 307, 8, 15, 10, 15, 12, 15, 310, 9, 
		    15, 1, 16, 1, 16, 3, 16, 314, 8, 16, 1, 16, 1, 16, 1, 16, 1, 16, 3, 
		    16, 320, 8, 16, 1, 16, 5, 16, 323, 8, 16, 10, 16, 12, 16, 326, 9, 
		    16, 1, 17, 1, 17, 1, 17, 1, 17, 1, 17, 4, 17, 333, 8, 17, 11, 17, 
		    12, 17, 334, 1, 18, 1, 18, 1, 18, 1, 18, 1, 18, 3, 18, 342, 8, 18, 
		    1, 19, 1, 19, 1, 19, 1, 19, 1, 19, 4, 19, 349, 8, 19, 11, 19, 12, 
		    19, 350, 1, 19, 1, 19, 1, 19, 3, 19, 356, 8, 19, 1, 20, 1, 20, 1, 
		    20, 1, 20, 3, 20, 362, 8, 20, 1, 21, 1, 21, 1, 22, 1, 22, 1, 22, 1, 
		    22, 1, 22, 1, 22, 3, 22, 372, 8, 22, 3, 22, 374, 8, 22, 1, 23, 1, 
		    23, 1, 23, 1, 23, 1, 23, 1, 23, 1, 23, 1, 23, 1, 23, 1, 23, 1, 23, 
		    1, 23, 1, 23, 1, 23, 3, 23, 390, 8, 23, 1, 24, 1, 24, 1, 24, 1, 24, 
		    1, 24, 1, 24, 3, 24, 398, 8, 24, 1, 25, 1, 25, 1, 25, 1, 25, 1, 25, 
		    1, 25, 1, 25, 3, 25, 407, 8, 25, 1, 26, 1, 26, 1, 26, 1, 26, 5, 26, 
		    413, 8, 26, 10, 26, 12, 26, 416, 9, 26, 1, 26, 3, 26, 419, 8, 26, 
		    1, 26, 1, 26, 1, 27, 1, 27, 1, 27, 1, 27, 5, 27, 427, 8, 27, 10, 27, 
		    12, 27, 430, 9, 27, 1, 28, 1, 28, 1, 28, 5, 28, 435, 8, 28, 10, 28, 
		    12, 28, 438, 9, 28, 1, 29, 1, 29, 3, 29, 442, 8, 29, 1, 30, 1, 30, 
		    3, 30, 446, 8, 30, 1, 31, 1, 31, 3, 31, 450, 8, 31, 1, 31, 3, 31, 
		    453, 8, 31, 1, 32, 1, 32, 1, 32, 3, 32, 458, 8, 32, 1, 32, 1, 32, 
		    1, 33, 1, 33, 1, 33, 5, 33, 465, 8, 33, 10, 33, 12, 33, 468, 9, 33, 
		    1, 34, 1, 34, 1, 34, 5, 34, 473, 8, 34, 10, 34, 12, 34, 476, 9, 34, 
		    1, 35, 1, 35, 1, 35, 3, 35, 481, 8, 35, 1, 36, 1, 36, 1, 37, 1, 37, 
		    1, 37, 5, 37, 488, 8, 37, 10, 37, 12, 37, 491, 9, 37, 1, 38, 1, 38, 
		    1, 38, 5, 38, 496, 8, 38, 10, 38, 12, 38, 499, 9, 38, 1, 39, 1, 39, 
		    1, 39, 5, 39, 504, 8, 39, 10, 39, 12, 39, 507, 9, 39, 1, 40, 1, 40, 
		    1, 40, 5, 40, 512, 8, 40, 10, 40, 12, 40, 515, 9, 40, 1, 41, 1, 41, 
		    1, 41, 5, 41, 520, 8, 41, 10, 41, 12, 41, 523, 9, 41, 1, 42, 1, 42, 
		    1, 42, 5, 42, 528, 8, 42, 10, 42, 12, 42, 531, 9, 42, 1, 43, 1, 43, 
		    1, 43, 1, 43, 1, 43, 1, 43, 1, 43, 3, 43, 540, 8, 43, 1, 44, 1, 44, 
		    1, 44, 1, 44, 1, 44, 1, 44, 1, 44, 1, 44, 1, 44, 1, 44, 1, 44, 1, 
		    44, 1, 44, 1, 44, 3, 44, 556, 8, 44, 1, 45, 1, 45, 1, 45, 0, 0, 46, 
		    0, 2, 4, 6, 8, 10, 12, 14, 16, 18, 20, 22, 24, 26, 28, 30, 32, 34, 
		    36, 38, 40, 42, 44, 46, 48, 50, 52, 54, 56, 58, 60, 62, 64, 66, 68, 
		    70, 72, 74, 76, 78, 80, 82, 84, 86, 88, 90, 0, 6, 2, 0, 7, 7, 35, 
		    38, 1, 0, 41, 42, 1, 0, 43, 46, 1, 0, 47, 48, 1, 0, 49, 51, 1, 0, 
		    30, 34, 612, 0, 93, 1, 0, 0, 0, 2, 99, 1, 0, 0, 0, 4, 111, 1, 0, 0, 
		    0, 6, 129, 1, 0, 0, 0, 8, 148, 1, 0, 0, 0, 10, 156, 1, 0, 0, 0, 12, 
		    158, 1, 0, 0, 0, 14, 187, 1, 0, 0, 0, 16, 231, 1, 0, 0, 0, 18, 245, 
		    1, 0, 0, 0, 20, 247, 1, 0, 0, 0, 22, 255, 1, 0, 0, 0, 24, 263, 1, 
		    0, 0, 0, 26, 279, 1, 0, 0, 0, 28, 301, 1, 0, 0, 0, 30, 303, 1, 0, 
		    0, 0, 32, 311, 1, 0, 0, 0, 34, 327, 1, 0, 0, 0, 36, 336, 1, 0, 0, 
		    0, 38, 343, 1, 0, 0, 0, 40, 357, 1, 0, 0, 0, 42, 363, 1, 0, 0, 0, 
		    44, 365, 1, 0, 0, 0, 46, 389, 1, 0, 0, 0, 48, 397, 1, 0, 0, 0, 50, 
		    406, 1, 0, 0, 0, 52, 408, 1, 0, 0, 0, 54, 422, 1, 0, 0, 0, 56, 431, 
		    1, 0, 0, 0, 58, 439, 1, 0, 0, 0, 60, 443, 1, 0, 0, 0, 62, 447, 1, 
		    0, 0, 0, 64, 454, 1, 0, 0, 0, 66, 461, 1, 0, 0, 0, 68, 469, 1, 0, 
		    0, 0, 70, 480, 1, 0, 0, 0, 72, 482, 1, 0, 0, 0, 74, 484, 1, 0, 0, 
		    0, 76, 492, 1, 0, 0, 0, 78, 500, 1, 0, 0, 0, 80, 508, 1, 0, 0, 0, 
		    82, 516, 1, 0, 0, 0, 84, 524, 1, 0, 0, 0, 86, 539, 1, 0, 0, 0, 88, 
		    555, 1, 0, 0, 0, 90, 557, 1, 0, 0, 0, 92, 94, 3, 2, 1, 0, 93, 92, 
		    1, 0, 0, 0, 94, 95, 1, 0, 0, 0, 95, 93, 1, 0, 0, 0, 95, 96, 1, 0, 
		    0, 0, 96, 97, 1, 0, 0, 0, 97, 98, 5, 0, 0, 1, 98, 1, 1, 0, 0, 0, 99, 
		    100, 5, 15, 0, 0, 100, 101, 5, 54, 0, 0, 101, 103, 5, 1, 0, 0, 102, 
		    104, 3, 4, 2, 0, 103, 102, 1, 0, 0, 0, 103, 104, 1, 0, 0, 0, 104, 
		    105, 1, 0, 0, 0, 105, 107, 5, 2, 0, 0, 106, 108, 3, 8, 4, 0, 107, 
		    106, 1, 0, 0, 0, 107, 108, 1, 0, 0, 0, 108, 109, 1, 0, 0, 0, 109, 
		    110, 3, 12, 6, 0, 110, 3, 1, 0, 0, 0, 111, 116, 3, 6, 3, 0, 112, 113, 
		    5, 3, 0, 0, 113, 115, 3, 6, 3, 0, 114, 112, 1, 0, 0, 0, 115, 118, 
		    1, 0, 0, 0, 116, 114, 1, 0, 0, 0, 116, 117, 1, 0, 0, 0, 117, 5, 1, 
		    0, 0, 0, 118, 116, 1, 0, 0, 0, 119, 120, 5, 54, 0, 0, 120, 130, 3, 
		    90, 45, 0, 121, 122, 5, 54, 0, 0, 122, 123, 5, 49, 0, 0, 123, 130, 
		    3, 90, 45, 0, 124, 125, 5, 54, 0, 0, 125, 126, 5, 49, 0, 0, 126, 130, 
		    3, 26, 13, 0, 127, 128, 5, 54, 0, 0, 128, 130, 3, 26, 13, 0, 129, 
		    119, 1, 0, 0, 0, 129, 121, 1, 0, 0, 0, 129, 124, 1, 0, 0, 0, 129, 
		    127, 1, 0, 0, 0, 130, 7, 1, 0, 0, 0, 131, 149, 3, 90, 45, 0, 132, 
		    149, 3, 26, 13, 0, 133, 134, 5, 49, 0, 0, 134, 149, 3, 90, 45, 0, 
		    135, 136, 5, 49, 0, 0, 136, 149, 3, 26, 13, 0, 137, 138, 5, 1, 0, 
		    0, 138, 143, 3, 10, 5, 0, 139, 140, 5, 3, 0, 0, 140, 142, 3, 10, 5, 
		    0, 141, 139, 1, 0, 0, 0, 142, 145, 1, 0, 0, 0, 143, 141, 1, 0, 0, 
		    0, 143, 144, 1, 0, 0, 0, 144, 146, 1, 0, 0, 0, 145, 143, 1, 0, 0, 
		    0, 146, 147, 5, 2, 0, 0, 147, 149, 1, 0, 0, 0, 148, 131, 1, 0, 0, 
		    0, 148, 132, 1, 0, 0, 0, 148, 133, 1, 0, 0, 0, 148, 135, 1, 0, 0, 
		    0, 148, 137, 1, 0, 0, 0, 149, 9, 1, 0, 0, 0, 150, 157, 3, 90, 45, 
		    0, 151, 157, 3, 26, 13, 0, 152, 153, 5, 49, 0, 0, 153, 157, 3, 90, 
		    45, 0, 154, 155, 5, 49, 0, 0, 155, 157, 3, 26, 13, 0, 156, 150, 1, 
		    0, 0, 0, 156, 151, 1, 0, 0, 0, 156, 152, 1, 0, 0, 0, 156, 154, 1, 
		    0, 0, 0, 157, 11, 1, 0, 0, 0, 158, 162, 5, 4, 0, 0, 159, 161, 3, 14, 
		    7, 0, 160, 159, 1, 0, 0, 0, 161, 164, 1, 0, 0, 0, 162, 160, 1, 0, 
		    0, 0, 162, 163, 1, 0, 0, 0, 163, 165, 1, 0, 0, 0, 164, 162, 1, 0, 
		    0, 0, 165, 166, 5, 5, 0, 0, 166, 13, 1, 0, 0, 0, 167, 188, 3, 16, 
		    8, 0, 168, 188, 3, 18, 9, 0, 169, 188, 3, 20, 10, 0, 170, 188, 3, 
		    36, 18, 0, 171, 188, 3, 38, 19, 0, 172, 188, 3, 40, 20, 0, 173, 188, 
		    3, 44, 22, 0, 174, 188, 3, 46, 23, 0, 175, 188, 3, 52, 26, 0, 176, 
		    188, 3, 58, 29, 0, 177, 188, 3, 60, 30, 0, 178, 188, 3, 62, 31, 0, 
		    179, 181, 3, 64, 32, 0, 180, 182, 5, 6, 0, 0, 181, 180, 1, 0, 0, 0, 
		    181, 182, 1, 0, 0, 0, 182, 188, 1, 0, 0, 0, 183, 185, 3, 72, 36, 0, 
		    184, 186, 5, 6, 0, 0, 185, 184, 1, 0, 0, 0, 185, 186, 1, 0, 0, 0, 
		    186, 188, 1, 0, 0, 0, 187, 167, 1, 0, 0, 0, 187, 168, 1, 0, 0, 0, 
		    187, 169, 1, 0, 0, 0, 187, 170, 1, 0, 0, 0, 187, 171, 1, 0, 0, 0, 
		    187, 172, 1, 0, 0, 0, 187, 173, 1, 0, 0, 0, 187, 174, 1, 0, 0, 0, 
		    187, 175, 1, 0, 0, 0, 187, 176, 1, 0, 0, 0, 187, 177, 1, 0, 0, 0, 
		    187, 178, 1, 0, 0, 0, 187, 179, 1, 0, 0, 0, 187, 183, 1, 0, 0, 0, 
		    188, 15, 1, 0, 0, 0, 189, 190, 5, 16, 0, 0, 190, 191, 5, 54, 0, 0, 
		    191, 194, 3, 90, 45, 0, 192, 193, 5, 7, 0, 0, 193, 195, 3, 72, 36, 
		    0, 194, 192, 1, 0, 0, 0, 194, 195, 1, 0, 0, 0, 195, 197, 1, 0, 0, 
		    0, 196, 198, 5, 6, 0, 0, 197, 196, 1, 0, 0, 0, 197, 198, 1, 0, 0, 
		    0, 198, 232, 1, 0, 0, 0, 199, 200, 5, 16, 0, 0, 200, 201, 5, 54, 0, 
		    0, 201, 204, 3, 26, 13, 0, 202, 203, 5, 7, 0, 0, 203, 205, 3, 28, 
		    14, 0, 204, 202, 1, 0, 0, 0, 204, 205, 1, 0, 0, 0, 205, 207, 1, 0, 
		    0, 0, 206, 208, 5, 6, 0, 0, 207, 206, 1, 0, 0, 0, 207, 208, 1, 0, 
		    0, 0, 208, 232, 1, 0, 0, 0, 209, 210, 5, 16, 0, 0, 210, 211, 5, 54, 
		    0, 0, 211, 212, 3, 26, 13, 0, 212, 213, 5, 7, 0, 0, 213, 215, 3, 72, 
		    36, 0, 214, 216, 5, 6, 0, 0, 215, 214, 1, 0, 0, 0, 215, 216, 1, 0, 
		    0, 0, 216, 232, 1, 0, 0, 0, 217, 218, 5, 16, 0, 0, 218, 219, 5, 54, 
		    0, 0, 219, 220, 5, 49, 0, 0, 220, 222, 3, 90, 45, 0, 221, 223, 5, 
		    6, 0, 0, 222, 221, 1, 0, 0, 0, 222, 223, 1, 0, 0, 0, 223, 232, 1, 
		    0, 0, 0, 224, 225, 5, 16, 0, 0, 225, 226, 5, 54, 0, 0, 226, 227, 5, 
		    49, 0, 0, 227, 229, 3, 26, 13, 0, 228, 230, 5, 6, 0, 0, 229, 228, 
		    1, 0, 0, 0, 229, 230, 1, 0, 0, 0, 230, 232, 1, 0, 0, 0, 231, 189, 
		    1, 0, 0, 0, 231, 199, 1, 0, 0, 0, 231, 209, 1, 0, 0, 0, 231, 217, 
		    1, 0, 0, 0, 231, 224, 1, 0, 0, 0, 232, 17, 1, 0, 0, 0, 233, 234, 3, 
		    22, 11, 0, 234, 235, 5, 8, 0, 0, 235, 237, 3, 24, 12, 0, 236, 238, 
		    5, 6, 0, 0, 237, 236, 1, 0, 0, 0, 237, 238, 1, 0, 0, 0, 238, 246, 
		    1, 0, 0, 0, 239, 240, 5, 54, 0, 0, 240, 241, 5, 8, 0, 0, 241, 243, 
		    3, 28, 14, 0, 242, 244, 5, 6, 0, 0, 243, 242, 1, 0, 0, 0, 243, 244, 
		    1, 0, 0, 0, 244, 246, 1, 0, 0, 0, 245, 233, 1, 0, 0, 0, 245, 239, 
		    1, 0, 0, 0, 246, 19, 1, 0, 0, 0, 247, 248, 5, 17, 0, 0, 248, 249, 
		    5, 54, 0, 0, 249, 250, 3, 90, 45, 0, 250, 251, 5, 7, 0, 0, 251, 253, 
		    3, 72, 36, 0, 252, 254, 5, 6, 0, 0, 253, 252, 1, 0, 0, 0, 253, 254, 
		    1, 0, 0, 0, 254, 21, 1, 0, 0, 0, 255, 260, 5, 54, 0, 0, 256, 257, 
		    5, 3, 0, 0, 257, 259, 5, 54, 0, 0, 258, 256, 1, 0, 0, 0, 259, 262, 
		    1, 0, 0, 0, 260, 258, 1, 0, 0, 0, 260, 261, 1, 0, 0, 0, 261, 23, 1, 
		    0, 0, 0, 262, 260, 1, 0, 0, 0, 263, 268, 3, 72, 36, 0, 264, 265, 5, 
		    3, 0, 0, 265, 267, 3, 72, 36, 0, 266, 264, 1, 0, 0, 0, 267, 270, 1, 
		    0, 0, 0, 268, 266, 1, 0, 0, 0, 268, 269, 1, 0, 0, 0, 269, 25, 1, 0, 
		    0, 0, 270, 268, 1, 0, 0, 0, 271, 272, 5, 9, 0, 0, 272, 273, 5, 56, 
		    0, 0, 273, 274, 5, 10, 0, 0, 274, 280, 3, 90, 45, 0, 275, 276, 5, 
		    9, 0, 0, 276, 277, 5, 56, 0, 0, 277, 278, 5, 10, 0, 0, 278, 280, 3, 
		    26, 13, 0, 279, 271, 1, 0, 0, 0, 279, 275, 1, 0, 0, 0, 280, 27, 1, 
		    0, 0, 0, 281, 282, 5, 9, 0, 0, 282, 283, 5, 56, 0, 0, 283, 284, 5, 
		    10, 0, 0, 284, 285, 3, 90, 45, 0, 285, 287, 5, 4, 0, 0, 286, 288, 
		    3, 30, 15, 0, 287, 286, 1, 0, 0, 0, 287, 288, 1, 0, 0, 0, 288, 289, 
		    1, 0, 0, 0, 289, 290, 5, 5, 0, 0, 290, 302, 1, 0, 0, 0, 291, 292, 
		    5, 9, 0, 0, 292, 293, 5, 56, 0, 0, 293, 294, 5, 10, 0, 0, 294, 295, 
		    3, 26, 13, 0, 295, 297, 5, 4, 0, 0, 296, 298, 3, 32, 16, 0, 297, 296, 
		    1, 0, 0, 0, 297, 298, 1, 0, 0, 0, 298, 299, 1, 0, 0, 0, 299, 300, 
		    5, 5, 0, 0, 300, 302, 1, 0, 0, 0, 301, 281, 1, 0, 0, 0, 301, 291, 
		    1, 0, 0, 0, 302, 29, 1, 0, 0, 0, 303, 308, 3, 72, 36, 0, 304, 305, 
		    5, 3, 0, 0, 305, 307, 3, 72, 36, 0, 306, 304, 1, 0, 0, 0, 307, 310, 
		    1, 0, 0, 0, 308, 306, 1, 0, 0, 0, 308, 309, 1, 0, 0, 0, 309, 31, 1, 
		    0, 0, 0, 310, 308, 1, 0, 0, 0, 311, 313, 5, 4, 0, 0, 312, 314, 3, 
		    30, 15, 0, 313, 312, 1, 0, 0, 0, 313, 314, 1, 0, 0, 0, 314, 315, 1, 
		    0, 0, 0, 315, 324, 5, 5, 0, 0, 316, 317, 5, 3, 0, 0, 317, 319, 5, 
		    4, 0, 0, 318, 320, 3, 30, 15, 0, 319, 318, 1, 0, 0, 0, 319, 320, 1, 
		    0, 0, 0, 320, 321, 1, 0, 0, 0, 321, 323, 5, 5, 0, 0, 322, 316, 1, 
		    0, 0, 0, 323, 326, 1, 0, 0, 0, 324, 322, 1, 0, 0, 0, 324, 325, 1, 
		    0, 0, 0, 325, 33, 1, 0, 0, 0, 326, 324, 1, 0, 0, 0, 327, 332, 5, 54, 
		    0, 0, 328, 329, 5, 9, 0, 0, 329, 330, 3, 72, 36, 0, 330, 331, 5, 10, 
		    0, 0, 331, 333, 1, 0, 0, 0, 332, 328, 1, 0, 0, 0, 333, 334, 1, 0, 
		    0, 0, 334, 332, 1, 0, 0, 0, 334, 335, 1, 0, 0, 0, 335, 35, 1, 0, 0, 
		    0, 336, 337, 5, 49, 0, 0, 337, 338, 5, 54, 0, 0, 338, 339, 3, 42, 
		    21, 0, 339, 341, 3, 72, 36, 0, 340, 342, 5, 6, 0, 0, 341, 340, 1, 
		    0, 0, 0, 341, 342, 1, 0, 0, 0, 342, 37, 1, 0, 0, 0, 343, 348, 5, 54, 
		    0, 0, 344, 345, 5, 9, 0, 0, 345, 346, 3, 72, 36, 0, 346, 347, 5, 10, 
		    0, 0, 347, 349, 1, 0, 0, 0, 348, 344, 1, 0, 0, 0, 349, 350, 1, 0, 
		    0, 0, 350, 348, 1, 0, 0, 0, 350, 351, 1, 0, 0, 0, 351, 352, 1, 0, 
		    0, 0, 352, 353, 3, 42, 21, 0, 353, 355, 3, 72, 36, 0, 354, 356, 5, 
		    6, 0, 0, 355, 354, 1, 0, 0, 0, 355, 356, 1, 0, 0, 0, 356, 39, 1, 0, 
		    0, 0, 357, 358, 5, 54, 0, 0, 358, 359, 3, 42, 21, 0, 359, 361, 3, 
		    72, 36, 0, 360, 362, 5, 6, 0, 0, 361, 360, 1, 0, 0, 0, 361, 362, 1, 
		    0, 0, 0, 362, 41, 1, 0, 0, 0, 363, 364, 7, 0, 0, 0, 364, 43, 1, 0, 
		    0, 0, 365, 366, 5, 18, 0, 0, 366, 367, 3, 72, 36, 0, 367, 373, 3, 
		    12, 6, 0, 368, 371, 5, 19, 0, 0, 369, 372, 3, 44, 22, 0, 370, 372, 
		    3, 12, 6, 0, 371, 369, 1, 0, 0, 0, 371, 370, 1, 0, 0, 0, 372, 374, 
		    1, 0, 0, 0, 373, 368, 1, 0, 0, 0, 373, 374, 1, 0, 0, 0, 374, 45, 1, 
		    0, 0, 0, 375, 376, 5, 20, 0, 0, 376, 377, 3, 48, 24, 0, 377, 378, 
		    5, 6, 0, 0, 378, 379, 3, 72, 36, 0, 379, 380, 5, 6, 0, 0, 380, 381, 
		    3, 50, 25, 0, 381, 382, 3, 12, 6, 0, 382, 390, 1, 0, 0, 0, 383, 384, 
		    5, 20, 0, 0, 384, 385, 3, 72, 36, 0, 385, 386, 3, 12, 6, 0, 386, 390, 
		    1, 0, 0, 0, 387, 388, 5, 20, 0, 0, 388, 390, 3, 12, 6, 0, 389, 375, 
		    1, 0, 0, 0, 389, 383, 1, 0, 0, 0, 389, 387, 1, 0, 0, 0, 390, 47, 1, 
		    0, 0, 0, 391, 392, 5, 54, 0, 0, 392, 393, 5, 8, 0, 0, 393, 398, 3, 
		    72, 36, 0, 394, 395, 5, 54, 0, 0, 395, 396, 5, 7, 0, 0, 396, 398, 
		    3, 72, 36, 0, 397, 391, 1, 0, 0, 0, 397, 394, 1, 0, 0, 0, 398, 49, 
		    1, 0, 0, 0, 399, 400, 5, 54, 0, 0, 400, 407, 5, 11, 0, 0, 401, 402, 
		    5, 54, 0, 0, 402, 407, 5, 12, 0, 0, 403, 404, 5, 54, 0, 0, 404, 405, 
		    5, 7, 0, 0, 405, 407, 3, 72, 36, 0, 406, 399, 1, 0, 0, 0, 406, 401, 
		    1, 0, 0, 0, 406, 403, 1, 0, 0, 0, 407, 51, 1, 0, 0, 0, 408, 409, 5, 
		    21, 0, 0, 409, 410, 3, 72, 36, 0, 410, 414, 5, 4, 0, 0, 411, 413, 
		    3, 54, 27, 0, 412, 411, 1, 0, 0, 0, 413, 416, 1, 0, 0, 0, 414, 412, 
		    1, 0, 0, 0, 414, 415, 1, 0, 0, 0, 415, 418, 1, 0, 0, 0, 416, 414, 
		    1, 0, 0, 0, 417, 419, 3, 56, 28, 0, 418, 417, 1, 0, 0, 0, 418, 419, 
		    1, 0, 0, 0, 419, 420, 1, 0, 0, 0, 420, 421, 5, 5, 0, 0, 421, 53, 1, 
		    0, 0, 0, 422, 423, 5, 22, 0, 0, 423, 424, 3, 24, 12, 0, 424, 428, 
		    5, 13, 0, 0, 425, 427, 3, 14, 7, 0, 426, 425, 1, 0, 0, 0, 427, 430, 
		    1, 0, 0, 0, 428, 426, 1, 0, 0, 0, 428, 429, 1, 0, 0, 0, 429, 55, 1, 
		    0, 0, 0, 430, 428, 1, 0, 0, 0, 431, 432, 5, 23, 0, 0, 432, 436, 5, 
		    13, 0, 0, 433, 435, 3, 14, 7, 0, 434, 433, 1, 0, 0, 0, 435, 438, 1, 
		    0, 0, 0, 436, 434, 1, 0, 0, 0, 436, 437, 1, 0, 0, 0, 437, 57, 1, 0, 
		    0, 0, 438, 436, 1, 0, 0, 0, 439, 441, 5, 24, 0, 0, 440, 442, 5, 6, 
		    0, 0, 441, 440, 1, 0, 0, 0, 441, 442, 1, 0, 0, 0, 442, 59, 1, 0, 0, 
		    0, 443, 445, 5, 25, 0, 0, 444, 446, 5, 6, 0, 0, 445, 444, 1, 0, 0, 
		    0, 445, 446, 1, 0, 0, 0, 446, 61, 1, 0, 0, 0, 447, 449, 5, 26, 0, 
		    0, 448, 450, 3, 24, 12, 0, 449, 448, 1, 0, 0, 0, 449, 450, 1, 0, 0, 
		    0, 450, 452, 1, 0, 0, 0, 451, 453, 5, 6, 0, 0, 452, 451, 1, 0, 0, 
		    0, 452, 453, 1, 0, 0, 0, 453, 63, 1, 0, 0, 0, 454, 455, 3, 66, 33, 
		    0, 455, 457, 5, 1, 0, 0, 456, 458, 3, 68, 34, 0, 457, 456, 1, 0, 0, 
		    0, 457, 458, 1, 0, 0, 0, 458, 459, 1, 0, 0, 0, 459, 460, 5, 2, 0, 
		    0, 460, 65, 1, 0, 0, 0, 461, 466, 5, 54, 0, 0, 462, 463, 5, 14, 0, 
		    0, 463, 465, 5, 54, 0, 0, 464, 462, 1, 0, 0, 0, 465, 468, 1, 0, 0, 
		    0, 466, 464, 1, 0, 0, 0, 466, 467, 1, 0, 0, 0, 467, 67, 1, 0, 0, 0, 
		    468, 466, 1, 0, 0, 0, 469, 474, 3, 70, 35, 0, 470, 471, 5, 3, 0, 0, 
		    471, 473, 3, 70, 35, 0, 472, 470, 1, 0, 0, 0, 473, 476, 1, 0, 0, 0, 
		    474, 472, 1, 0, 0, 0, 474, 475, 1, 0, 0, 0, 475, 69, 1, 0, 0, 0, 476, 
		    474, 1, 0, 0, 0, 477, 478, 5, 53, 0, 0, 478, 481, 5, 54, 0, 0, 479, 
		    481, 3, 72, 36, 0, 480, 477, 1, 0, 0, 0, 480, 479, 1, 0, 0, 0, 481, 
		    71, 1, 0, 0, 0, 482, 483, 3, 74, 37, 0, 483, 73, 1, 0, 0, 0, 484, 
		    489, 3, 76, 38, 0, 485, 486, 5, 39, 0, 0, 486, 488, 3, 76, 38, 0, 
		    487, 485, 1, 0, 0, 0, 488, 491, 1, 0, 0, 0, 489, 487, 1, 0, 0, 0, 
		    489, 490, 1, 0, 0, 0, 490, 75, 1, 0, 0, 0, 491, 489, 1, 0, 0, 0, 492, 
		    497, 3, 78, 39, 0, 493, 494, 5, 40, 0, 0, 494, 496, 3, 78, 39, 0, 
		    495, 493, 1, 0, 0, 0, 496, 499, 1, 0, 0, 0, 497, 495, 1, 0, 0, 0, 
		    497, 498, 1, 0, 0, 0, 498, 77, 1, 0, 0, 0, 499, 497, 1, 0, 0, 0, 500, 
		    505, 3, 80, 40, 0, 501, 502, 7, 1, 0, 0, 502, 504, 3, 80, 40, 0, 503, 
		    501, 1, 0, 0, 0, 504, 507, 1, 0, 0, 0, 505, 503, 1, 0, 0, 0, 505, 
		    506, 1, 0, 0, 0, 506, 79, 1, 0, 0, 0, 507, 505, 1, 0, 0, 0, 508, 513, 
		    3, 82, 41, 0, 509, 510, 7, 2, 0, 0, 510, 512, 3, 82, 41, 0, 511, 509, 
		    1, 0, 0, 0, 512, 515, 1, 0, 0, 0, 513, 511, 1, 0, 0, 0, 513, 514, 
		    1, 0, 0, 0, 514, 81, 1, 0, 0, 0, 515, 513, 1, 0, 0, 0, 516, 521, 3, 
		    84, 42, 0, 517, 518, 7, 3, 0, 0, 518, 520, 3, 84, 42, 0, 519, 517, 
		    1, 0, 0, 0, 520, 523, 1, 0, 0, 0, 521, 519, 1, 0, 0, 0, 521, 522, 
		    1, 0, 0, 0, 522, 83, 1, 0, 0, 0, 523, 521, 1, 0, 0, 0, 524, 529, 3, 
		    86, 43, 0, 525, 526, 7, 4, 0, 0, 526, 528, 3, 86, 43, 0, 527, 525, 
		    1, 0, 0, 0, 528, 531, 1, 0, 0, 0, 529, 527, 1, 0, 0, 0, 529, 530, 
		    1, 0, 0, 0, 530, 85, 1, 0, 0, 0, 531, 529, 1, 0, 0, 0, 532, 533, 5, 
		    52, 0, 0, 533, 540, 3, 86, 43, 0, 534, 535, 5, 48, 0, 0, 535, 540, 
		    3, 86, 43, 0, 536, 537, 5, 49, 0, 0, 537, 540, 3, 86, 43, 0, 538, 
		    540, 3, 88, 44, 0, 539, 532, 1, 0, 0, 0, 539, 534, 1, 0, 0, 0, 539, 
		    536, 1, 0, 0, 0, 539, 538, 1, 0, 0, 0, 540, 87, 1, 0, 0, 0, 541, 542, 
		    5, 1, 0, 0, 542, 543, 3, 72, 36, 0, 543, 544, 5, 2, 0, 0, 544, 556, 
		    1, 0, 0, 0, 545, 556, 3, 64, 32, 0, 546, 556, 3, 34, 17, 0, 547, 556, 
		    5, 54, 0, 0, 548, 556, 5, 56, 0, 0, 549, 556, 5, 55, 0, 0, 550, 556, 
		    5, 57, 0, 0, 551, 556, 5, 58, 0, 0, 552, 556, 5, 27, 0, 0, 553, 556, 
		    5, 28, 0, 0, 554, 556, 5, 29, 0, 0, 555, 541, 1, 0, 0, 0, 555, 545, 
		    1, 0, 0, 0, 555, 546, 1, 0, 0, 0, 555, 547, 1, 0, 0, 0, 555, 548, 
		    1, 0, 0, 0, 555, 549, 1, 0, 0, 0, 555, 550, 1, 0, 0, 0, 555, 551, 
		    1, 0, 0, 0, 555, 552, 1, 0, 0, 0, 555, 553, 1, 0, 0, 0, 555, 554, 
		    1, 0, 0, 0, 556, 89, 1, 0, 0, 0, 557, 558, 7, 5, 0, 0, 558, 91, 1, 
		    0, 0, 0, 64, 95, 103, 107, 116, 129, 143, 148, 156, 162, 181, 185, 
		    187, 194, 197, 204, 207, 215, 222, 229, 231, 237, 243, 245, 253, 260, 
		    268, 279, 287, 297, 301, 308, 313, 319, 324, 334, 341, 350, 355, 361, 
		    371, 373, 389, 397, 406, 414, 418, 428, 436, 441, 445, 449, 452, 457, 
		    466, 474, 480, 489, 497, 505, 513, 521, 529, 539, 555];
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
		        $this->setState(93); 
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        do {
		        	$this->setState(92);
		        	$this->functionDecl();
		        	$this->setState(95); 
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        } while ($_la === self::FUNC);
		        $this->setState(97);
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
		        $this->setState(99);
		        $this->match(self::FUNC);
		        $this->setState(100);
		        $this->match(self::ID);
		        $this->setState(101);
		        $this->match(self::T__0);
		        $this->setState(103);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::ID) {
		        	$this->setState(102);
		        	$this->paramList();
		        }
		        $this->setState(105);
		        $this->match(self::T__1);
		        $this->setState(107);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 562983239418370) !== 0)) {
		        	$this->setState(106);
		        	$this->returnType();
		        }
		        $this->setState(109);
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
		        $this->setState(111);
		        $this->param();
		        $this->setState(116);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::T__2) {
		        	$this->setState(112);
		        	$this->match(self::T__2);
		        	$this->setState(113);
		        	$this->param();
		        	$this->setState(118);
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
		        $this->setState(129);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 4, $this->ctx)) {
		        	case 1:
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(119);
		        	    $this->match(self::ID);
		        	    $this->setState(120);
		        	    $this->type();
		        	break;

		        	case 2:
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(121);
		        	    $this->match(self::ID);
		        	    $this->setState(122);
		        	    $this->match(self::STAR);
		        	    $this->setState(123);
		        	    $this->type();
		        	break;

		        	case 3:
		        	    $this->enterOuterAlt($localContext, 3);
		        	    $this->setState(124);
		        	    $this->match(self::ID);
		        	    $this->setState(125);
		        	    $this->match(self::STAR);
		        	    $this->setState(126);
		        	    $this->arrayType();
		        	break;

		        	case 4:
		        	    $this->enterOuterAlt($localContext, 4);
		        	    $this->setState(127);
		        	    $this->match(self::ID);
		        	    $this->setState(128);
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
		        $this->setState(148);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 6, $this->ctx)) {
		        	case 1:
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(131);
		        	    $this->type();
		        	break;

		        	case 2:
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(132);
		        	    $this->arrayType();
		        	break;

		        	case 3:
		        	    $this->enterOuterAlt($localContext, 3);
		        	    $this->setState(133);
		        	    $this->match(self::STAR);
		        	    $this->setState(134);
		        	    $this->type();
		        	break;

		        	case 4:
		        	    $this->enterOuterAlt($localContext, 4);
		        	    $this->setState(135);
		        	    $this->match(self::STAR);
		        	    $this->setState(136);
		        	    $this->arrayType();
		        	break;

		        	case 5:
		        	    $this->enterOuterAlt($localContext, 5);
		        	    $this->setState(137);
		        	    $this->match(self::T__0);
		        	    $this->setState(138);
		        	    $this->multiReturnType();
		        	    $this->setState(143);
		        	    $this->errorHandler->sync($this);

		        	    $_la = $this->input->LA(1);
		        	    while ($_la === self::T__2) {
		        	    	$this->setState(139);
		        	    	$this->match(self::T__2);
		        	    	$this->setState(140);
		        	    	$this->multiReturnType();
		        	    	$this->setState(145);
		        	    	$this->errorHandler->sync($this);
		        	    	$_la = $this->input->LA(1);
		        	    }
		        	    $this->setState(146);
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
		        $this->setState(156);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 7, $this->ctx)) {
		        	case 1:
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(150);
		        	    $this->type();
		        	break;

		        	case 2:
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(151);
		        	    $this->arrayType();
		        	break;

		        	case 3:
		        	    $this->enterOuterAlt($localContext, 3);
		        	    $this->setState(152);
		        	    $this->match(self::STAR);
		        	    $this->setState(153);
		        	    $this->type();
		        	break;

		        	case 4:
		        	    $this->enterOuterAlt($localContext, 4);
		        	    $this->setState(154);
		        	    $this->match(self::STAR);
		        	    $this->setState(155);
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
		        $this->setState(158);
		        $this->match(self::T__3);
		        $this->setState(162);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 563794379412013058) !== 0)) {
		        	$this->setState(159);
		        	$this->statement();
		        	$this->setState(164);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		        $this->setState(165);
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
		        $this->setState(187);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 11, $this->ctx)) {
		        	case 1:
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(167);
		        	    $this->varDecl();
		        	break;

		        	case 2:
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(168);
		        	    $this->varShortDecl();
		        	break;

		        	case 3:
		        	    $this->enterOuterAlt($localContext, 3);
		        	    $this->setState(169);
		        	    $this->constDecl();
		        	break;

		        	case 4:
		        	    $this->enterOuterAlt($localContext, 4);
		        	    $this->setState(170);
		        	    $this->ptrAssign();
		        	break;

		        	case 5:
		        	    $this->enterOuterAlt($localContext, 5);
		        	    $this->setState(171);
		        	    $this->arrayAssign();
		        	break;

		        	case 6:
		        	    $this->enterOuterAlt($localContext, 6);
		        	    $this->setState(172);
		        	    $this->assignment();
		        	break;

		        	case 7:
		        	    $this->enterOuterAlt($localContext, 7);
		        	    $this->setState(173);
		        	    $this->ifStmt();
		        	break;

		        	case 8:
		        	    $this->enterOuterAlt($localContext, 8);
		        	    $this->setState(174);
		        	    $this->forStmt();
		        	break;

		        	case 9:
		        	    $this->enterOuterAlt($localContext, 9);
		        	    $this->setState(175);
		        	    $this->switchStmt();
		        	break;

		        	case 10:
		        	    $this->enterOuterAlt($localContext, 10);
		        	    $this->setState(176);
		        	    $this->breakStmt();
		        	break;

		        	case 11:
		        	    $this->enterOuterAlt($localContext, 11);
		        	    $this->setState(177);
		        	    $this->continueStmt();
		        	break;

		        	case 12:
		        	    $this->enterOuterAlt($localContext, 12);
		        	    $this->setState(178);
		        	    $this->returnStmt();
		        	break;

		        	case 13:
		        	    $this->enterOuterAlt($localContext, 13);
		        	    $this->setState(179);
		        	    $this->functionCall();
		        	    $this->setState(181);
		        	    $this->errorHandler->sync($this);
		        	    $_la = $this->input->LA(1);

		        	    if ($_la === self::T__5) {
		        	    	$this->setState(180);
		        	    	$this->match(self::T__5);
		        	    }
		        	break;

		        	case 14:
		        	    $this->enterOuterAlt($localContext, 14);
		        	    $this->setState(183);
		        	    $this->expression();
		        	    $this->setState(185);
		        	    $this->errorHandler->sync($this);
		        	    $_la = $this->input->LA(1);

		        	    if ($_la === self::T__5) {
		        	    	$this->setState(184);
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
		        $this->setState(231);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 19, $this->ctx)) {
		        	case 1:
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(189);
		        	    $this->match(self::VAR);
		        	    $this->setState(190);
		        	    $this->match(self::ID);
		        	    $this->setState(191);
		        	    $this->type();
		        	    $this->setState(194);
		        	    $this->errorHandler->sync($this);
		        	    $_la = $this->input->LA(1);

		        	    if ($_la === self::T__6) {
		        	    	$this->setState(192);
		        	    	$this->match(self::T__6);
		        	    	$this->setState(193);
		        	    	$this->expression();
		        	    }
		        	    $this->setState(197);
		        	    $this->errorHandler->sync($this);
		        	    $_la = $this->input->LA(1);

		        	    if ($_la === self::T__5) {
		        	    	$this->setState(196);
		        	    	$this->match(self::T__5);
		        	    }
		        	break;

		        	case 2:
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(199);
		        	    $this->match(self::VAR);
		        	    $this->setState(200);
		        	    $this->match(self::ID);
		        	    $this->setState(201);
		        	    $this->arrayType();
		        	    $this->setState(204);
		        	    $this->errorHandler->sync($this);
		        	    $_la = $this->input->LA(1);

		        	    if ($_la === self::T__6) {
		        	    	$this->setState(202);
		        	    	$this->match(self::T__6);
		        	    	$this->setState(203);
		        	    	$this->arrayLiteral();
		        	    }
		        	    $this->setState(207);
		        	    $this->errorHandler->sync($this);
		        	    $_la = $this->input->LA(1);

		        	    if ($_la === self::T__5) {
		        	    	$this->setState(206);
		        	    	$this->match(self::T__5);
		        	    }
		        	break;

		        	case 3:
		        	    $this->enterOuterAlt($localContext, 3);
		        	    $this->setState(209);
		        	    $this->match(self::VAR);
		        	    $this->setState(210);
		        	    $this->match(self::ID);
		        	    $this->setState(211);
		        	    $this->arrayType();
		        	    $this->setState(212);
		        	    $this->match(self::T__6);
		        	    $this->setState(213);
		        	    $this->expression();
		        	    $this->setState(215);
		        	    $this->errorHandler->sync($this);
		        	    $_la = $this->input->LA(1);

		        	    if ($_la === self::T__5) {
		        	    	$this->setState(214);
		        	    	$this->match(self::T__5);
		        	    }
		        	break;

		        	case 4:
		        	    $this->enterOuterAlt($localContext, 4);
		        	    $this->setState(217);
		        	    $this->match(self::VAR);
		        	    $this->setState(218);
		        	    $this->match(self::ID);
		        	    $this->setState(219);
		        	    $this->match(self::STAR);
		        	    $this->setState(220);
		        	    $this->type();
		        	    $this->setState(222);
		        	    $this->errorHandler->sync($this);
		        	    $_la = $this->input->LA(1);

		        	    if ($_la === self::T__5) {
		        	    	$this->setState(221);
		        	    	$this->match(self::T__5);
		        	    }
		        	break;

		        	case 5:
		        	    $this->enterOuterAlt($localContext, 5);
		        	    $this->setState(224);
		        	    $this->match(self::VAR);
		        	    $this->setState(225);
		        	    $this->match(self::ID);
		        	    $this->setState(226);
		        	    $this->match(self::STAR);
		        	    $this->setState(227);
		        	    $this->arrayType();
		        	    $this->setState(229);
		        	    $this->errorHandler->sync($this);
		        	    $_la = $this->input->LA(1);

		        	    if ($_la === self::T__5) {
		        	    	$this->setState(228);
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
		        $this->setState(245);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 22, $this->ctx)) {
		        	case 1:
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(233);
		        	    $this->idList();
		        	    $this->setState(234);
		        	    $this->match(self::T__7);
		        	    $this->setState(235);
		        	    $this->expList();
		        	    $this->setState(237);
		        	    $this->errorHandler->sync($this);
		        	    $_la = $this->input->LA(1);

		        	    if ($_la === self::T__5) {
		        	    	$this->setState(236);
		        	    	$this->match(self::T__5);
		        	    }
		        	break;

		        	case 2:
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(239);
		        	    $this->match(self::ID);
		        	    $this->setState(240);
		        	    $this->match(self::T__7);
		        	    $this->setState(241);
		        	    $this->arrayLiteral();
		        	    $this->setState(243);
		        	    $this->errorHandler->sync($this);
		        	    $_la = $this->input->LA(1);

		        	    if ($_la === self::T__5) {
		        	    	$this->setState(242);
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
		        $this->setState(247);
		        $this->match(self::CONST);
		        $this->setState(248);
		        $this->match(self::ID);
		        $this->setState(249);
		        $this->type();
		        $this->setState(250);
		        $this->match(self::T__6);
		        $this->setState(251);
		        $this->expression();
		        $this->setState(253);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::T__5) {
		        	$this->setState(252);
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
		        $this->setState(255);
		        $this->match(self::ID);
		        $this->setState(260);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::T__2) {
		        	$this->setState(256);
		        	$this->match(self::T__2);
		        	$this->setState(257);
		        	$this->match(self::ID);
		        	$this->setState(262);
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
		        $this->setState(263);
		        $this->expression();
		        $this->setState(268);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::T__2) {
		        	$this->setState(264);
		        	$this->match(self::T__2);
		        	$this->setState(265);
		        	$this->expression();
		        	$this->setState(270);
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
		        $this->setState(279);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 26, $this->ctx)) {
		        	case 1:
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(271);
		        	    $this->match(self::T__8);
		        	    $this->setState(272);
		        	    $this->match(self::INT);
		        	    $this->setState(273);
		        	    $this->match(self::T__9);
		        	    $this->setState(274);
		        	    $this->type();
		        	break;

		        	case 2:
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(275);
		        	    $this->match(self::T__8);
		        	    $this->setState(276);
		        	    $this->match(self::INT);
		        	    $this->setState(277);
		        	    $this->match(self::T__9);
		        	    $this->setState(278);
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
		        $this->setState(301);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 29, $this->ctx)) {
		        	case 1:
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(281);
		        	    $this->match(self::T__8);
		        	    $this->setState(282);
		        	    $this->match(self::INT);
		        	    $this->setState(283);
		        	    $this->match(self::T__9);
		        	    $this->setState(284);
		        	    $this->type();
		        	    $this->setState(285);
		        	    $this->match(self::T__3);
		        	    $this->setState(287);
		        	    $this->errorHandler->sync($this);
		        	    $_la = $this->input->LA(1);

		        	    if (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 563794379290968066) !== 0)) {
		        	    	$this->setState(286);
		        	    	$this->arrayElements();
		        	    }
		        	    $this->setState(289);
		        	    $this->match(self::T__4);
		        	break;

		        	case 2:
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(291);
		        	    $this->match(self::T__8);
		        	    $this->setState(292);
		        	    $this->match(self::INT);
		        	    $this->setState(293);
		        	    $this->match(self::T__9);
		        	    $this->setState(294);
		        	    $this->arrayType();
		        	    $this->setState(295);
		        	    $this->match(self::T__3);
		        	    $this->setState(297);
		        	    $this->errorHandler->sync($this);
		        	    $_la = $this->input->LA(1);

		        	    if ($_la === self::T__3) {
		        	    	$this->setState(296);
		        	    	$this->arrayRowElements();
		        	    }
		        	    $this->setState(299);
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
		        $this->setState(303);
		        $this->expression();
		        $this->setState(308);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::T__2) {
		        	$this->setState(304);
		        	$this->match(self::T__2);
		        	$this->setState(305);
		        	$this->expression();
		        	$this->setState(310);
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
		        $this->setState(311);
		        $this->match(self::T__3);
		        $this->setState(313);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 563794379290968066) !== 0)) {
		        	$this->setState(312);
		        	$this->arrayElements();
		        }
		        $this->setState(315);
		        $this->match(self::T__4);
		        $this->setState(324);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::T__2) {
		        	$this->setState(316);
		        	$this->match(self::T__2);
		        	$this->setState(317);
		        	$this->match(self::T__3);
		        	$this->setState(319);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);

		        	if (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 563794379290968066) !== 0)) {
		        		$this->setState(318);
		        		$this->arrayElements();
		        	}
		        	$this->setState(321);
		        	$this->match(self::T__4);
		        	$this->setState(326);
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
		        $this->setState(327);
		        $this->match(self::ID);
		        $this->setState(332); 
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        do {
		        	$this->setState(328);
		        	$this->match(self::T__8);
		        	$this->setState(329);
		        	$this->expression();
		        	$this->setState(330);
		        	$this->match(self::T__9);
		        	$this->setState(334); 
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
		        $this->setState(336);
		        $this->match(self::STAR);
		        $this->setState(337);
		        $this->match(self::ID);
		        $this->setState(338);
		        $this->assignOp();
		        $this->setState(339);
		        $this->expression();
		        $this->setState(341);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::T__5) {
		        	$this->setState(340);
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
		        $this->setState(343);
		        $this->match(self::ID);
		        $this->setState(348); 
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        do {
		        	$this->setState(344);
		        	$this->match(self::T__8);
		        	$this->setState(345);
		        	$this->expression();
		        	$this->setState(346);
		        	$this->match(self::T__9);
		        	$this->setState(350); 
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        } while ($_la === self::T__8);
		        $this->setState(352);
		        $this->assignOp();
		        $this->setState(353);
		        $this->expression();
		        $this->setState(355);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::T__5) {
		        	$this->setState(354);
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
		        $this->setState(357);
		        $this->match(self::ID);
		        $this->setState(358);
		        $this->assignOp();
		        $this->setState(359);
		        $this->expression();
		        $this->setState(361);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::T__5) {
		        	$this->setState(360);
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
		        $this->setState(363);

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
		        $this->setState(365);
		        $this->match(self::IF);
		        $this->setState(366);
		        $this->expression();
		        $this->setState(367);
		        $this->block();
		        $this->setState(373);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::ELSE) {
		        	$this->setState(368);
		        	$this->match(self::ELSE);
		        	$this->setState(371);
		        	$this->errorHandler->sync($this);

		        	switch ($this->input->LA(1)) {
		        	    case self::IF:
		        	    	$this->setState(369);
		        	    	$this->ifStmt();
		        	    	break;

		        	    case self::T__3:
		        	    	$this->setState(370);
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
		        $this->setState(389);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 41, $this->ctx)) {
		        	case 1:
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(375);
		        	    $this->match(self::FOR);
		        	    $this->setState(376);
		        	    $this->forInit();
		        	    $this->setState(377);
		        	    $this->match(self::T__5);
		        	    $this->setState(378);
		        	    $this->expression();
		        	    $this->setState(379);
		        	    $this->match(self::T__5);
		        	    $this->setState(380);
		        	    $this->forPost();
		        	    $this->setState(381);
		        	    $this->block();
		        	break;

		        	case 2:
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(383);
		        	    $this->match(self::FOR);
		        	    $this->setState(384);
		        	    $this->expression();
		        	    $this->setState(385);
		        	    $this->block();
		        	break;

		        	case 3:
		        	    $this->enterOuterAlt($localContext, 3);
		        	    $this->setState(387);
		        	    $this->match(self::FOR);
		        	    $this->setState(388);
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
		        $this->setState(397);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 42, $this->ctx)) {
		        	case 1:
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(391);
		        	    $this->match(self::ID);
		        	    $this->setState(392);
		        	    $this->match(self::T__7);
		        	    $this->setState(393);
		        	    $this->expression();
		        	break;

		        	case 2:
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(394);
		        	    $this->match(self::ID);
		        	    $this->setState(395);
		        	    $this->match(self::T__6);
		        	    $this->setState(396);
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
		        $this->setState(406);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 43, $this->ctx)) {
		        	case 1:
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(399);
		        	    $this->match(self::ID);
		        	    $this->setState(400);
		        	    $this->match(self::T__10);
		        	break;

		        	case 2:
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(401);
		        	    $this->match(self::ID);
		        	    $this->setState(402);
		        	    $this->match(self::T__11);
		        	break;

		        	case 3:
		        	    $this->enterOuterAlt($localContext, 3);
		        	    $this->setState(403);
		        	    $this->match(self::ID);
		        	    $this->setState(404);
		        	    $this->match(self::T__6);
		        	    $this->setState(405);
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
		        $this->setState(408);
		        $this->match(self::SWITCH);
		        $this->setState(409);
		        $this->expression();
		        $this->setState(410);
		        $this->match(self::T__3);
		        $this->setState(414);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::CASE) {
		        	$this->setState(411);
		        	$this->caseClause();
		        	$this->setState(416);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		        $this->setState(418);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::DEFAULT) {
		        	$this->setState(417);
		        	$this->defaultClause();
		        }
		        $this->setState(420);
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
		        $this->setState(422);
		        $this->match(self::CASE);
		        $this->setState(423);
		        $this->expList();
		        $this->setState(424);
		        $this->match(self::T__12);
		        $this->setState(428);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 563794379412013058) !== 0)) {
		        	$this->setState(425);
		        	$this->statement();
		        	$this->setState(430);
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
		        $this->setState(431);
		        $this->match(self::DEFAULT);
		        $this->setState(432);
		        $this->match(self::T__12);
		        $this->setState(436);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 563794379412013058) !== 0)) {
		        	$this->setState(433);
		        	$this->statement();
		        	$this->setState(438);
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
		        $this->setState(439);
		        $this->match(self::BREAK);
		        $this->setState(441);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::T__5) {
		        	$this->setState(440);
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
		        $this->setState(443);
		        $this->match(self::CONTINUE);
		        $this->setState(445);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::T__5) {
		        	$this->setState(444);
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
		public function returnStmt(): Context\ReturnStmtContext
		{
		    $localContext = new Context\ReturnStmtContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 62, self::RULE_returnStmt);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(447);
		        $this->match(self::RETURN);
		        $this->setState(449);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 50, $this->ctx)) {
		            case 1:
		        	    $this->setState(448);
		        	    $this->expList();
		        	break;
		        }
		        $this->setState(452);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::T__5) {
		        	$this->setState(451);
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

		    $this->enterRule($localContext, 64, self::RULE_functionCall);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(454);
		        $this->qualifiedName();
		        $this->setState(455);
		        $this->match(self::T__0);
		        $this->setState(457);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 572801578545709058) !== 0)) {
		        	$this->setState(456);
		        	$this->argList();
		        }
		        $this->setState(459);
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

		    $this->enterRule($localContext, 66, self::RULE_qualifiedName);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(461);
		        $this->match(self::ID);
		        $this->setState(466);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::T__13) {
		        	$this->setState(462);
		        	$this->match(self::T__13);
		        	$this->setState(463);
		        	$this->match(self::ID);
		        	$this->setState(468);
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

		    $this->enterRule($localContext, 68, self::RULE_argList);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(469);
		        $this->argItem();
		        $this->setState(474);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::T__2) {
		        	$this->setState(470);
		        	$this->match(self::T__2);
		        	$this->setState(471);
		        	$this->argItem();
		        	$this->setState(476);
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

		    $this->enterRule($localContext, 70, self::RULE_argItem);

		    try {
		        $this->setState(480);
		        $this->errorHandler->sync($this);

		        switch ($this->input->LA(1)) {
		            case self::REF:
		            	$this->enterOuterAlt($localContext, 1);
		            	$this->setState(477);
		            	$this->match(self::REF);
		            	$this->setState(478);
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
		            	$this->setState(479);
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

		    $this->enterRule($localContext, 72, self::RULE_expression);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(482);
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

		    $this->enterRule($localContext, 74, self::RULE_logicalOr);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(484);
		        $this->logicalAnd();
		        $this->setState(489);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::OR) {
		        	$this->setState(485);
		        	$this->match(self::OR);
		        	$this->setState(486);
		        	$this->logicalAnd();
		        	$this->setState(491);
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

		    $this->enterRule($localContext, 76, self::RULE_logicalAnd);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(492);
		        $this->equality();
		        $this->setState(497);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::AND) {
		        	$this->setState(493);
		        	$this->match(self::AND);
		        	$this->setState(494);
		        	$this->equality();
		        	$this->setState(499);
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

		    $this->enterRule($localContext, 78, self::RULE_equality);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(500);
		        $this->comparison();
		        $this->setState(505);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::EQ || $_la === self::NEQ) {
		        	$this->setState(501);

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
		        	$this->setState(502);
		        	$this->comparison();
		        	$this->setState(507);
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

		    $this->enterRule($localContext, 80, self::RULE_comparison);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(508);
		        $this->term();
		        $this->setState(513);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 131941395333120) !== 0)) {
		        	$this->setState(509);

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
		        	$this->setState(510);
		        	$this->term();
		        	$this->setState(515);
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

		    $this->enterRule($localContext, 82, self::RULE_term);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(516);
		        $this->factor();
		        $this->setState(521);
		        $this->errorHandler->sync($this);

		        $alt = $this->getInterpreter()->adaptivePredict($this->input, 60, $this->ctx);

		        while ($alt !== 2 && $alt !== ATN::INVALID_ALT_NUMBER) {
		        	if ($alt === 1) {
		        		$this->setState(517);

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
		        		$this->setState(518);
		        		$this->factor(); 
		        	}

		        	$this->setState(523);
		        	$this->errorHandler->sync($this);

		        	$alt = $this->getInterpreter()->adaptivePredict($this->input, 60, $this->ctx);
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

		    $this->enterRule($localContext, 84, self::RULE_factor);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(524);
		        $this->unary();
		        $this->setState(529);
		        $this->errorHandler->sync($this);

		        $alt = $this->getInterpreter()->adaptivePredict($this->input, 61, $this->ctx);

		        while ($alt !== 2 && $alt !== ATN::INVALID_ALT_NUMBER) {
		        	if ($alt === 1) {
		        		$this->setState(525);

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
		        		$this->setState(526);
		        		$this->unary(); 
		        	}

		        	$this->setState(531);
		        	$this->errorHandler->sync($this);

		        	$alt = $this->getInterpreter()->adaptivePredict($this->input, 61, $this->ctx);
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

		    $this->enterRule($localContext, 86, self::RULE_unary);

		    try {
		        $this->setState(539);
		        $this->errorHandler->sync($this);

		        switch ($this->input->LA(1)) {
		            case self::BANG:
		            	$this->enterOuterAlt($localContext, 1);
		            	$this->setState(532);
		            	$this->match(self::BANG);
		            	$this->setState(533);
		            	$this->unary();
		            	break;

		            case self::MINUS:
		            	$this->enterOuterAlt($localContext, 2);
		            	$this->setState(534);
		            	$this->match(self::MINUS);
		            	$this->setState(535);
		            	$this->unary();
		            	break;

		            case self::STAR:
		            	$this->enterOuterAlt($localContext, 3);
		            	$this->setState(536);
		            	$this->match(self::STAR);
		            	$this->setState(537);
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
		            	$this->setState(538);
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

		    $this->enterRule($localContext, 88, self::RULE_primary);

		    try {
		        $this->setState(555);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 63, $this->ctx)) {
		        	case 1:
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(541);
		        	    $this->match(self::T__0);
		        	    $this->setState(542);
		        	    $this->expression();
		        	    $this->setState(543);
		        	    $this->match(self::T__1);
		        	break;

		        	case 2:
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(545);
		        	    $this->functionCall();
		        	break;

		        	case 3:
		        	    $this->enterOuterAlt($localContext, 3);
		        	    $this->setState(546);
		        	    $this->arrayAccess();
		        	break;

		        	case 4:
		        	    $this->enterOuterAlt($localContext, 4);
		        	    $this->setState(547);
		        	    $this->match(self::ID);
		        	break;

		        	case 5:
		        	    $this->enterOuterAlt($localContext, 5);
		        	    $this->setState(548);
		        	    $this->match(self::INT);
		        	break;

		        	case 6:
		        	    $this->enterOuterAlt($localContext, 6);
		        	    $this->setState(549);
		        	    $this->match(self::FLOAT);
		        	break;

		        	case 7:
		        	    $this->enterOuterAlt($localContext, 7);
		        	    $this->setState(550);
		        	    $this->match(self::STRING);
		        	break;

		        	case 8:
		        	    $this->enterOuterAlt($localContext, 8);
		        	    $this->setState(551);
		        	    $this->match(self::RUNE);
		        	break;

		        	case 9:
		        	    $this->enterOuterAlt($localContext, 9);
		        	    $this->setState(552);
		        	    $this->match(self::TRUE);
		        	break;

		        	case 10:
		        	    $this->enterOuterAlt($localContext, 10);
		        	    $this->setState(553);
		        	    $this->match(self::FALSE);
		        	break;

		        	case 11:
		        	    $this->enterOuterAlt($localContext, 11);
		        	    $this->setState(554);
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

		    $this->enterRule($localContext, 90, self::RULE_type);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(557);

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