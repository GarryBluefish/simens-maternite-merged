<?php

namespace Maternite\Model;

use Zend\Db\TableGateway\TableGateway;

use Zend\Db\Sql\Sql;

use Maternite\View\Helpers\DateHelper;
class GynecologieTable {
	
	
		protected $tableGateway;
		public function __construct(TableGateway $tableGateway) {
			$this->tableGateway = $tableGateway;
	
		}
		
		public function updateGyneco($values) {
		
			$donnees = array (
					//'id_cons' => $values['id_cons'],
					'infertilite' => $values['infertilite'],
					'antepers' => $values['antepers'],
						
					
			); 						//var_dump($donnees);exit();
		
			return $this->tableGateway->getLastInsertValue($this->tableGateway->insert ( $donnees ));
			//var_dump($donnees);exit();
		}
}