<?php
use CRM_Extranet_ExtensionUtil as E;

class CRM_Extranet_Page_Registrace extends CRM_Core_Page {

  public function run() {
    // Example: Set the page-title dynamically; alternatively, declare a static title in xml/Menu/*.xml
    CRM_Utils_System::setTitle(E::ts('Registrace'));

    // Example: Assign a variable for use in a template
    $this->assign('currentTime', date('Y-m-d H:i:s'));
    
    $events = civicrm_api3('Event', 'get', [
      'sequential' => 1,
      'return' => ["title", "custom_587"],
      'event_type_id' => "Externí",
      'custom_446' => 5,
      'custom_588' => ['<=' => date("Y-m-d H:i:s")],
      'custom_589' => ['>=' => date("Y-m-d H:i:s")],
      'options' => ['limit' => 0],
    ]);
    $session = CRM_Core_Session::singleton();
    $contact_id = $session->get('userID');
    $id = $session->get('ufID');
    
    $ucasti = civicrm_api3('Participant', 'get', [
      'sequential' => 1,
      'return' => ["event_id"],
      'contact_id' => $contact_id,
      'options' => ['limit' => 0],
    ]);
    
    $prihlasen=[];
    $neprihlasen=[];
    foreach ($events["values"] as $event) {
      $pom=0;
      foreach ($ucasti["values"] as $ucast) {
        if ($event["id"]==$ucast["event_id"]) {
          $pom=1;
        }
      }
      
      if($pom==0) {
        array_push($neprihlasen, $event);
      } else {
        array_push($prihlasen, $event);
        $pom=0;
      }
    }
    
    
    ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">
    <link href="https://crm.kam.cz/sites/default/files/civicrm/ext/cz.kam.extranet/css/css.css" rel="stylesheet" type="text/css">

    <style>
    .custom-prihlasen, .custom-neprihlasen {
      border-radius: 20px !important;
      border-color: #F0F0F0 !important;
      background-color: white;
      padding: 20px;
      margin-bottom: 20px;      
    }
    
    .custom-prihlasen a, .custom-neprihlasen a {
      color: black;
    }
    
    .custom-prihlasen li:before, .custom-neprihlasen li:before {
    content: "\f006"; /* FontAwesome Unicode */
    font-family: FontAwesome;
    display: inline-block;
    margin-left: -1.3em; /* same as padding-left set on li */
    width: 1.3em; /* same as padding-left set on li */
    }
    </style>
    <div class="custom-flex">
      <aside class="col-md-3 visible-sm visible-xs" role="complementary">
        <div class="region region-sidebar-first custom-menu">
          <section class="custom-account">
            <div class="btn-group">
              <button class="btn btn-danger dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="custom-icon"></span>Můj účet<span class="custom-icon2"></span>
              </button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="https://crm.kam.cz/user/<?php echo $id; ?>/change-password">Změnit heslo</a></br>
                <a class="dropdown-item" href="https://crm.kam.cz/user/logout">Odhlásit</a>
              </div>
            </div>
          </section>
          <section class="custom-links" style="margin-left: calc(50% - 90px); margin-top: 50px;">
            <ul>
              <li><a href="profil">Profil</a></li>
              <li><a class="custom-active" href="registrace">Registrace na akce</a></li>
              <li><a href="mailing">Zasílání newsletteru</a></li>
              <li><a href="pripominky">Dotazy a připomínky</a></li>
            </ul>
          </section>
        </div>
      </aside>
      
    <aside class="col-md-3 hidden-xs hidden-sm" role="complementary">
      <div class="region region-sidebar-first custom-menu">
        <section class="custom-account">
          <div class="btn-group">
            <button class="btn btn-danger dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="custom-icon"></span>Můj účet<span class="custom-icon2"></span>
            </button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="https://crm.kam.cz/user/<?php echo $id; ?>/change-password">Změnit heslo</a></br>
              <a class="dropdown-item" href="https://crm.kam.cz/user/logout">Odhlásit</a>
            </div>
          </div>
        </section>
        <section class="custom-links">
          <ul>
            <li><a href="profil">Profil</a></li>
            <li><a class="custom-active" href="registrace">Registrace na akce</a></li>
            <li><a href="mailing">Zasílání newsletteru</a></li>
            <li><a href="pripominky">Dotazy a připomínky</a></li>
          </ul>
        </section>
        <section class="custom-footer">
          <img src="https://crm.kam.cz/sites/default/files/civicrm/ext/cz.kam.extranet/images/logo.png" width="100" height="100" class="custom-center">
          <i><center>Křesťanská akademie mladách, z.s.</center></i>
        </section>
      </div>
    </aside>
    <section class="col-md-10">
      <div class="region region-content custom-content">
        <section class="custom-prihlasen">
          <h3>Jsi přihlášen:</h3>
          <ul>
            <?php 
            foreach ($prihlasen as $event) {
              echo '<li><a href="'.$event["custom_587"].'?cid1='.$contact_id.'" target="_blank">'.$event["title"]."</a></li>";
            }
            ?>
          </ul>
        </section>
        <section class="custom-neprihlasen">
          <h3>Můžeš se přihlásit:</h3>
          <ul>
            <?php 
            foreach ($neprihlasen as $event) {
              echo '<li><a href="'.$event["custom_587"].'?cid1='.$contact_id.'" target="_blank">'.$event["title"]."</a></li>";
            }
            ?>
          </ul>
        </section>
      </div>
    </section>
  </div>
    <?php

    parent::run();
  }

}
