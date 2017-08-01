<?php

namespace OC\PlatformBundle\Antispam;

class OCAntispam
{
//Attributs
  private $mailer;
  private $locale;
  private $minLength;
  
//Constructeur
  public function __construct(\Swift_Mailer $mailer, $locale, $minLength)
  {
    $this->mailer    = $mailer;
    $this->locale    = $locale;
    $this->minLength = (int) $minLength;
  }
/**
   * Vérifie si le texte est un spam ou non
   *
   * @param string $text
   * @return bool
   */
  public function isSpam($text)
  {
    //return strlen($text) < 50;
	return strlen($text) < $this->minLength;
  }
}
