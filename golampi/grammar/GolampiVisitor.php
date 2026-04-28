<?php

/*
 * Generated from Golampi.g4 by ANTLR 4.13.1
 */

use Antlr\Antlr4\Runtime\Tree\ParseTreeVisitor;

/**
 * This interface defines a complete generic visitor for a parse tree produced by {@see GolampiParser}.
 */
interface GolampiVisitor extends ParseTreeVisitor
{
	/**
	 * Visit a parse tree produced by {@see GolampiParser::program()}.
	 *
	 * @param Context\ProgramContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitProgram(Context\ProgramContext $context);

	/**
	 * Visit a parse tree produced by {@see GolampiParser::functionDecl()}.
	 *
	 * @param Context\FunctionDeclContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitFunctionDecl(Context\FunctionDeclContext $context);

	/**
	 * Visit a parse tree produced by {@see GolampiParser::paramList()}.
	 *
	 * @param Context\ParamListContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitParamList(Context\ParamListContext $context);

	/**
	 * Visit a parse tree produced by {@see GolampiParser::param()}.
	 *
	 * @param Context\ParamContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitParam(Context\ParamContext $context);

	/**
	 * Visit a parse tree produced by {@see GolampiParser::returnType()}.
	 *
	 * @param Context\ReturnTypeContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitReturnType(Context\ReturnTypeContext $context);

	/**
	 * Visit a parse tree produced by {@see GolampiParser::multiReturnType()}.
	 *
	 * @param Context\MultiReturnTypeContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitMultiReturnType(Context\MultiReturnTypeContext $context);

	/**
	 * Visit a parse tree produced by {@see GolampiParser::sliceType()}.
	 *
	 * @param Context\SliceTypeContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitSliceType(Context\SliceTypeContext $context);

	/**
	 * Visit a parse tree produced by {@see GolampiParser::block()}.
	 *
	 * @param Context\BlockContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitBlock(Context\BlockContext $context);

	/**
	 * Visit a parse tree produced by {@see GolampiParser::statement()}.
	 *
	 * @param Context\StatementContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitStatement(Context\StatementContext $context);

	/**
	 * Visit a parse tree produced by {@see GolampiParser::varDecl()}.
	 *
	 * @param Context\VarDeclContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitVarDecl(Context\VarDeclContext $context);

	/**
	 * Visit a parse tree produced by {@see GolampiParser::varShortDecl()}.
	 *
	 * @param Context\VarShortDeclContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitVarShortDecl(Context\VarShortDeclContext $context);

	/**
	 * Visit a parse tree produced by {@see GolampiParser::constDecl()}.
	 *
	 * @param Context\ConstDeclContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitConstDecl(Context\ConstDeclContext $context);

	/**
	 * Visit a parse tree produced by {@see GolampiParser::idList()}.
	 *
	 * @param Context\IdListContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitIdList(Context\IdListContext $context);

	/**
	 * Visit a parse tree produced by {@see GolampiParser::expList()}.
	 *
	 * @param Context\ExpListContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitExpList(Context\ExpListContext $context);

	/**
	 * Visit a parse tree produced by {@see GolampiParser::arrayType()}.
	 *
	 * @param Context\ArrayTypeContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitArrayType(Context\ArrayTypeContext $context);

	/**
	 * Visit a parse tree produced by {@see GolampiParser::arrayLiteral()}.
	 *
	 * @param Context\ArrayLiteralContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitArrayLiteral(Context\ArrayLiteralContext $context);

	/**
	 * Visit a parse tree produced by {@see GolampiParser::arrayElements()}.
	 *
	 * @param Context\ArrayElementsContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitArrayElements(Context\ArrayElementsContext $context);

	/**
	 * Visit a parse tree produced by {@see GolampiParser::arrayRowElements()}.
	 *
	 * @param Context\ArrayRowElementsContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitArrayRowElements(Context\ArrayRowElementsContext $context);

	/**
	 * Visit a parse tree produced by {@see GolampiParser::arrayRowItem()}.
	 *
	 * @param Context\ArrayRowItemContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitArrayRowItem(Context\ArrayRowItemContext $context);

	/**
	 * Visit a parse tree produced by {@see GolampiParser::arrayAccess()}.
	 *
	 * @param Context\ArrayAccessContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitArrayAccess(Context\ArrayAccessContext $context);

	/**
	 * Visit a parse tree produced by {@see GolampiParser::ptrAssign()}.
	 *
	 * @param Context\PtrAssignContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitPtrAssign(Context\PtrAssignContext $context);

	/**
	 * Visit a parse tree produced by {@see GolampiParser::arrayAssign()}.
	 *
	 * @param Context\ArrayAssignContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitArrayAssign(Context\ArrayAssignContext $context);

	/**
	 * Visit a parse tree produced by {@see GolampiParser::assignment()}.
	 *
	 * @param Context\AssignmentContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitAssignment(Context\AssignmentContext $context);

	/**
	 * Visit a parse tree produced by {@see GolampiParser::assignOp()}.
	 *
	 * @param Context\AssignOpContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitAssignOp(Context\AssignOpContext $context);

	/**
	 * Visit a parse tree produced by {@see GolampiParser::ifStmt()}.
	 *
	 * @param Context\IfStmtContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitIfStmt(Context\IfStmtContext $context);

	/**
	 * Visit a parse tree produced by {@see GolampiParser::forStmt()}.
	 *
	 * @param Context\ForStmtContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitForStmt(Context\ForStmtContext $context);

	/**
	 * Visit a parse tree produced by {@see GolampiParser::forInit()}.
	 *
	 * @param Context\ForInitContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitForInit(Context\ForInitContext $context);

	/**
	 * Visit a parse tree produced by {@see GolampiParser::forPost()}.
	 *
	 * @param Context\ForPostContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitForPost(Context\ForPostContext $context);

	/**
	 * Visit a parse tree produced by {@see GolampiParser::switchStmt()}.
	 *
	 * @param Context\SwitchStmtContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitSwitchStmt(Context\SwitchStmtContext $context);

	/**
	 * Visit a parse tree produced by {@see GolampiParser::caseClause()}.
	 *
	 * @param Context\CaseClauseContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitCaseClause(Context\CaseClauseContext $context);

	/**
	 * Visit a parse tree produced by {@see GolampiParser::defaultClause()}.
	 *
	 * @param Context\DefaultClauseContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitDefaultClause(Context\DefaultClauseContext $context);

	/**
	 * Visit a parse tree produced by {@see GolampiParser::breakStmt()}.
	 *
	 * @param Context\BreakStmtContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitBreakStmt(Context\BreakStmtContext $context);

	/**
	 * Visit a parse tree produced by {@see GolampiParser::continueStmt()}.
	 *
	 * @param Context\ContinueStmtContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitContinueStmt(Context\ContinueStmtContext $context);

	/**
	 * Visit a parse tree produced by {@see GolampiParser::incDecStmt()}.
	 *
	 * @param Context\IncDecStmtContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitIncDecStmt(Context\IncDecStmtContext $context);

	/**
	 * Visit a parse tree produced by {@see GolampiParser::returnStmt()}.
	 *
	 * @param Context\ReturnStmtContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitReturnStmt(Context\ReturnStmtContext $context);

	/**
	 * Visit a parse tree produced by {@see GolampiParser::functionCall()}.
	 *
	 * @param Context\FunctionCallContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitFunctionCall(Context\FunctionCallContext $context);

	/**
	 * Visit a parse tree produced by {@see GolampiParser::qualifiedName()}.
	 *
	 * @param Context\QualifiedNameContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitQualifiedName(Context\QualifiedNameContext $context);

	/**
	 * Visit a parse tree produced by {@see GolampiParser::argList()}.
	 *
	 * @param Context\ArgListContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitArgList(Context\ArgListContext $context);

	/**
	 * Visit a parse tree produced by {@see GolampiParser::argItem()}.
	 *
	 * @param Context\ArgItemContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitArgItem(Context\ArgItemContext $context);

	/**
	 * Visit a parse tree produced by {@see GolampiParser::expression()}.
	 *
	 * @param Context\ExpressionContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitExpression(Context\ExpressionContext $context);

	/**
	 * Visit a parse tree produced by {@see GolampiParser::logicalOr()}.
	 *
	 * @param Context\LogicalOrContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitLogicalOr(Context\LogicalOrContext $context);

	/**
	 * Visit a parse tree produced by {@see GolampiParser::logicalAnd()}.
	 *
	 * @param Context\LogicalAndContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitLogicalAnd(Context\LogicalAndContext $context);

	/**
	 * Visit a parse tree produced by {@see GolampiParser::equality()}.
	 *
	 * @param Context\EqualityContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitEquality(Context\EqualityContext $context);

	/**
	 * Visit a parse tree produced by {@see GolampiParser::comparison()}.
	 *
	 * @param Context\ComparisonContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitComparison(Context\ComparisonContext $context);

	/**
	 * Visit a parse tree produced by {@see GolampiParser::term()}.
	 *
	 * @param Context\TermContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitTerm(Context\TermContext $context);

	/**
	 * Visit a parse tree produced by {@see GolampiParser::factor()}.
	 *
	 * @param Context\FactorContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitFactor(Context\FactorContext $context);

	/**
	 * Visit a parse tree produced by {@see GolampiParser::unary()}.
	 *
	 * @param Context\UnaryContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitUnary(Context\UnaryContext $context);

	/**
	 * Visit a parse tree produced by {@see GolampiParser::primary()}.
	 *
	 * @param Context\PrimaryContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitPrimary(Context\PrimaryContext $context);

	/**
	 * Visit a parse tree produced by {@see GolampiParser::typeCast()}.
	 *
	 * @param Context\TypeCastContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitTypeCast(Context\TypeCastContext $context);

	/**
	 * Visit a parse tree produced by {@see GolampiParser::type()}.
	 *
	 * @param Context\TypeContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitType(Context\TypeContext $context);
}