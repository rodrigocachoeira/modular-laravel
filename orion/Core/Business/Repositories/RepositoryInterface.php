<?php

namespace Orion\Core\Business\Repositories;

/**
* Interface de gerenciamento de metodos
* para interacao com o banco de dados
*
* @author Rodrigo Cachoeira
*
*
*/
interface RepositoryInterface
{

  /**
  * Retorna todos os registros
  * de uma determinada tabela no banco de dados
  * em forma de collections permitindo filtro
  * nas colunas de busca
  *
  * @param Array $columns
  *
  * @return Collection
  */
  public function get ($columns = ['*']);

  /**
  * Retorna todos os registros de
  * uma determinada tabela no banco de dados
  * em forma de collection
  *
  * @return Collection
  */
  public function all ();

  /**
  * Retorna um registro único
  * da entidade em questao com
  * base no seu identificador
  *
  * @param number $id
  * @param Array $columns
  *
  * @return Collection
  */
  public function getById ($id, $columns = ['*']);

  /**
  * Retorna os registros de acordo
  * com o valores de filtro
  *
  * @param String $field
  * @param String $value
  *
  * @return Collection
  */
  public function getByField($field, $value);

  /**
  * Retorna os registros de forma
  * ordenada descrescente de acordo com
  * a coluna informada como parametro, esta sendo
  * como padrao ID
  *
  * @param String $id
  *
  * @return Collection
  */
  public function latest ($order = 'id');

  /**
  * Retorna o primeiro registro encontrado
  * na tabela especificada
  *
  * @return Object | null
  */
  public function first ();

  /**
  * Retorna o ultimo registro encontrado
  * na tabela especificada
  *
  * @return Object | null
  */
  public function last ();

  /**
  * Aplica uma condicional na query
  * de selecao atual
  *
  * @param String $column
  * @param String $value
  *
  * @param self instance
  **/
  public function where ($column, $value);

}
