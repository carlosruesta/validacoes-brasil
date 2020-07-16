# CONFIGURAÇÕES GERAIS

## Configuração da aplicação no arquivo *core.php* e no *fmb-setup.global.php*

#### Cake, Debug, Sessão e outros

**- core.php**

 >>>
    - Configure::write('debug', 2);
    - Configure::write('log', true);
    - Configure::write('App.encoding', 'UTF-8');
    - Configure::write('Session.save', 'php');
    - Configure::write('Session.cookie', 'FORTYTWO');
    - Configure::write('Session.timeout', '200');
    - Configure::write('Session.start', true);
    - Configure::write('Session.checkAgent', true);
    - Configure::write('Security.level', 'low');
    - Configure::write('Security.salt', 'Hash muito louco do Dcide ##$%%&/JHLKAS');        
    - Configure::write('Security.DenergiaLogin.salt', 'Salt do l@gin do DenErgi@ - %$%*>LJ���');
    - Configure::write('Security.cipherSeed', '9002998837545667177568924');
    - Configure::write('Acl.classname', 'DbAcl');
    - Configure::write('Acl.database', 'default');
    - Cache::config('default', array('engine' => 'File'));
>>>

**- fmb-setup.global.php**

 >>>
    'debug'                 => true,
	'debugLogPath'          => '/home/gabriel/www/fmb/fmb_denergia_api/data/debug.log',
	'config_cache_enabled'  => false,
	
	'remove_auth' => false,
	
	'api_antiga' => 'http://gabriel.fmb.sandbox/api/',
>>>

#### Login de usuários

+ **core.php**

>>>
    - Configure::write('DenergiaWEB.fakeLogin', false);
    - Configure::write('DenergiaWEB.fakeLoginPermissions', array());
	- Configure::write('DenergiaWEB.serverName', 'testes1.dev.fmb.intranet');
	- Configure::write('DenergiaWEB.bypass',true);
	- Configure::write('DenergiaWEB.useSecureCookies', false);
	- Configure::write('DenergiaLogin.allowedCompanyId', 1);
	- Configure::write('DenergiaLogin.actor', 10);
	
	- Configure::write('LoginService.productCode', 'denergia_web');
	- Configure::write('LoginService.obfuscateId', false);
	- Configure::write('LoginService.extraSalt', 'some Xtr@ s@ALT');
	- Configure::write('LoginService.extraSalt2', 'anoTher Xtr s@ALT');
	- Configure::write('LoginService.hashAlgorithm', 'sha256');
	- Configure::write('LoginService.sudoToken',"12345679");
	
	CAPTCHA:
    - Configure::write('GoogleReCaptcha.ApiKeySite', '6Lf5oOcUAAAAAP4yW0RIPAVKpLNkiBos6tn0BnCE');
    - Configure::write('GoogleReCaptcha.SecretKey', '6Lf5oOcUAAAAAFrFIwdm22foV2J1rEbbhTFxMAvB');
	
	INTEGRAÇÃO COM AD:
    - Configure::write('DenergiaLogin.ldapAuthenticate', false);
	- Configure::write('DenergiaLogin.ldapDc', '192.168.0.35');
	- Configure::write('DenergiaLogin.ldapPort', 389);
	- Configure::write('DenergiaLogin.ldapSuffix', '@dcidead.local');
>>>

##### D-Users

+ **fmb-setup.global.php**

>>>
    'AuthComponents' => [
        'salt' => 'Dinafon - grumpsy daisy 976',
    ],
    'dusers' => [
        'url' => 'http://api.dusers2.dev.fmb.intranet',
        'auth' => '/api/Auth/Login',
        'logged' => '/api/Auth/Logged',
        'userInfo' => '/api/Auth/UserInfo',
        'application' => 'denergia_web',
        'applicationLocalSessionKey' => 'U*I000ADS9ALIKAOLAKOAOK',
        'usuarioServico' => [
            'login' => 'gabriel',
            'senha' => 'Hercules@22'
        ]
    ],
>>>

#####Dataload

+ **core.php**
>>>
    - Configure::write('DenergiaWEB.dataloadService', 'http://dseries.dcide.com.br/ws/rest/');
>>>

#####Usuário de serviço e LoginService

+ **core.php**

>>>
    - Configure::write('Shell.userName', 'fmbtestes@dcide.com.br');
    - Configure::write('Shell.userPass', 'Dcide@2011');
