<?php

namespace Database\Seeders;

use App\Models\QualificationCategory;
use Illuminate\Database\Seeder;

class QualificationCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $qualifications = [
            ['qualification'=>'ACA(ICAEW)','group'=>'Partially Qualified','comments'=>'Institute of chartered accountants of England and Wales'],
            ['qualification'=>'ACCA','group'=>'Fully Qualified','comments'=>''],
            ['qualification'=>'Advanced Diploma in Accounting','group'=>'Bachelor','comments'=>''],
            ['qualification'=>'Advanced Diploma in Accounting and Business  ','group'=>'Bachelor','comments'=>''],
            ['qualification'=>'Advanced Diploma in Accounting Science','group'=>'Bachelor','comments'=>''],
            ['qualification'=>'Advanced Diploma in Applied Accounting Sciences','group'=>'Bachelor','comments'=>''],
            ['qualification'=>'Advanced Diploma in Financial Markets','group'=>'Bachelor','comments'=>''],
            ['qualification'=>'Advanced Diploma in Management Accounting','group'=>'Bachelor','comments'=>''],
            ['qualification'=>'AGA (SA)','group'=>'Bachelor','comments'=>'Associate General Accountant (SA) - Has practical experience but did not pass board exams'],
            ['qualification'=>'APC Board 2','group'=>'Fully Qualified','comments'=>''],
            ['qualification'=>'Associate Accounting Technician (AAT)','group'=>'Not Applicable','comments'=>''],
            ['qualification'=>'Associate Chartered Accountant ','group'=>'Fully Qualified','comments'=>'Australia Specific'],
            ['qualification'=>'Bachelor of Accountancy','group'=>'Bachelor','comments'=>''],
            ['qualification'=>'Bachelor of Accountancy Honours','group'=>'CTA','comments'=>''],
            ['qualification'=>'Bachelor of Accounting','group'=>'Bachelor','comments'=>''],
            ['qualification'=>'Bachelor of Accounting and Finance','group'=>'Bachelor','comments'=>''],
            ['qualification'=>'Bachelor of Accounting and Finance Honours','group'=>'CTA','comments'=>''],
            ['qualification'=>'Bachelor of Accounting Degree','group'=>'Bachelor','comments'=>''],
            ['qualification'=>'Bachelor of Accounting Honours','group'=>'CTA','comments'=>''],
            ['qualification'=>'Bachelor of Accounting Sciences','group'=>'Bachelor','comments'=>''],
            ['qualification'=>'Bachelor of Accounting Sciences Honours','group'=>'CTA','comments'=>''],
            ['qualification'=>'Bachelor of Accounting Sciences in Financial Accounting','group'=>'CTA','comments'=>''],
            ['qualification'=>'Bachelor of Arts Honours in Accounting and Finance','group'=>'CTA','comments'=>''],
            ['qualification'=>'Bachelor of Arts in Accounting','group'=>'Bachelor','comments'=>''],
            ['qualification'=>'Bachelor of Arts in Accounting and Finance Honours','group'=>'CTA','comments'=>''],
            ['qualification'=>'Bachelor of Arts in Economics Honours','group'=>'Not Applicable','comments'=>''],
            ['qualification'=>'Bachelor of Business Administration','group'=>'Bachelor','comments'=>''],
            ['qualification'=>'Bachelor of Business Administration in Accounting','group'=>'Bachelor','comments'=>''],
            ['qualification'=>'Bachelor of Business Management ','group'=>'Bachelor','comments'=>''],
            ['qualification'=>'Bachelor of Business Management in Finance','group'=>'Bachelor','comments'=>''],
            ['qualification'=>'Bachelor of Business Management in Finance and Banking','group'=>'Bachelor','comments'=>''],
            ['qualification'=>'Bachelor of Business Science','group'=>'Bachelor','comments'=>''],
            ['qualification'=>'Bachelor of Business Science in Accounting','group'=>'Bachelor','comments'=>''],
            ['qualification'=>'Bachelor of Business Science in Accounting and Finance','group'=>'Bachelor','comments'=>''],
            ['qualification'=>'Bachelor of Commerce','group'=>'Bachelor','comments'=>''],
            ['qualification'=>'Bachelor of Commerce in Accounting Sciences','group'=>'Bachelor','comments'=>''],
            ['qualification'=>'Bachelor of Commerce Honours in Accounting','group'=>'CTA','comments'=>''],
            ['qualification'=>'Bachelor of Commerce Honours in Taxation','group'=>'CTA','comments'=>''],
            ['qualification'=>'Bachelor of Commerce in Business Accounting','group'=>'Bachelor','comments'=>''],
            ['qualification'=>'Bachelor of Commerce in Chartered Accounting','group'=>'Bachelor','comments'=>''],
            ['qualification'=>'Bachelor of Commerce in Chartered Accounting Honours','group'=>'CTA','comments'=>''],
            ['qualification'=>'Bachelor of Commerce in Computer Application','group'=>'Bachelor','comments'=>''],
            ['qualification'=>'Bachelor of Commerce in Economics and Business Management','group'=>'Bachelor','comments'=>''],
            ['qualification'=>'Bachelor of Commerce in Finance','group'=>'Bachelor','comments'=>''],
            ['qualification'=>'Bachelor of Commerce in Finance and Accounting','group'=>'Bachelor','comments'=>''],
            ['qualification'=>'Bachelor of Commerce in Finance Honours','group'=>'CTA','comments'=>''],
            ['qualification'=>'Bachelor of Commerce in Financial Accounting','group'=>'Bachelor','comments'=>''],
            ['qualification'=>'Bachelor of Commerce in Financial Accounting Honours','group'=>'CTA','comments'=>''],
            ['qualification'=>'Bachelor of Commerce in Forensic Accounting','group'=>'Bachelor','comments'=>''],
            ['qualification'=>'Bachelor of Commerce in Internal Auditing','group'=>'Bachelor','comments'=>''],
            ['qualification'=>'Bachelor of Commerce in Internal Auditing Honours','group'=>'CTA','comments'=>''],
            ['qualification'=>'Bachelor of Commerce in Management Accounting','group'=>'Bachelor','comments'=>''],
            ['qualification'=>'Bachelor of Commerce in Taxation Honours','group'=>'CTA','comments'=>''],
            ['qualification'=>'Bachelor of Commerce in Theory of Accounting (Bridging Certificate)','group'=>'Bachelor','comments'=>''],
            ['qualification'=>'Bachelor of Commmerce in Accounting','group'=>'Bachelor','comments'=>''],
            ['qualification'=>'Bachelor of Economics','group'=>'Not Applicable','comments'=>''],
            ['qualification'=>'Bachelor of Economics and Finance Honours','group'=>'Not Applicable','comments'=>''],
            ['qualification'=>'Bachelor of Economics and Statistics','group'=>'Not Applicable','comments'=>''],
            ['qualification'=>'Bachelor of Engineering in Mechanical Engineering','group'=>'Not Applicable','comments'=>''],
            ['qualification'=>'Bachelor of Engineering in Polymer and Textile Engineering','group'=>'Not Applicable','comments'=>''],
            ['qualification'=>'Bachelor of Finance','group'=>'Bachelor','comments'=>''],
            ['qualification'=>'Bachelor of Health Sciences','group'=>'Not Applicable','comments'=>''],
            ['qualification'=>'Bachelor of Science Honours in Applied Accounting','group'=>'CTA','comments'=>''],
            ['qualification'=>'Bachelor of Science in Accountancy Honours','group'=>'CTA','comments'=>''],
            ['qualification'=>'Bachelor of Science in Accounting','group'=>'Bachelor','comments'=>''],
            ['qualification'=>'Bachelor of Science in Accounting and Finance Honours','group'=>'CTA','comments'=>''],
            ['qualification'=>'Bachelor of Science in Accounting Honours','group'=>'CTA','comments'=>''],
            ['qualification'=>'Bachelor of Science in Actuarial Science','group'=>'Bachelor','comments'=>''],
            ['qualification'=>'Bachelor of Science in Actuarial Science Honours','group'=>'CTA','comments'=>''],
            ['qualification'=>'Bachelor of Science in Applied Accounting Honours','group'=>'CTA','comments'=>''],
            ['qualification'=>'Bachelor of Science in Banking and Finance','group'=>'Bachelor','comments'=>''],
            ['qualification'=>'Bachelor of Science in Biochemistry Honours','group'=>'Not Applicable','comments'=>''],
            ['qualification'=>'Bachelor of Science in Business Administration','group'=>'Bachelor','comments'=>''],
            ['qualification'=>'Bachelor of Science in Economics','group'=>'Bachelor','comments'=>''],
            ['qualification'=>'Bachelor of Science in Economics Honours','group'=>'Bachelor','comments'=>''],
            ['qualification'=>'Bachelor of Science in Electronics and Computer Engineering','group'=>'Bachelor','comments'=>''],
            ['qualification'=>'Bachelor of Science in Finance','group'=>'Bachelor','comments'=>''],
            ['qualification'=>'Bachelor of Science in Industrial Chemistry Honours','group'=>'Not Applicable','comments'=>''],
            ['qualification'=>'Bachelor of Science in Pharmacology','group'=>'Not Applicable','comments'=>''],
            ['qualification'=>'Bachelor of Science in Public Administration','group'=>'Not Applicable','comments'=>''],
            ['qualification'=>'Bachelor of Technology in Cost and Management Accounting','group'=>'Not Applicable','comments'=>''],
            ['qualification'=>'Bachelor of Technology in Taxation','group'=>'Not Applicable','comments'=>''],
            ['qualification'=>'BCOMPT in Financial Accounting','group'=>'Bachelor','comments'=>''],
            ['qualification'=>'Bridging Certificate in the Theory of Accounting','group'=>'Bachelor','comments'=>''],
            ['qualification'=>'Bridging Certificate in the Theory of Accounting Sciences (BCTA)','group'=>'Bachelor','comments'=>''],
            ['qualification'=>'Business Intelligence & Data Analyst (BIDA)','group'=>'Not Applicable','comments'=>''],
            ['qualification'=>'CA(I)','group'=>'Fully Qualified','comments'=>''],
            ['qualification'=>'CA(ICAI)','group'=>'Fully Qualified','comments'=>''],
            ['qualification'=>'CA(IN) ','group'=>'Fully Qualified','comments'=>''],
            ['qualification'=>'CA(NAM)','group'=>'Fully Qualified','comments'=>''],
            ['qualification'=>'CA(SA)','group'=>'Fully Qualified','comments'=>''],
            ['qualification'=>'CA(Z)','group'=>'Fully Qualified','comments'=>''],
            ['qualification'=>'Certfied Internal Auditor (CIA)','group'=>'Not Applicable','comments'=>''],
            ['qualification'=>'Certificate in Corporate Finance','group'=>'Not Applicable','comments'=>''],
            ['qualification'=>'Certificate in Project Management','group'=>'Not Applicable','comments'=>''],
            ['qualification'=>'Certificate in the Theory of Accounting (CTA) ','group'=>'CTA','comments'=>''],
            ['qualification'=>'Certificate in the Theory of Accounting Level 1','group'=>'Bachelor','comments'=>''],
            ['qualification'=>'Certificate in the Theory of Accounting Level 2','group'=>'CTA','comments'=>''],
            ['qualification'=>'Certified Financial Analyst (CFA Level 2)','group'=>'Not Applicable','comments'=>''],
            ['qualification'=>'Certified Fraud Examiner','group'=>'Not Applicable','comments'=>''],
            ['qualification'=>'Certified Information Systems Auditor','group'=>'Not Applicable','comments'=>''],
            ['qualification'=>'Certified Information Systems Auditor (CISA)','group'=>'Not Applicable','comments'=>''],
            ['qualification'=>'Certified Public Accountant (CPA) ','group'=>'Fully Qualified','comments'=>''],
            ['qualification'=>'CFE ','group'=>'Not Applicable','comments'=>''],
            ['qualification'=>'CGMA','group'=>'Not Applicable','comments'=>''],
            ['qualification'=>'Chartered Financial Analyst (CFA) Level 1','group'=>'Not Applicable','comments'=>''],
            ['qualification'=>'CIA','group'=>'Not Applicable','comments'=>''],
            ['qualification'=>'CIFA (II)','group'=>'Not Applicable','comments'=>''],
            ['qualification'=>'CISA','group'=>'Not Applicable','comments'=>''],
            ['qualification'=>'CISCO Certified Network Associate','group'=>'Not Applicable','comments'=>''],
            ['qualification'=>'Commercial Forensic Information Technology & Commercial Forensic Law','group'=>'Not Applicable','comments'=>''],
            ['qualification'=>'Common Proficiency Test ','group'=>'Not Applicable','comments'=>''],
            ['qualification'=>'CTA','group'=>'CTA','comments'=>''],
            ['qualification'=>'CTA level 1','group'=>'Bachelor','comments'=>''],
            ['qualification'=>'CTA Level 2','group'=>'CTA','comments'=>''],
            ['qualification'=>'Diploma in Accountancy','group'=>'Not Applicable','comments'=>''],
            ['qualification'=>'Diploma in Accounting and Business','group'=>'Not Applicable','comments'=>''],
            ['qualification'=>'Diploma in International Business','group'=>'Not Applicable','comments'=>''],
            ['qualification'=>'Diploma in International Financial Reporting','group'=>'Not Applicable','comments'=>''],
            ['qualification'=>'Diploma in Management Accounting','group'=>'Not Applicable','comments'=>''],
            ['qualification'=>'Diploma in Procurement and Supply Chain Management','group'=>'Not Applicable','comments'=>''],
            ['qualification'=>'Financial Modelling & Valuation Analyst (FMVA)','group'=>'Not Applicable','comments'=>''],
            ['qualification'=>'Higher Certificate in Economic and Management Sciences','group'=>'Not Applicable','comments'=>''],
            ['qualification'=>'Higher Diploma in Accountancy','group'=>'Not Applicable','comments'=>''],
            ['qualification'=>'Higher Diploma in Accounting','group'=>'Not Applicable','comments'=>''],
            ['qualification'=>'Higher Diploma in Accounting Sciences','group'=>'Not Applicable','comments'=>''],
            ['qualification'=>'Higher Diploma in Management Accounting','group'=>'Not Applicable','comments'=>''],
            ['qualification'=>'ICAN','group'=>'Fully Qualified','comments'=>'Institute of chartered accountants Namibia'],
            ['qualification'=>'ICAZ','group'=>'Fully Qualified','comments'=>'Institute of chartered accountants Zimbabwe'],
            ['qualification'=>'ICAZ Certificate in Theory of Accounting','group'=>'CTA','comments'=>'Zimbabwe specific'],
            ['qualification'=>'ITC Board 1','group'=>'Partially Qualified','comments'=>''],
            ['qualification'=>'Master of Business Administration (MBA)','group'=>'Not Applicable','comments'=>''],
            ['qualification'=>'Master of Business Leadership ','group'=>'Not Applicable','comments'=>''],
            ['qualification'=>'Master of Business Management','group'=>'Not Applicable','comments'=>''],
            ['qualification'=>'Master of Commerce','group'=>'Not Applicable','comments'=>''],
            ['qualification'=>'Master of Commerce in Finance','group'=>'Not Applicable','comments'=>''],
            ['qualification'=>'Master of Commerce in Taxation','group'=>'Not Applicable','comments'=>''],
            ['qualification'=>'Master of Financial Analysis Control','group'=>'Not Applicable','comments'=>''],
            ['qualification'=>'Master of Risk Management','group'=>'Not Applicable','comments'=>''],
            ['qualification'=>'Master of Science in Economics','group'=>'Not Applicable','comments'=>''],
            ['qualification'=>'Master of Science in Finance','group'=>'Not Applicable','comments'=>''],
            ['qualification'=>'Master’s in Management: Finance and Investment Management','group'=>'Not Applicable','comments'=>''],
            ['qualification'=>'Masters of  Business Administration','group'=>'Not Applicable','comments'=>''],
            ['qualification'=>'Masters of Business Administration  ','group'=>'Not Applicable','comments'=>''],
            ['qualification'=>'Masters of Business Administration in Finance & Marketing','group'=>'Not Applicable','comments'=>''],
            ['qualification'=>'Masters of Science on Finance','group'=>'Not Applicable','comments'=>''],
            ['qualification'=>'MBA  Finance & International Business','group'=>'Not Applicable','comments'=>''],
            ['qualification'=>'MBA Finance','group'=>'Not Applicable','comments'=>''],
            ['qualification'=>'MBA Finance & HR','group'=>'Not Applicable','comments'=>''],
            ['qualification'=>'MBA Finance & Marketing','group'=>'Not Applicable','comments'=>''],
            ['qualification'=>'MBA Finance & Taxation','group'=>'Not Applicable','comments'=>''],
            ['qualification'=>'MBA Insurance & Finance','group'=>'Not Applicable','comments'=>''],
            ['qualification'=>'National  Diploma in Cost and Management Accounting','group'=>'Not Applicable','comments'=>''],
            ['qualification'=>'National Diploma in Accounting','group'=>'Not Applicable','comments'=>''],
            ['qualification'=>'National Diploma in Accounting Sciences','group'=>'Not Applicable','comments'=>''],
            ['qualification'=>'National Diploma in Financial Accounting','group'=>'Not Applicable','comments'=>''],
            ['qualification'=>'National Higher Certificate in Accountancy','group'=>'Not Applicable','comments'=>''],
            ['qualification'=>'National Higher Certificate in Accounting','group'=>'Not Applicable','comments'=>''],
            ['qualification'=>'PGD In Marketing Management','group'=>'Not Applicable','comments'=>''],
            ['qualification'=>'Postgraduate Certificate in Enterprise Risk Management','group'=>'Not Applicable','comments'=>''],
            ['qualification'=>'Postgraduate Diploma in Accounting','group'=>'CTA','comments'=>''],
            ['qualification'=>'Postgraduate Diploma in Accounting Sciences','group'=>'CTA','comments'=>''],
            ['qualification'=>'Postgraduate Diploma in Advanced Accounting','group'=>'CTA','comments'=>''],
            ['qualification'=>'Postgraduate Diploma in Advanced Accouting Science','group'=>'CTA','comments'=>''],
            ['qualification'=>'Postgraduate Diploma in Applied Accounting','group'=>'CTA','comments'=>''],
            ['qualification'=>'Postgraduate Diploma in Applied Accounting Sciences','group'=>'CTA','comments'=>''],
            ['qualification'=>'Postgraduate Diploma in Applied Auditing','group'=>'CTA','comments'=>''],
            ['qualification'=>'Postgraduate Diploma in Chartered Accountancy','group'=>'CTA','comments'=>''],
            ['qualification'=>'Postgraduate Diploma in Financial Management','group'=>'Not Applicable','comments'=>''],
            ['qualification'=>'Postgraduate Diploma in Management','group'=>'Not Applicable','comments'=>''],
            ['qualification'=>'Postgraduate Diploma in Taxation','group'=>'Not Applicable','comments'=>''],
            ['qualification'=>'PPE (Board 2)','group'=>'Fully Qualified','comments'=>''],
            ['qualification'=>'Proficiency Certificate in Management','group'=>'Not Applicable','comments'=>''],
            ['qualification'=>'Public Accountants and Auditors Board of Zimbabwe (PAAB)','group'=>'Not Applicable','comments'=>''],
            ['qualification'=>'Registered CPA (ICPAK)','group'=>'Fully Qualified','comments'=>'Institute of certified public accountants of Kenya'],
            ['qualification'=>'Registered Public Auditor (RPA) ','group'=>'Not Applicable','comments'=>'Professional designation issued by IRBA - Could apply to internal and external auditors'],
            ['qualification'=>'Regulatory and Compliance Specialist Certification','group'=>'Not Applicable','comments'=>''],
            ['qualification'=>'SAICA Assessor','group'=>'Not Applicable','comments'=>''],
            ['qualification'=>'SAIPA Professional Accountant','group'=>'Not Applicable','comments'=>''],
            ['qualification'=>'Tax Practitioner','group'=>'Not Applicable','comments'=>''],
            ['qualification'=>'Xero Certified Advisor','group'=>'Not Applicable','comments'=>''],
        ];

        foreach ($qualifications as $qualification) {
            QualificationCategory::query()->create($qualification);
        }
    }
}
