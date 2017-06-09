<?php

namespace App;

use Spatie\Activitylog\Models\Activity as ActivityModel;

/**
 * App\Activity
 *
 * @property int $id
 * @property string $log_name
 * @property string $description
 * @property int $subject_id
 * @property string $subject_type
 * @property int $causer_id
 * @property string $causer_type
 * @property \Illuminate\Support\Collection $properties
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $causer
 * @property-read mixed $changes
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $subject
 * @method static \Illuminate\Database\Query\Builder|\Spatie\Activitylog\Models\Activity causedBy(\Illuminate\Database\Eloquent\Model $causer)
 * @method static \Illuminate\Database\Query\Builder|\Spatie\Activitylog\Models\Activity forSubject(\Illuminate\Database\Eloquent\Model $subject)
 * @method static \Illuminate\Database\Query\Builder|\Spatie\Activitylog\Models\Activity inLog($logNames)
 * @method static \Illuminate\Database\Query\Builder|\App\Activity whereCauserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Activity whereCauserType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Activity whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Activity whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Activity whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Activity whereLogName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Activity whereProperties($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Activity whereSubjectId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Activity whereSubjectType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Activity whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Activity extends ActivityModel
{
    //
}
