<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->date('date_of_birth')->nullable();
            $table->string('gender')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('district')->nullable();
            $table->text('bio')->nullable();
            $table->json('green_interests')->nullable();
            $table->boolean('onboarding_completed')->default(false);
            $table->timestamps();
        });

        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('owner_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('name');
            $table->string('brand')->nullable();
            $table->string('type')->default('other');
            $table->string('tax_code')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('district')->nullable();
            $table->text('description')->nullable();
            $table->string('logo')->nullable();
            $table->string('status')->default('pending');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('store_branches', function (Blueprint $table) {
            $table->id();
            $table->foreignId('store_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->string('address');
            $table->string('city')->nullable();
            $table->string('district')->nullable();
            $table->string('phone')->nullable();
            $table->string('manager_name')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('store_staff', function (Blueprint $table) {
            $table->id();
            $table->foreignId('store_id')->constrained()->cascadeOnDelete();
            $table->foreignId('branch_id')->nullable()->constrained('store_branches')->nullOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('position')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->unique(['store_id', 'user_id']);
        });

        Schema::create('partners', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->string('name');
            $table->string('type')->default('voucher');
            $table->string('contact_email')->nullable();
            $table->string('contact_phone')->nullable();
            $table->string('address')->nullable();
            $table->text('description')->nullable();
            $table->string('logo')->nullable();
            $table->string('status')->default('pending');
            $table->timestamps();
        });

        Schema::create('green_action_rules', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('name');
            $table->text('description')->nullable();
            $table->integer('points');
            $table->decimal('plastic_saved_grams', 10, 2)->default(0);
            $table->decimal('co2_saved_kg', 10, 3)->default(0);
            $table->string('category')->default('other');
            $table->integer('daily_limit')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('green_invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('store_id')->constrained()->cascadeOnDelete();
            $table->foreignId('branch_id')->nullable()->constrained('store_branches')->nullOnDelete();
            $table->foreignId('staff_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('invoice_code')->unique();
            $table->string('qr_token')->unique();
            $table->decimal('amount', 12, 2);
            $table->string('payment_method')->nullable();
            $table->text('customer_note')->nullable();
            $table->json('eco_actions');
            $table->integer('base_points')->default(0);
            $table->decimal('plastic_saved_grams', 10, 2)->default(0);
            $table->decimal('co2_saved_kg', 10, 3)->default(0);
            $table->string('status')->default('pending');
            $table->timestamp('expired_at')->nullable();
            $table->timestamp('used_at')->nullable();
            $table->foreignId('used_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
            $table->index(['status', 'expired_at']);
        });

        Schema::create('green_invoice_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('green_invoice_id')->constrained()->cascadeOnDelete();
            $table->foreignId('green_action_rule_id')->constrained()->cascadeOnDelete();
            $table->integer('points');
            $table->decimal('plastic_saved_grams', 10, 2)->default(0);
            $table->decimal('co2_saved_kg', 10, 3)->default(0);
            $table->timestamps();
        });

        Schema::create('green_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('store_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('branch_id')->nullable()->constrained('store_branches')->nullOnDelete();
            $table->foreignId('green_invoice_id')->nullable()->constrained()->nullOnDelete();
            $table->string('transaction_code')->unique();
            $table->string('type')->default('invoice_scan');
            $table->integer('points');
            $table->decimal('plastic_saved_grams', 10, 2)->default(0);
            $table->decimal('co2_saved_kg', 10, 3)->default(0);
            $table->text('description')->nullable();
            $table->string('status')->default('approved');
            $table->json('metadata')->nullable();
            $table->timestamps();
        });

        Schema::create('green_wallets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unique()->constrained()->cascadeOnDelete();
            $table->integer('total_earned')->default(0);
            $table->integer('total_redeemed')->default(0);
            $table->integer('total_penalty')->default(0);
            $table->integer('current_balance')->default(0);
            $table->timestamps();
        });

        Schema::create('green_points', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('type');
            $table->integer('points');
            $table->integer('balance_before')->default(0);
            $table->integer('balance_after')->default(0);
            $table->string('description')->nullable();
            $table->string('reference_type')->nullable();
            $table->unsignedBigInteger('reference_id')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });

        Schema::create('green_levels', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('name');
            $table->integer('min_score');
            $table->integer('max_score');
            $table->text('description')->nullable();
            $table->json('benefits')->nullable();
            $table->string('icon')->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('green_score_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->integer('score');
            $table->string('level_code')->nullable();
            $table->integer('behavior_score')->default(0);
            $table->integer('consistency_score')->default(0);
            $table->integer('diversity_score')->default(0);
            $table->integer('verification_score')->default(0);
            $table->integer('community_score')->default(0);
            $table->integer('fraud_penalty')->default(0);
            $table->string('reason')->nullable();
            $table->timestamp('calculated_at');
            $table->timestamps();
        });

        Schema::create('vouchers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('partner_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('store_id')->nullable()->constrained()->nullOnDelete();
            $table->string('title');
            $table->string('code')->unique();
            $table->text('description')->nullable();
            $table->string('category')->default('other');
            $table->integer('required_points');
            $table->string('discount_type')->default('fixed');
            $table->decimal('discount_value', 12, 2)->default(0);
            $table->integer('quantity')->nullable();
            $table->integer('used_quantity')->default(0);
            $table->integer('min_green_score')->default(0);
            $table->timestamp('started_at')->nullable();
            $table->timestamp('expired_at')->nullable();
            $table->string('status')->default('draft');
            $table->text('terms')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });

        Schema::create('voucher_redemptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('voucher_id')->constrained()->cascadeOnDelete();
            $table->string('redemption_code')->unique();
            $table->integer('points_used');
            $table->string('status')->default('issued');
            $table->timestamp('used_at')->nullable();
            $table->timestamp('expired_at')->nullable();
            $table->timestamps();
        });

        Schema::create('campaigns', function (Blueprint $table) {
            $table->id();
            $table->foreignId('partner_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('store_id')->nullable()->constrained()->nullOnDelete();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('type')->default('voucher');
            $table->timestamp('started_at')->nullable();
            $table->timestamp('ended_at')->nullable();
            $table->string('status')->default('draft');
            $table->decimal('budget', 12, 2)->nullable();
            $table->json('metadata')->nullable();
            $table->timestamps();
        });

        Schema::create('financial_offers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('partner_id')->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->text('description')->nullable();
            $table->integer('min_green_score')->default(0);
            $table->decimal('base_interest_rate', 5, 2)->nullable();
            $table->decimal('discounted_interest_rate', 5, 2)->nullable();
            $table->decimal('max_amount', 14, 2)->nullable();
            $table->integer('required_points')->default(0);
            $table->string('status')->default('draft');
            $table->timestamps();
        });

        Schema::create('financial_applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('financial_offer_id')->constrained()->cascadeOnDelete();
            $table->integer('green_score_at_apply');
            $table->decimal('requested_amount', 14, 2)->nullable();
            $table->string('status')->default('pending');
            $table->text('partner_note')->nullable();
            $table->timestamps();
        });

        Schema::create('net_zero_goals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->integer('month');
            $table->integer('year');
            $table->decimal('plastic_target_grams', 10, 2)->default(0);
            $table->decimal('co2_target_kg', 10, 3)->default(0);
            $table->integer('points_target')->default(0);
            $table->integer('action_target')->default(0);
            $table->string('status')->default('active');
            $table->timestamps();
        });

        Schema::create('net_zero_progress', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('net_zero_goal_id')->nullable()->constrained()->nullOnDelete();
            $table->date('progress_date');
            $table->decimal('plastic_saved_grams', 10, 2)->default(0);
            $table->decimal('co2_saved_kg', 10, 3)->default(0);
            $table->integer('points_earned')->default(0);
            $table->integer('actions_count')->default(0);
            $table->timestamps();
        });

        Schema::create('personal_recommendations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->text('description');
            $table->string('category')->default('other');
            $table->integer('estimated_points')->default(0);
            $table->string('status')->default('new');
            $table->json('metadata')->nullable();
            $table->timestamps();
        });

        Schema::create('fraud_rules', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('name');
            $table->text('description')->nullable();
            $table->integer('risk_points')->default(0);
            $table->string('threshold_value')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('fraud_alerts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('green_invoice_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('store_id')->nullable()->constrained()->nullOnDelete();
            $table->string('alert_type');
            $table->text('description');
            $table->integer('risk_score')->default(0);
            $table->string('status')->default('open');
            $table->foreignId('resolved_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamp('resolved_at')->nullable();
            $table->timestamps();
        });

        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->text('message');
            $table->string('type')->default('info');
            $table->timestamp('read_at')->nullable();
            $table->json('data')->nullable();
            $table->timestamps();
        });

        Schema::create('activity_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->string('action');
            $table->text('description')->nullable();
            $table->string('subject_type')->nullable();
            $table->unsignedBigInteger('subject_id')->nullable();
            $table->string('ip_address')->nullable();
            $table->string('user_agent')->nullable();
            $table->json('metadata')->nullable();
            $table->timestamps();
        });

        Schema::create('system_settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->text('value')->nullable();
            $table->string('type')->default('string');
            $table->string('group')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        collect([
            'system_settings', 'activity_logs', 'notifications', 'fraud_alerts', 'fraud_rules',
            'personal_recommendations', 'net_zero_progress', 'net_zero_goals', 'financial_applications',
            'financial_offers', 'campaigns', 'voucher_redemptions', 'vouchers', 'green_score_histories',
            'green_levels', 'green_points', 'green_wallets', 'green_transactions', 'green_invoice_items',
            'green_invoices', 'green_action_rules', 'partners', 'store_staff', 'store_branches',
            'stores', 'user_profiles',
        ])->each(fn (string $table) => Schema::dropIfExists($table));
    }
};
