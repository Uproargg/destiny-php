<?php

namespace Destiny\Support\Translators;

use Destiny\Support\Contracts\Translates;
use Destiny\Support\Exceptions\ProgressionNotFoundException;

class ProgressionTranslator implements Translates
{
    /**
     * The array of progressions and translations available to this translator.
     *
     * @var array
     */
    protected $progressions = [
        'ban_idle'                      => 'banhammer.pvp.idleness',
        'ban_quit'                      => 'banhammer.pvp.quitterness',
        'base_item_level'               => 'base_item_level',
        'character_display_xp'          => 'character_display_xp',
        'character_level'               => 'character_level',
        'character_prestige'            => 'character_prestige',
        'death_penalty'                 => 'death_penalty',
        'chests_cosmodrome'             => 'destination_chests_cosmodrome',
        'chests_mars'                   => 'destination_chests_mars',
        'chests_moon'                   => 'destination_chests_moon',
        'chests_venus'                  => 'destination_chests_venus',
        'cryptarch'                     => 'faction_cryptarch',
        'eris'                          => 'faction_eris',
        'iron_banner'                   => 'faction_event_iron_banner',
        'queen_event'                   => 'faction_event_queen',
        'vanguard'                      => 'faction_fotc_vanguard',
        'crucible'                      => 'faction_pvp',
        'dead_orbit'                    => 'faction_pvp_dead_orbit',
        'fwc'                           => 'faction_pvp_future_war_cult',
        'new_monarchy'                  => 'faction_pvp_new_monarchy',
        'iron_banner_loss_tokens'       => 'pvp_iron_banner.loss_tokens',
        'pvp_tournament0_losses'        => 'pvp_tournament0.losses',
        'pvp_tournament0_wins'          => 'pvp_tournament0.wins',
        'fallen'                        => 'r1_s3_factions_fallen',
        'queen'                         => 'r1_s3_factions_queen',
        'superior_gear_material_source' => 'superior_gear_material_source',
        'terminals'                     => 'terminals',
        'trials_of_osiris_wins'         => 'r1_s4_tickets.pvp.trials_of_osiris.wins',
        'trials_of_osiris_losses'       => 'r1_s4_tickets.pvp.trials_of_osiris.losses',
        'weekly_pve'                    => 'weekly_pve',
        'weekly_pvp'                    => 'weekly_pvp',
        'test_faction'                  => 'test_faction',
        'character_gear_tilt'           => 'character_gear_tilt',
        'gunsmith'                      => 'r1_s4_factions_gunsmith',
        'hiveship_orbs'                 => 'r1_s4_hiveship_orbs',
        'sparrow_racing'                => 'd15.winter.racing',
        'year1_triumph'                 => 'd15.summer.record_books.triumph0',
        'winter_record'                 => 'd15.winter.record_books.silver_chalice',
        'roi_record'                    => 'd15.fall.record_books.rise_of_iron',
        'age_of_triumph'                => 'd15.v260.record_books.ages',
    ];

    /**
     * Translate a given progression.
     *
     * @param $progression
     *
     * @return mixed
     */
    public function translate($progression)
    {
        if (!array_key_exists($progression, $this->progressions)) {
            throw new ProgressionNotFoundException();
        }

        return $this->progressions[$progression];
    }

    /**
     * Reverse the a translation back to a progression.
     *
     * @param $translation
     *
     * @return mixed
     */
    public function reverse($translation)
    {
        $search = array_search($translation, $this->progressions);

        if (!$search) {
            throw new ProgressionNotFoundException();
        }

        return $search;
    }
}
