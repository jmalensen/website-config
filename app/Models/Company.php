<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Builder;
use Kyslik\ColumnSortable\Sortable;

/**
 * App\Models\Company
 *
 * @property int $id
 * @property string|null $country
 * @property string|null $social_reason
 * @property string|null $address_line1
 * @property string|null $address_line2
 * @property string|null $zipcode
 * @property string|null $city
 * @property string|null $local_address_line1
 * @property string|null $local_address_line2
 * @property string|null $local_zipcode
 * @property string|null $local_city
 * @property string|null $phone
 * @property string|null $email
 * @property string|null $website
 * @property string|null $path_logo
 * @property string|null $legal_form
 * @property string|null $rcs_number
 * @property string|null $share_capital
 * @property string|null $tva_intracom
 * @property string|null $city_registration
 * @property string|null $job_number
 * @property string|null $number_auth_establishment
 * @property string|null $job_type
 * @property string|null $iban
 * @property string|null $bic_swift
 * @property int|null $step
 * @property int|null $eko_usage_id
 * @property string|null $commercial_name
 * @property string|null $siret
 * @property string|null $siren
 * @property string|null $rcsl
 * @property string|null $naf_code
 * @property string|null $nace_code
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Company newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Company newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Company query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Company resetPaginate($data)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Company sortable($defaultParameters = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Company whereAddressLine1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Company whereAddressLine2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Company whereBicSwift($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Company whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Company whereCityRegistration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Company whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Company whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Company whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Company whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Company whereIban($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Company whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Company whereJobNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Company whereJobType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Company whereLegalForm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Company whereLocalAddressLine1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Company whereLocalAddressLine2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Company whereLocalCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Company whereLocalZipcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Company whereNumberAuthEstablishment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Company wherePathLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Company wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Company whereRcsNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Company whereShareCapital($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Company whereSocialReason($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Company whereTvaIntracom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Company whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Company whereWebsite($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Company whereZipcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Company whereStep($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Company whereEkoUsageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Company whereCommercialName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Company whereSiret($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Company whereSiren($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Company whereRcsl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Company whereNafCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Company whereNaceCode($value)
 * @mixin \Eloquent
 */
class Company extends App {
	use Sortable;

	protected $primaryKey = 'id';
	protected $dates = [''];

	public static $rules = [
		'country' => ['required', 'string', 'max:255'],
		'social_reason' => ['required', 'string', 'max:255'],
		'address_line1' => ['required', 'string', 'max:255'],
		'address_line2' => ['nullable', 'string', 'max:255'],
		'zipcode' => ['required', 'string', 'max:255'],
		'city' => ['required', 'string', 'max:255'],
		'local_address_line1' => ['nullable', 'string', 'max:255'],
		'local_address_line2' => ['nullable', 'string', 'max:255'],
		'local_zipcode' => ['nullable', 'string', 'max:255'],
		'local_city' => ['nullable', 'string', 'max:255'],
		'phone' => ['required', 'string', 'max:255'],
		'email' => ['required', 'string', 'max:255'],
		'website' => ['nullable', 'string', 'max:255'],
        'logo' => ['nullable', 'json', 'max:200000'],
		'path_logo' => ['string', 'max:255'],
		'legal_form' => ['required', 'string', 'max:255'],
		'rcs_number' => ['required', 'string', 'max:255'],
		'share_capital' => ['required', 'string', 'max:255'],
		'tva_intracom' => ['required', 'string', 'max:255'],
		'city_registration' => ['required', 'string', 'max:255'],
		'job_number' => ['required', 'string', 'max:255'],
		'number_auth_establishment' => ['required', 'string', 'max:255'],
		'job_type' => ['required', 'string', 'max:255'],
		'iban' => ['required', 'string', 'max:255'],
		'bic_swift' => ['required', 'string', 'max:255'],
		'step' => ['integer', 'min:0'],
		'eko_usage_id' => ['integer', 'min:0'],
		'commercial_name' => ['nullable', 'string', 'max:255'],
		'siret' => ['nullable', 'string', 'max:255'],
		'siren' => ['nullable', 'string', 'max:255'],
		'rcsl' => ['nullable', 'string', 'max:255'],
		'naf_code' => ['nullable', 'string', 'max:255'],
		'nace_code' => ['nullable', 'string', 'max:255'],

	];

	/**
	 * The attributes that should be cast to native types.
	 *
	 * @var array
	 */
	protected $casts = [
		'country' => 'string', 
		'social_reason' => 'string', 
		'address_line1' => 'string', 
		'address_line2' => 'string', 
		'zipcode' => 'string', 
		'city' => 'string', 
		'local_address_line1' => 'string', 
		'local_address_line2' => 'string', 
		'local_zipcode' => 'string', 
		'local_city' => 'string', 
		'phone' => 'string', 
		'email' => 'string', 
		'website' => 'string', 
		'path_logo' => 'string', 
		'legal_form' => 'string', 
		'rcs_number' => 'string', 
		'share_capital' => 'string', 
		'tva_intracom' => 'string', 
		'city_registration' => 'string', 
		'job_number' => 'string', 
		'number_auth_establishment' => 'string', 
		'job_type' => 'string', 
		'iban' => 'string', 
		'bic_swift' => 'string', 
		'step' => 'integer',
		'eko_usage_id' => 'integer',
        'commercial_name' => 'string',
        'siret' => 'string',
        'siren' => 'string',
        'rcsl' => 'string',
        'naf_code' => 'string',
        'nace_code' => 'string',

    ];

	public static $emptyAttributes = [
        'country' => null,
        'social_reason' => null,
        'address_line1' => null,
        'address_line2' => null,
        'zipcode' => null,
        'city' => null,
        'local_address_line1' => null,
        'local_address_line2' => null,
        'local_zipcode' => null,
        'local_city' => null,
        'phone' => null,
        'email' => null,
        'website' => null,
        'path_logo' => null,
        'legal_form' => null,
        'rcs_number' => null,
        'share_capital' => null,
        'tva_intracom' => null,
        'city_registration' => null,
        'job_number' => null,
        'number_auth_establishment' => null,
        'job_type' => null,
        'iban' => null,
        'bic_swift' => null,
        'step' => null,
        'commercial_name' => null,
        'siret' => null,
        'siren' => null,
        'rcsl' => null,
        'naf_code' => null,
        'nace_code' => null,
    ];

	/******************************************************************************************************************
	/*********************************************** RELATIONS ********************************************************
	/*****************************************************************************************************************/

    /**
     * Get users of company
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
	public function users(){
	    return $this->hasMany(User::class);
    }

    /**
     * Get Eko usage of company
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function ekoUsage(){
	    return $this->hasOne(EkoUsage::class);
    }


	/******************************************************************************************************************
	/*********************************************** SCOPES ***********************************************************
	/*****************************************************************************************************************/

	/**
	 * @param Builder $builder
	 * @param $data
	 * @return Builder
	 */
	public function scopeResetPaginate(Builder $builder, $data){
		if (!empty($data['search'])){
			$terms = explode(' ', $data['search']);
			foreach($terms as $term){
				/*$builder = $builder
				->orWhere('name', 'like', '%'.$term.'%');*/
			}
			return $builder;
		}

		return $builder;
	}


	/******************************************************************************************************************
	 * /*********************************************** FONCTIONS ********************************************************
	 * /*****************************************************************************************************************/


}
