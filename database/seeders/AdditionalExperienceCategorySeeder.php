<?php

namespace Database\Seeders;

use App\Models\AdditionalExperienceCategory;
use Illuminate\Database\Seeder;

class AdditionalExperienceCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $addExperiences = [
            ['additionalExperienceCategory' => '401 (k) pensions plans'],
            ['additionalExperienceCategory' => 'Client Accounting Services (CAS)'],
            ['additionalExperienceCategory' => 'Accounting Standards for Private Enterprises (ASPE)'],
            ['additionalExperienceCategory' => 'Agreed Upon Procedures'],
            ['additionalExperienceCategory' => 'Accounting Standards Codification (ASC) Standards - US'],
            ['additionalExperienceCategory' => 'GAAS'],
            ['additionalExperienceCategory' => 'Australian Securities and Investments Commission (ASIC) '],
            ['additionalExperienceCategory' => 'Australian Accounting Standards Board (AASB)'],
            ['additionalExperienceCategory' => 'Bermuda Monetary Authority (BMA) statutory reporting'],
            ['additionalExperienceCategory' => 'Bookkeeping'],
            ['additionalExperienceCategory' => 'Compliance'],
            ['additionalExperienceCategory' => 'Consortium Financial Management and Project Management'],
            ['additionalExperienceCategory' => 'Consortium Financial Report Review And Consolidation'],
            ['additionalExperienceCategory' => 'Corporate Finance'],
            ['additionalExperienceCategory' => 'Data Analytics'],
            ['additionalExperienceCategory' => 'Employee Benefit Plan Audit'],
            ['additionalExperienceCategory' => 'ESG Sustainability and Compliance audits'],
            ['additionalExperienceCategory' => 'Estate Planning'],
            ['additionalExperienceCategory' => 'Financial Due Diligence'],
            ['additionalExperienceCategory' => 'Financial Statement Preparation'],
            ['additionalExperienceCategory' => 'Forecasting'],
            ['additionalExperienceCategory' => 'Generally Accepted Accounting Principles (GAAP)'],
            ['additionalExperienceCategory' => 'International Financial Reporting Standards (IFRS)'],
            ['additionalExperienceCategory' => 'International Financial Reporting Standards (IFRS) for SMES'],
            ['additionalExperienceCategory' => 'Preparation of SA Tax Returns'],
            ['additionalExperienceCategory' => 'Audit of SA Tax Returns'],
            ['additionalExperienceCategory' => 'Value Added Tax (VAT) Compliance'],
            ['additionalExperienceCategory' => 'Independent Reviews'],
            ['additionalExperienceCategory' => 'India GAAP'],
            ['additionalExperienceCategory' => 'Individual Tax (SA)'],
            ['additionalExperienceCategory' => 'Initial Public Offering (IPO) Audit '],
            ['additionalExperienceCategory' => 'Internal Audit'],
            ['additionalExperienceCategory' => 'International Standards of Auditing (ISAs)'],
            ['additionalExperienceCategory' => 'ISAE 3402 Engagements'],
            ['additionalExperienceCategory' => 'Labour Relations Act'],
            ['additionalExperienceCategory' => 'Listed Entities'],
            ['additionalExperienceCategory' => 'Mergers & Acquisitions'],
            ['additionalExperienceCategory' => 'Municipal Finance Management Act (MFMA)'],
            ['additionalExperienceCategory' => 'Payroll Taxation'],
            ['additionalExperienceCategory' => 'PCAOB Audits'],
            ['additionalExperienceCategory' => 'Preparation of Annual Financial Statements'],
            ['additionalExperienceCategory' => 'Preparation of Financial Statements'],
            ['additionalExperienceCategory' => 'Preparation of consolidations'],
            ['additionalExperienceCategory' => 'Preparation of US Tax Returns'],
            ['additionalExperienceCategory' => 'Audit of US Tax Returns'],
            ['additionalExperienceCategory' => 'Private Entities'],
            ['additionalExperienceCategory' => 'Project Financial Reporting for EU and SIDA Funded Projects'],
            ['additionalExperienceCategory' => 'Public Finance Management Act (PFMA)'],
            ['additionalExperienceCategory' => 'Reporting and Analysis '],
            ['additionalExperienceCategory' => 'Review of Annual Financial Statements'],
            ['additionalExperienceCategory' => 'Review operating effectiveness of Clients Control System '],
            ['additionalExperienceCategory' => 'Review of Financial Statements '],
            ['additionalExperienceCategory' => 'Supply Chain Management (SCM)'],
            ['additionalExperienceCategory' => 'SEC Reporting'],
            ['additionalExperienceCategory' => 'SOC 1'],
            ['additionalExperienceCategory' => 'SOC 2 '],
            ['additionalExperienceCategory' => 'SOX Testing'],
            ['additionalExperienceCategory' => 'Special Purpose Acquisition Company (SPAC)'],
            ['additionalExperienceCategory' => 'Tax Advisory '],
            ['additionalExperienceCategory' => 'Third Party Assurance'],
            ['additionalExperienceCategory' => 'Transfer Pricing'],
            ['additionalExperienceCategory' => 'UK GAAP    '],
            ['additionalExperienceCategory' => 'US GAAP         '],
            ['additionalExperienceCategory' => 'Yellow Book Audit'],
        ];

        foreach ($addExperiences as $experience) {
            AdditionalExperienceCategory::query()->create($experience);
        }
    }
}
