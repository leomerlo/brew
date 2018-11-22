<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(Users::class);
        $this->call(FieldTypes::class);
        $this->call(RecordTypes::class);
        $this->call(Fields::class);
        $this->call(Records::class);
        $this->call(FieldRecords::class);
        $this->call(FieldRecordTypes::class);
        $this->call(FieldValues::class);
        $this->call(siteConfig::class);
    }
}
