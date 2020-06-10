<?php

class Cliente
{

  var $nome;
  var $cpf_cnpj;
  var $telefone;
  var $email;
  var $cep;
  var $endereco;
  var $bairro;
  var $numero;
  var $cidade;
  var $uf;

  function __construct(
    $nome,
    $cpf_cnpj,
    $telefone,
    $email,
    $cep,
    $endereco,
    $bairro,
    $numero,
    $cidade,
    $uf
  ) {
    // validacoes
    if (!$this->cepValido($cep)) {
        throw new \Exception("CEP não valido");
    }
    $this->nome = $nome;
    $this->cpf_cnpj = $cpf_cnpj;
    $this->telefone = $telefone;
    $this->email = $email;
    $this->cep = $cep;
    $this->endereco = $endereco;
    $this->bairro = $bairro;
    $this->numero = $numero;
    $this->cidade = $cidade;
    $this->uf = $uf;
  }

  function cepValido($cep) {
    if (strlen($cep) != 10) {
        return false;
    }

    // template cep -> 44.123-55
    $regex_cep = "/[0-9]{2}\.[0-9]{3}\-[0-9]{2}/";
    return preg_match($regex_cep, $cep);
  }
}
