<div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 sasoft-modal-background">
    <h1 class="mb-2 mt-0 text-5xl font-medium leading-tight text-primary text-center">
        Edit Employee
    </h1>
    <form class="w-full max-w-lg">

        @include('livewire.employees.modal.basic-info')
        @include('livewire.employees.modal.address-info', ['address' => $address])
        @include('livewire.employees.modal.skills', ['employee' => $employee])

    </form>
</div>
