<?php

namespace Drupal\vscc_apply\Controller;

use Drupal\Core\Controller\ControllerBase;

class ApplyController extends ControllerBase {
    
  /**
   * Display admissions application if the system is available
   *
   * @return array
  */
  public function application_form() {
    
    $host = 'sernpidal.volstate.edu';
    
    // display admissions application
    if($socket =@ fsockopen($host, 443, $errno, $errstr, 30)) {
      
      return array(
        '#type' => 'markup',
        '#title' => "Apply for Admission",
        '#theme' => 'vscc_apply_form'
      );
    }
    
    // display system down message
    else {
      return array(
        '#type' => 'markup',
        '#title' => "Apply for Admission",
        '#theme' => 'vscc_apply_form_down',
      );
    }
    fclose($socket);
  
  } // end function  
  
}   // end class