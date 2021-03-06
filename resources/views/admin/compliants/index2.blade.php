@extends('layouts.adminApp')

@section('pageTitle', 'Manage Compliants')


@section('dashBoardTitleIcon')
<i class="pe-7s-graph icon-gradient bg-ripe-malin"></i>
@endsection

@section('dashboardTitle')
    My Compliants
@endsection



@section('compliantsActive')
    class="mm-active"
@endsection

@section('MyCompliantsActive')
    class="mm-active"
@endsection
   
@section('content')

<div class="main-card mb-3 card">
    <div class="card-body">
        <div class="table-responsive"> 
        <table style="width: 100%;" id="datatablesg" class="table table-hover table-striped table-bordered">
            <thead>
            <tr>
                <th>S/No</th>
                <th hidden>Slug</th>
                <th>Created By</th>
                <th>Order ID</th>
                <th>Created Date</th>
                <th>Handler</th>
                <th class="text-center">Status</th>
                <th class="text-center">Action</th>
            </tr>
            </thead>
            <tbody>
            @php
            $i=1;
            @endphp
            @foreach($allCompliantData as $compliantData)
            <tr>
                <td>{{$i}}</td>
                <td hidden>{{$compliantData->slug}}</td>
                <td>{{ucfirst($compliantData->order->owner->name)}}</td>
                <td>10000{{$compliantData->order->id}}</td>
                <td>{{formatDate($compliantData->created_at)}}</td>
                <td>{{$compliantData->adminName ? $compliantData->adminName->name : 'Not Assigned Yet'}}</td>
                <td class="text-center">
                    @if($compliantData->status == '0')
                        <button class="mb-2 mr-2 btn-pill btn btn-sm btn-gradient-warning">Pending</button>
                    @elseif($compliantData->status == '1')
                        <button class="mb-2 mr-2 btn-pill btn btn-sm btn-gradient-success">Resolved</button>
                    @endif
                </td>
                <td class="text-center">
                <a href="/admin/compliants-view/{{$compliantData->slug}}"><button class="mb-2 mr-2 btn-pill btn btn-sm btn-gradient-info">VIEW</button></a>
                
                </td>
                
                
            </tr>
            @php
            $i++;
            @endphp
            @endforeach
            
            
            </tbody>
            <tfoot>
            <tr>
                <th>S/No</th>
                <th hidden>Slug</th>
                <th>Created By</th>
                <th>Order ID</th>
                <th>Created Date</th>
                <th>Handler</th>
                <th class="text-center">Status</th>
                <th class="text-center">Action</th>
            </tr>
            </tfoot>
        </table>
        </div>
    </div>
</div>



@endsection

@section('extraJS')
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>

<script>
    
        $(document).ready(function() {
    var table = $('#datatablesg').DataTable();
    
    table.on('click', '.assignCompliant', function() {
        $tr = $(this).closest('tr');
        if ($($tr).hasClass('child')) {
            $tr = $tr.prev('.parent');
        }

        var data = table.row($tr).data();

        console.log(data);
        $('#adminSlug').val(data[1]);
        document.getElementById("route").action = "/admin/compliant-assignAdmin/" + data[1];
   

    })
});
</script>

@endsection

