<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ApplicationTest extends TestCase
{
    /** @test  */
    public function application_has_bank_account()
    {
     /*
    select count(b.id)
    from applications a
    join bank_accounts b on a.borrower_id = b.borrower_id
    where a.loan_application_id = 1
    group by loan_application_id;
     */

        $count = \DB::table('applications')
            ->join('bank_accounts', 'applications.borrower_id', '=', 'bank_accounts.borrower_id')
            ->where('applications.loan_application_id', '=', 1)
            ->count();

        $this->assertGreaterThanOrEqual($count, 1);

    }


}
