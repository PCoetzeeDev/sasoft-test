<div style="text-align: center">
    @foreach ($employees as $employee)
        {{ $employee->first_name }}
    @endforeach

    {{ $employees->links() }}
</div>
