<?php
interface DAO {
	function valida($bean);
	function insere(&$bean);
	function lista();
	function edita($bean);
	function apaga($id);
	function getById($id);
}