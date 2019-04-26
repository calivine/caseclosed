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
 * App\Image
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $url
 * @property string $type
 * @property string|null $caption
 * @property int $imageable_id
 * @property string $imageable_type
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $imageable
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Image newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Image newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Image query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Image whereCaption($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Image whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Image whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Image whereImageableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Image whereImageableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Image whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Image whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Image whereUrl($value)
 */
	class Image extends \Eloquent {}
}

namespace App{
/**
 * App\Message
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $email
 * @property string $subject
 * @property string $body
 * @property string $status
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereSubject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereUpdatedAt($value)
 */
	class Message extends \Eloquent {}
}

namespace App{
/**
 * App\Perpetrator
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property \Illuminate\Support\Carbon|null $date_of_birth
 * @property string|null $description
 * @property int $criminal_record
 * @property \Illuminate\Support\Carbon|null $arrest_date
 * @property \Illuminate\Support\Carbon|null $date_of_death
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Image[] $images
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Source[] $sources
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Victim[] $victims
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Perpetrator newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Perpetrator newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Perpetrator query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Perpetrator whereArrestDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Perpetrator whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Perpetrator whereCriminalRecord($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Perpetrator whereDateOfBirth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Perpetrator whereDateOfDeath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Perpetrator whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Perpetrator whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Perpetrator whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Perpetrator whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Perpetrator whereMiddleName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Perpetrator whereUpdatedAt($value)
 */
	class Perpetrator extends \Eloquent {}
}

namespace App{
/**
 * App\Source
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $url
 * @property int $perpetrator_id
 * @property-read \App\Perpetrator $perpetrator
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Source newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Source newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Source query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Source whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Source whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Source wherePerpetratorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Source whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Source whereUrl($value)
 */
	class Source extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User query()
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App{
/**
 * App\Victim
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property \Illuminate\Support\Carbon|null $date_of_birth
 * @property string|null $gender
 * @property string $cause_of_death
 * @property \Illuminate\Support\Carbon|null $incident_date
 * @property string|null $location
 * @property string|null $description
 * @property int $perpetrator_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Image[] $images
 * @property-read \App\Perpetrator $perpetrator
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Victim newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Victim newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Victim query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Victim whereCauseOfDeath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Victim whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Victim whereDateOfBirth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Victim whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Victim whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Victim whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Victim whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Victim whereIncidentDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Victim whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Victim whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Victim whereMiddleName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Victim wherePerpetratorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Victim whereUpdatedAt($value)
 */
	class Victim extends \Eloquent {}
}

