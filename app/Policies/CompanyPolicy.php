<?php

namespace App\Policies;
use App\Models\Company;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CompanyPolicy {
	use HandlesAuthorization;
	
	public function create(User $connecteduser) {
		return true;
	}
	
	public function edit(User $connecteduser, Company $company) {
		return true;
	}
	

	/**
	* si $company est null; on est dans la vue index
	*/
	public function view(User $connecteduser, Company $company = null) {
		return true;
	}
	
	
	public function delete(User $connecteduser, Company $company) {
		return true;
	}

	public function createCompanyUser(User $connecteduser){
	    return $connecteduser->isSuperAdmin() || $connecteduser->isAdmin() || $connecteduser->isDirigeant();
    }

    public function storeCompanyUser(User $connecteduser){
        return $connecteduser->isSuperAdmin() || $connecteduser->isAdmin() || $connecteduser->isDirigeant();
    }
}