>>>

####Integração CCEE

+ **core.php**

>>>
    - Configure::write('CceeWebservice.agentId', 120);
 	- Configure::write('CceeWebservice.certificate', 'saecert.pem');
 	- Configure::write('CceeWebservice.passphrase', 'sae2016');
	- Configure::write('CceeWebservice.password', 'v4sWyQhV');
	- Configure::write('CceeWebservice.server', "piloto-servicos.ccee.org.br");
	- Configure::write('CceeWebservice.username', 'piloto11');
>>>

+ **fmb-setup.global.php**

>>>
    'IntegracaoCcee' => [
        'agenteId' => 'id do agent',
        'certificado' => '',
        'usuario' => '',
        'senha' => '',
        'wsdl' => 'https://piloto-servicos.ccee.org.br:442/', // URL do Piloto ou Produção
        'url' => 'https://piloto-servicos.ccee.org.br:443/', // URL do Piloto ou Produção
        'operacoes' => [
            'importarArquivo' => 'ws/cntr/ImportarArquivoBSv1',
            'obterResultadoProcessamento' => 'ws/cntr/ResultadoProcessamentoBSv1',
            'listarContrato' => 'ws/v2/ContratoBSv2',
            'listarMontanteEnergia' => 'ws/v2/MontanteEnergiaBSv2',
        ],
>>>

#####Integração ERP

+ **core.php**

>>>
    - Configure::write('erp.BillingAndPaymentRules', true);
	- Configure::write('erp.marketOnlyWith', false);

	- Configure::write('IntegracaoErp.habilitaIntegracaoErp', true);
	- Configure::write('IntegracaoErp.integrationType', 'erp');    // valores: erp, wsdl
	- Configure::write('IntegracaoErp.habilitaBotaoSincronizarEmpresasViaERP', true);
	- Configure::write('IntegracaoErp.habilitaBotaoSincronizarContratosViaERP', true);
	- Configure::write('IntegracaoErp.habilitaBotaoSincronizarEmpresasContratosViaERP', true);
	- Configure::write('IntegracaoErp.habilitaBotaoSincronizarStatusNotasFiscaisViaERP', true);
	- Configure::write('IntegracaoErp.habilitaBotaoEnviarPreFaturaViaERP', true);
	- Configure::write('IntegracaoErp.habilitaLogIntegracaoErp', true);
	- Configure::write('IntegracaoErp.realizaValidacaoAutomaticaPrefaturaNoCiclo', true);
	
	- Configure::write('restfullToken','02a5e231f83027ae49fe0d8de9d164c0');
    - Configure::write('Gearman.EmailAlertas', 'fmbtestes@dcide.com.br');
    - Configure::write('IntegracaoErp.emailNfeEmitidaAssunto', 'AUTORIZADA pelo emitente SANTO ANTONIO ENERGIA SA');
    - Configure::write('IntegracaoErp.emailNfeCanceladaAssunto', 'Cancelamento do DF-e');
    - Configure::write('IntegracaoErp.habilitaBotaoEnviarViaWSDL', true);
    
    Configure::write('IntegracaoErp.emailServer', [
    'imap' => [
        'path' => 'mail.denergia.com.br:143/novalidate-cert', // @see http://php.net/manual/pt_BR/function.imap-open.php
        'boxes' => [
            'inbox' => 'INBOX',
            'handled' => 'INBOX.handled',
            'not_handled' => 'INBOX.notHandled',
            'others' =>  'INBOX.otherEmails'
        ],
        'username' => 'fmb.dev.erp.alexandre@dcide.com.br',
        'password' => 'dcide2011'
        ]
    ]);
    
    - Configure::write('integrationType',"wsdl");
    
    - Configure::write('IntegracaoErp.habilitaBotaoSincronizarEmpresaUnicaDesdeERP', true);
>>>

#####Contratos

+ **core.php**

>>>
    - Configure::write('Contratos.habilitaCampoAutoprodutor', true);
    - Configure::write('Contratos.habilitaCampoOrdemErp', true);
     
    - Configure::write('habilitarTemplatesContratos', true);
     
      Configure::write('EmailsAprovacoesContratos.bcc',
          [
              '<user@dcide.com.br>',
          ]
       );
>>>

#####Envio/Recebimento de email

+ **core.php**

>>>
    Configure::write('ApiApproval.emailServer', array(
    'senderEmail' => 'fmbtestes2@dcide.com.br',
    'senderName' => 'FMB Denergia',
    'smtp' => array(
        'port'=>'465',
        'timeout'=>'60',
        'host' => 'ssl://smtp.gmail.com',
        'username' => 'fmb-denergia@dcide.com.br',
        'password' => 'Uhabna7%4'
    ),
    'imap' => array(
        'path' => 'mail.dcide.com.br/novalidate-cert/', // @see http://php.net/manual/pt_BR/function.imap-open.php
        'boxes' => array(
            'inbox' => 'INBOX',
            'handled' => 'INBOX.handled',
            'not_handled' => 'INBOX.notHandled',
            'others' =>  'INBOX.otherEmails'
        ),
        'username' => 'fmbtestes2@dcide.com.br',
        'password' => 'Dc1d3@123',
        'port'     => 143,
        'ssl'      => false
    )
    ));
>>>

#####Configurações de aprovação

+ **core.php**

>>>
    - Configure::write('ApiApproval.contract_expiration',"5 days");
    
    - Configure::write('ApiApproval.invoice_expiration',"5 days");
    
    - Configure::write('habilitarAutoAprovacao', true);
>>>

#####Processamento Assíncrono

+ **core.php**

>>>
    - Configure::write('JQueue.max_jobs', 2);
>>>

#####Api do Pool

+ **core.php**

>>>
    - Configure::write('DenergiaWEB.poolService', 'https://pool.denergia.com.br/');
	- Configure::write('DenergiaWEB.httpAuth', false);
	- Configure::write('DenergiaWEB.httpUser', 'dcide'); //HTTP user
	- Configure::write('DenergiaWEB.httpPassword', 'dcide2011'); //HTTP password
	- Configure::write('DenergiaWEB.poolAuthUser', 'fmbtestes@dcide.com.br');
	- Configure::write('DenergiaWEB.poolAuthPassword', 'Dcide@2011');
>>>

#####Integração com API nova

+ **core.php**

>>>
    - Configure::write('ApiLog.active', true);
    
    - Configure::write('newApiUrl','http://gabriel.fmbapi.sandbox/api/');
>>>

#####Configurações de notificação

+ **core.php**

>>>
    - Configure::write('pusherHash','c9fd8dab0cc0c9f539e3');
    
    - Configure::write('pusherEnabled',false);
    - Configure::write('pusherCluster','us2');
    
>>>

+ **fmb-setup.global.php**

>>>
    'pusher' => [
		'appKey' => '52119c167e7a7eabe20e',
		'appSecret' => 'd216c0e0296d38e8120e',
		'appId' => '347001',
		'notificationsChannel' => 'notifications',
		'defaultEvent' => 'noEvent',
	],
>>>

#####Liquidação financeira

+ **core.php**

>>>
    - Configure::write('Contabilizacao.rootPath', '/var/www/html/contabilizacao_v2');
>>>

#####Logos do cliente

+ **core.php**

>>>
    - Configure::write('Emails.logoUrl', 'https://attachments.dcide.info/Denergia-FMB.png');
    
    - Configure::write('creditNoteLogo','files/Modelo/imagem.png');
>>>

#####Template de upload para recebimentos

+ **core.php**

>>>
     Configure::write('configExcelRecebimentos', [
        'linhas_iniciais_ignorar' => 9,
        'linha_header'            => 8,
	    'formato_datas'           => 'm-d-y',
        'campos_dados'            => [
            'cnpj'                => [
                'CNPJ',
                'Local',
            ],
            'num_nf'              => 'Número da NF (Transação)',
            'parcela_paga'        => 'Parcela (paga)',
            'valor_recebimento'   => 'Valor do Recebimento',
            'num_erp_recebimento' => 'Número do Recebimento',
            'data_recebimento'    => 'Data Recebimento',
            'forma_pgto'          => 'Metodo De Recebimento',
            'info_bancaria'       => 'Conta Contábil',
            'num_transacao'       => null,
            'valor_alocado'       => 'Valor Aplicado',
        ],
    ]);
    
>>>

#####FMB Help

+ **core.php**

>>>
    Configure::write('FmbHelp', [
        'wordpressLogin' => 'http://fmbhelp.denergia.com.br/wp-login.php',
        'auth' => [
            'login' => 'fmb-copel',
            'senha' => 'CoeL97*b'
        ]
    ]);
>>>

#####Suporte Dcide

+ **core.php**

>>>
    - Configure::write('SuporteDcide.login', 'fmb-copel');

    - Configure::write('SuporteDcide.senha', 'Dcide@2011');

    - Configure::write('SuporteDcide.url', 'https://suporte.dcide.com.br/loginfmb?');
    - Configure::write('SuporteDcide.CryptoKey', 'def00000b153735560543d617d4b432553abe0a7aef83d22faf2f49681488f05e40703f0361dbfcf1adf2ab745fd62df67812d2099bc9d5d0769c73d75521d868fcd6681');
>>>

#####Propostas

+ **core.php**

>>> 
    - Configure::write('habilitaExportacaoPropostas', true);
    - Configure::write('habilitarMenuPropostas', true);
>>>

#####Repositório de documentos

+ **core.php**

>>>
    - Configure::write('habilitaRepositorioDocumentos', true);
>>>


#####Análise de Portfólio

+ **core.php**

>>>
    - Configure::write('habilitaAnaliseFifo', true);
>>> 

#####Medição

+ **core.php**

>>>
    - Configure::write('habilitaInsercaoMedicaoManualCopel', true);
>>> 

#####BBCE

+ **core.php**

>>>
    - Configure::write('Bbce.habilitarRedirect', true);
    - Configure::write('Bbce.url', '');
    - Configure::write('Bbce.empresaId', 0);
    - Configure::write('Bbce.usuario', '');
    - Configure::write('Bbce.senha', '');
    - Configure::write('Bbce.token', 'Basic <token>');
    - Configure::write('habilitarMenuBBCEContratos', true);
>>> 

+ **fmb-setup.global.php**

>>>
    'bbce' => [
       'urlToken'  => 'https://wso2.bbce.com.br/token',
       'urlLogin'  => 'https://wso2.bbce.com.br/login-api/v1/login',
       'token'     => 'Basic MThGQmppZmRqOW54amZ4T2FMNVlsU1lZUFNnYTo2aVB4TlpDa3VRQkloOXZVZlk2WWtRWUZvQ3dh',
       'login'     => 'felipe.brito@w7energia.com.br',
       'senha'     => 'sO7QGC%0NuGz',
       'cnpjParte' => '19125927000186',
     ],
>>> 
 
#####Registros CCEE

+ **core.php**

>>>
    - Configure::write('habilitaMatchingContratosCCEE', true);
    
    - Configure::write('habilitarMenuCicloRegistroCCEE', true);
>>>

#####Período de 3 meses

+ **fmb-setup.global.php**

>>>
    'periodoMesesContrato' => 3
    ],
