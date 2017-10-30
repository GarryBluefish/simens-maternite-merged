<?php

namespace Maternite\Model;

use Zend\Db\TableGateway\TableGateway;

use Zend\Db\Sql\Sql;

use Maternite\View\Helpers\DateHelper;
class DevenirNouveauNeTable {
	protected $tableGateway;
	public function __construct(TableGateway $tableGateway) {
		$this->tableGateway = $tableGateway;
	}
	public function getNouveauNe($id_cons) {
	
		//$adapter = $this->tableGateway->getAdapter ();
		$db = $this->tableGateway->getAdapter ();
		$sql = new Sql ( $db );
		$sQuery = $sql->select ();
	
				$sQuery->columns ( array (
				'*'
		) );
				
		$sQuery->from( array (
				'nv' => 'devenir_nouveau_ne'
		) )->join ( array (
				'enf' => 'enfant' 
		), 'enf.id_bebe = nv.id_bebe', array (

		));
		$sQuery->where ( array (
				'acc.id_cons' => $id_cons
		
		) );
		
		$sQuery->order ( 'nv.id_devenir_nouveau_ne ASC' );
		
		$stat = $sql->prepareStatementForSqlObject ( $sQuery );
	
		$resultat = $stat->execute ()->current();
		//var_dump($resultat);exit();
		return $resultat;
	}
	
	
	
	public function saveNouveauNe($values,$id_cons,$tabIdEnfant) {
		$Control = new DateHelper();
		
		for($i = 1; $i <= $values['nombre_enfant'] ; $i ++){
			$date_dece = $values ['date_deces_'. $i];
			if($date_dece){ $date_dece = $Control->convertDateInAnglais($date_dece); }else{ $date_dece = null;}
			$datanouveauNe = array (
					'viv_bien_portant' => $values['viv_bien_portant_'. $i],
					'note_viv_bien_portant' => $values['n_viv_bien_portant_' . $i],
					'viv_mal_formation' => $values['viv_mal_form_'. $i],
					'note_viv_mal_formation' => $values['n_viv_mal_form_'. $i],
					'malade' => $values['malade_'. $i],
					'note_malade' => $values['n_malade_'. $i],
					'decede' => $values ['decede_'. $i],
					'date_deces' => $date_dece,
					'heure_deces' => $values['heure_deces_'. $i],
					'cause_deces' => $values['cause_deces_'. $i],					
					'id_bebe' => $tabIdEnfant[$i-1],						
			);
			$this->tableGateway->insert ( $datanouveauNe );}
	}
}