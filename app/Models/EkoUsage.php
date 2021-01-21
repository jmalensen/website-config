<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Kyslik\ColumnSortable\Sortable;

/**
 * App\Models\EkoUsage
 *
 * @property int $id
 * @property int $company_id
 * @property string|null $eko_type
 * @property string $data_eko
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EkoUsage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EkoUsage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EkoUsage query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EkoUsage resetPaginate($data)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EkoUsage sortable($defaultParameters = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EkoUsage whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EkoUsage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EkoUsage whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EkoUsage whereEkoType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EkoUsage whereDataEko($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EkoUsage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EkoUsage whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class EkoUsage extends App {
	use Sortable;

	protected $primaryKey = 'id';
	protected $dates = [''];

    public static $EKO_LIGHT = 'Light';
    public static $EKO_FULL = 'Full';


	public static $rules = [
		'company_id' => ['integer', 'min:0'], 
		'eko_type' => ['string', 'max:255'], 
		'data_eko' => ['string', 'json'],
	];

	public static $emptyAttributes = [
        'eko_type' => null
    ];

	/**
	 * The attributes that should be cast to native types.
	 *
	 * @var array
	 */
	protected $casts = [
		'company_id' => 'integer', 
		'eko_type' => 'string', 
		'data_eko' => 'string',
	];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['company_id', 'eko_type', 'data_eko'];

    protected static function boot() {
        parent::boot();

        static::creating(function ($query) {
            $query->data_eko = json_encode(json_decode('{}'));
        });
    }

	/******************************************************************************************************************
	/*********************************************** RELATIONS ********************************************************
	/*****************************************************************************************************************/

    /**
     * Get company linked
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
	public function company(){
	    return $this->belongsTo(Company::class);
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
