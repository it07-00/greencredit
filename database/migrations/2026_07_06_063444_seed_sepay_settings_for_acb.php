<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\SystemSetting;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        SystemSetting::updateOrCreate(
            ['key' => 'sepay_bank_id'],
            ['value' => 'ACB', 'type' => 'string', 'group' => 'sepay']
        );
        SystemSetting::updateOrCreate(
            ['key' => 'sepay_account_no'],
            ['value' => '20428571', 'type' => 'string', 'group' => 'sepay']
        );
        SystemSetting::updateOrCreate(
            ['key' => 'sepay_account_name'],
            ['value' => 'TRUONG', 'type' => 'string', 'group' => 'sepay']
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        SystemSetting::whereIn('key', ['sepay_bank_id', 'sepay_account_no', 'sepay_account_name'])->delete();
    }
};
