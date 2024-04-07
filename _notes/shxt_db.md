enable trigger drop_table, ko cho drop

USE [SHXT2]
GO

/**\*\*** Object: DdlTrigger [drop_table] Script Date: 12/08/2023 12:17:19 **\*\***/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE TRIGGER [drop_table]
ON DATABASE
FOR DROP_TABLE
AS
BEGIN
set nocount on;
PRINT 'Access'
ROLLBACK;
END
GO

SET ANSI_NULLS OFF
GO

SET QUOTED_IDENTIFIER OFF
GO

DISABLE TRIGGER [drop_table] ON DATABASE
GO

ENABLE TRIGGER [drop_table] ON DATABASE
GO
