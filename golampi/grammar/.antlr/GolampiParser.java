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
		RULE_arrayElements = 16, RULE_arrayRowElements = 17, RULE_arrayRowItem = 18, 
		RULE_arrayAccess = 19, RULE_ptrAssign = 20, RULE_arrayAssign = 21, RULE_assignment = 22, 
		RULE_assignOp = 23, RULE_ifStmt = 24, RULE_forStmt = 25, RULE_forInit = 26, 
		RULE_forPost = 27, RULE_switchStmt = 28, RULE_caseClause = 29, RULE_defaultClause = 30, 
		RULE_breakStmt = 31, RULE_continueStmt = 32, RULE_incDecStmt = 33, RULE_returnStmt = 34, 
		RULE_functionCall = 35, RULE_qualifiedName = 36, RULE_argList = 37, RULE_argItem = 38, 
		RULE_expression = 39, RULE_logicalOr = 40, RULE_logicalAnd = 41, RULE_equality = 42, 
		RULE_comparison = 43, RULE_term = 44, RULE_factor = 45, RULE_unary = 46, 
		RULE_primary = 47, RULE_typeCast = 48, RULE_type = 49;
	private static String[] makeRuleNames() {
		return new String[] {
			"program", "functionDecl", "paramList", "param", "returnType", "multiReturnType", 
			"sliceType", "block", "statement", "varDecl", "varShortDecl", "constDecl", 
			"idList", "expList", "arrayType", "arrayLiteral", "arrayElements", "arrayRowElements", 
			"arrayRowItem", "arrayAccess", "ptrAssign", "arrayAssign", "assignment", 
			"assignOp", "ifStmt", "forStmt", "forInit", "forPost", "switchStmt", 
			"caseClause", "defaultClause", "breakStmt", "continueStmt", "incDecStmt", 
			"returnStmt", "functionCall", "qualifiedName", "argList", "argItem", 
			"expression", "logicalOr", "logicalAnd", "equality", "comparison", "term", 
			"factor", "unary", "primary", "typeCast", "type"
		};
	}
	public static final String[] ruleNames = makeRuleNames();

	private static String[] makeLiteralNames() {
		return new String[] {
			null, "'('", "')'", "','", "'['", "']'", "'{'", "'}'", "';'", "'='", 
			"':='", "'++'", "'--'", "':'", "'.'", "'func'", "'var'", "'const'", "'if'", 
			"'else'", "'for'", "'switch'", "'case'", "'default'", "'break'", "'continue'", 
			"'return'", "'true'", "'false'", "'nil'", null, "'float32'", "'string'", 
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
			setState(103); 
			_errHandler.sync(this);
			_la = _input.LA(1);
			do {
				{
				setState(103);
				_errHandler.sync(this);
				switch (_input.LA(1)) {
				case FUNC:
					{
					setState(100);
					functionDecl();
					}
					break;
				case VAR:
					{
					setState(101);
					varDecl();
					}
					break;
				case CONST:
					{
					setState(102);
					constDecl();
					}
					break;
				default:
					throw new NoViableAltException(this);
				}
				}
				setState(105); 
				_errHandler.sync(this);
				_la = _input.LA(1);
			} while ( (((_la) & ~0x3f) == 0 && ((1L << _la) & 229376L) != 0) );
			setState(107);
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
			setState(109);
			match(FUNC);
			setState(110);
			match(ID);
			setState(111);
			match(T__0);
			setState(113);
			_errHandler.sync(this);
			_la = _input.LA(1);
			if (_la==ID) {
				{
				setState(112);
				paramList();
				}
			}

			setState(115);
			match(T__1);
			setState(117);
			_errHandler.sync(this);
			_la = _input.LA(1);
			if ((((_la) & ~0x3f) == 0 && ((1L << _la) & 562983239417874L) != 0)) {
				{
				setState(116);
				returnType();
				}
			}

			setState(119);
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
			setState(121);
			param();
			setState(126);
			_errHandler.sync(this);
			_la = _input.LA(1);
			while (_la==T__2) {
				{
				{
				setState(122);
				match(T__2);
				setState(123);
				param();
				}
				}
				setState(128);
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
			setState(144);
			_errHandler.sync(this);
			switch ( getInterpreter().adaptivePredict(_input,5,_ctx) ) {
			case 1:
				enterOuterAlt(_localctx, 1);
				{
				setState(129);
				match(ID);
				setState(130);
				type();
				}
				break;
			case 2:
				enterOuterAlt(_localctx, 2);
				{
				setState(131);
				match(ID);
				setState(132);
				match(STAR);
				setState(133);
				type();
				}
				break;
			case 3:
				enterOuterAlt(_localctx, 3);
				{
				setState(134);
				match(ID);
				setState(135);
				match(STAR);
				setState(136);
				arrayType();
				}
				break;
			case 4:
				enterOuterAlt(_localctx, 4);
				{
				setState(137);
				match(ID);
				setState(138);
				match(STAR);
				setState(139);
				sliceType();
				}
				break;
			case 5:
				enterOuterAlt(_localctx, 5);
				{
				setState(140);
				match(ID);
				setState(141);
				arrayType();
				}
				break;
			case 6:
				enterOuterAlt(_localctx, 6);
				{
				setState(142);
				match(ID);
				setState(143);
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
			setState(166);
			_errHandler.sync(this);
			switch ( getInterpreter().adaptivePredict(_input,7,_ctx) ) {
			case 1:
				enterOuterAlt(_localctx, 1);
				{
				setState(146);
				type();
				}
				break;
			case 2:
				enterOuterAlt(_localctx, 2);
				{
				setState(147);
				arrayType();
				}
				break;
			case 3:
				enterOuterAlt(_localctx, 3);
				{
				setState(148);
				sliceType();
				}
				break;
			case 4:
				enterOuterAlt(_localctx, 4);
				{
				setState(149);
				match(STAR);
				setState(150);
				type();
				}
				break;
			case 5:
				enterOuterAlt(_localctx, 5);
				{
				setState(151);
				match(STAR);
				setState(152);
				arrayType();
				}
				break;
			case 6:
				enterOuterAlt(_localctx, 6);
				{
				setState(153);
				match(STAR);
				setState(154);
				sliceType();
				}
				break;
			case 7:
				enterOuterAlt(_localctx, 7);
				{
				setState(155);
				match(T__0);
				setState(156);
				multiReturnType();
				setState(161);
				_errHandler.sync(this);
				_la = _input.LA(1);
				while (_la==T__2) {
					{
					{
					setState(157);
					match(T__2);
					setState(158);
					multiReturnType();
					}
					}
					setState(163);
					_errHandler.sync(this);
					_la = _input.LA(1);
				}
				setState(164);
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
			setState(177);
			_errHandler.sync(this);
			switch ( getInterpreter().adaptivePredict(_input,8,_ctx) ) {
			case 1:
				enterOuterAlt(_localctx, 1);
				{
				setState(168);
				type();
				}
				break;
			case 2:
				enterOuterAlt(_localctx, 2);
				{
				setState(169);
				arrayType();
				}
				break;
			case 3:
				enterOuterAlt(_localctx, 3);
				{
				setState(170);
				sliceType();
				}
				break;
			case 4:
				enterOuterAlt(_localctx, 4);
				{
				setState(171);
				match(STAR);
				setState(172);
				type();
				}
				break;
			case 5:
				enterOuterAlt(_localctx, 5);
				{
				setState(173);
				match(STAR);
				setState(174);
				arrayType();
				}
				break;
			case 6:
				enterOuterAlt(_localctx, 6);
				{
				setState(175);
				match(STAR);
				setState(176);
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
			setState(179);
			match(T__3);
			setState(180);
			match(T__4);
			setState(181);
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
			setState(183);
			match(T__5);
			setState(187);
			_errHandler.sync(this);
			_la = _input.LA(1);
			while ((((_la) & ~0x3f) == 0 && ((1L << _la) & 563794412698009666L) != 0)) {
				{
				{
				setState(184);
				statement();
				}
				}
				setState(189);
				_errHandler.sync(this);
				_la = _input.LA(1);
			}
			setState(190);
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
		public BlockContext block() {
			return getRuleContext(BlockContext.class,0);
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
			setState(214);
			_errHandler.sync(this);
			switch ( getInterpreter().adaptivePredict(_input,12,_ctx) ) {
			case 1:
				enterOuterAlt(_localctx, 1);
				{
				setState(192);
				varDecl();
				}
				break;
			case 2:
				enterOuterAlt(_localctx, 2);
				{
				setState(193);
				varShortDecl();
				}
				break;
			case 3:
				enterOuterAlt(_localctx, 3);
				{
				setState(194);
				constDecl();
				}
				break;
			case 4:
				enterOuterAlt(_localctx, 4);
				{
				setState(195);
				ptrAssign();
				}
				break;
			case 5:
				enterOuterAlt(_localctx, 5);
				{
				setState(196);
				arrayAssign();
				}
				break;
			case 6:
				enterOuterAlt(_localctx, 6);
				{
				setState(197);
				assignment();
				}
				break;
			case 7:
				enterOuterAlt(_localctx, 7);
				{
				setState(198);
				ifStmt();
				}
				break;
			case 8:
				enterOuterAlt(_localctx, 8);
				{
				setState(199);
				forStmt();
				}
				break;
			case 9:
				enterOuterAlt(_localctx, 9);
				{
				setState(200);
				switchStmt();
				}
				break;
			case 10:
				enterOuterAlt(_localctx, 10);
				{
				setState(201);
				breakStmt();
				}
				break;
			case 11:
				enterOuterAlt(_localctx, 11);
				{
				setState(202);
				continueStmt();
				}
				break;
			case 12:
				enterOuterAlt(_localctx, 12);
				{
				setState(203);
				incDecStmt();
				}
				break;
			case 13:
				enterOuterAlt(_localctx, 13);
				{
				setState(204);
				returnStmt();
				}
				break;
			case 14:
				enterOuterAlt(_localctx, 14);
				{
				setState(205);
				functionCall();
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
			case 15:
				enterOuterAlt(_localctx, 15);
				{
				setState(209);
				block();
				}
				break;
			case 16:
				enterOuterAlt(_localctx, 16);
				{
				setState(210);
				expression();
				setState(212);
				_errHandler.sync(this);
				_la = _input.LA(1);
				if (_la==T__7) {
					{
					setState(211);
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
			setState(273);
			_errHandler.sync(this);
			switch ( getInterpreter().adaptivePredict(_input,22,_ctx) ) {
			case 1:
				enterOuterAlt(_localctx, 1);
				{
				setState(216);
				match(VAR);
				setState(217);
				match(ID);
				setState(218);
				type();
				setState(221);
				_errHandler.sync(this);
				_la = _input.LA(1);
				if (_la==T__8) {
					{
					setState(219);
					match(T__8);
					setState(220);
					expression();
					}
				}

				setState(224);
				_errHandler.sync(this);
				_la = _input.LA(1);
				if (_la==T__7) {
					{
					setState(223);
					match(T__7);
					}
				}

				}
				break;
			case 2:
				enterOuterAlt(_localctx, 2);
				{
				setState(226);
				match(VAR);
				setState(227);
				idList();
				setState(228);
				type();
				setState(229);
				match(T__8);
				setState(230);
				expList();
				setState(232);
				_errHandler.sync(this);
				_la = _input.LA(1);
				if (_la==T__7) {
					{
					setState(231);
					match(T__7);
					}
				}

				}
				break;
			case 3:
				enterOuterAlt(_localctx, 3);
				{
				setState(234);
				match(VAR);
				setState(235);
				idList();
				setState(236);
				match(T__8);
				setState(237);
				expList();
				setState(239);
				_errHandler.sync(this);
				_la = _input.LA(1);
				if (_la==T__7) {
					{
					setState(238);
					match(T__7);
					}
				}

				}
				break;
			case 4:
				enterOuterAlt(_localctx, 4);
				{
				setState(241);
				match(VAR);
				setState(242);
				match(ID);
				setState(243);
				arrayType();
				setState(246);
				_errHandler.sync(this);
				_la = _input.LA(1);
				if (_la==T__8) {
					{
					setState(244);
					match(T__8);
					setState(245);
					arrayLiteral();
					}
				}

				setState(249);
				_errHandler.sync(this);
				_la = _input.LA(1);
				if (_la==T__7) {
					{
					setState(248);
					match(T__7);
					}
				}

				}
				break;
			case 5:
				enterOuterAlt(_localctx, 5);
				{
				setState(251);
				match(VAR);
				setState(252);
				match(ID);
				setState(253);
				arrayType();
				setState(254);
				match(T__8);
				setState(255);
				expression();
				setState(257);
				_errHandler.sync(this);
				_la = _input.LA(1);
				if (_la==T__7) {
					{
					setState(256);
					match(T__7);
					}
				}

				}
				break;
			case 6:
				enterOuterAlt(_localctx, 6);
				{
				setState(259);
				match(VAR);
				setState(260);
				match(ID);
				setState(261);
				match(STAR);
				setState(262);
				type();
				setState(264);
				_errHandler.sync(this);
				_la = _input.LA(1);
				if (_la==T__7) {
					{
					setState(263);
					match(T__7);
					}
				}

				}
				break;
			case 7:
				enterOuterAlt(_localctx, 7);
				{
				setState(266);
				match(VAR);
				setState(267);
				match(ID);
				setState(268);
				match(STAR);
				setState(269);
				arrayType();
				setState(271);
				_errHandler.sync(this);
				_la = _input.LA(1);
				if (_la==T__7) {
					{
					setState(270);
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
			setState(287);
			_errHandler.sync(this);
			switch ( getInterpreter().adaptivePredict(_input,25,_ctx) ) {
			case 1:
				enterOuterAlt(_localctx, 1);
				{
				setState(275);
				idList();
				setState(276);
				match(T__9);
				setState(277);
				expList();
				setState(279);
				_errHandler.sync(this);
				_la = _input.LA(1);
				if (_la==T__7) {
					{
					setState(278);
					match(T__7);
					}
				}

				}
				break;
			case 2:
				enterOuterAlt(_localctx, 2);
				{
				setState(281);
				match(ID);
				setState(282);
				match(T__9);
				setState(283);
				arrayLiteral();
				setState(285);
				_errHandler.sync(this);
				_la = _input.LA(1);
				if (_la==T__7) {
					{
					setState(284);
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
			setState(289);
			match(CONST);
			setState(290);
			match(ID);
			setState(291);
			type();
			setState(292);
			match(T__8);
			setState(293);
			expression();
			setState(295);
			_errHandler.sync(this);
			_la = _input.LA(1);
			if (_la==T__7) {
				{
				setState(294);
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
			setState(297);
			match(ID);
			setState(302);
			_errHandler.sync(this);
			_la = _input.LA(1);
			while (_la==T__2) {
				{
				{
				setState(298);
				match(T__2);
				setState(299);
				match(ID);
				}
				}
				setState(304);
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
			setState(305);
			expression();
			setState(310);
			_errHandler.sync(this);
			_la = _input.LA(1);
			while (_la==T__2) {
				{
				{
				setState(306);
				match(T__2);
				setState(307);
				expression();
				}
				}
				setState(312);
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
			setState(321);
			_errHandler.sync(this);
			switch ( getInterpreter().adaptivePredict(_input,29,_ctx) ) {
			case 1:
				enterOuterAlt(_localctx, 1);
				{
				setState(313);
				match(T__3);
				setState(314);
				match(INT);
				setState(315);
				match(T__4);
				setState(316);
				type();
				}
				break;
			case 2:
				enterOuterAlt(_localctx, 2);
				{
				setState(317);
				match(T__3);
				setState(318);
				match(INT);
				setState(319);
				match(T__4);
				setState(320);
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
			setState(352);
			_errHandler.sync(this);
			switch ( getInterpreter().adaptivePredict(_input,33,_ctx) ) {
			case 1:
				enterOuterAlt(_localctx, 1);
				{
				setState(323);
				match(T__3);
				setState(324);
				match(INT);
				setState(325);
				match(T__4);
				setState(326);
				type();
				setState(327);
				match(T__5);
				setState(329);
				_errHandler.sync(this);
				_la = _input.LA(1);
				if ((((_la) & ~0x3f) == 0 && ((1L << _la) & 563794412576964610L) != 0)) {
					{
					setState(328);
					arrayElements();
					}
				}

				setState(331);
				match(T__6);
				}
				break;
			case 2:
				enterOuterAlt(_localctx, 2);
				{
				setState(333);
				match(T__3);
				setState(334);
				match(INT);
				setState(335);
				match(T__4);
				setState(336);
				arrayType();
				setState(337);
				match(T__5);
				setState(339);
				_errHandler.sync(this);
				_la = _input.LA(1);
				if (_la==T__5) {
					{
					setState(338);
					arrayRowElements();
					}
				}

				setState(341);
				match(T__6);
				}
				break;
			case 3:
				enterOuterAlt(_localctx, 3);
				{
				setState(343);
				match(T__3);
				setState(344);
				match(T__4);
				setState(345);
				type();
				setState(346);
				match(T__5);
				setState(348);
				_errHandler.sync(this);
				_la = _input.LA(1);
				if ((((_la) & ~0x3f) == 0 && ((1L << _la) & 563794412576964610L) != 0)) {
					{
					setState(347);
					arrayElements();
					}
				}

				setState(350);
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
			int _alt;
			enterOuterAlt(_localctx, 1);
			{
			setState(354);
			expression();
			setState(359);
			_errHandler.sync(this);
			_alt = getInterpreter().adaptivePredict(_input,34,_ctx);
			while ( _alt!=2 && _alt!=org.antlr.v4.runtime.atn.ATN.INVALID_ALT_NUMBER ) {
				if ( _alt==1 ) {
					{
					{
					setState(355);
					match(T__2);
					setState(356);
					expression();
					}
					} 
				}
				setState(361);
				_errHandler.sync(this);
				_alt = getInterpreter().adaptivePredict(_input,34,_ctx);
			}
			setState(363);
			_errHandler.sync(this);
			_la = _input.LA(1);
			if (_la==T__2) {
				{
				setState(362);
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
	public static class ArrayRowElementsContext extends ParserRuleContext {
		public List<ArrayRowItemContext> arrayRowItem() {
			return getRuleContexts(ArrayRowItemContext.class);
		}
		public ArrayRowItemContext arrayRowItem(int i) {
			return getRuleContext(ArrayRowItemContext.class,i);
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
			setState(365);
			arrayRowItem();
			setState(370);
			_errHandler.sync(this);
			_alt = getInterpreter().adaptivePredict(_input,36,_ctx);
			while ( _alt!=2 && _alt!=org.antlr.v4.runtime.atn.ATN.INVALID_ALT_NUMBER ) {
				if ( _alt==1 ) {
					{
					{
					setState(366);
					match(T__2);
					setState(367);
					arrayRowItem();
					}
					} 
				}
				setState(372);
				_errHandler.sync(this);
				_alt = getInterpreter().adaptivePredict(_input,36,_ctx);
			}
			setState(374);
			_errHandler.sync(this);
			_la = _input.LA(1);
			if (_la==T__2) {
				{
				setState(373);
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
	public static class ArrayRowItemContext extends ParserRuleContext {
		public ArrayElementsContext arrayElements() {
			return getRuleContext(ArrayElementsContext.class,0);
		}
		public ArrayRowElementsContext arrayRowElements() {
			return getRuleContext(ArrayRowElementsContext.class,0);
		}
		public ArrayRowItemContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_arrayRowItem; }
	}

	public final ArrayRowItemContext arrayRowItem() throws RecognitionException {
		ArrayRowItemContext _localctx = new ArrayRowItemContext(_ctx, getState());
		enterRule(_localctx, 36, RULE_arrayRowItem);
		int _la;
		try {
			setState(386);
			_errHandler.sync(this);
			switch ( getInterpreter().adaptivePredict(_input,40,_ctx) ) {
			case 1:
				enterOuterAlt(_localctx, 1);
				{
				setState(376);
				match(T__5);
				setState(378);
				_errHandler.sync(this);
				_la = _input.LA(1);
				if ((((_la) & ~0x3f) == 0 && ((1L << _la) & 563794412576964610L) != 0)) {
					{
					setState(377);
					arrayElements();
					}
				}

				setState(380);
				match(T__6);
				}
				break;
			case 2:
				enterOuterAlt(_localctx, 2);
				{
				setState(381);
				match(T__5);
				setState(383);
				_errHandler.sync(this);
				_la = _input.LA(1);
				if (_la==T__5) {
					{
					setState(382);
					arrayRowElements();
					}
				}

				setState(385);
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
		enterRule(_localctx, 38, RULE_arrayAccess);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(388);
			match(ID);
			setState(393); 
			_errHandler.sync(this);
			_la = _input.LA(1);
			do {
				{
				{
				setState(389);
				match(T__3);
				setState(390);
				expression();
				setState(391);
				match(T__4);
				}
				}
				setState(395); 
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
		enterRule(_localctx, 40, RULE_ptrAssign);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(397);
			match(STAR);
			setState(398);
			match(ID);
			setState(399);
			assignOp();
			setState(400);
			expression();
			setState(402);
			_errHandler.sync(this);
			_la = _input.LA(1);
			if (_la==T__7) {
				{
				setState(401);
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
		enterRule(_localctx, 42, RULE_arrayAssign);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(404);
			match(ID);
			setState(409); 
			_errHandler.sync(this);
			_la = _input.LA(1);
			do {
				{
				{
				setState(405);
				match(T__3);
				setState(406);
				expression();
				setState(407);
				match(T__4);
				}
				}
				setState(411); 
				_errHandler.sync(this);
				_la = _input.LA(1);
			} while ( _la==T__3 );
			setState(413);
			assignOp();
			setState(414);
			expression();
			setState(416);
			_errHandler.sync(this);
			_la = _input.LA(1);
			if (_la==T__7) {
				{
				setState(415);
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
		enterRule(_localctx, 44, RULE_assignment);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(418);
			match(ID);
			setState(419);
			assignOp();
			setState(420);
			expression();
			setState(422);
			_errHandler.sync(this);
			_la = _input.LA(1);
			if (_la==T__7) {
				{
				setState(421);
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
		enterRule(_localctx, 46, RULE_assignOp);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(424);
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
		enterRule(_localctx, 48, RULE_ifStmt);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(426);
			match(IF);
			setState(427);
			expression();
			setState(428);
			block();
			setState(434);
			_errHandler.sync(this);
			_la = _input.LA(1);
			if (_la==ELSE) {
				{
				setState(429);
				match(ELSE);
				setState(432);
				_errHandler.sync(this);
				switch (_input.LA(1)) {
				case IF:
					{
					setState(430);
					ifStmt();
					}
					break;
				case T__5:
					{
					setState(431);
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
		enterRule(_localctx, 50, RULE_forStmt);
		try {
			setState(450);
			_errHandler.sync(this);
			switch ( getInterpreter().adaptivePredict(_input,48,_ctx) ) {
			case 1:
				enterOuterAlt(_localctx, 1);
				{
				setState(436);
				match(FOR);
				setState(437);
				forInit();
				setState(438);
				match(T__7);
				setState(439);
				expression();
				setState(440);
				match(T__7);
				setState(441);
				forPost();
				setState(442);
				block();
				}
				break;
			case 2:
				enterOuterAlt(_localctx, 2);
				{
				setState(444);
				match(FOR);
				setState(445);
				expression();
				setState(446);
				block();
				}
				break;
			case 3:
				enterOuterAlt(_localctx, 3);
				{
				setState(448);
				match(FOR);
				setState(449);
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
		enterRule(_localctx, 52, RULE_forInit);
		try {
			setState(458);
			_errHandler.sync(this);
			switch ( getInterpreter().adaptivePredict(_input,49,_ctx) ) {
			case 1:
				enterOuterAlt(_localctx, 1);
				{
				setState(452);
				match(ID);
				setState(453);
				match(T__9);
				setState(454);
				expression();
				}
				break;
			case 2:
				enterOuterAlt(_localctx, 2);
				{
				setState(455);
				match(ID);
				setState(456);
				match(T__8);
				setState(457);
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
		public AssignOpContext assignOp() {
			return getRuleContext(AssignOpContext.class,0);
		}
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
		enterRule(_localctx, 54, RULE_forPost);
		try {
			setState(468);
			_errHandler.sync(this);
			switch ( getInterpreter().adaptivePredict(_input,50,_ctx) ) {
			case 1:
				enterOuterAlt(_localctx, 1);
				{
				setState(460);
				match(ID);
				setState(461);
				match(T__10);
				}
				break;
			case 2:
				enterOuterAlt(_localctx, 2);
				{
				setState(462);
				match(ID);
				setState(463);
				match(T__11);
				}
				break;
			case 3:
				enterOuterAlt(_localctx, 3);
				{
				setState(464);
				match(ID);
				setState(465);
				assignOp();
				setState(466);
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
		enterRule(_localctx, 56, RULE_switchStmt);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(470);
			match(SWITCH);
			setState(471);
			expression();
			setState(472);
			match(T__5);
			setState(476);
			_errHandler.sync(this);
			_la = _input.LA(1);
			while (_la==CASE) {
				{
				{
				setState(473);
				caseClause();
				}
				}
				setState(478);
				_errHandler.sync(this);
				_la = _input.LA(1);
			}
			setState(480);
			_errHandler.sync(this);
			_la = _input.LA(1);
			if (_la==DEFAULT) {
				{
				setState(479);
				defaultClause();
				}
			}

			setState(482);
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
		enterRule(_localctx, 58, RULE_caseClause);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(484);
			match(CASE);
			setState(485);
			expList();
			setState(486);
			match(T__12);
			setState(490);
			_errHandler.sync(this);
			_la = _input.LA(1);
			while ((((_la) & ~0x3f) == 0 && ((1L << _la) & 563794412698009666L) != 0)) {
				{
				{
				setState(487);
				statement();
				}
				}
				setState(492);
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
		enterRule(_localctx, 60, RULE_defaultClause);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(493);
			match(DEFAULT);
			setState(494);
			match(T__12);
			setState(498);
			_errHandler.sync(this);
			_la = _input.LA(1);
			while ((((_la) & ~0x3f) == 0 && ((1L << _la) & 563794412698009666L) != 0)) {
				{
				{
				setState(495);
				statement();
				}
				}
				setState(500);
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
		enterRule(_localctx, 62, RULE_breakStmt);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(501);
			match(BREAK);
			setState(503);
			_errHandler.sync(this);
			_la = _input.LA(1);
			if (_la==T__7) {
				{
				setState(502);
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
		enterRule(_localctx, 64, RULE_continueStmt);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(505);
			match(CONTINUE);
			setState(507);
			_errHandler.sync(this);
			_la = _input.LA(1);
			if (_la==T__7) {
				{
				setState(506);
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
		enterRule(_localctx, 66, RULE_incDecStmt);
		int _la;
		try {
			setState(519);
			_errHandler.sync(this);
			switch ( getInterpreter().adaptivePredict(_input,59,_ctx) ) {
			case 1:
				enterOuterAlt(_localctx, 1);
				{
				setState(509);
				match(ID);
				setState(510);
				match(T__10);
				setState(512);
				_errHandler.sync(this);
				_la = _input.LA(1);
				if (_la==T__7) {
					{
					setState(511);
					match(T__7);
					}
				}

				}
				break;
			case 2:
				enterOuterAlt(_localctx, 2);
				{
				setState(514);
				match(ID);
				setState(515);
				match(T__11);
				setState(517);
				_errHandler.sync(this);
				_la = _input.LA(1);
				if (_la==T__7) {
					{
					setState(516);
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
		enterRule(_localctx, 68, RULE_returnStmt);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(521);
			match(RETURN);
			setState(523);
			_errHandler.sync(this);
			switch ( getInterpreter().adaptivePredict(_input,60,_ctx) ) {
			case 1:
				{
				setState(522);
				expList();
				}
				break;
			}
			setState(526);
			_errHandler.sync(this);
			_la = _input.LA(1);
			if (_la==T__7) {
				{
				setState(525);
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
		enterRule(_localctx, 70, RULE_functionCall);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(528);
			qualifiedName();
			setState(529);
			match(T__0);
			setState(531);
			_errHandler.sync(this);
			_la = _input.LA(1);
			if ((((_la) & ~0x3f) == 0 && ((1L << _la) & 572801611831705602L) != 0)) {
				{
				setState(530);
				argList();
				}
			}

			setState(533);
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
		enterRule(_localctx, 72, RULE_qualifiedName);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(535);
			match(ID);
			setState(540);
			_errHandler.sync(this);
			_la = _input.LA(1);
			while (_la==T__13) {
				{
				{
				setState(536);
				match(T__13);
				setState(537);
				match(ID);
				}
				}
				setState(542);
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
		enterRule(_localctx, 74, RULE_argList);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(543);
			argItem();
			setState(548);
			_errHandler.sync(this);
			_la = _input.LA(1);
			while (_la==T__2) {
				{
				{
				setState(544);
				match(T__2);
				setState(545);
				argItem();
				}
				}
				setState(550);
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
		enterRule(_localctx, 76, RULE_argItem);
		try {
			setState(554);
			_errHandler.sync(this);
			switch (_input.LA(1)) {
			case REF:
				enterOuterAlt(_localctx, 1);
				{
				setState(551);
				match(REF);
				setState(552);
				match(ID);
				}
				break;
			case T__0:
			case TRUE:
			case FALSE:
			case NIL:
			case INT_TYPE:
			case FLOAT_TYPE:
			case STRING_TYPE:
			case BOOL_TYPE:
			case RUNE_TYPE:
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
				setState(553);
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
		enterRule(_localctx, 78, RULE_expression);
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(556);
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
		enterRule(_localctx, 80, RULE_logicalOr);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(558);
			logicalAnd();
			setState(563);
			_errHandler.sync(this);
			_la = _input.LA(1);
			while (_la==OR) {
				{
				{
				setState(559);
				match(OR);
				setState(560);
				logicalAnd();
				}
				}
				setState(565);
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
		enterRule(_localctx, 82, RULE_logicalAnd);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(566);
			equality();
			setState(571);
			_errHandler.sync(this);
			_la = _input.LA(1);
			while (_la==AND) {
				{
				{
				setState(567);
				match(AND);
				setState(568);
				equality();
				}
				}
				setState(573);
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
		enterRule(_localctx, 84, RULE_equality);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(574);
			comparison();
			setState(579);
			_errHandler.sync(this);
			_la = _input.LA(1);
			while (_la==EQ || _la==NEQ) {
				{
				{
				setState(575);
				_la = _input.LA(1);
				if ( !(_la==EQ || _la==NEQ) ) {
				_errHandler.recoverInline(this);
				}
				else {
					if ( _input.LA(1)==Token.EOF ) matchedEOF = true;
					_errHandler.reportMatch(this);
					consume();
				}
				setState(576);
				comparison();
				}
				}
				setState(581);
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
		enterRule(_localctx, 86, RULE_comparison);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(582);
			term();
			setState(587);
			_errHandler.sync(this);
			_la = _input.LA(1);
			while ((((_la) & ~0x3f) == 0 && ((1L << _la) & 131941395333120L) != 0)) {
				{
				{
				setState(583);
				_la = _input.LA(1);
				if ( !((((_la) & ~0x3f) == 0 && ((1L << _la) & 131941395333120L) != 0)) ) {
				_errHandler.recoverInline(this);
				}
				else {
					if ( _input.LA(1)==Token.EOF ) matchedEOF = true;
					_errHandler.reportMatch(this);
					consume();
				}
				setState(584);
				term();
				}
				}
				setState(589);
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
		enterRule(_localctx, 88, RULE_term);
		int _la;
		try {
			int _alt;
			enterOuterAlt(_localctx, 1);
			{
			setState(590);
			factor();
			setState(595);
			_errHandler.sync(this);
			_alt = getInterpreter().adaptivePredict(_input,70,_ctx);
			while ( _alt!=2 && _alt!=org.antlr.v4.runtime.atn.ATN.INVALID_ALT_NUMBER ) {
				if ( _alt==1 ) {
					{
					{
					setState(591);
					_la = _input.LA(1);
					if ( !(_la==PLUS || _la==MINUS) ) {
					_errHandler.recoverInline(this);
					}
					else {
						if ( _input.LA(1)==Token.EOF ) matchedEOF = true;
						_errHandler.reportMatch(this);
						consume();
					}
					setState(592);
					factor();
					}
					} 
				}
				setState(597);
				_errHandler.sync(this);
				_alt = getInterpreter().adaptivePredict(_input,70,_ctx);
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
		enterRule(_localctx, 90, RULE_factor);
		int _la;
		try {
			int _alt;
			enterOuterAlt(_localctx, 1);
			{
			setState(598);
			unary();
			setState(603);
			_errHandler.sync(this);
			_alt = getInterpreter().adaptivePredict(_input,71,_ctx);
			while ( _alt!=2 && _alt!=org.antlr.v4.runtime.atn.ATN.INVALID_ALT_NUMBER ) {
				if ( _alt==1 ) {
					{
					{
					setState(599);
					_la = _input.LA(1);
					if ( !((((_la) & ~0x3f) == 0 && ((1L << _la) & 3940649673949184L) != 0)) ) {
					_errHandler.recoverInline(this);
					}
					else {
						if ( _input.LA(1)==Token.EOF ) matchedEOF = true;
						_errHandler.reportMatch(this);
						consume();
					}
					setState(600);
					unary();
					}
					} 
				}
				setState(605);
				_errHandler.sync(this);
				_alt = getInterpreter().adaptivePredict(_input,71,_ctx);
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
		enterRule(_localctx, 92, RULE_unary);
		try {
			setState(613);
			_errHandler.sync(this);
			switch (_input.LA(1)) {
			case BANG:
				enterOuterAlt(_localctx, 1);
				{
				setState(606);
				match(BANG);
				setState(607);
				unary();
				}
				break;
			case MINUS:
				enterOuterAlt(_localctx, 2);
				{
				setState(608);
				match(MINUS);
				setState(609);
				unary();
				}
				break;
			case STAR:
				enterOuterAlt(_localctx, 3);
				{
				setState(610);
				match(STAR);
				setState(611);
				unary();
				}
				break;
			case T__0:
			case TRUE:
			case FALSE:
			case NIL:
			case INT_TYPE:
			case FLOAT_TYPE:
			case STRING_TYPE:
			case BOOL_TYPE:
			case RUNE_TYPE:
			case ID:
			case FLOAT:
			case INT:
			case STRING:
			case RUNE:
				enterOuterAlt(_localctx, 4);
				{
				setState(612);
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
		public TypeCastContext typeCast() {
			return getRuleContext(TypeCastContext.class,0);
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
		enterRule(_localctx, 94, RULE_primary);
		try {
			setState(630);
			_errHandler.sync(this);
			switch ( getInterpreter().adaptivePredict(_input,73,_ctx) ) {
			case 1:
				enterOuterAlt(_localctx, 1);
				{
				setState(615);
				match(T__0);
				setState(616);
				expression();
				setState(617);
				match(T__1);
				}
				break;
			case 2:
				enterOuterAlt(_localctx, 2);
				{
				setState(619);
				functionCall();
				}
				break;
			case 3:
				enterOuterAlt(_localctx, 3);
				{
				setState(620);
				arrayAccess();
				}
				break;
			case 4:
				enterOuterAlt(_localctx, 4);
				{
				setState(621);
				typeCast();
				}
				break;
			case 5:
				enterOuterAlt(_localctx, 5);
				{
				setState(622);
				match(ID);
				}
				break;
			case 6:
				enterOuterAlt(_localctx, 6);
				{
				setState(623);
				match(INT);
				}
				break;
			case 7:
				enterOuterAlt(_localctx, 7);
				{
				setState(624);
				match(FLOAT);
				}
				break;
			case 8:
				enterOuterAlt(_localctx, 8);
				{
				setState(625);
				match(STRING);
				}
				break;
			case 9:
				enterOuterAlt(_localctx, 9);
				{
				setState(626);
				match(RUNE);
				}
				break;
			case 10:
				enterOuterAlt(_localctx, 10);
				{
				setState(627);
				match(TRUE);
				}
				break;
			case 11:
				enterOuterAlt(_localctx, 11);
				{
				setState(628);
				match(FALSE);
				}
				break;
			case 12:
				enterOuterAlt(_localctx, 12);
				{
				setState(629);
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
	public static class TypeCastContext extends ParserRuleContext {
		public TypeContext type() {
			return getRuleContext(TypeContext.class,0);
		}
		public ExpressionContext expression() {
			return getRuleContext(ExpressionContext.class,0);
		}
		public TypeCastContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_typeCast; }
	}

	public final TypeCastContext typeCast() throws RecognitionException {
		TypeCastContext _localctx = new TypeCastContext(_ctx, getState());
		enterRule(_localctx, 96, RULE_typeCast);
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(632);
			type();
			setState(633);
			match(T__0);
			setState(634);
			expression();
			setState(635);
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
		enterRule(_localctx, 98, RULE_type);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(637);
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
		"\u0004\u0001=\u0280\u0002\u0000\u0007\u0000\u0002\u0001\u0007\u0001\u0002"+
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
		"-\u0007-\u0002.\u0007.\u0002/\u0007/\u00020\u00070\u00021\u00071\u0001"+
		"\u0000\u0001\u0000\u0001\u0000\u0004\u0000h\b\u0000\u000b\u0000\f\u0000"+
		"i\u0001\u0000\u0001\u0000\u0001\u0001\u0001\u0001\u0001\u0001\u0001\u0001"+
		"\u0003\u0001r\b\u0001\u0001\u0001\u0001\u0001\u0003\u0001v\b\u0001\u0001"+
		"\u0001\u0001\u0001\u0001\u0002\u0001\u0002\u0001\u0002\u0005\u0002}\b"+
		"\u0002\n\u0002\f\u0002\u0080\t\u0002\u0001\u0003\u0001\u0003\u0001\u0003"+
		"\u0001\u0003\u0001\u0003\u0001\u0003\u0001\u0003\u0001\u0003\u0001\u0003"+
		"\u0001\u0003\u0001\u0003\u0001\u0003\u0001\u0003\u0001\u0003\u0001\u0003"+
		"\u0003\u0003\u0091\b\u0003\u0001\u0004\u0001\u0004\u0001\u0004\u0001\u0004"+
		"\u0001\u0004\u0001\u0004\u0001\u0004\u0001\u0004\u0001\u0004\u0001\u0004"+
		"\u0001\u0004\u0001\u0004\u0001\u0004\u0005\u0004\u00a0\b\u0004\n\u0004"+
		"\f\u0004\u00a3\t\u0004\u0001\u0004\u0001\u0004\u0003\u0004\u00a7\b\u0004"+
		"\u0001\u0005\u0001\u0005\u0001\u0005\u0001\u0005\u0001\u0005\u0001\u0005"+
		"\u0001\u0005\u0001\u0005\u0001\u0005\u0003\u0005\u00b2\b\u0005\u0001\u0006"+
		"\u0001\u0006\u0001\u0006\u0001\u0006\u0001\u0007\u0001\u0007\u0005\u0007"+
		"\u00ba\b\u0007\n\u0007\f\u0007\u00bd\t\u0007\u0001\u0007\u0001\u0007\u0001"+
		"\b\u0001\b\u0001\b\u0001\b\u0001\b\u0001\b\u0001\b\u0001\b\u0001\b\u0001"+
		"\b\u0001\b\u0001\b\u0001\b\u0001\b\u0001\b\u0003\b\u00d0\b\b\u0001\b\u0001"+
		"\b\u0001\b\u0003\b\u00d5\b\b\u0003\b\u00d7\b\b\u0001\t\u0001\t\u0001\t"+
		"\u0001\t\u0001\t\u0003\t\u00de\b\t\u0001\t\u0003\t\u00e1\b\t\u0001\t\u0001"+
		"\t\u0001\t\u0001\t\u0001\t\u0001\t\u0003\t\u00e9\b\t\u0001\t\u0001\t\u0001"+
		"\t\u0001\t\u0001\t\u0003\t\u00f0\b\t\u0001\t\u0001\t\u0001\t\u0001\t\u0001"+
		"\t\u0003\t\u00f7\b\t\u0001\t\u0003\t\u00fa\b\t\u0001\t\u0001\t\u0001\t"+
		"\u0001\t\u0001\t\u0001\t\u0003\t\u0102\b\t\u0001\t\u0001\t\u0001\t\u0001"+
		"\t\u0001\t\u0003\t\u0109\b\t\u0001\t\u0001\t\u0001\t\u0001\t\u0001\t\u0003"+
		"\t\u0110\b\t\u0003\t\u0112\b\t\u0001\n\u0001\n\u0001\n\u0001\n\u0003\n"+
		"\u0118\b\n\u0001\n\u0001\n\u0001\n\u0001\n\u0003\n\u011e\b\n\u0003\n\u0120"+
		"\b\n\u0001\u000b\u0001\u000b\u0001\u000b\u0001\u000b\u0001\u000b\u0001"+
		"\u000b\u0003\u000b\u0128\b\u000b\u0001\f\u0001\f\u0001\f\u0005\f\u012d"+
		"\b\f\n\f\f\f\u0130\t\f\u0001\r\u0001\r\u0001\r\u0005\r\u0135\b\r\n\r\f"+
		"\r\u0138\t\r\u0001\u000e\u0001\u000e\u0001\u000e\u0001\u000e\u0001\u000e"+
		"\u0001\u000e\u0001\u000e\u0001\u000e\u0003\u000e\u0142\b\u000e\u0001\u000f"+
		"\u0001\u000f\u0001\u000f\u0001\u000f\u0001\u000f\u0001\u000f\u0003\u000f"+
		"\u014a\b\u000f\u0001\u000f\u0001\u000f\u0001\u000f\u0001\u000f\u0001\u000f"+
		"\u0001\u000f\u0001\u000f\u0001\u000f\u0003\u000f\u0154\b\u000f\u0001\u000f"+
		"\u0001\u000f\u0001\u000f\u0001\u000f\u0001\u000f\u0001\u000f\u0001\u000f"+
		"\u0003\u000f\u015d\b\u000f\u0001\u000f\u0001\u000f\u0003\u000f\u0161\b"+
		"\u000f\u0001\u0010\u0001\u0010\u0001\u0010\u0005\u0010\u0166\b\u0010\n"+
		"\u0010\f\u0010\u0169\t\u0010\u0001\u0010\u0003\u0010\u016c\b\u0010\u0001"+
		"\u0011\u0001\u0011\u0001\u0011\u0005\u0011\u0171\b\u0011\n\u0011\f\u0011"+
		"\u0174\t\u0011\u0001\u0011\u0003\u0011\u0177\b\u0011\u0001\u0012\u0001"+
		"\u0012\u0003\u0012\u017b\b\u0012\u0001\u0012\u0001\u0012\u0001\u0012\u0003"+
		"\u0012\u0180\b\u0012\u0001\u0012\u0003\u0012\u0183\b\u0012\u0001\u0013"+
		"\u0001\u0013\u0001\u0013\u0001\u0013\u0001\u0013\u0004\u0013\u018a\b\u0013"+
		"\u000b\u0013\f\u0013\u018b\u0001\u0014\u0001\u0014\u0001\u0014\u0001\u0014"+
		"\u0001\u0014\u0003\u0014\u0193\b\u0014\u0001\u0015\u0001\u0015\u0001\u0015"+
		"\u0001\u0015\u0001\u0015\u0004\u0015\u019a\b\u0015\u000b\u0015\f\u0015"+
		"\u019b\u0001\u0015\u0001\u0015\u0001\u0015\u0003\u0015\u01a1\b\u0015\u0001"+
		"\u0016\u0001\u0016\u0001\u0016\u0001\u0016\u0003\u0016\u01a7\b\u0016\u0001"+
		"\u0017\u0001\u0017\u0001\u0018\u0001\u0018\u0001\u0018\u0001\u0018\u0001"+
		"\u0018\u0001\u0018\u0003\u0018\u01b1\b\u0018\u0003\u0018\u01b3\b\u0018"+
		"\u0001\u0019\u0001\u0019\u0001\u0019\u0001\u0019\u0001\u0019\u0001\u0019"+
		"\u0001\u0019\u0001\u0019\u0001\u0019\u0001\u0019\u0001\u0019\u0001\u0019"+
		"\u0001\u0019\u0001\u0019\u0003\u0019\u01c3\b\u0019\u0001\u001a\u0001\u001a"+
		"\u0001\u001a\u0001\u001a\u0001\u001a\u0001\u001a\u0003\u001a\u01cb\b\u001a"+
		"\u0001\u001b\u0001\u001b\u0001\u001b\u0001\u001b\u0001\u001b\u0001\u001b"+
		"\u0001\u001b\u0001\u001b\u0003\u001b\u01d5\b\u001b\u0001\u001c\u0001\u001c"+
		"\u0001\u001c\u0001\u001c\u0005\u001c\u01db\b\u001c\n\u001c\f\u001c\u01de"+
		"\t\u001c\u0001\u001c\u0003\u001c\u01e1\b\u001c\u0001\u001c\u0001\u001c"+
		"\u0001\u001d\u0001\u001d\u0001\u001d\u0001\u001d\u0005\u001d\u01e9\b\u001d"+
		"\n\u001d\f\u001d\u01ec\t\u001d\u0001\u001e\u0001\u001e\u0001\u001e\u0005"+
		"\u001e\u01f1\b\u001e\n\u001e\f\u001e\u01f4\t\u001e\u0001\u001f\u0001\u001f"+
		"\u0003\u001f\u01f8\b\u001f\u0001 \u0001 \u0003 \u01fc\b \u0001!\u0001"+
		"!\u0001!\u0003!\u0201\b!\u0001!\u0001!\u0001!\u0003!\u0206\b!\u0003!\u0208"+
		"\b!\u0001\"\u0001\"\u0003\"\u020c\b\"\u0001\"\u0003\"\u020f\b\"\u0001"+
		"#\u0001#\u0001#\u0003#\u0214\b#\u0001#\u0001#\u0001$\u0001$\u0001$\u0005"+
		"$\u021b\b$\n$\f$\u021e\t$\u0001%\u0001%\u0001%\u0005%\u0223\b%\n%\f%\u0226"+
		"\t%\u0001&\u0001&\u0001&\u0003&\u022b\b&\u0001\'\u0001\'\u0001(\u0001"+
		"(\u0001(\u0005(\u0232\b(\n(\f(\u0235\t(\u0001)\u0001)\u0001)\u0005)\u023a"+
		"\b)\n)\f)\u023d\t)\u0001*\u0001*\u0001*\u0005*\u0242\b*\n*\f*\u0245\t"+
		"*\u0001+\u0001+\u0001+\u0005+\u024a\b+\n+\f+\u024d\t+\u0001,\u0001,\u0001"+
		",\u0005,\u0252\b,\n,\f,\u0255\t,\u0001-\u0001-\u0001-\u0005-\u025a\b-"+
		"\n-\f-\u025d\t-\u0001.\u0001.\u0001.\u0001.\u0001.\u0001.\u0001.\u0003"+
		".\u0266\b.\u0001/\u0001/\u0001/\u0001/\u0001/\u0001/\u0001/\u0001/\u0001"+
		"/\u0001/\u0001/\u0001/\u0001/\u0001/\u0001/\u0003/\u0277\b/\u00010\u0001"+
		"0\u00010\u00010\u00010\u00011\u00011\u00011\u0000\u00002\u0000\u0002\u0004"+
		"\u0006\b\n\f\u000e\u0010\u0012\u0014\u0016\u0018\u001a\u001c\u001e \""+
		"$&(*,.02468:<>@BDFHJLNPRTVXZ\\^`b\u0000\u0006\u0002\u0000\t\t#&\u0001"+
		"\u0000)*\u0001\u0000+.\u0001\u0000/0\u0001\u000013\u0001\u0000\u001e\""+
		"\u02c7\u0000g\u0001\u0000\u0000\u0000\u0002m\u0001\u0000\u0000\u0000\u0004"+
		"y\u0001\u0000\u0000\u0000\u0006\u0090\u0001\u0000\u0000\u0000\b\u00a6"+
		"\u0001\u0000\u0000\u0000\n\u00b1\u0001\u0000\u0000\u0000\f\u00b3\u0001"+
		"\u0000\u0000\u0000\u000e\u00b7\u0001\u0000\u0000\u0000\u0010\u00d6\u0001"+
		"\u0000\u0000\u0000\u0012\u0111\u0001\u0000\u0000\u0000\u0014\u011f\u0001"+
		"\u0000\u0000\u0000\u0016\u0121\u0001\u0000\u0000\u0000\u0018\u0129\u0001"+
		"\u0000\u0000\u0000\u001a\u0131\u0001\u0000\u0000\u0000\u001c\u0141\u0001"+
		"\u0000\u0000\u0000\u001e\u0160\u0001\u0000\u0000\u0000 \u0162\u0001\u0000"+
		"\u0000\u0000\"\u016d\u0001\u0000\u0000\u0000$\u0182\u0001\u0000\u0000"+
		"\u0000&\u0184\u0001\u0000\u0000\u0000(\u018d\u0001\u0000\u0000\u0000*"+
		"\u0194\u0001\u0000\u0000\u0000,\u01a2\u0001\u0000\u0000\u0000.\u01a8\u0001"+
		"\u0000\u0000\u00000\u01aa\u0001\u0000\u0000\u00002\u01c2\u0001\u0000\u0000"+
		"\u00004\u01ca\u0001\u0000\u0000\u00006\u01d4\u0001\u0000\u0000\u00008"+
		"\u01d6\u0001\u0000\u0000\u0000:\u01e4\u0001\u0000\u0000\u0000<\u01ed\u0001"+
		"\u0000\u0000\u0000>\u01f5\u0001\u0000\u0000\u0000@\u01f9\u0001\u0000\u0000"+
		"\u0000B\u0207\u0001\u0000\u0000\u0000D\u0209\u0001\u0000\u0000\u0000F"+
		"\u0210\u0001\u0000\u0000\u0000H\u0217\u0001\u0000\u0000\u0000J\u021f\u0001"+
		"\u0000\u0000\u0000L\u022a\u0001\u0000\u0000\u0000N\u022c\u0001\u0000\u0000"+
		"\u0000P\u022e\u0001\u0000\u0000\u0000R\u0236\u0001\u0000\u0000\u0000T"+
		"\u023e\u0001\u0000\u0000\u0000V\u0246\u0001\u0000\u0000\u0000X\u024e\u0001"+
		"\u0000\u0000\u0000Z\u0256\u0001\u0000\u0000\u0000\\\u0265\u0001\u0000"+
		"\u0000\u0000^\u0276\u0001\u0000\u0000\u0000`\u0278\u0001\u0000\u0000\u0000"+
		"b\u027d\u0001\u0000\u0000\u0000dh\u0003\u0002\u0001\u0000eh\u0003\u0012"+
		"\t\u0000fh\u0003\u0016\u000b\u0000gd\u0001\u0000\u0000\u0000ge\u0001\u0000"+
		"\u0000\u0000gf\u0001\u0000\u0000\u0000hi\u0001\u0000\u0000\u0000ig\u0001"+
		"\u0000\u0000\u0000ij\u0001\u0000\u0000\u0000jk\u0001\u0000\u0000\u0000"+
		"kl\u0005\u0000\u0000\u0001l\u0001\u0001\u0000\u0000\u0000mn\u0005\u000f"+
		"\u0000\u0000no\u00056\u0000\u0000oq\u0005\u0001\u0000\u0000pr\u0003\u0004"+
		"\u0002\u0000qp\u0001\u0000\u0000\u0000qr\u0001\u0000\u0000\u0000rs\u0001"+
		"\u0000\u0000\u0000su\u0005\u0002\u0000\u0000tv\u0003\b\u0004\u0000ut\u0001"+
		"\u0000\u0000\u0000uv\u0001\u0000\u0000\u0000vw\u0001\u0000\u0000\u0000"+
		"wx\u0003\u000e\u0007\u0000x\u0003\u0001\u0000\u0000\u0000y~\u0003\u0006"+
		"\u0003\u0000z{\u0005\u0003\u0000\u0000{}\u0003\u0006\u0003\u0000|z\u0001"+
		"\u0000\u0000\u0000}\u0080\u0001\u0000\u0000\u0000~|\u0001\u0000\u0000"+
		"\u0000~\u007f\u0001\u0000\u0000\u0000\u007f\u0005\u0001\u0000\u0000\u0000"+
		"\u0080~\u0001\u0000\u0000\u0000\u0081\u0082\u00056\u0000\u0000\u0082\u0091"+
		"\u0003b1\u0000\u0083\u0084\u00056\u0000\u0000\u0084\u0085\u00051\u0000"+
		"\u0000\u0085\u0091\u0003b1\u0000\u0086\u0087\u00056\u0000\u0000\u0087"+
		"\u0088\u00051\u0000\u0000\u0088\u0091\u0003\u001c\u000e\u0000\u0089\u008a"+
		"\u00056\u0000\u0000\u008a\u008b\u00051\u0000\u0000\u008b\u0091\u0003\f"+
		"\u0006\u0000\u008c\u008d\u00056\u0000\u0000\u008d\u0091\u0003\u001c\u000e"+
		"\u0000\u008e\u008f\u00056\u0000\u0000\u008f\u0091\u0003\f\u0006\u0000"+
		"\u0090\u0081\u0001\u0000\u0000\u0000\u0090\u0083\u0001\u0000\u0000\u0000"+
		"\u0090\u0086\u0001\u0000\u0000\u0000\u0090\u0089\u0001\u0000\u0000\u0000"+
		"\u0090\u008c\u0001\u0000\u0000\u0000\u0090\u008e\u0001\u0000\u0000\u0000"+
		"\u0091\u0007\u0001\u0000\u0000\u0000\u0092\u00a7\u0003b1\u0000\u0093\u00a7"+
		"\u0003\u001c\u000e\u0000\u0094\u00a7\u0003\f\u0006\u0000\u0095\u0096\u0005"+
		"1\u0000\u0000\u0096\u00a7\u0003b1\u0000\u0097\u0098\u00051\u0000\u0000"+
		"\u0098\u00a7\u0003\u001c\u000e\u0000\u0099\u009a\u00051\u0000\u0000\u009a"+
		"\u00a7\u0003\f\u0006\u0000\u009b\u009c\u0005\u0001\u0000\u0000\u009c\u00a1"+
		"\u0003\n\u0005\u0000\u009d\u009e\u0005\u0003\u0000\u0000\u009e\u00a0\u0003"+
		"\n\u0005\u0000\u009f\u009d\u0001\u0000\u0000\u0000\u00a0\u00a3\u0001\u0000"+
		"\u0000\u0000\u00a1\u009f\u0001\u0000\u0000\u0000\u00a1\u00a2\u0001\u0000"+
		"\u0000\u0000\u00a2\u00a4\u0001\u0000\u0000\u0000\u00a3\u00a1\u0001\u0000"+
		"\u0000\u0000\u00a4\u00a5\u0005\u0002\u0000\u0000\u00a5\u00a7\u0001\u0000"+
		"\u0000\u0000\u00a6\u0092\u0001\u0000\u0000\u0000\u00a6\u0093\u0001\u0000"+
		"\u0000\u0000\u00a6\u0094\u0001\u0000\u0000\u0000\u00a6\u0095\u0001\u0000"+
		"\u0000\u0000\u00a6\u0097\u0001\u0000\u0000\u0000\u00a6\u0099\u0001\u0000"+
		"\u0000\u0000\u00a6\u009b\u0001\u0000\u0000\u0000\u00a7\t\u0001\u0000\u0000"+
		"\u0000\u00a8\u00b2\u0003b1\u0000\u00a9\u00b2\u0003\u001c\u000e\u0000\u00aa"+
		"\u00b2\u0003\f\u0006\u0000\u00ab\u00ac\u00051\u0000\u0000\u00ac\u00b2"+
		"\u0003b1\u0000\u00ad\u00ae\u00051\u0000\u0000\u00ae\u00b2\u0003\u001c"+
		"\u000e\u0000\u00af\u00b0\u00051\u0000\u0000\u00b0\u00b2\u0003\f\u0006"+
		"\u0000\u00b1\u00a8\u0001\u0000\u0000\u0000\u00b1\u00a9\u0001\u0000\u0000"+
		"\u0000\u00b1\u00aa\u0001\u0000\u0000\u0000\u00b1\u00ab\u0001\u0000\u0000"+
		"\u0000\u00b1\u00ad\u0001\u0000\u0000\u0000\u00b1\u00af\u0001\u0000\u0000"+
		"\u0000\u00b2\u000b\u0001\u0000\u0000\u0000\u00b3\u00b4\u0005\u0004\u0000"+
		"\u0000\u00b4\u00b5\u0005\u0005\u0000\u0000\u00b5\u00b6\u0003b1\u0000\u00b6"+
		"\r\u0001\u0000\u0000\u0000\u00b7\u00bb\u0005\u0006\u0000\u0000\u00b8\u00ba"+
		"\u0003\u0010\b\u0000\u00b9\u00b8\u0001\u0000\u0000\u0000\u00ba\u00bd\u0001"+
		"\u0000\u0000\u0000\u00bb\u00b9\u0001\u0000\u0000\u0000\u00bb\u00bc\u0001"+
		"\u0000\u0000\u0000\u00bc\u00be\u0001\u0000\u0000\u0000\u00bd\u00bb\u0001"+
		"\u0000\u0000\u0000\u00be\u00bf\u0005\u0007\u0000\u0000\u00bf\u000f\u0001"+
		"\u0000\u0000\u0000\u00c0\u00d7\u0003\u0012\t\u0000\u00c1\u00d7\u0003\u0014"+
		"\n\u0000\u00c2\u00d7\u0003\u0016\u000b\u0000\u00c3\u00d7\u0003(\u0014"+
		"\u0000\u00c4\u00d7\u0003*\u0015\u0000\u00c5\u00d7\u0003,\u0016\u0000\u00c6"+
		"\u00d7\u00030\u0018\u0000\u00c7\u00d7\u00032\u0019\u0000\u00c8\u00d7\u0003"+
		"8\u001c\u0000\u00c9\u00d7\u0003>\u001f\u0000\u00ca\u00d7\u0003@ \u0000"+
		"\u00cb\u00d7\u0003B!\u0000\u00cc\u00d7\u0003D\"\u0000\u00cd\u00cf\u0003"+
		"F#\u0000\u00ce\u00d0\u0005\b\u0000\u0000\u00cf\u00ce\u0001\u0000\u0000"+
		"\u0000\u00cf\u00d0\u0001\u0000\u0000\u0000\u00d0\u00d7\u0001\u0000\u0000"+
		"\u0000\u00d1\u00d7\u0003\u000e\u0007\u0000\u00d2\u00d4\u0003N\'\u0000"+
		"\u00d3\u00d5\u0005\b\u0000\u0000\u00d4\u00d3\u0001\u0000\u0000\u0000\u00d4"+
		"\u00d5\u0001\u0000\u0000\u0000\u00d5\u00d7\u0001\u0000\u0000\u0000\u00d6"+
		"\u00c0\u0001\u0000\u0000\u0000\u00d6\u00c1\u0001\u0000\u0000\u0000\u00d6"+
		"\u00c2\u0001\u0000\u0000\u0000\u00d6\u00c3\u0001\u0000\u0000\u0000\u00d6"+
		"\u00c4\u0001\u0000\u0000\u0000\u00d6\u00c5\u0001\u0000\u0000\u0000\u00d6"+
		"\u00c6\u0001\u0000\u0000\u0000\u00d6\u00c7\u0001\u0000\u0000\u0000\u00d6"+
		"\u00c8\u0001\u0000\u0000\u0000\u00d6\u00c9\u0001\u0000\u0000\u0000\u00d6"+
		"\u00ca\u0001\u0000\u0000\u0000\u00d6\u00cb\u0001\u0000\u0000\u0000\u00d6"+
		"\u00cc\u0001\u0000\u0000\u0000\u00d6\u00cd\u0001\u0000\u0000\u0000\u00d6"+
		"\u00d1\u0001\u0000\u0000\u0000\u00d6\u00d2\u0001\u0000\u0000\u0000\u00d7"+
		"\u0011\u0001\u0000\u0000\u0000\u00d8\u00d9\u0005\u0010\u0000\u0000\u00d9"+
		"\u00da\u00056\u0000\u0000\u00da\u00dd\u0003b1\u0000\u00db\u00dc\u0005"+
		"\t\u0000\u0000\u00dc\u00de\u0003N\'\u0000\u00dd\u00db\u0001\u0000\u0000"+
		"\u0000\u00dd\u00de\u0001\u0000\u0000\u0000\u00de\u00e0\u0001\u0000\u0000"+
		"\u0000\u00df\u00e1\u0005\b\u0000\u0000\u00e0\u00df\u0001\u0000\u0000\u0000"+
		"\u00e0\u00e1\u0001\u0000\u0000\u0000\u00e1\u0112\u0001\u0000\u0000\u0000"+
		"\u00e2\u00e3\u0005\u0010\u0000\u0000\u00e3\u00e4\u0003\u0018\f\u0000\u00e4"+
		"\u00e5\u0003b1\u0000\u00e5\u00e6\u0005\t\u0000\u0000\u00e6\u00e8\u0003"+
		"\u001a\r\u0000\u00e7\u00e9\u0005\b\u0000\u0000\u00e8\u00e7\u0001\u0000"+
		"\u0000\u0000\u00e8\u00e9\u0001\u0000\u0000\u0000\u00e9\u0112\u0001\u0000"+
		"\u0000\u0000\u00ea\u00eb\u0005\u0010\u0000\u0000\u00eb\u00ec\u0003\u0018"+
		"\f\u0000\u00ec\u00ed\u0005\t\u0000\u0000\u00ed\u00ef\u0003\u001a\r\u0000"+
		"\u00ee\u00f0\u0005\b\u0000\u0000\u00ef\u00ee\u0001\u0000\u0000\u0000\u00ef"+
		"\u00f0\u0001\u0000\u0000\u0000\u00f0\u0112\u0001\u0000\u0000\u0000\u00f1"+
		"\u00f2\u0005\u0010\u0000\u0000\u00f2\u00f3\u00056\u0000\u0000\u00f3\u00f6"+
		"\u0003\u001c\u000e\u0000\u00f4\u00f5\u0005\t\u0000\u0000\u00f5\u00f7\u0003"+
		"\u001e\u000f\u0000\u00f6\u00f4\u0001\u0000\u0000\u0000\u00f6\u00f7\u0001"+
		"\u0000\u0000\u0000\u00f7\u00f9\u0001\u0000\u0000\u0000\u00f8\u00fa\u0005"+
		"\b\u0000\u0000\u00f9\u00f8\u0001\u0000\u0000\u0000\u00f9\u00fa\u0001\u0000"+
		"\u0000\u0000\u00fa\u0112\u0001\u0000\u0000\u0000\u00fb\u00fc\u0005\u0010"+
		"\u0000\u0000\u00fc\u00fd\u00056\u0000\u0000\u00fd\u00fe\u0003\u001c\u000e"+
		"\u0000\u00fe\u00ff\u0005\t\u0000\u0000\u00ff\u0101\u0003N\'\u0000\u0100"+
		"\u0102\u0005\b\u0000\u0000\u0101\u0100\u0001\u0000\u0000\u0000\u0101\u0102"+
		"\u0001\u0000\u0000\u0000\u0102\u0112\u0001\u0000\u0000\u0000\u0103\u0104"+
		"\u0005\u0010\u0000\u0000\u0104\u0105\u00056\u0000\u0000\u0105\u0106\u0005"+
		"1\u0000\u0000\u0106\u0108\u0003b1\u0000\u0107\u0109\u0005\b\u0000\u0000"+
		"\u0108\u0107\u0001\u0000\u0000\u0000\u0108\u0109\u0001\u0000\u0000\u0000"+
		"\u0109\u0112\u0001\u0000\u0000\u0000\u010a\u010b\u0005\u0010\u0000\u0000"+
		"\u010b\u010c\u00056\u0000\u0000\u010c\u010d\u00051\u0000\u0000\u010d\u010f"+
		"\u0003\u001c\u000e\u0000\u010e\u0110\u0005\b\u0000\u0000\u010f\u010e\u0001"+
		"\u0000\u0000\u0000\u010f\u0110\u0001\u0000\u0000\u0000\u0110\u0112\u0001"+
		"\u0000\u0000\u0000\u0111\u00d8\u0001\u0000\u0000\u0000\u0111\u00e2\u0001"+
		"\u0000\u0000\u0000\u0111\u00ea\u0001\u0000\u0000\u0000\u0111\u00f1\u0001"+
		"\u0000\u0000\u0000\u0111\u00fb\u0001\u0000\u0000\u0000\u0111\u0103\u0001"+
		"\u0000\u0000\u0000\u0111\u010a\u0001\u0000\u0000\u0000\u0112\u0013\u0001"+
		"\u0000\u0000\u0000\u0113\u0114\u0003\u0018\f\u0000\u0114\u0115\u0005\n"+
		"\u0000\u0000\u0115\u0117\u0003\u001a\r\u0000\u0116\u0118\u0005\b\u0000"+
		"\u0000\u0117\u0116\u0001\u0000\u0000\u0000\u0117\u0118\u0001\u0000\u0000"+
		"\u0000\u0118\u0120\u0001\u0000\u0000\u0000\u0119\u011a\u00056\u0000\u0000"+
		"\u011a\u011b\u0005\n\u0000\u0000\u011b\u011d\u0003\u001e\u000f\u0000\u011c"+
		"\u011e\u0005\b\u0000\u0000\u011d\u011c\u0001\u0000\u0000\u0000\u011d\u011e"+
		"\u0001\u0000\u0000\u0000\u011e\u0120\u0001\u0000\u0000\u0000\u011f\u0113"+
		"\u0001\u0000\u0000\u0000\u011f\u0119\u0001\u0000\u0000\u0000\u0120\u0015"+
		"\u0001\u0000\u0000\u0000\u0121\u0122\u0005\u0011\u0000\u0000\u0122\u0123"+
		"\u00056\u0000\u0000\u0123\u0124\u0003b1\u0000\u0124\u0125\u0005\t\u0000"+
		"\u0000\u0125\u0127\u0003N\'\u0000\u0126\u0128\u0005\b\u0000\u0000\u0127"+
		"\u0126\u0001\u0000\u0000\u0000\u0127\u0128\u0001\u0000\u0000\u0000\u0128"+
		"\u0017\u0001\u0000\u0000\u0000\u0129\u012e\u00056\u0000\u0000\u012a\u012b"+
		"\u0005\u0003\u0000\u0000\u012b\u012d\u00056\u0000\u0000\u012c\u012a\u0001"+
		"\u0000\u0000\u0000\u012d\u0130\u0001\u0000\u0000\u0000\u012e\u012c\u0001"+
		"\u0000\u0000\u0000\u012e\u012f\u0001\u0000\u0000\u0000\u012f\u0019\u0001"+
		"\u0000\u0000\u0000\u0130\u012e\u0001\u0000\u0000\u0000\u0131\u0136\u0003"+
		"N\'\u0000\u0132\u0133\u0005\u0003\u0000\u0000\u0133\u0135\u0003N\'\u0000"+
		"\u0134\u0132\u0001\u0000\u0000\u0000\u0135\u0138\u0001\u0000\u0000\u0000"+
		"\u0136\u0134\u0001\u0000\u0000\u0000\u0136\u0137\u0001\u0000\u0000\u0000"+
		"\u0137\u001b\u0001\u0000\u0000\u0000\u0138\u0136\u0001\u0000\u0000\u0000"+
		"\u0139\u013a\u0005\u0004\u0000\u0000\u013a\u013b\u00058\u0000\u0000\u013b"+
		"\u013c\u0005\u0005\u0000\u0000\u013c\u0142\u0003b1\u0000\u013d\u013e\u0005"+
		"\u0004\u0000\u0000\u013e\u013f\u00058\u0000\u0000\u013f\u0140\u0005\u0005"+
		"\u0000\u0000\u0140\u0142\u0003\u001c\u000e\u0000\u0141\u0139\u0001\u0000"+
		"\u0000\u0000\u0141\u013d\u0001\u0000\u0000\u0000\u0142\u001d\u0001\u0000"+
		"\u0000\u0000\u0143\u0144\u0005\u0004\u0000\u0000\u0144\u0145\u00058\u0000"+
		"\u0000\u0145\u0146\u0005\u0005\u0000\u0000\u0146\u0147\u0003b1\u0000\u0147"+
		"\u0149\u0005\u0006\u0000\u0000\u0148\u014a\u0003 \u0010\u0000\u0149\u0148"+
		"\u0001\u0000\u0000\u0000\u0149\u014a\u0001\u0000\u0000\u0000\u014a\u014b"+
		"\u0001\u0000\u0000\u0000\u014b\u014c\u0005\u0007\u0000\u0000\u014c\u0161"+
		"\u0001\u0000\u0000\u0000\u014d\u014e\u0005\u0004\u0000\u0000\u014e\u014f"+
		"\u00058\u0000\u0000\u014f\u0150\u0005\u0005\u0000\u0000\u0150\u0151\u0003"+
		"\u001c\u000e\u0000\u0151\u0153\u0005\u0006\u0000\u0000\u0152\u0154\u0003"+
		"\"\u0011\u0000\u0153\u0152\u0001\u0000\u0000\u0000\u0153\u0154\u0001\u0000"+
		"\u0000\u0000\u0154\u0155\u0001\u0000\u0000\u0000\u0155\u0156\u0005\u0007"+
		"\u0000\u0000\u0156\u0161\u0001\u0000\u0000\u0000\u0157\u0158\u0005\u0004"+
		"\u0000\u0000\u0158\u0159\u0005\u0005\u0000\u0000\u0159\u015a\u0003b1\u0000"+
		"\u015a\u015c\u0005\u0006\u0000\u0000\u015b\u015d\u0003 \u0010\u0000\u015c"+
		"\u015b\u0001\u0000\u0000\u0000\u015c\u015d\u0001\u0000\u0000\u0000\u015d"+
		"\u015e\u0001\u0000\u0000\u0000\u015e\u015f\u0005\u0007\u0000\u0000\u015f"+
		"\u0161\u0001\u0000\u0000\u0000\u0160\u0143\u0001\u0000\u0000\u0000\u0160"+
		"\u014d\u0001\u0000\u0000\u0000\u0160\u0157\u0001\u0000\u0000\u0000\u0161"+
		"\u001f\u0001\u0000\u0000\u0000\u0162\u0167\u0003N\'\u0000\u0163\u0164"+
		"\u0005\u0003\u0000\u0000\u0164\u0166\u0003N\'\u0000\u0165\u0163\u0001"+
		"\u0000\u0000\u0000\u0166\u0169\u0001\u0000\u0000\u0000\u0167\u0165\u0001"+
		"\u0000\u0000\u0000\u0167\u0168\u0001\u0000\u0000\u0000\u0168\u016b\u0001"+
		"\u0000\u0000\u0000\u0169\u0167\u0001\u0000\u0000\u0000\u016a\u016c\u0005"+
		"\u0003\u0000\u0000\u016b\u016a\u0001\u0000\u0000\u0000\u016b\u016c\u0001"+
		"\u0000\u0000\u0000\u016c!\u0001\u0000\u0000\u0000\u016d\u0172\u0003$\u0012"+
		"\u0000\u016e\u016f\u0005\u0003\u0000\u0000\u016f\u0171\u0003$\u0012\u0000"+
		"\u0170\u016e\u0001\u0000\u0000\u0000\u0171\u0174\u0001\u0000\u0000\u0000"+
		"\u0172\u0170\u0001\u0000\u0000\u0000\u0172\u0173\u0001\u0000\u0000\u0000"+
		"\u0173\u0176\u0001\u0000\u0000\u0000\u0174\u0172\u0001\u0000\u0000\u0000"+
		"\u0175\u0177\u0005\u0003\u0000\u0000\u0176\u0175\u0001\u0000\u0000\u0000"+
		"\u0176\u0177\u0001\u0000\u0000\u0000\u0177#\u0001\u0000\u0000\u0000\u0178"+
		"\u017a\u0005\u0006\u0000\u0000\u0179\u017b\u0003 \u0010\u0000\u017a\u0179"+
		"\u0001\u0000\u0000\u0000\u017a\u017b\u0001\u0000\u0000\u0000\u017b\u017c"+
		"\u0001\u0000\u0000\u0000\u017c\u0183\u0005\u0007\u0000\u0000\u017d\u017f"+
		"\u0005\u0006\u0000\u0000\u017e\u0180\u0003\"\u0011\u0000\u017f\u017e\u0001"+
		"\u0000\u0000\u0000\u017f\u0180\u0001\u0000\u0000\u0000\u0180\u0181\u0001"+
		"\u0000\u0000\u0000\u0181\u0183\u0005\u0007\u0000\u0000\u0182\u0178\u0001"+
		"\u0000\u0000\u0000\u0182\u017d\u0001\u0000\u0000\u0000\u0183%\u0001\u0000"+
		"\u0000\u0000\u0184\u0189\u00056\u0000\u0000\u0185\u0186\u0005\u0004\u0000"+
		"\u0000\u0186\u0187\u0003N\'\u0000\u0187\u0188\u0005\u0005\u0000\u0000"+
		"\u0188\u018a\u0001\u0000\u0000\u0000\u0189\u0185\u0001\u0000\u0000\u0000"+
		"\u018a\u018b\u0001\u0000\u0000\u0000\u018b\u0189\u0001\u0000\u0000\u0000"+
		"\u018b\u018c\u0001\u0000\u0000\u0000\u018c\'\u0001\u0000\u0000\u0000\u018d"+
		"\u018e\u00051\u0000\u0000\u018e\u018f\u00056\u0000\u0000\u018f\u0190\u0003"+
		".\u0017\u0000\u0190\u0192\u0003N\'\u0000\u0191\u0193\u0005\b\u0000\u0000"+
		"\u0192\u0191\u0001\u0000\u0000\u0000\u0192\u0193\u0001\u0000\u0000\u0000"+
		"\u0193)\u0001\u0000\u0000\u0000\u0194\u0199\u00056\u0000\u0000\u0195\u0196"+
		"\u0005\u0004\u0000\u0000\u0196\u0197\u0003N\'\u0000\u0197\u0198\u0005"+
		"\u0005\u0000\u0000\u0198\u019a\u0001\u0000\u0000\u0000\u0199\u0195\u0001"+
		"\u0000\u0000\u0000\u019a\u019b\u0001\u0000\u0000\u0000\u019b\u0199\u0001"+
		"\u0000\u0000\u0000\u019b\u019c\u0001\u0000\u0000\u0000\u019c\u019d\u0001"+
		"\u0000\u0000\u0000\u019d\u019e\u0003.\u0017\u0000\u019e\u01a0\u0003N\'"+
		"\u0000\u019f\u01a1\u0005\b\u0000\u0000\u01a0\u019f\u0001\u0000\u0000\u0000"+
		"\u01a0\u01a1\u0001\u0000\u0000\u0000\u01a1+\u0001\u0000\u0000\u0000\u01a2"+
		"\u01a3\u00056\u0000\u0000\u01a3\u01a4\u0003.\u0017\u0000\u01a4\u01a6\u0003"+
		"N\'\u0000\u01a5\u01a7\u0005\b\u0000\u0000\u01a6\u01a5\u0001\u0000\u0000"+
		"\u0000\u01a6\u01a7\u0001\u0000\u0000\u0000\u01a7-\u0001\u0000\u0000\u0000"+
		"\u01a8\u01a9\u0007\u0000\u0000\u0000\u01a9/\u0001\u0000\u0000\u0000\u01aa"+
		"\u01ab\u0005\u0012\u0000\u0000\u01ab\u01ac\u0003N\'\u0000\u01ac\u01b2"+
		"\u0003\u000e\u0007\u0000\u01ad\u01b0\u0005\u0013\u0000\u0000\u01ae\u01b1"+
		"\u00030\u0018\u0000\u01af\u01b1\u0003\u000e\u0007\u0000\u01b0\u01ae\u0001"+
		"\u0000\u0000\u0000\u01b0\u01af\u0001\u0000\u0000\u0000\u01b1\u01b3\u0001"+
		"\u0000\u0000\u0000\u01b2\u01ad\u0001\u0000\u0000\u0000\u01b2\u01b3\u0001"+
		"\u0000\u0000\u0000\u01b31\u0001\u0000\u0000\u0000\u01b4\u01b5\u0005\u0014"+
		"\u0000\u0000\u01b5\u01b6\u00034\u001a\u0000\u01b6\u01b7\u0005\b\u0000"+
		"\u0000\u01b7\u01b8\u0003N\'\u0000\u01b8\u01b9\u0005\b\u0000\u0000\u01b9"+
		"\u01ba\u00036\u001b\u0000\u01ba\u01bb\u0003\u000e\u0007\u0000\u01bb\u01c3"+
		"\u0001\u0000\u0000\u0000\u01bc\u01bd\u0005\u0014\u0000\u0000\u01bd\u01be"+
		"\u0003N\'\u0000\u01be\u01bf\u0003\u000e\u0007\u0000\u01bf\u01c3\u0001"+
		"\u0000\u0000\u0000\u01c0\u01c1\u0005\u0014\u0000\u0000\u01c1\u01c3\u0003"+
		"\u000e\u0007\u0000\u01c2\u01b4\u0001\u0000\u0000\u0000\u01c2\u01bc\u0001"+
		"\u0000\u0000\u0000\u01c2\u01c0\u0001\u0000\u0000\u0000\u01c33\u0001\u0000"+
		"\u0000\u0000\u01c4\u01c5\u00056\u0000\u0000\u01c5\u01c6\u0005\n\u0000"+
		"\u0000\u01c6\u01cb\u0003N\'\u0000\u01c7\u01c8\u00056\u0000\u0000\u01c8"+
		"\u01c9\u0005\t\u0000\u0000\u01c9\u01cb\u0003N\'\u0000\u01ca\u01c4\u0001"+
		"\u0000\u0000\u0000\u01ca\u01c7\u0001\u0000\u0000\u0000\u01cb5\u0001\u0000"+
		"\u0000\u0000\u01cc\u01cd\u00056\u0000\u0000\u01cd\u01d5\u0005\u000b\u0000"+
		"\u0000\u01ce\u01cf\u00056\u0000\u0000\u01cf\u01d5\u0005\f\u0000\u0000"+
		"\u01d0\u01d1\u00056\u0000\u0000\u01d1\u01d2\u0003.\u0017\u0000\u01d2\u01d3"+
		"\u0003N\'\u0000\u01d3\u01d5\u0001\u0000\u0000\u0000\u01d4\u01cc\u0001"+
		"\u0000\u0000\u0000\u01d4\u01ce\u0001\u0000\u0000\u0000\u01d4\u01d0\u0001"+
		"\u0000\u0000\u0000\u01d57\u0001\u0000\u0000\u0000\u01d6\u01d7\u0005\u0015"+
		"\u0000\u0000\u01d7\u01d8\u0003N\'\u0000\u01d8\u01dc\u0005\u0006\u0000"+
		"\u0000\u01d9\u01db\u0003:\u001d\u0000\u01da\u01d9\u0001\u0000\u0000\u0000"+
		"\u01db\u01de\u0001\u0000\u0000\u0000\u01dc\u01da\u0001\u0000\u0000\u0000"+
		"\u01dc\u01dd\u0001\u0000\u0000\u0000\u01dd\u01e0\u0001\u0000\u0000\u0000"+
		"\u01de\u01dc\u0001\u0000\u0000\u0000\u01df\u01e1\u0003<\u001e\u0000\u01e0"+
		"\u01df\u0001\u0000\u0000\u0000\u01e0\u01e1\u0001\u0000\u0000\u0000\u01e1"+
		"\u01e2\u0001\u0000\u0000\u0000\u01e2\u01e3\u0005\u0007\u0000\u0000\u01e3"+
		"9\u0001\u0000\u0000\u0000\u01e4\u01e5\u0005\u0016\u0000\u0000\u01e5\u01e6"+
		"\u0003\u001a\r\u0000\u01e6\u01ea\u0005\r\u0000\u0000\u01e7\u01e9\u0003"+
		"\u0010\b\u0000\u01e8\u01e7\u0001\u0000\u0000\u0000\u01e9\u01ec\u0001\u0000"+
		"\u0000\u0000\u01ea\u01e8\u0001\u0000\u0000\u0000\u01ea\u01eb\u0001\u0000"+
		"\u0000\u0000\u01eb;\u0001\u0000\u0000\u0000\u01ec\u01ea\u0001\u0000\u0000"+
		"\u0000\u01ed\u01ee\u0005\u0017\u0000\u0000\u01ee\u01f2\u0005\r\u0000\u0000"+
		"\u01ef\u01f1\u0003\u0010\b\u0000\u01f0\u01ef\u0001\u0000\u0000\u0000\u01f1"+
		"\u01f4\u0001\u0000\u0000\u0000\u01f2\u01f0\u0001\u0000\u0000\u0000\u01f2"+
		"\u01f3\u0001\u0000\u0000\u0000\u01f3=\u0001\u0000\u0000\u0000\u01f4\u01f2"+
		"\u0001\u0000\u0000\u0000\u01f5\u01f7\u0005\u0018\u0000\u0000\u01f6\u01f8"+
		"\u0005\b\u0000\u0000\u01f7\u01f6\u0001\u0000\u0000\u0000\u01f7\u01f8\u0001"+
		"\u0000\u0000\u0000\u01f8?\u0001\u0000\u0000\u0000\u01f9\u01fb\u0005\u0019"+
		"\u0000\u0000\u01fa\u01fc\u0005\b\u0000\u0000\u01fb\u01fa\u0001\u0000\u0000"+
		"\u0000\u01fb\u01fc\u0001\u0000\u0000\u0000\u01fcA\u0001\u0000\u0000\u0000"+
		"\u01fd\u01fe\u00056\u0000\u0000\u01fe\u0200\u0005\u000b\u0000\u0000\u01ff"+
		"\u0201\u0005\b\u0000\u0000\u0200\u01ff\u0001\u0000\u0000\u0000\u0200\u0201"+
		"\u0001\u0000\u0000\u0000\u0201\u0208\u0001\u0000\u0000\u0000\u0202\u0203"+
		"\u00056\u0000\u0000\u0203\u0205\u0005\f\u0000\u0000\u0204\u0206\u0005"+
		"\b\u0000\u0000\u0205\u0204\u0001\u0000\u0000\u0000\u0205\u0206\u0001\u0000"+
		"\u0000\u0000\u0206\u0208\u0001\u0000\u0000\u0000\u0207\u01fd\u0001\u0000"+
		"\u0000\u0000\u0207\u0202\u0001\u0000\u0000\u0000\u0208C\u0001\u0000\u0000"+
		"\u0000\u0209\u020b\u0005\u001a\u0000\u0000\u020a\u020c\u0003\u001a\r\u0000"+
		"\u020b\u020a\u0001\u0000\u0000\u0000\u020b\u020c\u0001\u0000\u0000\u0000"+
		"\u020c\u020e\u0001\u0000\u0000\u0000\u020d\u020f\u0005\b\u0000\u0000\u020e"+
		"\u020d\u0001\u0000\u0000\u0000\u020e\u020f\u0001\u0000\u0000\u0000\u020f"+
		"E\u0001\u0000\u0000\u0000\u0210\u0211\u0003H$\u0000\u0211\u0213\u0005"+
		"\u0001\u0000\u0000\u0212\u0214\u0003J%\u0000\u0213\u0212\u0001\u0000\u0000"+
		"\u0000\u0213\u0214\u0001\u0000\u0000\u0000\u0214\u0215\u0001\u0000\u0000"+
		"\u0000\u0215\u0216\u0005\u0002\u0000\u0000\u0216G\u0001\u0000\u0000\u0000"+
		"\u0217\u021c\u00056\u0000\u0000\u0218\u0219\u0005\u000e\u0000\u0000\u0219"+
		"\u021b\u00056\u0000\u0000\u021a\u0218\u0001\u0000\u0000\u0000\u021b\u021e"+
		"\u0001\u0000\u0000\u0000\u021c\u021a\u0001\u0000\u0000\u0000\u021c\u021d"+
		"\u0001\u0000\u0000\u0000\u021dI\u0001\u0000\u0000\u0000\u021e\u021c\u0001"+
		"\u0000\u0000\u0000\u021f\u0224\u0003L&\u0000\u0220\u0221\u0005\u0003\u0000"+
		"\u0000\u0221\u0223\u0003L&\u0000\u0222\u0220\u0001\u0000\u0000\u0000\u0223"+
		"\u0226\u0001\u0000\u0000\u0000\u0224\u0222\u0001\u0000\u0000\u0000\u0224"+
		"\u0225\u0001\u0000\u0000\u0000\u0225K\u0001\u0000\u0000\u0000\u0226\u0224"+
		"\u0001\u0000\u0000\u0000\u0227\u0228\u00055\u0000\u0000\u0228\u022b\u0005"+
		"6\u0000\u0000\u0229\u022b\u0003N\'\u0000\u022a\u0227\u0001\u0000\u0000"+
		"\u0000\u022a\u0229\u0001\u0000\u0000\u0000\u022bM\u0001\u0000\u0000\u0000"+
		"\u022c\u022d\u0003P(\u0000\u022dO\u0001\u0000\u0000\u0000\u022e\u0233"+
		"\u0003R)\u0000\u022f\u0230\u0005\'\u0000\u0000\u0230\u0232\u0003R)\u0000"+
		"\u0231\u022f\u0001\u0000\u0000\u0000\u0232\u0235\u0001\u0000\u0000\u0000"+
		"\u0233\u0231\u0001\u0000\u0000\u0000\u0233\u0234\u0001\u0000\u0000\u0000"+
		"\u0234Q\u0001\u0000\u0000\u0000\u0235\u0233\u0001\u0000\u0000\u0000\u0236"+
		"\u023b\u0003T*\u0000\u0237\u0238\u0005(\u0000\u0000\u0238\u023a\u0003"+
		"T*\u0000\u0239\u0237\u0001\u0000\u0000\u0000\u023a\u023d\u0001\u0000\u0000"+
		"\u0000\u023b\u0239\u0001\u0000\u0000\u0000\u023b\u023c\u0001\u0000\u0000"+
		"\u0000\u023cS\u0001\u0000\u0000\u0000\u023d\u023b\u0001\u0000\u0000\u0000"+
		"\u023e\u0243\u0003V+\u0000\u023f\u0240\u0007\u0001\u0000\u0000\u0240\u0242"+
		"\u0003V+\u0000\u0241\u023f\u0001\u0000\u0000\u0000\u0242\u0245\u0001\u0000"+
		"\u0000\u0000\u0243\u0241\u0001\u0000\u0000\u0000\u0243\u0244\u0001\u0000"+
		"\u0000\u0000\u0244U\u0001\u0000\u0000\u0000\u0245\u0243\u0001\u0000\u0000"+
		"\u0000\u0246\u024b\u0003X,\u0000\u0247\u0248\u0007\u0002\u0000\u0000\u0248"+
		"\u024a\u0003X,\u0000\u0249\u0247\u0001\u0000\u0000\u0000\u024a\u024d\u0001"+
		"\u0000\u0000\u0000\u024b\u0249\u0001\u0000\u0000\u0000\u024b\u024c\u0001"+
		"\u0000\u0000\u0000\u024cW\u0001\u0000\u0000\u0000\u024d\u024b\u0001\u0000"+
		"\u0000\u0000\u024e\u0253\u0003Z-\u0000\u024f\u0250\u0007\u0003\u0000\u0000"+
		"\u0250\u0252\u0003Z-\u0000\u0251\u024f\u0001\u0000\u0000\u0000\u0252\u0255"+
		"\u0001\u0000\u0000\u0000\u0253\u0251\u0001\u0000\u0000\u0000\u0253\u0254"+
		"\u0001\u0000\u0000\u0000\u0254Y\u0001\u0000\u0000\u0000\u0255\u0253\u0001"+
		"\u0000\u0000\u0000\u0256\u025b\u0003\\.\u0000\u0257\u0258\u0007\u0004"+
		"\u0000\u0000\u0258\u025a\u0003\\.\u0000\u0259\u0257\u0001\u0000\u0000"+
		"\u0000\u025a\u025d\u0001\u0000\u0000\u0000\u025b\u0259\u0001\u0000\u0000"+
		"\u0000\u025b\u025c\u0001\u0000\u0000\u0000\u025c[\u0001\u0000\u0000\u0000"+
		"\u025d\u025b\u0001\u0000\u0000\u0000\u025e\u025f\u00054\u0000\u0000\u025f"+
		"\u0266\u0003\\.\u0000\u0260\u0261\u00050\u0000\u0000\u0261\u0266\u0003"+
		"\\.\u0000\u0262\u0263\u00051\u0000\u0000\u0263\u0266\u0003\\.\u0000\u0264"+
		"\u0266\u0003^/\u0000\u0265\u025e\u0001\u0000\u0000\u0000\u0265\u0260\u0001"+
		"\u0000\u0000\u0000\u0265\u0262\u0001\u0000\u0000\u0000\u0265\u0264\u0001"+
		"\u0000\u0000\u0000\u0266]\u0001\u0000\u0000\u0000\u0267\u0268\u0005\u0001"+
		"\u0000\u0000\u0268\u0269\u0003N\'\u0000\u0269\u026a\u0005\u0002\u0000"+
		"\u0000\u026a\u0277\u0001\u0000\u0000\u0000\u026b\u0277\u0003F#\u0000\u026c"+
		"\u0277\u0003&\u0013\u0000\u026d\u0277\u0003`0\u0000\u026e\u0277\u0005"+
		"6\u0000\u0000\u026f\u0277\u00058\u0000\u0000\u0270\u0277\u00057\u0000"+
		"\u0000\u0271\u0277\u00059\u0000\u0000\u0272\u0277\u0005:\u0000\u0000\u0273"+
		"\u0277\u0005\u001b\u0000\u0000\u0274\u0277\u0005\u001c\u0000\u0000\u0275"+
		"\u0277\u0005\u001d\u0000\u0000\u0276\u0267\u0001\u0000\u0000\u0000\u0276"+
		"\u026b\u0001\u0000\u0000\u0000\u0276\u026c\u0001\u0000\u0000\u0000\u0276"+
		"\u026d\u0001\u0000\u0000\u0000\u0276\u026e\u0001\u0000\u0000\u0000\u0276"+
		"\u026f\u0001\u0000\u0000\u0000\u0276\u0270\u0001\u0000\u0000\u0000\u0276"+
		"\u0271\u0001\u0000\u0000\u0000\u0276\u0272\u0001\u0000\u0000\u0000\u0276"+
		"\u0273\u0001\u0000\u0000\u0000\u0276\u0274\u0001\u0000\u0000\u0000\u0276"+
		"\u0275\u0001\u0000\u0000\u0000\u0277_\u0001\u0000\u0000\u0000\u0278\u0279"+
		"\u0003b1\u0000\u0279\u027a\u0005\u0001\u0000\u0000\u027a\u027b\u0003N"+
		"\'\u0000\u027b\u027c\u0005\u0002\u0000\u0000\u027ca\u0001\u0000\u0000"+
		"\u0000\u027d\u027e\u0007\u0005\u0000\u0000\u027ec\u0001\u0000\u0000\u0000"+
		"Jgiqu~\u0090\u00a1\u00a6\u00b1\u00bb\u00cf\u00d4\u00d6\u00dd\u00e0\u00e8"+
		"\u00ef\u00f6\u00f9\u0101\u0108\u010f\u0111\u0117\u011d\u011f\u0127\u012e"+
		"\u0136\u0141\u0149\u0153\u015c\u0160\u0167\u016b\u0172\u0176\u017a\u017f"+
		"\u0182\u018b\u0192\u019b\u01a0\u01a6\u01b0\u01b2\u01c2\u01ca\u01d4\u01dc"+
		"\u01e0\u01ea\u01f2\u01f7\u01fb\u0200\u0205\u0207\u020b\u020e\u0213\u021c"+
		"\u0224\u022a\u0233\u023b\u0243\u024b\u0253\u025b\u0265\u0276";
	public static final ATN _ATN =
		new ATNDeserializer().deserialize(_serializedATN.toCharArray());
	static {
		_decisionToDFA = new DFA[_ATN.getNumberOfDecisions()];
		for (int i = 0; i < _ATN.getNumberOfDecisions(); i++) {
			_decisionToDFA[i] = new DFA(_ATN.getDecisionState(i), i);
		}
	}
}