CRM.$(".custom-form").load("https://crm.kam.cz/formular/extranet form", function(){
  // jiné field
  if(CRM.$("#edit-submitted-typ-osoby-civicrm-1-contact-1-cg7-custom-439-5").is(":checked")) {
  } else {
    CRM.$(".form-item-submitted-typ-osoby-civicrm-1-contact-1-cg7-custom-440").hide();
  }
    
  // zš field
  if(CRM.$("#edit-submitted-typ-skoly-stupe-civicrm-1-contact-1-cg7-custom-37-2").is(":checked") || CRM.$("#edit-submitted-typ-skoly-stupe-civicrm-1-contact-1-cg7-custom-37-3").is(":checked")) {
  } else {
    CRM.$("#bootstrap-panel--3").hide();
  }
    
  // sš field
  if(CRM.$("#edit-submitted-typ-skoly-stupe-civicrm-1-contact-1-cg7-custom-37-4").is(":checked")) {
  } else {
    CRM.$("#bootstrap-panel--4").hide();
  }
  
  // škola ručně
  if(CRM.$("#edit-submitted-civicrm-2-contact-1-fieldset-fieldset-skola-rucne-1").is(":checked")) {
    } else {
      CRM.$(".form-item-submitted-civicrm-2-contact-1-fieldset-fieldset-nazev-skoly").hide();
  }
    
  // církev ručně
  if(CRM.$("#edit-submitted-civicrm-3-contact-1-fieldset-fieldset-sbor-rucne-1").is(":checked")) {
    } else {
      CRM.$(".form-item-submitted-civicrm-3-contact-1-fieldset-fieldset-nazev-sboru").hide();
  }
  
  
});

CRM.$(".custom-form").on("click", "input[name*='civicrm_1_contact_1_cg7_custom_439']", function(){
  if(CRM.$(this).val()==4) {
    CRM.$(".form-item-submitted-typ-osoby-civicrm-1-contact-1-cg7-custom-440").show();
  } else {
    CRM.$(".form-item-submitted-typ-osoby-civicrm-1-contact-1-cg7-custom-440").hide();
  }
});

CRM.$(".custom-form").on("click", "input[name*='civicrm_1_contact_1_cg7_custom_37']", function(){
  CRM.$("#bootstrap-panel--3").hide();
  CRM.$("#bootstrap-panel--4").hide();
  if(CRM.$("#edit-submitted-typ-skoly-stupe-civicrm-1-contact-1-cg7-custom-37-2").prop('checked') || CRM.$("#edit-submitted-typ-skoly-stupe-civicrm-1-contact-1-cg7-custom-37-3").prop('checked')) {
    CRM.$("#bootstrap-panel--3").show();
  } 
  if(CRM.$("#edit-submitted-typ-skoly-stupe-civicrm-1-contact-1-cg7-custom-37-4").prop('checked')) {
    CRM.$("#bootstrap-panel--4").show();
  } 
});

CRM.$(".custom-form").on("click", "#edit-submitted-civicrm-2-contact-1-fieldset-fieldset-skola-rucne-1", function(){
  if(CRM.$("#edit-submitted-civicrm-2-contact-1-fieldset-fieldset-skola-rucne-1").prop('checked')) {
    CRM.$(".form-item-submitted-civicrm-2-contact-1-fieldset-fieldset-nazev-skoly").show();
    CRM.$(".form-item-submitted-civicrm-2-contact-1-fieldset-fieldset-civicrm-2-contact-1-contact-existing").hide();
    CRM.$(".webform-component--civicrm-2-contact-1-fieldset-fieldset--napovda").hide();
  } else {
    CRM.$(".form-item-submitted-civicrm-2-contact-1-fieldset-fieldset-nazev-skoly").hide();
    CRM.$(".form-item-submitted-civicrm-2-contact-1-fieldset-fieldset-civicrm-2-contact-1-contact-existing").show();
    CRM.$(".webform-component--civicrm-2-contact-1-fieldset-fieldset--napovda").show();
  }
});

CRM.$(".custom-form").on("click", "#edit-submitted-civicrm-3-contact-1-fieldset-fieldset-sbor-rucne-1", function(){
  if(CRM.$("#edit-submitted-civicrm-3-contact-1-fieldset-fieldset-sbor-rucne-1").prop('checked')) {
    CRM.$(".form-item-submitted-civicrm-3-contact-1-fieldset-fieldset-nazev-sboru").show();        
    CRM.$(".form-item-submitted-civicrm-3-contact-1-fieldset-fieldset-civicrm-3-contact-1-contact-existing").hide();
    CRM.$(".webform-component--civicrm-3-contact-1-fieldset-fieldset--napovda-sbor").hide();
  } else {
    CRM.$(".form-item-submitted-civicrm-3-contact-1-fieldset-fieldset-nazev-sboru").hide();
    CRM.$(".form-item-submitted-civicrm-3-contact-1-fieldset-fieldset-civicrm-3-contact-1-contact-existing").show();
    CRM.$(".webform-component--civicrm-3-contact-1-fieldset-fieldset--napovda-sbor").show();
  }
});
  
  



CRM.$(":not('.alert')").click(function(){
  CRM.$(".alert").hide();      
});