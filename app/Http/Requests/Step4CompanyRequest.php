<?php

namespace App\Http\Requests;
use App\Models\Company;
use Illuminate\Foundation\Http\FormRequest;

class Step4CompanyRequest extends FormRequest {
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize() {
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules() {

		return [
		    'social_reason'         => Company::$rules['social_reason'],
		    'commercial_name'          => Company::$rules['commercial_name'],
		    'address_line1'         => Company::$rules['address_line1'],
		    'address_line2'         => Company::$rules['address_line2'],
		    'zipcode'               => Company::$rules['zipcode'],
		    'city'                  => Company::$rules['city'],
		    'local_address_line1'   => Company::$rules['local_address_line1'],
		    'local_address_line2'   => Company::$rules['local_address_line2'],
		    'local_zipcode'         => Company::$rules['local_zipcode'],
		    'local_city'            => Company::$rules['local_city'],
		    'phone'                 => Company::$rules['phone'],
		    'email'                 => Company::$rules['email'],
		    'website'               => Company::$rules['website'],
		];
	}

}
