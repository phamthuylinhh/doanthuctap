<x-auth-layout>
    <x-slot:title>
        Edit {{ $salary_advances['id'] }} | PL-MK
    </x-slot:title>

    <x-hero :title="'Salary_Advances'" :contr="'salarry_advances'" :ele="'Edit'" />

    <div class="content">
        <form class="js-validation" action="{{ route('salary_advances.update', $salary_advances['id']) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Edit {{ $salary_advances['id'] }}</h3>
                </div>
                <div class="block-content block-content-full">
                    <div class="row items-push flex justify-center">
                        <div class="col-lg-8 col-xl-5 !w-3/5">
                            <x-select :name="'user_id'" :label="'Nhân viên'" :options="$users" :selected="old('user_id')" />

                            <x-input-validate type="number" id="amount" name="'amount" :for="'Số tiền'"
                                placeholder="Số tiền.." :value="old('amount') ?? $salary_advances['amount']" />

                            <x-input-validate id="day" type='date' :for="'Ngày ứng'" :name="'day'"
                                placeholder="Ngày ứng..." :value="old('day') ?? $salary_advances['day']" />

                            <x-input-validate type="text" id="Description" :name="'description'" :for="'Lí do ứng'"
                                :value="old('description')" />

                            <x-select :name="'status'" :label="'Status'" :options="$statuses" :selected="old('status') ?? null" />
                        </div>
                    </div>
                    <!-- Submit -->
                    <div class="row items-push flex justify-center">
                        <div class="col-lg-8 col-xl-5 !w-3/5">
                            <button type="submit" class="btn btn-alt-primary">Submit</button>
                        </div>
                    </div>
                    <!-- END Submit -->

                </div>
            </div>
        </form>
    </div>
</x-auth-layout>