>>>

#####Configurações Sandbox Local

+ **fmb-setup.global.php**

>>>
    'fmb_home'                      => '/home/gabriel/www/fmb/fmb_denergia',
	'fmb_public'                    => '/home/gabriel/www/fmb/fmb_denergia/src/cake/app/webroot',
	'fmb_attachment'                => '/attachments',
	'r_contabilizacao_ojdbc_path'   => '/usr/lib/oracle/11.2/client64/lib/ojdbc6.jar',
	'r_contabilizacao_bd_host'      => 'oracle.intranet:1521:XE',
	'r_contabilizacao_bd_user'      => 'CONTABILIZACAO_CCEE',
	'r_contabilizacao_bd_pass'      => '123456',
	'r_contabilizacao_path'         => '/media/hd-2/home/emmanuel/www/contabilizacao_v2',
>>>

#####Validação de Regras

+ **fmb-setup.global.php**

>>>
    'validation_rules' => [
	    'FATURAMENTO_VENDA'                 => \Business\GrupoPreFaturas\FaturamentoVendaValidationRules::class,
	    'FATURAMENTO_COMPRA'                => \Business\GrupoPreFaturas\FaturamentoCompraValidationRules::class,
	    'SUPRIMENTO'                        => \Business\Suprimentos\SuprimentoValidationRules::class,
	    'FLEXIBILIDADE'                     => \Business\FlexibilityExercises\FlexibilidadeValidationRules::class,
        'REGISTRO_OPERATIONS_CCEE_VENDA'    => \Business\RegistroCcee\RegistroCceeOperationsVendaValidationRules::class,
        'REGISTRO_OPERATIONS_CCEE_COMPRA'   => \Business\RegistroCcee\RegistroCceeOperationsCompraValidationRules::class,
        'REGISTRO_CCEE_VENDA'               => \Business\RegistroCcee\RegistroCceeVendaValidationRules::class,
        'REGISTRO_CCEE_COMPRA'              => \Business\RegistroCcee\RegistroCceeCompraValidationRules::class,
        'GARANTIA'                          => \Business\Garantias\GarantiaValidationRules::class,
	],
