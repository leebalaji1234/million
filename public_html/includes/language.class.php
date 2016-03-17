<?php

// language.class.php
// ORM model for languages table

require_once('model.class.php');
require_once('language_text.class.php');

class Language extends Model
{

  function validate()
  {
    $this->validate_required('##Language Code##', $this->code);
    $this->validate_required('##Language Name##', $this->name);
    $this->validate_required('##Decimal Point Char##', $this->decimal_point);
    $this->validate_required('##Thousands Separator Char##', $this->thousands_separator);
    return parent::validate();
  }

  // cascade delete to language_texts
  function delete()
  {
    $tbl = new Language_Text;
    $tbl->delete_all('where language_id=?', array($this->id()));
    parent::delete();
  }

}

?>
