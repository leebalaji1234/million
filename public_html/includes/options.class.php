<?
class Options {
  var $cache;
  var $current_group;

  function Options($group = null){
    $this->cache = false;
    $this->current_group = $group;
  }

  function get_option($name, $group = null){
    $this->change_group($group);

    $sql = 'SELECT * FROM %soptions WHERE group=\'%s\' and name=\'%s\'';
    $sql = sprintf($sql, DB_PREFIX.'options', $group, $name);
    $res = mysql_query($sql);
    if (mysql_num_rows)
    $option = mysql_fetch_object();
  }

  function change_group($group = null) {
    if (is_null($group)){
      $group = $this->group;
    } else {
      $this->current_group = $group;
    }
  
  }
}

?>