>>> 

#####Estágios inicias de Faturamento, Registros, Flex e Garantia

+ **fmb-setup.global.php**

>>>
    'initial_stages' => [
		'FATURAMENTO_VENDA' => [
			'qtd.pre_workflow',
			'preco.pre_workflow',
			'fatura.aguardando_quantidade_preco',
		],
		'FATURAMENTO_COMPRA' => [
			'qtd.pre_workflow',
			'preco.pre_workflow',
			'fatura.aguardando_quantidade_preco',
		],
		'SUPRIMENTO' => [
			'qtd.pre_workflow',
			'preco.pre_workflow',
		],
		'FLEXIBILIDADE' => [
			'flexibilidade.pre_workflow',
		],
            'REGISTRO_OPERATIONS_CCEE_VENDA' => [
                'registro_operations.pre_workflow',
            ],
            'REGISTRO_OPERATIONS_CCEE_COMPRA' => [
                'registro_operations.pre_workflow',
            ],
            'REGISTRO_CCEE_VENDA' => [
                'registro.pre_workflow',
            ],
            'REGISTRO_CCEE_COMPRA' => [
                'registro.pre_workflow',
            ],
            'GARANTIA' => [
                'garantia.pre_workflow',
            ]
	    ],
>>>

#####Processos e próximos estágios de Faturamento, Suprimento, Flexibilidade e Registro CCEE

