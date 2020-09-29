use guild;

select sum(j.salary) as `total annual income`, sum(ba.balance) as `bank balance`
from applications a
join borrowers b on a.borrower_id = b.id
join jobs j on b.job_id = j.id
left join bank_accounts ba on b.bank_accounts_id = ba.id
where a.loan_application_id = 1
group by a.loan_application_id;

select count(b.id) 
from applications a
join bank_accounts b on a.borrower_id = b.borrower_id
group by loan_application_id;

/*
#use guild;
CREATE USER 'guild'@'localhost' IDENTIFIED BY 'guild';
GRANT ALL PRIVILEGES ON *.* TO 'guild'@'localhost' WITH GRANT OPTION;
*/
CREATE USER 'guild'@'localhost' IDENTIFIED BY 'guild';
GRANT ALL PRIVILEGES ON *.* TO 'guild'@'localhost' WITH GRANT OPTION;

select user from mysql.user;