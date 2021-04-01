<?php
use CRM_Extranet_ExtensionUtil as E;

class CRM_Extranet_Page_Profil extends CRM_Core_Page {

  public function run() {
    // Example: Set the page-title dynamically; alternatively, declare a static title in xml/Menu/*.xml
    CRM_Utils_System::setTitle(E::ts('Profil'));

    // Example: Assign a variable for use in a template
    $this->assign('currentTime', date('Y-m-d H:i:s'));
    
    $session = CRM_Core_Session::singleton();
    $id = $session->get('ufID');
    
    ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">
    <link href="https://crm.kam.cz/sites/default/files/civicrm/ext/cz.kam.extranet/css/css.css" rel="stylesheet" type="text/css">

    <style>
    @media screen and (max-width: 1100px) {
      .custom-form {
        height: 3500px !important;
      }
    }
    
    @media screen and (max-width: 900px) {
      .custom-form {
        height: 4500px !important;      
      }
      .iframe {
        margin-top: -310px !important;
      }
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
              <li><a class="custom-active" href="profil">Profil</a></li>
              <li><a href="registrace">Registrace na akce</a></li>
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
            <li><a class="custom-active" href="profil">Profil</a></li>
            <li><a href="registrace">Registrace na akce</a></li>
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
        <section class="custom-form" style="width:100%; height:3000px; overflow:hidden; position:relative;">
          <iframe src="https://crm.kam.cz/formular/extranet" class="iframe" title="Profil" style="margin-top: -230px; height:10000px; width: 100%;" scrolling="no"  frameBorder="0"></iframe>
        </section>
      </div>
    </section>
  </div>
    <?php

    parent::run();
  }

}
