# 🧬 Schemaless Attributes in Gdpr Module

**Status:** ✅ STANDARD
**Reference:** [Global Rules](../../Xot/docs/schemaless-attributes-rules.md)

---

## 🎯 Utilizzo

Il modulo Gdpr deve seguire rigorosamente gli standard globali definiti in `Modules/Xot`.

### Checklist
- [ ] Usare `SchemalessAttributesTrait`.
- [ ] Usare colonna `extra_attributes`.
- [ ] Usare `casts()` method.
- [ ] NON implementare scope manuali.

### Esempio
```php
class Consent extends BaseModel
{
    use SchemalessAttributesTrait;
    
    protected function casts(): array
    {
        return [
            'extra_attributes' => SchemalessAttributes::class,
        ];
    }
}
```
