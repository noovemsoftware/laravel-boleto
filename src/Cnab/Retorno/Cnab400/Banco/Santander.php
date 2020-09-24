<?php
namespace Eduardokum\LaravelBoleto\Cnab\Retorno\Cnab400\Banco;

use Eduardokum\LaravelBoleto\Cnab\Retorno\Cnab400\AbstractRetorno;
use Eduardokum\LaravelBoleto\Contracts\Boleto\Boleto as BoletoContract;
use Eduardokum\LaravelBoleto\Contracts\Cnab\RetornoCnab400;
use Eduardokum\LaravelBoleto\Util;
use Illuminate\Support\Arr;

class Santander extends AbstractRetorno implements RetornoCnab400
{
    /**
     * Código do banco
     *
     * @var string
     */
    protected $codigoBanco = BoletoContract::COD_BANCO_SANTANDER;

    /**
     * Array com as ocorrencias do banco;
     *
     * @var array
     */
    private $ocorrencias = [
        '01' => 'Título não existe',
        '02' => 'Entrada Título Confirmada',
        '03' => 'Entrada Título Rejeitada',
        '06' => 'Liquidação',
        '07' => 'Liquidação por Conta',
        '08' => 'Liquidação por Saldo',
        '09' => 'Baixa Automática',
        '10' => 'Título Baixado Conforme Instrução',
        '11' => 'Títulos em carteira (em ser)',
        '12' => 'Abatimento Concedido',
        '13' => 'Abatimento Cancelado',
        '14' => 'Alteração de Vencimento',
        '15' => 'Confirmação de Protesto',
        '16' => 'Título Baixado/Liquidado',
        '17' => 'Liquidado em Cartório',
        '21' => 'Título Enviado a Cartório',
        '22' => 'Título Retirado do Cartório',
        '24' => 'Custas de Cartório',
        '25' => 'Protestar Título',
        '26' => 'Sustar Protesto',
        '35' => 'Título DDA Reconhecido pelo Pagador',
        '36' => 'Título DDA Não Reconhecido pelo Pagador',
        '37' => 'Título DDA Recusado pela CIP',
        '38' => 'Não Protestar',
        '39' => 'Espécie de Título Não Permite a Instrução',
        '61' => 'Confirmação de Alteração do Valor Nominal do Título',
        '62' => 'Confirmação de Alteração do Valor ou Percentual mínimo',
        '63' => 'Confirmação de Alteração do Valor ou Percentual máximo',
        '93' => 'Baixa Operacional Enviado pela CIP',
        '94' => 'Cancelamento da Baixa Operacional Enviado pela CIP'
    ];

