// Generated from /home/mariano/OLC2_1S2026_P1_202101149/golampi/grammar/Golampi.g4 by ANTLR 4.13.1
import org.antlr.v4.runtime.atn.*;
import org.antlr.v4.runtime.dfa.DFA;
import org.antlr.v4.runtime.*;
import org.antlr.v4.runtime.misc.*;
import org.antlr.v4.runtime.tree.*;
import java.util.List;
import java.util.Iterator;
import java.util.ArrayList;

@SuppressWarnings({"all", "warnings", "unchecked", "unused", "cast", "CheckReturnValue"})
public class GolampiParser extends Parser {
	static { RuntimeMetaData.checkVersion("4.13.1", RuntimeMetaData.VERSION); }

	protected static final DFA[] _decisionToDFA;
	protected static final PredictionContextCache _sharedContextCache =
		new PredictionContextCache();
	public static final int
		T__0=1, T__1=2, T__2=3, T__3=4, T__4=5, T__5=6, T__6=7, T__7=8, T__8=9, 
		T__9=10, T__10=11, T__11=12, T__12=13, T__13=14, FUNC=15, VAR=16, CONST=17, 
		IF=18, ELSE=19, FOR=20, SWITCH=21, CASE=22, DEFAULT=23, BREAK=24, CONTINUE=25, 
		RETURN=26, TRUE=27, FALSE=28, NIL=29, INT_TYPE=30, FLOAT_TYPE=31, STRING_TYPE=32, 
		BOOL_TYPE=33, RUNE_TYPE=34, ADD_ASSIGN=35, SUB_ASSIGN=36, MUL_ASSIGN=37, 
		DIV_ASSIGN=38, OR=39, AND=40, EQ=41, NEQ=42, GTE=43, LTE=44, GT=45, LT=46, 
		PLUS=47, MINUS=48, STAR=49, SLASH=50, MOD=51, BANG=52, REF=53, ID=54, 
		FLOAT=55, INT=56, STRING=57, RUNE=58, LINE_COMMENT=59, BLOCK_COMMENT=60, 
		WS=61;
	public static final int
		RULE_program = 0, RULE_functionDecl = 1, RULE_paramList = 2, RULE_param = 3, 
		RULE_returnType = 4, RULE_multiReturnType = 5, RULE_sliceType = 6, RULE_block = 7, 
		RULE_statement = 8, RULE_varDecl = 9, RULE_varShortDecl = 10, RULE_constDecl = 11, 
		RULE_idList = 12, RULE_expList = 13, RULE_arrayType = 14, RULE_arrayLiteral = 15, 
		RULE_arrayElements = 16, RULE_arrayRowElements = 17, RULE_arrayAccess = 18, 
		RULE_ptrAssign = 19, RULE_arrayAssign = 20, RULE_assignment = 21, RULE_assignOp = 22, 
		RULE_ifStmt = 23, RULE_forStmt = 24, RULE_forInit = 25, RULE_forPost = 26, 
		RULE_switchStmt = 27, RULE_caseClause = 28, RULE_defaultClause = 29, RULE_breakStmt = 30, 
		RULE_continueStmt = 31, RULE_incDecStmt = 32, RULE_returnStmt = 33, RULE_functionCall = 34, 
		RULE_qualifiedName = 35, RULE_argList = 36, RULE_argItem = 37, RULE_expression = 38, 
		RULE_logicalOr = 39, RULE_logicalAnd = 40, RULE_equality = 41, RULE_comparison = 42, 
		RULE_term = 43, RULE_factor = 44, RULE_unary = 45, RULE_primary = 46, 
		RULE_type = 47;
	private static String[] makeRuleNames() {
		return new String[] {
			"program", "functionDecl", "paramList", "param", "returnType", "multiReturnType", 
			"sliceType", "block", "statement", "varDecl", "varShortDecl", "constDecl", 
			"idList", "expList", "arrayType", "arrayLiteral", "arrayElements", "arrayRowElements", 
			"arrayAccess", "ptrAssign", "arrayAssign", "assignment", "assignOp", 
			"ifStmt", "forStmt", "forInit", "forPost", "switchStmt", "caseClause", 
			"defaultClause", "breakStmt", "continueStmt", "incDecStmt", "returnStmt", 
			"functionCall", "qualifiedName", "argList", "argItem", "expression", 
			"logicalOr", "logicalAnd", "equality", "comparison", "term", "factor", 
			"unary", "primary", "type"
		};
	}
	public static final String[] ruleNames = makeRuleNames();

	private static String[] makeLiteralNames() {
		return new String[] {
			null, "'('", "')'", "','", "'['", "']'", "'{'", "'}'", "';'", "'='", 
			"':='", "'++'", "'--'", "':'", "'.'", "'func'", "'var'", "'const'", "'if'", 
			"'else'", "'for'", "'switch'", "'case'", "'default'", "'break'", "'continue'", 
			"'return'", "'true'", "'false'", "'nil'", "'int32'", "'float32'", "'string'", 
			"'bool'", "'rune'", "'+='", "'-='", "'*='", "'/='", "'||'", "'&&'", "'=='", 
			"'!='", "'>='", "'<='", "'>'", "'<'", "'+'", "'-'", "'*'", "'/'", "'%'", 
			"'!'", "'&'"
		};
	}
	private static final String[] _LITERAL_NAMES = makeLiteralNames();
	private static String[] makeSymbolicNames() {
		return new String[] {
			null, null, null, null, null, null, null, null, null, null, null, null, 
			null, null, null, "FUNC", "VAR", "CONST", "IF", "ELSE", "FOR", "SWITCH", 
			"CASE", "DEFAULT", "BREAK", "CONTINUE", "RETURN", "TRUE", "FALSE", "NIL", 
			"INT_TYPE", "FLOAT_TYPE", "STRING_TYPE", "BOOL_TYPE", "RUNE_TYPE", "ADD_ASSIGN", 
			"SUB_ASSIGN", "MUL_ASSIGN", "DIV_ASSIGN", "OR", "AND", "EQ", "NEQ", "GTE", 
			"LTE", "GT", "LT", "PLUS", "MINUS", "STAR", "SLASH", "MOD", "BANG", "REF", 
			"ID", "FLOAT", "INT", "STRING", "RUNE", "LINE_COMMENT", "BLOCK_COMMENT", 
			"WS"
		};
	}
	private static final String[] _SYMBOLIC_NAMES = makeSymbolicNames();
	public static final Vocabulary VOCABULARY = new VocabularyImpl(_LITERAL_NAMES, _SYMBOLIC_NAMES);

	/**
	 * @deprecated Use {@link #VOCABULARY} instead.
	 */
	@Deprecated
	public static final String[] tokenNames;
	static {
		tokenNames = new String[_SYMBOLIC_NAMES.length];
		for (int i = 0; i < tokenNames.length; i++) {
			tokenNames[i] = VOCABULARY.getLiteralName(i);
			if (tokenNames[i] == null) {
				tokenNames[i] = VOCABULARY.getSymbolicName(i);
			}

			if (tokenNames[i] == null) {
				tokenNames[i] = "<INVALID>";
			}
		}
	}

	@Override
	@Deprecated
	public String[] getTokenNames() {
		return tokenNames;
	}

	@Override

	public Vocabulary getVocabulary() {
		return VOCABULARY;
	}

	@Override
	public String getGrammarFileName() { return "Golampi.g4"; }

	@Override
	public String[] getRuleNames() { return ruleNames; }

	@Override
	public String getSerializedATN() { return _serializedATN; }

	@Override
	public ATN getATN() { return _ATN; }

	public GolampiParser(TokenStream input) {
		super(input);
		_interp = new ParserATNSimulator(this,_ATN,_decisionToDFA,_sharedContextCache);
	}

