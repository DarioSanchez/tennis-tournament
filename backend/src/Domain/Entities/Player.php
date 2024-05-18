<?php
namespace Src\Domain\Entities;
namespace Src\Domain\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Player extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'skill_level', 'gender', 'eliminated', 'matches_played'
    ];

    /**
     * Get all properties associated with the player.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function properties(): HasMany
    {
        return $this->hasMany(PlayerProperty::class);
    }

    /**
     * Get all matches associated with the player.
     *
     * @return BelongsToMany
     */
    public function matches(): BelongsToMany
    {
        return $this->belongsToMany(MatchEntity::class, 'match_player', 'player_id', 'match_id');
    }

    /**
     * @return void
     */
    public function delete()
    {
        $this->properties()->delete();
        parent::delete();
    }
}
