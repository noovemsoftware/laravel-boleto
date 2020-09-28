<?php
namespace Eduardokum\LaravelBoleto\Cnab\Retorno\Cnab400;

use Eduardokum\LaravelBoleto\Contracts\Cnab\Retorno\Cnab400\Trailer as TrailerContract;
use Eduardokum\LaravelBoleto\MagicTrait;

class Trailer implements TrailerContract
{
    use MagicTrait;

    /**
     * @var float
     */
    protected $valorTitulos = 0;

    /**
     * @var int
     */
    protected $quantidadeTitulos = 0;

    /**
     * @var int
     */
    protected $avisos = 0;

    /**
     * @var int
     */
    protected $quantidadeLiquidados = 0;

    /**
     * @var int
     */
    protected $valorLiquidados = 0;


    /**
     * @var int
     */
    protected $quantidadeBaixados = 0;

    /**
     * @var int
     */
    protected $valorBaixados = 0;

    /**
     * @var int
     */
    protected $quantidadeEntradas = 0;

    /**
     * @var int
     */
    protected $quantidadeAlterados = 0;

    /**
     * @var int
     */
    protected $valorAlterados = 0;

    /**
     * @var int
     */
    protected $quantidadeErros = 0;

    /**
     * @var int
     */
    protected $quantidadeAbatimentosConcedidos = 0;

    /**
     * @var int
     */
    protected $valorAbatimentosConcedidos = 0;

    /**
     * @var int
     */
    protected $quantidadeAbatimentosCancelados = 0;

    /**
     * @var int
     */
    protected $valorAbatimentosCancelados = 0;

    /**
     * @var int
     */
    protected $quantidadeConfirmacaoInstrucaoProtestos = 0;

    /**
     * @var int
     */
    protected $valorConfirmacaoInstrucaoProtestos = 0;

    /**
     * @var int
     */
    protected $quantidadeRateiosEfetuados = 0;

    /**
     * @var int
     */
    protected $valorRateiosEfetuados = 0;

    /**
     * @return int
     */
    public function getQuantidadeTitulos()
    {
        return $this->quantidadeTitulos;
    }

    /**
     * @param int $quantidade
     *
     * @return Trailer
     */
    public function setQuantidadeTitulos($quantidade)
    {
        $this->quantidadeTitulos = $quantidade;

        return $this;
    }

    /**
     * @return float
     */
    public function getValorTitulos()
    {
        return $this->valorTitulos;
    }

    /**
     * @param float $valor
     *
     * @return Trailer
     */
    public function setValorTitulos($valor)
    {
        $this->valorTitulos = $valor;

        return $this;
    }

    /**
     * @return int
     */
    public function getAvisos()
    {
        return $this->avisos;
    }

    /**
     * @param int $avisos
     *
     * @return Trailer
     */
    public function setAvisos($avisos)
    {
        $this->avisos = $avisos;

        return $this;
    }



    /**
     * @return int
     */
    public function getQuantidadeLiquidados()
    {
        return $this->quantidadeLiquidados;
    }

    /**
     * @param int $quantidadeLiquidados
     *
     * @return Trailer
     */
    public function setQuantidadeLiquidados($quantidadeLiquidados)
    {
        $this->quantidadeLiquidados = $quantidadeLiquidados;

        return $this;
    }

    /**
     * @param int $valorLiquidados
     *
     * @return Trailer
     */
    public function setValorLiquidados($valorLiquidados)
    {
      $this->valorLiquidados = $valorLiquidados;

      return $this;
    }

    /**
     * @return int
     */
    public function getValorLiquidados()
    {
      return $this->valorLiquidados;
    }

    /**
     * @return int
     */
    public function getQuantidadeBaixados()
    {
        return $this->quantidadeBaixados;
    }

    /**
     * @param int $quantidadeBaixados
     *
     * @return Trailer
     */
    public function setQuantidadeBaixados($quantidadeBaixados)
    {
        $this->quantidadeBaixados = $quantidadeBaixados;

        return $this;
    }

    /**
     * @return int
     */
    public function getValorBaixados()
    {
        return $this->valorBaixados;
    }

    /**
     * @param int $quantidadeBaixados
     *
     * @return Trailer
     */
    public function setValorBaixados($valorBaixados)
    {
        $this->valorBaixados = $valorBaixados;

        return $this;
    }

    /**
     * @return int
     */
    public function getQuantidadeEntradas()
    {
        return $this->quantidadeEntradas;
    }

