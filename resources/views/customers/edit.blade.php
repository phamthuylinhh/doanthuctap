<x-auth-layout>
    <x-slot:title>
        Edit {{ $customer['name'] }}
    </x-slot:title>

    <x-hero :title="'Customers'" :contr="'Customers'" :ele="'Edit'" />

    <div class="content">
        <form class="js-validation" action="{{ route('customers.update', $customer['id']) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Edit {{ $customer['name'] }}</h3>
                </div>
                <div class="block-content block-content-full">
                    <div class="row items-push flex justify-center">
                        <div class="col-lg-8 col-xl-5 !w-3/5">
                            <x-input-validate id="name" :for="'name'" :name="'name'"
                                placeholder="Username..." :value="old('name') ?? $customer['name']" />
                            <x-input-validate type="email" id="email" :name="'email'" :for="'email'"
                                placeholder="Email..." :value="old('email') ?? $customer['email']" />
                            <x-input id="phone" :name="'phone'" :for="'Phone'" placeholder="Phone..."
                                :value="old('phone') ?? $customer['phone']" />
                            <x-input type="password" id="password" :name="'password'" :for="'password'"
                                placeholder="Password..." />
                            <x-input type="password" id="confirm-password" :name="'confirm-password'" :for="'confirm-password'"
                                placeholder="Confirm password..." />
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
