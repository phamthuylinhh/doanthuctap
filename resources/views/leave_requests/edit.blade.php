<x-auth-layout>
    <x-slot:title>
        Edit {{ $leave_request['id'] }}
    </x-slot:title>

    <x-hero :title="'Holidays'" :contr="'leave_requests'" :ele="'Edit'" />

    <div class="content">
        <form class="js-validation" action="{{ route('leave_requests.update', $leave_request['id']) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Edit {{ $leave_request['id'] }}</h3>
                </div>
                <div class="block-content block-content-full">
                    <div class="row items-push flex justify-center">
                        <div class="col-lg-8 col-xl-5 !w-3/5">

                            <x-input-validate id="user_id" :for="'Nhân viên'" :name="'user_id'"
                                placeholder="Nhân viên..." :value="old('user_id') ?? $leave_request['user']->id" readonly />

                            <x-input-validate type="text" id="Description" :name="'description'" :for="'Lí do ứng'"
                                :value="old('description')" />

                            <x-input-validate id="started_at" type='date' :for="'Ngày bắt đầu'" :name="'started_at'"
                                placeholder="Ngày bắt đầu..." :value="old('started_at')" />

                            <x-input-validate type="date" id="ended_at" :name="'ended_at'" :for="'Ngày kết thúc'"
                                placeholder="Ngày kết thúc..." :value="old('ended_at')" />

                            <x-select :name="'status'" :label="'Status'" :options="$statuses" :selected="old('status') ?? $leave_request['status']" />
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

    <script>
        const request = @json($leave_request);
        console.log(request);
    </script>
</x-auth-layout>
