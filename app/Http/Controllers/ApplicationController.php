<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Application;

class ApplicationController extends Controller
{
    public function show($id)
    {

        /*
         * raw sql query:
         *
         * select sum(j.salary) as `total annual income`, sum(ba.balance) as `bank balance`
            from applications a
            join borrowers b on a.borrower_id = b.id
            join jobs j on b.job_id = j.id
            left join bank_accounts ba on b.bank_accounts_id = ba.id
            where a.loan_application_id = {id}
            group by a.loan_application_id;

         */

        /*
         * api call test
         * curl -X GET http://localhost/applications/1 \
         */
        $summary = \DB::table('applications')
            ->select(\DB::raw('sum(jobs.salary) as `total annual income`, sum(bank_accounts.balance) as `bank balance`'))
            ->join('borrowers', 'borrowers.id', '=', 'applications.borrower_id')
            ->join('jobs', 'jobs.id', '=', 'borrowers.job_id')
            ->leftJoin('bank_accounts', 'bank_accounts.id', '=', 'borrowers.bank_accounts_id')
            ->where('applications.loan_application_id', '=', $id)
            ->groupBy('applications.loan_application_id')
            ->get();

        return response()->json($summary, 201);
    }


}
