<div class="tab-pane fade" id="bid-history">
    <h3  style="padding:5px;">Bid History</h3>

    <table width="100%" class="table table-striped table-bordered table-hover" id="bid-table">
        <thead>
            <tr>
                <th>Transaction ID</th>
                <th>Booking Date</th>
                <th>Game Date</th>
                <th>Game Name</th>
                <th>Bid Number</th>
                <th>Bid Type</th>
                <th>Amount</th>
                <th>Result</th>
                <th>Win Amount</th>
                <th>Result Date</th>
            </tr>
        </thead>
        <tbody>

            @foreach($bidHistory as $bid)
            <tr>
                <th class="center">{{$bid->id}}</th>
                <td>{{ date('d-m-Y H:i:s', strtotime($bid->created_at))}}</td>
                <td>{{$bid->game_date}}</td>
                <td>{{$bid->name}}</td>
                <td>{{sprintf("%02d", $bid->bid_number)}}</td>
                <td>{{$bid->bid_category_id==1? 'Jodi': ($bid->bid_category_id==2?'Ander':'Bahar')}}</td>
                <td>{{$bid->amount}}</td>
                <td>{{$bid->result}}</td>
                <td>{{$bid->win_amount}}</td>
                <td>{{ $bid->result_date=='-'?'-':date('d-m-Y H:i:s', strtotime($bid->result_date))}}</td>
            </tr>
            @endforeach

        </tbody>
    </table>
    <!-- /.table-responsive -->

</div>