+ **fmb-setup.global.php**

>>>
    'stage_continue_process' => [
        'SUPRIMENTO',
    ],
	'auto_next_stages' => [
		'FATURAMENTO_VENDA' => [
			'qtd' => [
				'exercicio_validado'
			],
			'preco' => [
				'reajuste_validado',
				'preco_variavel_validado',
				'regras_validadas',
			],
			'fatura' => [
				'divisao_validada',
				'parcelamento_validado',
			],
		],
		'FATURAMENTO_COMPRA' => [
			'qtd' => [
				'exercicio_validado'
			],
			'preco' => [
				'reajuste_validado',
				'preco_variavel_validado',
				'regras_validadas',
			],
			'fatura' => [
				'divisao_validada',
				'parcelamento_validado',
			],
		],
		'SUPRIMENTO' => [
			'qtd' => [
				'exercicio_validado',
			],
			'preco' => [
				'reajuste_validado',
				'preco_variavel_validado',
				'regras_validadas',
			],
		],
		'FLEXIBILIDADE' => [],
        'REGISTRO_OPERATIONS_CCEE_VENDA' => [
            'registro' => [
                'pre_workflow',
                'bilateral_validado',
                'nao_pago_aprovado',
                'pagamento_aprovado',
                'energia_distribuida',
                'garantia_coberta',
                'contratos_liberados_pendencia_garantia',
                'contratos_pendencia_garantia_pagamento',
                'garantia_descoberta_aprovada'
            ],
        ],
        'REGISTRO_OPERATIONS_CCEE_COMPRA' => [
            'registro' => [
                'pre_workflow',
                'bilateral_validado',
                'nao_pago_aprovado',
                'pagamento_aprovado',
                'energia_distribuida',
                'quantidades_conferidas',
                'quantidade_registrada_validada',
                'garantia_coberta',
                'contratos_liberados_pendencia_garantia',
                'contratos_pendencia_garantia_pagamento',
                'garantia_descoberta_aprovada'
            ],
        ],
        'REGISTRO_CCEE_VENDA' => [
            'registro' => [
                'pre_workflow',
                'operacao_ciclo_concluido',
                'modulacao_flat',
                'modulacao_validada',
                'xml_enviado',
                'quantidade_registrada_validada',
            ],
        ],
        'REGISTRO_CCEE_COMPRA' => [
            'registro' => [
                'pre_workflow',
                'operacao_ciclo_concluido',
                'modulacao_flat',
                'modulacao_validada',
                'xml_enviado',
                'quantidade_registrada_validada',
            ],
        ],
	],
>>>
