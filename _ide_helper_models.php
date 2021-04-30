<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\Click
 *
 * @property int $id
 * @property int $package_id
 * @property string|null $ip
 * @property string|null $latitude
 * @property string|null $longitude
 * @property string|null $country_iso_code
 * @property string|null $country
 * @property string|null $city
 * @property string|null $state
 * @property string|null $state_name
 * @property string|null $postal_code
 * @property string|null $timezone
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Package $package
 * @method static \Illuminate\Database\Eloquent\Builder|Click newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Click newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Click query()
 * @method static \Illuminate\Database\Eloquent\Builder|Click whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Click whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Click whereCountryIsoCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Click whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Click whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Click whereIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Click whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Click whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Click wherePackageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Click wherePostalCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Click whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Click whereStateName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Click whereTimezone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Click whereUpdatedAt($value)
 */
	class Click extends \Eloquent {}
}

namespace App{
/**
 * App\Package
 *
 * @property int $id
 * @property string $owner
 * @property string $package_name
 * @property string $owner_avatar_url
 * @property string $description
 * @property string $package_url
 * @property int|null $tree_total
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Click[] $clicks
 * @property-read int|null $clicks_count
 * @method static \Illuminate\Database\Eloquent\Builder|Package newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Package newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Package query()
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereOwner($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereOwnerAvatarUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package wherePackageName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package wherePackageUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereTreeTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereUpdatedAt($value)
 */
	class Package extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

