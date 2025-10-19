# Migration error when using neon-db as posgresql DB
1. Always use a direction connection for migrations
2. A pooled connection string connects your application to the database via a PgBouncer connection pool, allowing for a higher number of concurrent connections. However, using a pooled connection string for migrations can be prone to errors. For this reason, we recommend using a direct (non-pooled) connection when performing migrations.

# Example 
## error version
PGHOST='xyz-zyz-wave-a1cumhxv-pooler.ap-southeast-1.aws.neon.tech'
PGDATABASE='neondb'
PGUSER='neondb_owner'
PGPASSWORD='npg_testpassword'
PGSSLMODE='require'
PGCHANNELBINDING='require'

## correct version 
PGHOST='xyz-zyz-wave-a1cumhxv.ap-southeast-1.aws.neon.tech'
PGDATABASE='neondb'
PGUSER='neondb_owner'
PGPASSWORD='npg_testpassword'
PGSSLMODE='require'
PGCHANNELBINDING='require'

remove [-pooler] from host url while migration