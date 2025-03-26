<x-auth-layout>
    <x-slot:title>
        Edit {{ $debt_pay['name'] }}
    </x-slot:title>

    <x-hero :title="'Dept pays'" :contr="'debt_pays'" :ele="'Edit'" />

    <div class="content">
        <form class="js-validation" action="{{ route('debt-pays.update', $debt_pay['id']) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Edit {{ $debt_pay['name'] }}</h3>
                </div>
                <div class="block-content block-content-full">
                    <div class="row items-push flex justify-center">
                        <div class="col-lg-8 col-xl-5 !w-3/5">
                            <x-select :name="'customer_id'" :label="'Customer'" :options="$customers" :selected="old('customer_id') ?? $debt_pay['customer_id']" />
                            <x-select :name="'debt_id'" :label="'Debt'" :options="$debts" :selected="old('debt_id') ?? $debt_pay['debt_id']" />
                            <x-input-validate id="amount" type='number' :for="'amount'" :name="'amount'"
                                placeholder="Amount..." :value="old('amount') ?? $debt_pay['amount']" />
                            <x-input-validate type="date" id="date_payment" :name="'date_payment'" :for="'date_payment'"
                                placeholder="Date payment..." :value="old('date_payment') ?? $debt_pay['date_payment']" />
                            <div class="mb-4">
                                <label class="form-label" for="description">Description</label>
                                <textarea :value="old('description') ?? $debt_pay['description']" class="form-control" id="description"
                                    name="description" rows="4" placeholder="Description...">{{ old('description') ?? $debt_pay['description'] }}</textarea>
                            </div>
                            <x-select :name="'payment_method'" :label="'Payment method'" :options="$payment_methods" :selected="old('payment_method') ?? null" />
                            <x-select :name="'status'" :label="'Status'" :options="$statuses" :selected="old('status') ?? $debt_pay['status']" />
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
