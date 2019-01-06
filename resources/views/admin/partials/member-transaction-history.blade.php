<div class="tab-pane fade" id="trans-history">
    <h3 style="padding:5px;">Transaction History</h4>

        <table width="100%" class="table table-striped table-bordered table-hover" id="transaction-tab">
            <thead>
                <tr>
                    <th>From User Account</th>
                    <th>To User Account</th>
                    <th>Amount</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th>Date Time</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transHistory as $trans)
                <tr>
                    <td>{{$trans->from_user_account}}</td>

                    <td>{{$trans->to_user_account}}</td>

                    @if($trans->type =='transfer')
                    <td>{{($trans->from_user_account == $user->user_account?'-':'')}}{{$trans->amount}}</td>
                    @else
                    <td>{{$trans->amount}}</td>
                    @endif
                    @if($trans->type =='transfer')
                    <td>{{ucfirst($trans->type)}} {{($trans->from_user_account == $user->user_account?'Out':'In')}}</td>
                    @else
                    <td>{{ucfirst($trans->type)}} </td>
                    @endif

                    <td>{{$trans->status==0?'Pending':'Completed' }}</td>
                    <td>{{ date('d-m-Y H:i:s', strtotime($trans->created_at))}}</td>

                </tr>
                @endforeach

            </tbody>
        </table>

        <!-- /.table-responsive -->

</div>