    /**
     * Array com as possiveis rejeicoes do banco.
     *
     * @var array
     */
    private $rejeicoes = [
        '01004' => 'Conta cobranca nao numerica',
        '01006' => 'Codigo da carteira invalido',
        '01017' => 'Codigo da agencia cobradora nao numerica',
        '01042' => 'Conta cobranca invalida',
        '01091' => 'Tipo/numero de inscrição do pagador invalido',
        '01092' => 'Nosso numero ja cadastrado',
        '01095' => 'Perfil nao aceita valor titulo zerado',
        '01110' => 'Data primeiro desconto invalida',
        '01142' => 'Num. Ag. Cedente/dig. Nao numerico',
        '01143' => 'Num. Conta cedente/dig. Nao numerico',
        '01145' => 'Tipo de documento invalido',
        '01371' => 'Titulo rejeitado - operacao de desconto',
        '01372' => 'Tit. Rejeitado - horario limite op desconto',
        '01373' => 'Quantidade pagtos possiveis inválido',
        '01378' => 'Tipo de valor inválido',
        '01379' => 'Valor maximo invalido',
        '01380' => 'Percentual maximo invalido',
        '01381' => 'Valor mínimo invalido',
        '01382' => 'Percentual mínimo invalido',
        '01384' => 'Valor nominal incompativel com o tipo de pagamento',
        '01385' => 'Valor nominal incompativel com espécie',
        '01388' => 'Tipo de pagamento não numérico',
        '01389' => 'Tipo de pagamento inválido',
        '01390' => 'Quantidade pagtos possiveis não numérico',
        '02010' => 'Codigo primeira instrucao nao numerica',
        '02011' => 'Codigo segunda instrucao nao numerica',
        '02019' => 'Numero do cep nao numerico',
        '02031' => 'Instrução recusada pelo sistema de garantias',
        '02038' => 'Movimento excluido por solicitacao',
        '02059' => 'Instrução nao permitida p/ tipo de carteira',
        '02065' => 'Pedido sustacao ja solicitado',
        '02067' => 'Cliente nao transmite reg. De ocorrencia',
        '02077' => 'Desc. Por antec. Maior/igual vlr titulo',
        '02125' => 'Complemento da instrucao nao numerico',
        '02374' => 'Valor nominal maior que valor máximo',
        '02375' => 'Valor nominal menor que valor mínimo',
        '02378' => 'Tipo de valor inválido',
        '02379' => 'Valor maximo invalido',
        '02380' => 'Percentual maximo invalido',
        '02381' => 'Valor mínimo invalido',
        '02382' => 'Percentual mínimo invalido',
        '02383' => 'Instrução exige registro tipo 8',
        '02385' => 'Valor nominal incompativel com a espécie',
        '02391' => 'Instrução não permitida p/ título com reserva',
        '03000' => 'Pagamento parcial',
        '04039' => 'Perfil nao aceita titulo em bco corresp',
        '04040' => 'Cobr rapida nao aceita-se bco corresp',
        '04059' => 'Instrucao aceita so p/ cobranca simples',
        '04069' => 'Produto diferente de cobranca simples',
        '04170' => 'Forma de cadastramento 2 inv. p. cart. 5',
        '04201' => 'Alt. do contr. participante invalido',
        '05070' => 'Data prorrogacao menor oue data vencto',
        '05071' => 'Data antecipacao maior oue data vencto',
        '05072' => 'Data documento superior a data instrucao',
        '05088' => 'Data instrucao invalida',
        '06018' => 'Valor do iof nao numerico',
        '07026' => 'Codigo banco cobrador invalido',
        '07041' => 'Agencia cobradora nao encontrada',
        '08130' => 'Forma de cadastramento nao numerica',
        '08131' => 'Forma de cadastramento invalida',
        '08132' => 'Forma cadast. 2 invalida para carteira 3',
        '08133' => 'Forma cadast. 2 invalida para carteira 4',
        '09136' => 'Codigo bco na compensacao nao numerico',
        '09137' => 'Codigo bco na compensacao invalido',
        '10140' => 'Cod. Seq.Do reg. Detalhe invalido',
        '10141' => 'Num. Seq. Reg. Do lote nao numerico',
        '11138' => 'Num. Lote remessa(detalhe) nao numerico',
        '11139' => 'Tipo de registro invalido',
        '11164' => 'Numero do plano nao numerico',
        '12202' => 'Alt. Do seu numero invalida',
        '26022' => 'Codigo ocorrencia invalido',
        '26134' => 'Codigo do mov. Remessa nao numerico',
        '28001' => 'Nosso numero nao numerico',
        '28050' => 'Numero do titulo igual a zero',
        '28051' => 'Titulo nao encontrado',
        '28099' => 'Registro duplicado no movimento diario',
        '31005' => 'Codigo da carteira nao numerico',
        '31006' => 'Codigo da carteira invalido',
        '32003' => 'Data vencimento nao numerica',
        '32016' => 'Data de vencimento invalida',
        '32030' => 'Dt venc menor de 15 dias da dt proces',
        '32068' => 'Tipo de vencimento invalido',
        '34012' => 'Valor do titulo em outra unidade',
        '34013' => 'Valor do titulo nao numerico',
        '34093' => 'Valor do titulo nao informado',
        '34094' => 'Valor tit. Em outra moeda nao informado',
        '34095' => 'Perfil nao aceita valor titulo zerado',
        '36007' => 'Especie do documento invalida',
        '36060' => 'Especie documento nao protestavel',
        '36097' => 'Especie docto nao permite iof zerado',
        '36129' => 'Espec de documento nao numerica',
        '36144' => 'Tipo de documento nao numerico',
        '39015' => 'Data emissao nao numerica',
        '39098' => 'Data emissao invalida',
        '39100' => 'Data emissao maior oue a data vencimento',
        '41149' => 'Codigo de mora invalido',
        '41150' => 'Codigo de mora nao numerico',
        '42014' => 'Valor de mora nao numerico',
        '42029' => 'valor de mora invalido',
        '42109' => 'valor mora tem oue ser zero (tit = zero)',
        '42151' => 'Vl. mora igual a zeros p. cod. mora 1',
        '42152' => 'Vl. taxa mora igual a zeros p. cod mora 2',
        '42153' => 'Vl. mora diferente de zeros p. cod. mora 3',
        '42154' => 'Vl. mora nao numerico p. cod mora 2',
        '42155' => 'Vl. mora invalido p. cod. mora 4',
        '44086' => 'Data segundo desconto invalida',
        '44087' => 'Data terceiro desconto invalida',
        '44111' => 'Data desconto nao numerica',
        '45025' => 'Valor desconto nao numerico',
        '45074' => 'Prim. Desgonto maior/igual valor titulo',
        '45075' => 'Seg. Desconto maior/igual valor titulo',
        '45076' => 'Terc. Desconto maior/igual valor titulo',
        '45077' => 'Desc. Por antec. Maior/igual vlr titulo',
        '45079' => 'Nao existe prim. Desconto p/ cancelar',
        '45080' => 'Nao existe seg. Desconto p/ cancelar',
        '45081' => 'Nao existe terc. Desconto p/ cancelar',
        '45082' => 'Nao existe desc. Por antec. P/ cancelar',
        '45090' => 'Ja existe desconto por dia antecipacao',
        '45112' => 'Valor desconto nao informado',
        '45113' => 'Valor desconto invalido',
        '46122' => 'Valor iof maior oue valor titulo',
        '47002' => 'Valor do abatimento nao numerico',
        '47114' => 'Valor abatimento nao informado',
        '48128' => 'Codigo protesto invalido',
        '48146' => 'Codigo p. Protesto nao numerico',
        '49046' => 'Qtd de dias protesto nao preenchido',
        '49147' => 'Qtde de dias p. protesto invalido',
        '49148' => 'Qtde de dias p. protesto nao numerico',
        '52045' => 'Qtd de dias de baixa nao preenchido',
        '52156' => 'Qtde dias p. baixa/devol. nao numerico',
        '52157' => 'Qtde dias baixa/dev. invalido p. cod. 1',
        '52158' => 'Qtde dias baixa/dev. invalido p. cod. 2',
        '52159' => 'Qtde dias baixa/dev. invalido p. cod. 3',
        '53008' => 'Unidade de valor nao numerica',
        '53009' => 'Unidade de valor invalida',
        '55024' => 'Total parcela nao numerico',
        '55027' => 'Numero parcelas carne nao numerico',
        '55028' => 'Numero parcelas carne zerado',
        '55047' => 'Tot parc. inf. iao bate cl otd parc ger',
        '55048' => 'Carne com parcelas com erro',
        '55049' => 'Seu numero nao confere com o carne',
        '55162' => 'Indicador de carne nao numerico',
        '55163' => 'Num. Total de parc.Carne nao numerico',
        '55165' => 'Indicador de parcelas carne invalido',
        '55168' => 'N. tot. parc. inv. p. indic. maior zeros',
        '55169' => 'Num. tot. parc. inv. p. indic. difer. zeros',
        '57166' => 'N. seo. parcela inv. p. indic. maior 0',
        '57167' => 'N. seo. parcela inv. p. indic. dif. zeros',
        '59020' => 'Tipo inscricao nao numerico',
        '59021' => 'Numero do cnpj ou cpf nao numerico',
        '59058' => 'Cnpj/cpf incorreto',
        '59105' => 'Tipo inscricao nao existe',
        '59106' => 'Cnpj/cpf nao informado',
        '59108' => 'Digito cnpj/cpf incorreto',
        '61101' => 'Nome do sacado nao informado',
        '62019' => 'Numero do cep nao numerico',
        '62057' => 'Cep do sacado incorreto',
        '62063' => 'Cep nao encontrado na tabela de pracas',
        '62123' => 'Cep do sacado nao numerico',
        '62124' => 'Cep sacado nao encontrado',
        '63102' => 'Endereco do sacado nao informado',
        '63160' => 'bairro do sacado nao informado',
        '64103' => 'Municipio do sacado nao informado',
        '65104' => 'Unidade da federacao nao informada',
        '65107' => 'Unidade da federacao',
        '65108' => 'Digito cnpj/cpf incorreto',
        '66161' => 'Tipo insc. cpf/cnpj sacador/aval. nao num.',
        '66199' => 'Tipo insc. cnpj/cpf sacador. aval. inval.',
        '67200' => 'Num. insc. (cnpj) sacador/aval. nao numerico',
        '71084' => 'Ja existe segundo desconto',
        '74085' => 'Ja existe terceiro desconto',
        '76089' => 'Data multa menor/igual oue vencimento',
        '76116' => 'Data multa nao numerica',
        '76118' => 'Data multa nao informada',
        '76119' => 'Data multa maior oue data de vencimento',
        '77083' => 'Nao existe multa por atraso p/ cancelar',
        '77120' => 'Percentual multa nao numerico',
        '77121' => 'Percentual multa nao informado',
        '80053' => 'Ocor. nao acatada, titulo baixado',
        '81052' => 'Ocor. nao acatada, titulo liquidado',
        '84056' => 'Ocor. nao acatada, tit. nao vencido',
        '89062' => 'Sacado nao protestavel',
        '90073' => 'Abatimento maior/igual ao valor titulo',
        '90115' => 'Valor abatimento maior valor titulo',
        '91117' => 'Valor desconto maior valor titulo',
        '92078' => 'Nao existe abatimento p/ cancelar',
        '93043' => 'Nao baixar, compl. informado invalido',
        '94044' => 'Nao protestar, compl. informado invalido',
        '94054' => 'Titulo com ordem de protesto ja emitida',
        '94055' => 'Ocor. nao acatada, titulo ja protestado',
        '94061' => 'Cedente sem carta de protesto',
        '94064' => 'Tipo de cobranca nao permite protesto',
        '94066' => 'Sustacao protesto fora de prazo',
        '94096' => 'Especie docto nao permite protesto'
    ];

