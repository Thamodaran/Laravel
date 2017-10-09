@extends('layouts.app')

@section('content')

<div class="container">
    <!-- Current Tasks -->    
    <div class="panel panel-default">
        <div class="panel-heading">
            Current Tasks
        </div>

        <div class="panel-body">
            <table class="table table-striped task-table">
                <thead>
                <th>Name</th>
                <th>Amount</th>
                <th>Talu amount</th>
                <th>To be paid</th>
                <th>Amount recived</th>
                <th>Balance</th>
                <th>Action</th>
                </thead>
                <tbody>
                    @if (count($monthlylist) > 0)
                        @foreach ($monthlylist as $monthly)
                        <tr>
                            <td class="table-text"><div>{{ $monthly->name }}</div></td>
                            <td class="table-text"><div>{{ $monthly->amount }}</div></td>
                            <td class="table-text"><div>{{ $monthly->talu_amount }}</div></td>
                            <td class="table-text"><div>{{ $monthly->to_be_paid }}</div></td>
                            <td class="table-text"><div>{{ $monthly->amount_recived }}</div></td>
                            <td class="table-text"><div>{{ $monthly->balance }}</div></td>
                            <!-- Task Delete Button -->
                            <td>
                                <form action="{{ url('monthlylist/'.$monthly->monthly_id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-btn fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="7">No Users Found...</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
@endsection
