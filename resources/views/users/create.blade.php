<x-auth-layout>
    <x-slot:title>
        Create staff
    </x-slot:title>

    <x-hero :title="'Users'" :contr="'users'" :ele="'Create'" />

    <div class="content">
        <form class="js-validation" action="{{ route('users.store') }}" method="POST">
            @csrf
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Create staff</h3>
                </div>
                <div class="block-content block-content-full">
                    <div class="row items-push flex justify-center">
                        <div class="col-lg-8 col-xl-5 !w-3/5">
                            <x-input-validate id="name" :for="'Tên nhân viên'" :error="$errors->get('name')" :name="'name'"
                                placeholder="Tên nhân viên..." :value="old('name')" />

                            <x-input-validate id="email" type="email" :error="$errors->get('email')" :for="'Email'"
                                :name="'email'" placeholder="Email..." :value="old('email')" />

                            {{-- <x-select :error="$errors->get('role_id')" :name="'role_id'" :label="'Vai trò'" :options="$roles"
                                :selected="old('role_id')" /> --}}

                            {{-- <x-select :error="$errors->get('manager_id')" :name="'manager_id'" :label="'Người quản lý'" :options="$managers"
                                :selected="old('manager_id')" />

                            <x-select :error="$errors->get('branch_id')" :name="'branch_id'" :label="'Thuộc chi nhánh'" :options="$branches"
                                :selected="old('branch_id')" /> --}}

                            <x-input-validate id="password" type="password" :error="$errors->get('password')" :for="'Mật khẩu'"
                                :name="'password'" placeholder="Mật khẩu..." />

                            <x-input-validate id="confirm-password" :error="$errors->get('confirm-password')" type="password"
                                :for="'Xác nhận mật khẩu'" :name="'confirm-password'" placeholder="Xác nhận mật khẩu..." />

                            <x-input id="phone" :for="'Số điện thoại'" :error="$errors->get('phone')" :name="'phone'"
                                placeholder="Số điện thoại..." :value="old('phone')" />

                            <x-input id="address" :for="'Địa chỉ'" :error="$errors->get('address')" :name="'address'"
                                placeholder="Địa chỉ..." :value="old('address')" />

                            <x-input type="date" id="started_at" :error="$errors->get('started_at')" :name="'started_at'"
                                :for="'Ngày làm việc'" placeholder="Ngày làm việc..." :value="old('started_at')" />

                            <x-input type="date" id="ended_at" :error="$errors->get('ended_at')" :name="'ended_at'"
                                :for="'Ngày nghỉ việc'" placeholder="Ngày nghỉ việc..." :value="old('ended_at')" />

                            <x-select :error="$errors->get('status')" :name="'status'" :label="'Status'" :options="$statuses"
                                :selected="old('status')" />
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
