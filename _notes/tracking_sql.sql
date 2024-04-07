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