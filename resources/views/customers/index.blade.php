<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Customer Management
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <div class="flex justify-between items-center mb-4">
    <h3 class="text-lg font-bold">All Customers</h3>
    <a href="{{ route('customers.create') }}" style="background-color: blue; color: white; padding: 10px; border-radius: 5px;">
    + Add New Customer
</a>
</div>

                    <table class="min-w-full border">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border px-4 py-2">Name</th>
                                <th class="border px-4 py-2">Email</th>
                                <th class="border px-4 py-2">Phone</th>
                                <th class="border px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customers as $customer)
                            <tr>
                                <td class="border px-4 py-2">{{ $customer->name }}</td>
                                <td class="border px-4 py-2">{{ $customer->email }}</td>
                                <td class="border px-4 py-2">{{ $customer->phone }}</td>
                                <td class="border px-4 py-2">
    <a href="{{ route('customers.edit', $customer->id) }}" class="text-blue-500">Edit</a>

    <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" style="color: red; margin-left: 10px; cursor: pointer;" onclick="return confirm('Are you sure you want to delete this customer?')">
            Delete
        </button>
    </form>
</td>
                            </tr>
                            @endforeach
                            
                            @if($customers->isEmpty())
                            <tr>
                                <td colspan="4" class="border px-4 py-2 text-center text-gray-500">No customers found.</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>

                    <div class="mt-4">
                        {{ $customers->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>