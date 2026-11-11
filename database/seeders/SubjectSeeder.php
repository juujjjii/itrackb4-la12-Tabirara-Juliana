<?php

namespace Database\Seeders;

use App\Models\Prerequisite;
use App\Models\Subject;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    public function run(): void
    {
        // Create lookup records
        $a = Prerequisite::create(['name' => 'Capstone Project 1']);
        $b = Prerequisite::create(['name' => 'Web Programming 1']);
        $c = Prerequisite::create(['name' => 'Networking 1']);

        // Create 20 subject records
        $subjects = [
            ['CAP102', 'Capstone Project 2', 3, true, $a->id],
            ['ITP1333', 'Information Assurance', 3, true, $c->id],
            ['ITP1441', 'System Administration', 3, true, $c->id],
            ['ITRACKB4', 'Web Programming 2', 3, true, $b->id],
            ['ITP831', 'Networking 2', 3, true, $c->id],
            ['ITP123', 'Data Analytics', 3, false, $b->id],
            ['ITP201', 'Database Management', 3, true, $b->id],
            ['ITP202', 'Computer Programming 1', 3, true, $b->id],
            ['ITP203', 'Computer Programming 2', 3, true, $b->id],
            ['ITP204', 'Mobile Application Development', 3, true, $b->id],
            ['ITP205', 'Software Engineering', 3, true, $a->id],
            ['ITP206', 'Systems Analysis and Design', 3, true, $a->id],
            ['ITP207', 'Network Security', 3, true, $c->id],
            ['ITP208', 'Cloud Computing', 3, true, $c->id],
        
        ];

        foreach ($subjects as $subject) {
            Subject::create([
                'code' => $subject[0],
                'title' => $subject[1],
                'units' => $subject[2],
                'is_active' => $subject[3],
                'prerequisite_id' => $subject[4],
            ]);
        }
    }
}