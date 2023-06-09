<?php

namespace Tests\Domains\Employee\Feature;

use App\Exceptions\InstantiateAttemptInWrongEnvException;
use App\Exceptions\UnknownEnvironmentException;
use App\Lib\Employee\EmployeeFactory;
use App\Lib\Employee\EmployeeSkillFactory;
use App\Lib\Employee\SkillRating;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EmployeeSkillCrudTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
    }

    /**
     * @return void
     * @throws InstantiateAttemptInWrongEnvException
     * @throws UnknownEnvironmentException
     */
    public function test_createUpdateDeleteEmployeeSkills() : void
    {
        $employee = EmployeeFactory::instantiate()->save();
        $this->assertTrue($employee->exists);

        $rating = SkillRating::getBySlug(SkillRating::SLUG_RATING_BEGINNER);
        $this->assertModelExists($rating);

        $skill = EmployeeSkillFactory::instantiate()
            ->setSkillRating($rating)
            ->setEmployee($employee)
            ->save();

        $this->assertModelExists($skill);
        $this->assertTrue($skill->getEmployee()->is($employee));
        $this->assertTrue($skill->getSkillRating()->is($rating));

        // Update:
        $newRating = SkillRating::getBySlug(SkillRating::SLUG_RATING_INTERMEDIATE);
        $this->assertModelExists($newRating);
        $skill->setSkillRating($newRating)->save();

        $this->assertTrue($skill->getSkillRating()->is($newRating));

        $skill->delete();

        $this->assertModelMissing($skill);
        $this->assertDatabaseEmpty($skill->getTable());
    }
}
