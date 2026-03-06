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
		RULE_returnType = 4, RULE_multiReturnType = 5, RULE_block = 6, RULE_statement = 7, 
		RULE_varDecl = 8, RULE_varShortDecl = 9, RULE_constDecl = 10, RULE_idList = 11, 
		RULE_expList = 12, RULE_arrayType = 13, RULE_arrayLiteral = 14, RULE_arrayElements = 15, 
		RULE_arrayRowElements = 16, RULE_arrayAccess = 17, RULE_ptrAssign = 18, 
		RULE_arrayAssign = 19, RULE_assignment = 20, RULE_assignOp = 21, RULE_ifStmt = 22, 
		RULE_forStmt = 23, RULE_forInit = 24, RULE_forPost = 25, RULE_switchStmt = 26, 
		RULE_caseClause = 27, RULE_defaultClause = 28, RULE_breakStmt = 29, RULE_continueStmt = 30, 
		RULE_incDecStmt = 31, RULE_returnStmt = 32, RULE_functionCall = 33, RULE_qualifiedName = 34, 
		RULE_argList = 35, RULE_argItem = 36, RULE_expression = 37, RULE_logicalOr = 38, 
		RULE_logicalAnd = 39, RULE_equality = 40, RULE_comparison = 41, RULE_term = 42, 
		RULE_factor = 43, RULE_unary = 44, RULE_primary = 45, RULE_type = 46;
	private static String[] makeRuleNames() {
		return new String[] {
			"program", "functionDecl", "paramList", "param", "returnType", "multiReturnType", 
			"block", "statement", "varDecl", "varShortDecl", "constDecl", "idList", 
			"expList", "arrayType", "arrayLiteral", "arrayElements", "arrayRowElements", 
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
			null, "'('", "')'", "','", "'{'", "'}'", "';'", "'='", "':='", "'['", 
			"']'", "'++'", "'--'", "':'", "'.'", "'func'", "'var'", "'const'", "'if'", 
			"'else'", "'for'", "'switch'", "'case'", "'default'", "'break'", "'continue'", 
			"'return'", "'true'", "'false'", "'nil'", "'int'", "'float'", "'string'", 
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
			setState(97); 
			_errHandler.sync(this);
			_la = _input.LA(1);
			do {
				{
				setState(97);
				_errHandler.sync(this);
				switch (_input.LA(1)) {
				case FUNC:
					{
					setState(94);
					functionDecl();
					}
					break;
				case VAR:
					{
					setState(95);
					varDecl();
					}
					break;
				case CONST:
					{
					setState(96);
					constDecl();
					}
					break;
				default:
					throw new NoViableAltException(this);
				}
				}
				setState(99); 
				_errHandler.sync(this);
				_la = _input.LA(1);
			} while ( (((_la) & ~0x3f) == 0 && ((1L << _la) & 229376L) != 0) );
			setState(101);
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
			setState(103);
			match(FUNC);
			setState(104);
			match(ID);
			setState(105);
			match(T__0);
			setState(107);
			_errHandler.sync(this);
			_la = _input.LA(1);
			if (_la==ID) {
				{
				setState(106);
				paramList();
				}
			}

			setState(109);
			match(T__1);
			setState(111);
			_errHandler.sync(this);
			_la = _input.LA(1);
			if ((((_la) & ~0x3f) == 0 && ((1L << _la) & 562983239418370L) != 0)) {
				{
				setState(110);
				returnType();
				}
			}

			setState(113);
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
			setState(115);
			param();
			setState(120);
			_errHandler.sync(this);
			_la = _input.LA(1);
			while (_la==T__2) {
				{
				{
				setState(116);
				match(T__2);
				setState(117);
				param();
				}
				}
				setState(122);
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
		public ParamContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_param; }
	}

	public final ParamContext param() throws RecognitionException {
		ParamContext _localctx = new ParamContext(_ctx, getState());
		enterRule(_localctx, 6, RULE_param);
		try {
			setState(133);
			_errHandler.sync(this);
			switch ( getInterpreter().adaptivePredict(_input,5,_ctx) ) {
			case 1:
				enterOuterAlt(_localctx, 1);
				{
				setState(123);
				match(ID);
				setState(124);
				type();
				}
				break;
			case 2:
				enterOuterAlt(_localctx, 2);
				{
				setState(125);
				match(ID);
				setState(126);
				match(STAR);
				setState(127);
				type();
				}
				break;
			case 3:
				enterOuterAlt(_localctx, 3);
				{
				setState(128);
				match(ID);
				setState(129);
				match(STAR);
				setState(130);
				arrayType();
				}
				break;
			case 4:
				enterOuterAlt(_localctx, 4);
				{
				setState(131);
				match(ID);
				setState(132);
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
	public static class ReturnTypeContext extends ParserRuleContext {
		public TypeContext type() {
			return getRuleContext(TypeContext.class,0);
		}
		public ArrayTypeContext arrayType() {
			return getRuleContext(ArrayTypeContext.class,0);
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
			setState(152);
			_errHandler.sync(this);
			switch ( getInterpreter().adaptivePredict(_input,7,_ctx) ) {
			case 1:
				enterOuterAlt(_localctx, 1);
				{
				setState(135);
				type();
				}
				break;
			case 2:
				enterOuterAlt(_localctx, 2);
				{
				setState(136);
				arrayType();
				}
				break;
			case 3:
				enterOuterAlt(_localctx, 3);
				{
				setState(137);
				match(STAR);
				setState(138);
				type();
				}
				break;
			case 4:
				enterOuterAlt(_localctx, 4);
				{
				setState(139);
				match(STAR);
				setState(140);
				arrayType();
				}
				break;
			case 5:
				enterOuterAlt(_localctx, 5);
				{
				setState(141);
				match(T__0);
				setState(142);
				multiReturnType();
				setState(147);
				_errHandler.sync(this);
				_la = _input.LA(1);
				while (_la==T__2) {
					{
					{
					setState(143);
					match(T__2);
					setState(144);
					multiReturnType();
					}
					}
					setState(149);
					_errHandler.sync(this);
					_la = _input.LA(1);
				}
				setState(150);
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
			setState(160);
			_errHandler.sync(this);
			switch ( getInterpreter().adaptivePredict(_input,8,_ctx) ) {
			case 1:
				enterOuterAlt(_localctx, 1);
				{
				setState(154);
				type();
				}
				break;
			case 2:
				enterOuterAlt(_localctx, 2);
				{
				setState(155);
				arrayType();
				}
				break;
			case 3:
				enterOuterAlt(_localctx, 3);
				{
				setState(156);
				match(STAR);
				setState(157);
				type();
				}
				break;
			case 4:
				enterOuterAlt(_localctx, 4);
				{
				setState(158);
				match(STAR);
				setState(159);
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
		enterRule(_localctx, 12, RULE_block);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(162);
			match(T__3);
			setState(166);
			_errHandler.sync(this);
			_la = _input.LA(1);
			while ((((_la) & ~0x3f) == 0 && ((1L << _la) & 563794379412013058L) != 0)) {
				{
				{
				setState(163);
				statement();
				}
				}
				setState(168);
				_errHandler.sync(this);
				_la = _input.LA(1);
			}
			setState(169);
			match(T__4);
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
		enterRule(_localctx, 14, RULE_statement);
		int _la;
		try {
			setState(192);
			_errHandler.sync(this);
			switch ( getInterpreter().adaptivePredict(_input,12,_ctx) ) {
			case 1:
				enterOuterAlt(_localctx, 1);
				{
				setState(171);
				varDecl();
				}
				break;
			case 2:
				enterOuterAlt(_localctx, 2);
				{
				setState(172);
				varShortDecl();
				}
				break;
			case 3:
				enterOuterAlt(_localctx, 3);
				{
				setState(173);
				constDecl();
				}
				break;
			case 4:
				enterOuterAlt(_localctx, 4);
				{
				setState(174);
				ptrAssign();
				}
				break;
			case 5:
				enterOuterAlt(_localctx, 5);
				{
				setState(175);
				arrayAssign();
				}
				break;
			case 6:
				enterOuterAlt(_localctx, 6);
				{
				setState(176);
				assignment();
				}
				break;
			case 7:
				enterOuterAlt(_localctx, 7);
				{
				setState(177);
				ifStmt();
				}
				break;
			case 8:
				enterOuterAlt(_localctx, 8);
				{
				setState(178);
				forStmt();
				}
				break;
			case 9:
				enterOuterAlt(_localctx, 9);
				{
				setState(179);
				switchStmt();
				}
				break;
			case 10:
				enterOuterAlt(_localctx, 10);
				{
				setState(180);
				breakStmt();
				}
				break;
			case 11:
				enterOuterAlt(_localctx, 11);
				{
				setState(181);
				continueStmt();
				}
				break;
			case 12:
				enterOuterAlt(_localctx, 12);
				{
				setState(182);
				incDecStmt();
				}
				break;
			case 13:
				enterOuterAlt(_localctx, 13);
				{
				setState(183);
				returnStmt();
				}
				break;
			case 14:
				enterOuterAlt(_localctx, 14);
				{
				setState(184);
				functionCall();
				setState(186);
				_errHandler.sync(this);
				_la = _input.LA(1);
				if (_la==T__5) {
					{
					setState(185);
					match(T__5);
					}
				}

				}
				break;
			case 15:
				enterOuterAlt(_localctx, 15);
				{
				setState(188);
				expression();
				setState(190);
				_errHandler.sync(this);
				_la = _input.LA(1);
				if (_la==T__5) {
					{
					setState(189);
					match(T__5);
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
		enterRule(_localctx, 16, RULE_varDecl);
		int _la;
		try {
			setState(236);
			_errHandler.sync(this);
			switch ( getInterpreter().adaptivePredict(_input,20,_ctx) ) {
			case 1:
				enterOuterAlt(_localctx, 1);
				{
				setState(194);
				match(VAR);
				setState(195);
				match(ID);
				setState(196);
				type();
				setState(199);
				_errHandler.sync(this);
				_la = _input.LA(1);
				if (_la==T__6) {
					{
					setState(197);
					match(T__6);
					setState(198);
					expression();
					}
				}

				setState(202);
				_errHandler.sync(this);
				_la = _input.LA(1);
				if (_la==T__5) {
					{
					setState(201);
					match(T__5);
					}
				}

				}
				break;
			case 2:
				enterOuterAlt(_localctx, 2);
				{
				setState(204);
				match(VAR);
				setState(205);
				match(ID);
				setState(206);
				arrayType();
				setState(209);
				_errHandler.sync(this);
				_la = _input.LA(1);
				if (_la==T__6) {
					{
					setState(207);
					match(T__6);
					setState(208);
					arrayLiteral();
					}
				}

				setState(212);
				_errHandler.sync(this);
				_la = _input.LA(1);
				if (_la==T__5) {
					{
					setState(211);
					match(T__5);
					}
				}

				}
				break;
			case 3:
				enterOuterAlt(_localctx, 3);
				{
				setState(214);
				match(VAR);
				setState(215);
				match(ID);
				setState(216);
				arrayType();
				setState(217);
				match(T__6);
				setState(218);
				expression();
				setState(220);
				_errHandler.sync(this);
				_la = _input.LA(1);
				if (_la==T__5) {
					{
					setState(219);
					match(T__5);
					}
				}

				}
				break;
			case 4:
				enterOuterAlt(_localctx, 4);
				{
				setState(222);
				match(VAR);
				setState(223);
				match(ID);
				setState(224);
				match(STAR);
				setState(225);
				type();
				setState(227);
				_errHandler.sync(this);
				_la = _input.LA(1);
				if (_la==T__5) {
					{
					setState(226);
					match(T__5);
					}
				}

				}
				break;
			case 5:
				enterOuterAlt(_localctx, 5);
				{
				setState(229);
				match(VAR);
				setState(230);
				match(ID);
				setState(231);
				match(STAR);
				setState(232);
				arrayType();
				setState(234);
				_errHandler.sync(this);
				_la = _input.LA(1);
				if (_la==T__5) {
					{
					setState(233);
					match(T__5);
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
		enterRule(_localctx, 18, RULE_varShortDecl);
		int _la;
		try {
			setState(250);
			_errHandler.sync(this);
			switch ( getInterpreter().adaptivePredict(_input,23,_ctx) ) {
			case 1:
				enterOuterAlt(_localctx, 1);
				{
				setState(238);
				idList();
				setState(239);
				match(T__7);
				setState(240);
				expList();
				setState(242);
				_errHandler.sync(this);
				_la = _input.LA(1);
				if (_la==T__5) {
					{
					setState(241);
					match(T__5);
					}
				}

				}
				break;
			case 2:
				enterOuterAlt(_localctx, 2);
				{
				setState(244);
				match(ID);
				setState(245);
				match(T__7);
				setState(246);
				arrayLiteral();
				setState(248);
				_errHandler.sync(this);
				_la = _input.LA(1);
				if (_la==T__5) {
					{
					setState(247);
					match(T__5);
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
		enterRule(_localctx, 20, RULE_constDecl);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(252);
			match(CONST);
			setState(253);
			match(ID);
			setState(254);
			type();
			setState(255);
			match(T__6);
			setState(256);
			expression();
			setState(258);
			_errHandler.sync(this);
			_la = _input.LA(1);
			if (_la==T__5) {
				{
				setState(257);
				match(T__5);
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
		enterRule(_localctx, 22, RULE_idList);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(260);
			match(ID);
			setState(265);
			_errHandler.sync(this);
			_la = _input.LA(1);
			while (_la==T__2) {
				{
				{
				setState(261);
				match(T__2);
				setState(262);
				match(ID);
				}
				}
				setState(267);
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
		enterRule(_localctx, 24, RULE_expList);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(268);
			expression();
			setState(273);
			_errHandler.sync(this);
			_la = _input.LA(1);
			while (_la==T__2) {
				{
				{
				setState(269);
				match(T__2);
				setState(270);
				expression();
				}
				}
				setState(275);
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
		enterRule(_localctx, 26, RULE_arrayType);
		try {
			setState(284);
			_errHandler.sync(this);
			switch ( getInterpreter().adaptivePredict(_input,27,_ctx) ) {
			case 1:
				enterOuterAlt(_localctx, 1);
				{
				setState(276);
				match(T__8);
				setState(277);
				match(INT);
				setState(278);
				match(T__9);
				setState(279);
				type();
				}
				break;
			case 2:
				enterOuterAlt(_localctx, 2);
				{
				setState(280);
				match(T__8);
				setState(281);
				match(INT);
				setState(282);
				match(T__9);
				setState(283);
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
		enterRule(_localctx, 28, RULE_arrayLiteral);
		int _la;
		try {
			setState(306);
			_errHandler.sync(this);
			switch ( getInterpreter().adaptivePredict(_input,30,_ctx) ) {
			case 1:
				enterOuterAlt(_localctx, 1);
				{
				setState(286);
				match(T__8);
				setState(287);
				match(INT);
				setState(288);
				match(T__9);
				setState(289);
				type();
				setState(290);
				match(T__3);
				setState(292);
				_errHandler.sync(this);
				_la = _input.LA(1);
				if ((((_la) & ~0x3f) == 0 && ((1L << _la) & 563794379290968066L) != 0)) {
					{
					setState(291);
					arrayElements();
					}
				}

				setState(294);
				match(T__4);
				}
				break;
			case 2:
				enterOuterAlt(_localctx, 2);
				{
				setState(296);
				match(T__8);
				setState(297);
				match(INT);
				setState(298);
				match(T__9);
				setState(299);
				arrayType();
				setState(300);
				match(T__3);
				setState(302);
				_errHandler.sync(this);
				_la = _input.LA(1);
				if (_la==T__3) {
					{
					setState(301);
					arrayRowElements();
					}
				}

				setState(304);
				match(T__4);
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
		enterRule(_localctx, 30, RULE_arrayElements);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(308);
			expression();
			setState(313);
			_errHandler.sync(this);
			_la = _input.LA(1);
			while (_la==T__2) {
				{
				{
				setState(309);
				match(T__2);
				setState(310);
				expression();
				}
				}
				setState(315);
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
		enterRule(_localctx, 32, RULE_arrayRowElements);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(316);
			match(T__3);
			setState(318);
			_errHandler.sync(this);
			_la = _input.LA(1);
			if ((((_la) & ~0x3f) == 0 && ((1L << _la) & 563794379290968066L) != 0)) {
				{
				setState(317);
				arrayElements();
				}
			}

			setState(320);
			match(T__4);
			setState(329);
			_errHandler.sync(this);
			_la = _input.LA(1);
			while (_la==T__2) {
				{
				{
				setState(321);
				match(T__2);
				setState(322);
				match(T__3);
				setState(324);
				_errHandler.sync(this);
				_la = _input.LA(1);
				if ((((_la) & ~0x3f) == 0 && ((1L << _la) & 563794379290968066L) != 0)) {
					{
					setState(323);
					arrayElements();
					}
				}

				setState(326);
				match(T__4);
				}
				}
				setState(331);
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
		enterRule(_localctx, 34, RULE_arrayAccess);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(332);
			match(ID);
			setState(337); 
			_errHandler.sync(this);
			_la = _input.LA(1);
			do {
				{
				{
				setState(333);
				match(T__8);
				setState(334);
				expression();
				setState(335);
				match(T__9);
				}
				}
				setState(339); 
				_errHandler.sync(this);
				_la = _input.LA(1);
			} while ( _la==T__8 );
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
		enterRule(_localctx, 36, RULE_ptrAssign);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(341);
			match(STAR);
			setState(342);
			match(ID);
			setState(343);
			assignOp();
			setState(344);
			expression();
			setState(346);
			_errHandler.sync(this);
			_la = _input.LA(1);
			if (_la==T__5) {
				{
				setState(345);
				match(T__5);
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
		enterRule(_localctx, 38, RULE_arrayAssign);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(348);
			match(ID);
			setState(353); 
			_errHandler.sync(this);
			_la = _input.LA(1);
			do {
				{
				{
				setState(349);
				match(T__8);
				setState(350);
				expression();
				setState(351);
				match(T__9);
				}
				}
				setState(355); 
				_errHandler.sync(this);
				_la = _input.LA(1);
			} while ( _la==T__8 );
			setState(357);
			assignOp();
			setState(358);
			expression();
			setState(360);
			_errHandler.sync(this);
			_la = _input.LA(1);
			if (_la==T__5) {
				{
				setState(359);
				match(T__5);
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
		enterRule(_localctx, 40, RULE_assignment);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(362);
			match(ID);
			setState(363);
			assignOp();
			setState(364);
			expression();
			setState(366);
			_errHandler.sync(this);
			_la = _input.LA(1);
			if (_la==T__5) {
				{
				setState(365);
				match(T__5);
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
		enterRule(_localctx, 42, RULE_assignOp);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(368);
			_la = _input.LA(1);
			if ( !((((_la) & ~0x3f) == 0 && ((1L << _la) & 515396075648L) != 0)) ) {
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
		enterRule(_localctx, 44, RULE_ifStmt);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(370);
			match(IF);
			setState(371);
			expression();
			setState(372);
			block();
			setState(378);
			_errHandler.sync(this);
			_la = _input.LA(1);
			if (_la==ELSE) {
				{
				setState(373);
				match(ELSE);
				setState(376);
				_errHandler.sync(this);
				switch (_input.LA(1)) {
				case IF:
					{
					setState(374);
					ifStmt();
					}
					break;
				case T__3:
					{
					setState(375);
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
		enterRule(_localctx, 46, RULE_forStmt);
		try {
			setState(394);
			_errHandler.sync(this);
			switch ( getInterpreter().adaptivePredict(_input,42,_ctx) ) {
			case 1:
				enterOuterAlt(_localctx, 1);
				{
				setState(380);
				match(FOR);
				setState(381);
				forInit();
				setState(382);
				match(T__5);
				setState(383);
				expression();
				setState(384);
				match(T__5);
				setState(385);
				forPost();
				setState(386);
				block();
				}
				break;
			case 2:
				enterOuterAlt(_localctx, 2);
				{
				setState(388);
				match(FOR);
				setState(389);
				expression();
				setState(390);
				block();
				}
				break;
			case 3:
				enterOuterAlt(_localctx, 3);
				{
				setState(392);
				match(FOR);
				setState(393);
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
		enterRule(_localctx, 48, RULE_forInit);
		try {
			setState(402);
			_errHandler.sync(this);
			switch ( getInterpreter().adaptivePredict(_input,43,_ctx) ) {
			case 1:
				enterOuterAlt(_localctx, 1);
				{
				setState(396);
				match(ID);
				setState(397);
				match(T__7);
				setState(398);
				expression();
				}
				break;
			case 2:
				enterOuterAlt(_localctx, 2);
				{
				setState(399);
				match(ID);
				setState(400);
				match(T__6);
				setState(401);
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
		enterRule(_localctx, 50, RULE_forPost);
		try {
			setState(411);
			_errHandler.sync(this);
			switch ( getInterpreter().adaptivePredict(_input,44,_ctx) ) {
			case 1:
				enterOuterAlt(_localctx, 1);
				{
				setState(404);
				match(ID);
				setState(405);
				match(T__10);
				}
				break;
			case 2:
				enterOuterAlt(_localctx, 2);
				{
				setState(406);
				match(ID);
				setState(407);
				match(T__11);
				}
				break;
			case 3:
				enterOuterAlt(_localctx, 3);
				{
				setState(408);
				match(ID);
				setState(409);
				match(T__6);
				setState(410);
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
		enterRule(_localctx, 52, RULE_switchStmt);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(413);
			match(SWITCH);
			setState(414);
			expression();
			setState(415);
			match(T__3);
			setState(419);
			_errHandler.sync(this);
			_la = _input.LA(1);
			while (_la==CASE) {
				{
				{
				setState(416);
				caseClause();
				}
				}
				setState(421);
				_errHandler.sync(this);
				_la = _input.LA(1);
			}
			setState(423);
			_errHandler.sync(this);
			_la = _input.LA(1);
			if (_la==DEFAULT) {
				{
				setState(422);
				defaultClause();
				}
			}

			setState(425);
			match(T__4);
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
		enterRule(_localctx, 54, RULE_caseClause);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(427);
			match(CASE);
			setState(428);
			expList();
			setState(429);
			match(T__12);
			setState(433);
			_errHandler.sync(this);
			_la = _input.LA(1);
			while ((((_la) & ~0x3f) == 0 && ((1L << _la) & 563794379412013058L) != 0)) {
				{
				{
				setState(430);
				statement();
				}
				}
				setState(435);
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
		enterRule(_localctx, 56, RULE_defaultClause);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(436);
			match(DEFAULT);
			setState(437);
			match(T__12);
			setState(441);
			_errHandler.sync(this);
			_la = _input.LA(1);
			while ((((_la) & ~0x3f) == 0 && ((1L << _la) & 563794379412013058L) != 0)) {
				{
				{
				setState(438);
				statement();
				}
				}
				setState(443);
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
		enterRule(_localctx, 58, RULE_breakStmt);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(444);
			match(BREAK);
			setState(446);
			_errHandler.sync(this);
			_la = _input.LA(1);
			if (_la==T__5) {
				{
				setState(445);
				match(T__5);
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
		enterRule(_localctx, 60, RULE_continueStmt);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(448);
			match(CONTINUE);
			setState(450);
			_errHandler.sync(this);
			_la = _input.LA(1);
			if (_la==T__5) {
				{
				setState(449);
				match(T__5);
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
		enterRule(_localctx, 62, RULE_incDecStmt);
		int _la;
		try {
			setState(462);
			_errHandler.sync(this);
			switch ( getInterpreter().adaptivePredict(_input,53,_ctx) ) {
			case 1:
				enterOuterAlt(_localctx, 1);
				{
				setState(452);
				match(ID);
				setState(453);
				match(T__10);
				setState(455);
				_errHandler.sync(this);
				_la = _input.LA(1);
				if (_la==T__5) {
					{
					setState(454);
					match(T__5);
					}
				}

				}
				break;
			case 2:
				enterOuterAlt(_localctx, 2);
				{
				setState(457);
				match(ID);
				setState(458);
				match(T__11);
				setState(460);
				_errHandler.sync(this);
				_la = _input.LA(1);
				if (_la==T__5) {
					{
					setState(459);
					match(T__5);
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
		enterRule(_localctx, 64, RULE_returnStmt);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(464);
			match(RETURN);
			setState(466);
			_errHandler.sync(this);
			switch ( getInterpreter().adaptivePredict(_input,54,_ctx) ) {
			case 1:
				{
				setState(465);
				expList();
				}
				break;
			}
			setState(469);
			_errHandler.sync(this);
			_la = _input.LA(1);
			if (_la==T__5) {
				{
				setState(468);
				match(T__5);
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
		enterRule(_localctx, 66, RULE_functionCall);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(471);
			qualifiedName();
			setState(472);
			match(T__0);
			setState(474);
			_errHandler.sync(this);
			_la = _input.LA(1);
			if ((((_la) & ~0x3f) == 0 && ((1L << _la) & 572801578545709058L) != 0)) {
				{
				setState(473);
				argList();
				}
			}

			setState(476);
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
		enterRule(_localctx, 68, RULE_qualifiedName);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(478);
			match(ID);
			setState(483);
			_errHandler.sync(this);
			_la = _input.LA(1);
			while (_la==T__13) {
				{
				{
				setState(479);
				match(T__13);
				setState(480);
				match(ID);
				}
				}
				setState(485);
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
		enterRule(_localctx, 70, RULE_argList);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(486);
			argItem();
			setState(491);
			_errHandler.sync(this);
			_la = _input.LA(1);
			while (_la==T__2) {
				{
				{
				setState(487);
				match(T__2);
				setState(488);
				argItem();
				}
				}
				setState(493);
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
		enterRule(_localctx, 72, RULE_argItem);
		try {
			setState(497);
			_errHandler.sync(this);
			switch (_input.LA(1)) {
			case REF:
				enterOuterAlt(_localctx, 1);
				{
				setState(494);
				match(REF);
				setState(495);
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
				setState(496);
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
		enterRule(_localctx, 74, RULE_expression);
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(499);
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
		enterRule(_localctx, 76, RULE_logicalOr);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(501);
			logicalAnd();
			setState(506);
			_errHandler.sync(this);
			_la = _input.LA(1);
			while (_la==OR) {
				{
				{
				setState(502);
				match(OR);
				setState(503);
				logicalAnd();
				}
				}
				setState(508);
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
		enterRule(_localctx, 78, RULE_logicalAnd);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(509);
			equality();
			setState(514);
			_errHandler.sync(this);
			_la = _input.LA(1);
			while (_la==AND) {
				{
				{
				setState(510);
				match(AND);
				setState(511);
				equality();
				}
				}
				setState(516);
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
		enterRule(_localctx, 80, RULE_equality);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(517);
			comparison();
			setState(522);
			_errHandler.sync(this);
			_la = _input.LA(1);
			while (_la==EQ || _la==NEQ) {
				{
				{
				setState(518);
				_la = _input.LA(1);
				if ( !(_la==EQ || _la==NEQ) ) {
				_errHandler.recoverInline(this);
				}
				else {
					if ( _input.LA(1)==Token.EOF ) matchedEOF = true;
					_errHandler.reportMatch(this);
					consume();
				}
				setState(519);
				comparison();
				}
				}
				setState(524);
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
		enterRule(_localctx, 82, RULE_comparison);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(525);
			term();
			setState(530);
			_errHandler.sync(this);
			_la = _input.LA(1);
			while ((((_la) & ~0x3f) == 0 && ((1L << _la) & 131941395333120L) != 0)) {
				{
				{
				setState(526);
				_la = _input.LA(1);
				if ( !((((_la) & ~0x3f) == 0 && ((1L << _la) & 131941395333120L) != 0)) ) {
				_errHandler.recoverInline(this);
				}
				else {
					if ( _input.LA(1)==Token.EOF ) matchedEOF = true;
					_errHandler.reportMatch(this);
					consume();
				}
				setState(527);
				term();
				}
				}
				setState(532);
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
		enterRule(_localctx, 84, RULE_term);
		int _la;
		try {
			int _alt;
			enterOuterAlt(_localctx, 1);
			{
			setState(533);
			factor();
			setState(538);
			_errHandler.sync(this);
			_alt = getInterpreter().adaptivePredict(_input,64,_ctx);
			while ( _alt!=2 && _alt!=org.antlr.v4.runtime.atn.ATN.INVALID_ALT_NUMBER ) {
				if ( _alt==1 ) {
					{
					{
					setState(534);
					_la = _input.LA(1);
					if ( !(_la==PLUS || _la==MINUS) ) {
					_errHandler.recoverInline(this);
					}
					else {
						if ( _input.LA(1)==Token.EOF ) matchedEOF = true;
						_errHandler.reportMatch(this);
						consume();
					}
					setState(535);
					factor();
					}
					} 
				}
				setState(540);
				_errHandler.sync(this);
				_alt = getInterpreter().adaptivePredict(_input,64,_ctx);
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
		enterRule(_localctx, 86, RULE_factor);
		int _la;
		try {
			int _alt;
			enterOuterAlt(_localctx, 1);
			{
			setState(541);
			unary();
			setState(546);
			_errHandler.sync(this);
			_alt = getInterpreter().adaptivePredict(_input,65,_ctx);
			while ( _alt!=2 && _alt!=org.antlr.v4.runtime.atn.ATN.INVALID_ALT_NUMBER ) {
				if ( _alt==1 ) {
					{
					{
					setState(542);
					_la = _input.LA(1);
					if ( !((((_la) & ~0x3f) == 0 && ((1L << _la) & 3940649673949184L) != 0)) ) {
					_errHandler.recoverInline(this);
					}
					else {
						if ( _input.LA(1)==Token.EOF ) matchedEOF = true;
						_errHandler.reportMatch(this);
						consume();
					}
					setState(543);
					unary();
					}
					} 
				}
				setState(548);
				_errHandler.sync(this);
				_alt = getInterpreter().adaptivePredict(_input,65,_ctx);
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
		enterRule(_localctx, 88, RULE_unary);
		try {
			setState(556);
			_errHandler.sync(this);
			switch (_input.LA(1)) {
			case BANG:
				enterOuterAlt(_localctx, 1);
				{
				setState(549);
				match(BANG);
				setState(550);
				unary();
				}
				break;
			case MINUS:
				enterOuterAlt(_localctx, 2);
				{
				setState(551);
				match(MINUS);
				setState(552);
				unary();
				}
				break;
			case STAR:
				enterOuterAlt(_localctx, 3);
				{
				setState(553);
				match(STAR);
				setState(554);
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
				setState(555);
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
		enterRule(_localctx, 90, RULE_primary);
		try {
			setState(572);
			_errHandler.sync(this);
			switch ( getInterpreter().adaptivePredict(_input,67,_ctx) ) {
			case 1:
				enterOuterAlt(_localctx, 1);
				{
				setState(558);
				match(T__0);
				setState(559);
				expression();
				setState(560);
				match(T__1);
				}
				break;
			case 2:
				enterOuterAlt(_localctx, 2);
				{
				setState(562);
				functionCall();
				}
				break;
			case 3:
				enterOuterAlt(_localctx, 3);
				{
				setState(563);
				arrayAccess();
				}
				break;
			case 4:
				enterOuterAlt(_localctx, 4);
				{
				setState(564);
				match(ID);
				}
				break;
			case 5:
				enterOuterAlt(_localctx, 5);
				{
				setState(565);
				match(INT);
				}
				break;
			case 6:
				enterOuterAlt(_localctx, 6);
				{
				setState(566);
				match(FLOAT);
				}
				break;
			case 7:
				enterOuterAlt(_localctx, 7);
				{
				setState(567);
				match(STRING);
				}
				break;
			case 8:
				enterOuterAlt(_localctx, 8);
				{
				setState(568);
				match(RUNE);
				}
				break;
			case 9:
				enterOuterAlt(_localctx, 9);
				{
				setState(569);
				match(TRUE);
				}
				break;
			case 10:
				enterOuterAlt(_localctx, 10);
				{
				setState(570);
				match(FALSE);
				}
				break;
			case 11:
				enterOuterAlt(_localctx, 11);
				{
				setState(571);
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
		enterRule(_localctx, 92, RULE_type);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(574);
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
		"\u0004\u0001=\u0241\u0002\u0000\u0007\u0000\u0002\u0001\u0007\u0001\u0002"+
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
		"-\u0007-\u0002.\u0007.\u0001\u0000\u0001\u0000\u0001\u0000\u0004\u0000"+
		"b\b\u0000\u000b\u0000\f\u0000c\u0001\u0000\u0001\u0000\u0001\u0001\u0001"+
		"\u0001\u0001\u0001\u0001\u0001\u0003\u0001l\b\u0001\u0001\u0001\u0001"+
		"\u0001\u0003\u0001p\b\u0001\u0001\u0001\u0001\u0001\u0001\u0002\u0001"+
		"\u0002\u0001\u0002\u0005\u0002w\b\u0002\n\u0002\f\u0002z\t\u0002\u0001"+
		"\u0003\u0001\u0003\u0001\u0003\u0001\u0003\u0001\u0003\u0001\u0003\u0001"+
		"\u0003\u0001\u0003\u0001\u0003\u0001\u0003\u0003\u0003\u0086\b\u0003\u0001"+
		"\u0004\u0001\u0004\u0001\u0004\u0001\u0004\u0001\u0004\u0001\u0004\u0001"+
		"\u0004\u0001\u0004\u0001\u0004\u0001\u0004\u0005\u0004\u0092\b\u0004\n"+
		"\u0004\f\u0004\u0095\t\u0004\u0001\u0004\u0001\u0004\u0003\u0004\u0099"+
		"\b\u0004\u0001\u0005\u0001\u0005\u0001\u0005\u0001\u0005\u0001\u0005\u0001"+
		"\u0005\u0003\u0005\u00a1\b\u0005\u0001\u0006\u0001\u0006\u0005\u0006\u00a5"+
		"\b\u0006\n\u0006\f\u0006\u00a8\t\u0006\u0001\u0006\u0001\u0006\u0001\u0007"+
		"\u0001\u0007\u0001\u0007\u0001\u0007\u0001\u0007\u0001\u0007\u0001\u0007"+
		"\u0001\u0007\u0001\u0007\u0001\u0007\u0001\u0007\u0001\u0007\u0001\u0007"+
		"\u0001\u0007\u0001\u0007\u0003\u0007\u00bb\b\u0007\u0001\u0007\u0001\u0007"+
		"\u0003\u0007\u00bf\b\u0007\u0003\u0007\u00c1\b\u0007\u0001\b\u0001\b\u0001"+
		"\b\u0001\b\u0001\b\u0003\b\u00c8\b\b\u0001\b\u0003\b\u00cb\b\b\u0001\b"+
		"\u0001\b\u0001\b\u0001\b\u0001\b\u0003\b\u00d2\b\b\u0001\b\u0003\b\u00d5"+
		"\b\b\u0001\b\u0001\b\u0001\b\u0001\b\u0001\b\u0001\b\u0003\b\u00dd\b\b"+
		"\u0001\b\u0001\b\u0001\b\u0001\b\u0001\b\u0003\b\u00e4\b\b\u0001\b\u0001"+
		"\b\u0001\b\u0001\b\u0001\b\u0003\b\u00eb\b\b\u0003\b\u00ed\b\b\u0001\t"+
		"\u0001\t\u0001\t\u0001\t\u0003\t\u00f3\b\t\u0001\t\u0001\t\u0001\t\u0001"+
		"\t\u0003\t\u00f9\b\t\u0003\t\u00fb\b\t\u0001\n\u0001\n\u0001\n\u0001\n"+
		"\u0001\n\u0001\n\u0003\n\u0103\b\n\u0001\u000b\u0001\u000b\u0001\u000b"+
		"\u0005\u000b\u0108\b\u000b\n\u000b\f\u000b\u010b\t\u000b\u0001\f\u0001"+
		"\f\u0001\f\u0005\f\u0110\b\f\n\f\f\f\u0113\t\f\u0001\r\u0001\r\u0001\r"+
		"\u0001\r\u0001\r\u0001\r\u0001\r\u0001\r\u0003\r\u011d\b\r\u0001\u000e"+
		"\u0001\u000e\u0001\u000e\u0001\u000e\u0001\u000e\u0001\u000e\u0003\u000e"+
		"\u0125\b\u000e\u0001\u000e\u0001\u000e\u0001\u000e\u0001\u000e\u0001\u000e"+
		"\u0001\u000e\u0001\u000e\u0001\u000e\u0003\u000e\u012f\b\u000e\u0001\u000e"+
		"\u0001\u000e\u0003\u000e\u0133\b\u000e\u0001\u000f\u0001\u000f\u0001\u000f"+
		"\u0005\u000f\u0138\b\u000f\n\u000f\f\u000f\u013b\t\u000f\u0001\u0010\u0001"+
		"\u0010\u0003\u0010\u013f\b\u0010\u0001\u0010\u0001\u0010\u0001\u0010\u0001"+
		"\u0010\u0003\u0010\u0145\b\u0010\u0001\u0010\u0005\u0010\u0148\b\u0010"+
		"\n\u0010\f\u0010\u014b\t\u0010\u0001\u0011\u0001\u0011\u0001\u0011\u0001"+
		"\u0011\u0001\u0011\u0004\u0011\u0152\b\u0011\u000b\u0011\f\u0011\u0153"+
		"\u0001\u0012\u0001\u0012\u0001\u0012\u0001\u0012\u0001\u0012\u0003\u0012"+
		"\u015b\b\u0012\u0001\u0013\u0001\u0013\u0001\u0013\u0001\u0013\u0001\u0013"+
		"\u0004\u0013\u0162\b\u0013\u000b\u0013\f\u0013\u0163\u0001\u0013\u0001"+
		"\u0013\u0001\u0013\u0003\u0013\u0169\b\u0013\u0001\u0014\u0001\u0014\u0001"+
		"\u0014\u0001\u0014\u0003\u0014\u016f\b\u0014\u0001\u0015\u0001\u0015\u0001"+
		"\u0016\u0001\u0016\u0001\u0016\u0001\u0016\u0001\u0016\u0001\u0016\u0003"+
		"\u0016\u0179\b\u0016\u0003\u0016\u017b\b\u0016\u0001\u0017\u0001\u0017"+
		"\u0001\u0017\u0001\u0017\u0001\u0017\u0001\u0017\u0001\u0017\u0001\u0017"+
		"\u0001\u0017\u0001\u0017\u0001\u0017\u0001\u0017\u0001\u0017\u0001\u0017"+
		"\u0003\u0017\u018b\b\u0017\u0001\u0018\u0001\u0018\u0001\u0018\u0001\u0018"+
		"\u0001\u0018\u0001\u0018\u0003\u0018\u0193\b\u0018\u0001\u0019\u0001\u0019"+
		"\u0001\u0019\u0001\u0019\u0001\u0019\u0001\u0019\u0001\u0019\u0003\u0019"+
		"\u019c\b\u0019\u0001\u001a\u0001\u001a\u0001\u001a\u0001\u001a\u0005\u001a"+
		"\u01a2\b\u001a\n\u001a\f\u001a\u01a5\t\u001a\u0001\u001a\u0003\u001a\u01a8"+
		"\b\u001a\u0001\u001a\u0001\u001a\u0001\u001b\u0001\u001b\u0001\u001b\u0001"+
		"\u001b\u0005\u001b\u01b0\b\u001b\n\u001b\f\u001b\u01b3\t\u001b\u0001\u001c"+
		"\u0001\u001c\u0001\u001c\u0005\u001c\u01b8\b\u001c\n\u001c\f\u001c\u01bb"+
		"\t\u001c\u0001\u001d\u0001\u001d\u0003\u001d\u01bf\b\u001d\u0001\u001e"+
		"\u0001\u001e\u0003\u001e\u01c3\b\u001e\u0001\u001f\u0001\u001f\u0001\u001f"+
		"\u0003\u001f\u01c8\b\u001f\u0001\u001f\u0001\u001f\u0001\u001f\u0003\u001f"+
		"\u01cd\b\u001f\u0003\u001f\u01cf\b\u001f\u0001 \u0001 \u0003 \u01d3\b"+
		" \u0001 \u0003 \u01d6\b \u0001!\u0001!\u0001!\u0003!\u01db\b!\u0001!\u0001"+
		"!\u0001\"\u0001\"\u0001\"\u0005\"\u01e2\b\"\n\"\f\"\u01e5\t\"\u0001#\u0001"+
		"#\u0001#\u0005#\u01ea\b#\n#\f#\u01ed\t#\u0001$\u0001$\u0001$\u0003$\u01f2"+
		"\b$\u0001%\u0001%\u0001&\u0001&\u0001&\u0005&\u01f9\b&\n&\f&\u01fc\t&"+
		"\u0001\'\u0001\'\u0001\'\u0005\'\u0201\b\'\n\'\f\'\u0204\t\'\u0001(\u0001"+
		"(\u0001(\u0005(\u0209\b(\n(\f(\u020c\t(\u0001)\u0001)\u0001)\u0005)\u0211"+
		"\b)\n)\f)\u0214\t)\u0001*\u0001*\u0001*\u0005*\u0219\b*\n*\f*\u021c\t"+
		"*\u0001+\u0001+\u0001+\u0005+\u0221\b+\n+\f+\u0224\t+\u0001,\u0001,\u0001"+
		",\u0001,\u0001,\u0001,\u0001,\u0003,\u022d\b,\u0001-\u0001-\u0001-\u0001"+
		"-\u0001-\u0001-\u0001-\u0001-\u0001-\u0001-\u0001-\u0001-\u0001-\u0001"+
		"-\u0003-\u023d\b-\u0001.\u0001.\u0001.\u0000\u0000/\u0000\u0002\u0004"+
		"\u0006\b\n\f\u000e\u0010\u0012\u0014\u0016\u0018\u001a\u001c\u001e \""+
		"$&(*,.02468:<>@BDFHJLNPRTVXZ\\\u0000\u0006\u0002\u0000\u0007\u0007#&\u0001"+
		"\u0000)*\u0001\u0000+.\u0001\u0000/0\u0001\u000013\u0001\u0000\u001e\""+
		"\u027a\u0000a\u0001\u0000\u0000\u0000\u0002g\u0001\u0000\u0000\u0000\u0004"+
		"s\u0001\u0000\u0000\u0000\u0006\u0085\u0001\u0000\u0000\u0000\b\u0098"+
		"\u0001\u0000\u0000\u0000\n\u00a0\u0001\u0000\u0000\u0000\f\u00a2\u0001"+
		"\u0000\u0000\u0000\u000e\u00c0\u0001\u0000\u0000\u0000\u0010\u00ec\u0001"+
		"\u0000\u0000\u0000\u0012\u00fa\u0001\u0000\u0000\u0000\u0014\u00fc\u0001"+
		"\u0000\u0000\u0000\u0016\u0104\u0001\u0000\u0000\u0000\u0018\u010c\u0001"+
		"\u0000\u0000\u0000\u001a\u011c\u0001\u0000\u0000\u0000\u001c\u0132\u0001"+
		"\u0000\u0000\u0000\u001e\u0134\u0001\u0000\u0000\u0000 \u013c\u0001\u0000"+
		"\u0000\u0000\"\u014c\u0001\u0000\u0000\u0000$\u0155\u0001\u0000\u0000"+
		"\u0000&\u015c\u0001\u0000\u0000\u0000(\u016a\u0001\u0000\u0000\u0000*"+
		"\u0170\u0001\u0000\u0000\u0000,\u0172\u0001\u0000\u0000\u0000.\u018a\u0001"+
		"\u0000\u0000\u00000\u0192\u0001\u0000\u0000\u00002\u019b\u0001\u0000\u0000"+
		"\u00004\u019d\u0001\u0000\u0000\u00006\u01ab\u0001\u0000\u0000\u00008"+
		"\u01b4\u0001\u0000\u0000\u0000:\u01bc\u0001\u0000\u0000\u0000<\u01c0\u0001"+
		"\u0000\u0000\u0000>\u01ce\u0001\u0000\u0000\u0000@\u01d0\u0001\u0000\u0000"+
		"\u0000B\u01d7\u0001\u0000\u0000\u0000D\u01de\u0001\u0000\u0000\u0000F"+
		"\u01e6\u0001\u0000\u0000\u0000H\u01f1\u0001\u0000\u0000\u0000J\u01f3\u0001"+
		"\u0000\u0000\u0000L\u01f5\u0001\u0000\u0000\u0000N\u01fd\u0001\u0000\u0000"+
		"\u0000P\u0205\u0001\u0000\u0000\u0000R\u020d\u0001\u0000\u0000\u0000T"+
		"\u0215\u0001\u0000\u0000\u0000V\u021d\u0001\u0000\u0000\u0000X\u022c\u0001"+
		"\u0000\u0000\u0000Z\u023c\u0001\u0000\u0000\u0000\\\u023e\u0001\u0000"+
		"\u0000\u0000^b\u0003\u0002\u0001\u0000_b\u0003\u0010\b\u0000`b\u0003\u0014"+
		"\n\u0000a^\u0001\u0000\u0000\u0000a_\u0001\u0000\u0000\u0000a`\u0001\u0000"+
		"\u0000\u0000bc\u0001\u0000\u0000\u0000ca\u0001\u0000\u0000\u0000cd\u0001"+
		"\u0000\u0000\u0000de\u0001\u0000\u0000\u0000ef\u0005\u0000\u0000\u0001"+
		"f\u0001\u0001\u0000\u0000\u0000gh\u0005\u000f\u0000\u0000hi\u00056\u0000"+
		"\u0000ik\u0005\u0001\u0000\u0000jl\u0003\u0004\u0002\u0000kj\u0001\u0000"+
		"\u0000\u0000kl\u0001\u0000\u0000\u0000lm\u0001\u0000\u0000\u0000mo\u0005"+
		"\u0002\u0000\u0000np\u0003\b\u0004\u0000on\u0001\u0000\u0000\u0000op\u0001"+
		"\u0000\u0000\u0000pq\u0001\u0000\u0000\u0000qr\u0003\f\u0006\u0000r\u0003"+
		"\u0001\u0000\u0000\u0000sx\u0003\u0006\u0003\u0000tu\u0005\u0003\u0000"+
		"\u0000uw\u0003\u0006\u0003\u0000vt\u0001\u0000\u0000\u0000wz\u0001\u0000"+
		"\u0000\u0000xv\u0001\u0000\u0000\u0000xy\u0001\u0000\u0000\u0000y\u0005"+
		"\u0001\u0000\u0000\u0000zx\u0001\u0000\u0000\u0000{|\u00056\u0000\u0000"+
		"|\u0086\u0003\\.\u0000}~\u00056\u0000\u0000~\u007f\u00051\u0000\u0000"+
		"\u007f\u0086\u0003\\.\u0000\u0080\u0081\u00056\u0000\u0000\u0081\u0082"+
		"\u00051\u0000\u0000\u0082\u0086\u0003\u001a\r\u0000\u0083\u0084\u0005"+
		"6\u0000\u0000\u0084\u0086\u0003\u001a\r\u0000\u0085{\u0001\u0000\u0000"+
		"\u0000\u0085}\u0001\u0000\u0000\u0000\u0085\u0080\u0001\u0000\u0000\u0000"+
		"\u0085\u0083\u0001\u0000\u0000\u0000\u0086\u0007\u0001\u0000\u0000\u0000"+
		"\u0087\u0099\u0003\\.\u0000\u0088\u0099\u0003\u001a\r\u0000\u0089\u008a"+
		"\u00051\u0000\u0000\u008a\u0099\u0003\\.\u0000\u008b\u008c\u00051\u0000"+
		"\u0000\u008c\u0099\u0003\u001a\r\u0000\u008d\u008e\u0005\u0001\u0000\u0000"+
		"\u008e\u0093\u0003\n\u0005\u0000\u008f\u0090\u0005\u0003\u0000\u0000\u0090"+
		"\u0092\u0003\n\u0005\u0000\u0091\u008f\u0001\u0000\u0000\u0000\u0092\u0095"+
		"\u0001\u0000\u0000\u0000\u0093\u0091\u0001\u0000\u0000\u0000\u0093\u0094"+
		"\u0001\u0000\u0000\u0000\u0094\u0096\u0001\u0000\u0000\u0000\u0095\u0093"+
		"\u0001\u0000\u0000\u0000\u0096\u0097\u0005\u0002\u0000\u0000\u0097\u0099"+
		"\u0001\u0000\u0000\u0000\u0098\u0087\u0001\u0000\u0000\u0000\u0098\u0088"+
		"\u0001\u0000\u0000\u0000\u0098\u0089\u0001\u0000\u0000\u0000\u0098\u008b"+
		"\u0001\u0000\u0000\u0000\u0098\u008d\u0001\u0000\u0000\u0000\u0099\t\u0001"+
		"\u0000\u0000\u0000\u009a\u00a1\u0003\\.\u0000\u009b\u00a1\u0003\u001a"+
		"\r\u0000\u009c\u009d\u00051\u0000\u0000\u009d\u00a1\u0003\\.\u0000\u009e"+
		"\u009f\u00051\u0000\u0000\u009f\u00a1\u0003\u001a\r\u0000\u00a0\u009a"+
		"\u0001\u0000\u0000\u0000\u00a0\u009b\u0001\u0000\u0000\u0000\u00a0\u009c"+
		"\u0001\u0000\u0000\u0000\u00a0\u009e\u0001\u0000\u0000\u0000\u00a1\u000b"+
		"\u0001\u0000\u0000\u0000\u00a2\u00a6\u0005\u0004\u0000\u0000\u00a3\u00a5"+
		"\u0003\u000e\u0007\u0000\u00a4\u00a3\u0001\u0000\u0000\u0000\u00a5\u00a8"+
		"\u0001\u0000\u0000\u0000\u00a6\u00a4\u0001\u0000\u0000\u0000\u00a6\u00a7"+
		"\u0001\u0000\u0000\u0000\u00a7\u00a9\u0001\u0000\u0000\u0000\u00a8\u00a6"+
		"\u0001\u0000\u0000\u0000\u00a9\u00aa\u0005\u0005\u0000\u0000\u00aa\r\u0001"+
		"\u0000\u0000\u0000\u00ab\u00c1\u0003\u0010\b\u0000\u00ac\u00c1\u0003\u0012"+
		"\t\u0000\u00ad\u00c1\u0003\u0014\n\u0000\u00ae\u00c1\u0003$\u0012\u0000"+
		"\u00af\u00c1\u0003&\u0013\u0000\u00b0\u00c1\u0003(\u0014\u0000\u00b1\u00c1"+
		"\u0003,\u0016\u0000\u00b2\u00c1\u0003.\u0017\u0000\u00b3\u00c1\u00034"+
		"\u001a\u0000\u00b4\u00c1\u0003:\u001d\u0000\u00b5\u00c1\u0003<\u001e\u0000"+
		"\u00b6\u00c1\u0003>\u001f\u0000\u00b7\u00c1\u0003@ \u0000\u00b8\u00ba"+
		"\u0003B!\u0000\u00b9\u00bb\u0005\u0006\u0000\u0000\u00ba\u00b9\u0001\u0000"+
		"\u0000\u0000\u00ba\u00bb\u0001\u0000\u0000\u0000\u00bb\u00c1\u0001\u0000"+
		"\u0000\u0000\u00bc\u00be\u0003J%\u0000\u00bd\u00bf\u0005\u0006\u0000\u0000"+
		"\u00be\u00bd\u0001\u0000\u0000\u0000\u00be\u00bf\u0001\u0000\u0000\u0000"+
		"\u00bf\u00c1\u0001\u0000\u0000\u0000\u00c0\u00ab\u0001\u0000\u0000\u0000"+
		"\u00c0\u00ac\u0001\u0000\u0000\u0000\u00c0\u00ad\u0001\u0000\u0000\u0000"+
		"\u00c0\u00ae\u0001\u0000\u0000\u0000\u00c0\u00af\u0001\u0000\u0000\u0000"+
		"\u00c0\u00b0\u0001\u0000\u0000\u0000\u00c0\u00b1\u0001\u0000\u0000\u0000"+
		"\u00c0\u00b2\u0001\u0000\u0000\u0000\u00c0\u00b3\u0001\u0000\u0000\u0000"+
		"\u00c0\u00b4\u0001\u0000\u0000\u0000\u00c0\u00b5\u0001\u0000\u0000\u0000"+
		"\u00c0\u00b6\u0001\u0000\u0000\u0000\u00c0\u00b7\u0001\u0000\u0000\u0000"+
		"\u00c0\u00b8\u0001\u0000\u0000\u0000\u00c0\u00bc\u0001\u0000\u0000\u0000"+
		"\u00c1\u000f\u0001\u0000\u0000\u0000\u00c2\u00c3\u0005\u0010\u0000\u0000"+
		"\u00c3\u00c4\u00056\u0000\u0000\u00c4\u00c7\u0003\\.\u0000\u00c5\u00c6"+
		"\u0005\u0007\u0000\u0000\u00c6\u00c8\u0003J%\u0000\u00c7\u00c5\u0001\u0000"+
		"\u0000\u0000\u00c7\u00c8\u0001\u0000\u0000\u0000\u00c8\u00ca\u0001\u0000"+
		"\u0000\u0000\u00c9\u00cb\u0005\u0006\u0000\u0000\u00ca\u00c9\u0001\u0000"+
		"\u0000\u0000\u00ca\u00cb\u0001\u0000\u0000\u0000\u00cb\u00ed\u0001\u0000"+
		"\u0000\u0000\u00cc\u00cd\u0005\u0010\u0000\u0000\u00cd\u00ce\u00056\u0000"+
		"\u0000\u00ce\u00d1\u0003\u001a\r\u0000\u00cf\u00d0\u0005\u0007\u0000\u0000"+
		"\u00d0\u00d2\u0003\u001c\u000e\u0000\u00d1\u00cf\u0001\u0000\u0000\u0000"+
		"\u00d1\u00d2\u0001\u0000\u0000\u0000\u00d2\u00d4\u0001\u0000\u0000\u0000"+
		"\u00d3\u00d5\u0005\u0006\u0000\u0000\u00d4\u00d3\u0001\u0000\u0000\u0000"+
		"\u00d4\u00d5\u0001\u0000\u0000\u0000\u00d5\u00ed\u0001\u0000\u0000\u0000"+
		"\u00d6\u00d7\u0005\u0010\u0000\u0000\u00d7\u00d8\u00056\u0000\u0000\u00d8"+
		"\u00d9\u0003\u001a\r\u0000\u00d9\u00da\u0005\u0007\u0000\u0000\u00da\u00dc"+
		"\u0003J%\u0000\u00db\u00dd\u0005\u0006\u0000\u0000\u00dc\u00db\u0001\u0000"+
		"\u0000\u0000\u00dc\u00dd\u0001\u0000\u0000\u0000\u00dd\u00ed\u0001\u0000"+
		"\u0000\u0000\u00de\u00df\u0005\u0010\u0000\u0000\u00df\u00e0\u00056\u0000"+
		"\u0000\u00e0\u00e1\u00051\u0000\u0000\u00e1\u00e3\u0003\\.\u0000\u00e2"+
		"\u00e4\u0005\u0006\u0000\u0000\u00e3\u00e2\u0001\u0000\u0000\u0000\u00e3"+
		"\u00e4\u0001\u0000\u0000\u0000\u00e4\u00ed\u0001\u0000\u0000\u0000\u00e5"+
		"\u00e6\u0005\u0010\u0000\u0000\u00e6\u00e7\u00056\u0000\u0000\u00e7\u00e8"+
		"\u00051\u0000\u0000\u00e8\u00ea\u0003\u001a\r\u0000\u00e9\u00eb\u0005"+
		"\u0006\u0000\u0000\u00ea\u00e9\u0001\u0000\u0000\u0000\u00ea\u00eb\u0001"+
		"\u0000\u0000\u0000\u00eb\u00ed\u0001\u0000\u0000\u0000\u00ec\u00c2\u0001"+
		"\u0000\u0000\u0000\u00ec\u00cc\u0001\u0000\u0000\u0000\u00ec\u00d6\u0001"+
		"\u0000\u0000\u0000\u00ec\u00de\u0001\u0000\u0000\u0000\u00ec\u00e5\u0001"+
		"\u0000\u0000\u0000\u00ed\u0011\u0001\u0000\u0000\u0000\u00ee\u00ef\u0003"+
		"\u0016\u000b\u0000\u00ef\u00f0\u0005\b\u0000\u0000\u00f0\u00f2\u0003\u0018"+
		"\f\u0000\u00f1\u00f3\u0005\u0006\u0000\u0000\u00f2\u00f1\u0001\u0000\u0000"+
		"\u0000\u00f2\u00f3\u0001\u0000\u0000\u0000\u00f3\u00fb\u0001\u0000\u0000"+
		"\u0000\u00f4\u00f5\u00056\u0000\u0000\u00f5\u00f6\u0005\b\u0000\u0000"+
		"\u00f6\u00f8\u0003\u001c\u000e\u0000\u00f7\u00f9\u0005\u0006\u0000\u0000"+
		"\u00f8\u00f7\u0001\u0000\u0000\u0000\u00f8\u00f9\u0001\u0000\u0000\u0000"+
		"\u00f9\u00fb\u0001\u0000\u0000\u0000\u00fa\u00ee\u0001\u0000\u0000\u0000"+
		"\u00fa\u00f4\u0001\u0000\u0000\u0000\u00fb\u0013\u0001\u0000\u0000\u0000"+
		"\u00fc\u00fd\u0005\u0011\u0000\u0000\u00fd\u00fe\u00056\u0000\u0000\u00fe"+
		"\u00ff\u0003\\.\u0000\u00ff\u0100\u0005\u0007\u0000\u0000\u0100\u0102"+
		"\u0003J%\u0000\u0101\u0103\u0005\u0006\u0000\u0000\u0102\u0101\u0001\u0000"+
		"\u0000\u0000\u0102\u0103\u0001\u0000\u0000\u0000\u0103\u0015\u0001\u0000"+
		"\u0000\u0000\u0104\u0109\u00056\u0000\u0000\u0105\u0106\u0005\u0003\u0000"+
		"\u0000\u0106\u0108\u00056\u0000\u0000\u0107\u0105\u0001\u0000\u0000\u0000"+
		"\u0108\u010b\u0001\u0000\u0000\u0000\u0109\u0107\u0001\u0000\u0000\u0000"+
		"\u0109\u010a\u0001\u0000\u0000\u0000\u010a\u0017\u0001\u0000\u0000\u0000"+
		"\u010b\u0109\u0001\u0000\u0000\u0000\u010c\u0111\u0003J%\u0000\u010d\u010e"+
		"\u0005\u0003\u0000\u0000\u010e\u0110\u0003J%\u0000\u010f\u010d\u0001\u0000"+
		"\u0000\u0000\u0110\u0113\u0001\u0000\u0000\u0000\u0111\u010f\u0001\u0000"+
		"\u0000\u0000\u0111\u0112\u0001\u0000\u0000\u0000\u0112\u0019\u0001\u0000"+
		"\u0000\u0000\u0113\u0111\u0001\u0000\u0000\u0000\u0114\u0115\u0005\t\u0000"+
		"\u0000\u0115\u0116\u00058\u0000\u0000\u0116\u0117\u0005\n\u0000\u0000"+
		"\u0117\u011d\u0003\\.\u0000\u0118\u0119\u0005\t\u0000\u0000\u0119\u011a"+
		"\u00058\u0000\u0000\u011a\u011b\u0005\n\u0000\u0000\u011b\u011d\u0003"+
		"\u001a\r\u0000\u011c\u0114\u0001\u0000\u0000\u0000\u011c\u0118\u0001\u0000"+
		"\u0000\u0000\u011d\u001b\u0001\u0000\u0000\u0000\u011e\u011f\u0005\t\u0000"+
		"\u0000\u011f\u0120\u00058\u0000\u0000\u0120\u0121\u0005\n\u0000\u0000"+
		"\u0121\u0122\u0003\\.\u0000\u0122\u0124\u0005\u0004\u0000\u0000\u0123"+
		"\u0125\u0003\u001e\u000f\u0000\u0124\u0123\u0001\u0000\u0000\u0000\u0124"+
		"\u0125\u0001\u0000\u0000\u0000\u0125\u0126\u0001\u0000\u0000\u0000\u0126"+
		"\u0127\u0005\u0005\u0000\u0000\u0127\u0133\u0001\u0000\u0000\u0000\u0128"+
		"\u0129\u0005\t\u0000\u0000\u0129\u012a\u00058\u0000\u0000\u012a\u012b"+
		"\u0005\n\u0000\u0000\u012b\u012c\u0003\u001a\r\u0000\u012c\u012e\u0005"+
		"\u0004\u0000\u0000\u012d\u012f\u0003 \u0010\u0000\u012e\u012d\u0001\u0000"+
		"\u0000\u0000\u012e\u012f\u0001\u0000\u0000\u0000\u012f\u0130\u0001\u0000"+
		"\u0000\u0000\u0130\u0131\u0005\u0005\u0000\u0000\u0131\u0133\u0001\u0000"+
		"\u0000\u0000\u0132\u011e\u0001\u0000\u0000\u0000\u0132\u0128\u0001\u0000"+
		"\u0000\u0000\u0133\u001d\u0001\u0000\u0000\u0000\u0134\u0139\u0003J%\u0000"+
		"\u0135\u0136\u0005\u0003\u0000\u0000\u0136\u0138\u0003J%\u0000\u0137\u0135"+
		"\u0001\u0000\u0000\u0000\u0138\u013b\u0001\u0000\u0000\u0000\u0139\u0137"+
		"\u0001\u0000\u0000\u0000\u0139\u013a\u0001\u0000\u0000\u0000\u013a\u001f"+
		"\u0001\u0000\u0000\u0000\u013b\u0139\u0001\u0000\u0000\u0000\u013c\u013e"+
		"\u0005\u0004\u0000\u0000\u013d\u013f\u0003\u001e\u000f\u0000\u013e\u013d"+
		"\u0001\u0000\u0000\u0000\u013e\u013f\u0001\u0000\u0000\u0000\u013f\u0140"+
		"\u0001\u0000\u0000\u0000\u0140\u0149\u0005\u0005\u0000\u0000\u0141\u0142"+
		"\u0005\u0003\u0000\u0000\u0142\u0144\u0005\u0004\u0000\u0000\u0143\u0145"+
		"\u0003\u001e\u000f\u0000\u0144\u0143\u0001\u0000\u0000\u0000\u0144\u0145"+
		"\u0001\u0000\u0000\u0000\u0145\u0146\u0001\u0000\u0000\u0000\u0146\u0148"+
		"\u0005\u0005\u0000\u0000\u0147\u0141\u0001\u0000\u0000\u0000\u0148\u014b"+
		"\u0001\u0000\u0000\u0000\u0149\u0147\u0001\u0000\u0000\u0000\u0149\u014a"+
		"\u0001\u0000\u0000\u0000\u014a!\u0001\u0000\u0000\u0000\u014b\u0149\u0001"+
		"\u0000\u0000\u0000\u014c\u0151\u00056\u0000\u0000\u014d\u014e\u0005\t"+
		"\u0000\u0000\u014e\u014f\u0003J%\u0000\u014f\u0150\u0005\n\u0000\u0000"+
		"\u0150\u0152\u0001\u0000\u0000\u0000\u0151\u014d\u0001\u0000\u0000\u0000"+
		"\u0152\u0153\u0001\u0000\u0000\u0000\u0153\u0151\u0001\u0000\u0000\u0000"+
		"\u0153\u0154\u0001\u0000\u0000\u0000\u0154#\u0001\u0000\u0000\u0000\u0155"+
		"\u0156\u00051\u0000\u0000\u0156\u0157\u00056\u0000\u0000\u0157\u0158\u0003"+
		"*\u0015\u0000\u0158\u015a\u0003J%\u0000\u0159\u015b\u0005\u0006\u0000"+
		"\u0000\u015a\u0159\u0001\u0000\u0000\u0000\u015a\u015b\u0001\u0000\u0000"+
		"\u0000\u015b%\u0001\u0000\u0000\u0000\u015c\u0161\u00056\u0000\u0000\u015d"+
		"\u015e\u0005\t\u0000\u0000\u015e\u015f\u0003J%\u0000\u015f\u0160\u0005"+
		"\n\u0000\u0000\u0160\u0162\u0001\u0000\u0000\u0000\u0161\u015d\u0001\u0000"+
		"\u0000\u0000\u0162\u0163\u0001\u0000\u0000\u0000\u0163\u0161\u0001\u0000"+
		"\u0000\u0000\u0163\u0164\u0001\u0000\u0000\u0000\u0164\u0165\u0001\u0000"+
		"\u0000\u0000\u0165\u0166\u0003*\u0015\u0000\u0166\u0168\u0003J%\u0000"+
		"\u0167\u0169\u0005\u0006\u0000\u0000\u0168\u0167\u0001\u0000\u0000\u0000"+
		"\u0168\u0169\u0001\u0000\u0000\u0000\u0169\'\u0001\u0000\u0000\u0000\u016a"+
		"\u016b\u00056\u0000\u0000\u016b\u016c\u0003*\u0015\u0000\u016c\u016e\u0003"+
		"J%\u0000\u016d\u016f\u0005\u0006\u0000\u0000\u016e\u016d\u0001\u0000\u0000"+
		"\u0000\u016e\u016f\u0001\u0000\u0000\u0000\u016f)\u0001\u0000\u0000\u0000"+
		"\u0170\u0171\u0007\u0000\u0000\u0000\u0171+\u0001\u0000\u0000\u0000\u0172"+
		"\u0173\u0005\u0012\u0000\u0000\u0173\u0174\u0003J%\u0000\u0174\u017a\u0003"+
		"\f\u0006\u0000\u0175\u0178\u0005\u0013\u0000\u0000\u0176\u0179\u0003,"+
		"\u0016\u0000\u0177\u0179\u0003\f\u0006\u0000\u0178\u0176\u0001\u0000\u0000"+
		"\u0000\u0178\u0177\u0001\u0000\u0000\u0000\u0179\u017b\u0001\u0000\u0000"+
		"\u0000\u017a\u0175\u0001\u0000\u0000\u0000\u017a\u017b\u0001\u0000\u0000"+
		"\u0000\u017b-\u0001\u0000\u0000\u0000\u017c\u017d\u0005\u0014\u0000\u0000"+
		"\u017d\u017e\u00030\u0018\u0000\u017e\u017f\u0005\u0006\u0000\u0000\u017f"+
		"\u0180\u0003J%\u0000\u0180\u0181\u0005\u0006\u0000\u0000\u0181\u0182\u0003"+
		"2\u0019\u0000\u0182\u0183\u0003\f\u0006\u0000\u0183\u018b\u0001\u0000"+
		"\u0000\u0000\u0184\u0185\u0005\u0014\u0000\u0000\u0185\u0186\u0003J%\u0000"+
		"\u0186\u0187\u0003\f\u0006\u0000\u0187\u018b\u0001\u0000\u0000\u0000\u0188"+
		"\u0189\u0005\u0014\u0000\u0000\u0189\u018b\u0003\f\u0006\u0000\u018a\u017c"+
		"\u0001\u0000\u0000\u0000\u018a\u0184\u0001\u0000\u0000\u0000\u018a\u0188"+
		"\u0001\u0000\u0000\u0000\u018b/\u0001\u0000\u0000\u0000\u018c\u018d\u0005"+
		"6\u0000\u0000\u018d\u018e\u0005\b\u0000\u0000\u018e\u0193\u0003J%\u0000"+
		"\u018f\u0190\u00056\u0000\u0000\u0190\u0191\u0005\u0007\u0000\u0000\u0191"+
		"\u0193\u0003J%\u0000\u0192\u018c\u0001\u0000\u0000\u0000\u0192\u018f\u0001"+
		"\u0000\u0000\u0000\u01931\u0001\u0000\u0000\u0000\u0194\u0195\u00056\u0000"+
		"\u0000\u0195\u019c\u0005\u000b\u0000\u0000\u0196\u0197\u00056\u0000\u0000"+
		"\u0197\u019c\u0005\f\u0000\u0000\u0198\u0199\u00056\u0000\u0000\u0199"+
		"\u019a\u0005\u0007\u0000\u0000\u019a\u019c\u0003J%\u0000\u019b\u0194\u0001"+
		"\u0000\u0000\u0000\u019b\u0196\u0001\u0000\u0000\u0000\u019b\u0198\u0001"+
		"\u0000\u0000\u0000\u019c3\u0001\u0000\u0000\u0000\u019d\u019e\u0005\u0015"+
		"\u0000\u0000\u019e\u019f\u0003J%\u0000\u019f\u01a3\u0005\u0004\u0000\u0000"+
		"\u01a0\u01a2\u00036\u001b\u0000\u01a1\u01a0\u0001\u0000\u0000\u0000\u01a2"+
		"\u01a5\u0001\u0000\u0000\u0000\u01a3\u01a1\u0001\u0000\u0000\u0000\u01a3"+
		"\u01a4\u0001\u0000\u0000\u0000\u01a4\u01a7\u0001\u0000\u0000\u0000\u01a5"+
		"\u01a3\u0001\u0000\u0000\u0000\u01a6\u01a8\u00038\u001c\u0000\u01a7\u01a6"+
		"\u0001\u0000\u0000\u0000\u01a7\u01a8\u0001\u0000\u0000\u0000\u01a8\u01a9"+
		"\u0001\u0000\u0000\u0000\u01a9\u01aa\u0005\u0005\u0000\u0000\u01aa5\u0001"+
		"\u0000\u0000\u0000\u01ab\u01ac\u0005\u0016\u0000\u0000\u01ac\u01ad\u0003"+
		"\u0018\f\u0000\u01ad\u01b1\u0005\r\u0000\u0000\u01ae\u01b0\u0003\u000e"+
		"\u0007\u0000\u01af\u01ae\u0001\u0000\u0000\u0000\u01b0\u01b3\u0001\u0000"+
		"\u0000\u0000\u01b1\u01af\u0001\u0000\u0000\u0000\u01b1\u01b2\u0001\u0000"+
		"\u0000\u0000\u01b27\u0001\u0000\u0000\u0000\u01b3\u01b1\u0001\u0000\u0000"+
		"\u0000\u01b4\u01b5\u0005\u0017\u0000\u0000\u01b5\u01b9\u0005\r\u0000\u0000"+
		"\u01b6\u01b8\u0003\u000e\u0007\u0000\u01b7\u01b6\u0001\u0000\u0000\u0000"+
		"\u01b8\u01bb\u0001\u0000\u0000\u0000\u01b9\u01b7\u0001\u0000\u0000\u0000"+
		"\u01b9\u01ba\u0001\u0000\u0000\u0000\u01ba9\u0001\u0000\u0000\u0000\u01bb"+
		"\u01b9\u0001\u0000\u0000\u0000\u01bc\u01be\u0005\u0018\u0000\u0000\u01bd"+
		"\u01bf\u0005\u0006\u0000\u0000\u01be\u01bd\u0001\u0000\u0000\u0000\u01be"+
		"\u01bf\u0001\u0000\u0000\u0000\u01bf;\u0001\u0000\u0000\u0000\u01c0\u01c2"+
		"\u0005\u0019\u0000\u0000\u01c1\u01c3\u0005\u0006\u0000\u0000\u01c2\u01c1"+
		"\u0001\u0000\u0000\u0000\u01c2\u01c3\u0001\u0000\u0000\u0000\u01c3=\u0001"+
		"\u0000\u0000\u0000\u01c4\u01c5\u00056\u0000\u0000\u01c5\u01c7\u0005\u000b"+
		"\u0000\u0000\u01c6\u01c8\u0005\u0006\u0000\u0000\u01c7\u01c6\u0001\u0000"+
		"\u0000\u0000\u01c7\u01c8\u0001\u0000\u0000\u0000\u01c8\u01cf\u0001\u0000"+
		"\u0000\u0000\u01c9\u01ca\u00056\u0000\u0000\u01ca\u01cc\u0005\f\u0000"+
		"\u0000\u01cb\u01cd\u0005\u0006\u0000\u0000\u01cc\u01cb\u0001\u0000\u0000"+
		"\u0000\u01cc\u01cd\u0001\u0000\u0000\u0000\u01cd\u01cf\u0001\u0000\u0000"+
		"\u0000\u01ce\u01c4\u0001\u0000\u0000\u0000\u01ce\u01c9\u0001\u0000\u0000"+
		"\u0000\u01cf?\u0001\u0000\u0000\u0000\u01d0\u01d2\u0005\u001a\u0000\u0000"+
		"\u01d1\u01d3\u0003\u0018\f\u0000\u01d2\u01d1\u0001\u0000\u0000\u0000\u01d2"+
		"\u01d3\u0001\u0000\u0000\u0000\u01d3\u01d5\u0001\u0000\u0000\u0000\u01d4"+
		"\u01d6\u0005\u0006\u0000\u0000\u01d5\u01d4\u0001\u0000\u0000\u0000\u01d5"+
		"\u01d6\u0001\u0000\u0000\u0000\u01d6A\u0001\u0000\u0000\u0000\u01d7\u01d8"+
		"\u0003D\"\u0000\u01d8\u01da\u0005\u0001\u0000\u0000\u01d9\u01db\u0003"+
		"F#\u0000\u01da\u01d9\u0001\u0000\u0000\u0000\u01da\u01db\u0001\u0000\u0000"+
		"\u0000\u01db\u01dc\u0001\u0000\u0000\u0000\u01dc\u01dd\u0005\u0002\u0000"+
		"\u0000\u01ddC\u0001\u0000\u0000\u0000\u01de\u01e3\u00056\u0000\u0000\u01df"+
		"\u01e0\u0005\u000e\u0000\u0000\u01e0\u01e2\u00056\u0000\u0000\u01e1\u01df"+
		"\u0001\u0000\u0000\u0000\u01e2\u01e5\u0001\u0000\u0000\u0000\u01e3\u01e1"+
		"\u0001\u0000\u0000\u0000\u01e3\u01e4\u0001\u0000\u0000\u0000\u01e4E\u0001"+
		"\u0000\u0000\u0000\u01e5\u01e3\u0001\u0000\u0000\u0000\u01e6\u01eb\u0003"+
		"H$\u0000\u01e7\u01e8\u0005\u0003\u0000\u0000\u01e8\u01ea\u0003H$\u0000"+
		"\u01e9\u01e7\u0001\u0000\u0000\u0000\u01ea\u01ed\u0001\u0000\u0000\u0000"+
		"\u01eb\u01e9\u0001\u0000\u0000\u0000\u01eb\u01ec\u0001\u0000\u0000\u0000"+
		"\u01ecG\u0001\u0000\u0000\u0000\u01ed\u01eb\u0001\u0000\u0000\u0000\u01ee"+
		"\u01ef\u00055\u0000\u0000\u01ef\u01f2\u00056\u0000\u0000\u01f0\u01f2\u0003"+
		"J%\u0000\u01f1\u01ee\u0001\u0000\u0000\u0000\u01f1\u01f0\u0001\u0000\u0000"+
		"\u0000\u01f2I\u0001\u0000\u0000\u0000\u01f3\u01f4\u0003L&\u0000\u01f4"+
		"K\u0001\u0000\u0000\u0000\u01f5\u01fa\u0003N\'\u0000\u01f6\u01f7\u0005"+
		"\'\u0000\u0000\u01f7\u01f9\u0003N\'\u0000\u01f8\u01f6\u0001\u0000\u0000"+
		"\u0000\u01f9\u01fc\u0001\u0000\u0000\u0000\u01fa\u01f8\u0001\u0000\u0000"+
		"\u0000\u01fa\u01fb\u0001\u0000\u0000\u0000\u01fbM\u0001\u0000\u0000\u0000"+
		"\u01fc\u01fa\u0001\u0000\u0000\u0000\u01fd\u0202\u0003P(\u0000\u01fe\u01ff"+
		"\u0005(\u0000\u0000\u01ff\u0201\u0003P(\u0000\u0200\u01fe\u0001\u0000"+
		"\u0000\u0000\u0201\u0204\u0001\u0000\u0000\u0000\u0202\u0200\u0001\u0000"+
		"\u0000\u0000\u0202\u0203\u0001\u0000\u0000\u0000\u0203O\u0001\u0000\u0000"+
		"\u0000\u0204\u0202\u0001\u0000\u0000\u0000\u0205\u020a\u0003R)\u0000\u0206"+
		"\u0207\u0007\u0001\u0000\u0000\u0207\u0209\u0003R)\u0000\u0208\u0206\u0001"+
		"\u0000\u0000\u0000\u0209\u020c\u0001\u0000\u0000\u0000\u020a\u0208\u0001"+
		"\u0000\u0000\u0000\u020a\u020b\u0001\u0000\u0000\u0000\u020bQ\u0001\u0000"+
		"\u0000\u0000\u020c\u020a\u0001\u0000\u0000\u0000\u020d\u0212\u0003T*\u0000"+
		"\u020e\u020f\u0007\u0002\u0000\u0000\u020f\u0211\u0003T*\u0000\u0210\u020e"+
		"\u0001\u0000\u0000\u0000\u0211\u0214\u0001\u0000\u0000\u0000\u0212\u0210"+
		"\u0001\u0000\u0000\u0000\u0212\u0213\u0001\u0000\u0000\u0000\u0213S\u0001"+
		"\u0000\u0000\u0000\u0214\u0212\u0001\u0000\u0000\u0000\u0215\u021a\u0003"+
		"V+\u0000\u0216\u0217\u0007\u0003\u0000\u0000\u0217\u0219\u0003V+\u0000"+
		"\u0218\u0216\u0001\u0000\u0000\u0000\u0219\u021c\u0001\u0000\u0000\u0000"+
		"\u021a\u0218\u0001\u0000\u0000\u0000\u021a\u021b\u0001\u0000\u0000\u0000"+
		"\u021bU\u0001\u0000\u0000\u0000\u021c\u021a\u0001\u0000\u0000\u0000\u021d"+
		"\u0222\u0003X,\u0000\u021e\u021f\u0007\u0004\u0000\u0000\u021f\u0221\u0003"+
		"X,\u0000\u0220\u021e\u0001\u0000\u0000\u0000\u0221\u0224\u0001\u0000\u0000"+
		"\u0000\u0222\u0220\u0001\u0000\u0000\u0000\u0222\u0223\u0001\u0000\u0000"+
		"\u0000\u0223W\u0001\u0000\u0000\u0000\u0224\u0222\u0001\u0000\u0000\u0000"+
		"\u0225\u0226\u00054\u0000\u0000\u0226\u022d\u0003X,\u0000\u0227\u0228"+
		"\u00050\u0000\u0000\u0228\u022d\u0003X,\u0000\u0229\u022a\u00051\u0000"+
		"\u0000\u022a\u022d\u0003X,\u0000\u022b\u022d\u0003Z-\u0000\u022c\u0225"+
		"\u0001\u0000\u0000\u0000\u022c\u0227\u0001\u0000\u0000\u0000\u022c\u0229"+
		"\u0001\u0000\u0000\u0000\u022c\u022b\u0001\u0000\u0000\u0000\u022dY\u0001"+
		"\u0000\u0000\u0000\u022e\u022f\u0005\u0001\u0000\u0000\u022f\u0230\u0003"+
		"J%\u0000\u0230\u0231\u0005\u0002\u0000\u0000\u0231\u023d\u0001\u0000\u0000"+
		"\u0000\u0232\u023d\u0003B!\u0000\u0233\u023d\u0003\"\u0011\u0000\u0234"+
		"\u023d\u00056\u0000\u0000\u0235\u023d\u00058\u0000\u0000\u0236\u023d\u0005"+
		"7\u0000\u0000\u0237\u023d\u00059\u0000\u0000\u0238\u023d\u0005:\u0000"+
		"\u0000\u0239\u023d\u0005\u001b\u0000\u0000\u023a\u023d\u0005\u001c\u0000"+
		"\u0000\u023b\u023d\u0005\u001d\u0000\u0000\u023c\u022e\u0001\u0000\u0000"+
		"\u0000\u023c\u0232\u0001\u0000\u0000\u0000\u023c\u0233\u0001\u0000\u0000"+
		"\u0000\u023c\u0234\u0001\u0000\u0000\u0000\u023c\u0235\u0001\u0000\u0000"+
		"\u0000\u023c\u0236\u0001\u0000\u0000\u0000\u023c\u0237\u0001\u0000\u0000"+
		"\u0000\u023c\u0238\u0001\u0000\u0000\u0000\u023c\u0239\u0001\u0000\u0000"+
		"\u0000\u023c\u023a\u0001\u0000\u0000\u0000\u023c\u023b\u0001\u0000\u0000"+
		"\u0000\u023d[\u0001\u0000\u0000\u0000\u023e\u023f\u0007\u0005\u0000\u0000"+
		"\u023f]\u0001\u0000\u0000\u0000Dackox\u0085\u0093\u0098\u00a0\u00a6\u00ba"+
		"\u00be\u00c0\u00c7\u00ca\u00d1\u00d4\u00dc\u00e3\u00ea\u00ec\u00f2\u00f8"+
		"\u00fa\u0102\u0109\u0111\u011c\u0124\u012e\u0132\u0139\u013e\u0144\u0149"+
		"\u0153\u015a\u0163\u0168\u016e\u0178\u017a\u018a\u0192\u019b\u01a3\u01a7"+
		"\u01b1\u01b9\u01be\u01c2\u01c7\u01cc\u01ce\u01d2\u01d5\u01da\u01e3\u01eb"+
		"\u01f1\u01fa\u0202\u020a\u0212\u021a\u0222\u022c\u023c";
	public static final ATN _ATN =
		new ATNDeserializer().deserialize(_serializedATN.toCharArray());
	static {
		_decisionToDFA = new DFA[_ATN.getNumberOfDecisions()];
		for (int i = 0; i < _ATN.getNumberOfDecisions(); i++) {
			_decisionToDFA[i] = new DFA(_ATN.getDecisionState(i), i);
		}
	}
}