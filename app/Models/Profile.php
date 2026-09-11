<?php

declare(strict_types=1);

namespace Modules\Gdpr\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Modules\Media\Models\Media;
use Modules\User\Models\BaseProfile;
use Modules\User\Models\Device;
use Modules\User\Models\DeviceProfile;
use Modules\User\Models\DeviceUser;
use Modules\User\Models\Permission;
use Modules\User\Models\Role;
use Modules\Xot\Contracts\ProfileContract;
use Modules\Xot\Contracts\UserContract;
use Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection;
use Spatie\SchemalessAttributes\SchemalessAttributes;

/**
 * Modules\Gdpr\Models\Profile.
 *
 * @property SchemalessAttributes                                      $extra
 * @property string                                                    $avatar
 * @property ProfileContract|null                                      $creator
 * @property Collection<int, DeviceUser>                               $deviceUsers
 * @property int|null                                                  $device_users_count
 * @property DeviceProfile|null                                        $pivot
 * @property Collection<int, Device>                                   $devices
 * @property int|null                                                  $devices_count
 * @property string|null                                               $first_name
 * @property string|null                                               $full_name
 * @property string|null                                               $last_name
 * @property MediaCollection<int, Media>                               $media
 * @property int|null                                                  $media_count
 * @property Collection<int, DeviceUser>                               $mobileDeviceUsers
 * @property int|null                                                  $mobile_device_users_count
 * @property Collection<int, Device>                                   $mobileDevices
 * @property int|null                                                  $mobile_devices_count
 * @property DatabaseNotificationCollection<int, DatabaseNotification> $notifications
 * @property int|null                                                  $notifications_count
 * @property Collection<int, Permission>                               $permissions
 * @property int|null                                                  $permissions_count
 * @property Collection<int, Role>                                     $roles
 * @property int|null                                                  $roles_count
 * @property ProfileContract|null                                      $updater
 * @property UserContract|null                                         $user
 * @property string|null                                               $user_name
 *
 * @method static Builder<static>|Profile byUuid(string $uuid)
 * @method static Builder<static>|Profile childrenWith(array<int|string, mixed> $relations)
 * @method static Builder<static>|Profile childrenWithCount(array<int|string, mixed> $relations)
 * @method static Builder<static>|Profile newModelQuery()
 * @method static Builder<static>|Profile newQuery()
 * @method static Builder<static>|Profile permission($permissions, bool $without = false)
 * @method static Builder<static>|Profile query()
 * @method static Builder<static>|Profile role($roles, ?string $guard = null, bool $without = false)
 * @method static Builder<static>|Profile team($teams, bool $without = false)
 * @method static Builder<static>|Profile withoutPermission($permissions)
 * @method static Builder<static>|Profile withoutRole($roles, ?string $guard = null)
 * @method static Builder<static>|Profile withoutTeam($teams)
 *
 * @mixin \Eloquent
 */
class Profile extends BaseProfile
{
    protected $connection = 'gdpr';
}
