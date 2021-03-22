<?php
namespace Eduardokum\LaravelBoleto\Contracts\Cnab\Retorno\Cnab400;

interface Trailer
{
    /**
     * @return mixed
     */
    public function getValorTitulos();

    /**
     * @return mixed
     */
    public function getAvisos();

    /**
     * @return mixed
     */
    public function getQuantidadeTitulos();

    /**
     * @return mixed
     */
    public function getQuantidadeLiquidados();

    /**
     * @return mixed
     */
    public function getQuantidadeConfirmacaoInstrucaoProtestos();

    /**
     * @return mixed
     */
    public function getQuantidadeBaixados();

    /**
     * @return mixed
     */
    public function getQuantidadeEntradas();

    /**
     * @return mixed
     */
    public function getQuantidadeAlterados();

    /**
     * @return mixed
     */
    public function getQuantidadeEmCarteira();

    /**
     * @return mixed
     */
    public function getQuantidadeErros();

    /**
     * @return mixed
     */
    public function getValorEntradas();

    /**
     * @return mixed
     */
    public function getValorLiquidados();

    /**
     * @return mixed
     */
    public function getValorConfirmacaoInstrucaoProtestos();

    /**
     * @return mixed
     */
    public function getValorBaixados();

    /**
     * @return mixed
     */
    public function getValorAlterados();

    /**
     * @return mixed
     */
    public function getValorEmCarteira();

    /**
     * @return array
     */
    public function toArray();
}
