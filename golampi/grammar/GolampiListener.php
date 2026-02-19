<?php

/*
 * Generated from Golampi.g4 by ANTLR 4.13.1
 */

use Antlr\Antlr4\Runtime\Tree\ParseTreeListener;

/**
 * This interface defines a complete listener for a parse tree produced by
 * {@see GolampiParser}.
 */
interface GolampiListener extends ParseTreeListener {
	/**
	 * Enter a parse tree produced by {@see GolampiParser::program()}.
	 * @param $context The parse tree.
	 */
	public function enterProgram(Context\ProgramContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::program()}.
	 * @param $context The parse tree.
	 */
	public function exitProgram(Context\ProgramContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::functionDecl()}.
	 * @param $context The parse tree.
	 */
	public function enterFunctionDecl(Context\FunctionDeclContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::functionDecl()}.
	 * @param $context The parse tree.
	 */
	public function exitFunctionDecl(Context\FunctionDeclContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::paramList()}.
	 * @param $context The parse tree.
	 */
	public function enterParamList(Context\ParamListContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::paramList()}.
	 * @param $context The parse tree.
	 */
	public function exitParamList(Context\ParamListContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::param()}.
	 * @param $context The parse tree.
	 */
	public function enterParam(Context\ParamContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::param()}.
	 * @param $context The parse tree.
	 */
	public function exitParam(Context\ParamContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::returnType()}.
	 * @param $context The parse tree.
	 */
	public function enterReturnType(Context\ReturnTypeContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::returnType()}.
	 * @param $context The parse tree.
	 */
	public function exitReturnType(Context\ReturnTypeContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::block()}.
	 * @param $context The parse tree.
	 */
	public function enterBlock(Context\BlockContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::block()}.
	 * @param $context The parse tree.
	 */
	public function exitBlock(Context\BlockContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::statement()}.
	 * @param $context The parse tree.
	 */
	public function enterStatement(Context\StatementContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::statement()}.
	 * @param $context The parse tree.
	 */
	public function exitStatement(Context\StatementContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::varDecl()}.
	 * @param $context The parse tree.
	 */
	public function enterVarDecl(Context\VarDeclContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::varDecl()}.
	 * @param $context The parse tree.
	 */
	public function exitVarDecl(Context\VarDeclContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::varShortDecl()}.
	 * @param $context The parse tree.
	 */
	public function enterVarShortDecl(Context\VarShortDeclContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::varShortDecl()}.
	 * @param $context The parse tree.
	 */
	public function exitVarShortDecl(Context\VarShortDeclContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::idList()}.
	 * @param $context The parse tree.
	 */
	public function enterIdList(Context\IdListContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::idList()}.
	 * @param $context The parse tree.
	 */
	public function exitIdList(Context\IdListContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::expList()}.
	 * @param $context The parse tree.
	 */
	public function enterExpList(Context\ExpListContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::expList()}.
	 * @param $context The parse tree.
	 */
	public function exitExpList(Context\ExpListContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::assignment()}.
	 * @param $context The parse tree.
	 */
	public function enterAssignment(Context\AssignmentContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::assignment()}.
	 * @param $context The parse tree.
	 */
	public function exitAssignment(Context\AssignmentContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::ifStmt()}.
	 * @param $context The parse tree.
	 */
	public function enterIfStmt(Context\IfStmtContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::ifStmt()}.
	 * @param $context The parse tree.
	 */
	public function exitIfStmt(Context\IfStmtContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::forStmt()}.
	 * @param $context The parse tree.
	 */
	public function enterForStmt(Context\ForStmtContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::forStmt()}.
	 * @param $context The parse tree.
	 */
	public function exitForStmt(Context\ForStmtContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::forInit()}.
	 * @param $context The parse tree.
	 */
	public function enterForInit(Context\ForInitContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::forInit()}.
	 * @param $context The parse tree.
	 */
	public function exitForInit(Context\ForInitContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::forPost()}.
	 * @param $context The parse tree.
	 */
	public function enterForPost(Context\ForPostContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::forPost()}.
	 * @param $context The parse tree.
	 */
	public function exitForPost(Context\ForPostContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::switchStmt()}.
	 * @param $context The parse tree.
	 */
	public function enterSwitchStmt(Context\SwitchStmtContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::switchStmt()}.
	 * @param $context The parse tree.
	 */
	public function exitSwitchStmt(Context\SwitchStmtContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::caseClause()}.
	 * @param $context The parse tree.
	 */
	public function enterCaseClause(Context\CaseClauseContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::caseClause()}.
	 * @param $context The parse tree.
	 */
	public function exitCaseClause(Context\CaseClauseContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::defaultClause()}.
	 * @param $context The parse tree.
	 */
	public function enterDefaultClause(Context\DefaultClauseContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::defaultClause()}.
	 * @param $context The parse tree.
	 */
	public function exitDefaultClause(Context\DefaultClauseContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::breakStmt()}.
	 * @param $context The parse tree.
	 */
	public function enterBreakStmt(Context\BreakStmtContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::breakStmt()}.
	 * @param $context The parse tree.
	 */
	public function exitBreakStmt(Context\BreakStmtContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::continueStmt()}.
	 * @param $context The parse tree.
	 */
	public function enterContinueStmt(Context\ContinueStmtContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::continueStmt()}.
	 * @param $context The parse tree.
	 */
	public function exitContinueStmt(Context\ContinueStmtContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::returnStmt()}.
	 * @param $context The parse tree.
	 */
	public function enterReturnStmt(Context\ReturnStmtContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::returnStmt()}.
	 * @param $context The parse tree.
	 */
	public function exitReturnStmt(Context\ReturnStmtContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::functionCall()}.
	 * @param $context The parse tree.
	 */
	public function enterFunctionCall(Context\FunctionCallContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::functionCall()}.
	 * @param $context The parse tree.
	 */
	public function exitFunctionCall(Context\FunctionCallContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::qualifiedName()}.
	 * @param $context The parse tree.
	 */
	public function enterQualifiedName(Context\QualifiedNameContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::qualifiedName()}.
	 * @param $context The parse tree.
	 */
	public function exitQualifiedName(Context\QualifiedNameContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::argList()}.
	 * @param $context The parse tree.
	 */
	public function enterArgList(Context\ArgListContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::argList()}.
	 * @param $context The parse tree.
	 */
	public function exitArgList(Context\ArgListContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::expression()}.
	 * @param $context The parse tree.
	 */
	public function enterExpression(Context\ExpressionContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::expression()}.
	 * @param $context The parse tree.
	 */
	public function exitExpression(Context\ExpressionContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::type()}.
	 * @param $context The parse tree.
	 */
	public function enterType(Context\TypeContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::type()}.
	 * @param $context The parse tree.
	 */
	public function exitType(Context\TypeContext $context): void;
}