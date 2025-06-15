BACKUP DATABASE MongKiemHiep TO  DISK = N'C:\MongKiemHiep.bak' WITH  INIT , NOUNLOAD ,  NAME = N'MongKiemHiep backup',  STATS = 10,  FORMAT


BACKUP DATABASE DaoHiepKhach TO  DISK = N'C:\DaoHiepKhach.bak' WITH  INIT , NOUNLOAD ,  NAME = N'DaoHiepKhach backup',  STATS = 10,  FORMAT

BACKUP DATABASE GiangHoKiem TO  DISK = N'C:\GiangHoKiem.bak' WITH  INIT , NOUNLOAD ,  NAME = N'GiangHoKiem backup',  STATS = 10,  FORMAT

BACKUP DATABASE TuyetPhamX3 TO  DISK = N'C:\TuyetPhamX3.bak' WITH  INIT , NOUNLOAD ,  NAME = N'TuyetPhamX3 backup',  STATS = 10,  FORMAT

$config['licenseName'] = 'tuyetphamx3.com';
$config['licenseKey']  = 'AQCQ1P7272RJV84NX7LHWCECLEXDR';

$config['licenseName'] = 'daohiepkhach.net';
$config['licenseKey']  = '62P2BF132FCWV3HTP37SFLNUTRQCC';

$config['licenseName'] = 'mongkiemhiep.com';
$config['licenseKey']  = 'AT2TRR3TGM721HHCTTSMAPYKPH3FU';


CREATE INDEX idx_log_users_cAccName ON log_users (cAccName);
CREATE INDEX idx_log_users_ip ON log_users (ip);