    /**
     * @param int $quantidadeEntradas
     *
     * @return Trailer
     */
    public function setQuantidadeEntradas($quantidadeEntradas)
    {
        $this->quantidadeEntradas = $quantidadeEntradas;

        return $this;
    }

    /**
     * @return int
     */
    public function getValorEntradas()
    {
        return $this->valorEntradas;
    }

    /**
     * @param int $quantidade
     *
     * @return Trailer
     */
    public function setValorEntradas($valor)
    {
        $this->valorEntradas = $valor;

        return $this;
    }

    /**
     * @return int
     */
    public function getQuantidadeAlterados()
    {
        return $this->quantidadeAlterados;
    }

    /**
     * @param int $quantidade
     *
     * @return Trailer
     */
    public function setQuantidadeAlterados($quantidade)
    {
        $this->quantidadeAlterados = $quantidade;

        return $this;
    }

    /**
     * @return int
     */
    public function getValorAlterados()
    {
        return $this->valorAlterados;
    }

    /**
     * @param int $quantidade
     *
     * @return Trailer
     */
    public function setValorAlterados($quantidade)
    {
        $this->valorAlterados = $quantidade;

        return $this;
    }

    /**
     * @return int
     */
    public function getQuantidadeErros()
    {
        return $this->quantidadeErros;
    }

    /**
     * @param int $quantidade
     *
     * @return Trailer
     */
    public function setQuantidadeErros($quantidade)
    {
        $this->quantidadeErros = $quantidade;

        return $this;
    }

    /**
     * @param int $quantidade
     *
     * @return Trailer
     */
    public function setQuantidadeAbatimentosConcedidos($quantidade)
    {
      $this->quantidadeAbatimentosConcedidos = $quantidade;
      return $this;
    }

    /**
     * @return int
     */
    public function getQuantidadeAbatimentosConcedidos()
    {
      return $this->quantidadeAbatimentosConcedidos;
    }

    /**
     * @param int $valor
     *
     * @return Trailer
     */
    public function setValorAbatimentosConcedidos($valor)
    {
      $this->valorAbatimentosConcedidos = $valor;
      return $this;
    }

    /**
     * @return int
     */
    public function getValorAbatimentosConcedidos()
    {
      return $this->valorAbatimentosConcedidos;
    }

    /**
     * @param int $quantidade
     *
     * @return Trailer
     */
    public function setQuantidadeAbatimentosCancelados($quantidade)
    {
      $this->quantidadeAbatimentosCancelados = $quantidade;
      return $this;
    }

    /**
     * @return int
     */
    public function getQuantidadeAbatimentosCancelados()
    {
      return $this->quantidadeAbatimentosCancelados;
    }

    /**
     * @param int $valor
     *
     * @return Trailer
     */
    public function setValorAbatimentosCancelados($valor)
    {
      $this->valorAbatimentosCancelados = $valor;
      return $this;
    }

    /**
     * @return int
     */
    public function getValorAbatimentosCancelados()
    {
      return $this->valorAbatimentosCancelados;
    }

    /**
     * @param int $quantidade
     *
     * @return Trailer
     */
    public function setQuantidadeConfirmacaoInstrucaoProtestos($quantidade)
    {
      $this->quantidadeConfirmacaoInstrucaoProtestos = $quantidade;
      return $this;
    }

    /**
     * @return int
     */
    public function getQuantidadeConfirmacaoInstrucaoProtestos()
    {
      return $this->quantidadeConfirmacaoInstrucaoProtestos;
    }

    /**
     * @param int $valor
     *
     * @return Trailer
     */
    public function setValorConfirmacaoInstrucaoProtestos($valor)
    {
      $this->valorConfirmacaoInstrucaoProtestos = $valor;
      return $this;
    }

    /**
     * @return int
     */
    public function getValorConfirmacaoInstrucaoProtestos()
    {
      return $this->valorConfirmacaoInstrucaoProtestos;
    }

    /**
     * @param int $quantidade
     *
     * @return Trailer
     */
    public function setQuantidadeRateiosEfetuados($quantidade)
    {
      $this->quantidadeRateiosEfetuados = $quantidade;
      return $this;
    }

    /**
     * @return int
     */
    public function getQuantidadeRateiosEfetuados()
    {
      return $this->quantidadeRateiosEfetuados;
    }

    /**
     * @param int $valor
     *
     * @return Trailer
     */
    public function setValorRateiosEfetuados($valor)
    {
      $this->valorRateiosEfetuados = $valor;
      return $this;
    }

    /**
     * @return int
     */
    public function getValorRateiosEfetuados()
    {
      return $this->valorRateiosEfetuados;
    }

}
