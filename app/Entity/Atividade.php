<?php

namespace App\Entity;

use \App\Db\Database;
use \PDO;

class Atividade{

  /**
   * Id da Atividade
   * @var integer
   */
  public $id;

  /**
   * Título da atividade
   * @var string
   */
  public $titulo;

  /**
   * Descrição da atividade (pode conter html)
   * @var string
   */
  public $descricao;

  /**
   * Define se a atividade está completa ou não
   * @var string(s/n)
   */
  public $ativo;

  /**
   * Data de publicação da atividade
   * @var string
   */
  public $data;

  /**
   * Cadastra uma nova atividade no banco
   * @return boolean
   */
  public function cadastrar(){
    //DEFINE A DATA
    date_default_timezone_set('America/Sao_Paulo');
    $this->data = date('Y-m-d H:i:s');

    //INSERIR A ATIVIDADE NO BANCO
    $obDatabase = new Database('atividades');
    $this->id = $obDatabase->insert([
                                      'titulo'    => $this->titulo,
                                      'descricao' => $this->descricao,
                                      'ativo'     => $this->ativo,
                                      'data'      => $this->data
                                    ]);

    //RETORNAR SUCESSO
    return true;
  }

  /**
   * Atualiza a atividade no banco
   * @return boolean
   */
  public function atualizar(){
    return (new Database('atividades'))->update('id = '.$this->id,[
                                                                'titulo'    => $this->titulo,
                                                                'descricao' => $this->descricao,
                                                                'ativo'     => $this->ativo,
                                                                'data'      => $this->data
                                                              ]);
  }

  /**
   * Exclui a atividade do banco
   * @return boolean
   */
  public function excluir(){
    return (new Database('atividades'))->delete('id = '.$this->id);
  }

  /**
   * Obetem as atividades do banco de dados
   * @param  string $where
   * @param  string $order
   * @param  string $limit
   * @return array
   */
  public static function getAtividades($where = null, $order = null, $limit = null){
    return (new Database('atividades'))->select($where,$order,$limit)
                                  ->fetchAll(PDO::FETCH_CLASS,self::class);
  }

  /**
   * Busca uma Atividade pelo ID
   * @param  integer $id
   * @return Atividade
   */
  public static function getAtividade($id){
    return (new Database('atividades'))->select('id = '.$id)
                                  ->fetchObject(self::class);
  }

}