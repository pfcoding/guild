use guild;

select sum(j.salary) as `total annual income`, sum(ba.balance) as `bank balance`
from applications a
join borrowers b on a.borrower_id = b.id
join jobs j on b.job_id = j.id
left join bank_accounts ba on b.bank_accounts_id = ba.id
group by a.loan_application_id;

select count(b.id) 
from applications a
join bank_accounts b on a.borrower_id = b.borrower_id
group by loan_application_id;