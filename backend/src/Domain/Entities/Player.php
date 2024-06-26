<?php
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
     * @return HasMany
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

    public function powerProperties()
    {
        return $this->belongsToMany(PowerSpecificProperty::class, 'player_power_properties')
            ->withPivot('value')
            ->withTimestamps();
    }

    /**
     * @return HasMany
     */
    public function matchesAsPlayerOne()
    {
        return $this->hasMany(MatchEntity::class, 'player_one_id');
    }

    /**
     * @return HasMany
     */
    public function matchesAsPlayerTwo()
    {
        return $this->hasMany(MatchEntity::class, 'player_two_id');
    }
}
