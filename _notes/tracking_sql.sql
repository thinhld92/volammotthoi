-- Xem top level

select top 20 id, cAccName, gamename, level, 100*exp/expnext as percentexp, exp, expnext,  logtime, ip from top_servers
where id in (Select max(id) as id from top_servers group by cAccName)
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
