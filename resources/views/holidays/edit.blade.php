<x-auth-layout>
    <x-slot:title>
        Edit {{ $holiday['id'] }}
    </x-slot:title>

    <x-hero :title="'Holidays'" :contr="'holidays'" :ele="'Edit'" />

    <div class="content">
        <form class="js-validation" action="{{ route('holidays.update', $holiday['id']) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Edit {{ $holiday['id'] }}</h3>
                </div>
                <div class="block-content block-content-full">
                    <div class="row items-push flex justify-center">
                        <div class="col-lg-8 col-xl-5 !w-3/5">
                            <x-select :name="'category_id'" :label="'Loại ngày lễ'" :options="$categories" :selected="old('category_id') ?? $holiday['category_id']" />
                            {{--
                            <x-input-validate id="day" type='number' :for="'Số ngày nghi'" :name="'day'"
                                placeholder="Số ngày nghi..." :value="old('day') ?? $holiday['day']" /> --}}

                            <x-input-validate id="started_at" type='date' :for="'Ngày bắt đầu'" :name="'started_at'"
                                placeholder="Ngày bắt đầu..." :value="old('started_at') ?? substr($holiday['started_at'], 0, 10)" />

                            <x-input-validate type="date" id="ended_at" :name="'ended_at'" :for="'Ngày kết thúc'"
                                placeholder="Ngày kết thúc..." :value="old('ended_at') ?? substr($holiday['ended_at'], 0, 10)" />
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
