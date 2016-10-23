<?php
class supplierController extends appController 
{
	function admin_index() {
		if(!empty($_POST)) {
			$post_data = tools::filter($_POST);
			$sql_request = $this->exec("INSERT INTO ". DB_PREFIX ."suppliers (company_name, contact_name, address, postcode, city, country, phone, fax, email, details) 
										VALUES('".$post_data['company_name']."', 
											  '".$post_data['contact_name']."',
											  '".$post_data['address']."',
											  '".$post_data['postcode']."',
											  '".$post_data['city']."',
											  '".$post_data['country']."',
											  '".$post_data['phone']."',
											  '".$post_data['fax']."',
											  '".$post_data['email']."',
											  '".$post_data['details']."')");
			
			tools::setFlash($this->l('Request processed'), 'success');
			tools::redirect('/admin/supplier');
		}	
		
		$suppliers = $this->exec_all("SELECT * FROM ". DB_PREFIX ."suppliers");
		$this->smarty->assign('suppliers', $suppliers);
		$this->smarty->display('admin/settings/suppliers.tpl');
	}
	
	function admin_edit($id) {
		if(!empty($_POST)) {
			$post_data = tools::filter($_POST);
			$this->exec("UPDATE ". DB_PREFIX ."suppliers SET company_name = '".$post_data['company_name']."', 
																  contact_name = '".$post_data['contact_name']."',
																  address = '".$post_data['address']."',
																  postcode = '".$post_data['postcode']."',
																  city = '".$post_data['city']."',
																  country = '".$post_data['country']."',
																  phone = '".$post_data['phone']."',
																  fax = '".$post_data['fax']."',
																  email = '".$post_data['email']."',
																  details = '".$post_data['details']."'
															  WHERE id=".$id);
			
			tools::setFlash($this->l('Request processed'), 'success');
			tools::redirect('/admin/supplier');
		}
		
		$supplier = $this->exec_one("SELECT * FROM ". DB_PREFIX ."suppliers WHERE id=".$id);
		$this->smarty->assign('supplier', $supplier);
		$this->smarty->display('admin/settings/edit_supplier.tpl');
	}
	
	function admin_delete($id) {
		$this->exec("DELETE FROM ". DB_PREFIX ."suppliers WHERE id=".$id);
		tools::setFlash($this->l('Request processed'), 'success');
		tools::redirect('/admin/supplier');
	}
}
?>