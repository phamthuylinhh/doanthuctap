 <x-auth-layout>
     <x-slot:title>
         Create Salary
     </x-slot:title>

     <x-hero :title="' Salary '" :contr="' Salary '" :ele="'Create'" />

     <div class="content">
         <form class="js-validation" action="{{ route('salaries.store') }}" method="POST">
             @csrf
             <div class="block block-rounded">
                 <div class="block-header block-header-default">
                     <h3 class="block-title">Create Salary</h3>
                 </div>
                 <div class="block-content block-content-full">
                     <div class="row items-push flex justify-center">
                         <div class="col-lg-8 col-xl-5 !w-3/5">
                             <x-select :name="'user_id'" :label="'Nhân viên'" :options="$users" :selected="old('user_id')"
                                 :error="$errors->get('user_id')" />

                             <x-input-validate type="number" :for="'Lương cơ bản'" :name="'salary'" :selected="old('salary')"
                                 :error="$errors->get('salary')" />

                             <x-input-validate type="subsidy" id="Subsidy" :name="'subsidy'" :for="'Trợ cấp'"
                                 placeholder="Trợ cấp.." :value="old('subsidy')" :error="$errors->get('subsidy')" />

                             <x-input-validate id="fund" type='number' :for="'Quỹ'" :name="'fund'"
                                 placeholder="Quỹ..." :value="old('fund')" :error="$errors->get('fund')" />

                             <x-input id="insurance" type='number' :for="'Bảo hiểm'" :name="'insurance'"
                                 placeholder="Bảo hiểm... " :value="old('insurance')" :error="$errors->get('insurance')" />

                             <x-input id="paid_leave" type='number' :for="'Số ngày nghỉ phép có lương'" :name="'paid_leave'"
                                 placeholder="Số ngày nghỉ phép có lương... " :value="old('paid_leave')" :error="$errors->get('paid_leave')" />

                             <x-input-validate id="started_at" type='date' :for="'Ngày bắt đầu'" :name="'started_at'"
                                 placeholder="Ngày bắt đầu..." :value="old('started_at')" :error="$errors->get('started_at')" />

                             <x-input-validate type="date" id="ended_at" :name="'ended_at'" :for="'Ngày kết thúc'"
                                 placeholder="Ngày kết thúc..." :value="old('ended_at')" :error="$errors->get('ended_at')" />
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
