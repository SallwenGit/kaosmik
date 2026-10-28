<?php

namespace Tests\Database;

use App\Entities\Hero;
use App\Entities\Player;
use App\Entities\RarityLevel;
use App\Models\HeroModel;
use CodeIgniter\Database\Exceptions\DatabaseException;
use CodeIgniter\I18n\Time;
use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;
use Tests\Support\Traits\CreatesPlayers;

final class HeroModelTest extends CIUnitTestCase
{
    use DatabaseTestTrait;
    use CreatesPlayers;

    protected $migrate = true;
    protected $refresh = true;
    protected $DBGroup = 'tests';
    protected $namespace = null;
    protected $seed = 'Tests\Support\Database\Seeds\KaosmikTestSeeder';

    private HeroModel $heroModel;
    private Player $player;

    //Inserer le SetUp() ici
    protected function setUp(): void
    {
        parent::setUp();

        $this->heroModel = new HeroModel();
        $this->player    = $this->createPlayer('joueur1');
    }
    //Inserer vos tests ici

    public function testCanCreateHero()
    {
        $id = $this->heroModel->insert([
            'player_id'     => $this->player->id,
            'hero_model_id' => 1,
            'rarity_id'     => 1,
            'name'          => 'Alpha Test',
            'power'         => 20,
            'cost_credit'   => 100,
        ]);

        $this->assertIsInt($id);
        $this->seeInDatabase('heroes', ['name' => 'Alpha Test', 'power' => 20]);
    }
    public function testCanReadHero()
    {
        $hero = $this->createHero($this->player, ['name' => 'Beta Test']);

        $found = $this->heroModel->find($hero->id);

        $this->assertInstanceOf(Hero::class, $found);
        $this->assertSame('Beta Test', $found->name);
        $this->assertSame($this->player->id, $found->player_id);
    }
    public function testCanUpdateHero()
    {
        $hero = $this->createHero($this->player);

        $this->heroModel->update($hero->id, ['name' => 'Nouveau Nom', 'power' => 35]);

        $found = $this->heroModel->find($hero->id);
        $this->assertSame('Nouveau Nom', $found->name);
        $this->assertSame(35, $found->power);
    }
    public function testCanDeleteHero()
    {
        $hero = $this->createHero($this->player);

        $this->heroModel->delete($hero->id);

        // HeroModel n'utilise pas le soft delete : la ligne disparaît vraiment
        $this->assertNull($this->heroModel->find($hero->id));
        $this->dontSeeInDatabase('heroes', ['id' => $hero->id]);
    }

}