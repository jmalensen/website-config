<?php

namespace App\Models;
use App\Models\App;
use Illuminate\Database\Eloquent\Builder;

/**
 * App\Models\Role
 *
 * @property int $id
 * @property string $name
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Role superAdmin()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Role whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Role whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Role whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Role extends App {
	public static $ID_SUPERADMIN = 1;
	public static $ID_ADMIN = 2;
	public static $ID_COMMERCIAL = 3;
	public static $ID_DIRIGEANT = 4;
	public static $ID_USER = 5;

	public static function scopeSuperAdmin(Builder $builder) {
		return $builder
			->whereIN('id', [self::$ID_SUPERADMIN]);
	}

	public static function scopeAdmin(Builder $builder) {
		return $builder
			->whereIN('id', [self::$ID_ADMIN]);
	}

	public static function scopeCommercial(Builder $builder) {
		return $builder
			->whereIN('id', [self::$ID_COMMERCIAL]);
	}

    public static function scopeDirigeant(Builder $builder) {
        return $builder
            ->whereIN('id', [self::$ID_DIRIGEANT]);
    }

    public static function scopeUser(Builder $builder) {
        return $builder
            ->whereIN('id', [self::$ID_USER]);
    }
}
