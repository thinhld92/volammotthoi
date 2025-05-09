USE [SHXT2]
GO

/****** Object:  Table [dbo].[Account_Info]    Script Date: 12/09/2023 10:17:44 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

SET ANSI_PADDING ON
GO

CREATE TABLE [dbo].[Account_Info](
	[iid] [bigint] IDENTITY(1,1) NOT NULL,
	[cAccName] [varchar](32) NOT NULL,
	[cPassWord] [varchar](99) NOT NULL,
	[cSecPassword] [varchar](99) NULL,
	[cRealName] [nvarchar](50) NULL,
	[dBirthDay] [datetime] NULL,
	[cArea] [varchar](60) NULL,
	[cIDNum] [varchar](30) NULL,
	[dRegDate] [datetime] NULL,
	[cPhone] [varchar](50) NULL,
	[iClientID] [bigint] NULL,
	[dLoginDate] [varchar](20) NULL,
	[dLogoutDate] [varchar](20) NULL,
	[iTimeCount] [tinyint] NULL,
	[cQuestion] [varchar](250) NULL,
	[cAnswer] [varchar](250) NULL,
	[cSex] [varchar](4) NULL,
	[cDegree] [varchar](16) NULL,
	[cEMail] [varchar](128) NULL,
	[iLock] [int] NULL,
	[gCode] [int] NULL,
	[nMac] [int] NULL,
	[remember_token] [nvarchar](100) NULL,
 CONSTRAINT [PK_Account_Info] PRIMARY KEY CLUSTERED 
(
	[iid] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]

GO

SET ANSI_PADDING OFF
GO

ALTER TABLE [dbo].[Account_Info] ADD  CONSTRAINT [DF_Account_Info_dRegDate]  DEFAULT (getdate()) FOR [dRegDate]
GO

ALTER TABLE [dbo].[Account_Info] ADD  CONSTRAINT [DF__Account_I__iGame__77BFCB91]  DEFAULT ((0)) FOR [iClientID]
GO

ALTER TABLE [dbo].[Account_Info] ADD  CONSTRAINT [DF_Account_Info_iLock]  DEFAULT ((0)) FOR [iLock]
GO

ALTER TABLE [dbo].[Account_Info] ADD  CONSTRAINT [DF_Account_Info_gCode]  DEFAULT ((0)) FOR [gCode]
GO

-- insert 20 acc 1-20


insert into Account_Info (cAccName, cPassWord, cSecPassword)
values ('bando1', 'FBADE9E36A3F36D3D676C1B808451DD7', 'FBADE9E36A3F36D3D676C1B808451DD7'),
('bando2', 'FBADE9E36A3F36D3D676C1B808451DD7', 'FBADE9E36A3F36D3D676C1B808451DD7'),
('bando3', 'FBADE9E36A3F36D3D676C1B808451DD7', 'FBADE9E36A3F36D3D676C1B808451DD7'),
('bando4', 'FBADE9E36A3F36D3D676C1B808451DD7', 'FBADE9E36A3F36D3D676C1B808451DD7'),
('bando5', 'FBADE9E36A3F36D3D676C1B808451DD7', 'FBADE9E36A3F36D3D676C1B808451DD7'),
('bando6', 'FBADE9E36A3F36D3D676C1B808451DD7', 'FBADE9E36A3F36D3D676C1B808451DD7'),
('bando7', 'FBADE9E36A3F36D3D676C1B808451DD7', 'FBADE9E36A3F36D3D676C1B808451DD7'),
('bando8', 'FBADE9E36A3F36D3D676C1B808451DD7', 'FBADE9E36A3F36D3D676C1B808451DD7'),
('bando9', 'FBADE9E36A3F36D3D676C1B808451DD7', 'FBADE9E36A3F36D3D676C1B808451DD7'),
('bando10', 'FBADE9E36A3F36D3D676C1B808451DD7', 'FBADE9E36A3F36D3D676C1B808451DD7'),
('bando11', 'FBADE9E36A3F36D3D676C1B808451DD7', 'FBADE9E36A3F36D3D676C1B808451DD7'),
('bando12', 'FBADE9E36A3F36D3D676C1B808451DD7', 'FBADE9E36A3F36D3D676C1B808451DD7'),
('bando13', 'FBADE9E36A3F36D3D676C1B808451DD7', 'FBADE9E36A3F36D3D676C1B808451DD7'),
('bando14', 'FBADE9E36A3F36D3D676C1B808451DD7', 'FBADE9E36A3F36D3D676C1B808451DD7'),
('bando15', 'FBADE9E36A3F36D3D676C1B808451DD7', 'FBADE9E36A3F36D3D676C1B808451DD7'),
('bando16', 'FBADE9E36A3F36D3D676C1B808451DD7', 'FBADE9E36A3F36D3D676C1B808451DD7'),
('bando17', 'FBADE9E36A3F36D3D676C1B808451DD7', 'FBADE9E36A3F36D3D676C1B808451DD7'),
('bando18', 'FBADE9E36A3F36D3D676C1B808451DD7', 'FBADE9E36A3F36D3D676C1B808451DD7'),
('bando19', 'FBADE9E36A3F36D3D676C1B808451DD7', 'FBADE9E36A3F36D3D676C1B808451DD7'),
('bando20', 'FBADE9E36A3F36D3D676C1B808451DD7', 'FBADE9E36A3F36D3D676C1B808451DD7'),
('bando21', 'FBADE9E36A3F36D3D676C1B808451DD7', 'FBADE9E36A3F36D3D676C1B808451DD7'),
('bando22', 'FBADE9E36A3F36D3D676C1B808451DD7', 'FBADE9E36A3F36D3D676C1B808451DD7'),
('bando23', 'FBADE9E36A3F36D3D676C1B808451DD7', 'FBADE9E36A3F36D3D676C1B808451DD7'),
('bando24', 'FBADE9E36A3F36D3D676C1B808451DD7', 'FBADE9E36A3F36D3D676C1B808451DD7'),
('bando25', 'FBADE9E36A3F36D3D676C1B808451DD7', 'FBADE9E36A3F36D3D676C1B808451DD7'),
('bando26', 'FBADE9E36A3F36D3D676C1B808451DD7', 'FBADE9E36A3F36D3D676C1B808451DD7'),
('bando27', 'FBADE9E36A3F36D3D676C1B808451DD7', 'FBADE9E36A3F36D3D676C1B808451DD7'),
('bando28', 'FBADE9E36A3F36D3D676C1B808451DD7', 'FBADE9E36A3F36D3D676C1B808451DD7'),
('bando29', 'FBADE9E36A3F36D3D676C1B808451DD7', 'FBADE9E36A3F36D3D676C1B808451DD7'),
('bando30', 'FBADE9E36A3F36D3D676C1B808451DD7', 'FBADE9E36A3F36D3D676C1B808451DD7');

insert into Account_Habitus(cAccName, iFlag, dBeginDate, dEndDate)
values ('bando1', '0', '2024-01-13', '2026-01-15'),
('bando2', '0', '2024-01-13', '2026-01-15'),
('bando3', '0', '2024-01-13', '2026-01-15'),
('bando4', '0', '2024-01-13', '2026-01-15'),
('bando5', '0', '2024-01-13', '2026-01-15'),
('bando6', '0', '2024-01-13', '2026-01-15'),
('bando7', '0', '2024-01-13', '2026-01-15'),
('bando8', '0', '2024-01-13', '2026-01-15'),
('bando9', '0', '2024-01-13', '2026-01-15'),
('bando10', '0', '2024-01-13', '2026-01-15'),
('bando11', '0', '2024-01-13', '2026-01-15'),
('bando12', '0', '2024-01-13', '2026-01-15'),
('bando13', '0', '2024-01-13', '2026-01-15'),
('bando14', '0', '2024-01-13', '2026-01-15'),
('bando15', '0', '2024-01-13', '2026-01-15'),
('bando16', '0', '2024-01-13', '2026-01-15'),
('bando17', '0', '2024-01-13', '2026-01-15'),
('bando18', '0', '2024-01-13', '2026-01-15'),
('bando19', '0', '2024-01-13', '2026-01-15'),
('bando20', '0', '2024-01-13', '2026-01-15'),
('bando21', '0', '2024-01-13', '2026-01-15'),
('bando22', '0', '2024-01-13', '2026-01-15'),
('bando23', '0', '2024-01-13', '2026-01-15'),
('bando24', '0', '2024-01-13', '2026-01-15'),
('bando25', '0', '2024-01-13', '2026-01-15'),
('bando26', '0', '2024-01-13', '2026-01-15'),
('bando27', '0', '2024-01-13', '2026-01-15'),
('bando28', '0', '2024-01-13', '2026-01-15'),
('bando29', '0', '2024-01-13', '2026-01-15'),
('bando30', '0', '2024-01-13', '2026-01-15');



insert into Account_Info (cAccName, cPassWord, cSecPassword)
values 
('achinha1', 'E10ADC3949BA59ABBE56E057F20F883E', 'E10ADC3949BA59ABBE56E057F20F883E'),
('achinha2', 'E10ADC3949BA59ABBE56E057F20F883E', 'E10ADC3949BA59ABBE56E057F20F883E'),
('achinha3', 'E10ADC3949BA59ABBE56E057F20F883E', 'E10ADC3949BA59ABBE56E057F20F883E'),
('achinha4', 'E10ADC3949BA59ABBE56E057F20F883E', 'E10ADC3949BA59ABBE56E057F20F883E'),
('achinha5', 'E10ADC3949BA59ABBE56E057F20F883E', 'E10ADC3949BA59ABBE56E057F20F883E'),
('achinha6', 'E10ADC3949BA59ABBE56E057F20F883E', 'E10ADC3949BA59ABBE56E057F20F883E'),
('achinha7', 'E10ADC3949BA59ABBE56E057F20F883E', 'E10ADC3949BA59ABBE56E057F20F883E'),
('achinha8', 'E10ADC3949BA59ABBE56E057F20F883E', 'E10ADC3949BA59ABBE56E057F20F883E'),
('achinha9', 'E10ADC3949BA59ABBE56E057F20F883E', 'E10ADC3949BA59ABBE56E057F20F883E'),
('achinha10', 'E10ADC3949BA59ABBE56E057F20F883E', 'E10ADC3949BA59ABBE56E057F20F883E'),
('achinha11', 'E10ADC3949BA59ABBE56E057F20F883E', 'E10ADC3949BA59ABBE56E057F20F883E'),
('achinha12', 'E10ADC3949BA59ABBE56E057F20F883E', 'E10ADC3949BA59ABBE56E057F20F883E'),
('achinha13', 'E10ADC3949BA59ABBE56E057F20F883E', 'E10ADC3949BA59ABBE56E057F20F883E'),
('achinha14', 'E10ADC3949BA59ABBE56E057F20F883E', 'E10ADC3949BA59ABBE56E057F20F883E'),
('achinha40', 'E10ADC3949BA59ABBE56E057F20F883E', 'E10ADC3949BA59ABBE56E057F20F883E');


insert into Account_Habitus(cAccName, iFlag, dBeginDate, dEndDate)
values 
('achinha1', '0', '2024-03-24', '2026-01-15'),
('achinha2', '0', '2024-03-24', '2026-01-15'),
('achinha3', '0', '2024-03-24', '2026-01-15'),
('achinha4', '0', '2024-03-24', '2026-01-15'),
('achinha5', '0', '2024-03-24', '2026-01-15'),
('achinha6', '0', '2024-03-24', '2026-01-15'),
('achinha7', '0', '2024-03-24', '2026-01-15'),
('achinha8', '0', '2024-03-24', '2026-01-15'),
('achinha9', '0', '2024-03-24', '2026-01-15'),
('achinha10', '0', '2024-03-24', '2026-01-15'),
('achinha11', '0', '2024-03-24', '2026-01-15'),
('achinha12', '0', '2024-03-24', '2026-01-15'),
('achinha13', '0', '2024-03-24', '2026-01-15'),
('achinha14', '0', '2024-03-24', '2026-01-15'),
('achinha15', '0', '2024-03-24', '2026-01-15'),
('achinha16', '0', '2024-03-24', '2026-01-15'),
('achinha17', '0', '2024-03-24', '2026-01-15'),
('achinha18', '0', '2024-03-24', '2026-01-15'),
('achinha19', '0', '2024-03-24', '2026-01-15'),
('achinha20', '0', '2024-03-24', '2026-01-15'),
('achinha21', '0', '2024-03-24', '2026-01-15'),
('achinha22', '0', '2024-03-24', '2026-01-15'),
('achinha23', '0', '2024-03-24', '2026-01-15'),
('achinha24', '0', '2024-03-24', '2026-01-15'),
('achinha25', '0', '2024-03-24', '2026-01-15'),
('achinha26', '0', '2024-03-24', '2026-01-15'),
('achinha27', '0', '2024-03-24', '2026-01-15'),
('achinha28', '0', '2024-03-24', '2026-01-15'),
('achinha29', '0', '2024-03-24', '2026-01-15'),
('achinha30', '0', '2024-03-24', '2026-01-15'),
('achinha31', '0', '2024-03-24', '2026-01-15'),
('achinha32', '0', '2024-03-24', '2026-01-15'),
('achinha33', '0', '2024-03-24', '2026-01-15'),
('achinha34', '0', '2024-03-24', '2026-01-15'),
('achinha35', '0', '2024-03-24', '2026-01-15'),
('achinha36', '0', '2024-03-24', '2026-01-15'),
('achinha37', '0', '2024-03-24', '2026-01-15'),
('achinha38', '0', '2024-03-24', '2026-01-15'),
('achinha39', '0', '2024-03-24', '2026-01-15'),
('achinha40', '0', '2024-03-24', '2026-01-15');



