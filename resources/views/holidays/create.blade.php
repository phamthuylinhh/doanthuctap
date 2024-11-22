<x-auth-layout>
    <x-slot:title>
        Create holiday | PL-MK
    </x-slot:title>

    <x-hero :title="'Holidays'" :contr="'holidays'" :ele="'Edit'" />

    <div class="content">
        <form class="js-validation" action="{{ route('holidays.store') }}" method="POST">
            @csrf
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Create holiday</h3>
                </div>
                <div class="block-content block-content-full">
                    <div class="row items-push flex justify-center">
                        <div class="col-lg-8 col-xl-5 !w-3/5">
                            <x-select :name="'category_id'" :label="'Loại ngày lễ'" :options="$categories" :selected="old('category_id')" />
                            {{--
                            <x-input-validate id="day" type='number' :for="'Số ngày nghi'" :name="'day'"
                                placeholder="Số ngày nghi..." :value="old('day')" /> --}}

                            <x-input-validate id="started_at" type='date' :for="'Ngày bắt đầu'" :name="'started_at'"
                                placeholder="Ngày bắt đầu..." :value="old('started_at')" />

                            <x-input-validate type="date" id="ended_at" :name="'ended_at'" :for="'Ngày kết thúc'"
                                placeholder="Ngày kết thúc..." :value="old('ended_at')" />
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
