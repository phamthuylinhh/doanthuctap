<x-auth-layout>
    <x-slot:title>
        Edit {{ $debt['id'] }}
    </x-slot:title>

    <x-hero :title="'Depts'" :contr="'debts'" :ele="'Edit'" />

    <div class="content">
        <form class="js-validation" action="{{ route('debts.update', $debt['id']) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Edit {{ $debt['id'] }}</h3>
                </div>
                <div class="block-content block-content-full">
                    <div class="row items-push flex justify-center">
                        <div class="col-lg-8 col-xl-5 !w-3/5">
                            <x-select :name="'customer_id'" :label="'Khách hàng'" :options="$customers" :selected="old('customer_id') ?? $debt['customer_id']" />
                            <x-input-validate id="amount_paid" type='number' :for="'Số tiền đã trả'" :name="'amount_paid'"
                                placeholder="Số tiền đã trả..." :value="old('amount_paid') ?? $debt['amount_paid']" />
                            <x-input-validate id="installment_amount" type='number' :for="'Số tiền trả góp'"
                                :name="'installment_amount'" placeholder="Số tiền trả góp..." :value="old('installment_amount') ?? $debt['installment_amount']" />
                            <x-input-validate id="total_amount" type='number' :for="'Tổng số tiền'" :name="'total_amount'"
                                placeholder="Tổng số tiền..." :value="old('total_amount') ?? $debt['total_amount']" />
                            <x-input-validate id="product_id" type='number' :for="'Sản phẩm'" :name="'product_id'"
                                placeholder="Sản phẩm..." :value="old('product_id') ?? $debt['product_id']" />
                            <x-input-validate id="due_date" type='number' :for="'Ngày đến hạn'" :name="'due_date'"
                                placeholder="Ngày đến hạn..." :value="old('due_date') ?? $debt['due_date']" />
                            <x-input-validate type="date" id="date_buy" :name="'date_buy'" :for="'Ngày mua'"
                                placeholder="Ngày mua..." :value="old('date_buy') ?? substr($debt['date_buy'], 0, 10)" />
                            <x-input-validate type="date" id="date_payment" :name="'date_payment'" :for="'Ngày thanh toán'"
                                placeholder="Ngày thanh toán..." :value="old('date_payment') ?? substr($debt['date_payment'], 0, 10)" />
                            <x-input-validate type="date" id="ended_at" :name="'ended_at'" :for="'Ngày hết hạn'"
                                placeholder="Ngày hết hạn..." :value="old('ended_at') ?? substr($debt['ended_at'], 0, 10)" />
                            <x-select :name="'payment_methods'" :label="'Payment method'" :options="$payment_methods" :selected="old('payment_methods') ?? $debt['payment_methods']" />
                            <x-select :name="'status'" :label="'Status'" :options="$statuses" :selected="old('status') ?? $debt['status']" />
                            <x-select :name="'status_payments'" :label="'Status payment'" :options="$status_payments" :selected="old('status_payments') ?? $debt['status_payments']" />
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
