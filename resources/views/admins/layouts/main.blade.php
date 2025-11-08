@if(request('action') == 'trangtongquan')
    @include('admins.Dashboard.index')
@elseif(request('action') == 'quanlynhanvien')
    @include('admins.Employee.index')
@elseif(request('action') == 'quanlysinhvien')
    @include('admins.Student.index')
@else
    
@endif