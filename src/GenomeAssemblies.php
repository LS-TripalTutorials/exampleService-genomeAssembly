<?php

namespace Drupal\lstrptut_s4rnhy;

use Drupal\tripal\Services\TripalLogger;
use Drupal\tripal_chado\Database\ChadoConnection;

/**
 * Service description.
 */
class GenomeAssemblies {

  /**
   * The tripal_chado.database service.
   *
   * @var \Drupal\tripal_chado\Database\ChadoConnection
   */
  protected $database;

  /**
   * The tripal.logger service.
   *
   * @var \Drupal\tripal\Services\TripalLogger
   */
  protected $logger;

  /**
   * Constructs a GenomeAssemblies object.
   *
   * @param \Drupal\tripal_chado\Database\ChadoConnection $database
   *   The tripal_chado.database service.
   * @param \Drupal\tripal\Services\TripalLogger $logger
   *   The tripal.logger service.
   */
  public function __construct(ChadoConnection $database, TripalLogger $logger) {
    $this->database = $database;
    $this->logger = $logger;
  }

  /**
   * Method description.
   */
  public function doSomething() {
    // @DCG place your code here.
  }

}
