<?php
		namespace Sismult\Valida;

    class Validacao{


		
		/**
      
		*/
		public function validaEmail($email): bool{
			
			if(preg_match("/^([[:alnum:]_.-]){3,}@([[:lower:][:digit:]_.-]{3,})(.[[:lower:]]{2,3})(.[[:lower:]]{2})?$/", $email)) {
				return true;
			}else{
				return false;
			}
		}
	}

?>