<<<<<<< HEAD
---
module: theme
topic: mcp_server_recommended
canonical: ../../../Themes/docs/shared-components/mcp-server-recommended-Modules.md
---

See canonical documentation: ../../../Themes/docs/shared-components/mcp-server-recommended-Modules.md
=======
# MCP Server Consigliati per il Modulo Gdpr

## Scopo del Modulo
Gestione privacy, consensi e compliance GDPR.

## Server MCP Consigliati
- `filesystem`: Per archiviazione consensi e log privacy.
- `memory`: Per gestione temporanea delle sessioni di consenso.

## Configurazione Minima Esempio
```json
{
  "mcpServers": {
    "filesystem": { "command": "npx", "args": ["-y", "@modelcontextprotocol/server-filesystem"] },
    "memory": { "command": "npx", "args": ["-y", "@modelcontextprotocol/server-memory"] }
  }
}
```

## Note
- Adatta la configurazione a seconda dei requisiti di compliance e audit.
>>>>>>> 2ae5567 (.)