    /**
     * Roda antes dos metodos de processar
     */
    protected function init()
    {
        $this->totais = [
            'valor_recebido' => 0,
            'liquidados' => 0,
            'entradas' => 0,
            'baixados' => 0,
            'protestados' => 0,
            'erros' => 0,
            'alterados' => 0,
        ];
    }

    /**
     * @param array $header
     *
     * @return bool
     * @throws \Exception
     */
    protected function processarHeader(array $header)
    {
        $this->getHeader()
            ->setOperacaoCodigo($this->rem(2, 2, $header))
            ->setOperacao($this->rem(3, 9, $header))
            ->setServicoCodigo($this->rem(10, 11, $header))
            ->setServico($this->rem(12, 26, $header))
            ->setAgencia($this->rem(27, 30, $header))
            ->setConta($this->rem(39, 46, $header))
            ->setData($this->rem(95, 100, $header));

        return true;
    }

    /**
     * @param array $detalhe
     *
     * @return bool
     * @throws \Exception
     */
    protected function processarDetalhe(array $detalhe)
    {
        if ($this->count() == 1) {
            if (trim($this->rem(384, 385, $detalhe), '') != '') {
                $this->getHeader()
                    ->setConta(
                        $this->getHeader()->getConta()
                        . $this->rem(384, 385, $detalhe)
                    );
            }
        }

        $d = $this->detalheAtual();
        $d->setCarteira($this->rem(108, 108, $detalhe))
        ->setNossoNumero($this->rem(63, 70, $detalhe))
        ->setNumeroDocumento($this->rem(117, 126, $detalhe))
        ->setNumeroControle($this->rem(38, 62, $detalhe))
        ->setOcorrencia($this->rem(109, 110, $detalhe))
        ->setOcorrenciaDescricao(Arr::get($this->ocorrencias, $d->getOcorrencia(), 'Desconhecida'))
        ->setDataOcorrencia($this->rem(111, 116, $detalhe))
        ->setDataVencimento($this->rem(147, 152, $detalhe))
        ->setDataCredito($this->rem(296, 301, $detalhe))
        ->setLinhaRegistro($this->rem(395, 400, $detalhe));

        // adicionado pra garantir o uso de centavos sem a necessidade de conversoes
        if ($this->usandoCentavos) {
            $d->setValor(Util::nFloat($this->rem(153, 165, $detalhe), 2, false))
                ->setValorTarifa(Util::nFloat($this->rem(176, 188, $detalhe), 2, false))
                ->setValorOutrasDespesas(Util::nFloat($this->rem(189, 201, $detalhe), 2, false))
                ->setValorMulta(Util::nFloat($this->rem(202, 214, $detalhe), 2, false))
                ->setValorIOF(Util::nFloat($this->rem(215, 227, $detalhe), 2, false))
                ->setValorAbatimento(Util::nFloat($this->rem(228, 240, $detalhe), 2, false))
                ->setValorDesconto(Util::nFloat($this->rem(241, 253, $detalhe), 2, false))
                ->setValorRecebido(Util::nFloat($this->rem(254, 266, $detalhe), 2, false))
                ->setValorMora(Util::nFloat($this->rem(280, 292, $detalhe), 2, false))
                ->setValorOutrasReceitas(Util::nFloat($this->rem(280, 292, $detalhe), 2, false));
        } else {
            $d->setValor(Util::nFloat($this->rem(153, 165, $detalhe) / 100, 2, false))
                ->setValorTarifa(Util::nFloat($this->rem(176, 188, $detalhe) / 100, 2, false))
                ->setValorOutrasDespesas(Util::nFloat($this->rem(189, 201, $detalhe) / 100, 2, false))
                ->setValorMulta(Util::nFloat($this->rem(202, 214, $detalhe) / 100, 2, false))
                ->setValorIOF(Util::nFloat($this->rem(215, 227, $detalhe) / 100, 2, false))
                ->setValorAbatimento(Util::nFloat($this->rem(228, 240, $detalhe) / 100, 2, false))
                ->setValorDesconto(Util::nFloat($this->rem(241, 253, $detalhe) / 100, 2, false))
                ->setValorRecebido(Util::nFloat($this->rem(254, 266, $detalhe) / 100, 2, false))
                ->setValorMora(Util::nFloat($this->rem(280, 292, $detalhe) / 100, 2, false))
                ->setValorOutrasReceitas(Util::nFloat($this->rem(280, 292, $detalhe) / 100, 2, false));
        }

        $this->totais['valor_recebido'] += $d->getValorRecebido();

        if ($d->hasOcorrencia('06', '07', '08', '16', '17')) {
            $this->totais['liquidados']++;
            $d->setOcorrenciaTipo($d::OCORRENCIA_LIQUIDADA);
        } elseif ($d->hasOcorrencia('02')) {
            $this->totais['entradas']++;
            $d->setOcorrenciaTipo($d::OCORRENCIA_ENTRADA);
        } elseif ($d->hasOcorrencia('09', '10', '93')) {
            $this->totais['baixados']++;
            $d->setOcorrenciaTipo($d::OCORRENCIA_BAIXADA);
        } elseif ($d->hasOcorrencia('15')) {
            $this->totais['protestados']++;
            $d->setOcorrenciaTipo($d::OCORRENCIA_PROTESTADA);
        } elseif ($d->hasOcorrencia('14', '61', '62', '63')) {
            $this->totais['alterados']++;
            $d->setOcorrenciaTipo($d::OCORRENCIA_ALTERACAO);
        } elseif ($d->hasOcorrencia('03')) {
            $this->totais['erros']++;
            $grupoErro = $this->rem(135, 136, $detalhe);
            $errorsRetorno = str_split(sprintf('%09s', $this->rem(137, 145, $detalhe)), 3) + array_fill(0, 3, '');
            $error = [];
            for ($i = 1; $i <= 3; $i++) {
                $str = Arr::get($this->rejeicoes, $grupoErro . $errorsRetorno[$i], '');
                if (strlen($str) > 0) {
                    $error[] = $str;
                }
            }
            $d->setError(implode(PHP_EOL, $error));
        } else {
            $d->setOcorrenciaTipo($d::OCORRENCIA_OUTROS);
        }

        return true;
    }

    /**
     * @param array $trailer
     *
     * @return bool
     */
    protected function processarTrailer(array $trailer)
    {
        $totais = $this->getTrailer()
        ->setQuantidadeTitulos((int) $this->count())
        ->setQuantidadeErros((int) $this->totais['erros'])
        ->setQuantidadeEntradas((int) $this->totais['entradas'])
        ->setQuantidadeLiquidados((int) $this->totais['liquidados'])
        ->setQuantidadeBaixados((int) $this->totais['baixados'])
        ->setQuantidadeAlterados((int) $this->totais['alterados']);
        if ($this->usandoCentavos) {
            $totais->setValorTitulos(Util::nFloat($this->totais['valor_recebido'], 2, false));
        } else {
            $totais->setValorTitulos(Util::nFloat($this->totais['valor_recebido'] / 100, 2, false));
        }

        return true;
    }
}
