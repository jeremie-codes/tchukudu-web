@props([
    'headers' => [],
    'rows' => [],
    'actions' => true,
    'checkbox' => false,
    'pagination' => null,
    'emptyText' => 'No data available',
    'search' => false,
    'filters' => null,
])

<div class="bg-white rounded-lg shadow-sm overflow-hidden">
    <!-- Table Header with Search and Filters -->
    @if($search || isset($filters))
    <div class="p-4 border-b border-gray-200">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            @if($search)
            <div class="relative w-full md:w-64">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <i class="bx bx-search text-gray-400"></i>
                </div>
                <input
                    type="search"
                    name="search"
                    id="table-search"
                    class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500"
                    placeholder="Search..."
                    value="{{ request('search') }}"
                >
            </div>
            @endif

            @if(isset($filters))
            <div class="flex flex-wrap items-center gap-2">
                {{ $filters }}
            </div>
            @endif
        </div>
    </div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    @if($checkbox)
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        <div class="flex items-center">
                            <input
                                type="checkbox"
                                class="h-4 w-4 text-primary-600 focus:ring-primary-500 border-gray-300 rounded"
                                @click="$el.checked ? checkAll() : uncheckAll()"
                            >
                        </div>
                    </th>
                    @endif

                    @foreach($headers as $header)
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        {{ $header }}
                    </th>
                    @endforeach

                    @if($actions)
                    <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Actions
                    </th>
                    @endif
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @if($rows->count() > 0)
                    <tr>
                        @if($checkbox)
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <input
                                    type="checkbox"
                                    name="selected[]"
                                    value="{{ $row->id ?? '' }}"
                                    class="row-checkbox h-4 w-4 text-primary-600 focus:ring-primary-500 border-gray-300 rounded"
                                >
                            </div>
                        </td>
                        @endif

                        {{ $slot }}

                    </tr>
                @else
                <tr>
                    <td colspan="{{ count($headers) + ($actions ? 1 : 0) + ($checkbox ? 1 : 0) }}" class="px-6 py-10 text-center text-gray-500">
                        <div class="flex flex-col items-center justify-center">
                            <i class="bx bx-file text-4xl text-gray-300 mb-2"></i>
                            <p>{{ $emptyText }}</p>
                        </div>
                    </td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>

    @if($pagination)
    <div class="px-4 py-3 bg-gray-50 border-t border-gray-200 sm:px-6">
        {{ $pagination }}
    </div>
    @endif
</div>

@push('scripts')
<script>
    function checkAll() {
        document.querySelectorAll('.row-checkbox').forEach(checkbox => {
            checkbox.checked = true;
        });
    }

    function uncheckAll() {
        document.querySelectorAll('.row-checkbox').forEach(checkbox => {
            checkbox.checked = false;
        });
    }
</script>
@endpush
