-- Xem top level

select top 30 id, cAccName, gamename, level, 100*exp/expnext as percentexp, faction,  logtime, ip from top_servers
where id in (Select max(id) as id from top_servers group by cAccName)
order by level desc, exp desc

-- check ip
select top 30 s.id, s.cAccName, gamename, level, 100*exp/expnext as percentexp, u.ip, logtime from top_servers s
inner join log_users u on s.cAccName = u.cAccName and u.type=1
where s.id in (Select max(id) as id from top_servers group by cAccName)
order by level desc, exp desc


-- xem log xu
SELECT * FROM log_account_habituses 
where id in (Select max(id) as id from log_account_habituses group by cAccName)
order by logtime desc

-- xem tổng xu hiện có
Select SUM(coin) FROM log_account_habituses 
where id in (Select max(id) as id from log_account_habituses group by cAccName)


select top 1 id, cAccName, gamename, level, 100*exp/expnext as percentexp, exp, expnext,  logtime, ip, faction from top_servers
where id in (Select max(id) as id from top_servers group by cAccName)
and faction = 'TL'
and id not in (select top 10 id from top_servers
where id in (Select max(id) as id from top_servers group by cAccName)
order by level desc, exp desc)
order by level desc, exp desc

select * from tai_xius


-- top level theo ip
WITH RankedAccounts AS (
    SELECT 
        s.id, 
        s.cAccName, 
        gamename, 
        level, 
        100 * exp / expnext AS percentexp, 
        u.ip, 
        s.faction,
        logtime,
        ROW_NUMBER() OVER (PARTITION BY u.ip ORDER BY level DESC, exp DESC) AS rank
    FROM top_servers s
    INNER JOIN log_users u ON s.cAccName = u.cAccName AND u.type = 1
    WHERE  s.id IN (SELECT MAX(id) FROM top_servers GROUP BY cAccName)
)
SELECT id, cAccName, gamename, level, percentexp, faction, logtime, ip
FROM RankedAccounts
WHERE rank = 1
ORDER BY level DESC, percentexp DESC;


select ip, COUNT(cAccName) from log_users 
where created_at > '2024-12-09'
group by ip
order by COUNT(cAccName)desc

select * from log_users where ip = '171.224.180.17'

select SUM(amount), cAccName from payments
where created_at > '2024-10-01'
and created_at < '2025-01-30'
and status = 4
group by cAccName
order by SUM(amount) desc


select ip, Count(cAccName) from log_users
where type = 1
group by ip
order by Count(cAccName) desc

select * from log_users where ip = '171.243.60.147' and type = 1 order by cAccName

select * from log_users where cAccName like 'thiensky%' and type = 1 order by cAccName


update Account_Habitus set dEndDate = '2025-01-01' where cAccName in (
'ngami13',
'ngami14',
'ngami20'
);


select * from log_users 
where ip in ('14.245.197.23', '14.185.81.46', '113.168.80.44', '1.55.172.196', 
'104.28.210.248','116.98.255.32', '42.113.201.198', '117.6.227.213', '14.185.212.131', 
'104.28.205.70', '104.28.205.71', '104.28.237.72', '104.28.249.53', '104.28.249.54', '14.245.101.18',
'118.68.202.1', '42.117.65.53','42.112.118.228', '42.119.201.0', '104.28.210.249', '104.28.227.232', 
'104.28.227.233', '42.116.241.31') and type = 1 order by cAccName

select * from log_users 
where ip in ('171.236.58.85') and type = 1 order by cAccName

select * from log_users where cAccName like 'nhandt5%' and type = 1 order by cAccName

select ip from log_users 
where cAccName in ('anhtuanbcc',
'anhtuanbcc6',
'anhtuanbcc8',
'anhtuanbcc9',
'hiepkhach003',
'hiepkhach005',
'hiepkhach008',
'hiepkhach010',
'luongphuoc1',
'luongphuoc2',
'luongphuoc3',
'luongphuoc4',
'tybum20191',
'tybum20192',
'tybum20193',
'tybum20194',
'hiepkhach001',
'hiepkhach006',
'hiepkhach009',
'kiemkhach78',
'anhtuanbcc1',
'anhtuanbcc2',
'anhtuanbcc3',
'anhtuanbcc4',
'hiepkhach002',
'hiepkhach004',
'hiepkhach007',
'hiepkhach011');



