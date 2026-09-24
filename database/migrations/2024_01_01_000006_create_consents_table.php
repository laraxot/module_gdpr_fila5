<?php

declare(strict_types=1);
<<<<<<< .merge_file_VZyBR5

=======
<<<<<<< .merge_file_5pgpk6

=======
<<<<<<< .merge_file_sRi8t4

=======
>>>>>>> .merge_file_9aAi3J
>>>>>>> .merge_file_5qfLo2
>>>>>>> .merge_file_RvRMkV
use Illuminate\Database\Schema\Blueprint;
use Modules\Gdpr\Models\Consent;
use Modules\Xot\Database\Migrations\XotBaseMigration;

/*
 * Adds the columns HasGdpr::giveConsent()/revokeConsent() have always written to
 * (metadata, revoked_at, revoked_ip_address) but that no prior consents migration
 * ever created — calling those trait methods previously threw a SQL error.
 */
<<<<<<< .merge_file_VZyBR5
return new class extends XotBaseMigration {
=======
<<<<<<< .merge_file_5pgpk6
return new class extends XotBaseMigration {
=======
<<<<<<< .merge_file_sRi8t4
return new class extends XotBaseMigration {
=======
return new class extends XotBaseMigration
{
>>>>>>> .merge_file_9aAi3J
>>>>>>> .merge_file_5qfLo2
>>>>>>> .merge_file_RvRMkV
    protected ?string $model_class = Consent::class;

    public function up(): void
    {
        $this->tableUpdate(function (Blueprint $table): void {
            if (! $this->hasColumn('metadata')) {
                $table->json('metadata')->nullable();
            }
            if (! $this->hasColumn('revoked_at')) {
                $table->timestamp('revoked_at')->nullable();
            }
            if (! $this->hasColumn('revoked_ip_address')) {
                $table->string('revoked_ip_address', 45)->nullable();
            }
        });
    }
};
