<?php

	namespace Sismult;
	use Rain\tpl;

	class Page{

		private $tpl;
		private $options =[];
		private $defaults =[

			"header"=>true,
			"footer"=>true,
			"dados"=>[]
		];

		public function __construct($opts = array(),$tpl_dir ="/views/"){
			
			$this->options = array_merge($this->defaults,$opts);
			$config = array(
					"tpl_dir"       => $_SERVER["DOCUMENT_ROOT"].$tpl_dir,
					"cache_dir"     => $_SERVER["DOCUMENT_ROOT"]."views-cache/",
					"debug"         => false // definido como falso para melhorar a velocidade
				   );

			Tpl::configure( $config );

			$this->tpl = new Tpl;

			$this->setDados($this->options["dados"]); // Passando os dados. 

			if($this->options["header"] === true) $this->tpl->draw("header"); // validação de decisão de carregamento de templetes 

		}

		private function setDados($dados = array()){

			foreach($dados as $key => $value){
				$this->tpl->assign($key, $value);
			}
		}

		public function setTpl($name, $dados = array(), $returnHTML = false){
			$this->setDados($dados);

			return $this->tpl->draw($name, $returnHTML);

		}

		public function __destruct(){

			if($this->options["footer"] === true) $this->tpl->draw("footer");// validação de decisão de carregamento de templetes 

		}


	}
?>