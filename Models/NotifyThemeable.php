<?php

declare(strict_types=1);

namespace Modules\Notify\Models;

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
/**
 * Modules\Notify\Models\NotifyThemeable.
 *
 * @property int                             $id
 * @property string|null                     $model_type
 * @property int|null                        $model_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property string|null                     $created_by
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null                     $updated_by
 * @property int|null                        $notify_theme_id
 *
=======
=======
>>>>>>> fe06862 (.)
/**
 * Modules\Notify\Models\NotifyThemeable
 *
 * @property int $id
 * @property string|null $model_type
 * @property int|null $model_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property string|null $created_by
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $updated_by
 * @property int|null $notify_theme_id
<<<<<<< HEAD
>>>>>>> e73574f (up)
=======
>>>>>>> fe06862 (.)
 * @method static \Illuminate\Database\Eloquent\Builder|NotifyThemeable newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NotifyThemeable newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NotifyThemeable query()
 * @method static \Illuminate\Database\Eloquent\Builder|NotifyThemeable whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NotifyThemeable whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NotifyThemeable whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NotifyThemeable whereModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NotifyThemeable whereModelType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NotifyThemeable whereNotifyThemeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NotifyThemeable whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NotifyThemeable whereUpdatedBy($value)
<<<<<<< HEAD
<<<<<<< HEAD
 *
 * @mixin IdeHelperNotifyThemeable
 * @mixin \Eloquent
 */
class NotifyThemeable extends BaseMorphPivot
{
=======
=======
 * @mixin \Eloquent
 */
>>>>>>> e73574f (up)
class NotifyThemeable extends BaseMorphPivot {
>>>>>>> 18a2c03 (up)
=======
 * @mixin \Eloquent
 * @mixin IdeHelperNotifyThemeable
 */
class NotifyThemeable extends BaseMorphPivot {
>>>>>>> fe06862 (.)
}
