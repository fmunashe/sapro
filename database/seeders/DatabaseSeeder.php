<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(SpecialisationSeeder::class);
        $this->call(SeniorityLevelSeeder::class);
        $this->call(ContractStatusSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(AchievementSeeder::class);
        $this->call(CertificationsAndEducationSeeder::class);
        $this->call(AdditionalExperienceSeeder::class);
        $this->call(ClientRevenueSeeder::class);
        $this->call(AuditedWorkSeeder::class);
        $this->call(FirmExperienceSeeder::class);
        $this->call(FirstTimeAuditClientSeeder::class);
        $this->call(HostFirmSeeder::class);
        $this->call(IndustrySeeder::class);
        $this->call(InternationalExperienceSeeder::class);
        $this->call(ListedClientSeeder::class);
        $this->call(ProfessionalExperienceSeeder::class);
        $this->call(SoftwareExperienceSeeder::class);
        $this->call(SchedulingSeeder::class);
        $this->call(SectorSeeder::class);
        $this->call(RequestTypeSeeder::class);
        $this->call(AssignmentTypeSeeder::class);
        $this->call(QualificationCategorySeeder::class);
        $this->call(AdditionalExperienceCategorySeeder::class);
        $this->call(PriorExperienceRoleSeeder::class);
        $this->call(CompanySeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(ProvinceSeeder::class);
        $this->call(CitySeeder::class);
    }
}