	@SuppressWarnings("CheckReturnValue")
	public static class ProgramContext extends ParserRuleContext {
		public TerminalNode EOF() { return getToken(GolampiParser.EOF, 0); }
		public List<FunctionDeclContext> functionDecl() {
			return getRuleContexts(FunctionDeclContext.class);
		}
		public FunctionDeclContext functionDecl(int i) {
			return getRuleContext(FunctionDeclContext.class,i);
		}
		public List<VarDeclContext> varDecl() {
			return getRuleContexts(VarDeclContext.class);
		}
		public VarDeclContext varDecl(int i) {
			return getRuleContext(VarDeclContext.class,i);
		}
		public List<ConstDeclContext> constDecl() {
			return getRuleContexts(ConstDeclContext.class);
		}
		public ConstDeclContext constDecl(int i) {
			return getRuleContext(ConstDeclContext.class,i);
		}
		public ProgramContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_program; }
	}

	public final ProgramContext program() throws RecognitionException {
		ProgramContext _localctx = new ProgramContext(_ctx, getState());
		enterRule(_localctx, 0, RULE_program);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(99); 
			_errHandler.sync(this);
			_la = _input.LA(1);
			do {
				{
				setState(99);
				_errHandler.sync(this);
				switch (_input.LA(1)) {
				case FUNC:
					{
					setState(96);
					functionDecl();
					}
					break;
				case VAR:
					{
					setState(97);
					varDecl();
					}
					break;
				case CONST:
					{
					setState(98);
					constDecl();
					}
					break;
				default:
					throw new NoViableAltException(this);
				}
				}
				setState(101); 
				_errHandler.sync(this);
				_la = _input.LA(1);
			} while ( (((_la) & ~0x3f) == 0 && ((1L << _la) & 229376L) != 0) );
			setState(103);
			match(EOF);
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class FunctionDeclContext extends ParserRuleContext {
		public TerminalNode FUNC() { return getToken(GolampiParser.FUNC, 0); }
		public TerminalNode ID() { return getToken(GolampiParser.ID, 0); }
		public BlockContext block() {
			return getRuleContext(BlockContext.class,0);
		}
		public ParamListContext paramList() {
			return getRuleContext(ParamListContext.class,0);
		}
		public ReturnTypeContext returnType() {
			return getRuleContext(ReturnTypeContext.class,0);
		}
		public FunctionDeclContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_functionDecl; }
	}

	public final FunctionDeclContext functionDecl() throws RecognitionException {
		FunctionDeclContext _localctx = new FunctionDeclContext(_ctx, getState());
		enterRule(_localctx, 2, RULE_functionDecl);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(105);
			match(FUNC);
			setState(106);
			match(ID);
			setState(107);
			match(T__0);
			setState(109);
			_errHandler.sync(this);
			_la = _input.LA(1);
			if (_la==ID) {
				{
				setState(108);
				paramList();
				}
			}

			setState(111);
			match(T__1);
			setState(113);
			_errHandler.sync(this);
			_la = _input.LA(1);
			if ((((_la) & ~0x3f) == 0 && ((1L << _la) & 562983239417874L) != 0)) {
				{
				setState(112);
				returnType();
				}
			}

			setState(115);
			block();
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class ParamListContext extends ParserRuleContext {
		public List<ParamContext> param() {
			return getRuleContexts(ParamContext.class);
		}
		public ParamContext param(int i) {
			return getRuleContext(ParamContext.class,i);
		}
		public ParamListContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_paramList; }
	}

	public final ParamListContext paramList() throws RecognitionException {
		ParamListContext _localctx = new ParamListContext(_ctx, getState());
		enterRule(_localctx, 4, RULE_paramList);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(117);
			param();
			setState(122);
			_errHandler.sync(this);
			_la = _input.LA(1);
			while (_la==T__2) {
				{
				{
				setState(118);
				match(T__2);
				setState(119);
				param();
				}
				}
				setState(124);
				_errHandler.sync(this);
				_la = _input.LA(1);
			}
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class ParamContext extends ParserRuleContext {
		public TerminalNode ID() { return getToken(GolampiParser.ID, 0); }
		public TypeContext type() {
			return getRuleContext(TypeContext.class,0);
		}
		public TerminalNode STAR() { return getToken(GolampiParser.STAR, 0); }
		public ArrayTypeContext arrayType() {
			return getRuleContext(ArrayTypeContext.class,0);
		}
		public SliceTypeContext sliceType() {
			return getRuleContext(SliceTypeContext.class,0);
		}
		public ParamContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_param; }
	}

	public final ParamContext param() throws RecognitionException {
		ParamContext _localctx = new ParamContext(_ctx, getState());
		enterRule(_localctx, 6, RULE_param);
		try {
			setState(140);
			_errHandler.sync(this);
			switch ( getInterpreter().adaptivePredict(_input,5,_ctx) ) {
			case 1:
				enterOuterAlt(_localctx, 1);
				{
				setState(125);
				match(ID);
				setState(126);
				type();
				}
				break;
			case 2:
				enterOuterAlt(_localctx, 2);
				{
				setState(127);
				match(ID);
				setState(128);
				match(STAR);
				setState(129);
				type();
				}
				break;
			case 3:
				enterOuterAlt(_localctx, 3);
				{
				setState(130);
				match(ID);
				setState(131);
				match(STAR);
				setState(132);
				arrayType();
				}
				break;
			case 4:
				enterOuterAlt(_localctx, 4);
				{
				setState(133);
				match(ID);
				setState(134);
				match(STAR);
				setState(135);
				sliceType();
				}
				break;
			case 5:
				enterOuterAlt(_localctx, 5);
				{
				setState(136);
				match(ID);
				setState(137);
				arrayType();
				}
				break;
			case 6:
				enterOuterAlt(_localctx, 6);
				{
				setState(138);
				match(ID);
				setState(139);
				sliceType();
				}
				break;
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class ReturnTypeContext extends ParserRuleContext {
		public TypeContext type() {
			return getRuleContext(TypeContext.class,0);
		}
		public ArrayTypeContext arrayType() {
			return getRuleContext(ArrayTypeContext.class,0);
		}
		public SliceTypeContext sliceType() {
			return getRuleContext(SliceTypeContext.class,0);
		}
		public TerminalNode STAR() { return getToken(GolampiParser.STAR, 0); }
		public List<MultiReturnTypeContext> multiReturnType() {
			return getRuleContexts(MultiReturnTypeContext.class);
		}
		public MultiReturnTypeContext multiReturnType(int i) {
			return getRuleContext(MultiReturnTypeContext.class,i);
		}
		public ReturnTypeContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_returnType; }
	}

	public final ReturnTypeContext returnType() throws RecognitionException {
		ReturnTypeContext _localctx = new ReturnTypeContext(_ctx, getState());
		enterRule(_localctx, 8, RULE_returnType);
		int _la;
		try {
			setState(162);
			_errHandler.sync(this);
			switch ( getInterpreter().adaptivePredict(_input,7,_ctx) ) {
			case 1:
				enterOuterAlt(_localctx, 1);
				{
				setState(142);
				type();
				}
				break;
			case 2:
				enterOuterAlt(_localctx, 2);
				{
				setState(143);
				arrayType();
				}
				break;
			case 3:
				enterOuterAlt(_localctx, 3);
				{
				setState(144);
				sliceType();
				}
				break;
			case 4:
				enterOuterAlt(_localctx, 4);
				{
				setState(145);
				match(STAR);
				setState(146);
				type();
				}
				break;
			case 5:
				enterOuterAlt(_localctx, 5);
				{
				setState(147);
				match(STAR);
				setState(148);
				arrayType();
				}
				break;
			case 6:
				enterOuterAlt(_localctx, 6);
				{
				setState(149);
				match(STAR);
				setState(150);
				sliceType();
				}
				break;
			case 7:
				enterOuterAlt(_localctx, 7);
				{
				setState(151);
				match(T__0);
				setState(152);
				multiReturnType();
				setState(157);
				_errHandler.sync(this);
				_la = _input.LA(1);
				while (_la==T__2) {
					{
					{
					setState(153);
					match(T__2);
					setState(154);
					multiReturnType();
					}
					}
					setState(159);
					_errHandler.sync(this);
					_la = _input.LA(1);
				}
				setState(160);
				match(T__1);
				}
				break;
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class MultiReturnTypeContext extends ParserRuleContext {
		public TypeContext type() {
			return getRuleContext(TypeContext.class,0);
		}
		public ArrayTypeContext arrayType() {
			return getRuleContext(ArrayTypeContext.class,0);
		}
		public SliceTypeContext sliceType() {
			return getRuleContext(SliceTypeContext.class,0);
		}
		public TerminalNode STAR() { return getToken(GolampiParser.STAR, 0); }
		public MultiReturnTypeContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_multiReturnType; }
	}

	public final MultiReturnTypeContext multiReturnType() throws RecognitionException {
		MultiReturnTypeContext _localctx = new MultiReturnTypeContext(_ctx, getState());
		enterRule(_localctx, 10, RULE_multiReturnType);
		try {
			setState(173);
			_errHandler.sync(this);
			switch ( getInterpreter().adaptivePredict(_input,8,_ctx) ) {
			case 1:
				enterOuterAlt(_localctx, 1);
				{
				setState(164);
				type();
				}
				break;
			case 2:
				enterOuterAlt(_localctx, 2);
				{
				setState(165);
				arrayType();
				}
				break;
			case 3:
				enterOuterAlt(_localctx, 3);
				{
				setState(166);
				sliceType();
				}
				break;
			case 4:
				enterOuterAlt(_localctx, 4);
				{
				setState(167);
				match(STAR);
				setState(168);
				type();
				}
				break;
			case 5:
				enterOuterAlt(_localctx, 5);
				{
				setState(169);
				match(STAR);
				setState(170);
				arrayType();
				}
				break;
			case 6:
				enterOuterAlt(_localctx, 6);
				{
				setState(171);
				match(STAR);
				setState(172);
				sliceType();
				}
				break;
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class SliceTypeContext extends ParserRuleContext {
		public TypeContext type() {
			return getRuleContext(TypeContext.class,0);
		}
		public SliceTypeContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_sliceType; }
	}

	public final SliceTypeContext sliceType() throws RecognitionException {
		SliceTypeContext _localctx = new SliceTypeContext(_ctx, getState());
		enterRule(_localctx, 12, RULE_sliceType);
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(175);
			match(T__3);
			setState(176);
			match(T__4);
			setState(177);
			type();
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class BlockContext extends ParserRuleContext {
		public List<StatementContext> statement() {
			return getRuleContexts(StatementContext.class);
		}
		public StatementContext statement(int i) {
			return getRuleContext(StatementContext.class,i);
		}
		public BlockContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_block; }
	}

	public final BlockContext block() throws RecognitionException {
		BlockContext _localctx = new BlockContext(_ctx, getState());
		enterRule(_localctx, 14, RULE_block);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(179);
			match(T__5);
			setState(183);
			_errHandler.sync(this);
			_la = _input.LA(1);
			while ((((_la) & ~0x3f) == 0 && ((1L << _la) & 563794379412013058L) != 0)) {
				{
				{
				setState(180);
				statement();
				}
				}
				setState(185);
				_errHandler.sync(this);
				_la = _input.LA(1);
			}
			setState(186);
			match(T__6);
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class StatementContext extends ParserRuleContext {
		public VarDeclContext varDecl() {
			return getRuleContext(VarDeclContext.class,0);
		}
		public VarShortDeclContext varShortDecl() {
			return getRuleContext(VarShortDeclContext.class,0);
		}
		public ConstDeclContext constDecl() {
			return getRuleContext(ConstDeclContext.class,0);
		}
		public PtrAssignContext ptrAssign() {
			return getRuleContext(PtrAssignContext.class,0);
		}
		public ArrayAssignContext arrayAssign() {
			return getRuleContext(ArrayAssignContext.class,0);
		}
		public AssignmentContext assignment() {
			return getRuleContext(AssignmentContext.class,0);
		}
		public IfStmtContext ifStmt() {
			return getRuleContext(IfStmtContext.class,0);
		}
		public ForStmtContext forStmt() {
			return getRuleContext(ForStmtContext.class,0);
		}
		public SwitchStmtContext switchStmt() {
			return getRuleContext(SwitchStmtContext.class,0);
		}
		public BreakStmtContext breakStmt() {
			return getRuleContext(BreakStmtContext.class,0);
		}
		public ContinueStmtContext continueStmt() {
			return getRuleContext(ContinueStmtContext.class,0);
		}
		public IncDecStmtContext incDecStmt() {
			return getRuleContext(IncDecStmtContext.class,0);
		}
		public ReturnStmtContext returnStmt() {
			return getRuleContext(ReturnStmtContext.class,0);
		}
		public FunctionCallContext functionCall() {
			return getRuleContext(FunctionCallContext.class,0);
		}
		public ExpressionContext expression() {
			return getRuleContext(ExpressionContext.class,0);
		}
		public StatementContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_statement; }
	}

	public final StatementContext statement() throws RecognitionException {
		StatementContext _localctx = new StatementContext(_ctx, getState());
		enterRule(_localctx, 16, RULE_statement);
		int _la;
		try {
			setState(209);
			_errHandler.sync(this);
			switch ( getInterpreter().adaptivePredict(_input,12,_ctx) ) {
			case 1:
				enterOuterAlt(_localctx, 1);
				{
				setState(188);
				varDecl();
				}
				break;
			case 2:
				enterOuterAlt(_localctx, 2);
				{
				setState(189);
				varShortDecl();
				}
				break;
			case 3:
				enterOuterAlt(_localctx, 3);
				{
				setState(190);
				constDecl();
				}
				break;
			case 4:
				enterOuterAlt(_localctx, 4);
				{
				setState(191);
				ptrAssign();
				}
				break;
			case 5:
				enterOuterAlt(_localctx, 5);
				{
				setState(192);
				arrayAssign();
				}
				break;
			case 6:
				enterOuterAlt(_localctx, 6);
				{
				setState(193);
				assignment();
				}
				break;
			case 7:
				enterOuterAlt(_localctx, 7);
				{
				setState(194);
				ifStmt();
				}
				break;
			case 8:
				enterOuterAlt(_localctx, 8);
				{
				setState(195);
				forStmt();
				}
				break;
			case 9:
				enterOuterAlt(_localctx, 9);
				{
				setState(196);
				switchStmt();
				}
				break;
			case 10:
				enterOuterAlt(_localctx, 10);
				{
				setState(197);
				breakStmt();
				}
				break;
			case 11:
				enterOuterAlt(_localctx, 11);
				{
				setState(198);
				continueStmt();
				}
				break;
			case 12:
				enterOuterAlt(_localctx, 12);
				{
				setState(199);
				incDecStmt();
				}
				break;
			case 13:
				enterOuterAlt(_localctx, 13);
				{
				setState(200);
				returnStmt();
				}
				break;
			case 14:
				enterOuterAlt(_localctx, 14);
				{
				setState(201);
				functionCall();
				setState(203);
				_errHandler.sync(this);
				_la = _input.LA(1);
				if (_la==T__7) {
					{
					setState(202);
					match(T__7);
					}
				}

				}
				break;
			case 15:
				enterOuterAlt(_localctx, 15);
				{
				setState(205);
				expression();
				setState(207);
				_errHandler.sync(this);
				_la = _input.LA(1);
				if (_la==T__7) {
					{
					setState(206);
					match(T__7);
					}
				}

				}
				break;
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class VarDeclContext extends ParserRuleContext {
		public TerminalNode VAR() { return getToken(GolampiParser.VAR, 0); }
		public TerminalNode ID() { return getToken(GolampiParser.ID, 0); }
		public TypeContext type() {
			return getRuleContext(TypeContext.class,0);
		}
		public ExpressionContext expression() {
			return getRuleContext(ExpressionContext.class,0);
		}
		public IdListContext idList() {
			return getRuleContext(IdListContext.class,0);
		}
		public ExpListContext expList() {
			return getRuleContext(ExpListContext.class,0);
		}
		public ArrayTypeContext arrayType() {
			return getRuleContext(ArrayTypeContext.class,0);
		}
		public ArrayLiteralContext arrayLiteral() {
			return getRuleContext(ArrayLiteralContext.class,0);
		}
		public TerminalNode STAR() { return getToken(GolampiParser.STAR, 0); }
		public VarDeclContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_varDecl; }
	}

	public final VarDeclContext varDecl() throws RecognitionException {
		VarDeclContext _localctx = new VarDeclContext(_ctx, getState());
		enterRule(_localctx, 18, RULE_varDecl);
		int _la;
		try {
			setState(261);
			_errHandler.sync(this);
			switch ( getInterpreter().adaptivePredict(_input,21,_ctx) ) {
			case 1:
				enterOuterAlt(_localctx, 1);
				{
				setState(211);
				match(VAR);
				setState(212);
				match(ID);
				setState(213);
				type();
				setState(216);
				_errHandler.sync(this);
				_la = _input.LA(1);
				if (_la==T__8) {
					{
					setState(214);
					match(T__8);
					setState(215);
					expression();
					}
				}

				setState(219);
				_errHandler.sync(this);
				_la = _input.LA(1);
				if (_la==T__7) {
					{
					setState(218);
					match(T__7);
					}
				}

				}
				break;
			case 2:
				enterOuterAlt(_localctx, 2);
				{
				setState(221);
				match(VAR);
				setState(222);
				idList();
				setState(223);
				type();
				setState(224);
				match(T__8);
				setState(225);
				expList();
				setState(227);
				_errHandler.sync(this);
				_la = _input.LA(1);
				if (_la==T__7) {
					{
					setState(226);
					match(T__7);
					}
				}

				}
				break;
			case 3:
				enterOuterAlt(_localctx, 3);
				{
				setState(229);
				match(VAR);
				setState(230);
				match(ID);
				setState(231);
				arrayType();
				setState(234);
				_errHandler.sync(this);
				_la = _input.LA(1);
				if (_la==T__8) {
					{
					setState(232);
					match(T__8);
					setState(233);
					arrayLiteral();
					}
				}

				setState(237);
				_errHandler.sync(this);
				_la = _input.LA(1);
				if (_la==T__7) {
					{
					setState(236);
					match(T__7);
					}
				}

				}
				break;
			case 4:
				enterOuterAlt(_localctx, 4);
				{
				setState(239);
				match(VAR);
				setState(240);
				match(ID);
				setState(241);
				arrayType();
				setState(242);
				match(T__8);
				setState(243);
				expression();
				setState(245);
				_errHandler.sync(this);
				_la = _input.LA(1);
				if (_la==T__7) {
					{
					setState(244);
					match(T__7);
					}
				}

				}
				break;
			case 5:
				enterOuterAlt(_localctx, 5);
				{
				setState(247);
				match(VAR);
				setState(248);
				match(ID);
				setState(249);
				match(STAR);
				setState(250);
				type();
				setState(252);
				_errHandler.sync(this);
				_la = _input.LA(1);
				if (_la==T__7) {
					{
					setState(251);
					match(T__7);
					}
				}

				}
				break;
			case 6:
				enterOuterAlt(_localctx, 6);
				{
				setState(254);
				match(VAR);
				setState(255);
				match(ID);
				setState(256);
				match(STAR);
				setState(257);
				arrayType();
				setState(259);
				_errHandler.sync(this);
				_la = _input.LA(1);
				if (_la==T__7) {
					{
					setState(258);
					match(T__7);
					}
				}

				}
				break;
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class VarShortDeclContext extends ParserRuleContext {
		public IdListContext idList() {
			return getRuleContext(IdListContext.class,0);
		}
		public ExpListContext expList() {
			return getRuleContext(ExpListContext.class,0);
		}
		public TerminalNode ID() { return getToken(GolampiParser.ID, 0); }
		public ArrayLiteralContext arrayLiteral() {
			return getRuleContext(ArrayLiteralContext.class,0);
		}
		public VarShortDeclContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_varShortDecl; }
	}

	public final VarShortDeclContext varShortDecl() throws RecognitionException {
		VarShortDeclContext _localctx = new VarShortDeclContext(_ctx, getState());
		enterRule(_localctx, 20, RULE_varShortDecl);
		int _la;
		try {
			setState(275);
			_errHandler.sync(this);
			switch ( getInterpreter().adaptivePredict(_input,24,_ctx) ) {
			case 1:
				enterOuterAlt(_localctx, 1);
				{
				setState(263);
				idList();
				setState(264);
				match(T__9);
				setState(265);
				expList();
				setState(267);
				_errHandler.sync(this);
				_la = _input.LA(1);
				if (_la==T__7) {
					{
					setState(266);
					match(T__7);
					}
				}

				}
				break;
			case 2:
				enterOuterAlt(_localctx, 2);
				{
				setState(269);
				match(ID);
				setState(270);
				match(T__9);
				setState(271);
				arrayLiteral();
				setState(273);
				_errHandler.sync(this);
				_la = _input.LA(1);
				if (_la==T__7) {
					{
					setState(272);
					match(T__7);
					}
				}

				}
				break;
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class ConstDeclContext extends ParserRuleContext {
		public TerminalNode CONST() { return getToken(GolampiParser.CONST, 0); }
		public TerminalNode ID() { return getToken(GolampiParser.ID, 0); }
		public TypeContext type() {
			return getRuleContext(TypeContext.class,0);
		}
		public ExpressionContext expression() {
			return getRuleContext(ExpressionContext.class,0);
		}
		public ConstDeclContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_constDecl; }
	}

	public final ConstDeclContext constDecl() throws RecognitionException {
		ConstDeclContext _localctx = new ConstDeclContext(_ctx, getState());
		enterRule(_localctx, 22, RULE_constDecl);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(277);
			match(CONST);
			setState(278);
			match(ID);
			setState(279);
			type();
			setState(280);
			match(T__8);
			setState(281);
			expression();
			setState(283);
			_errHandler.sync(this);
			_la = _input.LA(1);
			if (_la==T__7) {
				{
				setState(282);
				match(T__7);
				}
			}

			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class IdListContext extends ParserRuleContext {
		public List<TerminalNode> ID() { return getTokens(GolampiParser.ID); }
		public TerminalNode ID(int i) {
			return getToken(GolampiParser.ID, i);
		}
		public IdListContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_idList; }
	}

	public final IdListContext idList() throws RecognitionException {
		IdListContext _localctx = new IdListContext(_ctx, getState());
		enterRule(_localctx, 24, RULE_idList);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(285);
			match(ID);
			setState(290);
			_errHandler.sync(this);
			_la = _input.LA(1);
			while (_la==T__2) {
				{
				{
				setState(286);
				match(T__2);
				setState(287);
				match(ID);
				}
				}
				setState(292);
				_errHandler.sync(this);
				_la = _input.LA(1);
			}
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class ExpListContext extends ParserRuleContext {
		public List<ExpressionContext> expression() {
			return getRuleContexts(ExpressionContext.class);
		}
		public ExpressionContext expression(int i) {
			return getRuleContext(ExpressionContext.class,i);
		}
		public ExpListContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_expList; }
	}

	public final ExpListContext expList() throws RecognitionException {
		ExpListContext _localctx = new ExpListContext(_ctx, getState());
		enterRule(_localctx, 26, RULE_expList);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(293);
			expression();
			setState(298);
			_errHandler.sync(this);
			_la = _input.LA(1);
			while (_la==T__2) {
				{
				{
				setState(294);
				match(T__2);
				setState(295);
				expression();
				}
				}
				setState(300);
				_errHandler.sync(this);
				_la = _input.LA(1);
			}
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class ArrayTypeContext extends ParserRuleContext {
		public TerminalNode INT() { return getToken(GolampiParser.INT, 0); }
		public TypeContext type() {
			return getRuleContext(TypeContext.class,0);
		}
		public ArrayTypeContext arrayType() {
			return getRuleContext(ArrayTypeContext.class,0);
		}
		public ArrayTypeContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_arrayType; }
	}

	public final ArrayTypeContext arrayType() throws RecognitionException {
		ArrayTypeContext _localctx = new ArrayTypeContext(_ctx, getState());
		enterRule(_localctx, 28, RULE_arrayType);
		try {
			setState(309);
			_errHandler.sync(this);
			switch ( getInterpreter().adaptivePredict(_input,28,_ctx) ) {
			case 1:
				enterOuterAlt(_localctx, 1);
				{
				setState(301);
				match(T__3);
				setState(302);
				match(INT);
				setState(303);
				match(T__4);
				setState(304);
				type();
				}
				break;
			case 2:
				enterOuterAlt(_localctx, 2);
				{
				setState(305);
				match(T__3);
				setState(306);
				match(INT);
				setState(307);
				match(T__4);
				setState(308);
				arrayType();
				}
				break;
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class ArrayLiteralContext extends ParserRuleContext {
		public TerminalNode INT() { return getToken(GolampiParser.INT, 0); }
		public TypeContext type() {
			return getRuleContext(TypeContext.class,0);
		}
		public ArrayElementsContext arrayElements() {
			return getRuleContext(ArrayElementsContext.class,0);
		}
		public ArrayTypeContext arrayType() {
			return getRuleContext(ArrayTypeContext.class,0);
		}
		public ArrayRowElementsContext arrayRowElements() {
			return getRuleContext(ArrayRowElementsContext.class,0);
		}
		public ArrayLiteralContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_arrayLiteral; }
	}

	public final ArrayLiteralContext arrayLiteral() throws RecognitionException {
		ArrayLiteralContext _localctx = new ArrayLiteralContext(_ctx, getState());
		enterRule(_localctx, 30, RULE_arrayLiteral);
		int _la;
		try {
			setState(340);
			_errHandler.sync(this);
			switch ( getInterpreter().adaptivePredict(_input,32,_ctx) ) {
			case 1:
				enterOuterAlt(_localctx, 1);
				{
				setState(311);
				match(T__3);
				setState(312);
				match(INT);
				setState(313);
				match(T__4);
				setState(314);
				type();
				setState(315);
				match(T__5);
				setState(317);
				_errHandler.sync(this);
				_la = _input.LA(1);
				if ((((_la) & ~0x3f) == 0 && ((1L << _la) & 563794379290968066L) != 0)) {
					{
					setState(316);
					arrayElements();
					}
				}

				setState(319);
				match(T__6);
				}
				break;
			case 2:
				enterOuterAlt(_localctx, 2);
				{
				setState(321);
				match(T__3);
				setState(322);
				match(INT);
				setState(323);
				match(T__4);
				setState(324);
				arrayType();
				setState(325);
				match(T__5);
				setState(327);
				_errHandler.sync(this);
				_la = _input.LA(1);
				if (_la==T__5) {
					{
					setState(326);
					arrayRowElements();
					}
				}

				setState(329);
				match(T__6);
				}
				break;
			case 3:
				enterOuterAlt(_localctx, 3);
				{
				setState(331);
				match(T__3);
				setState(332);
				match(T__4);
				setState(333);
				type();
				setState(334);
				match(T__5);
				setState(336);
				_errHandler.sync(this);
				_la = _input.LA(1);
				if ((((_la) & ~0x3f) == 0 && ((1L << _la) & 563794379290968066L) != 0)) {
					{
					setState(335);
					arrayElements();
					}
				}

				setState(338);
				match(T__6);
				}
				break;
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class ArrayElementsContext extends ParserRuleContext {
		public List<ExpressionContext> expression() {
			return getRuleContexts(ExpressionContext.class);
		}
		public ExpressionContext expression(int i) {
			return getRuleContext(ExpressionContext.class,i);
		}
		public ArrayElementsContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_arrayElements; }
	}

	public final ArrayElementsContext arrayElements() throws RecognitionException {
		ArrayElementsContext _localctx = new ArrayElementsContext(_ctx, getState());
		enterRule(_localctx, 32, RULE_arrayElements);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(342);
			expression();
			setState(347);
			_errHandler.sync(this);
			_la = _input.LA(1);
			while (_la==T__2) {
				{
				{
				setState(343);
				match(T__2);
				setState(344);
				expression();
				}
				}
				setState(349);
				_errHandler.sync(this);
				_la = _input.LA(1);
			}
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class ArrayRowElementsContext extends ParserRuleContext {
		public List<ArrayElementsContext> arrayElements() {
			return getRuleContexts(ArrayElementsContext.class);
		}
		public ArrayElementsContext arrayElements(int i) {
			return getRuleContext(ArrayElementsContext.class,i);
		}
		public ArrayRowElementsContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_arrayRowElements; }
	}

	public final ArrayRowElementsContext arrayRowElements() throws RecognitionException {
		ArrayRowElementsContext _localctx = new ArrayRowElementsContext(_ctx, getState());
		enterRule(_localctx, 34, RULE_arrayRowElements);
		int _la;
		try {
			int _alt;
			enterOuterAlt(_localctx, 1);
			{
			setState(350);
			match(T__5);
			setState(352);
			_errHandler.sync(this);
			_la = _input.LA(1);
			if ((((_la) & ~0x3f) == 0 && ((1L << _la) & 563794379290968066L) != 0)) {
				{
				setState(351);
				arrayElements();
				}
			}

			setState(354);
			match(T__6);
			setState(363);
			_errHandler.sync(this);
			_alt = getInterpreter().adaptivePredict(_input,36,_ctx);
			while ( _alt!=2 && _alt!=org.antlr.v4.runtime.atn.ATN.INVALID_ALT_NUMBER ) {
				if ( _alt==1 ) {
					{
					{
					setState(355);
					match(T__2);
					setState(356);
					match(T__5);
					setState(358);
					_errHandler.sync(this);
					_la = _input.LA(1);
					if ((((_la) & ~0x3f) == 0 && ((1L << _la) & 563794379290968066L) != 0)) {
						{
						setState(357);
						arrayElements();
						}
					}

					setState(360);
					match(T__6);
					}
					} 
				}
				setState(365);
				_errHandler.sync(this);
				_alt = getInterpreter().adaptivePredict(_input,36,_ctx);
			}
			setState(367);
			_errHandler.sync(this);
			_la = _input.LA(1);
			if (_la==T__2) {
				{
				setState(366);
				match(T__2);
				}
			}

			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class ArrayAccessContext extends ParserRuleContext {
		public TerminalNode ID() { return getToken(GolampiParser.ID, 0); }
		public List<ExpressionContext> expression() {
			return getRuleContexts(ExpressionContext.class);
		}
		public ExpressionContext expression(int i) {
			return getRuleContext(ExpressionContext.class,i);
		}
		public ArrayAccessContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_arrayAccess; }
	}

	public final ArrayAccessContext arrayAccess() throws RecognitionException {
		ArrayAccessContext _localctx = new ArrayAccessContext(_ctx, getState());
		enterRule(_localctx, 36, RULE_arrayAccess);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(369);
			match(ID);
			setState(374); 
			_errHandler.sync(this);
			_la = _input.LA(1);
			do {
				{
				{
				setState(370);
				match(T__3);
				setState(371);
				expression();
				setState(372);
				match(T__4);
				}
				}
				setState(376); 
				_errHandler.sync(this);
				_la = _input.LA(1);
			} while ( _la==T__3 );
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class PtrAssignContext extends ParserRuleContext {
		public TerminalNode STAR() { return getToken(GolampiParser.STAR, 0); }
		public TerminalNode ID() { return getToken(GolampiParser.ID, 0); }
		public AssignOpContext assignOp() {
			return getRuleContext(AssignOpContext.class,0);
		}
		public ExpressionContext expression() {
			return getRuleContext(ExpressionContext.class,0);
		}
		public PtrAssignContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_ptrAssign; }
	}

	public final PtrAssignContext ptrAssign() throws RecognitionException {
		PtrAssignContext _localctx = new PtrAssignContext(_ctx, getState());
		enterRule(_localctx, 38, RULE_ptrAssign);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(378);
			match(STAR);
			setState(379);
			match(ID);
			setState(380);
			assignOp();
			setState(381);
			expression();
			setState(383);
			_errHandler.sync(this);
			_la = _input.LA(1);
			if (_la==T__7) {
				{
				setState(382);
				match(T__7);
				}
			}

			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class ArrayAssignContext extends ParserRuleContext {
		public TerminalNode ID() { return getToken(GolampiParser.ID, 0); }
		public AssignOpContext assignOp() {
			return getRuleContext(AssignOpContext.class,0);
		}
		public List<ExpressionContext> expression() {
			return getRuleContexts(ExpressionContext.class);
		}
		public ExpressionContext expression(int i) {
			return getRuleContext(ExpressionContext.class,i);
		}
		public ArrayAssignContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_arrayAssign; }
	}

	public final ArrayAssignContext arrayAssign() throws RecognitionException {
		ArrayAssignContext _localctx = new ArrayAssignContext(_ctx, getState());
		enterRule(_localctx, 40, RULE_arrayAssign);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(385);
			match(ID);
			setState(390); 
			_errHandler.sync(this);
			_la = _input.LA(1);
			do {
				{
				{
				setState(386);
				match(T__3);
				setState(387);
				expression();
				setState(388);
				match(T__4);
				}
				}
				setState(392); 
				_errHandler.sync(this);
				_la = _input.LA(1);
			} while ( _la==T__3 );
			setState(394);
			assignOp();
			setState(395);
			expression();
			setState(397);
			_errHandler.sync(this);
			_la = _input.LA(1);
			if (_la==T__7) {
				{
				setState(396);
				match(T__7);
				}
			}

			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class AssignmentContext extends ParserRuleContext {
		public TerminalNode ID() { return getToken(GolampiParser.ID, 0); }
		public AssignOpContext assignOp() {
			return getRuleContext(AssignOpContext.class,0);
		}
		public ExpressionContext expression() {
			return getRuleContext(ExpressionContext.class,0);
		}
		public AssignmentContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_assignment; }
	}

	public final AssignmentContext assignment() throws RecognitionException {
		AssignmentContext _localctx = new AssignmentContext(_ctx, getState());
		enterRule(_localctx, 42, RULE_assignment);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(399);
			match(ID);
			setState(400);
			assignOp();
			setState(401);
			expression();
			setState(403);
			_errHandler.sync(this);
			_la = _input.LA(1);
			if (_la==T__7) {
				{
				setState(402);
				match(T__7);
				}
			}

			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class AssignOpContext extends ParserRuleContext {
		public TerminalNode ADD_ASSIGN() { return getToken(GolampiParser.ADD_ASSIGN, 0); }
		public TerminalNode SUB_ASSIGN() { return getToken(GolampiParser.SUB_ASSIGN, 0); }
		public TerminalNode MUL_ASSIGN() { return getToken(GolampiParser.MUL_ASSIGN, 0); }
		public TerminalNode DIV_ASSIGN() { return getToken(GolampiParser.DIV_ASSIGN, 0); }
		public AssignOpContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_assignOp; }
	}

	public final AssignOpContext assignOp() throws RecognitionException {
		AssignOpContext _localctx = new AssignOpContext(_ctx, getState());
		enterRule(_localctx, 44, RULE_assignOp);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(405);
			_la = _input.LA(1);
			if ( !((((_la) & ~0x3f) == 0 && ((1L << _la) & 515396076032L) != 0)) ) {
			_errHandler.recoverInline(this);
			}
			else {
				if ( _input.LA(1)==Token.EOF ) matchedEOF = true;
				_errHandler.reportMatch(this);
				consume();
			}
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class IfStmtContext extends ParserRuleContext {
		public TerminalNode IF() { return getToken(GolampiParser.IF, 0); }
		public ExpressionContext expression() {
			return getRuleContext(ExpressionContext.class,0);
		}
		public List<BlockContext> block() {
			return getRuleContexts(BlockContext.class);
		}
		public BlockContext block(int i) {
			return getRuleContext(BlockContext.class,i);
		}
		public TerminalNode ELSE() { return getToken(GolampiParser.ELSE, 0); }
		public IfStmtContext ifStmt() {
			return getRuleContext(IfStmtContext.class,0);
		}
		public IfStmtContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_ifStmt; }
	}

	public final IfStmtContext ifStmt() throws RecognitionException {
		IfStmtContext _localctx = new IfStmtContext(_ctx, getState());
		enterRule(_localctx, 46, RULE_ifStmt);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(407);
			match(IF);
			setState(408);
			expression();
			setState(409);
			block();
			setState(415);
			_errHandler.sync(this);
			_la = _input.LA(1);
			if (_la==ELSE) {
				{
				setState(410);
				match(ELSE);
				setState(413);
				_errHandler.sync(this);
				switch (_input.LA(1)) {
				case IF:
					{
					setState(411);
					ifStmt();
					}
					break;
				case T__5:
					{
					setState(412);
					block();
					}
					break;
				default:
					throw new NoViableAltException(this);
				}
				}
			}

			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class ForStmtContext extends ParserRuleContext {
		public TerminalNode FOR() { return getToken(GolampiParser.FOR, 0); }
		public ForInitContext forInit() {
			return getRuleContext(ForInitContext.class,0);
		}
		public ExpressionContext expression() {
			return getRuleContext(ExpressionContext.class,0);
		}
		public ForPostContext forPost() {
			return getRuleContext(ForPostContext.class,0);
		}
		public BlockContext block() {
			return getRuleContext(BlockContext.class,0);
		}
		public ForStmtContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_forStmt; }
	}

	public final ForStmtContext forStmt() throws RecognitionException {
		ForStmtContext _localctx = new ForStmtContext(_ctx, getState());
		enterRule(_localctx, 48, RULE_forStmt);
		try {
			setState(431);
			_errHandler.sync(this);
			switch ( getInterpreter().adaptivePredict(_input,45,_ctx) ) {
			case 1:
				enterOuterAlt(_localctx, 1);
				{
				setState(417);
				match(FOR);
				setState(418);
				forInit();
				setState(419);
				match(T__7);
				setState(420);
				expression();
				setState(421);
				match(T__7);
				setState(422);
				forPost();
				setState(423);
				block();
				}
				break;
			case 2:
				enterOuterAlt(_localctx, 2);
				{
				setState(425);
				match(FOR);
				setState(426);
				expression();
				setState(427);
				block();
				}
				break;
			case 3:
				enterOuterAlt(_localctx, 3);
				{
				setState(429);
				match(FOR);
				setState(430);
				block();
				}
				break;
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class ForInitContext extends ParserRuleContext {
		public TerminalNode ID() { return getToken(GolampiParser.ID, 0); }
		public ExpressionContext expression() {
			return getRuleContext(ExpressionContext.class,0);
		}
		public ForInitContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_forInit; }
	}

	public final ForInitContext forInit() throws RecognitionException {
		ForInitContext _localctx = new ForInitContext(_ctx, getState());
		enterRule(_localctx, 50, RULE_forInit);
		try {
			setState(439);
			_errHandler.sync(this);
			switch ( getInterpreter().adaptivePredict(_input,46,_ctx) ) {
			case 1:
				enterOuterAlt(_localctx, 1);
				{
				setState(433);
				match(ID);
				setState(434);
				match(T__9);
				setState(435);
				expression();
				}
				break;
			case 2:
				enterOuterAlt(_localctx, 2);
				{
				setState(436);
				match(ID);
				setState(437);
				match(T__8);
				setState(438);
				expression();
				}
				break;
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class ForPostContext extends ParserRuleContext {
		public TerminalNode ID() { return getToken(GolampiParser.ID, 0); }
		public ExpressionContext expression() {
			return getRuleContext(ExpressionContext.class,0);
		}
		public ForPostContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_forPost; }
	}

	public final ForPostContext forPost() throws RecognitionException {
		ForPostContext _localctx = new ForPostContext(_ctx, getState());
		enterRule(_localctx, 52, RULE_forPost);
		try {
			setState(448);
			_errHandler.sync(this);
			switch ( getInterpreter().adaptivePredict(_input,47,_ctx) ) {
			case 1:
				enterOuterAlt(_localctx, 1);
				{
				setState(441);
				match(ID);
				setState(442);
				match(T__10);
				}
				break;
			case 2:
				enterOuterAlt(_localctx, 2);
				{
				setState(443);
				match(ID);
				setState(444);
				match(T__11);
				}
				break;
			case 3:
				enterOuterAlt(_localctx, 3);
				{
				setState(445);
				match(ID);
				setState(446);
				match(T__8);
				setState(447);
				expression();
				}
				break;
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class SwitchStmtContext extends ParserRuleContext {
		public TerminalNode SWITCH() { return getToken(GolampiParser.SWITCH, 0); }
		public ExpressionContext expression() {
			return getRuleContext(ExpressionContext.class,0);
		}
		public List<CaseClauseContext> caseClause() {
			return getRuleContexts(CaseClauseContext.class);
		}
		public CaseClauseContext caseClause(int i) {
			return getRuleContext(CaseClauseContext.class,i);
		}
		public DefaultClauseContext defaultClause() {
			return getRuleContext(DefaultClauseContext.class,0);
		}
		public SwitchStmtContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_switchStmt; }
	}

	public final SwitchStmtContext switchStmt() throws RecognitionException {
		SwitchStmtContext _localctx = new SwitchStmtContext(_ctx, getState());
		enterRule(_localctx, 54, RULE_switchStmt);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(450);
			match(SWITCH);
			setState(451);
			expression();
			setState(452);
			match(T__5);
			setState(456);
			_errHandler.sync(this);
			_la = _input.LA(1);
			while (_la==CASE) {
				{
				{
				setState(453);
				caseClause();
				}
				}
				setState(458);
				_errHandler.sync(this);
				_la = _input.LA(1);
			}
			setState(460);
			_errHandler.sync(this);
			_la = _input.LA(1);
			if (_la==DEFAULT) {
				{
				setState(459);
				defaultClause();
				}
			}

			setState(462);
			match(T__6);
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class CaseClauseContext extends ParserRuleContext {
		public TerminalNode CASE() { return getToken(GolampiParser.CASE, 0); }
		public ExpListContext expList() {
			return getRuleContext(ExpListContext.class,0);
		}
		public List<StatementContext> statement() {
			return getRuleContexts(StatementContext.class);
		}
		public StatementContext statement(int i) {
			return getRuleContext(StatementContext.class,i);
		}
		public CaseClauseContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_caseClause; }
	}

	public final CaseClauseContext caseClause() throws RecognitionException {
		CaseClauseContext _localctx = new CaseClauseContext(_ctx, getState());
		enterRule(_localctx, 56, RULE_caseClause);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(464);
			match(CASE);
			setState(465);
			expList();
			setState(466);
			match(T__12);
			setState(470);
			_errHandler.sync(this);
			_la = _input.LA(1);
			while ((((_la) & ~0x3f) == 0 && ((1L << _la) & 563794379412013058L) != 0)) {
				{
				{
				setState(467);
				statement();
				}
				}
				setState(472);
				_errHandler.sync(this);
				_la = _input.LA(1);
			}
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class DefaultClauseContext extends ParserRuleContext {
		public TerminalNode DEFAULT() { return getToken(GolampiParser.DEFAULT, 0); }
		public List<StatementContext> statement() {
			return getRuleContexts(StatementContext.class);
		}
		public StatementContext statement(int i) {
			return getRuleContext(StatementContext.class,i);
		}
		public DefaultClauseContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_defaultClause; }
	}

	public final DefaultClauseContext defaultClause() throws RecognitionException {
		DefaultClauseContext _localctx = new DefaultClauseContext(_ctx, getState());
		enterRule(_localctx, 58, RULE_defaultClause);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(473);
			match(DEFAULT);
			setState(474);
			match(T__12);
			setState(478);
			_errHandler.sync(this);
			_la = _input.LA(1);
			while ((((_la) & ~0x3f) == 0 && ((1L << _la) & 563794379412013058L) != 0)) {
				{
				{
				setState(475);
				statement();
				}
				}
				setState(480);
				_errHandler.sync(this);
				_la = _input.LA(1);
			}
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class BreakStmtContext extends ParserRuleContext {
		public TerminalNode BREAK() { return getToken(GolampiParser.BREAK, 0); }
		public BreakStmtContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_breakStmt; }
	}

	public final BreakStmtContext breakStmt() throws RecognitionException {
		BreakStmtContext _localctx = new BreakStmtContext(_ctx, getState());
		enterRule(_localctx, 60, RULE_breakStmt);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(481);
			match(BREAK);
			setState(483);
			_errHandler.sync(this);
			_la = _input.LA(1);
			if (_la==T__7) {
				{
				setState(482);
				match(T__7);
				}
			}

			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class ContinueStmtContext extends ParserRuleContext {
		public TerminalNode CONTINUE() { return getToken(GolampiParser.CONTINUE, 0); }
		public ContinueStmtContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_continueStmt; }
	}

	public final ContinueStmtContext continueStmt() throws RecognitionException {
		ContinueStmtContext _localctx = new ContinueStmtContext(_ctx, getState());
		enterRule(_localctx, 62, RULE_continueStmt);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(485);
			match(CONTINUE);
			setState(487);
			_errHandler.sync(this);
			_la = _input.LA(1);
			if (_la==T__7) {
				{
				setState(486);
				match(T__7);
				}
			}

			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class IncDecStmtContext extends ParserRuleContext {
		public TerminalNode ID() { return getToken(GolampiParser.ID, 0); }
		public IncDecStmtContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_incDecStmt; }
	}

	public final IncDecStmtContext incDecStmt() throws RecognitionException {
		IncDecStmtContext _localctx = new IncDecStmtContext(_ctx, getState());
		enterRule(_localctx, 64, RULE_incDecStmt);
		int _la;
		try {
			setState(499);
			_errHandler.sync(this);
			switch ( getInterpreter().adaptivePredict(_input,56,_ctx) ) {
			case 1:
				enterOuterAlt(_localctx, 1);
				{
				setState(489);
				match(ID);
				setState(490);
				match(T__10);
				setState(492);
				_errHandler.sync(this);
				_la = _input.LA(1);
				if (_la==T__7) {
					{
					setState(491);
					match(T__7);
					}
				}

				}
				break;
			case 2:
				enterOuterAlt(_localctx, 2);
				{
				setState(494);
				match(ID);
				setState(495);
				match(T__11);
				setState(497);
				_errHandler.sync(this);
				_la = _input.LA(1);
				if (_la==T__7) {
					{
					setState(496);
					match(T__7);
					}
				}

				}
				break;
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class ReturnStmtContext extends ParserRuleContext {
		public TerminalNode RETURN() { return getToken(GolampiParser.RETURN, 0); }
		public ExpListContext expList() {
			return getRuleContext(ExpListContext.class,0);
		}
		public ReturnStmtContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_returnStmt; }
	}

	public final ReturnStmtContext returnStmt() throws RecognitionException {
		ReturnStmtContext _localctx = new ReturnStmtContext(_ctx, getState());
		enterRule(_localctx, 66, RULE_returnStmt);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(501);
			match(RETURN);
			setState(503);
			_errHandler.sync(this);
			switch ( getInterpreter().adaptivePredict(_input,57,_ctx) ) {
			case 1:
				{
				setState(502);
				expList();
				}
				break;
			}
			setState(506);
			_errHandler.sync(this);
			_la = _input.LA(1);
			if (_la==T__7) {
				{
				setState(505);
				match(T__7);
				}
			}

			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class FunctionCallContext extends ParserRuleContext {
		public QualifiedNameContext qualifiedName() {
			return getRuleContext(QualifiedNameContext.class,0);
		}
		public ArgListContext argList() {
			return getRuleContext(ArgListContext.class,0);
		}
		public FunctionCallContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_functionCall; }
	}

	public final FunctionCallContext functionCall() throws RecognitionException {
		FunctionCallContext _localctx = new FunctionCallContext(_ctx, getState());
		enterRule(_localctx, 68, RULE_functionCall);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(508);
			qualifiedName();
			setState(509);
			match(T__0);
			setState(511);
			_errHandler.sync(this);
			_la = _input.LA(1);
			if ((((_la) & ~0x3f) == 0 && ((1L << _la) & 572801578545709058L) != 0)) {
				{
				setState(510);
				argList();
				}
			}

			setState(513);
			match(T__1);
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class QualifiedNameContext extends ParserRuleContext {
		public List<TerminalNode> ID() { return getTokens(GolampiParser.ID); }
		public TerminalNode ID(int i) {
			return getToken(GolampiParser.ID, i);
		}
		public QualifiedNameContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_qualifiedName; }
	}

	public final QualifiedNameContext qualifiedName() throws RecognitionException {
		QualifiedNameContext _localctx = new QualifiedNameContext(_ctx, getState());
		enterRule(_localctx, 70, RULE_qualifiedName);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(515);
			match(ID);
			setState(520);
			_errHandler.sync(this);
			_la = _input.LA(1);
			while (_la==T__13) {
				{
				{
				setState(516);
				match(T__13);
				setState(517);
				match(ID);
				}
				}
				setState(522);
				_errHandler.sync(this);
				_la = _input.LA(1);
			}
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class ArgListContext extends ParserRuleContext {
		public List<ArgItemContext> argItem() {
			return getRuleContexts(ArgItemContext.class);
		}
		public ArgItemContext argItem(int i) {
			return getRuleContext(ArgItemContext.class,i);
		}
		public ArgListContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_argList; }
	}

	public final ArgListContext argList() throws RecognitionException {
		ArgListContext _localctx = new ArgListContext(_ctx, getState());
		enterRule(_localctx, 72, RULE_argList);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(523);
			argItem();
			setState(528);
			_errHandler.sync(this);
			_la = _input.LA(1);
			while (_la==T__2) {
				{
				{
				setState(524);
				match(T__2);
				setState(525);
				argItem();
				}
				}
				setState(530);
				_errHandler.sync(this);
				_la = _input.LA(1);
			}
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class ArgItemContext extends ParserRuleContext {
		public TerminalNode REF() { return getToken(GolampiParser.REF, 0); }
		public TerminalNode ID() { return getToken(GolampiParser.ID, 0); }
		public ExpressionContext expression() {
			return getRuleContext(ExpressionContext.class,0);
		}
		public ArgItemContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_argItem; }
	}

	public final ArgItemContext argItem() throws RecognitionException {
		ArgItemContext _localctx = new ArgItemContext(_ctx, getState());
		enterRule(_localctx, 74, RULE_argItem);
		try {
			setState(534);
			_errHandler.sync(this);
			switch (_input.LA(1)) {
			case REF:
				enterOuterAlt(_localctx, 1);
				{
				setState(531);
				match(REF);
				setState(532);
				match(ID);
				}
				break;
			case T__0:
			case TRUE:
			case FALSE:
			case NIL:
			case MINUS:
			case STAR:
			case BANG:
			case ID:
			case FLOAT:
			case INT:
			case STRING:
			case RUNE:
				enterOuterAlt(_localctx, 2);
				{
				setState(533);
				expression();
				}
				break;
			default:
				throw new NoViableAltException(this);
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class ExpressionContext extends ParserRuleContext {
		public LogicalOrContext logicalOr() {
			return getRuleContext(LogicalOrContext.class,0);
		}
		public ExpressionContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_expression; }
	}

	public final ExpressionContext expression() throws RecognitionException {
		ExpressionContext _localctx = new ExpressionContext(_ctx, getState());
		enterRule(_localctx, 76, RULE_expression);
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(536);
			logicalOr();
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class LogicalOrContext extends ParserRuleContext {
		public List<LogicalAndContext> logicalAnd() {
			return getRuleContexts(LogicalAndContext.class);
		}
		public LogicalAndContext logicalAnd(int i) {
			return getRuleContext(LogicalAndContext.class,i);
		}
		public List<TerminalNode> OR() { return getTokens(GolampiParser.OR); }
		public TerminalNode OR(int i) {
			return getToken(GolampiParser.OR, i);
		}
		public LogicalOrContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_logicalOr; }
	}

	public final LogicalOrContext logicalOr() throws RecognitionException {
		LogicalOrContext _localctx = new LogicalOrContext(_ctx, getState());
		enterRule(_localctx, 78, RULE_logicalOr);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(538);
			logicalAnd();
			setState(543);
			_errHandler.sync(this);
			_la = _input.LA(1);
			while (_la==OR) {
				{
				{
				setState(539);
				match(OR);
				setState(540);
				logicalAnd();
				}
				}
				setState(545);
				_errHandler.sync(this);
				_la = _input.LA(1);
			}
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class LogicalAndContext extends ParserRuleContext {
		public List<EqualityContext> equality() {
			return getRuleContexts(EqualityContext.class);
		}
		public EqualityContext equality(int i) {
			return getRuleContext(EqualityContext.class,i);
		}
		public List<TerminalNode> AND() { return getTokens(GolampiParser.AND); }
		public TerminalNode AND(int i) {
			return getToken(GolampiParser.AND, i);
		}
		public LogicalAndContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_logicalAnd; }
	}

	public final LogicalAndContext logicalAnd() throws RecognitionException {
		LogicalAndContext _localctx = new LogicalAndContext(_ctx, getState());
		enterRule(_localctx, 80, RULE_logicalAnd);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(546);
			equality();
			setState(551);
			_errHandler.sync(this);
			_la = _input.LA(1);
			while (_la==AND) {
				{
				{
				setState(547);
				match(AND);
				setState(548);
				equality();
				}
				}
				setState(553);
				_errHandler.sync(this);
				_la = _input.LA(1);
			}
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class EqualityContext extends ParserRuleContext {
		public List<ComparisonContext> comparison() {
			return getRuleContexts(ComparisonContext.class);
		}
		public ComparisonContext comparison(int i) {
			return getRuleContext(ComparisonContext.class,i);
		}
		public List<TerminalNode> EQ() { return getTokens(GolampiParser.EQ); }
		public TerminalNode EQ(int i) {
			return getToken(GolampiParser.EQ, i);
		}
		public List<TerminalNode> NEQ() { return getTokens(GolampiParser.NEQ); }
		public TerminalNode NEQ(int i) {
			return getToken(GolampiParser.NEQ, i);
		}
		public EqualityContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_equality; }
	}

	public final EqualityContext equality() throws RecognitionException {
		EqualityContext _localctx = new EqualityContext(_ctx, getState());
		enterRule(_localctx, 82, RULE_equality);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(554);
			comparison();
			setState(559);
			_errHandler.sync(this);
			_la = _input.LA(1);
			while (_la==EQ || _la==NEQ) {
				{
				{
				setState(555);
				_la = _input.LA(1);
				if ( !(_la==EQ || _la==NEQ) ) {
				_errHandler.recoverInline(this);
				}
				else {
					if ( _input.LA(1)==Token.EOF ) matchedEOF = true;
					_errHandler.reportMatch(this);
					consume();
				}
				setState(556);
				comparison();
				}
				}
				setState(561);
				_errHandler.sync(this);
				_la = _input.LA(1);
			}
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class ComparisonContext extends ParserRuleContext {
		public List<TermContext> term() {
			return getRuleContexts(TermContext.class);
		}
		public TermContext term(int i) {
			return getRuleContext(TermContext.class,i);
		}
		public List<TerminalNode> GTE() { return getTokens(GolampiParser.GTE); }
		public TerminalNode GTE(int i) {
			return getToken(GolampiParser.GTE, i);
		}
		public List<TerminalNode> LTE() { return getTokens(GolampiParser.LTE); }
		public TerminalNode LTE(int i) {
			return getToken(GolampiParser.LTE, i);
		}
		public List<TerminalNode> GT() { return getTokens(GolampiParser.GT); }
		public TerminalNode GT(int i) {
			return getToken(GolampiParser.GT, i);
		}
		public List<TerminalNode> LT() { return getTokens(GolampiParser.LT); }
		public TerminalNode LT(int i) {
			return getToken(GolampiParser.LT, i);
		}
		public ComparisonContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_comparison; }
	}

	public final ComparisonContext comparison() throws RecognitionException {
		ComparisonContext _localctx = new ComparisonContext(_ctx, getState());
		enterRule(_localctx, 84, RULE_comparison);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(562);
			term();
			setState(567);
			_errHandler.sync(this);
			_la = _input.LA(1);
			while ((((_la) & ~0x3f) == 0 && ((1L << _la) & 131941395333120L) != 0)) {
				{
				{
				setState(563);
				_la = _input.LA(1);
				if ( !((((_la) & ~0x3f) == 0 && ((1L << _la) & 131941395333120L) != 0)) ) {
				_errHandler.recoverInline(this);
				}
				else {
					if ( _input.LA(1)==Token.EOF ) matchedEOF = true;
					_errHandler.reportMatch(this);
					consume();
				}
				setState(564);
				term();
				}
				}
				setState(569);
				_errHandler.sync(this);
				_la = _input.LA(1);
			}
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class TermContext extends ParserRuleContext {
		public List<FactorContext> factor() {
			return getRuleContexts(FactorContext.class);
		}
		public FactorContext factor(int i) {
			return getRuleContext(FactorContext.class,i);
		}
		public List<TerminalNode> PLUS() { return getTokens(GolampiParser.PLUS); }
		public TerminalNode PLUS(int i) {
			return getToken(GolampiParser.PLUS, i);
		}
		public List<TerminalNode> MINUS() { return getTokens(GolampiParser.MINUS); }
		public TerminalNode MINUS(int i) {
			return getToken(GolampiParser.MINUS, i);
		}
		public TermContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_term; }
	}

	public final TermContext term() throws RecognitionException {
		TermContext _localctx = new TermContext(_ctx, getState());
		enterRule(_localctx, 86, RULE_term);
		int _la;
		try {
			int _alt;
			enterOuterAlt(_localctx, 1);
			{
			setState(570);
			factor();
			setState(575);
			_errHandler.sync(this);
			_alt = getInterpreter().adaptivePredict(_input,67,_ctx);
			while ( _alt!=2 && _alt!=org.antlr.v4.runtime.atn.ATN.INVALID_ALT_NUMBER ) {
				if ( _alt==1 ) {
					{
					{
					setState(571);
					_la = _input.LA(1);
					if ( !(_la==PLUS || _la==MINUS) ) {
					_errHandler.recoverInline(this);
					}
					else {
						if ( _input.LA(1)==Token.EOF ) matchedEOF = true;
						_errHandler.reportMatch(this);
						consume();
					}
					setState(572);
					factor();
					}
					} 
				}
				setState(577);
				_errHandler.sync(this);
				_alt = getInterpreter().adaptivePredict(_input,67,_ctx);
			}
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class FactorContext extends ParserRuleContext {
		public List<UnaryContext> unary() {
			return getRuleContexts(UnaryContext.class);
		}
		public UnaryContext unary(int i) {
			return getRuleContext(UnaryContext.class,i);
		}
		public List<TerminalNode> STAR() { return getTokens(GolampiParser.STAR); }
		public TerminalNode STAR(int i) {
			return getToken(GolampiParser.STAR, i);
		}
		public List<TerminalNode> SLASH() { return getTokens(GolampiParser.SLASH); }
		public TerminalNode SLASH(int i) {
			return getToken(GolampiParser.SLASH, i);
		}
		public List<TerminalNode> MOD() { return getTokens(GolampiParser.MOD); }
		public TerminalNode MOD(int i) {
			return getToken(GolampiParser.MOD, i);
		}
		public FactorContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_factor; }
	}

	public final FactorContext factor() throws RecognitionException {
		FactorContext _localctx = new FactorContext(_ctx, getState());
		enterRule(_localctx, 88, RULE_factor);
		int _la;
		try {
			int _alt;
			enterOuterAlt(_localctx, 1);
			{
			setState(578);
			unary();
			setState(583);
			_errHandler.sync(this);
			_alt = getInterpreter().adaptivePredict(_input,68,_ctx);
			while ( _alt!=2 && _alt!=org.antlr.v4.runtime.atn.ATN.INVALID_ALT_NUMBER ) {
				if ( _alt==1 ) {
					{
					{
					setState(579);
					_la = _input.LA(1);
					if ( !((((_la) & ~0x3f) == 0 && ((1L << _la) & 3940649673949184L) != 0)) ) {
					_errHandler.recoverInline(this);
					}
					else {
						if ( _input.LA(1)==Token.EOF ) matchedEOF = true;
						_errHandler.reportMatch(this);
						consume();
					}
					setState(580);
					unary();
					}
					} 
				}
				setState(585);
				_errHandler.sync(this);
				_alt = getInterpreter().adaptivePredict(_input,68,_ctx);
			}
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class UnaryContext extends ParserRuleContext {
		public TerminalNode BANG() { return getToken(GolampiParser.BANG, 0); }
		public UnaryContext unary() {
			return getRuleContext(UnaryContext.class,0);
		}
		public TerminalNode MINUS() { return getToken(GolampiParser.MINUS, 0); }
		public TerminalNode STAR() { return getToken(GolampiParser.STAR, 0); }
		public PrimaryContext primary() {
			return getRuleContext(PrimaryContext.class,0);
		}
		public UnaryContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_unary; }
	}

	public final UnaryContext unary() throws RecognitionException {
		UnaryContext _localctx = new UnaryContext(_ctx, getState());
		enterRule(_localctx, 90, RULE_unary);
		try {
			setState(593);
			_errHandler.sync(this);
			switch (_input.LA(1)) {
			case BANG:
				enterOuterAlt(_localctx, 1);
				{
				setState(586);
				match(BANG);
				setState(587);
				unary();
				}
				break;
			case MINUS:
				enterOuterAlt(_localctx, 2);
				{
				setState(588);
				match(MINUS);
				setState(589);
				unary();
				}
				break;
			case STAR:
				enterOuterAlt(_localctx, 3);
				{
				setState(590);
				match(STAR);
				setState(591);
				unary();
				}
				break;
			case T__0:
			case TRUE:
			case FALSE:
			case NIL:
			case ID:
			case FLOAT:
			case INT:
			case STRING:
			case RUNE:
				enterOuterAlt(_localctx, 4);
				{
				setState(592);
				primary();
				}
				break;
			default:
				throw new NoViableAltException(this);
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class PrimaryContext extends ParserRuleContext {
		public ExpressionContext expression() {
			return getRuleContext(ExpressionContext.class,0);
		}
		public FunctionCallContext functionCall() {
			return getRuleContext(FunctionCallContext.class,0);
		}
		public ArrayAccessContext arrayAccess() {
			return getRuleContext(ArrayAccessContext.class,0);
		}
		public TerminalNode ID() { return getToken(GolampiParser.ID, 0); }
		public TerminalNode INT() { return getToken(GolampiParser.INT, 0); }
		public TerminalNode FLOAT() { return getToken(GolampiParser.FLOAT, 0); }
		public TerminalNode STRING() { return getToken(GolampiParser.STRING, 0); }
		public TerminalNode RUNE() { return getToken(GolampiParser.RUNE, 0); }
		public TerminalNode TRUE() { return getToken(GolampiParser.TRUE, 0); }
		public TerminalNode FALSE() { return getToken(GolampiParser.FALSE, 0); }
		public TerminalNode NIL() { return getToken(GolampiParser.NIL, 0); }
		public PrimaryContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_primary; }
	}

	public final PrimaryContext primary() throws RecognitionException {
		PrimaryContext _localctx = new PrimaryContext(_ctx, getState());
		enterRule(_localctx, 92, RULE_primary);
		try {
			setState(609);
			_errHandler.sync(this);
			switch ( getInterpreter().adaptivePredict(_input,70,_ctx) ) {
			case 1:
				enterOuterAlt(_localctx, 1);
				{
				setState(595);
				match(T__0);
				setState(596);
				expression();
				setState(597);
				match(T__1);
				}
				break;
			case 2:
				enterOuterAlt(_localctx, 2);
				{
				setState(599);
				functionCall();
				}
				break;
			case 3:
				enterOuterAlt(_localctx, 3);
				{
				setState(600);
				arrayAccess();
				}
				break;
			case 4:
				enterOuterAlt(_localctx, 4);
				{
				setState(601);
				match(ID);
				}
				break;
			case 5:
				enterOuterAlt(_localctx, 5);
				{
				setState(602);
				match(INT);
				}
				break;
			case 6:
				enterOuterAlt(_localctx, 6);
				{
				setState(603);
				match(FLOAT);
				}
				break;
			case 7:
				enterOuterAlt(_localctx, 7);
				{
				setState(604);
				match(STRING);
				}
				break;
			case 8:
				enterOuterAlt(_localctx, 8);
				{
				setState(605);
				match(RUNE);
				}
				break;
			case 9:
				enterOuterAlt(_localctx, 9);
				{
				setState(606);
				match(TRUE);
				}
				break;
			case 10:
				enterOuterAlt(_localctx, 10);
				{
				setState(607);
				match(FALSE);
				}
				break;
			case 11:
				enterOuterAlt(_localctx, 11);
				{
				setState(608);
				match(NIL);
				}
				break;
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class TypeContext extends ParserRuleContext {
		public TerminalNode INT_TYPE() { return getToken(GolampiParser.INT_TYPE, 0); }
		public TerminalNode FLOAT_TYPE() { return getToken(GolampiParser.FLOAT_TYPE, 0); }
		public TerminalNode STRING_TYPE() { return getToken(GolampiParser.STRING_TYPE, 0); }
		public TerminalNode BOOL_TYPE() { return getToken(GolampiParser.BOOL_TYPE, 0); }
		public TerminalNode RUNE_TYPE() { return getToken(GolampiParser.RUNE_TYPE, 0); }
		public TypeContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_type; }
	}

	public final TypeContext type() throws RecognitionException {
		TypeContext _localctx = new TypeContext(_ctx, getState());
		enterRule(_localctx, 94, RULE_type);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(611);
			_la = _input.LA(1);
			if ( !((((_la) & ~0x3f) == 0 && ((1L << _la) & 33285996544L) != 0)) ) {
			_errHandler.recoverInline(this);
			}
			else {
				if ( _input.LA(1)==Token.EOF ) matchedEOF = true;
				_errHandler.reportMatch(this);
				consume();
			}
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	public static final String _serializedATN =
		"\u0004\u0001=\u0266\u0002\u0000\u0007\u0000\u0002\u0001\u0007\u0001\u0002"+
		"\u0002\u0007\u0002\u0002\u0003\u0007\u0003\u0002\u0004\u0007\u0004\u0002"+
		"\u0005\u0007\u0005\u0002\u0006\u0007\u0006\u0002\u0007\u0007\u0007\u0002"+
		"\b\u0007\b\u0002\t\u0007\t\u0002\n\u0007\n\u0002\u000b\u0007\u000b\u0002"+
		"\f\u0007\f\u0002\r\u0007\r\u0002\u000e\u0007\u000e\u0002\u000f\u0007\u000f"+
		"\u0002\u0010\u0007\u0010\u0002\u0011\u0007\u0011\u0002\u0012\u0007\u0012"+
		"\u0002\u0013\u0007\u0013\u0002\u0014\u0007\u0014\u0002\u0015\u0007\u0015"+
		"\u0002\u0016\u0007\u0016\u0002\u0017\u0007\u0017\u0002\u0018\u0007\u0018"+
		"\u0002\u0019\u0007\u0019\u0002\u001a\u0007\u001a\u0002\u001b\u0007\u001b"+
		"\u0002\u001c\u0007\u001c\u0002\u001d\u0007\u001d\u0002\u001e\u0007\u001e"+
		"\u0002\u001f\u0007\u001f\u0002 \u0007 \u0002!\u0007!\u0002\"\u0007\"\u0002"+
		"#\u0007#\u0002$\u0007$\u0002%\u0007%\u0002&\u0007&\u0002\'\u0007\'\u0002"+
		"(\u0007(\u0002)\u0007)\u0002*\u0007*\u0002+\u0007+\u0002,\u0007,\u0002"+
		"-\u0007-\u0002.\u0007.\u0002/\u0007/\u0001\u0000\u0001\u0000\u0001\u0000"+
		"\u0004\u0000d\b\u0000\u000b\u0000\f\u0000e\u0001\u0000\u0001\u0000\u0001"+
		"\u0001\u0001\u0001\u0001\u0001\u0001\u0001\u0003\u0001n\b\u0001\u0001"+
		"\u0001\u0001\u0001\u0003\u0001r\b\u0001\u0001\u0001\u0001\u0001\u0001"+
		"\u0002\u0001\u0002\u0001\u0002\u0005\u0002y\b\u0002\n\u0002\f\u0002|\t"+
		"\u0002\u0001\u0003\u0001\u0003\u0001\u0003\u0001\u0003\u0001\u0003\u0001"+
		"\u0003\u0001\u0003\u0001\u0003\u0001\u0003\u0001\u0003\u0001\u0003\u0001"+
		"\u0003\u0001\u0003\u0001\u0003\u0001\u0003\u0003\u0003\u008d\b\u0003\u0001"+
		"\u0004\u0001\u0004\u0001\u0004\u0001\u0004\u0001\u0004\u0001\u0004\u0001"+
		"\u0004\u0001\u0004\u0001\u0004\u0001\u0004\u0001\u0004\u0001\u0004\u0001"+
		"\u0004\u0005\u0004\u009c\b\u0004\n\u0004\f\u0004\u009f\t\u0004\u0001\u0004"+
		"\u0001\u0004\u0003\u0004\u00a3\b\u0004\u0001\u0005\u0001\u0005\u0001\u0005"+
		"\u0001\u0005\u0001\u0005\u0001\u0005\u0001\u0005\u0001\u0005\u0001\u0005"+
		"\u0003\u0005\u00ae\b\u0005\u0001\u0006\u0001\u0006\u0001\u0006\u0001\u0006"+
		"\u0001\u0007\u0001\u0007\u0005\u0007\u00b6\b\u0007\n\u0007\f\u0007\u00b9"+
		"\t\u0007\u0001\u0007\u0001\u0007\u0001\b\u0001\b\u0001\b\u0001\b\u0001"+
		"\b\u0001\b\u0001\b\u0001\b\u0001\b\u0001\b\u0001\b\u0001\b\u0001\b\u0001"+
		"\b\u0001\b\u0003\b\u00cc\b\b\u0001\b\u0001\b\u0003\b\u00d0\b\b\u0003\b"+
		"\u00d2\b\b\u0001\t\u0001\t\u0001\t\u0001\t\u0001\t\u0003\t\u00d9\b\t\u0001"+
		"\t\u0003\t\u00dc\b\t\u0001\t\u0001\t\u0001\t\u0001\t\u0001\t\u0001\t\u0003"+
		"\t\u00e4\b\t\u0001\t\u0001\t\u0001\t\u0001\t\u0001\t\u0003\t\u00eb\b\t"+
		"\u0001\t\u0003\t\u00ee\b\t\u0001\t\u0001\t\u0001\t\u0001\t\u0001\t\u0001"+
		"\t\u0003\t\u00f6\b\t\u0001\t\u0001\t\u0001\t\u0001\t\u0001\t\u0003\t\u00fd"+
		"\b\t\u0001\t\u0001\t\u0001\t\u0001\t\u0001\t\u0003\t\u0104\b\t\u0003\t"+
		"\u0106\b\t\u0001\n\u0001\n\u0001\n\u0001\n\u0003\n\u010c\b\n\u0001\n\u0001"+
		"\n\u0001\n\u0001\n\u0003\n\u0112\b\n\u0003\n\u0114\b\n\u0001\u000b\u0001"+
		"\u000b\u0001\u000b\u0001\u000b\u0001\u000b\u0001\u000b\u0003\u000b\u011c"+
		"\b\u000b\u0001\f\u0001\f\u0001\f\u0005\f\u0121\b\f\n\f\f\f\u0124\t\f\u0001"+
		"\r\u0001\r\u0001\r\u0005\r\u0129\b\r\n\r\f\r\u012c\t\r\u0001\u000e\u0001"+
		"\u000e\u0001\u000e\u0001\u000e\u0001\u000e\u0001\u000e\u0001\u000e\u0001"+
		"\u000e\u0003\u000e\u0136\b\u000e\u0001\u000f\u0001\u000f\u0001\u000f\u0001"+
		"\u000f\u0001\u000f\u0001\u000f\u0003\u000f\u013e\b\u000f\u0001\u000f\u0001"+
		"\u000f\u0001\u000f\u0001\u000f\u0001\u000f\u0001\u000f\u0001\u000f\u0001"+
		"\u000f\u0003\u000f\u0148\b\u000f\u0001\u000f\u0001\u000f\u0001\u000f\u0001"+
		"\u000f\u0001\u000f\u0001\u000f\u0001\u000f\u0003\u000f\u0151\b\u000f\u0001"+
		"\u000f\u0001\u000f\u0003\u000f\u0155\b\u000f\u0001\u0010\u0001\u0010\u0001"+
		"\u0010\u0005\u0010\u015a\b\u0010\n\u0010\f\u0010\u015d\t\u0010\u0001\u0011"+
		"\u0001\u0011\u0003\u0011\u0161\b\u0011\u0001\u0011\u0001\u0011\u0001\u0011"+
		"\u0001\u0011\u0003\u0011\u0167\b\u0011\u0001\u0011\u0005\u0011\u016a\b"+
		"\u0011\n\u0011\f\u0011\u016d\t\u0011\u0001\u0011\u0003\u0011\u0170\b\u0011"+
		"\u0001\u0012\u0001\u0012\u0001\u0012\u0001\u0012\u0001\u0012\u0004\u0012"+
		"\u0177\b\u0012\u000b\u0012\f\u0012\u0178\u0001\u0013\u0001\u0013\u0001"+
		"\u0013\u0001\u0013\u0001\u0013\u0003\u0013\u0180\b\u0013\u0001\u0014\u0001"+
		"\u0014\u0001\u0014\u0001\u0014\u0001\u0014\u0004\u0014\u0187\b\u0014\u000b"+
		"\u0014\f\u0014\u0188\u0001\u0014\u0001\u0014\u0001\u0014\u0003\u0014\u018e"+
		"\b\u0014\u0001\u0015\u0001\u0015\u0001\u0015\u0001\u0015\u0003\u0015\u0194"+
		"\b\u0015\u0001\u0016\u0001\u0016\u0001\u0017\u0001\u0017\u0001\u0017\u0001"+
		"\u0017\u0001\u0017\u0001\u0017\u0003\u0017\u019e\b\u0017\u0003\u0017\u01a0"+
		"\b\u0017\u0001\u0018\u0001\u0018\u0001\u0018\u0001\u0018\u0001\u0018\u0001"+
		"\u0018\u0001\u0018\u0001\u0018\u0001\u0018\u0001\u0018\u0001\u0018\u0001"+
		"\u0018\u0001\u0018\u0001\u0018\u0003\u0018\u01b0\b\u0018\u0001\u0019\u0001"+
		"\u0019\u0001\u0019\u0001\u0019\u0001\u0019\u0001\u0019\u0003\u0019\u01b8"+
		"\b\u0019\u0001\u001a\u0001\u001a\u0001\u001a\u0001\u001a\u0001\u001a\u0001"+
		"\u001a\u0001\u001a\u0003\u001a\u01c1\b\u001a\u0001\u001b\u0001\u001b\u0001"+
		"\u001b\u0001\u001b\u0005\u001b\u01c7\b\u001b\n\u001b\f\u001b\u01ca\t\u001b"+
		"\u0001\u001b\u0003\u001b\u01cd\b\u001b\u0001\u001b\u0001\u001b\u0001\u001c"+
		"\u0001\u001c\u0001\u001c\u0001\u001c\u0005\u001c\u01d5\b\u001c\n\u001c"+
		"\f\u001c\u01d8\t\u001c\u0001\u001d\u0001\u001d\u0001\u001d\u0005\u001d"+
		"\u01dd\b\u001d\n\u001d\f\u001d\u01e0\t\u001d\u0001\u001e\u0001\u001e\u0003"+
		"\u001e\u01e4\b\u001e\u0001\u001f\u0001\u001f\u0003\u001f\u01e8\b\u001f"+
		"\u0001 \u0001 \u0001 \u0003 \u01ed\b \u0001 \u0001 \u0001 \u0003 \u01f2"+
		"\b \u0003 \u01f4\b \u0001!\u0001!\u0003!\u01f8\b!\u0001!\u0003!\u01fb"+
		"\b!\u0001\"\u0001\"\u0001\"\u0003\"\u0200\b\"\u0001\"\u0001\"\u0001#\u0001"+
		"#\u0001#\u0005#\u0207\b#\n#\f#\u020a\t#\u0001$\u0001$\u0001$\u0005$\u020f"+
		"\b$\n$\f$\u0212\t$\u0001%\u0001%\u0001%\u0003%\u0217\b%\u0001&\u0001&"+
		"\u0001\'\u0001\'\u0001\'\u0005\'\u021e\b\'\n\'\f\'\u0221\t\'\u0001(\u0001"+
		"(\u0001(\u0005(\u0226\b(\n(\f(\u0229\t(\u0001)\u0001)\u0001)\u0005)\u022e"+
		"\b)\n)\f)\u0231\t)\u0001*\u0001*\u0001*\u0005*\u0236\b*\n*\f*\u0239\t"+
		"*\u0001+\u0001+\u0001+\u0005+\u023e\b+\n+\f+\u0241\t+\u0001,\u0001,\u0001"+
		",\u0005,\u0246\b,\n,\f,\u0249\t,\u0001-\u0001-\u0001-\u0001-\u0001-\u0001"+
		"-\u0001-\u0003-\u0252\b-\u0001.\u0001.\u0001.\u0001.\u0001.\u0001.\u0001"+
		".\u0001.\u0001.\u0001.\u0001.\u0001.\u0001.\u0001.\u0003.\u0262\b.\u0001"+
		"/\u0001/\u0001/\u0000\u00000\u0000\u0002\u0004\u0006\b\n\f\u000e\u0010"+
		"\u0012\u0014\u0016\u0018\u001a\u001c\u001e \"$&(*,.02468:<>@BDFHJLNPR"+
		"TVXZ\\^\u0000\u0006\u0002\u0000\t\t#&\u0001\u0000)*\u0001\u0000+.\u0001"+
		"\u0000/0\u0001\u000013\u0001\u0000\u001e\"\u02a9\u0000c\u0001\u0000\u0000"+
		"\u0000\u0002i\u0001\u0000\u0000\u0000\u0004u\u0001\u0000\u0000\u0000\u0006"+
		"\u008c\u0001\u0000\u0000\u0000\b\u00a2\u0001\u0000\u0000\u0000\n\u00ad"+
		"\u0001\u0000\u0000\u0000\f\u00af\u0001\u0000\u0000\u0000\u000e\u00b3\u0001"+
		"\u0000\u0000\u0000\u0010\u00d1\u0001\u0000\u0000\u0000\u0012\u0105\u0001"+
		"\u0000\u0000\u0000\u0014\u0113\u0001\u0000\u0000\u0000\u0016\u0115\u0001"+
		"\u0000\u0000\u0000\u0018\u011d\u0001\u0000\u0000\u0000\u001a\u0125\u0001"+
		"\u0000\u0000\u0000\u001c\u0135\u0001\u0000\u0000\u0000\u001e\u0154\u0001"+
		"\u0000\u0000\u0000 \u0156\u0001\u0000\u0000\u0000\"\u015e\u0001\u0000"+
		"\u0000\u0000$\u0171\u0001\u0000\u0000\u0000&\u017a\u0001\u0000\u0000\u0000"+
		"(\u0181\u0001\u0000\u0000\u0000*\u018f\u0001\u0000\u0000\u0000,\u0195"+
		"\u0001\u0000\u0000\u0000.\u0197\u0001\u0000\u0000\u00000\u01af\u0001\u0000"+
		"\u0000\u00002\u01b7\u0001\u0000\u0000\u00004\u01c0\u0001\u0000\u0000\u0000"+
		"6\u01c2\u0001\u0000\u0000\u00008\u01d0\u0001\u0000\u0000\u0000:\u01d9"+
		"\u0001\u0000\u0000\u0000<\u01e1\u0001\u0000\u0000\u0000>\u01e5\u0001\u0000"+
		"\u0000\u0000@\u01f3\u0001\u0000\u0000\u0000B\u01f5\u0001\u0000\u0000\u0000"+
		"D\u01fc\u0001\u0000\u0000\u0000F\u0203\u0001\u0000\u0000\u0000H\u020b"+
		"\u0001\u0000\u0000\u0000J\u0216\u0001\u0000\u0000\u0000L\u0218\u0001\u0000"+
		"\u0000\u0000N\u021a\u0001\u0000\u0000\u0000P\u0222\u0001\u0000\u0000\u0000"+
		"R\u022a\u0001\u0000\u0000\u0000T\u0232\u0001\u0000\u0000\u0000V\u023a"+
		"\u0001\u0000\u0000\u0000X\u0242\u0001\u0000\u0000\u0000Z\u0251\u0001\u0000"+
		"\u0000\u0000\\\u0261\u0001\u0000\u0000\u0000^\u0263\u0001\u0000\u0000"+
		"\u0000`d\u0003\u0002\u0001\u0000ad\u0003\u0012\t\u0000bd\u0003\u0016\u000b"+
		"\u0000c`\u0001\u0000\u0000\u0000ca\u0001\u0000\u0000\u0000cb\u0001\u0000"+
		"\u0000\u0000de\u0001\u0000\u0000\u0000ec\u0001\u0000\u0000\u0000ef\u0001"+
		"\u0000\u0000\u0000fg\u0001\u0000\u0000\u0000gh\u0005\u0000\u0000\u0001"+
		"h\u0001\u0001\u0000\u0000\u0000ij\u0005\u000f\u0000\u0000jk\u00056\u0000"+
		"\u0000km\u0005\u0001\u0000\u0000ln\u0003\u0004\u0002\u0000ml\u0001\u0000"+
		"\u0000\u0000mn\u0001\u0000\u0000\u0000no\u0001\u0000\u0000\u0000oq\u0005"+
		"\u0002\u0000\u0000pr\u0003\b\u0004\u0000qp\u0001\u0000\u0000\u0000qr\u0001"+
		"\u0000\u0000\u0000rs\u0001\u0000\u0000\u0000st\u0003\u000e\u0007\u0000"+
		"t\u0003\u0001\u0000\u0000\u0000uz\u0003\u0006\u0003\u0000vw\u0005\u0003"+
		"\u0000\u0000wy\u0003\u0006\u0003\u0000xv\u0001\u0000\u0000\u0000y|\u0001"+
		"\u0000\u0000\u0000zx\u0001\u0000\u0000\u0000z{\u0001\u0000\u0000\u0000"+
		"{\u0005\u0001\u0000\u0000\u0000|z\u0001\u0000\u0000\u0000}~\u00056\u0000"+
		"\u0000~\u008d\u0003^/\u0000\u007f\u0080\u00056\u0000\u0000\u0080\u0081"+
		"\u00051\u0000\u0000\u0081\u008d\u0003^/\u0000\u0082\u0083\u00056\u0000"+
		"\u0000\u0083\u0084\u00051\u0000\u0000\u0084\u008d\u0003\u001c\u000e\u0000"+
		"\u0085\u0086\u00056\u0000\u0000\u0086\u0087\u00051\u0000\u0000\u0087\u008d"+
		"\u0003\f\u0006\u0000\u0088\u0089\u00056\u0000\u0000\u0089\u008d\u0003"+
		"\u001c\u000e\u0000\u008a\u008b\u00056\u0000\u0000\u008b\u008d\u0003\f"+
		"\u0006\u0000\u008c}\u0001\u0000\u0000\u0000\u008c\u007f\u0001\u0000\u0000"+
		"\u0000\u008c\u0082\u0001\u0000\u0000\u0000\u008c\u0085\u0001\u0000\u0000"+
		"\u0000\u008c\u0088\u0001\u0000\u0000\u0000\u008c\u008a\u0001\u0000\u0000"+
		"\u0000\u008d\u0007\u0001\u0000\u0000\u0000\u008e\u00a3\u0003^/\u0000\u008f"+
		"\u00a3\u0003\u001c\u000e\u0000\u0090\u00a3\u0003\f\u0006\u0000\u0091\u0092"+
		"\u00051\u0000\u0000\u0092\u00a3\u0003^/\u0000\u0093\u0094\u00051\u0000"+
		"\u0000\u0094\u00a3\u0003\u001c\u000e\u0000\u0095\u0096\u00051\u0000\u0000"+
		"\u0096\u00a3\u0003\f\u0006\u0000\u0097\u0098\u0005\u0001\u0000\u0000\u0098"+
		"\u009d\u0003\n\u0005\u0000\u0099\u009a\u0005\u0003\u0000\u0000\u009a\u009c"+
		"\u0003\n\u0005\u0000\u009b\u0099\u0001\u0000\u0000\u0000\u009c\u009f\u0001"+
		"\u0000\u0000\u0000\u009d\u009b\u0001\u0000\u0000\u0000\u009d\u009e\u0001"+
		"\u0000\u0000\u0000\u009e\u00a0\u0001\u0000\u0000\u0000\u009f\u009d\u0001"+
		"\u0000\u0000\u0000\u00a0\u00a1\u0005\u0002\u0000\u0000\u00a1\u00a3\u0001"+
		"\u0000\u0000\u0000\u00a2\u008e\u0001\u0000\u0000\u0000\u00a2\u008f\u0001"+
		"\u0000\u0000\u0000\u00a2\u0090\u0001\u0000\u0000\u0000\u00a2\u0091\u0001"+
		"\u0000\u0000\u0000\u00a2\u0093\u0001\u0000\u0000\u0000\u00a2\u0095\u0001"+
		"\u0000\u0000\u0000\u00a2\u0097\u0001\u0000\u0000\u0000\u00a3\t\u0001\u0000"+
		"\u0000\u0000\u00a4\u00ae\u0003^/\u0000\u00a5\u00ae\u0003\u001c\u000e\u0000"+
		"\u00a6\u00ae\u0003\f\u0006\u0000\u00a7\u00a8\u00051\u0000\u0000\u00a8"+
		"\u00ae\u0003^/\u0000\u00a9\u00aa\u00051\u0000\u0000\u00aa\u00ae\u0003"+
		"\u001c\u000e\u0000\u00ab\u00ac\u00051\u0000\u0000\u00ac\u00ae\u0003\f"+
		"\u0006\u0000\u00ad\u00a4\u0001\u0000\u0000\u0000\u00ad\u00a5\u0001\u0000"+
		"\u0000\u0000\u00ad\u00a6\u0001\u0000\u0000\u0000\u00ad\u00a7\u0001\u0000"+
		"\u0000\u0000\u00ad\u00a9\u0001\u0000\u0000\u0000\u00ad\u00ab\u0001\u0000"+
		"\u0000\u0000\u00ae\u000b\u0001\u0000\u0000\u0000\u00af\u00b0\u0005\u0004"+
		"\u0000\u0000\u00b0\u00b1\u0005\u0005\u0000\u0000\u00b1\u00b2\u0003^/\u0000"+
		"\u00b2\r\u0001\u0000\u0000\u0000\u00b3\u00b7\u0005\u0006\u0000\u0000\u00b4"+
		"\u00b6\u0003\u0010\b\u0000\u00b5\u00b4\u0001\u0000\u0000\u0000\u00b6\u00b9"+
		"\u0001\u0000\u0000\u0000\u00b7\u00b5\u0001\u0000\u0000\u0000\u00b7\u00b8"+
		"\u0001\u0000\u0000\u0000\u00b8\u00ba\u0001\u0000\u0000\u0000\u00b9\u00b7"+
		"\u0001\u0000\u0000\u0000\u00ba\u00bb\u0005\u0007\u0000\u0000\u00bb\u000f"+
		"\u0001\u0000\u0000\u0000\u00bc\u00d2\u0003\u0012\t\u0000\u00bd\u00d2\u0003"+
		"\u0014\n\u0000\u00be\u00d2\u0003\u0016\u000b\u0000\u00bf\u00d2\u0003&"+
		"\u0013\u0000\u00c0\u00d2\u0003(\u0014\u0000\u00c1\u00d2\u0003*\u0015\u0000"+
		"\u00c2\u00d2\u0003.\u0017\u0000\u00c3\u00d2\u00030\u0018\u0000\u00c4\u00d2"+
		"\u00036\u001b\u0000\u00c5\u00d2\u0003<\u001e\u0000\u00c6\u00d2\u0003>"+
		"\u001f\u0000\u00c7\u00d2\u0003@ \u0000\u00c8\u00d2\u0003B!\u0000\u00c9"+
		"\u00cb\u0003D\"\u0000\u00ca\u00cc\u0005\b\u0000\u0000\u00cb\u00ca\u0001"+
		"\u0000\u0000\u0000\u00cb\u00cc\u0001\u0000\u0000\u0000\u00cc\u00d2\u0001"+
		"\u0000\u0000\u0000\u00cd\u00cf\u0003L&\u0000\u00ce\u00d0\u0005\b\u0000"+
		"\u0000\u00cf\u00ce\u0001\u0000\u0000\u0000\u00cf\u00d0\u0001\u0000\u0000"+
		"\u0000\u00d0\u00d2\u0001\u0000\u0000\u0000\u00d1\u00bc\u0001\u0000\u0000"+
		"\u0000\u00d1\u00bd\u0001\u0000\u0000\u0000\u00d1\u00be\u0001\u0000\u0000"+
		"\u0000\u00d1\u00bf\u0001\u0000\u0000\u0000\u00d1\u00c0\u0001\u0000\u0000"+
		"\u0000\u00d1\u00c1\u0001\u0000\u0000\u0000\u00d1\u00c2\u0001\u0000\u0000"+
		"\u0000\u00d1\u00c3\u0001\u0000\u0000\u0000\u00d1\u00c4\u0001\u0000\u0000"+
		"\u0000\u00d1\u00c5\u0001\u0000\u0000\u0000\u00d1\u00c6\u0001\u0000\u0000"+
		"\u0000\u00d1\u00c7\u0001\u0000\u0000\u0000\u00d1\u00c8\u0001\u0000\u0000"+
		"\u0000\u00d1\u00c9\u0001\u0000\u0000\u0000\u00d1\u00cd\u0001\u0000\u0000"+
		"\u0000\u00d2\u0011\u0001\u0000\u0000\u0000\u00d3\u00d4\u0005\u0010\u0000"+
		"\u0000\u00d4\u00d5\u00056\u0000\u0000\u00d5\u00d8\u0003^/\u0000\u00d6"+
		"\u00d7\u0005\t\u0000\u0000\u00d7\u00d9\u0003L&\u0000\u00d8\u00d6\u0001"+
		"\u0000\u0000\u0000\u00d8\u00d9\u0001\u0000\u0000\u0000\u00d9\u00db\u0001"+
		"\u0000\u0000\u0000\u00da\u00dc\u0005\b\u0000\u0000\u00db\u00da\u0001\u0000"+
		"\u0000\u0000\u00db\u00dc\u0001\u0000\u0000\u0000\u00dc\u0106\u0001\u0000"+
		"\u0000\u0000\u00dd\u00de\u0005\u0010\u0000\u0000\u00de\u00df\u0003\u0018"+
		"\f\u0000\u00df\u00e0\u0003^/\u0000\u00e0\u00e1\u0005\t\u0000\u0000\u00e1"+
		"\u00e3\u0003\u001a\r\u0000\u00e2\u00e4\u0005\b\u0000\u0000\u00e3\u00e2"+
		"\u0001\u0000\u0000\u0000\u00e3\u00e4\u0001\u0000\u0000\u0000\u00e4\u0106"+
		"\u0001\u0000\u0000\u0000\u00e5\u00e6\u0005\u0010\u0000\u0000\u00e6\u00e7"+
		"\u00056\u0000\u0000\u00e7\u00ea\u0003\u001c\u000e\u0000\u00e8\u00e9\u0005"+
		"\t\u0000\u0000\u00e9\u00eb\u0003\u001e\u000f\u0000\u00ea\u00e8\u0001\u0000"+
		"\u0000\u0000\u00ea\u00eb\u0001\u0000\u0000\u0000\u00eb\u00ed\u0001\u0000"+
		"\u0000\u0000\u00ec\u00ee\u0005\b\u0000\u0000\u00ed\u00ec\u0001\u0000\u0000"+
		"\u0000\u00ed\u00ee\u0001\u0000\u0000\u0000\u00ee\u0106\u0001\u0000\u0000"+
		"\u0000\u00ef\u00f0\u0005\u0010\u0000\u0000\u00f0\u00f1\u00056\u0000\u0000"+
		"\u00f1\u00f2\u0003\u001c\u000e\u0000\u00f2\u00f3\u0005\t\u0000\u0000\u00f3"+
		"\u00f5\u0003L&\u0000\u00f4\u00f6\u0005\b\u0000\u0000\u00f5\u00f4\u0001"+
		"\u0000\u0000\u0000\u00f5\u00f6\u0001\u0000\u0000\u0000\u00f6\u0106\u0001"+
		"\u0000\u0000\u0000\u00f7\u00f8\u0005\u0010\u0000\u0000\u00f8\u00f9\u0005"+
		"6\u0000\u0000\u00f9\u00fa\u00051\u0000\u0000\u00fa\u00fc\u0003^/\u0000"+
		"\u00fb\u00fd\u0005\b\u0000\u0000\u00fc\u00fb\u0001\u0000\u0000\u0000\u00fc"+
		"\u00fd\u0001\u0000\u0000\u0000\u00fd\u0106\u0001\u0000\u0000\u0000\u00fe"+
		"\u00ff\u0005\u0010\u0000\u0000\u00ff\u0100\u00056\u0000\u0000\u0100\u0101"+
		"\u00051\u0000\u0000\u0101\u0103\u0003\u001c\u000e\u0000\u0102\u0104\u0005"+
		"\b\u0000\u0000\u0103\u0102\u0001\u0000\u0000\u0000\u0103\u0104\u0001\u0000"+
		"\u0000\u0000\u0104\u0106\u0001\u0000\u0000\u0000\u0105\u00d3\u0001\u0000"+
		"\u0000\u0000\u0105\u00dd\u0001\u0000\u0000\u0000\u0105\u00e5\u0001\u0000"+
		"\u0000\u0000\u0105\u00ef\u0001\u0000\u0000\u0000\u0105\u00f7\u0001\u0000"+
		"\u0000\u0000\u0105\u00fe\u0001\u0000\u0000\u0000\u0106\u0013\u0001\u0000"+
		"\u0000\u0000\u0107\u0108\u0003\u0018\f\u0000\u0108\u0109\u0005\n\u0000"+
		"\u0000\u0109\u010b\u0003\u001a\r\u0000\u010a\u010c\u0005\b\u0000\u0000"+
		"\u010b\u010a\u0001\u0000\u0000\u0000\u010b\u010c\u0001\u0000\u0000\u0000"+
		"\u010c\u0114\u0001\u0000\u0000\u0000\u010d\u010e\u00056\u0000\u0000\u010e"+
		"\u010f\u0005\n\u0000\u0000\u010f\u0111\u0003\u001e\u000f\u0000\u0110\u0112"+
		"\u0005\b\u0000\u0000\u0111\u0110\u0001\u0000\u0000\u0000\u0111\u0112\u0001"+
		"\u0000\u0000\u0000\u0112\u0114\u0001\u0000\u0000\u0000\u0113\u0107\u0001"+
		"\u0000\u0000\u0000\u0113\u010d\u0001\u0000\u0000\u0000\u0114\u0015\u0001"+
		"\u0000\u0000\u0000\u0115\u0116\u0005\u0011\u0000\u0000\u0116\u0117\u0005"+
		"6\u0000\u0000\u0117\u0118\u0003^/\u0000\u0118\u0119\u0005\t\u0000\u0000"+
		"\u0119\u011b\u0003L&\u0000\u011a\u011c\u0005\b\u0000\u0000\u011b\u011a"+
		"\u0001\u0000\u0000\u0000\u011b\u011c\u0001\u0000\u0000\u0000\u011c\u0017"+
		"\u0001\u0000\u0000\u0000\u011d\u0122\u00056\u0000\u0000\u011e\u011f\u0005"+
		"\u0003\u0000\u0000\u011f\u0121\u00056\u0000\u0000\u0120\u011e\u0001\u0000"+
		"\u0000\u0000\u0121\u0124\u0001\u0000\u0000\u0000\u0122\u0120\u0001\u0000"+
		"\u0000\u0000\u0122\u0123\u0001\u0000\u0000\u0000\u0123\u0019\u0001\u0000"+
		"\u0000\u0000\u0124\u0122\u0001\u0000\u0000\u0000\u0125\u012a\u0003L&\u0000"+
		"\u0126\u0127\u0005\u0003\u0000\u0000\u0127\u0129\u0003L&\u0000\u0128\u0126"+
		"\u0001\u0000\u0000\u0000\u0129\u012c\u0001\u0000\u0000\u0000\u012a\u0128"+
		"\u0001\u0000\u0000\u0000\u012a\u012b\u0001\u0000\u0000\u0000\u012b\u001b"+
		"\u0001\u0000\u0000\u0000\u012c\u012a\u0001\u0000\u0000\u0000\u012d\u012e"+
		"\u0005\u0004\u0000\u0000\u012e\u012f\u00058\u0000\u0000\u012f\u0130\u0005"+
		"\u0005\u0000\u0000\u0130\u0136\u0003^/\u0000\u0131\u0132\u0005\u0004\u0000"+
		"\u0000\u0132\u0133\u00058\u0000\u0000\u0133\u0134\u0005\u0005\u0000\u0000"+
		"\u0134\u0136\u0003\u001c\u000e\u0000\u0135\u012d\u0001\u0000\u0000\u0000"+
		"\u0135\u0131\u0001\u0000\u0000\u0000\u0136\u001d\u0001\u0000\u0000\u0000"+
		"\u0137\u0138\u0005\u0004\u0000\u0000\u0138\u0139\u00058\u0000\u0000\u0139"+
		"\u013a\u0005\u0005\u0000\u0000\u013a\u013b\u0003^/\u0000\u013b\u013d\u0005"+
		"\u0006\u0000\u0000\u013c\u013e\u0003 \u0010\u0000\u013d\u013c\u0001\u0000"+
		"\u0000\u0000\u013d\u013e\u0001\u0000\u0000\u0000\u013e\u013f\u0001\u0000"+
		"\u0000\u0000\u013f\u0140\u0005\u0007\u0000\u0000\u0140\u0155\u0001\u0000"+
		"\u0000\u0000\u0141\u0142\u0005\u0004\u0000\u0000\u0142\u0143\u00058\u0000"+
		"\u0000\u0143\u0144\u0005\u0005\u0000\u0000\u0144\u0145\u0003\u001c\u000e"+
		"\u0000\u0145\u0147\u0005\u0006\u0000\u0000\u0146\u0148\u0003\"\u0011\u0000"+
		"\u0147\u0146\u0001\u0000\u0000\u0000\u0147\u0148\u0001\u0000\u0000\u0000"+
		"\u0148\u0149\u0001\u0000\u0000\u0000\u0149\u014a\u0005\u0007\u0000\u0000"+
		"\u014a\u0155\u0001\u0000\u0000\u0000\u014b\u014c\u0005\u0004\u0000\u0000"+
		"\u014c\u014d\u0005\u0005\u0000\u0000\u014d\u014e\u0003^/\u0000\u014e\u0150"+
		"\u0005\u0006\u0000\u0000\u014f\u0151\u0003 \u0010\u0000\u0150\u014f\u0001"+
		"\u0000\u0000\u0000\u0150\u0151\u0001\u0000\u0000\u0000\u0151\u0152\u0001"+
		"\u0000\u0000\u0000\u0152\u0153\u0005\u0007\u0000\u0000\u0153\u0155\u0001"+
		"\u0000\u0000\u0000\u0154\u0137\u0001\u0000\u0000\u0000\u0154\u0141\u0001"+
		"\u0000\u0000\u0000\u0154\u014b\u0001\u0000\u0000\u0000\u0155\u001f\u0001"+
		"\u0000\u0000\u0000\u0156\u015b\u0003L&\u0000\u0157\u0158\u0005\u0003\u0000"+
		"\u0000\u0158\u015a\u0003L&\u0000\u0159\u0157\u0001\u0000\u0000\u0000\u015a"+
		"\u015d\u0001\u0000\u0000\u0000\u015b\u0159\u0001\u0000\u0000\u0000\u015b"+
		"\u015c\u0001\u0000\u0000\u0000\u015c!\u0001\u0000\u0000\u0000\u015d\u015b"+
		"\u0001\u0000\u0000\u0000\u015e\u0160\u0005\u0006\u0000\u0000\u015f\u0161"+
		"\u0003 \u0010\u0000\u0160\u015f\u0001\u0000\u0000\u0000\u0160\u0161\u0001"+
		"\u0000\u0000\u0000\u0161\u0162\u0001\u0000\u0000\u0000\u0162\u016b\u0005"+
		"\u0007\u0000\u0000\u0163\u0164\u0005\u0003\u0000\u0000\u0164\u0166\u0005"+
		"\u0006\u0000\u0000\u0165\u0167\u0003 \u0010\u0000\u0166\u0165\u0001\u0000"+
		"\u0000\u0000\u0166\u0167\u0001\u0000\u0000\u0000\u0167\u0168\u0001\u0000"+
		"\u0000\u0000\u0168\u016a\u0005\u0007\u0000\u0000\u0169\u0163\u0001\u0000"+
		"\u0000\u0000\u016a\u016d\u0001\u0000\u0000\u0000\u016b\u0169\u0001\u0000"+
		"\u0000\u0000\u016b\u016c\u0001\u0000\u0000\u0000\u016c\u016f\u0001\u0000"+
		"\u0000\u0000\u016d\u016b\u0001\u0000\u0000\u0000\u016e\u0170\u0005\u0003"+
		"\u0000\u0000\u016f\u016e\u0001\u0000\u0000\u0000\u016f\u0170\u0001\u0000"+
		"\u0000\u0000\u0170#\u0001\u0000\u0000\u0000\u0171\u0176\u00056\u0000\u0000"+
		"\u0172\u0173\u0005\u0004\u0000\u0000\u0173\u0174\u0003L&\u0000\u0174\u0175"+
		"\u0005\u0005\u0000\u0000\u0175\u0177\u0001\u0000\u0000\u0000\u0176\u0172"+
		"\u0001\u0000\u0000\u0000\u0177\u0178\u0001\u0000\u0000\u0000\u0178\u0176"+
		"\u0001\u0000\u0000\u0000\u0178\u0179\u0001\u0000\u0000\u0000\u0179%\u0001"+
		"\u0000\u0000\u0000\u017a\u017b\u00051\u0000\u0000\u017b\u017c\u00056\u0000"+
		"\u0000\u017c\u017d\u0003,\u0016\u0000\u017d\u017f\u0003L&\u0000\u017e"+
		"\u0180\u0005\b\u0000\u0000\u017f\u017e\u0001\u0000\u0000\u0000\u017f\u0180"+
		"\u0001\u0000\u0000\u0000\u0180\'\u0001\u0000\u0000\u0000\u0181\u0186\u0005"+
		"6\u0000\u0000\u0182\u0183\u0005\u0004\u0000\u0000\u0183\u0184\u0003L&"+
		"\u0000\u0184\u0185\u0005\u0005\u0000\u0000\u0185\u0187\u0001\u0000\u0000"+
		"\u0000\u0186\u0182\u0001\u0000\u0000\u0000\u0187\u0188\u0001\u0000\u0000"+
		"\u0000\u0188\u0186\u0001\u0000\u0000\u0000\u0188\u0189\u0001\u0000\u0000"+
		"\u0000\u0189\u018a\u0001\u0000\u0000\u0000\u018a\u018b\u0003,\u0016\u0000"+
		"\u018b\u018d\u0003L&\u0000\u018c\u018e\u0005\b\u0000\u0000\u018d\u018c"+
		"\u0001\u0000\u0000\u0000\u018d\u018e\u0001\u0000\u0000\u0000\u018e)\u0001"+
		"\u0000\u0000\u0000\u018f\u0190\u00056\u0000\u0000\u0190\u0191\u0003,\u0016"+
		"\u0000\u0191\u0193\u0003L&\u0000\u0192\u0194\u0005\b\u0000\u0000\u0193"+
		"\u0192\u0001\u0000\u0000\u0000\u0193\u0194\u0001\u0000\u0000\u0000\u0194"+
		"+\u0001\u0000\u0000\u0000\u0195\u0196\u0007\u0000\u0000\u0000\u0196-\u0001"+
		"\u0000\u0000\u0000\u0197\u0198\u0005\u0012\u0000\u0000\u0198\u0199\u0003"+
		"L&\u0000\u0199\u019f\u0003\u000e\u0007\u0000\u019a\u019d\u0005\u0013\u0000"+
		"\u0000\u019b\u019e\u0003.\u0017\u0000\u019c\u019e\u0003\u000e\u0007\u0000"+
		"\u019d\u019b\u0001\u0000\u0000\u0000\u019d\u019c\u0001\u0000\u0000\u0000"+
		"\u019e\u01a0\u0001\u0000\u0000\u0000\u019f\u019a\u0001\u0000\u0000\u0000"+
		"\u019f\u01a0\u0001\u0000\u0000\u0000\u01a0/\u0001\u0000\u0000\u0000\u01a1"+
		"\u01a2\u0005\u0014\u0000\u0000\u01a2\u01a3\u00032\u0019\u0000\u01a3\u01a4"+
		"\u0005\b\u0000\u0000\u01a4\u01a5\u0003L&\u0000\u01a5\u01a6\u0005\b\u0000"+
		"\u0000\u01a6\u01a7\u00034\u001a\u0000\u01a7\u01a8\u0003\u000e\u0007\u0000"+
		"\u01a8\u01b0\u0001\u0000\u0000\u0000\u01a9\u01aa\u0005\u0014\u0000\u0000"+
		"\u01aa\u01ab\u0003L&\u0000\u01ab\u01ac\u0003\u000e\u0007\u0000\u01ac\u01b0"+
		"\u0001\u0000\u0000\u0000\u01ad\u01ae\u0005\u0014\u0000\u0000\u01ae\u01b0"+
		"\u0003\u000e\u0007\u0000\u01af\u01a1\u0001\u0000\u0000\u0000\u01af\u01a9"+
		"\u0001\u0000\u0000\u0000\u01af\u01ad\u0001\u0000\u0000\u0000\u01b01\u0001"+
		"\u0000\u0000\u0000\u01b1\u01b2\u00056\u0000\u0000\u01b2\u01b3\u0005\n"+
		"\u0000\u0000\u01b3\u01b8\u0003L&\u0000\u01b4\u01b5\u00056\u0000\u0000"+
		"\u01b5\u01b6\u0005\t\u0000\u0000\u01b6\u01b8\u0003L&\u0000\u01b7\u01b1"+
		"\u0001\u0000\u0000\u0000\u01b7\u01b4\u0001\u0000\u0000\u0000\u01b83\u0001"+
		"\u0000\u0000\u0000\u01b9\u01ba\u00056\u0000\u0000\u01ba\u01c1\u0005\u000b"+
		"\u0000\u0000\u01bb\u01bc\u00056\u0000\u0000\u01bc\u01c1\u0005\f\u0000"+
		"\u0000\u01bd\u01be\u00056\u0000\u0000\u01be\u01bf\u0005\t\u0000\u0000"+
		"\u01bf\u01c1\u0003L&\u0000\u01c0\u01b9\u0001\u0000\u0000\u0000\u01c0\u01bb"+
		"\u0001\u0000\u0000\u0000\u01c0\u01bd\u0001\u0000\u0000\u0000\u01c15\u0001"+
		"\u0000\u0000\u0000\u01c2\u01c3\u0005\u0015\u0000\u0000\u01c3\u01c4\u0003"+
		"L&\u0000\u01c4\u01c8\u0005\u0006\u0000\u0000\u01c5\u01c7\u00038\u001c"+
		"\u0000\u01c6\u01c5\u0001\u0000\u0000\u0000\u01c7\u01ca\u0001\u0000\u0000"+
		"\u0000\u01c8\u01c6\u0001\u0000\u0000\u0000\u01c8\u01c9\u0001\u0000\u0000"+
		"\u0000\u01c9\u01cc\u0001\u0000\u0000\u0000\u01ca\u01c8\u0001\u0000\u0000"+
		"\u0000\u01cb\u01cd\u0003:\u001d\u0000\u01cc\u01cb\u0001\u0000\u0000\u0000"+
		"\u01cc\u01cd\u0001\u0000\u0000\u0000\u01cd\u01ce\u0001\u0000\u0000\u0000"+
		"\u01ce\u01cf\u0005\u0007\u0000\u0000\u01cf7\u0001\u0000\u0000\u0000\u01d0"+
		"\u01d1\u0005\u0016\u0000\u0000\u01d1\u01d2\u0003\u001a\r\u0000\u01d2\u01d6"+
		"\u0005\r\u0000\u0000\u01d3\u01d5\u0003\u0010\b\u0000\u01d4\u01d3\u0001"+
		"\u0000\u0000\u0000\u01d5\u01d8\u0001\u0000\u0000\u0000\u01d6\u01d4\u0001"+
		"\u0000\u0000\u0000\u01d6\u01d7\u0001\u0000\u0000\u0000\u01d79\u0001\u0000"+
		"\u0000\u0000\u01d8\u01d6\u0001\u0000\u0000\u0000\u01d9\u01da\u0005\u0017"+
		"\u0000\u0000\u01da\u01de\u0005\r\u0000\u0000\u01db\u01dd\u0003\u0010\b"+
		"\u0000\u01dc\u01db\u0001\u0000\u0000\u0000\u01dd\u01e0\u0001\u0000\u0000"+
		"\u0000\u01de\u01dc\u0001\u0000\u0000\u0000\u01de\u01df\u0001\u0000\u0000"+
		"\u0000\u01df;\u0001\u0000\u0000\u0000\u01e0\u01de\u0001\u0000\u0000\u0000"+
		"\u01e1\u01e3\u0005\u0018\u0000\u0000\u01e2\u01e4\u0005\b\u0000\u0000\u01e3"+
		"\u01e2\u0001\u0000\u0000\u0000\u01e3\u01e4\u0001\u0000\u0000\u0000\u01e4"+
		"=\u0001\u0000\u0000\u0000\u01e5\u01e7\u0005\u0019\u0000\u0000\u01e6\u01e8"+
		"\u0005\b\u0000\u0000\u01e7\u01e6\u0001\u0000\u0000\u0000\u01e7\u01e8\u0001"+
		"\u0000\u0000\u0000\u01e8?\u0001\u0000\u0000\u0000\u01e9\u01ea\u00056\u0000"+
		"\u0000\u01ea\u01ec\u0005\u000b\u0000\u0000\u01eb\u01ed\u0005\b\u0000\u0000"+
		"\u01ec\u01eb\u0001\u0000\u0000\u0000\u01ec\u01ed\u0001\u0000\u0000\u0000"+
		"\u01ed\u01f4\u0001\u0000\u0000\u0000\u01ee\u01ef\u00056\u0000\u0000\u01ef"+
		"\u01f1\u0005\f\u0000\u0000\u01f0\u01f2\u0005\b\u0000\u0000\u01f1\u01f0"+
		"\u0001\u0000\u0000\u0000\u01f1\u01f2\u0001\u0000\u0000\u0000\u01f2\u01f4"+
		"\u0001\u0000\u0000\u0000\u01f3\u01e9\u0001\u0000\u0000\u0000\u01f3\u01ee"+
		"\u0001\u0000\u0000\u0000\u01f4A\u0001\u0000\u0000\u0000\u01f5\u01f7\u0005"+
		"\u001a\u0000\u0000\u01f6\u01f8\u0003\u001a\r\u0000\u01f7\u01f6\u0001\u0000"+
		"\u0000\u0000\u01f7\u01f8\u0001\u0000\u0000\u0000\u01f8\u01fa\u0001\u0000"+
		"\u0000\u0000\u01f9\u01fb\u0005\b\u0000\u0000\u01fa\u01f9\u0001\u0000\u0000"+
		"\u0000\u01fa\u01fb\u0001\u0000\u0000\u0000\u01fbC\u0001\u0000\u0000\u0000"+
		"\u01fc\u01fd\u0003F#\u0000\u01fd\u01ff\u0005\u0001\u0000\u0000\u01fe\u0200"+
		"\u0003H$\u0000\u01ff\u01fe\u0001\u0000\u0000\u0000\u01ff\u0200\u0001\u0000"+
		"\u0000\u0000\u0200\u0201\u0001\u0000\u0000\u0000\u0201\u0202\u0005\u0002"+
		"\u0000\u0000\u0202E\u0001\u0000\u0000\u0000\u0203\u0208\u00056\u0000\u0000"+
		"\u0204\u0205\u0005\u000e\u0000\u0000\u0205\u0207\u00056\u0000\u0000\u0206"+
		"\u0204\u0001\u0000\u0000\u0000\u0207\u020a\u0001\u0000\u0000\u0000\u0208"+
		"\u0206\u0001\u0000\u0000\u0000\u0208\u0209\u0001\u0000\u0000\u0000\u0209"+
		"G\u0001\u0000\u0000\u0000\u020a\u0208\u0001\u0000\u0000\u0000\u020b\u0210"+
		"\u0003J%\u0000\u020c\u020d\u0005\u0003\u0000\u0000\u020d\u020f\u0003J"+
		"%\u0000\u020e\u020c\u0001\u0000\u0000\u0000\u020f\u0212\u0001\u0000\u0000"+
		"\u0000\u0210\u020e\u0001\u0000\u0000\u0000\u0210\u0211\u0001\u0000\u0000"+
		"\u0000\u0211I\u0001\u0000\u0000\u0000\u0212\u0210\u0001\u0000\u0000\u0000"+
		"\u0213\u0214\u00055\u0000\u0000\u0214\u0217\u00056\u0000\u0000\u0215\u0217"+
		"\u0003L&\u0000\u0216\u0213\u0001\u0000\u0000\u0000\u0216\u0215\u0001\u0000"+
		"\u0000\u0000\u0217K\u0001\u0000\u0000\u0000\u0218\u0219\u0003N\'\u0000"+
		"\u0219M\u0001\u0000\u0000\u0000\u021a\u021f\u0003P(\u0000\u021b\u021c"+
		"\u0005\'\u0000\u0000\u021c\u021e\u0003P(\u0000\u021d\u021b\u0001\u0000"+
		"\u0000\u0000\u021e\u0221\u0001\u0000\u0000\u0000\u021f\u021d\u0001\u0000"+
		"\u0000\u0000\u021f\u0220\u0001\u0000\u0000\u0000\u0220O\u0001\u0000\u0000"+
		"\u0000\u0221\u021f\u0001\u0000\u0000\u0000\u0222\u0227\u0003R)\u0000\u0223"+
		"\u0224\u0005(\u0000\u0000\u0224\u0226\u0003R)\u0000\u0225\u0223\u0001"+
		"\u0000\u0000\u0000\u0226\u0229\u0001\u0000\u0000\u0000\u0227\u0225\u0001"+
		"\u0000\u0000\u0000\u0227\u0228\u0001\u0000\u0000\u0000\u0228Q\u0001\u0000"+
		"\u0000\u0000\u0229\u0227\u0001\u0000\u0000\u0000\u022a\u022f\u0003T*\u0000"+
		"\u022b\u022c\u0007\u0001\u0000\u0000\u022c\u022e\u0003T*\u0000\u022d\u022b"+
		"\u0001\u0000\u0000\u0000\u022e\u0231\u0001\u0000\u0000\u0000\u022f\u022d"+
		"\u0001\u0000\u0000\u0000\u022f\u0230\u0001\u0000\u0000\u0000\u0230S\u0001"+
		"\u0000\u0000\u0000\u0231\u022f\u0001\u0000\u0000\u0000\u0232\u0237\u0003"+
		"V+\u0000\u0233\u0234\u0007\u0002\u0000\u0000\u0234\u0236\u0003V+\u0000"+
		"\u0235\u0233\u0001\u0000\u0000\u0000\u0236\u0239\u0001\u0000\u0000\u0000"+
		"\u0237\u0235\u0001\u0000\u0000\u0000\u0237\u0238\u0001\u0000\u0000\u0000"+
		"\u0238U\u0001\u0000\u0000\u0000\u0239\u0237\u0001\u0000\u0000\u0000\u023a"+
		"\u023f\u0003X,\u0000\u023b\u023c\u0007\u0003\u0000\u0000\u023c\u023e\u0003"+
		"X,\u0000\u023d\u023b\u0001\u0000\u0000\u0000\u023e\u0241\u0001\u0000\u0000"+
		"\u0000\u023f\u023d\u0001\u0000\u0000\u0000\u023f\u0240\u0001\u0000\u0000"+
		"\u0000\u0240W\u0001\u0000\u0000\u0000\u0241\u023f\u0001\u0000\u0000\u0000"+
		"\u0242\u0247\u0003Z-\u0000\u0243\u0244\u0007\u0004\u0000\u0000\u0244\u0246"+
		"\u0003Z-\u0000\u0245\u0243\u0001\u0000\u0000\u0000\u0246\u0249\u0001\u0000"+
		"\u0000\u0000\u0247\u0245\u0001\u0000\u0000\u0000\u0247\u0248\u0001\u0000"+
		"\u0000\u0000\u0248Y\u0001\u0000\u0000\u0000\u0249\u0247\u0001\u0000\u0000"+
		"\u0000\u024a\u024b\u00054\u0000\u0000\u024b\u0252\u0003Z-\u0000\u024c"+
		"\u024d\u00050\u0000\u0000\u024d\u0252\u0003Z-\u0000\u024e\u024f\u0005"+
		"1\u0000\u0000\u024f\u0252\u0003Z-\u0000\u0250\u0252\u0003\\.\u0000\u0251"+
		"\u024a\u0001\u0000\u0000\u0000\u0251\u024c\u0001\u0000\u0000\u0000\u0251"+
		"\u024e\u0001\u0000\u0000\u0000\u0251\u0250\u0001\u0000\u0000\u0000\u0252"+
		"[\u0001\u0000\u0000\u0000\u0253\u0254\u0005\u0001\u0000\u0000\u0254\u0255"+
		"\u0003L&\u0000\u0255\u0256\u0005\u0002\u0000\u0000\u0256\u0262\u0001\u0000"+
		"\u0000\u0000\u0257\u0262\u0003D\"\u0000\u0258\u0262\u0003$\u0012\u0000"+
		"\u0259\u0262\u00056\u0000\u0000\u025a\u0262\u00058\u0000\u0000\u025b\u0262"+
		"\u00057\u0000\u0000\u025c\u0262\u00059\u0000\u0000\u025d\u0262\u0005:"+
		"\u0000\u0000\u025e\u0262\u0005\u001b\u0000\u0000\u025f\u0262\u0005\u001c"+
		"\u0000\u0000\u0260\u0262\u0005\u001d\u0000\u0000\u0261\u0253\u0001\u0000"+
		"\u0000\u0000\u0261\u0257\u0001\u0000\u0000\u0000\u0261\u0258\u0001\u0000"+
		"\u0000\u0000\u0261\u0259\u0001\u0000\u0000\u0000\u0261\u025a\u0001\u0000"+
		"\u0000\u0000\u0261\u025b\u0001\u0000\u0000\u0000\u0261\u025c\u0001\u0000"+
		"\u0000\u0000\u0261\u025d\u0001\u0000\u0000\u0000\u0261\u025e\u0001\u0000"+
		"\u0000\u0000\u0261\u025f\u0001\u0000\u0000\u0000\u0261\u0260\u0001\u0000"+
		"\u0000\u0000\u0262]\u0001\u0000\u0000\u0000\u0263\u0264\u0007\u0005\u0000"+
		"\u0000\u0264_\u0001\u0000\u0000\u0000Gcemqz\u008c\u009d\u00a2\u00ad\u00b7"+
		"\u00cb\u00cf\u00d1\u00d8\u00db\u00e3\u00ea\u00ed\u00f5\u00fc\u0103\u0105"+
		"\u010b\u0111\u0113\u011b\u0122\u012a\u0135\u013d\u0147\u0150\u0154\u015b"+
		"\u0160\u0166\u016b\u016f\u0178\u017f\u0188\u018d\u0193\u019d\u019f\u01af"+
		"\u01b7\u01c0\u01c8\u01cc\u01d6\u01de\u01e3\u01e7\u01ec\u01f1\u01f3\u01f7"+
		"\u01fa\u01ff\u0208\u0210\u0216\u021f\u0227\u022f\u0237\u023f\u0247\u0251"+
		"\u0261";
	public static final ATN _ATN =
		new ATNDeserializer().deserialize(_serializedATN.toCharArray());
	static {
		_decisionToDFA = new DFA[_ATN.getNumberOfDecisions()];
		for (int i = 0; i < _ATN.getNumberOfDecisions(); i++) {
			_decisionToDFA[i] = new DFA(_ATN.getDecisionState(i), i);
		}
	}
}