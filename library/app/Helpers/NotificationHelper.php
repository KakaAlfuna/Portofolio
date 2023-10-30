<?php

// app/Helpers/NotificationHelper.php

use App\Models\Transaction;
use Carbon\Carbon;

function getLateTransactions()
{
    return Transaction::where('date_end', '<', Carbon::now()->toDateString())->get();
}
?>