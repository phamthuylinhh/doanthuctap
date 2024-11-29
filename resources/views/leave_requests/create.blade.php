<x-auth-layout>
    <x-slot:title>
        Create Leave-Request
    </x-slot:title>

    <x-hero :title="' Leave-Request'" :contr="'leave_request'" :ele="'Edit'" />

    <div class="content">
        <form class="js-validation" action="{{ route('leave_requests.store') }}" method="POST">
            @csrf
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Linh</h3>
                </div>
                <div class="block-content block-content-full">
                    <div class="row items-push flex justify-center">
                        <div class="col-lg-8 col-xl-5 !w-3/5">
                            <x-select :name="'user_id'" :label="'Nhân viên'" :options="$users" :selected="old('user_id')" />

                            <x-input-validate type="text" id="Description" :name="'description'" :for="'Lí do ứng'"
                                :value="old('description')" />

                            <x-input-validate id="started_at" type='date' :for="'Ngày bắt đầu'" :name="'started_at'"
                                placeholder="Ngày bắt đầu..." :value="old('started_at')" />

                            <x-input-validate type="date" id="ended_at" :name="'ended_at'" :for="'Ngày kết thúc'"
                                placeholder="Ngày kết thúc..." :value="old('ended_at')" />

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
