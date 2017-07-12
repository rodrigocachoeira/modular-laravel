<?php

namespace Orion\Mail\Business\Services\Config;

use Illuminate\Support\Facades\Config;
use Magos\Business\Repositories\ConfigEmailRepository;
use Magos\Business\Repositories\ConfigEmailSignatureRepository;
use Swift_Mailer as Mailer;
use Swift_SmtpTransport as Transport;
use Mail;

/**
* Serviço de configuração de e-mails
* da aplicação
*
* @author Rodrigo Cachoeira
* @package app.business.services.mail
*/
class EmailConfig
{

  /**
  * @var ConfigEmailRepository
  */
  protected $configEmailRepository;

  /**
  * @var ConfigEmailSignatureRepository
  */
  protected $configEmailSignatureRepository;

  /**
  * @var EmailConfig
  */
  protected $emailConfigSelected;

  /**
  * @var ConfigEmailRepository $configEmailRepository
  * @var ConfigEmailSignatureRepository $configEmailSignatureRepository
  */
  public function __construct (ConfigEmailRepository $configEmailRepository, ConfigEmailSignatureRepository $configEmailSignatureRepository)
  {
    $this->configEmailRepository = $configEmailRepository;
    $this->configEmailSignature = $configEmailSignatureRepository;

    $this->emailConfigSelected = null;
  }

  /**
  * Retorna as configurações disponíveis
  *
  * @return Collection
  */
  public function getAvailables ()
  {
    return $this->configEmailRepository->get();
  }

  /**
  * Retorna uma configuração
  * específica
  *
  * @param String $identify
  *
  * @return null | ConfigEmail
  */
  public function getConfig ($identify)
  {
    $config = $this->configEmailRepository->getByField('identify', $identify);
    if ($config->isEmpty()) {
      return null;
    }
    return $config->first();
  }

  /**
  * Retorna as assinaturas do e-mail
  * selecionado
  *
  * @return Collection
  */
  public function getSignatures ()
  {
    if (! is_null($this->emailConfigSelected)) {
      return $this->emailConfigSelected->signatures;
    }
    return null;
  }


  /**
  * Aplica as configurações de
  * um e-mail
  *
  * @param String $identify
  *
  * @return void
  */
  public function applyEmail ($identify)
  {
    $email = $this->getConfig($identify);
    if (is_null($identify)) {
      throw new Exception("E-mail configuration not found");
    }
    $transport = Transport::newInstance($email->host, $email->port, $email->crypt);
    $transport->setUsername($email->username);
    $transport->setPassword($email->password);

    Mail::setSwiftMailer(new Mailer($transport));

    $this->emailConfigSelected = $email;
  }

}
