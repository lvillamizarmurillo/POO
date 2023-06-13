<?php
    declare(strict_types = 1);
    class humano{
        protected $saludar;
        public function __construct(public string $color, private float $huella, protected string $alias){}
        protected function saludar(){
            return "Hola mi alias es:".$this->alias;
        }
        public function __set(string $name, mixed $value){
            $this->{$name} = $value;
        }
        public function __get(string $name){
            return (method_exists($this, $name)) ? $this->{$name}() : $this->{$name};
            // if(method_exists($this, $name)){
            //     return $this->{$name}();
            // }else if(property_exists($this, $name)){
            //     return $this->{$name};
            // }else{
            //     return ["error"=> "no existe esa entidad en la clase ".__CLASS__];
            // }
        }
    }
    $extruct = array(
        "huella"=> 12.15, 
        "color"=> "Piel",  
        "alias"=>"Trainer"
    ); 
    $obj = new humano(...$extruct);
    $obj->__set("saludar", "Hola mundo");

    // print_r($obj);

    // print_r($obj->__get("huella"));

    print_r($obj->__get("saludar",2));
?>