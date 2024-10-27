@props(['datas' => null, 'columns', 'controller', 'title'])

<div class="content">
    <div class="block block-rounded">
        <div class="block-content block-content-full ">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-vcenter js-dataTable-simple table-fixed">
                    <x-table.thead :items="$columns" />
                    @if (!$datas)
                        <x-table.tbody :title="$title" :columns="$columns" :contr="$controller">
                            {{ $slot }}
                        </x-table.tbody>
                    @else
                        <x-table.tbody :datas="$datas" :contr="$controller" :columns="$columns" :title="$title" />
                    @endif
                </table>
            </div>
        </div>
    </div>
</div>
