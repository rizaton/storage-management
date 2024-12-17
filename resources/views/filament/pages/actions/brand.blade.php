<div class="overflow-x-auto">
    <table class="min-w-full w-full divide-y divide-gray-200 dark:divide-gray-700">
        <thead class="bg-gray-50 dark:bg-gray-800">
            <tr>
                <th scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                    Brand Attribute
                </th>
                <th scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                    Value
                </th>
            </tr>
        </thead>
        <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-700">
            <x-table-record>
                <x-slot:key>Brand ID</x-slot>
                <x-slot:value>{{ $record->id }}</x-slot>
            </x-table-record>
            <x-table-record>
                <x-slot:key>Brand Name</x-slot>
                <x-slot:value>{{ $record->name }}</x-slot>
            </x-table-record>
            <x-table-record>
                <x-slot:key>Product Stock</x-slot>
                <x-slot:value>{{ $record->products_count }}</x-slot>
            </x-table-record>
            <x-table-record>
                <x-slot:key>Brand Created</x-slot>
                <x-slot:value>{{ $record->created_at }}</x-slot>
            </x-table-record>
            <x-table-record>
                <x-slot:key>Brand Edited</x-slot>
                <x-slot:value>{{ $record->updated_at }}</x-slot>
            </x-table-record>
        </tbody>
    </table>
</div>
{{-- {{ dd($record->toArray()) }} --}}
