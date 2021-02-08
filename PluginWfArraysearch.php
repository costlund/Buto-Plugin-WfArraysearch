<?php
class PluginWfArraysearch{
  private $keys = array();
  public $data = array();
  public function get(){
    $default = array(
        'key_name' => null,
        'key_value' => null,
        'data' => array()
    );
    $this->data = array_merge($default, $this->data);
    $this->getKeys($this->data['data']);
    return $this->keys;
  }
  private function getKeys($arr, $keys = null){
    if(is_array($arr)){
      foreach ($arr as $key => $value) {
        /**
         * 
         */
        if(!strlen($key)){
          continue;
        }
        /**
         * 
         */
        $log_key = false;
        if(!is_array($value)){
          if(!strlen($this->data['key_name']) && !strlen($this->data['key_value'])){
            $log_key = true;
          }elseif(strlen($this->data['key_name']) && strlen($this->data['key_value'])){
            if((string)$key === (string)$this->data['key_name'] && (string)$value === (string)$this->data['key_value']){
              $log_key = true;
            }
          }elseif(strlen($this->data['key_name'])){
            if((string)$key === (string)$this->data['key_name']){
              $log_key = true;
            }
          }elseif(strlen($this->data['key_value'])){
            if((string)$value === (string)$this->data['key_value']){
              $log_key = true;
            }
          }
        }else{
          if(strlen($this->data['key_name'])){
            if((string)$key === (string)$this->data['key_name']){
              $log_key = true;
            }
          }
        }
        if($log_key){
          $this->keys[] = $keys.'/'.$key;
        }
        if(is_array($value)){
          $this->getKeys($value, $keys.'/'.$key);
        }
      }
    }
  }
}
