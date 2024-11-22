<x-auth-layout>
    <x-slot:title>
        Create holiday category
    </x-slot:title>

    <x-hero :title="'Holiday categories'" :contr="'holiday-categories'" :ele="'Create'" />

    <div class="content">
        <form class="js-validation" action="{{ route('holiday-categories.store') }}" method="POST">
            @csrf
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Create holiday category</h3>
                </div>
                <div class="block-content block-content-full">
                    <div class="row items-push flex justify-center">
                        <div class="col-lg-8 col-xl-5 !w-3/5">

                            <x-input-validate id="code" :for="'Mã code'" :name="'code'"
                                placeholder="Mã code..." :value="old('code')" />

                            <x-input-validate id="name" :for="'Tên loại ngày nghỉ'" :name="'name'"
                                placeholder="Tên loại ngày nghỉ..." :value="old('name')" />
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
