<div class="row">
    <div class="col-lg-4">
        <div class="card text-white bg-info overflow-hidden">
            <div class="card-body">
                <div class="toll-free-box text-center">
                    <h4><i class="mdi mdi-cash-register"></i> Total Clients</h4>
                    <span>{{$totalClients}}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card text-white bg-danger overflow-hidden">
            <div class="card-body">
                <div class="toll-free-box text-center">
                    <h4><i class=""></i> Total Users</h4>
                    <span>{{$totalUsers}}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card bg-success text-white">
            <div class="card-body">
                <div class="text-center">
                    <h4><i class="mdi mdi-clock-end"></i>Total Admins </h4>
                    <span>{{$totalAdmins}}</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="mt-6 gap-y-4 row">
        <x-chart-widget class="sm:col-span-12">
            <x-slot name="title">Client Requests By Status</x-slot>
            <livewire:livewire-column-chart key="{{ $requestStatus->reactiveKey() }}" :column-chart-model="$requestStatus"/>
        </x-chart-widget>

        <x-chart-widget class="sm:col-span-12">
            <x-slot name="title">Users By Role</x-slot>
            <livewire:livewire-pie-chart key="{{ $userTypes->reactiveKey() }}" :pie-chart-model="$userTypes"/>
        </x-chart-widget>
    <x-chart-widget class="sm:col-span-12">
        <x-slot name="title">Auditors By Seniority Level</x-slot>
        <livewire:livewire-column-chart key="{{ $usersBySeniorityLevel->reactiveKey() }}" :column-chart-model="$usersBySeniorityLevel"/>
    </x-chart-widget>


    <x-chart-widget class="sm:col-span-12">
        <x-slot name="title">Auditors By Specialisation</x-slot>
        <livewire:livewire-column-chart key="{{ $specialisation->reactiveKey() }}" :column-chart-model="$specialisation"/>
    </x-chart-widget>
    <x-chart-widget class="sm:col-span-12">
        <x-slot name="title">Auditors By Contract Status</x-slot>
        <livewire:livewire-column-chart key="{{ $contractStatus->reactiveKey() }}" :column-chart-model="$contractStatus"/>
    </x-chart-widget>
</div>
