# Ponytail-audit 2026-07-02: Gdpr Registration/Validation/Consent Actions

## Finding under review

A ponytail-audit (over-engineering scan) flagged:

> shrink: `Modules/Gdpr/app/Actions/Registration/`, `Modules/Gdpr/app/Actions/Validation/`,
> `Modules/Gdpr/app/Actions/Consent/` split 7 tiny single-purpose Action classes into 3
> sub-namespaces for what is straightforward request-handling logic; each Action is a thin
> wrapper. Proposed: merge into fewer classes.

## Conclusion: NO CODE CHANGE — finding conflicts with the ratified "Actions over Services" rule

This repo has a ratified architecture rule (GitHub discussions #82/#83 in the root
`base_quaeris_fila5` repo): business logic MUST live in single-purpose
`spatie/laravel-queueable-action` Action classes, each with exactly one `execute()` method,
and must NEVER be consolidated into multi-purpose Service-style classes. The ponytail
"shrink" instinct (merge small classes to reduce file count) is the literal opposite of this
rule when applied to Actions that are each already doing one distinct thing.

## Per-class review

| Class | Namespace | Responsibility | Verdict |
|---|---|---|---|
| `HandleRegistrationErrorAction` | `Registration` | Logs a registration exception and shows a Filament danger notification | Single purpose, keep |
| `HandleSuccessfulRegistrationAction` | `Registration` | Logs the user in, shows success notification, redirects to dashboard | Single purpose, keep |
| `ValidateGdprConsentAction` | `Validation` | Validates `privacy_accepted`/`terms_accepted` booleans against Laravel `accepted` rule, throws `ValidationException` | Single purpose, keep |
| `ValidateUserDataAction` | `Validation` | Casts/sanitizes registration form data, checks email uniqueness, hashes password, returns a normalized array ready for `User::create()` | Single purpose, keep |
| `CollectGdprConsentsAction` | `Consent` | Packs three consent booleans into an associative array | Single purpose, keep |

Each Action:
- has a distinct signature and distinct responsibility (no two Actions do the same kind of
  operation on different fields — they are not parameterization candidates),
- is called from exactly one call site (`Modules/Gdpr/app/Filament/Widgets/Auth/RegisterWidget.php`
  and `Modules/Gdpr/app/Filament/Widgets/Auth/GdprConsentForm.php`),
- has its own dedicated unit test in `Modules/Gdpr/tests/Unit/Actions/`,
- already uses `Spatie\QueueableAction\QueueableAction` per the repo's Actions-over-Services
  convention.

Merging any two of these (e.g. `ValidateGdprConsentAction` + `ValidateUserDataAction`, or the
two `Registration` handlers into one "HandleRegistrationAction($success, $error)") would
produce a multi-purpose Action with branching behavior — exactly the God-action anti-pattern
the Actions-over-Services rule exists to prevent. "Thin wrapper" is not evidence of
over-engineering here; it is the intended shape of a QueueableAction under this rule.

## Call-site check

Grepped `Modules/Gdpr` and the rest of `/var/www/_bases/base_quaeris_fila5/laravel` for all
five class names. No other module references them; each is used only inside `Modules/Gdpr`
Filament widgets. No orphaned/duplicate call sites found, so there is nothing to consolidate
from a "reduce call-site fan-out" angle either.

## Verification

- `./vendor/bin/phpstan analyse Modules/Gdpr` — could not complete: Laravel bootstrap fails
  repo-wide with `include(.../Modules/Xot/app/Contracts/ModelContract.php): Failed to open
  stream: No such file or directory`. This is a pre-existing environment/autoload issue
  unrelated to the Gdpr Actions reviewed here (no code in this review was changed). Not fixed
  as part of this audit — out of scope.
- `php tools/phpmd.phar Modules/Gdpr text cleancode,codesize,controversial,design,naming,unusedcode`
  — ran successfully. Zero findings against any of the 5 reviewed Action classes or their
  namespaces (`Actions/Registration`, `Actions/Validation`, `Actions/Consent`). All reported
  findings are in unrelated files (`Models/Policies/*`, `Providers/*`, `Models/Traits/HasGdpr.php`,
  test helpers) and pre-date this review.
- `phpinsights` — skipped, no code changed, phpmd already confirms no design/codesize
  complaints on the reviewed classes.
- Pest — skipped, DB unreachable in this environment (per task instructions, not run).
- Puppeteer/Playwright — skipped, this is backend-only request-handling logic with no UI
  surface to drive.

## Outcome

No code was modified. This document exists so a future ponytail-audit pass does not
re-flag the same finding: the Actions/Registration, Actions/Validation, and Actions/Consent
split is intentional and required by the Actions-over-Services rule, not incidental
over-engineering.
